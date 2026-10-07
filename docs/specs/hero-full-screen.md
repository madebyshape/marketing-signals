# Hero Full Screen

Spec for the Hero Full Screen Hero Layout: a full-screen panel over a Hero Image under a dark overlay, with the Breadcrumb on the header's bottom edge, a two-line heading with the Highlight whose first line sits against the left margin and whose second sits against the right, a short text at the bottom left, a small Hero Video at the bottom right, and the Scroll Cue at the pointer. It is the third Hero Layout the Hero field offers editors, the first Hero Layout with a photograph behind it, and the first to reuse Hero Home's Scroll Cue.

Design: Figma node `9927-15493` in the Marketing Signals file, 1600 by 900, the About page hero. The node is one viewport tall with the header's space drawn in. No mobile node exists; the responsive rules below are decisions, not measurements.

Branch: feature/hero-full-screen

Related: the Hero Simple spec, whose breadcrumb component and Hero scaffold this Hero reuses; the Hero Home spec, whose full-screen panel, heading ramp, Scroll Cue, cursor outline style and `replace` Seed key this Hero reuses; the Hero Service spec, whose Hero Video with its Poster fallback this Hero reuses at thumbnail size; the Video spec, whose Video field instructions and Display Type mapping this Hero follows; the Content Seeding spec, whose Seed shape carries the review content. ADR-0001 applies: the header is fixed, so the panel pads its top by the header height from the shared header map. ADR-0002 applies: the review content arrives by Seed. ADR-0003 applies: the Breadcrumb derives the trail from the page. ADR-0004 applies: the Hero Layout decides the Header Colour, and the map gains one line for this Hero. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Heroes" section, which gained Hero Full Screen during the grilling session and whose Hero Image, Hero Video, Scroll Cue and Cursor Label now cover this Hero.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The About Us page needs the hero the design gives it: a photograph filling the screen under a dark wash, a huge two-line heading staggered left and right, a line of copy and a small video of a team member in the corners, and the "Scroll" cue at the pointer. Neither Hero Layout does this. Hero Simple is creme and content-height with no image and no video. Hero Home is full-screen and black but built around the Work Marquee and a Button Group, with no image behind it and no video. An editor who wants the About design today has nothing to pick, and the page renders with no Hero at all.

## Solution

A Hero Full Screen layout editors can pick in the Hero field. It takes a Heading, a Text, a Background Image and a Video, the fields they already use in Blocks, plus the Padding setting. The panel fills the viewport with 30px bottom corners, the photograph covering it under a black overlay so the copy stays legible over any image, and plain black when there is no image. The Breadcrumb sits in white on the header's bottom edge, derived from the page as always. The heading renders at 120px on a desktop in creme 100 with italic words as the Highlight in secondary; a Shift and Enter break splits it into lines, the first against the left margin and every later line against the right, so the design's stagger is the editor's line break and nothing more. The text sits at 30px in the bottom left. The Video sits at the bottom right as a 237 by 150 thumbnail with a small Play Button, opening the Video Modal or playing in place per its Display Type, and shows as a plain picture when only a Poster is set. On fine pointers the Scroll Cue follows the pointer over the panel and a click scrolls to the first Block, exactly as on Hero Home, with the native pointer returning over the Breadcrumb and the video. The Header goes black over it. The About Us page gets the design's content by Seed so the Hero can be reviewed against Figma.

## User Stories

1. As an editor, I want a Hero Full Screen in the Hero field's menu, so that I can give the About page the design's hero.
2. As an editor, I want to pick it on any page, so that the layout is not tied to About.
3. As an editor, I want one Heading field, so that the hero's heading is written the way every other heading is.
4. As an editor, I want italic words in the heading to show as the Highlight in secondary, so that the design's lilac line is mine to place.
5. As an editor, I want Shift and Enter to break the heading, so that I decide where the line splits.
6. As an editor, I want the lines after the first to sit to the right, so that the design's stagger happens without a setting.
7. As an editor, I want a heading with no break to sit left as one line, so that a short heading is not forced into two.
8. As an editor, I want the field's instructions to tell me the break rule, so that I do not have to guess how the stagger works.
9. As an editor, I want a Text field, so that the strapline under the heading is mine to write.
10. As an editor, I want a Background Image field, so that I choose the photograph behind the hero.
11. As an editor, I want the image darkened for me, so that I never have to edit the photograph to make the copy legible.
12. As an editor, I want a hero with no image to render black, so that a page is never broken while I find the photograph.
13. As an editor, I want a Video field with a Poster, a URL or File and a Display Type, so that the corner video works like the Video Block.
14. As an editor, I want Modal Popup to open the video in the overlay, so that the visitor watches it large.
15. As an editor, I want Inline Player to play it in place, so that a short muted clip can loop in the corner.
16. As an editor, I want a Poster with no video to show as a plain picture, so that the corner still carries the team member when there is no film yet.
17. As an editor, I want the corner left empty when there is neither a Poster nor a video, so that nothing broken shows.
18. As an editor, I want the Padding setting, so that I choose whether creme space follows the panel.
19. As an editor, I want no Eyebrow, Button Group or Layout setting on this Hero, so that the form holds only what the design uses.
20. As an editor, I want the Breadcrumb derived from the page, so that I never maintain a trail by hand.
21. As a visitor, I want the hero to fill my screen, so that the page opens on the photograph and the heading alone.
22. As a visitor, I want the Header black over the hero, so that the top of the page reads as one dark surface.
23. As a visitor, I want the Breadcrumb in white on the header's edge, so that I can see where I am and step back.
24. As a visitor, I want the heading at 120px on a desktop with its second line in lilac, so that the page opens the way the design does.
25. As a visitor, I want the heading to shrink on a phone and every line to sit left, so that it reads rather than wraps oddly.
26. As a visitor, I want the text and the video pinned to the bottom of the panel, so that the composition matches the design.
27. As a visitor, I want the text and the video to stack on a phone, so that neither is squeezed.
28. As a visitor, I want the video thumbnail to stay small on a phone, so that it does not become a full-width poster.
29. As a visitor, I want a small Play Button on the thumbnail, so that I know it plays.
30. As a visitor, I want the Play Button to open the Video Modal, so that I can watch the video large and close it by its button, its backdrop or Escape.
31. As a visitor, I want an inline video to play muted on hover with the Time Ring, so that it behaves like every other inline video on the site.
32. As a visitor with a fine pointer, I want the "Scroll" cue at my pointer over the hero, so that I know the page continues.
33. As a visitor with a fine pointer, I want a click on the hero to scroll me to the first Block, so that the cue does what it says.
34. As a visitor with a fine pointer, I want my native pointer back over the Breadcrumb links, so that I know they are links and a click follows them.
35. As a visitor with a fine pointer, I want my native pointer back over the video, so that a click plays the video and never scrolls the page.
36. As a visitor on a touch device, I want no cue and no scroll on tap, so that the hero does nothing surprising.
37. As a visitor who asks for reduced motion, I want the scroll to land immediately and the Poster's hover scale to stay still, so that nothing animates against my setting.
38. As a visitor on a short viewport, I want the panel to grow past the screen rather than let the heading and the bottom row overlap, so that everything stays readable.
39. As a visitor using a keyboard, I want the Breadcrumb links and the Play Button in the tab order, so that I can use the hero without a pointer.
40. As a visitor using a screen reader, I want one `h1` holding the whole heading, so that the page's main heading is announced once.
41. As a visitor using a screen reader, I want the background image to carry no alt and the Play Button to carry its label, so that I hear what matters and nothing decorative.
42. As a search engine, I want the Breadcrumb schema to match the visible trail, so that the About page's trail is indexed correctly.
43. As a developer, I want the Scroll Cue's behaviour defined once and shared by Hero Home and Hero Full Screen, so that a fix in one is a fix in both.
44. As a developer, I want the small Play Button as a size option on the poster component, so that the thumbnail reuses the Video Player unchanged.
45. As a developer, I want the Header Colour to come from ADR-0004's map, so that the black Header is one line, not a new mechanism.
46. As a reviewer, I want the About Us page seeded with the node's copy, photograph, portrait and Vimeo URL, so that I can compare the page with the node at the same width.
47. As a reviewer, I want the Seed to replace whatever the About Us page's Hero field holds, so that reruns leave one Hero.
48. As an agent following the Block workflow, I want the Seed and its images under the scratch folder, so that nothing about review content is committed.

## Implementation Decisions

**Entry type.** A new entry type, handle `heroFullScreen`, name "Hero - Full Screen", colour blue, icon `heading`, no title, slug or status fields, matching Hero Simple and Hero Home. Its layout is the Hero Template's: a Content tab with a Section Header heading element followed by the Heading field with the instructions "Make words italic to highlight them. Shift and Enter breaks the line; lines after the first sit to the right." and the Rich Text - Simple field with the instance handle `text` and label "Text"; then the Section Content heading element followed by the Image field with the instance label "Background Image" and the instructions "Fills the hero behind the content, darkened. Empty is plain black." and the Video field with the Video Block's instructions "Modal Popup opens the video in the overlay. Inline Player plays it in place, muted, on hover. YouTube videos always open in the overlay. A Poster with no video shows as a picture."; then the Section Footer heading element left empty; a Settings tab with the Padding - Hero field as `padding`. No Eyebrow, no Button Group, no Layout dropdown. The Hero field gains Hero Full Screen after Hero Home in the General group; the Hero Template stays out of the field.

**Hero template.** Lives with the Blocks under the partial templates path so the Hero field renders it by handle. It follows the Block scaffold: defaults, the merge line, the section embed. The section takes the editor's Padding as `paddingY`, `bottom` or `none`, and `paddingX` none, so the editor's bottom padding is creme space beneath the panel, not inside it. Inside the section, the panel: full width, black, 30px bottom corners, clipping its overflow, relative, minimum height of the small viewport height so it fills the screen and never jumps as mobile browser chrome shows and hides. It pads its top by the header height from the shared header map, per ADR-0001, its sides by the site margin, and its bottom by 40px, the node's gap under the thumbnail. It is a flex column: the Breadcrumb first, the heading block growing to take the free space with its content centred vertically, the bottom row last. On a viewport shorter than the content the panel grows past the viewport, so the heading and the bottom row never overlap.

**Hero Image.** The editor's image through the picture component, covering the panel with its focal point, empty alt, not lazy since it is above the fold, placed absolutely behind the content. Above it a black overlay at 75% opacity, also absolute, so the panel reads as black-first with the photograph showing through at about the node's 26%. Both sit behind the content and take no pointer events. No image: no picture and no overlay, the panel is plain black.

**Breadcrumb.** The breadcrumb component with the page, which is the Hero entry's owner, in its existing `white` colour: parents at 70% white transitioning to white, the current page white and underlined, chevrons at 70%. The design shows both Crumbs plain white; the 70% parent is the site's own convention for the same trail and is accepted. The trail reads Home › About Us on the About page, since a Crumb takes the entry's title, not the node's shortened "About". On fine pointers the Breadcrumb is a lowered region for the Scroll Cue and a click inside it never scrolls.

**Heading.** Rendered through the alternate heading component as `h1`, since the Heading field's toolbar has no heading button and the hero heading is the page's main heading. Creme 100, semibold, tighter tracking, with the Highlight in secondary through the component's secondary alternate style. Size ramp: 5xl at mobile, 8xl from `md`, 10xl from `lg`, 12xl (120px) from `xl`, with leading 0.97 below `xl` and 0.92 from it, the Hero Home ramp. Before handing the value to the component, the hero template splits it at the editor's line break, whichever form the field stores it in, and wraps each line in a block-level span, so the whole heading is still one `h1` and the Highlight passes through untouched. The first span is left-aligned at every width; every span after it is right-aligned from `lg` and left-aligned below it. Each line is the full content width, so a long line wraps inside its own span rather than overflowing. 30px between lines, which is the node's gap between the two cap-trimmed text boxes. With no break the heading is one left-aligned span. The seeded heading breaks after "Digital" with "Marketing Solutions" italic, so the second line is secondary and right-aligned.

**Text.** Rendered through the rich text component at its `3xl` size, 25px below `lg` and 30px from it, medium, leading 1.2, tighter tracking, in the component's existing creme 100 colour, so the Highlight inside it stays the creme colour's own. The seeded text is one paragraph with a line break after "Built Around Search." so it reads as the node's two lines. Empty text renders nothing and the video keeps the row.

**Bottom row.** Below the heading block, a row holding the text and the Hero Video. From `lg`: a flex row, the text at the left edge, the Hero Video at the right edge, both bottom-aligned, the video 237 wide by 150 tall. Below `lg`: a column, the text first, the Hero Video 30px beneath it, left-aligned and still 237 by 150, so the thumbnail stays a thumbnail on a phone. The row has no top margin of its own; the heading block's growth and the 40px panel padding place it.

**Hero Video.** The video player base component with the Video field, a transform that crops to the thumbnail's 237 by 150 ratio, the Display Type mapped to modal or inline as the Video Block does, 20px corners on the Poster and on the box, the Poster's `sm` Play Button size, and the modal label "Video player". With a Provider the Poster carries the Play Button, opening the Video Modal or playing in place per the Player Type; the Video Modal and its Controls are unchanged. With only a Poster the component's existing fallback renders it as a plain picture through the picture component with focal point, no Play Button. With neither the hero renders nothing bottom right. Inline Player is allowed: the inline template's Time Ring at 42px inset 20px fits the 237 by 150 box, and the field instructions already say what inline means. On fine pointers the Hero Video is a lowered region for the Scroll Cue and a click inside it never scrolls.

**Poster component.** Gains a `size` option: `base`, the existing 80px circle below `lg` and 120px from it with the 24px glyph, unchanged for every existing caller; and `sm`, a 42px circle at every width with a 9px glyph, the node's Play Button. The inline template passes `size` through to the Poster it renders. Nothing else in the poster or inline templates changes.

**Scroll Cue.** The same behaviour as Hero Home: on fine pointers, entering the panel raises the Cursor Label through the cursor component's window event with the text "Scroll", the Font Awesome sharp regular `arrow-down` icon and the `outline` style; leaving the panel lowers it; entering the Breadcrumb or the Hero Video lowers it and leaving them raises it again; a click on the panel outside those two regions scrolls the page to the panel's bottom edge through the shared Lenis instance, so the first Block lands under the header, and Lenis's own reduced-motion handling makes it immediate when asked. Coarse pointers get none of it. The cue is never in the accessibility tree. Hero Home's Alpine data for this is hoisted out of its template into one shared registration under a single name, in the site's JavaScript or a shared Twig partial, that both Hero Home and Hero Full Screen bind to; the lowered regions are the two callers' own markup, so the shared data has no knowledge of what is inside a panel. Hero Home's behaviour does not change.

**Header Colour.** The page type template and the listing type templates that carry ADR-0004's map gain `heroFullScreen` beside `heroHome`, both giving black; everything else and no Hero stays creme 100. A black Header over the dark panel is one surface, which is the design's intent. The map stays in those templates; the Hero template does not set the colour.

**Empty states.** No image: plain black panel, everything else as designed. No heading: the heading block still grows and the bottom row still sits at the bottom, so a half-built hero is not a broken one. No text: the video alone on the row. No Poster and no video: the text alone on the row. No Breadcrumb cannot happen: the trail always holds at least Home.

**Responsive summary.** Below `lg`: the panel fills the viewport, the Breadcrumb on the header's edge, the heading at 5xl then 8xl from `md` with every line left-aligned, the text at 25px, the thumbnail 237 by 150 under it. From `lg`: the heading at 10xl with later lines right-aligned, the text at 30px bottom left, the thumbnail bottom right. From `xl`: the heading at 120px with leading 0.92, the header padding at 123px. The `md` step of the ramp means the tablet width is captured.

**Content.** One Seed, under the scratch folder and not committed, targeting the About Us page's Hero field with `replace`: heading "Best-In-Class Digital" then a line break then "Marketing Solutions" with the second line italic; text "Built Around Search." with a line break then "Measured on Revenue."; the Background Image the 2500 by 1667 photograph exported from the node's fill; the Video with Video Type URL, `https://vimeo.com/822986690`, Display Type Modal Popup, and the Poster the 1667 by 2500 portrait exported from the node's thumbnail fill, cropped by the focal point to the thumbnail's ratio; Padding Bottom. The About Us page holds no Hero and no Blocks today, so the first run adds and a rerun replaces.

**Docs.** `CONTEXT.md` gained Hero Full Screen during the grilling session, Hero Layout now names three layouts, "full-screen hero" left Hero Home's Avoid list, and Hero Image, Hero Video, Scroll Cue and Cursor Label were generalised to cover this Hero. No new ADR. The Hero Home spec's Scroll Cue decision is superseded only in where the Alpine data lives, not in what it does.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The primary seam is the rendered About Us page through the global layout with the seeded Hero Full Screen. The hero is the only caller of the poster's `sm` size and the first second caller of the shared Scroll Cue, so those are proven through it, with the Home page proving the shared cue still works on Hero Home. The Case Studies page, on Hero Simple, proves the other side of the Header Colour map. The secondary seam is the Seed command's own output, which proves `replace` on an empty and then a filled Hero field. Nothing is committed to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the panel filling the viewport with the photograph darkened and the Header black over it, the heading at 120px with its second line lilac and right-aligned, the text and the thumbnail in the bottom corners, the Scroll Cue at the pointer and the native pointer over a Crumb and over the thumbnail, the Video Modal open, and the page landing on the first Block after a click. Fixed widths, one state per file, before and after pairs on the PR. The before for the About Us page is `main` at the commit the branch forked from, with no Hero on it.

**Evidence plan.**

1. About Us page at 1600 by 1000, viewport, at rest: the panel filling the viewport with the photograph darkened, the Header black over it, the Breadcrumb Home › About Us in white on the header's edge, the heading at 120px with "Best-In-Class Digital" left in creme 100 and "Marketing Solutions" right in secondary, the text at 30px bottom left, the 237 by 150 thumbnail with the 42px Play Button bottom right, 40px above the panel's bottom edge, the 30px bottom corners over the creme beneath. Compared against the Figma node for sizes, colours, gaps and alignment. Proves the desktop layout.
2. About Us page at 390 by 844, viewport: the panel filling the viewport, the heading at 5xl with both lines left-aligned, the text at 25px, the thumbnail 237 by 150 left-aligned beneath it. Proves the mobile layout.
3. About Us page at 768, viewport: the heading at 8xl, lines left-aligned. Proves the `md` step of the ramp.
4. About Us page at 1600, viewport, pointer over the empty panel: the Scroll Cue at the pointer, a circled down arrow with "Scroll" beside it, no native cursor. Proves the shared Scroll Cue on this Hero.
5. Home page at 1600, viewport, pointer over the empty panel: the same cue. Proves Hero Home still binds to the hoisted data.
6. About Us page at 1600, viewport, pointer over the Home Crumb: the native pointer, no cue, the Crumb in its hover state. Proves the Breadcrumb lowers the cue.
7. About Us page at 1600, viewport, pointer over the thumbnail: the native pointer, no cue, the Play Button scaled to 110%. Proves the Hero Video lowers the cue.
8. About Us page at 1600, viewport, after a click on the empty panel with a temporary Block beneath: the Block at the top of the viewport under the header, temporary content removed afterwards. Proves the click scrolls.
9. About Us page at 1600, viewport, after a click on the Play Button: the Video Modal open with the Vimeo player and the Controls, and a second capture after Escape with it closed. Proves the modal path.
10. About Us page at 1600 with the Video's Display Type temporarily set to Inline Player, viewport, pointer over the thumbnail: the Time Ring at 42px inset 20px inside the box and the Poster fading out. Restored afterwards. Proves the inline path fits the thumbnail.
11. About Us page at 1600 with the Video's URL temporarily emptied, viewport: the portrait as a plain picture with no Play Button. Restored afterwards. Proves the Poster fallback.
12. About Us page at 1600 with the Background Image temporarily emptied, viewport: the plain black panel with the content unchanged. Restored afterwards. Proves the no-image state.
13. About Us page at 1600 by 600, full page: the panel taller than the viewport with the heading clear of the bottom row. Proves the panel grows.
14. About Us page at 1600 with reduced motion emulated, after a click on the panel: the page already on the Block with no scroll animation. Proves reduced motion.
15. Case Studies page at 1600, viewport: the Header creme over the Hero Simple. Proves the Header Colour map's other side.
16. Served HTML of the About Us page: one `h1` holding two block spans with the Highlight inside the second, the Breadcrumb as the first links after the header, the background picture with an empty alt, the Play Button labelled, no inline styles beyond the picture component's own. Proves the markup.
17. Seed output run twice: the first run reports the Hero Full Screen created with two images uploaded; the second reports it removed and created again with the images reused. Saved as text beside the screenshots. Proves `replace` on both an empty and a filled Hero field.

## Out of Scope

- Any other Hero Layout, or changes to Hero Simple or Hero Home beyond hoisting the Scroll Cue data.
- Building out Hero Simple's new Eyebrow, Button Group and Layout fields, which this morning's config commits added without a spec.
- A Layout or alignment setting on this Hero. The stagger is the editor's line break.
- Alternating or per-line alignment rules beyond "first left, the rest right".
- A dedicated mobile or tablet design. The responsive rules follow the decisions above until frames exist.
- An editor-set overlay strength or colour. The overlay is fixed at black 75%.
- A touch equivalent of the Scroll Cue, or a keyboard control for it.
- Changing the Video Player, the Video Modal, the Controls, the Time Ring, or the Poster's `base` size.
- Changing the breadcrumb component's `white` colour to match the node's plain white parent.
- A transparent Header Colour. The Header goes black, per ADR-0004.
- Committing the Seed, the photograph or the portrait.

## Further Notes

- The node is a group at 1600 by 900. The heading's first line has its cap top at 322 and the second at 432, with 30px between the cap-trimmed boxes; Figma trims text boxes to cap height, so measured gaps on the site may differ by a few pixels.
- Figma tracks the heading at minus 4.8px on 120px and the text at minus 1.2px on 30px, both minus 0.04em, the tighter tracking token.
- The node draws the panel as black with the photograph at 26% opacity; a black overlay at 75% over the photograph at full opacity is the same result and keeps the picture component's markup unchanged.
- The thumbnail is 237 by 150, a ratio of about 1.58:1, at 1323 by 710 in the node, which is 40px from the right margin and 40px above the bottom edge. Its Play Button is a 42px secondary circle with a 9px Sharp Solid play glyph; the site's Sharp Regular glyph is the same accepted difference as the Video Block.
- The Scroll Cue in the node rests at the centre, 704 by 565; that is where the designer left the cursor, not a fixed position.
- The node's Breadcrumb reads "About"; the About Us entry's title is "About Us" and the Crumb follows the title.
- The Figma text is "Best-in-class Digital" with a capitalise style applied, so the Seed writes "Best-In-Class Digital" as it displays.
- The video URL is the same Vimeo film the Video spec seeded on The Tree Center Case Study.
