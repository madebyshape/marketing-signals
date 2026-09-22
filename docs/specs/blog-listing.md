# Blog Listing

Spec for the Blog Listing on the Blog Listing page: a Category Filter of Filter Buttons above a grid of every enabled Blog, eleven to a page in a fixed rhythm of one Blog Set over eight Blog Large Cards two to a row, with Pagination beneath. The grid, its filter and its pages are one Sprig component, so choosing a Category or a page swaps the three together without a full load, and the same state is reachable by URL. It is the fourth listing page after Case Studies, Team and Playbooks, and the second to combine the Category Filter with Pagination. The Blog Card and the Blog Large Card are rendered exactly as the Blog Carousel built them; neither component changes.

Design: Figma node `9974-15560` in the Marketing Signals file, 1600 wide, a group named "Group 46382" drawing the desktop state once at 1520 by 3663: a row of seven Filter Buttons with the first active, a rule, one page of eleven cards and the Pagination on page one of five. The cards are the Blog Carousel's own instances — one "Blog / Exterior / 6 Col / Featured" at 750 by 668 beside two "Blog / Exterior / 6 Col / Landscape" at 750 by 324, then eight more Featured at 750 by 668 in four rows of two, 20px apart in both axes. No hover frame, no filtered state, no arrow design for the Category Filter, no tablet frame and no mobile frame exist, so the filter's arrows and fades, the hover states and the tablet and mobile geometry below are decisions, not measurements.

Branch: feature/blog-listing

Related: the Case Study Grid spec, whose Sprig component, Category Filter, Filter Button carousel, Pagination and `?category=`/`?page=` query string this page copies wholesale, and whose `filterButton` and `pagination` components it reuses unchanged; the Carousel - Blog spec, which built the Blog Set, the Blog Card, the Blog Large Card, the meta row and the `2x1` transform this page renders untouched; the Blog Grid spec, whose Block keeps the name "Blog Grid" and is not touched; the Playbook Listing spec, the sibling listing in flight, whose Listing Header this page does **not** have and whose Load More it does not use; the Content Seeding spec, whose Categories resolver already shipped and is used as-is. ADR-0001 does not apply: the listing is in flow beneath the Hero. ADR-0002 applies: every Blog the review needs arrives by Seed. ADR-0003 applies and is extended: the Blog Listing page is the one `entryBlogListing` page, found by type, so the listing lives in that page template rather than in a Block, and the breadcrumb's section-to-listing-type map gains its `blog` line so a Blog page gets its "Insights" crumb. ADR-0004 is untouched: the page's Hero still sets the Header Colour. No new ADR: every rule here is either copied from the Case Study Grid or reversible in one file. Vocabulary: `CONTEXT.md`, new "Blog Listing" section, which gained Blog Listing, Blog Listing page and All Articles during the grilling session; Blog Set was widened from a Slide in the Blog Carousel to a shape two surfaces use, and Blog Card, Blog Large Card, Category Filter, Filter Button, Pagination and Page Number were widened to name the Blog Listing rather than duplicated.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Blog Listing page exists at `/insights`, is the page the Insights menu item points to, carries a Hero and Blocks, and shows no Blogs. Nine Blogs are published at `/insights/<slug>` and the only places a visitor meets them are the Blog Carousel and the Blog Grid Block, both of which show a handful an editor picked, on other pages, and neither of which can be filtered or paged. A visitor who followed "Insights" from the Main Menu lands on a heading, a paragraph and nothing else. Not one Blog has a Category assigned, so the Categories - Blog field on the Blog entry type has never done anything. A Blog page's breadcrumb has no "Insights" crumb, because the breadcrumb's section-to-listing map knows only Case Studies and Services, so a visitor reading an article cannot climb back to the list they never had.

## Solution

The Blog Listing page renders the Blog Listing between its Hero and its Blocks. At the top, the Category Filter: All Articles first, then one Filter Button per Category that at least one enabled Blog belongs to, in the Category group's order, each a radar dot beside the Category's name in an outlined pill, the active one outlined in the primary purple. Below a thin creme rule, the grid: eleven Blogs to a page, the first three as a Blog Set — one Blog Large Card in the left six columns beside two Blog Cards stacked in the right six — and the remaining eight as Blog Large Cards two to a row. Beneath, centred, the Pagination: a Previous pill, up to five Page Numbers with the current one filled in lilac, and a Next pill, Previous and Next dimmed at the ends. Pressing a Filter Button swaps the grid to that Category's first page and dims the grid while the request runs; pressing a Page Number or Previous or Next swaps to that page and scrolls the Category Filter to the top of the viewport beneath the Header. Every swap pushes the Category and page into the URL's query string, so the browser's back button, a shared link and a direct load all land on the same state. Below `lg` the Blog Set dissolves and every card is a Blog Large Card, two to a row from `md` and one below it; the Category Filter becomes one horizontally scrolling row under a pair of arrows that appear only when there is more to scroll. Twenty-three Blogs are seeded across four Categories so three pages exist to review, and the breadcrumb map gains its `blog` line.

## User Stories

1. As a visitor, I want every article on one page, so that I can browse the agency's writing without hunting through the site.
2. As a visitor, I want the Insights menu item to lead somewhere that lists the articles, so that the menu means what it says.
3. As a visitor, I want the articles grouped under their Categories at the top of the page, so that I can see at a glance what the agency writes about.
4. As a visitor, I want All Articles chosen when I arrive, so that the page shows everything until I ask for less.
5. As a visitor, I want to press a Category and see only that Category's articles, so that I can find the writing relevant to my problem.
6. As a visitor, I want only one Category active at a time, so that the grid always answers one question.
7. As a visitor, I want pressing the active Category to do nothing, so that a second press never surprises me.
8. As a visitor, I want a Category with no articles left off the filter, so that I never press a button that shows an empty page.
9. As a visitor, I want the active Category outlined in purple with its dot lit, so that I always know what I am looking at.
10. As a visitor, I want the grid to dim while a new Category or page loads, so that I know something is happening.
11. As a visitor, I want the grid to change without the page reloading, so that the Hero and the filter do not jump.
12. As a visitor, I want the first article shown larger with two smaller ones beside it, so that the page opens with a lead rather than a wall of identical tiles.
13. As a visitor, I want that same shape at the top of every page, so that page two reads the way page one did.
14. As a visitor, I want the rest of the articles two across, so that I can scan them quickly.
15. As a visitor, I want each card to show the article's photograph, date and read time, so that I can judge it before I click.
16. As a visitor, I want the larger cards to show a sentence of the article, so that I know what it covers.
17. As a visitor, I want the photograph cropped to its focal point, so that a face is not cut off.
18. As a visitor with a mouse, I want the whole card to be the link, so that I do not have to find the right word to click.
19. As a visitor with a mouse, I want the photograph to grow gently when I hover, so that the card feels alive under the pointer.
20. As a visitor with a mouse, I want a Filter Button to show its purple outline when I hover, so that I know it is pressable.
21. As a visitor, I want eleven articles to a page, so that a page loads fast and is not endless.
22. As a visitor, I want page numbers beneath the grid, so that I can jump to any page rather than stepping through them.
23. As a visitor, I want no more than five page numbers at once, so that the row stays short however many articles there are.
24. As a visitor, I want the five page numbers to slide with me so the current page stays in the middle, so that I can always go a couple of pages either way.
25. As a visitor, I want the current page's number filled in, so that I know where I am.
26. As a visitor, I want Previous and Next buttons, so that I can step through the pages one at a time.
27. As a visitor, I want Previous dimmed on the first page and Next dimmed on the last, so that the row keeps its shape and I know I have reached an end.
28. As a visitor, I want changing the page to bring the top of the grid into view beneath the header, so that I start reading the new page from its first card.
29. As a visitor, I want changing the Category to return me to page one, so that I never land on an empty page of a shorter list.
30. As a visitor, I want the page and Category in the address bar, so that I can share a link to exactly what I am looking at.
31. As a visitor, I want the browser's back button to return to the previous Category or page, so that the grid behaves like pages do.
32. As a visitor, I want a shared link or a bookmark to open on the Category and page it named, so that the link means what it said.
33. As a visitor, I want a link to a page that no longer exists to show the last page rather than an empty grid, so that a stale bookmark still shows articles.
34. As a visitor, I want the Pagination gone when there is one page, so that I am not offered a control that does nothing.
35. As a visitor reading an article, I want an "Insights" crumb above it, so that I can climb back to the list.
36. As a visitor with a tablet, I want the articles two across in one shape, so that the page is not a single long column.
37. As a visitor with a phone, I want the articles one above the other, so that each card has room for its title and text.
38. As a visitor with a phone, I want the Categories in one row I can scroll sideways, so that the filter does not push the articles down the page.
39. As a visitor with a phone, I want arrows at the ends of that row when there is more to scroll, so that I know it scrolls and can move it without a swipe.
40. As a visitor with a phone, I want those arrows gone when the row fits, so that nothing sits on the page for no reason.
41. As a visitor with a phone, I want the Pagination to fit in one row, so that I can page without the controls wrapping.
42. As a visitor who prefers reduced motion, I want the photograph still under the pointer and the grid to change in place, so that nothing animates that I did not ask for.
43. As a visitor whose script has not run, I want the first page of articles and the filter in the served HTML, so that the writing is there however the page loads.
44. As a keyboard user, I want the Category Filter to be a group of radio buttons, so that I can move between Categories with the arrow keys and see which is chosen.
45. As a keyboard user, I want the Page Numbers, Previous and Next to be real buttons, so that I can page the grid from the keyboard.
46. As a keyboard user, I want a dimmed Previous or Next to be skipped, so that I do not land on something that does nothing.
47. As a keyboard user, I want focus to stay sensible after a swap, so that I do not lose my place.
48. As a screen reader user, I want the Category Filter announced as a group with its chosen item, so that I know how the grid is narrowed.
49. As a screen reader user, I want each card read once as its date, read time and title, as a link to the article, so that the card makes sense without the picture.
50. As a screen reader user, I want the photograph marked decorative, so that a filename is not read to me.
51. As a screen reader user, I want the current Page Number announced as current, so that I know where I am in the pages.
52. As a screen reader user, I want the grid announced when it changes, so that a filter press is not silent.
53. As an editor, I want every enabled Blog to appear on the page without my adding it anywhere, so that publishing an article is enough.
54. As an editor, I want the grid to follow the Blog section's own order, so that I can drag Blogs to change the order visitors see.
55. As an editor, I want a Category to appear in the filter as soon as one Blog belongs to it, so that I never maintain the filter by hand.
56. As an editor, I want a Blog with several Categories to appear under each of them, so that an article that spans topics is found under all of them.
57. As an editor, I want the cards to use the Blog's own Thumbnail, Description and post date, so that an article changed in one place changes everywhere.
58. As an editor, I want a Blog missing a Thumbnail or a Description to still get a card, so that a half-finished article is never silently dropped.
59. As an editor, I want the page to need no Block and no field, so that the listing cannot be deleted or misconfigured by accident.
60. As a developer, I want the Blog Card and Blog Large Card rendered unchanged, so that the Blog Carousel and the Blog Grid Block cannot regress.

## Implementation Decisions

**Page template.** The Blog Listing page template renders the Hero, then the Blog Listing, then the Blocks. The listing is wrapped in the section component with `paddingY` at its `base` value and horizontal padding at the site margins, so it takes the page's vertical rhythm without an editor setting. There is no Block and no new field: ADR-0003 fixes the page to one instance found by its entry type. The entry type's field layout is untouched. The page has no Listing Header: unlike the Playbook Listing page, the node draws no heading between the Hero and the filter.

**The Sprig component.** One Sprig component template holds the Category Filter, the grid and the Pagination, so one request re-renders all three. It takes two scalar params, `category`, a Category slug or empty for All Articles, and `page`, an integer defaulting to one, each defaulted with the null-coalescing pattern the Case Study Grid uses, plus the `scroll` flag that component uses to mark a paged swap. The page template calls it with the two values read from the request's query string, so a direct load of `?category=digital-pr&page=2` renders that state server-side and the swap produces byte-identical markup. Every trigger carries the `sprig` attribute, sets the two values, points its indicator at the grid, and pushes the resulting query string to the address bar. The Sprig attribute strings are built as an array and joined, and none contains a `>`, which would truncate Sprig's tag match.

**Query.** Enabled Blogs from the Blog section in structure order, which is the section's default, related to the chosen Category when one is given, paginated by Sprig's paginate helper at eleven per page. A `page` beyond the last page is clamped to the last; a `category` that matches no Category is treated as All Articles. The Filter Buttons come from the Blog Category group in its own order, keeping only Categories that at least one enabled Blog is related to, so a Category with no live article never renders a button. A Blog with several Categories matches each of them. The Categories are not shown on the cards: the node draws no badge on either card, and neither card component has one.

**Category Filter.** The existing `filterButton` component renders each button unchanged, in its default creme scheme: a hidden radio input whose `name` is `category` and whose value is the Category slug, or empty for All Articles, inside a 41px pill with the radar dot. The row is the existing carousel component with the buttons as its slides, free mode on, slides sized to their content, 10px between them, overflow watching on so a row that fits locks and hides its arrows, and the active button as the initial slide. Two arrow buttons through the shape-button component, `creme-300-outline`, sit over the row's ends behind a fade from Creme 100 to transparent, hidden with Alpine when the row is at its start or end. The row sits in a fieldset with a visually hidden legend reading "Filter by category". The node draws seven buttons across 1205 of the 1520 width, so the arrows never show at 1600. All of this is the Case Study Grid's filter with the Category group and the lead label changed; no component gains a parameter.

**All Articles, and a divergence from the design.** The lead Filter Button reads "All Articles". The node draws "All Work", the Case Study Grid's own label, on a page of articles; this is recorded as a deliberate divergence and should be raised with the designer, who may have carried the string across from the Case Studies frame. If they confirm "All Work", the change is one string and the `All Articles` glossary term is retired in favour of widening `All Work`.

**The rule.** Between the filter and the grid, a 1px Creme 300 rule spanning the content width: 40px below the filter row and 50px above the first card. The node draws it as a 30px Creme 100 block with a Creme 300 bottom border rather than a hairline, so the measurement is taken from that border's position. The Case Study Grid's equivalent gap is 40px on both sides; the 10px difference is the design's, not a copy error.

**Grid and the Blog Set.** The grid is twelve columns with the house 20px gap. From `lg` the first three Blogs of every page are a Blog Set: the first as a Blog Large Card spanning the left six columns, the second and third as Blog Cards stacked in the right six with a 20px gap between them. The two stacked cards are 324 tall each against the Blog Large Card's 668, and `324 + 20 + 324 = 668`, so the Set's two halves are equal in both axes and the row needs no explicit height — the stacked column stretches to its neighbour. The remaining eight Blogs are Blog Large Cards spanning six columns each, two to a row, four rows. The rhythm repeats on every page, filtered or not, so the Set always leads. Below `lg` the Set dissolves, as it does in the Blog Carousel: every one of the eleven Blogs is a Blog Large Card, two to a row from `md` and one below it, and no Blog Card is rendered at all. The Set's position rule lives in the Sprig component as a slice of the result, not as a per-card size param, because the two halves hold different card types rather than one card at two sizes.

**Cards.** The Blog Card and the Blog Large Card are rendered exactly as they are, with only a `sizes` hint passed for the picture component: the Blog Large Card at six columns in both its Set and grid positions, the Blog Card at 37% of six columns. Both components were measured against this node and match it — the Blog Card's 37% thumbnail, 5px inset, 15px inner radius, 25px medium title at 1.2 leading and -1px tracking, 40px content inset and Creme 400 meta divider; the Blog Large Card's 30px title, 25px stack gap, 40px insets and 2x1 thumbnail. **Neither component is modified, and neither is the Blog Carousel, the Blog Grid Block or the Featured Blog.** This is the reason the feature has one seam rather than four.

**Pagination.** The existing `pagination` component renders unchanged: a centred row 70px beneath the grid, 10px gaps, Previous through the button component with the arrow-left icon, up to five 42px Page Numbers, and Next with the arrow-right icon. The enabled end button is the button component's `secondary` fill and the disabled one its `creme-300-outline`; a disabled end button carries the `disabled` attribute and no trigger. The node names the Next pill "Primary" but fills it with the Secondary token, the same quirk the Case Study Grid spec recorded; the component's naming stands. Every button is a Sprig trigger for its page carrying the current Category, so a page change never drops the filter.

**Swap behaviour.** All triggers target the Sprig component's root and replace it whole. During a request the grid sits at 50% opacity with pointer events off through the indicator class. After a swap that changed the page, the filter's top is scrolled to the top of the viewport beneath the fixed Header, using the header height as the filter's scroll margin; a swap that changed the Category does not scroll, since the filter is already in view. A Category change always requests page one. The component's root carries a polite live region so a screen reader hears that the grid changed.

**Breadcrumb.** The breadcrumb's section-to-listing-type map gains `blog: 'entryBlogListing'`, so a Blog page's flat `/insights/<slug>` URL finds its listing page and renders an "Insights" crumb, exactly as the Playbook Listing spec adds its `playbook` line. Nothing else in the component changes.

**Accessibility.** The Category Filter is a fieldset of radio inputs with visible labels, so arrow keys move between Categories and the chosen one is announced. The cards are a list; the Set is a list item holding its own two-item list, so the nesting stays valid. Each link's accessible name is its contents, with no `aria-label`; every Thumbnail's alt is empty. The Pagination is a `nav` labelled "Pagination", the current Page Number carries `aria-current`, and disabled end buttons leave the tab order. Nothing is read twice.

**Empty states.** A Blog without a Thumbnail renders its card with the component's existing creme-300 placeholder; without a Description the Blog Large Card drops the paragraph. A page with fewer than three Blogs renders what it has: the Set keeps its shape with the missing cells empty, as it does in the carousel. One page renders no Pagination. A Category that no enabled Blog belongs to renders no Filter Button. If a request still lands on an empty page, from a stale link after content was unpublished, the grid renders a single line reading "No articles found" in the base size and the Pagination renders nothing. A section with no Blogs at all renders All Articles alone over that line.

**Review content.** Twenty-three Blogs in the Blog section, the nine that exist plus fourteen seeded, spread across four Categories in the Blog Category group so All Articles has three pages, the last with one card, and at least one Category has more than eleven Blogs and pages on its own. The Seed command needs no change: `CategoriesResolver` shipped with the Case Study Grid work and `BlockSeeder` applies entry fields through it, so a Blog Seed sets `thumbnail`, `description`, `postDate` and `categoriesBlog` on the entry it creates. The existing nine Blogs are given Categories by Seed so they match. The Seeds are not committed.

**Docs.** `CONTEXT.md` gained the Blog Listing section and the widened Blog Set, card, filter and pagination terms during the grilling session. No new ADR; ADR-0003's map is extended, which the ADR already anticipates.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** There is one. The Blog Listing page URL through the global layout, with the Category and page in its query string: every state the spec names is reachable by a direct load and renders the same markup the swap produces, so no screenshot depends on clicking. The Sprig swaps are proven at the same seam by loading the page and pressing. No second seam is opened, because no shared component changes: the Blog Card, Blog Large Card, `filterButton`, `pagination` and carousel components are rendered as they are, so the Blog Carousel, the Blog Grid Block, the Featured Blog and the Case Study Grid cannot regress and need no before/after pair. The Seed command is used, not modified, so its dry-run output is evidence of content rather than of code. The styleguide has no listing preview and gains nothing.

**What good evidence looks like.** It shows what a visitor would see: the Category Filter with All Articles lit above the rule, the Blog Set leading the grid with its two halves equal, the eight cards two up, the Pagination on page one, then a filtered state, a middle page with the Page Window slid, the last page with Next dimmed, the hover cue, the tablet two-up and the mobile column, the reduced-motion state and the keyboard states. Fixed widths, one state per file, before and after pairs on the PR. The before for every listing state is the Blog Listing page on `main` at the fork commit, which renders a Hero and nothing else.

**Evidence plan.**

1. `/insights` at 1600, full page: the Category Filter of Filter Buttons 41px tall with 10px gaps, All Articles in the Primary outline with its dot lit, the rule 40px beneath, the first card 50px beneath that, the grid 1520 wide with 20px gaps, the Blog Set as a 750 by 668 Blog Large Card beside two 750 by 324 Blog Cards, then four rows of two 750 by 668 cards, the Pagination 70px beneath with Previous dimmed in Creme 300 outline, "1" filled Secondary, "2" and "3" outlined, Next filled Secondary, compared against Figma node `9974-15560`. Proves the desktop layout and the rhythm.
2. `/insights` at 1600, viewport, pointer over the Blog Set's large card: the Thumbnail at 1.05 and the pill filled, nothing else changed. Then over one of the stacked Blog Cards: the same. Proves the Zoom on both card types in this context.
3. `/insights` at 1600, viewport, pointer over an inactive Filter Button: the Primary outline. Proves the hover.
4. `/insights` at 1600, viewport, after pressing a Category: the address bar reading `?category=<slug>`, that button lit, the grid dimmed mid-request then showing only that Category's Blogs from a Blog Set, the Pagination on page one of that Category's pages. Proves filtering, the reset to page one and the URL push.
5. `/insights?category=<slug>` at 1600, direct load, full page: identical to the end state of item 4. Proves the URL seam.
6. `/insights?page=2` at 1600, direct load, full page: a Blog Set leading page two, "2" filled, Previous and Next both Secondary. Then `/insights?page=3`: the last page's single card, Next dimmed and disabled. Proves the per-page rhythm and the ends.
7. A temporary Seed taking the Blog count past 66 so six pages exist, then `/insights?page=4` at 1600: the window "2" to "6" with "4" filled. Removed afterwards. Proves the Page Window slides.
8. `/insights` at 1600, viewport, after pressing "2" from a scroll position below the grid: the Category Filter's top at the viewport's top beneath the Header, page two shown, the address bar reading `?page=2`, then the browser's back button returning page one and the URL. Proves the scroll and the history.
9. `/insights?category=<slug>&page=2` at 1600, direct load: that Category lit, page two of it, "2" filled. Then pressing another Category: page one of it, the URL carrying only the Category. Proves the Category and page combine and a Category change resets the page.
10. `/insights?page=99` and `/insights?category=nonsense` at 1600: the last page, and All Articles, respectively. Proves the clamps.
11. `/insights` at 1024, full page: no Blog Set, every card a Blog Large Card two across, eleven of them. Proves the Set dissolves at `lg` and the tablet grid.
12. `/insights` at 768, viewport: the Category Filter row overflowing with the right arrow and fade showing and the left hidden, then after pressing the right arrow both arrows showing, the cards still two across as Blog Large Cards. Proves the `md` step and the filter carousel.
13. `/insights` at 390, full page: the filter row scrolling with its arrow and fade, every card a full-width Blog Large Card stacked with 20px gaps, no Blog Card anywhere, the Pagination in one row. Proves the mobile stack.
14. `/insights` at 1600 with reduced motion emulated, viewport, pointer over a card: the Thumbnail at rest at 1.0, the pill still filled. Proves the reduced-motion Zoom.
15. Served HTML of `/insights`: the filter a fieldset of radio inputs with labels, All Articles checked, the cards a list of eleven links with the Set as a nested list, every Thumbnail's alt empty, the Pagination a `nav` with `aria-current` on "1" and Previous a disabled `button`. Proves the before-script state and the markup.
16. DOM after scripts at 1600: the Sprig root a polite live region, the arrow keys moving the checked radio through the filter, Tab skipping the disabled Previous, and the active Filter Button lit after a keyboard change. Proves the accessibility story.
17. A Blog page at 1600, viewport at the breadcrumb, before and after: "Home > Insights > <title>" where before there was no Insights crumb. Proves the breadcrumb map line.
18. Home page at 1600 and 390, viewport at the Blog Carousel, and a page carrying a Blog Grid Block and a Featured Blog, before and after: pixel-identical. Proves the card components did not change.
19. `/insights` at 1600 with a Blog's Thumbnail and Description each temporarily removed in turn: the card with the creme-300 placeholder, and without the paragraph, still in the grid. Then a Category's last Blog disabled: its Filter Button gone. Restored afterwards. Proves the empty states.
20. Seed command dry-run and real output for the Blog Seeds, run twice: the entries created with their Categories related on the first run, skipped on the second. Saved as text beside the screenshots. Proves the content arrived by Seed (ADR-0002).

## Out of Scope

- A search box, a sort control, multiple active Categories, or a filter on author or date.
- Load More or infinite scroll; the page paginates, unlike the Playbook Grid.
- Filtering by URL segment, such as `/insights/digital-pr`; the Category group has no URLs and the state is a query string.
- Changing Blitz's query-string caching. Filtered and paged URLs are served dynamically by the existing settings.
- The Blog entry page itself, its Hero and its content; only its breadcrumb crumb changes.
- A real read time. `blogMeta` still renders the literal "5 min read" with its existing comment, though the node draws varied times; swapping in the readTime component waits until Blog pages have content to count.
- Any change to the Blog Card, the Blog Large Card, the Blog Carousel, the Blog Grid Block or the Featured Blog.
- Renaming the Blog Grid Block, which keeps its name; this listing is the Blog Listing.
- A Listing Header on the page; the node draws none.
- An editor field for how many Blogs a page holds, or for pinning a Blog to the Set.
- Replacing the review Thumbnails with final photography.

## Further Notes

- The Category and page live in the URL rather than in Sprig state alone so that a filtered listing is a page like any other: shareable, bookmarkable, back-button-able and loadable without script. It is recorded here rather than as an ADR because it is easy to reverse, and because the Case Study Grid already set the precedent.
- Eleven per page is not arbitrary: it is one Blog Set of three plus four rows of two, which is exactly what the node draws. Changing it should change the shape too, or the Set stops leading a full page.
- The Blog Set's two halves are equal because `324 + 20 + 324 = 668`. The stacked column therefore needs no fixed height, only equal rows, and the Set survives a card growing taller than the node draws.
- The node draws "All Work" as the lead Filter Button on a page of articles. "All Articles" is a deliberate divergence, recorded under Implementation Decisions and raised with the designer rather than applied silently.
- The rule sits 40px below the filter and 50px above the grid, against the Case Study Grid's 40 and 40. The node draws the rule as a 30px Creme 100 block with a bottom border, so the 50px is measured from that border, not from the block's top.
- The Blog Large Card's thumbnail is the existing `2x1` transform, which puts it at 740 by 370 against the node's 343. The 27px was accepted when the Blog Carousel built the card and is accepted again here rather than adding a transform for one surface.
- Below `lg` the Set dissolves rather than stacking its three cards, because the Blog Carousel already dissolves it there and the Blog Card's 37% thumbnail column is what breaks when the card narrows. The tablet band still runs two up, unlike the carousel's single column, because a listing has a grid to fall back to and eleven single-column cards would be a very long page.
- The Seed command needed extending for the Case Study Grid and does not here: `CategoriesResolver` and the entry-fields path already do everything a Blog Seed needs.
