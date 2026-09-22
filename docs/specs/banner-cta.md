# Banner CTA

Spec for the Banner CTA Block: a black panel inside the site margins with a heading with the Highlight, a short text and a Button on its right, a Cutout of a team member standing on its bottom edge and rising above its top on its left, and the Squiggle in fluro drawing itself in behind the content at the bottom right. It is the first Block with a Cutout, the first caller of the Squiggle in a colour other than black-200, and the first Block reviewed on the About page.

Design: Figma node `9929-15518` in the Marketing Signals file, 1600 wide: a 1520 by 501 panel at x 40 with 20px corners. The node also carries the top of the next section ("Insights" and its rule), which is not part of this Block. No mobile node and no hover node exist, so the responsive rules are decisions, not measurements.

Branch: feature/banner-cta

Related: the Video Content spec, whose Squiggle placement and trigger this Block reuses; the Global Footer spec, whose Footer CTA is the nearest existing card of a heading, text and Button on a dark panel; the Content Seeding spec, which puts the review content on the About page. ADR-0001 does not apply: the Block is in flow beneath the page's Hero. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Banner CTA" section, which gained Banner CTA and Cutout during the grilling session; the Highlight, the Squiggle and the Block slots are as already defined.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A page such as About Us ends its story with nothing that points the visitor somewhere. The Footer CTA is the same on every page and cannot carry a page's own message, and no Block puts a person beside a heading and a single Button on a dark panel. An editor who wants to say "come and work with us" at the bottom of the About page, with a face to go with it, has nothing to reach for.

## Solution

A new Block, Banner - CTA, that an editor adds to any page with a Blocks field and fills with a heading, a text, a Button and an image. On the page it is a black panel with 20px corners inside the site margins. From the wide desktop breakpoint the panel holds the design: the Cutout, 393px wide, stands 120px in from the panel's left edge with its feet on the panel's bottom edge and its head 153px above the panel's top; the heading at 75px semibold in creme-100 with the Highlight in secondary, then 30px, the text at 18px in creme-100, then 30px, the creme-100 pill Button, all starting at column 6 of the twelve-column grid, at most 778px wide and centred vertically with 120px above and below; and the Squiggle in fluro at the panel's bottom right, overhanging the corner and clipped by the panel, drawing itself in as the panel scrolls into view. Below the wide desktop breakpoint the Cutout sits above the content, still rising above the panel's top, and the heading steps down through the smaller sizes. One Banner CTA is seeded on the About page with the node's copy and the node's Cutout so the Block can be reviewed against the design.

## User Stories

1. As a visitor, I want a clear invitation at the end of the About page, so that I know what to do next.
2. As a visitor, I want a photograph of a real person beside the invitation, so that the agency feels like people rather than a logo.
3. As a visitor, I want that person to stand out of the panel rather than sit in a box, so that the Block feels designed rather than templated.
4. As a visitor, I want the key words of the heading in the brand lilac when the editor marks them, so that the panel reads with the same voice as the rest of the site.
5. As a visitor, I want a short line of text under the heading, so that the invitation has a reason.
6. As a visitor, I want one obvious Button, so that I do not have to hunt for the link.
7. As a visitor, I want the Button to look and behave like every other pill on the site, so that I recognise it as a link.
8. As a visitor, I want the fluro zig-zag to draw itself in as I scroll, so that the panel arrives with some life.
9. As a visitor with reduced motion on, I want the zig-zag already drawn, so that nothing moves without my say so.
10. As a visitor, I want the zig-zag clipped by the panel's corners, so that it never spills onto the page.
11. As a visitor on a phone, I want the person above the words, so that neither is squeezed.
12. As a visitor on a phone, I want the person still rising above the panel, so that the Block keeps its character at every width.
13. As a visitor on a phone, I want the heading smaller so it fits, so that no word breaks mid-way.
14. As a visitor on a laptop, I want the stacked layout when the panel is too narrow for both, so that the heading never wraps into the person.
15. As a visitor, I want the text to stop at a readable width, so that a line never runs the whole panel.
16. As a visitor, I want the Button to stay its own width, so that it never stretches into a bar.
17. As a keyboard user, I want the Button to be a real link I can tab to, so that I can follow it without a mouse.
18. As a screen reader user, I want the heading as a real heading and the Button as a link with its label, so that the panel reads in order.
19. As a screen reader user, I want the person's photograph and the zig-zag treated as decoration, so that nothing meaningless is announced.
20. As an editor, I want to add a Banner - CTA Block to any page with a Blocks field, so that the panel is not tied to one page type.
21. As an editor, I want to set a heading, so that the panel carries my message.
22. As an editor, I want to mark words in the heading italic to make them lilac, so that the Highlight works the way it does everywhere else.
23. As an editor, I want a simple rich text for the text, so that I can add a link or bold a word without a full editor.
24. As an editor, I want to set the Button's label and where it goes, so that the invitation leads somewhere I choose.
25. As an editor, I want to upload one image, so that the panel has a person on it.
26. As an editor, I want the image field to tell me it needs a cutout with a transparent background, so that I do not upload a rectangle that looks wrong.
27. As an editor, I want to leave the image out and keep the panel, so that the Block still works as a text banner.
28. As an editor, I want the content to move to the panel's left when there is no image, so that the panel does not have an empty half.
29. As an editor, I want to leave the text or the Button out and lose only that part, so that I am not forced to fill everything.
30. As an editor, I want the Block to show nothing when it has no heading, so that an unfinished Block leaves no empty panel behind.
31. As an editor, I want the Padding setting the other Blocks have, so that I control the space around the panel.
32. As an editor, I want to see the Block's name and a wide-rectangle icon in the Block picker, so that I can find it.
33. As a developer, I want the Squiggle component to gain a fluro colour rather than the Block styling it by hand, so that the next Block that needs a fluro Squiggle has it.
34. As a developer, I want the image through the picture component with a transform, so that the Cutout is sized and lazy-loaded like every other image.
35. As a developer, I want the Block to follow the Block scaffold, so that it reviews like every other Block.
36. As a reviewer, I want the review content seeded on the About page by the Seed command, so that I compare the page with the Figma node without touching the control panel.
37. As a reviewer, I want before and after screenshots at the fixed widths, so that the evidence stands on its own.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `bannerCta`, name "Banner - CTA", colour blue, icon `rectangle-wide`, no title field, added to the Blocks field in the General group. Its Content tab follows the three-slot layout: a Section Header heading element with the Heading field, the Rich Text - Simple field with the handle `text` and label "Text", and the Button field; a Section Content heading element with the Image field, with the instructions "A cutout with a transparent background. It stands on the banner's bottom edge and rises above its top." There is no Section Footer. Its Settings tab has the Padding field.

**Fields.** None created. Heading, Rich Text - Simple, Button, Image and Padding are reused unchanged; Rich Text - Simple takes the `text` handle override, as thirteen other layouts already do.

**Block template.** Lives with the other Blocks so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding as vertical padding and no horizontal padding, the site margin applied by the Block itself as Video Content does. It reads the heading, the text, the Button and the single image. It renders when there is a heading, and nothing at all otherwise, section included. It has no Alpine data of its own: the Squiggle owns the only behaviour.

**Panel.** One relative wrapper inside the site margins, black with 20px corners, not clipped, so the Cutout can rise above it. Inside it, an absolutely placed clipping layer covering the panel with the same corners and overflow hidden holds the Squiggle; the Cutout and the content sit on the panel itself, above the clipping layer. This is the only arrangement in which the Squiggle is clipped by the corners while the Cutout overhangs the top.

**Squiggle.** The Squiggle component gains a `fluro` colour option beside `black-200`. The Block includes it inside the clipping layer at the bottom right, 34% of the panel's width, shifted 28% right and 40% down so the panel clips it to the node's 373 by 168 visible corner, the same placement the Video Content Block uses. The Block's own section is passed as the trigger, since a Squiggle hanging off the panel's edge never reaches its own end. It draws in on scroll and is fully drawn under reduced motion, as the component already does.

**Cutout.** Rendered through the picture component with the `3x5` transform, which is the node's 393 by 654 box exactly, cropped from the top so the head is never cut; the node crops the bottom 13% of the photograph the same way. It is decoration: empty alt. From the wide desktop breakpoint it is absolutely placed, 393px wide, its left edge 120px in from the panel's left and its bottom on the panel's bottom edge, so its top rises 153px above the panel's top. The panel's bottom edge is where the Cutout ends, so nothing shows below the panel. Below the wide desktop breakpoint it is in flow above the content, left aligned with the content's inset, 60% of the panel's width capped at 393px, pulled up so its top rises above the panel's top: 60px on mobile and 100px from `xl`.

**Content.** From the wide desktop breakpoint a twelve-column grid across the panel with the site's 20px gap; the content starts at column 6 and is at most 778px wide, which leaves the node's 100px to the panel's right edge, with 120px above and below. Inside, in order: the heading through the heading component that renders the Highlight, `h2`, `9xl`, creme-100, the Highlight in secondary; then 30px; the text through the rich text component at the `md` size in creme-100; then 30px; the Button through the button component in creme-100 with its default arrow-up-right icon, its own width, never stretched. Below the wide desktop breakpoint the content keeps its 778px max width and sits beneath the Cutout with 25px insets on mobile and 40px from `md`, with the same 30px gaps. The heading is `5xl` on mobile, `7xl` from `md` and `9xl` from the wide desktop breakpoint.

**Breakpoints.** The side-by-side layout applies from `2xl` (1536px). At `xl` (1280px) and below the layout is stacked: the panel is 1200px wide at `xl` and the 75px heading does not fit beside a 393px Cutout. The tablet `md` step changes only the heading size and the insets.

**Empty states.** No image: the content starts at the panel's left inset, 100px from the wide desktop breakpoint to match the right, and the panel keeps the same vertical padding. No text: the heading and the Button with one 30px gap. No Button: the heading and the text. No heading: nothing.

**Responsive summary.** Mobile: stacked, Cutout 60% wide rising 60px above the panel, 25px insets, heading `5xl`. From `md`: 40px insets, heading `7xl`. From `xl`: Cutout rising 100px above the panel. From `2xl`: the design, side by side, Cutout at 120px in and 393px wide, content from column 6, heading `9xl`.

**About page content.** One Banner - CTA Block appended to the end of the About Us page's Blocks, padding Top and Bottom: heading "Find Your Next Job" with "At Marketing Signals" as the Highlight, text "We want all our of team members to feel comfortable with whom they work with, in the environment they work, and with the clients we collaborate with.", Button "Explore Open Positions" as a URL link to `/careers`, and the node's Cutout exported during the grilling session. Added with the Seed command from a Seed file under the scratch folder, with the Cutout beside it. The Seed is not committed.

**Branch.** `Branch: feature/banner-cta`. The tickets share it and the factory keeps one PR, code-reviewed against the spec before merge.

**Docs.** `CONTEXT.md` gained Banner CTA and Cutout during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests, captured per the evidence doc.

**Seams.** The single primary seam is the About page on the DDEV site, with the seeded Block. The Banner CTA is proven only there: the panel, the Cutout, the Squiggle, the heading, the text and the Button all show on that page. The secondary seams are the Seed command's own output and the served HTML. The Squiggle's unchanged black-200 rendering is proven on the Footer, since the colour option touches the component. Nothing is committed to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the person standing out of the panel, the zig-zag drawn in, the stacked panel on a phone. Fixed widths, one state per file, before and after pairs on the PR. The before for the About page is the page without the Block; the before for the Footer is its Squiggle as it renders today.

**Evidence plan.**

1. About page at 1600, the Block scrolled fully into view, viewport: the panel at 1520 by 501 with 20px corners; the Cutout 393px wide, 120px in, standing on the bottom edge and rising 153px above the top; the heading at 75px with "At Marketing Signals" in secondary starting at column 6; the text 30px below; the Button 30px below that; 120px above and below the content; the Squiggle in fluro fully drawn in the bottom right corner, clipped by the corner. Compared against the Figma node. Proves the desktop layout.
2. The same page at 1600, captured as the panel's top enters the viewport: the Squiggle part drawn. Proves the scroll-linked draw.
3. The same page at 1600 with reduced motion emulated: the Squiggle fully drawn on arrival. Proves the reduced-motion rule.
4. The same page at 1600, the Button hovered: the pill in its hover state. Proves the Button is the shared component.
5. The same page at 1280, full page: the stacked layout, the Cutout above the content rising 100px above the panel, the heading at `7xl`. Proves the `xl` stacked layout.
6. The same page at 768, full page: the Cutout above the content, 40px insets, the heading at `7xl`. Proves the `md` step.
7. The same page at 390, full page: the Cutout 60% wide rising 60px above the panel, 25px insets, the heading at `5xl`, the Button at its own width. Proves the mobile layout.
8. The same page at 1600 with the image temporarily removed: the content at the panel's left inset, the Squiggle unchanged. Restored afterwards. Proves the no-image state.
9. The same page at 1600 with the Button temporarily cleared: the heading and the text alone. Restored afterwards. Proves the no-Button state.
10. Served HTML of the About page: an `h2` for the heading, the text as paragraphs, one `a` with the Button's label, the Cutout with an empty alt, and the Squiggle's SVG hidden from assistive technology. Proves the markup.
11. Home page at 1600 scrolled to the Footer, before and after: the Footer's Squiggle in black-200 unchanged. Proves the colour option changed nothing.
12. Seed output for the About page Seed, run twice: the Block created with the Cutout uploaded, then skipped with the Cutout reused. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- An Eyebrow, a Rule or a Button Group. The heading, the text and one Button are the whole call to action.
- A second image, an Avatar Group or a video in the panel.
- Enforcing a transparent background on the image beyond the field's instructions.
- A colour or layout option on the Block. It is black with the Cutout on the left.
- Changing the Squiggle's shape, motion or placement in the Footer and the Video Content Block.
- A dedicated mobile design. The responsive rules follow the decisions above until a mobile node exists.
- A careers listing page. The Button's link is the editor's to set.
- Committing the Seed or the Cutout.

## Further Notes

- The node's content starts at x 682 on the 1600 frame, which is column 6 of a twelve-column grid across the 1520 panel with 20px gaps, and its 778px width is not a column count, so it is a max width.
- The heading's 75px, 0.97 leading and -3px tracking are the `9xl` token exactly: -0.04em at 75px is -3px.
- The Cutout's box is 393 by 654, which is 3:5 to three decimal places, which is why the transform is `3x5` rather than a one-off ratio.
- The Squiggle's full vector in the node is 518 by 280, the component's own 1196 by 647 proportions, so the corner is the component clipped and not a different shape.
- The Figma Cutout was exported during the grilling session as a 1091 by 2047 transparent PNG and sits with the Seed under the scratch folder, since the Figma asset URLs expire in seven days.
