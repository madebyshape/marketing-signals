# Hero Simple Options

Spec for the editor options on the Hero Simple Hero Layout: a switch for the Breadcrumb, an Eyebrow above the heading, a Button Group of up to two Buttons below the text, a Hero Alignment of Left or Centred, and a Hero Background of Creme or Black. It extends the Hero Simple spec and leaves every existing Hero Simple rendering as it does today.

Design: Figma nodes in the Marketing Signals file, each 1600 wide. `10069-25068` is Left with the Breadcrumb on Creme (the Case Studies page). `10069-25070` is Centred with the Breadcrumb and two Buttons on Creme (the Careers page). `10069-25074` is Left on Black with no Breadcrumb, an Eyebrow and one Button (the Playbooks page). No mobile nodes exist; the responsive rules below are decisions, not measurements.

Branch: feature/hero-simple-options

Related: the Hero Simple spec, whose layout this keeps as the Left geometry without Buttons; the Hero Team spec, whose black panel with a rounded bottom edge the Black Hero Background follows; the Eyebrow Heading Text spec, whose Button colours the Creme Hero Background shares. ADR-0001 applies: the Header is fixed, so the Hero pads its top by the header height from the shared map. ADR-0002 applies: test content arrives by Seed. ADR-0007, written during the grilling session, supersedes ADR-0004: the Header Colour follows the Hero, including a Hero Simple's Hero Background, and the rule moves to one shared place. Vocabulary: `CONTEXT.md`, "Heroes" section, which gained Hero Alignment and Hero Background and had Hero Simple, Hero Layout and Breadcrumb sharpened during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

Hero Simple is the hero on most pages of the site, and it only comes one way: a Breadcrumb, a heading on the left and a short text beside it, on the page colour. The design now draws it three ways. The Careers page centres everything and adds two Buttons beneath the text. The Playbooks page puts the hero in a black panel with no Breadcrumb, a short label above the heading and a Button beneath the text. The fields for all of this are already on the Hero Simple entry type, but the template reads none of them, so an editor can fill them in and see nothing change. And a black hero under today's rules would sit beneath a creme Header, because the Header Colour is decided by the Hero Layout alone and Hero Simple counts as light.

## Solution

Editors get five options on a Hero Simple, and each one shows on the page.

- **Breadcrumbs switch**: turning it off hides the Breadcrumb, and the content moves up to sit a set distance below the Header.
- **Eyebrow**: sits above the heading.
- **Button Group**: holds up to two Buttons beneath the text.
- **Hero Alignment**: Left sets out the heading on the left with the text and Buttons beside it; Centred puts everything in one centred column, with the Breadcrumb still on the left.
- **Hero Background**: Black puts the hero in a full-width black panel with a rounded bottom edge, light text and a Black Header above it.

A Left hero without Buttons looks exactly as it does today. A Left hero with Buttons widens its text column to fit them. The Case Studies, Careers and Playbooks pages each get a seeded Hero Simple matching their Figma node.

## User Stories

1. As a visitor, I want the Careers page hero centred, so that the page opens with the welcoming, symmetrical top the design draws.
2. As a visitor, I want the Playbooks page hero in a black panel, so that the series reads as a distinct, premium section of the site.
3. As a visitor, I want the Header black over a black hero, so that the top of the page reads as one surface.
4. As a visitor, I want the black panel's bottom corners rounded, so that it sits on the page like the site's other black heroes.
5. As a visitor, I want a short label above a hero heading, so that I know what series or area the page belongs to.
6. As a visitor, I want up to two buttons beneath the hero text, so that I can act on the page's main offer without scrolling.
7. As a visitor, I want the first button filled and the second outlined, so that I can tell the main action from the secondary one.
8. As a visitor, I want the hero buttons to stay legible on a black panel, so that they never disappear into the background.
9. As a visitor, I want the heading's Highlight in secondary on a black panel, so that the key words stand out against the dark.
10. As a visitor, I want the text white on a black panel, so that it reads comfortably.
11. As a visitor on a page without a Breadcrumb, I want the content to start a comfortable distance below the Header, so that it neither crowds the Header nor floats in empty space.
12. As a visitor on a page with a Breadcrumb and a Black Hero Background, I want the Breadcrumb in white, so that the trail stays readable.
13. As a visitor on a centred hero, I want the Breadcrumb still on the left, so that the trail is always where I expect it.
14. As a visitor on a phone, I want a centred hero to stay centred and a Left hero to stack heading, text and buttons, so that both read well on a narrow screen.
15. As a visitor on a phone, I want the buttons to wrap onto a second line rather than overflow, so that both stay tappable.
16. As a visitor on the Case Studies page, I want the hero to look exactly as it does today, so that nothing I already know has shifted.
17. As a keyboard user, I want the hero buttons in reading order after the text, so that tabbing follows what I see.
18. As a screen reader user, I want the Eyebrow read before the heading and the heading to stay the page's level-one heading, so that the page outline is unchanged.
19. As an editor, I want a Breadcrumbs switch that is on by default, so that a new hero has its trail and I can turn it off where the design has none.
20. As an editor, I want an Eyebrow field above the heading, so that I can label the page the way other Blocks label their sections.
21. As an editor, I want a Button Group that holds at most two Buttons, so that the hero never grows a row of buttons the design does not draw.
22. As an editor, I want an Alignment setting of Left or Centred, so that I can choose the hero's set-out without a new Hero Layout.
23. As an editor, I want a Background Colour setting of Creme or Black, so that I can make a hero dark without a new Hero Layout.
24. As an editor, I want the option labels to use the site's words, Alignment and Creme, so that the control panel matches how we talk about the site.
25. As an editor, I want the Header to follow my Background Colour on its own, so that I never have to set the Header separately and cannot get it wrong.
26. As an editor, I want every Hero Simple I already made to keep its look, so that adding the options changes no existing page.
27. As an editor, I want an empty Eyebrow or an empty Button Group to leave no gap, so that I only fill in what the page needs.
28. As an editor, I want every option combination to render sensibly, including Centred on Black and an Eyebrow with the Breadcrumb, so that I can combine them freely.
29. As a developer, I want the Header Colour rule in one shared place that every page type template reads, so that the next dark option is one line and not ten.
30. As a developer, I want Hero Background to change colours only and never geometry, so that the Left and Centred set-outs are each defined once.
31. As a developer, I want the Left geometry to switch on whether the hero has Buttons, so that the rule is about content and not colour.
32. As a developer, I want the hero composed from the existing eyebrow, heading, rich text, button group and breadcrumb components, so that no new component is needed.
33. As a developer, I want the colour choices in the template's options maps, so that a third Hero Background is one entry.
34. As a developer, I want the Hero Simple to stay free of JavaScript, so that the page top stays static and fast.
35. As a developer, I want the top padding still read from the shared header map, so that ADR-0001 keeps holding.
36. As a reviewer, I want each Figma node matched by a seeded page, so that I can compare every option combination the design draws.

## Implementation Decisions

**Fields.** The Hero - Simple entry type already carries the new fields in project config.

- **Breadcrumbs.** The Lightswitch - On instance with the handle `breadcrumbs`, in Section Header.
- **Eyebrow.** The shared Eyebrow field, in Section Content before the Heading.
- **Button Group.** The shared Button Group field, at most two Buttons, in Section Footer.
- **Settings tab.** Beside Padding, two dropdowns:
  - **Alignment.** The Dropdown - Alignment instance, renamed from handle `layout`, label "Layout" to handle `alignment`, label "Alignment", because a Layout field on a Hero Layout overloads the word.
  - **Background Colour.** The Dropdown - Background Colour (Cream) instance with the handle `backgroundColour`. Its options become Creme/`creme` (default) and Black/`black`, so the label and value match the glossary's spelling. The field is renamed "Dropdown - Background Colour (Creme)" to match. Hero Simple is its only user, so the rename touches nothing else.

**Defaults and existing entries.** The template treats a missing value as the default:

- Breadcrumbs on
- Alignment Left
- Background Creme

Every Hero Simple saved before this work renders unchanged. How Craft fills in a null Lightswitch - On or a null dropdown on an existing entry is checked during the build against a hero that was never re-saved. The template's fallbacks must hold whichever way it resolves.

**Geometry follows Alignment and Buttons; colour follows Hero Background.** Hero Background never changes columns, sizes or gaps. Alignment and the presence of Buttons decide the geometry.

**Top of the content.** Measured from the header height padding (ADR-0001).

- **Breadcrumb on.** The Breadcrumb sits on the Header's bottom edge, as today. The first content item below it, the Eyebrow when set and otherwise the heading, keeps today's gap: 60px below `xl`, 130px from `xl`.
- **Breadcrumb off.** The first content item starts 60px below the Header's edge below `xl`, and 90px from `xl`.
- **Eyebrow.** When set, it sits 30px above the heading.

**Left without Buttons.** Unchanged from the Hero Simple spec:

- Twelve-column grid.
- Heading across all twelve columns below `lg` and the first seven from `lg`, on the ramp 5xl, 7xl from `md`, 9xl from `lg`, 11xl from `xl`.
- Text across the last three columns from `lg`, bottom-aligned with the heading.
- 30px between heading and text below `lg`.
- The Eyebrow spans the first seven columns above the grid.

**Left with Buttons.**

- Heading across the first eight columns from `lg`, on the ramp 5xl, 7xl from `md`, 9xl from `lg`, 10xl from `xl`.
- A column across the last four columns from `lg`, holding the text and the Button Group beneath it, top-aligned with the heading, as the Playbooks node draws it.
- 30px from text to Buttons.
- Below `lg`, heading, text and Buttons stack with 30px between each.

**Centred.**

- One centred column.
- Eyebrow, heading, text and Button Group all centred.
- Heading capped at eight columns from `lg` (columns three to ten), on the ramp 5xl, 7xl from `md`, 9xl from `lg`, 10xl from `xl`.
- Text capped at 750px.
- 30px from heading to text and from text to Buttons.
- The Button Group centres its row.
- The Breadcrumb stays left-aligned above the column.
- At every width the column stays centred.
- Buttons don't change the Centred geometry.

**Hero Background, Creme.**

- The hero sits on the page colour inside the section, as today.
- Eyebrow black.
- Heading black with the Highlight in primary.
- Text through the rich text component's `black` colour.
- Breadcrumb in its `base` colour.
- Buttons Secondary, then Creme 300 outline.

**Hero Background, Black.** Following Hero Team:

- **Panel.**
  - The section takes `paddingX: 'none'` and the hero content sits inside a full-width black panel with a 30px rounded bottom edge.
  - The panel carries the site margins and the header height top padding from the shared maps.
  - Its bottom padding is 60px below `xl` and 125px from `xl`. That matches the space under the content in the Playbooks node.
  - The editor's Padding stays on the section, outside the panel, as the gap before the first Block.
- **Colours.**
  - Eyebrow white.
  - Heading Creme 100 with the Highlight in secondary.
  - Text through the rich text component's `white` colour.
  - Breadcrumb in its `white` colour.
  - Buttons Secondary, then White 30% outline. The design only draws one Button on Black, so the second colour is a decision.

**Components.** Composed entirely from existing components:

- Breadcrumb
- Eyebrow
- Alternate heading, as `h1`
- Rich text
- Button group

Colour and set-out choices live in the template's options maps, keyed by the Hero Background and Alignment values. Empty Eyebrow, text or Button Group render nothing and leave no gap. No Alpine and no js block.

**Header Colour.** Per ADR-0007, the rule moves out of the page type templates into one shared place they all read.

- Hero Home, Hero Full Screen and Hero Team give Black.
- A Hero Simple whose Hero Background is Black gives Black.
- Anything else, including no Hero, gives Creme 100.

The ten page type templates that each carry a copy of the ADR-0004 map read the shared rule instead. Templates that set the Header Colour themselves keep doing so: the Error Page, the Form Success Page, Case Study and Service. How the shared rule is shaped is an implementation detail.

**Content.** Three Seeds, under the scratch folder and not committed, each targeting the Hero field with `replace`, Padding Bottom on each:

- **Case Studies page.** Left, Creme, Breadcrumb on, no Eyebrow and no Buttons, with its current copy. This is the regression check.
- **Careers page.** Centred, Creme, Breadcrumb on.
  - Heading: "Embrace life at Marketing Signals." with "Marketing Signals." italic.
  - Text: two paragraphs, "Join a best-in-class, remote-first team, working a 4-day week" and "Work with some big brand clients at an agency which suits YOUR lifestyle".
  - Buttons: "See Open Positions" and "Our Culture".
  - The Breadcrumb derives as Home › Careers; the node's three-Crumb trail is placeholder copy.
- **Playbooks page.** Left, Black, Breadcrumb off.
  - Eyebrow: "The Playbook Series · 2026".
  - Heading: "Visibility Playbooks: SEO & GEO by Vertical for 2026" with "SEO & GEO by Vertical for 2026" italic.
  - Text: the node's paragraph.
  - Button: "Download the checklist".

**Docs.** During the grilling session:

- `CONTEXT.md` gained Hero Alignment and Hero Background, and Hero Simple, Hero Layout and Breadcrumb were sharpened.
- ADR-0007 was added.
- ADR-0004 was marked superseded.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against each Figma node at the same width, plus served HTML where the behaviour is not visual.

**Seams.**

- **Primary seam.** The rendered page through the global layout, one page per Figma node: the Case Studies page, the Careers page and the Playbooks page, each with a seeded Hero Simple. The Header Colour rule is proven through the same pages, since the Header renders in the global layout.
- **Combinations with no node.** Centred on Black, and an Eyebrow with the Breadcrumb, are proven by temporarily switching a seeded hero's options and restoring it afterwards.
- **Nothing committed to the styleguide.**

**What good evidence looks like.** It shows what a visitor would see:

- Each node's set-out at 1600 beside its Figma node.
- The black panel and Black Header meeting as one surface.
- Buttons in their colours.
- The stacked and centred versions at 390.
- Today's Case Studies hero unchanged.

Fixed widths, one state per file, before and after pairs on the PR. Before is `main` at the commit the branch forked from.

**Evidence plan.**

1. Case Studies page at 1600, viewport: identical to its before capture, Breadcrumb on the Header's edge, heading at 11xl across seven columns, text in the last three bottom-aligned. Compared against `10069-25068`. Proves existing heroes are unchanged.
2. Careers page at 1600, viewport: Breadcrumb on the left, heading at 10xl centred, text centred under it, "See Open Positions" in Secondary and "Our Culture" in Creme 300 outline centred beneath, Creme 100 Header. Compared against `10069-25070`. Proves Centred on Creme with Buttons.
3. Careers page at 390, full page: everything centred, heading at 5xl, the two Buttons wrapping if they must. Proves Centred on mobile.
4. Careers page at 1600, a Button hovered: its hover state. Proves the Buttons are live Buttons.
5. Playbooks page at 1600, viewport: Black Header over a black panel reading as one surface, no Breadcrumb, Eyebrow white 90px below the Header's edge, heading at 10xl in Creme 100 with the Highlight in secondary across eight columns, text white with "Download the checklist" in Secondary beneath it in the last four columns top-aligned with the heading, 30px rounded bottom corners. Compared against `10069-25074`. Proves Left on Black with Eyebrow, Buttons and no Breadcrumb.
6. Playbooks page at 390, full page: panel full width with rounded bottom corners, Eyebrow, heading, text and Button stacked with 30px between. Proves Black and Left with Buttons on mobile.
7. Playbooks page at 768, viewport: heading at 7xl, still stacked. Proves the `md` step.
8. Playbooks page at 1600, temporarily Centred with the Breadcrumb on, restored afterwards: white Breadcrumb on the left, everything else centred in the black panel. Proves Centred on Black and the white Breadcrumb.
9. Case Studies page at 1600, temporarily with an Eyebrow, restored afterwards: Eyebrow 130px below the Breadcrumb and 30px above the heading. Proves the Eyebrow with the Breadcrumb.
10. Served HTML of the Playbooks and Careers pages: the heading still the only `h1`, the Eyebrow before it in source order, the Buttons after the text, no `nav` when the Breadcrumb is off, the Header carrying its Black colour on Playbooks and Creme 100 on Careers, no inline styles. Proves the markup and the Header Colour rule.
11. A page type other than the Page type, such as the Blog Listing page, with a Hero Simple set to Black temporarily and restored afterwards: Black Header. Proves every page type template reads the shared rule.
12. Seed output for each of the three Seeds: the Hero replaced with the options set. Saved as text beside the screenshots. Proves the content.
13. The control panel field layout, read from project config: Alignment with handle `alignment`, Background Colour with Creme and Black options. Proves the renames.

## Out of Scope

- More than two Buttons in a Hero Simple.
- A Right Hero Alignment, or any Hero Background other than Creme and Black.
- An image, video or Scroll Cue in a Hero Simple.
- Hero Background on any other Hero Layout.
- Changing the Breadcrumb's derivation or the Crumbs on the Careers page to match the node's placeholder trail.
- Changing the colour or geometry of Hero Home, Hero Full Screen, Hero Team or the Heroes built from an entry's own fields.
- A dedicated mobile design. The responsive rules follow the decisions above until mobile nodes exist.
- A committed styleguide preview.
- Committing the Seeds.

## Further Notes

- Figma trims text boxes to cap height. The 41px from the Eyebrow's cap top to the heading's cap top in the Playbooks node is about 30px of margin on the site, and the 90px from the Header's edge to the Eyebrow's cap top lands a few pixels differently once the Eyebrow's leading is counted.
- At 1600 eight columns are 1006.67px, matching the heading width in both the Centred and the Black nodes, and four columns are 493.33px, matching the Black node's text width. Its text starts at 1066.67px, the ninth column.
- The Black node's panel is 551px tall. Its Button ends at about 425px, which gives the 125px of space under the content.
- The Centred node draws the heading at y 249 against 254 in the Left nodes; the difference is Figma's placement, not a rule, and the 130px gap applies to both.
- The Centred node's second Button is the Grey 300 Outline pill, which is the button component's Creme 300 outline colour.
- The ADR-0004 map was copied into ten page type templates rather than living in one place as that ADR said; ADR-0007 puts it back in one place.
