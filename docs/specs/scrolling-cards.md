# Scrolling Cards

Spec for the Scrolling Cards Block: an Eyebrow with a Rule over a row of Scrolling Cards that Pins to the screen from the desktop breakpoint and moves sideways as the visitor scrolls, the active card centred with its neighbours peeking at both sides, and a button with an Avatar Group centred beneath the row. Each Scrolling Card is an editor's image filling the left of the card beside a heading and text, coloured and tilted by its Card Scheme: white, black and secondary in turn. It is the second Block built on the Service Carousel's Pin, the first to Pin from `lg` only and centre its active card, the second nested Matrix of tilted cards after Stacking Cards, and the first Block reviewed on the About Us page.

Design: Figma node `9927-15497` in the Marketing Signals file, 1600 wide: a group over the About page frame holding the Eyebrow "Our Approach" over a creme-300 Rule across the content width, three tilted 831 by 354 cards with 20px corners drawn mid-scroll with the black card centred, and a centred row of the "Button / Pill / Text + Icon / Regular / Primary" component and one Avatar Group. No rest state, no tablet frame and no mobile frame exist, so the start and end positions, the size ramp, the column below the desktop breakpoint and the reduced-motion layout below are decisions, not measurements.

Branch: feature/scrolling-cards

Related: the Carousel - Service spec, whose Pin this Block copies with two changes recorded below; the Stacking Cards spec, whose nested Matrix of tilted cards, `cycle()` Card Scheme and `lg`-gated pin are the shape of this Block's fields and template; the Icon Grid spec, whose Section Footer of a Button and an Avatar Group this Block repeats; the Hero Full Screen spec, whose Seed gives the About Us page its top; the Content Seeding spec, whose Matrix and Content Block seeding put the cards and the Avatar Group on the page. ADR-0001 applies through the Hero above the Block, not the Block itself. ADR-0002 applies: all content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Scrolling Cards" section, which gained Scrolling Cards and Scrolling Card during the grilling session; Pin was widened to cover this Block and Card Scheme gained its sequence.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The About Us page needs to say how the agency works: three or more principles, each with a photograph of the team, a short heading and a sentence or two, ending with an invitation to work together from a named person. The design draws them as a row of large tilted cards that the visitor scrolls through sideways without leaving the page's own scroll, one card centred at a time with the next and the last peeking at the edges. The Service Carousel Pins a row of Slides this way, but its Slides are Services picked from a section, full width, linked and counted. Stacking Cards holds editor-written cards with a colour and tilt from their position, but piles them rather than rowing them. No Block rows editor-written cards sideways, and the About Us page has no Blocks at all.

## Solution

A Scrolling Cards Block editors can add to any page. Its Section Header holds an Eyebrow. Its Section Content holds two or more Scrolling Cards in a new Matrix, each an Image, a Heading and a Text. Its Section Footer holds a Button and an Avatar Group. From `lg` and under no reduced-motion preference the whole Block Pins: the Eyebrow and its creme-300 Rule inside the site margins, then the row of cards, then the centred footer row, held in the middle of the viewport while the visitor's scroll moves the row sideways one pixel per pixel, from the first card centred to the last card centred, resting wherever the scroll stops. Each card is 52% of the viewport wide with 20px between cards, at least 354px tall and taller when its text needs it, with its image inset 7px filling the left third at the card's full height and a heading at 46px over 16px text vertically centred in the rest. Its Card Scheme gives it white at minus 2 degrees, black at plus 2 or secondary at minus 3 by its position, round again from the fourth. Below `lg`, and at every width under reduced motion, the cards are a plain column inside the site margins, untilted and 20px apart, each image at 4:3 above its heading and text, with the footer row centred beneath. Nothing in a card is a link, and there are no progress bars, no Cursor Label and no controls. The About Us page gets a Hero Full Screen from its existing Seed and one Scrolling Cards Block with five cards, so the review starts from a full page and sees the Card Scheme repeat.

## User Stories

1. As a visitor, I want the agency's approach shown as a few large cards with a photograph of the team on each, so that the principles feel like people rather than a list.
2. As a visitor, I want the cards to move sideways as I scroll down, so that I read them one at a time without a new gesture to learn.
3. As a visitor, I want the card I am reading centred with the next one peeking at the edge, so that I know there is more and where it comes from.
4. As a visitor, I want the row to follow my scroll in both directions and rest wherever I stop, so that it never fights my wheel.
5. As a visitor, I want the label above and the button beneath to stay put while the cards move, so that the section reads as one thing.
6. As a visitor, I want each card in its own colour with a slight tilt, so that the row has rhythm instead of three identical boxes.
7. As a visitor, I want the text on a black card white and on a light card black, so that every card is readable.
8. As a visitor, I want a card with a long paragraph to grow rather than cut its text, so that I never lose a sentence.
9. As a visitor, I want the last card to end centred, so that the section finishes as neatly as it started.
10. As a visitor, I want the page to carry on scrolling normally after the last card, so that the row never traps me.
11. As a visitor, I want a button and a named person beneath the cards, so that I know who to talk to next.
12. As a visitor with a phone, I want the cards stacked in one column with the photograph above the words, so that everything fits the width.
13. As a visitor with a phone, I want the button and the person stacked beneath the cards, so that they fit too.
14. As a visitor with a tablet, I want the heading a step larger than on a phone, so that it uses the width it has.
15. As a visitor who prefers reduced motion, I want the cards as a plain column at every width, so that nothing on the page moves that I did not move.
16. As a visitor whose script has not run, I want the cards readable as a column, so that the section says something however the page loads.
17. As a keyboard user, I want a link inside a card to bring that card into view when I tab to it, so that I am never focused on something off screen.
18. As a screen reader user, I want the cards read as a list with a heading and text each, so that they make sense without the pictures.
19. As a screen reader user, I want the pictures marked decorative, so that a filename is not read to me.
20. As an editor, I want a "Scrolling Cards" Block in the Blocks menu, so that I can add it to any page.
21. As an editor, I want to type the Eyebrow, so that the row can say something other than "Our Approach" on another page.
22. As an editor, I want to add cards with an image, a heading and a short text each, so that I write the principles myself.
23. As an editor, I want to reorder cards by dragging, so that the sequence is mine.
24. As an editor, I want the card colours to come from their order, so that I never pick a colour and the row is always balanced.
25. As an editor, I want the Block to insist on at least two cards, so that I cannot publish a row that cannot scroll.
26. As an editor, I want a card with no heading and no text left out, so that an unfinished card never leaves a blank tile.
27. As an editor, I want a Block with one usable card to render that card still and centred, so that the row never scrolls to nowhere.
28. As an editor, I want a Block with no usable cards to render nothing, so that an unfinished Block leaves no gap on the page.
29. As an editor, I want a Button and an Avatar Group beneath the cards, so that the section ends with a call to action from a named person.
30. As an editor, I want the footer row left out when I set neither, so that an empty row never leaves a gap.
31. As an editor, I want the Block's fields under Section Header, Section Content and Section Footer, so that it reads like every other Block.
32. As an editor, I want the Block's vertical padding to be the Padding field, so that it sits on a page like every other Block.
33. As an editor, I want a card's image cropped to the focal point I set, so that faces stay in frame at every width.
34. As a developer, I want the Block to reuse the Service Carousel's Pin unchanged in its mechanics, so that two sideways Blocks scroll one way.
35. As a developer, I want the Card Scheme to be one `cycle()` over a scheme map with the tilt inside it, so that the next tilted card Block copies one line.
36. As a developer, I want the Eyebrow, heading, rich text, picture, button and user components reused unchanged, so that the Block adds no component.
37. As a reviewer, I want the About Us page seeded with the Hero and five cards, so that the Card Scheme is seen repeating and the Pin has a full screen to scroll in from.
38. As a reviewer, I want the single-card state proven with a temporary Seed, so that the no-Pin rule is seen once.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `scrollingCards`, name "Scrolling Cards", no title field, added to the Blocks field. Its Content tab follows the three-slot layout: a Section Header heading element, then the Eyebrow field; a Section Content heading element, then the new Scrolling Cards Matrix with the instructions "Two or more cards the visitor scrolls through sideways. Each card is coloured and tilted by its position: white, black, secondary, then round again."; a Section Footer heading element, then the Button field and the Avatar Group field. Its Settings tab has the Padding field.

**Fields.** Two created. A Matrix field, name "Scrolling Cards", handle `scrollingCards`, cards view, minimum two, no maximum, create button "New Scrolling Card", holding one entry type. That entry type, handle `scrollingCard`, name "Scrolling Card", no title field, its label the heading stripped of tags, one Content tab of the Image field, the Heading field and the Rich Text - Simple field attached under the instance handle `text` with the label "Text", the same three-field shape as a Stacking Card with its Images swapped for one Image. Eyebrow, Image, Heading, Rich Text - Simple, Button, Avatar Group and Padding are reused unchanged.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding as vertical padding and no horizontal padding, since the row bleeds past the site margins. It reads the cards in order and keeps those whose heading or text has content once tags are stripped; those are the Scrolling Cards. It renders when at least one Scrolling Card exists, and nothing at all otherwise, section included. Its Alpine data is the Service Carousel's: a `pinned` flag, an `init` that returns before two cards, a `step`, a `travel` and a `focusCard`, with the progress bars and their fill removed.

**Frame and stage.** One frame with hidden overflow holding, in order, the Eyebrow inside the site margins, the stage, then the footer row inside the site margins. The Eyebrow is the eyebrow component in black with the Rule in creme-300, not rendered when empty. The stage holds the track, a `ul` of `li` cards. The footer row is rendered when the Button has a value or the Avatar Group has a name.

**Column layout.** The served layout, and the layout below `lg` and under reduced motion at every width: the track a column inside the site margins with a 20px gap; each card full width, untilted, 20px corners, its image at 4:3 above its heading and text with 7px inset and 15px corners, the text block padded 20px; 40px between the Rule and the first card and 40px between the last card and the footer row; the footer row a column below `md` and a centred row from `md`.

**Pin.** From `lg`, gated by one `gsap.matchMedia()` query combining the breakpoint and no reduced-motion preference as Stacking Cards does. When it matches the `pinned` flag flips the frame to viewport height with its content centred vertically, the track to a row with the site's 20px gap, and the stage's left padding to 24% of the viewport so the first card sits centred. On the next tick, inside the matchMedia context, one tween moves the track left by the travel with no ease, on a ScrollTrigger that pins the frame from its top, ends after the travel and scrubs one to one with refresh invalidation, so a pixel of scroll is a pixel of movement and the row rests wherever the scroll stops. The step is one card's width plus the gap; the travel is the step times the cards less one, which ends with the last card centred. The cleanup flips `pinned` back so the column returns when the query stops matching. Lenis owns the page's scroll as it does for the Service Carousel, so no scroller proxy is needed.

**Scrolling Card from `lg`.** Each card 52% of the viewport wide, a minimum 354px tall and taller with its text, 20px corners, hidden overflow, tilted by its Card Scheme. Inside, a row: the image cell 7px inset on every side and 15px corners, one third of the card's width, stretched to the card's height with the picture filling it and cropped to the focal point; then the text column, vertically centred, padded 50px on its inner side and 60px on its outer side, holding the heading with 10px to the text beneath. The node's 408px text column at 831px is that padding pair.

**Card Scheme.** A scheme map of three entries cycled by position with `cycle()`: white with black heading and text and a minus 2 degree tilt; black with white heading and text and a plus 2 degree tilt; secondary with black heading and text and a minus 3 degree tilt. The tilt classes apply from `lg` only, so the column is never tilted. Each scheme carries the card background, the heading colour, the rich text colour and the tilt, so one lookup styles a card.

**Heading and text.** The heading through the heading alternate component at `5xl` with a class override for the ramp: 30px below `md`, 40px from `md`, 46px from `lg`, semibold, leading 0.97 and the tighter tracking, which is the node's 46px tracked at minus 1.84px exactly. The text through the rich text component at its base size in the scheme's colour.

**Section Footer.** A row centred horizontally with a 20px gap: the button component with the Button field's value in the default secondary colour with its arrow, then the user component with the Avatar Group's image, name and job role at the `sm` size, whose 42px avatar is the node's exactly. Either half is left out when empty. From `lg` the row sits 45px below the cards; the Rule sits 77px above them.

**Keyboard.** Each `li` listens for focus inside it and calls `focusCard` with its index, which scrolls the window through Lenis to the trigger's start plus the index times the step and zeroes the frame's sideways scroll, as the Service Carousel does. With no links in a card nothing takes focus and nothing happens.

**Accessibility.** The cards are a `ul` of `li` with an `h3` heading each. Pictures carry an empty alt. No `aria-hidden` is needed because the Block has no decorative controls.

**Empty states.** A card with neither heading nor text is not a Scrolling Card. No Scrolling Cards: nothing renders. One Scrolling Card: the column at every width, no Pin, one centred card. No Eyebrow: the Eyebrow row is not rendered and the stage starts at the frame's top. No Button and no Avatar Group name: no footer row. No image: the image cell is not rendered and the text column takes the card's width.

**Responsive summary.** Below `lg`: a column of untilted full-width cards with 4:3 images above their text, the heading at 30px then 40px from `md`, the footer stacked below `md` and a row from `md`. From `lg` with motion allowed: the Pin, cards at 52% of the viewport tilted by their scheme, the image the left third at full height, the heading at 46px, the footer a centred row 45px beneath. The `md` rules are the heading's size and the footer's direction, so a tablet capture is planned.

**About Us content.** The existing Hero Full Screen Seed in the scratch folder is run first so the page has its Hero. Then one Scrolling Cards Block through a new Seed targeting the About Us slug: Eyebrow "Our Approach"; five cards, the node's three first with their headings and texts and their photographs as the Image, "We're honest & transparent", "Data informs all our decision-making" and "Excellence through collaboration", then two placeholder cards with invented headings and texts reusing two of the photographs so the white and black schemes are seen repeating; Button label "Let's Work Together" linking to the contact page; Avatar Group the node's avatar photograph, "Gareth Hoyle", "Managing Director"; padding Top and Bottom set explicitly. The photographs and the avatar were downloaded from the node during the grilling session and sit beside the Seed. The Seeds are not committed.

**Docs.** `CONTEXT.md` gained the Scrolling Cards vocabulary during the grilling session; Pin and Card Scheme were widened. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The primary seam is the rendered About Us page at `/about-us` through the global layout, with the Hero and the Block seeded. The Block is the only user of the new fields and the only `lg`-gated Pin, so both are proven through it. The single-card state is proven through a temporary Seed on the same page that is removed afterwards. The Seed command's own output is the second seam. Because the Block is one frame and reuses every component, no styleguide page is added.

**What good evidence looks like.** It shows what a visitor would see: the Block pinned at 1600 with the black card centred against the node, the Eyebrow and footer row unmoved between two scroll offsets, the row resting at the first and the last card, the plain column on a phone and under reduced motion. Fixed widths, one state per file, after-only because the Block did not exist before.

**Evidence plan.**

1. About Us at 1600, viewport, scrolled to the Pin's start: the Eyebrow "Our Approach" over its creme-300 Rule inside the site margins, the first white card centred at 52% width tilted minus 2 degrees with its image filling the left third, the heading at 46px semibold, the black card peeking at the right edge, the button and the Avatar Group centred 45px beneath. Compared against the Figma node for sizes, colours and gaps. Proves the desktop layout and the centred start.
2. About Us at 1600, viewport, scrolled one step further: the black card centred with white text, the white and secondary cards peeking either side, the Eyebrow, Rule and footer row at the same pixels as in line 1. Matches the node's drawn state. Proves the Pin, the scheme's second entry and the fixed Eyebrow and footer.
3. About Us at 1600, viewport, scrolled to the Pin's end: the fifth card centred with nothing peeking to its right, then a further scroll showing the Footer beginning beneath. Proves the centred end and the release.
4. About Us at 1600, viewport, scrolled to the fourth card: white again after secondary. Proves the Card Scheme repeating.
5. About Us at 1600, viewport, scrolled half a step and then back a quarter: the row resting between cards each time. Proves the one-to-one scrub in both directions.
6. About Us at 390, full page, scrolled to the Block: the column of untilted full-width cards with 4:3 images above their text, the heading at 30px, the button above the Avatar Group. Proves the mobile layout.
7. About Us at 768, viewport at the Block: the heading at 40px, the footer a centred row. Proves the `md` step of the ramp and the footer direction.
8. About Us at 1600 with `prefers-reduced-motion: reduce` emulated, full page at the Block: the column, no Pin, no tilt. Proves the reduced-motion layout.
9. About Us at 1600, keyboard, with a link temporarily placed in the third card's text: tabbing to it scrolls the row so the third card is centred. Restored afterwards. Proves focus brings a card into view.
10. About Us at 1600 with a temporary one-card Seed: one centred untilted card, no Pin. Removed afterwards. Proves the single-card rule.
11. About Us at 1600 with the Block's Eyebrow, Button and Avatar Group temporarily emptied: the row alone with no Eyebrow row and no footer row. Restored afterwards. Proves the empty states.
12. Served HTML of the About Us page: the Block a `section` holding the Eyebrow, a `ul` of five `li` cards each with an `h3` and a paragraph, empty-alt pictures, one `a` button and the Avatar Group, no inline styles beyond the picture component's own and no `hidden` progress bars. Proves the markup and the before-JavaScript state.
13. Seed output run twice, for the Hero Seed and the Block Seed: the first run reports the Hero created and the Block created with five cards and their images uploaded; the second reports both skipped and the images reused. Saved as text beside the screenshots. Proves the Seeds.
14. Control panel, the Block's Scrolling Cards field: fewer than two cards refused on save. Proves the minimum.

## Out of Scope

- Slide Progress bars, a Cursor Label, Carousel Controls, Slide Numbers or any link on a card.
- Pinning below the desktop breakpoint, or any sideways movement under reduced motion.
- A fourth fluro scheme, or editor-chosen colours.
- A Button on a card, more than one image per card or an Image Cycle.
- A ramp on the heading alternate component itself; the Block overrides the size.
- Any change to the Service Carousel or Stacking Cards templates.
- Committing the Seeds or the photographs.

## Further Notes

- The node is a group over the About page frame, so its measurements are absolute page positions: the Eyebrow's cap top at 2682, the Rule at 2713, the black card's box from 2790 to 3173, the footer row from 3215 to 3257, the group 575 tall.
- The node's three card centres are about 825px apart while the cards are 831px wide, so unrotated they would overlap by 6px and only the tilt opens the gaps; the 20px gap was chosen so taller cards never touch, and at 1600 it reads as the node does.
- The node's image cell is about 262 by 340 inside the 831 by 354 card, a 7px inset on the left, top and bottom, which is why the cell is the card's left third at full height rather than a fixed ratio.
- The node's heading is tracked at minus 1.84px at 46px, minus 0.04em exactly, so the tighter tracking token carries it with no override.
- The Figma integration exported the "honest" photograph at 504 by 756 and the other two at 2500 by 1667; the first will be soft in a 1600 capture, which is review content, not a design decision.
- The stage's 24% left padding is half of the viewport less the 52% card, so the first card is centred without measuring anything; the last card ends centred because the travel is one step per card less one.
- The Service Carousel Pins at every width because its Slides are full width; this Block's cards are half width with a tilt, which is why the grilling chose a plain column below `lg` instead.
