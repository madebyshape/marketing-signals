# Carousel - Case Study

Spec for the Case Study Carousel Block: an Eyebrow and a heading over a row of Slides, one per Case Study the editor picked, inside a black panel with rounded corners set in from the site margins. Each Case Study Slide is a rounded card with the Case Study's Thumbnail darkened behind its Category Badge, its Logo and its Tag Line, the whole card one link to the Case Study, with a Cursor Label on hover. The visitor moves the row with the Carousel Controls beneath it or by dragging. It is the first Block built on the Swiper carousel component, which it brings up to standard, the first caller of the badge component, the second caller of the cursor component and the fifth Block on the Home page.

Design: Figma node `9716-7986` in the Marketing Signals file, 1600 wide, named "Block / Work Exterior / Black / Indented". The node draws the desktop state once at 1520 by 1006 with a Cursor Label at rest over the centre Slide; no hover-free frame, no tablet frame and no mobile frame exist, so the size ramp, the tablet and mobile geometry and the mobile card shape below are decisions, not measurements.

Branch: feature/carousel-case-study

Related: the Carousel - Service spec, which this Block follows on the Home page and whose cursor component, eyebrow colours and Entries field seeding it reuses; the Content Seeding spec, whose Entries field type puts the Case Studies on the Home page. ADR-0001 does not apply: the Block is in flow beneath the Service Carousel. ADR-0002 applies: the Home page content arrives by Seed. No new ADR: the rule that Swiper carousels on this site use the Previous and Next pills is recorded here, under Further Notes, because it is a house style for one component rather than a trade-off. Vocabulary: `CONTEXT.md`, "Case Study Carousel" section, which gained Case Study, Case Study Carousel, Case Study Slide, Category Badge, Tag Line, Logo and Carousel Controls during the grilling session; Slide was generalised to any carousel Block, with the Service specifics moved to Service Slide, and Cursor Label now names what the Slide links to rather than one fixed phrase.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Home page shows a hero, a heading over two photographs, a statement whose words reveal on scroll, a row of numbers and the six Services, then the footer. The design follows the Services with the agency's best client work: a black panel holding a heading and a row of Case Study cards the visitor pages through, and editors have no Block to build it with. The Case Studies exist as entries with a Thumbnail, a Logo, a Tag Line and a Category, and an Entries field restricted to them was added in the last commit, but nothing on the site shows them together. The Swiper carousel component exists and no Block has ever called it; it finds its buttons by querying the document with manufactured classes, which the coding standards forbid, and its controls draw icon circles where the design asks for "Previous" and "Next" pills.

## Solution

A Case Study Carousel Block editors can add to any page. It holds an Eyebrow, a heading with the Highlight and a list of Case Studies the editor picks. It renders as a black panel with 20px corners set in from the page by the site margins: the Eyebrow with its Rule, the heading in creme with its Highlight in lilac, then the Slides, then the Carousel Controls centred beneath. Each Case Study becomes a Slide: a rounded landscape card with the Thumbnail darkened behind a translucent Category Badge at the top left, the Logo centred, and the Tag Line at the bottom left with its Highlight in fluro. From `lg` two Slides fit the panel, centred, so the neighbours peek at the panel's edges and are clipped by its corners; at `md` one and a half fit; below `md` one fills the panel, portrait. The row loops when it has enough Slides, moves one Slide at a time from the Previous and Next pills or by dragging, and slides a Slide into place when a keyboard user focuses it. Each Slide is one link to its Case Study: on a fine pointer a white pill reading "View Case Study" follows the cursor over the card and nothing else changes; on a coarse pointer the tap is the link. The Home page gets one instance with all six Case Studies, added through the Seed command so the review starts from real content.

## User Stories

1. As a visitor, I want the agency's client work shown as a row of large cards on the Home page, so that I can see who they have worked for and what they achieved without leaving the page.
2. As a visitor, I want the row set inside a dark rounded panel, so that the work reads as a distinct chapter of the page.
3. As a visitor, I want the centre card whole and its neighbours peeking at the panel's edges, so that I know there is more on both sides.
4. As a visitor, I want Previous and Next buttons beneath the cards, so that I can page through the work without guessing at a gesture.
5. As a visitor, I want Previous on the first card to reach the last, so that I am never stuck at an end with an inert button.
6. As a visitor, I want the cards to move at a settled pace with an ease, so that a change feels like a slide rather than a jump.
7. As a visitor with a mouse, I want to drag the row as well as press the buttons, so that I can use whichever comes naturally.
8. As a visitor with a mouse, I want a drag never to open a Case Study, so that moving the row is safe.
9. As a visitor, I want each card to show the client's logo over a photograph, so that I recognise the client at a glance.
10. As a visitor, I want the Tag Line on each card with its result in fluro, so that the outcome is the first thing I read.
11. As a visitor, I want the Category on each card in a small pill, so that I know which Service the work belongs to.
12. As a visitor, I want the photograph darkened at the top and bottom, so that the badge and the Tag Line stay readable over any picture.
13. As a visitor, I want the photograph to fill the card whatever its shape, cropped to its focal point, so that a portrait photo looks as intended as a landscape one.
14. As a visitor with a mouse, I want the whole card to be the link, so that I do not have to find the right word to click.
15. As a visitor with a mouse, I want a "View Case Study" label to follow my cursor over any card, so that I know what a click does wherever I am in the row.
16. As a visitor with a mouse, I want nothing else on the card to move when I hover, so that the one cue stays clear.
17. As a visitor with a phone or tablet, I want a tap on the card to open the Case Study, so that the link works without a hover.
18. As a visitor with a tablet, I want one card and a half in view, so that the row still shows it continues.
19. As a visitor with a phone, I want one portrait card filling the panel, so that the logo and the Tag Line have room.
20. As a visitor with a phone, I want the Eyebrow, heading, cards and buttons stacked in that order, so that the Block reads the same as on a laptop.
21. As a visitor with a phone, I want a swipe to move the cards the same way the buttons do, so that the carousel works with the gesture I already use.
22. As a visitor who prefers reduced motion, I want the cards to change without sliding, so that nothing animates that I did not ask for.
23. As a visitor whose script has not run, I want the cards readable in a row with the first at the left, so that the work is there however the page loads.
24. As a keyboard user, I want tabbing to a card's link to bring that card into view, so that I am never focused on something I cannot see.
25. As a keyboard user, I want Previous and Next to be real buttons, so that I can page the row from the keyboard.
26. As a screen reader user, I want the row announced as a carousel and each card as one of a count, so that I know where I am in it.
27. As a screen reader user, I want each card read once as its Category, the client's name and its Tag Line, as a link to the Case Study, so that the card makes sense without the picture.
28. As a screen reader user, I want the photograph marked decorative, so that a filename is not read to me.
29. As an editor, I want a "Carousel - Case Study" Block in the Blocks menu, so that I can add it to any page.
30. As an editor, I want to type the Eyebrow, so that the carousel can say something other than "Featured Work" on another page.
31. As an editor, I want to write the heading and mark words italic for the Highlight, so that I control which words turn lilac.
32. As an editor, I want to pick Case Studies from a list and order them, so that the carousel shows the ones I choose in the order I choose.
33. As an editor, I want the picker to offer Case Studies and nothing else, so that I cannot put a blog post where a card expects a Logo and a Tag Line.
34. As an editor, I want the card to use the Case Study's own Thumbnail, Logo, Tag Line and Category, so that a Case Study changed in one place changes everywhere.
35. As an editor, I want a Case Study missing a Logo, a Tag Line, a Category or a Thumbnail to still get a card, so that my choice is never silently dropped.
36. As an editor, I want a carousel with one Case Study to render as a single static card, so that a page with one Case Study does not show buttons that do nothing.
37. As an editor, I want a carousel with no Case Studies to render nothing, so that an unfinished Block leaves no gap on the page.
38. As an editor, I want the Block's fields under Section Header and Section Content, so that it reads like every other Block.
39. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
40. As an editor, I want the Home page to already carry this Block with the six Case Studies, so that I see how it is meant to look.
41. As a developer, I want the Swiper carousel component to find its buttons through refs inside its own scope, so that two carousels on one page never collide and the standard is met.
42. As a developer, I want the Carousel Controls to be the Previous and Next pills, so that the next Swiper Block gets the house buttons by including one component.
43. As a developer, I want the Category Badge, the white Tag Line and the fluro Highlight to be options on existing components, so that the next translucent pill or dark-panel heading gets them free.
44. As a developer, I want the Seed to accept the Case Studies by slug, so that the Home page content is reproducible without a control panel login.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `carouselCaseStudy`, name "Carousel - Case Study", colour blue, icon `images`, added to the Blocks field in the General group. A Content tab with a Section Header heading element followed by the Eyebrow field and the Heading field, then a Section Content heading element followed by the Entries - Case Study field; a Settings tab with the Padding field. Section Footer is omitted because the Carousel Controls belong to the carousel, not to the editor.

**Fields.** No new field. The Entries - Case Study field already exists with the Case Study section as its only source and no minimum or maximum; the Block adopts it and gives it the selection label "Add a Case Study", the instructions "One Slide per Case Study, in the order they are listed." and the same translation method as Entries - Services. The Eyebrow field and the Heading field are reused as they are. The Case Study entry type is untouched: its Thumbnail and Logo are instances of the Image field, its Tag Line an instance of the rich-text Heading field, its Category the Categories - Case Study field.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding on the vertical axis and horizontal padding off, and its content inside the section's content block. The Block places the panel itself: a black container with 20px corners inside the site margins on both axes, clipping its overflow so the Slides are cut at its rounded edge. Panel padding is 50px on the sides and 100px top and bottom from `lg`, 20px on the sides and 40px top and bottom below. Inside, top to bottom: the Eyebrow row, the heading, the carousel, the Carousel Controls, with 50px from the Rule to the heading, 60px from the heading to the Slides and 50px from the Slides to the Controls from `lg`, and 30px between each pair below. The carousel is pulled out to the panel's edges by negative margins the size of the side padding, so the Slides run under the padding and the neighbours peek to the panel's edge while the Eyebrow, heading and Controls stay inside it.

**Eyebrow row.** The eyebrow component renders the Block's Eyebrow in white with the Rule on in its `white-30` colour, exactly as the Service Carousel does, without an aside. An empty Eyebrow renders no row.

**Heading.** The Block's Heading field through the alternate heading component as an `h2`, colour `creme-100`, the Highlight in its `secondary` style, both of which the component already has, semibold with the 7xl token's leading and tighter tracking. The size ramp is 4xl at mobile, 6xl from `md` and 7xl (62px) from `lg`. From `lg` the heading sits in the first eight of the panel's twelve columns; below it spans the full width. An empty heading renders no heading.

**The carousel component.** The Swiper carousel component gains the `component` line and takes its Previous and Next buttons from refs named `prev` and `next` inside its own Alpine scope, creating the navigation only when both exist; the document query and the per-id classes go, and with them the `id` param's role in wiring, though the param stays for the class hook the styleguide may one day want. The Block embeds the component with the Slides in its slide slot and the Carousel Controls in its after-content slot, which is inside the scope, so the refs resolve. The component's Swiper is configured from the Block: centred Slides at every width, one per view below `md`, one and a half at `md`, two from `lg`, a 20px gap at every width, 600ms changes with the component's `smooth` ease, dragging on, looping on when there are three or more Slides, the accessibility module on with the row a region and each Slide a group, and click prevention on so a drag never navigates. Under reduced motion the change speed is zero, so the row still pages but never slides. Before the script runs Swiper's served layout stands: the Slides in a row from the panel's left edge, clipped at the panel, the Controls visible but inert.

**Carousel Controls.** The controls component is rewritten around the button component: it renders "Previous" with the arrow-left icon before the text and "Next" with the arrow-right icon after it, as `button` elements carrying the `prev` and `next` refs, 10px apart, centred. A `colour` option map holds the pair, its `base` entry being the button component's `creme-100-outline` for Previous and `secondary` for Next, which is what the node draws. The button component's base size is the house pill and is used as is. When the row does not loop, the button at an end takes Swiper's disabled state at 30% opacity and inert. The circle-button controls are gone; Swiper carousels on this site use these pills.

**Slides.** The Block renders one Slide per enabled Case Study in the field's order, each a list item holding one link to the Case Study wrapping the whole card. The card has 20px corners, a black background and clips its overflow. Its shape is 3x4 portrait below `md` and 16x10 landscape from `md`, set by the picture component's ratio at each step, so the card is exactly the design's 750 by 471 at 1600. The Thumbnail fills the card at 90% opacity through the picture component with the focal point honoured, the alt empty and the transform matching the shape at each step; a new `16x10` named transform is added for the landscape step and the existing `3x4` serves the portrait one. Two shades sit over the Thumbnail: the top 37% of the card fades from black at 50% to transparent, and the bottom 46% fades from transparent to black at 80%, as measured from the node's gradient assets. On top, the Category Badge at the top left, 30px in from `lg` and 20px below; the Logo centred; the Tag Line at the bottom left, 40px in from `lg` and 20px below.

**Category Badge.** The badge component gains a `white-20` colour, white at 20% with a 2px backdrop blur, white text and no visible border, and a `sm` size, 14px regular text with the tight tracking and 10px by 7px padding, its first caller. The badge shows the title of the Case Study's first Category only; a Case Study with no Category shows no badge.

**Logo.** The Logo renders through the picture component, which passes an SVG through untransformed, centred in the card at its natural size capped at 30% of the card's width and 20% of its height, so each logo scales with the card and none overwhelms it. Its alt is the Case Study's title, because the Logo is the Slide's visible title. A Case Study with no Logo shows the Thumbnail and Tag Line alone.

**Tag Line.** The Tag Line is the Case Study's rich-text Heading value with everything but italic, bold and line breaks stripped before rendering, because a link inside the Slide's link is invalid HTML and any heading tag would compete with the Block's heading. It renders as a paragraph through the alternate heading component, which gains a `white` colour and a `fluro` Highlight style for it, its first caller of either: medium weight, 2xl below `lg` and 3xl (30px) from `lg`, with the 3xl token's leading and tighter tracking. A Case Study with no Tag Line shows no text.

**Hover and the Cursor Label.** On fine pointers entering a Slide raises the Cursor Label through the cursor component's window event with the text "View Case Study"; leaving it lowers it. Nothing else on the card changes. Every Slide behaves the same, centre or peeking, and clicking any of them follows the link; a drag does not. On coarse pointers there is no extra button: the card is plainly a card and the tap is the link. The cursor component is unchanged.

**Keyboard.** Swiper's accessibility module slides a Slide into place when its link receives focus, so no focus handling is written in the Block. Previous and Next are buttons and take focus in the document order after the Slides.

**Accessibility.** The Slides are a list inside Swiper's region; each Slide is a group announced as one of the count. The link's accessible name is its contents, the Category, the Logo's alt and the Tag Line, so no `aria-label` is set. The Thumbnail has an empty alt. Nothing is read twice.

**Empty states.** A Case Study without a Thumbnail renders its card on solid black. A Block with one Case Study renders one static centred card and no Controls. A Block with two Case Studies pages without looping. A Block with no Case Studies renders nothing at all, section included. An empty Eyebrow or heading drops its row and nothing else.

**Home page content.** One Case Study Carousel after the Service Carousel, padding Top and Bottom, Eyebrow "Featured Work", heading "Success Stories We *Love To Shout About*" with the Highlight on the last four words as the node draws it, and the six Case Studies in the order Rayban, Better Bathrooms, The Tree Center, then their three duplicates, so the loop has neighbours as in the design. Added with the Seed command from a Seed file under the scratch folder; the Seed is not committed and needs no change to the command, since the Entries field type already seeds by slug.

**Docs.** `CONTEXT.md` gained the Case Study Carousel vocabulary during the grilling session and generalised Slide and Cursor Label. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Home page through the global layout, with the Block seeded after the Service Carousel. The Block is the only caller of the carousel component, the rewritten Carousel Controls, the badge's `white-20` colour and `sm` size, the alternate heading's `white` colour and `fluro` style and the `16x10` transform, so all are proven through it. The secondary seam is the Seed command's own output. The styleguide has no carousel preview and gains nothing.

**What good evidence looks like.** It shows what a visitor would see: the black panel inside the margins with its corners clipping the neighbours, the Eyebrow row, the creme heading with its lilac Highlight, the centre card at the designed size with the badge, logo and fluro Tag Line, the pills beneath, the row mid-slide, the hover cue, the tablet and mobile geometry, the reduced-motion jump and the keyboard focus. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is the Home page on `main` at the commit the branch forked from.

**Evidence plan.**

1. Home page at 1600, full page, scrolled to the Block at rest: the panel 1520 wide with 20px corners inside 40px margins, 50px side and 100px vertical padding, the Eyebrow row with its Rule, the heading creme at 62px with "Love To Shout About" in lilac in eight columns, the centre Slide 750 by 471 with the neighbours peeking 385px and clipped at the panel's corners, the Category Badge 30px in, the Logo centred, the Tag Line at 30px with its Highlight in fluro, the Previous and Next pills centred 50px beneath, compared against the Figma node. Proves the desktop layout.
2. Home page at 1600, viewport, pointer over the centre Slide: the white "View Case Study" pill at the pointer, no native cursor, nothing else changed. Proves the hover cue and the Cursor Label.
3. Home page at 1600, viewport, pointer over a peeking Slide: the same pill. Proves every Slide is the link.
4. Home page at 1600, viewport, 300ms after pressing Next: the row mid-slide. Then at rest: the second Case Study centred. Proves the Controls and the 600ms ease.
5. Home page at 1600, viewport, Previous pressed on the first Slide: the last Case Study centred. Proves the loop.
6. Home page at 1600, viewport, after a 400px drag on the row: the next Slide centred and the page still on the Home page. Proves dragging and that a drag never navigates.
7. Home page at 1024, viewport, the Block at rest: two Slides per view still, the heading at 7xl. Proves the `lg` step.
8. Home page at 768, viewport, the Block at rest: one and a half Slides, the centre card two thirds of the panel less the gap with a quarter of each neighbour peeking, the heading at 6xl, the Tag Line at 2xl, the badge and Tag Line 20px in. Proves the `md` step.
9. Home page at 390, full page, the Block at rest: the panel inside 40px margins with 20px padding, one portrait 3x4 card filling the panel's inner width, the Eyebrow, heading at 4xl, card and pills stacked with 30px between them. Proves the mobile stack.
10. Home page at 390, viewport, after a swipe of one card width: the second Case Study in place. Proves touch drives the row.
11. Home page at 1600 with reduced motion emulated, viewport, immediately after pressing Next: the second Case Study already in place, no intermediate frame. Proves the reduced-motion jump.
12. Served HTML of the Home page: a list of six items each one link, the Block's heading an `h2`, the Tag Line a paragraph with its italic Highlight and no link or heading inside it, no inline styles beyond the picture component's ratio property, the Slides in a row. Proves the before-script state and the markup.
13. DOM of the Home page after scripts run at 1600: the row a region, each Slide a group with its position announced, the Thumbnail with an empty alt, the Logo's alt the Case Study's title, the Controls real buttons, no `aria-label` on the links. Proves the accessibility story.
14. Home page at 1600, keyboard: tab from the Service Carousel to the third Slide's link: the row slides so the third Case Study is centred. Proves focus brings a Slide into view.
15. Home page at 1600 with a temporary two-Case-Study Seed: no loop, Previous dimmed on the first Slide and Next dimmed on the last. Then a one-Case-Study Seed: one static centred card, no Controls. Removed afterwards. Proves the loop threshold and the single-Slide rule.
16. Home page at 1600 with a Case Study's Thumbnail, Logo, Tag Line and Category each temporarily removed in turn: the card on solid black, without a logo, without text, without a badge, still in the row. Restored afterwards. Proves the empty states.
17. Control panel, the Block's Case Study picker: only the Case Study section offered, the button reading "Add a Case Study". Proves the field.
18. Seed command output for the Home Seed, run twice: created after the Service Carousel on the first run with six Case Studies resolved, skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- Autoplay, a mousewheel binding, pagination dots or a Slide counter. The Controls and dragging are the only controls.
- A hover change to the image, the shades or the Logo.
- A touch button on the card, or a Cursor Label anywhere else on the site.
- Any change to the Case Study entry type, its content or its URLs.
- A hero-style pin or scroll-driven movement; this Block is the site's Swiper carousel, the Service Carousel is its scroll-driven one.
- A Section Footer, a link to the Case Study listing page or a heading colour option.
- Replacing the two portrait placeholder Thumbnails. They are content.
- Committing the Seed.

## Further Notes

- Swiper, not ScrollTrigger, because the design asks for a row the visitor pages with buttons and drags, resting on whole Slides, which is what a slider does. The Service Carousel stays scroll-driven; the two carousels are different behaviours and each keeps the tool that suits it.
- The Carousel Controls rule: Swiper carousels on this site use the "Previous" and "Next" pills from the button component, creme outline and lilac, never the circle icon buttons the controls component shipped with as a default. It is recorded here rather than as an ADR because it is easy to reverse and not a trade-off.
- The carousel component's `$refs` wiring is why the Controls must live in the component's after-content slot: Alpine scopes refs to the nearest data component, and a button outside the embed would be invisible to it.
- Swiper's loop needs more Slides than it shows at once to have something to wrap; three is the floor with two per view, so two Case Studies page without looping and one renders static.
- Swiper 9 and later loops by reordering real Slides rather than cloning them, so no duplicate links reach a screen reader.
- The node names the Next pill "Primary" but fills it with the Secondary colour token, and the button component's `secondary` colour is that fill, so the component's naming stands.
- The card's 750 by 471 is 1.59, and the standard prefers a common ratio to a pixel-derived one; 16x10 is 1.60, within 0.5% of the design, and joins the named transforms. The nearest existing ratio, 16x9, would have made the card 49px shorter.
- The shade measurements come from the node's two gradient assets: the bottom one is 219px of 471 at 80% black to transparent, the top one 172px at 50%, both rotated so the dark end meets the card's edge.
- The badge's 14px text carries the xs token's tight tracking; the Tag Line's -1.2px at 30px and the heading's -2.48px at 62px are both the tighter tracking token, which the 3xl and 7xl tokens already carry.
- Two of the six seeded Case Studies, Rayban and Better Bathrooms, carry portrait 242 by 408 placeholder Thumbnails. A landscape card upscales and crops them; the review should read past it, and the Thumbnails want replacing with landscape photographs before launch.
- The six Case Studies are three clients each entered twice, with `-2` slugs on the duplicates. They are test content, kept because six Slides is what the design's loop needs to be reviewed.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
