# Playbook Listing

Spec for the Playbook Listing page: a centred Listing Header of a heading with the Highlight over a short text, a centred Category Filter beneath it, and the Playbook Grid — every enabled Playbook as a Playbook Card, three to a row on a desktop, two on a tablet and one on a phone, nine at a time with Load More beneath. It sits between the page's Hero and its Blocks. It is the third listing page after Case Studies and Team, the first to combine the Category Filter with Load More in one Sprig component, and the first surface for the Playbook Card.

Design: Figma node `9974-15559` in the Marketing Signals file, 1600 wide, a group named "Group 46381" holding the heading "Twelve playbooks. *Pick yours.*" centred at 62px, a centred two-line text with two inline links, a centred row of five Filter Buttons ("All Playbooks", "B2B", "Commerce", "Place-based", "Regulated"), and twelve "Playbook / Exterior / 4 col / White" cards at 493 by 530, 20px apart in both axes, numbered "No. 01" to "No. 12" in reading order. No hover frame, no tablet frame, no mobile frame and no Load More frame exist, so those rules are decisions, not measurements.

Branch: feature/playbook-listing

Related: the Case Study Grid spec, whose Sprig component, Category Filter, Filter Button carousel and `?category=` query string this page copies wholesale; the Team Grid spec, whose Load More append this page copies; the Carousel - Blog spec, which built the `2x1` transform, the meta row pattern and the "pill as a `span` inside a Linked Card" rule this card reuses. ADR-0001 applies: the page has a Hero, which pads for the fixed Header. ADR-0002 applies: the review content arrives by Seed. ADR-0003 applies and is extended: the breadcrumb's section-to-listing-type map gains its `playbook` line, which is what gives a Playbook page its "Playbooks" crumb. ADR-0004 applies unchanged: the page's Hero Layout sets the Header Colour. No new ADR: nothing here is hard to reverse and nothing is surprising given the three specs above. Vocabulary: `CONTEXT.md`, the new "Playbook Listing" section, which gained Playbook, Playbook Listing page, Listing Header, Playbook Grid, Playbook Card, Playbook Number, Word Count, Read Time and Scrim during the grilling session; the Category Filter, Filter Button and Load More entries were widened to name the Playbook Grid rather than duplicated.

The branch is code-reviewed against this spec before merge.

## Problem Statement

Twelve Playbooks exist as a section with URLs of their own, and nothing lists them. `templates/_pages/types/entryPlaybookListing.twig` is a stub that renders the page's Hero and its Blocks and nothing between them, so a visitor who reaches `/playbooks` sees an empty page, and a visitor on a Playbook page has no way back up to the series. The Playbook Listing entry type already carries a Heading and a Text an editor can fill, and they render nowhere. The Playbooks are a numbered series aimed at different industries, so a visitor arriving for one industry needs to narrow twelve guides down to the two or three that apply to them, and there is no filter to do it with. Meanwhile `templates/_components/breadcrumb.twig` has no `playbook` key, so every Playbook page's breadcrumb — and the SEOmatic schema derived from it — is missing its middle crumb.

## Solution

The Playbook Listing page renders three things between its Hero and its Blocks. First the Listing Header: the page's Heading centred at 62px with the words the editor italicised shown in Primary, and the page's Text centred beneath it, both narrower than the content width so the lines stay readable. Then the Category Filter: a centred row of pills led by "All Playbooks", one per Playbook Category that at least one enabled Playbook belongs to, scrolling sideways under a pair of arrows where the row is wider than the page. Then the Playbook Grid: every enabled Playbook as a Playbook Card, three to a row from the desktop breakpoint, two from the tablet breakpoint and one below it, nine at a time, with a Load More button beneath while more remain.

A Playbook Card shows the Playbook's Thumbnail across the top, with its first Category as a translucent badge and its Playbook Number ("No. 07") in white over the top-left of the image under a Scrim. Beneath the image sit the Word Count and the Read Time, each with an icon, divided by a thin line. Then the Playbook's Heading with its Highlight, its Description, and a "Read More" pill across the bottom of the card. The whole card is one link to the Playbook; the pill is decoration.

Choosing a Filter Button narrows the grid to that Category and puts the choice in the address bar, so the filtered view can be linked to and reloaded. The Playbook Number is the Playbook's place in the series, not its place in the result, so filtering to Regulated shows "No. 07", "No. 08" and "No. 09" rather than renumbering them from one. Load More brings in the next nine, keeping the Category Filter's choice and continuing the numbers.

## User Stories

1. As an editor, I want the Playbook Listing page to list every Playbook automatically, so that publishing a Playbook puts it on the page without my editing anything.
2. As an editor, I want to write the page's Heading and mark words italic to Highlight them, so that "Pick yours." stands out in the accent colour.
3. As an editor, I want to write a short Text beneath the Heading with links in it, so that I can point newcomers at the two Playbooks that suit most people.
4. As an editor, I want to leave the Heading or the Text empty, so that the page can start straight at the filter when the header adds nothing.
5. As an editor, I want to reorder Playbooks in the structure, so that I control which Playbook is No. 01.
6. As an editor, I want a Playbook's number to come from its place in the series, so that renumbering is a drag in the control panel and never a surprise on the page.
7. As an editor, I want a disabled Playbook left out of the grid and out of the numbering, so that unpublishing a guide removes it cleanly.
8. As an editor, I want to tag a Playbook with Categories, so that visitors can filter to their industry.
9. As an editor, I want only Categories that at least one enabled Playbook uses to get a Filter Button, so that a visitor never picks a filter that returns nothing.
10. As an editor, I want the Heading on a Playbook to drive its card, so that the card can Highlight a phrase that the plain title cannot.
11. As an editor, I want a Playbook with no Heading to fall back to its title on the card, so that a half-finished Playbook still reads correctly.
12. As an editor, I want the page's own Blocks to render beneath the grid, so that I can add a call to action under the series.
13. As a visitor, I want to see every Playbook in one grid, so that I can judge the size of the series at a glance.
14. As a visitor, I want each card numbered, so that I can tell the series is ordered and find my place in it.
15. As a visitor, I want the number to stay the same when I filter, so that "No. 07" means the same Playbook however I got to it.
16. As a visitor, I want to narrow the grid to my industry with one click, so that I do not read twelve headings to find two.
17. As a visitor, I want the filter choice in the address bar, so that I can bookmark or share the filtered view.
18. As a visitor, I want a reloaded or shared filtered address to open already filtered, so that the link shows what it promised.
19. As a visitor, I want the page not to jump when I choose a filter, so that I keep my place while comparing Categories.
20. As a visitor, I want nine Playbooks to begin with and a Load More button, so that the page is not a wall of cards on arrival.
21. As a visitor, I want Load More to keep my Category choice, so that clicking it never widens the grid back to everything.
22. As a visitor, I want Load More to disappear once everything is shown, so that I am not offered a button that does nothing.
23. As a visitor, I want each card to show the word count and read time, so that I can judge the commitment before clicking.
24. As a visitor, I want each card to show its Category, so that I can see what it covers without reading the description.
25. As a visitor, I want the whole card to be one link, so that I can click anywhere on it.
26. As a visitor on a desktop, I want three cards to a row, so that I can scan the series in four rows.
27. As a visitor on a tablet, I want two cards to a row, so that the thumbnails and headings stay readable.
28. As a visitor on a phone, I want one card to a row, so that nothing is squeezed.
29. As a visitor, I want the "Read More" pills in a row to line up, so that rows of cards look deliberate when the descriptions differ in length.
30. As a visitor, I want the badge and number legible over a pale photograph, so that the top of the card always reads.
31. As a visitor on a Playbook page, I want a "Playbooks" crumb between Home and the Playbook, so that I can get back to the series.
32. As a keyboard user, I want each card to take focus once, in reading order, so that I can tab through the grid without stopping on the pill.
33. As a keyboard user, I want the Filter Buttons to be radio buttons I can arrow between, so that the filter works the way a filter should.
34. As a keyboard user, I want the newly loaded cards to be reachable after Load More, so that the button does not strand me.
35. As a screen reader user, I want the cards announced as a list with a count, so that I know how many Playbooks the filter returned.
36. As a screen reader user, I want the grid announced when it changes, so that filtering and loading are not silent.
37. As a screen reader user, I want the "Read More" pill skipped, so that each card announces one link named by its heading.
38. As a screen reader user, I want the decorative Thumbnail and Scrim skipped, so that the card is announced by its Category, number, meta, heading and description only.
39. As a visitor with a narrow screen, I want the filter row to scroll sideways rather than wrap, so that the header stays one line tall.
40. As a visitor who prefers reduced motion, I want the filter's sideways scroll and any card hover movement to drop out, so that the page is still usable.
41. As a developer, I want the filter and Load More in one Sprig component, so that there is one place where the grid's state lives.
42. As a developer, I want the Playbook Card as its own component, so that a future Playbook Carousel or related-Playbooks Block can reuse it.
43. As a developer, I want the Word Count and Read Time to be literals with one obvious place to swap in real values, so that hooking them up later is a small change.
44. As a reviewer, I want twelve Playbooks seeded with the node's content and images, so that I can compare the page against Figma at full size.

## Implementation Decisions

**No new entry types and no new fields.** Everything this page needs already exists in project config. The Playbook section is a structure with the URI `playbook/{slug}`; its `entryPlaybook` type carries `heading` (CKEditor), `thumbnail` (Assets), `description` (CKEditor) and `categoriesPlaybook` (Categories, group `playbook`). The `entryPlaybookListing` type carries `heading` and `text`. This spec writes templates and one line of the breadcrumb map; it changes no project config at all.

**Page template.** `templates/_pages/types/entryPlaybookListing.twig`, today a stub, gains the Listing Header and the grid between the Hero and the Blocks, in a section embed with `paddingY: 'topBottom'` and `paddingYSize: 'base'`, exactly as the Case Study Listing page does. The `headerColours` map and the `headerColour` line stay as they are (ADR-0004). The Listing Header is rendered by the page template, not by the Sprig component, because it never changes when the grid swaps; the Sprig component holds only what a filter or a Load More can alter. The grid is called as `sprig('_sprig/playbookGrid', …)` with the `category` query parameter passed in, `id: 'playbookGrid'` and `aria-live: 'polite'`, so a direct load of `?category=b2b` renders the state a swap would.

**Listing Header.** A twelve-column row holding one centred column. The Heading goes through the alternate heading component as an `h1`, colour `base`, the Highlight in its `base` style (Primary, **not** fluro), at the `7xl` size the node measures, with a max width around the node's 1007px and `mx-auto`. The Text goes through the rich text component at the body size, centred, with a max width around the node's 750px. The Text's inline links keep the rich text component's link styling; they are real links, and they are outside the grid, so nothing nests. An empty Heading drops the heading, an empty Text drops the text, and with both empty the Category Filter leads the section. Both are guarded with the house `striptags|trim|length` test.

**Sprig component.** One new component, `templates/_sprig/playbookGrid.twig`, modelled on `_sprig/caseStudyGrid.twig` for the filter and on `_sprig/teamGrid.twig` for the append. It takes `category` (a Category slug, default empty), `offset` (default 0) and `scroll` (default 0). Its query is every enabled Playbook in structure order, `relatedTo` the active Category, `offset` and `limit` applied. Nine per view. The component's own id is `playbookGrid`, the list's id is `playbookGridItems`, and each list item carries a `data-playbook-grid-card` attribute. No `>` appears in any `s-*` value — the same constraint the Case Study, Careers and Team components all carry a comment about — so the appended cards are selected by that data attribute, not a descendant selector.

**Two kinds of swap.** A Filter Button replaces the whole component: it sends `s-val:category`, resets `s-val:offset` to 0 and pushes `?category=<slug>` with `s-push-url`, so the grid, the filter row's active pill and the Load More button are all rebuilt together and the address bar matches. Load More appends: it sends the current `category` with `s-val:offset` set to the number already shown, targets `#playbookGridItems` and selects `[data-playbook-grid-card]`, so the existing cards stay put and the next nine are added after them. Load More does not push a URL — the address stays at the Category, because a shared link should open at the first nine, not at an arbitrary depth. Neither swap scrolls the page: the Case Study Grid's `scroll` flag exists because pagination replaces the visible cards, and neither of this page's swaps does.

**Playbook Number.** Resolved once per request from the ids of every enabled Playbook in structure order, before the filter is applied, and looked up per card. So the number is the Playbook's place in the series: filtering to Regulated shows No. 07, No. 08 and No. 09, and Load More continues from No. 10 rather than restarting. It is rendered zero-padded with the node's "No. " prefix — `'No. %02d'|format(position)` — following the house `'%02d'|format(…)` idiom used by the Service Card and the Service Carousel. A thirteenth Playbook would render "No. 13"; the two-digit padding is a minimum, not a cap.

**Category Filter.** Copied from `_sprig/caseStudyGrid.twig` with three changes: the Category group is `playbook`, the relation is scoped to enabled Playbooks so an unused Category earns no Filter Button, and the leading button reads "All Playbooks" rather than "All Work". It keeps the `fieldset` with its `sr-only` legend "Filter by category", the carousel embed with `slidesPerView: 'auto'`, `spaceBetween: 10`, `freeMode`, `watchOverflow` and the `initialSlide` set to the active pill, the `filterButton` component in the slide block, and the two `buttonShape` arrows in the after block toggled by Alpine `x-show` with `x-cloak`. The row is centred rather than left-aligned, which is the only visual difference from the Case Study Grid's. The Case Study Grid's `creme-300` rule beneath the filter is **not** carried over: the node does not draw one.

**Playbook Card.** A new component, `templates/_components/playbookCard.twig`, params `{ playbook, number, sizes, class }`. The root is a single `<a href="{{ params.playbook.url }}">` with `group`, following `blogCard.twig` and `blogCardLarge.twig`. Inside, top to bottom:

- The Thumbnail through the picture component on the `2x1` transform — the node's image is 483 by 225, which is 2.147:1, and `2x1` is the transform the Blog cards already use for a near-identical ratio — inset 5px inside the card with 15px corners over a black ground, inside a card with 20px corners and a white background. A Playbook with no Thumbnail gets a placeholder in the same box, as the Case Study Card does.
- The Scrim over the top of the image: a Tailwind gradient from black at low opacity to transparent, `aria-hidden`, no exported asset. Figma names the layer "Bottom Shadow" but positions the badge and number at the top, so the gradient runs top-to-bottom; the direction is confirmed against the node during evidence capture.
- The badge and the Playbook Number in a row over the image's top-left, 25px in from the card edge: the first Category through the badge component at `colour: 'white-20'`, `size: 'sm'` — which already carries `bg-white/20 backdrop-blur-[2px]`, matching the node's tag exactly — and the number as white text at the `xs` size beside it.
- The meta row, 20px below the image and 40px in from the card edge.
- The Heading through the alternate heading component as a `p` — a heading inside the card's link is invalid, the rule `caseStudyCard.twig` and `blogCardLarge.twig` both carry — at the `3xl` size, colour `base`, Highlight in the `base` style (Primary). It reads `playbook.heading` when that has text and falls back to `playbook.title` when it does not, so the fallback gets identical type with no Highlight.
- The Description, tags stripped to plain text, at the `sm` size. Stripping is not cosmetic: the Description is a CKEditor field and a link inside the card's link is invalid, which is the same reason `blogCardLarge.twig` strips its own.
- The "Read More" pill: the button component with `type: 'span'`, `colour: 'creme-400-outline'`, `icon: null` and `class: 'w-full justify-center'`, pushed to the bottom of the card with `mt-auto`. It is a `span`, so it takes no focus and is not announced — the card's one link is named by the heading. There is no full-width size option on the button component, which is why the width comes through `class`.

Card content sits in 40px of padding; the pill is 40px from the bottom. Cards stretch to the tallest in their row, so the pills line up across a row. The Description is not line-clamped.

**Meta row.** A new component, `templates/_components/playbookMeta.twig`, params `{ wordCount, readTime, colour, class }`. `blogMeta.twig` is nearly this component already, but it is shaped around a date plus a literal read time; generalising it would pull the Blog Card and Blog Card Large into this branch, and the decision taken in the grilling session was to keep this branch's diff to Playbooks. The two should be merged into one generic meta row later — that is named in Out of Scope, not done here. `playbookMeta` follows `blogMeta`'s markup: a flex row of two icon-and-text pairs, the first with a `border-r` divider and right padding, icons as raw `<i>` elements with `aria-hidden="true"` on the house `fa-sharp fa-regular` classes (`fa-clipboard-list` and `fa-clock`), text at the `xs` size.

**Word Count and Read Time are literals.** `wordCount: '3,400 words'` and `readTime: '14 min read'` as the card component's `defaultParams`, overridable through params. The Playbook entry type has no field for either and the real figures belong to the Playbook's own Blocks, which have no content yet; a value derived from the Description would look right and be wrong. `_components/readTime.twig` already converts a word count to a "N min read" string at 265 words per minute, so the eventual hookup is feeding it a real count, not building a read-time feature. The node writes "3,400 words" on the first card and a bare "3,700" on the rest; the unit is always included, since an icon beside a naked number is ambiguous.

**Grid.** A list, one item per Playbook, on the house twelve-column grid with the 20px gap: `col-span-12` below the tablet breakpoint, `md:col-span-6` from it and `lg:col-span-4` from the desktop breakpoint — the same ladder `_sprig/teamGrid.twig` uses, so the two grids breathe together. Three cards of 493 plus two 20px gaps is the 1520 content width the node draws inside the 40px site margins. Image `sizes` follow the three steps. The grid carries the house `[&.htmx-request]` classes that dim it and take its pointer events during a swap. With no Playbooks matching the filter the grid is replaced by a short "No playbooks found" line, and the Load More button is not rendered.

**Load More.** The button component as a `button`, label "Load More", `colour: 'secondary'`, the `fa-sharp fa-regular fa-arrow-down` icon, centred beneath the grid, carrying the append attributes. It is rendered only while some Playbooks are not yet shown; when they all are, the wrapper is rendered empty rather than removed, so Sprig always has a node to swap — the shape `_sprig/teamGrid.twig` already uses.

**Breadcrumb.** `templates/_components/breadcrumb.twig`'s `options.listingType` map gains `playbook: 'entryPlaybookListing'`. That is the whole change, and it is what ADR-0003 means by "grows one line per listing section": a Playbook page's trail becomes Home › Playbooks › the Playbook, and the SEOmatic BreadcrumbList follows it. The map's missing `blog` key is a pre-existing gap in the same map and is left alone.

**No Alpine beyond what is inherited.** The filter carousel's arrow visibility is the carousel component's existing Alpine; nothing else on this page has client state. There is no custom cursor on the Playbook Card — the Case Study Card dispatches `component-cursor` on hover, and the decision taken in the grilling session was that the Playbook Card does not, because its "Read More" pill is already the affordance.

**Accessibility.** The cards are a list, so a count is announced. The page Heading is the `h1`; card headings are `p`, since each card is a link. A card's link is named by its contents; the Thumbnail has an empty alt and the Scrim is `aria-hidden`. The grid carries `aria-live="polite"` so filtering and loading are announced. The filter is a `fieldset` of radio buttons with an `sr-only` legend. Nothing inside a card is focusable.

**Empty states.** No enabled Playbooks: the filter renders with "All Playbooks" alone and the grid shows its empty line. A filter matching nothing cannot be reached, because a Category earns a Filter Button only while an enabled Playbook uses it. A Playbook with no Heading falls back to its title; with no Thumbnail it gets the placeholder; with no Category the badge is left out and the Playbook Number sits alone; with no Description the paragraph is left out and the pill still sits at the bottom.

**Review content.** Seeds in the scratch folder for this spec. One Seed per Playbook — the Seed file's `entry` key names one slug — each carrying `section: playbook`, `type: entryPlaybook`, a `title`, and a `fields` map setting `heading`, `thumbnail`, `description` and `categoriesPlaybook`. The Categories resolver creates the four Categories (B2B, Commerce, Place-based, Regulated, plus Education) on first use. All twelve Playbooks from the node are seeded, in the node's reading order, so the Playbook Numbers on the page match the node's. A thirteenth is seeded temporarily for one evidence line and removed. A further Seed targets the Playbook Listing page's own `heading` and `text` fields with the node's copy, including the two inline links. Images come from the node's exported assets. Seeds are not committed.

**Styleguide.** The Playbook Card and the meta row gain previews alongside the other component previews, since both are new components intended for reuse.

**Docs.** `CONTEXT.md` gained the Playbook Listing section during the grilling session, and the Category Filter, Filter Button and Load More entries were widened to name the Playbook Grid. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per `docs/agents/evidence.md`, compared against the Figma node at the same width.

**Seams.** The single primary seam is the rendered Playbook Listing page at `/playbooks` through the global layout, with the twelve Playbooks and the page's own Heading and Text seeded. Everything new — the page template, the Sprig component, the Playbook Card and the meta row — is exercised through that one page, at the highest point in the stack, and no new seam is introduced. The secondary seams are a Playbook entry page at `/playbook/<slug>`, which is where the breadcrumb change shows, and the Seed command's own output, which proves what was written.

**What good evidence looks like.** It shows what a visitor would see: the centred header with its purple Highlight, the filter row, twelve — then nine — cards at the designed size with their thumbnails, badges, numbers, meta, headings, descriptions and pills, the filtered view with its numbers unchanged, Load More before and after the click, the two-column and single-column steps, and the empty and fallback states. Fixed widths, one state per file, before and after pairs on the PR. The before for this page is `/playbooks` on `main` at the commit the branch forked from, which renders nothing between the Hero and the Footer. Tablet is captured as well as mobile and desktop, because the grid introduces `md:` rules of its own.

**Prior art.** The Case Study Grid spec's evidence plan, which proved the same filter on the same kind of page, and the Team Grid spec's, which proved the same Load More.

**Evidence plan.**

1. `/playbooks` at 1600, full page, on arrival: the centred heading at 62px with "Pick yours." in Primary, the centred text with its two links beneath, the centred filter row led by "All Playbooks" with its radar dot filled, then nine Playbook Cards three to a row and 20px apart inside 40px margins, each 493 wide, and the Load More button centred beneath. Compared against the Figma node. Proves the desktop layout.
2. `/playbooks` at 1600, viewport, the first card at rest, zoomed: the 2x1 thumbnail inset 5px with 15px corners on a 20px-cornered white card, the Scrim over its top, the "Commerce" badge translucent and blurred beside "No. 01", the "3,400 words" and "14 min read" pair divided by a thin line, the heading at 30px with "E-commerce" in Primary, the description, and the full-width "Read More" pill 40px from the bottom. Proves the card anatomy.
3. `/playbooks` at 1600, viewport, a row of three cards with descriptions of different lengths: the three "Read More" pills level with each other. Proves the `mt-auto` bottom alignment.
4. `/playbooks` at 1600, after clicking "Regulated": the grid showing only the Regulated Playbooks, their numbers reading No. 07, No. 08 and No. 09 rather than No. 01 to No. 03, the "Regulated" pill filled, the address bar reading `?category=regulated`, and the page not having scrolled. Proves the filter, the stable Playbook Number and the no-jump rule.
5. `/playbooks?category=regulated` loaded directly at 1600: the same state as the previous capture. Proves a shared or reloaded filtered address opens filtered.
6. `/playbooks` at 1600, before and after clicking "Load More": nine cards then twelve, the first nine unmoved, the last three numbered No. 10 to No. 12, and the button gone once all twelve are shown. Proves the append and the button's disappearance.
7. `/playbooks?category=commerce` at 1600, clicking "Load More" with a thirteenth Commerce Playbook temporarily seeded: the appended cards still Commerce only, and the address bar still reading `?category=commerce`. Removed afterwards. Proves Load More keeps the Category.
8. `/playbooks` at 768, full page: two cards to a row, the header and filter still centred, the filter row scrolling sideways with its arrows shown. Proves the `md` step.
9. `/playbooks` at 390, full page: one card to a row, the heading stepped down, the filter row scrolling sideways. Proves the mobile stack.
10. `/playbooks` at 1600, keyboard: tab from the Header into the filter, arrow between the Filter Buttons, then tab into the grid; each card takes focus once with a visible outline and the "Read More" pill never takes focus. Then tab after a Load More click and confirm the appended cards are reachable. Proves the focus order and that Load More does not strand the keyboard.
11. `/playbooks` at 1600 with reduced motion emulated, viewport: the filter row and the cards at rest with no movement, all states still legible. Proves the reduced-motion rule.
12. `/playbook/a-visibility-playbook-for-fintech-brands` at 1600, viewport: the breadcrumb reading Home › Playbooks › the Playbook, with "Playbooks" linking to `/playbooks`. Proves the ADR-0003 map line. The before for this line is the same page on `main`, whose trail is missing its middle crumb.
13. Served HTML of `/playbooks`, checked and reported in the PR body, not dumped: the section holding an `h1`, the rich text, a `fieldset` with an `sr-only` legend and radio inputs, and a list of nine items each being one `<a>` containing a `p` heading, a paragraph and a `span` pill with no link, heading or focusable element nested inside; `aria-live="polite"` on the grid; no `>` in any `s-*` attribute value; no inline styles beyond the picture component's ratio property. Proves the markup.
14. `/playbooks` at 1600 with the page's Heading and Text temporarily emptied: the filter row leading the section with no empty header space above it. Restored afterwards. Proves the header empty states.
15. `/playbooks` at 1600 with one Playbook's Heading, Thumbnail, Description and Categories temporarily emptied in turn: the title in place of the heading, the placeholder in place of the image, no paragraph, and the Playbook Number alone with no badge — the pill still at the card's bottom in every case. Restored afterwards. Proves the card's field fallbacks.
16. `/playbooks` at 1600 with every Playbook temporarily disabled: the "All Playbooks" pill alone and the "No playbooks found" line, with no Load More button. Restored afterwards. Proves the empty grid.
17. Seed command output for the Playbook Seeds and the listing page Seed, each run twice: the twelve entries created with their fields and Categories resolved on the first run, everything skipped or re-resolved without duplication on the second. Saved as text beside the screenshots. Proves the seeding.
18. Control panel, a Playbook's edit form and the Playbook Listing page's edit form: the fields this page reads, unchanged by this branch. Proves no project config moved.

## Out of Scope

- **A real Word Count and Read Time.** Both stay literals until Playbooks have content to count. Hooking them up means feeding `_components/readTime.twig` a real count, and it is a separate ticket.
- **Fields for Word Count or Read Time** on the Playbook entry type, and any project config change at all.
- **Generalising `blogMeta.twig`.** `playbookMeta.twig` is a second near-identical meta row by decision, to keep this branch's diff to Playbooks. Merging the two into one generic meta row is a named follow-up.
- **A `blog` key in the breadcrumb map.** A pre-existing gap in the same map, left alone.
- **The Playbook entry page template.** This spec lists Playbooks; it does not design or build the page a card links to.
- **Pagination.** Load More is the control, and `_components/pagination.twig` is not used here.
- **Sorting or a search box.** The order is the structure order and the only narrowing is the Category Filter.
- **Multiple Categories on a card.** The badge shows the first, as the Case Study Card does.
- **A custom cursor on the card**, a hover Zoom on the Thumbnail, or any hover motion beyond the pill's own states.
- **A Playbook Carousel, a related-Playbooks Block, or any Block built from the Playbook Card.** The card is built so they are possible, not built here.
- **A dedicated tablet or mobile design.** No such node exists; the responsive rules above are decisions.
- **Changing the Case Study Grid, the Team Grid, the Blog cards, the carousel, the filter button or the badge components.**
- **Committing the Seeds.**

## Further Notes

- The node's twelve cards are laid out column-major in the Figma absolute positions (No. 01, No. 04, No. 07, No. 10 down the left) but read in reading order across the rows, which is what the screenshot shows and what the grid produces. Anyone reading the raw node output should not take the position order for the numbering order.
- The card is 493 wide at 1600. Three of them plus two 20px gaps is 1519, against the 1520 content width inside the 40px site margins — so the card is four columns of the site's twelve-column grid, not a bespoke width.
- Row tops in the node are 975, 1525, 2075 and 2625 — 550 apart against a 530 card, which is the 20px `gap-5` between rows.
- The heading is 62px with 0.97 leading and -2.48px tracking, which is the `7xl` token exactly: `tracking-tighter` at -0.04em on 62px is -2.48px. The card heading is 30px with -1.2px tracking, which is the same -0.04em on the `3xl` token.
- Every colour in the node is already a theme token: `#745CF6` is `primary`, `#0E0A10` is `black`, `#DDDAD1` is `creme-300`, `#D3D0C5` is `creme-400`. No new tokens.
- The node draws the meta icons at 10px while `blogMeta.twig` uses 12px. The design's size is followed here; if the two meta rows are ever merged, that difference has to be resolved rather than averaged.
- The node's word counts are inconsistent — "3,400 words" on the first card, bare numbers on the rest. Treated as a design slip, not an intent.
- The Case Study Grid keeps a `creme-300` rule between its filter and its cards. The Playbook node has none, so this page has none. If the two listings are ever aligned, that is the difference to look at.
