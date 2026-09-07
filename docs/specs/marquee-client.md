# Marquee - Client

Spec for the Client Marquee Block: an Eyebrow and a centred heading with the Highlight over two full-bleed Logo Rows of square Logo Cells that Crawl in opposite directions, with a button and an Avatar Group centred beneath. Each Logo Cell fills black with its Client's Logo in fluro while the pointer is over it. It is the first Block built on the marquee component, which it brings up to standard, the first Block to render a Logo inline so it can change colour, the first Seed to set a field on the entry it creates, and the sixth Block on the Home page, between the Case Study Carousel and the Stacking Cards.

Design: Figma node `9716-7987` in the Marketing Signals file, 1600 wide, named "Block / Logo / Carousel / 12 col / Creme 100". The node draws the desktop state once at 1600 by 1218 with the Ray-Ban cell in its hover state; no hover-free frame, no tablet frame and no mobile frame exist, so the size ramp, the cell ramp and the hover timing below are decisions, not measurements. The `logoGrid` Block in the dropblocs-lab repo is the reference for the hover fill and its timing.

Branch: feature/marquee-client

Related: the Carousel - Case Study spec, which this Block follows on the Home page and whose Entries field conventions it copies; the Stacking Cards spec, which follows it and whose Section Footer row of button and Avatar Group it repeats; the Content Seeding spec, whose command gains the entry-level fields this Block's Clients need; the Global Footer spec, whose Footer CTA is the prior art for that row. ADR-0001 does not apply: the Block is in flow beneath the Case Study Carousel. ADR-0002 applies: the Clients and the Home page content arrive by Seed, and the command learns one more thing to do it. No new ADR: rendering a Logo inline through the picture component is easy to reverse, and nothing else here is a trade-off. Vocabulary: `CONTEXT.md`, "Client Marquee" section, which gained Client, Client Marquee, Logo Row, Logo Cell and Crawl during the grilling session; Logo was widened to cover a Client's Logo as well as a Case Study's.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Home page shows the agency's work in the Case Study Carousel but never names the brands behind it in one place. The design follows the carousel with "Working With a Selection of Ambitious Brands": two rows of client logos that drift past in opposite directions, each lighting up under the pointer, closed by the same call to action and named person the page uses elsewhere. The Client section exists in the control panel with a title and a Logo, but no Client entries exist, nothing can pick Clients, and nothing on the site renders a Logo that can change colour.

## Solution

A Client Marquee Block editors can add to any page. It holds an Eyebrow, a heading with the Highlight, two or more Clients, a button and an Avatar Group. The Eyebrow and heading sit centred inside the site margins. Beneath them two Logo Rows run edge to edge: the first half of the Clients in the first row, the rest in the second, each row a run of bordered square Logo Cells that Crawl without stopping, the first row leftwards and the second rightwards, the second offset by half a cell. Under a fine pointer a row pauses and the Logo Cell beneath the pointer fills black with its Logo turning fluro, quickly in and slowly out, so a trail of lit cells lingers behind the pointer. Beneath the rows the button and Avatar Group sit centred. Under reduced motion the rows sit still and the hover fill still works. The Home page gets one instance with the Figma content, and nine Clients with their Figma logos, all added through the Seed command.

## User Stories

1. As a visitor, I want a short label and a big heading naming the agency's clients, so that I know what the rows of logos are.
2. As a visitor, I want the heading to pick out "of Ambitious Brands" in the accent colour, so that the claim reads the way the design does.
3. As a visitor, I want two rows of client logos that never stop moving, so that the section feels alive without my doing anything.
4. As a visitor, I want the rows to move in opposite directions, so that the rows read as two streams rather than one conveyor.
5. As a visitor, I want the rows to run edge to edge and the second to sit half a cell across from the first, so that the rows read as a brick pattern rather than a grid.
6. As a visitor, I want the rows to loop without a visible seam, so that I never see a gap or a jump.
7. As a visitor with a mouse, I want a row to pause while my pointer is over it, so that I can settle on a logo.
8. As a visitor with a mouse, I want the cell under my pointer to fill black with the logo turning fluro, so that the brand I am looking at stands out.
9. As a visitor with a mouse, I want the fill to arrive fast and fade away slowly, so that a trail of lit cells follows my pointer across the row.
10. As a visitor on a touch device, I want the rows to Crawl without any tap state, so that nothing sticks in a lit state after I scroll.
11. As a visitor, I want a call to action and a named person beneath the rows, so that I know who I would be talking to.
12. As a visitor with a phone, I want smaller cells, the heading in a smaller size and the button and person stacked beneath, so that the rows still show several logos on a narrow screen.
13. As a visitor who prefers reduced motion, I want the rows to sit still, so that nothing moves without my say, while the hover fill still answers my pointer.
14. As a screen reader user, I want the list of client names read once, so that the repeated cells and the second copy of each row add nothing to the reading.
15. As a screen reader user, I want the Logo Cells to be nothing more than that list, so that I am not read nine logos twice over.
16. As a visitor, I want a logo that is wider or taller than its cell allows to shrink to fit, so that every logo sits centred in its cell with room around it.
17. As an editor, I want a Client Marquee Block in the Blocks menu, so that I can add it to any page.
18. As an editor, I want the Block's Eyebrow and heading fields, so that I can write the label and the claim myself.
19. As an editor, I want the heading to take the Highlight, so that I can pick out words in the accent colour.
20. As an editor, I want to pick Clients from the Client section in the order I want them shown, so that the rows show the brands I choose.
21. As an editor, I want the first half of my Clients in the first row and the rest in the second, so that the order I set is the order I see.
22. As an editor, I want a row with only a few Clients to still fill the screen, so that I never see an empty stretch.
23. As an editor, I want the Block to refuse fewer than two Clients, so that I cannot build a marquee with an empty second row.
24. As an editor, I want a Client with no Logo left out of the rows, so that a half-finished Client never shows an empty cell.
25. As an editor, I want a Client's Logo to be a single-colour SVG, so that it can turn fluro under the pointer.
26. As an editor, I want a Block button and an Avatar Group in the Section Footer, so that the call to action reads like the Footer CTA's.
27. As an editor, I want the Block's fields in the Section Header, Section Content and Section Footer slots, so that it reads like every other Block.
28. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
29. As an editor, I want the Home page to already carry this Block with the designed content and Clients, so that I see how it is meant to look.
30. As a developer, I want the Block to reuse the Eyebrow, Heading, Button, Avatar Group and Padding fields, so that the only new field is the Entries field for Clients.
31. As a developer, I want the marquee component to gain a reduced-motion guard and refs, so that every later caller inherits them.
32. As a developer, I want the picture component to render an SVG inline when asked, so that a Logo can take its colour from the text colour around it.
33. As a developer, I want the Seed command to set a field on the entry it creates, so that a Client Seed can carry its Logo and the review environment is reproducible.
34. As a developer, I want the Crawl speed held in one place in the Block, so that it can be tuned without touching the component.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `marqueeClient`, name "Marquee - Client", colour blue, icon `grip`, added to the Blocks field in the General group. Its Content tab follows the three-slot layout: a Section Header heading element with the Eyebrow field and the Heading field; a Section Content heading element with the Entries - Client field; a Section Footer heading element with the Button field and the Avatar Group field. Its Settings tab has the Padding field. No title, slug or status fields.

**Fields.** One new field, Entries - Client, handle `entriesClient`, an Entries field with the Client section as its only source, selection label "Add a Client", minimum two, no maximum, translation method site, matching how the Entries - Services field is set. Its instructions: "Two or more Clients. The first half fill the first row, the rest the second, in this order." No change to the Client entry type: a Client is a title and a Logo.

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding and no horizontal padding, and its content inside the section's content block. The Section Header and Section Footer are wrapped in the site margins; the Logo Rows are not. The Block renders only Clients that have a Logo. A Block with fewer than two renderable Clients renders nothing at all, section included.

**Section Header.** The Eyebrow through the eyebrow component in black, centred, with no Rule. The heading through the heading alternate component as an `h2`, centred, semibold, leading 0.97, tighter tracking, the Highlight in the primary colour, capped at 1010px wide so it wraps to two lines at 1600 as the design does. The size ramp is 4xl at mobile, 6xl from `md` and 8xl (70px) from `lg`. The heading sits 30px beneath the Eyebrow at every width. An empty Eyebrow or heading drops that item.

**Logo Rows.** The Clients are split in listed order: the first half, rounded up, make the first Logo Row and the rest the second. Each row repeats its Clients in order until it holds at least six Logo Cells, so a copy of the row is at least 1920px wide at the desktop cell size and the widest supported viewport never shows a gap. Each row is one marquee component with its own Alpine component name derived from the Block handle and the row's index, so two Client Marquees on one page keep their state apart. The first row Crawls leftwards, the second rightwards through the component's reversed prop and is shifted left by half a cell, so the two rows are staggered like brickwork. Both rows run at the same speed, held in one constant in the Block, 0.4 on the component's scale, and both pause on hover. The rows sit 40px beneath the heading at mobile and 70px from `lg`, and abut one another so they share a border.

**Logo Cell.** A square with a 1px creme-400 border on its top and left edges, and on its bottom edge too in the second row, so the two rows together draw the design's grid with no doubled lines. The cell is 180px at mobile, 240px from `md` and 320px from `lg`. The Logo is centred in it, capped at 40% of the cell's width and 20% of its height, in the site's black. The cell is not a link and has no cursor change.

**Hover fill.** Under a fine pointer the cell's background goes to black and the Logo to fluro. Both transition over 2000ms with an ease-out curve, and while the pointer is over the cell the duration drops to 150ms, so the fill arrives at once and fades away slowly after the pointer leaves, matching the reference. This is done with the fine-pointer hover variants and transition utilities alone: no Alpine state per cell. Coarse-pointer devices get no fill.

**Marquee component changes.** The component gains a `gap` option, `base` for its current 32px gap and `none` for edge-to-edge cells, so its track classes stop hardcoding the gap. Its tracks are addressed by refs rather than query selectors, one ref per copy, meeting the refs standard. The loop and the pause-on-hover listeners move inside a `gsap.matchMedia` context for `(prefers-reduced-motion: no-preference)`, so under reduced motion the tracks sit still with the first cells showing and no listeners are bound. Its unused `items` and `id` params are removed. The marqueeText Block, its only other caller, keeps working unchanged.

**Picture component changes.** The component gains a `svgInline` flag, off by default. When it is on and the asset is an SVG, the component renders the file's markup inline through Craft's SVG function, sanitised and namespaced so that two logos sharing an id, as two of the Figma exports do, never clash on one page. Hex fills in the markup are rewritten to `currentColor` on render, leaving `none` and `white` alone so mask helpers survive; the `imgClass` is applied to the root SVG element, which is how the Block passes its size cap and colour. When the flag is off, or the asset is not an SVG, nothing changes. This Block is its first caller.

**Section Footer.** The button and Avatar Group centred beneath the rows, 40px beneath at mobile and 50px from `lg`: the Block button in the secondary colour and the Avatar Group through the user component at the small size in the light scheme, 20px apart, wrapping on narrow screens. A button with no link, or an Avatar Group with no name, drops that item; both missing drops the row. The user component's light retint is in the Stacking Cards spec; whichever branch merges first carries it.

**Accessibility.** The Logo Rows are hidden from assistive technology, since every cell repeats and every row is copied for the loop. A visually hidden list of the renderable Clients' titles sits before the rows, so a screen reader hears each Client once. Inline logos carry no title of their own. Nothing in the rows takes focus.

**Seed command change.** A Seed gains an optional top-level `fields` map, resolved with the same rules as a Block's fields, written to the entry the Seed targets or creates. `blocks` becomes optional when `fields` is present. The output reports each entry field set. A rerun finds the entry, resolves the same asset by filename and writes nothing new. Dry run reports and writes nothing. This is the Client Seed's need: a Client has no Matrix field, only a title and a Logo.

**Home page content.** Nine Client Seeds, one per Client, in the Client section with the "Entry - Client" type: GXO, Oakley, Ray-Ban, Better Bathrooms, Tree Center, Marriott, MoneyExpert, Ultimate Performance and Qantas, each with its Logo exported from the Figma node as a single-colour SVG, cleaned of Figma's background rectangles, its fills set to `currentColor`. Then one Client Marquee Block after the Case Study Carousel in the Home page's Blocks, padding Top and Bottom. Eyebrow "Our Clients"; heading "Working With a Selection <em>of Ambitious Brands</em>"; the nine Clients in the order above, which puts the first five in the first row and the last four in the second as the design does; button "Let's Work Together" linking to the Contact page; Avatar Group Gareth Hoyle, Managing Director, with the Figma avatar. The Seed files, logos and avatar are already in the Seed folder under the scratch folder; the Seeds are not committed.

**Docs.** `CONTEXT.md` gained the Client Marquee vocabulary during the grilling session. The content seeding spec's Seed shape is extended by this spec's Seed command change. No new ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The single seam is the rendered Home page through the global layout, with the Block seeded beneath the Case Study Carousel and the nine Clients seeded first. The marquee, picture and user component changes are proven through it and through the existing styleguide previews, which gain nothing here. The Seed command change is proven by the Client Seeds' output.

**What good evidence looks like.** It shows what a visitor would see: the centred header, the two staggered rows with the grid lines meeting, a cell lit under the pointer, a trail of fading cells, the rows caught mid-Crawl in opposite directions, the smaller cells on a phone and the still rows under reduced motion. Fixed widths, one state per file, before and after pairs on the PR. The before for this Block is the Home page on `main` at the commit the branch forked from. Numeric checks such as cell sizes and gaps are reported as a table in the PR body, not captured as dumps.

**Evidence plan.**

1. Home page at 1600, viewport, the Block in view with the pointer off the page: Eyebrow and heading centred, the Highlight in primary, two rows of 320px cells running edge to edge with the second offset half a cell, the button and Avatar Group centred beneath. Compared against the Figma node. Proves the resting layout.
2. Home page at 1600, two captures one second apart with the pointer off the page: the first row moved left and the second right between them. Proves the Crawl and its directions.
3. Home page at 1600, viewport, the pointer held over a cell in the first row for a moment: that cell black with its Logo fluro, the row paused. Proves the hover fill and the pause.
4. Home page at 1600, viewport, half a second after the pointer has swept across three cells and left the row: the three cells fading back at different strengths. Proves the slow fade out.
5. Home page at 1600, viewport, the seam of the first row where one copy meets the next: continuous cells with no gap. Proves the seamless loop.
6. Home page at 768, viewport: 240px cells and the heading at 6xl. Proves the `md` step.
7. Home page at 390, full page: 180px cells, heading at 4xl, button and Avatar Group wrapped beneath. Proves the mobile layout.
8. Home page at 1600 with `prefers-reduced-motion: reduce` emulated, two captures one second apart: identical rows. Proves the still rows.
9. Home page at 1600 with reduced motion emulated, the pointer over a cell: the cell lit. Proves the fill survives reduced motion.
10. Seed command output for the nine Client Seeds and the Home Seed, run twice: created on the first run, skipped on the second. Saved as text beside the screenshots. Proves the seeding and the Seed command change.

## Out of Scope

- Linking a Logo Cell to anything. Clients have no page and no website field.
- A tap state for touch devices. The fill is for fine pointers only.
- Drag or swipe control of a row. The Crawl is the only motion.
- Recolouring Case Study Logos inline. The picture component's inline flag is available to that Block later.
- Editor control of speed, direction or row split. Position decides them.
- A styleguide preview for the Block. Blocks are not previewed there.
- Committing the Seeds, the logos or the avatar.

## Further Notes

- Figma at 1600: 130px padding above the Eyebrow and below the CTA row, which the section's Top and Bottom padding token matches within 2px at that width; Eyebrow to heading 30px; heading to rows 70px; rows 320px tall each; rows to CTA 50px; button 203 by 42, avatar 42px round, 20px between them.
- Figma's first row starts 20px left of the frame and its second 171px left, so the design's stagger is 151px, taken as half a cell.
- The Figma export of every logo carries two background rectangles, one a grey placeholder and one a huge canvas fill; both are stripped in the Seed folder. Marriott and Ultimate Performance use a full-size white path as a luminance mask, which is why white fills are left alone on inline render.
- The Ray-Ban logo is exported from its hover state in Figma, so its fills were fluro; they are `currentColor` now like the rest.
- The marquee component computes its loop from the two copies of each track, so a row's cells are repeated in Twig to at least six before the component doubles them.
- The design font is "Noi Grotesk Trial"; the site serves Noi Grotesk, so no font change.
