---
status: accepted
---

# Seed content through a site module console command, not the control panel

Every new Block needs example content on the DDEV site before it can be reviewed against Figma: the block added to a page, its fields filled, its images uploaded. This will happen for every block, driven by an agent, so it has to be repeatable and cheap. The decision is a console command in a site module under `modules/` that reads a seed file (the target entry, the Matrix field, and a list of blocks with field values by handle) and writes it through Craft's own element API. The command is idempotent: a block already seeded is skipped, an image already in the volume is reused. This is the first PHP in a repo that is otherwise Twig and Tailwind; that is the cost, and the reason this is written down.

## Considered options

- **Control panel automation** (agent-browser or computer use): no code, but it needs a login every run, is slow, and breaks whenever a control panel layout changes. Kept as the fallback for one-offs only.
- **GraphQL mutations**: built in, but nested Matrix entries and asset uploads through GraphQL are awkward, and a write-scoped schema and token would have to be provisioned and kept out of the repo.
- **A throwaway PHP script per block**: works once, then rots. The recurring need is exactly what makes a shared command worth its upkeep.

## Consequences

- Seeding a block is `ddev exec php craft site/seed/blocks <seed.json>`, so a skill or agent can do it without credentials or a browser.
- Seed files and their images live under the gitignored `.scratch/`; they are inputs to a review, not part of the site. Nothing in the repo depends on them.
- The command must learn each field type it meets (text, CKEditor, dropdown, lightswitch, date, assets, link, nested Matrix, content block, Formie form, SEOmatic settings). A new field type on a block means a small addition to the command before that block can be seeded.
- The `modules/` namespace is now in use. Other site-level console commands belong in the same module.
