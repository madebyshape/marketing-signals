# Banner Gated Content

Spec for the Banner - Gated Content Block: a black panel inside the site margins with an Eyebrow, a heading with the Highlight, a short text and an email capture row on its right, and a Cutout standing on the panel's bottom edge and rising above its top on its left. It is the second Block with a Cutout after the Banner CTA, the first Block to carry a form, the first caller of the input component, and the first Block reviewed on the Playbook Listing page.

Design: Figma node `9974-15552` in the Marketing Signals file, 1600 wide: a 1520 by 619 panel at x 40 with 20px corners. No mobile node and no hover node exist, so the responsive rules are decisions, not measurements.

Branch: feature/banner-gated-content

Related: the Banner CTA spec, whose panel, Cutout mechanism and breakpoint reasoning this Block reuses and whose decisions are not repeated here; the Content Seeding spec, which puts the review content on the Playbook Listing page. ADR-0001 does not apply: the Block is in flow beneath the page's Hero. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md` gains Banner Gated Content and the Gate during this spec; the Highlight, the Cutout and the Block slots are as already defined.

The branch is code-reviewed against this spec before merge.

## Problem Statement

Marketing Signals publishes playbooks and checklists as downloadable PDFs, and has nowhere on the site to ask for an email address in exchange for one. The Banner CTA sends a visitor to another page, which is the wrong shape for a download: the visitor leaves the page they were reading to fill in a form somewhere else, and the reason they were interested is left behind. An editor who wants to offer a document at the end of the Playbook Listing page, with a face and a list of what is inside, has nothing to reach for.

The form itself is not the problem being solved here. The submission, the delivery of the PDF and the storage of the address are a later piece of work, and the design for them does not exist yet. What is missing today is the panel: the place on the page where the offer is made.

## Solution

A new Block, Banner - Gated Content, that an editor adds to any page with a Blocks field and fills with an Eyebrow, a heading, a text and an image. On the page it is a black panel with 20px corners inside the site margins. From the desktop breakpoint the panel holds the design: the Cutout, 518px wide, stands 48px in from the panel's left edge with its feet on the panel's bottom edge and its head 105px above the panel's top; the Eyebrow at 16px medium in white, then the heading at 75px semibold in creme-100 with the Highlight in secondary, then the text at 18px in creme-100, then the Gate — an email field and a submit pill on one row — all starting at column 6 of the twelve-column grid, at most 778px wide, with 80px above and below. Below the desktop breakpoint the Cutout sits above the content, still rising above the panel's top, the heading steps down through the smaller sizes and the Gate's two pills wrap onto their own rows.

The Gate does not work. The field accepts typing and the pill can be focused and pressed, and nothing happens: there is no form element, no action and no handler. A Form field sits on the Block in the control panel, unused, so that the day the form is wired the relation is already there and no content has to move. One Banner Gated Content is seeded on the Playbook Listing page with the node's copy and the node's Cutout so the Block can be reviewed against the design.

## User Stories

1. As a visitor, I want an offer of a download at the end of the Playbook Listing page, so that I get something for my interest without leaving the page.
2. As a visitor, I want a short label above the heading telling me it is free, so that I know the cost before I read the offer.
3. As a visitor, I want the heading to name the document, so that I know what I would be getting.
4. As a visitor, I want the key words of the heading in the brand lilac when the editor marks them, so that the panel reads with the same voice as the rest of the site.
5. As a visitor, I want a few lines describing what is inside the document, so that I can judge whether it is worth my address.
6. As a visitor, I want a photograph of a real person beside the offer, so that the download feels like it comes from people rather than a form.
7. As a visitor, I want that person to stand out of the panel rather than sit in a box, so that the Block feels designed rather than templated.
8. As a visitor, I want the email field and the submit pill on one row, so that the Gate reads as a single action.
9. As a visitor, I want a paper-plane icon in the field, so that I can see at a glance that it sends something.
10. As a visitor, I want the field to look like it can be typed into, so that the offer does not look broken.
11. As a visitor, I want the submit pill in the brand lilac, so that it is the most prominent thing in the panel.
12. As a visitor, I want the field and the pill to be the same height and aligned on one baseline, so that the row looks deliberate.
13. As a visitor on a phone, I want the person above the words, so that neither is squeezed.
14. As a visitor on a phone, I want the person still rising above the panel, so that the Block keeps its character at every width.
15. As a visitor on a phone, I want the field and the pill stacked at full width, so that neither is too small to hit.
16. As a visitor on a phone, I want the heading smaller so it fits, so that no word breaks mid-way.
17. As a visitor on a laptop, I want the stacked layout when the panel is too narrow for both, so that the heading never wraps into the person.
18. As a visitor, I want the text to stop at a readable width, so that a line never runs the whole panel.
19. As a keyboard user, I want to tab into the field, type, and tab to the pill, so that the Gate is reachable without a mouse.
20. As a keyboard user, I want a visible focus ring on both the field and the pill, so that I know where I am.
21. As a keyboard user, I want pressing the pill to do nothing rather than reload the page, so that I do not lose my place while the form is unbuilt.
22. As a screen reader user, I want the field to have an accessible name even though no label is drawn, so that I know what to type.
23. As a screen reader user, I want the heading as a real heading and the text as paragraphs, so that the panel reads in order.
24. As a screen reader user, I want the person's photograph and the paper-plane icon treated as decoration, so that nothing meaningless is announced.
25. As a visitor using autofill, I want the field typed as an email with the right autocomplete, so that my address is offered to me.
26. As an editor, I want to add a Banner - Gated Content Block to any page with a Blocks field, so that the panel is not tied to one page type.
27. As an editor, I want to set an Eyebrow, so that I can change "Free Download" to whatever the offer is.
28. As an editor, I want to set a heading, so that the panel names my document.
29. As an editor, I want to mark words in the heading italic to make them lilac, so that the Highlight works the way it does everywhere else.
30. As an editor, I want a simple rich text for the text, so that I can write several short lines describing the document.
31. As an editor, I want to upload one image, so that the panel has a person on it.
32. As an editor, I want the image field to tell me it needs a cutout with a transparent background, so that I do not upload a rectangle that looks wrong.
33. As an editor, I want the Block to show nothing when it has no heading, so that an unfinished Block leaves no empty panel behind.
34. As an editor, I want to leave the Eyebrow, the text or the image out and lose only that part, so that I am not forced to fill everything.
35. As an editor, I want the Padding setting the other Blocks have, so that I control the space around the panel.
36. As an editor, I want to see the Block's name and a wide-rectangle icon in the Block picker, so that I can find it.
37. As an editor, I want the Form field grouped with the settings rather than the content, so that I can tell it is plumbing and not something I have to fill in.
38. As a developer, I want the input component to gain the dark pill appearance rather than the Block styling a field by hand, so that the next Block that needs a field on a dark panel has it.
39. As a developer, I want the submit pill to be the shared button component in button mode, so that it hovers and focuses like every other pill without a Link field behind it.
40. As a developer, I want the image through the picture component with a transform, so that the Cutout is sized and lazy-loaded like every other image.
41. As a developer, I want the Block to follow the Block scaffold, so that it reviews like every other Block.
42. As a developer, I want the Form field already on the Block, so that wiring the form later is a template change and not a content migration.
43. As a reviewer, I want the review content seeded on the Playbook Listing page by the Seed command, so that I compare the page with the Figma node without touching the control panel.
44. As a reviewer, I want before and after screenshots at the fixed widths, so that the evidence stands on its own.
45. As a reviewer, I want the styleguide's existing input preview shown unchanged, so that I know the new colour option broke nothing.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `bannerGatedContent`, name "Banner - Gated Content", colour blue, icon `rectangle-wide`, no title field, added to the Blocks field in the General group. Its Content tab follows the slot layout: a Section Header heading element with the Eyebrow field, the Heading field and the Rich Text - Simple field with the handle `text` and label "Text"; a Section Content heading element with the Image field, with the same instructions the Banner CTA uses. There is no Button field and no Section Footer: the Gate is the Block's only action. Its Settings tab has the Form field and the Padding field, in that order.

**Fields.** None created. Eyebrow, Heading, Rich Text - Simple, Image, Form and Padding are reused unchanged; Rich Text - Simple takes the `text` handle override as it does everywhere else.

**The Form field is present and unrendered.** It sits on the Settings tab, not the Content tab, because nothing an editor puts in it has any effect yet. The template does not read it. This is deliberate: when the form is built, the Block gains a renderer and the editor's existing relation is already in place, rather than the Gate's copy having to move out of the template and into fields. The field is not required, and a Block with no form selected renders identically.

**Block template.** Lives with the other Blocks so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding as vertical padding and no horizontal padding, the site margin applied by the Block itself. It reads the Eyebrow, the heading, the text and the single image. It renders when there is a heading, and nothing at all otherwise, section included. It has no Alpine data: nothing on the panel behaves.

**Panel.** The Banner CTA's arrangement, minus the Squiggle. One relative wrapper inside the site margins, black with 20px corners, not clipped, so the Cutout can rise above it. Because there is no Squiggle there is no decoration to clip, so the Banner CTA's absolutely placed clipping layer is not reproduced — the panel is a single element. The containment that keeps the Cutout's negative margin inside the panel is still needed.

**Cutout.** Rendered through the picture component with a new `5x7` transform, cropped from the top so the head is never cut. It is decoration: empty alt. The node's box is 518 by 724, which is 5:7 to three decimal places, which is why it is a named ratio and not a one-off. The transform is added beside the existing ones with the same width steps the other portrait ratios use. From the desktop breakpoint the Cutout is absolutely placed, 518px wide, its left edge 48px in from the panel's left and its bottom on the panel's bottom edge, so its top rises 105px above the panel's top. Below the desktop breakpoint it is in flow above the content, left aligned with the content's inset, 60% of the panel's width capped at 518px, pulled up so its top rises above the panel's top: 60px on mobile and 80px from the tablet step.

**Content.** From the desktop breakpoint a twelve-column grid across the panel with the site's 20px gap; the content starts at column 6 and is at most 778px wide, which leaves 100px to the panel's right edge, with 80px above and below — the node's 619px panel height is content plus that padding, not a fixed height. Inside, in order with a 30px gap between each: the Eyebrow through the eyebrow component in white, no rule and no aside; the heading through the heading component that renders the Highlight, `h2`, creme-100, the Highlight in secondary; the text through the rich text component at the `md` size in creme-100; the Gate. Below the desktop breakpoint the content keeps its 778px max width and sits beneath the Cutout with 25px insets on mobile and 40px from the tablet step, with the same 30px gaps. The heading is the smallest step on mobile, the middle step from the tablet step and the largest from the desktop breakpoint, matching the Banner CTA's ladder.

**The Gate.** A row, not a form. There is no `form` element, no action and no method, so nothing can be submitted and pressing Enter in the field does nothing. It holds two things:

- The email field, through the input component, typed as an email with the address autocomplete. Its placeholder and its accessible name are both the node's "Enter Your Email Address"; since no label is drawn, the name is carried on the field itself rather than by a visually hidden label, and the component's label slot is left empty.
- The submit pill, through the button component in button mode: `type` set to the button element, a literal label rather than a Link field, the secondary colour, and no icon. The component already renders when given a label alone, so no component change is needed. It is not disabled — disabling it would grey it out and break the design — it simply has nothing bound to it.

From the desktop breakpoint the field takes the remaining width and the pill takes its own, with a 10px gap, together filling the 778px content width. Below the desktop breakpoint they stack, each at full width, with the same gap.

**The input component gains a variant.** The input component today has one colour, a light field on white with square corners, a ring, and a label above. The Gate needs a dark pill. The component gains a second colour option for the translucent white fill on a dark panel, and a second size option for the pill: full corners, and the same horizontal and vertical padding and text size as the button component's base pill, so that the field and the pill are the same height on one row. It also gains an optional leading icon, rendered inside the field's box before the text and hidden from assistive technology, which is how the paper-plane appears. The existing colour and size options are untouched, the label and instructions slots keep working, and the component's existing preview must render exactly as it does today. This is the only file outside the Block and its config that the diff touches.

**Breakpoints.** The side-by-side layout applies from `lg` (1024px). Below that the layout is stacked. This differs from the Banner CTA, which splits at `2xl`, and the difference is deliberate rather than accidental: this Block's heading sits in the same 778px column but its action is a short row rather than a wide pill group, so the panel survives the narrower split. The tablet step changes only the heading size, the insets and the Cutout's overhang.

**Empty states.** No Eyebrow: the heading is first and the panel's vertical padding is unchanged. No text: the heading and the Gate with one 30px gap. No image: the content stays in column 6 and the panel's left half is empty. The Banner CTA's "widen the content when there is no image" rule is deliberately *not* reproduced — this Block's composition is built around the Cutout, a full-width gated form is not a design that exists, and writing a second layout for it would be inventing one. No heading: nothing.

**Responsive summary.** Mobile: stacked, Cutout 60% wide rising 60px above the panel, 25px insets, smallest heading, Gate stacked at full width. From the tablet step: 40px insets, middle heading, Cutout rising 80px above the panel. From `lg`: the design, side by side, Cutout at 48px in and 518px wide, content from column 6 with 80px above and below, largest heading, Gate on one row.

**Playbook Listing content.** One Banner - Gated Content Block appended to the end of the Playbook Listing page's Blocks, padding Top and Bottom, carrying the node's copy: the Eyebrow "Free Download"; the heading "The Visibility Playbook" with "Companion Checklist" as the Highlight; the text as the node's paragraphs, which are a summary followed by three short lines describing the document; and the node's Cutout. No form is selected. Added with the Seed command from a Seed file under the scratch folder, with the Cutout beside it. The Seed is not committed. The Cutout is exported from the node during this spec's session, since the Figma asset URLs expire in seven days.

**The seeding is not ticketed.** The Seed file and the Cutout are gitignored and exist only on this machine, so an agent working from its own checkout cannot run them. The Seed is run by hand on the shared branch after the Block's template lands and before the group is queued, so that the group review has content to screenshot. A group queued before the Seed has run reviews an empty page.

**Worktree.** The Block is built in its own worktree with its own DDEV project, because the repository's `main` currently carries uncommitted Playbook Listing work from another session and this Block writes project config. Nothing is staged from outside the Block's own change.

**Docs.** `CONTEXT.md` gains Banner Gated Content and the Gate, edited on the feature branch and not in `main`. No new ADR: every decision here is a template or config change that can be reverted.

## Testing Decisions

There is no test suite. Evidence replaces tests, captured per the evidence doc.

**Seams.** The single primary seam is the Playbook Listing page on the worktree's DDEV site, with the seeded Block. The Banner Gated Content is proven only there: the panel, the Cutout, the Eyebrow, the heading, the text and the Gate all show on that page. The secondary seams are the Seed command's own output and the served HTML. The input component's unchanged light rendering is proven on the styleguide, since the variant touches a shared component. No new seam is introduced: both of these already exist and are already how Blocks are reviewed on this site.

**What good evidence looks like.** It shows what a visitor would see: the person standing out of the panel, the field and the pill level with each other on one row, the stacked panel on a phone. Fixed widths, one state per file, before and after pairs on the PR. The before for the Playbook Listing page is the page without the Block; the before for the styleguide is its input preview as it renders today.

**Evidence plan.**

1. Playbook Listing at 1600, the Block scrolled fully into view, viewport: the panel at 1520 by 619 with 20px corners; the Cutout 518px wide, 48px in, standing on the bottom edge and rising 105px above the top; the Eyebrow, then the heading at 75px with "Companion Checklist" in secondary starting at column 6, then the text, then the Gate, 30px apart; 80px above and below the content. Compared against the Figma node. Proves the desktop layout.
2. The same page at 1600, the Gate cropped close: the field and the pill the same height, aligned on one row, the 10px gap between them, the two together filling the 778px column, the paper-plane inside the field. Proves the Gate's row.
3. The same page at 1600, the field focused: the focus ring on the field. Proves the field is reachable and shows focus.
4. The same page at 1600, the field focused and typed into: the typed address visible in the field. Proves the field accepts input despite the form being unbuilt.
5. The same page at 1600, the submit pill focused: the pill's focus ring. Proves the pill is tabbable.
6. The same page at 1600, the submit pill hovered: the pill in its hover state. Proves the pill is the shared component.
7. The same page at 1600, captured immediately after pressing the submit pill: the page unchanged, no navigation, no reload, the typed address still in the field. Proves the Gate is inert rather than broken.
8. The same page at 1024, full page: the first side-by-side width — the Cutout and the content beside each other, the Gate still on one row, nothing overlapping. Proves the `lg` split at its narrowest.
9. The same page at 1023, full page: the stacked layout one pixel below the split. Paired with the previous capture, proves the breakpoint is where the spec says it is.
10. The same page at 390, full page: the Cutout 60% wide rising 60px above the panel, 25px insets, the smallest heading, the field and the pill stacked at full width. Proves the mobile layout.
11. The same page at 768, full page, only if the diff adds any tablet-step rules: 40px insets, the middle heading. Proves the tablet step.
12. The same page at 1600 with the Eyebrow temporarily cleared: the heading first, the panel's padding unchanged. Restored afterwards. Proves the no-Eyebrow state.
13. The same page at 1600 with the image temporarily removed: the content still in column 6, the panel's left half empty. Restored afterwards. Proves the no-image state is the one the spec chose and not an accident.
14. Served HTML of the Playbook Listing page: an `h2` for the heading, the text as paragraphs, an `input` typed as an email with an accessible name and the address autocomplete, a `button` element that is not a link and not disabled, no `form` element anywhere in the Block, the Cutout with an empty alt, and the paper-plane hidden from assistive technology. Proves the markup and the inertness together.
15. Styleguide at 1600, the input component's preview, before and after: the light field unchanged in appearance, corners, ring and label. Proves the new colour and size options changed nothing existing.
16. Seed output for the Playbook Listing Seed, run twice: the Block created with the Cutout uploaded, then skipped with the Cutout reused. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- **The form working.** No submission, no validation, no success or error state, no storage of the address, no delivery of the PDF, no spam protection, no analytics event. The Gate is markup.
- Rendering the Form field. It is added to the entry type and read by nothing.
- Choosing the form technology. The Form field is Formie because that field already exists; selecting it here is not a decision that the eventual form must be a Formie form.
- A designed error, loading or success state for the Gate. None exist in Figma, and inventing them now would be work thrown away when the real form arrives.
- Client-side email validation or a `required` attribute. Both would produce browser messages on a form that cannot submit.
- A Button, a Button Group or a second action. The Gate is the Block's only action.
- A second image, an Avatar Group or a video in the panel.
- A Squiggle. The node has none, so the clipping layer the Banner CTA needs is not built.
- A colour or layout option on the Block. It is black with the Cutout on the left.
- A no-image layout variant.
- Enforcing a transparent background on the image beyond the field's instructions.
- Changing the input component's existing colour or size, or its label and instructions slots.
- The gated document itself, and any page it might live on.
- A dedicated mobile design. The responsive rules follow the decisions above until a mobile node exists.
- Committing the Seed or the Cutout.

## Further Notes

- The node's content starts at x 682 on the 1600 frame, which is column 6 of a twelve-column grid across the 1520 panel with 20px gaps, and its 778px width is not a column count, so it is a max width. This is the same geometry the Banner CTA uses, which is why the two panels line up when both are on a page.
- The 619px panel height is not authored: 80px of padding, the Eyebrow, three 30px gaps, the two-line heading, the four-line text and the Gate add up to it. Treating it as a fixed height would break the moment an editor writes a longer heading.
- The node's pills are drawn 15px tall in their vertical padding where the shared button component uses 12px. The difference is Figma's cap-height trimming against the component's `leading-none`, not a different pill. The component is the source of truth, as it was for the Banner CTA, and the field's new pill size is matched to the component rather than to the node's pixels.
- The node's text contains an empty paragraph between the summary and the three short lines. The three lines are separate paragraphs, not a list, and are seeded as written rather than converted to list markup.
- The Cutout's box is 518 by 724, which is 5:7 to three decimal places. The Banner CTA's is 3:5. Two portrait ratios now exist, which is one more than ideal; a third should be resisted in favour of reusing whichever is closer.
- The input component has existed with a single colour option and no consumer. This Block is its first, which is why the variant work lands here rather than being done ahead of time.
