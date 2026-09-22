# Heading Image Grid

Spec for the Heading Image Grid Block: a centred heading with a Highlight, over a two-column grid of Tiles. It is the first Block built on the three-slot layout, the second caller of the alternate heading, and the first content added to the Home page.

Design: Figma node `9797-18370` in the Marketing Signals file, 1600 wide. No mobile node exists; the responsive rules below are decisions, not measurements.

Related: the Content Seeding spec, which this depends on for putting the Block on the Home page. ADR-0001 does not apply: the Block is in flow beneath the header, and the Home page has no hero yet. Vocabulary: `CONTEXT.md`, "Blocks" section.

## Problem Statement

Visitors land on a Home page that shows a header and a footer with nothing between them. Editors have a Blocks field but only a Heading Block to put in it, and that Block has no template. There is no way to introduce a page's work with a heading and a pair of photographs, which is how the design opens most sections.

## Solution

A Heading Image Grid Block editors can add to any page. It shows a centred heading, up to 70px at desktop, with the words an editor marks italic rendered as a Highlight in the primary colour. Beneath it, the images the editor adds fill a two-column grid of rounded 5:4 Tiles with the site's 20px gap; a single image spans the full width. Below tablet the Tiles stack. The Home page gets one instance with the Figma copy and photographs, added through the Seed command so the review starts from real content.

## User Stories

1. As a visitor, I want a section with a large heading over two photographs, so that a page can introduce its work visually.
2. As a visitor, I want the heading centred and held to a readable width, so that a two-line heading reads as designed.
3. As a visitor, I want the key words in the heading picked out in the brand colour, so that the message lands at a glance.
4. As a visitor, I want the photographs cropped to the same shape with matching rounded corners, so that the pair reads as one grid.
5. As a visitor, I want the photographs sized for my screen, so that the page does not download a 1500px image for a phone.
6. As a visitor with a phone, I want the Tiles stacked one above the other, so that each photograph is large enough to see.
7. As a visitor with a tablet or desktop, I want the Tiles side by side, so that the width is used.
8. As a visitor, I want the heading to step up in size with my screen, so that it is legible on a phone and bold on a desktop.
9. As a visitor, I want images to load lazily, so that the page is quick to first paint.
10. As a screen reader user, I want each Tile announced by its image title, so that photographs are described.
11. As a screen reader user, I want the heading to be a real heading element at the level the editor chose, so that I can navigate the page by headings.
12. As an editor, I want a Heading Image Grid in the Blocks menu, so that I can add it to any page.
13. As an editor, I want the Block's fields grouped under Section Header and Section Content, so that it reads like every other Block.
14. As an editor, I want to write the heading in the same heading field I use elsewhere, so that there is nothing new to learn.
15. As an editor, I want to make words italic to highlight them, so that the brand colour is under my control with one rule to remember.
16. As an editor, I want to choose the heading level, so that the page outline stays correct.
17. As an editor, I want to add as many images as I like and see them flow into the grid two per row, so that the Block adapts to what I have.
18. As an editor, I want a single image to span the full width, so that a half-filled field still looks intentional.
19. As an editor, I want field instructions that tell me how the grid fills, so that I do not have to ask.
20. As an editor, I want to leave the heading or the images empty and have the rest still render, so that a partly filled Block is not broken.
21. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
22. As an editor, I want the Home page to already carry this Block with the designed content, so that I see how it is meant to look.
23. As a developer, I want the Block to reuse the existing Heading and Images fields with no renames, so that the field list stays small.
24. As a developer, I want the alternate heading to accept a CKEditor value directly and derive its tag, so that every Block with a heading field handles it the same way.
25. As a developer, I want the footer CTA to use that same path, so that there is one place the wrapper-stripping lives.
26. As a developer, I want a 5:4 transform beside the existing ones, so that the Tiles crop to the designed shape on every Block that needs it.
27. As a developer, I want the Home page content added by a Seed rather than by hand, so that the review environment is reproducible.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `headingImageGrid`, name "Heading Image Grid", colour blue, icon `grid-2`, added to the Blocks field in the General group. It follows the Template entry type's structure: a Content tab with a Section Header heading element followed by the Heading field, and a Section Content heading element followed by the Images field; a Settings tab with the Padding field. Section Footer is omitted because nothing sits beneath the grid. No new fields and no renamed fields: Heading and Images are reused with their default handles. The Images instance carries instructions: "Tiles fill a two-column grid, as many as you add. A single image spans the full width."

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding, and its content inside the section's content block. No Alpine; the Block is static.

**Heading.** Rendered through the alternate heading component, colour base, alternate style base (Highlight in primary), font semibold, leading 0.97, tighter tracking, centred with a max width of eight of the twelve grid columns. Size steps 5xl at mobile, 7xl from `md`, 8xl (70px) from `lg`. The heading component gains the ability to take the raw CKEditor value: the editor's leading `h2` to `h6` tag is read off the front and used as the element, `p` or no wrapper falls back to the `tag` param, and the wrapper is stripped before the inline marks are restyled. The footer CTA drops its own copy of that logic and passes its heading value straight through. The plain heading component is unchanged.

**Grid.** A two-column CSS grid from `md`, one column below, with the site's 20px gap on both axes. Every image the editor added renders, in order, as a Tile. A Tile is the picture component at a new `5x4` Imager transform (400, 800 and 1200 widths, ratio 5:4), 20px radius, object-cover, lazy loaded, alt from the asset title, with `sizes` of roughly half the viewport from `md` and the full viewport below. A single image spans both columns; with two or more the grid flows, so an odd last Tile sits at half width on the left. Heading and grid are 30px apart, using the nearest spacing token.

**Empty states.** The heading renders only when its text has content after tags are stripped; the grid only when at least one image exists; the Block wrapper renders whenever either does, and nothing at all when both are empty.

**Home page content.** One Heading Image Grid at the top of the Home page's Blocks, padding Top and Bottom. Heading: "Take a Look At The" then a line break, then "Work We Did" as the Highlight, as a level-two heading. Two images, the garden centre and market photographs downloaded from the Figma node. Added with the Seed command from a Seed file kept beside the photographs under the scratch folder; the Seed is not committed.

**Docs.** `CONTEXT.md` gained the Blocks vocabulary during the grilling session. No new ADR: none of the Block's decisions is hard to reverse.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Home page through the global layout, with the Block seeded onto it. The Block renders the heading and the picture component through the same paths the footer already uses, so the styleguide adds nothing here. The footer CTA on the same page is the regression check for the heading component change.

**What good evidence looks like.** It shows what a visitor would see: the heading at the designed size with its Highlight, two Tiles at 5:4 with the right gap and radius, the stacked mobile layout, and the footer CTA heading unchanged. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is the empty Home page.

**Evidence plan.**

1. Home page at 1600, full page: the Block compared against the Figma node for heading size, Highlight colour, Tile size, gap and radius. Proves the desktop layout.
2. Home page at 768, full page: Tiles side by side at the `md` two-column rule, heading at 7xl. Proves the tablet rules.
3. Home page at 390, full page: Tiles stacked, heading at 5xl. Proves the mobile layout.
4. Home page at 1600, footer CTA heading: unchanged before and after the heading component change. Proves the refactor.
5. Home page at 1600 with a temporary third image in the Seed: the third Tile sits at half width on the left. Proves the flow rule. The temporary image is removed afterwards.
6. Home page at 1600 with the images temporarily removed: heading only, no empty grid. Proves the empty grid state. Restored afterwards.
7. Home page at 1600 with the heading temporarily cleared: grid only. Proves the empty heading state. Restored afterwards.
8. Rendered HTML of the Home page: the heading is an `h2` with the Highlight span inside it, and each Tile image carries an alt from its asset title and lazy loading. Proves the accessibility stories.

## Out of Scope

- A template for the existing Heading Block. It stays as it is and gets its own Figma node and ticket.
- Captions, links or hover states on Tiles. Figma has none.
- A cap on the number of images. The field accepts any number and the grid flows.
- Any Section Footer content, such as a button beneath the grid.
- A dedicated mobile design. The stacking rules follow the decisions above until a mobile node exists.
- Committing the Seed or the photographs.

## Further Notes

- The Figma Tiles are 750 by 597, a ratio of 1.256; the decision is 5:4 exactly, three pixels shorter per Tile at 1600.
- The design's second Tile carries a black fill beneath the photograph. It is invisible with an image in place and is not reproduced.
- Figma tracks the heading at minus 4px, which is minus 0.057em at 70px; the project's tighter tracking token is minus 0.04em and is used as the nearest match, as the footer CTA heading does.
- Two further photographs sit hidden beneath the first Tile in Figma. They were downloaded and set aside; only the two visible ones are used.
