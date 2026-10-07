# Featured Blog

Spec for the Featured Blog Block: one Blog the editor picked, shown as a single Linked Card filling a black panel inside the site margins, its Thumbnail covering the panel under a shade, a "Featured Article" badge at the top left, and its date and read time, title, Description and a "Continue Reading" pill at the bottom left. It is the third Block built on the Blog, the first to show exactly one, and the first Block reviewed on the Careers page.

Design: Figma node `9962-15539` in the Marketing Signals file, a group named "Group 46377": a 1520 by 637 panel at x 40 on the 1600 frame with 20px corners, a black fill under the photograph, and a "Bottom Shadow" vector rotated to run from the left edge, black at 90% fading to nothing 975px across. On it, 40px in from the left: the "Tag / Small / Text / White 20%" badge reading "Featured Article" 40px from the top; and at the bottom, the meta row "10 July 2026 | 5 min read" in white, the title "How we successfully moved to a four-day working week" at 40px, the paragraph "On the 9th of May 2022 we moved all full time employees to a four-day working week. The transition was done with no loss of pay and a new, shorter number of contracted hours (32).", and the "Button / Pill / Text / Regular / White 30% Outline" pill reading "Continue Reading", all 582 wide and ending 40px above the panel's bottom. No hover frame, no tablet frame and no mobile frame exist, so the responsive rules are decisions, not measurements.

Branch: feature/featured-blog

Related: the Carousel - Blog spec, which built the Blog Large Card, the blog meta row with its literal read time, the Zoom and the `2x1` transform; the Case Study Grid spec, whose Case Study Card is the nearest existing card of text over a covering photograph, and whose `white-20` Category Badge, two-image portrait-and-landscape Thumbnail and bottom shade this Block reuses; the Featured Testimonial spec, whose single-entry field this Block copies; the Blog Grid spec, whose review of a heroless page with a seeded Hero Simple this Block repeats; the Content Seeding spec, which creates the Blog and puts the review content on the Careers page. ADR-0001 applies to the review page only: the Careers page has no Hero, so a Seed adds a Hero Simple above the Block. ADR-0002 applies: the review content arrives by Seed. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, "Featured Blog" section, which gained Featured Blog during the grilling session; the Linked Card and Zoom entries now name it; the Blog, the Thumbnail, the Description and the Block slots are as already defined.

The branch is code-reviewed against this spec before merge.

## Problem Statement

Editors have no way to lead a page with a single Blog. The Blog Carousel and the Blog Grid show Blogs as cards among other cards, each one a creme card with a photograph above its text. When one article carries a page's story, such as the Careers page's piece on the move to a four-day working week, the design calls for that article to take the full content width as a photograph with its title, summary and a "Continue Reading" pill laid over it, labelled as the featured article. Nothing on the site renders that today.

## Solution

A new Block, the Featured Blog, that editors add to any page from the Blocks field and give exactly one Blog. On the page it is a black panel with 20px corners inside the site margins, filled by the Blog's Thumbnail. A "Featured Article" badge sits at the top left. At the bottom left sit the Blog's date and read time in white, its title, its Description and a white-outlined "Continue Reading" pill, over a dark shade that keeps them readable. The whole panel is one link to the Blog: on a mouse hover the photograph Zooms and the pill fills. From the desktop breakpoint the panel is at least as wide for its height as the design and the shade runs from the left; below it the panel is taller, the shade rises from the bottom, and the title steps down. If the picked Blog is missing or disabled, the Block renders nothing. The read time is the literal "5 min read" every Blog shows until Blog pages have content to count.

## User Stories

1. As an editor, I want to add a Featured Blog Block to any page from the Blocks field, so that I can lead a page with the one article that carries its story.
2. As an editor, I want the Block listed as "Featured Blog" in the General group, so that I can find it beside the other Blog Blocks.
3. As an editor, I want to pick exactly one Blog, so that the Block always shows a single article and I cannot add a second by mistake.
4. As an editor, I want the picker to offer the Blog section only, so that I cannot feature another kind of entry.
5. As an editor, I want the picker's button to read "Add a Blog", so that it says what it does.
6. As an editor, I want the Block to refuse to save with no Blog picked, so that an empty panel never reaches the page.
7. As an editor, I want the Block to show the Blog's own Thumbnail, date, title and Description, so that I never re-enter an article's details.
8. As an editor, I want the "Featured Article" badge on every Featured Blog without typing it, so that the label is always consistent.
9. As an editor, I want disabling the Blog to remove the Block from the page, so that unpublishing an article removes it everywhere without editing each page.
10. As an editor, I want to set the Block's vertical padding from its Settings tab, so that it spaces like every other Block.
11. As an editor, I want the picker under a Section Content heading, so that the Block reads like every other Block in the control panel.
12. As a visitor on a desktop, I want the article's photograph across the full content width, so that the featured article stands out from the rest of the page.
13. As a visitor, I want a "Featured Article" label at the top of the panel, so that I know why this article is singled out.
14. As a visitor, I want the date and read time above the title, so that I can judge how recent and how long the article is.
15. As a visitor, I want the title large and the summary beneath it, so that I can decide whether to read it.
16. As a visitor, I want the text to stay readable over any photograph, so that a bright image never hides the words.
17. As a visitor, I want a "Continue Reading" pill beneath the summary, so that I know the panel leads to the article.
18. As a visitor, I want the whole panel to be one link, so that I can click anywhere on it.
19. As a visitor using a mouse, I want the photograph to zoom a little and the pill to fill when I hover the panel, so that I know it is a link.
20. As a visitor who prefers reduced motion, I want the photograph to stay still on hover while the pill still fills, so that I get the cue without movement.
21. As a visitor on a phone, I want the panel taller than on a desktop with the text across its width, so that nothing is squeezed.
22. As a visitor on a phone, I want the shade to rise from the bottom behind the text, so that the words stay readable when they span the whole panel.
23. As a visitor on a phone, I want the title smaller, so that it fits without breaking mid-word.
24. As a visitor, I want a long title or summary to make the panel taller rather than be cut off, so that I always see the whole text and the pill.
25. As a keyboard user, I want the panel to take focus once with a visible outline, so that I can open the article without a mouse and without stopping on the pill.
26. As a screen reader user, I want the title announced as a heading, so that I can find the featured article by headings.
27. As a screen reader user, I want the photograph skipped, so that the link is announced by its label, date, title and summary only.
28. As a visitor, I want a Blog without a photograph to still show as a dark panel with its text, so that a missing image never breaks the page.
29. As a developer, I want the Block composed from the existing badge, blog meta, button and picture components, so that there is no new card component to maintain.
30. As a developer, I want the blog meta row to gain a white colour rather than the Block restyling it, so that all three Blog surfaces keep one meta row.
31. As a developer, I want the white-outlined pill to fill when its card is hovered, so that it behaves inside a Linked Card like the lilac pill does.
32. As a developer, I want the Block static with no Alpine.js, so that it costs nothing on the client.
33. As a reviewer, I want the Careers page seeded with a Hero and a Featured Blog holding the node's article, so that I can compare the Block against Figma word for word.
34. As a reviewer, I want before and after screenshots of the Blog Carousel's meta rows and the Timeline's pills, so that I can see the two component changes broke nothing.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `featuredBlog`, name "Featured Blog", colour blue, icon `newspaper`, no title field, added to the Blocks field in the General group. A Content tab with a Section Content heading element followed by the Entry - Blog field; a Settings tab with the Padding field. No Section Header and no Section Footer: the badge is fixed and the pill is part of the card.

**Fields.** One created: an Entries field, name "Entry - Blog", handle `entryBlog`, Blog section only, minimum one, maximum one, list view, selection label "Add a Blog", as Entry - Testimonial does for the Featured Testimonial. The handle matches the Blog entry type's handle; Craft keeps fields and entry types in separate namespaces, and Entry - Testimonial already does the same. On this layout it carries the instructions "One Blog. Its Thumbnail fills the panel." Padding is reused unchanged. Nothing is added to the Blog entry type.

**Which Blog.** The Block shows the one picked Blog if it is enabled. With no pick, or a disabled pick, it renders nothing at all, section included. There is no fallback to the latest Blog.

**Block template.** Lives with the other Blocks so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding on the vertical axis, and its panel inside the section's own site margins. No Alpine.js and no JS block.

**Panel.** One link to the Blog, the whole panel: relative, black, 20px corners, overflow clipped, isolated so its layers stack inside it. It is a vertical flex column with the badge at the top and the content group pushed to the bottom. Its height is a minimum, never a crop: at least 3:4 below `md`, 16:10 from `md` and 12:5 from `lg` (the node's 1520 by 637 is 2.39:1), and taller whenever the content needs more. Padding 20px below `lg` and 40px from `lg`, as the node's 40px insets.

**Photograph.** The Blog's Thumbnail through the picture component twice, as the Case Study Card does: `3x4` below `md` and `2x1` from `md`, each covering the whole panel as an absolute layer at the Thumbnail's focal point, ratio off, empty alt, sized to the full viewport width. Full opacity over the black panel. The Zoom: on fine pointers the photograph layer grows to 105% over 500ms inside the panel's clipped corners, and nothing moves under reduced motion.

**Shade.** A gradient layer between the photograph and the content, not part of the photograph so it never Zooms. From `lg` it runs from the left edge across 64% of the panel's width, black at 90% to transparent, the node's "Bottom Shadow" (975 of 1520). Below `lg` it rises from the bottom edge across the lower half of the panel, black at 80% to transparent, the Case Study Card's bottom shade, because the text spans the panel's width there. No shade is drawn when the Blog has no Thumbnail.

**Badge.** The badge component with the literal "Featured Article", colour `white-20`, size `sm`: the Category Badge's style and the node's "Tag / Small / Text / White 20%" exactly (14px, 10 by 7 padding, translucent white with a 2px backdrop blur). It is not an editor field.

**Content group.** At the bottom of the panel, capped at 582px wide at every width, top to bottom: the meta row; 30px; the title; 25px; the Description; 30px; the pill. These are the node's gaps (the meta row ends at 4948 and the title's cap top is at 4978; the title ends at 5053 and the text starts at 5078; the text ends at 5131 and the pill starts at 5161).

**Meta row.** The blog meta component with a new `colour` option: `black`, the default and what the Blog Card and Blog Large Card keep, with black text and a creme-400 divider; and `white`, with white text and a white divider, as the node draws it. The Block passes `white` and the Blog's post date. The literal "5 min read" and its one-line comment stay as they are; the readTime component is untouched.

**Title and Description.** The title is the Blog's title as an `h2` in white, medium, with the type ramp's leading and tighter tracking: `2xl` below `md`, `3xl` from `md`, `4xl` (40px) from `lg`, the node's size. The Description is the Blog's Description as a paragraph in white at the body size and leading with its tags stripped, because a link inside the panel's link is invalid HTML.

**Pill.** The button component as a `span` with the label "Continue Reading", colour `white-30-outline`, no icon, the default size, the same call the Blog Large Card makes with a different colour. The `white-30-outline` colour gains a group-hover fill (creme-100 with black text on fine pointers) beside its own hover, as `secondary-outline` already has, so the pill fills when the panel is hovered. Today no `white-30-outline` button sits inside a hover group (the Timeline's and the Team Carousel's controls have `slideRole: 'group'`, an ARIA role, not a class), so nothing else changes.

**Keyboard.** The panel is one link and takes focus once, with the site's focus outline. Nothing inside it is focusable. No focus handling is written.

**Accessibility.** The link is named by its contents: the badge text, the date, the read time, the title, the Description and the pill label. The title is the Block's only heading, an `h2`. The photographs have empty alts. Nothing is hidden or duplicated.

**Empty states.** No Blog, or a disabled one: nothing renders. A Blog with no Thumbnail: the black panel at the same minimum ratios with no photograph and no shade, the content still white. A Blog with no Description: the paragraph is dropped and the pill follows the title by 30px.

**Responsive summary.** Below `md`: at least 3:4, 20px padding, bottom shade, title `2xl`. From `md`: at least 16:10, title `3xl`. From `lg`: at least 12:5, 40px padding, left shade, title `4xl`, the design.

**Careers page content.** Three Seed files in the scratch folder for this spec, with the node's photograph beside them, exported during the grilling session as a 2500 by 1667 JPEG since the Figma asset URLs expire in seven days. The first creates the Blog in the Blog section with the Blog entry type: title "How we successfully moved to a four-day working week", post date 10 July 2026, the photograph as its Thumbnail and the node's paragraph as its Description. The Home page's Blog Carousel picks its nine Blogs, so a new latest Blog does not change it. The second writes a Hero Simple to the Careers page's Hero field, heading "Careers" and one line of text, so the page has its Hero and ADR-0001's top padding clears the Header; it is review content, not part of the Block, and it is run only if the Careers page still has no Hero when the build starts, since the Career List work may be reviewed on the same page. The third appends one Featured Blog to the end of the Careers page's Blocks, padding Top and Bottom, picking the new Blog. Seeds are not committed.

**Styleguide.** No new preview. The Block has no component of its own; the blog meta and button previews pick up their new options only if their existing previews list every colour.

**Docs.** `CONTEXT.md` gained the Featured Blog during the grilling session, and the Linked Card and Zoom entries now name it. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single primary seam is the rendered Careers page at `/careers` through the global layout, with the Hero Simple and the Featured Blog seeded. The Block is the only new template, and everything it composes (the badge, the blog meta row in white, the button's filled hover, the picture) is proven through it. Each changed component gets one regression check on a page that already uses it: the Blog Carousel's meta rows on the Home page, and the Timeline's `white-30-outline` controls. The secondary seams are the Seed command's own output and the control panel's view of the Block's fields.

**What good evidence looks like.** It shows what a visitor would see: the photograph across the content width with the text readable over the shade, the white meta row and pill, the hover Zoom and filled pill, the taller panel with the bottom shade on a phone, and the empty states. Fixed widths, one state per file, before and after pairs on the PR. The before for the Block is the Careers page on `main` at the commit the branch forked from, which renders nothing between the Header and the Footer.

**Prior art.** The Case Study Grid spec's evidence plan, which proved the covering photograph, the shades and the Zoom; the Blog Grid spec's, which proved a Blog Block on a heroless page with a seeded Hero Simple.

**Evidence plan.**

1. Careers page at 1600, full page, the Block at rest: the panel 1520 wide inside 40px margins with 20px corners and at least 637 tall, the laptop photograph covering it, the left shade fading out about two thirds across, the "Featured Article" badge 40px from the top and left, and at the bottom left, 40px from the edges, the white meta row "10 July 2026 | 5 min read" with its white divider, 30px to the 40px title across 582px, 25px to the paragraph, 30px to the white-outlined "Continue Reading" pill, compared against the Figma node. Proves the desktop layout.
2. Careers page at 1600, viewport, pointer over the panel: the photograph at 105%, the pill filled creme-100 with black text, the badge and text still. Proves the Linked Card hover and the Zoom.
3. Careers page at 1600, viewport, a click on the panel's top right, away from the text: the new Blog's page at its `/insights/` address. Proves the whole panel is the link.
4. Careers page at 1024, viewport, the Block at rest: the panel at least 12:5, 40px padding, the left shade, the title at `4xl`. Proves the `lg` step.
5. Careers page at 768, full page, the Block at rest: the panel at least 16:10, 20px padding, the shade rising from the bottom, the title at `3xl`, the text readable across the photograph. Proves the `md` step and the bottom shade.
6. Careers page at 390, full page, the Block at rest: the panel at least 3:4 and taller if the text needs it, the badge top left, the title at `2xl`, the full paragraph and the pill visible above the panel's bottom edge. Proves the mobile layout and that the panel grows rather than clips.
7. Careers page at 1600 with reduced motion emulated, viewport, pointer over the panel: the pill filled, the photograph still. Proves the reduced-motion rule.
8. Careers page at 1600, keyboard: tab from the Hero into the Block: the panel's link takes focus once with a visible outline, and the next tab leaves the Block; the pill never takes focus of its own. Proves the focus order.
9. Served HTML of the Careers page: the Block's section holding one link to the Blog, inside it the badge text, a `time` element, one `h2`, one paragraph and a `span` pill, with no link, button or other heading nested inside; both photographs with an empty alt; no Alpine attributes on the Block; no inline styles beyond the picture component's ratio property. Proves the markup.
10. Careers page at 1600 and 390 with the Blog's Thumbnail temporarily removed: the black panel at its minimum ratio with no shade and the text in white. Restored afterwards. Proves the no-Thumbnail state.
11. Careers page at 1600 with the Blog temporarily disabled: nothing between the Hero and the Footer, no empty section and no stray badge. Restored afterwards. Proves the empty state.
12. Home page at 1600, the Blog Carousel at rest, before and after: the meta rows on the Blog Large Card and both Blog Cards still black with creme-400 dividers. Proves the meta row's default is unchanged.
13. The page the Timeline spec seeded at 1600, the Timeline's Next pill hovered, before and after: the pill's hover unchanged. Proves the `white-30-outline` change touches nothing outside a hover group.
14. Control panel, the Block's edit form: "Featured Blog" in the Blocks field's General group, the Section Content heading, the Blog picker offering only the Blog section with the button "Add a Blog", no second pick possible, a save refused with no pick, Padding on the Settings tab. Proves the entry type and field.
15. Seed command output for the three Careers Seeds, each run twice: the Blog created with its Thumbnail uploaded and its post date set, the Hero Simple created in the Hero field and the Featured Blog created in the Blocks field with its Blog resolved on the first run; all skipped or reused on the second. Saved as text beside the screenshots. Proves the seeding.

## Out of Scope

- A counted read time. The meta row keeps its literal "5 min read" until Blog pages have content, and the readTime component is untouched.
- An editable badge, an Eyebrow, a heading override or a Button field. The Block is the Blog as it is.
- A fallback to the latest Blog, or more than one Blog.
- A Cursor Label. The Blog surfaces have none.
- A new card component. The Block composes the badge, blog meta, button and picture components directly.
- A colour, layout or shade option on the Block.
- A dedicated mobile or tablet design. The responsive rules follow the decisions above until a mobile node exists.
- Changing the Blog Card, the Blog Large Card, the Blog Carousel, the Blog Grid or the Case Study Card.
- A Careers page Hero as part of the Block. The Hero Simple is review content.
- Committing the Seeds or the photograph.

## Further Notes

- The node's title is 40px medium with 1.2 leading and -1.6px tracking, which is the `4xl` token exactly: -0.04em at 40px is -1.6px, the `tracking-tighter` value.
- The node's panel is 1520 by 637, 2.386:1. The minimum ratio is 12:5 (2.4:1), the nearest whole-number ratio, and the `2x1` transform is the landscape photograph because the panel only ever grows taller than 12:5, never wider.
- The node's shade is a 637 by 975 vector rotated a quarter turn, so the gradient runs horizontally across 975 of the panel's 1520: 64%.
- The node stacks two photographs, one over the other; only the top one shows, the laptop photograph, and it is the one exported.
- The node's post date of 10 July 2026 is also the date of the seeded "How to pitch a journalist" Blog; the new Blog shares it by design, not by reuse.
