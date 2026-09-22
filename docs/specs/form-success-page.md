# Form Success Page

Spec for the Form Success Page: the full-screen black page a visitor lands on after sending a form. In the middle, an Eyebrow over a heading with Inline Images, a short text and a Button Group. At the bottom left, the Success Contacts; at the bottom right, the Social Links. It has the Header in Black and no Footer. It is the second page to use Inline Images, the first to leave out the Footer, and the Social Links become a shared component the Footer's Social Column moves onto.

Design: Figma node `10038-25020` in the Marketing Signals file, a group named "Group 46389" inside a 1600 by 900 frame. No tablet or mobile node exists, so the responsive rules below are decisions, not measurements.

Test URL: `https://marketing-signals.ddev.site:8443/thank-you` (entry 1283, type Entry - Form Success). The Contact Form redirects here.

Branch: feature/form-success-page

Related:
- ADR-0001 applies: the Header is fixed and takes no space, so the page keeps its content clear of it.
- ADR-0004 applies with its new consequence: this template never takes a Hero and is black by design, so it sets the Header Colour to Black itself, as the Error Page does.
- ADR-0002 does not come into play: the content is already in the control panel, and nothing is seeded.
- The Contact Page spec built the Inline Images heading component this page reuses. The Contact Page must render unchanged.
- The Global Footer spec built the Social Column. It must render unchanged after moving onto the Social Links component.
- No new ADR.
- Vocabulary: `CONTEXT.md`, "Form Success Page" section, which gained Form Success Page, Success Contacts and Social Links during the grilling session. Social Column now holds the Social Links rather than defining them.

The branch is code-reviewed against this spec before merge.

## Prerequisites

- The Contact Page (PR #53) is merged, so the reworked Inline Images heading component is on `main`. Done.
- The thank-you entry's content is saved: Eyebrow "Success!", heading "Thank You for Your Enquiry" with Image Position 4 and three images, the text, one "Back Homepage" button, the email and phone links. Done.
- SEOmatic's Same As links hold URLs for Twitter / X, Facebook and LinkedIn. Done.
- Control panel step, not code: in the entry's SEO tab, set robots to `noindex`, so the page stays out of search results. Not yet done.

## Problem Statement

A visitor who sends the Contact Form lands on `/thank-you` and sees the Header, an empty page and the Footer. Nothing tells them the enquiry went through, nothing suggests what to do next, and the editor's success message, images, button and contact details on the entry never reach the page.

## Solution

A black page that fills the screen. In the middle, a small "Success!" Eyebrow sits over a large white heading, "Thank You for Your Enquiry", with three tilted photo tiles set after "Your". Beneath it a short line says when to expect a reply, and a "Back Homepage" button leads back into the site. The email and phone sit as pills in the bottom left corner, and links to Twitter / X, Facebook and LinkedIn sit in the bottom right. The Header shows in Black over the top, and there is no Footer beneath. On a phone everything stacks, with the contacts and social links in flow at the bottom.

## User Stories

1. As a visitor who has just sent a form, I want a page that clearly says my submission was received, so that I know it worked.
2. As a visitor, I want a small "Success!" label above the heading, so that the outcome reads at a glance.
3. As a visitor, I want a large heading thanking me, so that the page feels personal rather than a system message.
4. As a visitor, I want photographs of the team inside the heading, so that I sense the people who will reply.
5. As a visitor, I want the photographs tilted and overlapping, so that they read as a playful group, as on the Contact Page.
6. As a visitor, I want the heading broken over two balanced lines on a desktop, so that it reads as designed rather than one long line.
7. As a visitor, I want a short text saying when I will hear back, so that I know what to expect.
8. As a visitor, I want a button back to the homepage, so that I can carry on browsing.
9. As a visitor, I want the email address as a pill with an email icon, so that I can write if my query is urgent.
10. As a visitor, I want to click the email pill to open my mail app, so that I can write straight away.
11. As a visitor on a phone, I want to tap the phone pill to call, so that I do not have to copy the number.
12. As a visitor, I want links to the company's social profiles, so that I can follow them while I wait.
13. As a visitor, I want social links to open in a new tab, so that I do not lose the page.
14. As a visitor, I want the social links to underline on hover and keyboard focus, so that I can tell they are links.
15. As a visitor, I want the page to fill exactly one screen in black, so that the moment feels calm and complete.
16. As a visitor, I want the Header in its Black colour, so that the logo and menu read on the dark page and I can navigate anywhere.
17. As a visitor, I want no Footer beneath, so that the contact details and social links are not repeated.
18. As a visitor on a short desktop screen, I want the heading never to slide under the Header or into the bottom row, so that nothing overlaps.
19. As a visitor on a phone, I want the heading, text and button sized to fit, so that nothing overflows.
20. As a visitor on a phone, I want the contact pills and social links stacked at the bottom in flow, so that they never cover the message.
21. As a visitor on a phone, I want the pills to wrap onto more lines, so that none is cut off.
22. As a visitor on a phone, I want the page to fill the screen without jumping as the browser bars come and go, so that the layout settles.
23. As a visitor who refreshes or reopens the page, I want the same page, so that a shared or bookmarked link still works.
24. As a screen reader user, I want the heading read as one sentence without the photographs, so that the tiles do not interrupt it.
25. As a screen reader user, I want the heading to be the page's only level-one heading, so that the page has one clear title.
26. As a screen reader user, I want the social links grouped in a labelled navigation region, so that I can find or skip them.
27. As a screen reader user, I want each icon in the pills hidden, so that only the email and number are read.
28. As a keyboard user, I want to tab through the button, the pills and the social links in visual order, so that the order makes sense.
29. As an editor, I want the Eyebrow, heading, images, Image Position, text, button, email and phone I set on the entry to appear, so that I can change them without a developer.
30. As an editor, I want to choose after how many words the images appear, so that I control the Inline Images as on the Contact Page.
31. As an editor, I want italic words in the heading shown in Secondary, so that I can highlight words on the dark page.
32. As an editor, I want to leave any field empty and have that part left out with no gap, so that the page never shows a blank space.
33. As an editor, I want the email and phone labels I enter shown as the pill text, so that I can format the number.
34. As an editor, I want the social links to come from the SEO settings, so that I update them in one place for the whole site.
35. As an editor, I want a social network without a URL left out, so that no dead link appears.
36. As an editor, I want to mark the page noindex in its SEO tab, so that it stays out of search results.
37. As a developer, I want the Footer switched off by a layout variable with a default, so that any page can drop it the same way it sets the Header Colour.
38. As a developer, I want one Social Links component used by the Footer and this page, so that the label map and the SEO read live in one place.
39. As a developer, I want the Inline Images heading to gain a white colour whose tile border follows the page background, so that it works on dark and light pages.
40. As a developer, I want the Footer and the Contact Page to render exactly as before, so that shared components change nothing for existing callers.
41. As a reviewer, I want the page reachable on the DDEV site at a known URL, so that I can compare it against Figma.

## Implementation Decisions

**Fields.** No field or entry type changes. Entry - Form Success already carries:

| Field | Type | Holds |
| --- | --- | --- |
| `eyebrow` | plain text | The Eyebrow |
| `headingInlineImages` | Content Block | `heading` (CKEditor), `wordCount` (the Image Position), `images` (assets) |
| `text` | Rich Text - Simple, handle override | The short text |
| `buttonGroup` | Matrix of Button entries, max 2 | The Button Group |
| `email` | Link, email | The email address and its label |
| `phone` | Link, tel | The phone number and its label |
| `seo` | SEOmatic | Per-entry SEO, including robots |

**Global layout.** The layout gains a `showFooter` variable, defaulting to true, read the same way as `headerColour`: a page template sets it at its top level before the layout renders. When false, the Footer include is skipped. The cursor, Scroll Cue registration, layout guidelines and screensize includes are untouched.

**Page template.** `entryFormSuccess` sets the Header Colour to Black and `showFooter` to false, then renders the page shell. The markup is composed from existing components and lives in the page template; the Success Contacts are written in the template, not a new component, since this is their only use.

**Page shell.** A black, full-bleed panel at least the small viewport height, with the site margins either side and a 40px bottom padding. It is a grid of three rows:
1. A spacer the height of the Header, from the shared header map (ADR-0001).
2. The content, centred vertically and horizontally in the remaining space.
3. The bottom row.

From `lg` the bottom row has a minimum height equal to the Header height, with its content aligned to its bottom edge. The spacer and the bottom row are then the same height, so the content centres in the full viewport as Figma does, and on a short screen it is pushed down rather than overlapped. Below `lg` the bottom row takes its natural height.

**Content column.** A centred column, text centred.

| Element | Component and params | Spacing above (below `lg` / from `lg`) |
| --- | --- | --- |
| Eyebrow | The eyebrow component, `white`, no Rule | none |
| Heading | The Inline Images heading component, `h1`, `white`, size `10xl` | 20px / 30px |
| Text | The rich text component, `white`, size `base` | 30px / 50px |
| Button Group | The Button Group component, colours `['secondary']`, align `center` | 30px / 40px |

- Figma: Eyebrow cap top 270, heading cap top 311, heading last-line baseline 446, text top 496, text bottom 528, button top 568.
- The Eyebrow is 16px Medium, leading 1.33.
- The text is 16px Regular, leading 1.33, with a 494px maximum width, and full width inside the site margins below that.
- The button is the existing button component: Secondary, base size, the default sharp regular arrow-up-right icon after the label. Figma's 15px vertical padding against the component's 12px is left as the component has it, as on every other button.

**Heading.** The Inline Images heading keeps every placement rule from the Contact Page spec. On this page:
- The size ramp is the component's `10xl`: 5xl at mobile, 7xl from `md`, 9xl from `lg`, 10xl (82px) from `xl`. Semibold, leading 0.97, tighter tracking.
- It is centred through the `class` passthrough (`text-center` and `mx-auto`), with no new alignment param.
- It carries `text-balance` at every width.
- From `lg` it has a maximum width of 7.8em (640px at 82px). "Thank You for" is 488px and "Your", the tiles and "Enquiry" are 601px, so the break falls after "for", with balanced lines for other wording. Sized in `em` so the break holds at the 9xl step. Below `lg` it wraps naturally.
- An editor's soft line break is not a documented feature, but the component's tag walker already keeps `<br>`.

**Inline Images heading component changes.** A `white` colour is added to the colour options:
- Heading `text-white`.
- Highlight `not-italic text-secondary`.

The tile border colour moves out of the fixed tile classes and into each colour entry, because it matches the page background:
- `black`: Creme 100 border, as today.
- `white`: Black border (#0E0A10, Figma's value).

Nothing else in the component changes. The Contact Page's `black` output is unchanged.

**Bottom row.** From `lg`, a flex row with space between, items aligned to the bottom: Success Contacts on the left, Social Links on the right. Below `lg`, a column: Success Contacts, then Social Links, 30px between, both left-aligned, with 40px above the row. When both the Success Contacts and the Social Links are empty, the row is left out.

**Success Contacts.** A wrapping flex row with a 10px gap, rendered as the Footer's Contact Column renders its pills:

| Pill | Component | Icon, before |
| --- | --- | --- |
| Email | The button component with the `email` link, `white-10` | `fa-sharp fa-solid fa-paper-plane` |
| Phone | The button component with the `phone` link, `white-10` | `fa-sharp fa-solid fa-phone` |

Each pill shows its field's label and is left out when its field is empty. With both empty, the group is left out. The icons are hidden from assistive technology, as the button component already does.

**Social Links component.** `_components/socialLinks` is rewritten; its icon-on-zinc placeholder is removed.

It owns:
- The read of `seomatic.site.sameAsLinks`.
- The handle-to-label map, in order: `twitter` → "Twitter / X", `facebook` → "Facebook", `linkedin` → "LinkedIn".
- The filter to handles that have a URL.

Params, alongside the standard `class` passthrough:
- `direction`: `vertical` (each link in a 44px-tall row) or `horizontal` (a wrapping row, 30px column gap, 10px row gap).
- `size`: `lg` (18px Medium, leading 1.2, tighter tracking) or `base` (16px Medium, leading 1.33).

Output:
- A `nav` labelled "Social Links" holding a list, with `class` on the `nav`.
- Each link opens in a new tab with `noopener noreferrer` and uses the site's `link` hover underline.
- White text. No `colour` param until a light background needs one.
- Renders nothing when no handle has a URL.

It follows the component conventions: `component` variable, default params, the exact merge line, options, class arrays, output.

**Footer.** The Footer's Social Column drops its own label map, SEOmatic read and list markup and includes the Social Links component with `direction: 'vertical'`, `size: 'lg'` and its existing column class. Its rendered output must match today's.

**Social Links on this page.** The page renders the Social Links with `direction: 'horizontal'` and `size: 'base'`.

**Header.** Black, set by the template (ADR-0004's new consequence). The Header behaves as on any page.

**Empty states.** Each element is left out when its field is empty: the Eyebrow, the heading (no heading words), the text, the Button Group (no buttons), each pill, each Social Link. No fallback copy. Spacing belongs to the element that follows, so a missing element leaves no gap.

**Direct visits.** The page renders the same whether or not a form was just sent. No guard, no query string, no flash message. Indexing is handled by the editor's noindex setting (see Prerequisites).

**Docs.** During the grilling session `CONTEXT.md` gained Form Success Page, Success Contacts and Social Links, and Social Column was reworded to hold the Social Links. ADR-0004 gained a consequence for black page templates with no Hero.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per `docs/agents/evidence.md`, compared against the Figma node at the same width. Evidence goes in `.scratch/evidence/form-success-page/`.

**Seams.**
- The primary seam is the rendered Form Success Page at `/thank-you` through the global layout. The white heading colour, the Success Contacts, the Social Links horizontal variant, the Footer switch and the Header Colour all show there.
- The Home page Footer is the seam for the Social Links vertical variant: a before/after pair that should be identical.
- The Contact Page is the seam for the Inline Images component's `black` colour after the border moves into the colour options: a before/after pair that should be identical.

**What good evidence looks like.** It shows what a visitor would see: the content centred on black at the designed sizes and spacing, the tiles with black borders after "Your", the pills bottom left and the social links bottom right, no Footer, nothing overlapping on a short screen, the stacked mobile layout, and the unchanged Footer and Contact Page. Fixed widths, one state per file, before and after pairs on the PR.

**Evidence plan.**

1. Form Success Page · 1600 · viewport at 1600 by 900. Compared against node `10038-25020`: Eyebrow, heading break after "for", tiles after "Your" with black borders, text, button, the pills 40px from the bottom left, the social links 40px from the bottom right. Proves the desktop layout.
2. Form Success Page · 1024 · viewport at 1024 by 600. Heading at 9xl, still breaking after "for"; nothing under the Header and nothing touching the bottom row. Proves the `lg` step and the short-screen guard.
3. Form Success Page · 390 · full page. Heading at 5xl balanced over several lines, the smaller spacings, the pills wrapping, then the social links, all in flow. Proves the mobile layout.
4. Form Success Page · 1600 · full page. The page ends with the black panel and no Footer beneath it. Proves the Footer switch.
5. Form Success Page · 1600 · hover on "Facebook", then on the email pill, one state per file. Proves the underline and the pill hover.
6. Rendered HTML of the Form Success Page. The heading is the only `h1`; the tile group is `aria-hidden`; the social links sit in a `nav` labelled "Social Links"; each opens in a new tab with `noopener noreferrer`; no inline styles. Saved as a text file. Proves the accessibility story.
7. Home page Footer · 1600 · viewport on the Footer columns, before and after. Identical Social Column. Proves the Footer moved onto the component unchanged.
8. Contact Page · 1600 · viewport on the heading, before and after. Identical tiles with Creme 100 borders. Proves the component's `black` colour is unchanged.
9. Form Success Page · 1600 · viewport with the email, phone and button temporarily cleared on the entry. The text sits with no gap beneath where the button was; only the social links remain in the bottom row. Restored afterwards. Proves the empty states.

## Out of Scope

- A guard, flash message or query string that tells a real submission from a direct visit.
- A template-level noindex. The editor sets it in the SEO tab.
- Other forms' redirects. Any form can point at this entry; wiring them is not part of this spec.
- Instagram, YouTube or any network beyond Twitter / X, Facebook and LinkedIn in the Social Links.
- A `colour` param on the Social Links.
- An entrance animation. The design has none.
- A dedicated mobile design. The mobile rules above are decisions until one exists.
- Seeding. The entry already holds the content.

## Further Notes

- Figma's heading tracking is -3.28px at 82px (-4%), the tighter tracking token, as on the Contact Page.
- Figma names the email pill "Creme 201" but fills it White 10%, the same as the phone pill; both use `white-10`.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
- The content's centre in Figma sits about 10px above the frame's centre only because Figma trims the Eyebrow's and button's line boxes; centring the column in the viewport matches it.
- The Contact Form's `submitAction` already points at this entry (the Contact Page spec, Further Notes).
