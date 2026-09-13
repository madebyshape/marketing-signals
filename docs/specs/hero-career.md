# Hero Career

Spec for the Career Hero: the light Hero at the top of every Career page, built from the Career's own Hero Heading, Hero Text, Hero Image and details rather than a Hero Layout, so an editor never picks it. The Breadcrumb sits on the header's bottom edge reading Home › Careers › the Career; the heading, the Hero Text and the Apply Button sit on the left; the Career Details sit on the right, level with the heading; the Hero Image runs full width beneath them. It is the third Hero built from an entry's own fields, after the Case Study Hero and the Service Hero, and the first thing a Career page renders.

Design: Figma node `9985-15567` in the Marketing Signals file, a group named "Group 46384", 1520 by 1252 inside a 1600 frame, starting at the header's bottom edge (y 123), for the USA Focused Senior Digital PR Manager career. No tablet or mobile node exists; the responsive rules below are decisions, not measurements.

Branch: feature/hero-career

Related: the Hero Service spec, whose component shape, title fallback and heading ramp this Hero mirrors; the Hero Simple spec, whose breadcrumb `base` colour this Hero reuses on a light page; the Elements - Career spec, whose Career Row icons, Employment Type label and first-Category rule the Career Details repeat, and whose Seed put the Career List on the Careers page; the Content Seeding spec, whose entry `fields` map fills the review content and whose `type` key switches the Careers page's entry type. ADR-0001 applies: the header is fixed, so the Hero pads its top by the header height from the shared header map. ADR-0002 applies: the review content and the Careers page's type switch arrive by Seed. ADR-0003 applies: the Breadcrumb finds the Careers page by a new Career Listing entry type, and the map gains the Career section. ADR-0004 applies: the Career Hero is light, so the Career page drops its Black override and takes Creme 100. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Heroes" section, which gained Career Hero and Apply Button during the grilling session, and whose Hero, Hero Heading, Hero Text and Hero Image now cover the Career Hero; the "Career List" section gained Career Details.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A Career page renders its header and its footer and nothing between them. The Career entry already carries a Hero Heading, a Hero Text, a Hero Image, an Employment Type, a Category, a salary with a footnote, who the role reports to and a working pattern, and none of it reaches the page. A visitor who clicks a Career Row on the Careers page lands on an empty page under a black header that belongs to a dark Hero the page does not have: no job title, no idea of the hours, the team, the pay or the manager, no way back to the Careers page, and nothing inviting them to apply. An editor filling in those fields sees no effect.

## Solution

Every Career page opens with the Career Hero on the Creme 100 page under a Creme 100 header. It is padded at its top by the header height, so the Breadcrumb sits on the header's bottom edge reading Home › Careers › the Career, ancestors in creme-500 and the Career in black, underlined. Beneath it, a twelve-column grid. On the left, six columns wide from the wide desktop breakpoint: the Hero Heading as the page's level-one heading at 82px, falling back to the Career's title, with italic words in Secondary; the Hero Text 40px beneath; and 30px beneath that the Apply Button, a Secondary pill reading "Apply Now" with a down arrow, which scrolls smoothly to the Career's content below. On the right, columns 9 to 12 level with the heading: the Career Details, a list of rows each with a Creme 300 rule above it, a creme-500 label and a black value, reading Job Type (clock icon and the Employment Type), Sector (target icon and the first Category), Salary (with the footnote small beneath), Reports to and Working pattern. A row with nothing to show is left out, and with no rows the list is left out. 75px beneath the taller column, the Hero Image runs full width with 20px corners at the design's 1520 by 705 ratio. With no image the Hero ends after the content. Below the desktop breakpoint everything stacks: the Breadcrumb, the heading, the text, the Apply Button, the Career Details full width, then the image at 4:3.

The Careers page becomes a Career Listing page, so the Breadcrumb can find it the way it finds the Services and Case Studies pages. Two Careers are seeded so the page can be reviewed against the design: one with the node's copy and photograph, one with only its title and Category.

## User Stories

1. As a visitor, I want the job title as a large heading at the top of a career page, so that I know which position I am reading about before I scroll.
2. As a visitor, I want a short paragraph beneath the title, so that the agency introduces itself and the role in a few sentences.
3. As a visitor, I want an Apply Now button in the hero, so that I can get to applying without hunting for it.
4. As a visitor, I want the Apply Now button to scroll me smoothly down to the job's content, so that I stay on the page and keep my place.
5. As a visitor, I want the Apply Now button to still take me to the content with JavaScript unavailable, so that it never does nothing.
6. As a visitor, I want the job's hours shown beside the title, so that I know straight away whether it is full-time or part-time.
7. As a visitor, I want the team the job sits in shown as its sector, so that I know whether it is a creative or an office role.
8. As a visitor, I want the salary shown beside the title, so that I can decide whether to read on.
9. As a visitor, I want the small print on the salary shown beneath it, so that I understand the range and any currency caveat.
10. As a visitor, I want to see who the role reports to, so that I understand where it sits in the agency.
11. As a visitor, I want to see the working pattern, so that I know about the four-day week or remote working before I apply.
12. As a visitor, I want each detail labelled and separated by a thin rule, so that the list scans like a fact sheet.
13. As a visitor, I want the hours and the sector marked with the same icons as the Careers page list, so that the job page reads as the row I clicked.
14. As a visitor, I want a photograph of the team beneath the hero content, so that the agency has a human face.
15. As a visitor, I want a trail at the top showing Home › Careers › the job, so that I can get back to every open position in one click.
16. As a visitor, I want the trail's parents muted and the current job underlined, so that I can tell where I am.
17. As a visitor, I want the hero never to sit under the fixed header, so that the trail is never hidden.
18. As a visitor, I want a light header over the light hero, so that the top of the page reads as one surface as the design intends.
19. As a visitor with a phone, I want the title, text, button, details and photograph stacked in that order, so that everything is legible.
20. As a visitor with a phone, I want the details full width with their labels beside their values, so that each fact still reads on one line where it fits.
21. As a visitor with a phone, I want the photograph in a shorter-sided ratio, so that it is not a thin strip.
22. As a visitor, I want the heading to step up in size with my screen, so that it is legible on a phone and bold on a desktop.
23. As a visitor on a laptop, I want the content and the details side by side, so that the facts sit beside the title before the wide desktop layout.
24. As a keyboard user, I want the trail to be a navigation landmark and the Apply Now button focusable with a visible ring, so that I can use the hero without a mouse.
25. As a keyboard user, I want focus to land in the content after Apply Now, so that my next Tab continues from where I scrolled to.
26. As a screen reader user, I want the heading to be the page's level-one heading, so that the page outline starts with the job title.
27. As a screen reader user, I want the details read as label and value pairs, so that "Salary" and "£45,000 to £50,000" are announced together.
28. As a screen reader user, I want the icons and the photograph kept out of what is read, so that I hear only the facts.
29. As a visitor who prefers reduced motion, I want Apply Now to jump rather than glide, so that nothing moves that I asked not to.
30. As a search engine, I want the page's breadcrumb schema to list Home, Careers and the job with absolute URLs, so that the result can show the trail.
31. As an editor, I want the Hero Heading, Hero Text and Hero Image on the Career entry to appear on the page, so that the fields mean something.
32. As an editor, I want the Career's title used when I leave the Hero Heading empty, so that the page always has a heading.
33. As an editor, I want italic words in the Hero Heading shown in Secondary, so that I choose the Highlight as I do on every other Hero.
34. As an editor, I want the Employment Type and Category I already set for the Careers page list to appear in the hero, so that I enter them once.
35. As an editor, I want to leave the salary, footnote, reports to or working pattern empty and have that row left out, so that a Career with fewer details still looks finished.
36. As an editor, I want the salary footnote shown only when there is a salary, so that a caveat never floats on its own.
37. As an editor, I want to leave every detail empty and have the list left out, so that a bare Career still has a clean hero.
38. As an editor, I want to leave the Hero Image empty and have the hero end after its content, so that a Career without a photograph does not show a gap.
39. As an editor, I want the Apply Now button there without setting it, so that no Career is published without a way to apply.
40. As an editor, I want the image cropped around the focal point I set, so that faces stay in frame at every ratio.
41. As an editor, I want the Careers page to keep its Blocks when it becomes a Career Listing page, so that the Career List and its hero stay as they are.
42. As an editor, I want to rename the Careers page and see every career's trail follow, so that the trail never goes stale.
43. As a developer, I want the Career Hero as a component beside the Case Study Hero and the Service Hero, included by the Career entry template, so that all three entry heroes share one shape.
44. As a developer, I want the hero composed from the breadcrumb, heading alternate, rich text, button and picture components, so that its typography and behaviour match the rest of the site.
45. As a developer, I want the breadcrumb's listing map to gain one line for the Career section, so that the trail follows ADR-0003 with no new mechanism.
46. As a developer, I want a Career Listing entry type with the same fields as Entry - Blocks, so that the Careers page renders exactly as it does today.
47. As a developer, I want the hero's top padding read from the shared header map, so that a header height change reaches the hero.
48. As a developer, I want the Apply Button's target to be one named anchor where the Career's content will render, so that the Longform spec only has to keep it.
49. As a developer, I want the Career Details rows built from one ordered list with an empty check, so that adding a detail is one entry.
50. As a reviewer, I want one Career with every field and one with only a title and Category, so that I can check the full design and the empty states side by side.

## Implementation Decisions

**Fields.** No new fields on the Career entry type. It already has `employmentType` (Dropdown - Employment Type), `categoriesCareer`, `salary`, `salaryFootnote`, `reportsTo` and `workingPattern` (plain text) on its Overview Content tab, and `heroHeading` (Heading), `heroText` (Rich Text - Simple), `heroImage` (Image) and `longform` on its Page Content tab. The Hero Heading instance gains the instruction "Make words italic to highlight them." as project config on the branch.

**Career Listing entry type.** A new page entry type, Entry - Career Listing, handle `entryCareerListing`, with the same field layout as Entry - Blocks, added to the Page section. Its page template renders exactly as the Entry - Blocks template does: the Header Colour from the Hero Layout, the Hero field, then the Blocks. The Careers page is switched to it by Seed; its Hero Simple and Career List are kept because the fields are the same. A second page of this type would be ambiguous, as ADR-0003 already records.

**Breadcrumb.** The breadcrumb component's listing map gains `career` to Career Listing, so the trail reads Home › Careers › the Career, the middle Crumb labelled with the Careers page's own title, and the SEOmatic BreadcrumbList follows. The hero passes the entry and the existing `base` colour: ancestors creme-500 turning black on hover and focus, the current page black and underlined. No new colour.

**Header Colour.** The Career entry template drops its Black override, so the global layout's default of Creme 100 applies, per ADR-0004.

**Component.** A `heroCareer` component beside `heroCaseStudy` and `heroService`, with the standard sections, taking `entry`, `vars` and `class`. The Career entry template includes it where its "Career Hero" placeholder sits, above the Longform placeholder. Not a Hero Layout: never offered in the Hero field. The component reads the fields into local variables first: the heading (Hero Heading with tags stripped, else the title), the text, the image, and the Career Details rows.

**Panel.** A section with no vertical padding at its top and the section component's `bottom` padding beneath, no horizontal padding, holding the Hero: full width, no background of its own so the Creme 100 page shows, padded at its top by the header height from the shared header map per ADR-0001, the site margins at its sides. Content-height at every width.

**Grid.** The Breadcrumb spans the full width. Beneath it a twelve-column grid with a 20px column gap. The content column spans twelve columns below `lg`, columns 1 to 7 from `lg`, and columns 1 to 6 from `xl`. The Career Details column spans twelve columns below `lg`, columns 8 to 12 from `lg`, and columns 9 to 12 from `xl`, starting on the same row as the heading so its first rule is level with the heading's top. Below `lg` the Career Details come after the Apply Button with 40px between them. The content column's top sits 130px beneath the Breadcrumb's top from `xl` (the node's 131px, rounded to the spacing scale), and proportionally less beneath: 60px below `lg`, 90px from `lg`.

**Heading.** The alternate heading component as `h1`, black, semibold, leading 0.97, tighter tracking, the Highlight in Secondary. Size ramp: 5xl at mobile, 7xl from `md`, 9xl from `lg`, 10xl (82px) from `xl`. Rendered even when only the title fallback fills it.

**Text.** The rich text component at base size in black, 40px beneath the heading. Left out when empty.

**Apply Button.** The button component in its default `secondary` colour, 30px beneath the text (or the heading when there is no text), label "Apply Now" and the sharp regular arrow-down icon after it, hardcoded in the component and never an editor field. It is a real link to a fixed in-page anchor, `#career-content`, so it works without JavaScript. With JavaScript it scrolls there through Lenis with a small Alpine handler, landing clear of the fixed header; with reduced motion it jumps. The Career entry template places an empty element with that id where the Longform will render, so the button has a target before the Longform is built. The handler lives in the component's own `{% js %}` block.

**Career Details.** A description list, rendered only when at least one row has a value. Rows in this fixed order, each left out when its value is empty:

- "Job Type:" with the sharp regular clock icon and the Employment Type's label.
- "Sector:" with the sharp regular bullseye-arrow icon and the first Career Category's title. The node reads "Sector" without a colon; it is normalised to match the other labels.
- "Salary:" with the salary on its first line and, when the footnote is set, the footnote on a line beneath at 11px, leading 1.33, tracking -0.22px. A footnote without a salary is not shown and does not make the row.
- "Reports to:" with the reports-to text.
- "Working pattern:" with the working pattern text, wrapping.

Each row has a 1px Creme 300 top border and 20px padding above and below; the last row has no bottom border. The label is 16px creme-500 in a 209px column from `xl`; the value is 16px black, leading 1.33, filling the rest and wrapping. Below `xl` the label column narrows to a third of the row. Icons are 12px, decorative, with a 7px gap to the text, as the Career Row draws them. The rows are built from one ordered list of label, icon and value, filtered for empties, in the component.

**Hero Image.** The picture component with the Hero Image, empty alt as decoration, focal point on, lazy off, full width, 20px corners, 75px beneath the taller of the content and the Career Details from `lg` and 40px beneath the Career Details below it. A 4:3 box below `lg` and the design's 1520 by 705 ratio from `lg`, image covering. Left out when empty, and the Hero ends at its content.

**Seeds.** Two Seeds under the scratch folder, not committed.
- The USA Focused Senior Digital PR Manager Career, through the Seed's `fields` map: heading "USA Focused Senior Digital PR Manager"; the node's paragraph beginning "Marketing Signals is a best-in-class, remote-first digital marketing agency."; salary "£45,000 to £50,000"; footnote "(or local currency equivalent), depending on experience"; reports to "Digital PR Lead"; working pattern "Four-day week, 8 hours per day, remote-first"; the node's photograph as the Hero Image. Its Employment Type (Full-Time) and Category (Creative) are already set.
- The Account Manager Career needs no Seed: it already has only its title, its Employment Type and the Office Category, with no hero fields, proving the title fallback, the omitted rows and the omitted image.
- The Careers page, targeted by slug in the Page section with `type` Career Listing, proving the type switch keeps its Blocks.

Images live beside the Seeds.

**Docs.** `CONTEXT.md` gained Career Hero, Apply Button and Career Details, and its Hero, Hero Heading, Hero Text and Hero Image were widened, during the grilling session. ADR-0003 and ADR-0004 need no change: the listing map grows one line as ADR-0003 says it would, and the Career Hero is light as ADR-0004 defines.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The one seam is the rendered Career page through the global layout, at the two Careers above; the breadcrumb's new map line, the Header Colour change and every state of the hero show there. The Careers page is checked only to prove the type switch changed nothing it renders. The Seed command's output is supporting evidence. Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the trail on the header's edge, the title at 82px beside the ruled Career Details, the lilac Apply Now pill, the photograph full width beneath, the page and header both creme, and the stacked layout on a phone. Fixed widths, one state per file, before and after pairs on the PR. The before for each Career is the empty page under a black header that it renders today.

**Evidence plan.**

1. USA Focused Senior Digital PR Manager at 1600, full page: a Creme 100 header and page; Home › Careers › USA Focused Senior Digital PR Manager on the header's edge, ancestors creme-500, current black and underlined; the heading at 82px over six columns about 130px beneath the trail; the text six columns wide 40px beneath; the Secondary Apply Now pill with its down arrow 30px beneath that; the Career Details in columns 9 to 12, first rule level with the heading, reading Job Type (clock, Full-Time), Sector (target, Creative), Salary (£45,000 to £50,000 with the footnote at 11px beneath), Reports to (Digital PR Lead), Working pattern (wrapping onto two lines); the photograph full width at 1520 by 705 with 20px corners 75px beneath the details. Compared against the Figma node. Proves the desktop layout.
2. USA Focused Senior Digital PR Manager at 1600, Apply Now clicked: the viewport scrolled so the content anchor sits clear of the header, and the address carrying `#career-content`. Proves the Apply Button.
3. USA Focused Senior Digital PR Manager at 1600, Apply Now focused by keyboard: the visible focus ring. Proves the focus state.
4. USA Focused Senior Digital PR Manager at 1024, full page: the content in seven columns and the Career Details in five, heading at 9xl, the image at the desktop ratio. Proves the `lg` step.
5. USA Focused Senior Digital PR Manager at 768, viewport: the heading at 7xl, the stack intact. Proves the `md` step.
6. USA Focused Senior Digital PR Manager at 390, full page: the trail wrapping, the heading at 5xl, text, Apply Now, then the Career Details full width 40px beneath with labels a third wide, then the photograph at 4:3. Proves the mobile layout.
7. Account Manager at 1600, full page: its title as the heading, no text, Apply Now 30px beneath the heading, the Career Details showing only Job Type and Sector (Office), no image and the Hero ending at its content. Proves the fallbacks and the omitted rows and image.
8. Account Manager at 1600 with its Employment Type and Category temporarily cleared: no Career Details list at all and the content alone. Restored afterwards. Proves the empty list.
9. Home Crumb hovered on USA Focused Senior Digital PR Manager at 1600: black. Proves the trail's hover.
10. Careers page at 1600, full page, before and after the type switch: identical Hero Simple and Career List, and a Career Row click still landing on its Career. Proves the Career Listing type changed nothing on the page.
11. Served HTML of USA Focused Senior Digital PR Manager: a `nav` labelled Breadcrumb with three Crumbs and `aria-current="page"` on the last; one `h1`; the Career Details as a `dl` with each label a `dt` and each value a `dd`; the icons and the photograph `aria-hidden` or empty-alt; the Apply Now link's `href` of `#career-content` and an element with that id; SEOmatic's BreadcrumbList JSON-LD listing Home, Careers and the Career with absolute URLs. Proves the markup and the schema.
12. Seed output for both Seeds, run twice: every field set and the image uploaded on the first run, the image reused and the type switch skipped on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- The Longform Career content beneath the Hero, and the application form or flow itself. This spec places only the anchor the Apply Button targets.
- The Career entry's Sidebar - CTA fields.
- Any Hero Layout for the Hero field. The Career Hero belongs to the Career entry alone.
- An editor field for the Apply Button's label, icon or target.
- A dedicated mobile or tablet design. The responsive rules follow the decisions above until a node exists.
- Changing the Career List, the Career Row or the Careers page's content.
- Changing the breadcrumb's colours or the Case Study and Service Heroes.
- New icons per Category or per Employment Type. Every Career uses the clock and target icons.
- A Padding setting on the Hero. The bottom padding is fixed.
- Committing the Seeds.

## Further Notes

- Node geometry at 1600: the trail at y 123; the heading at y 254, 750 wide (six columns); the text at y 429, 750 wide; the button at y 512, 245 by 42; the Career Details group at x 1067 (column 9's start), y 254, 493 wide (four columns); the image at y 670, 1520 by 705.
- The Career Details rows are drawn as 61px rectangles with a top border, the value columns at x 1276, 209px from the label column, 284px wide. The Salary rectangle is drawn 61px with a 15px gap after it, and the Working pattern rectangle 82px: both are the same 20px padding around a taller value, so the rows are built as content-height with padding rather than fixed heights.
- The node's labels are "Job Type:", "Sector", "Salary:", "Reports to:" and "Working pattern:". "Job Type" is kept as the visible label although the glossary calls the field Employment Type.
- The node's heading and breadcrumb show no Highlight; the Highlight in Secondary is kept for consistency with the Service Hero and is only seen when an editor italicises words.
- The photograph was downloaded from the node (2500 by 1667 JPEG, Canon EOS R5) into the Seed's scratch folder; the Figma asset URL expires within seven days.
- The Career entry template currently sets the Header Colour to Black with no Hero beneath it; that was a placeholder, not a design decision.
