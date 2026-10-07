# Video CTA

Spec for the Video CTA Block: a black panel inside the site margins with an Eyebrow and a Rule at its top, the heading, a Divider and an Avatar Group along its bottom right, and the Play Button at its bottom left. The Video - Only field fills the panel: with a video source it plays as an Ambient Video behind the content, muted and looping, and the Play Button opens the Video Modal with sound; with only a Video Thumbnail the Poster shows as a plain picture and there is no Play Button. It is the first Block to autoplay anything, the first caller of the Video - Only field on a Block, and the first Block reviewed on a Service page.

Design: Figma node `9406-12558` in the Marketing Signals file, 1600 wide: a 1520 by 689 panel at x 40 with 20px corners. No mobile node, no hover node and no playing state exist, so the responsive rules and the Ambient Video's look are decisions, not measurements.

Branch: feature/video-cta

Related: the Video Content spec, whose Video Player, Video Modal and Poster this Block reuses; the Video spec, whose Vimeo and File Providers the Ambient Video is built on and whose Case Study review this Block mirrors on a Service; the Content Rows spec, whose Inline Video the Ambient Video is deliberately not; the Hero Service spec, whose Avatar Group rendering and Service page this Block sits beneath; the Global Footer spec, whose Avatar Group component gains a size; the Content Seeding spec, which puts the review content on the Service. ADR-0001 does not apply: the Block is in flow beneath the Service Hero. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Video CTA" section, which gained Video CTA, Ambient Video and Video Shadows during the grilling session; Play Button and Divider were widened to cover this Block.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A Service page has a Hero, then whatever Blocks the editor adds, and none of them puts a moving picture of the team beside a statement of why a visitor should choose the agency. The nearest Blocks are Video Content, which is a Poster beside two columns of text, and Video, which is a bare player, and both wait for a click before anything moves. An editor wanting a panel that plays quietly on its own, with a heading and a named person over it and a way to watch the full film with sound, has nothing to reach for.

## Solution

A new Block, Video - CTA, that an editor adds to any page with a Blocks field and fills with an Eyebrow, a heading, a Video - Only field and an Avatar Group. On the page it is a black panel with 20px corners inside the site margins. From the desktop breakpoint the panel is the design's ratio, 1520 by 689: the Eyebrow with its Rule sits 50px in from the top and sides, the Play Button, a 100px lilac circle, sits 40px in from the bottom left, and along the bottom right the heading at 46px semibold in white, right aligned and up to 770px wide, then a 77px white Divider, then the Avatar Group with a 77px avatar, its name in creme-100 and its role in white, all ending 50px from the right. When a Vimeo URL or a File is set, the video plays behind the content as an Ambient Video: muted, looping, no Controls, starting when the panel comes into view and fading in over the Poster. The Play Button opens the Video Modal, where the same video plays with sound and the Controls, and the Ambient Video pauses until the modal closes. The two Video Shadows, a light gradient at the top and a heavy one at the bottom, keep the text readable over the picture whether it moves or not. With only a Video Thumbnail the Poster is a plain picture with no Play Button. Under reduced motion nothing plays by itself and the Poster stays. Below the desktop breakpoint the panel is 4:5 with the Eyebrow at the top, and at the bottom the heading left aligned, then a row of the Play Button and the Avatar Group, with no Divider. One Video CTA is seeded on the AI-focused SEO service with the node's copy so the Block can be reviewed against the design.

## User Stories

1. As a visitor, I want a short film of the team playing quietly as I scroll past, so that the agency feels like real people without me having to press anything.
2. As a visitor, I want that film to be silent until I ask for sound, so that a page never starts talking at me.
3. As a visitor, I want the film to loop, so that it is always moving whenever I look at it.
4. As a visitor, I want a play button on the panel, so that I know I can watch the full film with sound.
5. As a visitor, I want the play button to open the film in the Video Modal, so that I get the same player, Controls and close behaviour as every other video on the site.
6. As a visitor, I want the quiet film to pause while I watch in the modal, so that two copies are not playing at once and my connection is not doing double work.
7. As a visitor, I want the quiet film to carry on when I close the modal, so that the panel does not go still behind me.
8. As a visitor, I want a label above the heading, so that I know what the panel is about before I read it.
9. As a visitor, I want a large heading over the picture, so that the panel says something rather than only showing something.
10. As a visitor, I want the key words of the heading in the brand lilac when the editor marks them, so that the panel reads with the same voice as the rest of the site.
11. As a visitor, I want a named person with their role and photograph in the panel, so that there is a face and a name to the claim.
12. As a visitor, I want the text to stay readable over a bright or busy picture, so that I never have to squint at the heading.
13. As a visitor, I want a still picture in the panel until the film is ready, so that the panel is never a black hole while something loads.
14. As a visitor, I want the film to appear smoothly over the still, so that there is no hard cut when it starts.
15. As a visitor with reduced motion on, I want the panel to stay still, so that nothing moves without my say so.
16. As a visitor with reduced motion on, I want the play button still there, so that I can still choose to watch.
17. As a visitor on a phone, I want the panel taller than it is wide, so that the picture, the heading and the person all fit without being tiny.
18. As a visitor on a phone, I want the heading, the play button and the person stacked at the bottom, so that nothing overlaps.
19. As a visitor on a phone, I want the film to play in the panel and not take over the screen, so that the page keeps behaving as a page.
20. As a visitor on a slow connection, I want the page to load without the film's embed, so that the film costs nothing until I scroll to it.
21. As a keyboard user, I want the play button to be a real button that I can tab to and press, so that the modal opens without a mouse.
22. As a keyboard user, I want Escape to close the modal and my focus to return to the play button, so that I am back where I was.
23. As a screen reader user, I want the play button labelled as playing a video, so that I know what pressing it does.
24. As a screen reader user, I want the quiet film hidden from me, so that my reader does not announce an embed with no controls.
25. As a screen reader user, I want the heading as a real heading and the person's name and role as text, so that the panel reads in order.
26. As a visitor, I want the picture to keep its focal point at every width, so that the people in it are never cropped out.
27. As a visitor, I want the picture darkened only as much as the design asks, so that the film is still visible behind the text.
28. As an editor, I want to add a Video - CTA Block to any page with a Blocks field, so that the panel is not tied to one page type.
29. As an editor, I want to set an Eyebrow and a heading, so that the panel carries my message.
30. As an editor, I want to mark words in the heading italic to make them lilac, so that the highlight works the way it does everywhere else.
31. As an editor, I want to set a Vimeo URL or upload a File, so that the film comes from wherever it lives.
32. As an editor, I want to set a Video Thumbnail, so that the panel has a picture before the film plays and when it never does.
33. As an editor, I want a Thumbnail with no video to show as a plain picture, so that I can use the panel as a static banner.
34. As an editor, I want to leave out the video and the Thumbnail and still get the black panel with my heading, so that the Block is never blank for want of a picture.
35. As an editor, I want to set a person's photo, name and role in one Avatar Group, so that the person is set the same way as on the Service Hero and the Footer CTA.
36. As an editor, I want to leave the Avatar Group empty and lose only the person and the Divider, so that the panel still works without one.
37. As an editor, I want to leave the Eyebrow empty and lose only the label and its Rule, so that I am not forced to write one.
38. As an editor, I want the Block to show nothing when it has no heading and no picture and no video, so that an unfinished Block leaves no empty panel behind.
39. As an editor, I want the Padding setting the other Blocks have, so that I control the space around the panel.
40. As an editor, I want no Display Type on this Block, so that I am not offered a choice the panel does not honour.
41. As an editor, I want the field's instructions to say the video plays muted behind the content and opens in the modal from the play button, so that I know what I am setting.
42. As an editor, I want a YouTube URL to still work, so that a wrong Provider does not break the Block.
43. As an editor, I want to see the Block's name and a play icon in the Block picker, so that I can find it.
44. As a developer, I want the Play Button to be its own component, so that the Poster and this Block share one circle and one hover.
45. As a developer, I want the Ambient Video built on the Video Player's own Providers, so that Vimeo and File are handled in one place.
46. As a developer, I want the Avatar Group component to gain a size rather than the Block styling it by hand, so that the 77px avatar is available to the next Block that needs it.
47. As a developer, I want the Block to follow the Block scaffold, so that it reviews like every other Block.
48. As a reviewer, I want the review content seeded on the AI-focused SEO service by the Seed command, so that I compare the page with the Figma node without touching the control panel.
49. As a reviewer, I want before and after screenshots at the fixed widths, so that the evidence stands on its own.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `videoCta`, name "Video - CTA", colour blue, icon `circle-play` as Video Content uses, no title field, added to the Blocks field in the General group. Its Content tab follows the three-slot layout: a Section Header heading element with the Eyebrow and Heading fields; a Section Content heading element with the Video - Only field, with the instructions "The video plays muted behind the content and opens in the Video Modal from the Play Button. A Thumbnail with no video shows as a picture. YouTube videos show the Thumbnail and open in the modal.", then the Avatar Group field. There is no Section Footer. Its Settings tab has the Padding field.

**Fields.** None created. Eyebrow, Heading, Video - Only, Avatar Group and Padding are reused unchanged. The Video - Only field has no Display Type, which is why it is the one used: the Block has exactly one behaviour and offers no choice.

**Block template.** Lives with the other Blocks so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding as vertical padding and no horizontal padding, the site margin applied by the Block itself as Video Content does. It reads the Eyebrow, the heading, the Video - Only field, its Poster, whether a video source is present, which is a URL or a File as Video Content tests it, and the Avatar Group. It renders when there is a heading, a Poster or a video source, and nothing at all otherwise, section included. It has no Alpine data of its own: the Video Player owns every behaviour.

**Panel.** One relative wrapper inside the site margins: overflow hidden, 20px corners, black behind everything, isolated so the Video Modal's teleport is unaffected. From `lg` it holds the design's ratio, 1520 by 689, and grows only when the content is taller. Below `lg` it is 4:5, growing the same way. The media layer fills the panel absolutely; the content is a column over it with the Eyebrow at the top and the bottom cluster pinned to the bottom by the column's justification.

**Media layer.** The Video Player's base template gains a third Player Type, `ambient`, beside `modal` and `inline`, and the Block calls it with the Video - Only field, the ambient Player Type, the modal label "Video player" and a class that fills the panel. In the ambient Player Type the base template renders, in order: the Poster picture at 80% opacity over the black, filling the layer with its focal point through the `16x9` transform and cropped by the layer, since no transform matches the panel's ratio; the video slot the Provider fills; the two Video Shadows; the Play Button; and the Video Modal, unchanged. The Video - Only field has no Display Type, so the base template must tolerate a Video field without one: it already reads the Display Type only where the caller passes a Player Type derived from it, and this Block passes `ambient` directly.

**Ambient Video.** A second adapter on the Video Player's Alpine data, created from the same Provider registry as the modal's adapter, so Vimeo and File are handled in one place. The Providers gain two creation options, `loop` and `background`: for Vimeo they map to the player's own `loop` and `background` options, which mute it, loop it and strip its chrome; for File they set the element to loop and keep it muted before the source is set, so autoplay is allowed. The ambient adapter is created the first time the panel enters the viewport, watched with an IntersectionObserver from the Alpine `init`, so the page loads with no embed, and it is never created when reduced motion is requested or when the Provider is YouTube. On its first play the Poster fades out over 300ms under motion-safe and never returns, as the Inline Video's does; the Video Shadows stay. The ambient adapter's element is hidden from assistive technology and ignores the pointer, so a Provider's own hover chrome never appears. The ambient adapter is never unmuted and never has Controls.

**Video Modal.** Reused unchanged, opened by the Play Button: the modal's adapter is created on the first open exactly as today, plays with sound and the Controls, and closes by its button, its backdrop or Escape, returning focus to the Play Button. Opening the modal pauses the ambient adapter when there is one, and closing it plays the ambient adapter again. The two adapters are separate Provider players; Vimeo's `autopause` is already off, so neither stops the other by itself.

**YouTube.** The ambient Player Type refuses YouTube the way the inline Player Type does: the Poster stays, the Play Button shows, and the modal plays the YouTube video. The Block never needs to know.

**Play Button.** The lilac circle is extracted from the Poster component into its own Play Button component, a real button with the label "Play video", the Sharp Regular play glyph in black, scaling to 110% on a fine-pointer hover under motion-safe, with a size option: `base` is the Poster's 80px below `lg` and 120px from `lg`, unchanged; `md` is 80px below `lg` and 100px from `lg` for this Block. The Poster keeps wrapping its whole picture in one button and renders the circle through the new component as decoration, so its markup and behaviour are byte-for-byte unchanged apart from the shared partial. In the ambient Player Type the Play Button is its own button in the layer's bottom left, 40px in from `lg` and 20px below, above the Video Shadows and the video, and opens the Video Modal. The Play Button's Solid glyph in Figma against the site's Regular is the same accepted difference as Video Content.

**Video Shadows.** Two absolutely placed gradients over the media layer, under the content and the Play Button, ignoring the pointer: at the top, black at 30% fading to clear over 30% of the panel height, the node's 210 of 689; at the bottom, black at 80% fading to clear over 53% of the panel height, the node's 365 of 689. They are rendered by the ambient Player Type, not the Block, so the next Block with an Ambient Video gets them.

**Content.** Inside the panel, from `lg`: the Eyebrow component with the Rule on, white text and the white 30% Rule colour, 50px in from the top and both sides. The bottom cluster is a row aligned to its bottom edge, 50px in from the right and 52px from the bottom: the heading through the heading component that renders the Highlight, `h2`, `5xl`, white, right aligned, the Highlight in secondary, at most 770px wide; then the Divider, a 1px white line at 50% opacity, 77px tall, with 30px to its left and 31px to its right; then the Avatar Group through the user component at the new `xl` size in its `creme-100` colour. Below `lg`: 25px insets all round, the heading left aligned at `3xl` and `4xl` from `md`, then 20px, then a row with the Play Button at the left and the Avatar Group at the right, aligned to the row's centre, with no Divider. The Play Button therefore leaves the media layer's corner below `lg` and joins the content row, which the ambient Player Type supports by rendering the Play Button through a block the Block can place; from `lg` it is in the corner.

**Avatar Group.** The user component gains an `xl` size: the `xl` name, the `base` role, and a new `xl` avatar size on the avatar component, 77px. The name is the component's `creme-100` heading colour, which is the node's creme-100; the role is white at 63%, accepted against the node's white as the Service Hero accepted the same. The avatar and the name are 10px apart in the node against the component's 12px gap, accepted.

**Empty states.** A Poster and no source: the Poster is a plain picture at 80% over black with the Video Shadows, no Play Button, no ambient adapter and no Video Modal. A source and no Poster: the black panel with the Video Shadows and the Play Button, the Ambient Video fading in over the black when it plays. Neither: the black panel with the Video Shadows and the content alone. No Avatar Group name: the Divider and the Avatar Group are left out. No Eyebrow: the label and its Rule are left out and the bottom cluster is unchanged. No heading, no Poster and no source: nothing.

**Reduced motion.** With reduced motion requested the ambient adapter is never created, the Poster stays with its Shadows, and the Play Button still opens the Video Modal. Under reduced motion the Play Button's hover scale and the Poster's fade are already off.

**Responsive summary.** Below `lg`: 4:5 panel, 25px insets, heading `3xl`, Play Button 80px in the content row with the Avatar Group, no Divider. From `md`: heading `4xl`. From `lg`: the design's ratio, 50px insets, heading `5xl` right aligned up to 770px, Divider, Play Button 100px in the corner 40px in, Avatar Group `xl`. The tablet capture is the `md` heading step only.

**Service content.** One Video - CTA Block appended to the end of the AI-focused Search Engine Optimisation service's Blocks, padding Top and Bottom: Eyebrow "Why Choose Us", heading "Performance-Driven Digital Marketing Across All Search & AI Surfaces." with no Highlight, Video Type URL, `https://vimeo.com/822986690`, the Poster the photograph exported from the node's image fill, and the Avatar Group with the node's avatar photograph, "Simon Rattray", "Head of Marketing". Added with the Seed command from a Seed file under the scratch folder, prepared during the grilling session with the two photographs beside it. The Seed is not committed.

**Branch.** `Branch: feature/video-cta`. The tickets share it and the factory keeps one PR, code-reviewed against the spec before merge.

**Docs.** `CONTEXT.md` gained the Video CTA vocabulary during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests, captured per the evidence doc.

**Seams.** The single primary seam is the AI-focused SEO service page on the DDEV site, with the seeded Block. The Video CTA is proven only there: the Ambient Video, the Play Button, the Video Modal, the Video Shadows and the Avatar Group all show on that page. The secondary seams are the Seed command's own output and the served HTML. The Poster's unchanged rendering is proven on the Case Study page the Video spec seeded, since the Play Button extraction touches it. Nothing is committed to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the film moving behind the heading at rest, the still Poster under reduced motion, the modal open with sound and the film paused behind it, the stacked layout on a phone. Fixed widths, one state per file, before and after pairs on the PR. The before for the service page is the page without the Block; the before for the Case Study is its Video Block as it renders today.

**Evidence plan.**

1. AI-focused SEO service at 1600, the Block scrolled into view and the Ambient Video playing, viewport: the panel at 1520 by 689 with 20px corners; "Why Choose Us" and its Rule 50px in; the Play Button at 100px, 40px from the bottom left; the heading right aligned at 46px ending 52px above the bottom; the Divider; the 77px avatar with "Simon Rattray" in creme-100 and "Head of Marketing" in white ending 50px from the right; the film visible behind with both Video Shadows. Compared against the Figma node. Proves the desktop layout and the Ambient Video.
2. The same page at 1600 before the Block is scrolled to, the served HTML and the network log: no Vimeo iframe in the document until the panel enters the viewport. Proves the lazy embed.
3. The same page at 1600 with the Poster still showing, captured the instant the panel enters view, then again once the film plays: the Poster gone, the Shadows unchanged. Proves the fade and the persistent Shadows.
4. The same page at 1600, the Play Button hovered: the circle grown. Proves the hover state.
5. The same page at 1600, the Play Button clicked: the Video Modal open with the Vimeo video playing with sound and the Controls, and the Ambient Video behind it paused. Proves the modal and the pause.
6. The same page at 1600 after Escape: the modal closed, focus on the Play Button, the Ambient Video playing again. Proves the resume and the focus return.
7. The same page at 1600 with reduced motion emulated: the Poster still, no iframe in the document, the Play Button present and opening the modal. Proves the reduced-motion rule.
8. The same page at 390, full page: the 4:5 panel, the Eyebrow 25px in, the heading left aligned at `3xl`, the Play Button at 80px and the Avatar Group in one row, no Divider. Proves the mobile layout.
9. The same page at 768, viewport: the heading at `4xl`. Proves the `md` step.
10. The same page at 1600 with the Video URL temporarily cleared: the Poster as a plain picture, no Play Button, no iframe, the Shadows and content unchanged. Restored afterwards. Proves the picture fallback.
11. The same page at 1600 with the Video URL replaced by a YouTube URL temporarily: the Poster with the Play Button, no iframe at rest, the modal playing the YouTube video. Restored afterwards. Proves the YouTube rule.
12. The same page at 1600 with the Avatar Group name temporarily cleared: the heading alone at the bottom right, no Divider. Restored afterwards. Proves the Avatar Group empty state.
13. Served HTML of the service page: an `h2` for the heading, the name and role as text, one `button` labelled "Play video", the ambient video slot hidden from assistive technology, and the modal's dialog markup as Video Content renders it. Proves the markup.
14. The Tree Center Case Study at 1600, before and after: the Video Block's Poster and Time Ring unchanged. Proves the Play Button extraction changed nothing.
15. Seed output for the service Seed, run twice: the Block created with both photographs uploaded, then skipped with both reused. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- A Display Type on this Block. The Video - Only field has none and the Block has one behaviour.
- Sound on the Ambient Video, or any Controls on it. Sound is the Video Modal's.
- Pausing the Ambient Video when the panel leaves the viewport. It is created on entry and then left to loop.
- A YouTube Ambient Video.
- A dedicated mobile design. The responsive rules follow the decisions above until a mobile node exists.
- Changing the Video Modal, the Controls, the Inline Video or the Time Ring.
- Changing the Poster's rendering beyond routing its circle through the Play Button component.
- Text columns, buttons or a Button Group in the panel. The heading and the Play Button are the whole call to action.
- Committing the Seed or the photographs.

## Further Notes

- The node's panel is 1520 by 689, a ratio of about 2.2:1, which is why the panel holds that ratio from `lg` rather than 16:9: the design's heading and Avatar Group need the shallower panel, and the Ambient Video is cropped by the panel with its focal point, as a 16:9 film in a 2.2:1 box must be.
- The heading's right edge is 1223 at 1600, 30px left of the Divider at 1253; the avatar starts at 1284, 31px right of it. The heading's 770px is not a column count, so it is a max width.
- The name's 23px and the role's 16px are the user component's `lg` text sizes exactly; only the avatar's 77px is new, hence a new size rather than a one-off.
- Vimeo's background mode both mutes and loops and hides the chrome, which is why the Providers gain `background` as well as `loop`: a File needs the loop and the mute set by hand.
- The Poster fades at 80% rather than the Shade's 60% because the design darkens the picture by 20% and lets the Shadows do the rest; the Shade stays the Video Block's device.
- The Figma photograph and avatar were exported during the grilling session and sit with the Seed under the scratch folder, since the Figma asset URLs expire in seven days.
