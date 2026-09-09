# Hero Service

Spec for the Service Hero: the full-screen black Hero at the top of every Service page, built from the Service's own Hero Heading, Hero Text, Hero Button, Hero Avatar Group and Hero Video rather than a Hero Layout, so an editor never picks it. The Breadcrumb sits on the header's bottom edge; the heading with its Highlight in secondary, the text, the button and the Avatar Group sit in the left column; the Hero Video fills the right column with the Play Button centred on its Poster, or shows the Poster as a plain image when no video source is set. It is the second Hero built from an entry's own fields, after the Case Study Hero, and the first thing a Service page renders.

Design: Figma node `9910-15476` in the Marketing Signals file, 1600 by 900, the AI-focused Search Engine Optimisation service. The node is one viewport tall with the header drawn in. No mobile node exists; the responsive rules below are decisions, not measurements.

Branch: feature/hero-service

Related: the Hero Simple spec, whose breadcrumb component and heading ramp this Hero reuses; the Case Study Hero, whose component shape, full-screen panel and title fallback this Hero mirrors; the Video Content and Featured Testimonial specs, whose Video Player and Poster this Hero reuses; the Global Footer spec, whose Footer CTA Avatar Group rendering this Hero matches; the Content Seeding spec, whose entry `fields` map seeds the review content. ADR-0001 applies: the header is fixed, so the panel pads its top by the header height from the shared header map. ADR-0002 applies: the review content arrives by Seed. ADR-0003 applies: the Breadcrumb finds the Services page by its listing entry type, and the map gains the Service section. ADR-0004 is unchanged: the Service page template already resolves the Header Colour to Black. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Heroes" section, which gained Service Hero, Hero Button and Hero Video during the grilling session, and whose Hero, Hero Heading and Hero Text now cover both heroes.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A Service page renders its header, its Blocks and its footer, and nothing at the top. The five hero fields sit on the entry type under a Hero heading, filled or not, and reach nothing. A visitor arriving on the AI-focused SEO page meets the header and then drops straight into whatever Block the editor added first, with no statement of what the service is, no way to tell where the page sits in the site, and no face to put to the agency. An editor who fills in the Hero fields sees no effect on the page.

## Solution

Every Service page opens with the Service Hero. From the desktop breakpoint it is a full-viewport black panel with 30px bottom corners, padded at its top by the header height so the Breadcrumb sits on the header's bottom edge, reading Home › Services › the service in creme-500 with the current page in white and underlined. Beneath, a twelve-column grid: columns 1 to 7 hold the heading at 92px semibold in creme-100 with the Highlight in secondary, 30px, the text at 16px creme-100 six columns wide, 30px, then a row of the lilac Hero Button and the Avatar Group 20px apart, the whole group centred vertically against the video. Columns 8 to 12 hold the Hero Video: the Poster with 20px corners stretched from the header edge to 40px above the panel bottom, the 120px Play Button centred on it, opening the Video Modal or playing in place per the field's Display Type. A Poster with no source is a plain image with no Play Button. With neither the media column is left out, the content keeps its seven columns and the panel is content-height. Below the desktop breakpoint the panel is content-height: Breadcrumb, heading, text, the button row wrapping, then the video full width at 3:4 with 40px beneath it. Two services are seeded with the node's copy so the page can be reviewed against the design, one proving the image fallback and one the Play Button.

## User Stories

1. As a visitor, I want a large heading at the top of every service page, so that I know which service I am reading about before I scroll.
2. As a visitor, I want the key words of the heading in the brand lilac, so that the service reads with the same voice as the Home page.
3. As a visitor, I want a short paragraph beneath the heading, so that the service introduces itself in a few sentences.
4. As a visitor, I want a button to get in touch right in the hero, so that I can act without hunting for the contact page.
5. As a visitor, I want a named person with their role beside the button, so that I know who I would be talking to.
6. As a visitor, I want a photograph of the team beside the text, so that the service has a human face.
7. As a visitor, I want a play button on the photograph when there is a video, so that I know I can watch rather than read.
8. As a visitor, I want the video to open in the Video Modal or play in place as the editor chose, so that every video on the site behaves the way the editor set it.
9. As a visitor, I want the photograph shown without a play button when there is no video, so that I am never offered a click that does nothing.
10. As a visitor, I want a trail at the top of the page showing where the service sits, so that I can get back to the Services page in one click.
11. As a visitor, I want the trail's parents in a muted creme and the current page in white, so that it reads on the black panel as the design intends.
12. As a visitor, I want the hero to fill my screen on a desktop with the photograph running its full height, so that the page opens as the design intends.
13. As a visitor, I want the text group centred beside the photograph, so that the layout balances whatever the screen height.
14. As a visitor with a phone, I want the text above the photograph and the photograph full width, so that everything is legible.
15. As a visitor with a phone, I want the button and the person's name to wrap onto two lines rather than squash, so that both stay readable.
16. As a visitor, I want the heading to step up in size with my screen, so that it is legible on a phone and monumental on a desktop.
17. As a visitor, I want the hero to never sit under the fixed header, so that the trail is never hidden.
18. As a visitor, I want space beneath the hero before the first Block, so that the page does not run together.
19. As a visitor with a mouse, I want the play circle to grow a little when I hover the photograph, so that I know it is clickable.
20. As a visitor who prefers reduced motion, I want the play circle still, so that nothing moves that I asked not to.
21. As a keyboard user, I want the trail to be a navigation landmark and the photograph a focusable button with a visible ring, so that I can use the hero without a mouse.
22. As a screen reader user, I want the hero heading to be the page's level-one heading, so that the page outline starts where the page does.
23. As a screen reader user, I want the photograph announced as a button that plays the video, or as decoration when it is only an image, so that I know what will happen.
24. As a screen reader user, I want the person's name and role read as text, so that the Avatar Group makes sense without the picture.
25. As a search engine, I want the page's breadcrumb schema to list Home, Services and the service with absolute URLs, so that the result can show the trail.
26. As an editor, I want the five fields under the Hero heading on the service entry to appear on the page, so that the heading in the control panel means something.
27. As an editor, I want italic words in the Hero Heading shown in lilac, so that I choose the Highlight as I do everywhere else.
28. As an editor, I want the service's title used when I leave the Hero Heading empty, so that the page always has a heading.
29. As an editor, I want to leave the text, button, Avatar Group or video empty and have that part left out, so that a half-finished service still looks finished.
30. As an editor, I want to set only a Video Thumbnail and get a plain photograph, so that a service without a video still has its image.
31. As an editor, I want the Display Type on the Video field respected, so that I choose modal or inline here as I do in Blocks.
32. As an editor, I want the trail derived from the page, so that I never have to write or maintain it.
33. As an editor, I want a nested service to show its parent in the trail, so that the structure I built is visible.
34. As an editor, I want to rename the Services page and see the trail follow, so that the trail never goes stale.
35. As a developer, I want the Service Hero as a component beside the Case Study Hero, included by the service entry template, so that both entry heroes share one shape.
36. As a developer, I want the hero composed from the breadcrumb, heading alternate, rich text, button, user and video player components, so that its typography and behaviour match every Block.
37. As a developer, I want the breadcrumb's listing map to gain one line for the Service section, so that the trail follows ADR-0003 with no new mechanism.
38. As a developer, I want the breadcrumb to gain a colour for dark panels rather than the hero restyling it, so that the next dark hero gets the same trail with one param.
39. As a developer, I want the hero's top padding read from the shared header map, so that a header height change reaches the hero.
40. As a developer, I want no JavaScript in the hero beyond the Video Player's own, so that the page top stays static.
41. As a developer, I want the review content seeded from Seed files, so that the page can be reviewed without control panel credentials.
42. As a reviewer, I want one service with only a Poster and one with a Vimeo video, so that I can check the image fallback and the Play Button side by side.

## Implementation Decisions

**Fields.** No new fields. The Service entry type already has, on its Page Content tab under a Hero heading, the Heading field as `heroHeading`, the Rich Text - Simple field as `heroText`, the Button field as `heroButton`, the Avatar Group content block as `heroAvatarGroup` and the Video content block as `heroVideo`. The Heading instance gains the instruction "Make words italic to highlight them." as project config on the branch.

**Component.** A `heroService` component beside `heroCaseStudy`, with the standard sections, taking `entry`, `vars` and `class`. The service entry template includes it above the Blocks, and keeps its existing Header Colour of Black. Not a Hero Layout: it is never offered in the Hero field. The component reads the fields into local variables first: the heading (Hero Heading with tags stripped, else the title), the text, the button, the Avatar Group (present when it has a name), the video, and whether the video has a source (a trimmed URL or a File) and a Poster.

**Panel.** A section with no vertical padding at its top and the section component's `bottom` padding beneath, no horizontal padding, holding the panel: full width, black, 30px bottom corners, overflow hidden, padded at its top by the header height from the shared header map per ADR-0001, the site margins at its sides and 40px at its bottom. From `lg` the panel is at least the viewport height and a flex column so the grid beneath the Breadcrumb grows to fill it. Below `lg`, and whenever there is no media, the panel is content-height.

**Breadcrumb.** The breadcrumb component with the entry and a new `creme-500` colour: ancestor Crumbs creme-500 turning white on hover and focus, the current page white and underlined, the chevrons creme-500. The listing map gains `service` to Service Listing, so the trail reads Home › Services › the service, the middle Crumb labelled with the Services page's own title. Nested services add their ancestors as the component already does. The `white` colour and its Case Study Hero caller are untouched.

**Grid.** Beneath the Breadcrumb, a twelve-column grid with the design's 20px gap, growing to fill the panel from `lg`. The content column spans all twelve columns below `lg` and columns 1 to 7 from `lg`, and is vertically centred within its row from `lg`. The media column spans all twelve columns below `lg` and columns 8 to 12 from `lg`, stretched to the row's full height. Below `lg` the content comes first and the media last, with 40px between them. With no media the media column is not rendered and the content column keeps its span.

**Heading.** The alternate heading component as `h1`, creme-100, semibold, leading 0.97, tighter tracking, the Highlight in secondary. Size ramp as Hero Simple: 5xl at mobile, 7xl from `md`, 9xl from `lg`, 11xl from `xl`. Rendered even when only the title fallback fills it, so the page always has its level-one heading.

**Text.** The rich text component at base size in creme-100, 30px beneath the heading, at most six columns wide from `lg`. Left out when empty.

**Button and Avatar Group.** A wrapping flex row 30px beneath the text, with a 20px gap. The button component with the Hero Button and its default `secondary` colour. The user component at `sm` and `creme-100`, image, name and job role from the Avatar Group, as the Footer CTA renders it. The row is left out when both are empty; either alone renders.

**Hero Video.** The video player base component with the Video field, the `3x4` transform, the Display Type mapped to modal or inline as the Video and Featured Testimonial Blocks do, 20px corners on the Poster, filling its column. The component's own fallback renders the Poster as a plain picture with focal point when there is no source, so the hero adds nothing for that case. When there is neither a source nor a Poster the column is left out. From `lg` the media fills the column's height with the image covering; below `lg` it is a 3:4 box, full width. The Play Button is the poster component's, already 120px from `lg` and 80px below.

**Seeds.** Two Seeds under the scratch folder, not committed, each targeting a Service entry's own fields through the Seed's `fields` map. The AI-focused Search Engine Optimisation service: heading "AI-Focused Search Engine Optimisation" with "Engine Optimisation" italic; the node's paragraph beginning "As SEO evolves, we maximise your organic presence"; the button "Let's Work Together" linking to the Contact Us page; the Avatar Group Gareth Hoyle, Managing Director, with the node's avatar; the Video with Type URL, no URL, and the node's photograph as its Thumbnail, proving the image fallback. The Digital PR Marketing service: the same media and Avatar Group, its own title as the heading fallback, a short paragraph in the same voice, the same button, and the Vimeo URL already seeded on the Home page's Video Content Block, Display Type Modal Popup, proving the Play Button. Images live beside the Seeds.

**Docs.** `CONTEXT.md` gained the terms during the grilling session. The breadcrumb ADR needs no change: the map grows one line as it says it would.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The primary seam is the rendered Service page through the global layout, at the two seeded services. The Service Hero is proven only there: the breadcrumb's new colour and map line, the Poster fallback and the Play Button all show on those pages. The secondary seam is the Seed command's own output. Nothing is committed to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the trail in creme and white on the black, the heading at 92px with its Highlight in lilac, the text and button row centred beside a full-height photograph, the Play Button on one service and a plain image on the other, and the stacked layout on a phone. Fixed widths, one state per file, before and after pairs on the PR. The before for each service is the empty page it renders today.

**Evidence plan.**

1. AI-focused SEO service at 1600 by 900, viewport: the black panel filling the viewport with 30px bottom corners; Home › Services › AI-focused Search Engine Optimisation on the header's edge, ancestors creme-500, current white and underlined; the heading at 92px over seven columns with "Engine Optimisation" in secondary; the text six columns wide 30px beneath; the lilac button and the Avatar Group 20px apart 30px beneath that; the photograph in columns 8 to 12 from the header edge to 40px above the panel bottom with no Play Button. Compared against the Figma node. Proves the desktop layout and the image fallback.
2. AI-focused SEO service at 1600 by 1200, viewport: the photograph stretched to the taller panel and the content still centred beside it. Proves the full-height behaviour.
3. Digital PR Marketing service at 1600, viewport: the same layout with the 120px Play Button centred on the photograph and the title as the heading. Proves the Play Button and the title fallback.
4. Digital PR Marketing service at 1600, the photograph hovered: the play circle grown. Proves the hover state.
5. Digital PR Marketing service at 1600, the photograph clicked: the Video Modal open with the Vimeo video playing. Proves the Display Type mapping.
6. AI-focused SEO service at 390, full page: the trail wrapping if it must, the heading at 5xl, the text, the button and Avatar Group wrapped onto two lines, the photograph full width at 3:4 with 40px beneath it, the panel content-height. Proves the mobile layout.
7. AI-focused SEO service at 768, viewport: the heading at 7xl, the button row on one line. Proves the `md` step.
8. AI-focused SEO service at 1600 with the Video Thumbnail temporarily cleared: the content alone in its seven columns and the panel content-height. Restored afterwards. Proves the no-media state.
9. Home Crumb hovered on the AI-focused SEO service at 1600: white. Proves the new breadcrumb colour's hover.
10. Served HTML of the AI-focused SEO service: a `nav` labelled Breadcrumb with `aria-current="page"` on the last item, an `h1` with the Highlight inside it, the Avatar Group's name and role as text, no play button in the document, and SEOmatic's BreadcrumbList JSON-LD listing the three Crumbs with absolute URLs. Proves the markup and the schema.
11. Seed output for both Seeds, run twice: every field set on the first run, images uploaded then reused. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- Any Hero Layout for the Hero field. The Service Hero belongs to the Service entry alone.
- The Service Listing page's own hero and its Service Grid.
- A dedicated mobile design. The responsive rules follow the decisions above until a mobile node exists.
- Changing the Video Player, the Poster or the Video Modal. The hero calls them as they are.
- Changing the breadcrumb's `white` colour or the Case Study Hero.
- A Padding setting on the hero. The bottom padding is fixed.
- Rendering the Service's Description or Thumbnail in the hero. Those belong to the Service Carousel and the listing.
- Committing the Seeds.

## Further Notes

- The node's black panel is 900 tall at 1600 wide, exactly the viewport, which is why the panel is full-viewport and the video runs from the header edge to 40px above the bottom rather than to a fixed ratio.
- At 1600 the heading is 878px wide, seven columns; the text is 750px, six columns; the video is 618px from x 942, columns 8 to 12 to within a few pixels.
- The button's right edge is at 243px and the avatar starts at 263px, the 20px gap; the avatar is 42px, the user component's `sm`.
- Figma has the avatar's role in creme-400 and the breadcrumb ancestors in creme-500. The user component's `creme-100` colour paints the role white at 63%, accepted as indistinguishable on black; the breadcrumb gains an exact colour because its `white` option is visibly different.
- The AI-focused SEO service's title carries a line break, which the heading component renders as a `br`; the seeded Hero Heading has none, so the Highlight decides the wrap on that page.
- The Video content block's fallback to a plain picture when there is a Poster but no source was built for the Video Content Block and is reused here unchanged.
