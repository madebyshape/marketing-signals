# Marquee - Team

Spec for the Team Marquee Block: a centred heading with the Highlight over one row of Team Tiles that Crawls leftwards inside a black panel, each Tile a Team Member's portrait with their name and Job Role over a bottom fade and a plus icon. Clicking a Tile opens the Team Modal with the portrait on the left and the name, Job Role and Text on the right. It is the first Block whose Crawl carries clickable content, the first to pause the Crawl on keyboard focus, the first Block to fall back to Team Members nobody picked, the first modal that is not the Video Modal, and the first Block on the About Us page, directly beneath its Hero.

Design: Figma node `9927-15501` in the Marketing Signals file, 1600 wide, named "Group 46369", the marquee at rest with four Tiles in view and the outer two clipped at the panel edges. The Team Modal is node `9716-10051`, named "About | Team Pop Up", 1600 by 900, showing the desktop modal open over the blurred page. No hover frame, no tablet frame and no mobile frame exist for either, so the Tile ramp, the panel padding ramp, the hover state and the stacked mobile modal below are decisions, not measurements. The modal design also draws a 25px quote paragraph between the rule and the body text; it is deliberately not built.

Branch: feature/marquee-team

Related: the Marquee - Client spec, whose marquee component, speed constant, centred header and Twig repeat pattern this Block copies; the Marquee - Logos spec, whose reuse of a shared field with a per-block label and instructions is the precedent for reusing Entries - Team; the Carousel - Featured Team spec, which created Entries - Team and the Team Member fields this Block reads and which loses nothing by the field's minimum dropping to zero; the Carousel - Blog spec, whose all-or-nothing fallback rule the auto-pick repeats; the Video Content spec, whose Video Modal is the pattern the Team Modal copies; the Hero Home spec, whose Work Marquee is the prior art for a row of tall tiles that repeat to fill; the Content Seeding spec, which seeds the Team Members and the About Us content. ADR-0001 does not apply: the Block is in flow beneath the About Us Hero. ADR-0002 applies: the Team Members, their portraits and the About Us content arrive by Seed. No new ADR: reusing a field, relaxing its minimum and picking eight by structure order are all easy to reverse and none is surprising. Vocabulary: `CONTEXT.md`, "Team Marquee" section, which gained Team Marquee, Team Tile and Team Modal during the grilling session; Crawl was widened to cover the Team Marquee's three pauses.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The About Us page has a Hero and nothing else. The design follows it with "Meet Some Of Our Remote-first Team": a black panel of tall portrait tiles drifting past, each naming a person and their role, that open a profile when clicked. Twelve Team Members exist in the control panel with a portrait, a Job Role and Text, but the only Block that shows them is the Team Carousel, which needs a Quote and a Video and shows one person at a time. Nothing on the site shows the team as a group, nothing opens a person's Text, and every Block that picks entries shows nothing until an editor picks.

## Solution

A Team Marquee Block editors can add to any page. It holds a heading with the Highlight and an optional pick of Team Members. The heading sits centred at the top of a black panel that runs inside the site margins with rounded corners. Beneath it one row of Team Tiles runs to the panel's edges and Crawls leftwards without stopping, the outer Tiles clipped by the panel. Each Tile is a Team Member's portrait with a dark fade rising from its bottom, their name and Job Role at the bottom left and a round outlined plus icon at the bottom right. The row pauses while the pointer is over it, while a Tile has keyboard focus, and while the Team Modal is open. Clicking a Tile opens the Team Modal over a darkened, blurred page: a white panel with the portrait on the left, the close button over its top left corner, and on the right the person's name, Job Role, a Rule and their Text, which scrolls inside the panel when it is long. When the editor picks nobody, the row shows the first eight Team Members in the section's order that have an Image. Under reduced motion the row sits still and the Modal still opens. The About Us page gets one instance with the Figma heading, and the five people from the Figma design become Team Members with their portraits, all added through the Seed command.

## User Stories

1. As a visitor, I want to see the team's faces and names drifting past on the About Us page, so that I get a feel for who I would work with.
2. As a visitor, I want each Tile to name the person and their Job Role, so that I know who does what.
3. As a visitor, I want the row to keep moving on its own, so that I see everyone without scrolling sideways.
4. As a visitor, I want the row to pause while my pointer is over it, so that I can read a Tile and click it without chasing it.
5. As a visitor, I want a plus icon on every Tile, so that I know a Tile opens something.
6. As a visitor, I want the plus icon to fill when I hover a Tile, so that I know which Tile I am about to open.
7. As a visitor, I want clicking a Tile to open a profile of that person, so that I can read about them.
8. As a visitor, I want the profile to show the same portrait, name and Job Role as the Tile, so that I know I opened the right person.
9. As a visitor, I want the profile to show the person's Text, so that I learn what they do and how they work.
10. As a visitor, I want long Text to scroll inside the profile, so that the profile never grows taller than my screen.
11. As a visitor, I want to close the profile with its close button, by clicking outside it or by pressing Escape, so that I can get back to the page however I expect to.
12. As a visitor, I want the page behind the profile not to scroll while it is open, so that I do not lose my place.
13. As a visitor, I want the row to stay where it was while the profile is open and carry on when I close it, so that the Tile I opened is still there when I return.
14. As a visitor on a phone, I want fewer, smaller Tiles that still Crawl, so that the row works at my width.
15. As a visitor on a phone, I want the profile to stack the portrait above the text and scroll as one, so that I can read it on a narrow screen.
16. As a visitor on a tablet, I want Tiles between the phone and desktop sizes, so that the row fills my screen sensibly.
17. As a visitor who prefers reduced motion, I want the row to sit still, so that nothing moves without my say-so.
18. As a visitor who prefers reduced motion, I want Tiles to still open the profile, so that the content is not lost with the motion.
19. As a keyboard user, I want to tab to each Tile once and open it with Enter or Space, so that the profile is reachable without a pointer.
20. As a keyboard user, I want the row to pause while a Tile has focus, so that the focused Tile does not drift out of view.
21. As a keyboard user, I want focus to land on the profile's close button when it opens and return to the Tile when it closes, so that I never lose my place.
22. As a screen reader user, I want each person announced once, not once per repeat, so that the row does not read as a list of forty names.
23. As a screen reader user, I want the profile announced as a dialog with the person's name, so that I know what opened.
24. As a screen reader user, I want the plus icon and the portrait to carry no spoken noise, so that the Tile reads as its name and role.
25. As an editor, I want to add a Team Marquee to any page from the Blocks field, so that any page can show the team.
26. As an editor, I want a heading with the Highlight, so that I can colour part of it as the design does.
27. As an editor, I want to pick which Team Members show and in what order, so that a page can feature the right people.
28. As an editor, I want to leave the pick empty and get the first eight Team Members automatically, so that I can add the Block without choosing anyone.
29. As an editor, I want the automatic eight to follow the Team section's order, so that I control them by dragging entries in the control panel.
30. As an editor, I want a partial pick shown exactly as I made it and never topped up, so that the Block never shows someone I did not choose.
31. As an editor, I want a Team Member without an Image left out of the row rather than shown blank, so that the row always looks finished.
32. As an editor, I want the same Entries - Team field the Team Carousel uses, so that picking people works the same way everywhere.
33. As an editor, I want the Team Carousel to keep working after this Block lands, so that nothing I built before breaks.
34. As an editor, I want a Team Member with no Text to still open a profile, so that a new starter is never a dead Tile.
35. As an editor, I want the usual Padding setting on the Block, so that I can tighten it against its neighbours.
36. As a developer, I want the Crawl built on the existing marquee component, so that the seam, the speed scale and reduced motion are handled once.
37. As a developer, I want the Team Modal built as its own component copying the Video Modal's mechanics, so that every modal on the site behaves the same.
38. As a developer, I want one Team Modal per Block rather than one per Tile, so that the page does not carry a dialog per repeat.
39. As a developer, I want the About Us content and the five Figma people seeded by command, so that the page can be rebuilt without the control panel.

## Implementation Decisions

**Entry type.** A new entry type in the Blocks field's General group, handle `marqueeTeam`, name "Marquee - Team", following the Marquee - Client entry type: no title, slug or status fields, the grip icon, the same UI label format. Its Content tab has the Section Header heading followed by the Heading field, and the Section Content heading followed by the Entries - Team field. There is no Section Footer. Its Settings tab has the Padding field.

**Fields.** No new fields. The Heading field is the shared CKEditor heading, so an editor can mark the Highlight. The Entries - Team field is reused, not duplicated, with the block's own label "Team Members" and instructions on the layout element: "Optional. The Team Members to show, in this order. Leave empty to show the first eight in the Team section." Reusing it means its minimum drops from one to zero on the field itself, since a minimum cannot be set per layout element. The Team Carousel already filters its pick and renders nothing when the pick is empty, so it needs no change.

**Auto-pick.** The rule is the Blog Carousel's: only an empty pick falls back, and a short pick is never topped up. When the pick is empty the Block queries the Team section in structure order and takes the first eight Team Members that have an Image, so imageless members are skipped rather than counted. When the pick is not empty it is shown as picked, minus any member without an Image. The heading and the panel render regardless; the row needs at least one Tile.

**Block template.** A Twig partial named for the entry type, following the block scaffold. It resolves the members as above, builds the Tile list once, and renders the panel with the header and the row. Its Alpine data owns the Team Modal state and is named from the block handle and the entry id so two Team Marquees on one page do not collide. The Crawl belongs to the marquee component's own Alpine data, named the same way.

**Panel.** A full-width black panel inside the site margins with 20px rounded corners, its overflow clipped so the row's outer Tiles cut off at its edges with no fade. Padding inside the panel is 64px at mobile, 80px from `md` and 120px from `lg`, top and bottom. The section's own Padding setting controls the space outside the panel as on every Block. The row is not inset from the panel: Tiles run to both edges.

**Section Header.** The heading centred, white, with the Highlight in secondary, 4xl at mobile, 6xl from `md` and 8xl from `lg`, semibold, leading 0.97, tracking tighter, at most 1010px wide, following the Client Marquee's header. Heading to row is 40px at mobile and 70px from `lg`.

**Row.** One marquee component instance Crawling leftwards at 0.4 on the component's scale, 40px a second, the constant every Crawl uses. Pause on hover is on. The Tiles are repeated in Twig to at least twelve, the Hero Home's tile minimum, before the component doubles the track, so the widest viewport never shows a gap. The gap between Tiles is 20px at every width, and the track's trailing space matches it so the seam reads as one more gap.

**Team Tile.** A `button` element, portrait shaped at 493 by 693, holding a picture of the Image cropped to that ratio with 20px rounded corners, a fade from transparent at 40% of its height to black at its bottom, the name and Job Role stacked bottom left, and the plus icon bottom right. Tile width is 280px at mobile, 360px from `md`, 420px from `lg` and 493px from `3xl`, height following the ratio. Name is 2xl at mobile, 3xl from `md` and 4xl from `lg`, medium weight, leading 1.2, tracking tighter, white. Job Role is sm at mobile, base from `md` and md from `lg`, regular, leading 1.33, white. The text inset is 20px below `lg` and 30px from `lg`. The plus icon is the existing round outlined button component in its white outline colour with the plus icon, 42px, rendered as a decorative span inside the Tile because a button cannot hold a button. The whole Tile is the click target and shows the pointer cursor. The picture uses the 2x3 transform family or the nearest the image component offers, sized to the Tile ramp.

**Hover state.** The plus icon fills as its component already does on hover, white on the circle with the glyph turning black, for fine pointers only. Nothing else moves: no image scale, no lift. A focused Tile shows the site's focus ring on the Tile itself.

**Pauses.** Three, all as a time-scale tween on the loop so the row eases to a stop rather than snapping. Pointer over the row, which the marquee component already provides. Any Tile inside the row receiving focus, which the component gains as a focus-within pause alongside its hover pause, released when focus leaves the row. The Team Modal open, which the Block's modal state applies through the marquee's exposed loop and releases on close. Under reduced motion the loop never starts and none of the pauses has anything to do, as with every other Crawl.

**Accessibility of repeats.** Every copy of a Tile after the first for a given member, including the whole second track the component renders, carries `aria-hidden` and `tabindex="-1"`, so the accessibility tree and the tab order hold each member once. The first copy's button is labelled by its visible name and Job Role. The portrait has an empty alt and the plus icon is hidden from assistive tech. The marquee component gains a way for its caller to mark which copy is the accessible one, since today it hides whole rows.

**Team Modal.** A new component, not a change to the Video Modal, which is welded to the Video Player's scope and has no content slot. It copies the Video Modal's mechanics exactly: teleported to the body so the panel's stacking context cannot trap it, a fixed backdrop of black at 70% with an 8px blur, `role="dialog"` with `aria-modal` and a label of the open person's name, opened and closed by the Block's Alpine state, closed by the close button, a click on the backdrop and Escape, the body's scroll locked while open, the backdrop marked so the smooth scroll library leaves it alone, focus moved to the close button on open and returned to the Tile that opened it on close, and the same fade transitions. One Team Modal is rendered per Block. Each member's modal content, portrait, name, Job Role and Text, is rendered once by Twig in a hidden template beside the Tiles, and opening a Tile copies that member's content into the panel before showing it.

**Team Modal layout.** From `lg` the panel is white, 20px rounded corners, 20px inner padding, at most 1006px wide and 694px tall, centred. The portrait fills the left at 345 by 485, the Tile's ratio, with 20px rounded corners, and the close button sits over its top left corner 20px in, using the round outlined button component in white outline with the times icon, 42px. The text column starts 70px right of the portrait and is 467px wide, top aligned with the portrait's top plus 50px: the name at 5xl semibold leading 0.97 tracking tighter in black, the Job Role at md medium in creme-500 beneath it, a Rule in creme-300 30px below the Job Role, then the Text 40px below the Rule as base regular rich text in black. The text column scrolls internally when the Text is longer than the panel, with the browser's thin scrollbar coloured primary on a transparent track, and a white fade of 80px across its bottom so the cut-off reads as more to come. Below `lg` the panel is 90% of the viewport wide with the same padding and corners, the portrait on top at full column width and the Tile's ratio with the close button over its top left corner, the text stacked beneath, and the whole panel scrolls as one inside the viewport with no inner scroll column and no fade. The 25px quote paragraph in the design is not rendered; a member's Quote is not read by this Block.

**Empty states.** A member without an Image is not a Tile and is skipped by the auto-pick. No Tiles: the Block renders its heading and panel with nothing beneath, which the seed avoids and the editor can see. A member without Text: the Modal opens with the portrait, name, Job Role and Rule and no body. A member without a Job Role: the role line is not rendered on the Tile or in the Modal. No heading: the header is not rendered and the row starts at the panel's top padding.

**Responsive summary.** Mobile: 64px panel padding, 4xl heading, 280px Tiles with 20px text inset, stacked Modal. `md`: 80px panel padding, 6xl heading, 360px Tiles. `lg`: 120px panel padding, 8xl heading, 70px heading gap, 420px Tiles with 30px inset, side-by-side Modal. `3xl`: 493px Tiles, the Figma frame.

**About Us content.** Two Seeds in the Block's seed folder. The first creates five Team Members from the Figma design, Gareth Hoyle, Managing Director; Harry Nisbet, General Manager; Simon Rattray, Head of Strategy; Joseph Woodcock, Senior Digital PR Manager; Alice Lang, Senior Digital PR Executive, each with their portrait exported from the Figma tile component at 2x and straightened where needed, and with Text: Simon's from the modal design, the rest a short placeholder naming the person. The second adds the Team Marquee to the About Us page after its Hero with the heading "Meet Some Of Our <em>Remote-first Team</em>" and a pick of eight: the five Figma people followed by three existing Team Members that have an Image. The Seed is rerun-safe on the heading text as the Content Seeding spec describes.

**Docs.** `CONTEXT.md` gains the Team Marquee section and the widened Crawl, done during the grilling. The marquee component's parameter comment gains the focus pause and the accessible-copy flag. No ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma nodes at the same width.

**Seams.** The single seam is the rendered About Us page through the global layout, with the five Team Members seeded first and the Block seeded beneath the Hero. The marquee component's focus pause and accessible-copy flag are proven through it. The Team Modal is proven through it in its open, closed and scrolled states. The Entries - Team minimum change is proven by the Team Carousel on a Service page still rendering as before, captured once.

**What good evidence looks like.** It shows what a visitor would see: the black panel with the centred heading, the row of Tiles clipped at the panel edges, the row caught mid-Crawl, a Tile paused under the pointer with its plus icon filled, the Modal open with a long Text scrolled, the stacked Modal on a phone, the still row under reduced motion, and the row paused under keyboard focus. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is the About Us page on `main` at the commit the branch forked from, which shows the Hero and the Footer alone. Numeric checks such as Tile sizes and gaps are reported as a table in the PR body, not captured as dumps.

**Evidence plan.**

1. About Us page at 1600, viewport, the Block in view with the pointer off the page: black panel inside the site margins, heading centred with the Highlight in secondary, 493px Tiles with 20px gaps and the outer Tiles cut at the panel edges. Compared against the Figma node. Proves the resting layout.
2. About Us page at 1600, two captures one second apart with the pointer off the page: the row moved left between them. Proves the Crawl and its direction.
3. About Us page at 1600, viewport, the pointer held over a Tile for a moment: the row paused, the plus icon filled. Proves the hover pause and the hover state.
4. About Us page at 1600, viewport, focus tabbed onto a Tile: the focus ring on the Tile, two captures one second apart identical. Proves the focus pause and the tab order reaching a Tile.
5. About Us page at 1600, viewport, after clicking Simon Rattray's Tile: the Modal open over the blurred page, portrait left with the close button over its corner, name, Job Role, Rule and Text right, the scrollbar and bottom fade visible. Compared against the modal node. Proves the Modal layout.
6. About Us page at 1600, viewport, the Modal's text column scrolled to its end: the last paragraph in view, the fade gone. Proves the inner scroll.
7. About Us page at 1600, viewport, after pressing Escape: the Modal gone and the row where it was, followed one second later by a capture showing it moving again. Proves close on Escape and the resume.
8. About Us page at 1600, viewport, the seam of the row where one copy meets the next: continuous Tiles with one gap. Proves the seamless loop.
9. About Us page at 768, viewport: 360px Tiles and the heading at 6xl. Proves the `md` step.
10. About Us page at 390, full page: 280px Tiles, heading at 4xl, panel padding tightened. Proves the mobile layout.
11. About Us page at 390, viewport, the Modal open: portrait above the text, panel scrolling as one. Proves the stacked Modal.
12. About Us page at 1600 with `prefers-reduced-motion: reduce` emulated, two captures one second apart: identical rows. Then a Tile clicked: the Modal open. Proves the still row and that the Modal survives reduced motion.
13. Accessibility tree at 1600 from an agent-browser snapshot: each of the eight people listed once as a button, the Modal listed as a dialog named for the open person. Saved as text. Proves the repeats are hidden.
14. A Service page with the Team Carousel at 1600, viewport, after the field change: unchanged from before. Proves the reused field's minimum change broke nothing.
15. Seed command output for the five Team Member Seeds and the About Us Seed, run twice: created on the first run, skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- The Quote paragraph drawn in the modal design. The Modal shows Text only.
- Video in the Team Modal. The Team Carousel plays a member's Video; this Block ignores it.
- Linking a Tile or the Modal to a Team Member page. Team Members have no page.
- Drag or swipe control of the row. The Crawl is the only motion.
- Editor control of the Crawl's speed, direction or the auto-pick count. Eight is fixed.
- Topping a short pick up to eight. The pick is shown as made.
- A custom scrollbar track for the Modal beyond colouring the browser's own.
- Changing the Video Modal or folding it and the Team Modal into one component.
- A styleguide preview for the Block. Blocks are not previewed there.
- Committing the Seeds or the portraits.

## Further Notes

- Figma at 1600: panel 1520 by 1118 with 20px corners; 120px above the heading; heading 1007 wide at 8xl; heading to Tiles 70px; Tiles 493 by 693 at 20px gaps, the four in view at x 41 clipped, 298, 812 and 1325 clipped; 120px below the Tiles. The Tile is the "Team / Exterior / 4 col" component: four grid columns wide of twelve at a 20px gap.
- Tile text in Figma: name 40px medium, leading 1.2, tracking -1.6px, baseline 62px from the bottom; Job Role 18px regular, leading 1.33, 30px from the bottom; both 30px from the left; plus icon 42px, 30px from the right and bottom; bottom fade from 41% of the Tile's height.
- Modal in Figma at 1600 by 900: backdrop black at 70% with an 8px blur; panel 1006 by 694 at 20px corners; portrait 345 by 485 inset 20px; close button 42px, 20px inside the portrait; text column 467 wide starting 70px right of the portrait; name 46px semibold, 70px from the panel top; Job Role 18px medium in creme-500 (#7F7C72), 51px below; Rule creme-300 (#DDDAD1) 52px below the Job Role; body 16px regular, leading 1.33; scrollbar track 584 tall at the panel's right with a primary (#745CF6) thumb; bottom fade white.
- The design's lilac is the theme's `secondary` token; there is no lilac token.
- The Team section is a structure, so "first eight" is structure order, the order editors drag in the control panel.
- Five live Team Members exist in the local database, all the Team Carousel's seeds; four have an Image, avatars rather than portraits, and Ella Ward has none. The seed's pick of eight is the five Figma people plus Lauren Doe, Sam Reid and Priya Nair.
- The Figma portraits inside the tile instances cannot be exported by their nested ids; export the master tile component's children, as the Hero Home tiles were.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
