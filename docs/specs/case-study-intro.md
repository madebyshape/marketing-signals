# Case Study Intro

Spec for the Case Study Intro on a Case Study page: an Eyebrow with a Rule over a large heading with the Highlight and the Text beneath, with the Case Study Sidebar beside it showing the Case Study's Overview. It sits between the page's Hero and its Blocks. The Sidebar is a white card with the Logo in black, the Description and three Sidebar Rows for Industry, Year and Services, the last an outlined pill for the Case Study's first Category. Below the desktop breakpoint the Sidebar stacks above the Intro. Every field already exists on the Case Study entry type; this spec renders them.

Design: Figma node `9903-14967` in the Marketing Signals file, 1600 wide, named "Group 46358". The node draws the desktop state once at 1520 by 614: the Intro in columns 1 to 7 and the Sidebar card in columns 10 to 12 of the twelve-column grid, with the Intro starting 60px below the card's top. No tablet frame and no mobile frame exist, so the stacked layout and its spacing below are decisions, not measurements. The node's check list under the Text is a bulleted list in the Text field rendered as the Check List.

Branch: feature/case-study-intro

Related: the Content Rows spec, whose Check List the Text renders through and whose 4xl-to-6xl heading and Highlight treatment this follows; the Carousel - Case Study spec, which introduced the Overview fields the Sidebar reads and the Logo's inline SVG rendering; the Content Seeding spec, whose entry `fields` map seeds the review content; the Case Study Grid spec, whose Filter Button pill is a different component and is not shared. ADR-0001 does not apply: the Intro is in flow beneath the Hero. ADR-0002 applies: the review content arrives by Seed. ADR-0004 is untouched: the page's Hero still sets the Header Colour. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, new "Case Study Intro" section, which gained Case Study Intro, Case Study Sidebar, Overview and Sidebar Row during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A Case Study page renders its Hero and its Blocks and nothing between them. The entry type carries an Eyebrow, a Heading and a Text under an Intro Content heading, and a Logo, a Description, an Industry, a Year and a Category on its Overview tab, and the control panel tells editors "Case Study Sidebar gets show here", yet none of those fields reaches the page. A visitor arriving on The Tree Center's page meets the Hero and then drops straight into the Blocks with no statement of the challenge, no sense of who the client is, and no way to see the industry, the year or the service at a glance. An editor who fills in the Overview sees no effect on the page.

## Solution

Between the Hero and the Blocks the Case Study page renders the Case Study Intro beside the Case Study Sidebar. From the desktop breakpoint the Intro takes columns 1 to 7: the Eyebrow with its Rule, 50px, the heading at 55px semibold with the Highlight in primary, 30px, the Text at 16px with any bulleted list rendered as the Check List in two columns. The Sidebar takes columns 10 to 12 with the Intro starting 60px below its top: a white card with 20px corners and 30px padding holding the Logo in black at up to 75px tall, 30px, the Description, 25px, then three Sidebar Rows each under a thin creme line, a creme label in a 120px column beside the value in black: Industry, Year, and Services showing the Case Study's first Category as a creme-outlined pill. Below the desktop breakpoint the Sidebar is full width above the Intro. A Sidebar Row with no value is left out, a Sidebar with nothing to show is left out, an Intro with nothing to show is left out, and a Case Study with neither renders nothing between its Hero and its Blocks. The Tree Center is seeded with the node's copy so the page can be reviewed against the design.

## User Stories

1. As a visitor, I want the challenge stated beneath the Hero, so that I know what the client came to the agency for before I read how it went.
2. As a visitor, I want a short label above the heading, so that I know the heading is the challenge and not another title.
3. As a visitor, I want the key words of the heading in purple, so that the point of the challenge stands out.
4. As a visitor, I want the body text in plain paragraphs, so that I can read the background at my own pace.
5. As a visitor, I want a list of what was done shown as ticks in two columns, so that I can scan the work without reading a paragraph.
6. As a visitor, I want the client's logo beside the challenge, so that I recognise who the work was for.
7. As a visitor, I want the logo in black on the white card, so that every client's card reads the same whatever their brand colours.
8. As a visitor, I want a sentence about the client under the logo, so that I understand their business.
9. As a visitor, I want the industry and year in a short list, so that I can judge whether the work is like mine and how recent it is.
10. As a visitor, I want the service shown as a pill, so that I can see which of the agency's services the work belongs to.
11. As a visitor, I want the card to sit beside the challenge on a wide screen, so that I can read both without scrolling.
12. As a visitor with a phone, I want the card above the challenge at full width, so that I meet the client before the story and nothing is squeezed.
13. As a visitor, I want the card to stay where it is as I scroll, so that nothing follows me down the page.
14. As a visitor, I want a row with nothing in it left out, so that I never see a label with no value.
15. As a visitor, I want no empty card or empty column, so that a half-finished Case Study still looks finished.
16. As a keyboard user, I want the heading to be a real heading, so that I can jump to it.
17. As a screen reader user, I want the logo announced as the client's name, so that the card makes sense without the picture.
18. As a screen reader user, I want each row read as its label then its value, so that "Industry, Lifestyle" is one fact.
19. As a screen reader user, I want the tick marks skipped, so that I hear the list items and not an icon name.
20. As an editor, I want the Eyebrow, Heading and Text on the Page Content tab to appear on the page, so that the Intro Content heading in the control panel means something.
21. As an editor, I want the Sidebar to read the Overview tab, so that I enter the Logo, Description, Industry, Year and Category once and every surface uses them.
22. As an editor, I want italic words in the heading shown in purple, so that I choose the Highlight as I do everywhere else.
23. As an editor, I want a bulleted list in the Text to become the tick list, so that I do not need a separate field for it.
24. As an editor, I want only the first Category shown in the Sidebar, so that a Case Study with several Categories still has one clean pill.
25. As an editor, I want to be told to upload the Logo as an SVG, so that it turns black on the card.
26. As an editor, I want a Case Study with no Intro fields filled to still render its Hero and Blocks, so that nothing breaks while I write.
27. As a developer, I want the Intro and Sidebar written in the Case Study page template, so that there is one place to read for what a Case Study page renders.
28. As a developer, I want the Intro composed from the eyebrow, heading alternate and rich text components, so that its typography matches every Block.
29. As a developer, I want the pill to be the badge component with an outline colour and a larger size, so that there is one badge on the site.
30. As a developer, I want the review content seeded from a Seed file, so that the page can be reviewed without control panel credentials.
31. As a reviewer, I want The Tree Center's page to carry the node's copy, so that the screenshot compares to the design word for word.

## Implementation Decisions

**Fields.** No new fields. The Case Study entry type already has, on its Page Content tab under an Intro Content heading, the Eyebrow field, the Heading field and the Rich Text - Full field with handle `text`, and on its Overview Content tab the Image field with handle `logo`, the Rich Text - Simple field with handle `description`, the Text field with handles `industry` and `year`, and the Categories - Case Study field. The Heading field's addition to the layout was committed on `main` before this spec. The Logo field gains the instruction "Upload an SVG so the logo can be shown in black." The Sidebar tip on the Page Content tab is reworded to "The Case Study Sidebar renders here from the Overview tab." Both are project config changes on the branch.

**Page template.** The Intro and Sidebar are written inline in the Case Study page template between the Hero and the Blocks, not in a partial. The template reads the Overview and Intro fields into local variables first, decides whether the Intro has content (any of Eyebrow, Heading with tags stripped, or Text with tags stripped is non-empty) and whether the Sidebar has content (a Logo, a Description with tags stripped, an Industry, a Year or a first Category), and renders the section only when at least one does.

**Section.** The section component with vertical padding at the bottom only, since the Hero on this page carries its own bottom padding, and the site margins as horizontal padding. Inside it one grid: a single column below `lg`, twelve columns with the site's 20px gap from `lg`, the Sidebar first in the DOM so it stacks above the Intro, then the Intro. From `lg` the Sidebar is placed in columns 10 to 12 and the Intro in columns 1 to 7 of the same row, so columns 8 and 9 stay empty as the node draws them. Below `lg` the vars map's `xl` vertical gap separates the two, 20px. From `lg` the Intro carries a 60px top offset so its Eyebrow starts 60px below the card's top, as the node measures.

**Intro column.** In order, each optional: the Eyebrow through the eyebrow component in black with the Rule in creme-300; 50px; the heading through the heading alternate component as an `h2`, semibold, leading 0.97, tighter tracking, at 4xl and 6xl from `lg`, with the Highlight in primary. Figma's 6xl at 55px with -2.2px tracking is the theme's 6xl with tighter tracking exactly. 30px; the Text through the rich text component in the black scheme at base size with the `check` list option, so a bulleted list renders as the Check List, one column below `md` and two from `md`. The rich text component's own 20px paragraph margin gives the node's spacing between paragraphs; the 40px from the last paragraph to the list is that margin plus the list's own top spacing and is accepted as the component renders it. An empty Eyebrow, heading or Text leaves its space out.

**Sidebar card.** A white card with 20px corners and 30px padding on every side. In order, each optional: the Logo; 30px; the Description through the rich text component in the black scheme at base size; 25px; the Sidebar Rows. When the Logo is absent the Description starts at the padding; when both are absent the rows start at the padding.

**Logo.** Rendered through the picture component with no ratio and the inline SVG option, with the client's title as alt text. An SVG Logo is inlined with every hex fill turned to `currentColor` and the wrapper coloured black, so the mark renders in black whatever colour it was drawn in. Its height is capped at 75px, its width follows its aspect ratio and is capped at the card's inner width. A raster Logo renders as uploaded inside the same bounds and is not recoloured; the field instruction tells editors to upload an SVG. This is the same treatment the Case Study Card gives the Logo, in black rather than white.

**Sidebar Rows.** Three rows, Industry, Year and Services, each rendered only when its value exists. Each row has a 1px creme-300 top line and is a two-column grid: the label in a 120px column in creme-500 at base size, and the value in the remaining width in black at base size, both leading 1.33. The Industry and Year rows have 20px of padding above and below their text, the node's 61px row. The Services row has 25px above and below its pill, the node's 81px row, and its value is the Case Study's first Category in the field's order through the badge component in the new outline colour at the new large size. The label reads "Services" as the node draws it, not "Category".

**Badge.** The badge component gains one colour, `creme-300-outline`: black text, no fill, a creme-300 border. It gains one size, `lg`: base text size, medium weight, 20px horizontal and 10px vertical padding, with the border. Its leading stays `none` as the other sizes have, so the pill renders about 38px tall against the node's 31px cap-trimmed box; the difference is Figma's text trimming and is accepted, as the same difference is on every badge.

**Scroll.** The Sidebar is static. It is not sticky and does not follow the visitor down the page.

**Responsive summary.** Below `lg`: one column, the Sidebar full width above the Intro with 20px between, no top offset on the Intro, heading at 4xl, the Check List in one column then two from `md`. From `lg`: the Sidebar in columns 10 to 12, the Intro in columns 1 to 7 with a 60px top offset, heading at 6xl, the Check List in two columns.

**Empty states.** A Sidebar Row with no value is left out. A Sidebar with no Logo, Description, Industry, Year or Category is left out and the Intro keeps its columns with the Sidebar's columns empty. An Intro with no Eyebrow, heading or Text is left out and the Sidebar keeps its columns with the Intro's columns empty. A Case Study with neither renders nothing between its Hero and its Blocks, section included.

**Review content.** The Tree Center is seeded with the node's copy through the Seed command's entry `fields` map from a Seed file under the scratch folder: Eyebrow "The Challenge"; Heading "The Tree Center came to us in 2017, wanting to boost their organic <em>presence across key categories and products.</em>"; Text the two paragraphs "The Tree Center came to us in 2017, wanting to boost their organic presence across key categories and products. As a highly seasonal business, it was crucial for them to be visible during their busiest months of the year." and "We put together a tailored strategy focused on building links to key pages ahead of the peak selling season. During the quieter winter months, we scaled back link-building and shifted our focus to identifying on-page improvements and new opportunities", followed by a bulleted list of "Seasonal Based Strategy", "Blog Content Creation", "Targeted Outreach", "Competitor Link Audit", "Gifted Reviews" and "Content Review", in that order so the two columns read as the node's; Description "We're tree people. We always have been. Our horticultural experience spans 40 years, multiple college degrees and 3 generations."; Industry "Lifestyle"; Year "2025". The Logo and the Category, Organic Search, are already on the entry and are not changed, so the Services pill reads "Organic Search" rather than the node's "Pay Per Click". The Seed is not committed.

**Docs.** `CONTEXT.md` gained the Case Study Intro vocabulary during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The one seam is the rendered Case Study page for The Tree Center through the global layout. The page template is the only caller of the Intro fields, the Overview fields as a Sidebar, and the badge component's new colour and size, so all are proven through it. The Seed command's own output is the second seam for the review content.

**What good evidence looks like.** It shows what a visitor would see: the Intro beside the Sidebar against the node at 1600, the Sidebar stacked above the Intro at 390, the black Logo, the three rows and the pill, the Check List's two columns, and the empty states with rows and sides left out. Fixed widths, one state per file, a before/after pair for the page since it exists on `main`. Numeric checks such as column edges and gaps are reported as a table in the PR body, not captured as dumps.

**Evidence plan.**

1. The Tree Center page at 1600, full page cropped from the Hero's end to the first Block: the Intro in columns 1 to 7 with the Eyebrow and Rule, the heading on four lines with the Highlight, two paragraphs and six ticks in two columns; the Sidebar in columns 10 to 12 with the black Logo, the Description and three rows, the pill on the third; the Intro starting 60px below the card's top. Compared against the Figma node for column edges, the 50px and 30px in the Intro, the card's padding and corners, the row heights, the label column and the pill. Proves the desktop layout.
2. The Tree Center page at 1024, viewport at the section's top: the two columns at the smallest width they exist. Proves the `lg` step.
3. The Tree Center page at 768, full page cropped to the section: the Sidebar full width above the Intro, the ticks in two columns. Proves the `md` Check List with the stacked layout.
4. The Tree Center page at 390, full page cropped to the section: the Sidebar full width above the Intro with 20px between, no top offset, the heading at 4xl, the ticks in one column. Proves the mobile layout.
5. The Tree Center page at 1600 with a temporary Seed clearing the Year: the Sidebar with two rows and no gap where the third was. Restored afterwards. Proves a Sidebar Row left out.
6. The Tree Center page at 1600 with a temporary Seed clearing the Eyebrow, Heading and Text: the Sidebar alone in columns 10 to 12 with columns 1 to 7 empty. Restored afterwards. Proves the Intro left out.
7. The Tree Center page at 1600 with a temporary Seed clearing the Description, Industry and Year and the Logo and Category removed in the control panel or by Seed: the Intro alone in columns 1 to 7. Restored afterwards. Proves the Sidebar left out.
8. The Tree Center page at 1600 with every Intro and Overview field cleared: the Hero followed directly by the first Block, no section in the rendered HTML. Restored afterwards. Proves the whole section left out.
9. Rendered HTML of The Tree Center page: the heading an `h2` with the Highlight in a primary-coloured element, the Logo an inline `svg` with `currentColor` fills inside a black-coloured wrapper and the client's title as its accessible name, the tick marks `aria-hidden`, each row's label before its value in source order. Proves the accessibility story.
10. Seed command output for The Tree Center Seed, run twice: the fields set on the first run, the same fields resolved and nothing new on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- The Hero Case Study, being built separately. This spec assumes it renders above the section and carries its own bottom padding.
- A sticky Sidebar.
- Showing more than the first Category in the Sidebar.
- Recolouring raster Logos. A PNG or JPG renders as uploaded.
- Sharing the pill with the Case Study Grid's Filter Button, which is a button with a radar dot.
- The Blocks beneath the section and any Block-level Intro.
- Tablet geometry beyond the stacked layout, since the node has no tablet frame.

## Further Notes

- The node's 60px offset between the card's top and the Intro's Eyebrow is honoured from `lg` at Joe's request. If the Hero's bottom edge makes it look wrong once both are on the page, it is a single top-padding class to drop.
- The 20px between the stacked Sidebar and Intro below `lg` is the vars map's `xl` vertical gap at its mobile value. If it reads too tight next to a 30px-padded card, 40px is the next step and a one-class change.
- The node's Services pill reads "Pay Per Click" while the entry's Category is Organic Search; the pill shows whatever the first Category is, so the seeded page differs from the node by that one word.
- The Overview term names the Case Study's own facts so that the Hero, the Case Study Card and the Sidebar can all be described as reading the Overview rather than each other.
