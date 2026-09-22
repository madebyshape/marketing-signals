# Carousel - Blog

Spec for the Blog Carousel Block: an Eyebrow with its Rule, a heading with the Highlight and a button over a row of Blog Sets, one Set per three Blogs the editor picked, or the nine latest Blogs when none are picked. Each Set is one Blog Large Card beside two Blog Cards stacked, every card a Linked Card to its Blog with Zoom on hover. Beneath the row a Slide Progress line fills to the Set in view, with the Carousel Controls at its right. Below the desktop breakpoint the same Blogs are a row of Blog Large Cards, one per Blog. The row loops. It is the second Block on the Swiper carousel component, the first to draw Slide Progress with it, the first caller of the date component, the first Blog surface on the site, and the sixth Block on the Home page.

Design: Figma node `9857-20629` in the Marketing Signals file, 1600 wide, a group named "Group 46356" on the Home page frame holding the Eyebrow "Insights" over its Rule, the heading "Industry News, *Insights & More.*", the "Explore More Insights" pill, one "Blog / Exterior / 6 Col / Featured" card at 750 by 668, two "Blog / Exterior / 6 Col / Landscape" cards at 750 by 324, the Previous and Next pills and two 3px lines. It draws one Set at rest with the line one third full. No hover frame, no tablet frame and no mobile frame exist, so the size ramp, the tablet and mobile geometry, the Zoom and the mobile card are decisions, not measurements.

Branch: feature/carousel-blog

Related: the Carousel - Case Study spec, whose carousel component, Carousel Controls, Eyebrow row and Entries field pattern this Block reuses; the Carousel - Service spec, whose bespoke Slide Progress this Block's line follows in spirit; the Content Seeding spec, whose command gains a post date so nine Blogs can be seeded with the dates the design shows. ADR-0001 does not apply: the Block is in flow. ADR-0002 applies: the Home page content, the nine Blogs included, arrives by Seed. No new ADR: the two-carousel layout is a template choice recorded under Implementation Decisions and reversible in one file. Vocabulary: `CONTEXT.md`, "Blog Carousel" section, which gained Blog, Blog Carousel, Blog Set, Blog Card, Blog Large Card and Zoom during the grilling session; Linked Card was added under Blocks and Slide Progress was generalised to cover a line as well as bars.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Home page ends its story at the Case Study Carousel and the footer. The design follows the client work with the agency's writing: a heading, a pill to the insights listing, and a row of blog cards the visitor pages through, one large card beside two small ones, with a line showing how far through the row they are. Editors have no Block to build it with. The Blog entry type exists and gained a Thumbnail, a Description and a Category in the last commit, and Blogs publish at `/insights/`, but nothing on the site shows a Blog anywhere: there is no blog card, no Entries field restricted to Blogs, and no template for a Blog or the Blog Listing. The Swiper carousel component drives the Case Study Carousel but has no Slide Progress of any kind, and its Carousel Controls come only in the colours of a black panel. The Seed command can create Blogs but cannot give them a post date, so nine seeded Blogs would all carry the day they were seeded.

## Solution

A Blog Carousel Block editors can add to any page. It holds an Eyebrow, a heading with the Highlight, a button and a list of Blogs the editor picks; left empty, it shows the nine latest Blogs. It renders on the page background inside the site margins: the Eyebrow with its Rule, the heading in black with its Highlight in purple over six columns with the secondary pill at the right of the heading row, then the Sets, then the Slide Progress line with the Previous and Next pills at its right. From `lg` each Slide is a Blog Set filling the content width: a Blog Large Card on the left, its Thumbnail across the top over the date and read time, the title, the Description and a "Continue Reading" pill; two Blog Cards stacked on the right, each the date and read time, the title and the pill beside a square Thumbnail. Below `lg` the Block shows the same Blogs as a row of Blog Large Cards, one per Blog, one and a half in view from `md` and one below it. Both rows loop, move one Slide at a time from the pills or by dragging, and the line fills to the Slide in view. Every card is a Linked Card: on a fine pointer the Thumbnail Zooms and the pill fills in lilac; on a coarse pointer the tap is the link. The Home page gets one instance with nine Blogs seeded from the node's content, so the review starts from three full Sets.

## User Stories

1. As a visitor, I want the agency's latest writing shown as cards on the Home page, so that I can find something to read without leaving the page.
2. As a visitor, I want one large card beside two smaller ones, so that the newest or most important piece leads and the row still shows three at once.
3. As a visitor, I want each card to show the date and how long the piece takes to read, so that I can decide whether to read it now.
4. As a visitor, I want each card to show the title, so that I know what the piece is about.
5. As a visitor, I want the large card to show a short description, so that the lead piece gets a sentence more than a title.
6. As a visitor, I want a "Continue Reading" pill on each card, so that I know a click opens the piece.
7. As a visitor, I want the whole card to be the link, so that I do not have to hit the pill exactly.
8. As a visitor with a mouse, I want the photograph to grow a little when I hover a card, so that I can see which card I am about to open.
9. As a visitor with a mouse, I want the pill to fill in when I hover a card, so that the cue on the card matches the cue under my pointer.
10. As a visitor, I want a line beneath the cards that fills as I page through them, so that I know how far through the row I am.
11. As a visitor, I want Previous and Next pills at the right of that line, so that I can page through the writing without guessing at a gesture.
12. As a visitor, I want Next on the last set to return to the first, so that I am never stuck at an end.
13. As a visitor, I want Previous on the first set to reach the last, so that I can go either way from the start.
14. As a visitor, I want the cards to slide at a settled pace with an ease, so that a change feels like a slide rather than a jump.
15. As a visitor with a mouse, I want to drag the row as well as press the pills, so that I can use whichever comes naturally.
16. As a visitor with a mouse, I want a drag never to open a Blog, so that moving the row is safe.
17. As a visitor, I want an "Explore More Insights" pill by the heading, so that I can reach the full listing from the Block.
18. As a visitor, I want the heading to lead with a coloured phrase, so that the Block's title reads like the rest of the site.
19. As a visitor with a tablet, I want one large card and a half in view, so that the row shows it continues.
20. As a visitor with a phone, I want one large card filling the width, so that the title and photograph are readable.
21. As a visitor with a phone, I want a swipe to move to the next card, so that the row works by touch.
22. As a visitor with a phone or tablet, I want a tap on the card to open the Blog, so that the link works without a hover.
23. As a visitor with a phone, I want the line and the pills beneath the cards at every width, so that the controls are where I expect them.
24. As a visitor who prefers reduced motion, I want the row to change without sliding and the photograph to stay still under my pointer, so that nothing moves that I asked not to.
25. As a visitor whose scripts have not run, I want the first Set laid out with every card readable and linked, so that the page is usable before the carousel is.
26. As a keyboard user, I want the Previous and Next pills to be real buttons in the tab order after the cards, so that I can page the row without a mouse.
27. As a keyboard user, I want the row to bring a card into view when its link takes focus, so that I never focus something I cannot see.
28. As a screen reader user, I want the row announced as a region and each Set as one of a count, so that I know where I am in it.
29. As a screen reader user, I want each card's link named by its date, title and pill, so that I know what it opens.
30. As a screen reader user, I want the photograph silent, so that I hear the title and not a file name.
31. As a screen reader user, I want the Slide Progress line hidden, so that I am not read a decoration.
32. As a screen reader user, I want the hidden carousel absent from the page, so that I never hear the same nine Blogs twice.
33. As an editor, I want a Blog Carousel Block in the Blocks field, so that I can add the row to any page.
34. As an editor, I want an Eyebrow, a heading and a button on the Block, so that I can title and link the row myself.
35. As an editor, I want to pick which Blogs appear and in what order, so that I can curate the row.
36. As an editor, I want the nine latest Blogs shown when I pick none, so that the row stays fresh with no upkeep.
37. As an editor, I want the picker to offer only Blogs, so that I cannot put a Case Study in the row by mistake.
38. As an editor, I want to pick any number of Blogs, so that a page with four good pieces can show four.
39. As an editor, I want the Block's padding in its Settings tab like every other Block, so that it spaces like the rest of the page.
40. As an editor, I want a Blog with no Thumbnail still to render its card, so that a missing image never breaks the row.
41. As an editor, I want the Block to render nothing when there are no Blogs at all, so that an empty site never shows an empty row.
42. As a developer, I want the two cards to be components, so that the Blog Listing can reuse them.
43. As a developer, I want the read time hardcoded behind one comment, so that hooking it up later is one change.
44. As a developer, I want the Slide Progress line driven by the carousel component's own state, so that it never fights Swiper's stylesheet.
45. As a developer, I want the Seed command to set a post date, so that seeded Blogs show the dates the design shows.
46. As a developer, I want styleguide previews of both cards, so that they can be checked outside the carousel.
47. As a reviewer, I want screenshots of the Block at the fixed widths against the Figma node, so that I can check the geometry without the design open.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `carouselBlog`, name "Carousel - Blog", colour blue, icon `newspaper`, added to the Blocks field in the General group. A Content tab with a Section Header heading element followed by the Eyebrow field, the Heading field and the Button field, then a Section Content heading element followed by the Entries - Blog field; a Settings tab with the Padding field. Section Footer is omitted because the Carousel Controls belong to the carousel, not to the editor.

**Fields.** One new field, Entries - Blog, handle `entriesBlog`, with the Blog section as its only source, list view, no minimum or maximum, the selection label "Add a Blog", the same translation method as Entries - Case Study, and the instructions "Leave empty to show the nine latest Blogs. Three Blogs make one Set, in the order they are listed." The Eyebrow, Heading, Button and Padding fields are reused as they are. The Blog entry type is untouched: its Thumbnail is an instance of the Image field, its Description the simple rich-text field; the date on a card is the Blog's post date, and its Categories are not shown.

**Which Blogs.** The Block shows the picked Blogs exactly, enabled ones only, in the field's order. With no picks it shows the nine latest enabled Blogs by post date, newest first. It never tops a short pick up to nine.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding on the vertical axis and horizontal padding off, and its content inside the section's content block within the site margins. No panel: the Block sits on the page background. Inside, top to bottom: the Eyebrow row, the heading row, the carousel, the controls row. From `lg` there is 70px from the Rule to the heading, 40px from the heading to the cards and 40px from the cards to the controls row; below `lg` 30px between each pair.

**Eyebrow row.** The eyebrow component renders the Block's Eyebrow in black with the Rule on in its `creme-300` colour, without an aside. An empty Eyebrow renders no row.

**Heading row.** From `lg` a twelve-column grid: the heading in the first six columns and the Block's button in the last six, aligned to the row's end and bottom; below `lg` the button sits under the heading, left aligned, 20px beneath it. The heading goes through the alternate heading component as an `h2`, colour `base`, the Highlight in its `base` style, semibold with the 9xl token's leading and tighter tracking. The size ramp is 4xl at mobile, 6xl from `md`, 7xl from `lg` and 9xl (75px) from `xl`, because six columns at `lg` are too narrow for 75px. The button goes through the button component in its `secondary` colour with the arrow-up-right icon after the label, label and target from the field. An empty heading drops the heading; an empty button drops the button; an empty row renders nothing.

**Two carousels.** Swiper lays Slides in one flex row, so a Set of one large and two stacked cards cannot be built from per-Blog Slides. The Block therefore embeds the carousel component twice: a desktop carousel of Blog Set Slides shown from `lg`, and a mobile carousel of Blog Large Card Slides hidden from `lg`, each with its own controls row in its after-content slot so the refs resolve in its own Alpine scope. The hidden one is removed from layout and the accessibility tree by its breakpoint class; Swiper's resize observer brings whichever becomes visible up to date. Both take the same Blog list; the desktop list is chunked into threes first.

**Desktop carousel.** One Set per view, a 20px gap, 600ms changes with the component's `smooth` ease, dragging on, click prevention on so a drag never navigates, looping when there are two or more Sets, the accessibility module on with the row a region and each Slide a group. Each Set is a list item holding a two-column grid with a 20px gap: the Blog Large Card in the first column, the two Blog Cards stacked with a 20px gap in the second. A last Set with fewer than three Blogs keeps the grid with the missing cells empty.

**Mobile carousel.** One Slide per view below `md` and one and a half from `md`, start aligned so the next card peeks at the right, a 20px gap, otherwise the same options, looping when there are two or more Blogs. Each Slide is a list item holding one Blog Large Card.

**Blog Large Card.** A new component taking a Blog. A Linked Card: one link to the Blog wrapping a creme-200 card with 20px corners, clipping its overflow. The Thumbnail sits across the top inside a 5px inset with 15px corners, through the picture component with the focal point honoured, the alt empty and a new `2x1` named transform with its ratio, so the image is 740 by 370 at the node's 750 card width. Under it, padded 40px from `lg` and 20px below, top to bottom: the meta row, then a text group of the title, the Description and the pill 25px apart, capped at 87% of the inner width from `lg`, with 40px from the image to the meta row and 25px from the meta row to the title. The title is an `h3`, medium, 2xl below `lg` and 3xl (30px) from `lg`, with the 3xl token's leading and tighter tracking. The Description renders as a paragraph at the body size and leading with its tags stripped, because a link inside the card's link is invalid HTML. A Blog with no Thumbnail renders the card with a creme-300 2x1 placeholder in its place; no Description drops the paragraph.

**Blog Card.** A new component taking a Blog. A Linked Card of the same creme-200 card, 20px corners, clipped overflow. Two columns: text on the left padded 40px from `xl` and 25px below, and the Thumbnail on the right filling 37% of the card's width at the card's full height inside a 5px inset with 15px corners, through the picture component with the `1x1` transform, the ratio off and the image covering the column at its focal point. The text column is a vertical stack with the meta row at the top and the title over the pill, 25px apart, at the bottom. The title is an `h3`, medium, xl below `xl` and 2xl (25px) from `xl`, with the 2xl token's leading and tighter tracking. A Blog with no Thumbnail renders a creme-300 column in its place.

**Meta row.** A new blog meta component both cards include, so the two never drift: a row of two items 15px apart at the body size, regular, black. The first is the calendar-day icon at 12px before the Blog's post date through the date component in the format "6 July 2026", as a `time` element, with 15px right padding and a 1px creme-400 right border; the second is the clock icon at 12px before the read time. The icons are the Font Awesome sharp regular set the site already loads. The read time is the literal "5 min read" for now, with the one-line comment that it should come from the readTime component once Blog pages have content to count; that component is otherwise untouched.

**The pill.** The button component gains a `secondary-outline` colour: a secondary border, black text, and on a fine pointer a secondary fill. Each card renders "Continue Reading" through it as a `span`, not a link, with no icon, because the card is the link and a nested link is invalid. The card carries the group class, so the card's own hover drives the pill's fill.

**Zoom.** On a fine pointer, hovering a card scales its Thumbnail to 105% over 500ms with the component's ease-out, the image's rounded inset clipping the overflow, and fills the pill. Under reduced motion the image does not move and the pill still fills. Nothing else on the card changes. Both cards Zoom; the Case Study and Service Slides keep their own hover and are untouched.

**The carousel component.** It gains a `slideCount` property beside `activeIndex`, set from Swiper's slide count on init and kept in step on update, so anything in its scope can draw progress. Nothing else changes: navigation still comes from the `prev` and `next` refs, reduced motion still zeroes the change speed, and Swiper's own pagination is not used.

**Slide Progress.** A new carousel progress component, included in a carousel's after-content slot so it sits in the scope: a 3px creme-300 track with rounded ends, full width, and a primary fill whose width is the active index plus one over the slide count, transitioning its width over 600ms with the ease-out so it moves with the Slide and jumping under reduced motion. It is hidden from assistive technology. Before scripts run it shows the first step, one over the served slide count, so the page never paints an empty line.

**Carousel Controls.** The controls component gains a `black` colour option for a light background: the button component's `black-outline` for Previous and `secondary` for Next, which is what the node draws. The `base` option stays for the Case Study Carousel. When a row does not loop the pill at an end takes Swiper's disabled state as before.

**Controls row.** Each carousel's after-content slot holds one row: the Slide Progress line taking the remaining width, then the Carousel Controls at the right, 40px between them, the line vertically centred on the pills. The row renders only when the carousel has two or more Slides.

**Keyboard.** Swiper's accessibility module slides a Slide into place when a link inside it receives focus, so no focus handling is written. Previous and Next are buttons and take focus in the document order after the Slides.

**Accessibility.** The Slides are a list inside Swiper's region; each Slide is a group announced as one of the count. A card's link is named by its contents, the date, the title, the Description and the pill's text, so no `aria-label` is set. The Thumbnail has an empty alt. The hidden carousel is display-none, so nothing is read twice. The Slide Progress line is `aria-hidden`.

**Empty states.** A Blog without a Thumbnail renders its card with a creme-300 placeholder. One Blog renders one static Set of one Blog Large Card and no controls row, and one static card on mobile. Two to three Blogs render one Set on desktop with no controls row, and a paging mobile row. Four or more Blogs render two or more Sets and page. A Block with no Blogs to show renders nothing at all, section included. An empty Eyebrow, heading or button drops its element and nothing else.

**Seed command.** The command gains a `postDate` top-level key, an ISO 8601 date, applied when it creates an entry and ignored when the entry already exists, in keeping with its rule that it never updates what is already there. It still cannot set a Categories field, and this spec does not need it to.

**Home page content.** Nine Blogs seeded first, one Seed file each in the scratch folder for this spec, each creating a Blog with a title, a Thumbnail from the folder, a Description and a post date. Three come from the node: "How to pitch a journalist: What an ex-Reach PLC pro really thinks of your pitch" dated 10 July 2026 with the node's Description, "SEO for Fashion Brands: What Actually Works (and What's Changing)" dated 6 July 2026, and "How to Write Content for SEO That Converts and Ranks" dated 17 June 2026. Six more are written in the same SEO and PR vein with dates spread across May and June 2026, and the three Figma images cycle across all nine. Then one Blog Carousel after the Case Study Carousel, padding Top and Bottom, Eyebrow "Insights", heading "Industry News, *Insights & More.*" with the Highlight on the second line, the button "Explore More Insights" linking to the Blog Listing entry, and the nine Blogs picked in that order so the node's Set is the first. Seeds are not committed.

**Styleguide.** Two new previews, one per card, each rendering the latest live Blog in both panels and nothing when the site has no Blog. The carousel gets none.

**Docs.** `CONTEXT.md` gained the Blog Carousel vocabulary and Linked Card during the grilling session, and generalised Slide Progress. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Home page through the global layout, with the Block seeded after the Case Study Carousel and the nine Blogs seeded before it. The Block is the only caller of the two card components, the meta component, the progress component, the carousel component's `slideCount`, the Carousel Controls' `black` colour, the button's `secondary-outline` colour, the date component and the `2x1` transform, so all are proven through it. The secondary seams are the Seed command's own output, which proves the post date, and the two styleguide previews.

**What good evidence looks like.** It shows what a visitor would see: the Eyebrow row, the black heading with its purple Highlight beside the lilac pill, the first Set at the designed sizes with its dates, titles, pills and photographs, the line one third full with the pills at its right, the row mid-slide, the line at two thirds, the hover Zoom, the tablet and mobile rows of large cards, the reduced-motion jump and the keyboard focus. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is the Home page on `main` at the commit the branch forked from.

**Evidence plan.**

1. Home page at 1600, full page, scrolled to the Block at rest: the Eyebrow "Insights" over its creme Rule inside 40px margins, the heading at 75px in six columns with "Insights & More." in purple and the lilac "Explore More Insights" pill at the row's right, the Blog Large Card 750 wide with its 2x1 photograph, meta row, 30px title, Description and pill, the two Blog Cards 750 by 324 stacked 20px apart with their square photographs on the right, the line 3px creme filled purple to one third and the black-outline Previous and lilac Next pills at its right 40px beneath the cards, compared against the Figma node. Proves the desktop layout.
2. Home page at 1600, viewport, pointer over the Blog Large Card: the photograph at 105%, the pill filled lilac, nothing else changed. Proves the Linked Card hover and Zoom.
3. Home page at 1600, viewport, pointer over a Blog Card: the same. Proves both cards Zoom.
4. Home page at 1600, viewport, 300ms after pressing Next: the row mid-slide and the line between one and two thirds. Then at rest: the second Set in view, the line two thirds full. Proves the Controls, the 600ms ease and Slide Progress.
5. Home page at 1600, viewport, Next pressed on the third Set: the first Set in view, the line one third full. Then Previous pressed on the first Set: the third Set, the line full. Proves the loop both ways.
6. Home page at 1600, viewport, after a 400px drag on the row: the next Set in view and the page still on the Home page. Proves dragging and that a drag never navigates.
7. Home page at 1600, viewport, a click on a Blog Card: the Blog's page at its `/insights/` address. Proves the link.
8. Home page at 1280, viewport, the Block at rest: Sets still, the heading at 9xl. Proves the `xl` step.
9. Home page at 1024, viewport, the Block at rest: Sets with each column 472 wide, the heading at 7xl, the Blog Card's title at xl with 25px padding. Proves the `lg` step and the narrow Blog Card.
10. Home page at 768, viewport, the Block at rest: no Sets, one Blog Large Card and a half in view with the next peeking at the right, the heading at 6xl with the pill beneath it, the line and pills in one row beneath. Proves the `md` step and the mobile carousel.
11. Home page at 390, full page, the Block at rest: one Blog Large Card filling the content width with 20px padding, the title at 2xl, the Eyebrow, heading at 4xl and pill stacked with 30px between the rows. Proves the mobile stack.
12. Home page at 390, viewport, after a swipe of one card width: the second Blog in view, the line at two ninths. Proves touch drives the row and the line counts Blogs, not Sets.
13. Home page at 1600 with reduced motion emulated, viewport, immediately after pressing Next: the second Set already in place, the line already at two thirds; then pointer over a card: the pill filled, the photograph still. Proves the reduced-motion rules.
14. Served HTML of the Home page: two carousels, one hidden from `lg` and one shown from it, the desktop one a list of three items each a grid of three links, the mobile one a list of nine items each one link, each link holding a `time` element, an `h3` and a `span` pill with no link or heading nested inside, the line at one third, no inline styles beyond the picture component's ratio property. Proves the before-script state and the markup.
15. DOM of the Home page after scripts run at 1600: the visible row a region, each Set a group with its position announced, the Thumbnails with empty alts, the pills real buttons, the line `aria-hidden`, the mobile carousel absent from the accessibility tree. Proves the accessibility story.
16. Home page at 1600, keyboard: tab from the Case Study Carousel through the first Set to the second Set's first link: the row slides the second Set into view. Proves focus brings a Slide into view.
17. Home page at 1600 with a temporary four-Blog pick: two Sets, the second with the Blog Large Card and an empty right column, paging without a third. Then a two-Blog pick: one Set, no controls row on desktop, a paging mobile row at 390. Then a one-Blog pick: one static card at both widths, no controls row. Restored afterwards. Proves partial Sets and the thresholds.
18. Home page at 1600 with the pick emptied: the nine latest Blogs in three Sets, newest first. Proves the fallback.
19. Home page at 1600 with a Blog's Thumbnail and Description temporarily removed: the Blog Large Card with a creme placeholder and no paragraph, the Blog Card with a creme column. Restored afterwards. Proves the empty states.
20. Control panel, the Block's Blog picker: only the Blog section offered, the button reading "Add a Blog", the instructions shown. Proves the field.
21. Seed command output for one Blog Seed run twice, then the Home Seed run twice: the Blog created with its post date on the first run and skipped on the second, the Block created after the Case Study Carousel with nine Blogs resolved and skipped on the second. Saved as text beside the screenshots. Proves the seeding and the `postDate` key.
22. Styleguide at 1600, both card previews on both panels. Proves the components stand alone.

## Out of Scope

- A Blog page template, the Blog Listing template and any listing Block: the cards are built to be reused there, but nothing renders a Blog page here beyond what already exists.
- Counting the read time: the literal stays until Blog pages have content, and the readTime component is untouched.
- Showing a Blog's Categories on either card.
- Seeding Categories, or any Seed key beyond `postDate`.
- Autoplay, dots, a fraction counter or Swiper's own pagination.
- Zoom or any hover change on the Case Study and Service Slides.
- A Cursor Label on the cards: the pill is the cue.
- Topping a short pick up to nine.
- Committing the Seeds or the images they use.

## Further Notes

- The node's Featured image measures 740 by 343, a hair under 2:1; the `2x1` transform rounds it to 370 tall, so the Blog Large Card is about 695 tall against the node's 668. A pixel-derived ratio was rejected under the coding standards.
- The node's Landscape image is 277 by 313 inside a 324 card, near square; the `1x1` transform with cover crops the last few pixels rather than adding a ratio for one card.
- The node's line is 1251 wide with the pills a further 45px right; the line takes the remaining width of the row rather than a fixed measure, so it survives longer button labels.
- The node's pills have 15px vertical padding; the button component's base size has 12px, the house pill, and is used as is here as on every other Block.
- The heading's tracking is -3px on 75px, the tighter token's -0.04em; the card titles' -1.2px on 30px and -1px on 25px are the same token.
- Two Swiper instances is the trade-off for Sets on desktop and single cards on mobile; a single carousel of Set Slides that stacked three cards per Slide on mobile was the runner-up, rejected for making a phone swipe move three cards at once.
- Seeded Blogs show "5 min read" everywhere, as does every Blog until the read time is counted; the evidence will show this.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
