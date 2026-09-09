# Service List

Spec for the Service List on the Service Listing page: one full-width Service Card per Service between the page's Hero and its Blocks, each card its Card Number, title, Description and Category Tags beside its Thumbnail, coloured by a five-step Card Scheme, the whole card one link with a "Learn More" Cursor Label and a Zoom on hover. From the desktop breakpoint the cards Overlap as the visitor scrolls: each holds at the top of the screen and the next slides up over it. Beneath the cards, the List Footer: a button and an Avatar Group set by editors on the page. Review content arrives by Seed: the six Services gain their Categories and single-line titles, and the page gains its List Footer.

Design: Figma node `9910-15475` in the Marketing Signals file, 1600 wide, named "Group 46362". The node draws the desktop state once at 1520 by 4351: six Service Cards at rest in a column with 20px gaps, the second black with a "Learn More" pill at rest over it, and the List Footer beneath. No overlapped state, no hover-free frame for the black card, no Tag Tooltip, no tablet frame and no mobile frame exist, so the Overlap geometry, the tooltip, the hover states and everything below `lg` are decisions, not measurements. The Overlap follows the reference the client pointed at, the Studio Modular services page, which stacks with plain CSS sticky positioning and no script.

Branch: feature/service-list

Related: the Carousel - Service spec, whose Service Slide is a different card for the same entry and whose "Find Out More" wording this page does not adopt; the Stacking Cards spec, whose List Footer pattern (button beside Avatar Group) and whose `lg` and reduced-motion column fallback this follows, and whose Card Scheme term is widened to cover this page; the Case Study Grid spec, whose Case Study Card gives the Zoom, the Cursor Label pattern and the page-template-not-Block placement, and whose Seed work gives Categories by title; the Content Seeding spec, whose command sets every field this page needs. ADR-0001 does not apply: the list is in flow beneath the Hero. ADR-0002 applies: every Category and the List Footer arrive by Seed. ADR-0003 applies and constrains: the Services page is the one `entryServiceListing` page, found by type, so the list lives in that page template rather than in a Block. ADR-0004 is untouched. No new ADR: CSS sticky over a GSAP pin is easy to reverse and is recorded under Further Notes. Vocabulary: `CONTEXT.md`, new "Service List" section, which gained Service Listing page, Service List, Service Card, Card Number, Category Tag, Overflow Tag, Tag Tooltip, Overlap and List Footer during the grilling session; Card Scheme in the "Stacking Cards" section was widened to a position-derived sequence each block defines.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Services page exists, is the page the Breadcrumb and the Main Menu point to, carries a Hero and the Footer CTA, and shows no Services. Its control panel tab promises editors that "Service Entries will automatically pull through here" and nothing does; the page template holds an empty "Service Grid" comment where the list should be. The six Services each have a Description and a Thumbnail, and since today a Categories field, but no Categories exist and no template renders the field. The only place a visitor meets the Services together is the Service Carousel on the Home page, which shows the ones an editor picked, one at a time, with no Description of what each includes. Two Service titles carry a literal line break copied from the design, which the entry type forbids and which every template would render wrongly. The page's new Button and Avatar Group fields have no template either.

## Solution

The Services page renders the Service List between its Hero and its Blocks. Every enabled Service, in structure order, is a Service Card the full width of the site margins: 20px corners, 40px padding, a twelve-column grid inside with the text in the first six columns and the Thumbnail in the last five. Down the text column: the Card Number, two digits above a thin Rule; a gap; the title at 55px semibold; the Description 30px beneath; then 50px down the words "Services include" and, 20px under them, the Category Tags, outlined pills in rows with 5px gaps, four of them and then an Overflow Tag reading "+N" whose Tag Tooltip lists the rest on hover. Each card takes its Card Scheme from its position: white, black, secondary, fluro, creme-200, then white again, with its text, Rule and tag outlines following. The whole card is one link to the Service: on fine pointers a white "Learn More" Cursor Label follows the pointer and the Thumbnail zooms gently inside its frame; on coarse pointers the tap is the link. From `lg`, as the visitor scrolls, each card holds 100px from the top of the screen once it reaches that line and the next slides up over it, every card the same height so the stack is clean; below `lg` and under reduced motion the cards are a plain column with 20px gaps. Beneath the last card, 50px down and centred, the List Footer: the page's button in the lilac fill beside the Avatar Group. Seeds give the six Services their Categories and mend their titles, and give the page its List Footer, so the page can be reviewed against the node.

## User Stories

1. As a visitor, I want every Service on one page, so that I can see what the agency offers without opening each one.
2. As a visitor, I want the Services in the order the agency chose, so that the most important come first.
3. As a visitor, I want each Service numbered, so that I can tell how far down the list I am.
4. As a visitor, I want each Service's title large and its Description beside it, so that I know what the Service is before I click.
5. As a visitor, I want a Service's Categories listed as pills, so that I can scan what it includes.
6. As a visitor, I want only four Categories shown with a "+N" after them, so that a card with many never sprawls.
7. As a visitor, I want to hover the "+N" and see the rest of the Categories, so that nothing is hidden from me.
8. As a visitor using a screen reader, I want every Category read out whether or not it is drawn, so that I get the full list without a pointer.
9. As a visitor, I want each Service's photograph beside its text, so that the page is not a wall of words.
10. As a visitor, I want the cards to change colour as I go down, so that each Service reads as its own thing.
11. As a visitor, I want the whole card to be the link, so that I do not have to find a small button.
12. As a visitor on a desktop, I want a "Learn More" label to follow my pointer over a card, so that I know a click opens the Service.
13. As a visitor on a desktop, I want the photograph to zoom a little when I hover, so that the card responds to me.
14. As a visitor on a desktop, I want each card to hold at the top of the screen while the next slides over it, so that the list feels layered rather than a long scroll.
15. As a visitor on a desktop, I want every card to stop at the same line and be the same height, so that the stack is neat.
16. As a visitor on a desktop, I want the Header, when it comes back on scroll up, to sit above the stuck card rather than over its text.
17. As a visitor, I want the stack to follow my scroll in both directions, so that I can go back to a card I passed.
18. As a visitor on a phone, I want the cards in a plain column with the photograph above the text, so that the page reads top to bottom.
19. As a visitor who prefers reduced motion, I want no sticking, no zoom and no moving label, so that the page holds still.
20. As a visitor using a keyboard, I want each card reachable by Tab with a visible focus, so that I can open a Service without a mouse.
21. As a visitor, I want a button and a person beneath the list inviting me to get in touch, so that the page ends with a next step.
22. As a visitor, I want the list to be part of the page, so that a shared link to the Services page shows it with no script.
23. As an editor, I want Services to appear on the page as soon as they are published, so that I never maintain the list by hand.
24. As an editor, I want the button and the Avatar Group beneath the list set on the Services page, so that I can change the person or the wording.
25. As an editor, I want a Service with no Categories to drop its "Services include" row and nothing else, so that a new Service still looks right.
26. As an editor, I want a Service with no Thumbnail to keep its text and colour, so that the page never breaks on a missing image.
27. As an editor, I want card colours to follow position rather than a field, so that reordering Services keeps the rhythm.
28. As a developer, I want the Category Tag to reuse the badge component, so that the site has one pill.
29. As a developer, I want the Tag Tooltip to reuse the tooltip component restyled to house tokens, so that the next tooltip looks the same.
30. As a developer, I want the Overlap in CSS alone, so that nothing competes with Lenis and there is no pin length to compute.
31. As a developer, I want the review content by Seed, so that a reviewer can rebuild the page from the scratch folder.
32. As a reviewer, I want before and after screenshots of the Services page at the planned widths and scroll offsets, so that I can check the build against the node and this spec.

## Implementation Decisions

**Page template.** The Service Listing page template renders the Hero, then the Service List, then the Blocks, in place of its empty "Service Grid" comment. The list is wrapped in the section component with `paddingY` at its `base` value and horizontal padding at the site margins, as the Case Study Grid is. There is no Block and no new field on either entry type: the page's control panel Tip already says Services pull through automatically, and ADR-0003 fixes the page to one instance found by its entry type. The Button and Avatar Group fields the listing type gained today are the List Footer's fields.

**Query.** Enabled Services from the Service section in structure order, all of them; no paging, no filter. The loop index, one-based and zero-padded to two digits, is the Card Number. A section with no Services renders no list; the List Footer still renders when set.

**Service Card component.** A new `serviceCard` component takes the Service, its Card Number, its Card Scheme and a `sizes` hint for the picture component. It renders one link to the Service wrapping the whole card: 20px corners, overflow clipped, the scheme's background, 40px padding from `lg` and 20px below. Inside, from `lg`, a twelve-column grid with the house 20px gap: the text column spans columns one to six, the Thumbnail column eight to twelve; column seven is the gutter the node draws. The text column is a flex column: the Card Number through the eyebrow component with its Rule at the top; the title, Description and tag group pushed to the bottom with a 150px floor of space above the title so the node's proportions hold; the Description in the base size through the rich text component, capped at five columns' width; "Services include" 50px beneath in medium weight; the Category Tags 20px beneath that, wrapping with 5px gaps. The title is a `p` through the alternate heading component at the 6xl token (55px, semibold, 0.97 leading, tighter tracking), since a heading inside the link is the pattern the Case Study Card already avoids. The Thumbnail fills its column and the card's full height through the picture component with the focal point honoured, ratio off, an empty alt and its own 20px corners; without a Thumbnail the column is empty and the text column stands alone. The whole card is the link's accessible name: number, title, Description and every Category, drawn or not; no `aria-label`.

**Card Scheme.** A five-entry options map on the page template, chosen by the loop index with Twig's cycle as Stacking Cards does, passed to the card as `scheme`:

| Position | Card | Number, title, text | Rule | Tags |
| --- | --- | --- | --- | --- |
| 1, 6, 11… | white | black | creme-300 | creme-300 outline, black text |
| 2, 7… | black | number white, title fluro, text creme-100, "Services include" secondary | white 30% | white 30% outline, white text |
| 3, 8… | secondary | black | black | black outline, black text |
| 4, 9… | fluro | black | black | black outline, black text |
| 5, 10… | creme-200 | black | black | black outline, black text |

The eyebrow component gains nothing: its `white` and `black` colours and its `creme-300`, `white-30` rule colours already exist, and a `black` rule colour is added. The badge component gains two colours, `black-outline` and `white-30-outline`, beside its existing `creme-300-outline`, and the Category Tag uses its `lg` size (base text, medium weight, 20px by 10px padding) against the node's 18px by 10px, accepting the 2px.

**Category Tags and the Overflow Tag.** The card takes the Service's Categories in field order. The first four render as Category Tags. When more exist, a fifth pill, the Overflow Tag, reads "+N" where N is the remainder, in the same badge style. The Overflow Tag is wrapped in the tooltip component whose content is the hidden Categories' titles joined by ", ", so on fine pointers hovering the pill shows the Tag Tooltip centred above it. The tooltip component is restyled from its zinc defaults to house tokens: black panel, creme-100 text, small text, 5px corners, 10px by 8px padding, a 200ms fade; the same look on every scheme. Because the pill is inside the card's link it is not a button and has no focus: the hidden Categories are also rendered as visually-hidden text beside the pill, so the link's name and a screen reader carry all of them, and on coarse pointers the tap is the link. A Service with four or fewer Categories has no Overflow Tag; one with none drops "Services include" and the tag group.

**Hover, Zoom and the Cursor Label.** On fine pointers entering a card raises the Cursor Label through the cursor component's window event with "Learn More", leaving lowers it, as the Case Study Card does with "View Case Study". The Thumbnail's wrapper scales to 1.05 over 500ms with an ease-out inside its clipped column on hover, the same classes as the Case Study Card so the site has one Zoom, and holds still under reduced motion. Nothing else changes on hover: no title colour, no button. The Service Carousel keeps its own "Find Out More" wording and its coarse-pointer button; the inconsistency is flagged to the designer under Further Notes.

**Overlap.** From `lg` and without reduced motion, the list is a column whose every card is `position: sticky` with `top` at 100px, the Header's 80px plus 20px, and every card the same height: the smaller of 760px and the viewport height less 120px, so a card is never taller than the screen below its stop line and its bottom is never hidden. Because the cards are in normal flow, the column's own length is the scroll length; nothing is pinned, no travel is measured and Lenis is left alone. Each later card sits above the earlier ones in paint order, so scrolling up brings a passed card back. There is no stair-step: every card stops at the same line. Below `lg` and under reduced motion the same markup is a plain column with 20px gaps and content-driven heights, so the fallback is the absence of three classes, delivered through Tailwind's `lg:` and `motion-safe:` variants with no script. The Header hides on scroll down and returns on scroll up; when it returns it sits in the 100px band above the stuck card and covers no text.

**Mobile.** Below `lg` each card is a column: the Thumbnail first at 4x3 with 15px corners, then the Card Number, the title at the 3xl token, the Description, "Services include" and the Category Tags with the same gaps scaled to 20px padding. The List Footer stacks its button above the Avatar Group, centred. Widths between `md` and `lg` follow the mobile column; the node draws neither.

**List Footer.** Beneath the column, 50px down, a centred row with 20px gaps: the page's button through the button component in `secondary` with the arrow icon, and the Avatar Group through the user component at `sm`, exactly as the Stacking Cards footer renders them. It renders when either field is set and is absent when neither is.

**Seeds.** Seven Seed files under the scratch folder, not committed. Six name a Service by slug in the Service section, set its title to a single line where it carried a break, and set `categoriesService` to the Categories the node draws for it, in the node's order, creating each Category in the Service group by title. The three cards drawn with a "+2" and only four names get two placeholder Categories each, marked as review content in the Seed. The seventh names the Services page and sets its button to the contact page with the label "Let's Work Together" and its Avatar Group to Gareth Hoyle, Managing Director, reusing the gareth-hoyle.jpg asset already in the volume. Thumbnails are untouched.

**Docs.** `CONTEXT.md` gained the Service List section and the widened Card Scheme during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The primary seam is the Services page URL through the global layout: every state the spec names, rest, Overlap at a scroll offset, hover, the Tag Tooltip, the mobile column and reduced motion, is reachable by loading `/services` and scrolling or hovering. The secondary seam is the Seed command's dry-run and real output for the seven Seeds. No new seam; the styleguide has no listing preview and gains nothing.

**What good evidence looks like.** It shows what a visitor would see: six cards in their five colours at the designed widths, the stack mid-scroll with one card stuck and the next sliding over it, the Cursor Label and the Zoom, the tooltip open over a "+2", the mobile column, the reduced-motion column, and the Seed output that built the content. Fixed widths, one state per file, before and after pairs on the PR. The before is the Services page on `main` at the fork commit, already captured as `before-services-1600.png` in the evidence folder.

**Evidence plan.**

1. `/services` at 1600, full page, reduced motion emulated so no card sticks: six Service Cards 1520 wide with 20px gaps, white, black, secondary, fluro, creme-200, white, each 760 tall with 40px padding, the Card Number over its Rule at the top left, the title at 55px semibold in the six-column text column, the Description at 588 wide, "Services include" and the Category Tags 31px tall with 5px gaps, four then "+2" on cards one, two and five, the Thumbnail in columns eight to twelve, the List Footer 50px beneath with the lilac button and the Avatar Group. Compared against the node. Proves the desktop layout and the Card Scheme.
2. `/services` at 1600, viewport, scrolled so the second card has reached its stop: the first card held with its top 100px from the viewport's top, the second card's top edge partway up over it, both at the same left and width. Then scrolled further: the second held at the same 100px line, the third over it. Proves the Overlap and the common stop line.
3. `/services` at 1600, viewport, scrolled down past the third card then scrolled up 200px: the Header back in the 100px band above the stuck card, covering none of its text. Proves the offset.
4. `/services` at 1600, viewport, pointer over the first card: the white "Learn More" pill at the pointer, the Thumbnail at 1.05 inside its column, the title unchanged. Proves the Cursor Label and the Zoom.
5. `/services` at 1600, viewport, pointer over the "+2" on the first card: the Tag Tooltip above it reading the two hidden Categories comma separated, black panel, creme-100 text. Then the same on the second, black, card. Proves the tooltip on two schemes.
6. `/services` at 390, full page: every card a column with the Thumbnail first at 4x3, 20px padding, the title at 3xl, the tags wrapping, the List Footer stacked and centred. Proves the mobile column.
7. `/services` at 1024, viewport: the twelve-column split in force, the Overlap in force. Proves the `lg` step.
8. `/services` at 1600 with reduced motion emulated, viewport, scrolled to the third card: no card stuck, the column scrolling plainly with content-driven heights; pointer over a card: the Thumbnail at rest at 1.0, the Cursor Label shown. Proves the reduced-motion fallback.
9. Served HTML of `/services`: the list a `ul` of six `li`, each one `a` to the Service with no `aria-label`, the title a `p`, the Thumbnail with an empty alt, the hidden Categories present as visually-hidden text, the "+2" pill carrying no `button` or `tabindex`, no inline styles beyond the picture component's properties. Proves the markup and the accessibility story.
10. DOM after scripts at 1600: Tab moving through the six links with a visible focus on each. Proves the keyboard path.
11. `/services` at 1600 with one Service's Thumbnail temporarily removed, then its Categories cleared: the card on its scheme colour with an empty image column, then without the "Services include" row. Restored afterwards. Proves the empty states.
12. Seed command dry-run and real output for the seven Seeds, run twice: six entries updated with their Categories related and the new Categories created on the first run, the Services page's button and Avatar Group set, nothing changed on the second. Then the control panel's Service Category group listing every Category once and the two mended titles on one line. Saved as text beside the screenshots. Proves the Seeds.

## Out of Scope

- A Category filter, search, sort or paging on the Service List; every Service shows.
- A scale, fade or tilt on the covered cards; the Overlap is a plain sticky stack.
- A Block version of the Service List for other pages.
- An editor field for Card Scheme, card order beyond structure order, or the number of Category Tags shown.
- Changes to the Service Carousel: its wording, its coarse-pointer button and its Slide layout stay.
- The Service entry page itself and its Hero.
- A keyboard-focusable Tag Tooltip; the pill sits inside a link, and the hidden Categories are in the text instead.
- Committing the Seeds or the placeholder Categories.
- Replacing the review Thumbnails with final photography.

## Further Notes

- The Overlap is CSS sticky rather than a GSAP pin because the reference the client chose is exactly that, the natural scroll length is the column's length, and nothing has to be measured or refreshed. Stacking Cards keeps its GSAP Stack because its cards slide away rather than hold. This is recorded here rather than as an ADR because swapping in a ScrollTrigger later touches one component.
- The common card height is the smaller of 760px and the viewport less 120px: 760px is the node's tallest card rounded, and the subtraction keeps a whole card below the 100px stop line with 20px spare at the bottom.
- The reference site stair-steps each stuck card 20px lower than the last and only from 1440px. Neither is adopted: the node draws no stair, and `lg` matches Stacking Cards.
- The node's tag pills are 18px by 10px; the badge component's `lg` size is 20px by 10px and the 2px is accepted rather than adding a size. Its Card Numbers are Regular weight; the eyebrow component is Medium and the step is accepted.
- The node draws "+2" on three cards without naming the two hidden Categories; the Seed invents two placeholders each so the Overflow Tag and Tag Tooltip can be evidenced.
- "Learn More" here and "Find Out More" on the Service Carousel lead to the same page. Both are kept as drawn and the pair is flagged to the designer.
- The Description field is Rich Text - Simple; the rich text component renders it and the node draws plain paragraphs.
- The two Service titles with a literal line break are mended by Seed to single lines; the node's breaks fall where a 710px column wraps anyway.
- The node's "Learn More" pill over the second card is the Cursor Label at rest, not a button; on coarse pointers the tap is the link, as on the Case Study Card.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
