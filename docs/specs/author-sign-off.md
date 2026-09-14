# Author Sign-off

Spec for the Author Sign-off: the close of a Blog's Longform, beneath a Creme 300 Divider, showing the Author's Image beside "Written by" their name and when the Blog was last updated, their Author Description, and a Button Group linking to their Author Page and the Contact Page. It renders inside the Longform's body column, so it lines up with the article and the sidebars keep sticking beside it.

Design: Figma node `10045-25059` in the Marketing Signals file, a group named "Group 46392", 750 by 246 inside a 1600 frame, for Gareth Hoyle: the Divider, a 42px round Image, "Written by Gareth Hoyle" over "Last updated 2 days ago", the Author Description beneath, and the pills "Meet Gareth" (Secondary) and "Let's work together" (Creme 300 outline), each with the up-right arrow. The node draws neither the gap between the article and the Divider, nor a tablet, mobile or hover frame, so those are decisions, not measurements.

Branch: feature/author-sign-off

Related: the Blog Longform and Career Longform specs, which own the Longform layout component, adopted unchanged except for the one optional value below; the Author Page spec, whose Author Page the first button opens and whose Author Description the Sign-off shows; the Blog Hero spec, whose Avatar Group also shows the Author. ADR-0002 applies: the review content arrives by Seed. ADR-0003 applies: the Contact Page is found by its entry type. ADR-0005 applies: the Author is the Blog's `author` relation to a Team Member. ADR-0006 applies: the Author Page is the Team Member's own URL. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, which gained **Author Sign-off** and widened **Author Description** and **Divider** during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A visitor who reaches the end of a Blog has nowhere obvious to go next. The Blog Hero names the Author under "Written by", but by the last paragraph that is a page and a half behind them, and the Longform simply stops above the Footer. There is nothing telling the reader who wrote what they just read, whether it is still current, where to find more from the same person, or how to start working with the agency that published it.

Editors have already written the pieces: a Blog has an Author, a Team Member has an Author Description and an Author Page. None of it reaches the bottom of the article.

## Solution

Every Blog with an Author closes its Longform with an Author Sign-off. 100px beneath the article's last line, a 1px Creme 300 Divider runs the width of the article. 50px beneath it, the Author's Image sits in a 42px circle, with "Written by" in Creme 500 and the Author's name in Black on one line beside it, and "Last updated 2 days ago" beneath. Under that, the Author Description, then a Button Group of "Meet Gareth", opening the Author Page, and "Let's work together", opening the Contact Page.

"Last updated" is relative for a week ("2 days ago") and a date after it ("Last updated 12 September 2026"). A Blog without an Author has no Divider and no Sign-off. An Author without an Author Description shows the name, date and buttons with nothing between. An Author without an Image shows their initials in the circle. Without a Contact Page only "Meet Gareth" shows.

From the tablet breakpoint the Author Description and buttons line up with the name, as the node draws; on a phone they start at the left edge beneath the Image, so the text keeps its line length.

A Seed gives Gareth Hoyle the design's Author Description so the Google NavBoost Explained Blog, already his, can be reviewed against the design.

## User Stories

1. As a visitor, I want to see who wrote the article when I finish it, so that I know whose view I have just read.
2. As a visitor, I want the Author's photo beside their name, so that the writer feels like a real person.
3. As a visitor, I want to know when the article was last updated, so that I can judge whether its advice is still current.
4. As a visitor, I want a recent update shown as "2 days ago", so that I can tell at a glance it is fresh.
5. As a visitor, I want an older update shown as a date, so that "46 days ago" does not make me count.
6. As a visitor, I want a short introduction to the Author, so that I know why their view is worth trusting.
7. As a visitor, I want a "Meet" button with the Author's first name, so that I can see everything else they have written.
8. As a visitor, I want a "Let's work together" button, so that I can get in touch with the agency while I am persuaded.
9. As a visitor, I want the Sign-off separated from the article by a line, so that I can tell the article has ended.
10. As a visitor, I want the Sign-off lined up with the article's column, so that it reads as part of the same page.
11. As a visitor, I want the Table of Contents and share buttons to stay beside me while I read the Sign-off, so that the page does not jump.
12. As a visitor, I want the buttons to respond to hover as every other pill on the site does, so that they feel clickable.
13. As a visitor with a phone, I want the introduction and buttons to use the full width beneath the photo, so that the text is not squeezed.
14. As a visitor with a phone, I want the buttons to wrap onto a second line when they do not fit, so that nothing overflows.
15. As a keyboard user, I want both buttons reachable in order with a visible focus ring, so that I can follow them without a mouse.
16. As a screen reader user, I want the Sign-off announced as a labelled region about the author, so that I can recognise or skip it.
17. As a screen reader user, I want the photo or initials left out of what is read, so that I do not hear the name twice.
18. As a screen reader user, I want the Sign-off kept out of the heading outline, so that the article's headings stay the article's.
19. As a screen reader user, I want the update date exposed as a machine-readable time, so that the date is unambiguous.
20. As an editor, I want the Sign-off to appear as soon as I set a Blog's Author, so that I have nothing else to switch on.
21. As an editor, I want a Blog without an Author to end cleanly with no empty line or card, so that uncredited articles do not look broken.
22. As an editor, I want an Author's introduction written once on their Team Member and shown on every Blog they wrote, so that I never retype it.
23. As an editor, I want an empty Author Description to leave the introduction out rather than show the Team Modal text, so that nothing appears I did not write for readers.
24. As an editor, I want an Author without a photo still to look tidy, so that I am not forced to upload one first.
25. As an editor, I want the "Let's work together" button to follow the Contact Page wherever it lives, so that renaming its slug does not break every Blog.
26. As an editor, I want the button hidden if there is no Contact Page, so that no Blog links to a missing page.
27. As an editor, I want the "Meet" button to follow the Author's slug, so that it always opens their current Author Page.
28. As an editor of a Career or a Text Page, I want their Longform unchanged, so that the Sign-off only appears on Blogs.
29. As a developer, I want the Sign-off as its own component handed to the Longform, so that the shared Longform stays free of Blog-specific knowledge.
30. As a reviewer, I want a Seed that fills Gareth Hoyle's Author Description, so that I can check the Sign-off against the design.

## Implementation Decisions

**Author Sign-off component.** A new component, built from the Blog alone. It reads the Blog's Author (the `author` relation, at most one). With no Author it outputs nothing at all, Divider included. Otherwise, in order:
- An `aside` labelled "About the author", with 100px (`mt-25`) above it at every width, matching the Longform's gap before each H2 after the first.
- The Divider: a 1px Creme 300 top border across the full body column, with 50px beneath it to the Image row.
- The Image row: the avatar component at its `sm` size (42px, round, Creme 200 behind), fed the Team Member's Image and name, so a Team Member without an Image shows the avatar component's initials. The avatar is decorative: empty alt on the image and hidden from assistive technology, initials included. 10px (`gap-2.5`) to the text beside it.
- Beside the Image, top-aligned, two lines 8px apart: "Written by" in Creme 500 then a space and the Author's `title` in Black, 16px Medium, leading 1.33, on one line; beneath it "Last updated " followed by the Blog's `dateUpdated` through the date component in its relative mode with format `j F Y`, 14px Medium, leading 1.33, tighter tracking, Black. The date component's relative mode is used as it already behaves: "N days ago" (or hours, minutes) within seven days, the formatted date after, inside a `<time datetime>`. Neither line is a heading.
- The Author Description, only when it has text once tags are stripped, through the rich text component at `base` size in Black with Medium weight, 25px beneath the Image row's text.
- The Button Group, 20px beneath the Author Description (or beneath the Image row's text when there is none), default `start` alignment, `base` size, `inline` icon style with the button component's default up-right arrow, colours `secondary` then `creme-300-outline`. The buttons are built in the template, not editor fields:
  - "Meet " followed by the first word of the Author's `title`, linking to the Author's URL.
  - "Let's work together", linking to the Contact Page, which is the entry in the `page` section of the Contact entry type (`entryContact`), found by type as ADR-0003 finds listing pages. With no such entry, this button is left out.
  - Both open in the same tab.
- Indent: from `md`, the Author Description and Button Group start 52px in, level with the name (42px Image plus the 10px gap). Below `md` they start at the left edge of the column, beneath the Image row.

**Longform layout component.** Gains one optional value, closing content, empty by default. When given, it is output at the end of the body column, beneath the last body chunk, inside the same column so it spans columns 4 to 9 from `xl` and the full single column below. The Longform's visibility rule is unchanged: when the article has no text the section, and so the closing content, is not rendered. Career and Text Page pass nothing and render exactly as today.

**Blog entry template.** Captures the Author Sign-off component's output for the Blog and passes it to the Longform as its closing content. Nothing else on the Blog page changes; the Longform section's own bottom padding stays beneath the Sign-off.

**Seed.** One Seed under `.scratch/seeds/author-sign-off/`, not committed, targeting `gareth-hoyle` in the `team` section, `fields.authorDescription` the node's copy: "Gareth Hoyle is the Managing Director and Founder of Marketing Signals, a specialist SEO and digital marketing agency. He has over 15 years of experience helping businesses grow through search, and has built Marketing Signals into one of the UK's most respected independent agencies". The Google NavBoost Explained Blog already has Gareth as its Author, so no Blog Seed is needed.

**Docs.** `CONTEXT.md` was updated during the grilling session.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The one seam is the rendered Blog page through the global layout, at `/insights/google-navboost-explained-how-click-behaviour-affects-rankings-and-how-to-track-user-engagement`; the Sign-off, the Divider, the Contact Page lookup and the Longform's new value all show there. Because the Longform is shared, a Career page is rechecked at the same seam for regression. The Seed command's output is supporting evidence. Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor would see at the end of the article: the line, the right person's photo and name, a believable update date, their introduction, and two pills that go to the right places; and a Blog with no Author that ends cleanly. The group review takes the screenshots of record once; every other line is a state checked on the site and reported.

**Evidence plan.**

Screenshots, the Google NavBoost Explained Blog, scrolled to the end of the Longform, resting state:

1. 1600: the Divider 100px beneath the last paragraph across columns 4 to 9; the 42px Image; "Written by" in Creme 500 and "Gareth Hoyle" in Black on one line, "Last updated …" beneath; the Author Description indented level with the name; "Meet Gareth" Secondary and "Let's work together" Creme 300 outline, each with the up-right arrow; the sticky sidebars still beside the column. Compared against the Figma node. Proves the desktop layout.
2. 768: the same order in the single column, the Author Description and buttons still indented level with the name. Proves the tablet layout.
3. 390: the Image row, then the Author Description and buttons starting at the left edge beneath the Image, the buttons wrapping if they do not fit. Proves the mobile layout.

States checked on the site and reported:

4. "Meet Gareth" opens `/authors/gareth-hoyle`; "Let's work together" opens the Contact Page; both in the same tab. Proves the links.
5. Hover (fine pointer) and keyboard focus on both buttons: the button component's own hover and a visible focus ring, in tab order after the article's content. Proves interaction.
6. Markup: one `aside` with the accessible name "About the author"; no heading element inside it; the avatar hidden from assistive technology with an empty alt; a `<time>` whose `datetime` is the Blog's `dateUpdated`. Proves semantics.
7. The Blog's `dateUpdated` within seven days reads "Last updated N days ago" (or hours); a Blog last saved more than seven days ago reads "Last updated D Month YYYY". Proves the date wording.
8. Gareth's Author Description temporarily emptied (restored afterwards): no description, the buttons 20px beneath the "Last updated" line. Proves the empty Author Description.
9. Gareth's Image temporarily removed (restored afterwards): his initials "GH" in the circle. Proves the no-Image state.
10. The Contact Page temporarily disabled (restored afterwards): only "Meet Gareth" shows. Proves the missing Contact Page.
11. A Blog with no Author: the Longform ends with no Divider and no Sign-off. Proves the no-Author state.
12. A Career page: its Longform renders as before, with no Sign-off. Proves the shared Longform is unchanged.
13. The Seed run with `--dry-run`, then for real, then a second time: Gareth's Author Description set on the first run, the second writing nothing new. Proves the seeding.

## Out of Scope

- Linking the Blog Hero's Avatar Group, a Blog Card or the Team Modal to the Author Page.
- An editor-set "last updated" date separate from Craft's own `dateUpdated`, or hiding the line.
- Editor fields for the Sign-off's labels or buttons, or a per-Blog override of the Author Description.
- Showing the Job Role, Quote or Team Modal text in the Sign-off.
- Person or author schema markup.
- A Sign-off on Careers or Text Pages.
- More than one Author per Blog, or guest Authors who are not Team Members (ADR-0005).
- A dedicated mobile or tablet design.
- Committing the Seed.

## Further Notes

- Node geometry at 1600, text boxes trimmed to cap height: the Divider at x 425, y 8853, 750 wide, its 1px Creme 300 line at the top of a 50px box; the Image at x 425, y 8903, 42 square; the text frame at x 477, y 8910, "Written by Gareth Hoyle" then "Last updated 2 days ago" 19px lower (8px gap between trimmed lines); the Author Description at x 477, y 8963, 698 wide, four lines; the buttons at y 9057, "Meet Gareth" at x 476, 152 by 42, "Let's work together" at x 635, 204 by 42.
- The node draws the gap between the buttons as 7px; the Button Group's existing 10px gap is kept.
- The node's text layers are Noi Grotesk Semibold, which this project builds as `font-medium`, as every other Semibold layer on the site.
- "Last updated" follows `dateUpdated`, so any save, a Seed run included, resets it to "just now"; that is accepted rather than adding a field.
- Twenty-four Blogs exist locally; only the Google NavBoost Explained Blog has an Author (Gareth Hoyle). No Team Member has an Author Description on this database, because the Author Page Seed was lost with its worktree.
