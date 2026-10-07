# Brand Styles

Spec for Brand Styles: a Block of two white panels, the Colour Palette over the Type Specimen, with an optional centred Button Group beneath them. The Colour Palette is a heading and a short text over the brand's seven Swatches. The Type Specimen is a heading over a Rule and three Specimen Rows showing Noi Grotesk in use, the last of them a row of editor-set Buttons. The Swatches and the specimen copy are fixed in the template; editors set the headings, the text and the Buttons. It is built for the Brand Guidelines page and offered in the Blocks field on any page.

Design: Figma node `10071-25087` in the Marketing Signals file (https://www.figma.com/design/c5NOnvrD7suDEyvE1vlbAU/Marketing-Signals?node-id=10071-25087), a group named "Group 46399", 1520 by 1588 inside a 1600 frame at x 40, y 5469. It is the last Block on the page, beneath Brand Values (`10071-25085`) and Eyebrow Image Grid. No tablet or mobile node exists; the responsive rules below are decisions, not measurements.

Branch: feature/brand-styles

Related: the Brand Values spec, whose full-width rounded panels, 20px gap and 30px/40px panel padding this follows. The Eyebrow Heading Text spec, whose Heading, Text and Button Group handling this reuses. ADR-0002: content is added by Seed, never through the control panel. ADR-0001 does not apply: the Block sits in flow beneath the page's hero. Vocabulary: `CONTEXT.md`, the new "Brand Styles" section (Brand Styles, Colour Palette, Swatch, Type Specimen, Specimen Row). The grilling session also widened Button Group, whose arrow style can now follow position like its colours. The name Brand Styles was chosen over "Branding" so it can't be confused with the separate Branding Columns Block.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Brand Guidelines page has no way to show the brand's colours or its typography. The design ends the page with a panel of colour swatches labelled with their hex values and a panel showing each Noi Grotesk weight in use, with the real button styles and a font download beneath. No existing Block has this shape, and the content is the design system itself, so there is nothing for an editor to type in beyond the headings, the intro text and the buttons.

## Solution

An editor adds a Brand Styles Block to the page and fills in its headings, text and buttons.

- **Colour Palette.** A white panel with a heading, whose second line is Highlighted in Primary, beside a short text. Beneath them sit the seven Swatches: Black and Creme 100 as large blocks, Creme 200 and White as narrow blocks, and Primary, Secondary and Fluro as a stack of three bars. Each shows its hex value in its bottom corner.
- **Type Specimen.** A second white panel with a heading over a Rule, then the Specimen Rows. Each row has a label naming the use and its weight, beside a sample: a very large two-line header, a sub header beside body copy, and the editor's Buttons in both of the site's button styles.
- **Button Group.** Optional Buttons centred beneath both panels, such as a font download.

The Swatches and the specimen copy never change. An empty heading or text leaves no gap, and an empty Buttons row disappears with its label. On smaller screens the text stacks under its heading, the Swatches rearrange into two columns, and each label sits above its sample.

## User Stories

1. As a visitor to the Brand Guidelines page, I want to see every brand colour as a large block, so that I get a true sense of each one.
2. As a visitor, I want each colour's hex value written on it, so that I can copy it into my own work.
3. As a visitor, I want the hex value legible on every colour, so that I can read it on Black and Primary as well as the light colours.
4. As a visitor, I want the White swatch outlined, so that it doesn't vanish into its white panel.
5. As a visitor, I want the core colours larger than the accent colours, so that the palette shows which colours dominate.
6. As a visitor, I want a short explanation beside the palette heading, so that I know how the colours should be used.
7. As a visitor, I want to see the header, sub header, body and button type at their real sizes, so that I know how each weight looks in use.
8. As a visitor, I want each specimen labelled with its use and its Noi Grotesk weight, so that I know which font file to pick.
9. As a visitor, I want the two real button styles shown, so that I can match them in my own materials.
10. As a visitor, I want the buttons in the specimen to be real links, so that I can download the logo files or get in touch from there.
11. As a visitor, I want a font download button beneath the panels, so that I can get the typeface in one click.
12. As a visitor, I want the headings' second lines in Primary, so that they match the rest of the site.
13. As a visitor on a phone, I want the Swatches in two columns with the core colours full width, so that no Swatch is too narrow to read.
14. As a visitor on a phone, I want each label above its sample and the samples scaled down, so that the header sample doesn't overflow the screen.
15. As a visitor on a tablet, I want the header sample at an intermediate size, so that it fills the panel without breaking mid-word.
16. As a screen reader user, I want the two panel headings as real headings, so that I can jump to the colours or the type.
17. As a screen reader user, I want the specimen samples read as plain text, not headings, so that the page outline isn't cluttered with demo copy.
18. As a screen reader user, I want the Swatches read as a list of hex values, so that I hear the palette without hearing empty boxes.
19. As a keyboard user, I want the specimen and footer Buttons to show the site's usual focus ring, so that I can see where I am.
20. As an editor, I want to write the palette heading and mark words italic to Highlight them, so that it works like every other heading.
21. As an editor, I want to write the palette text in the simple rich text field, so that I can add a link or emphasis if needed.
22. As an editor, I want to write the typography heading the same way, so that both panels feel consistent.
23. As an editor, I want to set up to two Buttons for the Buttons row, so that the specimen links somewhere useful.
24. As an editor, I want the first Button shown as a Secondary pill with an inline arrow and the second as a Creme 100 pill with a circled arrow, so that the row always shows both styles without my choosing.
25. As an editor, I want to set up to two Buttons beneath the panels, so that I can offer downloads.
26. As an editor, I want the footer Buttons coloured Secondary then White, so that neither disappears on the Creme page.
27. As an editor, I want the colours and specimen text fixed in the template, so that nobody can accidentally misstate the brand.
28. As an editor, I want to leave the palette heading or text empty and have the panel still look finished, so that I can use only what I need.
29. As an editor, I want leaving the Buttons row empty to remove the row and its label, so that no label sits beside nothing.
30. As an editor, I want to set the Block's padding like any other Block, so that it sits well with its neighbours.
31. As an editor, I want to add the Block to any page, so that the styles can appear outside Brand Guidelines.
32. As an editor, I want the fields grouped under Section Header, Section Content and Section Footer, so that the Block reads like every other Block.
33. As a developer, I want the Swatch colours drawn from the theme tokens, so that no hex value is written into a class.
34. As a developer, I want the Button Group component to take a style per position, so that one row can mix inline and circled arrows without a second component.
35. As a developer, I want existing Button Group callers unchanged, so that nothing else on the site moves.
36. As a developer, I want the new fields to be instances of existing global fields, so that the schema stays small.
37. As a developer, I want no JavaScript in the Block, so that it stays static.
38. As a reviewer, I want the seeded Brand Guidelines page compared against the Figma node at 1600, so that I can check the measurements.

## Implementation Decisions

**Entry type.** A new Block entry type, Brand Styles (`brandStyles`), added to the Blocks field. Build it with the `craft-block` and `craft-frontend` skills. No new global fields.

- **Content tab:**
  - **Section Header:**
    - `heading`: the existing Heading field (CKEditor with italic for the Highlight), instructions "Make words italic to highlight them."
    - `text`: the existing Rich Text - Simple field, labelled "Text", as Eyebrow Heading Text uses it.
  - **Section Content:**
    - `typographyHeading`: an instance of the Heading field, labelled "Typography Heading", with the same instructions.
    - `typographyButtons`: an instance of the Button Group field (up to two Buttons), labelled "Typography Buttons".
  - **Section Footer:**
    - `buttonGroup`: the existing Button Group field (up to two Buttons).
- **Settings tab:** `padding`, the standard Padding field.

**Button Group component.** It gains an optional `iconStyles` list, read by position exactly as `colours` is: each Button takes the style at its index, and the last style repeats. Without `iconStyles`, every Button takes `iconStyle` as today, so existing callers are untouched.

**Fixed content.** The Swatches and Specimen Rows are fixed in the template, not fields. The copy is word for word from the node, lorem ipsum included.

- **Swatches**, in order, as token · label · label colour:
  1. `black` · #0E0A10 · white
  2. `creme-100` · #F3F0E8 · black
  3. `creme-200` · #E9E6DE · black
  4. `white` · #FFFFFF · black, with a 1px black border
  5. `primary` · #745CF6 · white
  6. `secondary` · #AFAFFF · black
  7. `fluro` · #DBFE87 · black
- **Specimen Rows.** Each label is two lines: the use in Medium over the weight in Regular.
  1. **Headers**, "Noi Grotesk Semi Bold": "Performance Driven" / "Digital Marketing", two lines.
  2. **Sub Headers**, "Noi Grotesk Medium": "Built Around Search. Measured on Revenue." Beside it, **Body Copy**, "Noi Grotesk Regular": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
  3. **Buttons**, "Noi Grotesk Medium": the Typography Buttons.

**Visibility.**
- **The Block:** always renders, because its Swatches and Specimen Rows are fixed.
- **Palette heading and Text:** each renders only with content once tags and whitespace are stripped. With neither, the Swatches move up to the panel's top padding. With only one, it keeps its own column.
- **Typography Heading:** renders only with content. Without it, the Rule stays at the top of the panel.
- **Buttons row:** renders only with at least one Typography Button. Without any, the whole row, label included, is gone, and the panel's bottom padding follows the Sub Headers row.
- **Footer Button Group:** renders only with at least one Button. Without any, nothing follows the panels.

**Layout.** The Block embeds the section component with `paddingY` from the Padding field and the default site margins. Inside, the two panels stack in one column, each running the full content width (1520 at 1600), 20px apart. Each panel is white with 20px corners and 40px side padding from `md`, 30px below.

**Colour Palette** (measurements at 1600; vertical gaps are cap-trimmed, see Further Notes):
- **Panel:** 708px tall in the design, sized by its content: about 84px from the panel top to the heading's caps, and 76px below the Swatches.
- **Header row from `lg`:** a 12-column grid with a 20px gap.
  - **Heading:** H2 in columns 1 to 7, 62px (`7xl`) Semibold, 0.97 leading, tighter tracking, black, with the Highlight in Primary. It is two lines in the seed.
  - **Text:** columns 9 to 12 (467px), aligned to the bottom of the heading. Rendered through the rich text component at `sm` (15px, 1.33), in Medium to match the node.
- **Swatches from `lg`:** 50px below the header row, a 12-column grid with a 20px gap, 397px tall.
  - Black in columns 1 to 3.
  - Creme 100 in columns 4 to 6.
  - Creme 200 and White share columns 7 to 9, split into two equal Swatches with a 20px gap (163 and 162 in the design).
  - Primary, Secondary and Fluro stack in columns 10 to 12 as three equal bars with a 20px gap (119px each).
  - Every Swatch has 20px corners.
- **Hex label:** 16px (`base`) Medium, 1.33, 20px in from the Swatch's left and bottom edges, uppercase as listed.
- **Below `lg`:** the Text stacks under the heading, 30px beneath it, and the heading steps down to `5xl`. The Swatches become a two-column grid with a 20px gap, 40px below the header. Black takes a full row, then Creme 100 a full row, each about 200px tall. Creme 200 and White share a row at about 200px, then Primary, Secondary and Fluro take full rows at 119px.

**Type Specimen** (measurements at 1600):
- **Panel:** 788px tall in the design, sized by its content: about 80px from the panel top to the heading's caps, and 100px below the last row.
- **Heading:** H2 with the same treatment as the palette heading, full width.
- **Rule:** a 1px Creme 300 line across the panel's inner width, 30px below the heading.
- **Rows from `lg`:** a 12-column grid with a 20px gap. The first row starts 60px below the Rule, the second 70px below the first, the third 80px below the second.
  - **Labels:** columns 1 to 2, 16px, 1.33, black.
  - **Headers sample:** a `p` from column 3, 92px (`11xl`) Semibold, 0.97 leading, tighter tracking, black, two lines.
  - **Sub Headers sample:** a `p` in columns 3 to 6, 40px (`4xl`) Medium, 1.2 leading, tighter tracking.
  - **Body Copy:** its label in columns 7 to 8 and its sample in columns 9 to 12, a `p` at 16px Regular, 1.33.
  - **Buttons:** from column 3, the Button Group component with colours Secondary then Creme 100 and icon styles inline then circle.
- **Below `lg`:** each label sits above its sample, 15px apart, and rows are 40px apart. Sub Headers and Body Copy become two rows. The Headers sample is `5xl` on a phone, `8xl` from `md` and `11xl` from `xl`. The Sub Headers sample steps down to `2xl`, then `4xl` from `lg`. The heading steps down to `5xl`.

**Footer Button Group:** 30px below the Type Specimen, centred, through the Button Group component with colours Secondary then White and inline arrows.

**Markup.**
- **Headings:** go through the heading and rich text components. The two panel headings are the Block's only headings; every sample is a `p`.
- **Swatches:** a `ul` of `li`. The colour block is plain decoration; the hex value is its text.
- **Specimen Rows:** plain elements; labels are text, not headings.
- **Styles and scripts:** no inline styles, no `{% css %}`, no JavaScript. Every colour uses its theme token.

**Content.** A Seed in `.scratch/seeds/brand-styles/` adds one Brand Styles Block to the `brand-guidelines` entry with `after: "eyebrowImageGrid"` and padding Top and Bottom. If no Eyebrow Image Grid exists yet, the Seed command appends the Block and says so. There are no images.

- **Heading:** "Primary" then a line break, then "*Colour palette*" in italic as the Highlight.
- **Text:** "These are the core colours that represent the brand's identity." then a line break, then "They should dominate most visual materials and be used consistently across all major touch points."
- **Typography Heading:** "Typography" then a line break, then "*in use*" in italic.
- **Typography Buttons**, each a Button entry whose `button` link has the given label and target:
  1. "Download Logo Files": a `url` link to `#`, a placeholder.
  2. "Get In Touch": an `entry` link to `contact`.
- **Button Group:**
  1. "Download Noi Grotesk Font Family": a `url` link to `#`, a placeholder.

**Docs.** During the grilling session, `CONTEXT.md` gained the Brand Styles section and the widened Button Group definition. No ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per `docs/agents/evidence.md` and compared against the Figma node at the same width, plus served HTML where the behaviour isn't visual.

**Seams.**

- **One seam:** the rendered Brand Guidelines page, `https://marketing-signals.ddev.site:8443/brand-guidelines`, with the Block added by the Seed. In a worktree, use that worktree's own URL.
- **Empty-field cases:** proven by a second, throwaway Seed of a Brand Styles Block with every field empty on the same page, removed afterwards. Checked and reported, not all captured.
- **Styleguide:** nothing committed to it.

**What good evidence looks like.** It shows what a visitor would see:
- the two white panels on the Creme page
- the seven Swatches in their set-out with legible hex values
- the header, sub header and body specimens at their real sizes
- the two button styles side by side, and the centred download button
- the stacked layouts on narrow screens

**Evidence plan.** Three widths, resting state: desktop 1600, tablet 768, mobile 390. Everything else is checked in the browser and reported, not captured.

1. Brand Guidelines at 1600, full page. Compare with `10071-25087`:
   - **Colour Palette:** a 1520 white panel, "Primary / Colour palette" with the second line in Primary, the text in columns 9 to 12. Beneath them, the Swatches as Black and Creme 100 at 345 wide, Creme 200 and White at about 163, and three 119px bars, all 397 tall, with hex values 20px from their corners.
   - **Type Specimen:** a second panel 20px below, "Typography / in use" over a Creme 300 Rule. The 92px "Performance Driven / Digital Marketing", the sub header beside the body copy, and a Secondary inline-arrow pill beside a Creme 100 circle-arrow pill.
   - **Footer:** "Download Noi Grotesk Font Family" centred 30px below.

   Proves the desktop Block.
2. Brand Guidelines at 768, full page. Proves the `md` panel padding, the two-column Swatches, the labels above their samples, and the Headers sample at `8xl` without overflow.
3. Brand Guidelines at 390, full page. Proves the phone layout: 30px panel padding, full-width core Swatches, the Headers sample at `5xl`, and the Buttons wrapping cleanly.

**Checked in the browser and reported.**

- At 1024: the `lg` step, with the Swatches in one row and the Specimen Rows side by side.
- Hover and focus on the specimen and footer Buttons: the site's usual hover and focus ring, the circled arrow animating on the second specimen Button.
- Markup: one `section`; exactly two `h2`s; every sample a `p`; the Swatches a `ul`; no inline styles and no `script` added for the Block.
- Visibility, with a throwaway Seed removed afterwards: with every field empty, the Swatches sit at the panel's top padding, the Rule leads the Type Specimen, the Buttons row and its label are gone, and nothing follows the panels.
- Existing Button Group callers unchanged: Eyebrow Heading Text, Hero Simple and the Error Page render their Buttons as before.

## Out of Scope

- Motion of any kind: no reveal, no copy-to-clipboard on Swatches, no hover on Swatches.
- Editor control over the Swatches, their colours or labels, or the specimen copy.
- Real logo and font download files. The two download Buttons are seeded with `#` until the client supplies the assets; linking the Noi Grotesk files in the repo is not done, since the design names the Trial font and its licence may not allow redistribution.
- Colour or style choices for editors on either Button Group: both follow position.
- A logo section or any other Brand Guidelines content.
- A dedicated mobile or tablet design. The responsive rules follow the decisions above until nodes exist.
- A committed styleguide preview.

## Further Notes

- **Cap-height trimming.** Figma trims text boxes to cap height, so every vertical gap above is measured from caps. "About" means the site's line boxes will land a few pixels differently; match the rendered page to the node at 1600 rather than to the raw numbers.
- **Off-grid positions.** The node places the Headers, Sub Headers and Buttons samples at x 291 and the Body Copy sample at x 983. On the 12-column grid those are column 3 (x 323) and column 9 (x 1053). This spec aligns them to the grid, and the Body Copy sample becomes 467 wide instead of 537. Flag a visible mismatch at 1600 on the review rather than hand-placing offsets.
- **Rule under a heading.** The glossary's Rule underlines an Eyebrow; here the same 1px line underlines the Type Specimen's heading. It is drawn as part of the Block, not through the Eyebrow component.
- **Button arrow.** The node's `arrow-up-right` is the Button component's default icon, so neither Button Group needs an icon override. The circled style's circle on Creme 100 is Secondary, which the Button component already draws.
- **Styles in the node:**
  - Colours: Black `#0E0A10`, White, Creme 100 `#F3F0E8`, Creme 200 `#E9E6DE`, Creme 300 `#DDDAD1`, Secondary `#AFAFFF`, and the Primary `#745CF6` and Fluro `#DBFE87` Swatches, which have no style of their own in the node but match the theme tokens.
  - Type: "11xl" 92px Semibold at 0.97; "7xl" 62px Semibold at 0.97; "4xl" 40px Medium at 1.2; "body | med" 16px Medium; "body" 16px Regular; "sm | med" 15px Medium. All at 1.33 unless stated; the headings use -4% tracking.
- **Follow-ups.** Replace the two `#` download links with asset links once the client provides a logo pack and a licensed font package.
