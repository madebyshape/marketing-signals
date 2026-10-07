# Video Content

Spec for the Video Content Block: a Poster beside an Eyebrow with a Rule, a heading with the Highlight, two Text Columns and a Button Group, set in a black panel inside the site margins with the Squiggle at its bottom right. Clicking the Poster opens the Video Modal, where a Video Player plays a Vimeo, YouTube or uploaded File video with the same Controls. It is the first caller of the Video Player, the second caller of the Squiggle outside the Footer, and follows the Client Marquee on the Home page.

Design: Figma node `9841-18397` in the Marketing Signals file, 1600 wide. No mobile node and no node for the Video Modal exist; the responsive rules and the modal's look below are decisions, not measurements. The keystone-tutors repo's `videoPlayer` component family (branch `dev`) is the reference for the Video Player.

Related: the Client Marquee spec, which this Block follows on the Home page; the Content Seeding spec, which puts it there; the Global Footer spec, whose Squiggle this Block reuses; the Case Study Carousel spec, whose black panel inside the site margins this Block matches. ADR-0001 does not apply: the Block is in flow beneath the Client Marquee. ADR-0002 applies: the Home page content arrives by Seed. No new ADR: none of the Block's decisions is hard to reverse. Vocabulary: `CONTEXT.md`, "Video Content" section, which gained Video Content, Poster, Play Button, Video Modal, Video Player, Provider, Controls and Text Columns during the grilling session; Poster was chosen over Thumbnail, which the Case Study section already owns.

## Problem Statement

The Home page runs from the hero to the Client Marquee and then the footer. The design follows the Marquee with a black panel: a photograph of a team member with a play button, and beside it a label, a statement about partnering with the agency, two columns of text and two buttons. Editors have no Block to build it with. The Video field exists with a Provider choice, a URL, a File and a Poster, but nothing renders it: the three video and modal templates in the components folder are unused boilerplate that play Vimeo only, in muted background mode, and reach into the document with manufactured classes the coding standards forbid.

## Solution

A Video Content Block editors can add to any page. It holds an Eyebrow and a heading in the Section Header, the Video field and the two Text Columns in the Section Content, and a Button Group of up to two Buttons in the Section Footer. It renders as a black panel with 20px corners set in from the page by the site margins. From `lg` the Poster fills the left of the panel with a 5px inset and 15px corners, the Play Button centred on it; the Eyebrow with its Rule, the heading in white with its Highlight in fluro, the Text Columns in creme and the Button Group sit in the right column. Below `lg` the Poster sits above the content, full width. The Squiggle hangs off the panel's bottom right corner in black-200, clipped by the panel, and draws itself in as the visitor scrolls. Clicking anywhere on the Poster opens the Video Modal: a full-screen backdrop with a 16:9 Video Player that starts playing with sound, with its own Controls, closed by its close button, its backdrop or Escape. The Video Player is a new reusable component ported from keystone-tutors, with a Provider adapter each for Vimeo, YouTube and File, replacing the three unused templates. The Home page gets one instance with the Figma content and the Vimeo video, added through the Seed command so the review starts from real content.

## User Stories

1. As a visitor, I want a photograph with a play button beside a statement and two columns of text, so that a page can introduce the agency's people in their own words.
2. As a visitor, I want the panel black with rounded corners set in from the page edges, so that it reads as one card like the Case Study Carousel.
3. As a visitor, I want the heading's highlighted words in fluro on the black, so that the key phrase lands.
4. As a visitor, I want the Squiggle behind the buttons to draw itself in as I scroll the panel into view, so that the panel feels alive like the footer.
5. As a visitor, I want to click anywhere on the photograph to open the video, so that I do not have to hit the play circle exactly.
6. As a visitor with a mouse, I want the play circle to grow a little when I hover the photograph, so that I know it is clickable.
7. As a visitor, I want the video to open in a full-screen overlay and start playing with sound, so that one click gets me watching.
8. As a visitor, I want play/pause, mute, fullscreen, a progress bar I can click to seek, and elapsed and total time, so that I can control the video without knowing which service hosts it.
9. As a visitor, I want the same Controls whether the video is on Vimeo, on YouTube or an uploaded file, so that every video on the site behaves the same.
10. As a visitor, I want the Controls to fade away while the video plays on a large screen and return when I move the mouse or pause, so that they do not cover the picture.
11. As a visitor, I want to close the overlay with the close button, by clicking outside the video or by pressing Escape, so that I can leave the way I expect.
12. As a visitor, I want the video to pause when I close the overlay and pick up where it left off if I reopen it, so that closing is never destructive.
13. As a visitor, I want the page behind the overlay to stop scrolling while it is open, so that the page does not move under the video.
14. As a visitor with a phone, I want the photograph above the text, full width, and the text in one column, so that everything is legible.
15. As a visitor with a tablet, I want the two text columns side by side beneath the heading, so that the layout uses the width.
16. As a visitor with a large screen, I want the layout to match the design: the photograph on the left, the content starting at the panel's sixth column, the buttons at the bottom.
17. As a visitor who prefers reduced motion, I want the Squiggle drawn, the play circle still and the overlay to appear without fading, so that nothing moves that I asked not to.
18. As a keyboard user, I want the photograph to be a focusable button with a visible ring, so that I can open the video without a mouse.
19. As a keyboard user, I want focus to move into the overlay when it opens and back to the photograph when it closes, so that I never lose my place.
20. As a screen reader user, I want the photograph announced as a button that plays the video and the overlay announced as a dialog, so that I know what will happen.
21. As a visitor, I want the video not to load until I open it, so that the page does not download a hidden Vimeo or YouTube embed.
22. As an editor, I want a Video Content Block in the Blocks menu, so that I can add it to any page.
23. As an editor, I want the Block's fields in the Section Header, Section Content and Section Footer slots, so that it reads like every other Block.
24. As an editor, I want to use the existing Video field: pick Vimeo or YouTube by URL, or upload a file, and add a Poster, so that there is nothing new to learn.
25. As an editor, I want to paste any usual form of a Vimeo or YouTube link, so that I do not have to know which form the site wants.
26. As an editor, I want a link the site cannot read to still show the Poster rather than break the page, so that a typo is harmless.
27. As an editor, I want a Block with no Poster to still show a black slot with the play circle, so that the video still opens.
28. As an editor, I want the Video field's Display Type explained as unused on this Block, so that I do not expect an inline player here.
29. As an editor, I want the Text Columns as two rich text fields, the first simple and the second full, so that the second column can carry lists.
30. As an editor, I want a lone Text Column to keep its half width, so that the panel matches the design whether I fill one or two.
31. As an editor, I want up to two Buttons in the Button Group, coloured creme and creme outline by position, so that I never choose colours.
32. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
33. As an editor, I want the Home page to already carry this Block with the designed content, so that I see how it is meant to look.
34. As a developer, I want a Video Player component that any Block can call with a Video field's value, so that the next video Block reuses it rather than the modal.
35. As a developer, I want the three unused video and modal templates gone, so that nobody builds on the wrong one.
36. As a developer, I want the Video Player on the styleguide with a Vimeo, a YouTube and a File example, so that all three Providers are proven without temporary Blocks.
37. As a developer, I want the Squiggle to take the panel as its trigger by a class carrying the entry id, so that two of these Blocks on one page do not share a trigger.
38. As a developer, I want the Home page content added by a Seed rather than by hand, so that the review environment is reproducible.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `videoContent`, name "Video Content", colour blue, icon `circle-play`, added to the Blocks field in the General group. It follows the three-slot layout: a Content tab with a Section Header heading element followed by the Eyebrow and Heading fields; a Section Content heading followed by the Video field and the two Text Columns; a Section Footer heading followed by the Button Group field; a Settings tab with the Padding field. No new fields.

**Fields.** The Video Content Block field, handle `video`, is used unchanged, with an instruction on this Block's instance saying the Display Type is not used here and the video always opens in the Video Modal. The Rich Text - Simple field is reused with handle `textColumnOne` and label "Text Column One"; the Rich Text - Full field with handle `textColumnTwo` and label "Text Column Two". The Button Group field, which already holds up to two Buttons, is used as is.

**Video Player component.** A new component family in a `videoPlayer` folder in the components folder, ported from keystone-tutors and rewritten to the coding standards: a `component` variable, options maps, `$refs` instead of document queries, setup in `init()`. It has an entry template that takes a Video field's value, resolves the Provider and the video id, loads the Provider's script through the asset tag, and renders the requested Player Type; a shared Alpine core registered once per page that owns the state (playing, muted, current time, duration, fullscreen, ready) and the Controls' actions; one adapter per Provider behind one interface (create, play, pause, seek, set volume, mute, unmute, plus ready, play, pause, ended and time update callbacks); and the modal Player Type. The inline Player Type is not ported. The File adapter wraps a native video element with `playsinline`, created with nothing preloaded, driven through the media element API; the other two wrap the Vimeo player and the YouTube iframe API as keystone does. YouTube embeds use the `youtube-nocookie` host.

**Provider and id resolution.** Vimeo: `vimeo.com/ID`, `player.vimeo.com/video/ID` and unlisted `vimeo.com/ID/HASH`, the hash passed to the player. YouTube: `watch?v=`, `youtu.be/`, `/shorts/` and `/embed/`. File: the Video field's Video Type is File and a file is attached. A URL that matches none of these resolves to no Provider: the Poster renders as a plain image with no Play Button and no Video Modal, and nothing errors.

**Lazy creation.** The Provider's script loads with the page, but the player, iframe or video element is created the first time the Video Modal opens and reused after. Until then the modal's video slot is empty.

**Video Modal.** The modal Player Type: a fixed full-screen backdrop in black at 80% with a blur, above everything at z-100, hidden with `x-cloak` and `x-show`. It fades in and out with Alpine transitions under motion-safe only. Inside, the Video Player panel is 11/12 of the viewport wide up to 1024px, always 16:9, rounded 16px at mobile and 24px from `md`, black behind the video. A white circular close button from the button shape component sits at the top right of the backdrop; a click on the backdrop outside the panel also closes. The wrapper has `role="dialog"`, `aria-modal="true"` and a label. Opening: the modal marks itself with the `js-modal` class and adds the body's overflow lock so Lenis leaves scrolling alone, moves focus to the close button, seeks to 0 on first open only, and plays with sound, since a click permits it. Closing by close button, backdrop or Escape pauses the video, removes the lock and returns focus to the Poster. Reopening resumes from the paused position. Fullscreen is requested on the panel, not the video element, so the Controls stay visible.

**Controls.** A bar at the bottom of the panel over a gradient: elapsed and total time in white 14px above a full-width progress track with a played fill and a playhead dot, clickable to seek; beneath it play/pause and mute on the left and fullscreen on the right, each a button with a live `aria-label` and `aria-pressed`, with both glyphs rendered and toggled by `x-show` because the Font Awesome kit replaces icons at load. Keystone's skip-forward button and centre caption are dropped. From `xl` the bar and gradient sit at zero opacity while the video plays and show on hover over the panel or whenever it is paused; below `xl` they are always visible. Media session keys are neutralised as in keystone so hardware keys do not fight the Controls.

**Poster and Play Button.** The Poster is one button element wrapping the picture component with the image at the `3x4` transform, focal point on, filling its slot with object-cover, and a centred Play Button: a 120px secondary circle with a 24px black sharp play glyph. The Play Button drops to 80px below `lg`. The button carries `aria-label="Play video"` and a visible focus ring; on a fine pointer, hover scales the Play Button to 110% under motion-safe with the image still. With no Poster the slot is black behind the same Play Button. Clicking dispatches the modal's open event with the Block's id.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding and the site margin as horizontal padding, its content inside the section's content block. The panel is a relative, isolated, overflow-hidden black rounded-20px box carrying a hook class built from the Block's handle and entry id for the Squiggle's trigger. The Squiggle is included first, absolutely positioned at the panel's bottom right in black-200 at 37% of the panel width, translated 28% right and 40% down so it hangs off the corner as the node draws it, behind the content, with the panel as its trigger. No Alpine on the Block itself: the Poster button dispatches an event and the Video Player owns all behaviour.

**Layout.** Below `lg`: one column. The Poster slot is full width with a 5px inset, 15px corners and the `4x3` transform; the content sits beneath with 30px padding on all sides. From `lg`: a 12-column grid with the 20px gap inside the panel. The Poster slot spans columns 1 to 5, inset 5px, 15px corners, at the `3x4` transform, and sets the panel's height; the image covers the slot with its focal point. The content spans columns 6 to 12 with 50px top padding, 40px right padding and 50px bottom padding, top-aligned. At 1600 this puts the content 6px from the node's 648px start and gives a panel about 706px tall against the node's 755px, the difference being the node's 0.70 image ratio against the standard 0.75.

**Content column.** The Eyebrow in white with a Rule in white at 30%, through the eyebrow component's `rule` and `white-30` options. 130px from the Rule to the heading from `lg`, 50px below. The heading through the alternate heading component: white, `4xl` below `lg` and `5xl` from `lg`, semibold, leading 0.97, tighter tracking, with the Highlight in fluro through the `fluro` alternate style. 40px to the Text Columns: a two-column grid from `md` with the 20px gap, one column below; each column the rich text component in creme-100 at base size; an empty column is not rendered and the other keeps its cell. 50px to the Button Group from `lg`, 40px below, through the button group component with the colours creme-100 then creme-100-outline, so the first Button is solid and the second outlined as the node draws them, wrapping below `md`.

**Empty states.** A Block renders when it has a Poster, a video, a heading or a Text Column with content; otherwise nothing at all, section included. A missing heading or Eyebrow leaves its space out. A Block with no video and no Poster renders the content without the slot, the content spanning the full panel.

**Styleguide.** A `videoPlayer` page under the styleguide's components folder, listed on the styleguide index, renders three Posters that each open a Video Modal: the Vimeo video, a YouTube video and an mp4 File asset uploaded for the evidence run. It is the second seam and the only place the YouTube and File adapters are exercised until a Block uses them.

**Removals.** The unused `video`, `videoModal` and `modal` component templates are deleted. The header's `js-modal` class is the Lenis hook and is unrelated; it stays, and the Video Modal uses the same class.

**Home page content.** One Video Content Block after the Client Marquee in the Home page's Blocks, padding Top and Bottom. Eyebrow "What Makes Us Different?". Heading "Partnering with us gives you access to a team of channel and industry specialists, *without the cost or complexity of building an in-house department.*" with the Highlight on the second sentence as the node draws it. Text Column One: "We take a true partnership approach to our client relationships, working with you closely to understand your business goals and strategy. A dedicated account manager will keep you updated on the progress of all campaigns, reporting on channel results, revenue and ROI." Text Column Two: "We combine strategic thinking and industry experience with the latest in AI innovation in order to drive measurable results across the channels that impact your brand. We prioritise revenue, customer acquisition, and long-term brand visibility." Video: type URL, `https://vimeo.com/822986690`, Poster the RayBan image exported from Figma node `9580:27244`, saved as `rayban-poster.png` beside the Seed. Buttons: "Explore Our Work" linking to the Case Study listing entry and "Our Culture" linking to `#` until a page exists. Added with the Seed command from a Seed file under the scratch folder; the Seed is not committed. The Content Block field type is already supported by the command.

**Docs.** `CONTEXT.md` gained the Video Content vocabulary during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The primary seam is the rendered Home page through the global layout, with the Block seeded after the Client Marquee; it proves the Block, the Squiggle's second use, the Poster, the Video Modal and the Vimeo adapter. The secondary seam is the styleguide's Video Player page, which proves the YouTube and File adapters through the same modal. The Seed command's own output is the third.

**What good evidence looks like.** It shows what a visitor would see: the panel against the node at 1600, the stacked mobile layout, the Play Button's hover, the modal open and playing with its Controls, the modal gone after Escape with focus back on the Poster, and the Squiggle drawn. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is the Home page ending at the Client Marquee.

**Evidence plan.**

1. Home page at 1600, full page: the Block compared against the Figma node for panel size and corners, Poster inset and corners, Play Button size and position, Eyebrow and Rule, heading size and Highlight colour, Text Column widths and gap, Button colours and gap, Squiggle position and colour. Proves the desktop layout.
2. Home page at 390, full page: Poster above the content at 4:3, one Text Column, Buttons wrapped, Squiggle at the bottom right. Proves the mobile layout.
3. Home page at 768, viewport on the Block: two Text Columns beneath the heading, Poster still above. Proves the `md` step.
4. Home page at 1600, viewport on the Poster with the pointer over it: Play Button at 110%. Proves the hover.
5. Home page at 1600, viewport, after clicking the Poster: the Video Modal open, the Vimeo video playing, Controls visible while the pointer is over the panel. Proves open and autoplay.
6. Home page at 1600, viewport, the modal open with the pointer away from the panel for two seconds: Controls and gradient faded out. Proves the hide-while-playing rule.
7. Home page at 1600, viewport, after clicking pause then mute: the glyphs swapped and the video paused with the Controls shown. Proves the Controls.
8. Home page at 1600, viewport, after pressing Escape: the modal gone and the Poster's focus ring shown. Proves close and focus return.
9. Home page at 1600, viewport, after reopening: the elapsed time where it was paused. Proves resume.
10. Home page at 390, viewport, the modal open: the panel at 11/12 width, Controls always visible. Proves the mobile modal.
11. Home page at 1600 with reduced motion emulated, full page after scrolling the Block into view, then the modal opened: the Squiggle fully drawn, the modal shown with no fade. Proves reduced motion.
12. Home page at 1600, viewport on the Block at scroll offsets where the panel's top enters the viewport and where its bottom reaches the viewport's bottom: the Squiggle part drawn, then fully drawn. Proves the draw-in.
13. Rendered HTML of the Home page before any click: no Vimeo iframe present; after the first open: one present. Proves lazy creation.
14. Styleguide Video Player page at 1600, viewport, each of the three Posters opened in turn: Vimeo, YouTube and File playing with the same Controls. Proves the three adapters.
15. Home page at 1600 with a temporary Seed whose URL is `https://example.com/not-a-video`: the Poster renders as a plain image with no Play Button, and the browser console shows no error. Proves the unrecognised URL rule. Removed afterwards.
16. Home page at 1600 with a temporary Seed with no Poster: a black slot with the Play Button that opens the modal. Proves the missing Poster rule. Removed afterwards.
17. Rendered HTML of the Home page: the Poster is a button with a label, the modal a dialog, no inline styles beyond the picture component's own, and the three deleted templates absent from the components folder. Proves the accessibility story and the removals.
18. Seed command output for the Home Seed, run twice: created after the Client Marquee on the first run with the Poster uploaded, skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- The inline Player Type. It belongs to a separate Block that will honour the Video field's Display Type; the Video Player is built so it can be added as a second Player Type.
- Portrait video. The modal is always 16:9; a ratio option comes with the inline Player Type.
- Fetching a Provider's own thumbnail when the Poster is empty.
- Keystone's skip-forward button and centre caption.
- Keyboard shortcuts inside the modal beyond Escape.
- Captions and transcript handling.
- A Longform Video template. That entry type keeps the Video field and gets its template with the inline Player Type.
- Committing the Seed, the Poster image or the mp4 used on the styleguide.

## Further Notes

- The node's Poster is 522×745, a 0.70 ratio; `3x4` is the nearest standard transform and the coding standards prefer common ratios, so the panel lands about 50px shorter than the node at 1600.
- The eyebrow component's Rule pads 10px beneath the text; the node shows about 15px. Accepted, so every Eyebrow with a Rule on the site matches.
- The node's heading tracking is -1.84px on 46px, the tighter token exactly.
- The node's text is Creme 100 and the Eyebrow pure white; both are rendered as drawn.
- The Squiggle's visible part in the node is a boolean intersect of the full vector with the panel; the component's full shape is positioned so the panel's overflow clip produces the same crop.
- Vimeo's player script and YouTube's iframe API load through the asset tag, which Craft dedupes by URL, so two Blocks or the styleguide's three players load each script once.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
