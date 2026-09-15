# Branding Columns

Spec for the Branding Columns Block: rounded Branding Columns, two across on a desktop and stacked below it, alternating Black and White by position. Each Branding Column holds an Eyebrow with a Rule, a short text, and optionally an image, a row of Icons and a centred Button Group. It is made for the Brand Guidelines page, where its first use shows the site's Rounded Corners beside its Iconography, but any page with Blocks can use it.

Design: Figma node `10071-25088` in the Marketing Signals file, a group named "Group 46400", 1520 by 712 inside the 1600 frame: a Black column (x 40) and a White column (x 810), each 750 by 712. No tablet or mobile node exists; the stacking, the phone padding and the phone icon size below are decisions, not measurements. The design's Icons are Font Awesome glyphs set as text, so there are no SVGs to export; the twelve icon names are in the seed content.

Branch: feature/branding-columns

Related: the Icon Grid spec, whose Icon field and Sharp Duotone Light icon classes this reuses; the Eyebrow Heading Text spec, whose Eyebrow with a Rule and Button Group this follows; the Longform Quote spec, whose `md` padding step this mirrors; the Content Seeding spec, which puts the review content on the Brand Guidelines page. ADR-0001 does not apply: the Block sits in flow beneath the Brand Guidelines Hero. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, new "Branding Columns" section, which gained Branding Columns and Branding Column during the grilling session, and the Icon definition, which was widened to cover a Branding Column's Icons.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Brand Guidelines page exists at `/brand-guidelines` but shows only its Hero: its Blocks field is empty and no Block can draw the design's guideline panels. The design sets the site's visual rules side by side in rounded panels, one Black and one White, each a labelled rule with a short explanation and an example: a photo with the 20px corners, or the set of Font Awesome icons with a link to download the font. Without a Block for it, an editor has no way to publish the guidelines, and a developer would have to hand-build each panel.

## Solution

An editor adds Branding Columns to a page's Blocks and fills in as many Branding Columns as they need. Each one takes an Eyebrow, a short text, an image, a list of Icons named by their Font Awesome names, and up to two Buttons, all optional.

On a desktop the Branding Columns sit two across, half the content width each, with a 20px gap, and the two in a row are the same height. The first is Black, the second White, the third Black, and so on, counting only the Branding Columns that show. Inside each: the Eyebrow over its Rule, the text beneath, then the image at full width with 20px corners, then the Icons four to a row spread across the column, then the Buttons centred. Below the desktop breakpoint the Branding Columns stack, still alternating, with tighter padding and smaller Icons on a phone.

Fields an editor leaves empty leave nothing behind: an empty Branding Column is skipped, and Branding Columns with nothing in any column render nothing at all.

## User Stories

1. As a visitor, I want the brand guidelines laid out in rounded panels, so that each rule reads as its own item.
2. As a visitor, I want the panels to alternate Black and White, so that neighbouring guidelines are easy to tell apart.
3. As a visitor on a desktop, I want two panels side by side, so that I can compare related guidelines at a glance.
4. As a visitor on a desktop, I want the two panels in a row to be the same height, so that the row looks tidy even when one holds less.
5. As a visitor, I want each panel's label underlined by a Rule, so that I can see what the panel is about before reading.
6. As a visitor, I want a short explanation under the label, so that I understand the rule.
7. As a visitor, I want the text in a soft Creme on Black and in Black on White, so that it is readable on both panels.
8. As a visitor, I want an example image shown at its real shape, so that a logo or wide graphic is not cropped.
9. As a visitor, I want the example image at full brightness, so that I see it exactly as the brand intends.
10. As a visitor, I want the example image's corners rounded like the panel's, so that it demonstrates the corner rule it sits under.
11. As a visitor, I want the iconography set shown as a grid of Icons, so that I can see the style the site uses.
12. As a visitor, I want the Icons in the site's Primary Sharp Duotone Light style, so that they match the Icons elsewhere on the site.
13. As a visitor, I want the Icons four to a row, spread evenly, so that the set reads as a neat grid.
14. As a visitor, I want a centred button beneath the Icons, so that I can download the icon font the guideline names.
15. As a visitor, I want a second button, when there is one, in an outline style that suits the panel's colour, so that the primary action stays clear.
16. As a visitor with a phone, I want the panels stacked one above the other, so that each is wide enough to read.
17. As a visitor with a phone, I want stacked panels to keep alternating Black and White, so that I can still tell them apart.
18. As a visitor with a phone, I want tighter padding and slightly smaller Icons, so that four Icons still fit a row.
19. As a visitor on a tablet, I want the panels stacked with the tablet's padding, so that four Icons are not squeezed into a narrow half-width panel.
20. As a visitor, I want an odd last panel to stay half width on the left, so that every panel on a desktop is the same width.
21. As a screen reader user, I want each panel's label announced as a heading, so that I can jump between guidelines.
22. As a screen reader user, I want the Icons skipped, so that I am not read a list of glyph names the text already describes.
23. As a keyboard user, I want the buttons to show the site's usual focus ring, so that I can see where I am.
24. As an editor, I want to add as many Branding Columns as I need, so that one Block can hold a whole set of guidelines.
25. As an editor, I want every field in a Branding Column optional, so that a panel can be text only, an image, or an icon set.
26. As an editor, I want to add both an image and Icons to one Branding Column, so that I can show more than one example, in a fixed order.
27. As an editor, I want the panel colour set by its position, so that I never have to pick colours to keep the pattern.
28. As an editor, I want an empty Branding Column skipped without breaking the alternation, so that a half-built panel never leaves two Blacks together.
29. As an editor, I want an Icon named by its Font Awesome name, or by a pasted class string, so that I can copy it straight from the Font Awesome site.
30. As an editor, I want a blank Icon skipped, so that a stray empty row leaves no gap in the grid.
31. As an editor, I want to add up to two Buttons to a Branding Column, as elsewhere on the site, so that the Button Group behaves the same everywhere.
32. As an editor, I want the text to allow links and the Highlight, so that I can point to a resource or mark a key phrase.
33. As an editor, I want the usual Padding setting on the Block, so that guideline Blocks can sit close together on the page.
34. As an editor, I want Branding Columns available on any page with Blocks, so that I can reuse it beyond the Brand Guidelines page.
35. As a developer, I want the Eyebrow, rich text, picture and Button Group components reused, so that no second version of their markup exists.
36. As a developer, I want the Icon field and icon classes the Icon Card uses, so that Icons are defined one way.
37. As a developer, I want the Creme 400 options added alongside the existing ones, so that no existing caller changes.
38. As a developer, I want no JavaScript for Branding Columns, so that the Block stays static.
39. As a reviewer, I want the Brand Guidelines page compared against the Figma node at 1600, so that I can check the panels' measurements.

## Implementation Decisions

**Block.** A new entry type, Branding Columns (`brandingColumns`), added to the shared Blocks field, so it is available to every page with Blocks, the Brand Guidelines page included. It follows the house Block layout in the control panel and carries the usual Padding setting, read the same way as the other Blocks. It has no Section Header and no Section Footer: no heading, text or buttons above or beneath the columns. Its Section Content is one field:

- `columns`: a new Matrix field, Columns, "New Branding Column" as its create label, no minimum or maximum, holding one entry type.

**Branding Column entry type** (`brandingColumn`), all fields optional, reusing existing fields:

- `eyebrow`: the existing Eyebrow plain text field.
- `text`: the existing Rich Text - Simple field, labelled Text.
- `image`: the existing Image field, the first asset used.
- `icons`: a new Matrix field, Icons, "New Icon" as its create label, holding one entry type.
- `buttonGroup`: the existing Button Group field, at most two Buttons.

**Branding Icon entry type** (`brandingIcon`): one field, `icon`, the existing Text field labelled Icon, as on the Icon Card. There is no Icon Type and no image option: an Icon here is always a Font Awesome name.

**Visibility.**

- A Branding Column shows when it has an Eyebrow, text (once tags and whitespace are stripped), an image, at least one non-blank Icon, or at least one Button.
- Columns that do not show are dropped before colour is assigned.
- When no Branding Column shows, the Block renders nothing, section included.
- Inside a Branding Column, each part renders only when filled, and the gaps belong to the parts that are present, so a missing part leaves no space.

**Colour by position.** Among the Branding Columns that show, odd positions are Black and even positions are White. There is no editor setting.

| Part                  | Black column                | White column                   |
| --------------------- | --------------------------- | ------------------------------ |
| Panel                 | `bg-black`                  | `bg-white`                     |
| Eyebrow               | white                       | black                          |
| Rule                  | `white-30`                  | `creme-400` (new)              |
| Text                  | `creme-400` (new)           | `black`                        |
| Icons                 | Primary                     | Primary                        |
| First Button          | `secondary`                 | `secondary`                    |
| Second Button         | `white-30-outline`          | `creme-300-outline`            |

**Grid.**

- The 12-column grid with `gap-5`. Each Branding Column spans all 12 below `lg` and 6 from `lg`, so they stack below `lg` and sit two across from it.
- An odd last Branding Column keeps its 6-column span on the left.
- Branding Columns in one row stretch to the same height; their content sits at the top.
- The Block adds nothing to the site margins; the section component supplies them.

**Branding Column.**

- 20px rounded corners.
- Padding 40px from `md`, 30px below.
- A flex column; the Buttons are centred on the row, everything else is left-aligned.

**Eyebrow.**

- The Eyebrow component with its Rule, in the colours above.
- Rendered as an `h2`, styled exactly as the Eyebrow: 16px Medium at 1.33 leading. Either the component gains a tag option or the Block wraps it; existing callers keep their `div`.
- Gap from the Rule to the text: 30px from `md`, 20px below.

**Text.** The rich text component at the `sm` size (15px Regular at 1.33), in the colours above. The new `creme-400` colour takes Creme 400 paragraphs, headings and list text, with Secondary links, markers and Highlight, following the `creme-100` option.

**Image.**

- The picture component at full column width, at the image's own ratio, never cropped.
- 20px rounded corners, full opacity: Figma's 90% over black is not reproduced.
- Alt from the asset's alt text.
- Gap from the part above: 40px from `md`, 30px below.

**Icons.**

- A four-column grid across the full width of the Branding Column, each Icon centred in its cell so the outer Icons meet the edges as in Figma, at every width.
- Each Icon uses the Icon Card's classes: Sharp Duotone Light, Primary, secondary layer at 20% opacity.
- Size: 50px from `md`, 40px below.
- Row gap: 60px from `md`, 40px below.
- The name is read as the Icon Card reads it: the last word of the value, with any `fa-` prefix dropped. A blank value is skipped.
- `aria-hidden="true"` on every Icon.
- Gap from the part above: 60px from `md`, 40px below.

**Buttons.**

- The Button Group component, centred, at the base size with its inline arrow icon, in the colours above.
- Gap from the part above: 60px from `md`, 40px below.

**Component changes.**

- The Eyebrow component gains a `creme-400` Rule colour, and whatever it needs to render an `h2`.
- The rich text component gains a `creme-400` colour.
- Existing options and callers are untouched.

**Content.** A Seed targets `brand-guidelines` with one Branding Columns Block and two Branding Columns:

1. Eyebrow "Rounded Corners", text "A border radius of 20px is used on most background areas and boxes.", and the photo exported from `9716:10988`.
2. Eyebrow "Iconography", text "‘Font Awesome 7 Sharp Duotone’ Icons are used across the website to visually represent different values. These icons always appear in shades of blue over a white, or light blue background.", twelve Icons, and one Button, "Download Font Awesome 7 Sharp", linking to `https://fontawesome.com/download` in a new tab.

The Icons are, in rows: `bullseye-arrow`, `arrows-down-to-people`, `file-magnifying-glass`, `user-magnifying-glass`; `trophy`, `hearts`, `display-chart-up`, `lightbulb-on`; `file-pen`, `circle-star`, `shield-check`, `circle-user-circle-check`.

**Docs.** During the grilling session, `CONTEXT.md` gained a "Branding Columns" section with Branding Columns and Branding Column, and the Icon definition was widened to cover a Branding Column's Icons. No ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML where the behaviour is not visual.

**Seams.**

- **One seam.** The rendered Brand Guidelines page (`/brand-guidelines`), with the Branding Columns the Seed adds.
- **Edge cases.** An empty Branding Column, an odd third column, a column holding both an image and Icons, a pasted Icon class string and a second Button are proven by temporarily adding them, then restoring the seeded content. They are checked on the site and reported, not captured, unless a line below says otherwise.
- **Nothing committed to the styleguide.**

**What good evidence looks like.** It shows what a visitor would see: two rounded panels, Black then White, with the Rule, text, photo, Icon grid and centred Button placed as in Figma; the stacked, still-alternating panels on a phone; and nothing changed on pages that already use the Eyebrow and rich text components. Before is `main` at the commit the branch forked from, where the Brand Guidelines page shows only its Hero.

**Evidence plan.**

1. The Seed's dry run and first run: one Branding Columns Block with two Branding Columns created, the photo uploaded. Saved as text. Proves the content path.
2. Brand Guidelines at 1600, full page, scrolled to the Block: two 750px panels 20px apart with 20px corners, Black then White, the same height; 40px padding; Eyebrows with their Rules (white at 30% on Black, Creme 400 on White); text in Creme 400 and Black; the photo at full width with 20px corners and full opacity; twelve Primary Icons four to a row at 50px with rows 60px apart; the Button centred beneath. Compared against `10071-25088`. Proves the desktop layout and colours.
3. Brand Guidelines at 390, full page, scrolled to the Block: the panels stacked, Black then White, 30px padding, Icons at 40px still four to a row, the Button centred. Proves the phone layout.
4. Brand Guidelines at 768, full page, scrolled to the Block: the panels stacked with the `md` padding, Icon size and gaps. Proves the `md` step and the stacking below `lg`.
5. The Button at 1600 hovered and keyboard-focused. Proves the Button Group's states carry over.
6. Served HTML of the Brand Guidelines page: each Eyebrow in an `h2`, every Icon `aria-hidden="true"`, the image with alt, no inline styles, no `script` added for the Block. Proves the markup.
7. A third Branding Column temporarily added: Black, half width on the left under the first at 1600. Removed afterwards. Captured at 1600. Proves the odd column and the colour count.
8. An empty Branding Column temporarily added between the two: skipped, the others still Black then White. Removed afterwards. Proves the alternation counts shown columns.
9. Every Branding Column temporarily emptied: no section and no gap on the page. Restored afterwards. Proves the empty rule.
10. An Icon temporarily set to `fa-sharp-duotone fa-light fa-trophy` and another left blank: the trophy renders, the blank leaves no cell. Restored afterwards. Proves the Icon name reading.
11. An existing Eyebrow and rich text caller, such as the Eyebrow Heading Text on the Home page, unchanged from before. Proves the new options touch no other caller.

## Out of Scope

- A heading, text or buttons above or beneath the columns.
- An editor colour setting per Branding Column or per Block, and colours other than Black and White.
- An Icon Type or uploaded images as Icons.
- Cropping the image to a fixed ratio, or reproducing Figma's 90% image opacity.
- Other Brand Guidelines Blocks, such as colour swatches or typography specimens.
- Restricting Branding Columns to the Brand Guidelines page.
- A dedicated tablet or mobile design. The responsive rules follow the decisions above until those nodes exist.
- A committed styleguide preview.
- Animation of any kind.

## Further Notes

- Figma trims text boxes to cap height, so its gaps measure from cap top to baseline. The Eyebrow's Rule box is 31px tall under an 11px cap, which is the Eyebrow component's own padding and leading once the trim is undone; the 30px, 40px and 60px gaps above are Figma's cap-to-cap gaps rounded to the spacing scale, and may land a few pixels differently once leading is counted.
- The White column's content ends 80px above its bottom edge: it is stretched to the Black column's height, not padded.
- The node's Icon glyphs are at slightly different x positions (857, 1066, 1270, 1460 by left edge) because the glyphs differ in width; centred in four equal cells they read the same.
- The node's styles are Black `#0E0A10`, White `#FFFFFF`, Creme 400 `#D3D0C5`, Primary `#745CF6`, Secondary `#AFAFFF`, "body | med" 16px Medium at 1.33 and "sm | reg" 15px Regular at 1.33. These are the `black`, `white`, `creme-400`, `primary` and `secondary` tokens and the `text-base` and `text-sm` sizes.
- The Brand Guidelines page is a Page of the Brand Guidelines entry type, not a Blog, and renders its Hero then the shared Blocks field.
