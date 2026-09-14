# Contact Page

Spec for the Contact Page: the page an enquirer reaches from "Get In Touch". On the left, an Eyebrow over a large heading with Inline Images, a Divider, a heading with the Highlight and the Contact Details. On the right, the Contact Form. The page's Blocks sit beneath. It is the first page on the site that submits anything, and the first to render a Formie form.

Design: Figma node `9991-15571` in the Marketing Signals file, a group named "Group 46388", 1520 by 578 inside a 1600 frame, starting 213px from the top of the page. No tablet or mobile node exists, so the responsive rules below are decisions, not measurements.

Test URL: `https://marketing-signals.ddev.site:8443/contact-us` (entry 35, type Entry - Contact).

Branch: feature/contact-page

Related:
- ADR-0001 applies: the Header is fixed, so the page pads its top by the header height from the shared header map.
- ADR-0004 applies: the Contact Page has no Hero, so the Header is Creme 100.
- ADR-0002 does not come into play: the content is already in the control panel, and nothing is seeded.
- The Banner Gated Content spec's Gate is the other user of the form input component. Its variants must render unchanged.
- No new ADR.
- Vocabulary: `CONTEXT.md`, "Contact Page" section, which gained Contact Page, Inline Images, Image Position, Contact Details and Contact Form during the grilling session.

The branch is code-reviewed against this spec before merge.

## Prerequisites

These are control panel changes to the Contact Form. Formie keeps forms in the database, so they are not part of the branch. All are saved:

- "I work for" is a Single-Line Text field. It was recreated to change its type, so its handle is now `iWorkFor1`.
- "Hello, my name is", "My email is" and "Message" are required. The rest are optional.
- The Phone field type is enabled.
- "My phone number is" is a Phone field with the country picker on, defaulting to GB.
- "My email is" has the placeholder "john@coolbusiness.com".
- The submit label is "Send Message".
- The privacy statement is an HTML field linking to `/privacy-policy`.
- The Inline Images content is saved: "Contact our friendly team", Image Position 3, three images.

## Problem Statement

The Contact Page renders the Header, then any Blocks, then the Footer. The Contact entry already holds an Eyebrow, a heading with Inline Images, a heading with a Highlight, an email address, a phone number, a location and a related Formie form, and none of it reaches the page.

A visitor who clicks "Get In Touch" lands on a page with no heading, no way to email or call, and no form. An editor filling in those fields sees no effect.

The one component written for a heading with images is unused and placeholder-styled. It expects a position on each image, where the field gives one number for all of them. The site has no styling for a Formie form at all.

## Solution

The Contact Page opens under a Creme 100 Header, padded at its top to clear it. A twelve-column grid follows.

**Left, columns 1 to 6:**
- The Eyebrow "Get In Touch".
- The heading as the page's level-one heading at 82px, with three tilted photo tiles set inside it after its third word, overlapping each other.
- A 1px Creme 300 Divider.
- "Can't talk right now? Fill in the form to request a callback" at 30px, its italic words in Primary.
- The Contact Details: the email with a paper-plane icon, the phone with a phone icon, and the location with a location-dot icon. The icons are Primary. The email and phone are links.

**Right, columns 7 to 12:** the Contact Form.
- Name and company share a row, then phone and email.
- Every input sits on the page background with a thin Creme 400 border and rounded corners.
- "How can we help today?" is a row of pills, the chosen one filled Secondary.
- A message box follows.
- The last row holds the privacy statement on the left and a Secondary "Send Message" pill with an arrow on the right.
- The phone input carries a flag and a country picker showing the dialling code.

Sending a valid enquiry saves it in Formie. Sending an incomplete one shows the errors in Primary without leaving the page.

Below the desktop breakpoint everything stacks: the left column, then the form. Below the tablet breakpoint the form's paired fields stack too.

## User Stories

1. As a visitor, I want a large "Contact our friendly team" heading at the top of the page, so that I know I am in the right place to get in touch.
2. As a visitor, I want small photographs of the team set inside the heading, so that the page feels like talking to people rather than a form.
3. As a visitor, I want the photographs tilted and overlapping, so that they read as a playful group, as the design intends.
4. As a visitor, I want a short label above the heading, so that the page matches the "Get In Touch" button that brought me here.
5. As a visitor, I want a line separating the big heading from what follows, so that the introduction and the details read as two parts.
6. As a visitor, I want "Can't talk right now? Fill in the form to request a callback" with the second sentence in purple, so that I know the form is the way to get a call back.
7. As a visitor, I want the email address shown with an email icon, so that I can spot it at a glance.
8. As a visitor, I want to click the email address to open my mail app, so that I can write straight away.
9. As a visitor, I want the phone number shown with a phone icon, so that I can spot it at a glance.
10. As a visitor on a phone, I want to tap the phone number to call, so that I do not have to copy it.
11. As a visitor, I want to see where the agency is, with its bold first line, so that I understand they are remote.
12. As a visitor, I want the contact form beside the details on a desktop, so that I can choose between emailing, calling and filling it in.
13. As a visitor, I want each field labelled in plain words, like "Hello, my name is", so that the form reads like a conversation.
14. As a visitor, I want example text in each empty field, so that I know what to type.
15. As a visitor, I want the fields to sit on the page's background with a thin border, so that the form feels part of the page.
16. As a visitor, I want my name and company on one row and my phone and email on the next, so that the form is short.
17. As a visitor, I want to pick the country for my phone number from a flag menu, so that my number is understood outside the UK.
18. As a visitor, I want the UK chosen by default with +44 shown, so that most visitors need not touch the menu.
19. As a visitor, I want to choose what I am enquiring about from a row of pills, so that I can answer with one click.
20. As a visitor, I want the chosen pill filled in lilac, so that I can see my choice.
21. As a visitor, I want "General Enquiry" chosen until I pick another, so that the question is never left blank by accident.
22. As a visitor, I want pills to change colour when I hover over them, so that I know they are clickable.
23. As a visitor, I want a large box for my message, so that I have room to explain.
24. As a visitor, I want the privacy statement beside the send button with a link to the privacy policy, so that I know what I agree to before sending.
25. As a visitor, I want a lilac "Send Message" button with an arrow, so that it matches the site's other buttons.
26. As a visitor, I want the field I am typing in to show a darker border, so that I know where I am.
27. As a visitor, I want to be told which required fields I missed before the form sends, so that I can fix them without losing what I typed.
28. As a visitor, I want the error messages in the site's purple rather than a jarring red, so that the page still looks like the brand.
29. As a visitor, I want my enquiry saved when I send a complete form, so that someone gets back to me.
30. As a visitor, I want no asterisks cluttering the labels, so that the form looks as designed.
31. As a visitor with a phone, I want the heading, details and form stacked in that order, so that everything is legible.
32. As a visitor with a phone, I want every form field full width, so that I can type comfortably.
33. As a visitor with a phone, I want the enquiry pills to wrap onto more lines, so that none is cut off.
34. As a visitor with a phone, I want the privacy statement above a full-width send button, so that neither is squashed.
35. As a visitor on a tablet, I want name and company side by side again, so that the form uses the width.
36. As a visitor, I want the heading to step up in size with my screen, so that it fits on a phone and is bold on a desktop.
37. As a visitor, I want the page never to sit under the fixed header, so that the label and heading are never hidden.
38. As a keyboard user, I want to tab through every field, the pills and the send button with a visible focus state, so that I can use the form without a mouse.
39. As a keyboard user, I want the arrow keys to move between the enquiry pills, so that they behave as radio buttons.
40. As a screen reader user, I want each input announced with its label and whether it is required, so that I know what to enter.
41. As a screen reader user, I want the enquiry pills announced as a labelled group of radio buttons, so that I understand the choice.
42. As a screen reader user, I want the heading read as one sentence with the photographs skipped, so that "Contact our friendly team" is not interrupted.
43. As a screen reader user, I want the contact icons kept out of what is read, so that I hear only the details.
44. As an editor, I want the Eyebrow field to set the label, so that I can change the wording.
45. As an editor, I want to set the heading, pick the images and choose after how many words they appear, so that I control the Inline Images.
46. As an editor, I want to set Image Position to 0 and see the images before the first word, so that I can lead with the photographs.
47. As an editor, I want to set an Image Position larger than the heading and see the images at the end, so that nothing breaks.
48. As an editor, I want to leave the images empty and get a plain heading, so that the page still works without photographs.
49. As an editor, I want italic words in the Inline Images heading shown in Primary, even when the images fall inside them, so that I can highlight words as on every other heading.
50. As an editor, I want the heading shown exactly as I typed it, capitals included, so that the casing is mine to decide.
51. As an editor, I want the second heading's italic words shown in Primary, so that I choose the Highlight.
52. As an editor, I want to leave the email, phone or location empty and have that line left out, so that the details never show a blank line.
53. As an editor, I want the email and phone labels I enter shown as the link text, so that I can format the number.
54. As an editor, I want the form I relate in the Form field to be the one rendered, so that I can swap it later.
55. As an editor, I want to change field labels, placeholders, options and the privacy statement in Formie and see them on the page, so that the copy is mine.
56. As an editor, I want to leave the Form field empty and have the form column left out, so that the page still renders.
57. As an editor, I want the page's Blocks to render beneath the contact content, so that I can add sections after it.
58. As a developer, I want the heading-with-images component to take a heading, an Image Position and images, matching the field, so that the component and its field share one shape.
59. As a developer, I want the form's field templates to include the existing form components, so that the Contact Form and the Gate share one set of inputs.
60. As a developer, I want the Contact Form's look as new variants of the form components, so that the Gate's existing variants are untouched.
61. As a developer, I want Formie's own CSS kept off the page, so that the only styling is the site's.
62. As a developer, I want Formie's validation JavaScript kept, so that client-side errors work without new code.
63. As a developer, I want the Formie template overrides limited to the field types this form uses, so that Formie upgrades touch as little as possible.
64. As a developer, I want the page's top padding read from the shared header map, so that a header height change reaches the page.
65. As a reviewer, I want the Gate on Banner Gated Content to look the same before and after, so that I know the component changes did not leak.

## Implementation Decisions

**Fields.** No field or entry type changes. Entry - Contact already carries:

| Field | Type | Holds |
| --- | --- | --- |
| `eyebrow` | plain text | The Eyebrow |
| `headingInlineImages` | Content Block | `heading` (CKEditor with bold, italic, link), `wordCount` (plain text, labelled "Word Count", instruction "The images will appear after this many words"), `images` (assets) |
| `heading` | CKEditor | The second heading |
| `email` | Link, email only | The email address and its label |
| `phone` | Link, tel only | The phone number and its label |
| `location` | Rich Text - Simple, handle override | The location |
| `form` | Formie Forms, max 1 | The Contact Form |
| `blocks` | Matrix | The page's Blocks |

The Content Block's `wordCount` handle and label stay as they are, since label and handle already correspond. In the domain language the value is the **Image Position**.

**Page template.** `entryContact` renders, in order:
1. The contact content in a section.
2. The page's Blocks, as it does today.

There is no Hero, so the global layout's Creme 100 Header Colour default applies (ADR-0004), with no override. The contact section:
- Has no horizontal section padding; the site margins sit on its own wrapper.
- Pads its top by the header padding token from the shared header map (ADR-0001), plus 90px from `xl`. Figma's Eyebrow sits 213px down a 1600 frame under a 123px Header. The extra steps down proportionally below `xl`.
- Takes the section component's standard bottom padding.

The markup is composed from existing components and lives in the page template. The Contact Details are written in the template, not a new component, since this is their only use.

**Grid.** Twelve columns with a 20px gap (`gap-5`).
- The left column spans all twelve below `lg`, and columns 1 to 6 from `lg`.
- The form column spans all twelve below `lg`, and columns 7 to 12 from `lg`.
- Both columns start on the same row, and the form's first label is level with the heading's top rather than the Eyebrow's.
- Below `lg` the form follows the Contact Details with 60px between.
- The left column's text is capped at the node's 622px measure.

**Eyebrow.** The eyebrow component with the Eyebrow field, black, no Rule. 30px above the heading.

**Inline Images heading.** The `headingInlineImages` component, reworked. Its placeholder options (zinc colours, `w-32` tiles, centre alignment) are replaced.

Params, alongside the standard `class` passthrough and margin params:
- `tag`
- `heading` (the CKEditor HTML)
- `imagePosition` (integer)
- `images` (asset list)
- `colour` (default `black`, with Highlight Primary)
- `size`

Rendered as `h1` on this page, left-aligned. The size ramp is 5xl at mobile, 7xl from `md`, 9xl from `lg` and 10xl (82px) from `xl`. It is Semibold with leading 0.97 and the tighter tracking token, and wraps as flowing inline text.

Placement rules:
- Words are counted from the heading's visible text only, with tags stripped. Every tag stays in the output.
- The images go in as one group after word N.
- If an italic run spans that point, it is closed before the group and reopened after it, so both halves keep the Highlight.
- Image Position 0 or empty puts the group before the first word.
- An Image Position at or past the last word puts it after the last word.
- With no images, the heading renders with no group.
- The paragraph wrapper CKEditor adds is unwrapped, so the heading holds inline content only.
- Italic renders `not-italic` in Primary, bold in semibold, links as they are.
- The casing is left as entered: no CSS text transform.

The image group:
- It is an inline-flex row, aligned to the text's centre line, with 8px either side of the neighbouring words.
- It is `aria-hidden`, so the heading reads as one sentence.

Each tile:
- Is the picture component inside a 46 by 72 box (a 2:3 ratio transform, image covering).
- Has 10px corners, a 2px Creme 100 border, and empty alt.
- Overlaps the one before by about 5px.
- Is tilted in a repeating cycle of −5°, +3° and −4°, using `cycle()` over the loop, not index arithmetic.
- Scales with the heading below `xl`, sized in `em` so the tiles stay proportional to the cap height at every step.

Tiles are still images: no Image Cycle.

**Divider.** A 1px Creme 300 line across the left column, 30px beneath the heading's last line and 30px above the second heading.

**Second heading.** The rich text component in the `black` colour at the `3xl` size: 30px Medium, leading 1.2, tighter tracking, italic in Primary. It is left out when empty.

**Contact Details.** A list, 30px beneath the second heading, with 24px between lines.

| Line | Icon | Content |
| --- | --- | --- |
| Email | `fa-sharp fa-solid fa-paper-plane` | A `mailto:` link with the field's label |
| Phone | `fa-sharp fa-solid fa-phone` | A `tel:` link with the field's label |
| Location | `fa-sharp fa-solid fa-location-dot` (Figma's `map-marker-alt`) | The location rich text, its `strong` first line Medium and the rest Regular, 3px between |

Each line:
- Is 18px (`text-md`) black, leading 1.33. The email and phone are Medium.
- Has a 14px Primary icon in a fixed 14px column with a 9px gap, top-aligned with the first line of text. The icon is `aria-hidden`.
- Is left out when its field is empty. With every field empty, the list is left out.
- If a link, underlines on hover and focus.

**Contact Form rendering.** The page renders the related form with `craft.formie.renderForm`. Before rendering, it sets the site's Form Template on the form (`Form::setTemplate`, looked up by handle), so the Contact Form picks it up whatever template the control panel holds. With no related form, the form column is left out.

**Form Template.** A new Formie Form Template in project config, named for its shape rather than this form (for example "Site", handle `site`):
- Custom templates on, pointing at a `_formie` templates directory.
- Formie's layout CSS and theme CSS off.
- Formie's base JS on, for validation, the phone country picker and submit handling.

Only these files are overridden; every other Formie template falls back to the default:
- The page template.
- The submit include.
- The single-line text, email, multi-line text, radio, phone and HTML field templates.

Each override keeps the attributes Formie's JS reads from `fieldtag`: names, ids, `data-fui-*` attributes, `required`, and `aria` attributes.

**Field overrides.** Each field template includes its form component and passes Formie's name, id, value, placeholder, required state and attributes through the component's `name`, `id`, `value`, `placeholder`, `required` and `attributes` params.

| Formie field | Component |
| --- | --- |
| Single-line text | `_components/form/input`, type `text` |
| Email | `_components/form/input`, type `email` |
| Multi-line text | `_components/form/textarea` |
| Radio | `_components/form/options`, type `radio`, horizontal |

Labels come from the components' label, so Formie's own label include is not also rendered. Required fields show no visible asterisk. They carry `required` and `aria-required="true"`, so the label component gains a way to suppress the asterisk.

**Form component variants.** The `input`, `textarea` and `options` components (and `label` and `instructions` where they carry colour) gain a `creme` colour and a `contact` size, or equivalently named options-map entries. The existing `base`, `white-10` and `pill` variants are unchanged.

Labels:
- 16px Medium black, leading 1.33.
- 10px beneath to the input, or 15px above the pill row.

Inputs:
- Transparent background.
- 1px Creme 400 border, 10px corners.
- 37px tall, 20px left padding.
- 16px Regular black text, Creme 500 placeholder.
- Focus: black border and no ring colour change beyond the existing focus ring token.

Textarea: the same as the inputs, 171px tall, 15px top padding.

Radio pills (the radio `input` visually hidden but focusable, its label styled as the pill):
- 16px Medium, 20px by 15px padding, fully rounded, 5px apart, wrapping.
- Unchecked: 1px Creme 400 border, transparent.
- Hover: Secondary background and border, matching the button's `creme-400-outline` colour.
- Checked: Secondary background, transparent border.
- Keyboard focus: the focus ring on the pill.
- The group is a `fieldset` with the question as its `legend`.

Errors:
- Formie's field error messages render beneath the input in 14px Primary, and the errored input's border turns Primary.
- The form-level error message above the form renders in Primary at base size.

**Rows.** Formie's rows render as a grid.
- A row with two fields is two equal columns from `md` and one column below, with a 20px gap.
- 30px between rows.

**Privacy statement and submit.** The page override skips HTML fields in the rows loop and renders them in the button row instead. The statement stays editable in Formie.
- The button row sits 30px beneath the message, as a flex row with space between from `md`.
- Left: the HTML field's content in 16px Regular Creme 500, its link Medium black with an underline on hover.
- Right: the button component as a `<button type="submit">` in `secondary` with the default sharp regular arrow-up-right icon after it, labelled from the page's submit button label.
- Below `md` the statement stacks above a full-width button with 20px between.
- Formie's submit button attributes (`data-submit-action` and so on) go through the button component's `attributes` param.

**Phone field.** The phone override renders the number input through `_components/form/input` in the same variant, plus Formie's hidden country input. It does not register Formie's `phone-country.css`.

Formie's country picker JS wraps the input with a flag button and a dropdown. Those generated elements are styled in a new stylesheet in `src/css`, written as Tailwind `@apply` rules (the [judgement] "`@apply` for custom CSS" rule). No `{% css %}` block is used.

The styled picker:
- Flag at 20px from the left.
- 10px `chevron-down`-style caret.
- Dialling code "+44" in black 16px Regular with 7px gap, then the number, as the node draws it.
- The dropdown list in Creme 100 with a Creme 400 border, 10px corners, 16px rows, a Secondary highlight on the active country, and a scroll limit.

The stylesheet is imported by the site's CSS entry so Vite builds it.

**Docs.** During the grilling session `CONTEXT.md` gained Contact Page, Inline Images, Image Position, Contact Details and Contact Form. No ADR changes.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site taken with agent-browser per `docs/agents/evidence.md`, compared against the Figma node at the same width. Where the behaviour is not visual, served HTML and database output stand in.

**Seams.**
- The main seam is the rendered Contact Page at `/contact-us` through the global layout. The heading component, the Contact Details, every Formie override, the form variants and the phone stylesheet all show there.
- The second seam is Banner Gated Content, checked only to prove the Gate's input renders unchanged.
- The Formie submissions table is the seam for a saved enquiry.
- Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor sees:
- A creme page and Header.
- The 82px heading with three tilted tiles after "friendly".
- The Divider, the Primary Highlight, and the three icon lines.
- The bordered transparent inputs beside them, the Secondary "General Enquiry" pill, and the privacy statement level with the Send Message pill.
- The stacked layout on a phone.

Temporary content (the Highlight test) is restored before the work is done.

**Evidence plan.**

Screenshots saved to `.scratch/evidence/contact-page/`:

1. Contact Page · 1600 · resting, full page. Proves the desktop layout. Check against the Figma node:
   - Eyebrow, heading and tiles.
   - Divider, second heading and Contact Details in columns 1 to 6.
   - The form in columns 7 to 12 with its first label level with the heading.
   - Name and company, then phone and email, in pairs.
   - The pills, the 171px message box, then the privacy statement left and Send Message right.
2. Contact Page · 768 · resting, full page. Proves the `md` step: the left column then the form stacked, the form's pairs side by side, and the statement beside the button.
3. Contact Page · 390 · resting, full page. Proves the mobile layout: the heading at 5xl with tiles scaled, every field full width, the pills wrapping, and the statement above a full-width button.
4. Contact Page · 1600 · "Hello, my name is" focused. Proves the focus state.
5. Contact Page · 1600 · "New Project" hovered, then "Service Enquiry" selected (two files). Proves the pill hover and checked states.
6. Contact Page · 1600 · country picker open. Proves the picker styling: flag, caret, +44, and the dropdown list.
7. Contact Page · 1600 · Send Message clicked with the form empty. Proves validation: errors in Primary under name, email and message, their borders Primary, and no visible asterisks.
8. Contact Page · 1600 · the Inline Images heading temporarily set to "Contact our *friendly team*" with Image Position 3. Proves the Highlight survives the split: "friendly" and "team" are both Primary either side of the tiles. Restored afterwards.
9. Banner Gated Content · 1600 · resting, before and after (two files). Proves the Gate's pill input is unchanged.

Checked on the site and reported:

10. A complete enquiry sent: the page lands on Formie's configured redirect, and a new row appears in `formie_submissions` for the Contact Form with every value, including the phone number with its country. The query output is saved as a text file. Proves submission. The thank-you page's own rendering is not judged.
11. Image Position set to 0, then to 10, then images removed (restored afterwards): tiles before the first word, then after the last word, then a plain heading. Proves the edge cases.
12. The email, phone and location fields each emptied in turn (restored afterwards): that line is left out. Proves the empty Contact Details.
13. Markup:
    - One `h1`, whose accessible text is the heading alone, with the tiles `aria-hidden`.
    - Contact icons `aria-hidden`; email and phone are `mailto:` and `tel:` links.
    - Each input has a `label` `for` its id; required inputs carry `required` and `aria-required`.
    - The pills are radio inputs in a `fieldset` with a `legend`, and arrow keys move between them.
    - No Formie theme or `phone-country.css` stylesheet is requested.

    Proves the markup and accessibility.
14. `prefers-reduced-motion: reduce`: transitions on inputs and pills drop out with end states intact.

## Out of Scope

- The thank-you page (`/thank-you`, Entry - Form Success) and its template. A submission redirects there, but rendering it is a separate spec.
- Email notifications for submissions. None are configured.
- An Image Cycle in the Inline Images tiles. Each tile is one still image.
- Reusing the Inline Images heading anywhere other than the Contact Page.
- Styling Formie field types this form does not use: Dropdown, Checkboxes, Agree, Number, Date, File Upload, multi-page forms, page tabs and progress.
- Captchas and spam protection.
- Ajax submission. The form keeps Formie's page-reload submit method.
- The control panel field fixes listed under Prerequisites, and any other form copy.
- Changing the eyebrow, rich text, or button components beyond passing params, or changing the Gate's look.
- A dedicated mobile or tablet design. The responsive rules follow the decisions above until a node exists.
- Seeding the Contact entry's content. It is already entered.

## Further Notes

- **Node geometry at 1600**, all y values from the top of the frame. Figma trims text boxes to cap height (`text-box-trim`), so gaps are between cap tops and baselines and translate approximately to CSS.

  Left column:
  - Eyebrow at y 213.
  - "Contact Our" at y 254, then the "Friendly [tiles] Team" line at y 324.
  - Tile groups at x 301, 352 and 393 inside the line, each 46 by 72 before rotation, and 52 by 76, 50 by 74 and 51 by 75 as rotated bounding boxes.
  - Divider line at y 430, 648 wide.
  - Second heading at y 460, 622 wide.
  - Contact Details at y 546, 582 and 618; icons at x 40, text at x 63.

  Form:
  - Labels at y 254 and 342 with inputs at 275 and 363, 365 by 37, columns at x 810 and 1195.
  - Pill label at y 430, pills at y 456, 41 tall, 5px apart.
  - Message label at y 527, box at y 548, 750 by 171.
  - Privacy statement at y 765, Send Message at x 1393, y 749, 167 by 42.
  - Phone input: flag at x 830, caret at x 851, "+44" at x 868, number placeholder at x 902.
- In Figma each tile is a stack of 8 to 16 team photographs, only the top one visible. This spec reads that as a design file shortcut, not an Image Cycle.
- The saved heading is "Contact our friendly team" in sentence case. The node shows Title Case. The page shows what the editor entered.
- The node's inputs are drawn with a Creme 100 fill. By decision they are transparent, showing the Creme 100 page, so they look identical here and follow any future background.
- Figma's phone icon name `map-marker-alt` is Font Awesome 5's name for `location-dot`.
- The Contact Form's `submitAction` is `entry`, pointing at entry 1283 (`/thank-you`). Its error message position is `top-form`.
- The form component placeholders' existing comment about the pill input's fixed height applies to the Gate's `pill` size only.
