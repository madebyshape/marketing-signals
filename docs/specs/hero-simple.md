# Hero Simple

Spec for the Hero Simple Hero Layout: a Breadcrumb over a large heading with the Highlight, and a short text beside it. It is the first Hero Layout the Hero field offers editors, the first caller of the new breadcrumb component, and the first page top on the site, so it also carries the fixes that let a Hero render at all: the guard that hides a page without Blocks, and the missing template that keeps every Case Study from rendering.

Design: Figma node `9831-18389` in the Marketing Signals file, 1600 wide, the Case Studies page hero. No mobile node exists; the responsive rules below are decisions, not measurements.

Branch: feature/hero-simple

Related: the Content Seeding spec, which gains the entry-creating keys the test content needs; the Global Header spec, whose fixed header this Hero pads for. ADR-0001 applies: the header is fixed and takes no space, so the Hero pads its top by the header height from the shared map. ADR-0002 applies: every page's content arrives by Seed. ADR-0003, written during the grilling session, records how the Breadcrumb finds a section's listing page. Vocabulary: `CONTEXT.md`, "Heroes" section, which gained Hero, Hero Layout, Hero Simple, Breadcrumb and Crumb during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

Every page on the site starts straight into its Blocks. The design starts every page with a hero: a breadcrumb trail on the header's bottom edge, a very large heading with a few words picked out in the brand colour, and a short paragraph beside it. Editors have a Hero field on every page type, but the only layout it offers is the empty scaffold, and the layout that was meant to be first was deleted before it was built, leaving the field pointing at nothing. Nothing on the site shows a visitor where a page sits: a case study gives no way back to the case studies, and a nested case study gives no way back to its parent. Two things stand in the way of even seeing a hero: the page template renders nothing until a page has a Block, and every Case Study points at a template that does not exist.

## Solution

A Hero Simple layout editors can pick in the Hero field. It holds a Heading and a Text, the same fields they use in Blocks. Above them a Breadcrumb the editor never touches: Home, then the page's parents in order, then the page itself, each parent a link and the current page underlined. On a case study the trail passes through the Case Studies page on its way from Home, and through the parent case study when there is one. The heading renders through the alternate heading at 92px on a desktop across seven columns, italic words as the Highlight; the text sits in the last three columns, bottom-aligned with the heading, and drops below it on a phone. The Hero pads its top by the header height so the Breadcrumb lands on the header's bottom edge, as the design has it, and the editor's Padding setting spaces its bottom. The same Crumbs feed SEOmatic's breadcrumb schema so search engines see the trail the visitor sees. The page template now renders a Hero on its own, and case studies get the template they were missing. The Home page, the Case Studies page and a parent-and-child pair of case studies each get a Hero Simple by Seed, with the Figma copy on Home and Case Studies.

## User Stories

1. As a visitor, I want a large heading at the top of every page, so that I know what the page is about before I scroll.
2. As a visitor, I want the key words of the heading in the brand colour, so that the page reads with the same voice as the rest of the site.
3. As a visitor, I want a short paragraph beside the heading, so that the page introduces itself in a sentence.
4. As a visitor, I want a trail at the top of the page showing where it sits, so that I can see the page's place in the site at a glance.
5. As a visitor, I want every parent in the trail to be a link, so that I can go up a level in one click.
6. As a visitor, I want the current page in the trail marked and not linked, so that I can tell where I am and never click a link to the page I am on.
7. As a visitor, I want the trail to start with Home, so that the way back to the start is always one click away.
8. As a visitor on a case study, I want the trail to pass through the Case Studies page, so that I can get back to the list of case studies.
9. As a visitor on a nested case study, I want the trail to show its parent case study, so that I can see the case study it belongs to.
10. As a visitor, I want a parent link to darken when I hover or focus it, so that I can see it is a link.
11. As a visitor, I want the trail to sit on the header's bottom edge with nothing between, so that the page opens as the design intends.
12. As a visitor, I want the heading to step up in size with my screen, so that it is legible on a phone and monumental on a desktop.
13. As a visitor with a phone, I want the paragraph below the heading rather than squeezed beside it, so that both stay readable.
14. As a visitor with a phone, I want a long trail to wrap onto a second line rather than be cut short, so that every Crumb stays reachable.
15. As a visitor, I want the hero to leave space beneath it before the first Block, so that the page does not run together.
16. As a visitor, I want the hero to never sit under the fixed header, so that the trail is never hidden.
17. As a keyboard user, I want the trail to be a navigation landmark with a label, so that I can jump to it.
18. As a screen reader user, I want the trail read as an ordered list with the current page announced as current, so that I hear the page's place without guessing.
19. As a screen reader user, I want the hero heading to be the page's level-one heading, so that the page outline starts where the page does.
20. As a screen reader user, I want the chevrons between Crumbs hidden from me, so that I hear the pages and not the decoration.
21. As a search engine, I want the page's breadcrumb schema to list the same pages as the visible trail with absolute URLs, so that the result can show the trail.
22. As an editor, I want a Hero Simple in the Hero field's menu, so that I can give any page a hero.
23. As an editor, I want the empty scaffold gone from the Hero field's menu, so that I cannot add a hero that renders nothing.
24. As an editor, I want to write the heading in the same Heading field I use in Blocks, so that italic means Highlight here as it does everywhere.
25. As an editor, I want to write the text in the same simple rich text field I use in Blocks, so that there is nothing new to learn.
26. As an editor, I want the hero's fields under Section Header, so that a Hero reads like a Block in the control panel.
27. As an editor, I want a Padding setting on the hero, so that I can close the gap to a Block that wants to sit tight beneath it.
28. As an editor, I want the trail derived from the page, so that I never have to write or maintain it.
29. As an editor, I want a page to show its Hero as soon as I add one, without first adding a Block, so that I can build the page top down.
30. As an editor, I want a Case Study to render on the front end, so that I can preview one at all.
31. As an editor, I want to leave the heading and text empty and still get the trail, so that a page with a bare top is not broken.
32. As an editor, I want the Case Studies page to be the Case Study Listing type, so that the trail can find it.
33. As a developer, I want the deleted Hero - Simple entry type back under the uid the Hero field still references, so that the field heals without a migration.
34. As a developer, I want Hero Simple built on the Hero Template layout, so that every Hero Layout shares one control panel shape.
35. As a developer, I want the Breadcrumb in a component that takes the entry and derives the Crumbs, so that the next Hero Layout gets a trail with one include.
36. As a developer, I want the component to accept a hand-built list of Crumbs too, so that a page outside any structure can still show a trail.
37. As a developer, I want the listing page found by entry type rather than slug, so that a renamed slug never breaks a trail.
38. As a developer, I want the map from section to listing type in one place, so that the next listing section is one line.
39. As a developer, I want the component to replace SEOmatic's breadcrumb items with the Crumbs it derived, so that the schema and the trail cannot drift apart.
40. As a developer, I want the Case Study and Case Study Listing templates to reuse the page rendering rather than copy it, so that a change to the page top happens once.
41. As a developer, I want the Seed command to create an entry it cannot find and to switch an entry's type, so that the test pages arrive without a control panel login.
42. As a developer, I want the hero's top padding read from the shared header map, so that a header height change reaches the hero.
43. As a developer, I want no JavaScript in the hero, so that the page top is static and fast.
44. As a reviewer, I want the hero on three seeded pages, so that I can check the trail at one, two and four Crumbs.

## Implementation Decisions

**Entry type.** The Hero - Simple entry type returns under the uid the Hero field still references, handle `heroSimple`, name "Hero - Simple", colour blue, icon `heading`, no title, slug or status fields, matching the scaffold. Its layout is the Hero Template's: a Content tab with a Section Header heading element followed by the Heading field and the Rich Text - Simple field with the instance handle `text` and label "Text", then the Section Content and Section Footer heading elements left empty; a Settings tab with the Padding - Hero field as `padding`. No Eyebrow. The Heading instance carries the instructions "Make words italic to highlight them." The Hero Template is removed from the Hero field's entry types and kept as an entry type, so it stays the scaffold developers copy and is no longer offered to editors.

**Hero template.** Lives with the Blocks under the partial templates path so the Hero field renders it by handle. It follows the Block scaffold: defaults, the merge line, the section embed, its content inside the section's content block. Its padding is the section component's own map: `bottom` or `none` from the editor's Padding, and its top is the header height from the shared header map in the global layout, per ADR-0001, with nothing added, so the Breadcrumb starts on the header's bottom edge as Figma has it. No Alpine and no js block: the Hero is static.

**Layout.** Inside the section: the Breadcrumb, then a twelve-column grid with the design's gap. The heading spans all twelve columns below `lg` and the first seven from `lg`; the text spans all twelve below `lg` and the last three from `lg`, with both bottom-aligned from `lg` and 30px between them below it. The gap from the Breadcrumb down to the heading is 60px below `xl` and 130px from `xl`, which lands the heading's cap top where the node has it.

**Heading.** Rendered through the alternate heading component as `h1`, since the Heading field's toolbar has no heading button and the hero heading is the page's main heading. Semibold, leading 0.97, tighter tracking, black. Size ramp: 5xl at mobile, 7xl from `md`, 9xl from `lg`, 11xl (92px) from `xl`. Italic words take the Highlight in the primary colour. No hard line break in the content: at seven columns wide the Figma copy wraps after "We" on its own.

**Text.** Rendered through the rich text component at its base size: 16px, regular, the 1.33 leading, black. The component's `base` colour paints paragraphs zinc, so it gains a `black` colour whose headings, paragraphs and lists are black, whose links are the primary colour, and whose italic is the Highlight in primary, as the creme colour already does. The hero uses it; `base` is left as it is.

**Breadcrumb component.** A new component, `breadcrumb`, with the standard sections. Params: `entry` (the page), `items` (a hand-built list of Crumbs that overrides derivation when given), `class`. A Crumb is a label and a URL. Derivation, in order: Home, labelled with the Home entry's title and linked to the site root; then, for an entry outside the Page structure, the listing Crumb, the first Page by structure order whose entry type is the listing type for the entry's section, from a small map in the component that starts with Case Study to Case Study Listing; then the entry's structure ancestors in order, each linked to its own URL; then the entry itself. On Home the trail is the single Crumb "Home". Every Crumb but the last is a link; the last carries `aria-current="page"` and is plain text.

**Breadcrumb markup and style.** A `nav` labelled "Breadcrumb" holding an ordered list, one list item per Crumb, laid out as a wrapping row with the design's 15px gap so a long trail wraps rather than truncates. Between Crumbs, a Font Awesome sharp regular `angle-right` at 14px, hidden from assistive technology. Crumbs are 16px, medium, the 1.33 leading, at every width. Ancestors are Creme 500 and transition to black on hover and focus; the current page is black and underlined, and the underline is reserved for it. No JavaScript.

**Breadcrumb schema.** SEOmatic's automatic BreadcrumbList walks URL segments, so on a case study it finds neither the listing page nor the parent. The component replaces the items of SEOmatic's BreadcrumbList with the Crumbs it derived, position, name and absolute URL each, Home included, so the schema and the visible trail come from one derivation. ADR-0003 records the rule.

**Page template guard.** The page type template renders the Hero when the Hero field has an entry and the Blocks when there are any, and nothing when both are empty. The guard on the Block count that hid a page with only a Hero goes; the comment explaining why the Blocks are rendered as one call rather than looped stays.

**Case study templates.** The Case Study section, like Blog, Career and Service, points at a base template under `_entryTypes` that does not exist. That base template is added as a thin router, the same one-liner as the page base, so the section config stays as it is. Type templates for Case Study and Case Study Listing are added and reuse the Entry - Blocks rendering rather than copying it, so both render a Hero and Blocks exactly as a page does; how they reuse it is an implementation detail. The listing of case studies on the Case Studies page is a later Block. Blog, Career and Service keep pointing at the router and stay without type templates until their own specs.

**Content.** The Case Studies page is switched to the Case Study Listing type by Seed. Four Seeds, under the scratch folder and not committed, each targeting the Hero field: Home and the Case Studies page with the Figma copy, heading "Success Stories We Love To Shout About" with "Love To Shout About" italic and the text "We take pride in our work and enjoy delivering best-in-class digital marketing campaigns. Take a look below at some of the results we've already achieved for our existing clients."; a parent case study "Garden Centre Group" and a child "Garden Centre Group: Spring Campaign" created by Seed in the Case Study section, each with short copy in the same voice and one Highlight. Padding Bottom on all four.

**Seed command.** The Seed shape gains `section`, `type`, `title` and `parent`, so a Seed can create the entry it targets and switch an existing entry's type. The Content Seeding spec records the keys and their behaviour.

**Docs.** `CONTEXT.md` gained the Heroes section during the grilling session. ADR-0003 records the listing rule. The Content Seeding spec gains the new keys.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The primary seam is the rendered page through the global layout: the Home page, the Case Studies page and the child case study, each with a seeded Hero Simple. The Hero is the breadcrumb component's only caller, so the component is proven through it; the `items` override is proven by reading the component. The secondary seam is the Seed command's own output, which proves the new keys. Nothing is committed to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the trail on the header's edge at one, two and four Crumbs, the heading at 92px with its Highlight, the text beside it on a desktop and below it on a phone, and a parent link darkening under the pointer. Fixed widths, one state per file, before and after pairs on the PR. The before for the Home page is `main` at the commit the branch forked from; the before for every case study page is the error it renders today.

**Evidence plan.**

1. Home page at 1600, viewport: the single Crumb "Home", black and underlined, on the header's bottom edge; the heading at 92px over seven columns with "Love To Shout About" in primary; the text in the last three columns, bottom-aligned with the heading. Compared against the Figma node for sizes, colours, gaps and column placement. Proves the desktop layout.
2. Home page at 390, full page: the Breadcrumb, the heading at 5xl, the text below it with 30px between. Proves the mobile layout.
3. Home page at 768, viewport: the heading at 7xl. Proves the `md` step of the ramp.
4. Case Studies page at 1600, viewport: Home › Case Studies, Home a Creme 500 link, Case Studies black and underlined. Proves the two-Crumb trail and the listing page's own hero.
5. Case Studies page at 1600, the Home Crumb hovered: black. Proves the hover state.
6. Child case study at 1600, viewport: Home › Case Studies › Garden Centre Group › Garden Centre Group: Spring Campaign, each ancestor linked to its own flat URL. Proves the listing rule and the structure ancestors.
7. Child case study at 390, viewport: the four Crumbs wrapping onto a second line, none cut off. Proves the wrapping.
8. Served HTML of the child case study: a `nav` labelled Breadcrumb holding an ordered list, `aria-current="page"` on the last item, chevrons hidden from assistive technology, an `h1` heading with the Highlight inside it, no inline styles. Proves the markup and the before-JavaScript state.
9. Served HTML of the child case study: SEOmatic's BreadcrumbList JSON-LD listing the same four Crumbs in order with absolute URLs. Proves the schema.
10. Child case study at 1600 with the heading and text temporarily cleared: the Breadcrumb alone, with its top padding under the header. Restored afterwards. Proves the empty state.
11. Parent case study at 1600 with no Blocks: the Hero renders on its own. Proves the relaxed guard.
12. Seed output for each of the four Seeds, run twice: the Case Studies page's type switched on the first run and unchanged on the second; the two case studies created then skipped; every Hero created then skipped. Saved as text beside the screenshots. Proves the new keys.

## Out of Scope

- Any other Hero Layout. Hero Simple is the first; the Hero Template stays as the scaffold.
- The list of case studies on the Case Studies page. It is a later Block.
- Type templates for Blog, Career and Service. They gain the router and nothing else.
- An Eyebrow, buttons, an image or anything in Section Content or Section Footer.
- A dedicated mobile design. The responsive rules follow the decisions above until a mobile node exists.
- A committed styleguide preview of the breadcrumb.
- Truncating or collapsing a long trail. It wraps.
- Editors setting or overriding Crumbs. The trail is derived.
- Enforcing one listing page per section. It is a content rule, recorded in ADR-0003.
- Changing the rich text component's `base` colour. It gains `black` beside it.
- A transparent Header Colour over the hero. The header stays as it is.
- Committing the Seeds.

## Further Notes

- The node is a group, not a frame: it starts at y 123, which is the header height at `xl`, and ends at y 404. Whatever sits beneath it is not in the node, so the hero's bottom padding is the section component's, not a measurement.
- Figma tracks the heading at minus 3.68px on 92px, which is minus 0.04em, the tighter tracking token.
- At 1600 the heading is 878px wide, which is seven columns of 108.33px plus six gaps of 20px; the text starts at 1195px and is 365px wide, which is the tenth column to the twelfth.
- Figma trims text boxes to cap height, so the 131px from the breadcrumb's cap top to the heading's cap top lands at about 130px of margin on the site once the leading is accounted for; measured gaps may differ by a few pixels.
- SEOmatic's own breadcrumb generation looks each URL segment up as an element and includes Home when its setting says so, which is why it cannot see a listing page that is not a segment.
- Case study URLs are flat, so a child case study is not under its parent's URL; the trail is the only thing on the page that shows the nesting.
- The Shape library has no breadcrumb or hero component, so both are written fresh.
