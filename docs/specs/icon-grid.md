# Icon Grid

Spec for the Icon Grid Block: a Section Header of an Eyebrow with a Rule, a large heading with the Highlight and a short text, over a grid of Icon Cards, each a white card with an Icon over a centred heading and text, with a Button and an Avatar Group centred beneath. Three cards across on a desktop, two on a tablet, one on a phone. The Icon is a Font Awesome icon named by the editor and always drawn in the Sharp Duotone Light style, or an SVG the editor uploads, by the Icon Type. It is the first Block on the Tree Center Case Study page.

Design: Figma node `9903-14969` in the Marketing Signals file, the "Our Approach" group on the Tree Center case study, 1520 by 1155 inside the 1600 frame. No tablet frame and no mobile frame exist, so the two-column and one-column layouts, the size ramp and the mobile card padding below are decisions, not measurements. The design's icons are Font Awesome glyphs set as text, not vectors, so there are no SVGs to export; the six icon names are in the seed content.

Branch: feature/icon-grid

Related: the Stacking Cards spec, whose Section Header, Section Content, Section Footer layout with the Button and Avatar Group this copies, and whose footer row this mirrors; the Content Rows spec, whose Media Type dropdown with conditional fields is the pattern for the Icon Type; the Case Study Intro spec, whose heading with the Highlight in primary and Eyebrow with a Rule this matches on the same page; the Global Footer spec, whose Footer CTA is the first caller of the user component this reuses; the Content Seeding spec, which puts the review content on the Tree Center. ADR-0001 does not apply: the Block is in flow beneath the Case Study Intro. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, new "Icon Grid" section, which gained Icon Grid, Icon Card, Icon and Icon Type during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Tree Center Case Study page ends after its Intro and Sidebar. The design follows the Intro with the agency's approach: a heading stating the strategy, a paragraph beside it, and six white cards, each led by a large purple icon over a title and a sentence, then a call to action with the Managing Director's photo and name beneath. Editors have no Block that lays out a set of points with an icon on each, on a Case Study or anywhere else, and no way to show a Font Awesome icon from the control panel at all.

## Solution

An Icon Grid Block editors can add to any page. Its Section Header is the Eyebrow with its Rule, a heading at 62px on a desktop with its Highlight in primary across eight columns, and the text at 16px in the last three columns, top-aligned with the heading. Beneath it, Icon Cards in a grid with the site's 20px gap: three across from the desktop breakpoint, two from the tablet breakpoint, one below. Each Icon Card is a white panel with 20px corners, centred: the Icon at 104px on a desktop and 80px below in primary, the heading at 25px medium, the text at 15px. An Icon is either a Font Awesome icon the editor names, always drawn in the Sharp Duotone Light style with its second layer at 20%, or an SVG the editor uploads, inlined and recoloured to primary so both kinds look the same. Under the grid, centred, the Button as the secondary pill and the Avatar Group as the small user row, either one optional. The Tree Center gets the Figma content by Seed: six Font Awesome cards, the "Let's Work Together" button to the Contact page, and Gareth Hoyle's Avatar Group.

## User Stories

1. As a visitor, I want a set of points each led by a large icon, so that I can scan what was done before I read the detail.
2. As a visitor, I want a heading above the cards stating the approach, so that the cards have a frame.
3. As a visitor, I want the key words of the heading in purple, so that the point reads with the same voice as the Intro above it.
4. As a visitor, I want a short paragraph beside the heading, so that the approach is explained in a sentence before the cards break it down.
5. As a visitor, I want a label above the heading, so that I know which part of the story this is.
6. As a visitor, I want each card's icon, heading and text centred, so that the row reads as a set.
7. As a visitor, I want the icons all in the same colour and style, so that six different pictures still look like one set.
8. As a visitor, I want the icons two-toned with the second layer faint, so that they read as the design intends rather than as flat glyphs.
9. As a visitor, I want three cards across on a wide screen, so that six points fill two neat rows.
10. As a visitor with a tablet, I want two cards across, so that each card is still wide enough for its text.
11. As a visitor with a phone, I want the cards stacked one above the other, so that each is the full width.
12. As a visitor with a phone, I want the icon a little smaller and the card padding tighter, so that the icon does not dominate a narrow card.
13. As a visitor with a phone, I want the heading above the text rather than beside it, so that neither is squeezed.
14. As a visitor, I want a button beneath the cards, so that I can act on what I have just read.
15. As a visitor, I want a photo, name and job title beside the button, so that I know who I would be talking to.
16. As a visitor, I want the button and the person centred under the grid, so that the section closes as designed.
17. As a visitor, I want the button to change colour when I hover it, so that I can see it is a link.
18. As a visitor, I want a card with no icon to show its heading and text with no gap where the icon would be, so that a half-built card is not a broken one.
19. As a visitor, I want a Block with five cards to leave the last row short rather than stretch the cards, so that every card is the same size.
20. As a keyboard user, I want the Block's heading to be a real heading and each card's heading a heading beneath it, so that I can move through the page by its outline.
21. As a screen reader user, I want the icons silent, so that I hear each card's heading and text and not an icon's name.
22. As a screen reader user, I want the person's name and job title read as text, so that the row makes sense without the photo.
23. As an editor, I want an Icon Grid Block in the Blocks menu, so that I can add it to any page.
24. As an editor, I want the Block's Eyebrow, Heading and Text under a Section Header heading, so that it reads like every other Block.
25. As an editor, I want to write the heading in the same Heading field I use in Blocks, so that italic means Highlight here as it does everywhere.
26. As an editor, I want to write the text in the same simple rich text field I use in Blocks, so that there is nothing new to learn.
27. As an editor, I want to add Icon Cards as cards inside the Block, so that each one is a small, obvious unit.
28. As an editor, I want each card to show its heading on its face, so that I can tell them apart without opening them.
29. As an editor, I want to choose whether a card's icon is a Font Awesome icon or an image, so that I can use the icon library or my own artwork.
30. As an editor, I want to see only the field for the Icon Type I chose, so that the card is not cluttered with a field I am not using.
31. As an editor, I want Font Awesome to be the default Icon Type, so that the common case needs no choosing.
32. As an editor, I want to type just the icon's name, such as bullseye-arrow, so that I do not need to know Font Awesome's class names.
33. As an editor, I want a pasted class string from the Font Awesome site to still work, so that a copy and paste does not break the card.
34. As an editor, I want every Font Awesome icon drawn in the same style whatever I type, so that the set never mixes styles.
35. As an editor, I want to be told to upload an SVG, so that my image takes the icon colour.
36. As an editor, I want the card's heading as a plain text field, so that there is nothing to format.
37. As an editor, I want the card's text as the simple rich text field, so that I can bold a word or add a link.
38. As an editor, I want the card's heading required, so that I cannot save a card that would render as an icon alone.
39. As an editor, I want to add as many or as few cards as I need, so that the Block fits four points as well as six.
40. As an editor, I want the Button and Avatar Group under a Section Footer heading, so that the Block reads like Stacking Cards.
41. As an editor, I want to leave the Button or the Avatar Group empty and see the other alone, so that a Block without a person still has its button.
42. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
43. As an editor, I want the Tree Center to already carry this Block with the designed content, so that I see how it is meant to look.
44. As a developer, I want the Block to reuse the existing Eyebrow, Heading, Rich Text - Simple, Text, Image, Button, Avatar Group and Padding fields, so that the only new fields are the Icon Type dropdown and the Icon Grid Matrix.
45. As a developer, I want the card content composed from the heading, rich text, picture, button and user components, so that its typography matches every Block.
46. As a developer, I want the Font Awesome icon rendered as an icon element with the style classes the Block owns, so that a change of style is one line.
47. As a developer, I want the icon name cleaned in one place at the top of the card loop, so that a reviewer can read the rule in a glance.
48. As a developer, I want the second layer's opacity set with a Tailwind arbitrary property, so that the Block needs no stylesheet.
49. As a developer, I want the review content added by a Seed rather than by hand, so that the review environment is reproducible.
50. As a reviewer, I want the Tree Center seeded with the Figma copy word for word, so that the screenshot compares to the design line by line.

## Implementation Decisions

**Entry types.** A new Block entry type, handle `iconGrid`, name "Icon Grid", colour blue, icon `icons`, added to the Blocks field in the General group. Its Content tab follows Stacking Cards: a Section Header heading element followed by the Eyebrow field, the Heading field and the Rich Text - Simple field with handle `text` labelled "Text"; a Section Content heading element followed by the Icon Grid field; a Section Footer heading element followed by the Button field and the Avatar Group field. A Settings tab holds the Padding field. An inner entry type, handle `iconCard`, name "Icon Card", colour purple, icon `star`, with no title field, holds the card's fields and a card label showing its heading.

**Fields.** Two new fields. The Icon Type dropdown, handle `dropdownIconType`, name "Dropdown - Icon Type", with the options Font Awesome (`fontAwesome`, default) and Image (`image`). The Icon Grid Matrix, handle `iconGrid`, name "Icon Grid", holding the Icon Card entry type only, no minimum and no maximum, card view, create button "New Icon Card". Inside the Icon Card entry type, in order: the Icon Type dropdown; the existing Text field with handle `icon` labelled "Icon", shown by condition only when the Icon Type is Font Awesome, with the instruction "The Font Awesome icon name, e.g. bullseye-arrow. Always shown in the Sharp Duotone Light style."; the existing Image field with handle `iconImage` labelled "Icon Image", shown by condition only when the Icon Type is Image, with the instruction "Upload an SVG so it takes the icon colour."; the existing Text field with handle `heading` labelled "Heading", required; the Rich Text - Simple field with handle `text` labelled "Text". The conditions follow Content Row's Media Type conditions exactly.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding, and its content inside the section's content block. No Alpine: the Block is static. It reads the Icon Cards once at the top, keeping those with a heading or text, and decides whether it has a header (Eyebrow, heading with tags stripped, or text with tags stripped is non-empty) and whether it has a footer (a Button or an Avatar Group name). It renders only when it has a header or at least one card; a Block with only a footer renders nothing at all, section included.

**Section Header.** Below `lg` one column: the Eyebrow with its Rule, then the heading, then the text 30px beneath it. From `lg` the header is a twelve-column grid with the 20px gap: the heading spans the first eight columns, 1007px at 1600, which is the node's text box; the text spans columns ten to twelve, 365px at 1600, top-aligned with the heading. The Eyebrow is the eyebrow component with its Rule, 60px above the heading at every width. The heading is the alternate heading component as `h2` at 5xl, semibold, leading 0.97, tighter tracking, with the Highlight in primary through the component's base alternate style, stepping to 6xl from `md` and 7xl from `lg`. The text is the rich text component at its base size in black. Without an Eyebrow the heading is first; without a heading the text stands alone in its column; without a header the grid is first.

**Grid.** 50px below the header. One column with the 20px gap, two columns from `md`, three from `lg`. Cards stretch to their row's height so a row is level. A count that is not a multiple of the columns leaves the last row short and left-aligned; nothing is centred or stretched.

**Icon Card.** A white panel with 20px corners, centred text, a column with its content at the top. Padding 30px sides and 40px top and bottom below `lg`; from `lg` 40px sides, 40px top and 50px bottom, the node's figures. Inside: the Icon, then the heading 50px beneath it, then the text 15px beneath that. The heading is the heading component as `h3` at 2xl, medium, leading 1.2, tighter tracking, black. The text is the rich text component at `sm` in black. A card without an Icon starts with its heading; nothing is reserved. A card with no heading and no text is skipped.

**Icon.** Resolved from the Icon Type. Font Awesome: the field value is trimmed, its last whitespace-separated word taken, and a leading `fa-` removed, so `bullseye-arrow`, `fa-bullseye-arrow` and `fa-sharp-duotone fa-light fa-bullseye-arrow` all give `bullseye-arrow`; an empty result is no Icon. It renders as an `i` element with the Sharp Duotone and Light style classes the Block owns and the icon's class, `text-primary`, 80px below `lg` and 104px from `lg`, hidden from assistive technology, with the second layer's opacity set to 0.2 through the `--fa-secondary-opacity` custom property as a Tailwind arbitrary property. The kit already serves the Sharp Duotone Light face in webfont mode, so no dependency changes. Image: the picture component with the ratio off, the `noRatio` transform and `svgInline` on, as the Case Study Sidebar renders its Logo, inside a wrapper in primary, so an SVG's fills become `currentColor` and take the colour; a PNG or JPG renders as uploaded. The image is capped to the same 80px and 104px height with its width following, centred, empty alt. Without an image there is no Icon.

**Section Footer.** 50px below the grid, a centred row that wraps, with the 20px gap. The Button is the button component in its default secondary colour, so the pill and its arrow are the design's. The Avatar Group is the user component at size `sm` in its base colour with the avatar image, the name as its heading and the job role as its sub heading, exactly as the Footer CTA calls it. Either one renders alone, still centred; with neither the footer is omitted.

**Empty states.** No header: the grid is first. No cards: the header alone. No footer: nothing beneath the grid. Only a footer: nothing rendered. A card without an Icon, or with an unresolvable icon name, shows its heading and text with no gap.

**Content.** One Seed, under the scratch folder and not committed, targeting the Tree Center entry in the Case Study section with one Icon Grid Block, padding Top and Bottom: Eyebrow "Our Approach"; heading "A tailored strategy focused on building links for maximum results" with "building links for maximum results" italic; text "We put together a tailored strategy focused on building links to key pages ahead of the peak selling season. During the quieter winter months, we scaled back link-building and shifted our focus to identifying on-page improvements and new opportunities"; six Icon Cards, all Font Awesome, in reading order: `bullseye-arrow` "Seasonal Based Strategy" "We targeted specific types of trees based on their peak conversion period, ensuring they had link equity built up in advance of the best-selling months of the year."; `arrows-down-to-people` "Targeted Outreach" "We reached out to garden bloggers in order to earn links that were thematically relevant but aligned with the correct target audience."; `circle-star` "Gifted Reviews" "Some gifted tree samples were sent to some of the most influential bloggers in order to build relationships and promote the brand."; `comment-lines` "Blog Content Creation" with the same "Some gifted tree samples…" text, as the node has it; `chart-candlestick` "Competitor Link Audit" "A manual audit of all the best links from all the main competitors provided an additional number of outreach targets to complement the main outreach campaign."; `file-pen` "Content Review" "We reoptimised a number of key category and content pages in order to better meet the search intent of the top queries for each page."; the Button "Let's Work Together" as an entry link to the Contact page; the Avatar Group with the exported photo of Gareth Hoyle, name "Gareth Hoyle", job role "Managing Director". The command already writes dropdowns, Matrix, Content Blocks, links and images, so it gains nothing.

**Docs.** `CONTEXT.md` gained the Icon Grid vocabulary during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The single primary seam is the rendered Tree Center page, `/case-study/the-tree-center`, through the global layout with the seeded Block beneath the Case Study Intro. The Block is the only caller of the Icon Type, so both types are proven through it. The secondary seam is the Seed command's own output. Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the heading with its Highlight beside its text, six level white cards with two-toned purple icons, the button and the person centred beneath, the two-column and stacked layouts, and the Image Icon Type looking the same as a Font Awesome one. Fixed widths, one state per file, before and after pairs on the PR. The before for the Tree Center page is `main` at the commit the branch forked from, which ends after the Intro and Sidebar.

**Evidence plan.**

1. Tree Center page at 1600, full page: the Block beneath the Intro compared against the Figma node for the Eyebrow and Rule, the heading at 62px with "building links for maximum results" in primary across eight columns, the text in columns ten to twelve, six cards 493 wide with 20px gaps, each icon at 104px in primary with a faint second layer, the 25px headings and 15px texts centred, and the button and Avatar Group centred 50px below. Proves the desktop layout.
2. Tree Center page at 1024, viewport on the grid: three columns. Proves the `lg` rule.
3. Tree Center page at 768, viewport on the grid: two columns, the header stacked. Proves the `md` rule.
4. Tree Center page at 390, full page: the Eyebrow, heading at 5xl and text stacked, one card per row with 80px icons and 30px side padding, the button and Avatar Group wrapped and centred beneath. Proves the mobile layout.
5. Tree Center page at 1600, pointer over the button: the pill in primary with white text. Proves the hover.
6. Tree Center page at 1600 with a temporary seventh card of Icon Type Image holding an SVG: the SVG at 104px in primary in a short third row, left-aligned. Removed afterwards. Proves the Image type, the recolouring and the short-row rule.
7. Tree Center page at 1600 with a temporary card whose icon value is `fa-sharp-duotone fa-light fa-bullseye-arrow`: the same icon as the first card. Removed afterwards. Proves the pasted-string tolerance.
8. Tree Center page at 1600 with a temporary card with no icon: its heading at the top of the card with no gap. Removed afterwards. Proves the missing-icon state.
9. Home page at 1600 with a temporary Seed of an Icon Grid with a header and no cards: the header alone. Removed afterwards. Proves the header-only state.
10. Served HTML of the Tree Center page: the Block's heading an `h2` with the Highlight inside it, each card heading an `h3`, each icon an `i` hidden from assistive technology with the Sharp Duotone and Light classes and the secondary opacity property, the person's name and job role as text, no inline styles beyond the picture component's own. Proves the markup.
11. Seed output run twice: the first run reports the Block created and the photo uploaded; the second reports the Block skipped and the photo reused. Saved as text beside the screenshots. Proves the Seed.

## Out of Scope

- Any Font Awesome style other than Sharp Duotone Light, or an editor choice of style, weight or colour.
- A link on an Icon Card, or a Linked Card treatment.
- Centring a short last row.
- Validating that an uploaded image is an SVG, or recolouring a PNG or JPG.
- Changes to the eyebrow, heading, rich text, picture, button or user components.
- A minimum or maximum number of Icon Cards.
- Committing the Seed or the photo.

## Further Notes

- Node measurements at 1600: the Rule's bottom edge is 60px above the heading's cap top; the heading box is 1007 wide, eight columns of 108.33px plus seven gaps; the text box is 365 wide, three columns plus two gaps, starting at column ten; the cards are 493 by 343 with 20px gaps in both directions; the footer row is 42px tall, 50px below the cards, centred on the frame with 20px between the pill and the photo.
- Inside a card: the icon's top is 43px below the card's top, the heading's cap top 54px below the icon's bottom, the text's cap top 25px below the heading's baseline, and the card's bottom 50px below the text's last line. Figma trims text boxes to cap height, so the 50px and 15px CSS gaps land within a few pixels.
- The design font for the icons is "Font Awesome 7 Sharp Duotone: Light" at 104px in primary, with a second copy of each glyph at 20% opacity, which is what the secondary opacity property reproduces. The kit on the site is Font Awesome Pro 7.3.1 in CSS mode and serves that face; all six icon names resolve to glyphs.
- The card heading's tracking is -1px on 25px, the tighter tracking token; the Block heading's is -2.48px on 62px, the same token.
- A 100px creme band with a bottom border sits at the foot of the node; it is the next section's Eyebrow row and not part of this Block.
- The Figma export returned the photo at 1667 by 2500; it is saved under the scratch folder for the Seed.
- The node's "Blog Content Creation" and "Gifted Reviews" cards share the same text; the Seed keeps that rather than inventing copy.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
