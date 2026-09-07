# Carousel - Service

Spec for the Service Carousel Block: an Eyebrow over a row of Slides, one per Service the editor picked, that Pins to the screen and moves sideways as the visitor scrolls. Each Slide is a rounded card with the Service's Thumbnail darkened behind its title and Description, the whole card one link to the Service, with a Cursor Label on hover and a button on touch. It is the first Block built on GSAP ScrollTrigger rather than Swiper, the first caller of the cursor component, the first Entries field in the project, and the fourth Block on the Home page.

Design: Figma node `9716-8040` in the Marketing Signals file, 1600 wide. The node draws the hover state twice with two photo options; no resting-state frame and no mobile frame exist, so the resting colours, the size ramp and the mobile stack below are decisions, not measurements.

Branch: feature/carousel-service

Related: the Statistics spec, which this Block follows on the Home page; the Content Seeding spec, which puts it there and gains the Entries field type for it; the Heading Reveal spec, whose eyebrow component this Block extends. ADR-0001 applies in the negative: the Block is in flow beneath Statistics, and while pinned it runs beneath the fixed header rather than padding for it. ADR-0002 applies: the Home page content arrives by Seed. No new ADR: the choice of ScrollTrigger over Swiper is recorded here, under Further Notes, because it is a property of this one Block rather than a rule for the site. Vocabulary: `CONTEXT.md`, "Service Carousel" section, which gained Service, Service Carousel, Slide, Slide Number, Pin, Slide Progress and Cursor Label during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Home page shows a hero, a heading over two photographs, a statement whose words reveal on scroll, and a row of numbers, then the footer. The design follows the numbers with the agency's six Services, each a full-width card the visitor scrolls through sideways, and editors have no Block to build it with. The Services exist as entries with a Description and a Thumbnail, but nothing on the site shows them together. The existing carousel component is a Swiper slider that swipes; the design asks for a card that holds still while the visitor's own scroll moves the Slides, which Swiper does not do.

## Solution

A Service Carousel Block editors can add to any page. It holds an Eyebrow and a list of Services the editor picks. Each Service becomes a Slide: a rounded card inside the site margins with the Service's Thumbnail darkened behind its Eyebrow row, its Slide Number, its title and its Description. The Slides sit side by side with a 20px gap, so the neighbours show at the edges. When the Block reaches the viewport it Pins there, centred, and the visitor's scroll moves the Slides sideways at the same rate, resting wherever the scroll stops and following it back. Six bars beneath the cards, the Slide Progress, fill one by one as each Slide arrives. Each Slide is one link to its Service: on a fine pointer the heading turns fluro and a white pill reading "Find Out More" follows the cursor over the card; on a coarse pointer the same pill sits beneath the Description as a button. Under reduced motion, and before the script runs, the Slides stack vertically and the bars stay hidden. The Home page gets one instance with all six Services, added through the Seed command so the review starts from real content.

## User Stories

1. As a visitor, I want the agency's Services shown as a row of large cards on the Home page, so that I can see what they do without leaving the page.
2. As a visitor, I want the cards to hold still on screen while my scroll moves them sideways, so that the carousel feels part of the page rather than a widget inside it.
3. As a visitor, I want the cards to move at the same rate as my scroll and to follow it back up, so that the carousel feels connected to the wheel and never runs away from me.
4. As a visitor, I want the carousel to rest wherever I stop scrolling, so that it never fights me by snapping.
5. As a visitor, I want the next card to show at the edge of the screen, so that I know there is more to the right.
6. As a visitor, I want the card centred in the viewport while it is pinned, so that it reads as held rather than stuck under the header.
7. As a visitor, I want the same eyebrow, "Our Digital Marketing Services", on every card, so that a card seen mid-scroll still says what it is.
8. As a visitor, I want each card numbered, so that I know which Service I am on.
9. As a visitor, I want a row of bars that fill as each card arrives, so that I can see how far through the row I am and how many there are.
10. As a visitor, I want the Service's title large and its Description beside it, so that a glance tells me what the Service is.
11. As a visitor, I want the photograph darkened behind the text, so that white text stays readable over any picture.
12. As a visitor, I want the photograph to fill the card whatever its shape, cropped to its focal point, so that a portrait photo looks as intended as a landscape one.
13. As a visitor with a mouse, I want the whole card to be the link, so that I do not have to find the right word to click.
14. As a visitor with a mouse, I want the heading to turn fluro and a "Find Out More" label to follow my cursor over the card, so that I know the card is a link before I click.
15. As a visitor with a mouse, I want nothing else on the card to move when I hover, so that the two cues stay clear.
16. As a visitor with a phone or tablet, I want a "Find Out More" button beneath the Description, so that the link is visible without a hover.
17. As a visitor with a phone, I want the heading, Description and button stacked, so that each fits the width.
18. As a visitor with a phone, I want a swipe to move the cards sideways the same way a scroll does on a laptop, so that the carousel works with the gesture I already use.
19. As a visitor who prefers reduced motion, I want the cards stacked one above the other with no pinning, so that nothing moves that I did not move.
20. As a visitor whose script has not run, I want the same stacked cards, so that the Services are readable however the page loads.
21. As a keyboard user, I want tabbing to a card's link to bring that card into view, so that I am never focused on something I cannot see.
22. As a screen reader user, I want each card read as a heading, a Description and a link to the Service, once, so that the carousel reads as a list of six Services.
23. As a screen reader user, I want the photograph marked decorative, so that a filename is not read to me.
24. As a visitor, I want the header to come back over the card when I scroll up, so that the site's navigation is never lost inside the carousel.
25. As a visitor, I want the page to continue beneath the last card once it arrives, so that I am not trapped scrolling past empty space.
26. As an editor, I want a "Carousel - Service" Block in the Blocks menu, so that I can add it to any page.
27. As an editor, I want to type the Eyebrow, so that the carousel can say something other than "Our Digital Marketing Services" on another page.
28. As an editor, I want to pick Services from a list and order them, so that the carousel shows the ones I choose in the order I choose.
29. As an editor, I want the picker to offer Services and nothing else, so that I cannot put a blog post where a card expects a Description and a Thumbnail.
30. As an editor, I want the card to use the Service's own title, Description and Thumbnail, so that a Service changed in one place changes everywhere.
31. As an editor, I want a Service without a Thumbnail to still get a card, so that my choice is never silently dropped.
32. As an editor, I want a carousel with one Service to render as a single static card, so that a page with one Service does not pin for nothing.
33. As an editor, I want a carousel with no Services to render nothing, so that an unfinished Block leaves no gap on the page.
34. As an editor, I want the Block's fields under Section Header and Section Content, so that it reads like every other Block.
35. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
36. As an editor, I want the Home page to already carry this Block with all six Services, so that I see how it is meant to look.
37. As a developer, I want the Pin, the Slide Progress and the Cursor Label to animate transforms only, so that the carousel holds a steady frame rate on a laptop and a phone.
38. As a developer, I want one ScrollTrigger per Block, driving the track and the bars together, so that there is one thing to refresh and one thing to reason about.
39. As a developer, I want the cursor component mounted once in the global layout and raised by event, so that the next Block that needs a Cursor Label needs no cursor of its own.
40. As a developer, I want the Seed command to accept Services by slug, so that the Home page content is reproducible without a control panel login.
41. As a developer, I want the existing carousel component left on Swiper, so that swipeable carousels keep a tool that suits them.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `carouselService`, name "Carousel - Service", colour blue, icon `images`, added to the Blocks field in the General group. A Content tab with a Section Header heading element followed by the Eyebrow field, then a Section Content heading element followed by the Entries - Services field; a Settings tab with the Padding field. Section Footer is omitted because the design has nothing beneath the cards.

**Fields.** One new field, Entries - Services, handle `entriesServices`, an Entries field whose only source is the Service section, no minimum or maximum, list view, selection label "Add a Service". It is the first Entries field in the project; it is Service-specific by design, because the source restriction is what guarantees every picked entry has a Description and a Thumbnail to read, and a later Case Study carousel wants its own restriction. The Eyebrow field is reused as is.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding, and its content inside the section's content block. The Block manages its own horizontal layout, so the section's horizontal padding is off and the Block places the active card at the site margin itself; the neighbouring cards overflow the margin and the frame clips them at the viewport edge. Alpine data named for the Block's handle, registered in a js block at the bottom of the template, with the Pin in the init method. Every DOM reference is a ref, scoped to the Block, so two carousels on one page do not collide.

**Slides.** The Block renders one Slide per enabled Service in the field's order. A Slide is one link to the Service wrapping the whole card: a rounded card, 20px corners, black background, the Thumbnail filling it at 30% opacity through the picture component with the focal point honoured and no ratio, so a portrait photo crops to its subject. A new ratio-free named transform with widths up to twice the card's 1520px serves it. The card's padding is 40px left and right and 50px top and bottom from `lg`, 20px all round below. Inside, top to bottom: the Eyebrow row, then the heading and Description centred vertically in the remaining height, then on coarse pointers the button. The Slides sit in a track with a 20px gap. From `lg` each Slide is the viewport width less the two 40px site margins; below `lg` the same rule with the margins the section already uses. Card height from `lg` is the smaller of 820px and the viewport height less 80px, so the pinned card always sits whole in the viewport with 40px above and below at least; below `lg` it is at least the viewport height less 80px and grows with a long Description.

**Eyebrow row.** The eyebrow component renders the Block's Eyebrow in white with the Rule on, and gains a `white-30` Rule colour for it. It also gains an optional `aside` param rendered at the right end of the same row, so the Rule stays one element under both; the Service Carousel is its first caller and passes the Slide Number. The Slide Number is the Slide's position, two digits in round brackets, 16px medium white. The eyebrow text keeps the component's medium weight: the node draws it regular on two cards and medium on two, and the component already has medium.

**Heading and Description.** The heading is the Service's title through the heading component as an `h3`, white, semibold, leading 0.92, tighter tracking, wrapping naturally; the newline two Service titles carry is treated as whitespace. The heading component gains a `white` colour. The size ramp is 5xl at mobile, 7xl from `md`, 9xl from `lg` and 12xl (120px) from `2xl`. From `lg` the heading and Description share a 12-column grid inside the card's padding: the heading in columns one to seven, the Description in columns eight to eleven, both centred vertically in the row. The Description is the Service's Rich Text - Simple value with everything but paragraphs, bold, italic and line breaks stripped before rendering, because a link inside the Slide's link is invalid HTML and the Slide's whole job is to send the visitor to the Service. It renders through the rich text component, which gains a `white` colour whose Highlight is fluro. Below `lg` the heading, Description and button stack with 20px between them.

**Hover and the Cursor Label.** On fine pointers the Slide is a hover group: the heading transitions to fluro and nothing else changes. Entering the card raises the Cursor Label through the cursor component's window event with the text "Find Out More"; leaving it lowers it. The cursor component changes base style rather than gaining a variant, as the statistic and eyebrow components did, because nothing calls it yet: it becomes the design's white pill, 10px by 5px padding, fully rounded, 16px medium black text, and shows text as well as an icon. Its pointer following moves to a transform-based quick tween rather than writing left and top on every move. It keeps hiding the native cursor while active and showing itself on fine pointers only. The global layout mounts it once, after the footer, so any Block can raise it.

**The button.** On coarse pointers, and only there, a span styled by the button component sits beneath the Description reading "Find Out More": the existing white colour and a new `sm` size, 10px by 5px padding, no icon. It is a span because the Slide is already the link; there is one link per Slide, never two.

**The Pin.** Inside GSAP's match media for no reduced-motion preference. The Block's Alpine state flips the track from a column to a row, waits a tick for the layout, then creates one tween that moves the track by a negative x equal to the number of Slides less one times the card width plus the gap, with ease none, and one ScrollTrigger on it: the frame is the trigger and the pinned element, start when the frame's top reaches the viewport top, end after a scroll distance equal to the track's travel, so one pixel of scroll is one pixel of movement, scrub direct, no snap, invalidated on refresh so a resize recomputes the widths from the DOM once rather than every frame. The frame is viewport-height with the stage centred in it, which is what centres the card while pinned. The track carries a will-change hint for transform. Lenis already reports its scroll to ScrollTrigger and scrolls the window natively, so no scroller proxy is needed; the header's own scroll listener keeps working while pinned, which is what brings the header back over the card on scroll up. With fewer than two Slides the Pin is not created and the single card renders static in the stacked layout.

**Slide Progress.** One bar per Slide in a row across the stage's inner width, 5px tall, 5px apart, fully rounded, 50px above the card's bottom edge, fixed in the frame so the cards pass beneath it. Each bar is a white 30% track with a fluro fill scaled from the left. The ScrollTrigger's update callback sets every fill's scale in one batched write from the trigger's progress: with the progress mapped onto the Slide positions, bar one is always full and bar n fills from empty to full as the visitor scrolls from Slide n minus one to Slide n, so at rest on Slide k the first k bars are full, matching the Slide Number. The bars are served hidden and shown only when the Pin is created, so reduced motion, no script and a single Slide all show none. The fills carry a will-change hint for transform.

**Keyboard.** When a Slide's link receives focus while the Pin exists, the Block scrolls the window to the Slide's offset: the trigger's start plus the Slide's index times the card width plus the gap. The scroll goes through the Lenis instance, which the site's script entry exposes on the window beside GSAP for the purpose.

**Accessibility.** The Slides are a list; each heading is an `h3` under the Block; the Thumbnail has an empty alt; the Slide Number and the bars are hidden from assistive technology; the link's accessible name is the Service's title. Nothing is read twice.

**Empty states.** A Service without a Thumbnail renders its card on solid black. A Block with one Service renders one static card and no bars. A Block with no Services renders nothing at all, section included. A Block with an empty Eyebrow renders the Slides without the Eyebrow row.

**Seed command.** The Seed shape gains the Entries field type: a list of slugs, each resolved to an entry the way the Link resolver finds entries, in the order given, with an error naming the field and the slug when one is missing. The Content Seeding spec records it.

**Home page content.** One Service Carousel after Statistics, padding Top and Bottom, Eyebrow "Our Digital Marketing Services", Services in the Service structure's order: Digital PR Marketing, AI-focused Search Engine Optimisation, Pay Per Click, Organic Search (SEO), Integrated Search (SEM), SaaS Link-Building Agency. Added with the Seed command from a Seed file under the scratch folder; the Seed is not committed.

**Docs.** `CONTEXT.md` gained the Service Carousel vocabulary during the grilling session. The Content Seeding spec gains the Entries field type. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Home page through the global layout, with the Block seeded after Statistics. The Block is the only caller of the cursor component, the eyebrow's `aside`, the heading's white colour, the rich text's white colour and the button's `sm` size, so all are proven through it. The secondary seam is the Seed command's own output, which proves the Entries field type. The styleguide gains nothing.

**What good evidence looks like.** It shows what a visitor would see: the card at the designed size inside the margins with the neighbour peeking, the Eyebrow row with its Rule and Slide Number, the heading at 120px beside the Description, the bars, the pinned card mid-move, the hover cues, the touch button, the stacked reduced-motion layout, and the header returning over the card. Fixed widths and fixed scroll offsets, one state per file, before and after pairs on the PR. The before for this Block is the Home page on `main` at the commit the branch forked from.

**Evidence plan.**

1. Home page at 1600, viewport, scrolled so the Block is pinned on Slide one: the card 1520 by 820 with 20px corners inside 40px margins, Slide two peeking 20px at the right edge, the Eyebrow row with Rule and "(01)", heading white at 120px, Description in its four columns, six bars with the first full, compared against the Figma node. Proves the desktop layout and the resting state.
2. Home page at 1600, viewport, pointer over Slide one: heading fluro, the white "Find Out More" pill at the pointer, no native cursor. Proves the hover cues and the Cursor Label.
3. Home page at 1600, viewport, scrolled half a card width past line 1's offset and left for two seconds: the track halfway between Slides one and two, bar two half full, nothing moved after the wait. Proves the 1:1 mapping and the absence of snapping.
4. Home page at 1600, viewport, scrolled to the end of the Pin: Slide six in place, every bar full; then one more viewport of scroll: the page continues to the footer. Proves the end of the Pin.
5. Home page at 1600, viewport, scrolled back to line 1's offset after line 4: Slide one in place, bars two to six empty. Proves the Pin follows the scroll both ways.
6. Home page at 1600, viewport, scrolled 200px up while pinned mid-row: the header over the card. Proves the header returns.
7. Home page at 1024, viewport, pinned on Slide one: heading at 9xl in its seven columns, Description in its four. Proves the `lg` step.
8. Home page at 768, viewport, pinned on Slide one with a coarse pointer emulated: heading at 7xl, Description and button stacked beneath, no Cursor Label on hover. Proves the `md` step and the touch button.
9. Home page at 390, viewport, pinned on Slide one: the card filling the viewport less 80px, 20px padding, Eyebrow row, heading at 5xl, Description, button, bars. Proves the mobile stack.
10. Home page at 390, viewport, after a swipe of one card width: Slide two in place. Proves touch drives the Pin.
11. Home page at 1600 with reduced motion emulated, full page: six cards stacked with 20px between them, no bars, no pin spacer in the DOM. Proves the reduced-motion story.
12. Served HTML of the Home page: six list items each one link, headings as `h3`, no link inside a link, no inline styles, bars hidden, track a column. Proves the before-JavaScript state and the accessibility structure.
13. DOM of the Home page after scripts run at 1600: the Slide Number and bars hidden from assistive technology, the Thumbnail with an empty alt, one ScrollTrigger for the Block. Proves the accessibility story and the single trigger.
14. Home page at 1600, keyboard: tab from the Statistics to the third Slide's link: the window scrolls so Slide three is in place. Proves focus brings a Slide into view.
15. Home page at 1600 with a temporary one-Service Seed: one static card, no bars, no pin. Removed afterwards. Proves the single-Slide rule.
16. Home page at 1600 with a Service's Thumbnail temporarily removed: its card on solid black. Restored afterwards. Proves the missing-Thumbnail rule.
17. Control panel, the Block's Services picker: only the Service section offered. Proves the source restriction.
18. Seed command output for the Home Seed, run twice: created after Statistics on the first run with six Services resolved, skipped on the second. Saved as text beside the screenshots. Proves the seeding and the Entries field type.
19. Seed command dry run with a slug that is not a Service: the run stops naming the field and the slug. Proves the loud failure.

## Out of Scope

- Snapping to Slides, arrows, drag, or clickable bars. The scroll is the only control.
- A hover change to the image or the overlay.
- Rewriting the existing carousel component or moving it off Swiper. It stays for swipeable carousels.
- A Cursor Label anywhere else on the site. The component is ready for it; no other Block calls it here.
- A Section Footer, a heading above the row, or a link to the Services listing page.
- Any change to the Service entry type or its content.
- Committing the Seed.

## Further Notes

- ScrollTrigger, not Swiper, because the design asks for a card that holds still while the visitor's own scroll moves the row, which is a scroll-driven pin, not a slider. Swiper would give snapping, drag and keyboard handling for free, but its slide is the scroller and the page would have to stop for it. The site's other carousels stay on Swiper; this is the one scroll-driven Block, and a second one would be the moment to write the rule down as an ADR.
- The reference site (myweblab.it, "Il nostro approccio") was inspected in a browser: a GSAP pin spacer, a translated flex track, Lenis, free scrub with no snap, roughly one viewport of scroll per card, a progress bar fixed in the pinned section, and vertical stacking with no pin below 768px. This Block matches it except that it Pins at every width.
- The design's cards are drawn twice in the hover state with two photo options, one at 30% image opacity and one at 40%; 30% is used because three of the four cards in the node carry it and nothing changes on hover.
- The design draws the heading in title case through a capitalise rule; the Service titles are already cased by the editor, so no transform is applied.
- The design's first bar is drawn half full on a card at rest; that is an illustration of the fill, not a state the mapping produces. The mapping was chosen so that the bars and the Slide Number agree.
- The heading tracking is -4.8px at 120px, the tighter tracking token; the 12xl token already carries the size, leading and tracking.
- Card height is fixed at 820px in the 1600 frame; the viewport-minus-80px cap is a decision, made so a 1600 by 1000 viewport, the evidence width, shows the whole card with its margins while pinned.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
- Lenis is exposed on the window for the focus scroll; it was previously local to the script entry.
