# Brand Values

Spec for Brand Values: a Block of up to three parts, stacked with a 20px gap. The first is the Brand Banner, a black panel with an Eyebrow, a large heading and a Cutout. The second is a row of up to two List Cards, each an Eyebrow with a Rule over its List Items. The third is the List Panel, a Creme 200 panel with a photograph beside headings over alternating Ticked and Crossed lists. It is built for the Brand Guidelines page and offered in the Blocks field on any page.

Design: Figma node `10071-25085` in the Marketing Signals file (https://www.figma.com/design/c5NOnvrD7suDEyvE1vlbAU/Marketing-Signals?node-id=10071-25085), a group named "Group 46397", 1520 by 2002 inside a 1600 frame at x 40. No tablet or mobile node exists; the responsive rules below are decisions, not measurements.

Branch: feature/brand-values

Related: the Banner CTA spec, whose Cutout placement and responsive steps the Brand Banner follows. The Icon Grid spec, whose Icon (Font Awesome Sharp Duotone Light in Primary) a List Item reuses. The Content Row and Audit CTA specs, whose Ticked Items the List Panel extends with new colours. ADR-0002: content is added by Seed, never through the control panel. Vocabulary: `CONTEXT.md`, the new "Brand Values" section (Brand Values, Brand Banner, List Card, List Item, List Panel, Crossed Item). The grilling session also widened Ticked Item, whose circle colour now follows where it sits, and Card Scheme, which gained the List Card's white-then-Fluro order.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Brand Guidelines page holds a Hero Simple and nothing else. The design gives the page its substance: the agency's mission in a black banner beside a photo of a team member, their values and tone of voice as two cards of short headed rows, and a panel setting out what the brand is and is not beside an office photograph. No existing Block has this shape. The closest ones, Banner CTA, Icon Grid and Content Rows, each carry parts that don't fit: a button, centred cards, accordions. An editor has no way to build this page.

## Solution

An editor adds a Brand Values Block to the page and fills whichever parts they need.

- **Brand Banner.** A black panel across the content width with rounded corners holds the Eyebrow and a 70px heading in Creme 100 with its Highlight in Fluro. Beside them, the Cutout stands on the panel's bottom edge and rises above its top.
- **List Cards.** Up to two cards sit side by side, the first white and the second Fluro. Each has an Eyebrow with a Rule over rows of List Items. Each row shows a primary-coloured Icon, or a black tick circle when the row has no Icon, beside a heading and a short text.
- **List Panel.** A Creme 200 panel shows the photograph on the left, inset 10px. On the right, each heading sits over a bullet list. The lists alternate: the first shows Ticked Items in Primary, the next Crossed Items in red, and so on. Each heading's Highlight takes the colour of the list after it. A list of more than four items splits into two columns.

Any part left empty is not shown, and the gaps close around it. On smaller screens every part stacks: the Cutout above the banner content, the cards one above the other, and the photograph above the lists.

## User Stories

1. As a visitor to the Brand Guidelines page, I want to read the agency's mission in a bold banner, so that I understand its purpose before the detail.
2. As a visitor, I want the mission heading's key words in Fluro, so that the part that matters stands out.
3. As a visitor, I want the photo of a team member standing on the banner and rising above it, so that the page feels like it is about people.
4. As a visitor, I want the agency's values listed as short headed rows with an icon each, so that I can scan them quickly.
5. As a visitor, I want the tone of voice beside the values in a differently coloured card, so that I can tell the two lists apart at a glance.
6. As a visitor, I want each tone of voice row marked with a tick, so that it reads as a principle to follow.
7. As a visitor, I want the values' descriptions slightly muted beneath their headings, so that the headings lead.
8. As a visitor, I want to see what the brand is as a ticked list, so that I know how it should come across.
9. As a visitor, I want to see what the brand is not as a crossed list in red, so that the contrast with the ticked list is obvious.
10. As a visitor, I want each list's heading highlight to match its list's colour, so that the heading and list read as one.
11. As a visitor, I want a long list split into two columns, so that it doesn't run far down beside the photograph.
12. As a visitor, I want an office photograph beside the lists, so that the panel has a sense of place.
13. As a visitor on a phone, I want every part stacked in one column with the photo above its content, so that nothing is squeezed.
14. As a visitor on a phone, I want the Cutout still rising above the banner, so that the banner keeps its character.
15. As a visitor on a tablet, I want the List Cards stacked until there is room for both, so that their text doesn't wrap into narrow lines.
16. As a screen reader user, I want the banner heading, the List Item headings and the List Panel headings as real headings, so that I can move through the Block by heading.
17. As a screen reader user, I want the Cutout, Icons, tick circles and crosses skipped, so that I hear only the words.
18. As a screen reader user, I want a Crossed Item still announced as a normal list item, so that the list reads naturally, with its heading ("What We Aren't") carrying the meaning.
19. As a screen reader user, I want the office photograph described by its title, so that I know what it shows.
20. As an editor, I want to fill in an Eyebrow, a heading and an image for the banner, so that I can set out the mission.
21. As an editor, I want to mark words in the banner heading italic and have them show in Fluro, so that highlighting works the same as elsewhere on the site.
22. As an editor, I want to add one or two List Cards, each with its own Eyebrow and List Items, so that I can set out values, tone of voice or any other pair of lists.
23. As an editor, I want the card colours to follow their order, so that I never have to pick a colour.
24. As an editor, I want to type a Font Awesome name for a List Item's Icon, so that I can choose from the whole icon set without uploading anything.
25. As an editor, I want to leave the Icon empty and get a tick circle, so that a list of principles needs no icons.
26. As an editor, I want to write the List Panel's headings and lists in one rich text field, so that I can edit them together like a document.
27. As an editor, I want the second list to turn into red crosses automatically, so that I don't need a setting to show what the brand is not.
28. As an editor, I want to set the Block's padding like any other Block, so that it sits well with its neighbours.
29. As an editor, I want to leave out the banner, the cards or the panel and have the Block still look finished, so that I can use only the parts I need.
30. As an editor, I want a List Item with no heading left out, so that a half-filled row never shows.
31. As an editor, I want a single List Card to keep its half width, so that the layout doesn't jump when I add the second.
32. As an editor, I want to add the Block to any page, so that the same parts work outside Brand Guidelines.
33. As a developer, I want the Cutout built like the Banner CTA's, so that there is one way to stand a person on a panel.
34. As a developer, I want the List Item Icon drawn like the Icon Card's Icon, so that Font Awesome names behave the same everywhere.
35. As a developer, I want the ticks and crosses added through the existing rich text component's list styles, so that the markers are defined in one place.
36. As a developer, I want the new List Item fields to reuse the existing global fields, so that the schema stays small.
37. As a developer, I want the red as a theme token, so that no hex value is written into a template.
38. As a developer, I want no JavaScript in the Block, so that it stays static.
39. As a reviewer, I want the seeded Brand Guidelines page compared against the Figma node at 1600, so that I can check the measurements.

## Implementation Decisions

**Entry type.** A new Block entry type, Brand Values (`brandValues`), added to the Blocks field. Build it with the `craft-block` and `craft-frontend` skills.

- **Content tab:**
  - `banner`: a new Content Block field, "Banner", holding the existing global `eyebrow` (Plain Text), `heading` (Heading, CKEditor with italic for the Highlight) and `image` (Image, one asset).
  - `twoColumnLists`: a new Matrix field, "Two Column Lists", with 1 to 2 entries of the new List Card entry type.
  - `image`: the existing Image field, for the List Panel's photograph.
  - `text`: the existing Rich Text - Full field, for the List Panel's headings and lists (the handle Content Row already uses).
- **Settings tab:** `padding`, the standard Padding field, read as Banner CTA reads it.

**List Card entry type** (`listCard`, "List Card"):
- `eyebrow`
- `listItems`: a new Matrix field, "List Items", of the List Item entry type.

**List Item entry type** (`listItem`, "List Item"), all existing global fields:
- `icon`: Text. A Font Awesome name, with a leading `fa-` or a pasted class string accepted, as the Icon Card accepts them.
- `heading`: Text.
- `text`: Rich Text - Simple.

There is no Icon Type and no image option.

**Token.** Add `--color-red: #E63838` to the theme.

**Visibility.**
- **Brand Banner:** renders only with a heading. Without an image it has no Cutout, and the content takes the full width.
- **List Card:** renders only with at least one List Item that has a heading. A List Item with no heading is skipped. The Eyebrow is optional; without it there is no Rule.
- **Row of List Cards:** renders when at least one List Card renders. A single List Card keeps its half width from `lg`, and the right half stays empty.
- **List Panel:** renders with an image or text, once tags and whitespace are stripped. With only one of them, that one takes the full panel width.
- **The Block:** with no part to render, it renders nothing, not even its section. The 20px gaps exist only between parts that render.

**Layout.** The three parts stack in one column inside the site margins, with a fixed 20px gap between them (not the Padding field). Every panel runs the full content width, 1520 at 1600. Figma draws the Brand Banner 1480 wide; that is a design slip.

**Brand Banner** (measurements at 1600):
- **Panel:** black, 20px corners, 494px tall in the design, sized by its content.
- **Content:** in the left column, 40px from the panel's left edge. The Eyebrow sits about 130px below the panel's top in white, the Eyebrow component's 16px Medium, with no Rule. About 40px beneath it is the heading.
- **Heading:** H2, 70px Semibold, 0.97 leading, tighter tracking, Creme 100, with the Highlight in Fluro, capped at about 832px wide. It ends about 130px above the panel's bottom.
- **Cutout:** 393 by 636, rendered through the picture component with empty alt like Banner CTA's. It stands on the panel's bottom edge and rises 142px above the top. Its left edge is 965px from the panel's left edge (x 1005 in the frame).
- **Below `2xl`:** follow Banner CTA's rules. The Cutout sits above the content, pulled up over the panel's top edge with the same negative margins and max width. The content padding steps down as in Banner CTA, and the heading steps down in size.

**List Cards** (measurements at 1600):
- **Row:** two columns with a 20px gap from `lg` (six of twelve each); one column below.
- **Height:** cards in a row share their height (670px in the design).
- **Card Scheme:** by position, repeating: first white, second Fluro. On white, the Rule is Creme 400 and the List Item text is black at 60%. On Fluro, the Rule is black and the text is full black. The Eyebrow component gains a `creme-400` Rule colour.
- **Card:** 20px corners, 40px padding from `md`, 30px below.
- **Eyebrow:** the Eyebrow component with its Rule, black 16px Medium, running the card's inner width. About 35px from the Rule to the first List Item.
- **List Items:** a column with about 30px between rows. Each row is a marker slot, a 10px gap, then the heading over the text.
  - **Heading:** H3, 21px Medium, 1.2 leading, tighter tracking, black.
  - **Text:** the rich text component at 15px, 1.33 leading, about 5px below the heading.
- **Marker, when the Icon is set:** the Icon as the Icon Card draws it: Font Awesome Sharp Duotone Light, Primary with the secondary layer at 20%, 21px, centred in a 27px slot on the heading's first line.
- **Marker, when the Icon is empty:** a Ticked Item's circle, black, 22px, with an 11px white Font Awesome Sharp Solid tick, in the same slot and position.
- **Markers are decoration:** hidden from assistive technology.

**List Panel** (measurements at 1600):
- **Panel:** Creme 200, 20px corners, 656px tall in the design, sized by its taller side.
- **Grid from `lg`:** the photograph takes the left half, inset 10px from the panel's top, bottom and left. In the design it is 740 by 636 with 20px corners, ending in line with the first List Card's right edge. It covers its box.
- **Content:** in the right half, starting at x 932 in the frame (892px from the panel's left edge), 40px from the right edge, centred vertically with about 130px above and below.
- **Below `lg`:** the photograph sits on top at 4:3 inside the same 10px inset, and the content follows beneath with 30px padding (40px from `md`).
- **Photograph:** rendered through the picture component with a common-ratio transform, alt from the asset title.
- **Text:** rendered through the rich text component with a new size and list styles for the List Panel.
  - **Headings:** editors use H2 or H3; both render 40px Medium, 1.2 leading, tighter tracking, black. Italic is the Highlight.
  - **List items:** 16px Regular, 1.33 leading, black. Each has a 19px circle 7px before the text, rows about 13px apart. This is the existing check list's circle size and gap.
  - **Spacing:** about 15px from a heading to its list, and about 50px from a list to the next heading.
- **Alternation:** counting only bullet lists in the field, odd lists are Ticked Items (Primary circle, white tick) and even lists are Crossed Items (red circle, white 10px Font Awesome Sharp Solid cross).
- **Heading Highlight:** takes the colour of the next bullet list after it in the field: Primary before a Ticked list, red before a Crossed list. A heading with no list after it is Primary.
- **Columns:** a list with more than four items is two columns from `md`, with a 20px column gap. Otherwise it is one column. In the design, the second column starts at x 1259.
- **Numbered lists and paragraphs:** take the rich text component's defaults at this size and don't count towards the alternation.
- **Markers:** injected by the template (the stored value stays plain) and hidden from assistive technology.

**Rich text component.** It gains the List Panel's size, the Ticked-in-Primary and Crossed list styles, and the rule for pairing each heading's Highlight colour with the next list. Existing sizes, list styles and callers are untouched.

**Markup.**
- **Section:** the Block embeds the section component with `paddingY` from the Padding field and `paddingX: 'none'`, and manages the site margin itself, as Banner CTA does.
- **List Items:** each List Card's List Items are a `ul` of `li`.
- **Headings and images:** go through the heading, rich text, eyebrow and picture components. No bare `img`.
- **Styles and scripts:** no inline styles, no `{% css %}`, no JavaScript.

**Content.** A Seed in `.scratch/seeds/brand-values/` adds one Brand Values Block to the `brand-guidelines` entry, after its existing Blocks (it has none today). The images are the Figma exports already saved there:
- `brand-values-cutout.png`: the Cutout, 1091 by 2047, transparent background.
- `brand-values-office.jpg`: the List Panel photograph, 2500 by 1667.

The copy, from the node:

- **Banner:**
  - Eyebrow: "Our Mission".
  - Heading: "Achieving digital marketing excellence *with best in class optimisation*", italic is the Highlight.
  - Image: `brand-values-cutout.png`.
- **List Card 1:** Eyebrow "Our Values". Each List Item below is Icon · heading · text:
  1. `shield-check` · Integrity · We uphold the highest standards of honesty and integrity in all that we do.
  2. `user-magnifying-glass` · Transparency · We believe in open communication and transparency, ensuring clarity and trust within our team.
  3. `lightbulb-on` · Creativity · Innovation and creative thinking are at the heart of our culture, driving unique solutions for every challenge.
  4. `circle-user-circle-check` · Accountability · Each team member takes ownership of their responsibilities, fostering a sense of accountability and reliability.
  5. `users` · Collaboration · We value collaboration, fostering an environment where diverse ideas come together to achieve collective success.
  6. `hearts` · Respect · Respect is fundamental to our culture, creating a supportive and inclusive workplace for all team members.
- **List Card 2:** Eyebrow "Our Tone of Voice". No Icons; each List Item below is heading · text:
  1. Creative Approach · Encourage imaginative and inventive communication that showcases creativity.
  2. Friendly and Unpretentious Tone · Maintain a warm, approachable, and down-to-earth tone, avoiding jargon and formality.
  3. Delivery-Focused Mindset · Emphasize a results-oriented approach, conveying a commitment to delivering tangible outcomes.
  4. Small Agency, Big Experience · Highlight the personalized touch and big impact of being a small, close-knit agency with significant experience.
  5. Transparent and Direct Communication · Prioritize openness, honesty, and clarity in all communication.
  6. Progressive and Ambitious Outlook · Showcase a forward-thinking mindset, adaptability, and a commitment to ambitious goals in the industry.
- **Image:** `brand-values-office.jpg`.
- **Text:**
  - H2 "What *We Are*", then a bullet list:
    - Creative, results-driven experts
    - Friendly transparent and approachable
    - Technically proficient and accessible
    - A small agency that makes a big impact
  - H2 "What *We Aren't*", then a bullet list:
    - An unapproachable corporate entity
    - Opaque and dishonest
    - Salesy and overly formal
    - Procrastinators
    - Result-averse
    - Disconnected
    - Technically inaccessible
    - Complacent

  The Crossed list's order reads down each column in the design: the left column is "An unapproachable corporate entity", "Salesy and overly formal", "Result-averse", "Technically inaccessible"; the right is "Opaque and dishonest", "Procrastinators", "Disconnected", "Complacent". The seed interleaves them so a row-first two-column grid shows each column as drawn.

**Docs.** During the grilling session, `CONTEXT.md` gained the Brand Values section and the widened Ticked Item and Card Scheme definitions. No ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per `docs/agents/evidence.md` and compared against the Figma node at the same width, plus served HTML where the behaviour is not visual.

**Seams.**

- **One seam:** the rendered Brand Guidelines page, `https://marketing-signals.ddev.site:8443/brand-guidelines`, with the Block added by the Seed. In a worktree, use that worktree's own URL.
- **Empty-part cases:** proven by a second, throwaway Seed of partial Brand Values Blocks on the same page, removed afterwards. Checked and reported, not all captured.
- **Styleguide:** nothing committed to it.

**What good evidence looks like.** It shows what a visitor would see:
- the Cutout rising over the black banner
- the white and Fluro cards with their Rules, Icons and tick circles
- the Creme panel with the inset photograph
- the Primary ticks, the red crosses in two columns, and headings whose Highlights match their lists
- the stacked layouts on narrow screens

Before is `main` at the commit the branch forked from, where the page shows only the Hero.

**Evidence plan.**

1. Seed output, dry run then real run, saved as text. Proves the Block and its images were written by command.
2. Brand Guidelines at 1600, full page. Compare with `10071-25085`:
   - **Banner:** a 1520 black panel; "Our Mission" and the 70px heading with "with best in class optimisation" in Fluro; the Cutout rising 142px above the panel with its left edge at x 1005.
   - **Cards:** two 750px cards 20px below the banner, white then Fluro, with Creme 400 and black Rules. Six Icon rows (muted text) and six black tick rows.
   - **List Panel:** a Creme 200 panel 20px below, with the 740 by 636 photograph inset 10px. "What We Are" (Primary Highlight) over four Primary ticks in one column, and "What We Aren't" (red Highlight) over eight red crosses in two columns.

   Proves the desktop Block.
3. Brand Guidelines at 1600, viewport capture of the List Cards. Proves the Icon size and slot, the tick circle, the Rule and the row spacing up close.
4. Brand Guidelines at 1600, viewport capture of the List Panel. Proves the list markers, the Highlight colours and the two-column split.
5. Brand Guidelines at 768, full page. Proves the `md` padding, the Cutout above the banner content, the cards stacked, the photograph above the lists at 4:3, and the Crossed list still in two columns.
6. Brand Guidelines at 390, full page. Proves the phone layout: every part in one column, 30px card padding, the Crossed list in one column.
7. Brand Guidelines at 1024, full page. Proves the `lg` step: cards side by side and the photograph beside the lists.
8. Served HTML of the page:
   - one `section`
   - the banner heading an `h2`, List Item headings `h3`, and List Items in a `ul`
   - Icons, circles and crosses with `aria-hidden`
   - the Cutout with empty alt and the photograph with its title as alt
   - no inline styles and no `script` added for the Block

   Proves the markup.
9. Throwaway Seed, with each case reported:
   - a Block with only a banner and no image: the banner content full width
   - a single List Card: half width at 1600
   - a List Item with no heading: skipped
   - a List Panel with only text: full width
   - a Block with nothing filled: no section rendered

   Removed afterwards. Proves the visibility rules.
10. An existing caller of the rich text component's check lists, a Content Row and the Audit CTA, and of the Eyebrow's Rule, unchanged from before. Proves the component changes touch no other caller.

## Out of Scope

- Motion of any kind: no reveal, no Crawl, no hover states.
- An Icon Type or uploaded image option for List Items.
- Colour choices for editors: the List Card colours follow position, and the List Panel's marker colours follow list order.
- More than two List Cards.
- Changing Rich Text - Simple's toolbar.
- Changing Banner CTA, Icon Card, Content Row or Audit CTA.
- A dedicated mobile or tablet design. The responsive rules follow the decisions above until nodes exist.
- A committed styleguide preview.
- Any other Brand Guidelines page content (colour swatches, typography, logos).

## Further Notes

- **Cap-height trimming.** Figma trims text boxes to cap height, so every vertical gap above is measured from caps. "About" means the site's line boxes will land a few pixels differently; match the rendered page to the node at 1600 rather than to the raw numbers.
- **Duplicated icon layers.** The node draws each Icon twice (a `name` layer and a `name##` layer at 20% opacity). That is Font Awesome's duotone split, which the Icon Card's secondary-opacity rule already produces from one element.
- **Styles in the node:**
  - Colours: Black `#0E0A10`, White, Creme 100 `#F3F0E8`, Creme 200 `#E9E6DE`, Creme 400 `#D3D0C5`, Fluro `#DBFE87`, Primary `#745CF6`, and the red `#E63838`, which has no style of its own.
  - Type: "8xl" 70px Semibold at 0.97; "4xl" 40px Medium at 1.2; "lg" 21px Medium at 1.2; "body | med" 16px Medium; "body" 16px Regular; "sm | reg" 15px Regular. All at 1.33 unless stated; the headings use -4% tracking.
- **Cutout fill.** The Figma Cutout's image fill is 115.94% of its frame's height, anchored at the top, so the frame crops the bottom of the photo. The picture component's top-centre position, as in Banner CTA, reproduces that.
- **Eyebrow Rule gap.** The design's Rule sits about 15px below the Eyebrow's line box; the Eyebrow component draws 10px. Keep the component's gap unless the 1600 comparison shows a visible difference.
