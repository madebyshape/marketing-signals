# Marquee - Logos

Spec for the Logo Marquee Block: a Rule Label over one full-bleed Logo Row of Logos the editor uploaded, that Crawls leftwards without pausing. It is the second Block built on the marquee component and the second to render a Logo inline in black, after the Client Marquee, and the first Block seeded onto a Service page.

Design: Figma node `9910-15477` in the Marketing Signals file, a group inside the "Services | Detail" frame, 1600 wide, 115 tall. The node draws the desktop state once with seven logos and no hover; no tablet frame and no mobile frame exist, so the cell ramp and the mobile spacing below are decisions, not measurements.

Branch: feature/marquee-logos

Related: the Marquee - Client spec, whose marquee and picture component changes this Block reuses unchanged and whose cleaned logo SVGs it reuses as test content; the Content Seeding spec, whose command puts the Block on the Service page. ADR-0001 does not apply: the Block is in flow beneath the Service Hero. ADR-0002 applies: the test content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Logo Marquee" section, which gained Logo Marquee and Rule Label during the grilling session; Logo Row, Logo Cell and Crawl were widened to cover a single row that never pauses.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A Service page opens with its Service Hero and then goes straight into the intro text. The design puts a thin line between them with a short claim sitting on it, "We've Helped Dozens Of Great Brands Grow Their Digital Presence Via Search Marketing", and beneath that a single row of client logos drifting past. The Client Marquee exists but it is a heavy, two-row, curated section that needs Client entries, a button and an Avatar Group. Nothing lets an editor drop a light strip of logos onto a page with a sentence over it.

## Solution

A Logo Marquee Block editors can add to any page. It holds a heading and a set of uploaded Logos. The heading renders as a Rule Label: a centred one-line sentence with its second half in a medium weight, sitting on a Creme 300 Rule that runs the full content width behind it. Beneath it one Logo Row runs edge to edge: each Logo centred in a fixed-width Logo Cell, the row Crawling leftwards without stopping and never pausing. Cells are narrower on smaller screens so fewer logos show at once. Every Logo renders inline in the site's black. Under reduced motion the row sits still. The AI-focused SEO Service page gets one instance with the Figma sentence and the seven Figma logos, added through the Seed command.

## User Stories

1. As a visitor, I want a short sentence on a thin line above the logos, so that I know what the row of brands is telling me.
2. As a visitor, I want the second half of the sentence in a heavier weight, so that the claim reads the way the design does.
3. As a visitor, I want the line to run the full content width behind the sentence with a gap either side of the words, so that the sentence reads as sitting on the line rather than under it.
4. As a visitor, I want a row of logos that never stops moving leftwards, so that the section feels alive without my doing anything.
5. As a visitor, I want the row to run edge to edge and loop without a visible seam, so that I never see a gap or a jump.
6. As a visitor, I want the row to keep moving when my pointer is over it, so that decoration never reacts as if it were a control.
7. As a visitor, I want every logo in the same black, so that seven different brands read as one row.
8. As a visitor, I want each logo at its natural size, centred in its space, so that the row matches the design's rhythm.
9. As a visitor with a phone, I want narrower spaces so that two or three logos show at once rather than a single one.
10. As a visitor with a tablet, I want about four logos across, so that the row reads as a row on a mid-size screen.
11. As a visitor on a wide screen, I want six logos across at 1600, so that the row matches the design.
12. As a visitor who prefers reduced motion, I want the row to sit still, so that nothing moves without my say.
13. As a screen reader user, I want the logos named once, so that the repeated cells add nothing to the reading.
14. As a screen reader user, I want the moving row to be nothing more than that list, so that I am not read seven logos several times over.
15. As a visitor, I want a logo that is uploaded far too large to shrink to fit its space, so that one bad file cannot break the row.
16. As an editor, I want a Logo Marquee Block in the Blocks menu, so that I can add it to any page.
17. As an editor, I want a heading field, so that I can write the sentence myself.
18. As an editor, I want bolding part of the heading to make it medium weight, so that I can pick out the second half the way the design does.
19. As an editor, I want an images field called Logos, so that I can upload or pick SVG logos directly without creating Client entries.
20. As an editor, I want to order the Logos, so that the row shows them in the order I choose.
21. As an editor, I want a row with only a few Logos to still fill the screen, so that I never see an empty stretch.
22. As an editor, I want an empty heading to drop the Rule Label entirely, line included, so that a heading-less Block is just the row.
23. As an editor, I want a Block with no Logos to render nothing, so that a half-finished Block never shows an empty section.
24. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
25. As an editor, I want the AI-focused SEO Service page to already carry this Block with the designed content, so that I see how it is meant to look.
26. As a developer, I want the Block to reuse the Heading, Images and Padding fields, so that no new field is created.
27. As a developer, I want the Block to use the marquee component and the picture component's inline SVG as they are, so that the Client Marquee's work is reused and nothing in either component changes.
28. As a developer, I want the Crawl speed held in one place in the Block, so that it can be tuned without touching the component.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `marqueeLogos`, name "Marquee - Logos", colour blue, icon `grip` to sit beside the Client Marquee, added to the Blocks field in the General group. Its Content tab follows the slot layout: a Section Header heading element with the Heading field; a Section Content heading element with the Images field under the instance handle `logos` and the label "Logos", with the instructions "SVG logos in the order they should Crawl past. Each renders in black." Its Settings tab has the Padding field. No title, slug or status fields. No field is required and no minimum is set: the Images field is shared and the template handles a short list.

**Fields.** No new fields. The Heading field is the site's CKEditor heading with bold, italic and link; the Images field is the existing Assets field reused with the handle `logos`; the Padding field is the standard one.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding and no horizontal padding, and its content inside the section's content block. The Rule Label is wrapped in the site margins; the Logo Row is not. The Block renders only Logos whose asset is an SVG; a Block with no renderable Logo renders nothing at all, section included.

**Rule Label.** Built inline in the Block, not as a component; it becomes a component when a second Block needs it. A relative wrapper inside the site margins draws the Rule as a 1px Creme 300 line across its full width at its vertical centre. The heading sits centred over it, rendered through the site's heading component as a paragraph-level element, not an `h2`, at the base size, regular weight, leading 1.33, in black, with a Creme 100 background and 15px of horizontal padding so it masks the line either side of the words. A `<strong>` inside the heading renders at medium weight, no heavier; an `<em>` keeps the Highlight in the primary colour. On narrow screens the sentence wraps to as many lines as it needs and the line stays at the vertical centre of the wrapped text. An empty heading drops the Rule Label, line included.

**Logo Row.** One marquee component with the Alpine component name derived from the Block handle, the `none` gap, reversed off, pause on hover off, and the Crawl speed from one constant in the Block, 0.4 on the component's scale, the same as the Client Marquee. The Logos are repeated in listed order until the row holds at least eight Logo Cells, so a copy of the row is at least 2136px wide at the desktop cell width and the widest supported viewport never shows a gap; the component then doubles the row for the loop. The row sits 40px beneath the Rule Label at mobile and 76px from `lg`, the measured gap at 1600. Under reduced motion the component leaves the row still with the first cells showing.

**Logo Cell.** A fixed-width space with the Logo centred in it, no border, no hover state and no cursor change. The cell is 160px wide at mobile, 200px from `md` and 267px from `lg`, so about two and a half logos show at 390, about four at 768 and six at 1600. The cell's height is the row's height, 40px, so every cell shares one baseline whatever the Logo's height.

**Logo.** Rendered inline through the picture component's inline SVG flag, so the exported SVG's own width and height set its size and the fills take the cell's black text colour. A safety cap of 60% of the cell's width and 40px of height, with the aspect ratio kept, stops an oversized upload breaking the row. A Logo that is not an SVG is left out of the row rather than rendered as a bitmap in the wrong colour.

**Accessibility.** The Logo Row is hidden from assistive technology, since every cell repeats and the row is copied for the loop. A visually hidden list of the renderable Logos' asset titles sits before the row, so a screen reader hears each brand once. Inline logos carry no alt of their own. Nothing in the row takes focus.

**Marquee and picture components.** No change to either. The marquee component already runs the horizontal GSAP loop inside a reduced-motion guard with the `none` gap and refs; the picture component already inlines an SVG with its fills set to currentColor.

**Service page content.** One Seed targeting the AI-focused SEO Service entry by its slug, adding a Logo Marquee Block to its Blocks with padding Top and Bottom, the heading "We've Helped Dozens Of Great Brands <strong>Grow Their Digital Presence Via Search Marketing</strong>", and seven Logos in Figma order: Tree Center, Ultimate Performance, Ray-Ban, Better Bathrooms, Marriott, Missguided, GXO. Six are the Client Marquee's cleaned SVGs, already in the volume and reused by filename; Missguided is exported from the Figma node, its Figma export attributes stripped and its fill set to currentColor. The Seed and the Missguided file are in the Seed folder under the scratch folder and are not committed.

**Docs.** `CONTEXT.md` gained the Logo Marquee vocabulary during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Service page through the global layout, with the Block seeded beneath the Service Hero. The marquee and picture components are unchanged, so no styleguide preview changes. The Seed command's output proves the seeding.

**What good evidence looks like.** It shows what a visitor would see: the sentence on its line with the weight change, the row of black logos at their natural sizes, the row caught mid-Crawl, the narrower cells on a phone and the still row under reduced motion. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is the Service page on `main` at the commit the branch forked from. Numeric checks such as cell widths are reported as a table in the PR body, not captured as dumps.

**Evidence plan.**

1. Service page at 1600, viewport, the Block in view: the Rule Label centred on its Creme 300 line with the second half in medium weight, six 267px cells across, each logo black at its natural size. Compared against the Figma node. Proves the resting layout.
2. Service page at 1600, two captures one second apart: the row moved left between them. Proves the Crawl and its direction.
3. Service page at 1600, viewport, the pointer held over the row: the row still moving, no cell changed. Proves no pause and no hover state.
4. Service page at 1600, viewport, the seam of the row where one copy meets the next: continuous cells with no gap. Proves the seamless loop.
5. Service page at 768, viewport: 200px cells, about four logos across. Proves the `md` step.
6. Service page at 390, full page: 160px cells, the sentence wrapped with the line at its centre. Proves the mobile layout.
7. Service page at 1600 with `prefers-reduced-motion: reduce` emulated, two captures one second apart: identical rows. Proves the still row.
8. Seed command output for the Service Seed, run twice: created with one upload and six reuses on the first run, skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- Linking a Logo Cell to anything. The row is decoration.
- Any hover, tap or pause state. The Client Marquee has those; this Block does not.
- A second row, opposite directions or a stagger. One row, leftwards.
- Editor control of speed, direction or cell width. The Block decides them.
- Bitmap logos. Only SVGs render, so every logo takes the same black.
- A Rule Label component. It is inline until a second Block needs it.
- Committing the Seed or the Missguided logo.

## Further Notes

- Figma at 1600: the Rule at 975 is 1520 wide inside the 40px site margins, Creme 300, 1px. The label frame is 11px tall centred on the line, with 15px horizontal padding on a Creme 100 fill. Logo tops sit between 1051 and 1062, so the row's top is 76px below the Rule. Logo column pitch is about 267px, with Tree Center starting 34px left of the frame and GXO running 33px past its right edge.
- The design places the group 75px below the hero and 130px above the intro text. Both gaps belong to the neighbours' padding; the Block takes the standard Padding field like every other Block.
- The seven Figma logos: Tree Center 69 by 33, Ultimate Performance 94 by 19, Ray-Ban 68 by 34, Better Bathrooms 79 by 24, Marriott 70 by 34, Missguided 94 by 12, GXO 64 by 22. All brand black.
- The marquee component's speed of 1 is 100px a second, so 0.4 is 40px a second, the same as the Client Marquee.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
