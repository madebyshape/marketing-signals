# Content Rows

Spec for the Content Rows Block: a centred heading with the Highlight over a stack of Content Rows, as many as the editor adds. Each Content Row is a square Media beside a heading, Text with a Check List, Accordion Items and a Button Group, in the editor's Content Order from the desktop breakpoint and Media first beneath it. The Media is an Image, a Poster that opens the Video Modal, or an Inline Video with Hover Play and the Time Ring. It is the first Block with a nested Matrix inside a Matrix, the second caller of the accordion component, the first caller of the Video Player's inline Player Type, which it adds, and the eighth Block on the Home page, after the Stacking Cards.

Design: Figma node `9716-8166` in the Marketing Signals file, 1600 wide, a 1520 by 1599 group named "Group 1114" holding the heading "Built Around Search. *Measured on Revenue.*", a Media First row with a Zoom screenshot, a heading, a paragraph, a six-item Check List and two buttons, and a Content First row with a team photograph, a heading and three Accordion Items with the second open. No hover frame, no tablet frame and no mobile frame exist, so the Hover Play, the tablet and mobile geometry and the size ramps are decisions, not measurements.

Related: the Stacking Cards spec, which this Block follows on the Home page; the Content Seeding spec, which puts it there and already seeds nested Matrix, Content Block and dropdown values; the Video Content spec, whose Video Player, modal Player Type, Poster and Play Button this Block reuses and whose out-of-scope inline Player Type this Block builds; the Elements - FAQ spec, whose accordion component the Accordion Items reuse unchanged. ADR-0001 does not apply: the Block is in flow beneath the Stacking Cards. ADR-0002 applies: the Home page content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Content Rows" section, which gained Content Rows, Content Row, Media, Content Order, Check List, Accordion Item, Inline Video, Hover Play and Time Ring during the grilling session; Accordion Item was chosen to keep it apart from the FAQ Accordion's Question, which is an entry with a Button Group.

Branch: feature/content-rows

## Problem Statement

The design has a section that pairs a large image or video with a column of copy, and alternates which side leads as the visitor scrolls down: a screenshot beside a heading, a paragraph, a two-column list of ticks and two buttons; then a team photograph, with a small pause ring in its corner, beside a heading and three expandable rows. Editors have no Block to build it with. The Video Player only opens a modal, so a video can never play in place, and the Video field's Display Type dropdown is shown to editors but honoured nowhere. A bulleted list in the rich text component renders as plain discs, so the ticks have no way to appear.

## Solution

A Content Rows Block editors can add to any page and fill with as many Content Rows as they like. It holds a heading in the Section Header and a Content Rows Matrix in the Section Content. Each Content Row holds a heading, Text, Accordion Items, a Button Group, a Media Type of Image or Video with the matching field, and a Content Order of Media First or Content First. It renders as the site's twelve-column grid inside the site margins: the heading centred at 8xl with the Highlight in primary, then the rows. From `lg` each row is a square Media across six columns and the content across five, with one column between them, the content vertically centred against the Media and on whichever side the Content Order says. Below `lg` the Media is always above the content. Bulleted lists in the Text render as the Check List. An Image is a picture with 20px corners. A Video with Modal Popup is the Poster with the Play Button that opens the Video Modal. A Video with Inline Player is an Inline Video: it plays muted while a fine pointer is over it and pauses when the pointer leaves, and the Time Ring at its bottom right empties as it plays and pins it playing or paused when pressed. The Home page gets one instance with the node's heading and its two rows, the second row's photograph as the Poster of an Inline Video, added through the Seed command so the review starts from real content.

## User Stories

1. As a visitor, I want the agency's pitch laid out as alternating rows of picture and copy, so that I can scan what they do without reading a wall of text.
2. As a visitor, I want the section's heading centred with its key phrase in the accent colour, so that the section's message lands before the rows.
3. As a visitor, I want each row's picture large with rounded corners, so that it reads as one card like the rest of the site.
4. As a visitor, I want the copy vertically centred against the picture on a large screen, so that the row feels balanced however long the copy is.
5. As a visitor, I want the picture on the left in one row and on the right in the next, so that the page has rhythm as I scroll.
6. As a visitor, I want a row's list of benefits shown as ticks in two columns, so that I can take them in at a glance.
7. As a visitor, I want a row's buttons beneath its copy, one solid and one outlined, so that I know which is the main action.
8. As a visitor, I want a row's expandable items to open one at a time with a plus and minus, so that they behave like the questions elsewhere on the site.
9. As a visitor, I want to click a row's video to open it in the overlay with sound, so that the video behaves as it does on the rest of the site.
10. As a visitor with a mouse, I want a row's video to start playing silently when I hover it, so that I get a preview without committing to it.
11. As a visitor with a mouse, I want the video to pause when I move away, so that it never plays on unattended.
12. As a visitor, I want to see how much of the video is left as a ring emptying in the corner, so that I know whether to keep watching.
13. As a visitor, I want to press the ring to keep the video playing after I move away, or to pause it while I hover, so that I am in charge of it.
14. As a visitor, I want the video to resume where it paused rather than restarting, so that hovering twice does not replay the start.
15. As a visitor, I want the video's poster shown until it first plays, so that nothing is blank while the video loads.
16. As a visitor with a phone, I want the picture above the copy, full width, and the copy in one column, so that everything is legible.
17. As a visitor with a phone, I want to press the ring to play or pause a row's video, so that I can watch it without a hover I do not have.
18. As a visitor with a tablet, I want the ticks in two columns beneath the picture, so that a six-item list does not run long.
19. As a visitor who prefers reduced motion, I want nothing to play when I hover, so that nothing moves that I did not ask for.
20. As a visitor who prefers reduced motion, I want the ring's button to still play and pause, so that reduced motion never locks me out of a video.
21. As a keyboard user, I want the ring to be a focusable button with a visible ring and a label saying whether it plays or pauses and how long is left, so that I can control the video without a mouse.
22. As a keyboard user, I want the Play Button and the expandable rows focusable as they are elsewhere, so that every control on the row works from the keyboard.
23. As a screen reader user, I want the section's heading and each row's heading announced as headings, so that I can jump between rows.
24. As a screen reader user, I want the expandable items announced as expanded or collapsed with their text as a region, so that I know what opened.
25. As a screen reader user, I want the tick marks hidden from me, so that a list reads as a list.
26. As an editor, I want a Content Rows Block in the Blocks menu, so that I can add it to any page.
27. As an editor, I want the Block's heading to take the Highlight, so that I can pick out words in the accent colour.
28. As an editor, I want to leave the Block's heading empty, so that a page can run the rows on their own.
29. As an editor, I want to add as many rows as I like and reorder them, so that the Block fits any page.
30. As an editor, I want each row to have a heading, a text field with lists, expandable items and up to two buttons, all optional, so that a row can be as full or as sparse as the page needs.
31. As an editor, I want a bulleted list in the text to become the ticks, so that I do not need a separate field for them.
32. As an editor, I want to choose Image or Video for a row and see only the matching field, so that the row's form stays short.
33. As an editor, I want a video row to open in the overlay or play in place by the Video field's Display Type, so that the same field I know does both.
34. As an editor, I want the Video field to tell me that YouTube videos always open in the overlay, so that I am not surprised when one does.
35. As an editor, I want to choose which side leads for each row, so that I can alternate the rows or not as the page needs.
36. As an editor, I want the Block to refuse an empty rows field, so that I cannot publish an empty section.
37. As an editor, I want an empty row skipped rather than rendered as a gap, so that a half-filled row never breaks the page.
38. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
39. As an editor, I want the Home page to already carry this Block with the designed rows, so that I see how it is meant to look.
40. As a developer, I want the Block to reuse the Heading, Rich Text, Button Group, Image, Video and Padding fields, so that only the two Matrix fields and two dropdowns are created.
41. As a developer, I want the inline Player Type to reuse the Video Player's core, adapters and Poster, so that Vimeo and File videos play inline with no second player.
42. As a developer, I want the Check List to be an option on the rich text component, so that any Block can ask for ticks.
43. As a developer, I want the accordion component reused unchanged, so that every accordion on the site looks the same.
44. As a developer, I want the Home page content added by a Seed rather than by hand, so that the review environment is reproducible.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `contentRows`, name "Content Rows", colour blue, icon `table-rows`, added to the Blocks field in the General group. Its Content tab follows the three-slot layout with the slots it uses: Section Header holds the Heading field; Section Content holds the Content Rows field. There is no Section Footer: the buttons belong to each row. Its Settings tab has the Padding field.

**Content Row entry type.** A new entry type, handle `contentRow`, name "Content Row", with no title field. Its layout, in order: a Content heading element, then the Heading field; the Rich Text - Full field with handle `text` and label "Text", instructions "A bulleted list renders as the Check List."; the Accordions field; the Button Group field. Then a Media heading element with the Media Type field at half width and the Content Order field at half width; the Image field, shown only when Media Type is Image; the Video field, shown only when Media Type is Video, with the instructions "Modal Popup opens the video in the overlay. Inline Player plays it in place, muted, on hover. YouTube videos always open in the overlay." The conditions are element conditions on the layout, as the Video field's own layout does for its URL and File fields.

**Accordion Item entry type.** A new entry type, handle `accordionItem`, name "Accordion Item", with no title field. Its layout: the Heading field, required, and the Rich Text - Simple field with handle `text` and label "Text", required.

**Fields.** Four new fields. Content Rows, handle `contentRows`, a Matrix field of Content Row entries, minimum one, no maximum, blocks view, create button "New Content Row", instructions "One or more rows. From the desktop breakpoint each row is the Media beside its content in the order chosen; below it the Media is always on top." Accordions, handle `accordions`, a Matrix field of Accordion Item entries, no minimum, no maximum, blocks view, create button "New Accordion Item". Media Type, handle `dropdownMediaType`, a Dropdown with the options Image (`image`) and Video (`video`), Image the default. Content Order, handle `dropdownContentOrder`, a Dropdown with the options Media First (`mediaFirst`) and Content First (`contentFirst`), Media First the default. Heading, Rich Text - Full, Rich Text - Simple, Button Group, Image, Video and Padding are reused unchanged.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding and the site margin as horizontal padding, its content inside the section's content block. It keeps only Content Rows that have a Media or any content; a Block with none renders nothing at all, section included. It has no Alpine data of its own: the accordion component and the Video Player own their behaviour.

**Section heading.** The heading alternate component as an `h2`, centred, semibold, leading 0.97, tighter tracking, balanced, at 5xl, 6xl from `md` and 8xl from `lg`, with the Highlight in primary through the base alternate style, inside a centred column eight columns wide from `lg` so it wraps to the node's two lines. Figma's 8xl at 70px with -2.8px tracking is the theme's 8xl with tighter tracking exactly. 40px to the first row, 50px from `lg`. An empty heading leaves its space out.

**Rows.** The rows stack with 50px between them, 70px from `lg`. Each row is one column below `lg`, the Media above the content with 30px between. From `lg` a row is a twelve-column grid with the site's 20px gap, items centred. Media First: the Media in columns 1 to 6, the content in columns 8 to 12. Content First: the content in columns 1 to 5, the Media in columns 7 to 12. Column 7 or 6 stays empty, which is the node's 128px between the two sides. The Content Order has no effect below `lg`.

**Media.** A square: the `1x1` transform, 20px corners, overflow hidden, black behind it. An Image renders through the picture component with its focal point. A Video with Modal Popup renders through the Video Player's entry template with the modal Player Type, its Poster at `1x1` with the same corners and the Play Button as the Video Content Block draws it. A Video with Inline Player renders the same entry template with the inline Player Type. A Video whose URL resolves to no Provider renders its Poster as a plain image, as the Video Content Block does. A row with Media Type Video and neither a video nor a Poster, or Media Type Image and no Image, has no Media and renders its content full width across the grid's twelve columns.

**Inline Player Type.** A new template in the Video Player's folder beside the modal, chosen by the entry template's `playerType` param. The entry template gains one rule: when the Player Type is inline and the Provider is YouTube it renders the modal instead, so YouTube never plays in place. The inline template is a relative square wrapper carrying the Alpine data the core registers, with three layers: the video slot at the back, absolute and filling it, ignoring the pointer, its iframe or video element covering the square; the Poster over it, the picture component at `1x1` with its focal point, fading to nothing over 300ms under motion-safe the first time the video plays and never returning; and the Time Ring on top. The player, iframe or video element is created on the first play, hover or button, and reused after, as the modal does. It never loops: at the end the Time Ring is empty and shows the play glyph, and pressing it plays from the start.

**Core changes.** The core's Alpine data takes an `inline` flag in its props. When set, the adapter is created muted and stays muted; the ready callback does not unmute or play on its own, and playback is driven only by Hover Play and the Time Ring. The File and Vimeo adapters take a `muted` option at creation: the File adapter sets the element muted before loading; the Vimeo adapter creates its player with autoplay off and muted on. The modal path is unchanged. The core gains two pieces of state for the inline path, `pinned` and `started`, and a `remaining` getter that formats the duration less the current time through the existing time formatter.

**Hover Play.** On the wrapper, pointer enter plays and pointer leave pauses, both only when the device reports a fine pointer that can hover and reduced motion is not requested, read through the matching media queries at the time of the event. Pointer enter clears any pin, so a video pinned paused plays again on the next hover. Pointer leave does nothing while the video is pinned playing. Touch devices never see a hover event they can act on, so the Time Ring is their only control. Under reduced motion hover does nothing and the Time Ring still works.

**Time Ring.** A 42px button at the wrapper's bottom right, inset 20px below `lg` and 40px from `lg`: an SVG ring 42px across with a 2px stroke, the track in white at 30% and the remaining time in white, drawn with a dash offset bound to the played fraction so the white arc shrinks clockwise from full to nothing as the video plays; inside it a white Font Awesome Sharp Regular `play` or `pause` glyph at 12px, both rendered and toggled with `x-show` as the modal Controls do. Pressing it toggles playback and pins the result: pinned playing survives pointer leave, pinned paused survives the pointer staying. It carries a live `aria-label` of "Play video, 1:23 left" or "Pause video, 1:23 left", `aria-pressed` while playing, and a visible focus ring. Its hover on a fine pointer drops it to 70% opacity under motion-safe, as the Controls' buttons do.

**Content column.** In order, each optional: the heading, the Text, the Accordion Items, the Button Group. The heading through the heading alternate component as an `h3`, semibold, leading 0.97, tighter tracking, at 4xl and 6xl from `lg`, with the Highlight in primary. Figma's 6xl at 55px with -2.2px tracking is the theme's 6xl with tighter tracking exactly. 30px to the Text: the rich text component in the black scheme at base size with the `check` list option. 30px to the Accordion Items. 40px to the Button Group through the button group component, colours secondary then creme-300-outline, so the first Button is solid and the second outlined as the node draws them, wrapping below `md`. Figma names the first button "Primary" but colours it #AFAFFF, the theme's secondary, as earlier specs found.

**Check List.** The rich text component gains a `list` option with the values `base`, the current discs and numbers, and `check`. Under `check` a bulleted list is a grid, one column with a 15px row gap, two columns with the 20px column gap from `md`; each item is a flex row with the mark, a 19px secondary circle holding a Font Awesome Sharp Solid `check` glyph at 10px in black, hidden from assistive technology, then 7px to the text at base size, the circle nudged 1px down to sit on the line. The mark is injected into each item by the same Retcon pass that classes the list, so the CKEditor value is untouched. Numbered lists are unchanged under `check`. Figma's rows are 36px apart at a 21px line, which is the 15px gap; its text starts 26px after the circle's left edge, which is the 19px circle and the 7px gap.

**Accordion Items.** The accordion component unchanged, called with one item per Accordion Item: the nested entry's id, its Heading with tags stripped, its Text as the content and no buttons; the DOM prefix is the Block's handle and the Content Row's id, so two rows on one page never share an id. No item is open at load; the node's open second item is a state demonstration. Its 20px open radius and creme-400 lines stand against the node's 10px and creme-300, accepted so every accordion on the site matches. An Accordion Item with no Text is skipped.

**Responsive summary.** Below `lg`: heading at 5xl or 6xl, rows one column with the Media on top, Check List in one column then two from `md`, Time Ring inset 20px. From `lg`: heading 8xl in eight columns, six and five columns in the Content Order, content centred, Check List in two columns, Time Ring inset 40px.

**Empty states.** A Content Row with nothing to show is skipped. A row with content and no Media spans the grid. A row with Media and no content shows the Media in its columns with the other side empty. An empty heading, Text, Accordions or Button Group leaves its space out. A Block with no renderable Content Rows renders nothing.

**Styleguide.** The Video Player page under the styleguide's components folder gains one Inline Video using the mp4 File asset it already shows in the modal, so the File adapter is exercised inline where the Home page exercises Vimeo.

**Home page content.** One Content Rows Block after the Stacking Cards in the Home page's Blocks, padding Top and Bottom; when the Stacking Cards are not on the page the Seed appends the Block instead. Heading "Built Around Search. <em>Measured on Revenue.</em>". Two Content Rows. The first, Media First, Image: the Zoom screenshot exported from the node's first image rectangle, saved beside the Seed; heading "Performance-Driven Digital Marketing Across <em>All Search & AI Surfaces.</em>"; Text the node's paragraph, "Search has changed but ROI hasn't – so what matters for your business remains the same: a strong ROI from your agency investment that delivers results and drives digital performance. In an industry awash with a multitude of metrics and new industry trends, we know brands are only really concerned about whether their digital marketing agency is helping grow the business online.", followed by a bulleted list of "We're honest and transparent", "Excellence through collaboration", "ROI Focused", "Data informs all our decision-making", "A positive work-life balance" and "An experienced remote team", in that order so the two columns read as the node's; buttons "More About Us" linking to the About Us page and "Let's Work Together" linking to the Contact Us page. The second, Content First, Video: type URL, `https://vimeo.com/822986690`, Display Type Inline Player, Poster the team photograph exported from the node's second image rectangle; the node's name tags are separate layers over the photograph and do not come with the export, which is accepted since they are content, not design; heading "Digital Marketing Strategies focused only <em>on commercial outcomes</em>"; three Accordion Items, "Strategic thinking & industry experience", "Partnerships what truly last" and "Accelerating Performance", the second with the node's paragraph "We take a true partnership approach to our client relationships, working with you closely to understand your business goals and strategy. A dedicated account manager will keep you updated on the progress of all campaigns, reporting on channel results." and the other two with short plausible paragraphs written for the Seed. Added with the Seed command from a Seed file under the scratch folder; nested Matrix, Content Block and dropdown values are already supported. The Seed is not committed.

**Docs.** `CONTEXT.md` gained the Content Rows vocabulary during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The primary seam is the rendered Home page through the global layout, with the Block seeded after the Stacking Cards. The Block is the only caller of the two Matrix fields, the two dropdowns, the rich text component's `check` list, the inline Player Type, the core's `inline` flag and the adapters' `muted` option, so all are proven through it, with the Vimeo adapter inline. The secondary seam is the styleguide's Video Player page, which proves the File adapter inline. The Seed command's own output is the third.

**What good evidence looks like.** It shows what a visitor would see: the two rows against the node at 1600, the Check List's two columns, the Inline Video at rest with its Poster, playing on hover with the Time Ring part empty, paused after the pointer leaves, pinned playing after a press, an Accordion Item open, and the stacked mobile layout. Fixed widths, one state per file, after-only because the Block did not exist before. Numeric checks such as column edges and gaps are reported as a table in the PR body, not captured as dumps.

**Evidence plan.**

1. Home page at 1600, full page cropped to the Block: the heading centred on two lines with the Highlight, row one Media First with the screenshot, heading, paragraph, six ticks in two columns and two buttons, row two Content First with the photograph and three closed Accordion Items. Compared against the Figma node for column edges, the 128px between the sides, the 70px between rows, corner radii, button colours and the tick marks. Proves the desktop layout and the Content Order.
2. Home page at 1600, viewport on row two before any hover: the Poster showing, the Time Ring full with the play glyph, no Vimeo iframe in the rendered HTML. Proves the rest state and lazy creation.
3. Home page at 1600, viewport on row two with the pointer over the Media for three seconds: the Poster gone, the video playing muted, the Time Ring's arc shorter, the pause glyph, the label reading the time left. Proves Hover Play and the Time Ring.
4. Home page at 1600, viewport on row two after moving the pointer away: the video paused, the play glyph, the arc where it stopped. Then hovered again: playing from where it paused. Proves pause on leave and resume.
5. Home page at 1600, viewport on row two after pressing the Time Ring while hovered, then moving the pointer away: still playing. Then pressed again while hovered: paused with the pointer still over it. Proves pinning both ways.
6. Home page at 1600, viewport on row two, the Time Ring focused by keyboard and pressed: playing, the focus ring visible, the label reading "Pause video" and the time left. Proves keyboard control.
7. Home page at 1600, viewport on row two with the second Accordion Item opened: the white panel with its text, the minus in the secondary circle. Compared against the node's open row. Proves the Accordion Items.
8. Home page at 1600, viewport on row one with the pointer over the first button: the hover colour. Proves the Button Group colours.
9. Home page at 1024, viewport at the Block's top: the six and five columns at the smallest width they exist. Proves the `lg` step.
10. Home page at 768, full page cropped to the Block: the Media above the content in both rows, the ticks in two columns, the Time Ring inset 20px. Proves the `md` Check List and that the Content Order is off.
11. Home page at 390, full page cropped to the Block: heading at 5xl, the Media square and full width above the content, the ticks in one column, the buttons wrapped. Proves the mobile layout.
12. Home page at 390, viewport on row two after tapping the Time Ring: the video playing and the pause glyph; tapped again: paused. Proves the touch path.
13. Home page at 1600 with `prefers-reduced-motion: reduce` emulated, viewport on row two with the pointer over the Media for three seconds: the Poster still showing and the Time Ring full; then the Time Ring pressed: playing with the Poster gone without a fade. Proves reduced motion.
14. Home page at 1600 with a temporary Seed whose row has Display Type Modal Popup: the Poster with the Play Button, and the Video Modal open after a click. Removed afterwards. Proves the modal path through this Block.
15. Home page at 1600 with a temporary Seed whose row has a YouTube URL and Display Type Inline Player: the Poster with the Play Button and the modal on click, no inline player. Removed afterwards. Proves the YouTube rule.
16. Home page at 1600 with a temporary Seed whose row has a heading and Text but Media Type Image and no Image: the content spanning the grid. Removed afterwards. Proves the no-Media rule.
17. Styleguide Video Player page at 1600, viewport on the Inline Video after hovering: the mp4 playing muted with the Time Ring. Proves the File adapter inline.
18. Rendered HTML of the Home page: the section heading an `h2`, the row headings `h3`, the tick marks `aria-hidden`, the Time Ring a `button` with a label, the Accordion Items buttons with `aria-expanded`. Proves the accessibility story.
19. Seed command output for the Home Seed, run twice: created after the Stacking Cards on the first run with both images uploaded, skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- YouTube playing inline. It opens the Video Modal.
- Sound on an Inline Video, a mute toggle, seeking, fullscreen or a text countdown. The Time Ring is the only control.
- Looping an Inline Video.
- Playing an Inline Video when it scrolls into view. Only hover and the Time Ring start it.
- An Eyebrow, text or Section Footer on the Block. Figma shows a heading alone.
- A Button Group on an Accordion Item. That belongs to the FAQ Accordion's Question.
- A style entry for the accordion's 10px radius and creme-300 lines in the node.
- The name tags on the node's photograph. They are content in the image.
- A ratio choice for the Media. It is always square.
- Committing the Seed or its images.

## Further Notes

- The node's rows are 750 by 671 and 750 by 693, ratios of 1.12 and 1.08; `1x1` is the nearest common ratio, so each row lands about 70px shorter than the node at 1600 and the content stays centred.
- The node's two sides are 750 and 622 wide with 128px between, which is six columns, an empty column and five columns of the 106.67px grid within 10px.
- The node's content is centred against the Media in both rows to the pixel, which is why the grid centres its items.
- The node's heading is 1007 wide, eight columns of the grid within 14px.
- The node's Check List circle is #AFAFFF, the theme's secondary; its check is Font Awesome Sharp Solid at 10px.
- The node's Time Ring is the "Pagination / Loader / Regular / White" component at 42px, inset 40px from both edges of the Media.
- Browsers only allow autoplay when muted, which is why an Inline Video is silent; the Video Modal keeps sound because a click opens it.
- The Vimeo adapter's `muted` option is a creation option rather than a call after ready, because Vimeo refuses autoplay on a player created unmuted.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
