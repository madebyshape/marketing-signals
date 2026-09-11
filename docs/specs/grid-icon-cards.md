# Grid - Icon Cards

Spec for the Icon Card Grid Block: a centred heading with the Highlight over a centred text, over a grid of Icon Cards at the small Card Scale, with a Button and an Avatar Group centred beneath. Five cards across on a desktop, three on a laptop, two on a tablet, one on a phone. It is the same Icon Card the Icon Grid and the Card Group use, the same entry type and the same component, drawn at a second Card Scale where the Icon, the headings and the padding all step down so five fit a row. It has no Eyebrow. It is the first Block on the Playbooks page.

Design: Figma node `9974-15555` in the Marketing Signals file, "Group 46379" on the Playbooks page, 1520 by 575 inside the 1600 frame, so the group sits exactly inside the site margins. The node draws the desktop resting state once: five cards, no hover, no empty card, no count other than five. No laptop frame, no tablet frame and no mobile frame exist, so the three-, two- and one-column layouts and the count-driven column rule below are decisions, not measurements. The design's icons are Font Awesome glyphs set as text, not vectors, so there are no SVGs to export, and all five are the same placeholder glyph.

Branch: feature/grid-icon-cards

Related: the Icon Grid spec, whose Icon Card entry type, Icon Grid Matrix field, Section Footer and shared card component this reuses, the component gaining the Card Scale; the Marquee - Icon Cards spec, the second caller of that card and the prior art for mounting the Matrix under a Block's own handle and instructions; the Statistics spec, whose count-to-columns options map this copies; the Grid - Blog spec, whose entry type shape and `grid` naming this follows; the Content Seeding spec, which puts the review content on the Playbooks page. ADR-0001 does not apply: the Block is in flow beneath the Hero. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, new "Icon Card Grid" section, which gained Icon Card Grid during the grilling session; Icon Card was widened to name the new caller and Card Scale was added beside it.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Playbooks page ends after its Hero. The design follows it with the spine of the whole series: a centred two-line heading, a paragraph beneath it, and five white cards in one row, each led by a purple icon over a short title and a sentence, then a call to action with the Managing Director's photo and name beneath. Editors have a Block that lays out a set of points with an icon on each — the Icon Grid — but it is three across, its header is an Eyebrow and a heading beside a text, and its cards are large: a 104px icon, a 25px heading and 40px of padding. Five of those in a row would be 288px wide with 80px of it padding. Nothing in the Blocks menu puts five small cards under a centred heading.

## Solution

An Icon Card Grid Block editors can add to any page. Its header is the heading at 62px on a desktop with its Highlight in primary, centred and capped at 1007px, and the text at 16px centred 30px beneath it and capped at 494px. Beneath it, 50px down, Icon Cards in a grid with the site's 20px gap: five across from the desktop breakpoint, three from the laptop breakpoint, two from the tablet breakpoint, one below, and where there are fewer than five cards the desktop count follows the cards so a short row never appears. Each card is the Icon Card already in the control panel, drawn at the small Card Scale: a white panel with 20px corners, 30px side padding, the Icon at 44px in primary, the heading at 21px medium, the text at 14px. Under the grid, 40px down and centred, the Button as the secondary pill and the Avatar Group as the small user row, either one optional, exactly as the Icon Grid closes. The Playbooks page gets the Figma content by Seed: the "One Framework. Twelve Verticals." heading, the five-pillar paragraph, five cards, the "Let's Work Together" button and Gareth Hoyle's Avatar Group.

## User Stories

1. As a visitor, I want the five pillars of the framework in one row, so that I can see the whole shape of it without scrolling.
2. As a visitor, I want a centred heading above the cards, so that the row reads as one idea rather than five.
3. As a visitor, I want the second line of the heading in purple, so that the point lands in the same voice as the rest of the site.
4. As a visitor, I want a short paragraph under the heading, so that the framework is explained before it is broken down.
5. As a visitor, I want the heading and paragraph centred over a centred row, so that the section is symmetrical as designed.
6. As a visitor, I want each card's icon, heading and text centred, so that the five read as a set.
7. As a visitor, I want the icons all in the same colour and style, so that five different pictures still look like one set.
8. As a visitor, I want the icons two-toned with the second layer faint, so that they read as the design intends rather than as flat glyphs.
9. As a visitor, I want the cards in a row to be the same height, so that the row has one top edge and one bottom edge.
10. As a visitor, I want the cards small enough that five fit without crowding, so that no card is mostly padding.
11. As a visitor with a laptop, I want three cards across, so that each card is still wide enough for its sentence.
12. As a visitor with a tablet, I want two cards across, so that the text does not run to one word a line.
13. As a visitor with a phone, I want the cards stacked one above the other, so that each is the full width.
14. As a visitor with a phone, I want the cards drawn at the same small scale, so that the Block looks like itself at every width.
15. As a visitor, I want a Block with three cards to show three across rather than three and two gaps, so that the row still looks deliberate.
16. As a visitor, I want a button beneath the cards, so that I can act on what I have just read.
17. As a visitor, I want a photo, name and job title beside the button, so that I know who I would be talking to.
18. As a visitor, I want the button and the person centred under the grid, so that the section closes as designed.
19. As a visitor, I want the button to change colour when I hover it, so that I can see it is a link.
20. As a visitor, I want a card with no icon to show its heading and text with no gap where the icon would be, so that a half-built card is not a broken one.
21. As a keyboard user, I want the Block's heading to be a real heading and each card's heading a heading beneath it, so that I can move through the page by its outline.
22. As a screen reader user, I want the icons silent, so that I hear each card's heading and text and not an icon's name.
23. As a screen reader user, I want the person's name and job title read as text, so that the row makes sense without the photo.
24. As an editor, I want a "Grid - Icon Cards" Block in the Blocks menu, so that I can add it to any page.
25. As an editor, I want its heading and text under a Section Header heading, so that it reads like every other Block.
26. As an editor, I want to write the heading in the same Heading field I use in Blocks, so that italic means Highlight here as it does everywhere.
27. As an editor, I want the Block to have no Eyebrow field, so that I am not offered a field the design never shows.
28. As an editor, I want the Icon Cards to be the same cards I already build in an Icon Grid, so that there is nothing new to learn.
29. As an editor, I want each card to show its heading on its face, so that I can tell them apart without opening them.
30. As an editor, I want to choose whether a card's icon is a Font Awesome icon or an image, so that I can use the icon library or my own artwork.
31. As an editor, I want Font Awesome to be the default Icon Type, so that the common case needs no choosing.
32. As an editor, I want a pasted class string from the Font Awesome site to still work, so that a copy and paste does not break the card.
33. As an editor, I want the field's instructions to tell me five is the intended count, so that I know what the Block was designed for.
34. As an editor, I want to add fewer than five cards and still get a full row, so that a four-pillar framework does not look broken.
35. As an editor, I want to add more than five cards and see them wrap, so that the Block is not a hard limit.
36. As an editor, I want the Button and Avatar Group under a Section Footer heading, so that the Block reads like the Icon Grid.
37. As an editor, I want to leave the Button or the Avatar Group empty and see the other alone, so that a Block without a person still has its button.
38. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
39. As an editor, I want the Playbooks page to already carry this Block with the designed content, so that I see how it is meant to look.
40. As a developer, I want the Block to add no new fields at all, so that the control panel does not grow a second copy of the Icon Card.
41. As a developer, I want the Card Scale to be a param on the shared card component, so that a third Block can ask for either scale in one line.
42. As a developer, I want the two existing callers of that component untouched, so that the change cannot regress the Icon Grid or the Marquee.
43. As a developer, I want the card text size to come from a token the type scale already documents, so that 14px is not an arbitrary value in a Block.
44. As a developer, I want the column count read from a count-to-classes options map, so that the rule is one table rather than a chain of conditions.
45. As a developer, I want the review content added by a Seed rather than by hand, so that the review environment is reproducible.
46. As a reviewer, I want the Playbooks page seeded with the Figma copy word for word, so that the screenshot compares to the design line by line.
47. As a reviewer, I want a capture at every breakpoint the Block changes at, so that all four column rules are evidenced and not assumed.

## Implementation Decisions

**Entry types.** One new Block entry type, handle `gridIconCards`, name "Grid - Icon Cards", colour blue, icon `grid-2`, no title field, no slug field, no status field, added to the Blocks field in the General group. Its Content tab follows Grid - Blog: a Section Header heading element followed by the Heading field and the Rich Text - Simple field with handle `text` labelled "Text"; a Section Content heading element followed by the Icon Cards field; a Section Footer heading element followed by the Button field and the Avatar Group field. A Settings tab holds the Padding field. No Eyebrow field. No new inner entry type: the cards are the existing Icon Card.

**Fields.** None are created. The existing Icon Grid Matrix field is mounted on this entry type under a layout-level override, handle `iconCards`, label "Icon Cards", instructions "Cards of an icon over a heading and text. Five across on a desktop, three on a laptop, two on a tablet, one on a phone." — the same mechanism the Card Group uses to mount that field with its own wording. Everything inside a card — the Icon Type dropdown, the Icon text field, the Icon Image field, the required heading and the Rich Text - Simple text — is unchanged and shared with the Icon Grid, so a card built in one Block is the same object as a card built in the other.

**Card Scale.** The shared Icon Card component gains a `size` param, `base` by default so both existing callers are untouched, with a second value `sm`. It selects from an options map, not a condition, in the component's Options section: the card's padding, the Icon's size and bottom margin, the image Icon's height cap, and the heading component's size. At `base`, today's values: 30px side padding stepping to 40px from `lg`, 40px top, 50px bottom from `lg`, the Icon at 80px stepping to 104px from `lg` with a 50px bottom margin, the image capped to the same heights, and the heading at `2xl`. At `sm`, one set of values at every width: 30px side padding, 40px top, 50px bottom, the Icon at 44px with a 25px bottom margin, the image capped to 44px, and the heading at `lg`. The text's 15px top margin is the same at both scales.

**Rich text size.** The card's text at `sm` is the `xs` size, which `richText` does not currently offer — its map starts at `sm`, 15px at normal tracking. The component gains `xs: 'text-xs leading-1.33 tracking-tight'`, which is the `--text-xs` token exactly as the type scale documents it: 14px, `leading-1.33`, tight tracking. This is an addition to the options map only; no existing caller changes.

**Block template.** Lives with the other Blocks so the Blocks field renders it by handle, and its filename is the entry type handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding, and its content inside the section's content block. No Alpine: the Block is static. It reads the Icon Cards once at the top, keeping those with a heading or text, and decides whether it has a header (heading or text with tags stripped is non-empty) and whether it has a footer (a Button or an Avatar Group name). It renders only when it has a header or at least one card.

**Section Header.** One centred column at every width. The heading is the alternate heading component as `h2` at 5xl, stepping to 6xl from `md` and 7xl from `lg`, with the Highlight in primary through the component's base alternate style, centred, capped at 1007px and horizontally auto-margined. The text is the rich text component at its base size in black, centred, capped at 494px and auto-margined, 30px beneath the heading. Both caps are the node's own text-box widths; neither is column-aligned, so neither is expressed as a span. Without a heading the text stands alone; without a header the grid is first.

**Grid.** 50px below the header, one column with the 20px gap, cards stretching to their row's height. The tablet, laptop and desktop counts come from a single options map keyed by the number of cards, following Statistics: one card is one column throughout; two are two from `md`; three are two from `md` and three from `lg`; four are two from `md`, three from `lg` and four from `xl`; five or more are two from `md`, three from `lg` and five from `xl`. A count above five falls back to the five-column entry, wraps, and leaves the last row short and left-aligned. Five across only from `xl`, not `lg`: at 1024 five cards inside the site margins would be 168px wide, narrower than their own padding allows.

**Icon Card.** Rendered by the shared component with `size: 'sm'` and no width class, so the grid sizes it. At 1600 that is 288 wide by 259 tall with 20px corners on white, its content a centred column from the top: the Icon, the heading 25px beneath it, the text 15px beneath that. The heading is `h3`. A card with no Icon starts with its heading and reserves no space. A card with no heading and no text is filtered out before the loop.

**Section Footer.** 40px below the grid, a centred row that wraps, with the 20px gap. The Button is the button component in its default secondary colour. The Avatar Group is the user component at size `sm` in its base colour with the avatar image, the name as its heading and the job role as its sub heading, exactly as the Icon Grid and the Footer CTA call it. Either one renders alone, still centred; with neither, the footer is omitted.

**Accessibility.** The Block's heading is an `h2` and each card's an `h3`, so the outline is unbroken. Font Awesome Icons are `i` elements hidden from assistive technology; image Icons carry an empty alt. Nothing in the Block is focusable but the Button and, where the Avatar Group's name links, its link. No colour carries meaning the text does not.

**Empty states.** No header: the grid is first. No cards: the header alone. No footer: nothing beneath the grid. Only a footer: nothing rendered, section included. A card without an Icon, or with an unresolvable icon name, shows its heading and text with no gap.

**Content.** One Seed, under the scratch folder and not committed, targeting the Playbooks entry with one Icon Card Grid Block, padding Top and Bottom. Heading "One Framework. Twelve Verticals." with "Twelve Verticals." italic and on its own line; text "Every playbook in the series follows the same five-pillar framework — verticalised for the dynamics that decide visibility outcomes in each category. This is the spine the whole series is built on."; five Icon Cards, all Font Awesome `bullseye-arrow`, in reading order: "Technical Foundations" / "Crawl, render, index, schema, Core Web Vitals, hreflang. The infrastructure layer."; "On-Page Excellence" / "Page-level depth and structure. Definitional, citation-ready content."; "GEO Visibility" / "How to be cited and recommended by ChatGPT, Perplexity, Claude, Gemini & AI Mode."; "Off-Site Authority" / "Digital PR, third-party platforms, trade press, expert commentary, communities."; "Measurement" / "Branded search, AI citation share, leading indicators, competitive benchmarking."; the Button "Let's Work Together" as an entry link to the Contact page; the Avatar Group with Gareth Hoyle's photo, name "Gareth Hoyle", job role "Managing Director". The photo is already in the library from the Icon Grid's Seed and is reused rather than re-uploaded. The Seed command already writes dropdowns, Matrix, Content Blocks, links and images, so it gains nothing.

**Docs.** `CONTEXT.md` gained the Icon Card Grid section and the Card Scale term, and its Icon Card entry was widened to name this Block, during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The single primary seam is the rendered Playbooks page, `/playbooks`, through the global layout with the seeded Block beneath the Hero. It is the only caller of the small Card Scale and of the rich text `xs` size, so both are proven through it. The secondary seam is the Seed command's own output. The two existing callers of the card component are the regression check on the `size` param's default and are re-captured rather than re-specified. Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the centred heading with its Highlight over the centred paragraph, five level white cards with two-toned purple icons, the button and the person centred beneath, and the four- three- two- and one-column layouts. Fixed widths, one state per file, before and after pairs on the PR. The before for the Playbooks page is `main` at the commit the branch forked from, which ends after the Hero. The before for the Icon Grid and the Marquee is the same commit, and their afters must be pixel-identical.

**Evidence plan.**

1. Playbooks page at 1600, full page: the Block beneath the Hero compared against the Figma node for the heading at 62px with "Twelve Verticals." in primary centred at 1007px, the paragraph centred at 494px 30px beneath, five cards 288 by 259 with 20px gaps 50px below, each icon at 44px in primary with a faint second layer, the 21px headings and 14px texts centred, and the button and Avatar Group centred 40px below. Proves the desktop layout.
2. Playbooks page at 1280, viewport on the grid: five columns at their tightest, cards about 224 wide, no text overflowing its card. Proves the `xl` rule holds at the breakpoint, not just at the design width.
3. Playbooks page at 1024, viewport on the grid: three columns, a short second row of two, left-aligned. Proves the `lg` rule.
4. Playbooks page at 768, viewport on the grid: two columns. Proves the `md` rule.
5. Playbooks page at 390, full page: the heading at 5xl and text stacked and centred, one card per row at the small scale with 44px icons, the button and Avatar Group wrapped and centred beneath. Proves the mobile layout and that the scale does not ramp.
6. Playbooks page at 1600, pointer over the button: the pill in primary with white text. Proves the hover.
7. Playbooks page at 1600 with the Seed temporarily cut to four cards: four columns filling the row with no gap at the end. Restored afterwards. Proves the count-to-columns map.
8. Playbooks page at 1600 with a temporary sixth card of Icon Type Image holding an SVG: the SVG at 44px in primary alone in a short second row, left-aligned. Removed afterwards. Proves the Image type at the small scale, the recolouring, and the short-row rule above five.
9. Playbooks page at 1600 with a temporary card with no icon: its heading at the top of the card with no gap. Removed afterwards. Proves the missing-icon state.
10. Tree Center page at 1600 and at 390, full page: the Icon Grid identical to `main`. Proves the `size` param's default did not move the existing caller.
11. Careers page at 1600, viewport on the marquee: the Icon Card Marquee identical to `main`. Proves the same for the second caller.
12. Served HTML of the Playbooks page: the Block's heading an `h2` with the Highlight inside it, each card heading an `h3`, each icon an `i` hidden from assistive technology with the Sharp Duotone and Light classes and the secondary opacity property, the person's name and job role as text, no inline styles beyond the picture component's own. Proves the markup.
13. Seed output run twice: the first run reports the Block created and the photo reused from the library; the second reports the Block skipped. Saved as text beside the screenshots. Proves the Seed.

## Out of Scope

- A second Matrix field, a second Icon Card entry type, or any new field at all.
- An Eyebrow, a Rule, or a left-aligned header option on this Block.
- Any Font Awesome style other than Sharp Duotone Light, or an editor choice of style, weight or colour.
- A link on an Icon Card, or a Linked Card treatment.
- Centring a short last row above five cards.
- Capping the card width when a Block holds a single card.
- Validating that an uploaded image is an SVG, or recolouring a PNG or JPG.
- A third Card Scale, or exposing the Card Scale to editors.
- Changes to the heading, picture, button, user or section components. The card component gains a param and the rich text component gains a size; nothing else moves.
- A minimum or maximum number of Icon Cards.
- Committing the Seed.

## Further Notes

- Node measurements at 1600: the group is 1520 wide starting at x40, so it sits exactly inside the site margins; the heading box is 1007 wide and centred, the text box 494 wide and centred 30px below it; the cards are 288 by 259 with 20px gaps, five of them spanning the full 1520; the footer row is 42px tall, 40px below the cards, centred on the frame with 20px between the pill and the photo.
- Inside a card: the side padding is 30px, giving a 228px content column; the icon's glyph box is 44px tall with its top 47px below the card's top; the heading's cap top is 37px below the icon's bottom and the text's cap top 20px below the heading's cap bottom. Figma trims text boxes to cap height, so against the line boxes those become roughly 40px of top padding, a 25px icon margin and a 15px text margin, and the CSS lands within a few pixels.
- The card's bottom sits 50px below a three-line text, which is the same 40px top and 50px bottom the large Card Scale already uses from `lg`. Only the side padding tightens, 40px to 30px, so the scale change is the Icon, the type sizes and the icon margin.
- All five icons in the node are the same glyph, `bullseye-arrow`, which is the designer's placeholder rather than five chosen icons. The Seed keeps it, so the review compares to the design; real icons are a content change, not a code one.
- The card heading's tracking is -0.84px on 21px and the text's -0.28px on 14px, which are the tighter and tight tracking tokens respectively; the Block heading's is -2.48px on 62px, the tighter token.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change. The icon font is "Font Awesome 7 Sharp Duotone: Light" at 44px in primary with a second copy of each glyph at 20% opacity, which the secondary opacity property reproduces.
- The Playbooks page renders through its own page template, which already calls the Hero then the Blocks with a placeholder comment between them. Seeding a Block needs no template change there.
