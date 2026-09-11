# Grid - Blog

Spec for the Blog Grid Block: an Eyebrow with its Rule over a heading with the Highlight beside a short text, over a grid of Blog Large Cards, two to a row from the desktop breakpoint and one below it, one per Blog the editor picked, in the order picked. Every card is a Linked Card to its Blog with Zoom on hover. It is the second Block built from the Blog Large Card, the first Block that shows only what the editor picked with no fallback, and the first Block reviewed on the Culture page.

Design: Figma node `9962-15534` in the Marketing Signals file, 1600 wide, a group named "Group 46374" holding the Eyebrow "Insights" over its Rule, the heading "Our move to a four day *week has people talking*", two paragraphs of text on the right, and two "Blog / Exterior / 6 Col / Featured" cards at 750 by 668, 20px apart. Both cards show the same Blog with different photographs. No hover frame, no tablet frame and no mobile frame exist, so the responsive rules are decisions, not measurements.

Branch: feature/blog-grid

Related: the Carousel - Blog spec, which built the Blog Large Card, the blog meta row, the `secondary-outline` pill, the Zoom, the `2x1` transform and the Entries - Blog field that this Block reuses unchanged; the Eyebrow, Heading & Text spec, whose Eyebrow, heading and text row this Block's header follows and whose way of attaching the simple rich-text field as `text` it copies; the Content Seeding spec, which puts the review content on the Culture page. ADR-0001 applies to the review page only: the Culture page has no Hero, so the Seed adds a Hero Simple above the Block. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Blog Grid" section, which gained Blog Grid during the grilling session, and the Blog Large Card entry, which now names the Blog Grid as a caller; the Eyebrow, the Rule, the Highlight, the Linked Card, the Zoom and the Block slots are as already defined.

The branch is code-reviewed against this spec before merge.

## Problem Statement

Editors have no way to put a hand-picked set of Blogs on a page as a static grid. The Blog Carousel is the only Blog surface: it moves, it groups Blogs into Sets of one large and two small cards, and when nothing is picked it fills itself with the nine latest Blogs. That suits the Home page's "latest insights" row, but not a page like Culture, where the Blogs are chosen to support one story ("Our move to a four day week has people talking") and the latest articles would be off-topic. The Culture page design calls for an Eyebrow, a heading with a Highlight, a short text beside it, and a plain two-up grid of large Blog cards beneath, and nothing on the site renders that today.

## Solution

A new Block, the Blog Grid, that editors add to any page from the Blocks field. It has an Eyebrow with the Rule under it, a heading with the Highlight on the left, a short rich text on the right, and beneath them a grid of Blog Large Cards, one per Blog the editor picked, in the order they picked them. From the desktop breakpoint the cards sit two to a row; below it they stack one to a row. An odd last card sits alone in the left half of its row. The cards are the same Blog Large Cards as the Blog Carousel: the Thumbnail across the top, the date and read time, the title, the Description and a "Continue Reading" pill, the whole card one link to the Blog, with the Thumbnail zooming on hover. If the editor picks no Blogs, the Block renders nothing; it never fills itself with the latest Blogs.

## User Stories

1. As an editor, I want to add a Blog Grid Block to any page from the Blocks field, so that I can show a chosen set of Blogs wherever a story needs them.
2. As an editor, I want the Block listed as "Grid - Blog" beside "Carousel - Blog", so that I can tell the two Blog Blocks apart at a glance.
3. As an editor, I want to write a short Eyebrow above the heading, so that visitors know what kind of section they are reading.
4. As an editor, I want the Eyebrow underlined by the Rule, so that the section header matches the rest of the site.
5. As an editor, I want to leave the Eyebrow empty, so that the section can start straight with the heading when a label adds nothing.
6. As an editor, I want to write a heading and mark words italic to Highlight them, so that the key phrase stands out in the accent colour.
7. As an editor, I want to leave the heading empty, so that I can use the Block for the cards and text alone.
8. As an editor, I want a rich text field beside the heading, so that I can explain the section in one or two short paragraphs with links and emphasis.
9. As an editor, I want the text field to be the same simple rich-text field used elsewhere, so that I already know how it behaves.
10. As an editor, I want to leave the text empty, so that the heading can stand on its own.
11. As an editor, I want to pick Blogs from the Blog section only, so that I cannot put another kind of entry into the grid by mistake.
12. As an editor, I want the picker's button to read "Add a Blog", so that it says what it does.
13. As an editor, I want the Blogs shown in the order I list them, so that I control which Blog leads.
14. As an editor, I want instructions on the picker saying the order and the two-per-row layout, so that I can predict the result without previewing.
15. As an editor, I want to pick as many Blogs as I like, so that the grid can grow beyond one row when a story needs it.
16. As an editor, I want an odd last Blog to sit alone in the left half, so that a three- or five-Blog pick still looks deliberate.
17. As an editor, I want a Block with no Blogs picked to render nothing, so that an unfinished Block never shows unrelated latest articles under a topical heading.
18. As an editor, I want a disabled Blog left out of the grid, so that unpublishing an article removes it everywhere without editing each page.
19. As an editor, I want to set the Block's vertical padding from its Settings tab, so that it spaces like every other Block.
20. As an editor, I want the fields laid out under the Section Header and Section Content headings, so that the Block reads like every other Block in the control panel.
21. As a visitor on a desktop, I want the heading on the left and the text on the right, level at their bottoms, so that I can read the section header in one glance.
22. As a visitor on a desktop, I want the Blogs two to a row, each half the content width, so that each card is large enough to show its photograph and summary.
23. As a visitor on a phone, I want the heading, the text and the cards stacked in one column, so that nothing is squeezed.
24. As a visitor on a tablet, I want the cards still one to a row, so that the photographs and titles stay readable at that width.
25. As a visitor, I want each card to show the Blog's Thumbnail, date, read time, title and Description, so that I can decide whether to read it.
26. As a visitor, I want the whole card to be one link to the Blog, so that I can click anywhere on it.
27. As a visitor using a mouse, I want the Thumbnail to zoom a little and the pill to light up when I hover a card, so that I know the card is a link.
28. As a visitor who prefers reduced motion, I want the Thumbnail to stay still on hover while the pill still lights up, so that I still get the hover cue without movement.
29. As a keyboard user, I want each card to take focus once, in reading order, so that I can tab through the grid without stopping on the pill.
30. As a screen reader user, I want the cards announced as a list with a count, so that I know how many Blogs the section offers.
31. As a screen reader user, I want the section heading to be a heading above the card titles in the outline, so that I can navigate the page by headings.
32. As a screen reader user, I want the decorative Thumbnails skipped, so that the card is announced by its date, title and summary only.
33. As a developer, I want the Block built from the existing Blog Large Card, eyebrow, alternate heading, rich text and section components, so that there is one card to maintain.
34. As a developer, I want the Block to be static with no Alpine.js, so that it costs nothing on the client.
35. As a developer, I want the Block's handle to follow the shape-first naming of the other Blocks, so that the Blocks sort and read as a family.
36. As a reviewer, I want the Culture page seeded with a Hero and a Blog Grid with the node's content, so that I can compare the Block against Figma on a page that reads normally.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `gridBlog`, name "Grid - Blog", colour blue, icon `grid-2`, added to the Blocks field in the General group beside "Carousel - Blog". A Content tab with a Section Header heading element followed by the Eyebrow field, the Heading field and the Rich Text - Simple field attached with the handle `text` and the label "Text", then a Section Content heading element followed by the Entries - Blog field; a Settings tab with the Padding field. No Section Footer and no Button field, because the node has no button.

**Fields.** No new fields. Eyebrow, Heading, Entries - Blog and Padding are reused as they are. The global Text field is plain text, so the Block attaches Rich Text - Simple under the `text` handle, exactly as Eyebrow, Heading & Text does. On this layout the Entries - Blog field carries the instructions "Blogs show in the order listed, two per row." The field keeps its Blog-only source, list view, "Add a Blog" label and no minimum or maximum.

**Which Blogs.** The Block shows the picked Blogs exactly, enabled ones only, in the field's order. There is no fallback: with no picks, or with every pick disabled, the Block renders nothing at all, section included, whatever its Eyebrow, heading and text hold. There is no cap, no pagination and no Load More.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding on the vertical axis, and its content inside the section's content block within the section's own site margins. No panel: the Block sits on the page background. Inside, top to bottom: the Eyebrow row, the header row, the card grid. No Alpine.js and no JS block.

**Eyebrow row.** The eyebrow component renders the Block's Eyebrow in black with the Rule on in its `creme-300` colour, without an aside. An empty Eyebrow renders no row. From `lg` there is 70px from the Rule to the header row, 30px below `lg`, which is what the node measures (the Rule's bottom at 8996, the heading's cap top at 9066).

**Header row.** From `lg` a twelve-column grid with the section's 20px gap: the heading in columns one to six and the text in columns nine to twelve, the two aligned to the row's bottom so the text's last line sits level with the heading's last line, as the node draws it. Below `lg` they stack, the text 30px beneath the heading. The heading goes through the alternate heading component as an `h2`, colour `base`, the Highlight in its `base` style (primary), semibold with 0.97 leading and tighter tracking. The size ramp is 4xl below `md`, 6xl from `md` and 7xl (62px) from `lg`, the node's size. The text goes through the rich text component in black at the body size, as in Eyebrow, Heading & Text. An empty heading drops the heading and an empty text drops the text; with both empty the row renders nothing and the cards follow the Eyebrow row.

**Card grid.** A list, one item per Blog. One column below `lg`; from `lg` two columns of equal width with a 20px gap across and between rows, so each card is six columns of the twelve. From `lg` there is 60px from the header row to the grid, 30px below `lg`, which is what the node measures (the text's baseline at 9188, the cards' top at 9249). An odd last card sits in the first column with the second cell empty; nothing stretches. When the Eyebrow row and the header row are both absent the grid starts at the top of the section.

**Blog Large Card.** Reused as it is, one per list item, with its default image sizes (47% of the viewport from `lg`, 90% below), which match the grid's two columns and single column. Everything the node draws on the card is already the component: the 2x1 Thumbnail in a 5px inset with 15px corners over a creme-200 card with 20px corners, the meta row with the post date and the literal "5 min read", the 30px title, the Description with its tags stripped, the "Continue Reading" `secondary-outline` pill as a `span`, and the Zoom. The read time stays the component's literal until Blog pages have content to count. The component, the meta row, the pill and the Zoom are not changed by this spec.

**Keyboard.** Each card is one link and takes focus once, in list order. Nothing inside a card is focusable. No focus handling is written.

**Accessibility.** The cards are a list, so assistive technology announces the count. The section heading is an `h2` and each card title the component's `h3`. A card's link is named by its contents; the Thumbnail has an empty alt. Nothing is hidden or duplicated.

**Empty states.** No picks, or only disabled picks: nothing renders. An empty Eyebrow, heading or text drops its element and nothing else. A Blog without a Thumbnail or Description renders as the Blog Large Card already does: a creme-300 placeholder in place of the image, no paragraph in place of the Description.

**Culture page content.** Two Seed files in the scratch folder for this spec, both targeting the Culture page. The first writes to its Hero field: a Hero Simple with the heading "Culture" and one line of text, so the page has its Hero and ADR-0001's top padding clears the Header; it is review content, not part of the Block. The second writes to its Blocks field: one Blog Grid, padding Top and Bottom, Eyebrow "Insights", heading "Our move to a four day *week has people talking*" with the Highlight on the second half, the text as the node's two paragraphs ("Our transition to a four-day work week has sparked conversations and drawn attention in the press and elsewhere." and "Our decision to do it was backed by extensive research and our employees have been seeing the benefits of a more flexible work schedule."), and two of the nine Blogs already seeded for the Blog Carousel picked: "How to pitch a journalist: What an ex-Reach PLC pro really thinks of your pitch" first, then "SEO for Fashion Brands: What Actually Works (and What's Changing)". The node repeats one Blog, so the second pick is a different Blog to prove each card reads its own. No new Blogs and no new images are seeded. Seeds are not committed.

**Styleguide.** No new preview. The Blog Large Card already has one, and the Block has no component of its own.

**Docs.** `CONTEXT.md` gained the Blog Grid during the grilling session and the Blog Large Card entry now names it as a caller. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Culture page at `/culture` through the global layout, with the Hero Simple and the Blog Grid seeded. The Block is the only new code, and everything it composes (the Blog Large Card, the eyebrow, the alternate heading, the rich text) is proven through it. The secondary seams are the Seed command's own output and the control panel's view of the Block's fields.

**What good evidence looks like.** It shows what a visitor would see: the Eyebrow row, the black heading with its purple Highlight, the text level with the heading's last line on the right, the two cards side by side at the designed size with their photographs, dates, titles, Descriptions and pills, the hover Zoom, the single column at tablet and mobile, the odd card on the left, and the empty state. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is the Culture page on `main` at the commit the branch forked from, which renders nothing between the Header and the Footer.

**Prior art.** The Carousel - Blog spec's evidence plan, which proved the same card on the Home page, and the Eyebrow, Heading & Text spec's, which proved the same header row.

**Evidence plan.**

1. Culture page at 1600, full page, scrolled to the Block at rest: the Eyebrow "Insights" over its creme Rule inside 40px margins, 70px down to the heading at 62px across six columns with "week has people talking" in purple, the two paragraphs in columns nine to twelve ending level with the heading's last line, 60px down to two Blog Large Cards 750 wide and 20px apart, each with its 2x1 photograph, meta row, 30px title, Description and pill, compared against the Figma node. Proves the desktop layout.
2. Culture page at 1600, viewport, pointer over the first card: the photograph at 105%, the pill filled lilac, the second card unchanged. Proves the Linked Card hover and Zoom in the grid.
3. Culture page at 1600, viewport, a click on the second card: the "SEO for Fashion Brands" Blog's page at its `/insights/` address. Proves each card links to its own Blog.
4. Culture page at 1024, checked in the browser and reported, not captured: two columns of cards each 472 wide, the heading at 7xl in six columns, the text in columns nine to twelve. Proves the `lg` step.
5. Culture page at 768, full page, the Block at rest: the heading at 6xl, the text beneath it, the cards one to a row at the full content width. Proves the `md` step and the single column.
6. Culture page at 390, full page, the Block at rest: the Eyebrow, the heading at 4xl, the text and the two cards stacked with 30px between the rows. Proves the mobile stack.
7. Culture page at 1600 with reduced motion emulated, viewport, pointer over a card: the pill filled, the photograph still. Proves the reduced-motion rule.
8. Culture page at 1600, keyboard: tab from the Header into the Block: the first card's link takes focus with a visible outline, then the second card's; the pill never takes focus of its own. Proves the focus order.
9. Served HTML of the Culture page, checked and reported in the PR body, not dumped: the Block's section holding the eyebrow, an `h2`, the rich text, and a list of two items, each item one link holding a `time` element, an `h3`, a paragraph and a `span` pill with no link or heading nested inside; no inline styles beyond the picture component's ratio property; no Alpine attributes on the Block. Proves the markup.
10. Culture page at 1600 with a temporary third pick: the third card alone in the left half of a second row, 20px beneath the first row, the right half empty. Then at 390: three cards stacked. Restored afterwards. Proves the odd-card rule.
11. Culture page at 1600 with the pick temporarily emptied: nothing between the Hero and the Footer, no empty section and no stray Eyebrow or heading. Restored afterwards. Proves there is no fallback.
12. Culture page at 1600 with the Eyebrow and text temporarily emptied: the heading alone above the cards, no Rule and no empty text column. Restored afterwards. Proves the header empty states.
13. Control panel, the Block's edit form: "Grid - Blog" in the Blocks field's General group, the Section Header and Section Content headings, the Text field a rich-text editor, the Blog picker offering only the Blog section with the button "Add a Blog" and the instructions shown, Padding on the Settings tab. Proves the entry type and fields.
14. Seed command output for both Culture Seeds, each run twice: the Hero Simple created in the Hero field and the Blog Grid created in the Blocks field with two Blogs resolved on the first run, both skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- A new blog card component. The Blog Large Card is the card, unchanged.
- A real read time. The meta row keeps its literal "5 min read" until Blog pages have content.
- A fallback to the latest Blogs, a Category filter, a limit option, Pagination or Load More.
- A Button, a Button Group or a Section Footer.
- Using the Blog Card (the landscape card) or mixing card sizes in the grid.
- A layout, column-count or colour option on the Block.
- Two columns below `lg`. The cards are one to a row until the desktop breakpoint.
- A dedicated mobile or tablet design. The responsive rules follow the decisions above until a mobile node exists.
- Changing the Blog Carousel, the Blog Large Card, the meta row or the Entries - Blog field's own settings.
- Seeding new Blogs or new images, and committing the Seed.

## Further Notes

- The node's cards are 750 wide at x 39 and x 809 on the 1600 frame, which is six columns each of the 1520 content width with a 20px gap, so the grid is the site's twelve-column grid halved rather than a bespoke width.
- The heading is 750 wide at 62px with 0.97 leading and -2.48px tracking, which is the `7xl` token exactly: -0.04em at 62px is -2.48px, the `tracking-tighter` value.
- The text box starts at 66.67% of the frame and is 493 wide, which is columns nine to twelve of the twelve-column grid.
- The node's text is two paragraphs with an empty paragraph between them, a Figma spacing artefact; the Seed writes two paragraphs and the rich text component spaces them.
- The Figma photographs in the node are not seeded: the two picked Blogs keep the Thumbnails they were given for the Blog Carousel, which is enough to prove the card.
