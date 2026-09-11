# Marquee - Icon Cards

Spec for the Icon Card Marquee Block: a centred Eyebrow and heading with the Highlight over a row of Group Tabs, and beneath them one full-width row of Icon Cards that Crawls leftwards, the active Card Group's. Choosing another Group Tab crossfades to that Card Group's row. The Icon Cards are the Icon Grid's own, the same entry type rendered by one shared card component. It is the first Block on the Careers page.

Design: Figma node `9962-15538` in the Marketing Signals file, "Group 46376" on the Careers page, 2546 by 606 because the row of Icon Cards runs past both edges of the 1600 frame. The node draws the desktop resting state once: the first Group Tab active and its Card Group's three cards, no hover, no second or third Card Group's content. No tablet frame and no mobile frame exist, so the card-width ramp, the wrapped Group Tabs and the mobile spacing below are decisions, not measurements. The icons are Font Awesome glyphs set as text, so there are no SVGs to export.

Branch: feature/marquee-icon-cards

Related: the Icon Grid spec, whose Icon Card entry type, Icon Grid Matrix field and card markup this reuses, the markup moving into a shared component; the Marquee - Team spec, whose marquee call with an accessible copy, a trailing gap on each item and pause on hover this follows; the Marquee - Logos spec, whose repeat-to-a-minimum rule and Crawl speed this copies; the Case Study Grid spec, whose Category Filter is the prior art for a row of pills with exactly one active; the Content Seeding spec, whose command puts the review content on the Careers page. ADR-0001 does not apply to the Block itself: it is in flow like every other Block (see Further Notes for the Careers page having no Hero). ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, new "Icon Card Marquee" section, which gained Icon Card Marquee, Card Group, Group Tab and Tab Heading during the grilling session; Icon Card and Crawl were widened to cover this Block.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Careers page has no Blocks yet. The design lists what the agency offers its team under three themes, "Rewarding your hard work", "Supporting your success" and "Work-life balance": a centred heading, a row of pills to pick a theme, and beneath them the chosen theme's benefits as white cards, each led by a large purple icon, drifting sideways across the full width of the page. Editors can already build a static grid of those cards with the Icon Grid, but nothing groups cards under switchable headings, and nothing sets Icon Cards moving.

## Solution

An Icon Card Marquee Block editors can add to any page. Its header is the Eyebrow, centred and without a Rule, over a heading at 62px on a desktop with its Highlight in primary, centred and up to 1007px wide. Beneath it sits a row of Group Tabs, one per Card Group, each a pill reading its Tab Heading: the active one filled in Secondary, the others outlined in Creme 400 and filled in Secondary on hover. The first Card Group is active on arrival. Beneath the Group Tabs, one full-width row of Icon Cards Crawls leftwards, pausing while the pointer is over it: the active Card Group's cards, repeated until the row never shows a gap. Choosing another Group Tab crossfades to that Card Group's row. Every Card Group's row is the same height, so switching never moves the page. On a phone the Group Tabs wrap and stay centred and the cards are narrower. Under reduced motion the rows sit still and switching is instant. A Block with one Card Group shows no Group Tabs. The Careers page gets the Figma content by Seed, with placeholder cards for the two Card Groups the design does not draw.

## User Stories

1. As a visitor, I want the team benefits grouped under a few themes, so that I can find the kind of benefit I care about.
2. As a visitor, I want a label above the heading, so that I know which part of the page this is.
3. As a visitor, I want a large centred heading with its key words in purple, so that the section reads with the same voice as the rest of the site.
4. As a visitor, I want a row of pills beneath the heading, one per theme, so that I can see every theme at once.
5. As a visitor, I want the first theme showing when I arrive, so that the section is never empty.
6. As a visitor, I want the pill for the theme I am looking at filled in lilac, so that I know which theme the cards belong to.
7. As a visitor, I want the other pills outlined, so that the active one stands out.
8. As a visitor, I want an outlined pill to fill in lilac when I hover it, so that I can see it is a control.
9. As a visitor, I want the active pill to stay the same when I hover it, so that nothing suggests clicking it would change anything.
10. As a visitor, I want clicking a pill to show that theme's cards, so that I can move between themes.
11. As a visitor, I want the cards to crossfade when I switch themes, so that the change is clear but not jarring.
12. As a visitor, I want the section to keep its height when I switch themes, so that the page does not jump under me.
13. As a visitor, I want every card in the row the same height, so that the row reads as one set.
14. As a visitor, I want each card's icon, heading and text centred, as in the Icon Grid, so that the cards look the same wherever they appear.
15. As a visitor, I want the row of cards to drift leftwards on its own, so that the section feels alive and hints there is more.
16. As a visitor, I want the row to run edge to edge and loop without a visible seam, so that I never see a gap or a jump.
17. As a visitor, I want a theme with only two or three cards to still fill the row, so that I never see an empty stretch.
18. As a visitor, I want the row to stop while my pointer is over it, so that I can read a card.
19. As a visitor, I want it to start again when my pointer leaves, so that the section carries on.
20. As a visitor, I want the new theme's row already moving when it appears, so that switching never shows a restart.
21. As a visitor who prefers reduced motion, I want the row to sit still, so that nothing moves without my say.
22. As a visitor who prefers reduced motion, I want switching themes to be instant, so that there is no fade either.
23. As a visitor with a phone, I want the pills to wrap onto a second line and stay centred, so that every theme is visible without scrolling sideways.
24. As a visitor with a phone, I want narrower cards, so that more than one card shows at once.
25. As a visitor with a phone, I want the heading smaller and the gaps tighter, so that the cards are not pushed off the screen.
26. As a visitor with a tablet, I want the pills on one line and the cards a middle width, so that the section reads as designed.
27. As a keyboard user, I want each pill to be a button I can reach with Tab and press with Enter or Space, so that I can switch themes without a mouse.
28. As a keyboard user, I want a visible focus ring on the pill I am on, so that I know where I am.
29. As a screen reader user, I want the pills announced as tabs with the active one selected, so that I understand they switch the content beneath.
30. As a screen reader user, I want each theme's cards announced as the panel for its tab, so that the relationship is clear.
31. As a screen reader user, I want each card read once, so that the loop's repeats add nothing to the reading.
32. As a screen reader user, I want the hidden themes' cards not read at all, so that I only hear the theme I chose.
33. As a screen reader user, I want the icons silent, so that I hear each card's heading and text and not an icon's name.
34. As a screen reader user, I want the Block's heading to be a heading and each card's heading one level beneath it, so that I can move through the page by its outline.
35. As a visitor, I want a Block with only one theme to show its cards without a lone pill, so that there is no control that does nothing.
36. As an editor, I want a Marquee - Icon Cards Block in the Blocks menu, so that I can add it to any page.
37. As an editor, I want the Block's Eyebrow and Heading under a Section Header heading, so that it reads like every other Block.
38. As an editor, I want to write the heading in the same Heading field I use in Blocks, so that italic means Highlight here as it does everywhere.
39. As an editor, I want to add Card Groups as cards inside the Block, each labelled by its Tab Heading, so that I can tell them apart without opening them.
40. As an editor, I want the Tab Heading required, so that I cannot save a Card Group whose pill would be blank.
41. As an editor, I want to order the Card Groups, so that the pills and the first theme shown follow my order.
42. As an editor, I want to add Icon Cards inside each Card Group exactly as I do in an Icon Grid, so that there is nothing new to learn.
43. As an editor, I want each Icon Card to offer the same Icon Type choice, Font Awesome or Image, so that the cards can use the icon library or my own artwork.
44. As an editor, I want a Card Group with no cards left out, pill included, so that a half-built theme never shows an empty row.
45. As an editor, I want a Block with no Card Groups that have cards to show its header alone, so that the page still reads while I finish it.
46. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
47. As an editor, I want the Careers page to already carry this Block with the designed content, so that I see how it is meant to look.
48. As a developer, I want the Icon Card entry type and the Icon Grid Matrix field reused inside the Card Group, so that there is one definition of an Icon Card in the project config.
49. As a developer, I want one card component rendering an Icon Card for both Blocks, so that the icon-name rule and the card's typography live in one place.
50. As a developer, I want the Icon Grid to render exactly as it did after moving to that component, so that the refactor costs nothing.
51. As a developer, I want the Group Tabs drawn by the button component, so that the pill's size, focus ring and transition match every other pill.
52. As a developer, I want the Group Tab's active look driven by its selected state, so that the look and the accessibility state cannot disagree.
53. As a developer, I want every row built by the marquee component as it is, so that the Crawl, the pause and the reduced-motion guard are the ones every marquee uses.
54. As a developer, I want the Crawl speed and the repeat minimum held in one place in the Block, so that they can be tuned without touching the component.
55. As a developer, I want the switch kept to one piece of Alpine state, the active Card Group, so that the Block's JavaScript stays minimal.
56. As a developer, I want the review content added by a Seed rather than by hand, so that the review environment is reproducible.
57. As a reviewer, I want the Careers page seeded with the Figma copy word for word for the first Card Group, so that the screenshot compares to the design line by line.

## Implementation Decisions

**Entry types.** A new Block entry type, handle `marqueeIconCards`, name "Marquee - Icon Cards", colour blue, icon `grip` to sit beside the other marquees, added to the Blocks field in the General group. Its Content tab follows the slot layout: a Section Header heading element with the Eyebrow field and the Heading field; a Section Content heading element with the Icon Card Groups field. A Settings tab holds the Padding field. No title, slug or status fields. A second new entry type, handle `iconCardGroup`, name "Icon Card Group", colour purple, icon `layer-group`, no title field, with a card label showing its Tab Heading, holds a Card Group's fields.

**Fields.** One new field: the Icon Card Groups Matrix, handle `iconCardGroups`, name "Icon Card Groups", holding the Icon Card Group entry type only, no minimum and no maximum, card view, create button "New Card Group", with the instructions "Each Card Group is one tab. The first is shown on arrival." Inside the Icon Card Group entry type, in order: the existing Text field with handle `tabHeading` labelled "Tab Heading", required; the existing Icon Grid Matrix field with the layout handle `iconCards` labelled "Icon Cards", with the instructions "The cards that Crawl past while this tab is active." overriding the field's grid wording. The Icon Grid Matrix already holds only the Icon Card entry type, so its Icon Type, Icon, Icon Image, Heading and Text fields and their conditions come with it unchanged.

**Icon Card component.** A new component renders one Icon Card entry: the Icon by its Icon Type, the `h3` heading and the text, exactly the markup, classes and icon-name rule the Icon Grid has today, moved out of the Block. It follows the component conventions: its name first, default params of the card entry and a `class` passthrough on the card's outer element, so a caller can set width and stretch. The Icon Grid is changed to include it inside its grid loop and renders identically; the Icon Card Marquee includes it in its rows. The card's white panel, 20px corners, padding ramp and icon sizes live in the component, not in either Block.

**Button component.** One new colour option, a Creme 400 outline: a Creme 400 border, black text, a Creme 400 focus ring, and on fine-pointer hover a Secondary fill with a Secondary border. Its selected look keys off `aria-selected="true"` through Tailwind's `aria-selected` variant, giving the Secondary fill and border, so the active Group Tab needs no second option and no class swapping. The option is generic and can outline any pill; nothing else in the component changes. Existing colours are untouched.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding and no horizontal padding, and its content inside the section's content block. The header and the Group Tabs are wrapped in the site margins; the rows are not. It reads the Card Groups once at the top, keeping those with a Tab Heading and at least one Icon Card with a heading or text, and decides whether it has a header (Eyebrow, or heading with tags stripped, is non-empty). It renders only when it has a header or at least one Card Group; with neither it renders nothing at all, section included. The Alpine component name is the Block handle joined to the entry id, so two Blocks on a page switch independently, and the tab and panel ids carry the entry id for the same reason.

**Header.** Centred at every width. The Eyebrow is the eyebrow component without its Rule, centred, 20px above the heading below `lg` and 30px from `lg`. The heading is the alternate heading component as `h2` at 5xl, semibold, leading 0.97, tighter tracking, with the Highlight in primary through the component's base alternate style, stepping to 6xl from `md` and 7xl from `lg`, centred with a max width of 1007px. A line break the editor puts in the heading is kept. Without an Eyebrow the heading is first; without a header the Group Tabs are first.

**Group Tabs.** 30px below the header below `lg`, 40px from `lg`. A centred row that wraps, with 5px between pills in both directions, marked up as a tablist. Each Group Tab is the button component as a `button` element in the base size with no icon and the new Creme 400 outline colour, reading the Tab Heading, carrying the tab role, its own id, the id of the panel it controls, and `aria-selected` bound to whether its Card Group is active. Clicking one sets the active Card Group; each is its own Tab stop, activated with Enter or Space, with no arrow-key handling. The first Card Group is active on arrival, rendered selected in the served HTML so there is no flash before Alpine starts. With one Card Group the tablist is not rendered and its row carries no tabpanel role.

**Rows.** 30px below the Group Tabs below `lg`, 40px from `lg`, running the full width of the page. One marquee component per Card Group, all stacked in the same grid cell so every row is measured when the loops start and the stack is as tall as its tallest row. Each row is a tabpanel labelled by its Group Tab. The active row is visible and fully opaque; every other row is invisible and transparent, which also takes it out of the reading order and out of pointer events. A switch fades the outgoing row out and the incoming row in over 300ms with `motion-safe` transitions, so under reduced motion it is instant. Every row keeps Crawling while hidden, so the incoming row appears mid-Crawl; nothing restarts. Each marquee takes the `none` gap, reversed off, pause on hover on, pause on focus off since nothing in a row takes focus, the accessible copy on, and the Crawl speed from one constant in the Block, 0.4 on the component's scale, the same as the Client, Logo and Team Marquees. Each row's Icon Cards repeat in listed order until the row holds at least six cards, so a copy of the row is at least 3078px wide at the desktop card width and the widest supported viewport never shows a gap; the component then doubles the row for the loop. Only the first set of cards in the accessible track is announced; every repeat is hidden from assistive technology, as the Team Marquee does. Under reduced motion the component leaves each row still with its first cards showing.

**Cards in a row.** Each card is the Icon Card component with a 20px trailing margin, so the seam between the marquee's two tracks reads as one more gap, and a fixed width: 300px below `md`, 360px from `md`, 420px from `lg` and 493px from `3xl`, the node's figure. Cards stretch to the full height of the stack, so every card in the Block is as tall as the tallest card in any Card Group and switching never changes card height. The card's own padding and its 80px to 104px icon ramp come from the component.

**Empty states.** No header: the Group Tabs, or the row, are first. One Card Group: no Group Tabs, the row alone. No Card Groups with cards: the header alone. Neither: nothing rendered. A Card Group without a Tab Heading, or whose cards are all empty, is left out with its Group Tab. A card without an Icon starts with its heading, as in the Icon Grid.

**Content.** One Seed, under the scratch folder and not committed, targeting the Careers entry, slug `careers`, with one Icon Card Marquee Block, padding Top and Bottom: Eyebrow "Employee benefits"; heading "We offer a range of benefits" then a line break then "to our team, including:" in italic. Three Card Groups, all cards Font Awesome, in order. "Rewarding your hard work", the Figma copy word for word: `bullseye-arrow` "Competitive salary" "We believe in recognising talent, which is why we offer salaries that reflect your skills and experience. Your contributions matter, and we make sure they’re rewarded."; `arrows-down-to-people` "Performance-based bonus" "When the company succeeds, so do you. We offer annual bonuses to recognise the role you play in achieving our shared goals."; `circle-star` "Generous pension scheme" "We’re invested in your future. Our contributory pension scheme helps you plan ahead with financial security in mind." "Supporting your success", placeholder copy the design does not draw: `graduation-cap` "Training and development" "We fund courses, certifications and conference tickets so you can keep building the skills that move your career forward."; `chalkboard-user` "One-to-one mentoring" "Every new starter is paired with an experienced mentor who helps them settle in, set goals and grow with confidence."; `arrow-trend-up` "Clear progression" "Regular reviews and a transparent career framework mean you always know what the next step looks like and how to get there." "Work-life balance", placeholder copy, four cards so the Card Groups differ in length: `house-laptop` "Hybrid working" "Split your week between home and the office in a way that suits how you work best."; `clock` "Flexible hours" "Start and finish when it works for you, around the core hours the team shares."; `umbrella-beach` "Generous holiday" "Plenty of annual leave on top of bank holidays, with extra days as you stay with us."; `heart-pulse` "Wellbeing support" "Access to health cover and mental wellbeing support whenever you need it." The command already writes nested Matrix fields to any depth, so it gains nothing.

**Docs.** `CONTEXT.md` gained the Icon Card Marquee vocabulary during the grilling session, and the Icon Card and Crawl entries were widened. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The primary seam is the rendered Careers page, `/careers`, through the global layout with the seeded Block on it. The Block is the only caller of the Card Group, the Group Tabs and the new button colour, so all of them are proven through it. The Icon Card component has two callers; the second seam is the Tree Center Case Study page, `/case-study/the-tree-center`, whose Icon Grid must render unchanged. The Seed command's own output proves the seeding. Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the centred header, the pills with the first filled, the row of cards caught mid-Crawl, the row holding still under the pointer, a switch landing on a different set of cards with the pill states swapped, the wrapped pills on a phone, the still row under reduced motion, and an Icon Grid that looks exactly as it did. Fixed widths, one state per file, before and after pairs on the PR. The before for the Careers page is `main` at the commit the branch forked from, which has no Blocks; the before for the Tree Center is the same commit, and its after must match it.

**Evidence plan.**

1. Careers page at 1600, viewport, the Block in view: the Eyebrow centred without a Rule, the heading at 62px with "to our team, including:" in primary on its own line, the three pills centred 40px below with "Rewarding your hard work" filled in Secondary and the others outlined in Creme 400, and 40px below them a row of 493px cards with 20px gaps, each icon at 104px in primary with a faint second layer. Compared against the Figma node. Proves the resting layout.
2. Careers page at 1600, two viewport captures one second apart with the pointer off the Block: the row moved left between them. Proves the Crawl and its direction.
3. Careers page at 1600, the pointer held over a card, two captures one second apart: identical rows. Proves the pause on hover.
4. Careers page at 1600, the pointer over "Supporting your success": that pill filled in Secondary, "Rewarding your hard work" still filled. Proves the hover look.
5. Careers page at 1600 after clicking "Work-life balance": that pill filled, the other two outlined, the row showing its four cards, every card the same height as before the switch, and the page's scroll position and the Block's height unchanged. Proves the switch, the card-height rule and the stable stack.
6. Careers page at 1600, a capture about 150ms after clicking "Supporting your success": both rows partly visible. Proves the crossfade.
7. Careers page at 768, viewport: the pills on one line, 360px cards, the heading at 6xl. Proves the `md` step.
8. Careers page at 390, full page: the heading at 5xl, the pills wrapped onto two centred lines, 300px cards with 80px icons, the tighter gaps. Proves the mobile layout.
9. Careers page at 1600 with `prefers-reduced-motion: reduce` emulated: two captures one second apart are identical, and a capture immediately after clicking "Work-life balance" shows only its row at full opacity. Proves the still rows and the instant switch.
10. Careers page at 1600, keyboard only: Tab to "Supporting your success", press Enter; the focus ring on that pill and its row showing. Proves the keyboard path.
11. Home page at 1600 with a temporary Seed of an Icon Card Marquee holding one Card Group: no pills, the row directly beneath the header. Removed afterwards. Proves the single-Card-Group state.
12. Served HTML of the Careers page: one tablist of three `button` elements with the tab role, the first `aria-selected="true"` and the others false, each naming its panel's id; three tabpanels, each labelled by its tab; the Block heading an `h2` with the Highlight inside it, each card heading an `h3`; in each row only the first set of cards in the first track not hidden from assistive technology; the inactive rows invisible; each icon an `i` hidden from assistive technology; no inline styles beyond the marquee loop's own transforms. Proves the markup.
13. Tree Center page at 1600 and at 390, full page, before and after: the Icon Grid identical, card for card. Proves the Icon Card component extraction changed nothing.
14. Seed output for the Careers Seed, run twice: the Block created with its three Card Groups and ten Icon Cards on the first run, skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- Arrow-key navigation between Group Tabs, or a single Tab stop for the row.
- Restarting a row from its first card on a switch, or syncing rows to each other.
- Pausing hidden rows. They keep Crawling so the incoming row never restarts.
- A sideways-scrolling tab row with arrows, as the Category Filter has. The Group Tabs wrap.
- Editor control of speed, direction, card width or which Card Group opens first.
- A link on an Icon Card, a Button, an Avatar Group or any Section Footer on this Block.
- Remembering the active Card Group across page loads or in the URL.
- Changes to the marquee, eyebrow, alternate heading or picture components, or to the Icon Card's look.
- A Hero for the Careers page.
- Final copy for the "Supporting your success" and "Work-life balance" Card Groups; the Seed's is placeholder.
- Committing the Seed.

## Further Notes

- Node measurements at 1600: the Eyebrow's cap top is at 3869, 11px tall, centred on the frame; the heading's cap top is 30px below the Eyebrow's baseline, 1007 wide, centred, two lines of 62px at leading 0.97 and -2.48px tracking; the pill row's top is 40px below the heading's last baseline, 637 wide and 41 tall, centred, with 5px between pills; the cards' top is 40px below the pills. Cards are 493 by 343 at a 513px pitch, the first at the 40px site margin, with a copy of the first card peeking at the left edge and of the third at the right.
- Pills: 20px horizontal and 15px vertical padding around cap-trimmed 16px medium text at leading 1.33, 56px radius. The active pill is filled Secondary `#AFAFFF` with no visible border; the others have a 1px Creme 400 `#D3D0C5` border. The button component's base size, 20px by 12px padding with no leading around 16px text and a 1px border, lands at 42px against the node's 41.
- Inside a card the measurements are the Icon Grid's: the icon's top 43px below the card's top, the heading's cap top 54px below the icon's bottom, the text's cap top 25px below the heading's baseline. The design font for the icons is "Font Awesome 7 Sharp Duotone: Light" at 104px in primary with a second copy of each glyph at 20% opacity, which the Icon Card's secondary opacity property already reproduces.
- The marquee component's speed of 1 is 100px a second, so 0.4 is 40px a second.
- The loop helper measures widths when it starts, and a row hidden with `display: none` measures zero; that is why the rows are stacked and made invisible rather than shown and hidden with `x-show`, and why the unused tabs component is not reused.
- The marquee component's track aligns its items to the centre and is not configurable; the cards stretch themselves to the track's height instead.
- The Careers page has no Hero and no other Block yet, so this Block is first on the page and its top padding sits partly under the fixed Header (ADR-0001). That is the missing Hero's concern, not this Block's; captures frame the Block, scrolled below the Header where needed.
- The placeholder icon names in the Seed are Font Awesome 7 Pro names; the builder confirms each resolves in the kit before seeding and swaps any that do not.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
