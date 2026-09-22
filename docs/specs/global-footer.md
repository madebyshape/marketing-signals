# Global Footer

Spec for the site-wide Footer: the Footer CTA with its Image Columns and Avatar Group, the Footer Columns, the Social Column, the Footer Bottom, and the Squiggle that draws itself in on scroll. Three reusable components fall out of it: Image Columns, Squiggle, and the Avatar Group treatment of the existing user component.

Design: Figma "Footer / V1 / with CTA" (node `9716-8165`) in the Marketing Signals file, 1600 wide. No mobile node exists; the responsive rules below are decisions, not measurements.

Related: the Global Header spec (link hover, Site entry, `vars.class` tokens). ADR-0001 does not apply: the Footer is in flow. Vocabulary: `CONTEXT.md`, "Global footer" section.

## Problem Statement

Every page ends with a single copyright line. Visitors reach the bottom of a page with no way to get in touch, no secondary navigation to case studies, services, policies or social profiles, and no sign of who built the site or which partners accredit it. Editors have already been given the Footer CTA, Footer Columns and Footer Logos fields on the Site entry, but nothing reads them.

## Solution

A Footer on every page, matching the Figma node at desktop. At the top sits the Footer CTA: a dark card with two Image Columns scrolling continuously in opposite directions beside a heading, supporting text, a button and an Avatar Group. Beneath it the Footer Columns: the Contact Column with the footer text and email and phone pills, two Menu Columns of links with the Main Menu's sweep-in underline on hover, and the Social Column read from the SEO settings. The Footer Bottom carries the copyright line, the Footer Logos and the Made by Shape credit. Behind the columns, the Squiggle draws itself in, scrubbed to the visitor's scroll, as the Footer comes into view. Below the desktop breakpoint everything stacks. Image Columns and the Squiggle are built as components so other calls to action across the site can use them.

## User Stories

1. As a visitor, I want a Footer on every page, so that the end of any page offers me somewhere to go next.
2. As a visitor, I want a prominent Footer CTA with a heading, short text and a button, so that getting in touch is one click away from anywhere.
3. As a visitor, I want to see who I'd be talking to in the Footer CTA (an avatar, name and job role), so that the call to action feels personal.
4. As a visitor, I want the Footer CTA's Image Columns to scroll gently and continuously in opposite directions, so that the card feels alive without demanding attention.
5. As a visitor, I want the Image Columns to loop seamlessly, so that I never see a jump or a gap.
6. As a visitor, I want the footer text to introduce the company with its name highlighted, so that I know whose site this is.
7. As a visitor, I want the email and phone shown as pills that open my mail and phone apps, so that I can get in touch in one tap.
8. As a visitor, I want Menu Columns of links to the main sections and policies, so that I can navigate from the bottom of a page without scrolling back up.
9. As a visitor, I want the same underline hover on footer links as on the Main Menu, so that the site's links behave consistently.
10. As a visitor, I want links to the company's Twitter / X, Facebook and LinkedIn profiles, so that I can follow them elsewhere.
11. As a visitor, I want the social links to open in a new tab, so that I don't lose my place on the site.
12. As a visitor, I want the current year in the copyright line, so that the site never looks abandoned.
13. As a visitor, I want to see the partner and accreditation logos, so that I can judge the company's credentials.
14. As a visitor, I want a credit linking to the studio that built the site, so that I can find out who made it.
15. As a visitor, I want the Squiggle to draw itself in as I scroll the Footer into view, and to draw back out if I scroll away, so that the Footer has a moment of craft that tracks my scrolling.
16. As a visitor with a phone, I want the Image Columns above the Footer CTA content, so that the card reads top to bottom.
17. As a visitor with a phone, I want the Footer Columns stacked in order, then the copyright, logos and credit stacked beneath, so that nothing is squeezed side by side.
18. As a visitor with a tablet, I want the Footer Columns in two columns, so that the width isn't wasted.
19. As a visitor who prefers reduced motion, I want the Image Columns still and the Squiggle already complete, so that the site respects my setting without losing content.
20. As a keyboard user, I want the Footer to be a landmark with labelled navigation for the Menu Columns and the Social Column, so that assistive tech can jump to it and describe it.
21. As a keyboard user, I want every footer link and pill to be a real anchor with a visible focus state, so that I can tab through the Footer.
22. As a screen reader user, I want the Squiggle and the Image Column tiles described appropriately (the Squiggle hidden, the tiles named by their asset titles), so that decoration is silent and photos are announced.
23. As an editor, I want to set the Footer CTA heading, text, button, images and Avatar Group on the Site entry and see them on every page, so that I never touch a template.
24. As an editor, I want the Footer CTA to disappear entirely when I clear its heading, so that I can turn it off without deleting everything else.
25. As an editor, I want the Footer CTA's text, button, images and Avatar Group each to be optional, so that a partly filled card still renders cleanly.
26. As an editor, I want to highlight words in the heading and the footer text by making them italic, so that the secondary colour is under my control with one rule to remember.
27. As an editor, I want to fill one Image Column and get a single full-width column, so that a half-filled field still looks intentional.
28. As an editor, I want the Contact Column and Menu Columns to land in their designed positions whatever order I add them in, so that the layout can't be broken from the CMS.
29. As an editor, I want field instructions that tell me the intended column mix and the minimum images per column, so that I can fill the fields correctly without asking.
30. As an editor, I want to upload the Footer Logos as images and have them render at their natural proportions, so that a new accreditation is an upload, not a request.
31. As an editor, I want the social links to come from the SEO settings I already maintain, so that I keep them in one place.
32. As a developer, I want Image Columns as a component taking a list of image lists, so that other sections can reuse it.
33. As a developer, I want the Squiggle as a component that animates itself from its own wrapper or a trigger I name, so that I can drop it into any section with a relative, clipped wrapper.
34. As a developer, I want the Avatar Group to be the existing user component with a dark-background colour, so that there is one person component on the site.
35. As a developer, I want DrawSVG registered alongside ScrollTrigger and available globally, so that any template's script block can use it.
36. As a developer, I want the new button colour, user colour and Image Columns on the styleguide, so that they can be reviewed against the rest of the system.

## Implementation Decisions

**Where it lives.** The Footer is the existing global footer component, currently a single copyright line, already included by the global layout after the page content. It follows the component conventions: `component` variable, default params, the exact merge line, options, class arrays, output. The Footer CTA is its own global component included by the Footer. Image Columns, Squiggle and the Avatar Group treatment are general components.

**Data source.** Everything editable reads from the Site entry: the Footer CTA content block (image columns, heading, text, button, avatar group), the Footer Columns matrix, and the Footer Logos asset field. Social links read from the SEO plugin's site "same as" links, keyed by handle. The site name and the current year come from the platform globals.

**Footer shell (desktop, from the Figma node).** Black background, 30px radius on the top corners over the page background, site margins (40px) either side, 40px top padding. The Footer CTA card sits first; the Footer Columns start 100px below it; the Footer Bottom row sits about 200px below the columns with about 55px beneath it. The Footer is `relative` and clips overflow so the Squiggle can hang off its bottom edge. Spacing uses the `vars.class` tokens where one covers the value.

**New colour token.** The card and Squiggle colour, #1F1F1F, is added to the theme as `black-200`. No arbitrary hex values in templates.

**Footer CTA card.** 20px radius, `black-200` background, full width between the site margins, 511px tall at 1600 (its height comes from the content padding, not a fixed height). Twelve-column grid with the project gap. Image Columns fill columns 1 to 5, clipped by the card's radius; content starts at column 6 and spans to the card's right padding. Content stack: heading, 30px gap, text (about 716px max width), 40px gap, then a row of the button and the Avatar Group with a 20px gap. Content is vertically centred against the Image Columns. The card renders only when the heading has content; text, button, Image Columns and Avatar Group each render only when they have content. With no Image Columns the content spans the whole card.

**Footer CTA heading.** Rendered through the alternate-style heading component at 9xl (75px, semibold, 0.97 leading, tighter tracking), creme-100. Italic marks the highlighted words and renders in secondary. The heading component and its alternate-style sibling gain 8xl and 9xl sizes and an `alternateStyle` of `secondary`. The heading field is CKEditor; the editor's chosen heading tag is honoured.

**Footer CTA text.** Rendered through the rich text component with a new `creme-100` colour: paragraphs creme-100 at 18px regular, 1.33 leading; italic renders secondary; links underlined in creme-100. The footer text in the Contact Column uses the same colour option at 30px medium, 1.2 leading, tighter tracking, with italic ("Marketing Signals") in secondary. One rule for editors: italic means highlighted.

**Footer CTA button.** The existing button component, colour `creme-100`, inline icon style, arrow-up-right after the label, base size.

**Avatar Group.** The existing user component with two additions: a `creme-100` colour (name creme-100, job role white at 63% opacity, avatar background black-200) and an `sm` size (42px avatar, 16px medium name, 14px regular tight-tracked role). Image is the avatar asset, heading the name, sub-heading the job role. Nothing new is built for it.

**Image Columns component.** Takes `columns` (a list of image lists, from the max-two matrix), `transform` (default `3x4`), `speed` (default 0.3), and `class`. Renders one column per non-empty list, equal widths, 20px gap, 20px tile radius, tiles through the picture component at the `3x4` transform with alt text from the asset title, lazy loaded, `sizes` matched to the column width. Each column's tiles render twice, as the marquee does, so the loop is seamless once editors add about three images per column. A new `3x4` Imager transform (400/800/1200 widths, 3:4 ratio) is added beside the existing ones. Motion is a vertical seamless GSAP loop, a vertical counterpart of the existing horizontal loop helper, registered as an Alpine component named after the file with setup in `init()` and columns reached through refs. The first column scrolls up, the second down (reversed), no pause on hover. Under reduced motion no loop is created and the columns sit still. The wrapper clips overflow and takes its height from the parent (the card at desktop; a fixed height around 60vh on mobile, set by the caller through `class`).

**Contact Column.** Footer text as above, then a row of the email and phone pills with a 10px gap, 30px below the text. Pills use the button component with a new `white-10` colour (white at 10% background, white text, hover to white at 20%), inline icon style, icon before the label: a sharp solid paper-plane for the email, a sharp solid phone for the phone. Values and labels come from the email and tel link fields, so the anchors are `mailto:` and `tel:`.

**Menu Columns.** Each is a labelled `nav` with a list of anchors from the column's links matrix: value, label, target and rel when set. 21px medium, 1.2 leading, tighter tracking, white, on a 44px vertical pitch. Every link carries the `link` class from the link stylesheet for the sweep-in underline. No current-page marking.

**Social Column.** A labelled `nav` of text links in the fixed order Twitter / X, Facebook, LinkedIn, mapped from the SEO handles `twitter`, `facebook`, `linkedin`. Labels are hardcoded per handle; an entry renders only when its URL is set. Same typography and `link` class as the Menu Columns; opens in a new tab with `noopener noreferrer`. The existing icon-based social links component is untouched.

**Footer Columns placement.** Fixed slots by type and order, not flow. The first Contact Column takes grid columns 1 to 4; the first Menu Column starts at column 7 spanning 2; the second starts at column 9 spanning 3; the Social Column takes column 12. A missing block leaves its slot empty. The Footer Columns field instructions in project config are updated to say: one Contact Column and up to two Menu Columns; and the Image Columns field instructions to say: at least three images per column.

**Footer Bottom.** Three-part row. Left: `©`, the current year and the site name, 16px regular white. Centre: the Footer Logos, each rendered through the picture component with no ratio wrapper at its natural size capped at 43px tall (SVGs fall through to their raw URL), alt from the asset title, no links, separated by 1px white-at-30% dividers 20px tall with 40px either side. Right: "Website MadeByShape" linking to the Made by Shape site in a new tab, 16px regular white, a 1px white-at-30% underline 7px below the text that becomes full white on hover.

**Squiggle component.** An inline SVG partial like the logo, `aria-hidden`, filled with `currentColor` so the caller sets the colour (`black-200` in the Footer). Params: `colour`, `class`, and `props` with `scrub` (default 1), `start` (default `top bottom`), `end` (default `bottom bottom`) and `trigger` (an optional CSS selector; default is the Squiggle's own wrapper). The Figma shape is a filled polygon, not a stroke, so it cannot be drawn directly. The SVG holds the exact polygon as a fill, masked by a single hand-derived centreline path with a stroke wide enough to cover the polygon's bars; DrawSVG animates the mask stroke from 0% to 100% so the true shape is revealed along its length, left to right. A ScrollTrigger scrubs that tween between `start` and `end` on the trigger element. Under reduced motion no ScrollTrigger or tween is created and the mask is set to fully drawn. Registered as an Alpine component named after the file, setup in `init()`, the mask path reached through a ref. The Footer passes its own section as the trigger, because the shape overflows the Footer's bottom edge and would never reach its own "bottom bottom".

**Squiggle placement in the Footer.** Absolutely positioned behind the columns: anchored to the right edge, 75% of the Footer's width at every breakpoint, translated down so about 30% of its height is clipped by the Footer's bottom edge (at 1600: 1196 by 647, left edge 403px in, top 128px below the Footer Columns). It stays at every width, scaled with the Footer, never hidden.

**DrawSVG.** The plugin ships with the installed GSAP and is registered next to ScrollTrigger in the JS entry, exposed on `window` like `gsap` and `ScrollTrigger`, so template script blocks can use it.

**Responsive.** Mobile-first. Below `lg` (1024): the Footer CTA stacks Image Columns (fixed height around 60vh, both columns side by side) above the content, card padding reduced; Footer Columns stack in order Contact, Menu, Menu, Social with the project's `md` two-column grid from 768; Footer Bottom stacks copyright, logos, credit, left aligned, with the logo row wrapping if needed. From `lg` the desktop grids above apply. Heading steps down from 9xl to a mobile size in the project scale (5xl at mobile, 7xl at `md`, 9xl at `lg`); footer text from 30px to 2xl at mobile.

**Styleguide.** The Image Columns component, the `white-10` button colour and the `creme-100` user colour and `sm` size gain styleguide entries. The Squiggle is reviewed on the home page rather than the styleguide, since it needs scroll.

**Docs.** `CONTEXT.md` gains the "Global footer" vocabulary (written during the grilling session, ahead of implementation). No ADR: none of the decisions is hard to reverse.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots and recorded behaviour from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single primary seam is the rendered home page through the global layout, which includes the Footer. The home page already has content, so no temporary tall content is needed. The styleguide page is the secondary seam for the new button colour, user colour and Image Columns entries.

**What good evidence looks like.** It shows what a visitor would see: the card and columns matching Figma, tiles in different positions between two captures a second apart, the Squiggle partly drawn at a stated scroll offset, the stacked mobile layout. Fixed widths, one state per file, before and after pairs on the PR.

**Evidence plan.**

1. Home page at 1600, scrolled to the bottom, full Footer: compared against the Figma node for card size, grid alignment, type sizes, column slots, Footer Bottom layout. Proves the desktop layout.
2. Home page at 1600, Footer CTA only, two captures one second apart: tiles in the first column have moved up and in the second column down. Proves the Image Columns loop and directions.
3. Home page at 1600, three captures: Footer top at the viewport bottom (Squiggle not drawn), Footer half in view (Squiggle partly drawn from the left), Footer bottom at the viewport bottom (Squiggle complete). Proves the scrubbed draw-in.
4. Home page at 1600, scroll back up after capture 3: Squiggle partly undrawn. Proves scrub rewinds.
5. Home page at 1600, hover states: a Menu Column link with the underline swept in, a Social Column link likewise, a contact pill at white/20, the Made by Shape credit with the full white underline. Proves the hover treatments.
6. Home page at 390, full Footer: Image Columns above the CTA content, columns stacked in order, Footer Bottom stacked. Proves the mobile layout.
7. Home page at 768, Footer Columns: two-up grid. Proves the `md` rule.
8. Home page at 1600 with reduced motion emulated: two captures a second apart show identical tile positions, and the Squiggle is complete at the Footer's first appearance. Proves the reduced-motion paths.
9. Home page at 1600 with the heading temporarily cleared in the template: no card renders, columns move up. Proves the gate. The temporary switch is removed afterwards.
10. Styleguide page: the Image Columns entry, the `white-10` button and the `creme-100` `sm` user render alongside the existing variants.
11. Rendered HTML of the home page: the Footer is a `footer` landmark, the Menu and Social Columns are labelled `nav` elements, social links carry `target="_blank"` and `rel="noopener noreferrer"`, the Squiggle SVG is `aria-hidden`. Proves the accessibility stories.

## Out of Scope

- Current-page marking (`link--active`) in the Footer.
- Hiding the Footer CTA per page or per entry type. It shows wherever its heading is filled.
- An editable Made by Shape link, or any new CMS fields. The field layout is used as it stands; only field instructions change.
- Column headings in the Menu Columns. Figma has none and the entry types have no title field.
- Icon-style social links, and any change to the existing icon-based social links component.
- Pause on hover for the Image Columns.
- Any Footer variant without the CTA beyond the empty-heading gate. Figma names this node "with CTA"; a designed "without CTA" variant would be new work.
- A dedicated mobile design. The stacking rules follow the decisions above until a mobile node exists.
- Other sections that will reuse Image Columns or the Squiggle. This work builds the components and their first use only.

## Further Notes

- The Figma assets (Squiggle path, Microsoft Advertising Partner and Google Partner SVGs, Ecovadis badge, avatar photo) were downloaded during the grilling session. The logos are editor uploads and already exist in the asset volume; the Squiggle path is committed as the component. The partner SVG exports from Figma include background rectangles that must be stripped.
- The copyright line in Figma reads "Marketing Signals Ltd" and sets the "©" in a second typeface. The decision is the site name alone, in the project font, so the line is `© {year} {site name}`.
- The Squiggle's centreline is derived by hand from the polygon's vertices (the midpoints of each bar's two long edges). The mask stroke can be over-wide with mitre joins; only the polygon fill is ever visible, so precision matters at the ends of the bars, not the middle.
- The second Menu Column in Figma starts at 1099px, about 32px right of grid column 9. Grid alignment wins, per the decision to grid-align rather than copy bespoke offsets.
- The horizontal loop helper scopes its elements with a query selector rather than refs and lacks a `component` line. The vertical helper and the Image Columns component follow the coding standards instead; the marquee is not changed here.
