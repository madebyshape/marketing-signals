# FAQ Listing

Spec for the FAQ Listing page: one FAQ Group per FAQ Category between the page's Hero and its Blocks. Each FAQ Group is the FAQ Category's title as a heading beside that Category's Questions, six at first with Load More beneath when there are more. From the desktop breakpoint the heading Follows; below it the heading stacks above the Questions. FAQs and FAQ Categories pull through on their own: the page has no field for them. It reuses the FAQ Accordion's Sprig component and accordion unchanged.

Design: Figma node `9991-15570` in the Marketing Signals file, a group named "Group 46387", 1480 by 1391 at x 40, y 534 inside the 1600 by 4061 frame "Frequently Asked Questions" (`9716:10729`). It shows three FAQ Groups on the creme page background with no panel. "General" has six Questions, the second open, and "Load More Questions" beneath. "Working with Marketing Signals" has five Questions. "Other Questions" has two: "What services do you offer?" and "Where are you based?". No tablet frame and no mobile frame exist, so the responsive rules below are decisions, not measurements.

Branch: feature/faq-listing

Related: the Elements - FAQ spec, which built the FAQ, the Sprig component, the accordion, Load More and the Follow this page reuses; the Playbook Listing spec, the prior art for content between a listing page's Hero and its Blocks; the Content Seeding spec, whose Categories resolver creates the FAQ Categories on first use. ADR-0001 applies: the page has a Hero, which pads for the fixed Header. ADR-0002 applies: the FAQ Categories and their FAQs arrive by Seed. ADR-0003 does not change: FAQs have no pages, so the breadcrumb map gains no line. ADR-0004 applies unchanged: the page's Hero Layout sets the Header Colour. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md` gained a "FAQ Listing" section during the grilling session with FAQ Category, FAQ Listing page and FAQ Group. Question, Load More and Follow were widened to cover the FAQ Group instead of being duplicated.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The FAQs page at `/faqs` already has its Hero ("The Answers to *Your Questions*") and a Banner Gated Content Block, but nothing between them. The design puts every FAQ there, sorted into titled groups, each group with its questions opening in place and a "Load More Questions" button when the list is long. The FAQ section, the FAQ category group and the Categories - FAQ field on the FAQ entry type all exist. The page template has an empty placeholder where the list belongs. The category group holds no categories, and no FAQ is in one. Editors cannot show the site's FAQs in one place without picking each one into a Block by hand.

## Solution

The FAQ Listing page renders one FAQ Group for each FAQ Category that has at least one FAQ to show. Groups follow the category group's structure order. Each FAQ Group is a row on the site's twelve-column grid: the Category's title as a heading in the left five columns, and its Questions in the right seven, in the FAQ section's structure order. The first six Questions render. When the Category holds more, Load More sits beneath the sixth, and one click brings in every remaining Question. Opening a Question reveals its Answer in a white panel and closes any other open Question in the same group. From the desktop breakpoint the heading Follows: it holds still below the Header while its group's Questions scroll past, and it scrolls away with its group. Below that breakpoint the heading stacks above the Questions. The groups sit on the page background with no panel, spaced on the section padding scale. The page is seeded with the three FAQ Categories and the FAQs from Figma so the review starts from the design.

## User Stories

1. As a visitor, I want every FAQ on one page, grouped under clear titles, so that I can find the question I have without searching.
2. As a visitor, I want the groups in a sensible, deliberate order, so that the general questions come first.
3. As a visitor, I want each group's title beside its questions on a large screen, so that I always know which group I am reading.
4. As a visitor, I want a group's title to stay in view while I scroll its questions, so that a long group never loses its heading.
5. As a visitor, I want a group's title to leave with its group, so that two titles never stack on top of each other.
6. As a visitor, I want the first six questions in each group and a "Load More Questions" button when there are more, so that one long group does not push the others off the page.
7. As a visitor, I want one click on Load More to bring in every remaining question in that group, so that I do not click through the list in batches.
8. As a visitor, I want the loaded questions to appear beneath the sixth without the page jumping, so that I keep my place.
9. As a visitor, I want Load More to disappear once the whole group is shown, so that I am not offered a button that does nothing.
10. As a visitor, I want Load More in one group to leave the other groups alone, so that nothing else on the page changes.
11. As a visitor, I want to open a question and read its answer in place, so that I never leave the page.
12. As a visitor, I want opening a question to close the one I had open in the same group, so that the group stays compact.
13. As a visitor, I want opening a question in one group to leave another group's open question alone, so that each group behaves on its own.
14. As a visitor, I want an answer's buttons beneath it when it has any, so that I can act on what I just read.
15. As a visitor on a tablet or phone, I want each group's title above its questions and the questions full width, so that the questions stay legible.
16. As a visitor on a phone, I want the titles at a smaller size, so that a two-line title does not take over the screen.
17. As a keyboard user, I want to tab to each question and open it with Enter or Space, so that I can read every answer without a mouse.
18. As a keyboard user, I want focus to land on the first newly loaded question after Load More, so that I do not have to tab back through the group.
19. As a screen reader user, I want each group's title to be a heading, so that I can jump between groups from the headings list.
20. As a screen reader user, I want each question to announce whether it is open or closed, so that I know what Enter will do.
21. As an editor, I want FAQs to appear on the page as soon as I give them a FAQ Category, so that I never maintain a second list.
22. As an editor, I want to set the order of the groups by dragging the FAQ Categories, so that I control what comes first.
23. As an editor, I want to set the order of questions by dragging FAQs in the FAQ section, so that the most useful question leads each group.
24. As an editor, I want to put one FAQ in two FAQ Categories and see it in both groups, so that I do not duplicate the entry.
25. As an editor, I want an FAQ with no FAQ Category left off the page, so that I can keep an FAQ for a Block without listing it here.
26. As an editor, I want a FAQ Category with nothing to show left off the page, so that an empty heading never appears.
27. As an editor, I want an FAQ without an Answer left off the page and out of the Load More count, so that a half-written FAQ never shows as a dead row.
28. As an editor, I want the Hero and Blocks on the page to keep working as they do, so that the listing sits between them and changes nothing else.
29. As an editor, I want the page already carrying the Figma groups and questions, so that I see how it is meant to look.
30. As a developer, I want the listing to reuse the FAQ Accordion's Sprig component and accordion as they are, so that there is one Question and one Load More to maintain.
31. As a developer, I want the heading's sticky offset to come from the shared header map, so that a Header change is one edit.
32. As a developer, I want each FAQ Group's DOM ids to carry its Category, so that an FAQ in two groups never produces duplicate ids.
33. As a developer, I want the FAQ Categories and their FAQs added by Seed, so that the review environment is reproducible.

## Implementation Decisions

**Page template.** The FAQ Listing page type's template, today the Hero, a `{# FAQs Listing #}` placeholder and the Blocks, gains the FAQ Groups at that placeholder. The `headerColours` map and the `headerColour` line stay as they are (ADR-0004). The groups render in one section embed with `paddingY: 'bottom'` and `paddingYSize: 'base'`, with no top padding. Hero Simple's own bottom padding already gives the 128px at 1600 that Figma draws as 130 above "General", and a top padding would double it. The bottom padding keeps the last Question clear of the Footer when the page has no Blocks. With the Banner Gated Content beneath, it leaves a larger gap than Figma's 150; that is accepted. The FAQ Groups live in the page template, not in a Block: the page has no field for them and editors cannot add a second listing.

**Data.** The page queries the FAQ category group in structure order. For each Category it queries the FAQ section for entries related to that Category, in the FAQ section's structure order. It keeps the ones whose Answer (the FAQ's text) is not empty once tags and whitespace are stripped, which is the FAQ Accordion's rule. A Category with no FAQs left renders no FAQ Group, so no heading appears for it. An FAQ with no Category is never queried and so never shown. An FAQ in two Categories is related to both and so appears in both groups. Only enabled FAQs and Categories appear. Disabled ones are left out by Craft's default status.

**FAQ Group.** A container, one per Category, holding a twelve-column grid with the 20px gap. From `lg` the heading column takes five columns and the Questions seven, aligned to the row's start. Below `lg` both take all twelve and the heading sits above the Questions with 40px beneath it. The split is the FAQ Accordion's, now across the full content width inside the site margins, so the Questions run from column 6 to the right margin. Figma's Questions stop 40px short of the right margin; that is the Block's panel inset carried over without the panel, and it is not followed.

**Heading.** The heading alternate component as an `h2` carrying the Category's title, `text-4xl` below `md` and `md:text-5xl` from `md`, semibold, leading 0.97, tracking tighter, black. That is Figma's 46px at 1600, smaller than the FAQ Accordion's 7xl because the listing has no panel and several groups. A Category title has no Highlight: Categories have only a title field. "Working with Marketing Signals" wraps naturally in the five columns. Figma's hard break after "with" is not reproduced.

**Follow.** From `lg` the heading column is sticky at the header's top offset from the shared map, the same entry the FAQ Accordion uses. Because the grid row is the sticky element's containing block and the heading aligns to the row's start, each heading stops at the bottom of its own group and scrolls away before the next group's heading arrives. The two can never overlap. Below `lg` the heading is in flow. Nothing dims or moves on its own, so reduced motion changes nothing.

**Questions.** The Questions column calls the existing FAQ Sprig component with three variables. The first is the Category's FAQ ids in order, as a comma-separated string. The second is `limit: 6`. The third is a prefix built from the page's entry id and the Category's id, so the accordion's item ids and the Load More wrapper id are unique even when one FAQ appears in two groups. The Sprig wrapper gets the prefix plus `-sprig` as its id, the FAQ Accordion's pattern. The component is not changed: its `limit` default of seven stays for the FAQ Accordion. Its Load More already clears `limit` on the request, so one click appends every remaining Question in the group and swaps the button out of band. Its focus handling already moves focus to the first appended Question. The accordion, Question row, open panel, toggle, Answer and Button Group render exactly as in the FAQ Accordion, on the page's creme 100 background. Figma's rows are creme 100 with a creme 400 line, the same as the Block's.

**Load More.** Rendered by the Sprig component as it is, with the label "Load More Questions", secondary colour, the Sharp Regular `arrow-down` icon, centred 40px beneath the last Question. It shows only for a group with more than six Questions to show. Each group's button targets only its own list.

**Accordion scope.** Each FAQ Group is its own accordion instance, so opening a Question closes any other open Question in that group only. Every Question starts closed. Figma's open second Question is a demonstration of the open state.

**Spacing between groups.** The FAQ Groups are stacked with `space-y-16 | lg:space-y-20 | xl:space-y-24 | 2xl:space-y-32`, the section padding scale. That gives 128px at 1600, against Figma's 130 from the bottom of one group (Load More or its last Question) to the top of the next. Keeping the groups on the section scale means the gaps between groups and the gap above the first group step down together at every breakpoint.

**Empty page.** With no FAQ Category that has an FAQ to show, the section renders nothing at all. The page is the Hero then the Blocks, as today.

**Glossary.** `CONTEXT.md` gained the FAQ Listing section with FAQ Category, FAQ Listing page and FAQ Group. Question now belongs to a FAQ Accordion or a FAQ Group and closes others in the same list. Load More and Follow now name the FAQ Group.

**Review content.** Seeds in the scratch folder for this spec, not committed. The three FAQ Categories are created by the Categories resolver on first use, in this order: General, Working with Marketing Signals, Other Questions. The category group's structure order therefore matches Figma. The twelve existing FAQs get their `categoriesFaq` field set by one Seed each, targeting the FAQ by slug. General gets the six original FAQs and "can-you-help-me-rank-higher-on-google-2", seven in all, so Load More shows one more. Working with Marketing Signals gets the other five `-2` FAQs, the five Figma draws. Two new FAQ Seeds create "What services do you offer?" and "Where are you based?" in Other Questions, each with a short plausible Answer written for the Seed. The FAQ section's structure order already puts the originals before their `-2` copies. The Home page's FAQ Accordion is left untouched: it picks FAQs by id, and a Category does not change that.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus the Seed output.

**Seams.** The single seam is the rendered FAQ Listing page at `/faqs` through the global layout, with the three FAQ Categories and their FAQs seeded. The page template, the reused Sprig component, the accordion and the Follow are all exercised there. The Load More request is driven by clicking in the browser and proven by what appears on the page. The Seed command's output is supporting evidence. Nothing is added to the styleguide and no new seam is introduced.

**What good evidence looks like.** It shows what a visitor would see:
- three groups in order with their headings beside their Questions;
- six Questions and Load More under General;
- a Question open in its white panel;
- the heading held below the Header mid-scroll, and released at its group's end;
- General after Load More with seven Questions and no button;
- the stacked layout at a tablet and a phone.

Fixed widths, one state per file. The before for every line is `/faqs` on `main` at the commit the branch forked from, which renders the Hero then the Banner Gated Content with nothing between. Tablet is captured because the heading gains an `md:` size.

**Prior art.** The Elements - FAQ spec's evidence plan, which proved the same accordion, Load More and Follow in a Block, and the Playbook Listing spec's, which proved content between a listing page's Hero and its Blocks.

**Evidence plan.**

Screenshots:

1. `/faqs` at 1600, full page, resting: three FAQ Groups in the order General, Working with Marketing Signals, Other Questions. Each heading is at 46px in columns 1 to 5, top-aligned with its first Question in columns 6 to 12. General shows six closed Questions and "Load More Questions" centred 40px beneath. Working with Marketing Signals shows five Questions and no button; Other Questions shows two. There is about 128px from the Hero text to General and between groups, then the Banner Gated Content. Compared against the Figma node. Proves the desktop layout, the order, the six-Question limit and the spacing.
2. `/faqs` at 1600, viewport, General's second Question open: the white 20px-cornered panel with the secondary minus toggle and the Answer. Proves the open state.
3. `/faqs` at 768, full page: each heading at 46px above its full-width Questions with 40px between, Load More under General. Proves the stacked layout and the `md` heading size.
4. `/faqs` at 390, full page: each heading at 40px above its Questions, Load More under General. Proves the mobile layout.

States checked on the site and reported:

5. `/faqs` at 1600, viewport, scrolled so General's Questions pass the Header: "General" held below the Header beside its lower Questions. Proves the Follow.
6. `/faqs` at 1600, viewport, scrolled to the boundary between General and Working with Marketing Signals: "General" has scrolled away with its group before "Working with Marketing Signals" arrives, and the two never overlap. Proves the Follow ends with its group.
7. `/faqs` at 1024: the five and seven columns at the smallest width they exist, headings still Following. At 1023 the headings are stacked and in flow. Proves the `lg` step.
8. `/faqs` at 1600, clicking General's Load More with its second Question open: seven Questions, no button, the second still open, focus on the seventh Question. The other groups are unchanged. Proves Load More appends, removes itself, keeps the open state, moves focus and is scoped to its group.
9. `/faqs` at 1600, opening a Question in General and then one in Working with Marketing Signals: both stay open, and opening a second in General closes the first. Proves each group is its own accordion.
10. Keyboard at 1600: tab reaches every Question and Load More with a visible focus ring; Enter and Space toggle a Question; `aria-expanded` follows the state; each group heading is an `h2`. Proves keyboard and screen reader access.
11. Markup: no duplicate ids on the page, with one FAQ temporarily given a second FAQ Category (removed afterwards) so it renders in two groups. Proves the per-Category prefix.
12. One General FAQ's Answer temporarily cleared (restored afterwards): General shows six Questions and no Load More. Proves Answers are checked before counting.
13. Other Questions' two FAQs temporarily given no Category (restored afterwards): no "Other Questions" heading. Every Category emptied in turn: nothing between the Hero and the Banner Gated Content. Proves the empty group and the empty page.
14. The Seeds run twice: Categories created and fields set on the first run, skipped or unchanged on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- A Category Filter, tabs or a search box on the page.
- Loading six Questions at a time. One click loads the rest of a group.
- Putting FAQs with no FAQ Category into Other Questions automatically.
- A Highlight, a hard line break or any field beyond the title on a FAQ Category.
- One open Question across the whole page. Each group is its own accordion.
- A Listing Header on the page. The Hero carries the heading and text.
- A creme panel behind the groups, as the FAQ Accordion has.
- Changing the FAQ Sprig component, the accordion or the FAQ Accordion Block.
- FAQ pages or URLs, and a breadcrumb line for FAQs.
- FAQPage structured data for search engines.
- Committing the Seeds.

## Further Notes

- At 1600 the page's content width is 1520, twelve columns of 108.33 with 20px gaps. Column 6 starts at 681.67 from the page's left edge, 6px left of Figma's 688. Figma's 688 is column 6 inside the FAQ Accordion's 1440 panel, copied here without the panel.
- Figma's row is 75px and its open panel 149px, the FAQ Accordion's measurements. The accordion already produces both.
- Figma's heading and first Question share their top edge, which the grid row's start alignment gives.
- Figma's vertical gaps at 1600: Hero text to General 130, General's Load More to the next heading 130, Working with Marketing Signals' last row to Other Questions 130, the last row to the Banner Gated Content 150, Banner to Footer 40.
- Figma names the button "Primary" but colours it #AFAFFF, the theme's secondary, as the Elements - FAQ spec also found.
- The FAQ entry type already carries the Categories - FAQ field, sourced from the FAQ category group, and the FAQ Listing entry type already carries a tip that FAQ Entries pull through on their own. No project config changes are needed.
