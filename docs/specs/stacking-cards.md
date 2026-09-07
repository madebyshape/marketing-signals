# Stacking Cards

Spec for the Stacking Cards Block: a heading with the Highlight and a short text beside a pile of Stacking Cards, with a button and an Avatar Group beneath the pile. As the visitor scrolls, the Block Stacks: it holds still while each Stacking Card slides up and away to reveal the one beneath. Each card is a coloured, slightly tilted panel with its Card Images on the left and a heading, text and button on the right; a card with more than one image cross-fades between them through the Image Cycle. It is the second Block built on GSAP ScrollTrigger, the first caller of the Avatar Group outside the Footer CTA, and the sixth Block on the Home page.

Design: Figma node `9836-18395` in the Marketing Signals file, 1600 wide. No mobile node exists, and the node shows the pile at rest only; the responsive rules, the exit motion and the Image Cycle timings below are decisions, not measurements. The sketch repo's `stackingCards` Block and module (branch `sketch-a4`) are the reference for the Stack mechanic.

Branch: feature/stacking-cards

Related: the Service Carousel spec, which this Block follows on the Home page and whose pinning pattern it reuses; the Content Seeding spec, which puts it there; the Global Footer spec, whose Footer CTA is the prior art for the button and Avatar Group row. ADR-0001 applies in the negative: the Block is in flow beneath the Service Carousel, and while it Stacks it runs beneath the fixed header rather than padding for it. ADR-0002 applies: the Home page content arrives by Seed. No new ADR: pinning with ScrollTrigger was settled by the Service Carousel, and nothing else here is hard to reverse. Vocabulary: `CONTEXT.md`, "Stacking Cards" section, which gained Stacking Cards, Stacking Card, Card Images, Card Scheme, Stack and Image Cycle during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Home page ends its story at the Service Carousel. The design follows it with "Industries we Specialise in": four industry panels the visitor reads one at a time as they scroll, each with its own photograph, summary and link, closed by a call to action with a named person beside it. Editors have no Block to build it with, and nothing in the site stacks cards or cycles images.

## Solution

A Stacking Cards Block editors can add to any page. It holds a heading with the Highlight, a text, two or more Stacking Cards, a button and an Avatar Group. Each Stacking Card has one or more Card Images, a heading, a text and a button. From the `lg` breakpoint the heading and text sit in the left third and the cards pile in the right two thirds, the button and Avatar Group centred beneath the pile; the whole row holds still while each card slides up and off in turn, scrubbed to the scroll, until the last card is showing. Below `lg`, and for any visitor who prefers reduced motion, the heading and text stack above a plain column of cards and the button and Avatar Group sit beneath. Every card takes its Card Scheme from its position: white, black, secondary and fluro in turn, each at its own tilt, repeating past four. A card with several Card Images cross-fades to the next every three seconds while it is on screen. The Home page gets one instance with the Figma content, added through the Seed command.

## User Stories

1. As a visitor, I want a heading and short text beside a pile of industry cards, so that I can see what the agency specialises in at a glance.
2. As a visitor, I want the pile to hold still while I scroll and each card to slide away to reveal the next, so that I read the industries one at a time.
3. As a visitor, I want the cards to follow my scroll in both directions, so that scrolling back brings the card I passed back into view.
4. As a visitor, I want the last card to stay on screen for a beat before the page moves on, so that the sequence has a clear end.
5. As a visitor, I want each card in a different colour and at a slight tilt, so that the pile reads as a fan of cards rather than one panel.
6. As a visitor, I want the cards beneath the top one to peek out around its edges, so that I can tell there is more to come.
7. As a visitor, I want a card's photograph beside its heading, text and button, so that each industry has a face.
8. As a visitor, I want a card with several photographs to cross-fade between them, so that the card feels alive while I read it.
9. As a visitor, I want the cross-fade to pause while the card is off screen, so that the page does no work for something I cannot see.
10. As a visitor, I want a button on each card that takes me to that industry, so that I can go deeper on the one I care about.
11. As a visitor, I want a call to action and a named person beneath the pile, so that I know who I would be talking to.
12. As a visitor with a phone, I want the heading and text above a column of full-width cards, each with its photograph above its text, and the call to action beneath, so that nothing pins or overlaps on a small screen.
13. As a visitor who prefers reduced motion, I want the plain column at every width and a single still photograph per card, so that nothing moves without my say.
14. As a visitor using a keyboard, I want tabbing to a card's button to bring that card back on screen, so that I am never focused on something I cannot see.
15. As a screen reader user, I want each card read as its heading, text and button, so that decorative photographs and the cross-fade add nothing to the reading.
16. As a visitor on a short laptop screen, I want an over-tall pile to start from its top rather than lose its heading above the screen, so that every card can be read.
17. As an editor, I want a Stacking Cards Block in the Blocks menu, so that I can add it to any page.
18. As an editor, I want the Block's heading to take the Highlight, so that I can pick out words in the accent colour.
19. As an editor, I want the Block's text as simple rich text, so that I can add a paragraph with bold, italic and a link.
20. As an editor, I want to add Stacking Cards as cards inside the Block, so that each one is an obvious unit I can reorder.
21. As an editor, I want each Stacking Card to show its heading on its face, so that I can tell the cards apart without opening them.
22. As an editor, I want to add several images to a Stacking Card, so that the card can cycle through them.
23. As an editor, I want a Stacking Card's heading to take the Highlight too, so that a card can pick out a word the same way.
24. As an editor, I want each Stacking Card to carry its own button, so that each industry links to its own page.
25. As an editor, I want the Block to refuse fewer than two Stacking Cards, so that I cannot build a pile with nothing beneath the top card.
26. As an editor, I want the card colours and tilts chosen for me by position, so that the pile always looks like the design without a colour field to manage.
27. As an editor, I want a Block button and an Avatar Group in the Section Footer, so that the call to action reads like the Footer CTA's.
28. As an editor, I want the Block's fields in the Section Header, Section Content and Section Footer slots, so that it reads like every other Block.
29. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
30. As an editor, I want the Home page to already carry this Block with the designed content, so that I see how it is meant to look.
31. As a developer, I want the Block to reuse the Heading, Rich Text Simple, Images, Button and Avatar Group fields, so that no new field is created.
32. As a developer, I want the Stack built the way the Service Carousel Pins, so that the site has one pinning pattern.
33. As a developer, I want the pacing held in one constant, so that the sequence can be slowed or quickened without restructuring.
34. As a developer, I want the button and heading alternate components to gain the outline and colour options the cards need, so that any later caller inherits them.
35. As a developer, I want the user component's light scheme retinted to the brand, so that an Avatar Group on creme matches the design without a third scheme.
36. As a developer, I want the Home page content added by a Seed rather than by hand, so that the review environment is reproducible.

## Implementation Decisions

**Entry types.** A new Block entry type, handle `stackingCards`, name "Stacking Cards", colour blue, icon `layer-group`, added to the Blocks field in the General group. Its Content tab follows the three-slot layout: a Section Header heading element with the Heading field and the Rich Text Simple field labelled "Text" with handle `text`; a Section Content heading element with the Stacking Cards Matrix; a Section Footer heading element with the Button field and the Avatar Group field. Its Settings tab has the Padding field. An inner entry type, handle `stackingCard`, name "Stacking Card", colour purple, icon `rectangle-list`, with no title field, holds the Images field, the Heading field, the Rich Text Simple field labelled "Text" with handle `text`, and the Button field. Its card label shows the heading with tags stripped.

**Fields.** One new field, the Stacking Cards Matrix, handle `stackingCards`, holding the Stacking Card entry type only, minimum two entries, no maximum, card view, create button "New Stacking Card". Its instructions: "Two or more cards that stack as the visitor scrolls. Each card is coloured and tilted by its position: white, black, secondary, fluro, then round again." No other new fields. The Images field on a Stacking Card is the existing Images field with no limit; a card with one image simply has no Image Cycle.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding, and its content inside the section's content block. The Alpine data is named for the Block's handle, so two Stacking Cards Blocks on one page each keep their own state and refs, as the Service Carousel does. The Block renders only cards that have a heading. A Block with fewer than two renderable cards renders the column layout and no Stack; a Block with none renders nothing at all, section included.

**Layout at `lg` and above.** A twelve-column grid with the site's gap. The Section Header takes columns one to four: the Block heading through the heading alternate component as an `h2` at 7xl, semibold, leading 0.97, tighter tracking, with the Highlight in the primary colour; the text through the rich text component in the black scheme at base size, capped at 365px wide, 30px beneath the heading. The pile takes columns five to twelve. The Section Footer sits beneath the pile in the same columns, its content centred: the Block button in the secondary colour and the Avatar Group through the user component at the small size, 20px apart, 60px below the pile. The Section Header, pile and Section Footer together are the frame that holds still.

**Layout below `lg`.** One column: heading at 5xl, text 30px beneath it, then the cards 40px beneath the text as a plain column 20px apart, each full width with no tilt, then the button and Avatar Group 40px beneath the column, left-aligned and wrapping with 20px between them.

**Stacking Card.** A panel with a 20px radius in its Card Scheme's background colour. From `lg` it is a row: the image slot is 36% of the card's width, inset 5px on every side, with a 15px radius; the content column carries 100px of padding on every side and its heading, text and button are vertically centred, the text 25px beneath the heading and the button 30px beneath the text. Height is content-driven; the pile's cell sizes to the tallest card and every card fills the cell so the sheets share one height, as the sketch's do. Below `lg` the card is a column: the image slot at 4x3 above the content, the same 5px inset and 15px radius, the content padded 30px. The card heading is the heading alternate component as an `h3`, 5xl from `lg` and 4xl below, semibold, leading 0.97, tighter tracking. The text is the rich text component at base size. The button is the button component with the card's link. The card is a panel, not a link: the button is the only link in it.

**Card Scheme.** Resolved in the template from the card's position in the rendered order, cycling through four: position one white background, black heading, black text scheme, creme-300 outline button, tilt +2°; position two black background, fluro heading, white text scheme, white-30 outline button, tilt -1°; position three secondary background, black heading, black text scheme, black outline button, no tilt; position four fluro background, black heading, black text scheme, black outline button, tilt -2°. Position five is position one again. The tilt is a rotate transform applied only from `lg`; below `lg` every card is square to the page.

**Component changes.** The button component gains two outline colours: `black-outline`, a black border and black label that fills black with a creme-100 label on a fine-pointer hover, and `white-30-outline`, a white-at-30% border with a creme-100 label that fills creme-100 with a black label on hover; their circle variants follow the existing outline pattern. The heading alternate component gains a `fluro` colour. The user component's light scheme is retinted: the name in the site's black, the job role in black at 63%, the fallback disc in creme-200 with a black initial; the avatar component's light scheme changes to match. The styleguide previews pick these up as they are.

**Stack.** One Alpine component on the frame, built the way the Service Carousel Pins. Inside `gsap.matchMedia`, in a single context for `(min-width: 1024px) and (prefers-reduced-motion: no-preference)`, the Block sets a stacked state that Alpine writes as classes: the pile becomes a single grid cell every card occupies, cards take a z-index so the first is on top, and the frame is pinned by a ScrollTrigger on itself. A scrubbed timeline gives every card but the last one tween that moves it straight up by half the viewport plus half its own tilted height plus 24px of clearance, one unit long, each starting where the previous finished, so a card is gone before the next moves. The trigger's end is the number of moving cards times the pace times the viewport height, and the pin's spacing extends one more card's worth so the last card is held for a beat before the Block releases. The pace is one constant, 0.85 viewports per card. Travel and end are functions and the trigger invalidates on refresh, so a resize re-measures rather than reusing figures from load. The context's cleanup removes the stacked state and clears the transforms, so crossing the breakpoint or changing the motion preference puts the column back. When the pile is taller than the viewport the frame aligns it to the top with auto margins rather than centring it, so an over-tall pile is read from its heading down. A Block with one renderable card never enters the context.

**Keyboard focus.** Each card button's focus handler hands the Block the card's index. While the Stack exists the Block scrolls the page through Lenis to the trigger's start plus the index times one card's worth of scroll, so the focused card is the one showing; without the Stack the browser's own scroll-into-view is enough. The frame's horizontal scroll offset is reset after focus for the same reason the Service Carousel resets it.

**Image Cycle.** Every Card Image is rendered through the picture component with an empty alt, absolutely positioned to fill the image slot, the first opaque and the rest transparent. A card with more than one image builds one repeating GSAP timeline that, every three seconds, fades the current image out and the next in over 0.8 seconds, wrapping from the last to the first. The timeline is paused on creation and a ScrollTrigger on the card plays it when the card enters the viewport and pauses it when it leaves, so a card off screen or beneath the pile does no work. The timelines live inside the same `gsap.matchMedia` as the Stack but in their own context for `(prefers-reduced-motion: no-preference)` alone, so at every width a visitor who prefers reduced motion sees the first image only, and at every width a visitor who does not sees the cycle. The picture component's transform is the closest ratio to 360 by 437 for the row layout and 4x3 for the column, chosen so a cropped image fills the slot without letterboxing.

**Empty states.** A card without a heading is skipped. A card with no Card Images renders its image slot in the card's own background colour, so the content keeps its place. A Block button with no link, or an Avatar Group with no name, drops that item; both missing drops the Section Footer row. A Block text that is empty drops the text and the cards move up.

**Home page content.** One Stacking Cards Block after the Service Carousel in the Home page's Blocks, padding Top and Bottom. Heading "Industries we <em>Specialise in</em>"; text "As a full-service digital marketing agency, we work with ambitious brands across a wide range of industries and professional services."; button "Let's Work Together" linking to the Contact page; Avatar Group Gareth Hoyle, Managing Director, with the Figma avatar. Four cards in this order: "SaaS & Technology" with the Figma text and a button "Explore SaaS & Technology"; "Finance & Comparison" with its text and button; "eCommerce & Retail" with its text and button; and a fourth, "Professional Services", with a short text and button, because the Figma pile shows four sheets but names three. Each card gets two images so the Image Cycle is visible: the three Figma photographs, already downloaded into the Seed folder, are reused across cards. The card buttons link to the Service listing page until industry pages exist. Added with the Seed command from a Seed file under the scratch folder; the Seed is not committed.

**Docs.** `CONTEXT.md` gained the Stacking Cards vocabulary during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Home page through the global layout, with the Block seeded beneath the Service Carousel. The button, heading alternate, user and avatar component changes are proven through it and through the existing styleguide previews, which gain nothing here.

**What good evidence looks like.** It shows what a visitor would see: the pile at rest with the first card on top and the others peeking beneath, a card half gone mid-scroll, the last card held, the plain column on a phone and under reduced motion, and a cross-fade caught mid-way. Fixed widths, one state per file, after-only because the Block did not exist before. Numeric checks such as tilt angles and padding are reported as a table in the PR body, not captured as dumps.

**Evidence plan.**

1. Home page at 1600, viewport, scrolled so the Block's trigger has just started: heading and text in the left third, the pile in the right two thirds with the white card on top and the black, secondary and fluro edges peeking beneath at their tilts, the button and Avatar Group centred beneath. Compared against the Figma node. Proves the resting layout and the Card Schemes.
2. Home page at 1600, viewport, scrolled 0.4 viewports past the trigger's start: the white card part-way off the top, the black card fully visible beneath, the heading, text and Section Footer unmoved. Proves the Stack and the pin.
3. Home page at 1600, viewport, scrolled past the last card's arrival: the fluro card alone on top, the frame still pinned. Proves the last card holds.
4. Home page at 1600, viewport, scrolled past the Block's end: the Footer following in flow. Proves the release.
5. Home page at 1024, viewport, at the trigger's start: the two-column layout and the pile at the smallest width they exist. Proves the `lg` step.
6. Home page at 390, full page: heading and text above a column of cards, each with its image above its content and no tilt, then the button and Avatar Group beneath. Proves the mobile layout.
7. Home page at 1600 with `prefers-reduced-motion: reduce` emulated, full page: the column layout at desktop width, no pin, every card showing its first image. Proves the reduced-motion fallback.
8. Home page at 1600, viewport on the top card, two captures 3.4 seconds apart: the first image, then the second image part-way faded in. Proves the Image Cycle.
9. Home page at 1600, after tabbing to the third card's button from the page top: the page scrolled so the secondary card is showing and its button focused. Proves the keyboard reveal.
10. Seed command output for the Home Seed, run twice: created on the first run, skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- An editor-chosen Card Scheme. Position decides it; a colour field is a later addition if the design ever asks for one.
- A Stack below `lg`. The column is the mobile design.
- Making the whole card a link with a Cursor Label, as the Service Slide does. The card's button is its link.
- Fading or scaling the departing card. It slides straight up, as the sketch's does.
- Industry entries or a section for them. The card buttons link wherever the editor points them.
- A styleguide preview for the Block. Blocks are not previewed there.
- Committing the Seed or its images.

## Further Notes

- Figma's card heights are 418, 442 and 447px with content-driven differences; here every card fills the pile's cell, so the pile's height is the tallest card's.
- Figma places the Section Footer 63px beneath the pile's rotated bounding box; 60px is the nearest spacing token and the tilt makes the exact figure unmeasurable in the browser.
- The Figma image slot is 360 by 437 inside a 1007px card, which is 35.7%; 36% keeps the content column at the design's 441px within a pixel.
- The heading alternate component reads the Highlight from italic or underline in the CKEditor value, so the Seed's headings carry `<em>` for the Highlight.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
- The sketch gates its pile at 1240px; this Block gates at `lg` so the pile and the two-column layout switch together, which is the decision from the grilling session.
