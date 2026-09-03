# Content Seeding

Spec for the Seed command: a console command in a site module that adds Blocks with real content to an entry on the development site, so a new Block can be reviewed against Figma without anyone touching the control panel. The Heading Image Grid spec is its first caller.

Decision record: ADR-0002 (seed content through a site module console command, not the control panel). Vocabulary: `CONTEXT.md`, "Blocks" and "Seeding" sections.

## Problem Statement

Every new Block needs example content on the DDEV site before anyone can judge it: the block added to a page, its heading and text filled, its images uploaded. Today that means logging into the control panel and clicking through it, or writing a one-off script that is thrown away. Both are slow, neither is repeatable, and an agent doing the work needs credentials it should not have. With a block landing every few days, the setup cost is paid over and over.

## Solution

A Seed is a JSON file that names an entry, a Matrix field on it, and the Blocks to add with their field values by handle and the images they use. One console command reads the Seed and writes it through Craft's own element API, uploading images that are not already in the volume. Running it again adds nothing twice. A dry run says what it would do without writing. The command understands every field type in the project, nested Blocks included, so any Block the site has or gains can be seeded the same way.

## User Stories

1. As a developer, I want to add a Block with content to a page by running one command, so that reviewing a new Block does not start with control panel clicking.
2. As a developer, I want the Seed to name its own target entry and field, so that I can rerun it without remembering arguments.
3. As a developer, I want to write `home` for the Home entry, so that I do not have to know Craft's internal slug for it.
4. As a developer, I want the target field to default to the page's Blocks field, so that the common case needs no configuration.
5. As a developer, I want to seed the Hero field or a field on the Site entry by naming it, so that the command is not limited to page Blocks.
6. As a developer, I want to give text and heading values as the HTML the field stores, so that there is nothing to learn and a Highlight is just an `em`.
7. As a developer, I want to give a dropdown its option value, so that the Seed reads like the project config.
8. As a developer, I want to give a lightswitch a boolean and a date an ISO string, so that simple fields take simple values.
9. As a developer, I want to list images by filename or path, so that the command uploads them for me.
10. As a developer, I want an image already in the volume reused by filename, so that reruns do not fill the volume with copies.
11. As a developer, I want images resolved relative to the Seed file, so that a Seed and its images travel together.
12. As a developer, I want nested Blocks written the same way as top-level ones, so that Image Columns and Footer Columns seed without a different syntax.
13. As a developer, I want a Content Block's fields written as a nested map, so that Avatar Group and Video seed like everything else.
14. As a developer, I want a link written as a type and value with optional label, target and aria label, so that buttons and menu items can be seeded.
15. As a developer, I want a bare string accepted as a URL link, so that the common link is one line.
16. As a developer, I want links to entries and categories by slug and to assets by filename, so that I never look up an ID.
17. As a developer, I want a form field to take a Formie form handle, so that a contact Block can be seeded with its form.
18. As a developer, I want SEO settings to take a map of keys and values, so that a page's SEO field can be seeded if a review needs it.
19. As a developer, I want a second run of the same Seed to skip the Blocks it already added, so that reruns are safe and never duplicate.
20. As a developer, I want the command to tell me what it created, skipped, uploaded and reused, one line each, so that I can see what changed.
21. As a developer, I want a dry-run flag, so that I can check a Seed before it writes.
22. As a developer, I want a clear error naming the field and value when something is wrong, with nothing written, so that a bad Seed cannot half-apply.
23. As a developer, I want an unsupported field type to fail loudly rather than silently skip, so that I know the command needs extending.
24. As a developer, I want the command to run inside DDEV with no login or token, so that an agent can run it.
25. As an editor, I want seeded Blocks to be ordinary Blocks in the control panel, so that I can edit or delete them like any other.
26. As an editor, I want seeding to leave my own Blocks untouched, so that a rerun never destroys work.
27. As a reviewer, I want the seeded page to render on the front end straight after the run, so that the evidence for a Block can be captured immediately.
28. As an agent following a skill, I want the command's name and Seed shape to be stable, so that the skill written for it keeps working.

## Implementation Decisions

**Where it lives.** A site module registered as `site`, the first code in the repo's module namespace, which composer already autoloads. The Seed command is a console controller in it, so the command is `site/seed/blocks`, run through DDEV. Other site-level console commands belong in the same module.

**Command surface.** One argument, the path to a Seed file. One flag, `--dry-run`. Exit code zero on success, non-zero on any failure. Output is one line per Block (created or skipped, with its type and match key) and one line per image (uploaded or reused, with its filename).

**Seed shape.** A JSON object with `entry` (a slug; `home` is accepted for the Home entry), `field` (a Matrix field handle on that entry, default `blocks`), an optional `volume` (asset volume handle, default `images`), and `blocks`, a list. Each Block has `type` (an entry type handle) and `fields`, a map of field handle to value. The same Block structure is used recursively for nested Matrix values. The shape, as agreed in the grilling session:

```json
{
  "entry": "home",
  "field": "blocks",
  "blocks": [
    {
      "type": "headingImageGrid",
      "fields": {
        "heading": "<h2>Take a Look At The <em>Work We Did</em></h2>",
        "images": ["garden-centre-cart.jpg", "market-flowers.jpg"],
        "padding": "topBottom"
      }
    }
  ]
}
```

**Field values by type.** The command resolves each value by the field's type, looked up from the entry type's field layout so instance handles work:

- Plain text and CKEditor: the string as-is. CKEditor values carry their own wrapper tag.
- Dropdown: the option value.
- Lightswitch: a boolean.
- Date: an ISO 8601 string.
- Assets: a list of filenames or paths. Each is matched by filename in the Seed's volume and reused if found, otherwise uploaded from the path, resolved relative to the Seed file. Alt text is left to the asset's title, which Craft derives from the filename.
- Matrix: a list of Blocks in the same shape, created fresh as part of their parent.
- Content Block: a map of field handle to value, resolved with the same rules.
- Link: an object with `type` (`entry`, `category`, `asset`, `url`, `email`, `tel`), `value`, and optional `label`, `target` and `ariaLabel`. Entries and categories are found by slug, assets by filename in the volume, the rest are raw strings. A bare string is a `url` link.
- Formie form: the form handle.
- SEOmatic settings: a map of setting keys to values, merged over the field's current value.
- Any other type: an error naming the field and its type. Nothing is written.

**Validation before writing.** Every Block and nested element is built and validated first; the entry is saved once with the new Blocks appended after any existing ones. A validation error prints the element's errors, names the Block by type and position, and stops the run with nothing saved. Dry run performs the same resolution and validation, prints the same lines, and saves nothing, including no image uploads.

**Rerun behaviour.** Only top-level Blocks are matched. A Block's match key is its entry type handle plus the value of the first plain text or CKEditor field in its layout, compared with tags stripped and whitespace trimmed. A Block whose layout has no text field matches on type alone, so a second instance of such a Block is never seeded by this command; that is documented in the output line. Matched Blocks are skipped, never updated or reordered. Existing Blocks the Seed does not mention are untouched.

**Seeds are throwaway.** Seed files and their images live under the gitignored scratch folder, beside the evidence for the same Block. Nothing in the repo depends on them and nothing runs them automatically.

**Docs.** The evidence doc gains a short section on seeding: where Seeds live and the command to run. ADR-0002 records the decision.

## Testing Decisions

There is no test suite. Evidence replaces tests: the command's own output, and the seeded result seen in the control panel and on the front end, captured per the evidence doc.

**Seams.** The single primary seam is the command itself, run against the DDEV site with a Seed that exercises every field type. The Heading Image Grid's Seed is the first real one; a second, throwaway Seed against a scratch page covers the types that Block does not use (nested Matrix, Content Block, links, form, lightswitch, date, SEO). The front end and control panel are the secondary seam, confirming that what was written is what an editor and a visitor see.

**What good evidence looks like.** Output that a reader can check line by line against the Seed, a second run that changes nothing, and a page that shows the content. Terminal output is saved as text files beside the screenshots.

**Evidence plan.**

1. First run of the Heading Image Grid Seed: output shows one Block created and two images uploaded. Proves the create path.
2. Second run of the same Seed: output shows the Block skipped with its match key and both images reused, and the entry's Block count is unchanged. Proves idempotence.
3. Dry run of a fresh Seed against a scratch page: output shows what would be created, and afterwards the page has no new Blocks and the volume no new assets. Proves dry run writes nothing.
4. Run of the all-types Seed against the scratch page: every field type in the project written, confirmed in the control panel with a screenshot of the entry's Blocks. Proves the type coverage.
5. A Seed with a wrong dropdown value: the run stops with an error naming the field, and the page has no new Blocks. Proves validation before writing.
6. A Seed naming a field type the command does not know: the run stops naming the field and type. Proves the loud failure.
7. Home page at 1600 after the first run: the seeded Block renders. Proves the seam end to end. The Heading Image Grid spec carries the visual comparison.

## Out of Scope

- Updating or reordering Blocks that already exist. Seeds append and skip, nothing else.
- Deleting seeded content. An editor removes Blocks in the control panel.
- Creating pages or entries. The target entry must exist.
- Committing Seeds or images to the repo, or running Seeds on any environment but development.
- A control panel or web route for seeding. It is a console command only.
- Users, categories, globals or any element type other than Blocks on an entry.
- Translations or multi-site propagation beyond what Craft does by default on save.
- Field types the project does not have. They fail loudly and are added when a Block needs them.

## Further Notes

- The match key is deliberately loose. If two different seeded Blocks of one type ever share a first text value, the second is skipped; the fix at that point is a dedicated key field, a small change.
- Image Columns takes at least three images per column for its loop; a Seed for it needs that many files beside it.
- The Seed for the Heading Image Grid, and the photos it uses, were prepared during the grilling session and sit under the scratch folder.
