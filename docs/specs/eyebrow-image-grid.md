# Eyebrow Image Grid

Spec for the Eyebrow Image Grid Block: a centred heading with a Highlight over a grid of rounded Tiles laid out in a fixed rhythm of full, tall and short sizes. Each Tile can carry an Eyebrow with a Rule in white or black, and an optional Button Group sits centred beneath the grid. It is made for the Brand Guidelines page, where it shows the logo variations, but any page with Blocks can use it.

Design: Figma node `10071-25086` in the Marketing Signals file, a group named "Group 46398", 1520 by 2915 inside a 1600 frame. No tablet or mobile node exists; the responsive rules below are decisions, not measurements.

Branch: feature/eyebrow-image-grid

Related: the Heading Image Grid spec, whose heading treatment, Tile styling and empty rules this follows. The Eyebrow Heading Text spec, whose Eyebrow-with-Rule and Button Group use this reuses. The Brand Values spec, which also seeds the Brand Guidelines page. ADR-0002: content is added by Seed, never through the control panel. ADR-0001 does not apply: the Block sits in flow beneath the page's hero. Vocabulary: `CONTEXT.md`, "Blocks" section, which gained Eyebrow Image Grid during the grilling session. The same session widened Tile so a Tile can carry an Eyebrow and Rule.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Brand Guidelines page has a hero and a footer, but nothing to show the brand's logo in use. Editors cannot lay out a set of brand images of different sizes, some labelled and some not, the way the design presents the visual identity. The Heading Image Grid only makes equal 5:4 Tiles with no labels, and no Block offers a text colour an editor can pick to suit a dark or light image.

## Solution

An Eyebrow Image Grid Block editors can add to any page. A centred heading, up to 70px at desktop, with its Highlight in the primary colour, sits over a grid of Tiles. The editor adds Tiles in order. From tablet up, each Tile's size comes from its position in a repeating run of seven:

1. Tile 1 spans the full width.
2. Tiles 2 to 4: a tall Tile on the left beside two short Tiles stacked on the right.
3. Tiles 5 to 7: two short Tiles stacked on the left beside a tall Tile on the right.

When the Tiles run out partway through a group, that group's Tiles sit two per row as short Tiles, and a lone Tile spans the full width. Below tablet every Tile stacks at the same 16:10 shape.

Each Tile is one flattened image, such as a logo on its background colour or a photograph. The image can carry an Eyebrow with a Rule across its top, in white or black as the editor picks. An optional Button Group sits centred beneath the grid. The Brand Guidelines page gets one instance with the Figma copy and flattened images, added through the Seed command.

## User Stories

1. As a visitor, I want a large centred heading over a grid of brand images, so that the visual identity section introduces itself.
2. As a visitor, I want the key words of the heading in the brand colour, so that the message lands at a glance.
3. As a visitor, I want the first image to span the full width, so that the lead visual has the most weight.
4. As a visitor, I want the following images in a rhythm of tall and short Tiles, so that the grid reads as designed rather than as a uniform gallery.
5. As a visitor, I want each tall Tile to line up exactly with the two short Tiles beside it, so that the grid edges are clean.
6. As a visitor, I want every Tile rounded at 20px with a 20px gap between Tiles, so that the grid matches the rest of the site.
7. As a visitor, I want a label with a thin line across the top of a Tile, so that I know which logo variation I am looking at.
8. As a visitor, I want the label in white on dark images and black on light ones, so that it is always readable.
9. As a visitor, I want Tiles without a label to show just the image, so that photographs are not cluttered.
10. As a visitor with a phone, I want the Tiles stacked one above the other at the same shape, so that the page scrolls evenly.
11. As a visitor with a phone, I want logos to stay whole in each Tile, so that the brand marks are never cropped.
12. As a visitor with a tablet, I want the desktop rhythm already applied, so that the width is used.
13. As a visitor with a tablet, I want the label inset to tighten, so that labels fit a narrow Tile.
14. As a visitor, I want the grid to scale with my window below 1600, so that the proportions hold at any width.
15. As a visitor, I want a centred "Download Logo Files" button beneath the grid, so that I can act on what I have just seen.
16. As a visitor, I want images sized for my screen and lazy loaded, so that the page is quick.
17. As a screen reader user, I want each image announced by its asset title, so that the visual is described.
18. As a screen reader user, I want the heading to be a real heading at the level the editor chose, so that I can navigate by headings.
19. As an editor, I want an "Eyebrow & Image Grid" in the Blocks menu, so that I can add it to any page.
20. As an editor, I want the fields grouped under Section Header, Section Content and Section Footer, so that it reads like every other Block.
21. As an editor, I want to write the heading in the heading field I use elsewhere, making words italic to highlight them, so that there is nothing new to learn.
22. As an editor, I want to add Tiles as "Eyebrow & Image" entries in an "Eyebrow & Images" field, so that each Tile's image, label and colour stay together.
23. As an editor, I want the image to be required and the Eyebrow optional, so that a Tile always shows something and labels are my choice.
24. As an editor, I want to pick White or Black text for each Tile, defaulting to Black, so that the label suits the image I uploaded.
25. As an editor, I want field instructions explaining the rhythm of seven, so that I can order Tiles to get the sizes I want.
26. As an editor, I want an incomplete run to fall back to a tidy layout with no holes, so that any number of Tiles looks intentional.
27. As an editor, I want to set a focal point on an image, so that the phone crop keeps what matters.
28. As an editor, I want up to two buttons beneath the grid, including a link to an asset such as a logo pack, so that the Block can offer a download.
29. As an editor, I want to leave the heading, Tiles or buttons empty and have the rest still render, so that a partly filled Block is not broken.
30. As an editor, I want the Block's padding option, so that I can tune its spacing to its neighbours.
31. As an editor, I want the Brand Guidelines page to already carry this Block with the designed content, so that I see how it is meant to look.
32. As a developer, I want the Block to reuse the Heading, Eyebrow, Image and Button Group fields, so that the field list stays small.
33. As a developer, I want a reusable White and Black text colour dropdown, so that later Blocks with the same choice do not add another field.
34. As a developer, I want the grid built from the existing picture, eyebrow, alternate heading and button group components, so that there is one place each is styled.
35. As a developer, I want Tile sizes decided without index arithmetic, so that the template follows the loop-helper standard.
36. As a developer, I want the content added by a Seed, so that the review environment is reproducible.

## Implementation Decisions

**Fields.**

- **Text colour dropdown.** A new Dropdown field, name "Dropdown - Text Colour", handle `dropdownTextColour`. It has two options, White (`white`) and Black (`black`), and Black is the default. It follows the other dropdown fields' settings.
- **Nested entry type.** A new entry type, name "Eyebrow & Image", handle `eyebrowImage`, with no title field. In order, its layout holds:
  - the Image field, required, with the instance label "Image";
  - the Eyebrow field, optional;
  - the text colour dropdown, with the instance label "Text Colour".
  - Its card label shows the Eyebrow and falls back to the image's title.
- **Matrix field.** A new Matrix field, name "Eyebrow & Images", handle `eyebrowImages`, holding only the Eyebrow & Image entry type. The number of Tiles is unlimited, and it follows the settings of the existing nested Matrix fields such as Statistics. Its instructions read: "Tiles follow a run of seven: 1 full width; 2 tall with 3 and 4 short beside it; 5 and 6 short with 7 tall beside them. An unfinished run sits two per row."
- No renamed fields.

**Entry type.** A new Block entry type, handle `eyebrowImageGrid`, name "Eyebrow & Image Grid", icon `grid-2`, added to the Blocks field beside the Heading Image Grid.

- **Content tab:**
  - a Section Header heading element, then the Heading field;
  - a Section Content heading element, then Eyebrow & Images;
  - a Section Footer heading element, then Button Group.
- **Settings tab:** the Padding field.

**Block template.** Lives with the other Blocks and follows the Block scaffold: block defaults, the merge line, and the section embed with the Block's padding. No Alpine; the Block is static.

**Heading.** The same treatment as the Heading Image Grid:

- the alternate heading component, colour base, Highlight in primary;
- semibold, leading 0.97, tighter tracking;
- centred across eight of the twelve columns from `md`;
- size 5xl at mobile, 7xl from `md`, 8xl (70px) from `lg`.

The heading and the grid are 50px apart.

**Grid rhythm.**

- **Groups.** The Tiles are split into runs of seven with Twig's batch filter. Each run is sliced into its three groups: the full Tile, the tall-left group and the tall-right group. This avoids index arithmetic, per the loop-helper standard.
- **Tablet and desktop.** From `md` the grid has two columns with a 20px gap on both axes.
  - A full Tile spans both columns at a 1520:820 ratio.
  - A short Tile keeps a 750:442 ratio.
  - A tall Tile spans the two short rows beside it plus the gap, so it is exactly 904 tall at 1600.
- **Placement.** In the tall-left group, the tall Tile takes the first column. In the tall-right group, the tall Tile takes the second column and its two short Tiles take the first.
- **Unfinished groups.** A group with fewer than three Tiles skips the tall layout. Its Tiles sit two per row at the short ratio, and a lone Tile spans both columns at the full ratio.
- **Mobile.** Below `md` every Tile stacks in one column at 16:10.
- **Scaling.** Sizes come from ratios, not pixel heights, so the grid scales below 1600.

**Tile.**

- **Shape.** A relative, rounded 20px, overflow-hidden box whose shape is set by the rhythm above.
- **Image.**
  - The picture component with no fixed ratio and the focal-point mode, so the image cover-crops to whatever shape the box has. The same upload serves the tall slot on desktop and the 16:10 slot on mobile. The crop is centred unless the editor sets a focal point.
  - It uses the existing `noRatioLarge` transform for a full Tile and `noRatio` for the rest.
  - It is lazy loaded, with alt text from the asset title.
  - `sizes` is the full viewport for a full Tile. For the rest it is half the viewport from `md` and the full viewport below.
- **Eyebrow.** When present, the Eyebrow sits over the top of the image, inset 20px below `lg` and 40px from `lg`. It uses the eyebrow component with its Rule:
  - White text gets a `white-30` Rule.
  - Black text gets a `black` Rule.
- **No Eyebrow.** A Tile without an Eyebrow shows only the image.

**Button Group.** The button group component with the Block's Button Group, centred, in the default secondary colour. It sits 40px below the grid.

**Empty states.**

- The heading renders only when its text has content after tags are stripped.
- The grid renders only when at least one Tile exists.
- The Button Group renders only when it has buttons.
- The spacing above an element applies only when the element before it rendered.
- A Block with all three empty renders nothing.

**Brand Guidelines content.** A Seed in `.scratch/seeds/eyebrow-image-grid/` adds one Eyebrow Image Grid to the `brand-guidelines` entry, after its existing Blocks, with padding Top and Bottom.

- **Heading:** "The Marketing Signals", then a line break, then "Visual identity" as the Highlight, as a level-two heading.
- **Button Group:** one button, "Download Logo Files", a `url` link to `#`.
- **Tiles**, in order:

| # | Size       | Image, flattened from                                                                   | Eyebrow                          | Text colour |
| - | ---------- | --------------------------------------------------------------------------------------- | -------------------------------- | ----------- |
| 1 | Full       | photograph `9716:10938` on black at 40% opacity, with the Creme logo group `9716:10941` | Primary logo                     | White       |
| 2 | Tall left  | Black fill `9716:10829` with Logo / Full / Primary `9716:10929`                         | Primary logo (Dark background)   | White       |
| 3 | Short      | White fill `9716:10831` with Logo / Full / Black `9716:10960`                           | Primary logo (Light background)  | Black       |
| 4 | Short      | Secondary fill `9716:10817` with the browser mockup `9716:10818` at bottom right         | none                             | Black       |
| 5 | Short      | Secondary fill `9716:10813` with the black logomark `9716:10816`                        | Logomark (Light background)      | Black       |
| 6 | Short      | Black fill `9716:10808` with the white logomark `9716:10811`                             | Logomark (Dark background)       | White       |
| 7 | Tall right | the tote bag photograph `9716:10806`                                                    | none                             | Black       |

- **The images are already built.** They are saved in `.scratch/seeds/eyebrow-image-grid/` as `eyebrow-image-grid-1-primary-logo.jpg`, `-2-primary-logo-dark.png`, `-3-primary-logo-light.png`, `-4-browser-mockup.png`, `-5-logomark-light.png`, `-6-logomark-dark.png` and `-7-tote-bag.jpg`, in Tile order, at twice the Figma size. Use them as they are; no Figma access is needed. In Figma the fills, logos and labels are loose sibling layers, so each image was composed from the fill or photograph and the logo SVG at their Figma offsets, without the eyebrow text or Rule. The sources and the compose page are in that folder's `src/`, so they can be rebuilt.
- **Not committed:** the Seed and the images.

**Docs.** `CONTEXT.md` gained Eyebrow Image Grid, and Tile was widened to carry an Eyebrow and Rule. No new ADR: none of the decisions is hard to reverse.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML where the behaviour is not visual.

**Seams.**

- **One seam:** the rendered Brand Guidelines page, `https://marketing-signals.ddev.site:8443/brand-guidelines`, with the Block added by the Seed. In a worktree, use that worktree's own URL.
- **Partial cases:** unfinished runs and empty parts are proven by a throwaway second Seed on the same page, removed afterwards. They are checked and reported, not all captured.
- **Nothing committed to the styleguide.**

**What good evidence looks like.** It shows what a visitor would see:

- the heading at 70px with its Highlight;
- the full, tall and short Tiles lining up with 20px gaps and 20px corners;
- Eyebrows in the right colour with their Rules;
- the centred button;
- the stacked 16:10 phone layout.

Before is `main` at the commit the branch forked from, where the page shows no grid.

**Evidence plan.**

1. **Brand Guidelines at 1600, full page, scrolled to the Block.**
   - Heading "The Marketing Signals / Visual identity" at 70px, 50px above the grid.
   - Tile 1 at 1520 by 820.
   - Tall Tiles at 750 by 904, beside short Tiles at 750 by 442.
   - 20px gaps.
   - Eyebrows inset 40px with white-30 or black Rules.
   - The button centred 40px below.

   Compared against `10071-25086`. Proves the desktop rhythm.
2. **Brand Guidelines at 768, full page, scrolled to the Block:** the rhythm applied in two columns, Eyebrows inset 20px, heading at 7xl. Proves the `md` step.
3. **Brand Guidelines at 390, full page, scrolled to the Block:** every Tile stacked at 16:10 with logos whole, heading at 5xl. Proves the phone layout.
4. **Served HTML of the page.**
   - The heading is an `h2` with the Highlight inside it.
   - Every Tile image has alt text from its asset title and lazy loading.
   - No inline styles beyond the picture component's own.
   - No `script` added for the Block.

   Proves the markup.
5. **A throwaway Seed of nine Tiles at 1600:** Tiles 8 and 9 sit side by side as short Tiles. Removed afterwards. Proves the unfinished-group rule.
6. **A throwaway Seed of three Tiles at 1600:** a full Tile, then Tile 2 and Tile 3 side by side as short Tiles. Removed afterwards. Proves the fallback when the tall group is incomplete.
7. **A throwaway Seed with Tile 1 alone at 1600:** one full Tile. Removed afterwards. Proves the lone Tile.
8. **Throwaway Seeds checking empty parts:**
   - heading only;
   - Tiles only, with no heading or buttons and no stray spacing;
   - everything empty, with no section rendered.

   Removed afterwards. Proves the empty rules.

## Out of Scope

- A dedicated mobile or tablet design. The rules above stand until one exists.
- Editor-chosen Tile sizes. The size comes from position only.
- Editor-chosen Tile background colours or live-rendered logos. The fill and logo are part of the uploaded image.
- A Creme Rule colour. Black text always gets a black Rule.
- The real logo pack for the download button. Uploading the zip and linking it is a content job.
- Hover states or links on Tiles. Figma has none.
- Committing the Seed or the composed images.

## Further Notes

- **Rule colour.** In Figma, Tile 3's Rule is Creme 400 (`#D3D0C5`) on white. With one colour choice per Tile it becomes black, a deliberate small difference.
- **Eyebrow weight.** Tile 1's Eyebrow is Regular in Figma while the others are Medium. The eyebrow component's Medium is used for all of them.
- **Mockup placement.** In Figma the browser mockup in Tile 4 is 748 by 374, anchored bottom right with only its bottom-right corner rounded. It is composed into the flattened image that way.
- **Heading tracking.** Figma tracks the heading at minus 4px, which is minus 0.057em at 70px. The project's tighter tracking token, minus 0.04em, is the nearest match, as in the Heading Image Grid.
- **Crop costs.** At 16:10 on a phone the tall tote bag photograph loses its top and bottom, which the grilling session accepted. A focal point on the asset can move the crop.
- **Page order.** The Brand Values spec also appends a Block to the Brand Guidelines page. If both Seeds run, the page order follows the order they were run in, since neither moves existing Blocks.
- **Glossary conflict.** In the working tree, the Branding Columns glossary lists "tile" as a term to avoid for a Branding Column. That is a different Block, so there is no conflict with Tile here.
