# Hero Blog

Spec for the Blog Hero: the light Hero at the top of every Blog page, built from the Blog's own Hero Heading, Hero Image and Author rather than a Hero Layout, so an editor never picks it. The Breadcrumb sits on the header's bottom edge reading Home › Insights › the Blog; the heading sits on the left over nine columns; the post date, the Read Time and the Author's Avatar Group sit in a narrow column on the right, level with the heading; the Hero Image runs across the content width beneath them. It is the fourth Hero built from an entry's own fields, after the Case Study Hero, the Service Hero and the Career Hero, and the first thing a Blog page renders. It also introduces the Author, the first thing on the site to credit a Team Member for a piece of content.

Design: Figma node `9985-15565` in the Marketing Signals file, a group named "Group 46383", 1520 by 1067 inside a 1600 frame, starting at the header's bottom edge (y 123), for the Google NavBoost Explained Blog. No hover, tablet or mobile node exists; the responsive rules below are decisions, not measurements.

Branch: feature/hero-blog

Related: the Hero Career spec, whose anatomy this Hero shares almost exactly — light page, Breadcrumb on the header's edge, heading left, a meta column right, the image beneath — and whose breadcrumb-to-heading ramp, image ratio and Seed approach this spec copies deliberately rather than sharing code; the Hero Service spec, whose component shape, title fallback and Avatar Group usage this Hero mirrors; the Hero Simple spec, whose breadcrumb `base` colour this Hero reuses on a light page; the Blog Carousel spec, which owns the Blog Meta this Hero reuses and the Blog Large Card that already renders the same date and Read Time; the Content Seeding spec, whose entry `fields` map fills the review content. ADR-0001 applies: the header is fixed, so the Hero pads its top by the header height from the shared header map. ADR-0002 applies: the review content arrives by Seed. ADR-0003 applies unchanged: the breadcrumb's listing map already carries `blog` to Blog Listing, so the trail needs no new line. ADR-0004 applies: the Blog Hero is light, so the Blog page drops its Black override and takes Creme 100. New ADR-0005 records that a Blog's Author is a Team Member rather than the Craft entry author. Vocabulary: `CONTEXT.md`, "Heroes" section, which gained Blog Hero, Author and Read Time during the grilling session, and whose Hero, Hero Heading and Hero Image now cover the Blog Hero; the "Global footer" section's Avatar Group was widened to cover a label in place of a Job Role.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A Blog page renders nothing. Its template is a stub holding two placeholder comments, so `/insights/<slug>` serves a header, a footer and an empty space between them — the site publishes 71 articles that no visitor can read the top of. The design for that top exists and has been signed off, but three things it shows have nowhere to come from. The heading and the photograph have fields on the Blog and nothing renders them. The Read Time exists only as a literal inside the Blog Meta. And the Author — the person the design credits by name and face — has no field at all: the Blog entry type has a Thumbnail, a Description, Categories, a Hero Heading, a Hero Image and a Longform, and nothing that says who wrote it. Craft's own entry author looks like the answer and is not: every authored entry on this site points at a single unnamed, photoless developer account, while the person the design names already exists as a Team Member entry with an Image.

The stub also carries a wrong assumption. It sets the Header Colour to Black, copied from the dark Heroes that came before it, but the design is light — black text on the page's own Creme 100 — so the header is currently specified to render dark over a creme page.

## Solution

A Blog Hero at the top of every Blog page, built from the Blog's own fields. Across the top, on the fixed header's bottom edge, the Breadcrumb reads Home › Insights › the Blog, its ancestors creme-500 and the current page black and underlined. Beneath it the heading fills the left nine columns at 62 pixels, taking the Blog's Hero Heading and falling back to its title so the page always has one. In a narrow column on the right, starting level with the heading, sit three facts about the article: its post date beside a calendar icon, its Read Time beside a clock, and beneath them the Author's Avatar Group — their photograph in a 42 pixel circle with "Written by" over their name. Beneath the whole lot the Hero Image runs the full content width with 20 pixel corners.

The Author is a new field on the Blog: a single relation to the Team section, so the person credited is the Team Member the site already holds, with their Image, and so an author page can later list everything they have written with one `relatedTo` query. It is optional: a Blog without an Author shows its date and Read Time and no Avatar Group, which is every Blog on the site until they are backfilled. A Blog without a Hero Image ends after its content.

Below the desktop breakpoint the two columns become one and the content reads in order: Breadcrumb, heading, date, Read Time, Avatar Group, image.

## User Stories

1. As a visitor, I want the top of a Blog to show its title, so that I know what I am about to read.
2. As a visitor, I want a trail above the title reading Home › Insights › this article, so that I can tell where in the site I am and get back to the listing.
3. As a visitor, I want every part of that trail but the current article to be a link, so that I can move up a level in one click.
4. As a visitor, I want the current article's crumb marked as the page I am on, so that I do not mistake it for a link.
5. As a visitor, I want the article's publication date shown, so that I can judge how current the advice is.
6. As a visitor, I want an estimate of how long the article takes to read, so that I can decide whether to read it now or later.
7. As a visitor, I want the date and the read time each carried by a small icon, so that I can tell them apart at a glance.
8. As a visitor, I want to see who wrote the article, by name and face, so that I can judge whether to trust it.
9. As a visitor, I want the author labelled "Written by", so that the name is unambiguous rather than a caption.
10. As a visitor, I want a large photograph beneath the heading, so that the article opens with something to look at.
11. As a visitor, I want the header to stay legible over the top of the page, so that the navigation does not disappear into the hero.
12. As a visitor on a phone, I want everything in one column in reading order, so that nothing is squeezed into a narrow strip.
13. As a visitor using a screen reader, I want the trail announced as a breadcrumb navigation with the current page marked, so that I can orient myself.
14. As a visitor using a screen reader, I want exactly one first-level heading on the page, so that the document outline is correct.
15. As a visitor using a screen reader, I want the hero photograph and the icons skipped, so that decoration does not interrupt the content.
16. As a search engine, I want the trail published as breadcrumb structured data, so that the article's position shows in results.
17. As an editor, I want to write a Hero Heading on a Blog, so that the hero can read differently from the title used on cards and in search.
18. As an editor, I want to leave the Hero Heading empty and get the title, so that a Blog is never published with an empty hero.
19. As an editor, I want to mark words italic in the Hero Heading to Highlight them, so that a key phrase can stand out.
20. As an editor, I want to choose a Hero Image, so that the article opens with a picture I picked.
21. As an editor, I want to leave the Hero Image empty, so that an article without a good photograph still publishes cleanly.
22. As an editor, I want to credit a Team Member as the Author of a Blog, so that the article carries a real byline.
23. As an editor, I want to pick that Author from the Team the site already holds, so that I do not retype a name and re-upload a photograph for every article.
24. As an editor, I want at most one Author per Blog, so that the byline matches what the design shows.
25. As an editor, I want the Author field beside the Thumbnail, the Description and the Categories, so that it sits with the other facts about the article rather than with the hero styling.
26. As an editor, I want to leave the Author empty, so that the 71 Blogs already published stay valid while they are backfilled.
27. As an editor, I want a Blog with no Author to simply omit the byline, so that an unbackfilled article does not render a blank circle or a placeholder person.
28. As an editor, I want a credited Team Member with no Image to show their initials, so that a missing photograph degrades rather than breaks.
29. As an editor, I want the crop of the Hero Image to follow the focal point I set, so that a face is not cut off by the wide shape.
30. As an editor, I want the hero to need no settings of its own, so that publishing a Blog is filling fields rather than configuring a layout.
31. As an editor, I want the Blog Hero never offered in the Hero field, so that I cannot accidentally put it on a page that is not a Blog.
32. As a developer, I want the Blog page to take the light header automatically, so that nobody has to remember to set it per article.
33. As a developer, I want the hero to pad its own top by the header height, so that it does not render under the fixed header.
34. As a developer, I want the date and Read Time to come from the existing Blog Meta, so that the hero and the cards cannot drift apart.
35. As a developer, I want the Author to be a relation rather than an account, so that an author page is a query rather than a migration.
36. As a developer, I want the review content set by Seed, so that the hero can be checked without control panel credentials.

## Implementation Decisions

**Author field.** A new project config field, Entry - Team, handle `entryTeam`, an Entries field sourced from the Team section with `maxRelations: 1` and the selection label "Add a Team Member". It follows the existing single-relation naming, Entry - Blog and Entry - Testimonial, and stays generic so a Playbook or a Case Study can take one later. The Blog entry type's Overview Content tab gains it with the layout element's handle overridden to `author` and its label to "Author", the way `heroHeading` and `heroImage` already override the generic Heading and Image fields on the same entry type. Not required: `minAuthors: 1` on the Blog section already goes unsatisfied by every Blog, and requiring the new field would fail validation on all 71 of them at their next save. No other field changes on the Blog entry type.

**Header Colour.** The Blog entry template drops its Black override, so the global layout's default of Creme 100 applies, per ADR-0004. The Career entry template carries the same wrong override and is left alone: it belongs to the Hero Career branch.

**Breadcrumb.** No change to the breadcrumb component. Its listing map already carries `blog` to Blog Listing, so the trail reads Home › Insights › the Blog with the middle Crumb labelled from the Insights page's own title, and the SEOmatic BreadcrumbList follows. The hero passes the entry and the existing `base` colour: ancestors creme-500 turning black on hover and focus, the current page black and underlined. No new colour.

**Blog Meta.** The blog meta component gains an `orientation` param, `row` by default and `column` for this Hero. `row` is exactly what it renders today — the date and the Read Time side by side with the vertical divider between them — so the Blog Card, the Blog Large Card and the Featured Blog are untouched. `column` stacks the two rows with an 18px gap and drops the divider. The icons, sizes, colours and the `j F Y` date format are shared by both. The Read Time stays the literal "5 min read" it is today, with its existing comment: no Blog carries any Longform content, so computing it would print "1 minute read" on every article, and the read time component's wording ("5 minutes read") does not match the design either. Both belong to the Longform ticket.

**Avatar Group.** The user component at size `sm`, with `preHeading` "Written by", the Author's title as the heading, the Author's Image as the avatar and no subHeading — the design shows no Job Role. Size `sm`'s preHeading moves from `text-2xs` to `text-xs` (14px, tracking-tight) to match the design; `preHeading` is passed by no caller anywhere in the codebase today, so this changes nothing that already renders. The avatar is 42px, the initials fallback is the component's own. The whole group is left out when there is no Author. The name is not a link: the author page does not exist and Team entries have no URI.

**Component.** A `heroBlog` component beside `heroCaseStudy`, `heroService` and `heroCareer`, with the standard sections, taking `entry`, `vars` and `class`. The Blog entry template includes it where its "Blog Hero" placeholder sits, above the Longform placeholder. Not a Hero Layout: never offered in the Hero field. The component reads the fields into local variables first: the heading (Hero Heading with tags stripped, else the title), the image, and the Author. It is a sibling of `heroCareer` rather than a shared light-hero component: that branch is unmerged, and the four entry-owned Heroes each own their own grid by established practice. Folding them together is a refactor for after both have landed.

**Panel.** A section with no vertical padding at its top and the section component's `bottom` padding beneath, no horizontal padding, holding the Hero: full width, no background of its own so the Creme 100 page shows, padded at its top by the header height from the shared header map per ADR-0001, the site margins at its sides. Content-height at every width.

**Grid.** The Breadcrumb spans the full width. Beneath it a twelve-column grid with a 20px column gap. The heading column spans twelve columns below `lg` and columns 1 to 9 from `lg`. The meta column spans twelve columns below `lg` and columns 11 to 12 from `lg`, starting on the same row as the heading so the date's top is level with the heading's top. Below `lg` the meta column follows the heading with 40px between them. The heading column's top sits 130px beneath the Breadcrumb's top from `xl` (the node's 131px, rounded to the spacing scale), and proportionally less beneath: 60px below `lg`, 90px from `lg`. Column 11 begins at 1323px on the 1600 frame, which is where the node puts the date, the Read Time and the avatar.

**Heading.** The alternate heading component as `h1`, black, semibold, leading 0.97, tighter tracking, the Highlight left at the component's primary default — the node's heading is solid black and uses no Highlight, but a Highlight an editor writes should still show rather than be silently dropped. Size ramp: 5xl at mobile, 6xl from `md`, 7xl (62px) from `lg`. Rendered even when only the title fallback fills it.

**Meta column.** The blog meta component in `column` orientation at the top, then the Avatar Group 70px beneath it. The 70px is fixed, not a `justify-between` stretch: the node's 69px gap is what falls out of this particular three-line heading ending level with the avatar, and a shorter heading has nothing to stretch against. 70px is also the gap beneath the content to the image, so one number governs both.

**Hero Image.** The picture component with the Hero Image, empty alt as decoration, focal point on, ratio off so the box is set explicitly, lazy off, full content width, 20px corners, 70px beneath the taller of the heading and the meta columns from `lg` and 40px beneath the meta column below it. A 4:3 box below `lg` and the design's 1520 by 705 ratio from `lg`, image covering. Sizes `(min-width: 1600px) 1520px, calc(100vw - 80px)`. Left out when empty, and the Hero ends at its content.

**Transform.** The image uses the existing `2x1` transform, which gains a 3040 width. 1520 by 705 is 2.156, and the transforms file already records that the Blog Large Card's 740 by 343 — the same 2.157 — is nearest `2x1`; a near-duplicate transform 0.05% away from it would be noise. The image is 1520 CSS pixels wide, so a retina screen needs 3040, which the transform does not currently offer. Adding a width is additive: existing callers gain one srcset candidate their `sizes` will never pick.

**Seeds.** One Seed under the scratch folder, not committed: the Google NavBoost Explained Blog, through the Seed's `fields` map, setting `author` to the Gareth Hoyle Team Member by slug. Its Hero Image and post date are already set, and it is one of only two Blogs on the site with a Hero Image. The How to Pitch a Journalist Blog needs no Seed: it already has a title, no Hero Heading, no Hero Image and no Author, proving the title fallback and both empty paths.

**Docs.** `CONTEXT.md` gained Blog Hero, Author and Read Time, its Hero and Hero Heading were widened to name the Blog Hero, its Hero Image was widened to cover the Blog Hero's placement, and its Avatar Group was widened to allow a label in place of a Job Role — all during the grilling session. ADR-0005 was written in the same session and records the Author decision, including that `minAuthors` and `maxAuthors` on the Blog section are now vestigial and should be reviewed. ADR-0003 needs no change: the listing map already has its Blog line.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The one seam is the rendered Blog page through the global layout, at the two Blogs named below. Every state of the hero shows there: the trail, the heading ramp, the meta column, the Avatar Group and its absence, the image and its absence, and the Header Colour change. The Blog Listing page is checked only to prove the Blog Meta's new `column` orientation changed nothing about the cards that use `row`. The Seed command's output is supporting evidence. Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the trail on the header's edge, the title at 62px over nine columns, the date and read time stacked in the right-hand column with no divider between them, Gareth Hoyle's face and name under "Written by", the photograph across the content width beneath, the page and header both creme, and the stacked layout on a phone. The group review takes the screenshots of record once, at the three widths below, resting state; every other line is a state checked on the site and reported, not captured.

**Evidence plan.**

Screenshots, resting state, the Google NavBoost Explained Blog at `/insights/google-navboost-explained-how-click-behaviour-affects-rankings-and-how-to-track-user-engagement`:

1. 1600, full page: a Creme 100 header and page; Home › Insights › Google NavBoost Explained on the header's edge, ancestors creme-500, current black and underlined; the heading at 62px over nine columns about 130px beneath the trail; in columns 11 to 12, level with the heading's top, "10 July 2026" beside a calendar icon, "5 min read" beside a clock 18px beneath it and no divider between them, then Gareth Hoyle's 42px avatar 70px beneath with "Written by" at 14px over his name at 16px medium; the photograph across the content width at 1520 by 705 with 20px corners 70px beneath. Compared against the Figma node. Proves the desktop layout.
2. 768, full page: the heading at 6xl, then the date, read time and Avatar Group full width, then the photograph at 4:3. Proves the `md` step.
3. 390, full page: the trail wrapping, the heading at 5xl, then the date, read time and Avatar Group 40px beneath, then the photograph at 4:3. Proves the mobile layout.

States checked on the site and reported:

4. The How to Pitch a Journalist Blog at 1600: its title as the heading, the date and read time in the right column, no Avatar Group at all, no photograph, and the Hero ending at its content. Proves the title fallback and both empty paths.
5. The Gareth Hoyle Team Member with his Image temporarily cleared, restored afterwards: the avatar shows "GH" on creme. Proves the initials fallback.
6. Home and Insights Crumbs hovered at 1600: black. Proves the trail's hover.
7. A Crumb focused by keyboard: a visible focus ring. Proves the focus state.
8. Markup: the trail is a `nav` labelled Breadcrumb with `aria-current="page"` on the last Crumb, there is exactly one `h1`, the date is a `time` element carrying the machine-readable date, and the icons and the photograph are hidden from assistive technology. Proves the markup.
9. SEOmatic's BreadcrumbList on the Blog lists Home, Insights and the article with absolute URLs. Proves the schema.
10. The Blog Listing page at 1600: the Blog Large Card and Blog Card still show their date and read time side by side with the divider between them. Proves the `row` default was not disturbed.
11. The Featured Blog Block at 1600 on a page that has one: its white meta row unchanged. Proves the `colour` and `row` combination still works.
12. The Seed run twice: the Author set on the first run and skipped on the second. Proves the seeding.

## Out of Scope

- The Longform Blog content beneath the Hero, and the Blog's Sidebar - CTA fields.
- Computing the Read Time from the article, and changing the read time component's wording. Both wait for Blogs to carry content.
- The author page listing everything a Team Member has written, and any URI for Team entries.
- Backfilling the Author on the 71 published Blogs.
- Removing or changing `minAuthors` and `maxAuthors` on the Blog section. ADR-0005 records that they should be reviewed; this spec does not touch them.
- Any Hero Layout for the Hero field. The Blog Hero belongs to the Blog entry alone.
- A shared component behind the Blog Hero and the Career Hero. Revisit once both have landed.
- Correcting the Career entry template's Black override. That is the Hero Career branch's.
- A dedicated mobile or tablet design, or a hover design. The responsive rules follow the decisions above until a node exists.
- Changing the breadcrumb's colours, or the Case Study, Service and Career Heroes.
- Changing the Blog Card, the Blog Large Card, the Featured Blog or the Blog Listing.
- Committing the Seed.

## Further Notes

The node's avatar-to-text gap is 10px against the user component's 12px. The component's gap is kept: 2px is below the threshold worth a variant, and the Avatar Group should stay identical everywhere it appears.

The node's icon-to-text gap is 7px against the blog meta component's 8px, and its meta row gap is 18px. The existing 8px is kept for the same reason; the 18px between the stacked rows is new and is specified above.

The Blog Hero and the Career Hero are being built in parallel from near-identical designs. Whoever lands second should read the other's component before writing the grid, and the refactor that folds them together is worth raising once both are on `main`.
