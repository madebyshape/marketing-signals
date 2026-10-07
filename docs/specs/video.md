# Video

Spec for the Video Block: one video from the Video field, 16:9 across the content width inside the site margins, that plays in place or in the Video Modal by its Display Type. With no video it shows its Poster alone, and with neither it shows nothing. Its Poster carries the Shade at rest. It is the third caller of the Video Player after Video Content and Content Rows, the second Block after Content Rows to honour the Video field's Display Type, and the first Block reviewed on a Case Study page rather than the Home page.

Design: Figma node `9903-14968` in the Marketing Signals file, 1600 wide: a 1520 by 820 panel at x 40 with 20px corners, a photograph at 60% opacity over black, and the "Button / Play / Circle / Large" component, a 120px secondary circle with a 24px black play glyph, centred. No mobile node, no hover node and no inline state exist, so the responsive rules and the Inline Video's look are decisions, not measurements.

Related: the Video Content spec, whose Video Player, modal Player Type, Poster and Play Button this Block reuses; the Content Rows spec, whose inline Player Type, Hover Play and Time Ring this Block reuses unchanged and whose Media it mirrors at 16:9 instead of square; the Case Study Intro spec, whose Case Study page this Block is reviewed on; the Content Seeding spec, which puts it there. ADR-0001 does not apply: the Block is in flow beneath the Case Study Intro. ADR-0002 applies: the Case Study content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Video" section, which gained Video and Shade during the grilling session; "Video block" was removed from the Video Content avoid list so the two terms no longer clash.

## Problem Statement

The Case Study design has a section that is nothing but a large landscape video: a darkened still filling the width between the site margins, a play circle in its middle. Editors have no Block for it. Video Content always pairs a video with copy in a black panel, Content Rows pairs it with copy beside a square, and neither can show a video on its own or at 16:9. The only entry type that holds a bare Video field is Longform Video, which lives inside the Longform rich text field, not the Blocks field, and has no template.

## Solution

A Video Block editors can add to any page and any Case Study. It holds the Video field in the Section Content and nothing else, with the Padding field in Settings. It renders as one 16:9 box across the content width inside the site margins, with 20px corners and black behind it. A Video with Modal Popup is the Poster under the Shade with the Play Button, opening the Video Modal on click. A Video with Inline Player is an Inline Video: the Poster under the Shade until a fine pointer hovers or the Time Ring is pressed, then playing muted in place with the Time Ring at its bottom right. A Video whose URL resolves to no Provider, or with no URL and no File, shows its Poster as a plain picture with no Shade and no Play Button. A Block with no Poster and no video renders nothing at all, section included. The Tree Center Case Study gets one instance, Inline Player, Vimeo `822986690`, with the node's photograph as its Poster, added through the Seed command so the review starts from real content.

## User Stories

1. As a visitor, I want a full-width video on a Case Study page, so that I can watch the client's story without leaving the page.
2. As a visitor, I want the video's still darkened with a play circle over it, so that I can tell it is a video before I touch it.
3. As a visitor, I want the video in its own 16:9 frame, so that nothing of the film is cropped away when it plays.
4. As a visitor, I want the video to open in an overlay when the editor chose that, so that I get sound and full controls.
5. As a visitor, I want the overlay to close with its button, its backdrop or Escape, so that I can get back to the page any way I expect.
6. As a visitor with a mouse, I want an inline video to play silently while my pointer is over it, so that I get a preview without committing to it.
7. As a visitor with a mouse, I want the inline video to pause when my pointer leaves, so that it does not play on behind my back.
8. As a visitor, I want a ring button in the video's corner that plays or pauses it and stays how I left it, so that I can watch it through without holding the pointer still.
9. As a visitor with a phone, I want the ring button to be the way I play and pause, so that a video with no hover still works.
10. As a visitor with a phone, I want the video the full width between the margins at 16:9, so that it scales down with the screen and stays whole.
11. As a visitor, I want the still to fade away when the video starts and never come back, so that the film is not hidden behind its own poster.
12. As a visitor, I want the still shown until the video has loaded, so that nothing is blank while I wait.
13. As a visitor who prefers reduced motion, I want hover to do nothing and the ring button still to work, so that nothing moves unless I ask.
14. As a keyboard user, I want the play circle and the ring button to be focusable buttons with visible focus rings and labels, so that I can operate the video without a mouse.
15. As a screen reader user, I want the still to have no alt text and the buttons to say what they do, so that I hear "Play video" and not a description of a photograph.
16. As a visitor, I want a Poster with no video shown as a plain picture without a play circle or darkening, so that I am not invited to click something that does nothing.
17. As a visitor, I want a YouTube video always to open in the overlay, so that it plays properly whatever the editor chose.
18. As a visitor, I want the video's still to keep its focal point when cropped to 16:9, so that the subject stays in frame at every width.
19. As an editor, I want a Video Block in the Blocks list, so that I can drop a video anywhere on a page or Case Study.
20. As an editor, I want the same Video field I already know from Video Content and Content Rows, so that I paste a URL or upload a file the way I always do.
21. As an editor, I want the Display Type to choose between the overlay and playing in place, so that I decide how each video behaves.
22. As an editor, I want to be told on the field what Modal Popup and Inline Player do and that YouTube always opens the overlay, so that I do not have to try both.
23. As an editor, I want to add a Poster alone and get a picture, so that I can drop the video in later without the page breaking.
24. As an editor, I want to add a video URL without a Poster and still get a working player, so that a forgotten image is not a broken Block.
25. As an editor, I want the Padding setting like every other Block, so that I control the space around it.
26. As an editor, I want a Block with nothing in it to show nothing, so that an unfinished Block leaves no gap on the page.
27. As a developer, I want the Block to reuse the Video Player's base template, so that Provider detection, the YouTube rule and the Poster fallback are written once.
28. As a developer, I want the Block to reuse the Video field and the Padding field, so that no field is created.
29. As a developer, I want the Shade to be an option on the Poster and the inline template, off by default, so that Video Content and Content Rows are unchanged.
30. As a developer, I want the Block to own the 16:9 box and the Video Player to fill it, so that the ratio lives in one place, as Content Rows does with its square.
31. As a developer, I want the Case Study content added by a Seed rather than by hand, so that the review environment is reproducible.
32. As a developer, I want the Block's inner markup in one place, so that Longform Video can call it later with a one-line template.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `video`, name "Video", colour blue, icon `video`, no title field, added to the Blocks field in the General group. The entry type handle and the Video field handle are both `video`; Craft keeps those in separate namespaces, and the "no type suffixes" rule rules out `videoBlock`. Its Content tab follows the three-slot layout with the one slot it uses: a Section Content heading element, then the Video field with the instructions "Modal Popup opens the video in the overlay. Inline Player plays it in place, muted, on hover. YouTube videos always open in the overlay. A Poster with no video shows as a picture." There is no Section Header and no Section Footer. Its Settings tab has the Padding field.

**Fields.** None created. Video and Padding are reused unchanged. The Video field's own layout already hides the URL and File fields by Video Type.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding as vertical padding and the site margin as horizontal padding. It reads the Video field, its Poster, and whether a video is present, which is a URL or a File as Video Content tests it. It renders when there is a Poster or a video and nothing at all otherwise, section included. It has no Alpine data of its own: the Video Player owns every behaviour.

**Box.** One relative wrapper, `aspect-video`, overflow hidden, 20px corners, black behind it, the full content width inside the site margins at every width. The Video Player's base template is called inside it with the Video field, the `16x9` transform, the Player Type from the Display Type, `inline` for Inline Player and `modal` otherwise, the Shade on, the modal label "Video player" and a class that fills the box, as Content Rows does with its square. No grid columns are involved: the node's panel is the whole 1520.

**Ratio.** 16:9 at every width. The node's panel is 1520 by 820, a ratio of about 1.85:1, so true 16:9 at 1600 is 855 tall, 35px taller than the node. Accepted: a Vimeo frame is 16:9, so an Inline Video fills the box with nothing cropped and no letterbox, and the transform already exists.

**Shade.** A new `shade` option on the Poster component and on the inline template, off by default, so every existing caller is unchanged. When on, the Poster's picture is drawn at 60% opacity over the black box, which is the node's darkening. In the modal Player Type the Shade stays for as long as the Poster does. In the inline Player Type the Poster and its Shade fade out together the first time the video plays, over 300ms under motion-safe, and never return, as the inline template already does for the Poster. The image-only fallback has no Shade and no Play Button: a plain picture through the picture component at `16x9` with its focal point, filling the box.

**Play Button.** The Poster component unchanged: an 80px secondary circle below `lg` and 120px from `lg`, the Sharp Regular play glyph at 24px in black, scaling to 110% on a fine-pointer hover under motion-safe. The node's 120px is the `lg` size exactly. Its Solid glyph against the site's Regular is the same accepted difference as Video Content.

**Inline Video.** The inline Player Type reused unchanged: created muted on the first hover or press, Hover Play on fine pointers that can hover when reduced motion is not requested, the Time Ring at 42px inset 20px below `lg` and 40px from `lg`, pinning on press, no loop, no autoplay on scroll. The Poster inside it uses the `16x9` transform so it matches the box.

**Video Modal.** Reused unchanged: the Poster's button opens it, the Video Player plays with the same Controls for every Provider, and it closes by its button, its backdrop or Escape.

**Empty states.** A Poster and no video: the plain picture. A video and no Poster: the Player over the black box, the Play Button or the Time Ring on black, which is the Video Player's existing behaviour. Neither: nothing.

**Responsive summary.** The box is the full content width at 16:9 at every width. Below `lg`: the Play Button at 80px, the Time Ring inset 20px. From `lg`: the Play Button at 120px, the Time Ring inset 40px. No `md` rules of its own; the tablet capture is the resting state only.

**Case Study content.** One Video Block appended to the end of The Tree Center Case Study's Blocks, padding Top and Bottom: Video Type URL, `https://vimeo.com/822986690`, Display Type Inline Player, the Poster the photograph exported from the node's image fill, a portrait 1020 by 1201 still that the focal point crops to 16:9. Added with the Seed command from a Seed file under the scratch folder, the Video field written as a nested map as the Content Rows Seed already does. The Seed is not committed. The Padding field's own default is Bottom, so the Seed sets Top and Bottom explicitly.

**Branch.** `Branch: feature/video`. The tickets share it and the factory keeps one PR, code-reviewed against the spec before merge.

**Docs.** `CONTEXT.md` gained the Video vocabulary during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The primary seam is the rendered Tree Center Case Study page at `/case-study/the-tree-center` through the global layout, with the Block seeded after its existing Blocks. The Block is the only caller of the Shade option, so it is proven through it, with the Vimeo adapter inline. The modal path, the YouTube rule and the image-only fallback are proven through temporary Seeds on the same page that are removed afterwards. The Seed command's own output is the second seam. Because the Block is one call into the Video Player, no styleguide page is added.

**What good evidence looks like.** It shows what a visitor would see: the box against the node at 1600 with the Shade and the Play Button, the Inline Video playing on hover with the Time Ring part empty and the Poster gone, paused after the pointer leaves, pinned after a press, the Video Modal open, the plain picture with no video, and the full-width box on a phone. Fixed widths, one state per file, after-only because the Block did not exist before. The group review takes the three resting screenshots at 1600, 768 and 390; the other states are checked in the browser and reported. The 35px ratio difference is reported as a line in the PR body, not captured.

**Evidence plan.**

1. Tree Center at 1600, full page cropped to the Block: the 16:9 box 1520 wide with 20px corners, the photograph under the Shade, the 120px Play Button centred. Compared against the Figma node for width, corners, darkening and the circle. Proves the desktop layout and the Shade.
2. Tree Center at 1600, viewport on the Block before any hover: the Poster under the Shade, the Time Ring full with the play glyph, no Vimeo iframe in the rendered HTML. Proves the rest state and lazy creation.
3. Tree Center at 1600, viewport on the Block with the pointer over it for three seconds: the Poster and the Shade gone, the video playing muted filling the box with no letterbox, the Time Ring's arc shorter, the pause glyph, the label reading the time left. Proves Hover Play, the 16:9 fit and that the Shade leaves with the Poster.
4. Tree Center at 1600, viewport on the Block after moving the pointer away: paused, the play glyph, the arc where it stopped. Proves pause on leave.
5. Tree Center at 1600, viewport on the Block after pressing the Time Ring while hovered, then moving the pointer away: still playing. Proves pinning.
6. Tree Center at 1600, the Time Ring focused by keyboard and pressed: playing, the focus ring visible. Proves keyboard control.
7. Tree Center at 1600 with `prefers-reduced-motion: reduce` emulated, the pointer over the Block for three seconds: the Poster still showing; then the Time Ring pressed: playing with no fade. Proves reduced motion.
8. Tree Center at 768, full page cropped to the Block: the box the full width between the margins at 16:9, the 80px Play Button. Proves the tablet layout at rest.
9. Tree Center at 390, full page cropped to the Block: the box the full width between the margins at 16:9, the 80px Play Button, the Time Ring inset 20px. Proves the mobile layout.
10. Tree Center at 390, viewport on the Block after tapping the Time Ring: playing with the pause glyph; tapped again: paused. Proves the touch path.
11. Tree Center at 1600 with a temporary Seed whose Block has Display Type Modal Popup: the Poster under the Shade with the Play Button at rest; the Play Button hovered at 110%; the Video Modal open after a click with the video playing; closed by Escape. Removed afterwards. Proves the modal path.
12. Tree Center at 1600 with a temporary Seed whose Block has a YouTube URL and Display Type Inline Player: the Poster with the Play Button and the Video Modal on click, no inline player. Removed afterwards. Proves the YouTube rule.
13. Tree Center at 1600 with a temporary Seed whose Block has a Poster and no URL: the plain picture at 16:9 with no Shade and no Play Button. Removed afterwards. Proves the image-only fallback.
14. Tree Center at 1600 with a temporary Seed whose Block has the Vimeo URL and no Poster: the black box with the Time Ring, playing on hover. Removed afterwards. Proves the no-Poster state.
15. Home page at 1600, viewport on the Video Content Block and on the Content Rows video row: unchanged, no Shade. Proves the option is off by default.
16. Rendered HTML of the Tree Center page: the Block a `section`, the Play Button a `button` labelled "Play video", the Time Ring a `button` with a live label, the Poster's picture with empty alt, the Video Modal a `dialog` role. Proves the accessibility story.
17. Seed command output for the Tree Center Seed, run twice: created after the last Block on the first run with the image uploaded, skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- Longform Video. It keeps its entry type in the Longform field and gains no template here; the Block's inner markup is placed so it can call it later.
- An Eyebrow, heading, text, caption or Section Footer on the Block. The node is the video alone.
- A ratio choice. It is always 16:9.
- A width choice or grid columns. It is always the content width inside the site margins.
- YouTube playing inline. It opens the Video Modal.
- Sound on an Inline Video, a mute toggle, seeking, fullscreen or a text countdown. The Time Ring is the only control.
- Looping an Inline Video, or playing it when it scrolls into view.
- A Shade on Video Content or Content Rows. The option exists but stays off there.
- A styleguide entry. The Block adds no new component.
- Committing the Seed or its image.

## Further Notes

- The node's panel is 1520 by 820 at x 40, the site margins exactly; `16x9` at 1600 is 855 tall, 35px taller.
- The node's image is a portrait 1020 by 1201 still cropped by its fill; the export is the whole still, so the Poster depends on the focal point as every Poster does.
- The node's Play Button is "Button / Play / Circle / Large": 120px, #AFAFFF, the theme's secondary, with a Font Awesome Sharp Solid play glyph at 24px in #0E0A10, the theme's black.
- The node's darkening is the image at 60% opacity over black, so the Shade is opacity on the picture, not an overlay.
- The Video Content block tells editors its Display Type is ignored; Content Rows and this Block honour it.
- Test video: `https://vimeo.com/822986690`, the same Vimeo the Content Rows and Video Content Seeds use.
