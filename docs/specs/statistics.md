# Statistics

Spec for the Statistics Block: two to four Statistics in a row, each a number that counts up as it scrolls into view, with a Suffix at its top right and Statistic Text beneath, separated by Dividers. It is the first caller of the statistic component and the second Block on the Home page.

Design: Figma node `9797-18372` in the Marketing Signals file, 1600 wide. No mobile node exists; the responsive rules below are decisions, not measurements.

Related: the Heading Image Grid spec, which this Block follows on the Home page, and the Content Seeding spec, which puts it there. ADR-0001 does not apply: the Block is in flow beneath the Heading Image Grid. Vocabulary: `CONTEXT.md`, "Blocks" section, which gained the Statistics terms during the grilling session.

## Problem Statement

The Home page shows a heading over two photographs and then the footer. The design follows that with a row of four big numbers, the proof of the agency's track record, and editors have no Block to build it with. The statistic component that animates a number exists in the components folder but nothing calls it, it cannot render the design's 160px size, and its colours are not the brand's.

## Solution

A Statistics Block editors can add to any page. It holds two to four Statistics. Each Statistic is a number the editor types, an optional Suffix such as M or +, and an optional Statistic Text. At desktop the Statistics share the row equally, four, three or two columns, with a 1px black Divider between neighbours. Below the `lg` breakpoint they stack in one column with a horizontal Divider between them. Each number counts up through the existing statistic component when it scrolls into view; the Suffix and Statistic Text are static. The Home page gets one instance with the four Figma Statistics, added through the Seed command so the review starts from real content.

## User Stories

1. As a visitor, I want a row of large numbers with a line of text under each, so that a page can show the agency's track record at a glance.
2. As a visitor, I want each number to count up as it comes into view, so that the row feels alive rather than printed.
3. As a visitor, I want the Suffix picked out in the brand colour at the top right of the number, so that "5M" and "30+" read as one figure.
4. As a visitor, I want a Divider between neighbouring Statistics, so that four figures read as four cells rather than one line.
5. As a visitor, I want the Statistics to share the full width whether there are two, three or four, so that a row of three does not leave a hole on the right.
6. As a visitor with a phone, I want the Statistics stacked one above the other with a Divider between them, so that each number is large enough to land.
7. As a visitor with a laptop, I want the numbers sized so that "700+" stays inside its cell, so that nothing overlaps or wraps.
8. As a visitor with a large screen, I want the numbers at the designed 160px, so that the row has the weight the design intends.
9. As a visitor, I want the number, Suffix and Statistic Text centred in their cell, so that the row reads as designed.
10. As a visitor, I want the layout complete before the animation starts, so that the row does not jump when the numbers settle.
11. As a screen reader user, I want each Statistic read as its full figure and text, so that a counting animation does not read as a list of every digit.
12. As an editor, I want a Statistics Block in the Blocks menu, so that I can add it to any page.
13. As an editor, I want to add Statistics as cards inside the Block, so that each one is a small, obvious unit.
14. As an editor, I want each card to show its number, Suffix and text on its face, so that I can tell them apart without opening them.
15. As an editor, I want the number, Suffix and text as three plain text fields, so that there is nothing to learn.
16. As an editor, I want the Suffix separate from the number, so that the letter does not spin through the digits.
17. As an editor, I want the number field required, so that I cannot save an empty cell.
18. As an editor, I want the Block to refuse fewer than two or more than four Statistics, so that I cannot build a layout that has no design.
19. As an editor, I want field instructions that say which characters animate, so that I know why a figure like "1.5bn" shows without counting.
20. As an editor, I want a figure with an unsupported character to still render, so that a typo does not break the page.
21. As an editor, I want the Block's fields under Section Content, so that it reads like every other Block.
22. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
23. As an editor, I want the Home page to already carry this Block with the designed content, so that I see how it is meant to look.
24. As a developer, I want the Block to reuse the existing Text field three times with handle overrides, so that the field list stays small.
25. As a developer, I want the statistic component to gain a 13xl size and take the brand's colour and weight, so that it renders the design and any later caller inherits the right look.
26. As a developer, I want the component to fall back to a static number when it meets a character it cannot animate, so that every caller gets that safety without checking for itself.
27. As a developer, I want the Home page content added by a Seed rather than by hand, so that the review environment is reproducible.

## Implementation Decisions

**Entry types.** A new Block entry type, handle `statistics`, name "Statistics", colour blue, icon `chart-bar`, added to the Blocks field in the General group. It follows the Template entry type's structure: a Content tab with a Section Content heading element followed by the Statistics field; a Settings tab with the Padding field. Section Header and Section Footer are omitted because the design has neither. An inner entry type, handle `statistic`, name "Statistic", colour purple, icon `hashtag`, with no title field, holds the three fields and a card label that shows the number, Suffix and text together.

**Fields.** One new field, the Statistics Matrix, handle `statistics`, holding the Statistic entry type only, minimum two and maximum four entries, card view, create button "New Statistic". Its instructions: "Two to four Statistics sharing the row equally. A Statistic counts up on screen using digits and . , : % + £ M B K; anything else shows without the animation." Inside the Statistic entry type the existing Text field is reused three times with handle overrides: `statistic` labelled "Statistic" and required, `statisticSuffix` labelled "Statistic Suffix", `statisticText` labelled "Statistic Text". No other new or renamed fields.

**Statistic component changes.** The component is unused, so its base style changes rather than gaining a variant: the text colour becomes the project's black and the weight semibold with tighter tracking. The size map gains a `13xl` entry that ramps 82px at mobile, 92px from `lg`, 120px from `xl` and 160px from `2xl`, with leading 0.92, so three digits and a Suffix fit a cell at every width. The component checks the value against its own character array before animating: if any character is missing it renders the static branch, which is fixed to join its classes and to carry the same size and style as the animated one. The animated markup is hidden from assistive technology and the full figure is provided for screen readers, so a counting number reads once as its value.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding, and its content inside the section's content block. No Alpine of its own; the statistic component carries the animation. The Block renders every Statistic that has a number, in order, and counts those to pick the desktop column rule from an options map: two, three or four equal columns. A count outside that range falls back to four columns and wraps, which the control panel's limits should make unreachable.

**Cell layout.** One column below `lg`, the counted columns from `lg`, no gap, so Dividers touch. Each cell centres its content: a row of the number and the Suffix, top-aligned so the Suffix sits at the number's cap height, then the Statistic Text beneath. The Suffix is the 2xl token, medium, primary colour, tighter tracking, dropping to the lg token below `lg`. The Statistic Text is the base token at leading 1.33 in black. The text sits 40px beneath the number's line box from `lg` (Figma: 50px from the number's baseline to the text's cap, of which the line box's descender space covers about 10px) and 20px below it when stacked. The Suffix is static; only the number animates. Each statistic component instance gets an id built from the Block's id and the loop index so its selectors stay unique across Blocks.

**Dividers.** From `lg`, a 1px black right border on every cell but the last, full cell height because the grid stretches cells to the row. Below `lg`, a 1px black bottom border on every cell but the last, with vertical padding either side so the stacked rhythm matches the row's.

**Empty states.** A Statistic without a number is skipped. A Block with no renderable Statistics renders nothing at all, section included.

**Home page content.** One Statistics Block after the Heading Image Grid in the Home page's Blocks, padding Top and Bottom, with four Statistics: 5 with Suffix M and text "Organic links created"; 30 with + and "Awards & Nominations"; 700 with + and "Projects (and counting)"; 40 with no Suffix and "Team of (remote) experts". Added with the Seed command from a Seed file under the scratch folder; the Seed is not committed.

**Docs.** `CONTEXT.md` gained the Statistics vocabulary during the grilling session. No new ADR: none of the Block's decisions is hard to reverse.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Home page through the global layout, with the Block seeded beneath the Heading Image Grid. The Block is the statistic component's only caller, so the component's changes are proven through it; the styleguide has no statistic preview and gains none here.

**What good evidence looks like.** It shows what a visitor would see: four cells with Dividers at the designed sizes, the Suffix at the number's cap, the numbers settled at their values after counting, the stacked mobile layout, and the two- and three-column rules. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is the Home page with the Heading Image Grid alone.

**Evidence plan.**

1. Home page at 1600, full page, after the numbers have settled: the Block compared against the Figma node for number size, Suffix size and colour, Statistic Text, Divider and cell widths. Proves the desktop layout.
2. Home page at 390, full page: Statistics stacked with a horizontal Divider between each, numbers at 82px. Proves the mobile layout.
3. Home page at 1024, viewport on the Block: four columns, numbers at 92px, "700+" inside its cell. Proves the `lg` step of the ramp.
4. Home page at 1280, viewport on the Block: numbers at 120px. Proves the `xl` step of the ramp.
5. Home page at 1600, viewport on the Block as it enters the viewport and again two seconds later: dashes first, final values after. Proves the count-up.
6. Home page at 1600 with a temporary three-Statistic Seed: three equal columns filling the width with two Dividers. Proves the three-column rule. Removed afterwards.
7. Home page at 1600 with a temporary two-Statistic Seed: two equal columns with one Divider. Proves the two-column rule. Removed afterwards.
8. Home page at 1600 with a temporary Statistic of "1.5bn": the figure renders static, and the browser console shows no error. Proves the unsupported character fallback. Removed afterwards.
9. Control panel: saving the Block with one Statistic, and with five, is refused. Proves the entry limits. Command output or a screenshot of the validation message.
10. Rendered HTML of the Home page: each Statistic's full figure is available to assistive technology once and the animated characters are hidden from it; no inline styles. Proves the accessibility story.
11. Seed command output for the Home Seed, run twice: created on the first run, skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- Rewriting the statistic component to the coding standards: refs instead of query selectors, `init()` instead of `x-init`. It works as it is and gets its own ticket.
- Reduced motion. The component ignores the preference; the fix belongs with that rewrite, through GSAP's match media.
- A Section Header or heading above the row. The design has none; adding one later is a field-layout change.
- Layouts for one Statistic or for five or more. The Matrix limits prevent them.
- A two-column tablet stage. The row starts at `lg` and everything below stacks.
- Tailwind's `ordinal` for the Suffix. It only affects ordinal indicators after a digit and would not touch M or +.
- Committing the Seed.

## Further Notes

- Figma's cells are 167px tall; the height here is content-driven, which lands within a few pixels at 1600 and follows the number size elsewhere.
- Figma's number tracking is -6.4px at 160px, exactly the tighter tracking token; the Suffix at -1px on 25px matches it too.
- The ramp tops out at `2xl` (1536px) rather than the `3xl` Figma width because a 364px cell already fits "700+" at 160px.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
- The component's previous zinc colour and medium weight were template defaults, not a brand decision, which is why the base style changes rather than gaining a variant.
