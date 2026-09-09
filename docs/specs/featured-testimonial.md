# Featured Testimonial

Spec for the Featured Testimonial Block: one Testimonial in a black panel inside the site margins, an Eyebrow with a Rule over the quote, the Avatar Group and the Logo beneath it, and the Testimonial's Media filling the right of the panel. Below the desktop breakpoint the Media sits between the Eyebrow and the quote. It is the second Block to pick Testimonials after the Testimonial Grid, the first to read a Testimonial's Media, the fourth caller of the Video Player after Video Content, Content Rows and the Video Block, and the second Block reviewed on a Case Study page rather than the Home page.

Design: Figma node `9716-9348` in the Marketing Signals file, 1600 wide: a 1520 by 755 black panel with 20px corners at x 40, the Tree Center testimonial with a portrait photograph and the "Button / Play / Circle / Large" component over it. No tablet frame, no mobile frame and no Image state exist, so the responsive rules, the quote's size ramp and the Image state below are decisions, not measurements.

Branch: feature/featured-testimonial

Related: the Elements - Testimonial spec, which created the Testimonial section and the Testimonial Grid and whose inline Logo rendering and Avatar Group this reuses; the Video Content spec, whose black panel with a 5px inset media slot, white Eyebrow with a white/30 Rule and absolute media from the desktop breakpoint this copies; the Content Rows spec, whose Media Type switch and Poster-or-Inline Video rule this repeats; the Video spec, whose Vimeo and Poster this Block's review content shares; the Content Seeding spec, which creates the Testimonial and puts the Block on the Tree Center Case Study. ADR-0001 does not apply: the Block is in flow beneath the Case Study Intro. ADR-0002 applies: the Testimonial and the Case Study content arrive by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Featured Testimonial" section, which gained Featured Testimonial during the grilling session; "Content Rows" gained Media Type and its Media was widened to cover a Testimonial's; Testimonial was extended to mention its Media.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A Case Study page tells the client's story in the agency's words and never in the client's. The design puts a single client quote in a black panel after the Case Study's content: "Hear It From The Client" over a large quote, the person's avatar, name and role, the client's logo, and a photograph or video of the client filling the right of the panel. The Testimonial section already holds the quote, the person and the Logo, and since today it holds a Media Type with an Image or a Video, but the only Block that picks Testimonials scatters several of them in coloured cards and reads none of the media. Nothing can put one Testimonial on a page on its own.

## Solution

A Featured Testimonial Block editors can add to any page and any Case Study. Its Section Header holds an Eyebrow. Its Section Content holds exactly one Testimonial picked from the Testimonial section through a new single-entry field. It renders as a black panel with 20px corners inside the site margins, 40px padding around its content. From the desktop breakpoint the Eyebrow with its Rule sits at the top of a seven-column text column, the quote sits at the bottom of that column at 46px in white with its opening mark hung into the margin, and beneath the quote the Avatar Group sits at the left and the Logo in white at the right. The Testimonial's Media takes the last four columns at 2:3, inset 5px from the panel's edge with 15px corners, and grows with the panel when a long quote makes it taller. Media Type Image shows the Image cropped to its focal point. Media Type Video shows the Video's Poster with the Play Button, opening the Video Modal, or plays in place as an Inline Video, by the Video's Display Type. Below the desktop breakpoint everything stacks in one column: the Eyebrow, the Media at 4:3 across the panel, the quote, then the Avatar Group and Logo. A Testimonial with no Media keeps the text column's width and the panel takes its height from the content. A Block with no Testimonial, or whose Testimonial has no text, renders nothing at all, section included. The Tree Center Case Study gets one instance with a new Testimonial holding the Figma quote, Stelfox, the Tree Center Logo and a Vimeo video with the node's photograph as its Poster, all added through the Seed command.

## User Stories

1. As a visitor, I want a Case Study page to hand over to the client in their own words, so that the result has a witness.
2. As a visitor, I want the quote large and white on a black panel, so that it reads as the page's moment of proof rather than a caption.
3. As a visitor, I want the quote's opening mark hung into the margin, so that the first line of text aligns with the lines beneath it.
4. As a visitor, I want a short label above the quote saying whose voice this is, so that I know it is the client speaking before I read it.
5. As a visitor, I want the person's face, name and role beneath the quote, so that the quote is attributed to someone real.
6. As a visitor, I want the client's logo in white beside the attribution, so that I know which company they speak for.
7. As a visitor, I want a photograph of the client filling the right of the panel, so that the words have a place.
8. As a visitor, I want a play circle over the photograph when it is a video, so that I can tell it plays before I touch it.
9. As a visitor, I want the video to open in an overlay with sound and controls when the editor chose that, so that I can watch it properly.
10. As a visitor, I want the overlay to close with its button, its backdrop or Escape, so that I get back to the page any way I expect.
11. As a visitor with a mouse, I want an inline video to play silently while my pointer is over it and pause when it leaves, so that I get a preview without committing to it.
12. As a visitor, I want a ring button in the corner of an inline video that plays or pauses it and stays how I left it, so that I can watch it through.
13. As a visitor with a phone, I want the ring button to be how I play an inline video, so that a video with no hover still works.
14. As a visitor with a mouse, I want the play circle to grow a little when I hover it, so that I can tell it is a button.
15. As a visitor, I want the photograph cropped around its subject whatever the panel's height, so that a long quote never cuts off a face.
16. As a visitor, I want a Testimonial with no photograph to still read well, with the quote at its designed width, so that a half-filled Testimonial is not a broken one.
17. As a visitor with a phone, I want the label, then the photograph, then the quote and the attribution stacked, so that I see who is speaking before I read what they said.
18. As a visitor with a phone, I want the photograph landscape rather than portrait, so that the quote is not pushed a screen down.
19. As a visitor with a phone, I want the quote to step down in size, so that a sentence does not take the whole screen.
20. As a visitor with a tablet, I want the quote a size between the phone and the desktop, so that it fills the width without wrapping every other word.
21. As a visitor who prefers reduced motion, I want nothing to scale on hover and no video to play on hover, so that the panel holds still.
22. As a keyboard user, I want the play circle and the ring button to take focus and show it, so that I can play the video without a mouse.
23. As a screen reader user, I want the quote announced as a quotation with its attribution, so that I know who said it.
24. As a screen reader user, I want the logo announced with the company's name and the photograph silent, so that I hear what matters and nothing else.
25. As a screen reader user, I want the play circle labelled as playing a video, so that I know what the button does.
26. As an editor, I want a Featured Testimonial Block in the Blocks field, so that I can add a client's quote to any page.
27. As an editor, I want to write the Eyebrow in the same Eyebrow field I use in other Blocks, so that there is nothing new to learn.
28. As an editor, I want to pick exactly one Testimonial, so that the Block cannot be saved with two and I never wonder which shows.
29. As an editor, I want the Block to refuse to save with no Testimonial, so that an empty panel never reaches the page.
30. As an editor, I want to pick the same Testimonial here that I picked in a Testimonial Grid, so that a quote is written once and shown wherever it is wanted.
31. As an editor, I want the quote to render as I typed it, quote marks included or not, so that this Block and the Testimonial Grid read the same words the same way.
32. As an editor, I want to choose Image or Video on the Testimonial and see only the field I chose, so that the Testimonial edit screen stays short.
33. As an editor, I want the Video's Display Type to decide whether it opens in the overlay or plays in place, so that the choice I already make on the Video field is the one that counts.
34. As an editor, I want the Video's own Poster to be the picture shown, so that I upload the still once on the Video and not again as an Image.
35. As an editor, I want to leave the Media empty and still have a Block that renders, so that a Testimonial with no photograph is not blocked from the page.
36. As an editor, I want to leave the Eyebrow empty and see the quote alone, so that nothing stands in for what I left out.
37. As an editor, I want the Padding setting the other Blocks have, so that I can tighten the Block against its neighbours.
38. As an editor, I want the photograph's crop to follow the focal point I set, so that I control what is kept.
39. As a developer, I want the Block to reuse the Video Content panel pattern, so that two black panels on the site are built one way.
40. As a developer, I want the Block to reuse the Video Player and its Poster unchanged, so that the fourth caller adds nothing to the player.
41. As a developer, I want the large quote to be a size on the rich text component, so that the next large quote gets it free.
42. As a developer, I want the large Avatar Group to be a size on the user component, so that the Block adds no attribution markup of its own.
43. As a developer, I want the 2:3 transform named beside the others, so that the portrait Media is one param.
44. As a developer, I want the Logo whitened the way the Testimonial Grid and the Case Study Hero whiten theirs, so that there is one rule for white logos on the site.
45. As a developer, I want the Media Type read the way Content Rows reads it, so that a Testimonial's Media and a Content Row's Media are resolved by one rule.
46. As a reviewer, I want the Tree Center seeded with the Figma quote, person, logo and video, so that one page proves the layout against the node.
47. As a reviewer, I want the Image path, the Inline Video path, the no-Media state and the no-Eyebrow state proven with temporary Seeds, so that every state the spec names is seen once.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `featuredTestimonial`, name "Featured Testimonial", colour blue, icon `comment-quote`, no title field, added to the Blocks field in the General group. Its Content tab follows the three-slot layout with the two slots it uses: a Section Header heading element, then the Eyebrow field; a Section Content heading element, then the new Entry - Testimonial field with the instructions "One Testimonial. Its Media Type decides whether its Image or its Video fills the right of the panel." There is no Section Footer. Its Settings tab has the Padding field.

**Fields.** One created: an Entries field, name "Entry - Testimonial", handle `entryTestimonial`, Testimonial section only, minimum one, maximum one, list view, selection label "Add a Testimonial". The handle matches the Testimonial entry type's handle; Craft keeps fields and entry types in separate namespaces, and the Video spec already does the same with `video`. Eyebrow and Padding are reused unchanged. Nothing is added to the Testimonial entry type: its Media Type, Image and Video fields were committed today as "Added: testimonial media fields", the Image and Video each shown only when the Media Type picks them.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding as vertical padding and no horizontal padding, and a margin wrapper carrying the site margin as Video Content does. It reads the one Testimonial, its text, name, role, avatar and Logo, and resolves the Media by the Content Rows rule: the Image when the Media Type is Image, the Video when it is Video, and a Video counts only when it has a URL or a File. It renders when the Testimonial exists and its text is not empty, and nothing at all otherwise, section included. It has no Alpine data of its own: the Video Player owns every behaviour.

**Panel.** One relative panel inside the margin wrapper: black, 20px corners, overflow hidden, 5px padding on every side so the Media sits inset as the node has it. From `lg` it is a twelve-column grid with the site gap. The Eyebrow cell takes the first seven columns of the first row; the quote cell takes the first seven columns of the second row, aligned to the cell's end; the Media cell takes columns nine to twelve across both rows, column eight left empty as the node's 832px text column leaves it. The content cells pad 35px on their outer sides, which with the panel's 5px is the node's 40px. Below `lg` the panel is a single column in DOM order: the Eyebrow cell, the Media cell, the quote cell, with the same 35px padding and 30px between the Media and its neighbours.

**Eyebrow.** The eyebrow component in white with the Rule in white/30, as Video Content renders it, spanning the text column. Not rendered when empty; the quote cell then starts at the top of the panel below `lg` and still sits at the bottom of the second row from `lg`.

**Quote.** A `figure` holding a `blockquote` with the Testimonial's text through the rich text component in white at a new `5xl` size: 30px below `md`, 40px from `md`, 46px from `lg`, semibold, leading 0.97, tighter tracking, the tokens the node's 45px semibold maps to. The text renders as entered: no quote marks are added, so the Testimonial Grid and this Block read one Testimonial the same way. The blockquote hangs its opening punctuation into the margin through the hanging punctuation property, which Safari honours and other browsers ignore without harm, so a quote mark typed by the editor sits outside the text edge as the node draws it.

**Attribution.** A `figcaption` beneath the quote, 50px below it, a row with the Avatar Group at its start and the Logo at its end, centred on each other. The Avatar Group is the user component at a new `lg` size: the avatar at its base 56px, the name at 23px, the role at 16px, in the creme-100 colour whose role reads at white/63, accepted against the node's solid white. It renders when the Testimonial has a name or an avatar, with the initials fallback the avatar component already has. The Logo renders through the picture component with the ratio off and SVGs inlined so it takes the row's white text colour, as the Testimonial Grid and the Case Study Hero do, with the Testimonial's title as its accessible name, capped at 45px tall and 120px wide, the node's 88 by 43 with room for a wider mark. A PNG or JPG Logo shows as uploaded. A Testimonial with neither name, avatar nor Logo has no `figcaption`.

**Media cell.** A relative box with 15px corners, overflow hidden, black behind it. Below `lg` it is 4:3 across the panel. From `lg` it spans both content rows and its content is absolutely placed to fill it, as the Video Content Poster is, with the cell's minimum height its 2:3 width, so a short quote still gets the node's proportions and a long quote grows the panel and the Media with it. Its picture covers the box and crops to the editor's focal point. A new `2x3` named transform is added beside the others, 400, 800 and 1200 wide at a 2:3 ratio, and is the transform for every picture in the cell; below `lg` the 4:3 box crops the portrait asset top and bottom rather than fetching a second one. The `sizes` hint is a third of the viewport from `lg` and the full viewport below. No Shade: the node shows the photograph at full brightness.

**Image.** The Image through the picture component with an empty alt, the `2x3` transform, the ratio off and the focal point honoured.

**Video.** The Video Player's base template with the Testimonial's Video, the `2x3` transform, the Player Type from the Display Type, `inline` for Inline Player and `modal` otherwise, the modal label "Video player", the Poster with 15px corners and a class that fills the cell. The Poster component is unchanged: an 80px secondary circle below `lg` and 120px from `lg`, the play glyph at 24px in black, scaling to 110% on a fine-pointer hover under motion-safe; the node's 120px is the `lg` size exactly. The Video Modal, the Inline Video, Hover Play and the Time Ring are reused unchanged. A Video with a Poster but no URL and no File is not a Video; the Block treats the Testimonial as having no Media rather than showing a Poster that plays nothing.

**Empty states.** No Testimonial, or a Testimonial with no text: nothing renders. No Media: the Media cell is not rendered, the text column keeps its seven columns, and the panel takes its height from the content, so the quote sits directly beneath the Eyebrow with the same 35px padding. No Eyebrow: the Eyebrow cell is not rendered. No name, avatar or Logo: no `figcaption`.

**Responsive summary.** Below `lg`: one column, the Eyebrow, the Media at 4:3, the quote at 30px then 40px from `md`, the attribution row. From `lg`: the panel grid, the text column seven wide, the Media four wide at 2:3 spanning both rows, the quote at 46px at the bottom of its column, the Play Button at 120px. The `md` rule is the quote's size, so a tablet capture is planned.

**Case Study content.** One new Testimonial in the Testimonial section, slug `stelfox-the-tree-center`, title "Stelfox – The Tree Center": name "Stelfox", role "Owner TheTreeCenter.com", the node's quote as its text with the curly quote marks as the node has them, the node's avatar as its Avatar, the Tree Center logo already in the volume as its Logo, Media Type Video, Video Type URL, `https://vimeo.com/822986690`, Display Type Modal Popup, the node's photograph as the Poster. One Featured Testimonial Block appended to the end of The Tree Center Case Study's Blocks, Eyebrow "Hear It From The Client", picking that Testimonial, padding Top and Bottom set explicitly since the Padding field's own default is Bottom. Both arrive by the Seed command from Seeds under the scratch folder, the Testimonial through a Seed that creates the entry and sets its fields with the Video written as a nested map as the Content Rows Seed does, the Block through a Seed targeting the Case Study's slug. The existing "Sandra Carosi – Tree Center" Testimonial is left as it is; it belongs to the Home page Testimonial Grid. The Seeds are not committed.

**Docs.** `CONTEXT.md` gained the Featured Testimonial and Media Type vocabulary during the grilling session and had Media and Testimonial widened. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The primary seam is the rendered Tree Center Case Study page at `/case-study/the-tree-center` through the global layout, with the Block seeded after its existing Blocks. The Block is the only caller of the rich text component's `5xl` size, the user component's `lg` size and the `2x3` transform, so those are proven through it. The Image path, the Inline Player path, the no-Media state and the no-Eyebrow state are proven through temporary Seeds on the same page that are removed afterwards. The Seed command's own output is the second seam. Because the Block is one panel and one call into the Video Player, no styleguide page is added.

**What good evidence looks like.** It shows what a visitor would see: the panel against the node at 1600 with the white Eyebrow and Rule, the quote at the bottom of its column with its hung mark, the Avatar Group and white Logo beneath, the portrait Poster inset 5px with the Play Button centred; the Video Modal open; the Inline Video playing on hover with the Time Ring part empty; the stacked column on a phone. Fixed widths, one state per file, after-only because the Block did not exist before.

**Evidence plan.**

1. Tree Center page at 1600, full page, scrolled to the Block: the black panel inside the site margins with 20px corners, "Hear It From The Client" in white over the white/30 Rule spanning seven columns, the quote at 46px semibold in white at the bottom of the column with its opening mark hung, Stelfox's avatar at 56px with the name at 23px and the role beneath 50px below the quote, the Tree Center Logo in white at the column's right end, the portrait Poster in the last four columns inset 5px with 15px corners and the 120px Play Button centred. Compared against the Figma node for sizes, colours and gaps. Proves the desktop layout.
2. Tree Center page at 390, full page, scrolled to the Block: the Eyebrow, the Poster at 4:3 across the panel with the 80px Play Button, the quote at 30px, the avatar row beneath, all in one column with 35px padding. Proves the mobile layout.
3. Tree Center page at 768, viewport at the Block: the quote at 40px, still one column. Proves the `md` step of the ramp.
4. Tree Center page at 1600, pointer over the Play Button: the circle at 110%. Proves the hover.
5. Tree Center page at 1600, after clicking the Play Button: the Video Modal open with the Vimeo video; then after Escape: closed. Proves the Modal Popup path.
6. Tree Center page at 1600 with a temporary Seed switching the Testimonial's Display Type to Inline Player: at rest the Poster with the Time Ring at the bottom right; with the pointer over it, the video playing with the Poster gone and the ring part empty; after the pointer leaves, paused. Restored afterwards. Proves the Inline Player path.
7. Tree Center page at 1600 and 390 with a temporary Seed switching the Media Type to Image with the node's photograph: the photograph filling the cell with no Play Button. Restored afterwards. Proves the Image path.
8. Tree Center page at 1600 with a temporary Seed clearing the Media Type's field: the panel with the text column at seven columns, no Media cell, and the panel's height from the content. Restored afterwards. Proves the no-Media state.
9. Tree Center page at 1600 with the Block's Eyebrow temporarily emptied: the quote at the bottom of the panel with no Eyebrow above it. Restored afterwards. Proves the no-Eyebrow state.
10. Tree Center page at 1600 with a temporary Seed giving the Testimonial a quote three times as long: the panel taller, the Media grown with it and the photograph still cropped to its focal point. Restored afterwards. Proves the panel grows.
11. Tree Center page at 1600 with `prefers-reduced-motion: reduce` emulated, pointer over the Play Button: no scale. Proves reduced motion.
12. Served HTML of the Tree Center page: the Block a `section` holding a `figure` with a `blockquote` and a `figcaption`, the Logo an inline `svg` with `currentColor` fills and the Testimonial's title as its accessible name, the Poster an `img` with an empty alt inside a button labelled "Play video", no inline styles beyond the picture component's own. Proves the markup.
13. Seed output run twice, for the Testimonial Seed and the Block Seed: the first run reports the Testimonial created with its fields set and its images uploaded or reused, and the Block created with its Testimonial resolved; the second reports the Testimonial found, its fields set and images reused, and the Block skipped. Saved as text beside the screenshots. Proves the Seeds.

## Out of Scope

- A Shade over the Media, a heading, a Button Group or a Section Footer.
- More than one Testimonial, or any carousel or rotation between Testimonials.
- Adding quote marks in the template, or any typographic treatment of the quote beyond the hung opening mark.
- A separate mobile Media, a second transform below `lg`, or any crop rule beyond the focal point.
- A solid-white role colour on the user component, or any change to the avatar component.
- Changes to the Testimonial Grid, the Video Player, the Poster, the Video Modal, the Inline Video or the Video Content panel.
- Whitening a PNG or JPG Logo. Only SVG Logos are recoloured.
- Committing the Seeds, the avatar, the photograph or the temporary Seeds.

## Further Notes

- The node is a group over the Case Study page frame rather than a component, so its measurements are absolute page positions: the panel at y 5699, the Eyebrow's cap top at 5749, the quote's baseline at 6318, the avatar at 6365 to 6421, the panel's bottom at 6454.
- Figma trims text boxes to cap height, so the Eyebrow's 50px from the panel top is the 40px padding plus the cap's ascent, and the 47px between the quote's baseline and the avatar's top is the 50px gap with the descender inside it.
- The text column's 832px is seven columns of the panel's 1440px content width at a 20px gap; the Media's 502px is four columns of the panel's 1510px inset width plus a few pixels the node gives the photograph beyond the column, so the site's Media reads about 12px narrower than the node at 1600.
- The node's quote is 45px tracked at minus 1.8px, minus 0.04em, the tighter tracking token; the site's 46px is the nearest token and the difference is under a pixel per line.
- The node's role text is solid white and 16px tracked at minus 0.32px; the user component's creme-100 colour gives white/63 and the base tracking, both accepted during grilling.
- The node's Play Button uses the Solid play glyph against the site's Regular, the same accepted difference as Video Content and the Video Block.
- The node exports the photograph as two stacked fills of the same image; the Figma integration gave each at 768 by 512, so the higher-resolution asset should be fetched at build time if the integration will give it up, and the export used otherwise.
- The Vimeo video `822986690` is the one the Video spec seeds on the same page, so the Tree Center page will hold that video twice once both Blocks are built. That is review content, not a design decision.
- Hanging punctuation is a Safari-only property today; in Chrome and Firefox the opening mark sits inside the text edge, which is how the Testimonial Grid already renders it.
