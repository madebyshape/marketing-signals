# Audit - CTA

Spec for the Audit CTA Block: a black panel inside the site margins holding an Eyebrow with its Rule over a heading with the Highlight, a short text whose bullets render as Ticked Items, and a Button, beside a photograph with the Chart Card tilted across its bottom-right corner. The Chart Card is a Badge, a heading, a set of Bars and a Footnote. It is the first Block on the site to tilt anything, the first to draw a value as a width, and the first to put a Craft Content Block inside a Block's field layout.

Design: Figma node `9974-15558` in the Marketing Signals file, a group named "Group 46380" at x 40, y 4795, 1520 by 774 on a 1600 frame. No hover frame, no tablet frame and no mobile frame exist for this node, so everything below the desktop breakpoint is a decision, not a measurement.

Branch: feature/audit-cta

Related: the Banner CTA spec, whose black panel inside the site margins, `paddingX: 'none'` handling and site-margin-inside-the-section pattern this Block copies exactly; the Video CTA spec, whose white Eyebrow with a `white-30` Rule on a black panel this Block reuses unchanged; the Eyebrow, Heading & Text spec, whose way of attaching the simple rich-text field under the handle `text` this Block copies; the Statistics spec, whose Matrix-of-rows shape the Bars follow and whose Block-owns-its-own-repeating-markup approach the Chart Card follows; the Content Rows spec, which owns the existing `check` list option that this spec leaves untouched. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, the new "Audit CTA" section, which gained Audit CTA, Chart Card, Badge, Bar, Track, Footnote and Ticked Item during the grilling session; the Eyebrow, the Rule, the Highlight and the Block slots are as already defined.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The agency's audit is its main paid entry point and the site has no way to sell it. Banner CTA is the only black-panel CTA Block, and it offers a heading, a short text, one Button and a Cutout — enough to point somewhere, not enough to explain what a buyer receives. The audit needs four things on one panel that no Block provides together: a list of what is included, evidence that the agency measures what it claims to measure, a photograph that makes the offer feel human, and a single Button. Editors today would have to stack three Blocks to approximate it, and the result would neither carry the tilted Chart Card the design is built around nor keep the list and the evidence side by side.

## Solution

A new Block, the Audit CTA, that editors add to any page from the Blocks field. On a black panel inside the site margins it puts an Eyebrow with its Rule across the top, then a left column of a heading with the Highlight, a short rich text whose bullet lists render as Ticked Items, and a Button. Beside that column sits a photograph, and tilted across the photograph's bottom-right corner sits the Chart Card: a Badge, a question as its heading, one Bar per row the editor added, and a Footnote. Each Bar is a label, its percentage written out, and a Track filled to that percentage — the fill is computed from the value the editor set, so the chart always tells the truth. The Bars fill from zero as the panel scrolls into view, and stay put for a visitor who prefers reduced motion. From the desktop breakpoint the columns sit side by side, the photograph tilted a little one way and the Chart Card the other. Below it everything stacks into one column and nothing is tilted.

## User Stories

1. As an editor, I want to add an Audit CTA Block to any page from the Blocks field, so that I can sell the audit wherever a page builds up to it.
2. As an editor, I want the Block listed as "Audit - CTA" beside "Banner - CTA", so that I can tell the two black-panel CTA Blocks apart.
3. As an editor, I want to write a short Eyebrow across the top of the panel, so that visitors know which offer they are reading about.
4. As an editor, I want the Eyebrow underlined by the Rule in white at 30%, so that the panel matches the Video CTA and the Career List.
5. As an editor, I want to leave the Eyebrow empty, so that the panel can start straight with the heading.
6. As an editor, I want to write a heading and mark words italic to Highlight them, so that the key phrase stands out in Secondary.
7. As an editor, I want a rich text field beneath the heading, so that I can explain the offer in a short paragraph.
8. As an editor, I want a bullet list in that field to render as Ticked Items, so that what the buyer receives reads as a checklist without me formatting anything.
9. As an editor, I want the Ticked Items in one column, so that each line stays readable in the narrow left column.
10. As an editor, I want to leave the text empty, so that the heading can stand alone above the Button.
11. As an editor, I want one Button beneath the text, so that there is exactly one thing to do on the panel.
12. As an editor, I want to leave the Button empty, so that the panel can be informational on a page that already has its CTA.
13. As an editor, I want to choose the photograph, so that the panel can carry the right person for the page.
14. As an editor, I want to leave the photograph empty, so that the Chart Card can carry the panel on its own.
15. As an editor, I want the Chart Card's fields grouped as one card in the control panel, so that I can see it is one thing rather than four loose fields.
16. As an editor, I want a Badge at the top of the Chart Card, so that I can say what the chart is showing.
17. As an editor, I want a heading on the Chart Card, so that the chart answers a question rather than floating.
18. As an editor, I want to add as many Bars as I like, so that the card can show three engines or seven.
19. As an editor, I want each Bar to have a label and a percentage, so that I can describe what is measured and how it scored.
20. As an editor, I want the percentage field to refuse anything that is not a number from 0 to 100, so that I cannot save a value that would draw a wrong chart.
21. As an editor, I want the Bar's Track filled to exactly the percentage I typed, so that the chart matches the number beside it.
22. As an editor, I want a Footnote under the Bars, so that I can qualify sample figures honestly.
23. As an editor, I want to leave the Footnote empty, so that real figures need no disclaimer.
24. As an editor, I want a Chart Card with no Bars to render nothing, so that an unfinished card never shows an empty lilac rectangle.
25. As an editor, I want to set the Block's vertical padding from its Settings tab, so that it spaces like every other Block.
26. As an editor, I want the fields laid out under the Section Header and Section Content headings, so that the Block reads like every other Block in the control panel.
27. As a visitor on a desktop, I want the heading, text, Ticked Items and Button in a column on the left and the photograph on the right, so that I can read the offer and see the person in one glance.
28. As a visitor on a desktop, I want the Chart Card tilted across the photograph's corner, so that the panel feels designed rather than laid out.
29. As a visitor on a desktop, I want the Bars to fill from zero as the panel arrives, so that the chart draws my attention to the numbers.
30. As a visitor who prefers reduced motion, I want the Bars already filled and still, so that I get the whole chart without movement.
31. As a visitor with JavaScript off or failing, I want the Bars already filled, so that the chart is never blank.
32. As a visitor on a tablet, I want the whole panel in one column with nothing tilted, so that the Chart Card is readable at its full width.
33. As a visitor on a phone, I want the panel's padding to tighten and the heading to step down, so that nothing is squeezed against the panel edge.
34. As a visitor, I want each Bar's percentage written beside its label, so that I can read the exact figure rather than estimate it from a line.
35. As a screen reader user, I want each Bar announced as its label and its percentage, so that I get the chart without the decorative line.
36. As a screen reader user, I want the Block's heading to be a heading and the Chart Card's to be one level below it, so that I can navigate the page by headings.
37. As a screen reader user, I want the photograph skipped, so that the panel is announced by its words alone.
38. As a keyboard user, I want the Button to be the only thing in the panel that takes focus, so that tabbing through the page is quick.
39. As a developer, I want the Block built from the existing eyebrow, alternate heading, rich text, button, badge and picture components, so that there is nothing new to maintain but the Chart Card's own markup.
40. As a developer, I want the Bar's width to travel through a CSS custom property, so that the Block carries no inline style rules.
41. As a developer, I want the animation to use the GSAP and ScrollTrigger already on `window`, so that the Block adds no dependency.
42. As a reviewer, I want the Playbook Listing page seeded with an Audit CTA holding the node's content, so that I can compare the Block against Figma on a page that reads normally.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `auditCta`, name "Audit - CTA", colour blue, icon `chart-simple`, added to the Blocks field in the General group beside "Banner - CTA". A Content tab with a Section Header heading element followed by the Eyebrow field, the Heading field, the Rich Text - Simple field attached with the handle `text` and the label "Text", and the Button field; then a Section Content heading element followed by the Image field and the Chart field. A Settings tab with the Padding field. No Section Footer: the Button belongs to the left column, not beneath the content, so it sits in the Section Header with the words it follows.

**The name.** `auditCta` breaks the shape-first naming of the other Blocks (`bannerCta`, `videoCta`, `gridBlog`) in favour of the offer it sells. This was raised in the grilling session and chosen deliberately: the Block is single-purpose for the audit. A reviewer citing the naming convention should find this paragraph rather than a breach.

**Fields.** Eyebrow, Heading, Button, Image and Padding are reused as they are. The global Text field is plain text, so the Block attaches Rich Text - Simple under the handle `text`, as Eyebrow Heading Text and Blog Grid do. Two new fields:

- **Chart**, handle `chart`, a `craft\fields\ContentBlock` with `viewMode: grouped`, built the way Avatar Group is built. Its layout holds `badge` (the global Text field, label "Badge"), `heading` (the Heading field, label "Heading"), `bars` (the new Bars field) and `text` (the global Text field, label "Footnote"). The Content Block namespaces its handles, so its `text` and the Block's own `text` never collide.
- **Bars**, handle `bars`, name "Bars", a Matrix holding the new Bar entry type, `minEntries: 1`, no maximum, `viewMode: blocks`, create button "New Bar", instructions naming that a Bar's line is drawn from its Value.

**Bar entry type.** Handle `bar`, name "Bar", colour purple, icon `chart-simple`, `uiLabelFormat: '{barText} {barValue}%'`. Its Content tab holds `barText` (the global Text field, label "Label", required) and `barValue` (the new Percentage field, label "Value", required).

**Percentage field.** A new `craft\fields\Number` field, handle `percentage`, name "Percentage", min 0, max 100, zero decimals, suffix `%`. Statistics stores its figure in the global Text field and only ever prints it; this value drives a width, so a non-numeric or out-of-range entry would silently draw a wrong chart. The control panel refusing it is cheaper than the template defending against it. The field is generic enough to be reused by a later Block, and its handle says what it accepts.

**Block template.** Follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding on the vertical axis and `paddingX: 'none'`, the site margin re-applied on a wrapper inside, then the panel. This is Banner CTA's structure exactly. The panel is `rounded-[20px]` on the `black` token. The Chart Card's markup lives inline in the Block, as Statistics builds its cells inline, because nothing else on the site draws a Bar.

**Panel and its padding.** The panel fills the content width inside the site margins. Its padding is 40px on every side from the desktop breakpoint, and 25px below it. The node draws the Eyebrow's Rule 40px from the panel's left edge and 60px from its right; the asymmetry is a Figma artefact and the Block uses 40 on both sides.

**Eyebrow row.** The eyebrow component renders the Block's Eyebrow in white with the Rule on in `white-30`, without an aside — the same call Video CTA makes. An empty Eyebrow renders no row. From the desktop breakpoint there is 150px from the Rule to the heading's cap, which is what the node measures (the Rule at 4866, the heading's cap top at 5016); below it, 50px.

**Left column.** From the desktop breakpoint it is five of the panel's twelve columns with the section's 20px gap, which is 588px of the node's 1440px inner width — the node's measurement exactly. Below the desktop breakpoint it is the full panel width. Top to bottom: the heading, 30px, the text, 40px, the Button. The heading goes through the alternate heading component as an `h2`, colour `white`, the Highlight in `secondary`, semibold with 0.97 leading and tighter tracking. The size ramp is `4xl` below `md`, `6xl` from `md` and `7xl` (62px) from `lg`, the node's size. The Button goes through the button component with its default `secondary` colour and `base` size, which is the node's pill and icon unchanged. An empty heading, text or Button drops that element and closes the gap.

**Ticked Items.** The text goes through the rich text component in `white` at the base size with a new list option, `check-single`. The existing `check` option is `grid-cols-1 md:grid-cols-2`; this Block's column is too narrow for two, so `check-single` is `grid-cols-1` with the same `gap-y-3.75` and no breakpoint step. The tick mark, its 19px Secondary circle, its 10px black check and the 7px gap are the component's existing `mark` and are not changed — they already match the node exactly. `check` itself is not touched, so Content Rows and the Case Study page are unaffected.

**Media column.** From the desktop breakpoint a relative column beside the left column holding the photograph in flow and the Chart Card positioned absolutely at its bottom right, offset to overlap. Below the desktop breakpoint both are static and full width, the photograph first, and the overlap disappears.

**Photograph.** Through the picture component with the `8x9` transform, an empty alt and `object-cover`, on a `rounded-[30px]` frame filled `primary` behind it, which shows only while the image loads or when no image is set. Unrotated the node draws it 497 by 562, which is 0.884; `8x9` is 0.889. The coding standards prefer a common ratio to a pixel-derived one, and `8x9` is read here as a clean small ratio rather than a bespoke pair — `4x5` would crop 8% off a portrait. From the desktop breakpoint it is rotated 2 degrees; below it, not at all.

**Chart Card.** 345 by 385 from the desktop breakpoint, `rounded-[30px]` on the `secondary` token, 30px padding, rotated minus 4 degrees, its bottom-right corner 40px from the panel's right edge and 14px from its bottom. Below the desktop breakpoint it is full width, auto height, not rotated, and follows the photograph. Inside, top to bottom: the Badge, the heading, the Bars, the Footnote. A Chart Card with no Bars renders nothing at all, Badge and heading included.

**Badge.** Through the badge component, which gains two things for this Block: a colour `white-20-black`, being `bg-white/20` with `backdrop-blur-[2px]`, a transparent border and black text; and a size `xs`, being `text-2xs` with `px-2 py-1.25` and no border. The node's instance is the Figma component "Tag / XS / Text / White 20% + Black Text", so this is a real design-system variant rather than a one-off. The existing `white-20` colour renders white text and is left alone; no existing caller changes.

**Chart Card heading.** Through the heading component as an `h3`, `text-xl` (23px), medium, black, tighter tracking — one level below the Block's `h2`.

**Bars.** One row per Bar, 42px apart. Each row is the label at `text-xs` medium black over the Track, with the percentage at `text-2xs` regular black right-aligned on the label's line. The Track is 3px tall, the card's inner width, `rounded-full`, black at 15%. The fill is 3px, `rounded-full`, solid black, its width a percentage of the Track.

**The node's own Bars are not a measurement.** The node draws 62% as 181 of 280, 48% as 114, 71% as 213, 34% as 114 and 56% as 114 — three different values share one width. They are hand-drawn decoration. The fill is computed from the Bar's Value and nothing else.

**How the width is set.** The Value travels to the element as a CSS custom property, `--bar-fill`, and the fill's width reads it through a Tailwind arbitrary property, exactly as the picture component sets `--aspect-ratio` and reads it with `aspect-(--aspect-ratio)`. The "No inline styles" standard names this as the way to carry a computed value, so the Block carries no style rules of its own and no `{% css %}` block.

**Animation.** The fill renders at its final width in the markup, so it is correct with no JavaScript and under reduced motion. Inside `gsap.matchMedia().add('(prefers-reduced-motion: no-preference)', …)` the Bars tween `from` a zero width on a ScrollTrigger fired by the panel, once, in order with a small stagger. GSAP and ScrollTrigger are already registered and on `window`, so the Block adds no dependency. The Alpine logic is a small inline `x-data` in a `{% js %}` tag, using `$refs`, not `querySelector`. The closest prior art, the Statistic, does not respect reduced motion; this Block does, and the Statistic is not changed by this spec.

**Accessibility.** Each Bar is announced as its label and its percentage, both of which are visible text; the Track and its fill are `aria-hidden`. No ARIA meter or progressbar role is used — visible text beats an ARIA value. The Block's heading is an `h2` and the Chart Card's an `h3`. The photograph has an empty alt. The Button is the only focusable thing in the panel.

**Empty states.** No heading, no Block — the panel does not render at all, as Banner CTA gates on its heading. Within it every part drops independently: no Eyebrow drops the row; no text drops the text; no Button drops the Button; no image leaves the `primary` frame carrying the Chart Card; no Bars drops the whole Chart Card; no Badge or Footnote drops that line. An editor mid-edit never sees a broken panel.

**Review page content.** One Seed file in the scratch folder for this spec, targeting the Playbook Listing page's Blocks field: one Audit CTA with padding Top and Bottom, the Eyebrow "The Audit", the heading "See where your *brand stands.*" with the Highlight on the second line, the text as the node's paragraph followed by its four bullets ("Prompt-level breakdown of where your brand is and isn't being cited", "Direct comparison against your priority competitors", "Technical, content, schema and entity gaps holding back your retrieval share", "Prioritised action plan against the framework above"), the Button "Request your audit", an image, and the Chart with the Badge "AI Visibility Snapshot", the heading "How visible is your brand across generative engines?", five Bars (ChatGPT Citations 62, Perplexity Citations 48, Claude Citations 71, Gemini Citations 34, AI Mode Citations 56) and the Footnote "Sample data · Your full report at delivery". The Playbook Listing page template is in flight on `main` from another session at the time of writing; if its template has no Blocks loop when the branch is built, the Seed targets a settled page instead and the PR says which. Seeds are not committed.

**Styleguide.** The badge component's styleguide preview gains the new `white-20-black` colour and `xs` size. The Chart Card has no preview: it is Block markup, not a component.

**Docs.** `CONTEXT.md` gained the Audit CTA section during the grilling session, defining Audit CTA, Chart Card, Badge, Bar, Track, Footnote and Ticked Item. No new ADR: every decision here is a template or config change that can be reversed in an afternoon.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Playbook Listing page at `/playbooks` through the global layout, with the Audit CTA seeded. The Block is the only new template code, and everything it composes — the eyebrow, the alternate heading, the rich text with its new list option, the button, the badge with its new variant, the picture — is proven through it. The secondary seams are the Seed command's own output and the control panel's view of the Block's fields, which is where the new Content Block, Matrix and Number field are proven.

**What good evidence looks like.** It shows what a visitor would see: the black panel inside the site margins, the white Eyebrow over its Rule, the 62px heading with "brand stands." in Secondary, the paragraph and four Ticked Items in one column, the Secondary Button, the tilted photograph, the tilted Chart Card across its corner with its Badge, question, five Bars and Footnote, each Bar's fill matching its written percentage. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is `/playbooks` on `main` at the commit the branch forked from.

**Prior art.** The Banner CTA spec's evidence plan, which proved the same black panel at the same widths, and the Statistics spec's, which proved a Matrix-driven row of figures.

**Evidence plan.**

1. `/playbooks` at 1600, full page, scrolled to the Block at rest: the panel 1520 wide with 20px corners inside 40px margins, the Eyebrow "The Audit" over its white 30% Rule 40px inside the panel, 150px down to the 62px heading across five of twelve columns with "brand stands." in Secondary, the paragraph, the four Ticked Items one to a line 36px apart with their Secondary circles and black ticks, the Secondary "Request your audit" pill, the photograph tilted 2 degrees, and the Chart Card tilted minus 4 degrees across its bottom-right corner, compared against the Figma node. Proves the desktop layout.
2. `/playbooks` at 1600, viewport, the Chart Card only, at rest: the Badge in white 20% with black text, the 23px question, five Bars 42px apart each with its label, its percentage right-aligned and its Track filled, and the Footnote. Proves the Chart Card against the node.
3. Measured in the browser and reported, not captured: each Bar's fill width as a percentage of its Track, against its written value — 62, 48, 71, 34, 56 within a pixel. Proves the fill is computed from the Value and not copied from the node's inconsistent artwork.
4. `/playbooks` at 1600, scrolled so the panel enters from below: the Bars at zero, then filling to their values once. Captured as a before and after pair at the same scroll position. Proves the animation.
5. `/playbooks` at 1600 with reduced motion emulated, viewport, the panel scrolled into view: every Bar already at its value, nothing moving. Proves the reduced-motion rule.
6. `/playbooks` at 1600 with JavaScript disabled, viewport: every Bar already at its value. Proves the Bars are correct without JavaScript.
7. `/playbooks` at 1024, checked in the browser and reported, not captured: the desktop layout holding, the heading at `7xl`, both tilts present. Proves the `lg` step is the last width that tilts.
8. `/playbooks` at 768, full page, the Block at rest: one column, the heading at `6xl`, the photograph full width beneath the Button, the Chart Card full width beneath the photograph, nothing tilted, no overlap, panel padding 25px. Proves the stack.
9. `/playbooks` at 390, full page, the Block at rest: the same stack with the heading at `4xl`, the Ticked Items still one to a line, no horizontal scroll anywhere on the page. Proves the mobile step and that the straightened card does not overflow.
10. Served HTML of `/playbooks`, checked and reported in the PR body, not dumped: the Block's section holding the eyebrow, an `h2`, a rich text whose `ul` carries the single-column classes, a button, a `picture`, and the Chart Card with a badge, an `h3`, a list of five rows each carrying a label, a percentage and an `aria-hidden` Track, and a footnote; the only `style` attribute anywhere is the `--bar-fill` custom property and the picture component's ratio; no `{% css %}` output. Proves the markup and the no-inline-styles rule.
11. `/playbooks` at 1600, keyboard: tab from the Header into the Block: the "Request your audit" Button takes focus with a visible outline and nothing else in the panel does. Proves the focus order.
12. `/playbooks` at 1600 with the Bars temporarily emptied: the panel renders with its left column and photograph, and no Chart Card at all — no empty lilac rectangle and no stray Badge or question. Restored afterwards. Proves the Chart Card's empty state.
13. `/playbooks` at 1600 with the Image temporarily emptied: the `primary` frame in the photograph's place with the Chart Card still across its corner. Then with the Eyebrow, text and Button temporarily emptied: the heading alone on the left. Then with the heading emptied: nothing between the surrounding Blocks. Restored afterwards. Proves the empty states and the render gate.
14. Control panel, the Block's edit form: "Audit - CTA" in the Blocks field's General group, the Section Header and Section Content headings, the Text field a rich-text editor, the Chart field rendered as one grouped card holding Badge, Heading, Bars and Footnote, the Bars Matrix with its "New Bar" button, a Bar showing Label and Value, and Padding on the Settings tab. Proves the entry types and fields.
15. Control panel, a Bar's Value field: `101`, `-1` and `fifty` each refused on save, `62` accepted, the `%` suffix shown. Proves the Percentage field's constraint, which is the reason it exists rather than a Text field.
16. Styleguide at `/styleguide`, the badge previews: the new `white-20-black` colour and `xs` size shown, and the existing `white-20`, `base`, `sm` and `lg` previews unchanged. Proves the badge component gained a variant without changing a caller.
17. `/case-studies` and the Case Study page at 1600, the Content Rows and Case Study ticked lists: two columns from the tablet breakpoint, exactly as before the branch. Proves `check-single` did not disturb `check`.
18. Seed command output, run twice: the Audit CTA created with its Chart and five Bars resolved on the first run, skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- A reusable chart component. The Chart Card is Block markup; nothing else on the site draws a Bar.
- Any chart but a horizontal Bar — no donut, no line, no grouped or stacked Bars, no axis, no gridlines.
- Real data. The Bars are editor-typed figures; nothing reads an API.
- A second Chart Card, or a Chart Card without the photograph beside it.
- Changing `statistic.twig`, including giving it the reduced-motion handling this Block has.
- Changing the existing `check` list option, the `white-20` badge colour, or any existing badge size.
- Tilting anything below the desktop breakpoint, or making the tilt angles editable.
- A colour, layout or column-count option on the Block. The panel is black, the Chart Card Secondary, the left column five of twelve.
- A Button Group or a Section Footer. There is one Button.
- A dedicated tablet or mobile design. The responsive rules follow the decisions above until such a node exists.
- Hover behaviour on the Chart Card or the photograph.
- Seeding new images, and committing the Seed.

## Further Notes

- The node's left column is 588 wide on a 1440 inner width, which is five columns of twelve with the site's 20px gap (5 × 101.67 + 4 × 20 = 588.3). The column is the site grid, not a bespoke width.
- The heading is 62px with 0.97 leading and -2.48px tracking, which is the `7xl` token exactly: -0.04em at 62px is -2.48px.
- Both the photograph and the Chart Card are given in Figma as rotated bounding boxes. Unrotated they are approximately 497 by 562 and 345 by 385; those are the numbers to build to, not the 516 by 579 and 371 by 408 the metadata reports.
- The node's `primary` fill behind the photograph is given as `#0018C8`, which is a stale Figma variable fallback. The variable resolves to the site's `primary`, `#745CF6`, and that is what the Block uses. It is invisible once a photograph loads.
- Every type size and colour in the node lands on an existing token: 62px is `7xl`, 23px is `xl`, 16px is `base`, 14px is `xs`, 11px is `2xs`; `#0E0A10` is `black` and `#AFAFFF` is `secondary`. Nothing is added to the theme.
- The Ticked Item mark in the node — a 19px Secondary circle with a 10px black check and a 7px gap — is already exactly what `richText.twig` injects. Only the column count differs, which is why `check-single` is a list option rather than a new mark.
