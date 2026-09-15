# Longform Form

Spec for the Longform Form: a form an editor places inside a Longform, shown in the Longform's column. Its first use is the Application Form on a Career, which needs a field the site has never rendered, a File Upload for the CV, so this spec also builds the File Upload as a reusable form component with its Formie field template.

Design: Figma node `10071-25084` in the Marketing Signals file, a group named "Group 46396", 750 by 583 inside a 1600 frame, in the Longform's column (x 425, columns 4 to 9). No tablet or mobile node exists; the responsive rules below are decisions, not measurements. The node shows the empty state only.

Test URL: `https://marketing-signals.ddev.site:8443/career/usa-focused-senior-digital-pr-manager`, whose Longform already holds a Longform Form (entry 1530) related to the Career form.

Branch: feature/longform-form

Related:
- The Career Longform spec, whose layout component, chunk loop and Lenis scroll-to-hash handler this builds on, and whose Sidebar Card button will point at the form.
- The Contact Page spec, which owns the Formie `site` form template, the `creme` colour and `contact` size of the input components, and the theme config this block's config follows.
- The Lead Modal spec, the other Formie form on the site, switched to Ajax for the same reason as here.
- The Form Success Page spec, whose page the Application Form sends visitors to.
- ADR-0001 applies: the header is fixed, so the form's anchor clears the header height from the shared header map.
- ADR-0002 does not come into play: the Longform Form entry and its form are already saved, so nothing is seeded.
- No new ADR: nothing here is hard to reverse.
- Vocabulary: `CONTEXT.md`, which gained **Longform Form**, **Application Form** and **File Upload** in the Longform section during the grilling session.

The branch is code-reviewed against this spec before merge.

## Prerequisites

Control panel changes to the Career form. Formie keeps forms in the database, so they are not part of the branch.

Saved:
- Submit Method is Ajax; the submit action stays "Entry", set to the Form Success Page (`/thank-you`).
- The "Attach your CV" row sits between the phone and email row and "Message".
- "Hello, my first name is" is the first-name label, with the placeholder "Michael".
- "Attach your CV" allows PDF and Word only, and at most one file.
- The submit label is "Apply Now".

Outstanding:
- "Attach your CV" has a maximum file size of 10MB. At the time of writing the size limit is still empty.

After the build:
- The USA Focused Senior Digital PR Manager's Sidebar Card button is pointed at `#career-form` instead of `#how-to-apply`.

## Problem Statement

A Career page describes the role and offers Apply Now twice, in the Career Hero and in the Sidebar Card, but there is nowhere to apply. An editor has already placed a Form entry inside the Career's Longform and related it to the Career form, and it renders nothing: the Longform's chunk loop has no template for it. The Career form also asks for a CV, and the site has no File Upload at all, so even if the form rendered, the one field that matters most for an application would fall back to Formie's unstyled default. The form was set to submit by page reload, which on a long page with a file field loses the chosen file and drops the visitor at the top of the page on any error.

## Solution

Where an editor places a Longform Form, the Longform's column shows its form, starting at the left edge of the column and filling its 750px.

The Application Form reads, in rows 30px apart: "Hello, my first name is" and "My last name is" side by side, each over a 37px field with 10px corners and a Creme 400 border; "My phone number is" with its country picker and "My email is" side by side; "Attach your CV" over the File Upload, a 92px box as wide as the form with a Creme 400 border and 10px corners, holding a Secondary "Upload your CV" pill with the up-right arrow centred in it; "Message" over a 171px box. 30px beneath, the privacy statement sits on the left in Creme 500 with its link in Black Medium, and the Secondary "Apply Now" pill on the right.

The visitor attaches a CV by clicking anywhere in the box, or by dropping a file onto it. Pointing at the box gives the pill its usual hover. Once a file is chosen the pill reads the file's name and the box's border turns Black. A wrong type, a file too big or a missing required file turns the border Primary with Formie's message beneath the box.

The form sends without leaving the page. Errors appear in place with everything typed and the chosen file kept; success lands the visitor on the Form Success Page.

The form carries an anchor, `#career-form` for the Career form, so the Sidebar Card's Apply Now can take the visitor straight to it, clear of the header.

Below `md` every field is full width in one column; the privacy statement stacks above a full-width Apply Now; the File Upload keeps its height with the pill centred and a long file name cut short with an ellipsis.

## User Stories

1. As a job seeker, I want the application form beneath the role's description, so that I can apply the moment I have read enough.
2. As a job seeker, I want my first and last name side by side, so that the form reads like the rest of the site's forms and stays short.
3. As a job seeker, I want my phone number with a country picker, so that a US or UK number is entered correctly.
4. As a job seeker, I want to attach my CV in the form, so that I do not have to email it separately.
5. As a job seeker, I want to click anywhere in the CV box to choose a file, so that I do not have to aim for the button.
6. As a job seeker, I want to drop my CV onto the box from my desktop, so that attaching it is one movement.
7. As a job seeker, I want the button to show my file's name once chosen, so that I know the right CV is attached.
8. As a job seeker, I want the box's border to change once a file is chosen, so that I can see at a glance the field is done.
9. As a job seeker, I want to click the box again to swap the file, so that I can fix a wrong attachment without starting over.
10. As a job seeker, I want a long file name cut short rather than breaking the box, so that the form stays tidy.
11. As a job seeker, I want to be told if my CV is the wrong type or too big, beneath the box, so that I know what to fix.
12. As a job seeker, I want only PDF and Word files offered in the picker, so that I do not send something that will be rejected.
13. As a job seeker, I want a box to write a message, so that I can say why I want the role.
14. As a job seeker, I want to see the privacy statement with a link to the policy before I send, so that I know how my details are used.
15. As a job seeker, I want errors shown without the page reloading, so that I keep my place and my chosen CV.
16. As a job seeker, I want my CV kept after an error elsewhere in the form, so that I do not have to attach it again.
17. As a job seeker, I want each field's error beneath that field in the site's colours, so that I can find what to fix.
18. As a job seeker, I want to land on the thank-you page after sending, so that I know my application went through.
19. As a job seeker, I want Apply Now in the sidebar to take me straight to the form, clear of the header, so that I do not have to hunt for it.
20. As a job seeker on a phone, I want every field full width in one column, so that nothing is cramped.
21. As a job seeker on a phone, I want a full-width Apply Now beneath the privacy statement, so that it is easy to press.
22. As a job seeker on a phone, I want to tap the CV box to pick a file from my phone, so that I can apply from anywhere.
23. As a keyboard user, I want to Tab to the CV box and open the file picker with Space or Enter, so that I can attach a file without a mouse.
24. As a keyboard user, I want a visible focus state on the CV box, so that I know where I am.
25. As a screen reader user, I want the CV field announced by its label as a file upload, so that I know what it asks for.
26. As a screen reader user, I want the chosen file announced once, not twice, so that the form does not repeat itself.
27. As a screen reader user, I want the decorative arrow kept out of what is read, so that I hear only content.
28. As an editor, I want to place a form anywhere in a Longform, so that I choose where on the page the visitor applies.
29. As an editor, I want to pick which form a Longform Form shows, so that a different role or page can use a different form.
30. As an editor, I want a Longform Form with no form picked to show nothing, so that an unfinished entry never breaks the page.
31. As an editor, I want field labels, placeholders, the privacy statement, allowed file types and the button label to come from Formie, so that the copy and rules are mine.
32. As an editor, I want to point a button at the form with a `#career-form` link, so that any Apply Now on the page can jump to it.
33. As an editor, I want the same Longform Form to work in a Blog or a Text Page, so that I can add a form to an article too.
34. As an editor, I want the form not to change the Longform's read time, so that the figure reflects the writing.
35. As a recruiter, I want each application saved with its CV in Formie, so that I can review applications in one place.
36. As a developer, I want the File Upload as a generic form component beside the input and textarea, so that any future file field reuses it.
37. As a developer, I want a Formie field template for file uploads that hands Formie's attributes to that component, as the text fields do, so that Formie's validation and Ajax upload handling keep working.
38. As a developer, I want the Longform Form's theme config owned by its block, as the Contact Page and Lead Modal own theirs, so that each form's layout lives beside its markup.
39. As a developer, I want the click and drop behaviour to come from the native file input, so that the only JavaScript is showing the file name.
40. As a reviewer, I want the Career page to show the form against the Figma node at desktop and phone widths, so that I can check the design.

## Implementation Decisions

**Fields.** No new fields or entry types. The Longform Form entry type exists with its single Form field (a Formie Forms relation, at most one) and is already offered in the Rich Text - Longform field. The Career form's fields are Formie content (see Prerequisites).

**Longform Form block.** A new block template for the Longform Form entry type, rendered by the Longform's existing chunk loop with no change to the loop or the layout component.
- Renders nothing when the Form field is empty.
- Sets Formie's `site` form template on the form before rendering, as the Contact Page does, so the control panel's template choice does not matter.
- Wraps the form in an element whose id is the form's handle followed by `-form` (`career-form`), carrying the header scroll margin from the shared header map, as the Longform's H2s do. The Longform's Lenis scroll-to-hash handler reaches it through any `#career-form` button link.
- Passes its own theme config, modelled on the Contact Form's:
  - Page container: a grid, 30px between rows.
  - Row: one column; from `md`, its fields side by side in equal columns, 20px apart.
  - Form error alert: 30px above the fields, 16px, leading 1.33, Primary.
  - Field error: 8px beneath its field, 12px, Primary.
  - Button row: 30px above; stacked, 20px apart, below `md`; from `md` one row with the privacy statement on the left and the button on the right, vertically centred.
  - Formie's own labels turned off for single-line text, email, phone, multi-line text and File Upload, which take their labels from the form components.
- The block adds no heading, eyebrow or panel; the form sits directly in the Longform's column.
- The Longform's Read Time counts text chunks only, so the form adds nothing to it.

**Existing Formie templates.** The page template, which moves HTML fields into the button row, and the submit include, which renders the Secondary pill with the page's submit label, are reused unchanged. The single-line text, email, phone and multi-line text field templates are reused unchanged.

**File Upload component.** A new generic form component beside the input and textarea, following their Default Params, Merge Params, Options, Classes and Output sections.
- Params: `id`, `name`, `label`, `required`, `accept`, `multiple`, `buttonLabel` (default "Upload a file"), `instructions`, `attributes`, `labelAttributes`, `colour`, `size`, `class`.
- It renders the shared label and instructions components, as the input does.
- Options: a `creme` colour (Creme 400 border, Black once a file is chosen or on focus, Primary when `aria-invalid`) and a `contact` size (92px tall, 10px corners, 1px border). Only these variants are built.
- The box is a relative container. The real file input is stretched over the whole box with zero opacity, so a click anywhere opens the picker, a file dropped anywhere on the box is taken by the input, and Space or Enter on the focused input opens the picker, all natively.
- The pill is the button component's Secondary colour and base size, a `span` rather than a link, with the sharp regular up-right arrow, centred in the box, `aria-hidden`. Hovering the box gives the pill the button's hover state (Primary fill, white text); focusing the input gives the box a Black border and the pill the button's focus ring.
- The pill's label is `buttonLabel` until a file is chosen, then the chosen file's name, truncated with an ellipsis to the box's width less its padding.
- The file name is shown by a small Alpine component in the component's own JS block, which listens for the input's change event and reads the first file's name, and is `aria-hidden` so assistive technology hears only the native input's own announcement.
- When the input's selection is emptied, the label returns to `buttonLabel`.
- After an Ajax submission that failed elsewhere in the form, Formie uploads the file, adds its asset id as a hidden input and empties the file input. The name stays shown while that hidden asset id is present, so the visitor sees the CV is still attached.

**File Upload Formie field template.** A new field template for Formie's file upload field, alongside the text field templates.
- It takes Formie's `fieldInput` tag and passes its id, name (with Formie's `[]` suffix), `accept`, `multiple` and remaining `data-*` and `aria-*` attributes to the File Upload component, with `aria-required` and `aria-invalid` set as the text field templates do. Formie's size and file-count validators read those data attributes, so they keep working.
- It keeps Formie's blank hidden input carrying the field's name, and a hidden input per already-uploaded asset id, which Formie's Ajax upload handling looks for inside the field.
- It keeps Formie's rule that a required field with already-uploaded files is not required again.
- It passes the field's label, `colour` `creme`, `size` `contact`, and `buttonLabel` "Upload your CV". The button text is not read from Formie; every Formie file upload field on the site says "Upload your CV", which today is only this one.
- Formie's uploaded-file summary list is not rendered; the pill's file name replaces it.
- Formie's own file upload stylesheet is not needed.

**Submission.** Ajax, set in the control panel. Formie's script handles validation, the Ajax post, inline errors and the redirect to the Form Success Page. No custom submit handling.

**Responsive.** Below `md`: every field full width in one column, 30px between rows; the privacy statement above a full-width Apply Now, 20px apart; the File Upload at its full height with the pill centred. From `md`: the node's layout. The Longform's column caps the form at 750px at every width.

**Docs.** `CONTEXT.md` gained **Longform Form**, **Application Form** and **File Upload** during the grilling session. No ADR change.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus recorded behaviour, served HTML and saved Formie submissions where the behaviour is not visual.

**Seams.** The one seam is the rendered Career page through the global layout, at the USA Focused Senior Digital PR Manager Career, whose Longform already holds the Longform Form. The Contact Page and a Service with the Lead Modal are rechecked at the same seam, since they share the field templates and submit include. Nothing is added to the styleguide. No Seed is needed.

**What good evidence looks like.** It shows what a job seeker would see and do: the form in the Longform's column against the node, a CV chosen and named in the pill, an error beneath the box, and an application that arrives in Formie with its CV. The screenshots of record are the resting states; every other line is checked on the site and reported, not captured.

**Evidence plan.**

Screenshots, USA Focused Senior Digital PR Manager, scrolled to the form:

1. 1600, the form in the Longform's column, resting: two fields per row for name and for phone and email, the File Upload box with "Upload your CV" centred, Message, then the privacy statement left and Apply Now right. Compared against the Figma node. Proves the desktop layout.
2. 390, the form, resting: every field full width, the File Upload at full height with the pill centred, the privacy statement above a full-width Apply Now. Proves the mobile layout.
3. 1600, the File Upload with `jane-doe-cv.pdf` chosen: the pill reads the file name and the border is Black. Proves the chosen state.
4. 1600, the form sent empty: the form error alert above the fields in Primary, the required fields' borders Primary with their messages beneath. Proves the error layout.

States checked on the site and reported:

5. 1600, pointing at the File Upload box away from the pill: the pill turns Primary with white text. Clicking there opens the file picker. Proves the whole box is the target.
6. A PDF dropped onto the box (via agent-browser's file upload on the input): the name shows in the pill. Proves the drop path.
7. A 60-character file name at 390: the name is cut short with an ellipsis inside the box. Proves truncation.
8. A `.png` chosen by bypassing the picker's filter, then sent: Formie's type message beneath the box, border Primary. A file over 10MB: Formie's size message. Proves the File Upload's errors.
9. A CV chosen, the email left empty, then sent: the email's error shows, the page does not reload, and the pill still reads the CV's name. Filling the email and sending again succeeds without re-attaching. Proves the Ajax error path keeps the file.
10. A valid application with a PDF sent: the visitor lands on `/thank-you`, and the submission is saved in Formie with the CV in the Files volume. Proves the submission.
11. Keyboard: Tab reaches the File Upload after the phone and email fields; focus shows the Black border and the pill's ring; Space opens the picker. Proves keyboard access.
12. Markup: the File Upload's `label` points at the file input's id; the input carries `accept` for PDF and Word, no `multiple`, and Formie's `data-size-max-limit` and `data-file-limit`; the blank hidden input is present; the pill and the file name are `aria-hidden`; the wrapper's id is `career-form`. Proves the markup.
13. The Sidebar Card button pointed at `#career-form` (prerequisite) clicked at 1600: scrolls to the form clear of the header. `…#career-form` opened directly lands the same way. Proves the anchor.
14. The Longform Form's Form field temporarily emptied in the control panel (restored afterwards): nothing renders where it was, and the page renders without error. Proves the empty state.
15. The Read Time on the Career unchanged by the form (compare with the Longform Form entry temporarily disabled). Proves the read time ignores the form.
16. A Longform Form temporarily added to the Blog `insights/how-to-write-content-for-seo-that-converts-and-ranks` in the control panel (removed afterwards): the form renders in its Longform's column the same way. Proves the block is not Career-specific.
17. The Contact Page at 1600 and 390, and the Lead Modal on `/service/ai-focused-search-engine-optimisation`: fields, privacy statement and send button as before. Proves the shared templates are unchanged.

## Out of Scope

- A heading, eyebrow, panel or intro text around the Longform Form.
- A "Remove file" control; clicking the box again swaps the file.
- Multiple files in one File Upload, a list of chosen files, upload progress, or image previews.
- Reading the File Upload's button text from Formie, or per-form button text.
- A drag-over highlight on the box.
- Variants of the File Upload beyond the `creme` colour and `contact` size.
- A shared theme config across the Contact Form, Lead Form and Longform Form.
- Changing the Contact Form, the Lead Form or the existing Formie field templates.
- Career-specific behaviour in the block, such as pre-filling the role.
- Recruiter notifications, email templates or integrations for the Application Form.
- Spam protection or captchas.
- Pointing the Career Hero's Apply Now at the form; it keeps landing on the Longform.
- A dedicated mobile or tablet design.

## Further Notes

- Node geometry at 1600, text boxes trimmed to cap height: the group at x 425, y 4268, 750 wide. First-name and last-name labels at y 4268 ending at 4279, their fields at y 4289, 365 by 37, at x 425 and x 810 (20px apart). Phone and email labels at y 4356, their fields at y 4377, 30px beneath the first fields' end. "Attach your CV" at y 4444; the box at y 4465, 750 by 92; the pill at x 713, y 4490, 175 by 42, centred in the box. "Message" at y 4587; the box at y 4608, 750 by 171. Apply Now at x 1036, y 4809, 139 by 42, flush right, 30px beneath the message box; the privacy statement at y 4825, centred on the button.
- The node's fields and boxes are filled Creme 100 on the Creme 100 page; the existing `creme` input colour is transparent, which renders the same and is kept for the File Upload.
- The node's pills are 20px by 15px padding with an 8px gap; the site's button component is kept for both pills, as on the Contact Form and Lead Form.
- The node's phone field shows the flag and "+44" inside the field; the Contact Page's country picker styling is reused as it is.
- The node's first-name label reads "Hello, my first name is"; the Career form was changed to match. The Contact Form keeps "Hello, my name is".
- A browser does not stop a dropped file of the wrong type; Formie's server-side check and its message beneath the box catch it on send.
- Ajax was chosen over page reload because a browser cannot refill a file input, so a page-reload error would silently drop the CV and return the visitor to the top of a long Career page.
