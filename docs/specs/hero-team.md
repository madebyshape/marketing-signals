# Hero Team

Spec for the Hero Team Hero Layout: a full-screen black panel with a centred Eyebrow over a heading with the Highlight, and the editor's Team Members around it as Scattered Tiles, each with its Tile Caption, that Drift with the pointer and the scroll. It is the fourth Hero Layout the Hero field offers editors and the second caller of the Scattered Tiles component, which gains captions and two Tile sizes for it.

Design: Figma node `9962-15526` in the Marketing Signals file, 1600 by 900, the Culture page hero. No mobile node exists; the responsive rules below are decisions, not measurements.

Branch: feature/hero-team

Related: the Error Page spec, whose Scattered Tiles component, Drift and top gradient this Hero reuses; the Hero Home and Hero Full Screen specs, whose full-screen panel and Header Colour line this Hero follows; the Team Marquee spec, whose Team Members field and first-with-an-Image fallback this Hero reuses; the Content Seeding spec, whose Seed shape carries the review content. ADR-0001 applies: the header is fixed, so the panel pads its top by the header height from the shared header map, and its bottom by the same so the content sits at the true centre. ADR-0002 applies: the review content arrives by Seed. ADR-0004 applies: the Hero Layout decides the Header Colour, and every copy of the map gains one line for this Hero. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Error page" and "Heroes" sections, which gained Hero Team and Tile Caption during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Culture page needs the hero the design gives it: a black screen with "A talented bunch of humans that love what we do" in the middle and photographs of the team scattered around the edges, each named, shifting gently as the visitor moves the pointer. None of the three Hero Layouts does this. Hero Simple is creme and content-height. Hero Home is built around the Work Marquee and a Button Group. Hero Full Screen is a photograph under an overlay with a staggered heading and a video. The Scattered Tiles and their Drift already exist on the Error Page, but only there, fed by the Site entry's Error Images, and they show a bare photograph with no name. An editor who wants the Culture design today has nothing to pick, and the page renders with no Hero and no Blocks, just the Footer.

## Solution

A Hero Team layout editors can pick in the Hero field. It takes an Eyebrow, a Heading and Team Members, the fields they already use in Blocks, plus the Padding setting. The panel fills the viewport in black with 30px bottom corners. The Eyebrow and the heading sit centred in the middle of the screen, the heading at 82px on a desktop in creme 100 with italic words as the Highlight in secondary. Around them, up to six of the picked Team Members' Images sit as Scattered Tiles, part way off the edges, in two sizes, each with the Team Member's name and Job Role over a fade at its bottom. The Tiles Drift exactly as on the Error Page: they follow the pointer on fine-pointer devices, move with the scroll everywhere, and hold still under reduced motion. They are decoration: no clicks, no focus, nothing read out. With nobody picked the first six Team Members with an Image fill the Tiles, as the Team Marquee does. A 197px black gradient at the top lets the Header read over any Tile, and the Header goes black over the panel. There is no Breadcrumb and no Scroll Cue. The Culture page gets the design's copy and six real Team Members by Seed so the Hero can be reviewed against Figma.

## User Stories

1. As an editor, I want a Hero Team in the Hero field's menu, so that I can give the Culture page the design's hero.
2. As an editor, I want to pick it on any page, so that the layout is not tied to Culture.
3. As an editor, I want an Eyebrow field, so that the short label above the heading is mine to write.
4. As an editor, I want one Heading field, so that the hero's heading is written the way every other heading is.
5. As an editor, I want italic words in the heading to show as the Highlight in secondary, so that the design's lilac words are mine to place.
6. As an editor, I want to pick Team Members rather than upload photographs, so that the hero shows the same people, names and Job Roles as the rest of the site.
7. As an editor, I want the Team Members I pick to fill the Tiles in the order I pick them, so that I decide who appears where.
8. As an editor, I want only the first six with an Image used, so that picking more never breaks the layout.
9. As an editor, I want a Team Member without an Image skipped, so that no Tile is ever an empty box.
10. As an editor, I want the hero to show the first six Team Members with an Image when I pick nobody, so that a new page is never empty while I decide.
11. As an editor, I want the field's instructions to tell me the order and the fallback, so that I do not have to guess.
12. As an editor, I want a name and Job Role to come from the Team Member, so that a new Job Role shows everywhere at once.
13. As an editor, I want a Team Member with no Job Role to show just their name, so that a missing role is not a broken caption.
14. As an editor, I want the Padding setting, so that I choose whether creme space follows the panel.
15. As an editor, I want no Text, Button Group, Breadcrumb or Image field on this Hero, so that the form holds only what the design uses.
16. As a visitor, I want the hero to fill my screen in black, so that the page opens on the heading and the team alone.
17. As a visitor, I want the Header black over the hero, so that the top of the page reads as one dark surface.
18. As a visitor, I want the Eyebrow and the heading centred in the middle of my screen, so that the page opens the way the design does.
19. As a visitor, I want the heading at 82px on a desktop with its Highlight in lilac, so that the statement reads as the design intends.
20. As a visitor, I want the heading to wrap inside a column rather than across the whole screen, so that it stays a compact block among the Tiles.
21. As a visitor, I want photographs of the team around the edges, so that the page shows me the people it talks about.
22. As a visitor, I want each photograph named with the person's Job Role, so that I know who I am looking at.
23. As a visitor, I want some photographs larger than others and some cut off at the edges, so that the composition has depth.
24. As a visitor, I want a Tile at the bottom cut off by the panel's rounded edge, so that the hero leads me down the page.
25. As a visitor, I want the Header legible over any photograph at the top, so that the menu never disappears into a picture.
26. As a visitor with a mouse, I want the photographs to shift gently as I move the pointer, the larger ones most, so that the page feels alive.
27. As a visitor, I want the photographs to drift slightly as I scroll, so that they have depth.
28. As a visitor who prefers reduced motion, I want the photographs to stay still, so that the page does not move against my settings.
29. As a visitor on a touch device, I want no pointer-following motion, so that the page does not jump when I tap.
30. As a visitor, I want the photographs never to take a click, so that a drifting Tile cannot get in my way.
31. As a visitor on a phone, I want four photographs in the corners and a smaller heading, so that the heading is never covered.
32. As a visitor on a phone, I want the names still shown, so that the Tiles mean the same on every screen.
33. As a visitor on a short viewport, I want the heading never to slide under the header, so that it stays readable.
34. As a visitor using a screen reader, I want the heading as the page's one `h1`, so that the page's main heading is announced once.
35. As a visitor using a screen reader, I want the scattered photographs and their captions skipped, so that I am not read a list of decorative names.
36. As a visitor using a keyboard, I want nothing in the hero in the tab order, so that I reach the page content without stops on decoration.
37. As a developer, I want the Tiles to come from the Scattered Tiles component, so that the Drift is defined once for the Error Page and this Hero.
38. As a developer, I want captions and Tile sizes as options on that component, so that a third caller gets them without a fork.
39. As a developer, I want the Error Page to look and move exactly as before, so that reusing the component costs nothing there.
40. As a developer, I want the header's bottom padding beside its top padding in the shared header map, so that the header height still lives in one place.
41. As a developer, I want the Header Colour to come from ADR-0004's map, so that the black Header is one line, not a new mechanism.
42. As a reviewer, I want the Culture page seeded with the node's copy and six real Team Members, so that I can compare the page with the node at the same width.
43. As a reviewer, I want the Seed to replace whatever the Culture page's Hero field holds, so that reruns leave one Hero.
44. As an agent following the Block workflow, I want the Seed under the scratch folder, so that nothing about review content is committed.

## Implementation Decisions

**Entry type.** A new entry type, handle `heroTeam`, name "Hero - Team", colour blue, icon `heading`, no title, slug or status fields, matching the other Hero Layouts. Its layout is the Hero Template's: a Content tab with a Section Header heading element followed by the Eyebrow field and the Heading field with the instructions "Make words italic to highlight them."; then the Section Content heading element followed by the Entries - Team field with the instance label "Team Members" and the instructions "The first six with an Image fill the Tiles, in this order. Empty shows the first six Team Members with an Image."; then the Section Footer heading element left empty; a Settings tab with the Padding - Hero field as `padding`. No Text, no Button Group, no Image, no Video. The Hero field gains Hero Team after Hero Full Screen in the General group; the Hero Template stays out of the field.

**Hero template.** Lives with the Blocks under the partial templates path so the Hero field renders it by handle. It follows the Block scaffold: defaults with Padding defaulting to `bottom`, the merge line, the section embed with the editor's Padding as `paddingY` and `paddingX` none, so the editor's bottom padding is creme space beneath the panel. Inside the section, the panel: full width, black, 30px bottom corners, relative, isolated, clipping its overflow so the Tiles crop at its edges and at the rounded corners, minimum height of the small viewport height. It pads its top by the header height and its bottom by the same, both from the shared header map, and its sides by the site margin. It is a flex column centring its content group on both axes, so the Eyebrow and the heading sit at the true centre of the viewport, where the node puts them, and on a viewport shorter than the content the panel grows rather than letting the heading reach under the header. Three layers, in order: the Scattered Tiles, the top gradient, the content group.

**Header map.** The shared header map in the global layout gains `paddingBottom` beside `paddingTop`, with the same values, 80px below `xl` and 123px from it. Hero Team is its first user. Nothing else changes.

**Team Members.** The picked Team Members in the editor's order; when none are picked, Team Members from the Team section with an Image in structure order, the Team Marquee's fallback. In both cases a Team Member without an Image is skipped and the first six that remain are used. Each becomes a Tile of the Team Member's Image with a caption of their title and Job Role. Images are eager-loaded with the Team Members.

**Eyebrow.** The eyebrow component, in white, centred, no Rule, 30px above the heading, the node's gap between the cap-trimmed boxes. Empty renders nothing and the heading keeps the centre.

**Heading.** Rendered through the alternate heading component as `h1`, since the hero heading is the page's main heading. Creme 100, semibold, leading 0.97, tighter tracking, centred, at most 750px wide so it wraps as the node does, with the Highlight in secondary through the component's secondary alternate style. Size ramp: 5xl at mobile, 6xl from `md`, 8xl from `lg`, 10xl (82px) from `xl`. No line-break handling: the heading wraps naturally inside its column. The seeded heading is "A talented bunch of" with "humans that love what we do" italic, which wraps at 750px into the node's three lines.

**Top gradient.** A 197px gradient from black to transparent across the top of the panel, above the Tiles and below the content and the header, the same as the Error Page's, so the Header reads over the top Tiles. It takes no pointer events.

**Scattered Tiles component.** Extended, not forked, with the Error Page's output and Drift unchanged:

- The `images` param, a list of assets, becomes `tiles`, a list of `{ image, title, text }`. `title` and `text` are optional. The Error Page passes its Error Images mapped to `{ image }`.
- A Tile with a `title` renders a Tile Caption: a bottom fade from transparent to black over the lower 38% of the Tile (the node's 100px on 263), and the title above the text, inset 15px from the left and bottom from `lg` and 10px below it. Title 16px medium, leading 1.33, from `lg`; text 14px regular, leading 1.33, tracking −2%, from `lg`; one step smaller each below `lg`. Both white. A Tile with no `text` shows the title alone. A Tile with no `title` has no fade and no caption, which is every Error Page Tile.
- Each slot gains an optional `size`, looked up from an options map: `base`, 120px below `lg` and 242px from it, the default and the Error Page's; `md`, 120px below `lg` and 187px from it; `lg`, 150px below `lg` and 235px from it. The Tile's box takes the width and the image keeps the transform's ratio.
- A `rounded` param looked up from an options map: `sm`, 10px, the default and the Error Page's; `md`, 15px.
- The caption lives inside the Tile, so it Drifts with it, sits inside the hidden layer and takes no pointer events. The layer stays hidden from assistive technology, unselectable and ignoring the pointer. Tiles stay not lazy loaded.
- Everything about the Drift is unchanged: the three speed multipliers, the `gsap.matchMedia` branches for reduced motion and fine pointers, the `quickTo` pointer following, the scrubbed scroll, the cleanup.

**Hero Team's slots.** Hero Team passes its own six slots, transform `2x3` since the team portraits are shot at 2:3, sizes to match the widths, and `rounded` `md`. Positions from `lg` are the node's, as percentages of the 1600 by 900 panel; below `lg` the first four move to the corners and the last two are hidden. Fill order decides which slots stay empty when fewer than six Team Members qualify, so the four that show on a phone fill first.

| Slot | From `lg` (node)                | Below `lg` (start values)   | Size | Speed |
| ---- | ------------------------------- | --------------------------- | ---- | ----- |
| 1    | top −4.6%, left 42.6%           | top 4%, left −6%            | `md` | slow  |
| 2    | top 13.7%, right 2.5%           | top 10%, right −6%          | `md` | mid   |
| 3    | top 66.3%, left 12.1%           | top 72%, left −4%           | `md` | slow  |
| 4    | top 55.2%, right 10.5%          | top 66%, right −8%          | `md` | mid   |
| 5    | top 13.2%, left −1.25%          | hidden                      | `lg` | fast  |
| 6    | top 77.8%, left 42.6%           | hidden                      | `lg` | fast  |

The below-`lg` values are starting points, tuned at capture so no Tile covers the heading at 390. Slot 6 overhangs the panel's bottom edge and is cropped by it and its rounded corners, as in the node. The Tiles sit behind the content group, so at widths between the phone and the node a Tile may pass behind the heading, as on the Error Page.

**Error Page.** The exception layout passes `tiles` instead of `images`. Its five slots, 242px Tiles, 10px corners, `3x5` transform and Drift are unchanged, and its Tiles carry no captions.

**Header Colour.** Every page type template that carries ADR-0004's map (the Blocks page type and the Service, Team and Case Study listing types) gains `heroTeam` giving black beside `heroHome` and `heroFullScreen`; everything else and no Hero stays creme 100. The Hero template does not set the colour.

**No Breadcrumb, no Scroll Cue.** The node has neither and the grilling kept it that way. The panel does not bind the shared Scroll Cue data, so the native pointer shows everywhere over it and a click does nothing.

**Empty states.** No Eyebrow: the heading alone at the centre. No Heading: the Eyebrow alone; no `h1` from the hero. No Team Members qualify, picked or by fallback: no Tiles layer, the black panel with the gradient and the content. Fewer than six: slots fill in order and the rest are left out.

**Responsive summary.** Below `lg`: the panel fills the viewport, the Eyebrow and the heading centred at 5xl then 6xl from `md`, four Tiles in the corners at 120px with their captions one step smaller. From `lg`: the six node slots at 187px and 235px, the heading at 8xl. From `xl`: the heading at 82px, the header padding at 123px top and bottom. The `md` step of the ramp means the tablet width is captured.

**Content.** One Seed, under the scratch folder and not committed, targeting the Culture page's Hero field with `replace`: Eyebrow "Culture"; heading "A talented bunch of" followed by "humans that love what we do" in italic; Team Members, in slot order, Tom Hale, Gareth Hoyle, Simon Rattray, Joseph Woodcock, Alice Lang, Harry Nisbet, the six Team Members with full portraits, so Gareth, Simon and Alice keep their node positions; Padding Bottom. No Team Members are created. The Culture page holds no Hero and no Blocks today, so the first run adds and a rerun replaces.

**Docs.** `CONTEXT.md` gained Hero Team and Tile Caption during the grilling session, Hero Layout now names four layouts, and Scattered Tiles now names Hero Team as its second use and says it is decoration. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML, the browser console and Seed output where the behaviour is not visual.

**Seams.** The primary seam is the rendered Culture page, `/culture`, through the global layout with the seeded Hero Team. It proves the Hero, the component's new captions, sizes and corners, and the Header Colour line. The secondary seam is the Error Page at `/jgjg`, which proves the component change left it untouched; it needs devMode off, so flip `CRAFT_ENVIRONMENT` away from `dev` for the captures and restore it afterwards, as in the Error Page spec. Nothing is committed to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the black panel filling the viewport with the Header black over it, the Eyebrow and heading centred at the node's sizes, six named Tiles at the node's positions and sizes, the Tiles in a different place after the pointer moves and after a scroll, nothing moving under reduced motion, the four corner Tiles on a phone, and an Error Page identical to its before. Fixed widths, one state per file, before and after pairs on the PR. The before for the Culture page is `main` at the commit the branch forked from, with only the Footer on it.

**Evidence plan.**

1. Culture page at 1600 by 900, viewport, pointer parked off the page: the panel filling the viewport, the Header black over it, "Culture" centred above the heading at 82px in three lines with "humans that love what we do" in secondary, six Tiles at the node's positions, four at 187px and two at 235px with 15px corners, each with its name and Job Role over a bottom fade, the top Tiles faded under the gradient, the bottom-centre Tile cropped by the panel's 30px corners. Compared against the Figma node. Proves the desktop layout.
2. Culture page at 1600 by 900, viewport, after the pointer moves to the top-left of the window and settles: every Tile has moved and the two large Tiles have moved furthest. Proves the pointer Drift on this Hero.
3. Culture page at 1600 by 900, viewport, scrolled 400px: the Tiles lower within the panel than at rest. Proves the scroll Drift.
4. Culture page at 1600 by 900 with reduced motion emulated, after a pointer move: Tiles exactly where they were in line 1. Proves the reduced-motion branch.
5. Culture page at 390 by 844, viewport: the heading at 5xl centred with the Eyebrow above it, four Tiles at 120px in the corners with captions, none covering the heading, slots 5 and 6 absent. Proves the mobile layout.
6. Culture page at 768, viewport: the heading at 6xl, four corner Tiles. Proves the `md` step.
7. Culture page at 1600 by 600, full page: the panel taller than the viewport, the heading clear of the header. Proves the short-viewport rule.
8. Culture page at 1600 by 900 with Team Members temporarily emptied, viewport: six Tiles from the first six Team Members with an Image in structure order. Restored afterwards. Proves the fallback.
9. Culture page at 1600 by 900 with four Team Members temporarily picked, viewport: slots 1 to 4 filled, the two large slots absent. Restored afterwards. Proves the fill order.
10. Served HTML of the Culture page: the heading the only `h1`, the Eyebrow not a heading, the Tiles layer hidden from assistive technology with every image's alt empty and the captions inside it, nothing in the hero focusable, no inline styles in the template's markup. Proves the accessibility story.
11. Browser console on the Culture page: no errors on load, pointer move or scroll. Proves the Drift setup on a second caller.
12. Error Page at 1600 by 900 and at 390 by 844, viewport, pointer parked off the page, devMode off: identical to their before captures, five uncaptioned Tiles at 242px and 120px with 10px corners. Proves the component change left the Error Page alone.
13. Seed output run twice: the first run reports the Hero Team created and six Team Members resolved; the second reports it removed and created again. Saved as text beside the screenshots. Proves the review content and `replace`.

## Out of Scope

- Making the Tiles clickable or opening the Team Modal from them. They are decoration.
- A Breadcrumb or the Scroll Cue on this Hero.
- A Text, Button Group or background image on this Hero.
- Tile slots beyond six, or an editor setting for positions, sizes or speeds.
- A dedicated mobile or tablet design. The responsive rules follow the decisions above until frames exist.
- Any change to the Drift, the Error Page's look, or its Error Images.
- Moving ADR-0004's map into one place. It stays copied in each page type template and gains one line in each.
- Creating Team Members to match the node's names, or replacing the avatar-sized Images on Lauren Doe, Sam Reid and Priya Nair.
- Committing the Seed.

## Further Notes

- The node is a group at 1600 by 900, with the panel drawn in black `#0E0A10` with 30px bottom corners and the top gradient as a 197px "Bottom Shadow" vector. The content group's centre sits at y 450, the panel's centre.
- The node's Tiles are 187 by 263 and 235 by 330, a ratio of about 5:7. The site uses `2x3`, 17px taller at 187px wide, because the portraits are shot at exactly 2:3 and the Team Marquee already crops them so.
- Each node Tile is a stack of many hidden rounded rectangles with a "Bottom Shadow" vector beneath; only the top visible image matters. Their corner radius is 15px.
- The node's names are placeholders: "Simon Rattray" labels two different people, and Gill Garrod and Lauren Shelley are not Team Members on the site.
- The node sets the heading at 82px with tracking −3.28px, −4%, the tighter tracking token, and the Eyebrow and name at 16px medium, the Job Role at 14px regular with −2% tracking.
- The fallback will pick Lauren Doe, Sam Reid and Priya Nair ahead of the photographed team, since they come first in structure order and have Images, but their Images are 104px avatars. That is content, not a defect; line 8 proves the fallback, not the photographs.
- The Error Page spec documents the component's `images` param; this spec supersedes that one detail.
