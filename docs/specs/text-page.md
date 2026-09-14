# Text Page

Spec for the Longform on a Text Page: the Privacy Policy's written body beneath its Hero Simple, with the Table of Contents beside it on the left when the editor switches it on. It adopts the `longform` layout component the Career and Blog Longform specs built, switching off the parts a Text Page does not have, and adds to the shared Longform style what the node draws that no Longform has drawn before: the H3, Medium bold and the table.

Design: Figma node `10038-25053` in the Marketing Signals file, a group named "Group 46390", 1135 by 6331 inside a 1600 frame, for the Privacy Policy. The node shows the Longform and the Table of Contents only, not the Hero. No tablet or mobile node exists; the responsive rules are the Career Longform spec's decisions plus the table decision below, not measurements.

Branch: feature/text-page

Related: the Career Longform spec, which owns the `longform` layout component, its grid, sticking, breakpoints, Table of Contents and heading anchors, all adopted here unchanged except where a decision below says otherwise; the Blog Longform spec, which gave the component its section `id` param and the Longform its bullet lists; the Content Seeding spec, whose entry `fields` map fills the Longform. ADR-0001 applies: the header is fixed, and the adopted component already clears it. ADR-0002 applies: the table arrives by Seed. ADR-0004 applies: the Text entry template already resolves the Header Colour from the Hero Layout, and this spec does not change it. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, which gained **Text Page** during the grilling session and whose Longform and Table of Contents now cover it.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Privacy Policy ends at its Hero. An editor has written the whole policy into the Text entry's Longform field, ten sections and their subsections, and switched its Table of Contents lightswitch on, and none of it reaches the page: a visitor who follows "Privacy Policy" from the footer sees the heading "Privacy Policy", one sentence, and then the footer. A visitor who needs to know how their data is used, who to contact, or what their rights are cannot find out, and the site fails the one job a privacy policy has.

The Longform style the Career and Blog pages share has also never had to draw what this page needs: its H3s are larger and heavier than the design, its bold is heavier than the design, and it has no table style at all, though the field's toolbar lets an editor insert one and the policy's "Purposes for which we will use your personal data" section is a table.

## Solution

Beneath the Hero Simple, the Privacy Policy renders the Longform section. From the `xl` breakpoint: on the left, columns 1 to 3, sticking beneath the header while the Longform scrolls, the "Table of Contents" label and the numbered list of the policy's ten H2s, the section being read in Primary and underlined; in columns 4 to 9, the policy. Nothing sits on the right: no Reading Progress, no Read Time, no Sidebar Card, no Share Buttons. Below `xl` it is one column: the Table of Contents as a plain list above the policy.

When the editor switches the Table of Contents off, the list and its label go, and the policy stays in columns 4 to 9 with the left column empty, so the text never moves.

Inside the policy, every Longform now draws an H3 at 25px Medium, 40px beneath what comes before it and 30px above what follows, and bold text in Medium rather than Semibold. A table sits across the text's full width: Creme 100 cells divided by 1px Creme 300 lines, 10px corners on the outside, 20px padding in each cell, header cells in 14px Medium centred and body cells in 11px. On a screen too narrow for it, the table scrolls sideways inside its own box while the text around it stays put. The Career and Blog pages pick up the same H3, bold and table style.

A Seed copies the live Privacy Policy Longform, adds the node's table under "Purposes for which we will use your personal data" and bolds the lead-in of every bullet, so the page can be reviewed against the design.

## User Stories

1. As a visitor, I want the full privacy policy beneath the Privacy Policy heading, so that I can read how my data is handled.
2. As a visitor, I want the policy's sections headed large and bold, so that I can scan for the part I care about.
3. As a visitor, I want subsections headed smaller than sections, so that I can tell a section from its parts.
4. As a visitor, I want a numbered list of the policy's sections beside the text, so that I know what the policy covers before I read it.
5. As a visitor, I want to click a section in that list and be scrolled smoothly to it, so that I can go straight to "Your Legal Rights".
6. As a visitor, I want the section I am reading marked in the list, so that I know where I am in a long document.
7. As a visitor, I want a list entry to turn Primary and underlined when I point at it, so that I know it is a link.
8. As a visitor, I want the list to stay beside me as I scroll on a desktop, so that I can jump sections from anywhere in the policy.
9. As a visitor, I want no progress bar, read time or share buttons beside a legal document, so that the page stays about the text.
10. As a visitor, I want the purposes, types of data and lawful bases laid out as a table, so that I can read across a row to see how one use of my data is justified.
11. As a visitor, I want the table's header row to stand apart from its body, so that I know what each column holds.
12. As a visitor with a phone, I want to scroll the table sideways without the rest of the page moving, so that I can read every column at a legible size.
13. As a visitor with a phone, I want the section list above the policy, so that I can still jump to a section.
14. As a visitor with a phone, I want nothing sticking, so that the narrow screen is not crowded.
15. As a visitor, I want the category names in the list of personal data in a slightly heavier weight, so that I can pick out "Identity Data" or "Usage Data" at a glance.
16. As a visitor, I want a link to a section of the policy to land on that section when I open it directly, so that support staff can send me straight to "Data Retention".
17. As a visitor, I want links in the policy in Primary, so that they look like links on every other Longform.
18. As a keyboard user, I want every list entry focusable with a visible ring, so that I can navigate the policy without a mouse.
19. As a keyboard user, I want focus to move to the section I jumped to, so that my next Tab continues from there.
20. As a keyboard user, I want to reach and scroll the table sideways, so that its hidden columns are not out of reach.
21. As a screen reader user, I want the section list announced as a labelled navigation with an ordered list, so that I know what it is and how many sections there are.
22. As a screen reader user, I want the table announced as a table with its header cells, so that each cell is read with its column.
23. As a visitor who prefers reduced motion, I want section jumps to be instant, so that nothing glides that I asked not to.
24. As an editor, I want the Longform I write on a Text entry to appear on the page, so that the field means something.
25. As an editor, I want to switch the Table of Contents off for a short page, so that a page with one or two sections is not crowded by a list.
26. As an editor, I want the policy to stay in the same place when I switch the Table of Contents off, so that the page does not look broken.
27. As an editor, I want every H2 I write to appear in the list without typing numbers, so that the list keeps itself up to date.
28. As an editor, I want a Longform with no H2s to show no list even with the switch on, so that the page never shows an empty label.
29. As an editor, I want a Text entry with an empty Longform to show nothing beneath its Hero, so that an unfinished page does not show an empty section.
30. As an editor, I want to insert a table from the toolbar and have it styled, so that I never need a developer for tabular content.
31. As an editor, I want to mark a table's first row as a header and have it styled as one, so that I control which row is the header.
32. As an editor, I want a table without a header row to read as all body, so that a simple grid of values does not gain a false header.
33. As an editor, I want the bold I apply to match the design's weight, so that emphasis looks deliberate, not heavy.
34. As an editor of a Career or a Blog, I want H3s, bold and tables to look the same as on the Privacy Policy, so that the site has one Longform style.
35. As a developer, I want the Text Page to use the same `longform` component as Career and Blog, so that grid, sticking and heading anchors live in one place.
36. As a developer, I want the Table of Contents, Reading Progress, Read Time and Share Buttons each switchable by a param that defaults to on, so that Career and Blog need no change.
37. As a developer, I want the right column to render nothing when it has nothing, so that a Text Page carries no empty markup there.
38. As a reviewer, I want a Seed that adds the node's table and bolds the bullet lead-ins without losing the editor's copy, so that I can check the page against the design.

## Implementation Decisions

**Fields.** No new fields. The Text entry type already has the Hero field, the `tableOfContents` lightswitch (the Lightswitch - On field, labelled Table of Contents) and `longform` (Rich Text - Longform, whose toolbar offers headings H2 to H6, bold, italic, link, underline, to-do, numbered and bulleted lists, insert table and nested entries). The Privacy Policy is the only Text entry.

**Text entry template.** The Text entry template includes the `longform` component where its "Longform Text Content" placeholder sits, after the Hero, passing the entry, `vars`, the id `text-content`, the entry's Table of Contents lightswitch as the Table of Contents param, and the Reading Progress, Read Time and Share Buttons params off. The Header Colour logic above it is unchanged.

**Layout component params.** The `longform` component gains four boolean params, each defaulting to on so the Career and Blog templates need no change: `tableOfContents`, `readingProgress`, `readTime` and `shareButtons`. Each leaves its part out entirely when off. The Table of Contents still also requires the Longform to have an H2, as today. The right column's contents render only when there is a Sidebar Card or Share Buttons; a Text entry has no Sidebar - CTA field, so the existing card guard already leaves the card out. The left column's sticky wrapper renders only when something is in it. The grid does not change: with the left column empty the Longform stays in columns 4 to 9 from `xl`, and below `xl` the column simply starts with the Longform.

**Longform H3.** In the Longform style only, not the rich text component's other sizes: H3 at the 2xl step (25px, Medium, leading 1.2, tighter tracking), 40px top margin and 30px bottom margin. Mobile keeps it at 2xl; it is small enough not to step down. Margins collapse against the preceding paragraph's 20px and the preceding H2's 25px, so an H3 sits 40px beneath either, as the node draws. H4 to H6 are unchanged. The H3 carries the header's scroll margin like the H2 so a future deep link clears the header; it gains no id and does not appear in the Table of Contents.

**Longform bold.** In the Longform style only, `strong` renders Medium (500) instead of Semibold. Other sizes keep Semibold.

**Longform tables.** In the Longform style only. CKEditor stores a table as a `figure` with the class `table` around a `table`, with a `thead` of `th` cells when the editor sets a header row. The figure is the scroll box: full width of the Longform, horizontal overflow scrolling, 40px above, 20px below like a paragraph (the following H2's 100px top margin wins by collapse), focusable with a visible focus ring and labelled "Table" for assistive technology so a keyboard user can scroll it. The table inside is at least 600px wide and otherwise fills the figure, with separate borders so the outer corners can round: 10px radius on the four corner cells, a 1px Creme 300 line between every cell and around the edge, never doubled. Every cell has a Creme 100 fill, 20px padding and top-aligned Black text. `th` is 14px Medium leading 1.33 tight tracking, centred. `td` is 11px (2xs) Regular leading 1.33 tight tracking, left-aligned; paragraphs inside a cell lose the Longform paragraph size and keep a 3px gap between them. Columns share the width equally unless the editor has set widths. No zebra, no hover, no sticky header. A table without a `thead` is styled as all body cells, and the first row's corners still round.

**Links.** Longform links stay Primary. The node's black underlined ICO address is plain text in the entry and stays plain text.

**Lists.** The shared Longform bullet list from the Blog Longform spec is unchanged, 20px from the paragraphs around it; the node's 30px and 50px gaps around its list are not followed.

**Seed.** One Seed under `.scratch/seeds/text-page/`, not committed, targeting the Privacy Policy through its `fields` map. Its `longform` value is the live entry's Longform HTML, read from the database immediately before the Seed is written and run so any edit the editor made since is kept, with two changes:
- After the two paragraphs under "Purposes for which we will use your personal data", a table with a header row "Purpose/Activity", "Type of data" and "Lawful basis for processing inc. basis of legitimate interest", and the node's seven body rows, their copy exactly as the node draws it, the multi-paragraph cells as separate paragraphs.
- In the bullet list under "The Data We Collect About You", each item's lead-in ("Contact Data", "Financial Data", "Transaction Data", "Technical Data", "Profile Data", "Usage Data", "Marketing and Communications Data") bolded as "Identity Data" already is.
The `tableOfContents` lightswitch is set on.

**Docs.** `CONTEXT.md` gained **Text Page**, and its Longform and Table of Contents were widened to cover it, during the grilling session. No ADR change.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The one seam is the rendered Privacy Policy page through the global layout, at `/privacy-policy`; the layout component's new params and the Longform style's new H3, bold and table all show there. Because the style is shared, the seeded Career and Blog pages from the earlier Longform specs are rechecked at the same seam for regression, not captured as new work. The Seed command's output is supporting evidence. Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the numbered list beside the policy, the H3s and bold at the design's weight, the table with its rounded Creme 100 cells, the policy staying in place when the list is switched off, and the table scrolling on a phone. The group review takes the screenshots of record once; every other line is a state checked on the site and reported.

**Evidence plan.**

Screenshots, Privacy Policy:

1. 1600, full page, Table of Contents on: the list in columns 1 to 3 with the first entry Primary and underlined; the policy in columns 4 to 9 opening with its two paragraphs, "Important Information and Who We Are" at 46px, "Purpose of this privacy notice" at 25px Medium 40px beneath it; the bullet list with Medium lead-ins; the table under "Purposes for which we will use your personal data"; nothing on the right. Compared against the Figma node. Proves the desktop layout, H3, bold and table.
2. 1600, top of the Longform, Table of Contents switched off (restored afterwards): no label and no list, the policy still starting at column 4. Proves the lightswitch and the fixed text position.
3. 768, full page: the list above the policy in one column, the table at full width. Proves the layout below `xl`.
4. 390, full page: the same stacked order at phone width. Proves the mobile layout.
5. 390, the table scrolled sideways to its last column: the third column visible, the text above and below not moved, no horizontal page scroll. Proves the table's scroll box.

States checked on the site and reported:

6. 1600, scrolled to the table: the list still beside the text beneath the header, "4. How We Use Your Personal Data" active. Proves sticking and the active entry.
7. A Table of Contents entry clicked at 1600: smooth scroll to its H2 clear of the header, the address carries its hash, focus on the heading; with `prefers-reduced-motion: reduce` it jumps. Proves the list's scroll.
8. `…/privacy-policy#data-retention` opened directly with JavaScript disabled: the page lands on that H2 clear of the header. Proves server-side anchors.
9. The table reached by Tab at 390: a visible focus ring, arrow keys scroll it. Proves keyboard access to the table.
10. The Longform with its H2s temporarily turned into paragraphs, switch on (restored afterwards): no Table of Contents and no label. Proves the empty list.
11. The Longform temporarily emptied (restored afterwards): nothing between the Hero and the footer. Proves the empty section.
12. The table's header row temporarily unset (restored afterwards): every cell styled as a body cell, corners still rounded. Proves the headerless table.
13. The seeded Career and Blog pages at 1600: Table of Contents, Reading Progress, Read Time, Sidebar Card and Share Buttons all still present; their H3s at 25px Medium and bold at Medium. Proves the params default on and the shared style change.
14. Markup: one element with id `text-content`; no Reading Progress, Read Time or Share Buttons markup; the table figure is focusable and labelled; `th` cells present in a `thead`. Proves the markup.
15. The Seed run with `--dry-run`, then for real, then a second time: the table and the bold lead-ins present after the first run, the editor's copy otherwise unchanged, the second run a no-op. Proves the seeding.

## Out of Scope

- Terms & Conditions, Modern Slavery Policy or any other page as a Text Page; only the Privacy Policy is a Text entry today.
- Reading Progress, Read Time, Share Buttons or a Sidebar Card on a Text Page.
- Changing the Hero Simple, the Header Colour, or the gap between the Hero and the Longform.
- Linking the ICO address in the policy copy; that is an editor's change.
- Stacking table rows as cards, sticky table headers, zebra rows or sortable tables.
- Changing Longform links, bullet or to-do lists, H2, or H4 to H6.
- Restyling H3, bold or tables in rich text outside a Longform.
- Rendering the Longform's nested entries (Video, Image, Image Columns, Button Group, Quote).
- A dedicated mobile or tablet design.
- Committing the Seed.

## Further Notes

- Node geometry at 1600, text boxes trimmed to cap height: the Table of Contents label at x 40, y 465; its list at y 494, 257 wide, 20px between entries. The Longform at x 425, 750 wide; its opening paragraphs at y 465, level with the label; "Important Information and Who We Are" ending at y 784, 100px beneath the paragraphs; "Purpose of this privacy notice" at y 824, 40px beneath the H2; its paragraph at y 871, 30px beneath the H3; later H3s 40px beneath the paragraph before them. An H2 followed directly by a paragraph sits 25px above it, as on Career and Blog.
- The bullet list at y 2389: 5px dots, a 7px gap, 20px between items, matching the Blog Longform list. The node places it 30px beneath its paragraph and 50px above the next; the shared 20px is kept by decision.
- The table at y 4263, 750 by 775, 40px beneath its paragraph and 100px above "Disclosures of Your Personal Data"; three 250px columns; cells with 20px padding and 210px of text; header row 68px tall.
- The node's Table of Contents copy matches the entry's ten H2s. Its "Lorem Ipsum" paragraphs under the later sections are placeholder, as in the entry.
- The Text entry's H2 "Important Information and Who We Are" is followed directly by an H3, the only place in any Longform where the H2-to-H3 gap applies.
- The component's defaults mean an entry type that adopts the Longform later gets every part unless it switches parts off.
