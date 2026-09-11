# Marquee - Images

Spec for the Image Marquee Block: a large heading with the Highlight beside a short text, over one full-width row of photo Tiles that Crawls leftwards without pausing. It is the first Block on the Culture page.

Design: Figma node `9962-15533` in the Marketing Signals file, named "Group 46373", the Block at rest in the 1600 frame with the heading and text over four Tiles, the outer two clipped at the viewport edges. No hover, tablet or mobile frame exists, so the header stacking, the heading ramp, the Tile ramp and the gaps below `lg` are decisions, not measurements. Figma draws the section alone, so the space above and below it is the Block's Padding setting.

Branch: feature/marquee-images

Related: the Marquee - Logos spec, whose decorative Crawl that never pauses and Twig repeat pattern this Block copies; the Marquee - Team spec, whose accessible-copy flag on the marquee component, Tiles that carry their own trailing gap, repeat-to-a-minimum rule and heading ramp this Block reuses; the Eyebrow, Heading & Text Block, whose heading-beside-text grid and reuse of Rich Text - Simple as `text` this Block follows; the Content Seeding spec, which seeds the Culture page content and derives each image's title, and so its alt text, from its filename. ADR-0002 applies: the Culture page content arrives by Seed. ADR-0001 applies in passing: the Culture page has no Hero yet, so until one lands this Block sits beneath the fixed Header with no clearance, which is the page's problem, not the Block's. No new ADR: reusing a field and treating the photos as announced content are both easy to reverse. Vocabulary: `CONTEXT.md`, "Image Marquee" section, which gained Image Marquee during the grilling session; Crawl was widened to cover it. Tile is used as the glossary already defines it.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Culture page is empty. The design opens it with "We're simultaneously remote and (occasionally) together": a large heading, a short paragraph about the team's get-togethers, and a row of wide photos of people at work drifting slowly across the screen. The site's marquees all carry something else: logos, Clients or Team Members. Nothing lets an editor put a row of their own photos in motion beneath a heading and text, so the page cannot be built.

## Solution

An Image Marquee Block editors can add to any page. It holds a heading with the Highlight, a short rich text and a set of uploaded images. The heading sits at the left inside the site margins with the text in the right-hand columns, top aligned; on smaller screens the text stacks beneath the heading. Beneath them one row of rounded, landscape Tiles runs the full width of the viewport and Crawls leftwards without stopping, slowly, the outer Tiles clipped at the screen edges. Nothing in the row is clickable and nothing pauses it. Under reduced motion the row sits still. Each photo is announced once to screen readers by its title. The Culture page gets one instance with the Figma heading, text and four photos, added through the Seed command.

## User Stories

1. As a visitor, I want to see photos of the team drifting slowly across the page, so that I get a feel for what working here is like.
2. As a visitor, I want the row to move on its own, so that I see every photo without scrolling sideways.
3. As a visitor, I want the row to move slowly and never jump, so that it reads as atmosphere rather than a slideshow I must watch.
4. As a visitor, I want the row to loop seamlessly, so that I never see a gap or a restart.
5. As a visitor, I want a large heading with part of it coloured, so that the section's point lands at a glance.
6. As a visitor, I want a short paragraph beside the heading, so that I understand what the photos show.
7. As a visitor on a phone, I want the text beneath the heading and smaller Tiles that still Crawl, so that the section works at my width.
8. As a visitor on a tablet, I want Tiles between the phone and desktop sizes, so that the row fills my screen sensibly.
9. As a visitor who prefers reduced motion, I want the row to sit still, so that nothing moves without my say-so.
10. As a screen reader user, I want each photo announced once by a description, so that I know what the photos show without hearing them repeated.
11. As a screen reader user, I want the repeated copies that make the loop hidden from me, so that the row does not read as a long list of duplicates.
12. As a keyboard user, I want the row to hold nothing I can tab to, so that it never traps or slows my progress down the page.
13. As an editor, I want to add an Image Marquee to any page from the Blocks field, so that any page can show a row of photos.
14. As an editor, I want a heading with the Highlight, so that I can colour part of it as the design does.
15. As an editor, I want a simple rich text beside the heading, so that I can write a paragraph or two with bold, italic and links.
16. As an editor, I want to upload or pick the images and set their order, so that the row shows the photos I choose in the order I choose.
17. As an editor, I want each image's title used as its description, so that I describe a photo once, where the asset lives.
18. As an editor, I want two or three images to still fill the row without a gap, so that the Block never looks broken with few photos.
19. As an editor, I want a Block with no images to leave the row out and keep the heading and text, so that a half-finished Block still reads.
20. As an editor, I want a Block with nothing in it to render nothing, so that an empty Block leaves no stray space.
21. As an editor, I want the usual Padding setting, so that I can tighten the Block against its neighbours.
22. As a developer, I want the Crawl built on the existing marquee component, so that the seam, the speed scale and reduced motion are handled once.
23. As a developer, I want the existing Images field reused under its own handle and label, so that the project gains no duplicate field.
24. As a developer, I want the Culture page content seeded by command, so that the page can be rebuilt without the control panel.

## Implementation Decisions

**Entry type.** A new entry type in the Blocks field's General group, handle `marqueeImages`, name "Marquee - Images", following the other marquee entry types: blue, no title, slug or status fields, the grip icon the marquee family shares, the same UI label format. Its Content tab has the Section Header heading followed by the Heading field and the Text field, and the Section Content heading followed by the Image Marquee field. There is no Section Footer. Its Settings tab has the Padding field.

**Fields.** No new fields. The Heading field is the shared CKEditor heading, so an editor can mark the Highlight. The Text field is Rich Text - Simple with the layout handle `text` and label "Text", exactly as the Eyebrow, Heading & Text Block attaches it. The Image Marquee field is the existing Images assets field, uploading to and restricted to the Images volume with no minimum or maximum, attached with the layout handle `imageMarquee`, the label "Image Marquee" and the instructions "The photos that Crawl across the row, in this order. Each photo's title is read out as its description."

**Block template.** A Twig partial named for the entry type, following the block scaffold and the other marquee blocks: block defaults with Padding defaulting to Top & Bottom, the section embedded with no horizontal padding because the header manages its own site margin and the row runs full bleed. It renders nothing when the heading, the text and the images are all empty.

**Header.** A 12-column grid inside the site margins with the 20px column gap. The heading spans columns 1 to 8 and the text columns 10 to 12 from `lg`, both on the first row so their tops align. Below `lg` the grid is one column and the text sits 30px beneath the heading, as in the Eyebrow, Heading & Text Block. The heading is an `h2` through the heading component with the Highlight in primary: 4xl at mobile, 6xl from `md` and 8xl from `lg`, semibold, leading 0.97, tracking tighter, black. The text is the rich text component in black at base size. A missing heading or text drops that column; the header is not rendered when both are missing.

**Row.** One marquee component instance, full viewport width, Crawling leftwards at 0.4 on the component's scale, 40px a second, the constant every Crawl uses. No pause on hover and no pause on focus: the Tiles are not interactive. The component's own gap is off; each Tile carries a 20px trailing space so the seam between the component's two tracks reads as one more gap. The images are repeated in Twig to at least four Tiles per copy before the component doubles the track, so one copy outruns the widest viewport and a single image still loops without a gap. Header to row is 40px at mobile and 50px from `lg`, measured from the taller of the two header columns. The row starts flush with the viewport's left edge; the design's first Tile at the 40px margin is not matched, since the Crawl moves it on within a second.

**Tile.** A rounded Tile of 20px corners, cropped to the 5x4 transform, the common ratio nearest the design's 750 by 597. Width is 300px at mobile, 460px from `md`, 600px from `lg` and 750px from `3xl`, height following the ratio, the gap 20px at every width. The picture component renders it with sizes matching that ramp. No caption, overlay, link, hover or cursor change.

**Accessibility.** The marquee component's accessible-copy flag is on, so its second track is hidden. Within the first track the first set of Tiles is a list with one item per image, each image's alt left to the picture component's default, the asset's title. Every repeated set after it is hidden from assistive tech. Nothing in the row is focusable. The first set in the first track loads eagerly; every repeat loads lazily.

**Empty states.** No images: the row is not rendered and the header keeps its place. No heading or no text: that column is not rendered. Nothing at all: the Block renders nothing, section included.

**Responsive summary.** Mobile: one-column header with the text 30px beneath a 4xl heading, 40px to the row, 300px Tiles. `md`: 6xl heading, 460px Tiles. `lg`: heading in columns 1 to 8 at 8xl, text in columns 10 to 12, 50px to the row, 600px Tiles. `3xl`: 750px Tiles, the Figma frame.

**Culture page content.** One Seed in the Block's seed folder adds the Image Marquee to the Culture page with the heading "We’re simultaneously remote <em>and (occasionally) together</em>", the text as the design's two paragraphs, Top & Bottom padding, and four images in the design's order: `colleague-typing-on-laptop.jpg`, `colleague-smiling-at-desk.jpg`, `colleague-laughing-in-meeting.jpg` and `colleagues-chatting-over-coffee.jpg`. The filenames are chosen because Craft derives each asset's title, and so its alt text, from them. The images are the design's four photos at 1500 by 1194, exported from the two in-frame Tiles at 2x and cropped from the originals for the two clipped Tiles using the design's own crop offsets. The design's "We try our best make every gathering" is seeded as "We try our best to make every gathering". The Seed is rerun-safe on the heading text as the Content Seeding spec describes.

**Docs.** `CONTEXT.md` gains the Image Marquee section and the widened Crawl, done during the grilling. No ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Culture page through the global layout, with the Block seeded as its only Block. Because the page has no Hero yet, captures scroll the Block clear of the fixed Header rather than capturing from the top.

**What good evidence looks like.** It shows what a visitor would see: the heading and text laid out as the design lays them out, the row of Tiles running off both screen edges, the row caught mid-Crawl, a continuous seam, the stacked header on a phone, and the still row under reduced motion. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is the Culture page on `main` at the commit the branch forked from, which shows the Header and the Footer alone. Numeric checks such as Tile sizes and gaps are reported as a table in the PR body, not captured as dumps.

**Evidence plan.**

1. Culture page at 1600, viewport, the Block scrolled clear of the Header: heading in columns 1 to 8 with the Highlight in primary, text in columns 10 to 12 top aligned with it, 750px Tiles with 20px gaps and 20px corners running off both edges, 50px from the text to the row. Compared against the Figma node. Proves the resting layout.
2. Culture page at 1600, two viewport captures one second apart: the row moved left between them. Proves the Crawl and its direction.
3. Culture page at 1600, viewport, the seam of the row where one copy meets the next: continuous Tiles with one gap. Proves the seamless loop.
4. Culture page at 768, viewport: 460px Tiles and the heading at 6xl, the text stacked beneath it. Proves the `md` step.
5. Culture page at 390, full page: 300px Tiles, heading at 4xl, the text 30px beneath it, 40px to the row. Proves the mobile layout.
6. Culture page at 1600 with `prefers-reduced-motion: reduce` emulated, two captures one second apart: identical rows. Proves the still row.
7. Accessibility tree at 1600 from an agent-browser snapshot: one list of four images, each named by its title, and no repeats. Saved as text. Proves the repeats are hidden and the titles are the alt text.
8. Seed command output for the Culture page Seed, run twice: the Block created and four images uploaded on the first run, the Block skipped and the images reused on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- Pausing the Crawl on hover or focus. The Tiles are decoration with a description, not controls.
- Editor control of the Crawl's speed or direction.
- Captions, links, a lightbox or any click behaviour on a Tile.
- Starting the row with its first Tile at the site margin, as the design's frame shows.
- A separate alt text field. The asset's title is the description.
- Drag or swipe control of the row.
- A Hero for the Culture page, or clearing the fixed Header for a page without one.
- A styleguide preview for the Block. Blocks are not previewed there.
- Committing the Seed or the images.

## Further Notes

- Figma at 1600: heading at x 40, 1007 wide, 70px semibold, leading 0.97, tracking -2.8px, the Highlight #745CF6, the theme's `primary`; text at x 1195, 365 wide, 16px regular, leading 1.33, two paragraphs with one blank line between, top aligned with the heading; the heading is eight grid columns of twelve and the text three, starting at column ten.
- Tiles in Figma: 750 by 597 with 20px corners, 20px apart, top 214px below the header's top, which is 50px below the text's bottom and 99px below the heading's bottom; the four in view at x -730 clipped, 40, 810 and 1580 clipped.
- Two of the design's Tiles crop portrait or wider originals inside the Tile rather than centring them, which a 5x4 centre crop of the raw file would not match; the seeded images are already cropped as the design crops them, so the transform leaves them as drawn.
- The design stacks a placeholder fill beneath some photos; only the top photo is used.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
