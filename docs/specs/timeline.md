# Timeline

Spec for the Timeline Block: a black panel inside the site margins holding a fixed Eyebrow with a Rule over a Swiper row of Milestones, one Slide per Milestone the editor adds. Each Slide is the Milestone's Year over a large heading with the Highlight, a short text, and the "Previous" and "Next" pills, with its Milestone Tiles overlapping each other on the right of the panel. Along the panel's bottom the Year Row lists every Year as a Year Mark on a thin track, the active one white with the Year Dash after it, and a click on any Year Mark slides to its Milestone. It is the fourth Block built on the Swiper carousel component after the Case Study, Blog and Team Carousels, the first with a nested Matrix of Slides rather than picked entries, the first to jump to a Slide by index, and the first Block on the About Us page.

Design: Figma node `9927-15500` in the Marketing Signals file, 1600 wide: a group over the About page frame holding a 1520 by 820 black panel with 20px corners at x 40, drawn once with 2006's Year, heading, text and pills, three tilted tiles, and six Year Marks along the bottom, with the Logo Carousel beneath it that this spec does not cover. Only 2006 has content; 2012, 2016, 2018, 2021 and 2025 are labels only. No tablet frame and no mobile frame exist, so the other Milestones, the size ramp, the responsive rules and the one, two and no-tile states below are decisions, not measurements.

Branch: feature/timeline

Related: the Carousel - Featured Team spec, whose black panel, fixed Eyebrow with a white/30 Rule, Swiper configuration, loop rule and media-first order below the desktop breakpoint this Block copies; the Carousel - Case Study spec, which brought the Swiper carousel component up to standard and whose Carousel Controls in the pill style this Block uses unchanged; the Elements - Testimonial spec, whose fixed Slots the Tile Slots follow; the Hero Full Screen spec, which put the About Us page's Hero in place by Seed; the Content Seeding spec, whose nested Matrix seeding puts the Milestones on the page. ADR-0001 does not apply: the Block is in flow beneath the Hero. ADR-0002 applies: the About Us content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Timeline" section, which gained Timeline, Milestone, Year, Milestone Tiles, Tile Slot, Year Row, Year Mark and Year Dash during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The About Us page tells the agency's story year by year: "Our Journey So Far" over a year, a headline for what happened that year, a paragraph, photographs from the time, and a row of years along the bottom to jump between them. Today the page has its Hero and nothing beneath it. No Block holds a list of years with content of their own: the carousel Blocks slide through picked entries from a section, and no section for company history exists or should. The Swiper carousel component pages with Previous and Next but cannot jump to a Slide, and nothing renders a row of labels that names every Slide and moves to the one clicked.

## Solution

A Timeline Block editors add to any page's Blocks. It takes an Eyebrow and a list of Milestones, each with a Year, a heading, a text and up to three images, plus the Padding setting. The Block renders a black panel inside the site margins with the Eyebrow and its Rule fixed at the top, and one Slide per Milestone beneath: on a desktop the Year, the heading at 62px with its Highlight in secondary, the text and the pills fill the first five columns, centred vertically, while the Milestone Tiles overlap each other across the right six columns, each image in the next Tile Slot. The Year Row runs along the panel's bottom with every Year as a button; the active one is white with a fluro Year Dash after it, the rest creme 500. Previous and Next page the Slides and loop, a click on a Year Mark jumps to that Milestone, and the Year Row follows. Below the desktop breakpoint the Tiles sit between the Eyebrow and the Year, the text is one column, and the Year Row scrolls sideways to keep the active Year Mark in view. The About Us page gets six Milestones by Seed so the Block can be reviewed against Figma.

## User Stories

1. As an editor, I want a Timeline in the Blocks menu, so that I can tell the agency's story year by year on the About Us page.
2. As an editor, I want to add it to any page, so that the Block is not tied to About Us.
3. As an editor, I want an Eyebrow on the Block, so that the panel is labelled "Our Journey So Far".
4. As an editor, I want to add Milestones inside the Block and order them by dragging, so that the years read in the order I choose.
5. As an editor, I want each Milestone to have a Year, so that the visitor knows when it happened.
6. As an editor, I want each Milestone's heading to take italic words as the Highlight, so that the key phrase shows in the accent colour.
7. As an editor, I want each Milestone to have a short text, so that I can say what happened.
8. As an editor, I want to add up to three images to a Milestone, so that the year has photographs beside it.
9. As an editor, I want the control panel to stop me adding a fourth image, so that the layout never has more tiles than it has Slots.
10. As an editor, I want a Milestone with one or two images to still look designed, so that I am not forced to find three.
11. As an editor, I want a Milestone with no images to render its text alone, so that a year without photographs is still a year.
12. As an editor, I want Year and heading to be required, so that a Milestone can never show as a blank Year Mark.
13. As an editor, I want the Padding setting, so that the Block spaces itself like every other Block.
14. As a visitor, I want the first Milestone showing when the page loads, so that the story starts at the start.
15. As a visitor, I want Previous and Next pills, so that I can step through the years.
16. As a visitor, I want Next from the last year to return to the first and Previous from the first to go to the last, so that I can loop through the story.
17. As a visitor, I want to see every year along the bottom, so that I know how long the story is and where I am.
18. As a visitor, I want the current year to stand out in the Year Row, so that I can see which Milestone is showing.
19. As a visitor, I want a fluro dash after the current year, so that the Year Row reads as a timeline and not a list.
20. As a visitor, I want to click any year and land on its Milestone, so that I can jump straight to the year I care about.
21. As a visitor, I want the Slide to move sideways when I page or jump, so that the change reads as movement through time.
22. As a visitor, I want to drag the Slide on a touch screen, so that the carousel works the way carousels do on my phone.
23. As a visitor, I want the Year Row to keep the current year in view on my phone, so that six years fit a narrow screen without losing my place.
24. As a visitor, I want the photographs tilted and overlapping, so that the panel feels like a pinboard rather than a grid.
25. As a visitor, I want the panel to keep one height while the Slides change, so that the page does not jump under me.
26. As a visitor on a phone, I want the photographs above the text, so that I see the year's images before I read about it.
27. As a visitor who prefers reduced motion, I want the Slides to change without sliding and the Year Dash to move without a transition, so that the Block respects my setting.
28. As a keyboard user, I want to reach Previous, Next and every Year Mark with Tab and press them with Enter or Space, so that I can move through the years without a pointer.
29. As a screen reader user, I want the carousel announced as a region and each Milestone as a group, so that I know where I am.
30. As a screen reader user, I want the active Year Mark marked as current and every Year Mark labelled with its year, so that the Year Row makes sense read aloud.
31. As a screen reader user, I want the tiles to carry no alt text, so that decorative photographs are not read out.
32. As a developer, I want the Block built on the existing carousel component and Carousel Controls, so that four carousels share one set of behaviour.
33. As a developer, I want the Controls inside every Slide to page the same row, so that the pair beneath the text always works whichever Milestone is showing.
34. As a developer, I want the carousel component to expose a way to jump to a Slide, so that the Year Row and any future labelled carousel can use it.
35. As a developer, I want the Year Row to be a reusable component, so that a later carousel with named Slides does not rebuild it.
36. As a developer, I want the Tile Slots fixed in one place, so that the arrangement is changed by editing three numbers.
37. As a reviewer, I want the About Us page seeded with six Milestones with the node's copy and images, so that I can compare the page with the node at the same width.
38. As a reviewer, I want the seeded Milestones to vary between three, two, one and no images, so that every tile state is on one page.
39. As an agent following the Block workflow, I want the Seed and its images under the scratch folder, so that nothing about review content is committed.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `timeline`, name "Timeline", no title field, added to the Blocks field in alphabetical place. Its Content tab follows the three-slot layout with the two slots it uses: a Section Header heading element, then the Eyebrow field; a Section Content heading element, then the new Timeline field with the instructions "One Milestone per year, in order. A Milestone without a Year or a heading is skipped." There is no Section Footer. Its Settings tab has the Padding field.

**Milestone entry type.** A second new entry type, handle `milestone`, name "Milestone", no title field, used only inside the Timeline field. Its Content tab: the plain Text field as an instance with the handle `year` and the label "Year", required, with the instructions "The year shown above the heading and in the Year Row, such as 2006."; the Heading field, required, with the instructions "Italic words show in the accent colour."; Rich Text - Simple as an instance with the handle `text` and the label "Text", as the accordion item already does; and the new Images (Max 3) field. The Block reads Milestones in the editor's order.

**Fields.** Two created. A Matrix field, name "Timeline", handle `timeline`, holding the Milestone entry type only, create button "New Milestone", minimum one, no maximum, blocks view, following Image Columns (Max 2). An Assets field, name "Images (Max 3)", handle `imagesMax3`, a copy of the Images field with the maximum set to three and no minimum, Images volume only, uploads allowed. Eyebrow, Text, Heading, Rich Text - Simple and Padding are reused unchanged.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding as vertical padding and no horizontal padding, and a margin wrapper carrying the site margin as the Team Carousel does. It reads the Milestones in order and keeps those whose Year and heading have text once tags are stripped; those are the Slides. It renders when at least one Slide exists, and nothing at all otherwise, section included. It has no Alpine data of its own: the carousel component owns the row, the active index and the jump.

**Panel.** One relative panel inside the margin wrapper: black, 20px corners, overflow hidden, 40px padding on every side, matching the node. The Eyebrow sits above the carousel, outside it, so it holds still while the Slides move: the eyebrow component in white with the Rule in white/30, not rendered when empty. Beneath it the carousel component is embedded with the Slides as its items, a `ul` with `li` Slides, and the Year Row in the after-content slot. The Controls sit inside each Slide's text column, since the node draws them beneath the text and not at the panel's edge. Refs cannot do that, since Alpine keeps one ref per name and six Slides would leave only the last pair bound, so the Controls are bound by class instead, as described under Carousel Controls.

**Slide.** From `lg` each Slide is a twelve-column grid with the site gap: the text column in the first five columns, self-centred vertically as the node's equal 246px above and below its content shows; the tiles area in columns seven to twelve, column six left empty as the node's gap is. Below `lg` it is a single column in DOM order: the tiles area, then 30px, then the text column at full width. Swiper's slides stretch to the row's height, so every Slide is as tall as the tallest and the panel keeps one height while the row moves. From `lg` the tiles area gives the Slide its height whether or not the Milestone has images, so the panel stays the same height on a Milestone with none; a text column taller than the tiles area grows the Slide instead.

**Text column.** The Year in 16px medium white, the eyebrow component's text style without the Rule. 30px below it the heading through the headingAlternate component in white at `7xl` from `lg`, `5xl` from `md` and `4xl` below, with the alternate style `secondary` so italic words render in secondary as the node's "Manual Link Building" does; the `h3` tag, since the page's Hero carries the `h1` and an editor may put a Heading Block before this one. 30px below it the text through the rich text component in the `creme-100` colour at the `md` size, which is the node's 18px regular at leading 1.33. 30px below it the Carousel Controls in the pill style with the `white-30-outline` colour pair, which is the node's white/30 outline "Previous" and secondary "Next" 10px apart, left-aligned. A Milestone without a text drops the text and the pills move up. The Controls are rendered only when there are two or more Slides.

**Milestone Tiles.** The tiles area is a relative box at the node's proportion, 736 by 668 rounded to an aspect of 11:10, filling its six columns from `lg` and the full width below. Each image takes the next Tile Slot in order, absolutely placed inside the area as percentages of it and rotated about its centre, with 30px corners, overflow hidden and the picture component at the `1x1` transform, the ratio off, the focal point honoured, an empty alt, and a `sizes` hint of half the viewport from `lg` and the full viewport below. The three Slots, from the node:

| Slot | Left  | Top | Width | Height | Tilt | Stacking |
| ---- | ----- | --- | ----- | ------ | ---- | -------- |
| 1    | 0%    | 0%  | 58%   | 62%    | +2°  | bottom   |
| 2    | 32%   | 25% | 68%   | 75%    | −4°  | middle   |
| 3    | 12.5% | 52% | 30%   | 34%    | +1°  | top      |

One image fills Slot 1 alone; two fill Slots 1 and 2; three fill all. The Slots live in one options map in the Block template, so the arrangement is three rows of numbers. A Milestone with no images renders the area empty from `lg`, keeping the Slide's height, and does not render it below `lg`, so the text follows the Eyebrow directly. The node's third tile is a fluro square carrying the Marketing Signals mark; it is an image like any other, seeded as a JPG, and the Block draws no brand tile of its own.

**Year Row.** A new component, `carouselYearRow`, rendered in the carousel's after-content slot, taking a list of labels and reading the carousel's `activeIndex`. It renders an `ol` with one `li` per label, centred in the panel, 40px below the Slides, with a 1px white/30 track running behind the row from the first label's left edge to the last label's right edge. Each Year Mark is a `button` with the label as its text in 16px medium, 10px of horizontal padding and the panel's black behind it so the track stops at the text, white when its index is the active one and creme 500 otherwise, with a motion-safe colour transition; `aria-current="true"` on the active one and an `aria-label` of "Go to " and the year on every one. A click calls the carousel's `slideTo` with the mark's index. From `lg` the marks are 130px apart edge to edge, which puts the six node labels about 183px apart centre to centre as drawn; below `lg` they are 60px apart and the `ol` scrolls sideways with its scrollbar hidden, and on every change the component sets the row's own scroll offset so the active mark is in view, never scrolling the page. The Year Dash is a 108px fluro segment over the track immediately after each Year Mark but the last, at full opacity when that mark is active and transparent otherwise, with a motion-safe opacity transition, so it appears to move to the new active mark. Under reduced motion both transitions drop out.

**Carousel Controls.** The controls component gains a `bind` option with two values: `ref`, the default, which emits today's `prev` and `next` refs unchanged; and `class`, which emits a `js-carousel-prev` or `js-carousel-next` class on each button instead of a ref. The Block includes the Controls in every Slide with `bind` set to `class`, so six pairs render and none claims a ref.

**Carousel component.** Gains two things. First, `slideTo(index)`, which calls Swiper's loop-aware slide-to with the component's configured speed, so it works whether the row loops or not; to support it the component keeps the Swiper instance on its Alpine data. Second, navigation binding by class: when the `prev` and `next` refs are absent the component collects every `js-carousel-prev` and `js-carousel-next` element inside its own root and passes the two lists to Swiper's navigation, which accepts arrays of elements, so every Slide's pair pages the same row and every pair takes Swiper's disabled state together. Refs, when present, win as before, so the Case Study, Blog and Team Carousels are untouched. `activeIndex` already tracks the real index through loops, and the Year Row reads it as the Slide Progress does.

**Swiper configuration.** From the Block: one Slide per view at every width, no gap between Slides, 600ms changes with the component's `smooth` ease, dragging on, looping on when there are two or more Slides, click prevention on so a drag never fires a Year Mark, and the accessibility module on with the row a region and each Slide a group. Under reduced motion the change speed is zero, so the row still pages and jumps but never slides. Before the script runs Swiper's served layout stands: the first Slide in place, the rest clipped by the panel, the Controls and Year Row visible but inert.

**Keyboard.** Previous and Next are buttons inside each Slide, so the visible Slide's pair takes focus in reading order, and Swiper's accessibility module slides a Slide into place when one of its buttons receives focus. The Year Marks are buttons after the row and take focus in order. No focus handling is written in the Block.

**Accessibility.** The carousel is a region with each Slide a group. The Year in the text column is a plain `div`, since the Year Row already names every year as a button. The heading is an `h3` with the Highlight as styled emphasis. Tiles have an empty alt. The Year Row's `ol` carries `aria-label="Years"`.

**Empty states.** A Milestone without a Year or a heading is not a Slide. No Slides: nothing renders. One Slide: one static panel, no Controls, no loop, one Year Mark with no Year Dash. Two Slides: the row loops. No text: the pills follow the heading. No images: the tiles area is empty from `lg` and absent below it. No Eyebrow: the Eyebrow row is not rendered and the carousel starts at the panel's padding.

**Responsive summary.** Below `lg`: the Eyebrow, then each Slide as one column with the tiles area at 11:10 above the Year, the heading at 40px then 46px from `md`, the text, the pills, and the Year Row scrolling sideways. From `lg`: the Eyebrow, each Slide the twelve-column grid with the text column five wide and centred, the heading at 62px, the tiles area six wide, and the Year Row centred with the marks 130px apart. The `md` rule is the heading's size, so a tablet capture is planned.

**About Us page content.** One Timeline Block appended after the About Us page's Blocks, of which it has none today, Eyebrow "Our Journey So Far", padding Top and Bottom set explicitly. Six Milestones in this order, each with the heading "Manual Link Building Was Launched" with "Manual Link Building" italic as the Highlight and the node's paragraph as the text: 2006 with three images, 2012 with two, 2016 with one, 2018 with none, 2021 with three, 2025 with three. The images are the node's office photograph and portrait, exported from its fills, and the fluro brand tile rendered from the node's mark as an 800px JPG; all three sit beside the Seed in the scratch folder already. The Block arrives by the Seed command from a Seed targeting the `about-us` slug with the Milestones written as nested Blocks. The Seed is not committed.

**Docs.** `CONTEXT.md` gained the Timeline vocabulary during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots of the DDEV site captured per the evidence doc, before and after pairs on the PR.

**Seams.** The primary seam is the rendered About Us page through the global layout with the seeded Timeline. It is the only caller of the Year Row component and of the carousel's `slideTo`, so both are proven through it; the Home page's Case Study Carousel proves the carousel component still pages without a Year Row. The secondary seam is the Seed command's own output, which proves the nested Matrix and the new Assets field seed cleanly. Nothing is committed to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the black panel with the Eyebrow fixed, the Year over the two-line heading with its first line in secondary, the text and the pills, three tilted tiles on the right, the Year Row with 2006 white and the fluro dash after it; then the row moved by Next, by a Year Mark, and looped by Previous; the one, two and no-tile Milestones; the phone layout with the Year Row scrolled; and the reduced motion and keyboard states. Fixed widths, one state per file, before and after pairs on the PR. The before for the About Us page is `main` at the commit the branch forked from, with the Hero and no Blocks.

**Evidence plan.**

1. About Us page at 1600, full page, at rest: the panel 1520 wide with 20px corners, the Eyebrow with its white/30 Rule, 2006 over "Manual Link Building" in secondary and "Was Launched" in white at 62px, the text, the white/30 "Previous" and secondary "Next" pills, three tiles tilted +2°, −4° and +1° with 30px corners overlapping as the node's do, the Year Row centred 40px above the panel's bottom with 2006 white, the others creme 500, and the fluro Year Dash after 2006. Compared against the Figma node for sizes, colours, gaps and alignment. Proves the desktop layout.
2. About Us page at 1600, after one click on Next: 2012 showing with two tiles in Slots 1 and 2, 2012 white in the Year Row and the Year Dash after it, 2006 creme 500. Proves paging, the two-tile state and the Year Row following.
3. About Us page at 1600, after a click on the 2018 Year Mark: 2018 showing with no tiles, the panel the same height as in line 1, 2018 white with the Year Dash after it. Proves the jump, the no-tile state and the fixed height.
4. About Us page at 1600, after a click on the 2016 Year Mark: one tile in Slot 1. Proves the one-tile state.
5. About Us page at 1600, at rest then after one click on Previous: 2025 showing, 2025 white with no Year Dash after it. Proves the loop and the last mark's missing dash.
6. About Us page at 1600, pointer over Next: the pill's fine-pointer hover state. Proves the Controls are the existing component.
7. About Us page at 1600, after tabbing to the 2021 Year Mark: the focus ring on it, then after Enter, 2021 showing. Proves keyboard use of the Year Row.
8. About Us page at 390, full page, at rest: the tiles area between the Eyebrow and 2006, the heading at 40px, the text, the pills, and the Year Row with 2006 white and later years cut at the panel's edge. Proves the mobile layout.
9. About Us page at 390, after a click on the 2025 Year Mark: the Year Row scrolled so 2025 is in view and the page's scroll position unchanged. Proves the sideways scroll follows the active mark without moving the page.
10. About Us page at 768, at rest: the heading at 46px. Proves the `md` step of the ramp.
11. About Us page at 1600 with reduced motion emulated, after a click on Next: 2012 showing with the Year Row updated and no transition in flight. Proves the reduced motion path.
12. The Seed's first run: one Timeline Block created with six nested Milestones and three images uploaded; its second run: the Block skipped and the images reused. Saved as text beside the screenshots. Proves the nested Matrix and the new field seed cleanly.

## Out of Scope

- Autoplay or a timed progress fill. The Year Dash is a fixed marker; the carousel moves only when the visitor moves it.
- A Logo Carousel or any Block beneath the Timeline in the node. The group's lower half is another Block's spec.
- A history section or Milestone entries with pages of their own. Milestones live inside the Block.
- Editor control of the Tile Slots, tilts or the arrangement. The Slots are fixed.
- Videos in a Milestone. Images only.
- Links or buttons in a Milestone beyond the Controls.
- A mobile or tablet Figma frame. The responsive rules are decisions recorded above.
- Changes to the Carousel Controls beyond the `bind` option, or to the eyebrow, headingAlternate, rich text or picture components.

## Further Notes

- The Year Row is the first component to name Slides rather than count them. If a later carousel needs marks without a track or a dash, add options to the component rather than a second one.
- The Year Marks are 130px apart from `lg` to match the node's spacing at 1600 with four-character years; a five-character label still fits since the gap is between edges, not centres.
- The Controls are rendered once per Slide because the node draws them in the text column, which is vertically centred at a height that varies by Milestone, so a single pair in the after-content slot could not be positioned to sit beneath every text. Binding by class is the smaller change.
- The tiles area's 11:10 aspect makes the panel about 820px tall at 1600 with the node's copy, matching the node; a Milestone with a longer text grows it.
