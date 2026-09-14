# Blog Longform

Spec for the Longform on a Blog page: the Blog's written body beneath the Blog Hero, with the Table of Contents, the Reading Progress and the Read Time beside it on the left and the Sidebar Card and the Share Buttons beside it on the right. It adopts the `longform` layout component the Career Longform spec builds, adding what a Blog needs on top: the Sidebar Card button's arrow following its link, the Longform's bullet and to-do lists styled to the design, and the Read Time counted from the Longform wherever a Blog shows it. The Longform's text renders now; the nested entries an editor can place inside it (Video, Image, Image Columns, Button Group, Quote) are a later round.

Design: Figma node `9991-15568` in the Marketing Signals file, a group named "Group 46385", 1520 by 728 inside a 1600 frame, for the Google NavBoost Explained Blog. The node shows the top of the Longform only. No tablet or mobile node exists; the responsive rules are the Career Longform spec's decisions, not measurements. The node's Table of Contents entries are placeholder copy and its styling a starting point, per the brief; there is no node for the to-do list.

Branch: feature/blog-longform

Blocked by: the Career Longform spec, branch `feature/career-longform`. This branch is cut from `main` after that one merges, never in parallel with it: the `longform` layout component and the changed Table of Contents, Reading Progress, Read Time and Share Buttons components it adopts do not exist until then.

Related: the Career Longform spec, which owns the layout component, its grid, sticking, breakpoints, Table of Contents, Reading Progress, Sidebar Card, Share Buttons, heading anchors and chunk guard, all adopted here unchanged except where a decision below says otherwise; the Blog Hero spec, whose Blog Meta literal Read Time this spec replaces; the Blog Carousel, Blog Grid, Blog Listing and Featured Blog specs, whose cards show the same Blog Meta; the Content Seeding spec, whose entry `fields` map fills the Longform and the Sidebar Card. ADR-0001 applies: the header is fixed, and the adopted component already clears it. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, whose "Longform" section already names every part of this page; Read Time and Ticked Item were widened during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A Blog page ends at its Blog Hero. The Blog entry already has a Longform field for the article and a Sidebar - CTA field for an offer beside it, and neither reaches the page: a visitor who lands on an article from search sees the headline, the photograph and then the footer. There is no article to read, no way to see what it covers or jump to a section, no sense of how far through it they are, no prompt to download the guide it sells, and no way to share it.

The Read Time is also untrue. The Blog Hero, every Blog Card, every Blog Large Card and the Featured Blog print the same "5 min read" literal on every Blog, because until now Blogs had no content to count.

And the Longform style the Career page is about to get draws lists with the rich text component's default disc bullets and leaves the editor's to-do list as browser checkboxes, where the Blog design draws small round dots and the site already has a tick mark of its own.

## Solution

Beneath the Blog Hero, the Blog page renders the same Longform section as a Career. From the `xl` breakpoint, three columns: on the left, sticking beneath the header, the "Table of Contents" label, the numbered list of the article's H2s with the section being read in Primary and underlined, the Reading Progress filling as the visitor reads, and the Read Time beneath it; in the middle, the article; on the right, sticking the same way, the Sidebar Card and, 50px beneath it, "Share this article" over four round Share Buttons for LinkedIn, Facebook, X and copy link. Below `xl` it is one column: the Table of Contents, the Read Time, the article, the Sidebar Card, the Share Buttons; no bar, nothing sticking.

The Sidebar Card's button carries the arrow its link deserves: a link to a heading further down this page points down, as a Career's "Apply Now" does; a link anywhere else, such as the Blog's "Download the guide", points up and right.

Inside the article, bullet lists are drawn with a 5px black dot 7px before each item and 20px between items. The editor's to-do list uses the same rhythm with a 19px mark in place of the dot: a ticked item shows the site's Ticked Item mark, a Secondary circle with a black tick, and an unticked item an empty circle outlined in Creme 300. Both list styles belong to the shared Longform style, so the Career page picks them up too.

The Read Time is counted from the Longform everywhere a Blog shows it: the Blog Hero, the Blog Card, the Blog Large Card, the Featured Blog and the Longform's own column, as "N min read". A Blog whose Longform has no words shows no Read Time anywhere, just its date.

A Seed fills the Google NavBoost Explained Blog with the node's copy plus four more sections, a to-do list and a switched-on Sidebar Card, so the page can be reviewed against the design.

## User Stories

1. As a visitor, I want the article's text beneath the Blog Hero, so that I can read what the headline promised.
2. As a visitor, I want the article's section headings large and bold, so that I can scan for the part I care about.
3. As a visitor, I want a numbered list of the article's sections beside the text, so that I know what it covers before I commit to it.
4. As a visitor, I want to click a section in that list and be scrolled smoothly to it, so that I can skip to what I came for.
5. As a visitor, I want the section I am reading marked in the list, so that I know where I am in a long article.
6. As a visitor, I want the list to stay beside me as I scroll on a desktop, so that I can jump from anywhere.
7. As a visitor, I want a thin bar that fills as I read and is full at the article's end, so that I know how much is left.
8. As a visitor, I want the read time counted from the article itself, so that a short post and a long guide show different figures.
9. As a visitor, I want the same read time in the hero, on the article's cards and beside the text, so that the figures agree.
10. As a visitor browsing the Insights listing, I want each card's read time to be real, so that I can pick something that fits the time I have.
11. As a visitor, I want a card with no read time to show just its date, so that I am never shown a made-up figure or a stray divider.
12. As a visitor, I want bullet points drawn as small neat dots with even spacing, so that lists are easy to scan.
13. As a visitor, I want a checklist in an article to show which items are ticked, so that I can tell done steps from open ones at a glance.
14. As a visitor, I want ticked items to use the same tick mark as the rest of the site, so that the article feels part of it.
15. As a visitor, I want an offer beside the article, so that I can download the guide the moment I want it.
16. As a visitor, I want faces on that offer, so that I know real people are behind it.
17. As a visitor, I want the offer's button arrow to point where the link goes, so that I can tell a jump down this page from a link elsewhere.
18. As a visitor, I want the offer to stay beside me as I scroll on a desktop, so that I never scroll back up for it.
19. As a visitor, I want to share the article to LinkedIn, Facebook or X in a small window, so that I can pass it on without leaving.
20. As a visitor, I want to copy the article's link in one click and see that it copied, so that I can paste it into a message with confidence.
21. As a visitor, I want the share label to read "Share this article", so that it fits what the page is.
22. As a visitor with a phone, I want the section list and read time above the article and the offer and share buttons after it, so that the text is not pushed down the screen.
23. As a visitor who opens a link to a section, I want to land on that section clear of the header, so that shared section links work.
24. As a keyboard user, I want every list entry, the offer's button and every share button focusable with a visible ring, so that I can use the page without a mouse.
25. As a screen reader user, I want the section list announced as a labelled navigation with an ordered list, so that I know how many sections there are.
26. As a screen reader user, I want each checklist item announced as checked or not checked, so that I get the state sighted visitors see.
27. As a screen reader user, I want the dots, avatars, icons and progress bar kept out of what is read, so that I hear only content.
28. As a visitor who prefers reduced motion, I want section jumps to be instant and the bar to update without easing, so that nothing glides that I asked not to.
29. As a visitor, I want the page to work when an editor has placed a video or quote in the article that the site cannot show yet, so that the page never breaks.
30. As an editor, I want the Longform I write on a Blog to appear on the page, so that the field means something.
31. As an editor, I want every H2 I write to appear numbered in the section list, so that the list keeps itself up to date.
32. As an editor, I want the read time counted for me wherever it shows, so that I never update a number by hand.
33. As an editor, I want a Blog I have not written a Longform for yet to show no read time, so that an unfinished article never claims a length.
34. As an editor, I want the to-do list button in the editor to produce a styled checklist on the page, so that the button I can press does something sensible.
35. As an editor, I want to switch the Sidebar Card on or off per Blog, and have one with no heading stay hidden, so that an unfinished offer never shows.
36. As an editor, I want to leave the avatars or the button empty and have them left out, so that a simpler offer still looks finished.
37. As an editor, I want italic words in the card's heading shown in Primary, so that I choose the Highlight as I do everywhere else.
38. As an editor, I want the card's button to point up and right when I link to a guide elsewhere, and down when I link to a heading in this article, so that I never pick an icon.
39. As a developer, I want the Blog to adopt the Career's Longform layout with one include, so that the two pages cannot drift apart.
40. As a developer, I want the section's id passed in, so that the Blog and the Career each have their own anchor.
41. As a developer, I want the list styles in the shared Longform style, so that Career gets them without a second change.
42. As a developer, I want the Read Time worked out in one place and handed to the Blog Meta, so that the hero and the cards cannot disagree.
43. As a reviewer, I want a seeded Blog with enough sections to scroll, a bullet list, a to-do list and a filled Sidebar Card, so that I can check the design and every behaviour.

## Implementation Decisions

**Adopted unchanged.** Everything the Career Longform spec decides for the `longform` layout component applies to the Blog as built there: the grid and its `xl` start, sticking, the Longform body and its heading ramp, heading anchors, the Table of Contents, the Reading Progress, the Read Time's placement and "N min read" wording, the Sidebar Card's visibility rule and anatomy, the Share Buttons and copy behaviour, the chunk guard for nested entries, the JavaScript placement, and the stacked order below `xl`. Where that spec's grilling answers and this spec's first round disagreed (this spec's round started the columns at `lg`), the Career spec wins. The Blog node's spacing matches the Career node's line for line, so no measurement changes.

**Fields.** No new fields. The Blog entry type's `longform` and Sidebar - CTA fields are the same fields the Career uses.

**Blog entry template.** The Blog entry template includes the `longform` component where its "Longform Blog Post" placeholder sits, after the Blog Hero, passing the entry, `vars` and the id `blog-content`. The share label is left at the component's default, "Share this article". Nothing renders beneath the Hero when the Longform has no content.

**Section id.** The layout component's section id, fixed to `career-content` in the Career spec, becomes an `id` param with no default. The Career entry template passes `career-content`, so the Apply Button keeps working; the Blog passes `blog-content`.

**Sidebar Card button icon.** The Career spec gives the button a sharp regular arrow-down always. It now follows the link: a link whose URL is a `#hash` on the same page gets arrow-down and scrolls through the component's Lenis handler as before; any other link keeps the button component's default sharp regular arrow-up-right and follows normally, honouring its target. The Career's seeded `#how-to-apply` button is unchanged.

**Longform bullet lists.** In the shared Longform style, not the rich text component's other sizes: an unordered list that is not a to-do list has no browser marker and no left padding; each item is a row with a 5px round Black dot, 7px before its text, vertically centred on the first line, decorative. Items are 20px apart, text 16px Black leading 1.33, and a list sits 20px from the paragraphs around it. Ordered lists are unchanged.

**Longform to-do lists.** CKEditor's to-do list, which the field's toolbar offers, is stored as a list with the class `todo-list`, each item holding a disabled checkbox that is checked or not; the CKEditor field adds the checkbox to its HTML Purifier definition, so the state survives saving. In the Longform style each item uses the bullet list's rhythm (7px gap, 20px between items, 16px Black leading 1.33) with a 19px circle in place of the dot, aligned with the first line. A checked item's circle is the Ticked Item mark: Secondary fill with a sharp solid 10px Black check, the same mark the rich text component's `check` list already draws. An unchecked item's circle is empty: a 1px Creme 300 outline on a transparent fill. The native checkbox is visually hidden but kept in the markup so assistive technology announces each item as checked or not checked; the drawn circles are decorative. The mark follows the checkbox's state with no JavaScript, in Tailwind utilities only, and never looks interactive: no pointer, no hover.

**Read Time counting.** The Read Time is counted from the words in the Longform's text chunks, nested entries ignored, at the read time component's 265 words per minute, rounded up, as "N min read". A Longform with no words has no Read Time: the read time component renders nothing, and the layout's own Read Time line is already absent because the section renders nothing.

**Blog Meta.** The blog meta component gains a `readTime` param, the Blog's Longform, replacing its literal "5 min read" and the comment that promised this change. It renders the Read Time item through the read time component, with its own clock icon kept, only when the Longform has words. When it does not, the Read Time item is left out, and in `row` orientation the date loses its right border and padding so no divider trails it; `column` orientation simply has one row. The Blog Hero, the Blog Card, the Blog Large Card and the Featured Blog each pass their Blog's `longform`. The Blog Listing, the Blog Carousel and the Blog Grid need no change of their own beyond the cards they already include. The Playbook Card's literal Read Time is untouched.

**Seed.** One Seed under `.scratch/seeds/blog-longform/`, not committed, targeting the Google NavBoost Explained Blog through its `fields` map:
- `longform`: the node's three opening paragraphs; "What Is NavBoost?" with its two paragraphs and its six-item bullet list; then four more H2 sections titled as the node's Table of Contents placeholder reads — "How Does the Existence of NavBoost Impact SEO?", "What Metrics Will Help Measure User Engagement and User Experience?", "How Do I Extract the Data From GA4?" and "User Engagement Is the Outcome of Good SEO" — each with at least three paragraphs of written copy on its subject; the GA4 section holds a to-do list of at least four steps, two ticked and two not, and one H3. Long enough that the page scrolls well past two viewport heights at 1600.
- `sidebarCta`: `sidebarCta` true, `heading` "Download your *free Guide today*" with "free Guide today" italic, `avatars` the three avatar images from the node's avatar frame (reuse the Career Longform Seed's files if they are the same images), `button` a URL link to the Playbook Listing page, `/playbooks`, labelled "Download the guide", as a stand-in until a guide exists.
The How to Pitch a Journalist Blog needs no Seed: its empty Longform proves the section renders nothing and the Read Time is absent.

**Docs.** `CONTEXT.md`'s Read Time (Blog and Career) now says a Blog's figure is counted from its Longform and is absent when the Longform has no words; its Ticked Item now covers a ticked item in a Longform's to-do list. Both changed during the grilling session. No ADR change.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The primary seam is the rendered Blog page through the global layout, at the seeded Google NavBoost Explained Blog and the unseeded How to Pitch a Journalist Blog; the adopted layout, the new list styles and the counted Read Time all show there. The secondary seams are pages that already show the Blog Meta — the Blog Listing page and a page with a Featured Blog — to prove the counted Read Time and its absence on cards, and the seeded Career page, to prove the shared changes reached it without harm. The Seed command's output is supporting evidence. Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the three columns under the Blog Hero, the numbered list with its active entry, the counted Read Time agreeing between hero and column, the white card with its avatars, Primary Highlight and up-right arrow, the round share buttons under "Share this article", dotted bullets and ticked and unticked circles in the article, cards on the listing showing a real figure or just a date, and the stacked order on a tablet and a phone. The group review takes the screenshots of record once, at the three widths below, resting state; every other line is a state checked on the site and reported, not captured.

**Evidence plan.**

Screenshots, resting state, Google NavBoost Explained at `/insights/google-navboost-explained-how-click-behaviour-affects-rankings-and-how-to-track-user-engagement`:

1. 1600, full page: the Blog Hero's Read Time showing the counted figure, not "5 min read" unless the count is five; beneath it the Table of Contents in columns 1 to 3 listing the five H2s with the first Primary and underlined, the bar and the same Read Time centred beneath; the Longform in columns 4 to 9 with "What Is NavBoost?" at 46px, its bullet list drawn with 5px dots 20px apart, and the GA4 section's to-do list with two Secondary tick circles and two Creme 300 outlined circles; the Sidebar Card in columns 10 to 12 with three overlapping avatars, "Download your *free Guide today*" with the Highlight in Primary and a Secondary "Download the guide" button with an up-right arrow; "Share this article" and four outlined circles 50px beneath. Compared against the Figma node. Proves the desktop layout.
2. 768, full page: the stacked single column, Table of Contents, Read Time, Longform, Sidebar Card, Share Buttons, no bar. Proves the layout below `xl`.
3. 390, full page: the same stacked order at phone width, the dots and circles still aligned with each item's first line when it wraps. Proves the mobile layout.

States checked on the site and reported:

4. 1600, scrolled to the middle of the Longform: both side columns beside the text beneath the header, a later entry active, the bar about half full. Proves adoption of sticking, the active entry and the progress.
5. 1600, scrolled to the end of the Longform: the bar full and the side columns released at the section's end. Proves the full bar on a Blog.
6. A Table of Contents entry clicked at 1600: smooth scroll to its H2 clear of the header, the hash in the address, focus on the heading. Proves the list's scroll on a Blog.
7. The Sidebar Card button: its icon is arrow-up-right and clicking it navigates to `/playbooks`. The seeded Career's Sidebar Card button still shows arrow-down and scrolls to "How to apply". Proves the icon follows the link.
8. The copy button clicked: the clipboard holds the Blog's absolute URL and the live region reads "Link copied". Proves sharing on a Blog.
9. The Read Time figure: the Seed's Longform text word count, divided by 265 and rounded up, equals the figure in the Hero, the Longform column and the Blog's cards. Proves the count and its agreement.
10. Markup of the to-do list: each item keeps its checkbox, visually hidden, `checked` on the two ticked items; the accessibility tree reports two checked and two unchecked; the drawn circles and bullet dots are hidden from assistive technology. Proves the list semantics.
11. The Blog Listing page at 1600: the Google NavBoost Explained card shows the counted Read Time beside its date with the divider; every other card shows its date alone with no divider after it. Proves the Blog Meta's `row` orientation both ways.
12. A Featured Blog Block at 1600 pointed at Google NavBoost Explained, then at another Blog (restored afterwards): the white meta row with and without the Read Time, no stray divider. Proves the Featured Blog.
13. The How to Pitch a Journalist Blog at 1600: the Blog Hero shows its date with no Read Time, and nothing renders between the Hero and the footer. Proves the empty Longform on a Blog.
14. The Sidebar Card switched off on the seeded Blog (restored afterwards): no card, and "Share this article" at the top of the right column. Proves the card's visibility on a Blog.
15. The seeded Career page at 1600: its bullet list drawn with the new dots, its section id still `career-content` and the Hero's Apply Now still landing on it. Proves the shared changes reached Career without breaking it.
16. Markup: one element with id `blog-content`; each H2 carries its slug id. Proves the id param.
17. The Seed run twice: every field set and the avatar images uploaded or reused on the first run, reused on the second. Proves the seeding.

## Out of Scope

- Rendering the Longform's nested entries (Video, Image, Image Columns, Button Group, Quote). They render nothing until their own round.
- A real guide download for the Sidebar Card button; `/playbooks` is a stand-in in the Seed only.
- Backfilling a Longform on the Blogs that have none, and therefore their Read Time.
- Restyling ordered lists, tables or any rich text outside a Longform.
- The Playbook Card's literal Read Time and Word Count.
- Everything the Career Longform spec leaves out of scope: a collapsible or sticky Table of Contents or a Reading Progress below `xl`, H3s in the Table of Contents, other share targets, editor fields for the labels, and a dedicated mobile or tablet design.
- A to-do list a visitor can tick. The checkboxes stay disabled.
- Changing the Blog Hero beyond its Read Time.
- Committing the Seed.

## Further Notes

- Node geometry at 1600: the Table of Contents label at x 40, y 1290; its list at y 1319, 257 wide, 20px between entries; the bar at y 1589, 257 wide, 3px, its fill drawn at 94px as a static example; the Read Time at y 1609, centred on the bar. The Longform at x 425 (column 4), 750 wide (six columns), opening paragraphs at y 1290, "What Is NavBoost?" at y 1665 (100px beneath the paragraphs' end), its paragraph at y 1721, its bullet list at y 1852 with 5px dots, a 7px gap and 20px between items. The Sidebar Card at x 1255, 305 by 231, ending at the right margin; avatars at y 1320, 33px, overlapping by 6px; heading at y 1373, 245 wide; button at y 1449, 245 by 42, Secondary, arrow-up-right. "Share this article" at y 1571, the circles at y 1600, 35px, 5px apart.
- The node draws Facebook filled Primary; as in the Career spec, that is read as the hover state.
- The node's Table of Contents copy is placeholder; the Seed titles its H2s to match it so the page reads like the design.
- The avatar images are the node's three ellipse fills in frame `9716:10323`; the Figma asset URLs expire within seven days, so download them into the Seed's scratch folder.
- The brief named Facebook, X and copy link; the node also shows LinkedIn, and the node wins, matching the Career.
- The to-do list has no design node; its look was decided in the grilling session to reuse the Ticked Item mark.
