# Lead Modal

Spec for the Lead Modal: the overlay that opens by itself once a visitor has scrolled halfway down a Service page whose editor switched it on. A white card holds the image with its Image Caption on the left, and an Eyebrow over a heading with Inline Images and the Lead Form on the right. Its content is set once on the Site entry.

Design: Figma node `9716-8754` in the Marketing Signals file, "Lead Generation | Pop Up", a 1600 by 900 frame: the black backdrop with blur over a Hero, and a 1006 by 650 white card with 20px corners centred on it. On the left a 365px image of Joseph Woodcock with fades at its top and bottom, the white outline close button at its top left and the Image Caption "Joseph Woodcock" / "Senior Digital PR Manager" at its bottom left. On the right "Book Your Free Strategy Call" over "Contact Our Friendly [images] Team", then the Lead Form's name, email and phone fields, the privacy statement and a full-width "Book your call today" pill. The node draws only desktop, so everything below `lg` is a decision, not a measurement.

Branch: feature/lead-modal

Test URL: `https://marketing-signals.ddev.site:8443/service/ai-focused-search-engine-optimisation` (Lead Generation Popup switched on). Regression URL: `/service/pay-per-click` (switched off).

Related: the Team Modal, whose close, backdrop, Escape and scroll-lock behaviour the Lead Modal copies; the Contact Page spec, which owns the Heading with Inline Images component, the Formie `site` template and the form input variants reused here; the Form Success Page spec, whose page the Lead Form sends visitors to. ADR-0002 does not apply: the Site entry content and the Service's lightswitch are already saved, so no Seed is needed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, which gained **Lead Modal**, **Lead Form** and **Image Caption** during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A visitor reading a Service page who is interested enough to scroll halfway has to find their own way to the Contact Page to act on it. Editors have already written a short strategy-call offer on the Site entry, with a heading, team photos, a portrait, a caption and a three-field Lead Generation form, and switched it on for the AI-focused SEO Service. None of it reaches the page: the lightswitch does nothing, and the visitor is never offered the call.

## Solution

On a Service page whose Lead Generation Popup is switched on, once the visitor has scrolled halfway down the page, the page dims behind a 70% black blurred backdrop and the Lead Modal fades in, its card rising slightly.

From the desktop breakpoint the card is two columns. On the left the portrait fills the card's height, a fade darkening its top and bottom, a white outline close button at its top left and the Image Caption, a name over a role, at its bottom left. On the right, 70px in, the Eyebrow sits over a large black heading with its italic words in Primary and small tilted team photos after the chosen word, then the Lead Form: "Hello, my name is", "My email is", "My phone number is" with its country picker, the privacy statement, and a full-width lilac "Book your call today" pill.

Below the desktop breakpoint the portrait and caption are left out: the card spans the screen with a margin, fits within its height, scrolls inside itself, and has a black close button at its top right.

The Lead Modal closes from its close button, a click on the backdrop or Escape, and focus returns to where the visitor was. Once closed, or once the Lead Form is sent, it does not open again anywhere in that browser session. Sending a valid Lead Form takes the visitor to the Form Success Page; a rejected one shows its errors inside the modal without closing it.

A Service page with the lightswitch off never shows it, and it never renders without a Lead Form and a heading on the Site entry.

## User Stories

1. As a visitor reading a Service page, I want to be offered a free strategy call once I have read a good part of the page, so that I can act on my interest without hunting for the Contact Page.
2. As a visitor, I want the offer to wait until I am halfway down the page, so that it does not interrupt me before I know what the Service is.
3. As a visitor, I want the page behind the offer dimmed and blurred, so that I can tell the offer is on top and the page is still there.
4. As a visitor, I want the offer to fade in rather than snap, so that it does not feel jarring.
5. As a visitor, I want a photo of a real person with their name and role beside the form, so that I know who I would be speaking to.
6. As a visitor, I want small team photos inside the heading, so that the offer feels like talking to people.
7. As a visitor, I want the heading's highlighted words in purple, so that it matches the rest of the site.
8. As a visitor, I want a short line above the heading saying what I am booking, so that I understand the offer at a glance.
9. As a visitor, I want only name, email and phone to fill in, so that booking a call is quick.
10. As a visitor, I want each field labelled in plain words like "My email is", so that the form reads like a conversation.
11. As a visitor, I want to pick my country code for my phone number, so that I can enter a number from outside the UK.
12. As a visitor, I want to see the privacy statement before I send, so that I know how my details are used.
13. As a visitor, I want a large "Book your call today" button, so that the next step is obvious.
14. As a visitor, I want to be told which required fields I missed before the form sends, so that I can fix them without losing what I typed.
15. As a visitor, I want an error from the server shown inside the offer, so that the page does not reload and throw away what I typed.
16. As a visitor, I want to land on the thank-you page after sending, so that I know my request went through.
17. As a visitor, I want to close the offer with a clear close button, so that I can go back to reading.
18. As a visitor, I want a click outside the card to close it, so that dismissing it is effortless.
19. As a visitor, I want the page not to scroll behind the offer while it is open, so that I do not lose my place.
20. As a visitor who closed the offer, I want it not to come back on this or any other Service page for the rest of my visit, so that I am not nagged.
21. As a visitor who sent the form, I want never to be offered it again in that visit, so that I am not asked twice.
22. As a visitor on a Service page that has not switched the offer on, I want no offer at all, so that the page reads uninterrupted.
23. As a visitor with a phone, I want the form in a card that fits my screen and scrolls inside itself, so that every field and the button are reachable.
24. As a visitor with a phone, I want the portrait left out, so that the form is not pushed below the fold.
25. As a visitor with a phone, I want the close button at the top right of the card, so that it is where I expect it.
26. As a visitor on a tablet, I want the same single-column card as on a phone, so that nothing is squeezed.
27. As a keyboard user, I want focus moved to the close button when the offer opens, so that I know it has appeared and can dismiss it.
28. As a keyboard user, I want Escape to close the offer, so that I can dismiss it without hunting for the button.
29. As a keyboard user, I want focus returned to where I was when the offer closes, so that I carry on from the same place.
30. As a keyboard user, I want to tab through every field and the button with a visible focus state, so that I can book without a mouse.
31. As a screen reader user, I want the offer announced as a dialog named by its heading, so that I know what has opened.
32. As a screen reader user, I want the heading read as words without the team photos interrupting, so that it makes sense.
33. As a screen reader user, I want the close button labelled "Close", so that I know what it does.
34. As a visitor who prefers reduced motion, I want the offer to appear without fading or rising, so that nothing moves.
35. As an editor, I want to switch the offer on per Service, so that I choose which pages carry it.
36. As an editor, I want to write the offer once on the Site entry, so that every Service that carries it stays in step.
37. As an editor, I want to set the heading, pick its images and choose after how many words they appear, as on the Contact Page, so that I control the Inline Images the same way.
38. As an editor, I want the form I relate on the Site entry to be the one rendered, so that I can swap it later.
39. As an editor, I want to change field labels, placeholders, the privacy statement and the button label in Formie and see them in the offer, so that the copy is mine.
40. As an editor, I want to leave the eyebrow, images, portrait or caption empty and have each simply left out, so that the offer still looks finished.
41. As an editor, I want an offer with no portrait to show as a form-only card, so that I am not forced to find a photo.
42. As an editor, I want the offer not to appear at all while its form or heading is missing, so that a half-written offer never reaches visitors.
43. As a developer, I want the Lead Modal as its own component fed by the Site entry's content, so that the Service template only decides whether to include it.
44. As a developer, I want the Lead Form to reuse the Formie `site` template and the Contact Page's input variants, so that there is one set of form inputs.
45. As a developer, I want the heading to reuse the Heading with Inline Images component at a new size, so that the word-placement logic exists once.
46. As a developer, I want the open, close and scroll-lock behaviour to match the Team Modal, so that the site's overlays behave alike.

## Implementation Decisions

**Prerequisite, control panel (done).** The Lead Generation form's Submit Method is Ajax in Formie, with its "Entry" submit action pointed at the Form Success Page (`/thank-you`). Formie keeps forms in the database, so this is not part of the branch.

**Service entry template.** When the Service's `leadGenerationPopup` lightswitch is on, it includes the Lead Modal component after the Blocks, handing it the Site entry's `leadGenerationPopup` content. It is placed at the top level of the page, outside every Block, so no ancestor's stacking context traps its fixed backdrop and Formie's script finds the form in the document at load; it is not teleported. The global layout is unchanged.

**Lead Modal component.** New. Built from the Site entry's Lead Generation Popup content (`eyebrow`, `headingInlineImages` with `heading`, `wordCount` and `images`, `form`, `image`, `imageCaptionHeading`, `imageCaptionText`).
- Renders nothing unless the form relation holds a form and the heading has words once tags are stripped.
- Backdrop: fixed, full-screen, `z-100`, 70% black with the blur the Team Modal uses, flex-centred. `role="dialog"`, `aria-modal="true"`, labelled by the heading's id. Hidden with `x-cloak` until opened.
- Card: white, 20px corners.
  - Below `lg`: width of the screen less 20px each side, at most 90dvh tall, scrolling inside itself with overscroll contained, 20px padding (30px top so the heading clears the close button).
  - From `lg`: a row, 1006px wide at most, at most 90dvh tall, overflow hidden; the right column scrolls inside itself if the content is taller.
- Left column, only from `lg` and only when an image is set: 365px wide, the card's full height, 20px left corners, the picture component covering it (`object-cover`, not lazy, sized for 365px). Over it:
  - A black-to-transparent fade at the top, about 125px, and a transparent-to-black fade at the bottom, about 230px.
  - The Image Caption, 30px from its left and bottom edges, only when `imageCaptionHeading` has text: the heading 25px (`2xl`) Medium, leading 1.2, tracking -1px, white; beneath it `imageCaptionText` when set, 16px Regular, leading 1.33, white. When the caption heading is empty the bottom fade is left out too.
- Close button: the button shape component as the Team Modal uses it (`md`, the `fa-xmark` icon, `aria-label="Close"`).
  - From `lg` with an image: `white-outline`, 30px from the card's top and left.
  - Below `lg`, or with no image: a black outline variant, 20px from the card's top and right.
- Right column: from `lg` 70px padding on every side and a 501px maximum content width; the whole column below `lg`.
  - The Eyebrow component, when `eyebrow` has text: 16px Medium, black, no rule.
  - The heading: the Heading with Inline Images component, `h2`, colour `black`, the new `6xl` size, `imagePosition` from `wordCount`, images from `images`; 20px beneath the Eyebrow (no margin when there is no Eyebrow). Its id labels the dialog.
  - The Lead Form, 40px beneath the heading.
- Lead Form: rendered with Formie's `site` form template set in the template (as the Contact Page does), with its own theme config:
  - One column at every width: each row full width, 30px between rows.
  - Labels from the field components, none from Formie, for single-line text, email and phone.
  - The inputs are the existing `creme` colour and `contact` size (transparent, Creme 400 border, 37px, 10px corners), so no new input variant.
  - Errors in Primary, as on the Contact Page: the form alert above the fields, each field's error beneath it.
  - The privacy statement, the form's HTML field, 16px Regular Creme 500 with its link in Black Medium, 30px above the button.
  - The submit button: the Secondary pill with the up-right arrow and the page's submit label, full width at every width. The shared submit include currently goes `md:w-auto`; it gains a way to stay full width, leaving the Contact Form unchanged.
- Motion: the backdrop fades in over 200ms ease-out and out over 150ms ease-in; the card rises from 20px below. Both only under `motion-safe`, so under reduced motion it appears and disappears with no transition.

**Lead Modal behaviour.** Alpine data registered by the component in its `{% js %}` block.
- On init, if the session's dismissed flag is set, it does nothing further.
- Otherwise it listens passively to window scroll. When `scrollY` reaches half of the page's scrollable distance (document height less viewport height), it opens and stops listening. A page with no scrollable distance never opens it.
- Open: shows the backdrop, adds `overflow-hidden` to the body, stops Lenis if present, and focuses the close button on the next tick. It remembers the element that had focus.
- Close: from the close button, a click on the backdrop itself, or Escape. Hides it, removes `overflow-hidden`, starts Lenis again, sets the dismissed flag, and returns focus to the remembered element with `preventScroll`, if it is still focusable.
- Submit: when Formie reports a successful submission, it sets the dismissed flag before Formie redirects.
- The dismissed flag is one `sessionStorage` key shared by every Service page. Every read and write is wrapped in try/catch; without storage the modal can open once per page load.
- No focus trap, matching the Team Modal.

**Heading with Inline Images component.** Gains a `6xl` size: `text-4xl` on mobile, `text-5xl` from `md`, `text-6xl` (55px) from `lg`. Leading, tracking and Highlight colours are unchanged, and the tiles keep their em-based proportions, so at 55px they are about 48 by 31 where the node draws 52 by 34. The existing `10xl` users render unchanged.

**Docs.** `CONTEXT.md` was updated during the grilling session.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus recorded behaviour and served HTML where it is not visual.

**Seams.** The one seam is the rendered Service page through the global layout: `/service/ai-focused-search-engine-optimisation`, whose lightswitch is on and whose Site entry content is already saved. `/service/pay-per-click`, switched off, is rechecked at the same seam, and the Contact Page is rechecked for the shared heading, input and submit changes. Nothing is added to the styleguide. No Seed is needed.

**What good evidence looks like.** It shows what a visitor would see: no offer at the top of the page, the offer appearing at the halfway point and matching the node, closing every way the spec says, not coming back in the same session, errors staying in the card, and nothing at all on a Service that is switched off. Modal captures are viewport screenshots, since the backdrop is fixed. Each state starts from a fresh session (sessionStorage cleared) unless it says otherwise.

**Evidence plan.**

Screenshots, AI-focused SEO Service page, viewport capture:

1. 1600, scrolled to just under half the scrollable distance: no modal. Proves it waits.
2. 1600, scrolled past half: the backdrop and the two-column card, the portrait with fades, the close button top left, the Image Caption, the Eyebrow, the heading with the tiles after "Friendly", the three fields, the privacy statement and the full-width pill. Compared against the Figma node. Proves the desktop layout.
3. 390, scrolled past half: the single-column card inside a 20px margin, no portrait or caption, the close button top right, the card scrolling inside itself to the button. Proves the mobile layout.
4. 768, scrolled past half: the same single-column card. Proves the tablet layout.
5. 1600, the Lead Form sent empty: the required-field errors in Primary inside the open modal. Proves client-side validation.

States checked on the site and reported:

6. Closing by the close button, a click on the backdrop and Escape, each from a fresh session: the modal hides, the page scrolls again, focus returns. A click inside the card does not close it. Proves the close behaviours.
7. After closing, reloading the page and scrolling past half again, then visiting another switched-on state of the same session: no modal. Proves the session flag.
8. Keyboard: on open, focus is on the close button; Tab reaches every field and the pill with a visible focus state. Proves keyboard use.
9. Markup: one `role="dialog"` with `aria-modal="true"` whose `aria-labelledby` points at the heading; the tiles `aria-hidden`; the close button named "Close". Proves semantics.
10. Reduced motion emulated: the modal appears and disappears with no transition, end state intact. Proves reduced motion.
11. A valid Lead Form sent: the visitor lands on `/thank-you`, the submission is saved in Formie, and returning to the Service page in the same session shows no modal. Proves the submission and the post-send flag.
12. A server-side rejection (for example an email Formie rejects on the server, forced temporarily and restored afterwards): the error shows inside the open modal with the typed values kept. Proves Ajax errors stay in the modal.
13. `/service/pay-per-click` scrolled to the bottom: no Lead Modal markup served and no modal shown. Proves the lightswitch.
14. The Site entry's image temporarily emptied (restored afterwards): a form-only card at 1600 with the black close button top right. Proves the no-image state.
15. The Site entry's form temporarily emptied (restored afterwards): no Lead Modal markup on the AI-focused SEO page. Proves the required content.
16. The Contact Page at 1600 and 390: heading, inputs and send button as before. Proves the shared components are unchanged.

## Out of Scope

- The Lead Modal on any page other than a Service, or opened by a button or link.
- An editor-set scroll point, delay or frequency.
- Remembering a dismissal beyond the browser session.
- Per-Service content overrides; the content lives only on the Site entry.
- A focus trap, for this or the Team Modal.
- A success message inside the modal instead of the Form Success Page.
- Analytics or tracking events for opens, closes or submissions.
- A dedicated mobile or tablet design.
- Changing the Lead Generation form's fields or copy, which are Formie content.

## Further Notes

- Node geometry at 1600 by 900, text boxes trimmed to cap height: the card at x 297, y 125, 1006 by 650; the portrait at x 297, y 125, 365 by 650; the top fade from y 125 to about 249 and the bottom fade from about 545 to 775; the close button at x 327, y 155; the caption heading at x 327, y 705 and the caption text at y 734, 30px above the card's bottom; the right column's content at x 732 (70px after the portrait), 501 wide, ending 70px before the card's right edge; the Eyebrow at y 195; the heading lines at y 226 and 272; the field labels ending at y 369, 457 and 545 with their 37px fields 10px below; the privacy statement at y 622; the pill at y 663, 501 wide.
- The node's close button layer is named for a 46px circle but its box measures 42px; the button shape component's `md` size is kept, as on the Team Modal.
- The node's tiles have a white border; the component's black colour uses Creme 100, which is kept, as the difference on a white card is negligible.
- The node's text layers are Noi Grotesk Semibold, which this project builds as `font-medium` for body text, as every other Semibold layer on the site.
- The Site entry's field is a Content Block named "Lead Generation Popup" on a "Popup" tab, and the Service's lightswitch shares that name with a tip pointing to it; the handles stay as they are, and "Lead Modal" is the domain name.
- The Lead Generation form's Submit Method was switched from "page-reload" to "ajax" after the grilling session; its submit action stays "Entry", set to the Form Success Page.
- Only the AI-focused SEO Service has the lightswitch on locally.
