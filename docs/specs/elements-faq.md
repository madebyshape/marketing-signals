# Elements - FAQ

Spec for the FAQ Accordion Block: a heading with the Highlight beside a list of Questions, one per FAQ the editor picked, in a creme panel inside the site margins. Seven Questions render on the page; when the editor picked more, Load More sits beneath them and one click brings in every remaining Question. Opening a Question reveals its Answer in a white panel and closes any other. From the desktop breakpoint the heading Follows: it holds still below the Header while the Questions scroll past it. It is the first Block to pick FAQs, the first use of Sprig on the site, the first caller of the accordion component, and the ninth Block on the Home page, after the Testimonial Grid.

Design: Figma node `9841-19529` in the Marketing Signals file, 1600 wide, a 1520 by 806 group inside the site margins showing six Questions with the second open and Load More beneath. No tablet frame and no mobile frame exist, so the responsive rules below are decisions, not measurements. The People Performance Consulting site's `entriesFaq` Block and its `accordion` component are the reference for the Follow and for an accordion with colour and style options; its Sprig grids are the reference for appending loaded items and swapping the button out of band.

Related: the Testimonial Grid spec, which this Block follows on the Home page and whose sticky header offset this Block shares; the Content Seeding spec, which puts it there; the Error Page spec, whose Button Group the Answer reuses. ADR-0001 does not apply: the Block is in flow beneath the Testimonial Grid. ADR-0002 applies: the Home page content and the FAQs arrive by Seed. No new ADR: Sprig is already installed and nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "FAQ Accordion" section, which gained FAQ, FAQ Accordion, Question, Answer, Load More and Follow during the grilling session; Follow was chosen to keep it apart from the Testimonial Grid's Sink, which also dims.

Branch: feature/elements-faq

## Problem Statement

The Home page design ends its run of Blocks with a creme panel of frequently asked questions: a two-line heading on the left and a stack of questions on the right, one opened to show its answer, with a "Load More Questions" button beneath. Editors have no Block to build it with. The FAQ section and its entry type exist with a title, a text field and a Button Group, but nothing on the site renders an FAQ, no field lets a Block pick them, and the accordion component is stock placeholder markup with no callers, zinc colours, an invalid `summary` outside `details`, a close-on-click-away that no FAQ wants, and element IDs built from the question text that collide as soon as two questions read the same.

## Solution

A FAQ Accordion Block editors can add to any page. It holds a heading in the Section Header and an Entries - FAQ field in the Section Content. It renders as a creme-200 panel with 20px corners set in from the page by the site margins. From `lg` the heading takes the left five columns and Follows as the visitor scrolls; the Questions take the right seven. Below `lg` the heading sits above the Questions in flow. Each Question is a row with a 1px creme-400 line beneath, the FAQ's question in 2xl medium and a 25px outlined circle with a plus on the right. Opening one paints the row white with 20px corners, fills the circle secondary with a minus, and reveals the Answer beneath the question with the FAQ's Button Group under it when one is set; any other open Question closes. The Questions render inside a Sprig component that shows the first seven. When the editor picked more, Load More sits centred 40px beneath the seventh; one click appends every remaining Question in place, dims the button while the request runs, removes it when the Questions arrive, and moves focus to the first new Question. The accordion component is reshaped into the site's design with an options map ready for later variants. The Home page gets one instance with the Figma heading and twelve FAQs, added through the Seed command so the review starts from real content and Load More has five Questions to reveal.

## User Stories

1. As a visitor, I want the site's common questions answered in one place on the page, so that I do not have to get in touch to ask them.
2. As a visitor, I want the panel creme with rounded corners set in from the page edges, so that it reads as one card like the Case Study Carousel and the Video Content panel.
3. As a visitor, I want the heading's highlighted words in the primary colour, so that the key phrase lands.
4. As a visitor, I want to see the question and a plus on every closed row, so that I know each row opens.
5. As a visitor, I want to click anywhere on a row to open it, so that I do not have to hit the circle exactly.
6. As a visitor, I want the open row to turn white with its answer beneath, so that the one I am reading stands out.
7. As a visitor, I want opening one question to close the other, so that the list never grows past what I am reading.
8. As a visitor, I want to click an open row to close it, so that I can tidy the list without opening another.
9. As a visitor, I want the answer to slide open rather than snap, so that the change is easy to follow.
10. As a visitor, I want a question's buttons beneath its answer when it has any, so that I can go straight to the page it points at.
11. As a visitor, I want no question open when the page loads, so that the list is calm until I choose one.
12. As a visitor, I want the first seven questions on the page and a "Load More Questions" button when there are more, so that a long list does not push the rest of the page down.
13. As a visitor, I want one click on Load More to bring in every remaining question, so that I am not clicking through the list seven at a time.
14. As a visitor, I want the loaded questions to appear beneath the seventh without the page jumping, so that I keep my place.
15. As a visitor, I want the question I had open to stay open when more load, so that loading never resets what I was reading.
16. As a visitor, I want the button to dim while the questions load and to disappear once they arrive, so that I know it worked and cannot fire it twice.
17. As a visitor with a mouse, I want the circle to fill when I hover a row, so that I know it is clickable.
18. As a visitor with a large screen, I want the heading to stay on screen below the header while I scroll the questions, so that I always know what I am reading.
19. As a visitor with a large screen, I want the heading to scroll away with the panel once the last question passes, so that it never overlaps what follows.
20. As a visitor with a tablet or phone, I want the heading above the questions and every row full width, so that the questions stay legible.
21. As a visitor who prefers reduced motion, I want answers to appear without sliding, so that nothing moves that I asked not to.
22. As a keyboard user, I want every question to be a focusable button with a visible ring, so that I can open it without a mouse.
23. As a keyboard user, I want focus to land on the first newly loaded question after Load More, so that I do not have to tab back through the list.
24. As a screen reader user, I want each question announced as a button that is expanded or collapsed and its answer as a region named by the question, so that I know what opened.
25. As a screen reader user, I want the questions to be headings, so that I can jump between them.
26. As an editor, I want a FAQ Accordion Block in the Blocks menu, so that I can add it to any page.
27. As an editor, I want the heading to take the Highlight, so that I can pick out words in the accent colour.
28. As an editor, I want to pick FAQs from the FAQ section and order them, so that the rows show the questions I chose in the order I chose.
29. As an editor, I want the Block to refuse an empty FAQs field, so that I cannot publish an empty panel.
30. As an editor, I want a FAQ's title to be its question and its text its answer, so that the entry reads the way it renders.
31. As an editor, I want a FAQ's Button Group to show beneath its answer, so that a question can link off to the page that says more.
32. As an editor, I want a FAQ with no answer left out, so that a half-filled entry never shows an empty row.
33. As an editor, I want the same FAQ usable in any number of FAQ Accordions, so that the Contact page and the Home page can share questions.
34. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
35. As an editor, I want the Home page to already carry this Block with the designed heading and enough FAQs to show Load More, so that I see how it is meant to look.
36. As a developer, I want the Block to reuse the Heading and Padding fields, so that only the FAQs field is created.
37. As a developer, I want the accordion component to carry the site's design with an options map, so that a later colour or style variant is one more entry, not a second component.
38. As a developer, I want the sticky offset to read the header height from the shared map, so that a header change is one edit and the Testimonial Grid shares it.
39. As a developer, I want the Sprig component to take the FAQ IDs and a limit and nothing else, so that any Block that lists FAQs can call it.
40. As a developer, I want the Home page content and the FAQs added by a Seed rather than by hand, so that the review environment is reproducible.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `elementsFaq`, name "Elements - FAQ", colour blue, icon `circle-question`, added to the Blocks field in the General group. Its Content tab follows the three-slot layout with the slots it uses: Section Header holds the Heading field; Section Content holds the Entries - FAQ field with the instructions "One or more FAQs, shown in this order. Seven show at first; the rest load on request." There is no Section Footer: Load More is behaviour, not editor content. Its Settings tab has the Padding field.

**Fields.** One new field. Entries - FAQ, handle `entriesFaq`, an Entries field limited to the FAQ section, minimum one, no maximum, list view, selection label "Add an FAQ", copying Entries - Client's settings otherwise. The FAQ entry type is not changed: its title is the question, its Text field the Answer, its Button Group the Answer's buttons. Its Heading field is not rendered by this Block.

**Shared map.** The shared class map in the global layout gains a `top` entry beside the header's `height` and `paddingTop`, the same two breakpoint values, so a sticky element can rest below the Header without restating the figures. The Testimonial Grid spec makes the same addition; whichever Block is built first lands it and the other reuses it.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding and no horizontal padding, and its content inside the section's content block. The Block keeps only FAQs whose Answer has text; a Block with none renders nothing at all, section included. It has no Alpine data and no script of its own: the accordion component owns the open state and Sprig owns the loading.

**Panel.** A creme-200 panel with a 20px radius inside the site margins, padded 20px at the sides and 40px top and bottom below `lg`, 40px at the sides and 100px top and bottom from `lg`. From `lg` its content is a twelve-column grid with the site's 20px gap: the heading in columns 1 to 5, the Questions in columns 6 to 12, both aligned to the top. Below `lg` the heading sits in flow above the Questions with 40px between.

**Heading.** The heading alternate component as an `h2`, semibold, leading 0.97, tighter tracking, at 4xl, 6xl from `md` and 7xl from `lg`, with the Highlight in the primary colour. Figma's 7xl at 62px with -2.48px tracking is the theme's 7xl with tighter tracking exactly.

**Follow.** From `lg` the heading column is sticky, resting at the header's top offset from the shared map, aligned to the start of the grid row so it can move within the Questions' height. It never dims: no gradient, no wrapper beyond the grid. Below `lg` there is no sticky positioning. Reduced motion changes nothing: nothing here moves on its own.

**Accordion component.** Reshaped in place, keeping the component contract: default params, the merge line, an options map, a classes map, output. The placeholder zinc style is replaced by the site's design as the `base` style, and the map stays so a later variant is one more entry. Params: `items`, each with an `id`, a `heading`, a `content` HTML string and an optional `buttons` list; `visibleIndex`, default none; `style`; `class`. Every DOM id is built from the item's `id` and a caller-supplied prefix, never from the heading text, so two Questions with the same wording never collide and two FAQ Accordions on one page never share an id. Each Question is an `h3` wrapping a `button` with `aria-expanded` and `aria-controls`, whose panel is a `region` labelled by the button. The open state is one value on the wrapper, so opening one closes any other and clicking the open one closes it; there is no close on click-away. The Answer renders through the rich text component at the base size in the black scheme, and the buttons through the Button Group component with its default colours at the base size, 20px beneath the Answer. The collapse animates under motion-safe only.

**Question.** A full-width row: a 1px creme-400 line beneath every Question and one above the first; the button flexes the question text and the toggle apart. The text is 2xl medium with leading 1.2 and tighter tracking, black. The row is padded 22px top and bottom, giving Figma's 75px with the 30px line, and inset 20px at the sides below `md` and 30px from `md`. The toggle is a 25px circle with a 1px black border holding a Font Awesome Sharp Regular `plus` at 10px, hidden from assistive technology; on fine-pointer hover of the row, and while open, it fills secondary with a secondary border and shows `minus`. Colour changes transition over 300ms under motion-safe.

**Open Question.** The open row paints white with a 20px radius, overlapping the line above it by 1px and hiding its own line beneath, so the panel sits on the list the way Figma draws it. Its Answer sits beneath the question row with the same side inset and 30px beneath, so a one-paragraph Answer gives Figma's 149px panel within a few pixels. The buttons, when present, follow the Answer inside the same inset.

**Sprig component.** A new Sprig template, the first on the site, lives in a Sprig templates folder beside the components. It takes three variables: the FAQ IDs in the Block's order as a comma-separated string, an `offset`, default zero, and a `limit`, default seven, plus the Block's id for the DOM prefix. It queries the FAQ section for those IDs in fixed order with the offset and limit, keeps the ones with an Answer, and renders them through the accordion component inside a list element with a known id. Beneath the list, when the offset plus the rendered count is short of the total, it renders Load More: the button component as a `button`, secondary, base size, label "Load More Questions", icon Sharp Regular `arrow-down`, centred, 40px beneath the last Question. The button carries the Sprig attributes: the offset of seven, no limit, the list as target, the Questions as the selection, append as the swap, and itself as the loading indicator so it dims to half opacity and ignores clicks while the request runs. The response's button wrapper swaps out of band with an empty one, so Load More disappears once every Question is on the page. Because the appended Questions land inside the accordion's existing wrapper, Alpine initialises them into the same open state and the Question the visitor had open stays open. After the swap, focus moves to the first appended Question's button. A Block with seven or fewer FAQs renders no button and makes no request.

**Responsive summary.** Below `lg`: panel padded 20px by 40px, heading in flow at 4xl or 6xl, Questions full width with a 20px inset below `md` and 30px from `md`. From `lg`: panel padded 40px by 100px, five and seven columns, heading 7xl and Following.

**Empty states.** A FAQ without an Answer is skipped, in the page and in the Sprig count alike, so Load More never appears for Questions that would render nothing. A FAQ without buttons drops the Button Group. A Block whose FAQs all lack an Answer renders nothing.

**Home page content.** One FAQ Accordion Block after the Testimonial Grid in the Home page's Blocks, padding Top and Bottom; when the Testimonial Grid is not yet on the page the Seed appends the Block instead, as the Seed command does for a missing `after`. Heading "The Answers to <em>Your Questions</em>", which wraps to Figma's two lines in the five columns. Twelve FAQs in this order, each a FAQ entry created by its own Seed: the six Figma questions, "What does a digital marketing agency do?", "How long does digital marketing take to work?", "What should I look for in a digital marketing agency?", "How is AI changing digital marketing?", "How much does Digital Marketing cost?" and "Can you help me rank higher on Google?", then the same six again with distinct slugs suffixed `-2` and identical titles, because an Entries field cannot pick one entry twice and a visible "(2)" would not look like the design. The "How long" Answer is Figma's paragraph: "PPC campaigns can generate results within weeks, while SEO and digital PR typically take 3–6 months to achieve measurable improvements. Long-term growth usually develops over 6–12 months as strategies are optimised and authority increases." The other five Answers are short plausible paragraphs written for the Seed. "Can you help me rank higher on Google?" carries one button, "Let's Work Together", linking to the Contact Us page, so the Button Group can be seen. The Seeds live under the scratch folder and are not committed.

**Docs.** `CONTEXT.md` gained the FAQ Accordion vocabulary during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Home page through the global layout, with the Block seeded beneath the Testimonial Grid. The Sprig request is part of the same seam: it is driven by clicking Load More in the browser and proven by what appears on the page. The accordion component's reshape and the shared map's `top` entry are proven through it; the styleguide gains nothing here.

**What good evidence looks like.** It shows what a visitor would see: the panel at rest with seven closed Questions and Load More, a Question open in its white panel with its Answer and buttons, the heading held below the Header mid-scroll, the list after Load More with twelve Questions and no button, and the stacked layouts. Fixed widths, one state per file, after-only because the Block did not exist before. Numeric checks such as row heights and insets are reported as a table in the PR body, not captured as dumps.

**Evidence plan.**

1. Home page at 1600, viewport, scrolled so the Block's top is just below the Header: the panel with the heading on two lines with the Highlight, seven closed Questions with plus toggles, and Load More centred beneath. Compared against the Figma node. Proves the panel, the grid and the seven-Question limit.
2. Home page at 1600, viewport, the second Question opened: white panel with rounded corners over the lines, secondary circle with minus, the Answer beneath. Compared against Figma's open row. Proves the open state.
3. Home page at 1600, viewport, the sixth Question opened: its Answer with "Let's Work Together" beneath. Proves the Button Group in an Answer.
4. Home page at 1600, viewport, scrolled 400px past the Block's top with a Question open: the heading held below the Header beside the lower Questions. Proves the Follow holds.
5. Home page at 1600, viewport, scrolled so the panel's bottom edge is on screen: the heading has scrolled up with the panel and does not overlap the Footer. Proves the Follow ends with the panel.
6. Home page at 1600, viewport after clicking Load More, with the second Question still open: twelve Questions, no button, the second still white. Proves Load More appends, keeps the open state and removes itself.
7. Home page at 1600, the fourth Question hovered: the circle filled secondary. Proves the hover.
8. Home page at 1024, viewport at the Block's top: the five and seven columns at the smallest width they exist. Proves the `lg` step.
9. Home page at 768, full page cropped to the Block: heading in flow above full-width Questions with the 30px inset. Proves the `md` inset and that the Follow is off.
10. Home page at 390, full page cropped to the Block: heading at 4xl, Questions with the 20px inset, Load More beneath. Proves the mobile layout.
11. Home page at 1600 with `prefers-reduced-motion: reduce` emulated, a Question opened: identical to line 2. Proves reduced motion changes nothing visible.
12. Seed command output for the twelve FAQ Seeds and the Home Seed, each run twice: created on the first run, skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- An Eyebrow, text or Section Footer on the Block. Figma shows a heading alone.
- Loading seven Questions at a time. One click loads the rest.
- Falling back to the latest FAQs when the field is empty, as the reference site does. The field requires one.
- More than one Question open at once.
- The Follow below `lg`, or a fade like the Sink.
- FAQ pages or URLs. The section has none.
- Rendering the FAQ entry type's Heading field.
- FAQPage structured data for search engines. A later spec if SEO asks for it.
- A colour or style choice for editors. The options map is ready; no field drives it yet.
- A styleguide preview for the Block or the reshaped accordion. Blocks are not previewed there and the accordion has one caller.
- Committing the Seeds.

## Further Notes

- Figma's panel inner width is 1440px: twelve columns of 101.67px with 20px gaps. The Questions' left edge at 688px is column 6 exactly, so the five and seven split is read straight from the design.
- The heading's top and the first Question's top are both 100px below the panel's top, so the grid aligns both to the row's start.
- Figma's row is 75px: a 30px line at 2xl plus 22px above and below plus the 1px line. The open panel is 149px: the row, then the Answer's two lines, then 30px.
- Figma names the button "Primary" but colours it #AFAFFF, which is the theme's secondary, as the Testimonial spec also found.
- Figma's toggle icons are Font Awesome Sharp Regular `plus` and `minus` at 10px in a 25px circle; the site loads Font Awesome through its kit, so no icon file is needed.
- The accordion component had no callers, no styleguide preview and stock colours, which is why it is reshaped rather than given a second style.
- Sprig is installed at the standard edition and nothing on the site calls it yet; this Block is its first use, so the Sprig templates folder is created here.
- Duplicate question text in the Seed is deliberate: it proves the DOM ids come from entry IDs, not headings.
- The heading alternate component reads the Highlight from italic or underline in the CKEditor value, so the Seed's heading carries `<em>` for the Highlight.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
