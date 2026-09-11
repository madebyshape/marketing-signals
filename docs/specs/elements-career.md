# Elements - Career

Spec for the Career List Block: a black panel inside the site margins holding an Eyebrow with its Rule, a heading with the Highlight beside a Category Filter, a Career Row per Career, and the Call To Action beneath. Each Career Row is a Linked Card to its Career showing the title, the Employment Type and the Category. The Category Filter narrows the rows through Sprig without leaving the page. It is the first Block to host a Category Filter, the first to fall back to every entry of a section when nothing is picked and filter them, and the first Block reviewed on the Careers page.

Design: Figma node `9962-15535` in the Marketing Signals file, 1600 wide, a group named "Group 46375" holding a 1520 wide black panel with 20px corners. Inside it: the Eyebrow "Our Open Positions" over its white Rule, the heading "Find your next job at *Marketing Signals*" with the Highlight in Secondary, three pills "All", "Creative" and "Office" level with the heading's foot on the right, five 102px rows 10px apart, and a 255px Call To Action row with a photograph, the heading "Can't find a job perfect for your skillset?", a paragraph and a "Say hello" button. The second row is drawn in Secondary; it is the hover state. No tablet frame and no mobile frame exist, so the responsive rules are decisions, not measurements.

Branch: feature/elements-career

Related: the Case Study Grid spec, which built the Category Filter, the Filter Button and the Sprig pattern this Block's filter follows; the FAQ Accordion (Elements - FAQ) spec, whose Block hosts a Sprig component by passing its entry IDs and never touches the URL; the Banner CTA spec, whose black panel, Highlight in Secondary and creme text this Block matches; the Blog Grid spec, whose Eyebrow row and entries-field layout this Block's header follows; the Content Seeding spec, which creates the Careers and puts the review content on the Careers page. ADR-0001 applies to the review page only: the Careers page has no Hero, so the Seed adds a Hero Simple above the Block. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Career List" section, which gained Career, Career List, Career Row, Employment Type and Call To Action during the grilling session, and the "Case Study Grid" section, whose Category Filter and Filter Button were widened to cover both lists; the Eyebrow, the Rule, the Highlight and the Linked Card are as already defined.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Careers page is empty, and editors have no way to list open positions anywhere on the site. The Career section and its Categories (Creative and Office) exist, and each Career carries an Employment Type, but nothing renders them. A visitor looking for a job has nothing to browse, cannot narrow the list to the kind of work they do, and has no prompt to get in touch when no position fits. The Careers page design calls for a dark panel listing every open position as a row with its hours and team, a filter by Category, and an invitation beneath for people who found nothing suitable.

## Solution

A new Block, the Career List, listed as "Elements - Career", that editors add to any page from the Blocks field. It is a black panel inside the site margins. At the top an Eyebrow with its Rule, then a heading with the Highlight on the left and a Category Filter on the right: "All" and one Filter Button per Category the listed Careers use. Beneath, one Career Row per Career: the editor's picks in the order picked, or every enabled Career newest first when nothing is picked, so a new job appears without anyone editing the page. Each row is one link to its Career showing its title, its Employment Type beside a clock icon, its first Category beside a target icon, and an arrow; under the pointer or keyboard focus the row turns Secondary. Choosing a Filter Button swaps the rows for that Category's Careers without leaving the page or changing the address. Beneath the rows sits the Call To Action: a photograph, a heading, a short text and a button, which filtering never touches.

## User Stories

1. As an editor, I want to add a Career List Block to any page from the Blocks field, so that I can show open positions wherever they belong.
2. As an editor, I want the Block listed as "Elements - Career" beside "Elements - FAQ" and "Elements - Testimonial", so that I recognise it as a Block that lists another section's entries.
3. As an editor, I want to write a short Eyebrow above the heading, so that visitors know what the section is.
4. As an editor, I want the Eyebrow underlined by the Rule, so that the section header matches the rest of the site.
5. As an editor, I want to leave the Eyebrow empty, so that the section can start with the heading.
6. As an editor, I want to write a heading and mark words italic to Highlight them, so that the key phrase stands out in Secondary.
7. As an editor, I want to leave the heading empty, so that the list can stand without one.
8. As an editor, I want to leave the Careers picker empty and have every open Career shown newest first, so that a new job appears on the Careers page the moment it is published.
9. As an editor, I want to pick specific Careers instead, so that a page about one team can list only its roles.
10. As an editor, I want picked Careers shown in the order I list them, so that I control which role leads.
11. As an editor, I want the picker to offer only the Career section, so that I cannot put another kind of entry in the list.
12. As an editor, I want the picker's button to read "Add a Career", so that it says what it does.
13. As an editor, I want instructions on the picker saying that leaving it empty shows every open Career, so that I understand the fallback without previewing.
14. As an editor, I want a disabled Career left out of the list and out of the filter, so that closing a job removes it everywhere without editing pages.
15. As an editor, I want the Category Filter to appear on its own, built from the Careers in the list, so that I never configure it.
16. As an editor, I want a Category with no listed Careers to have no Filter Button, so that visitors never choose a filter that shows nothing.
17. As an editor, I want the Category Filter hidden when every listed Career shares one Category, so that a filter with one choice never appears.
18. As an editor, I want to set a Call To Action with a photo, a heading, a text and a button, so that visitors who find no role still have somewhere to go.
19. As an editor, I want to leave the Call To Action's photo empty, so that I can run it as text and a button alone.
20. As an editor, I want the Call To Action hidden when its heading is empty, so that a half-filled Call To Action never shows.
21. As an editor, I want the Employment Type labels to read "Full-Time" and "Part-Time", so that the control panel matches what visitors see.
22. As an editor, I want to set the Block's vertical padding from its Settings tab, so that it spaces like every other Block.
23. As an editor, I want the fields laid out under the Section Header, Section Content and Section Footer headings, so that the Block reads like every other Block in the control panel.
24. As an editor, when every Career is closed, I want the Block to keep its heading and Call To Action with no rows and no filter, so that the page still invites people to get in touch.
25. As a visitor on a desktop, I want the heading on the left and the Category Filter on the right, level at their feet, so that I see the choices beside the title.
26. As a visitor, I want each Career shown as a row with its title, its Employment Type and its Category, so that I can scan roles at a glance.
27. As a visitor, I want the Employment Type and Category marked with small icons, so that I can tell the two apart without labels.
28. As a visitor using a mouse, I want a row to turn Secondary with its arrow filled white when I point at it, so that I know it is a link.
29. As a visitor, I want to click anywhere on a row to open that Career, so that I never have to aim for the arrow.
30. As a visitor, I want to choose "Creative" or "Office" and see only those roles, so that I can focus on the work I do.
31. As a visitor, I want "All" active when I arrive and able to bring every role back, so that I can undo a filter.
32. As a visitor, I want filtering to happen in place without the page jumping or reloading, so that I keep my position.
33. As a visitor, I want the rows to dim while a filter is loading, so that I know my choice registered.
34. As a visitor, I want the Call To Action to stay put when I filter, so that the invitation is always beneath the list.
35. As a visitor on a phone, I want the heading, the filter, the rows and the Call To Action stacked, so that nothing is squeezed.
36. As a visitor on a phone, I want each row's title on top with its Employment Type and Category beneath and the arrow at the top right, so that long titles still fit.
37. As a visitor on a phone, I want the Filter Buttons to wrap onto a second line if needed, so that none is hidden.
38. As a keyboard user, I want the Category Filter to behave as one radio group, so that I can move between choices with the arrow keys.
39. As a keyboard user, I want focus to stay on the Filter Button I chose after the rows change, so that I am not thrown back to the top of the page.
40. As a keyboard user, I want each row to take focus once and turn Secondary when it has focus, so that I can see where I am.
41. As a screen reader user, I want the Category Filter announced as a group with a name, so that I know what the choices filter.
42. As a screen reader user, I want the rows announced as a list with a count, so that I know how many roles are open.
43. As a screen reader user, I want a filter change announced politely, so that I know the list changed without losing my place.
44. As a screen reader user, I want the section heading to be a heading above the row titles in the outline, so that I can navigate by headings.
45. As a screen reader user, I want the icons and the decorative photo skipped, so that each row is announced by its words only.
46. As a visitor who prefers reduced motion, I want the hover colour change kept, so that I still get the cue, since it is colour and not movement.
47. As a developer, I want the Block built from the existing section, eyebrow, alternate heading, rich text, button, picture and Filter Button components, so that there is one of each to maintain.
48. As a developer, I want the Filter Button to gain a black scheme and a no-dot option rather than a second filter component, so that the Case Study Grid and the Career List share one control.
49. As a developer, I want the filter done through Sprig the way the FAQ Accordion does it, so that there is one server-rendered pattern for Blocks that swap content.
50. As a reviewer, I want the Careers page seeded with a Hero, five Careers across both Categories and a Career List with the node's content, so that I can compare the Block against Figma on a page that reads normally.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `elementsCareer`, name "Elements - Career", colour blue, icon `briefcase`, added to the Blocks field in the General group. A Content tab with a Section Header heading element followed by the Eyebrow and Heading fields; a Section Content heading element followed by the new Entries - Career field; a Section Footer heading element followed by the new Call To Action field. A Settings tab with the Padding field.

**Fields.** Two new fields, approved in the request. **Entries - Career**, handle `entriesCareer`, an Entries field whose only source is the Career section, list view, selection label "Add a Career", no minimum or maximum; on this layout it carries the instructions "Leave empty to show every open Career, newest first." **Call To Action**, handle `callToAction`, a Content Block field holding the Image field, the Heading field, the Rich Text - Simple field attached as `text` with the label "Text", and the Button field, the same way the Footer CTA's Content Block attaches them. Eyebrow, Heading, Image, Rich Text - Simple, Button and Padding are reused as they are. The Employment Type dropdown's labels "Full Time" and "Part Time" become "Full-Time" and "Part-Time"; the values stay `fullTime` and `partTime` and the other options are unchanged.

**Which Careers.** With Careers picked, the Block shows the picks exactly, enabled ones only, in the field's order. With none picked, it shows every enabled Career in the Career section, newest post date first. There is no cap, no pagination and no Load More. A Filter Button narrows that same set to the Careers related to its Category, keeping their order.

**Category Filter.** Built from the Careers in play: "All" first, then one Filter Button per Category of the Career group that at least one of those Careers belongs to, in the group's structure order. "All" is active on arrival. Exactly one is active at a time. When the Careers in play use fewer than two Categories the whole filter is omitted. It is a fieldset with a visually hidden legend, "Filter careers by category", holding the Filter Buttons as one radio group. It wraps and never scrolls sideways; the Case Study Grid's carousel and arrows are not used.

**Filter Button.** The existing component gains two options without changing its current look: a `scheme`, `creme` (today's look, the default) or `black`, and a `dot` switch, on by default. The Career List uses the black scheme with the dot off: 20px by 15px padding, medium 16px text, filled Secondary with black text while checked, and a White 30% outline with white text otherwise, with the outline turning White under a fine pointer. The Case Study Grid is unchanged.

**Sprig.** The rows live in a Sprig component rendered by the Block, following the FAQ Accordion: the Block resolves the Careers in play to a comma-separated ID list and passes it, with a per-instance prefix of the Block's handle and entry ID, into the component. The component renders the Category Filter and the rows and re-renders itself when a Filter Button changes, with the chosen Category's slug. The address never changes and a reload returns to "All". The Eyebrow, the heading and the Call To Action are outside the component and never swap. The rows' list is the Sprig indicator: during a request it dims to 50% and ignores pointer events. The component's wrapper is `aria-live="polite"`. Focus stays on the chosen Filter Button through the swap. Two Career Lists on one page never share IDs.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding on the vertical axis and `paddingX` none, and its content inside the section's content block within the site margins. Inside, a black panel with 20px corners. Top to bottom: the Eyebrow row, the header row, the rows, the Call To Action. No Alpine.js beyond what Sprig and the Filter Button need; no JS block.

**Panel spacing.** Panel padding is 20px on the sides and bottom with 40px on top below `md`; 40px all round with 60px on top from `md`; 40px on the sides and bottom with 100px on top from `lg`, the node's measure. From the Rule to the header row is 30px, 50px from `lg`. From the header row to the first row is 30px, 40px from `lg`. Rows are 10px apart, and the Call To Action sits 10px beneath the last row.

**Eyebrow row.** The eyebrow component renders the Eyebrow in white with the Rule on in its White 30% colour, without an aside. An empty Eyebrow renders no row.

**Header row.** From `lg` a flex row: the heading on the left and the Category Filter on the right, aligned to the row's foot so the pills sit level with the heading's last line, 5px between pills. Below `lg` they stack, the filter 30px beneath the heading. The heading goes through the alternate heading component as an `h2` in Creme 100 with the Highlight in its `secondary` style, semibold with 0.97 leading and tighter tracking, at 4xl below `md`, 5xl from `md` and 6xl (55px) from `lg`, the node's size. An empty heading drops the heading; the filter then sits alone at the right. With the heading and the filter both absent the row renders nothing.

**Career Row.** A list, one item per Career, each item one link to the Career's URL: a `black-200` card with 20px corners and white text. From `lg` a twelve-column grid with 30px padding across and 102px tall at rest: the title across columns one to seven, the Employment Type in columns eight and nine, the Category in columns ten and eleven, and the arrow at the end of column twelve, all centred vertically. Below `lg` 20px padding: the title on top with the arrow pinned top right, the Employment Type and Category side by side beneath, 20px apart. The title is an `h3`, medium, 1.2 leading, tighter tracking, 2xl below `lg` and 3xl (30px) from `lg`. The Employment Type is the dropdown's label and the Category is the Career's first Category's title, each at 16px after a 12px Font Awesome Sharp Regular icon (clock and bullseye-arrow) 7px before it; a Career with no Employment Type or no Category drops that item. The arrow is a 42px circle with a White 30% outline holding a 14px arrow-up-right in Creme 100, rendered as a `span`, never a link of its own. Under a fine pointer's hover, and when the row has visible keyboard focus, the card turns Secondary, the text black, and the arrow circle filled White with a black arrow, over 300ms. The change is colour only, so it stays under reduced motion. No Cursor Label.

**Call To Action.** Rendered when its heading has text, as the panel's last row: a `black-200` card with 20px corners. From `lg` a row: the photograph on the left, 213px wide at `1x1`, inset 10px with 15px corners, cropped by its focal point; the heading 40px to its right; the text and a Button starting at column eight, with 30px padding on the right. At `md` the photograph and heading side by side with the text and button beneath. Below `md` stacked: a 120px photograph, the heading, the text, then the button, with 20px padding. The heading goes through the alternate heading component as an `h3`, beneath the section's `h2` like the row titles: Creme 100 with the Highlight in `secondary`, semibold, 3xl below `lg` and 5xl (46px) from `lg`. The text goes through the rich text component in Creme 100 at the body size, 548px wide at most. The Button goes through the button component in its `secondary` colour with the arrow-up-right icon. Without a photograph the heading moves to the left edge. The photograph has an empty alt.

**Keyboard.** The Category Filter is one radio group: Tab reaches it once, the arrow keys move between choices and trigger the swap. Each Career Row is one link and takes focus once, in list order, with nothing focusable inside it. The Call To Action's Button is its only focusable element. No focus handling is written beyond keeping focus on the chosen Filter Button through the swap.

**Accessibility.** The section heading is an `h2` and each row title an `h3`. The rows are a list, so the count is announced. Icons and the arrow circle are `aria-hidden`. A row's link is named by its contents. The filter is a named fieldset. The swap region is polite.

**Empty states.** No Careers in play (nothing picked and no enabled Careers, or every pick disabled): the Eyebrow, the heading and the Call To Action render; the Category Filter and the rows do not, and no message is added. An empty Eyebrow, heading or Call To Action drops its element and nothing else. With no Careers in play and the heading and Call To Action both empty, nothing renders at all, section included.

**Careers page content.** Seed files in the scratch folder for this spec. One writes to the Careers page's Hero field: a Hero Simple with the heading "Careers" and one line of text, so the page has its Hero and ADR-0001's top padding clears the Header; it is review content, not part of the Block. Five create Careers in the Career section, each with its Category and Employment Type, taken from the node: "USA Focused Senior Digital PR Manager" (Full-Time, Creative), "Head of Client Relations" (Part-Time, Office), "Account Manager" (Full-Time, Office), "Project Manager" (Full-Time, Creative), and "Digital PR Executive" (Full-Time, Creative), which replaces the node's second "Project Manager" so every row, slug and link is distinct. Post dates run newest first in that order so the fallback matches the node. The last writes to the Careers page's Blocks field: one Career List, padding Top and Bottom, Eyebrow "Our Open Positions", heading "Find your next job at *Marketing Signals*" with the Highlight on "Marketing Signals", no Careers picked, and the Call To Action with the node's photograph, the heading "Can't find a job perfect for your skillset?", the text "Whether you're an experienced professional or just starting your career, let us know what you could bring to Marketing Signals. We could be looking for someone like you." and a button "Say hello" linking to the Contact page by its slug `contact-us`. The photograph has been saved to the scratch folder from the node. Seeds are not committed.

**Styleguide.** No new preview. The Filter Button has none today, and both of its looks are proven on the pages that use them.

**Docs.** `CONTEXT.md` gained the "Career List" section and the widened Category Filter and Filter Button during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Careers page at `/careers` through the global layout, with the Hero Simple, the five Careers and the Career List seeded. The Block and its Sprig component are the new code, and everything they compose (the Filter Button, the eyebrow, the alternate heading, the rich text, the button, the picture) is proven through it. The secondary seams are the Case Study Grid at its listing page, proving the Filter Button's default look did not move; the Seed command's own output; and the control panel's view of the Block's fields.

**What good evidence looks like.** It shows what a visitor would see and do: the panel at the designed size, the header row with the pills level with the heading's foot, the five rows with their meta columns aligned, a row in its Secondary hover, the rows narrowed by each Filter Button and restored by All, the Call To Action unchanged through a filter, the stacked layout at tablet and phone, and the empty states. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is the Careers page on `main` at the commit the branch forked from, which renders nothing between the Header and the Footer.

**Prior art.** The Case Study Grid spec's evidence plan, which proved the Category Filter swap, and the FAQ Accordion spec's, which proved a Sprig swap inside a Block.

**Evidence plan.**

1. Careers page at 1600, full page, the Block at rest: the black panel inside 40px margins, the Eyebrow "Our Open Positions" over its White 30% Rule, 50px to the 55px heading with "Marketing Signals" in Secondary, the three pills on the right level with its last line with "All" filled, 40px to five 102px rows 10px apart with their titles, Employment Types and Categories aligned in columns, and the 255px Call To Action with its photograph, heading, text and "Say hello" button, compared against the Figma node. Proves the desktop layout.
2. Careers page at 1600, viewport, pointer over the second row: the row Secondary with black text and a white filled arrow, the other rows unchanged. Proves the hover.
3. Careers page at 1600, viewport, after choosing "Office": two rows, "Head of Client Relations" and "Account Manager", "Office" filled and "All" outlined, the Call To Action unchanged, the address still `/careers`. Then "Creative": three rows. Then "All": five rows. Proves the filter and that the address never changes.
4. Careers page at 1600, a click on the first row: that Career's page at its `/career/` address. Proves each row links to its own Career.
5. Careers page at 1024, viewport, the Block at rest: the header row side by side and the rows in their column layout. Proves the `lg` step.
6. Careers page at 768, full page: the filter beneath the heading, the rows stacked with the arrow top right, the Call To Action's photograph and heading side by side over its text and button. Proves the `md` step.
7. Careers page at 390, full page: the Eyebrow, the 40px heading, the pills wrapping, the stacked rows and the stacked Call To Action with its 120px photograph, 20px panel padding. Proves the mobile stack.
8. Careers page at 1600, keyboard: Tab from the Header reaches the Category Filter once, the right arrow moves to "Creative" and swaps the rows with focus kept on "Creative"; Tab then reaches the first row, drawn Secondary with a visible outline, then each row in order, then the "Say hello" button. Proves the focus order.
9. Served HTML of the Careers page: the Block's section holding the eyebrow, an `h2`, a fieldset with a legend and radio inputs, an `aria-live` region holding a list of five items, each item one link holding an `h3` and the two meta items with hidden icons and a hidden arrow `span`, no link or heading nested inside a row; the Call To Action's heading an `h3`. Proves the markup.
10. Case Study Grid at 1600, viewport, the Category Filter at rest: the Filter Buttons exactly as on `main`, radar dots and creme outlines. Proves the default Filter Button look did not move.
11. Careers page at 1600 with a temporary pick of the two Office Careers: two rows, no Category Filter. Restored afterwards. Proves picks and the one-Category rule.
12. Careers page at 1600 with every Career temporarily disabled: the Eyebrow, the heading and the Call To Action, no filter, no rows, no message. Restored afterwards. Proves the empty state.
13. Careers page at 1600 with the Call To Action's photograph temporarily removed: the heading at the card's left edge. Then with its heading emptied: no Call To Action. Restored afterwards. Proves the Call To Action's empty states.
14. Control panel, the Block's edit form: "Elements - Career" in the Blocks field's General group, the Section Header, Section Content and Section Footer headings, the Career picker offering only the Career section with "Add a Career" and its instructions, the Call To Action's four fields, Padding on the Settings tab; and a Career's form showing the Employment Type options "Full-Time" and "Part-Time". Proves the entry type and fields.
15. Seed command output for every Careers Seed, each run twice: the Hero Simple, the five Careers with their Categories and Employment Types, and the Career List with its photograph created on the first run, all skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- The Career page itself. Rows link to `/career/{slug}`, which renders through the Blocks template and is empty until a later spec designs it.
- A Cursor Label on the rows.
- Putting the filter in the address, deep links to a filtered view, or restoring a filter on reload.
- Pagination, Load More or a cap on the number of rows.
- A message when no Careers are open.
- A colour or layout option on the Block, or a light panel.
- A location, salary, closing date or any Career field beyond the title, Employment Type and Category.
- The Case Study Grid's Category Filter: its carousel, arrows, All Work label and page reset are unchanged.
- A dedicated mobile or tablet design. The responsive rules follow the decisions above until a mobile node exists.
- Committing the Seeds or their photograph.

## Further Notes

- The node's rows are 1440 wide at x 80 on the 1600 frame, 40px inside the 1520 panel on each side, so the panel's side padding is 40px and the rows fill its width.
- The meta columns start at x 932 and x 1193 and the arrow ends at x 1490 on the frame, which is columns eight, ten and the end of twelve of the page's twelve-column grid within a 30px row padding.
- The Call To Action's photograph is 213 by 235 in the node (0.91); `1x1` is the nearest common ratio and was chosen in the grilling session.
- The pills in the node are "Button / Pill / Text / Regular / Secondary" and "... / White 30% Outline" instances, which is the Filter Button's black scheme, not the button component: they are one radio group, not independent controls.
- The node's "Full-Time" and "Part-Time" are what led to hyphenating the Employment Type labels.
