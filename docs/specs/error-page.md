# Error Page

Spec for the Error Page: a full-screen black page for any HTTP error, showing the Status Number, the Error Heading, the Error Links and the Scattered Tiles, with the Footer beneath it. It is the first caller of the Scattered Tiles and Button Group components and the first page to use the black Header Colour.

Design: Figma node `9716-8215` in the Marketing Signals file, 1600 by 900. No mobile node exists; the responsive rules below are decisions, not measurements. Reference for the Drift: the scattered-images hero on the Belasko site (madebyshape/belasko-ltd) and its live About Us page.

Related: the Global Header spec, which promised the layout variable this page uses to pick the black Header Colour. ADR-0001 applies: the header is fixed and takes no space, so the page is designed with the header overlapping its top edge and a gradient beneath it. Vocabulary: `CONTEXT.md`, "Error page" section, which gained its terms during the grilling session.

## Problem Statement

A visitor who follows a broken link sees a plain "Page Not Found" line squeezed under the header, then the Footer. It has no design, no way back into the site, and it shows the creme header over what should be a dark page. Editors have already filled the 404 tab of the Site entry with a heading, four links and seven images, and nothing renders them. A server error shows the same plain layout and, with devMode off, prints the file path and line of the failure to the visitor.

## Solution

An Error Page that fills the screen in black. The Status Number, "404" for a missing page, sits huge in the middle in creme, with the editor's Error Heading beneath it in the secondary colour and the Error Links as a row of pill buttons, the first solid and the rest outlined. Around the edges, five Tiles cropped from the editor's Error Images sit part way off screen and Drift with the pointer and the scroll. The header shows its black colour over the top of the page and the Footer follows beneath. A server error shows the same page with "500" as its Status Number and no debug detail.

## User Stories

1. As a visitor, I want a missing page to show a designed Error Page rather than a bare line of text, so that a broken link still feels like the same site.
2. As a visitor, I want a huge "404" in the middle of the screen, so that I know at once what happened.
3. As a visitor, I want a friendly sentence beneath the number, so that the page speaks to me rather than at me.
4. As a visitor, I want a row of buttons to the main parts of the site, so that I can get back on track without the menu.
5. As a visitor, I want the first button to stand out from the others, so that the most likely next step is obvious.
6. As a visitor, I want photographs scattered around the edges, so that the page has some of the site's warmth rather than a black void.
7. As a visitor with a mouse, I want the photographs to shift gently as I move the pointer, so that the page feels alive.
8. As a visitor, I want the photographs to drift slightly as I scroll down to the Footer, so that they have depth.
9. As a visitor who prefers reduced motion, I want the photographs to stay still, so that the page does not move against my settings.
10. As a visitor on a touch device, I want no pointer-following motion, so that the page does not jump when I tap.
11. As a visitor, I want the photographs never to block a button, so that a drifting Tile cannot stop me clicking.
12. As a visitor, I want the page to fill exactly one screen with the Footer beneath, so that the layout is calm and the Footer is still a scroll away.
13. As a visitor on a phone, I want the page to fill the screen without jumping as the browser bars come and go, so that the layout settles.
14. As a visitor, I want the header in its black colour over the page, so that the logo and menu read on the dark background.
15. As a visitor, I want a dark gradient under the header, so that the menu stays legible where a photograph passes beneath it.
16. As a visitor on a phone, I want the number, heading and buttons sized to fit, so that nothing overflows the screen.
17. As a visitor on a phone, I want fewer, smaller photographs kept to the corners, so that they do not cover the text.
18. As a visitor, I want the buttons to wrap onto more lines on a narrow screen, so that every link stays reachable.
19. As a visitor who hits a server error, I want the same designed page with "500" on it, so that the site still looks intact.
20. As a visitor who hits a server error, I want no file paths or line numbers on the page, so that the site does not leak its internals.
21. As a screen reader user, I want the Error Heading read as the page's heading and the number as plain text, so that the page has one meaningful heading.
22. As a screen reader user, I want the scattered photographs skipped, so that I am not read a list of decorative images.
23. As a keyboard user, I want the buttons in the order they appear, so that tabbing through the page makes sense.
24. As an editor, I want the heading I wrote on the Site entry to appear on the Error Page, so that I can change the wording without a developer.
25. As an editor, I want the buttons I added on the Site entry to appear in the order I set, so that I control where visitors are sent.
26. As an editor, I want the first five images I uploaded to fill the five Tiles in order, so that I can choose what appears where.
27. As an editor, I want every image cropped to the same portrait shape, so that any photograph I upload fits the composition.
28. As an editor, I want a Tile left empty when I upload fewer than five images, so that the page still renders.
29. As an editor, I want an empty heading or an empty links field to render nothing rather than placeholder copy, so that only what I wrote appears.
30. As a developer, I want the Header Colour decided by a layout variable with a default, so that any page can switch it without touching the header.
31. As a developer, I want the Scattered Tiles as a component, so that a future hero can reuse the composition and the Drift.
32. As a developer, I want a Button Group component that colours buttons by position, so that every block with a row of buttons renders them the same way.
33. As a developer, I want the Drift built on GSAP's pointer-following helpers rather than a tween per frame, so that it stays cheap on low-end devices.
34. As a developer, I want the Button Group on the styleguide, so that its colour sequence can be reviewed on both panels.
35. As a reviewer, I want the Error Page reachable on the DDEV site at a known URL, so that I can compare it against Figma.

## Implementation Decisions

**One Error Page for every status.** The exception layout is rebuilt as the Error Page. It extends the global layout and composes everything; the 404 and generic error templates only extend it and pass their Status Number. The generic error template drops its debug block: with devMode on Craft shows its own exception page instead, and with devMode off the block would print the failing file and line to visitors. The offline template is untouched.

**Header Colour.** The global layout stops hardcoding creme and reads a page-level variable that defaults to creme, exactly the hook the Global Header spec promised. The Error Page sets it to black. No CMS field.

**Data source.** Everything editable reads from the Site entry's 404 tab: the Error Heading (CKEditor heading), the Error Links (Button Group Unlimited, a Matrix of Button entries whose link field holds the label, URL and target) and the Error Images (an Assets field with no limit). The content is already in place on the development site: the heading sentence, four links (Home, Case Studies, Services, Insights) and seven images. No Seed is needed.

**Page shell (from the Figma node).** Black background, full bleed, at least the small viewport height so mobile browser chrome does not resize it. The content group (Status Number, Error Heading, Button Group) is centred in the full viewport as Figma does, ignoring the header; the fixed header overlaps the top. Site margins either side of the content. The shell is positioned and clips overflow so the Tiles crop at its edges. A 197px gradient from black to transparent runs across the top, above the Tiles and below the header, so the menu reads over any Tile. The Footer follows in flow; its rounded top corners show the creme body at the join, as on every page.

**Status Number.** A plain paragraph, not a heading, hardcoded per template: "404" and "500". At `lg` and above it is the 14xl token (400px, semibold, 0.92 leading, tighter tracking) in creme-100; below `lg` it is 13xl (160px), which fits a 390 screen inside the site margins. Its bottom edge sits 54px below the vertical centre at 1600 by 900.

**Error Heading.** Rendered through the alternate-style heading component as an h1 at 3xl (30px, medium, 1.2 leading, tighter tracking), which gains a `secondary` colour for the whole heading; Highlights inside it stay primary. Centred, 40px below the Status Number's line box at `lg` (Figma: number bottom at 504, heading top at 544), 2xl and 20px below it under `lg`. The editor's CKEditor wrapper is handled by that component as it is elsewhere.

**Error Links.** Rendered through the new Button Group component 24px below the heading (Figma: heading bottom at 616, buttons at 640), centred, with the colour list creme-100 then creme-100 outline, inline icon style with the arrow-up-right icon after the label, base size. The row wraps on narrow screens.

**Button Group component.** A new leaf component. Params: `buttons` (the Button entries; each button's link value is what the button component already takes), `colours` (a list matched to buttons by index, the last colour repeating for every further button, default the secondary colour), `size`, `iconStyle`, `align` (`start`, `center`, `end`; default start) and `class`. Flex row, wrapping, 10px gap. Renders nothing with no buttons. It follows the component conventions: `component` variable, default params, the exact merge line, options for `align`, class arrays, output. It gains a styleguide preview with two buttons of different colours on both panels.

**Scattered Tiles component.** A new component with its own Alpine data. Params: `images` (the assets, of which the first five are used), `transform` (default `3x5`), `sizes`, `slots` (defaulting to the five positions below, each a position class string and a speed) and `class`. It renders an absolutely positioned layer filling its parent, hidden from assistive technology, unselectable and ignoring the pointer, with one Tile per image up to the slot count, each through the picture component at the transform with 10px radius and an empty alt. Tiles are 242px wide from `lg` and 120px below it; slots 3 and 4 are hidden below `lg`. Tiles are not lazy loaded: they are all in the first viewport. A new `3x5` Imager transform (400, 800 and 1200 widths, 3:5 ratio) is added beside the existing ones.

**Slot positions.** Percentages of the layer, from the Figma insets at 1600 by 900, in the order the images are used:

| Slot | Position | Speed | Below `lg` |
|---|---|---|---|
| 1 | top -18.9%, left 2.2% | slow | shown |
| 2 | top -2.4%, right 8.5% | mid | shown |
| 3 | top 44%, left 8.1% | fast | hidden |
| 4 | top 86.6%, left 42.6% | slow | hidden |
| 5 | top 71%, right -1.9% | mid | shown |

**Drift.** Registered as an Alpine component named after the file with setup in `init()`, Tiles reached through refs, each carrying its speed as a data attribute. Speed multipliers are 0.1, 0.2 and 0.36 for slow, mid and fast. Everything is created inside `gsap.matchMedia`, so a changed preference or pointer type is handled without a reload:

- Under reduced motion nothing is created and the Tiles sit where they are laid out.
- With a fine pointer, one passive `mousemove` listener on the window normalises the pointer against the layer's centre to a range of -0.5 to 0.5 on each axis. Each Tile has a `gsap.quickTo` for x and for y with a duration of about 0.6s and a soft ease; on every move each Tile is sent to the normalised position times its multiplier times 200px, so the fastest Tile moves at most 36px at the edge of the layer. Tiles carry `will-change` for transforms. No tween is created per frame.
- Everywhere motion is allowed, one scrubbed ScrollTrigger per Tile, triggered by the layer from "top bottom" to "bottom top", moves the Tile down by 10 times its multiplier as a percentage of its height (1%, 2% or 3.6%) as the layer passes through the viewport.

**Responsive.** Mobile first. Below `lg`: Status Number at 13xl, Error Heading at 2xl, buttons wrapping and centred, three Tiles at 120px. From `lg`: the desktop values above. The `lg` step is the first width at which "404" at 400px (about 690px wide with tracking) fits inside the site margins.

**Empty states.** With no Error Heading no heading renders; with no Error Links no Button Group; with no Error Images no Tiles. The Status Number always renders. No fallback copy.

**Docs.** `CONTEXT.md` gained the "Error page" vocabulary during the grilling session. No new ADR: none of the decisions is hard to reverse.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The primary seam is the rendered Error Page through the global layout at the 404 URL `/jgjg`, which needs devMode off: flip `CRAFT_ENVIRONMENT` in the environment file away from `dev` for the captures and restore it afterwards, since Craft shows its own exception page with devMode on. The 500 variant is reached through a temporary template containing `{% exit 500 %}`, removed after capture. The styleguide is the secondary seam for the Button Group. The Scattered Tiles component is proven through the Error Page, its only caller.

**What good evidence looks like.** It shows what a visitor would see: the number, heading and buttons at the designed sizes and spacing, the five Tiles cropped at the edges, Tiles in a different place after the pointer moves and after a scroll, nothing moving under reduced motion, the black header over the page, and the stacked mobile layout. Fixed widths, one state per file, before and after pairs on the PR. The before captures at 1600 and 390 already exist in the evidence folder for this slug.

**Evidence plan.**

1. Error Page at 1600, viewport, pointer parked off the page: compared against the Figma node for the Status Number, Error Heading, buttons, gradient and the five Tile positions. Proves the desktop layout.
2. Error Page at 1600, viewport, after the pointer moves to the top-left of the window and settles: every Tile has moved and the fast Tile has moved furthest. Proves the pointer Drift.
3. Error Page at 1600, full page: the Footer beneath the page. Proves the full-screen height and the join.
4. Error Page at 1600, viewport, scrolled 400px: the header hidden and the Tiles lower than at rest. Proves the scroll Drift and that the header behaves as on any page.
5. Error Page at 1600 with reduced motion emulated, after a pointer move and a scroll: Tiles exactly where they were at rest. Proves the reduced-motion branch.
6. Error Page at 390, viewport: Status Number at 160px, heading at 2xl, buttons wrapped and centred, Tiles in slots 1, 2 and 5 at 120px. Proves the mobile layout.
7. Error Page at 1024, viewport: the desktop values apply and "404" fits inside the site margins. Proves the `lg` step.
8. Error Page at 1600 with the temporary 500 template: "500" as the Status Number, the same heading, buttons and Tiles, no file path or line on the page. Proves the shared page and the removed debug block. Removed afterwards.
9. Rendered HTML of the Error Page: the Error Heading is the only h1, the Tiles are hidden from assistive technology with empty alt text, no inline styles. Proves the accessibility story.
10. Styleguide at 1600: the Button Group preview with two colours on both panels. Proves the component's colour sequence.
11. Error Page at 1600 with the Error Heading temporarily cleared on the Site entry: the number and buttons render with no heading and no gap where it was. Proves the empty state. Restored afterwards.
12. Browser console on the Error Page: no errors from the Drift on load, pointer move or scroll. Proves the GSAP setup.

## Out of Scope

- Client logos on the Tiles. Figma overlays one per Tile; no field carries them and the uploads do not include them. Editors can bake a logo into an image if they want one.
- An entrance animation. The reference has none.
- A CMS field for the Header Colour, or hero- and entry-type rules for it. The layout variable is the hook.
- A dedicated mobile design. The mobile rules above are decisions until one exists.
- Tile slots beyond five. The sixth and seventh uploaded images are ignored.
- The offline template.
- Seeding. The Site entry already holds the content.

## Further Notes

- The seven uploaded images are 242px wide Figma exports with heights from 121px to 408px; the 3:5 crop is what makes them uniform, and any later upload gets the same treatment.
- Figma's tracking on the Status Number is -16px at 400px, exactly the tighter tracking token; the heading's -1.2px at 30px matches it too.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
- The button component's inline padding is 12px vertical against Figma's 15px on this node; the existing component is used as it is, matching every other button on the site.
- The current header is transparent over the top of a page until it has slid away and back, so the black colour here shows mainly as white text and, once scrolled, the black bar.
