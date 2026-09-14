# Career Longform

Spec for the Longform on a Career page: the Career's written body beneath the Career Hero, with the Table of Contents, the Reading Progress and the Read Time beside it on the left and the Sidebar Card and the Share Buttons beside it on the right. The Longform's text renders now; the nested entries an editor can place inside it (Video, Image, Image Columns, Button Group, Quote) are a later round. It is built as one layout component taking an entry, so the Blog page can adopt it in a later round with no new layout.

Design: Figma node `9991-15569` in the Marketing Signals file, a group named "Group 46386", 1520 by 486 inside a 1600 frame, for the USA Focused Senior Digital PR Manager career. The node shows the top of the Longform only. No tablet or mobile node exists; the responsive rules below are decisions, not measurements. The node's Table of Contents entries are placeholder copy and its styling is a starting point, per the brief.

Branch: feature/career-longform

Related: the Hero Career spec, whose Apply Button targets the anchor this spec moves onto the Longform, and whose Lenis scroll handler the Table of Contents and the Sidebar Card button repeat; the Content Seeding spec, whose entry `fields` map fills the Longform and the Sidebar Card, Content Block included; the Blog Hero spec, whose Read Time literal this spec does not change. ADR-0001 applies: the header is fixed, so the sticky columns and every in-page scroll clear the header height from the shared header map. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, which gained a "Longform" section during the grilling session with Longform, Table of Contents, Reading Progress, Sidebar Card and Share Buttons, and whose Read Time now covers the Career.

The branch is code-reviewed against this spec before merge.

## Problem Statement

A Career page ends at its Hero. The Career entry already has a Longform field for the role's full description and a Sidebar - CTA field for an application prompt, and neither reaches the page. A visitor who presses Apply Now is scrolled to an empty anchor above the footer: no description of the agency or the role, no way to see what the page covers or how long it takes to read, nothing inviting them to apply beside the text, and no way to pass the role on to someone else. An editor who writes the Longform or switches the Sidebar - CTA on sees no effect.

## Solution

Beneath the Career Hero, the Longform section renders on the Creme 100 page. From the `xl` breakpoint it is three columns of the twelve-column grid.

On the left, columns 1 to 3, sticking beneath the fixed header while the Longform scrolls: the label "Table of Contents" in 14px Creme 500, then a numbered list of the Longform's H2 headings in 15px Black, 20px apart, the heading being read in Primary and underlined. 40px beneath the list, the Reading Progress: a 3px rounded Creme 300 bar that fills in Primary as the visitor scrolls through the Longform, full at its end. 20px beneath it, centred, a clock icon and the Read Time, "5 min read", counted from the Longform.

In the middle, columns 4 to 9: the Longform itself. H2s at 46px Semibold, 25px above the paragraph beneath, and 100px between one section's end and the next H2; body text at 16px Black.

On the right, columns 10 to 12, sticking the same way: the Sidebar Card, a 305px white card with 20px corners and 30px padding holding up to three 33px avatars overlapping by 6px, 20px beneath them a 30px Medium heading centred with its Highlight in Primary, and 20px beneath that a full-width Secondary "Apply Now"-style button with a down arrow. 50px beneath the card, "Share this career" in 14px Creme 500, and 20px beneath that the Share Buttons: four 35px Creme 100 circles with a Creme 300 outline, 5px apart, for LinkedIn, Facebook, X and copy link, each turning Primary with a white icon under the pointer or keyboard focus.

Below `xl` the section is one column, the Longform capped at 750px: the Table of Contents as a plain list, the Read Time, the Longform, the Sidebar Card, then the Share Buttons. The Reading Progress is hidden there; nothing sticks.

The Apply Button in the Career Hero now lands on the top of this section. A Seed fills the Career with the node's copy plus enough sections to scroll, and a switched-on Sidebar Card, so the page can be reviewed against the design.

## User Stories

1. As a visitor, I want the role's full description beneath the hero, so that I can read about the agency and the job before applying.
2. As a visitor, I want the description's section headings large and bold, so that I can scan the page for the part I care about.
3. As a visitor, I want a numbered list of the page's sections beside the text, so that I know what the page covers before I read it.
4. As a visitor, I want to click an entry in that list and be scrolled smoothly to its section, so that I can jump to what I need.
5. As a visitor, I want the section I am reading marked in the list, so that I know where I am on a long page.
6. As a visitor, I want an entry to turn Primary and underlined when I point at it, so that I know it is a link.
7. As a visitor, I want the list to stay beside me as I scroll on a desktop, so that I can jump sections from anywhere.
8. As a visitor, I want a thin bar that fills as I read and is full when I reach the end, so that I know how much is left.
9. As a visitor, I want to see how many minutes the page takes to read, so that I can decide whether to read it now.
10. As a visitor, I want the read time to reflect the actual text, so that a short role and a long role show different figures.
11. As a visitor, I want an invitation to apply beside the text, so that I can act the moment I am convinced.
12. As a visitor, I want that invitation to stay beside me as I scroll on a desktop, so that I never have to scroll back up to apply.
13. As a visitor, I want faces on the invitation, so that I know real people read applications.
14. As a visitor, I want the invitation's button to take me to where I apply, so that the button does what it says.
15. As a visitor, I want to share the role to LinkedIn, Facebook or X in a small window, so that I can pass it to someone suited to it without leaving the page.
16. As a visitor, I want to copy the role's link in one click, so that I can paste it into a message.
17. As a visitor, I want to see that the link was copied, so that I do not click again unsure.
18. As a visitor, I want the share buttons to turn Primary when I point at them, so that I know they are buttons.
19. As a visitor, I want Apply Now in the hero to land me at the top of the description, clear of the header, so that the first thing I see is the start of the text.
20. As a visitor with a phone, I want the section list above the description, so that I can still jump to a section.
21. As a visitor with a phone, I want the read time above the description, so that I still know how long it is.
22. As a visitor with a phone, I want the invitation and share buttons after the description, so that the text is not pushed down the screen.
23. As a visitor with a phone, I want no progress bar and nothing sticking, so that the narrow screen is not crowded.
24. As a visitor on a tablet or small laptop, I want the stacked layout rather than cramped columns, so that the invitation's heading and button fit.
25. As a visitor, I want a link to a section of the page to land on that section even when I open it directly, so that shared section links work.
26. As a keyboard user, I want every list entry, the invitation's button and every share button focusable with a visible ring, so that I can use the page without a mouse.
27. As a keyboard user, I want focus to move to the section I jumped to, so that my next Tab continues from there.
28. As a screen reader user, I want the section list announced as a labelled navigation with an ordered list, so that I know what it is and how many sections there are.
29. As a screen reader user, I want each share button named for what it does, so that I hear "Share on LinkedIn" rather than an icon.
30. As a screen reader user, I want to hear "Link copied" after copying, so that I get the same confirmation as sighted visitors.
31. As a screen reader user, I want the avatars, icons and progress bar kept out of what is read, so that I hear only content.
32. As a visitor who prefers reduced motion, I want section jumps to be instant and the bar to update without easing, so that nothing glides that I asked not to.
33. As a visitor, I want the page to work when an editor has placed a video or quote in the description that the site cannot show yet, so that the page never breaks.
34. As an editor, I want the Longform I write on the Career entry to appear on the page, so that the field means something.
35. As an editor, I want every H2 I write to appear in the section list without typing numbers, so that the list keeps itself up to date.
36. As an editor, I want only H2s in the list, so that H3s I use for detail do not clutter it.
37. As an editor, I want a Longform with no H2s to show no section list, so that the page does not show an empty label.
38. As an editor, I want the read time counted for me, so that I never have to update it.
39. As an editor, I want to switch the Sidebar Card on or off per Career, so that a closed or unusual role can go without it.
40. As an editor, I want a switched-on Sidebar Card with no heading to stay hidden, so that an unfinished card never shows.
41. As an editor, I want to leave the avatars or the button empty and have them left out, so that a simpler card still looks finished.
42. As an editor, I want italic words in the card's heading shown in Primary, so that I choose the Highlight as I do everywhere else.
43. As an editor, I want to point the card's button at a section further down the Longform with a `#heading` link, so that Apply Now can jump to the application details in the text.
44. As an editor, I want each H2's link address to follow its text, so that I can guess `#about-the-role` without inspecting the page.
45. As an editor, I want the share label to read "Share this career" on a Career, so that it fits what the page is.
46. As a developer, I want the whole section as one layout component taking an entry, so that the Blog page can adopt it with one include.
47. As a developer, I want the share label passed to that component, so that the Blog can say "Share this article" without a fork.
48. As a developer, I want the table of contents, scroll progress, read time and social share components restyled and extended rather than replaced, so that the library stays one set of components.
49. As a developer, I want heading anchors added when the page renders, so that section links, the Table of Contents and the card button all share one set of ids that exist without JavaScript.
50. As a developer, I want the Apply Button's anchor on the section itself, so that the empty placeholder element goes away.
51. As a reviewer, I want a seeded Career with enough sections to scroll and a filled Sidebar Card, so that I can check the design, the sticking, the progress and the list's active state.

## Implementation Decisions

**Fields.** No new fields. The Career entry type already has `longform` (Rich Text - Longform, a CKEditor field allowing H2 to H6 and nested Longform entries) on its Page Content tab and the Sidebar - CTA Content Block on its Overview Content tab, holding a `sidebarCta` lightswitch, `avatars` (Images, max 3), `heading` (Heading) and `button` (Button, a Link). The Blog entry type has the same two fields and is not changed.

**Layout component.** A new `longform` component with the standard sections, taking `entry`, `vars`, `shareLabel` (default "Share this article") and `class`. The Career entry template includes it where its "Longform Career Post" placeholder sits, passing `shareLabel` "Share this career". It renders a section wrapper carrying the id `career-content`, the scroll margin for the fixed header from the shared header map, and a tabindex of -1, replacing the empty anchor element the Hero Career spec placed; the Apply Button keeps working unchanged. The id is currently fixed to the Career's value; when Blog adopts the component it becomes a param. Nothing renders when the Longform has no content.

**Grid.** A twelve-column grid with a 20px gap inside the site margins. From `xl`: left column 1 to 3, the Longform 4 to 9, right column 10 to 12, all on one row. Both side columns stick beneath the fixed header, offset by the header height plus a gap, and stop at the end of the Longform because the row ends there. The Table of Contents and the Reading Progress are 257px wide at the start of their column; the Sidebar Card and the Share Buttons are 305px wide at the end of theirs, both capped to the column so they shrink rather than overflow between `xl` and the design width. Below `xl`: one column, the Longform, Sidebar Card and Share Buttons capped at 750px and left-aligned with the Longform, in the order Table of Contents, Read Time, Longform, Sidebar Card, Share Buttons; the Reading Progress hidden; nothing sticky. The order change is by grid placement, not duplicated markup.

**Longform body.** The CKEditor field's chunks are looped: text chunks render through the rich text component in black, nested entry chunks render nothing this round and never error. The rich text component's heading ramp is left alone for its other callers; the Longform passes a size that sets H2 to the 5xl step (46px, Semibold, leading 0.97, tighter tracking), 25px beneath an H2 to its paragraph, and 100px above every H2 but the first, and body at base (16px, leading 1.33). The H3 to H6 sizes follow the existing ramp. Mobile H2 steps down as the rich text 5xl option already does: 3xl, 4xl from `md`, 5xl from `lg`.

**Heading anchors.** Every H2 in the Longform's text gets an `id` when the page renders, from its text with tags stripped, lower-cased and hyphenated ("About the role" to `about-the-role`); a repeated slug gains a numeric suffix. Every H2 also carries the header's scroll margin so a native jump lands clear of it. The Table of Contents reads these ids and no longer writes them.

**Table of Contents.** The `tableOfContents` component is changed, not replaced. It takes the id of the Longform container and a `heading` label (default "Table of Contents"). It collects H2s only, no H3s. It renders a `nav` labelled by its visible label, with an ordered list numbered by the list itself ("1.", "2."), not by editor text. Placeholder zinc styling is replaced: label 14px Creme 500 tracking tight; entries 15px Black leading 1.33, 20px apart; the active entry and any hovered or keyboard-focused entry Primary and underlined; a visible focus ring. The active entry is the last H2 whose top has passed a line a third of the way down the viewport, recomputed on scroll, and the first entry is active before any has passed. Clicking an entry pushes its hash to the address, scrolls through Lenis clearing the header (instant under reduced motion) and moves focus to the heading. Where the Longform has no H2s the component is not rendered at all, label included, which the layout decides server-side from the anchored markup. Below `xl` it renders the same list, not sticky.

**Reading Progress.** The `scrollProgress` component is changed, not replaced. Its bar is restyled to the design: a 3px Creme 300 track with rounded ends and a Primary fill with rounded ends. It keeps its ScrollTrigger range, start when the Longform's top meets the viewport's top, end when its bottom meets the viewport's bottom, so it is empty at the start and full at the end. Under reduced motion the fill is set directly rather than eased. It is decorative and hidden from assistive technology. Hidden below `xl`.

**Read Time.** The `readTime` component is changed to print "N min read" (at least 1) rather than a formatted duration, and gains an optional clock icon (sharp regular clock, 12px, 7px gap, decorative) and the design's text classes. It counts words in the Longform's text chunks only, at its existing 265 words per minute. It sits 20px beneath the Reading Progress, centred on the bar's width, at `xl`; above the Longform, left-aligned, below `xl`. The Blog Hero's literal is unchanged.

**Sidebar Card.** Rendered only when the lightswitch is on and the heading has text once tags are stripped. A white card, 20px corners, 30px padding, content centred, 305px wide at most. Avatars: up to three of the Images field, each a 33px circle, overlapping by 6px, decorative with empty alt; left out when empty, and a new overlapping-avatars markup inside the card, not a change to the Avatar Group component, which pairs a single avatar with a name. Heading: the alternate heading component, `h2`, 30px Medium leading 1.2 tighter tracking, centred, black with its Highlight in Primary, 20px beneath the avatars (or at the top without them). Button: the button component in its `secondary` colour, full width, 20px beneath the heading, the editor's link label, and the sharp regular arrow-down icon after it rather than the default arrow; left out when the link is empty. When the link is a `#hash` on this page the button scrolls through the same Lenis handler as the Table of Contents; any other link follows normally, honouring its target.

**Share Buttons.** The `socialShare` component is changed, not replaced. It gains a `heading` param rendered as the 14px Creme 500 label above the buttons, 20px above them, and a `copy` handle alongside the existing ones. Default zinc styling is replaced: 35px circles, Creme 100 fill, 1px Creme 300 border, 13px Black icon, 5px apart; under the pointer or keyboard focus Primary fill and white icon, with a visible focus ring. The layout passes links LinkedIn, Facebook, X and copy, in that order, and the label "Share this career" on a Career. LinkedIn, Facebook and X keep their share-window behaviour. Copy is a `button`, not a link: it writes the page's absolute URL to the clipboard, swaps its icon to a sharp regular check for two seconds and back, and announces "Link copied" through a polite live region. The copy icon is the sharp regular link icon. 50px beneath the Sidebar Card, or at the top of the column when there is no card.

**JavaScript.** The Lenis scroll-to-hash handler used by the Table of Contents and the Sidebar Card button lives in the layout component's own `{% js %}` block; the Apply Button's handler in the Career Hero is left as it is. The copy behaviour lives in the share component's block. All Alpine logic stays minimal.

**Seed.** One Seed under `.scratch/seeds/career-longform/`, not committed, targeting the USA Focused Senior Digital PR Manager Career through its `fields` map:
- `longform`: the node's "About Marketing Signals" and "About the role" sections with their paragraphs, followed by at least four more H2 sections of role copy (responsibilities, about you, benefits, how to apply) with paragraphs and one bullet list and one H3, long enough that the page scrolls well past two viewport heights at 1600.
- `sidebarCta`: `sidebarCta` true, `heading` "Apply now for *this role*" with "this role" italic, `avatars` the three avatar images downloaded from the node, `button` a URL link `#how-to-apply` labelled "Apply Now".
The Account Manager Career needs no Seed: its empty Longform and Sidebar Card prove the section renders nothing.

**Docs.** `CONTEXT.md` gained the "Longform" section and a widened Read Time during the grilling session. No ADR change.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML and Seed output where the behaviour is not visual.

**Seams.** The one seam is the rendered Career page through the global layout, at the seeded USA Focused Senior Digital PR Manager Career and the unseeded Account Manager Career; the four changed components and the new layout show every state there. The Seed command's output is supporting evidence. Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor would see: the three columns under the hero, the numbered list with its active entry, the read time, the white card with its avatars and lilac button, the round share buttons, and the stacked order on a tablet and a phone. The group review takes the screenshots of record once, at the three widths below, resting state; every other line is a state checked on the site and reported, not captured.

**Evidence plan.**

Screenshots, resting state, USA Focused Senior Digital PR Manager:

1. 1600, full page: Table of Contents in columns 1 to 3 with the first entry Primary and underlined, the bar and the Read Time centred beneath it; the Longform in columns 4 to 9 opening with "About Marketing Signals" at 46px; the Sidebar Card in columns 10 to 12 with three overlapping avatars, "Apply now for *this role*" with the Highlight in Primary and the Secondary button with a down arrow; "Share this career" and four outlined circles 50px beneath. Compared against the Figma node. Proves the desktop layout.
2. 768, full page: the stacked single column, Table of Contents, Read Time, Longform, Sidebar Card, Share Buttons, no bar. Proves the layout below `xl`.
3. 390, full page: the same stacked order at phone width, H2s at 3xl. Proves the mobile layout.

States checked on the site and reported:

4. 1600, scrolled to the middle of the Longform: both side columns still beside the text beneath the header, a later entry active, the bar about half full. Proves sticking, the active entry and the progress.
5. 1600, scrolled to the end of the Longform: the bar full and the side columns released at the section's end. Proves the full bar and the sticky stop.
6. 1280, top of the Longform: three columns with the card and share buttons fitting their column. Proves the `xl` start.
7. A Table of Contents entry clicked at 1600: smooth scroll to its H2 clear of the header, the address carries its hash, focus on the heading; with `prefers-reduced-motion: reduce` it jumps. Proves the list's scroll.
8. A section URL such as `…#about-the-role` opened directly with JavaScript disabled: the page lands on that H2 clear of the header. Proves server-side anchors.
9. The Sidebar Card button clicked: scrolls to "How to apply". Proves the hash link.
10. Hovered and keyboard-focused states on a Table of Contents entry, a share button and the card button: Primary and a visible focus ring. Proves hover and focus.
11. The copy button clicked: the clipboard holds the page's absolute URL, the icon shows a tick for two seconds, and the live region reads "Link copied". LinkedIn clicked: a share window opens with the page URL. Proves sharing.
12. The Sidebar Card with the switch on and the heading cleared (restored afterwards): no card, and the Share Buttons at the top of the column. Avatars and button cleared in turn: each left out. Proves the card's empty states.
13. The Longform with its H2s temporarily turned into paragraphs (restored afterwards): no Table of Contents and no label, the bar and Read Time still shown. Proves the empty list.
14. A nested Quote entry temporarily added inside the Longform (removed afterwards): the page renders without error and the quote shows nothing. Proves the chunk guard.
15. The Account Manager Career: nothing between its Hero and the footer. Proves the empty section.
16. The Hero's Apply Now clicked: lands at the top of the Longform section clear of the header. Proves the moved anchor.
17. Markup: one element with id `career-content`; each H2 carries its slug id; the Table of Contents is a labelled `nav` with an `ol`; the share buttons are named; copy is a `button`; avatars, icons and the bar are hidden from assistive technology. Proves the markup.
18. The Seed run twice: every field set and the avatar images uploaded on the first run, reused on the second. Proves the seeding.

## Out of Scope

- Rendering the Longform's nested entries (Video, Image, Image Columns, Button Group, Quote). They render nothing until their own round.
- The Blog page adopting the layout, and replacing the Blog Hero's, Blog Card's and Playbook Card's literal Read Time.
- A collapsible or sticky Table of Contents below `xl`, and the Reading Progress below `xl`.
- H3s or deeper headings in the Table of Contents.
- Share targets beyond LinkedIn, Facebook, X and copy link, and a native share sheet.
- An editor field for the share label or the Table of Contents label.
- Changing the Avatar Group component, the Career Hero or its Apply Button handler.
- The application form or flow itself.
- A dedicated mobile or tablet design.
- Committing the Seed.

## Further Notes

- Node geometry at 1600: the Table of Contents label at x 40, y 1475; its list at y 1504, 257 wide; the bar at y 1774, 257 wide, 3px, its fill drawn at 94px as a static example; the Read Time at y 1794, centred on the bar. The Longform's first H2 at x 425 (column 4), 750 wide (six columns), its paragraph 25px beneath, the second H2's top 100px beneath the first paragraph's end. The Sidebar Card at x 1255, 305 by 231, ending at the right margin; avatars at y 1505; heading at y 1558, 245 wide; button at y 1634, 245 by 42. "Share this article" at y 1756, the circles at y 1785.
- The node's share label reads "Share this article"; on a Career it is "Share this career", decided in the grilling session. The node draws Facebook filled Primary; that is read as the hover state.
- The node's button icon is arrow-down; it is kept so an editor can point the button at a section further down the Longform.
- The node's Table of Contents copy ("What Is NavBoost?") is placeholder from a blog design; the seeded Career's own H2s replace it.
- The avatar images come from the node's three ellipse fills, downloaded into the Seed's scratch folder; the Figma asset URLs expire within seven days.
- At `lg` (1024) three columns of the grid are about 220px, too narrow for the card's 30px heading and button, which is why the three-column layout starts at `xl`.
