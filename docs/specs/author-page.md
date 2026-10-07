# Author Page

Spec for the Author Page: a Team Member's own page at `/authors/{slug}`, with the Breadcrumb, their Image, name and Author Description above a Rule, and every Blog they are the Author of beneath it in the Blog Listing's rhythm and Pagination. It gives the Team section URLs for the first time (ADR-0006) and reuses the Blog Listing's Sprig component, narrowed to one Author, instead of copying it.

Design: Figma node `10044-25055` in the Marketing Signals file, a group named "Group 46391" drawing the desktop state once inside a 1600 frame, for Gareth Hoyle: the Breadcrumb "Home › Author › Posts by Gareth Hoyle", a 71px round Image beside the name at 92px, the Author Description in the right-hand four columns, a full-width Rule, then one page of eleven cards and the Pagination on page one of five. The cards are the Blog Listing's own instances: one "Blog / Exterior / 6 Col / Featured" at 750 by 668 beside two "Blog / Exterior / 6 Col / Landscape" at 750 by 324, then eight Featured in four rows of two, 20px apart. No tablet frame, mobile frame, hover frame or empty state exists, so the responsive geometry and the empty page below are decisions, not measurements.

Branch: feature/author-page

Related: the Blog Listing spec, which owns the Sprig component, the Blog Set rhythm, eleven to a page and the Pagination, all adopted unchanged except where a decision below says otherwise; the Blog Hero spec, whose Avatar Group shows the Author. ADR-0001 applies: the header is fixed, so the page clears it the way the Blog Hero does. ADR-0002 applies: Authors and the Author Description arrive by Seed. ADR-0003 applies: the Breadcrumb's middle crumb is the Team Listing page, found by its entry type. ADR-0004 applies: the page has no Hero, so the Header Colour is the Creme 100 default. ADR-0005 applies: the Author is the Blog's `author` relation to a Team Member, queried from the Team Member's end. ADR-0006 was written during the grilling session: the Author Page is the Team Member's own URL, and a Team Member with no Blogs keeps their page. Vocabulary: `CONTEXT.md`, which gained **Author Page** and **Author Description** and widened **Team Member** and **Author** during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A visitor who reads a Blog by Gareth Hoyle and wants more of what he writes has nowhere to go. The Blog Hero names him under "Written by", but the site has no page for a person's articles: Team Members have no URLs at all, and the Blog Listing can be narrowed by Category but not by who wrote the Blog. The only way to find the rest of his writing is to page through all twenty-four Blogs and open each one.

Editors are in the same position from the other side. A Team Member now has an Author Description field written for exactly such a page, and a Blog has an Author field, but neither reaches the site beyond the Avatar Group, and only one Blog has an Author set.

## Solution

Every Team Member has an Author Page at `/authors/{slug}`, for example `/authors/gareth-hoyle`. Beneath the Creme 100 header: the Breadcrumb "Home › Team › Posts by Gareth Hoyle"; then the Team Member's Image in a small circle with their name beside it as the page's heading; and, from the desktop breakpoint, their Author Description in the right-hand four columns level with the name. A Rule runs the full width beneath, and under it every enabled Blog they are the Author of, exactly as the Blog Listing lays out its Blogs: a Blog Set leading each page over eight Blog Large Cards two to a row, eleven to a page, with Pagination beneath once there is more than one page. Choosing a page swaps only the cards and the Pagination, scrolls the Rule beneath the header, and puts `?page=` in the address so the same page loads directly.

A Team Member who has written nothing still has the page, reading "No articles found" beneath the Rule, and search engines are told not to index it until they have a Blog. A Team Member without an Image shows the name alone, starting at the left edge. An empty Author Description leaves the right-hand side empty.

On a phone and tablet the Image and name stack, the name steps down in size, and the Author Description runs full width beneath them.

A Seed gives Gareth Hoyle the design's Author Description, credits him as the Author of fourteen Blogs so that his Pagination reaches a second page, and credits Harry Nisbet with two, so the page can be reviewed against the design.

## User Stories

1. As a visitor, I want a page listing every article one person has written, so that I can read more from a writer I trust.
2. As a visitor, I want the page to open with the writer's photo and name, so that I know whose articles I am looking at.
3. As a visitor, I want a short introduction to the writer beside their name, so that I know why their view is worth reading.
4. As a visitor, I want the articles laid out as they are on the Insights page, so that the site feels consistent and I already know how to read the grid.
5. As a visitor, I want only that writer's articles listed, so that I am not wading through everyone else's.
6. As a visitor, I want each article card to show its Thumbnail, date, Read Time and title, so that I can pick one to read.
7. As a visitor, I want to click a card and land on that Blog, so that the page leads somewhere.
8. As a visitor, I want the articles eleven to a page with Pagination, so that a prolific writer's page does not run forever.
9. As a visitor, I want changing page to swap the cards without reloading the whole page, so that it feels quick.
10. As a visitor, I want the page to scroll to the top of the cards when I change page, so that I start reading the new page from its first card.
11. As a visitor, I want the page number in the address, so that I can share or bookmark page two.
12. As a visitor, I want a link to page two to open page two, so that a shared link shows what was shared.
13. As a visitor, I want Previous disabled on the first page and Next on the last, so that I know where the list ends.
14. As a visitor, I want a Breadcrumb back to Home and to the Team page, so that I can find the rest of the team.
15. As a visitor, I want the last crumb to read "Posts by" the writer's name, so that I know what this page is.
16. As a visitor, I want the page title in my browser tab to read "Posts by" the writer's name, so that the tab tells me what it holds.
17. As a visitor, I want a writer with no articles yet to show "No articles found", so that I am not left wondering if the page is broken.
18. As a visitor with a phone, I want the photo, name and introduction stacked and the name sized to the screen, so that nothing overflows.
19. As a visitor with a phone, I want the cards one to a column, as on the Insights page, so that they stay legible.
20. As a keyboard user, I want every card and Pagination control reachable and visibly focused, so that I can move through the list without a mouse.
21. As a screen reader user, I want the writer's name announced as the page heading, so that I know where I am.
22. As a screen reader user, I want the Breadcrumb and the Pagination announced as labelled navigation, so that I can skip or use them.
23. As a screen reader user, I want the photo left out of what is read, so that I do not hear the name twice.
24. As a screen reader user, I want the new page of cards announced when I change page, so that I know the list changed.
25. As a visitor who prefers reduced motion, I want the page change without animated scrolling, so that nothing glides that I asked not to.
26. As an editor, I want every Team Member to have their page without switching anything on, so that crediting a Blog is all it takes.
27. As an editor, I want to set a Blog's Author and see it appear on that person's page, so that authorship is managed in one place.
28. As an editor, I want a disabled Blog left off every Author Page, so that drafts and retired articles stay hidden.
29. As an editor, I want a disabled Team Member's page to be not found, so that someone who has left is not presented as a writer.
30. As an editor, I want to write a Team Member's Author Description separately from their Team Modal text, so that the writer introduction can differ from the team bio.
31. As an editor, I want an empty Author Description to leave the space empty rather than show the team bio, so that nothing appears I did not write for this page.
32. As an editor, I want a Team Member without an Image to still have a tidy page, so that I am not forced to upload a photo first.
33. As an editor, I want to see and correct a Team Member's slug, so that I control the address of their page.
34. As an editor, I want a writer's page kept out of search results until they have an article, so that half-finished pages do not rank.
35. As an editor, I want a writer's page to become indexable as soon as their first Blog is enabled, so that I have nothing to switch on.
36. As an editor, I want to preview a Team Member's page from the control panel, so that I can check it before sharing it.
37. As an SEO lead, I want each Author Page in the sitemap with its own URL and title, so that search engines can find each writer's archive.
38. As an SEO lead, I want the Breadcrumb schema to match the visible Breadcrumb, so that search results show the same trail.
39. As a developer, I want the Author Page to reuse the Blog Listing's Sprig component narrowed by an Author, so that the page size, Blog Set rhythm and Pagination live in one place.
40. As a developer, I want the Blog Listing page unchanged by that reuse, so that its Category Filter and pages behave as before.
41. As a developer, I want the Author query to be a relation from the Team Member's end, so that no new field or index is needed.
42. As a reviewer, I want Seeds that credit Blogs to two Authors and fill an Author Description, so that I can check the page, its Pagination and its narrowing against the design.

## Implementation Decisions

**Team section URLs.** The Team section gains URLs with the format `authors/{slug}`, rendered through the shared entry template that includes the entry type's own template, as Blogs, Careers, Case Studies and Services are. Its preview target already uses the entry URL. Craft's own routing makes a disabled Team Member's page not found. The Team entry type shows its slug field. No new fields: the Team entry type already has the Image, `authorDescription` (Rich Text - Simple, labelled Author Description) and the rest; a Blog's `author` field (Entry - Team, labelled Author, at most one) already exists.

**Team entry template.** A new Team entry type template extends the global layout and renders, in order: the Author Page header, then the listing section. The page has no Hero and no Blocks field, so the Header Colour is the layout's Creme 100 default and no Header Colour map is added.

**Author Page header.** Built from the Team Member alone, inside the site margins, with the header's top padding from the shared layout variables as the Blog Hero does (ADR-0001).
- The Breadcrumb is handed its trail outright rather than deriving one: Home, then the Team Listing page (found by its entry type, the Team Listing type, per ADR-0003), then "Posts by {name}" as the current crumb with the Team Member's URL. When no Team Listing page exists the middle crumb is left out. The SEOmatic BreadcrumbList follows the same trail, as the component already does with any trail.
- Beneath it, a 12-column grid. On the left, the Image and name in a row: the Image a 71px circle cropped to cover, decorative with an empty alt; the name as the page's `h1`, 20px to the right of the Image, Semibold, leading 0.97, tighter tracking, at `5xl` below `md`, `6xl` from `md`, `7xl` from `lg` and `11xl` from `xl`. The Image and name are vertically aligned to the top, as the node draws. With no Image the name alone, starting at the left edge. The row spans columns 1 to 8 from `lg`.
- The Author Description in columns 9 to 12 from `lg`, top-aligned with the name, through the rich text component at base size in Black. Below `lg` it spans all twelve columns beneath the Image and name, 30px under them. Rendered only when it has text once tags are stripped; with none, nothing is output and the name does not move.
- The Image is shown below `lg` at the same 71px; on a phone the name wraps beside it rather than dropping beneath it.
- The gap from the Breadcrumb to the Image and name follows the Blog Hero's breadcrumb-to-heading steps, reaching the node's 126px from the Breadcrumb's top at `xl`.

**Listing section.** The Blog Listing page's own section wrapper and spacing, holding the Blog Listing Sprig component called with the Team Member's id and the page from the query string. No category is passed.

**Blog Listing Sprig component.** Gains one optional value, the Author, a Team Member id, defaulting to none.
- With an Author, the Blog query adds the relation `relatedTo` with the Team Member as the target element through the `author` field, on top of the existing enabled-Blogs query in the same order. Eleven to a page, the Blog Set leading, the eight Blog Large Cards, the card sizes and the Pagination window are all unchanged.
- With an Author, the Category Filter is not rendered and no Categories are queried; the Rule it already draws beneath the filter stays, with no margin above it beyond the section's own, and becomes the scroll target. The scroll margin the filter carries beneath the header moves to the Rule in that case.
- With an Author, the page trigger carries the Author and the scroll flag instead of the category, and the pushed URL is `?page=N` with no category parameter. A malformed or out-of-range page clamps as it already does.
- With an Author and no Blogs, the Rule is followed by "No articles found" and no Pagination, exactly as the Blog Listing's empty state.
- With no Author, the component behaves exactly as today: Category Filter, category in the URL, scroll to the filter.

**Page title and robots.** The Team entry template sets the SEOmatic page title to "Posts by {name}". When the Team Member is the Author of no enabled Blog, it sets the robots meta to `noindex, follow`; otherwise it leaves the section default. The sitemap keeps every Team Member's page, as ADR-0006 records.

**Out of the Blog Listing page.** The Blog Listing page template is unchanged: it calls the component without an Author.

**Seed.** Seeds under `.scratch/seeds/author-page/`, not committed, one per entry since a Seed targets one entry:
- `gareth-hoyle` in the `team` section, `fields.authorDescription` the node's copy: "Gareth Hoyle is the Managing Director and Founder of Marketing Signals, a specialist SEO and digital marketing agency. He has over 15 years of experience helping businesses grow through search, and has built Marketing Signals into one of the UK's most respected independent agencies".
- Fourteen Blogs in the `blog` section with `fields.author` `["gareth-hoyle"]`, including "How to pitch a journalist: What an ex-Reach PLC pro really thinks of your pitch", "SEO for Fashion Brands: What Actually Works and What's Changing" and "How to Write Content for SEO That Converts and Ranks", which the node shows. Fourteen puts two pages in his Pagination.
- Two further Blogs with `fields.author` `["harry-nisbet"]`.
- "Google Navboost explained", the one Blog that already has an Author, is already Gareth's and counts among his fourteen, so thirteen Blog Seeds are for him.

**Docs.** `CONTEXT.md` and ADR-0006 were updated during the grilling session. The Blog Listing spec is not edited; this spec records the component's new value.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The one seam is the rendered Author Page through the global layout, at `/authors/{slug}`; the Team section's URLs, the header and the narrowed Sprig component all show there. Because the Sprig component is shared, the Blog Listing page at `/insights` is rechecked at the same seam for regression. The Seed command's output is supporting evidence. Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the right person's photo, name and introduction, only their Blogs in the Blog Listing's rhythm, page two arriving without a reload, and an empty writer's page that still looks finished. The group review takes the screenshots of record once; every other line is a state checked on the site and reported.

**Evidence plan.**

Screenshots, Author Page:

1. `/authors/gareth-hoyle` at 1600, full page: the Breadcrumb "Home › Team › Posts by Gareth Hoyle", the 71px Image and the name at 92px, the Author Description in columns 9 to 12 level with the name, the full-width Rule, a Blog Set over eight Blog Large Cards, and Pagination on page one of two. Compared against the Figma node. Proves the desktop layout and the narrowed listing.
2. `/authors/gareth-hoyle` at 768, full page: Image and name stacked above the full-width Author Description, name at `6xl`, cards as the Blog Listing lays them at this width. Proves the tablet layout.
3. `/authors/gareth-hoyle` at 390, full page: the same stacked order, name at `5xl` wrapping beside the Image, cards one to a column. Proves the mobile layout.
4. `/authors/ella-ward` at 1600, top of page: no Image, the name at the left edge, the Rule and "No articles found", no Pagination, the right-hand side empty. Proves the no-Image and empty states.

States checked on the site and reported:

5. `/authors/gareth-hoyle` at 1600, page 2 chosen: only the grid and Pagination swap, the address reads `?page=2`, the Rule scrolls beneath the header; loading `?page=2` directly shows the same three cards. Proves paging, the URL and the scroll target.
6. `/authors/harry-nisbet`: exactly his two Blogs, a Blog Set of two with the gap empty, no Pagination; none of Gareth's Blogs on it and neither of Harry's on Gareth's. Proves the narrowing by Author.
7. `/insights` at 1600 and 390: the Category Filter present, choosing a Category and then page 2 behaves as before with `?category=` in the address and the filter as the scroll target. Proves the shared component is unchanged without an Author.
8. Markup on `/authors/ella-ward`: `<meta name="robots" content="noindex, follow">`; on `/authors/gareth-hoyle`: no `noindex`, title "Posts by Gareth Hoyle", one `h1` reading "Gareth Hoyle", the Image with an empty alt, the BreadcrumbList schema with Home, Team and "Posts by Gareth Hoyle". Proves robots, title, heading and schema.
9. A Team Member temporarily disabled (restored afterwards): their `/authors/` URL returns 404. One of Gareth's Blogs temporarily disabled (restored afterwards): it leaves his page. Proves enabled-only.
10. Gareth's Author Description temporarily emptied (restored afterwards): nothing in columns 9 to 12, the name unmoved. Proves the empty Author Description.
11. A Team entry in the control panel: the slug field visible and the preview opening the Author Page. Proves the editor affordances.
12. Tab through `/authors/gareth-hoyle` at 1600: Breadcrumb links, every card and every Pagination control take a visible focus ring; with `prefers-reduced-motion: reduce` the page change does not animate its scroll. Proves keyboard and reduced motion.
13. The Seeds run with `--dry-run`, then for real, then a second time: Gareth's Author Description and fifteen new Author relations set on the first run, the second run writing nothing new. Proves the seeding.

## Out of Scope

- Linking the Blog Hero's Avatar Group, a Blog Card or the Team Modal to the Author Page; linking from the Blog page is planned as later work.
- An index of all Authors at `/authors`.
- A Category Filter on the Author Page.
- Removing Team Members with no Blogs from the sitemap, or a 404 for them.
- Showing the Job Role, Quote, Video or Team Modal text on the Author Page.
- Person schema or social profile links for an Author.
- Guest Authors who are not Team Members, or more than one Author per Blog (ADR-0005).
- Removing the vestigial `minAuthors` and `maxAuthors` settings on the Blog section.
- Blocks, a Hero Layout or a Header Colour choice on a Team Member.
- A dedicated mobile or tablet design.
- Committing the Seeds.

## Further Notes

- Node geometry at 1600, text boxes trimmed to cap height: the Breadcrumb at x 40, y 123; the Image at x 40, y 249, 71 square; the name at x 131, y 254, 878 wide; the Author Description at x 1067 (column 9), y 254, 493 wide, 16px Regular leading 1.33, four lines; the Rule's 1px Creme 300 line at y 378, 1520 wide; the first cards at y 429, 50px beneath it, matching the Blog Listing's gap beneath its Rule; the Pagination centred 70px beneath the last row.
- The node's Breadcrumb middle crumb reads "Author" with no page behind it; "Team" linking to the Team Listing page replaces it by decision, and its last crumb "Posts by Gareth Hoyle" is kept.
- The node's card copy repeats one placeholder article; its three distinct titles are real Blogs and are among Gareth's seeded Blogs.
- Twenty-four Blogs and twenty-five Team Members exist locally; one Blog had an Author before this spec, Gareth Hoyle, and no Team Member had an Author Description. Ella Ward is the one Team Member without an Image.
- The Team section is a structure; its order does not affect the Author Page, whose Blogs keep the Blog Listing's order.
