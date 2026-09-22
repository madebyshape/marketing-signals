# Carousel - Featured Team

Spec for the Team Carousel Block: a black panel inside the site margins holding a fixed Eyebrow with a Rule over a Swiper row of Team Slides, one per Team Member the editor picked. Each Team Slide is the member's Quote at the bottom of a seven-column text column, their Avatar Group beneath it, and their Video or Image filling the right of the panel, the Video opening in the Video Modal. Two icon circles at the end of the Avatar Group row page the Slides. It is the third Block built on the Swiper carousel component after the Case Study and Blog Carousels, the first to give the Carousel Controls an icon style, the first Block to read the Team section, the first caller of the rich text component's `6xl` size, and the first Block reviewed on a Service page.

Design: Figma node `9927-15480` in the Marketing Signals file, 1600 wide: a group over the Careers page frame holding one instance of "Block / Careers / Team Testimonail / 12 col / Black", a 1520 by 755 black panel with 20px corners at x 40, drawn once with Lauren Doe's quote, a portrait photograph with the "Button / Play / Circle / Large" component over it, and the two icon circles. No second Slide, no Image state, no tablet frame and no mobile frame exist, so the other Team Members, the size ramp, the responsive rules and the Image state below are decisions, not measurements.

Branch: feature/carousel-featured-team

Related: the Featured Testimonial spec, whose panel, seven-and-four column grid, 5px inset Media at 2:3, white Eyebrow with a white/30 Rule, Avatar Group row and Video Player call this Block copies Slide by Slide; the Carousel - Case Study spec, which brought the Swiper carousel component up to standard and recorded the Carousel Controls rule this spec widens; the Content Seeding spec, whose entry creation and Entries field seeding put the Team Members and the Block on the Service page. ADR-0001 does not apply: the Block is in flow beneath the Logo Marquee. ADR-0002 applies: the Team Members and the Service page content arrive by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Team Carousel" section, which gained Team Member, Team Carousel and Team Slide during the grilling session; Carousel Controls was widened to cover the icon circles.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A Service page says what the agency does in the agency's words and never in its people's. The design puts the team's own voices at the end of the page: "Hear It From Our Team" over a large quote, the person's avatar, name and role, a photograph or video of them filling the right of a black panel, and two arrows that move to the next person. The Team section exists and its entry type gained a Quote and a Video this morning, but no Team Member has been entered and no Block reads the section. The Featured Testimonial Block draws almost exactly this panel for one client quote, but it takes one Testimonial and cannot cycle. The Swiper carousel component and its Carousel Controls exist, but the Controls only render the "Previous" and "Next" text pills, and the design asks for icon circles at the end of the Avatar Group row.

## Solution

A Team Carousel Block editors can add to any page. Its Section Header holds an Eyebrow. Its Section Content holds the Team Members the editor picks from the Team section through a new Entries field, in the order they should slide. It renders as a black panel with 20px corners inside the site margins. The Eyebrow with its white/30 Rule sits fixed at the top of a seven-column text column and never moves. Beneath it, one Swiper carousel holds a Team Slide per member: the Quote at the bottom of the text column at 55px in white, the Avatar Group beneath it, and the member's media in the last four columns at 2:3, inset 5px from the panel's edge with 15px corners. A member with a Video shows its Poster with the Play Button, opening the Video Modal; a member without one shows their Image; a member with neither keeps the text column's width and no media cell. The Carousel Controls, two 40px icon circles with a 10px gap, sit at the right end of the Avatar Group row and hold still while the Slides move: an arrow-left in a white/30 outline for Previous and an arrow-right in lilac for Next. The row slides one Team Slide at a time from the circles, by dragging or by swiping, loops, and slides a Slide into place when a keyboard user focuses inside it. Below the desktop breakpoint each Slide stacks in one column: the media at 4:3, the Quote, then the Avatar Group row with the circles at its end. Members without a Quote are skipped; a Block with no renderable member renders nothing at all, section included; a Block with one renders a static panel with no Controls. The AI-focused SEO Service page gets one instance with five Team Members, all added through the Seed command so the review starts from real content.

## User Stories

1. As a visitor, I want a Service page to end with the people who do the work speaking for themselves, so that the service has faces and voices behind it.
2. As a visitor, I want each quote large and white on a black panel, so that it reads as a moment of the page rather than a caption.
3. As a visitor, I want the label above the quotes to stay put while the quotes change, so that I always know what I am reading.
4. As a visitor, I want the person's avatar, name and role beneath their quote, so that I know who said it.
5. As a visitor, I want a photograph or video of the person filling the right of the panel, so that the words have a face.
6. As a visitor, I want a play button over the video's picture, so that I know it is a video without it playing at me.
7. As a visitor, I want the video to open in a modal when I press play, so that it plays large and I can close it to carry on reading.
8. As a visitor, I want the modal to close on Escape and on its close button, so that I am never trapped in it.
9. As a visitor, I want two arrow buttons beside the person's name, so that I can move to the next quote without guessing at a gesture.
10. As a visitor, I want the arrows to stay in the same place while the quote, the person and the picture change, so that my pointer never has to chase them.
11. As a visitor, I want Previous on the first person to reach the last, so that I am never stuck at an end with an inert button.
12. As a visitor, I want the quote, the person and the picture to move together at a settled pace, so that a change reads as one slide rather than three.
13. As a visitor, I want the panel to keep one height while the quotes change, so that the page beneath it never jumps.
14. As a visitor with a mouse, I want to drag the panel's content as well as press the arrows, so that I can use whichever comes naturally.
15. As a visitor with a mouse, I want a drag never to open the video, so that moving the row is safe.
16. As a visitor with a mouse, I want the play circle to grow a little on hover, so that I know it is pressable.
17. As a visitor with a phone, I want a swipe to move to the next person, so that the carousel works with the gesture I already use.
18. As a visitor with a phone, I want the picture, the quote and then the person stacked in one column, so that everything fits the width.
19. As a visitor with a phone, I want the arrows at the end of the person's row, so that they are where they are on a laptop.
20. As a visitor with a tablet, I want the quote a step larger than on a phone, so that it uses the width it has.
21. As a visitor who prefers reduced motion, I want the quotes to change without sliding and the play circle not to grow, so that nothing animates that I did not ask for.
22. As a visitor whose script has not run, I want the first person's quote, name and picture readable, so that the panel says something however the page loads.
23. As a keyboard user, I want the arrows to be real buttons, so that I can page the row from the keyboard.
24. As a keyboard user, I want tabbing to a play button to bring that person's Slide into view, so that I am never focused on something I cannot see.
25. As a screen reader user, I want the row announced as a carousel and each Slide as one of a count, so that I know where I am in it.
26. As a screen reader user, I want each Slide read as a quote with a caption naming the person and their role, so that it makes sense without the picture.
27. As a screen reader user, I want the play button labelled and the picture marked decorative, so that a filename is not read to me.
28. As an editor, I want a "Carousel - Featured Team" Block in the Blocks menu, so that I can add it to any page.
29. As an editor, I want to type the Eyebrow, so that the panel can say something other than "Hear It From Our Team" on another page.
30. As an editor, I want to pick Team Members from a list and order them, so that the carousel shows the people I choose in the order I choose.
31. As an editor, I want the picker to offer Team Members and nothing else, so that I cannot put a Testimonial where a Slide expects a Job Role.
32. As an editor, I want a Slide to use the member's own name, Job Role, Image, Quote and Video, so that a person changed in one place changes everywhere.
33. As an editor, I want a member's Video shown when they have one and their Image otherwise, so that I never have to choose a media type on the Block.
34. As an editor, I want a member without a Quote left out rather than shown with an empty panel, so that an unfinished entry never leaves a gap.
35. As an editor, I want a Block with one member to render a still panel with no arrows, so that the arrows never do nothing.
36. As an editor, I want a Block with no members to render nothing, so that an unfinished Block leaves no gap on the page.
37. As an editor, I want the Block's fields under Section Header and Section Content, so that it reads like every other Block.
38. As an editor, I want the Block's vertical padding to be the Padding field, so that it sits on a page like every other Block.
39. As an editor, I want the avatar to fall back to the person's initials when they have no Image, so that a missing photo never leaves a hole.
40. As a developer, I want the Block to reuse the Featured Testimonial panel, so that two black quote panels on the site are built one way.
41. As a developer, I want the Block to embed the Swiper carousel component with its Controls in the after-content slot, so that the refs resolve as the standard requires.
42. As a developer, I want the icon circles to be a style on the Carousel Controls component, so that the next carousel drawn with circles gets them by naming a param.
43. As a developer, I want the circles to be the buttonShape component, so that the Block draws no button of its own.
44. As a developer, I want the large quote to be a `6xl` size on the rich text component, so that the next 55px quote gets it free.
45. As a developer, I want the Video Player and its Poster reused unchanged, so that the fifth caller adds nothing to the player.
46. As a reviewer, I want the Service page seeded with five Team Members, one with a Video, one with an Image and one with neither, so that every media state is seen on one page.
47. As a reviewer, I want the single-member and two-member states proven with temporary Seeds, so that the loop threshold and the no-Controls rule are seen once.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `carouselFeaturedTeam`, name "Carousel - Featured Team", no title field, added to the Blocks field beside the other Carousel Blocks. Its Content tab follows the three-slot layout with the two slots it uses: a Section Header heading element, then the Eyebrow field; a Section Content heading element, then the new Entries - Team field with the instructions "The Team Members to slide through, in order. A member without a Quote is skipped." There is no Section Footer. Its Settings tab has the Padding field.

**Fields.** One created: an Entries field, name "Entries - Team", handle `entriesTeam`, Team section only, minimum one, no maximum, list view, selection label "Add a Team Member", following Entries - Testimonial. Eyebrow and Padding are reused unchanged. Nothing is added to the Team entry type: its Image, Job Role, Quote and Video fields were committed this morning as "Updated: Block fields" and "Updated: Team and Team listing template". Its Video is the Video - Only content block, which carries a Video URL, a Video File, a Video Thumbnail and a Video Type and no Display Type, so a Team Member's Video always opens in the Video Modal.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding as vertical padding and no horizontal padding, and a margin wrapper carrying the site margin as Featured Testimonial does. It reads the picked Team Members in order and keeps those whose Quote has text once tags are stripped; those are the Team Slides. For each it resolves the media by one rule: the Video when its URL or its File is set, the Poster being the Video Thumbnail when set and the Image otherwise; else the Image; else no media. The avatar is always the Image. It renders when at least one Team Slide exists, and nothing at all otherwise, section included. It has no Alpine data of its own: the carousel component owns the row and the Video Player owns each video.

**Panel.** One relative panel inside the margin wrapper: black, 20px corners, overflow hidden, 5px padding on every side so the media sits inset as the node has it. The Eyebrow sits above the carousel, outside it, in the first seven columns from `lg`, so it holds still while the Slides move; it is the eyebrow component in white with the Rule in white/30, padded 35px on its outer sides, which with the panel's 5px is the node's 40px. Not rendered when empty. Beneath it the carousel component is embedded with the Team Slides as its items, a `ul` with `li` Slides, and its Controls in the after-content slot.

**Team Slide.** Each Slide is the Featured Testimonial layout without the Logo and the Eyebrow. From `lg` it is a twelve-column grid with the site gap: a `figure` in the first seven columns aligned to the bottom, holding a `blockquote` with the Quote and a `figcaption` with the Avatar Group; the media cell in columns nine to twelve, column eight left empty as the node's 832px text column leaves it. Below `lg` it is a single column in DOM order: the media cell, then the `figure`, with the same 35px padding and 30px between the media and the quote. Swiper's slides stretch to the row's height, so every Slide is as tall as the tallest and the panel keeps one height while the row moves; within a Slide the `figure` aligns to the bottom, so a short Quote still sits at the column's foot.

**Quote.** The Quote through the rich text component in white at a new `6xl` size: 30px below `md`, 40px from `md`, 55px from `lg`, semibold, leading 0.97, tighter tracking, the tokens the node's 55px semibold tracked at minus 2.2px maps to exactly. No quote marks are added; the blockquote hangs its opening punctuation as Featured Testimonial does.

**Avatar Group row.** The `figcaption` 40px below the Quote: a row with the Avatar Group at its start and room at its end for the Controls. The Avatar Group is the user component at its base size in the creme-100 colour: the avatar at 56px, accepted against the node's 52px during grilling, the name at 16px medium, the role at 14px in white/63 against the node's creme-500, with the initials fallback the avatar component already has. The `figcaption` renders whenever the member has a title, which a Team Member always has.

**Carousel Controls.** The controls component gains a `style` option map with two entries: `pill`, the default, which is today's "Previous" and "Next" text pills unchanged; and `icon`, which renders the same two `button` elements carrying the `prev` and `next` refs through the buttonShape component, arrow-left for Previous and arrow-right for Next, with `aria-label`s "Previous" and "Next" since the circles carry no text, 10px apart. The `colour` option map gains the pair the icon style uses on black: `white-30-outline` for Previous and `secondary` for Next. The buttonShape component gains a `white-30-outline` colour, a white/30 border with creme-100 text and a white/30 focus ring, filling creme-100 with black text on a fine-pointer hover; its 40px base size stands in for the node's 42px. The Block places the Controls in the carousel's after-content slot, absolutely positioned at the bottom right of the text column from `lg` and at the bottom right of the panel's content below it, so they sit at the end of the Avatar Group row on every Slide and never move. When the row does not loop the button at an end takes Swiper's disabled state at 30% opacity and inert, as the pills do.

**Media cell.** A relative box with 15px corners, overflow hidden, black behind it. Below `lg` it is 4:3 across the panel. From `lg` it spans the Slide's height and its content is absolutely placed to fill it, with the cell's minimum height its 2:3 width, so a short Quote still gets the node's proportions and a long one grows the Slide and the media with it. Every picture in it uses the `2x3` transform and crops to the editor's focal point; the `sizes` hint is a third of the viewport from `lg` and the full viewport below. No Shade: the node shows the photograph at full brightness.

**Image.** The Image through the picture component with an empty alt, the `2x3` transform, the ratio off and the focal point honoured.

**Video.** The Video Player's base template with the member's Video, the `2x3` transform, the Player Type `modal`, the modal label "Video player", the Poster with 15px corners and a class that fills the cell. The Video - Only block has no Video Thumbnail fallback of its own, so the Block passes the member's Image as the Poster when the Thumbnail is empty. The Poster component is unchanged: an 80px secondary circle below `lg` and 120px from `lg`, the play glyph at 24px in black, scaling to 110% on a fine-pointer hover under motion-safe; the node's 120px is the `lg` size exactly. The Video Modal is reused unchanged. Each Slide with a Video is its own Video Player instance with its own modal.

**Swiper configuration.** From the Block: one Slide per view at every width, no gap between Slides, 600ms changes with the component's `smooth` ease, dragging on, looping on when there are two or more Slides, click prevention on so a drag never opens a video, and the accessibility module on with the row a region and each Slide a group. Under reduced motion the change speed is zero, so the row still pages but never slides. Before the script runs Swiper's served layout stands: the first Slide in place, the rest clipped by the panel, the Controls visible but inert.

**Keyboard.** Swiper's accessibility module slides a Slide into place when its play button receives focus, so no focus handling is written in the Block. Previous and Next are buttons and take focus after the Slides.

**Accessibility.** Each Slide is a `figure` with a `blockquote` and a `figcaption`, so the quote and its attribution are read together. The media picture has an empty alt; the Poster is a button labelled "Play video". The Controls carry their labels. Nothing is read twice.

**Empty states.** A member without a Quote is not a Slide. No Slides: nothing renders. One Slide: one static panel, no Controls, no Swiper loop. Two Slides: the row loops, since one per view leaves one to wrap to. No media: the media cell is not rendered and the text column keeps its seven columns, the Slide taking its height from the row. No Image with a Video: the Poster is the Video Thumbnail alone, and the avatar shows initials. No Eyebrow: the Eyebrow row is not rendered and the carousel starts at the panel's top.

**Responsive summary.** Below `lg`: the Eyebrow, then each Slide as one column, the media at 4:3, the Quote at 30px then 40px from `md`, the Avatar Group row with the circles at its end. From `lg`: the Eyebrow over seven columns, each Slide the panel grid, the text column seven wide with the Quote at 55px at its foot, the media four wide at 2:3, the Play Button at 120px, the circles at the text column's bottom right. The `md` rule is the Quote's size, so a tablet capture is planned.

**Service page content.** Five new Team Members in the Team section, entry type Entry - Team, each with one of the node's five avatar photographs as its Image: Lauren Doe, "Senior Digital PR Specialist", the node's quote, Video Type URL, `https://vimeo.com/822986690`, the node's portrait as the Video Thumbnail; Sam Reid, "SEO Strategist", a placeholder quote; Priya Nair, "Paid Media Manager", a placeholder quote; Tom Hale, "Content Lead", a placeholder quote, the node's portrait as the Image in place of an avatar photograph so the Image path is proven; Ella Ward, "Account Manager", a placeholder quote and no Image, so the no-media state and the initials fallback are proven. The four names and their quotes are invented and obviously placeholder in tone. One Team Carousel Block appended after the Logo Marquee on the AI-focused Search Engine Optimisation Service page, Eyebrow "Hear It From Our Team", picking the five members in that order, padding Top and Bottom set explicitly. All arrive by the Seed command from Seeds under the scratch folder, the members through Seeds that create the entries with the Video written as a nested map as the Featured Testimonial Seed does, the Block through a Seed targeting the Service's slug. The images were downloaded from the node during the grilling session and sit beside the Seeds. The Seeds are not committed.

**Docs.** `CONTEXT.md` gained the Team Carousel vocabulary during the grilling session and had Carousel Controls widened. The Carousel - Case Study spec's Further Notes rule stands as amended by the glossary: pills by default, icon circles where the design draws them. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The primary seam is the rendered AI-focused SEO Service page at `/service/ai-focused-search-engine-optimisation` through the global layout, with the Block seeded after its existing Logo Marquee. The Block is the only caller of the rich text component's `6xl` size, the Controls' `icon` style and buttonShape's `white-30-outline` colour, so those are proven through it. The one-member and two-member states are proven through temporary Seeds on the same page that are removed afterwards. The Seed command's own output is the second seam. Because the Block is one panel and one embed of the carousel component, no styleguide page is added.

**What good evidence looks like.** It shows what a visitor would see: the panel against the node at 1600 with the white Eyebrow and Rule, the Quote at the foot of its column, the Avatar Group and the two circles beneath, the portrait Poster inset 5px with the Play Button centred; the row mid-slide with the Eyebrow and circles unmoved; the Video Modal open; the stacked column on a phone. Fixed widths, one state per file, after-only because the Block did not exist before.

**Evidence plan.**

1. Service page at 1600, full page, scrolled to the Block: the black panel inside the site margins with 20px corners, "Hear It From Our Team" in white over the white/30 Rule spanning seven columns, Lauren Doe's quote at 55px semibold in white at the foot of the column, her avatar at 56px with the name at 16px and the role beneath 40px below the quote, the two 40px circles at the column's right end with a 10px gap, the portrait Poster in the last four columns inset 5px with 15px corners and the 120px Play Button centred. Compared against the Figma node for sizes, colours and gaps. Proves the desktop layout.
2. Service page at 1600, viewport, after pressing Next: Sam Reid's Slide in place, the Eyebrow and the circles at the same pixels as in line 1. Proves the fixed Eyebrow and Controls.
3. Service page at 1600, viewport, after pressing Previous on Lauren Doe: Ella Ward's Slide in place. Proves the loop.
4. Service page at 1600, viewport, Tom Hale's Slide: the portrait filling the media cell with no Play Button. Proves the Image path.
5. Service page at 1600, viewport, Ella Ward's Slide: the text column at seven columns, no media cell, initials in the avatar, the panel at the same height as line 1. Proves the no-media state, the initials fallback and the fixed panel height.
6. Service page at 390, full page, scrolled to the Block: the Eyebrow, the Poster at 4:3 across the panel with the 80px Play Button, the quote at 30px, the Avatar Group row with the circles at its end, all in one column with 35px padding. Proves the mobile layout.
7. Service page at 390, viewport, after a swipe: Sam Reid's Slide in place. Proves touch paging.
8. Service page at 768, viewport at the Block: the quote at 40px, still one column. Proves the `md` step of the ramp.
9. Service page at 1600, pointer over the Play Button: the circle at 110%; pointer over Previous: the circle filled creme with a black arrow. Proves the hovers.
10. Service page at 1600, after clicking the Play Button: the Video Modal open with the Vimeo video; then after Escape: closed. Proves the Video Modal path.
11. Service page at 1600, after dragging the row 200px without release: no modal opened. Proves click prevention.
12. Service page at 1600 with `prefers-reduced-motion: reduce` emulated, after pressing Next: the second Slide in place with no intermediate frame, and no scale on the Play Button hover. Proves reduced motion.
13. Service page at 1600, keyboard: tab from the Logo Marquee through the first Play Button to the second: the row slides so Sam Reid's Slide is in place. Proves focus brings a Slide into view.
14. Service page at 1600 with a temporary two-member Seed: the row loops with both circles live. Then a one-member Seed: one static panel, no circles. Removed afterwards. Proves the loop threshold and the single-Slide rule.
15. Service page at 1600 with the Block's Eyebrow temporarily emptied: the carousel starting at the panel's top. Restored afterwards. Proves the no-Eyebrow state.
16. Served HTML of the Service page: the Block a `section` holding the Eyebrow outside a Swiper region, a `ul` of five `li` Slides each a `figure` with a `blockquote` and a `figcaption`, two `button`s labelled "Previous" and "Next", the Posters as buttons labelled "Play video" with empty-alt images, no inline styles beyond the picture component's own. Proves the markup and the before-JavaScript state.
17. Seed output run twice, for the five member Seeds and the Block Seed: the first run reports each member created with its fields set and its images uploaded, and the Block created with five members resolved after the Logo Marquee; the second reports the members found, images reused and the Block skipped. Saved as text beside the screenshots. Proves the Seeds.
18. Control panel, the Block's Team picker: only the Team section offered. Proves the source restriction.

## Out of Scope

- A Logo, a heading, a Button Group or a Section Footer on the Block.
- Inline playback, Hover Play or the Time Ring: a Team Member's Video has no Display Type and always opens in the Video Modal.
- A fade transition, autoplay, Slide Progress bars or pagination dots.
- Adding quote marks in the template, or any typographic treatment beyond the hung opening mark.
- A 52px avatar size on the user component, or a 42px size on buttonShape.
- Changes to the Featured Testimonial Block, the Case Study Carousel, the Blog Carousel or their pills.
- Any change to the Team entry type, the Team listing page or a Team Member's own page.
- Committing the Seeds, the avatar photographs, the portrait or the temporary Seeds.

## Further Notes

- The node is a group over the Careers page frame, so its measurements are absolute page positions: the panel at y 6507, the Eyebrow's cap top at 6557, the Rule at 6588, the quote's box from 6934 to 7130, the avatar at 7170, the circles at 7180 to 7222, the panel's bottom at 7262.
- The node's "Author Images" group is five avatar photographs stacked at one position, which is why five Team Members are seeded and why four of them carry invented names. The design does not name them.
- The Figma integration exported the avatars at 104 by 104 and the portrait at 1667 by 2500; the seeded avatars will be soft above 52px on a retina screen, which is review content, not a design decision.
- The node's circles are 42px; buttonShape's 40px base was accepted so the icon style adds a colour and nothing else.
- The node names the outline circle "White 30% Outline" and the filled one "Secondary", and the buttonShape colour names follow those.
- The node's role text is creme-500 at 14px tracked at minus 0.28px; the user component's creme-100 colour gives white/63 and the base tracking, the same trade Featured Testimonial made.
- The node's quote is 55px tracked at minus 2.2px, minus 0.04em exactly, so the `6xl` token carries size, leading and tracking with no override.
- Swiper 9 and later loops by reordering real Slides rather than cloning them, so no duplicate play buttons reach a screen reader, and with one Slide per view two Slides are enough to loop.
- The Controls sit in the carousel's after-content slot because Alpine scopes refs to the nearest data component; positioning them over the text column is a layout choice on the Block, not a change to the component.
- The Vimeo video `822986690` is the one the Video and Featured Testimonial specs seed on the Tree Center page; it is review content.
