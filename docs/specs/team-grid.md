# Team Grid

Spec for the Team Grid on the Team Listing page: every enabled Team Member with an Image as a Team Tile, three across on a desktop, two on a tablet and one on a phone, between the page's Hero and its Blocks. The Team Intro, the page's own text, button and Avatar Group, sits in the grid's third slot on a desktop and above the Tiles below it. Eleven Tiles show first; Load More beneath adds the next twelve through Sprig until everyone is on the page. Clicking any Tile, loaded or not, opens the Team Modal. The Team Tile and the Team Modal's state are lifted out of the Team Marquee so both share them. Review content arrives by Seed: the six Figma people who do not exist yet, nine placeholder Team Members to reach twenty-four, and the page's Team Intro.

Design: Figma node `9929-15519` in the Marketing Signals file, named "Group 46371", 1520 by 2924 at the 1600 frame: eleven "Team / Exterior / 4 col" Tiles at 493 by 693 in three columns with 20px gaps both ways, the Team Intro in the third slot of the first row, and a "Load More" pill 50px beneath the grid, centred. The Team Modal is node `9716-10051`, the same node the Team Marquee spec built from. No loading frame, no tablet frame and no mobile frame exist, so the loading state, the Team Intro's place and size below `lg`, and everything below `lg` are decisions, not measurements.

Branch: feature/team-grid

Related: the Team Marquee spec, whose Team Tile and Team Modal this page reuses and which this spec refactors; the Case Study Grid spec, whose Sprig grid, dimming indicator and page-template-not-Block placement this follows; the FAQ Accordion spec, whose Sprig Load More, appending by selection and out-of-band button swap this copies; the Service List spec, whose List Footer renders the same button and Avatar Group pair; the Content Seeding spec, whose command creates the Team Members and fills the page. The Hero above the grid is whatever the page's Hero field holds; Hero Team is specced separately. ADR-0001 does not apply: the grid is in flow beneath the Hero. ADR-0002 applies: every Team Member and the Team Intro arrive by Seed. ADR-0003 applies and constrains: the Team page is the one `entryTeamListing` page, found by type, so the grid lives in that page template rather than in a Block. ADR-0004 is untouched. No new ADR: moving the modal state into its component, the eleven-then-twelve batch and the Team Intro's placement are all easy to reverse and are recorded under Further Notes. Vocabulary: `CONTEXT.md`, new "Team Grid" section, which gained Team Listing page, Team Grid and Team Intro during the grilling session; Team Tile was widened to the Team Grid and Load More to cover a batch as well as the remainder.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Team page exists and shows only its Hero and Blocks. Its control panel tab promises editors that "Team Entries will automatically pull through here" and nothing does; the page template holds an empty "Team Listing" comment where the grid should be. The Text, Button and Avatar Group fields the listing type gained on 10 September have no template either. The only places a visitor meets the team are the Team Marquee, which shows eight people drifting past, and the Team Carousel, which shows one at a time. Nothing shows the whole team, and nothing would scale as the team grows. The Team Tile and the Team Modal that the design reuses are welded into the Team Marquee Block: the Tile is inline markup and the Modal finds each member's content by position in the Block, which breaks as soon as Tiles arrive after the page has loaded.

## Solution

The Team page renders the Team Grid between its Hero and its Blocks. Every enabled Team Member with an Image, in structure order, is a Team Tile: the same portrait, bottom fade, name, Job Role and plus icon as in the Team Marquee, filling its column at the 493 by 693 ratio. From `lg` the grid is three columns with 20px gaps and the Team Intro takes the third slot of the first row: the page's text at 25px medium, capped at 474px and inset 20px into its column, with the page's button and the Avatar Group 40px beneath it, 20px apart. From `md` the grid is two columns and the Team Intro spans both above the Tiles; below `md` it is one column with the Team Intro on top, its text at 20px. The first view holds eleven Tiles, so with the Team Intro the desktop grid is four full rows. While more remain, a "Load More" pill with a down arrow sits 50px beneath the grid; clicking it dims the grid, appends the next twelve Tiles, moves focus to the first new one and, once everyone is shown, removes itself. The URL never changes; a reload shows the first view. Clicking any Tile, from the first view or a later batch, opens the Team Modal as it looks today. Seeds add the six Figma people with their portraits, nine placeholder Team Members so there are twenty-four with an Image, and the page's Team Intro, so two clicks of Load More can be evidenced.

## User Stories

1. As a visitor, I want to see everyone at the agency on one page, so that I know who I would be working with.
2. As a visitor, I want each person's photo, name and job role, so that I can put a face to a name.
3. As a visitor, I want the team in the order the agency chose, so that the people it leads with come first.
4. As a visitor, I want a short introduction to the team beside the first photos, so that I understand how they work before I scan faces.
5. As a visitor, I want a button beside the introduction inviting me to get in touch, so that I have a next step without scrolling.
6. As a visitor, I want to see who I would be talking to beside that button, so that getting in touch feels personal.
7. As a visitor, I want the first screenful to be complete rows, so that the page looks finished.
8. As a visitor, I want a Load More button when there are more people, so that the page loads quickly but nobody is hidden.
9. As a visitor, I want Load More to add people beneath the ones I have seen, so that I keep my place.
10. As a visitor, I want the grid to show that it is loading, so that I know my click worked.
11. As a visitor, I want the Load More button to go away once everyone is shown, so that I know I have reached the end.
12. As a visitor, I want every row after loading more to stay full until the last, so that the grid stays tidy.
13. As a visitor, I want to click any person, including ones I loaded, and read about them, so that loading more is not a lesser view.
14. As a visitor, I want the profile to open over the page and close with the close button, a click outside or Escape, so that I can dip in and out.
15. As a visitor, I want the page to hold still behind an open profile, so that I do not lose my place.
16. As a visitor on a tablet, I want two people to a row with the introduction above them, so that the photos stay large.
17. As a visitor on a phone, I want one person to a row with the introduction first, so that I read what the team is before scrolling faces.
18. As a visitor on a phone, I want the introduction text at a size that reads comfortably, so that a long paragraph is not a wall of large type.
19. As a visitor using a keyboard, I want each person reachable by Tab with a visible focus, so that I can open profiles without a mouse.
20. As a visitor using a keyboard, I want focus to land on the first new person after Load More, so that I carry on from where the new people start.
21. As a visitor using a keyboard, I want focus to return to the person I opened when I close their profile, so that I do not start over.
22. As a visitor using a screen reader, I want each person announced once by name and role, so that the grid is a clear list.
23. As a visitor using a screen reader, I want the introduction read before the people, so that the context comes first.
24. As a visitor who prefers reduced motion, I want the profile to appear without fading, so that nothing moves unexpectedly.
25. As a visitor, I want a shared link to the Team page to show the first view with no script, so that the page works before anything loads.
26. As an editor, I want new Team Members to appear on the Team page as soon as they are published, so that I never maintain a list by hand.
27. As an editor, I want a Team Member without an Image left out, so that the grid never shows an empty frame.
28. As an editor, I want to set the introduction text, button and person on the Team page, so that I can change the wording or who is shown.
29. As an editor, I want the introduction to disappear when I clear all three of its fields, so that the Tiles close up rather than leave a hole.
30. As an editor, I want the introduction to still show when there are no Team Members, so that the page is never blank.
31. As an editor, I want the Team Marquee to keep working exactly as before, so that the About Us page is untouched by this page.
32. As a developer, I want the Team Tile as one component used by the Team Marquee and the Team Grid, so that the two never drift apart.
33. As a developer, I want the Team Modal's open and close state to live with the Team Modal, so that any page can host it without copying it.
34. As a developer, I want each Tile to carry its own modal content, so that Tiles loaded later open without any lookup by position.
35. As a developer, I want Load More built the way the FAQ Accordion's is, so that the site has one Sprig appending pattern.
36. As a developer, I want the review content by Seed, so that a reviewer can rebuild the page from the scratch folder.
37. As a reviewer, I want before and after screenshots of the Team page and the About Us page at the planned widths and states, so that I can check the build against the nodes and this spec.

## Implementation Decisions

**Page template.** The Team Listing page template renders the Hero, then the Team Grid, then the Blocks, in place of its empty "Team Listing" comment. The grid is wrapped in the section component with `paddingY` top and bottom at its `base` value and horizontal padding at the site margins, as the Case Study Grid is. There is no Block and no new field on either entry type: the page's control panel Tip already says Team entries pull through automatically, and ADR-0003 fixes the page to one instance found by its entry type. The listing type's Text, Button and Avatar Group fields are the Team Intro's fields.

**Query.** Enabled Team Members from the Team section with a non-empty Image, in structure order, read by offset and limit. The first view is offset zero, limit eleven. Each Load More asks for the next twelve from the count already shown. A member without an Image is excluded in the query, not skipped in the loop, so batch sizes and the "more remain" test are exact.

**Team Tile component.** A new component lifted out of the Team Marquee, carrying the Tile exactly as the Team Marquee spec defines it: a `button`, portrait shaped at 493 by 693, the Image through the picture component in the 2x3 family with 20px corners, the bottom fade from 40%, the name and Job Role stacked bottom left with the Team Marquee's type ramp and 20px/30px insets, the white outline plus icon as a decorative span bottom right, the pointer cursor and the focus ring. It takes the member (name, Job Role, Image, Text), a `sizes` hint, a lazy flag, a class for width and any extra attributes. The Team Marquee passes its fixed width ramp and its repeat attributes (hidden from the accessibility tree, untabbable, no mouse-down focus) exactly as it renders them today. The Team Grid passes full column width.

**Team Modal component.** The Team Modal keeps its markup, layout and behaviour from the Team Marquee spec, Quote still not rendered. Its Alpine state moves out of the Team Marquee and into the Team Modal component as one shared Alpine data definition, registered once however many hosts the page has. It holds `visible` and the opener, and offers `open` taking the member's content template and the opener, and `close`. It copies the given template into the panel, locks the body scroll, focuses the close button, and on close returns focus to the opener when it is focusable. The component also renders a member's content template on its own when asked, so a host can place one beside each Tile. The Team Marquee's Block element now uses that shared data, so its Crawl still reads `visible` to hold while the Modal is open, and it keeps passing its own per-member templates, rendered once per Block. Its behaviour does not change.

**Team Grid markup.** A Sprig component renders the grid. The page template renders one Team Modal and the Sprig component inside one element that carries the shared Team Modal data, so the Modal sits outside anything Sprig swaps. The grid is a `ul` of twelve columns' worth of `li`: one column below `md`, two from `md` and three from `lg`, gaps 20px. Each Tile `li` holds the Team Tile and, beside it, that member's content template; clicking the Tile opens the Modal with the template beside it. Tiles in the first view are eagerly loaded for the first row and lazy after; appended Tiles are lazy. The picture `sizes` follows the columns: a third of the viewport from `lg`, half from `md`, full width below.

**Team Intro.** On the first view only, the first `li` in the grid is the Team Intro, so it is read first. From `lg` it is placed in the first row's third column, and the Tiles flow into the first two columns and on into row two. From `md` to `lg` it spans both columns above the Tiles; below `md` it is the first item in the single column. Inside: the page's Text through the rich text component at 25px (`2xl`) medium, leading 1.2, tracking -1px from `md` and 20px (`xl`) below it, black, capped at 474px wide at every width, and inset 20px from its column's left from `lg`. Beneath it, 40px down, a row with 20px gaps and wrapping: the page's button through the button component in `secondary` with its icon, and the Avatar Group through the user component at `sm`, exactly as the Service List's List Footer renders them. Each of the three renders only when set. With none set there is no Team Intro `li`, and the Tiles fill the third slot.

**Load More.** Beneath the grid, 50px down and centred, the button component in `secondary` labelled "Load More" with the down arrow, while the count shown is less than the total. It is a Sprig trigger that sends the next offset and a limit of twelve, selects only the Tile `li` elements from the response, appends them to the end of the grid, and replaces itself out of band with the response's button, or with an empty placeholder once everyone is shown. The grid is the request indicator: while a batch loads the grid dims to half opacity and ignores the pointer, as the Case Study Grid does. After the swap, the first appended Tile takes focus. No URL is pushed and no query-string state is read: a reload or a shared link always shows the first view. The markup beneath Load More is in the page without script, so the first view is complete for a visitor without JavaScript and only Load More needs it.

**Empty states.** No Team Members with an Image and a Team Intro set: the Team Intro renders alone in the grid with no Load More. No Team Members and no Team Intro: the section is not rendered. Eleven or fewer Team Members: no Load More. A member without Text or a Job Role behaves as the Team Marquee spec says, in both the Tile and the Modal.

**Responsive summary.** Below `md`: one column, Team Intro first with its text at 20px, Tiles full width, Load More centred. `md`: two columns, the Team Intro across both above the Tiles at 25px and 474px wide. `lg`: three columns, the Team Intro in the first row's third slot with its 20px inset. `3xl`: the Figma frame, Tiles 493 by 693.

**Seeds.** Seed files under the scratch folder, not committed, each creating a Team Member in the Team section by slug with an Image, a Job Role and short placeholder Text naming the person, rerun-safe as the Content Seeding spec describes. Six are the Figma people who do not exist yet: Georgia Colling, Content Manager & Strategist; Lauren Shelley, Senior Digital PR Executive; Stevie Carpenter, Head of Content & Outreach; Gill Garrod, Business Development Manager; Michael Newton, Freelance Content Writer; Jade Denby, Head of Digital PR. Their portraits are exported at 2x from the "Team / Exterior / 4 col" component's image children (the master component's child ids, not the instance's), each matched to the person the node shows and straightened where needed. Nine more are placeholder Team Members with invented names and roles, marked as review content in their Seeds, using the component's spare portraits, so that there are twenty-four enabled Team Members with an Image: a first view of eleven, a batch of twelve and a batch of one. A final Seed names the Team page and sets its Text to the paragraph the node draws, its Button to the contact page labelled "Let's Work Together", and its Avatar Group to Gareth Hoyle, Managing Director, reusing the Gareth Hoyle asset already in the volume. The five existing placeholder members (Lauren Doe, Sam Reid, Priya Nair, Tom Hale, Ella Ward) are left as they are and lead the structure order.

**Docs.** `CONTEXT.md` gained the Team Grid section, the widened Team Tile and the widened Load More during the grilling session. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma nodes at the same width.

**Seams.** The primary seam is the Team page URL, `/team`, through the global layout: every state this spec names is reachable by loading it at a width and clicking. The secondary seam is the About Us page, whose Team Marquee is the proof that lifting out the Team Tile and the Team Modal's state changed nothing there. The Seed command's output is the proof of the content. No new seam; the styleguide gains nothing.

**What good evidence looks like.** It shows what a visitor would see: the first view matching the node at 1600, the Team Intro moving as the columns drop, the grid dimmed mid-load, the grid after each Load More with focus on the first new Tile and the button gone at the end, the Modal opened from a loaded Tile, and the Team Marquee still Crawling, pausing and opening its Modal. Fixed widths, one state per file, before and after pairs on the PR. The before for the Team page is `/team` on `main` at the fork commit, showing the Hero and the Footer alone; the before for About Us is the same page on `main`. Numeric checks such as Tile sizes and gaps are reported as a table in the PR body.

**Evidence plan.**

1. `/team` at 1600, full page: eleven Team Tiles 493 by 693 in three columns with 20px gaps, the Team Intro in the first row's third slot, its text at 25px medium 474px wide and 20px in, the lilac "Let's Work Together" pill and Gareth Hoyle's Avatar Group 40px beneath it, 20px apart, and the "Load More" pill 50px beneath the grid, centred. Compared against node `9929-15519`. Proves the desktop layout.
2. `/team` at 1600, viewport, Load More clicked with the network throttled: the grid at half opacity. Proves the loading indicator.
3. `/team` at 1600, full page, after one Load More: twenty-three Tiles, the last row two Tiles, Load More still shown; and the focused element is the twelfth Tile, with its focus ring. Proves the append and focus.
4. `/team` at 1600, full page, after a second Load More: twenty-four Tiles, no Load More in the page. Proves the end state.
5. `/team` at 1600, viewport, after loading more and clicking a Tile from the second batch: the Team Modal open for that person, portrait, name, Job Role, Rule and Text, over the blurred page. Then Escape: the Modal gone and focus back on that Tile. Compared against node `9716-10051`. Proves the Modal serves loaded Tiles.
6. `/team` at 1024, full page: three columns, the Team Intro in the third slot. Proves the `lg` step.
7. `/team` at 768, full page: two columns, the Team Intro across both above the Tiles at 25px and 474px wide, twelve slots filled by the Intro row and eleven Tiles. Proves the `md` layout.
8. `/team` at 390, full page: one column, the Team Intro first at 20px with the button and Avatar Group wrapping beneath, then the Tiles. Proves the mobile layout.
9. `/team` at 390, viewport, a Tile clicked: the stacked Modal, portrait above the text. Proves the Modal on a phone.
10. Served HTML of `/team`: the Team Intro the first `li` of the grid, eleven Tile `li` each with one `button` and one content template, the Load More button, and no inline styles beyond the picture component's properties. Accessibility tree from an agent-browser snapshot: each of the eleven people listed once as a button named by name and role. Saved as text. Proves the markup and the reading order.
11. `/team` at 1600 with the page's Text, Button and Avatar Group temporarily cleared: no Team Intro, Tiles filling the first row's three slots. Restored afterwards. Proves the empty Team Intro.
12. About Us page at 1600, viewport, two captures one second apart: the Team Marquee's row moved. Then a Tile clicked: the Team Modal open for that person with the row held; then Escape: the Modal gone and the row moving again a second later. Proves the Team Marquee is unchanged by the refactor.
13. Seed command dry-run and real output for every Seed, run twice: fifteen Team Members created and their portraits uploaded on the first run, the Team page's Text, Button and Avatar Group set, nothing new on the second. Saved as text beside the screenshots. Proves the Seeds.

## Out of Scope

- The Team page's Hero, including Hero Team, which has its own spec.
- A filter, search, sort or numbered Pagination on the Team Grid.
- Remembering how many batches were loaded in the URL, the back button or a reload.
- An editor field for the batch size, the Team Intro's slot or Team Member order beyond structure order.
- Team Member pages, and linking a Tile or the Modal anywhere.
- The Quote and the Video in the Team Modal.
- Reordering, disabling or removing the five existing placeholder Team Members.
- Any visual change to the Team Marquee or the Team Modal.
- Committing the Seeds, the portraits or the placeholder Team Members.

## Further Notes

- The first view is eleven because the brief asked for eleven and, with the Team Intro, it fills four rows of three. Later batches are twelve so that every row after the first view stays full at three, two and one columns until the last batch. This is recorded here rather than as an ADR because it is two numbers in one template.
- The Team Intro is first in the markup and placed into the third slot from `lg` by grid position, so screen readers and narrow screens get it first while the desktop matches the node. The node draws only the desktop, so its place below `lg` is a decision.
- The Team Intro's text is 20px below `md` because 25px on a 390px phone gives about six words a line for a paragraph of this length. It keeps its 474px cap on a tablet so its line length matches the node.
- The node insets the Team Intro 19px into its column; 20px is used.
- The Team Modal's state moved into its component because Load More appends Tiles after the page has loaded, and the Team Marquee's lookup by position cannot see them. Each Tile carrying its own content template means an appended Tile brings its Modal content with it.
- Structure order puts the five existing placeholder Team Members before Gareth Hoyle, so the first view's names do not match the node's order. Evidence compares layout, not names; the order is editor content.
- The node's twelve slots are eleven Tiles and the Team Intro. The node draws no loading state; the dim follows the Case Study Grid.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
