# Elements - Testimonial

Spec for the Testimonial Grid Block: a Review Badge and a centred heading with the Highlight over a Scatter of Testimonial Cards, one per Testimonial the editor picked, with a Button Group centred beneath. From the desktop breakpoint the heading and Review Badge Sink: they hold still below the Header while the cards scroll over them, then dim out behind the page colour towards the bottom of the cards. Each Testimonial Card is a coloured panel with an Avatar Group and the Logo above the quote, coloured and placed by its Slot. It is the first Block to pick Testimonials, the first to render a Star Rating, the first Block since Statistics with no script, and the eighth Block on the Home page, after the Stacking Cards.

Design: Figma node `9841-18421` in the Marketing Signals file, 1600 wide, a group of six "Testimonial / 4 col" instances at 1520 by 1900 inside the site margins. No tablet frame and no mobile frame exist, and the node shows the Scatter at rest with every card fixed at 422px, so the responsive rules, the content-driven card height and the Sink below are decisions, not measurements. The People Performance Consulting site's `entriesTestimonial` Block is the reference for the Sink: a sticky heading inside a relative wrapper, a full-height gradient over it, the cards on top of both.

Branch: feature/elements-testimonial

Related: the Stacking Cards spec, which this Block follows on the Home page and whose position-driven colour cycle it repeats as the Slot; the Marquee - Client spec, whose Entries field conventions it copies and whose inline Logo rendering it reuses; the Error Page spec, whose Error Links are the prior art for the Button Group; the Content Seeding spec, which creates the Testimonials and puts the Block on the Home page. ADR-0001 applies: the Sink rests the heading below the fixed Header, so the header height token gains a top-offset form in the shared map rather than the Block guessing it. ADR-0002 applies: the Testimonials and the Home page content arrive by Seed. No new ADR: a sticky heading and a gradient are trivially reversible, and nothing else here is a trade-off. Vocabulary: `CONTEXT.md`, "Testimonial Grid" section, which gained Testimonial, Testimonial Grid, Testimonial Card, Review Badge, Star Rating, Scatter, Slot and Sink during the grilling session; Logo was widened to cover a Testimonial's Logo.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Home page shows the agency's work and names its clients but never lets a client speak. The design follows the Stacking Cards with "Don't just take our word for it": a Google rating line, a large heading, six client quotes scattered in coloured panels that scroll over the heading as it fades away, and two calls to action beneath. The Testimonial section exists in the control panel with a name, job role, avatar, logo and text, but no Testimonial entries exist, nothing can pick Testimonials, and nothing on the site draws a star rating.

## Solution

A Testimonial Grid Block editors can add to any page. Its Section Header holds a Google Reviews switch that reveals a Star Rating and a short review text, and a heading with the Highlight. Its Section Content holds one or more Testimonials picked from the Testimonial section. Its Section Footer holds a Button Group of up to two buttons. The Review Badge and heading sit centred inside the site margins; beneath them the Testimonial Cards take their Slots in the Scatter from the `lg` breakpoint, two columns from `md`, and one column below. Each card is coloured by its Slot at every width and shows the Testimonial's Avatar Group top left, its Logo top right and its quote beneath. From `lg` the heading and Review Badge Sink beneath the cards; below `lg` they are in flow. The Button Group sits centred beneath the cards. The Home page gets one instance with the Figma content and six Testimonials with their Figma avatars and logos, all added through the Seed command.

## User Stories

1. As a visitor, I want a large centred heading with a Google rating line above it, so that I see at a glance how clients rate the agency.
2. As a visitor, I want the rating drawn as stars beside the Google mark, so that the score reads without a number.
3. As a visitor, I want the review count to link to the reviews, so that I can read them myself.
4. As a visitor, I want the client quotes in coloured panels scattered across the page, so that the section reads as a wall of voices rather than a list.
5. As a visitor, I want each quote to name the person, their role and their company's logo, so that I know who is speaking.
6. As a visitor, I want the heading to stay put while the quotes scroll over it, so that the section feels layered as I read down.
7. As a visitor, I want the heading to fade away as I reach the end of the quotes, so that it never sits awkwardly behind the last cards.
8. As a visitor, I want two calls to action beneath the quotes, so that I can go to the About Us or Contact Us page from there.
9. As a visitor with a tablet, I want the quotes in two even columns beneath the heading, so that nothing overlaps at that width.
10. As a visitor with a phone, I want the heading above a single column of full-width quotes, so that every quote is readable.
11. As a visitor who prefers reduced motion, I want the section to behave the same, so that a sticky heading and a fade, which are not motion, still work.
12. As a screen reader user, I want the rating read as a score out of five and the stars and the Google mark skipped, so that decoration adds nothing to the reading.
13. As a screen reader user, I want each card read as the person, their role, their company and the quote, so that the card is a testimonial and not a list of images.
14. As an editor, I want a Testimonial Grid Block in the Blocks menu, so that I can add it to any page.
15. As an editor, I want a Google Reviews switch that reveals the rating and text fields only when on, so that a page without a rating has nothing to leave blank.
16. As an editor, I want to pick the Star Rating from half steps between 0.5 and 5, so that the stars always match the score.
17. As an editor, I want the review text as simple rich text, so that I can bold the score and link the count.
18. As an editor, I want the heading to take the Highlight, so that I can pick out words in the accent colour.
19. As an editor, I want to pick Testimonials from the Testimonial section and order them, so that the cards show the quotes I chose in the order I chose.
20. As an editor, I want the Block to refuse an empty Testimonials field, so that I cannot publish an empty grid.
21. As an editor, I want the card colours and positions chosen for me by position, so that the grid always looks like the design without a colour field to manage.
22. As an editor, I want up to two buttons in the Section Footer, so that the calls to action read like the Error Links.
23. As an editor, I want the Block's fields in the Section Header, Section Content and Section Footer slots, so that it reads like every other Block.
24. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
25. As an editor, I want a Testimonial that is missing its avatar or logo to still render, so that a half-filled entry never breaks the grid.
26. As an editor, I want the Home page to already carry this Block with the designed content and Testimonials, so that I see how it is meant to look.
27. As a developer, I want the Block to reuse the Lightswitch, Rich Text Simple, Heading, Button Group and Padding fields, so that only the two fields with no match are created.
28. As a developer, I want the star colour, the rich text sizes and the Google mark to land in the theme and components, so that any later caller inherits them.
29. As a developer, I want the Sink built with no JavaScript, so that the Block has nothing to initialise, refresh or clean up.
30. As a developer, I want the sticky offset to read the header height from the shared map, so that a header change is one edit.
31. As a developer, I want the Home page content and the Testimonials added by a Seed rather than by hand, so that the review environment is reproducible.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `elementsTestimonial`, name "Elements - Testimonial", colour blue, icon `quotes`, added to the Blocks field in the General group. Its Content tab follows the three-slot layout. Section Header: the Lightswitch - Off field as `googleReviews` labelled "Google Reviews"; the Dropdown - Star Rating field as `starRating` labelled "Star Rating"; the Rich Text - Simple field as `googleReviewText` labelled "Google Review Text"; then the Heading field. The Star Rating and Google Review Text elements carry a condition that shows them only while Google Reviews is on. Section Content: the Entries - Testimonial field with the instructions "One or more Testimonials. Each card takes its colour and position from its place in this order." Section Footer: the Button Group field. Its Settings tab has the Padding field.

**Fields.** Two new fields. Entries - Testimonial, handle `entriesTestimonial`, an Entries field limited to the Testimonial section, minimum one, no maximum, list view, selection label "Add a Testimonial", copying Entries - Client's settings otherwise. Dropdown - Star Rating, handle `dropdownStarRating`, a Dropdown whose ten options run 0.5, 1, 1.5 and so on to 5, each value the number as a string and each label the number followed by "Stars" (or "Star" for 1), so the labels match the values. No default option. The Testimonial entry type is not changed.

**Theme.** One new colour token, `yellow`, #FBBC05, the Google star colour. The shared class map in the global layout gains a `top` entry beside the header's `height` and `paddingTop`, the same two breakpoint values, so a sticky element can rest below the Header without restating the figures.

**Components.** The rich text component gains two sizes: `sm`, 15px at leading 1.33, and `xl`, 23px medium at leading 1.33 with tighter tracking, both from the theme's type ramp. It also gains a `black-links` colour scheme, identical to `black` except that links are black with a black underline, for the Review Badge. A new Google mark component, `logoGoogle`, renders a Google G SVG file kept in the repo beside the templates through Craft's `svg()` function, sized by a class param, hidden from assistive technology, with its four brand colours left intact; it is a fixed mark like the site logo, not an editor asset. The Button Group component is used as is.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding, and its content inside the section's content block. It has no Alpine data and no script. The Block renders only Testimonials that have a quote; a Block with none renders nothing at all, section included.

**Review Badge.** Rendered only when Google Reviews is on and a Star Rating is set; the switch on with no rating, or text with no rating, renders nothing. A centred row: the Google mark at 17px; 6px; the stars; then, only when there is review text, 15px, a 1px creme-300 line 20px tall, 15px, and the text through the rich text component at the `sm` size in the `black-links` scheme. The stars are Font Awesome Sharp Solid `star` icons at 11px in the `yellow` colour, 3px apart, one per whole number in the rating, followed by one `star-half-stroke` when the rating has a half; no empty stars are drawn, so 3.5 shows three full and one half. The icons are hidden from assistive technology and a visually hidden span reads "Rated 4.5 out of 5 stars" with the chosen value. The Review Badge sits 30px above the heading.

**Heading.** The heading alternate component as an `h2`, centred, semibold, leading 0.97, tighter tracking, capped at 1007px wide, at 4xl, 6xl from `md` and 8xl from `lg`, the same scale as the Client Marquee's heading, with the Highlight in the primary colour. The cards start 40px beneath it below `lg` and 100px beneath it from `lg`.

**Scatter.** From `lg` the cards sit in a twelve-column grid with the site's 20px gap, placed dense so each card takes the first row in which its columns are free. Each card is four columns wide and takes the next Slot in turn, repeating past six. The Slots, in order, with the column the card starts in and its drop below the row's top: one, fluro, column 1, no drop; two, secondary, column 6, no drop; three, black, column 9, 50px; four, creme-200, column 3, 130px; five, fluro, column 7, 20px; six, white, column 2, 120px. Dense placement gives Figma's three rows of two for six cards and continues correctly past six: the seventh card returns to column 1 in the next free row. Cards align to the start of their row and are never stretched to match a neighbour, so the drops stay exact and each card is its own height.

**Layout below `lg`.** The Review Badge and heading centred in flow, then the cards 40px beneath: one column below `md`, two equal columns from `md`, 20px apart, in the Testimonials' order, each card still coloured by its Slot with no column or drop. The Button Group 40px beneath the cards at every width.

**Testimonial Card.** A panel with a 20px radius in its Slot's colour, padded 30px below `lg` and 40px from `lg`, content-driven in height. Its top row is the Avatar Group on the left, through the user component at the base size with the Testimonial's avatar, name and job role, and the Logo on the right, through the picture component rendered inline so it takes the card's text colour, capped at 34px tall and 100px wide. The quote sits 58px beneath the row, through the rich text component at the `xl` size, so a Figma-length quote starts 150px from the card's top as designed. The light Slots use the black text scheme for the quote and the base scheme for the Avatar Group; the black Slot uses the white scheme for the quote and the creme-100 scheme for the Avatar Group, so the name is creme-100, the role white at 63% and the Logo white. The card is a panel, not a link.

**Sink.** From `lg` the Section Header is sticky, resting at the header's top offset from the shared map, inside a relative wrapper that spans the Section Header and the cards. A gradient layer fills the wrapper, from creme-100 at the bottom to transparent at the top, painted above the Section Header and below the cards, and ignores the pointer. The cards paint above both, so as the visitor scrolls the heading holds still under the cards and dims out towards the bottom of the wrapper. The Button Group sits in flow beneath the wrapper, outside the gradient. Below `lg` there is no sticky positioning and no gradient. Reduced motion changes nothing: nothing here moves on its own.

**Empty states.** A Testimonial without a quote is skipped. A Testimonial without an avatar shows the avatar component's initials disc. A Testimonial without a Logo drops the Logo and keeps the row. A Testimonial without a name and avatar drops the Avatar Group and keeps the Logo on the right. A Button Group with no buttons drops the Section Footer. A Block with the switch off renders the heading alone in the Section Header.

**Home page content.** One Testimonial Grid Block after the Stacking Cards in the Home page's Blocks, padding Top and Bottom. Google Reviews on, Star Rating 5, review text "**4.9** from [130 reviews]" with the link to `https://www.google.com/search?q=Marketing+Signals+reviews` opening in a new tab. Heading "Don't just take <em>our word for it</em>", which wraps to Figma's two lines inside the 1007px cap. Six Testimonials in this order, each a Testimonial entry created by its own Seed with the Figma avatar and logo: Jamie Evans, Head of eCommerce, Ray-Ban, with the "Marketing Signals is our kind of agency" quote; Melissa Ashurst, Co Founder & CEO, Better Bathrooms, with the "really get link building" quote; Sandra Carosi, Head of Marketing, Missguided, with the "long-term client" quote; Sandra Carosi, Head of Marketing, Tree Center, with the same quote; a second Jamie Evans entry, titled "Jamie Evans – Ray-Ban (2)", repeating the first, because Figma shows the card twice and an Entries field cannot pick one entry twice; and Richard Handley, Co Founder & CEO, Ray-Ban, with the first quote. Titles are the person and company, such as "Jamie Evans – Ray-Ban". The quotes keep Figma's curly quote marks. Logos already in the volume from the Client Marquee Seed are reused by filename; the Missguided logo and the five avatars are new uploads. Buttons: "More About Us" linking to the About Us page and "Let's Work Together" linking to the Contact Us page. A second Seed on the About Us page carries the same six Testimonials with Google Reviews on, Star Rating 3.5 and no review text, so the half star and the missing divider can be seen. Both Seeds live under the scratch folder and are not committed.

**Docs.** `CONTEXT.md` gained the Testimonial Grid vocabulary during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Home page through the global layout, with the Block seeded beneath the Stacking Cards. The rich text sizes and scheme, the Google mark component and the header offset are proven through it and through the existing styleguide previews, which gain nothing here. The About Us Seed is a second page through the same seam, not a second seam.

**What good evidence looks like.** It shows what a visitor would see: the Review Badge and heading over the first row of cards, the heading half-hidden behind cards mid-scroll, the heading gone and the buttons in flow at the bottom, the two-column and one-column layouts, and the half star. Fixed widths, one state per file, after-only because the Block did not exist before. Numeric checks such as drops and padding are reported as a table in the PR body, not captured as dumps.

**Evidence plan.**

1. Home page at 1600, viewport, scrolled so the Block's top is just below the Header: the Review Badge with the Google mark, five yellow stars, the divider and "4.9 from 130 reviews", the heading on two lines with the Highlight, and the fluro and secondary cards in columns 1 and 6. Compared against the Figma node. Proves the Section Header and the first two Slots.
2. Home page at 1600, full page cropped to the Block: all six cards in their Slots with their colours, drops and columns, and the Button Group centred 40px beneath. Proves the Scatter.
3. Home page at 1600, viewport, scrolled 500px past the Block's top: the heading held below the Header, partly covered by the cards, dimmer than at rest. Proves the Sink holds and fades.
4. Home page at 1600, viewport, scrolled so the last card's bottom is on screen: the heading gone behind the gradient, the Button Group in flow. Proves the Sink ends and the buttons sit outside it.
5. Home page at 1024, viewport at the Block's top: the Scatter at the smallest width it exists. Proves the `lg` step.
6. Home page at 768, full page cropped to the Block: heading in flow, cards in two columns coloured by Slot, no drops. Proves the `md` step and that the Sink is off.
7. Home page at 390, full page cropped to the Block: one column, 30px card padding, the Button Group wrapping beneath. Proves the mobile layout.
8. Home page at 1600 with `prefers-reduced-motion: reduce` emulated, viewport at the Block's top: identical to line 1. Proves reduced motion changes nothing.
9. About Us page at 1600, viewport at the Block's top: three full stars and one half star, no divider, no text. Proves the half star and the text-less Review Badge.
10. Home page at 1600, the Review Badge link hovered: the underline in black. Proves the `black-links` scheme.
11. Seed command output for the six Testimonial Seeds, the Home Seed and the About Us Seed, each run twice: created on the first run, skipped on the second, logos reused by filename. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- An editor-chosen card colour or position. The Slot decides both; a colour field is a later addition if the design ever asks for one.
- A Sink below `lg`. In flow is the tablet and mobile design.
- A Star Rating on individual Testimonials. The Figma cards show none.
- Falling back to the latest Testimonials when the field is empty, as the reference site does. The field requires one.
- Testimonial pages or URLs. The section has none.
- Equalising card heights within a row.
- A seventh card in the evidence. Dense placement past six is reasoned in the spec, not captured.
- A styleguide preview for the Block. Blocks are not previewed there.
- Committing the Seeds or their images.

## Further Notes

- Figma's 1520px frame is twelve columns of 108.33px with 20px gaps inside the 40px site margins, so a 493px card is exactly four columns and the Slot columns are read straight from each card's left edge.
- The drops are the card's Figma top minus the row's top, rounded to the nearest 10px: 49 to 50, 130, 18 to 20, 118 to 120.
- Figma's cards are fixed at 422px with the quote bottom-aligned; content-driven height with a 58px gap gives the same 150px quote offset for the designed quotes and grows gracefully for longer ones.
- Figma's avatar is 52px; the user component's base size is 56px and is accepted as within tolerance, as the Stacking Cards spec accepted 60px for a 63px gap.
- On the black card Figma's role colour is creme-500; the user component's creme-100 scheme gives white at 63%, accepted as visually equivalent.
- Figma names the first button "Primary" but colours it #AFAFFF, which is the theme's secondary; the second is the creme-300 outline.
- A stray "Melissa Ashurst" text layer sits loose in the Figma group beside the secondary card and is ignored.
- The heading alternate component reads the Highlight from italic or underline in the CKEditor value, so the Seed's heading carries `<em>` for the Highlight.
- The Figma avatars, logos and Google mark were downloaded to the scratch folder during the grilling session because the asset URLs expire; the Seeds and the Google mark file are built from those copies.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
