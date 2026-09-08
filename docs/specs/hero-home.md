# Hero Home

Spec for the Hero Home Hero Layout: a full-screen black panel with a very large heading with the Highlight, a short text in the secondary colour, a Button Group of two, and a Work Marquee of tilted Work Tiles Crawling along the bottom edge, with the Scroll Cue following the pointer over it. It is the second Hero Layout the Hero field offers editors, the first dark Hero, the first caller of the cursor component outside a carousel, and it replaces the Hero Simple on the Home page.

Design: Figma node `9841-19544` in the Marketing Signals file, 1600 by 900, the Home page hero. The node draws the desktop state once with the Scroll Cue at rest; no tablet frame and no mobile frame exist, so the size ramp and the mobile geometry below are decisions, not measurements. The Work Tiles come from the "Hero / Work Slider / Full Width" component the node instances, whose seven tiles carry each client's logo.

Branch: feature/hero-home

Related: the Hero Simple spec, whose entry type shape, section embed and header padding this layout follows; the Marquee - Client spec, whose marquee component and Crawl speed it reuses; the Carousel - Case Study spec, whose Cursor Label it extends; the Content Seeding spec, which gains the `replace` key the Home page needs. ADR-0001 applies: the header is fixed and takes no space, so the Hero pads its top by the header height from the shared map. ADR-0002 applies: the Home page content arrives by Seed. ADR-0004, written during the grilling session, records that the Header Colour follows the Hero Layout. Vocabulary: `CONTEXT.md`, "Heroes" section, which gained Hero Home, Work Marquee, Work Tile and Scroll Cue during the grilling session; Cursor Label and Crawl were generalised so this layout does not fork the language.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Home page opens with the Hero Simple: a breadcrumb, a heading and a paragraph on creme, the same top as every inner page. The design gives Home its own opening: a black screen-filling panel that states what the agency does in two lines, one of them in the brand's secondary colour, a one-line promise beneath, two calls to action, and a tilted row of client work sliding past along the bottom edge, with a cursor that says "Scroll" wherever the pointer rests. Nothing on the site can render that. The Hero field offers only the Hero Simple, the header has no way to turn black over a dark hero, the cursor component only draws the white pill the carousels use, and the Seed command cannot replace the Hero that is already on Home.

## Solution

A Hero Home layout editors can pick in the Hero field. It holds a Heading, a Text, a Button Group of up to two Buttons and an Images field, the same fields they use in Blocks. It renders as a black panel with 30px bottom corners that fills the viewport: the heading at 120px on a desktop in creme with its Highlight in secondary, the text beneath at 30px in secondary, the two Buttons beneath that, creme filled then creme outlined. Along the bottom edge the Work Marquee: the editor's images as portrait Work Tiles with 10px corners, tilted seven degrees so the row rises to the right, running off both edges and cut by the panel's bottom, fading into black where they meet it, Crawling leftwards at the Client Marquee's pace and never pausing. On a fine pointer the Scroll Cue follows the cursor over the panel, a circled down arrow and the word "Scroll", and a click scrolls the page to the first Block; over the Buttons and the Work Tiles the native pointer returns. The Header goes black on any page whose Hero is a Hero Home, by a rule in the page template, so an editor never sets it. The Home page gets a Hero Home by Seed with the Figma copy, the two Buttons linked to the Services and Case Studies pages and the seven logo tiles, replacing the Hero Simple that is there today.

## User Stories

1. As a visitor, I want the Home page to open with a full-screen statement, so that I know what the agency does before I scroll.
2. As a visitor, I want the second line of the heading in the brand's secondary colour, so that the page reads with the same voice as the rest of the site.
3. As a visitor, I want a one-line promise beneath the heading, so that the claim is backed in a sentence.
4. As a visitor, I want two buttons beneath the text, so that I can go to the services or the work in one click.
5. As a visitor, I want the first button to stand out from the second, so that the main path is obvious.
6. As a visitor, I want a row of client work sliding past along the bottom, so that I see who the agency works with without reading a list.
7. As a visitor, I want the row tilted and running off both edges, so that it feels like a glimpse of more rather than a gallery.
8. As a visitor, I want the row to fade into the black at the bottom edge, so that the tiles are cut softly rather than sliced.
9. As a visitor, I want the row to move on its own and never stop, so that the page feels alive without me doing anything.
10. As a visitor, I want the row never to show a gap, so that the loop is invisible.
11. As a visitor with a mouse, I want a "Scroll" cue to follow my pointer over the panel, so that I know the page continues beneath.
12. As a visitor with a mouse, I want the cue to be a small circled down arrow and the word, not a pill, so that it reads as a hint rather than a button.
13. As a visitor with a mouse, I want a click on the panel to scroll me to the first Block, so that the cue does what it says.
14. As a visitor with a mouse, I want my normal pointer back over the buttons, so that a click there is plainly a link.
15. As a visitor with a mouse, I want my normal pointer back over the tiles, so that I am not told to scroll over something that looks like it might be a link.
16. As a visitor with a phone or tablet, I want the panel to fill my screen with the row at the bottom, so that the layout holds without a hover.
17. As a visitor with a phone, I want the heading to step down in size, so that both lines stay on screen.
18. As a visitor with a phone, I want the buttons to wrap rather than overflow, so that both stay reachable.
19. As a visitor with a phone, I want the tiles smaller, so that more than one is in view.
20. As a visitor with a short phone screen, I want the panel to grow rather than clip the buttons, so that nothing is hidden under the tiles.
21. As a visitor, I want the panel to fill the viewport without jumping when the browser's chrome shows and hides, so that the page does not twitch as I scroll.
22. As a visitor, I want the header to be black over the black panel, so that the top of the page reads as one surface.
23. As a visitor on any other page, I want the header to stay creme, so that the rule for Home changes nothing elsewhere.
24. As a visitor, I want the panel's bottom corners rounded over the creme beneath, so that it sits on the page as a card the way the design draws it.
25. As a visitor who prefers reduced motion, I want the row to sit still, so that nothing moves that I did not ask to move.
26. As a visitor who prefers reduced motion, I want a click on the panel to jump rather than glide, so that the scroll respects my setting.
27. As a keyboard user, I want the two buttons to be the first focusable things after the header, so that the hero's paths are reachable without a pointer.
28. As a screen reader user, I want the hero heading to be the page's level-one heading, so that the page outline starts where the page does.
29. As a screen reader user, I want the tiles hidden from me, so that I do not hear fourteen unlabelled images.
30. As a screen reader user, I want the Scroll Cue to be silent, so that a pointer decoration never reaches me.
31. As an editor, I want a Hero Home in the Hero field's menu, so that I can give the Home page its own hero.
32. As an editor, I want to write the heading in the same Heading field I use in Blocks, so that italic means Highlight here as it does everywhere.
33. As an editor, I want a line break in the heading to hold, so that I decide where the two lines split.
34. As an editor, I want to write the text in the same simple rich text field I use in Blocks, so that there is nothing new to learn.
35. As an editor, I want a Button Group of up to two, so that I cannot add a third the design has no room for.
36. As an editor, I want to pick the tiles in an ordinary Images field, so that I can reorder or replace them like any other images.
37. As an editor, I want to add fewer images than the row needs and still see a full row, so that I never have to pad the field.
38. As an editor, I want a Hero Home with no images to still fill the screen, so that a half-built hero is not a broken one.
39. As an editor, I want the header colour to follow the hero on its own, so that I never set it or get it wrong.
40. As an editor, I want a Padding setting on the hero, so that I can close the gap to a Block that wants to sit tight beneath it.
41. As an editor, I want the hero's fields under Section Header, Section Content and Section Footer, so that a Hero reads like a Block in the control panel.
42. As a developer, I want Hero Home built on the Hero Template layout, so that every Hero Layout shares one control panel shape.
43. As a developer, I want the Work Marquee built on the marquee component, so that the Crawl is the one the Client Marquee already proved.
44. As a developer, I want the Scroll Cue raised through the cursor component's window event, so that the page still has one cursor.
45. As a developer, I want the cursor component to draw the outlined style from the event detail, so that the carousels never notice the change.
46. As a developer, I want the map from Hero Layout to Header Colour in one place in the page template, so that the next dark Hero is one line.
47. As a developer, I want the hero's top padding read from the shared header map, so that a header height change reaches the hero.
48. As a developer, I want the Seed command to replace the Blocks in a field, so that the Home page's Hero can be swapped without a control panel login.
49. As a developer, I want the fade drawn in CSS rather than as an image, so that it needs no asset and scales with the panel.
50. As a reviewer, I want the hero on the Home page and the Hero Simple still on the Case Studies page, so that I can check both Header Colours in one run.

## Implementation Decisions

**Entry type.** A new entry type, handle `heroHome`, name "Hero - Home", colour blue, icon `heading`, no title, slug or status fields, matching Hero Simple. Its layout is the Hero Template's: a Content tab with a Section Header heading element followed by the Heading field with the instructions "Make words italic to highlight them. Shift and Enter breaks the line." and the Rich Text - Simple field with the instance handle `text` and label "Text"; then the Section Content heading element followed by the Images field with the instance label "Work Tiles" and the instructions "Portrait images for the row along the bottom. They repeat to fill the row."; then the Section Footer heading element followed by the Button Group field, which already allows at most two; a Settings tab with the Padding - Hero field as `padding`. No Eyebrow. The Hero field gains Hero Home beside Hero Simple; the Hero Template stays out of the field.

**Hero template.** Lives with the Blocks under the partial templates path so the Hero field renders it by handle. It follows the Block scaffold: defaults, the merge line, the section embed. The section takes the editor's Padding as `paddingY`, `bottom` or `none`, and `paddingX` none, so the editor's bottom padding is creme space beneath the black panel, not inside it. Inside the section, the black panel: full width, black, 30px bottom corners, clipping its overflow, minimum height of the small viewport height so the panel fills the screen and never jumps as mobile browser chrome shows and hides. The panel pads its top by the header height from the shared header map, per ADR-0001, and lays out two things: the content column in flow at the top, and the Work Marquee absolutely placed along the bottom edge.

**Content column.** Site margins on both sides. The heading first, 40px below the header from `xl` and 30px below it beneath, then the text 30px below the heading, then the Button Group 30px below the text. The column reserves the band the Work Marquee occupies as bottom padding, about 370px from `lg` and 230px beneath, so on a viewport shorter than the content the panel grows past the viewport and the Buttons never sit under a tile; on a taller viewport the panel is the viewport and the band is at the bottom.

**Heading.** Rendered through the alternate heading component as `h1`, since the Heading field's toolbar has no heading button and the hero heading is the page's main heading. Creme 100, semibold, tighter tracking, with the Highlight in secondary through the component's secondary alternate style. Size ramp: 5xl at mobile, 8xl from `md`, 10xl from `lg`, 12xl (120px) from `xl`, with leading 0.97 below `xl` and 0.92 from it, matching the type tokens. Maximum width 1263px, the node's text box. The component already turns a soft line break into a break, so the editor's Shift and Enter decides the split; the Figma copy breaks after "Driven" with the second line italic, so the whole second line takes the secondary colour.

**Text.** Rendered through the rich text component at its `3xl` size, which is already 25px below `lg` and 30px from it, medium, leading 1.2, tighter tracking. The component gains a `secondary` colour whose paragraphs, headings and lists are secondary, whose links are creme 100, and whose italic is the Highlight in creme 100, so the text can never be the same colour as its own Highlight. The hero uses it; every other colour is left as it is.

**Buttons.** Rendered through the button group component with the colours creme 100 then creme 100 outline, both of which the button component already has, base size, inline icon, start aligned. The group wraps below `md` when the two do not fit. Each Button is the editor's link; the seed links "What we do" to the Services page and "Our Work" to the Case Studies page as entry links.

**Work Marquee.** The editor's images as Work Tiles inside the marquee component, embedded with a `sm` gap option the component gains: 10px below `lg`, 16px from it, with the same last-item margin trick the base gap uses so the seam never reads short. Leftwards, the Client Marquee's 0.4 speed, no pause on hover. The Work Tiles repeat until there are at least twelve, so the seven seeded tiles become fourteen and the widest viewport never shows a gap; the repeat count is derived from the image count the way the Client Marquee derives it from its Clients. Each Work Tile is the picture component at the `3x5` transform, 150 by 253 below `lg` and 242 by 408 from it, 10px corners, empty alt, not lazy for the first set since the row is above the fold. The marquee wrapper is wider than the panel and centred, 120% of the panel's width at every size, then rotated minus 7 degrees about its centre, so the tilt never exposes a corner. It is placed against the bottom edge and shifted down so that at 1600 the tile at the horizontal centre shows about 325px of its 408px above the edge; the row rises to the right, so the right-most tile is nearly whole and the left-most shows about 250px. The whole marquee is hidden from assistive technology and takes no pointer events of its own; the rule under Scroll Cue handles the pointer.

**Fade.** A band 118px tall along the panel's bottom edge, above the tiles, a gradient from transparent at its top to black at the bottom, drawn with Tailwind's gradient utilities and no image. It is the node's "Bottom Shadow" vector, which is the same gradient turned upside down, and the tiles read as sinking into the black rather than being cut.

**Scroll Cue.** On fine pointers entering the panel raises the Cursor Label through the cursor component's window event with the text "Scroll", the Font Awesome sharp regular `arrow-down` icon and a new `style` key set to `outline`; leaving the panel lowers it. Entering the Button Group or the Work Marquee lowers it and leaving them raises it again, so the native pointer returns over anything that is or looks like a link. A click on the panel outside those two regions scrolls the page to the panel's bottom edge through the shared Lenis instance, so the first Block lands at the top of the viewport under the header; Lenis's own reduced-motion handling makes the scroll immediate when the visitor asks for it. Coarse pointers get none of this: the cue is a pointer decoration, the Buttons are the paths, and a tap on the panel does nothing. The cue is never in the accessibility tree; the cursor component already hides it.

**Cursor component.** Gains a `style` in the event detail, read afresh on every event like text and icon, defaulting to the pill the carousels use. The `outline` style draws no pill: the icon sits in an 18px circle with a 1px creme 100 border, 8px in creme 100, and the text follows 6px to the right at 14px regular, white, leading 20px, tight tracking. Nothing else in the component changes; the carousels send no style and see the pill.

**Header Colour.** The page type template and the Case Study type templates that reuse it read the page's Hero and set the Header Colour from a small map in one place: `heroHome` gives black, everything else and no Hero gives creme 100. The global layout's default stays creme 100 and the error page keeps setting black itself. ADR-0004 records the rule. A black Header over the black panel is one surface, which is the design's intent; the Header is otherwise unchanged.

**Empty states.** No images: the panel still fills the viewport, the content column still reserves nothing extra, no Work Marquee and no fade render, and the Scroll Cue still shows because the page continues beneath. No Buttons: the group renders nothing and the text is last. No heading and no text: the panel still renders with the Work Marquee, so a half-built hero is not a broken one.

**Seed command.** The Seed shape gains an optional `replace` key. When true, the command removes every Block in the target field before adding the Seed's Blocks, reports what it removed, and adds the Blocks as if the field were empty; rerunning replaces again and reports the same, so the result is the same each time even though the skip path never applies. Dry run reports what it would remove and add and writes nothing. The Content Seeding spec records the key. It exists because the Hero field takes one entry and Home already has one, and ADR-0002 says an agent never needs control panel credentials.

**Content.** One Seed, under the scratch folder and not committed, targeting the Home page's Hero field with `replace`: heading "Performance Driven" then a line break then "Digital Marketing" with the second line italic; text "Built Around Search. Measured on Revenue."; the Button Group with "What we do" linked to the Services page and "Our Work" linked to the Case Studies page; the seven Work Tiles exported from the Figma component with their logos, flattened to JPG on the panel's black, in the design's order: Tree Center, Ultimate Performance, Ray-Ban, Better Bathrooms, Marriott, Missguided, GXO; Padding none. Qantas appears in the node only as an override without its logo and is left out. The Hero Simple content the Seed replaces was itself seeded and is not kept.

**Docs.** `CONTEXT.md` gained the Hero Home vocabulary during the grilling session and generalised Cursor Label and Crawl. ADR-0004 records the Header Colour rule. The Content Seeding spec gains the `replace` key.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The primary seam is the rendered Home page through the global layout with the seeded Hero Home. The hero is the only caller of the cursor's outline style, the marquee's `sm` gap and the rich text's secondary colour, so those are proven through it. The Case Studies page, still on Hero Simple, proves the other side of the Header Colour map. The secondary seam is the Seed command's own output, which proves `replace`. Nothing is committed to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the panel filling the viewport with the header black over it, the heading at 120px with its second line in secondary, the tilted row cut and fading at the bottom, the Scroll Cue at the pointer and the native pointer over a button, and the page landing on the first Block after a click. Fixed widths, one state per file, before and after pairs on the PR. The before for the Home page is `main` at the commit the branch forked from, with the Hero Simple still on it.

**Evidence plan.**

1. Home page at 1600 by 1000, viewport, at rest: the black panel filling the viewport with the Header black over it, the heading at 120px with "Digital Marketing" in secondary, the text at 30px in secondary 30px beneath, the two Buttons creme filled then creme outlined 30px beneath that, the tilted row with its tiles at 242 by 408 cut by the bottom edge and fading into black, the 30px bottom corners over the creme beneath. Compared against the Figma node for sizes, colours, gaps and the row's position. Proves the desktop layout.
2. Home page at 390 by 844, viewport: the panel filling the viewport, the heading at 5xl, the text at 25px, the Buttons wrapped if they must, the tiles at 150 by 253 along the bottom. Proves the mobile layout.
3. Home page at 768, viewport: the heading at 8xl. Proves the `md` step of the ramp.
4. Home page at 1600, viewport, pointer over the empty panel: the Scroll Cue at the pointer, a circled down arrow with "Scroll" beside it, no pill, no native cursor. Proves the Cursor Label's outline style.
5. Home page at 1600, viewport, pointer over the first Button: the native pointer, no cue, the Button in its hover state. Proves the Buttons lower the cue.
6. Home page at 1600, viewport, pointer over a Work Tile: the native pointer, no cue. Proves the Work Marquee lowers the cue.
7. Home page at 1600, viewport, after a click on the empty panel: the first Block at the top of the viewport under the header. Proves the click scrolls.
8. Home page at 1600, two viewport captures a second apart: the row moved leftwards with no gap at the seam. Proves the Crawl.
9. Home page at 1600 with reduced motion emulated, two captures a second apart: the row unchanged. Proves reduced motion.
10. Home page at 1600 by 600, full page: the panel taller than the viewport with the Buttons clear of the tiles. Proves the reserved band.
11. Case Studies page at 1600, viewport: the Header creme over the Hero Simple. Proves the Header Colour map's other side.
12. Served HTML of the Home page: an `h1` with the Highlight inside it, a `br` between the lines, the Work Marquee hidden from assistive technology with empty alts and fourteen tiles, the Buttons as the first links after the header, no inline styles. Proves the markup.
13. Home page at 1600 with the Images field temporarily emptied: the panel still filling the viewport, no row, no fade, the cue still showing. Restored afterwards. Proves the empty state.
14. Seed output run twice: the first run reports the Hero Simple removed and the Hero Home created with seven images uploaded; the second reports the Hero Home removed and created again with the images reused. Saved as text beside the screenshots. Proves `replace`.

## Out of Scope

- Any other Hero Layout, or changes to Hero Simple.
- Work Tiles linking anywhere, or coming from Case Study entries with their Thumbnails and Logos. If wanted, that is a later spec and the Images field gives way to an Entries field.
- A Qantas tile. It needs a logo tile the Figma component does not carry.
- A dedicated mobile or tablet design. The responsive rules follow the decisions above until frames exist.
- A touch equivalent of the Scroll Cue, or a keyboard control for it.
- Pausing the Crawl on hover, or any hover change to a Work Tile.
- A transparent Header Colour. The Header goes black, per ADR-0004.
- Changing the rich text component's other colours, the cursor's pill, or the marquee's base gap.
- Removing Hero Simple content from any page but Home.
- Committing the Seed or the tiles.

## Further Notes

- The node is a group at 1600 by 900. The heading's cap top sits at 163, which is the 123px header at `xl` plus 40; Figma trims text boxes to cap height, so measured gaps on the site may differ by a few pixels.
- Figma tracks the heading at minus 4.8px on 120px and the text at minus 1.2px on 30px, both minus 0.04em, the tighter tracking token.
- The row's tiles are 242 by 408 with centres 258px apart along the row, which is a 16px gap, and the row rises 7 degrees: over 1600px that is about 196px, which is why the right-most tile is nearly whole while the left-most is cut to about 250px.
- The "Bottom Shadow" vector is a 118px gradient from black to transparent rotated 180 degrees, so on the page it is transparent at the top and black at the bottom edge.
- The Scroll Cue in the node rests at 75% of the width and 373px down; that is where the designer left the cursor, not a fixed position.
- The seven logo tiles export from the master component at 580 by 869; the hero instance overrides one of them to Qantas, which is why Qantas has no logo tile.
- The Home page's Hero Simple reads "Growth You Can Measure" today and was seeded during the Hero Simple work; nothing else depends on it.
