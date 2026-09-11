# Marketing Signals

The Marketing Signals marketing site: a Craft CMS front-end built from editor-composed blocks, with a global header and footer shared by every page.

## Language

### Global header

**Header**:
The site-wide bar at the top of every page holding the Logo, the Main Menu and the Header Button.
_Avoid_: Nav, navbar, top bar

**Header Colour**:
Which of the two designed appearances the Header shows on a given page: Creme 100 (light) or Black (dark). Resolved per page, not chosen by editors.
_Avoid_: Theme, variant, mode, transparent

**Main Menu**:
The editor-ordered list of Menu Items shown in the Header.
_Avoid_: Header menu, primary nav, navigation

**Menu Item**:
One entry in the Main Menu: a label and the thing it links to. Menu Items have no children.
_Avoid_: Nav link, menu link, dropdown

**Header Button**:
The single call-to-action pill on the right of the Header, set by editors on the Site entry.
_Avoid_: CTA, header link

**Mobile Menu**:
The full-screen panel that opens from the Burger below the desktop breakpoint, listing the Main Menu and the Header Button.
_Avoid_: Overlay, drawer, hamburger menu, off-canvas

**Burger**:
The two-bar toggle in the Header that opens and closes the Mobile Menu.
_Avoid_: Hamburger, menu toggle

**Site entry**:
The single Craft entry holding site-wide editor content: the Main Menu, the Header Button and the footer content.
_Avoid_: Globals, settings, site global

### Global footer

**Footer**:
The site-wide black band at the bottom of every page holding the Footer CTA, the Footer Columns, the Social Column and the Footer Bottom, with the Squiggle behind them.
_Avoid_: Site footer, page footer, bottom bar

**Footer CTA**:
The dark card at the top of the Footer: Image Columns beside a heading, text, button and Avatar Group. Its content is set by editors on the Site entry and it renders on every page that has that content.
_Avoid_: Footer banner, contact block, CTA block

**Image Columns**:
Two side-by-side vertical stacks of images that scroll continuously in opposite directions. A reusable component; the Footer CTA is its first use.
_Avoid_: Image marquee, photo columns, image ticker

**Avatar Group**:
A person's avatar image with their name and job role beside it.
_Avoid_: Author, profile, person card

**Footer Columns**:
The editor-ordered columns beneath the Footer CTA: one Contact Column and up to two Menu Columns.
_Avoid_: Footer nav, footer menu, link columns

**Contact Column**:
The Footer Column holding the footer text, the email pill and the phone pill.
_Avoid_: Menu content column, about column, text column

**Menu Column**:
A Footer Column holding a list of links, each with the same hover underline as a Menu Item.
_Avoid_: Link column, nav column

**Social Column**:
The right-hand column of Twitter / X, Facebook and LinkedIn links, read from the SEO settings rather than set by editors on the Site entry.
_Avoid_: Social icons, socials, share links

**Footer Bottom**:
The last row of the Footer: the copyright line, the Footer Logos and the Made by Shape credit.
_Avoid_: Sub-footer, legal row, copyright bar

**Footer Logos**:
The editor-uploaded partner and accreditation logos shown in the Footer Bottom.
_Avoid_: Badges, partner logos, accreditations

**Squiggle**:
The large zig-zag shape behind the Footer Columns that draws itself in as the visitor scrolls the Footer into view. A reusable component; other calls to action use it too.
_Avoid_: Scribble, swoosh, background vector, doodle

### Error page

**Error Page**:
The full-screen page shown for any HTTP error, with the Footer beneath it. It shows the Status Number, the Error Heading, the Error Links and the Scattered Tiles.
_Avoid_: 404 page, error template, not-found page, exception page

**Status Number**:
The hardcoded number filling the Error Page: "404" for a missing page, "500" for a server error.
_Avoid_: Error code, big number, hero number

**Error Heading**:
The editor-set sentence beneath the Status Number, from the Site entry.
_Avoid_: Error message, error text, subheading

**Error Links**:
The editor-ordered Buttons beneath the Error Heading, from the Site entry, rendered as a Button Group.
_Avoid_: Error buttons, helpful links, CTA links

**Error Images**:
The editor-uploaded images on the Site entry that fill the Scattered Tiles on the Error Page, in order.
_Avoid_: 404 images, background images, scatter images

**Scattered Tiles**:
A layer of Tiles placed around the edges of a full-screen area, behind its content, that Drift. Decoration: never a link, never read out. A reusable component; the Error Page is its first use and Hero Team its second.
_Avoid_: Floating images, scattered images, parallax images, image layer

**Tile Caption**:
A Team Member's name with their Job Role beneath it, over the bottom fade of a Scattered Tile in a Hero Team. Part of the decoration, so it is not clickable and not read out.
_Avoid_: Team Tile, label, name tag, overlay text

**Drift**:
The motion of Scattered Tiles: following the pointer on fine-pointer devices and the scroll everywhere, each Tile at one of three speeds.
_Avoid_: Parallax, mouse follow, float, hover effect

**Button Group**:
A row of Buttons, each coloured by its position in the row. A reusable component; the Error Links are its first use.
_Avoid_: Button row, CTA group, actions

### Heroes

**Hero**:
The top of a page, always rendered before the Blocks. On a page it is the single entry from the Hero field; on a Case Study it is the Case Study Hero; on a Service it is the Service Hero. A page has at most one.
_Avoid_: Hero block, banner, page header, masthead

**Hero Layout**:
One entry type the Hero field offers an editor. Hero Simple, Hero Home, Hero Full Screen and Hero Team are the four; Hero Template is the scaffold developers copy and is not offered to editors. The Hero Layout on a page decides its Header Colour.
_Avoid_: Hero type, hero variant, hero block

**Hero Simple**:
The Hero Layout of a Breadcrumb over a large heading with the Highlight, and a short text beside it.
_Avoid_: Simple hero, text hero, default hero

**Hero Home**:
The full-screen black Hero Layout of a very large heading with the Highlight, a short text beneath it, a Button Group, and a Work Marquee along its bottom edge, with the Scroll Cue over it. Made for the Home page, offered on any page.
_Avoid_: Home hero, homepage hero, landing hero

**Work Marquee**:
The row of Work Tiles that Crawls leftwards along the bottom of a Hero Home, tilted and running off both edges, fading into the black beneath. Decoration, not a link.
_Avoid_: Image marquee, work slider, card strip, image ticker, gallery

**Work Tile**:
One portrait image in a Work Marquee, from the editor's Images field. The Work Tiles repeat until the row is long enough to Crawl without a gap.
_Avoid_: Card, slide, image, photo, cell

**Scroll Cue**:
The Cursor Label over a Hero Home or a Hero Full Screen that reads "Scroll" beside a small circled down arrow, inviting the visitor down the page. Clicking it scrolls to the first Block.
_Avoid_: Scroll indicator, scroll hint, scroll button, mouse icon

**Hero Full Screen**:
The full-screen Hero Layout of a Breadcrumb over a two-line heading with the Highlight, the first line against the left margin and the second against the right, with a short text at the bottom left and a Hero Video at the bottom right, all over a Hero Image under a dark overlay, with the Scroll Cue over it.
_Avoid_: Full-screen hero, video hero, image hero, about hero

**Hero Team**:
The full-screen black Hero Layout of a centred Eyebrow over a heading with the Highlight, with Team Members' Images around it as Scattered Tiles, each with its Tile Caption. It shows the Team Members the editor picked, or the first six with an Image when nobody is picked. It has no Breadcrumb and no Scroll Cue.
_Avoid_: Team hero, culture hero, people hero, scattered hero

**Case Study Hero**:
The full-screen Hero at the top of every Case Study page, built from the Case Study's own Hero Image, Hero Logo, Hero Heading and Hero Text rather than a Hero Layout, so an editor never picks it. The Breadcrumb sits at its top and the Logo, heading and text sit at its bottom.
_Avoid_: Case study banner, project hero, hero layout

**Hero Image**:
The photograph that fills a Case Study Hero or a Hero Full Screen behind its content, darkened by shades at the top and bottom of a Case Study Hero and by a dark overlay across the whole of a Hero Full Screen. Without one the Hero is plain black.
_Avoid_: Background image, cover image, banner image

**Hero Logo**:
The client's Logo shown in white at the bottom of a Case Study Hero. When an editor leaves it empty the Case Study's own Logo is shown instead.
_Avoid_: Client logo, hero brand, white logo

**Hero Heading**:
The heading of a Case Study Hero or a Service Hero, with its Highlight in fluro on a Case Study and in secondary on a Service. When empty the title stands in, on a Case Study after the Tag Line, so the page always has a heading.
_Avoid_: Hero title, banner heading

**Hero Text**:
The short paragraph beside the Hero Heading in a Case Study Hero, or beneath it in a Service Hero. Empty means nothing is shown.
_Avoid_: Hero copy, intro, strapline

**Service Hero**:
The full-screen black Hero at the top of every Service page, built from the Service's own Hero Heading, Hero Text, Hero Button, Hero Avatar Group and Hero Video rather than a Hero Layout, so an editor never picks it. The Breadcrumb sits at its top; the heading, text, button and Avatar Group sit in the left column with the Hero Video filling the right.
_Avoid_: Service banner, service page hero, hero layout

**Hero Button**:
The single button beneath the Hero Text in a Service Hero, with the Avatar Group beside it. Empty means nothing is shown.
_Avoid_: Hero CTA, hero link

**Hero Video**:
The Video field of a Service Hero, filling the right of the panel, or of a Hero Full Screen, a small thumbnail at the bottom right. With a Provider it is a Poster with the Play Button; with only a Poster it is a plain image; with neither the panel holds the content alone.
_Avoid_: Hero image, hero media, side video

**Breadcrumb**:
The trail of Crumbs at the top of a Hero: Home, then the page's parents in order, then the page itself. Derived from the page, never set by editors.
_Avoid_: Breadcrumbs, trail, crumb trail, path

**Crumb**:
One page in the Breadcrumb: Home, a parent, or the current page. Every Crumb but the current page is a link.
_Avoid_: Breadcrumb item, link, step

### Blocks

**Block**:
One editor-added section of a page, chosen from the Blocks field. Each Block is an entry type with the same three-slot layout in the control panel.
_Avoid_: Section, module, component, matrix block

**Section Header**:
The first slot of a Block's layout: the heading, text and buttons that sit above the main content.
_Avoid_: Intro, top, header fields

**Section Content**:
The middle slot of a Block's layout: the main bulk of its content, such as images, a carousel or body text.
_Avoid_: Body, main, content fields

**Section Footer**:
The last slot of a Block's layout: what sits beneath the main content, such as a call-to-action button.
_Avoid_: Outro, bottom, footer fields

**Eyebrow**:
The short label that sits above a heading, such as "Who We Are".
_Avoid_: Kicker, overline, label, subheading, pre-heading

**Rule**:
The 1px line under an Eyebrow, running the full content width. It underlines a label; a Divider separates siblings.
_Avoid_: Divider, border, underline, separator

**Heading Image Grid**:
A Block of a centred heading over a two-column grid of Tiles.
_Avoid_: Image grid, photo grid, two-up, gallery

**Tile**:
One image in a grid or column, rounded and cropped to its block's ratio. The word Image Columns already uses.
_Avoid_: Card, thumbnail, cell, slot

**Highlight**:
Words an editor marks italic in a heading or text, rendered in the accent colour rather than slanted.
_Avoid_: Emphasis, accent words, coloured words, italic

**Linked Card**:
A card whose whole surface is one link to its entry. Any pill inside it says where the link goes and is not a control of its own. Every Slide is one; so are the Blog Card, the Blog Large Card and the Featured Blog.
_Avoid_: Clickable card, card link, CTA card

**Heading Reveal**:
A Block of an Eyebrow with a Rule over a large heading whose words Reveal as the visitor scrolls.
_Avoid_: Text reveal, scroll text, intro statement, manifesto

**Reveal**:
The scroll-linked fade of a heading's words from faint to full, a few words at a time, in reading order. It follows the scroll in both directions.
_Avoid_: Fade in, animate in, scroll effect, highlight scroll

**Eyebrow Heading Text**:
A Block of an Eyebrow with a Rule over a large heading with the Highlight beside a short text, with an optional Button Group beneath the text. Below the desktop breakpoint the heading, text and buttons stack.
_Avoid_: Intro block, text block, heading and text, two-column text, results block

**Statistics**:
A Block of two to four Statistics in a row, each separated from the next by a Divider.
_Avoid_: Stats, numbers, counters, figures, stat row

**Statistic**:
One number in a Statistics Block, which counts up as it scrolls into view, with an optional Suffix and Statistic Text.
_Avoid_: Stat, counter, figure, number

**Suffix**:
The small primary-coloured mark at the top right of a Statistic, such as M or +, that is not counted.
_Avoid_: Unit, superscript, badge, symbol

**Statistic Text**:
The line beneath a Statistic saying what it counts.
_Avoid_: Label, caption, description

**Divider**:
The 1px line between siblings: black between Statistics, vertical when they sit in a row and horizontal when they stack; white between a Video CTA's heading and its Avatar Group.
_Avoid_: Border, separator, rule, line

### Service Carousel

**Service**:
An entry in the Service section: one of the agency's digital marketing services, with a Description and a Thumbnail of its own, and a Service Hero at the top of its page.
_Avoid_: Service page, offering, product

**Service Carousel**:
A Block of an Eyebrow over a row of Slides, one per Service the editor picked, that Pins to the screen and moves sideways as the visitor scrolls.
_Avoid_: Services slider, service cards, horizontal scroller, carousel block

**Slide**:
One entry in a carousel Block: a rounded card, the whole of it one link to the entry. Slides sit side by side with a small gap between them, so the neighbours show at the edges.
_Avoid_: Card, panel, item, tile, full-screen image

**Service Slide**:
A Slide in the Service Carousel: inside the site margins, its Thumbnail darkened behind the Eyebrow, its Slide Number, its title and its Description.
_Avoid_: Service card, service tile

**Slide Number**:
The bracketed count at the right end of a Slide's Eyebrow row, such as "(01)", saying which Slide it is.
_Avoid_: Counter, index, pagination number

**Pin**:
The scroll-driven behaviour of a sideways Block: the Block holds still on screen while the visitor's own scroll moves its row sideways, resting wherever the scroll stops. The Service Carousel Pins at every width; the Scrolling Cards Pin from the desktop breakpoint and are a plain column below it and under reduced motion.
_Avoid_: Scroll-jack, horizontal scroll, sticky section, scrub, snap

**Slide Progress**:
The indicator beneath a carousel saying how far through its Slides the visitor is: a row of bars in the Service Carousel, one per Slide, each filling as the visitor scrolls through its Slide; a single line in the Blog Carousel, filled to the Slide in view.
_Avoid_: Pagination, dots, progress bar, indicator, counter

**Cursor Label**:
The custom cursor that follows the pointer over an element on fine-pointer devices, saying what a click there does: on a Slide or a Case Study Card, what it links to, such as "Find Out More" or "View Case Study"; on a Hero Home or a Hero Full Screen, the Scroll Cue. Where a Slide gives no other cue, a button on the Slide says the same on coarse-pointer devices.
_Avoid_: Hover cursor, cursor follower, tooltip, CTA

### Case Study Carousel

**Case Study**:
An entry in the Case Study section: one piece of client work, with a Thumbnail, a Logo, a Tag Line and a Category of its own, and a Case Study Hero at the top of its page.
_Avoid_: Work, project, portfolio item, success story

**Case Study Carousel**:
A Block of an Eyebrow and a heading over a row of Slides, one per Case Study the editor picked, that the visitor moves with the Carousel Controls or by dragging. It sits in a black panel inside the site margins.
_Avoid_: Work carousel, featured work, case study slider, work exterior

**Case Study Card**:
The Linked Card for a Case Study: its Thumbnail darkened behind its Category Badge, its Logo and its Tag Line, with a Cursor Label and a Zoom on hover. Shown as a Case Study Slide in the Case Study Carousel and at a Card Size in the Case Study Grid.
_Avoid_: Work card, project tile, case study tile, exterior

**Case Study Slide**:
A Case Study Card shown as a Slide in the Case Study Carousel.
_Avoid_: Work card, project tile

**Category Badge**:
The small translucent pill at the top left of a Case Study Card naming the Case Study's first Category.
_Avoid_: Tag, label, chip, pill

**Tag Line**:
The one-line result a Case Study leads with, such as "188% increase in traffic from LLMs", set by editors on the Case Study with its Highlight.
_Avoid_: Strapline, subtitle, result, stat line

**Logo**:
The client's logo image: on a Case Study, shown centred on its Slide as the Slide's visible title; on a Client, shown in its Logo Cell; on a Testimonial, shown at the top right of its Testimonial Card.
_Avoid_: Client logo, brand, mark, icon

**Carousel Controls**:
The Previous and Next buttons that move a carousel one Slide at a time: the text pills beneath the Slides by default, or the two icon circles where the design draws them.
_Avoid_: Arrows, nav buttons, pagination, prev/next

### Case Study Grid

**Case Study Grid**:
The grid of every Case Study on the Case Studies page, narrowed by the Category Filter and read eight at a time through its Pagination. It sits between the page's Hero and its Blocks.
_Avoid_: Work grid, listing, archive, index, case study listing

**Card Size**:
Whether a Case Study Card in the Case Study Grid is Large (the full grid width) or Half (six columns). It follows the card's position on its page, first and sixth Large, so an editor never sets it.
_Avoid_: Featured, hero card, variant, span

**Category Filter**:
The row of Filter Buttons above the Case Study Grid, one per Category that at least one Case Study belongs to, led by All Work. Exactly one Filter Button is active at a time. Where the row is wider than the page it scrolls sideways under a pair of arrows.
_Avoid_: Tags, tabs, category nav, filter bar, facets

**Filter Button**:
One button in the Category Filter, a radar dot beside a Category's name, that narrows the Case Study Grid to that Category and returns it to page one.
_Avoid_: Tag, pill, chip, tab, toggle

**All Work**:
The first Filter Button, active on arrival, that shows every Case Study regardless of Category.
_Avoid_: All, reset, clear, show all

**Pagination**:
The row beneath the Case Study Grid of a Previous button, the Page Window and a Next button. Previous and Next are shown on every page and disabled at the ends.
_Avoid_: Pager, page nav, load more, infinite scroll

**Page Number**:
One numbered circle in the Page Window that opens that page of the Case Study Grid. The current page's Page Number is filled.
_Avoid_: Page link, dot, step

**Page Window**:
The up-to-five Page Numbers shown at once, sliding so the current page stays central once there are more than five pages.
_Avoid_: Page range, ellipsis pages, truncated pagination

### Case Study Intro

**Case Study Intro**:
The column on a Case Study page between its Hero and its Blocks: an Eyebrow with a Rule over a large heading with the Highlight, and the Text beneath, with the Case Study Sidebar beside it.
_Avoid_: Intro block, challenge section, case study content, intro section

**Case Study Sidebar**:
The white card beside the Case Study Intro showing the Case Study's Overview: its Logo in black, its Description and its Sidebar Rows. It sits above the Case Study Intro below the desktop breakpoint.
_Avoid_: Aside, info card, meta card, details panel, sticky sidebar

**Overview**:
The Case Study's own facts that every surface reads rather than an editor re-entering them: its Logo, Description, Industry, Year and Categories.
_Avoid_: Meta, entry details, overview tab, case study info

**Sidebar Row**:
One label-and-value line in the Case Study Sidebar, under a thin line: Industry, Year or Services. The Services row shows the Case Study's first Category as an outlined pill. A Sidebar Row with no value is left out.
_Avoid_: Meta row, detail, stat, spec line

### Stacking Cards

**Stacking Cards**:
A Block of a heading and text beside a pile of Stacking Cards, with a button and an Avatar Group beneath the pile. The cards Stack as the visitor scrolls.
_Avoid_: Card stack, scroll cards, industries block, sticky cards

**Stacking Card**:
One panel in a Stacking Cards Block: its Card Images beside a heading, text and button, coloured and tilted by its Card Scheme.
_Avoid_: Card, panel, slide, tile, item

**Card Images**:
The one or more images an editor adds to a Stacking Card, shown one at a time in the card's image slot through the Image Cycle.
_Avoid_: Gallery, slideshow, image carousel, thumbnails

**Card Scheme**:
The colour a card takes from its position, in the sequence its block defines, repeating past the end. Never chosen by editors. A Stacking Card also takes its tilt from it: white, black, secondary and fluro in turn. A Service Card runs white, black, secondary, fluro and creme-200. A Scrolling Card takes its tilt from it too: white, black and secondary in turn.
_Avoid_: Theme, variant, colour option, style

**Stack**:
The scroll-driven behaviour of the Stacking Cards Block: the whole Block holds still on screen while each Stacking Card slides up and away in turn to reveal the one beneath, following the scroll in both directions. Below the desktop breakpoint, and under reduced motion, the cards are a plain column instead.
_Avoid_: Pin, scroll-jack, sticky, parallax, deck

**Image Cycle**:
The timed cross-fade between a Stacking Card's Card Images, one every few seconds, that runs only while the card is on screen. A card with one image has none.
_Avoid_: Slideshow, rotation, auto-play, fade loop

### Scrolling Cards

**Scrolling Cards**:
A Block of an Eyebrow and Rule over a row of Scrolling Cards that Pins to the screen and moves sideways as the visitor scrolls, with a button and an Avatar Group centred beneath the row.
_Avoid_: Card scroller, horizontal cards, approach block, scroll carousel

**Scrolling Card**:
One card in a Scrolling Cards Block: its image filling the left of the card beside a heading and text, coloured and tilted by its Card Scheme, the active one centred with its neighbours peeking at both sides. Not a link.
_Avoid_: Card, slide, panel, tile, item

### Client Marquee

**Client**:
An entry in the Client section: a brand the agency has worked with, with a Logo of its own and no page.
_Avoid_: Brand, customer, partner, account

**Client Marquee**:
A Block of an Eyebrow and a centred heading over two Logo Rows, one per half of the Clients the editor picked, that Crawl in opposite directions, with a button and an Avatar Group beneath.
_Avoid_: Logo carousel, logo grid, client logos, brand ticker

**Logo Row**:
A full-width row of Logo Cells that Crawls: one of the two in a Client Marquee, offset from the other by half a cell, or the single row in a Logo Marquee.
_Avoid_: Track, strip, band, ticker, lane

**Crawl**:
The continuous sideways motion of a row that never stops: a Client Marquee's Logo Rows, leftwards in the first and rightwards in the second and pausing while the pointer is over them; a Logo Marquee's Logo Row, leftwards and never pausing; a Work Marquee, leftwards and never pausing; a Team Marquee's row of Team Tiles, leftwards and pausing under the pointer, while a Team Tile has focus and while the Team Modal is open; an Image Marquee's row of Tiles, leftwards and never pausing; or an Icon Card Marquee's row of Icon Cards, leftwards and pausing under the pointer. Under reduced motion the row sits still.
_Avoid_: Marquee, scroll, ticker, autoplay, loop

### Logo Marquee

**Logo Marquee**:
A Block of a Rule Label over one Logo Row of Logos the editor uploaded, that Crawls leftwards without pausing. Decoration for a Service page; it picks no Clients.
_Avoid_: Logo carousel, logo strip, brand ticker, client logos, logo bar

**Rule Label**:
A short centred sentence sitting on a Rule that runs the full content width behind it, with part of the sentence in a heavier weight. The Logo Marquee is its first use.
_Avoid_: Divider heading, line heading, section label, eyebrow

**Logo Cell**:
One fixed-width space in a Logo Row holding a Logo centred: bordered and lit under the pointer in a Client Marquee, plain in a Logo Marquee. Not a link.
_Avoid_: Tile, card, slot, item, logo box

### Video Content

**Video Content**:
A Block of a Poster beside an Eyebrow with a Rule, a heading with the Highlight, two Text Columns and a Button Group, set in a black panel inside the site margins with the Squiggle at its bottom right. Clicking the Poster opens the Video Modal.
_Avoid_: Video and text, media text, feature video

**Poster**:
The still image that stands in for a video before it plays, with the Play Button over it. Set by editors on the Video field.
_Avoid_: Thumbnail, cover, placeholder, video image

**Play Button**:
The lilac circle with a play glyph, centred on a Poster or at the bottom left of a Video CTA. It opens the Video Modal.
_Avoid_: Play icon, CTA, trigger

**Video Modal**:
The full-screen overlay that opens from a Poster and holds a Video Player, closed by its close button, its backdrop or Escape.
_Avoid_: Lightbox, popup, overlay, dialog

**Video Player**:
The reusable component that plays a video from any Provider with the same Controls. The Video Modal is its first use.
_Avoid_: Embed, iframe, player wrapper

**Provider**:
Where a video comes from: Vimeo, YouTube or an uploaded File.
_Avoid_: Source, platform, host, type

**Controls**:
The Video Player's own play/pause, mute, fullscreen, progress bar and time labels, the same for every Provider.
_Avoid_: Native controls, player UI, chrome

**Text Columns**:
The two side-by-side rich text columns beneath a heading, one column below the tablet breakpoint. A column with no content leaves its half empty.
_Avoid_: Body copy, two-col text, paragraphs, intro text

### Testimonial Grid

**Testimonial**:
An entry in the Testimonial section: one client's quote, with the person's name, job role and avatar, their company's Logo and, when the editor adds it, its Media. It has no page.
_Avoid_: Review, quote, reference, case study quote

**Testimonial Grid**:
A Block of a centred heading with the Highlight over a scatter of Testimonial Cards, one per Testimonial the editor picked, with a Button Group beneath.
_Avoid_: Testimonials block, reviews grid, quote grid, testimonial scatter

**Testimonial Card**:
One coloured panel in a Testimonial Grid: an Avatar Group and the Logo above the Testimonial's quote.
_Avoid_: Card, review card, quote card, tile

**Review Badge**:
The line above a Testimonial Grid's heading: the Google mark, the Star Rating, and a short editor text such as "4.9 from 130 reviews". Shown only when the editor turns Google Reviews on and sets a Star Rating.
_Avoid_: Google row, rating bar, trust badge, reviews line

**Star Rating**:
The half-step score from 0.5 to 5 an editor picks for the Review Badge, drawn as that many full and half stars with no empty ones.
_Avoid_: Stars, score, rating value

**Scatter**:
The desktop placement of Testimonial Cards in a Testimonial Grid: each card takes the next Slot in turn, repeating past six. Below the desktop breakpoint the cards are a plain grid instead.
_Avoid_: Masonry, layout pattern, stagger, offset grid

**Slot**:
One of the six positions in the Scatter, fixing a card's column, its drop below the row and its colour: fluro, secondary, black, creme-200, fluro, white in turn. Never chosen by editors.
_Avoid_: Position, cell, placement, scheme

**Sink**:
The behaviour of a Testimonial Grid's heading and Review Badge from the desktop breakpoint: they hold still below the Header while the Testimonial Cards scroll over them, then dim out behind the page colour towards the bottom of the cards. Below the desktop breakpoint the heading is in flow.
_Avoid_: Sticky heading, fade, parallax, pin

### Featured Testimonial

**Featured Testimonial**:
A Block of one Testimonial in a black panel inside the site margins: an Eyebrow with a Rule over the quote, the Avatar Group and the Logo beneath it, and the Testimonial's Media filling the right of the panel. Below the desktop breakpoint the Media sits between the Eyebrow and the quote.
_Avoid_: Testimonial block, single testimonial, quote block, hero testimonial, client quote

### Team Carousel

**Team Member**:
An entry in the Team section: a person's name, Job Role, Image and Quote, with a Video when the editor adds one.
_Avoid_: Staff, employee, author, person

**Team Carousel**:
A Block of Team Slides in a black panel inside the site margins, one Slide per Team Member the editor picked, with a fixed Eyebrow and Rule above them and the Carousel Controls at the end of the Avatar Group row.
_Avoid_: Team testimonial, careers carousel, featured team, staff slider

**Team Slide**:
One Team Member's Quote with their Avatar Group beneath it and their Video or Image filling the right of the panel. Below the desktop breakpoint the media sits between the Eyebrow and the Quote.
_Avoid_: Team card, testimonial slide, member slide

### Timeline

**Timeline**:
A Block of Milestones in a black panel inside the site margins, one Slide per Milestone the editor adds, with a fixed Eyebrow and Rule above them, the Carousel Controls beneath each Milestone's text and the Year Row along the panel's bottom.
_Avoid_: History, journey, timeline carousel, years slider, our story

**Milestone**:
One entry in a Timeline: a Year, a heading with the Highlight, a short text and up to three Milestone Tiles. A Milestone without a Year or a heading is skipped.
_Avoid_: Timeline item, year entry, event, step, slide

**Year**:
The short label an editor gives a Milestone, such as "2006", shown above its heading and as its Year Mark.
_Avoid_: Date, label, title

**Milestone Tiles**:
A Milestone's images as tilted, rounded tiles overlapping each other on the right of the panel, each in the next Tile Slot in order. Below the desktop breakpoint they sit between the Eyebrow and the Year.
_Avoid_: Image scatter, photo stack, collage, gallery, image group

**Tile Slot**:
One of the three positions for Milestone Tiles, fixing a tile's size, place and tilt: the first large at the top left, the second largest at the bottom right, the third small at the bottom left over both. Never chosen by editors.
_Avoid_: Position, slot, placement, layer

**Year Row**:
The row of Year Marks on a thin track along the bottom of a Timeline, one per Milestone in order, with the Year Dash after the active one. Below the desktop breakpoint it scrolls sideways to keep the active Year Mark in view.
_Avoid_: Pagination, dots, bullets, year nav, timeline bar, progress

**Year Mark**:
One Year in the Year Row: white when its Milestone is the one showing, creme 500 otherwise, and a button that slides the Timeline to its Milestone.
_Avoid_: Bullet, dot, tab, pagination item, year button

**Year Dash**:
The short fluro segment of the Year Row's track after the active Year Mark, moving to follow it as the Milestone changes. Not drawn after the last Year Mark.
_Avoid_: Progress bar, fill, indicator, highlight line

### Team Marquee

**Team Marquee**:
A Block of a centred heading with the Highlight over one row of Team Tiles that Crawls, in a black panel inside the site margins. Shows the Team Members the editor picked, or the first eight with an Image when nobody is picked.
_Avoid_: Team slider, staff carousel, meet the team, team cards

**Team Tile**:
One Team Member's Image with their name and Job Role over a bottom fade and a plus icon, in a Team Marquee or the Team Grid. Clicking it opens the Team Modal. A Team Member without an Image has no Team Tile.
_Avoid_: Team card, member card, profile card, slide

**Team Modal**:
The overlay that opens from a Team Tile: the Team Member's Image on the left with the close button over it, and their name, Job Role, a Rule and Text on the right. Closed by its close button, its backdrop or Escape.
_Avoid_: Lightbox, popup, team pop up, profile modal, dialog

### Team Grid

**Team Listing page**:
The Page whose entry type is Team Listing, holding the Hero, the Team Grid and the Blocks. There is one, found by its entry type (ADR-0003).
_Avoid_: Team page, meet the team page, team index

**Team Grid**:
The grid of Team Tiles between the Hero and the Blocks on the Team Listing page, one per enabled Team Member with an Image in structure order, with the Team Intro among them and Load More beneath. Three across on a desktop, two on a tablet and one on a phone. It has no Block and no field: Team Members pull through on their own.
_Avoid_: Team listing, team cards, staff grid, people grid

**Team Intro**:
The text, button and Avatar Group set by editors on the Team Listing page, sitting in the Team Grid's third slot on a desktop and above the Team Tiles on a tablet or phone. Not shown when none of the three is set.
_Avoid_: Team text, intro block, grid CTA, List Footer

### Image Marquee

**Image Marquee**:
A Block of a heading with the Highlight beside text, over one full-width row of Tiles the editor uploaded that Crawls leftwards without pausing. Each photo is announced once, by its title.
_Avoid_: Image carousel, photo strip, gallery, image slider, image ticker

### FAQ Accordion

**FAQ**:
An entry in the FAQ section: a question, its Answer and an optional Button Group. It has no page.
_Avoid_: Question entry, help article, Q&A

**FAQ Accordion**:
A Block of a heading with the Highlight beside a list of Questions, one per FAQ the editor picked, in a creme panel inside the site margins, with Load More beneath when there are more than seven. From the desktop breakpoint the heading Follows.
_Avoid_: FAQ block, FAQs, accordion block, questions section

**Question**:
One row in a FAQ Accordion: the FAQ's question with a toggle at its right. Opening one closes any other.
_Avoid_: Accordion item, row, panel, FAQ item

**Answer**:
The text an open Question reveals, with the FAQ's Button Group beneath it when one is set.
_Avoid_: Content, body, description, response

**Load More**:
The button beneath a list that brings in more of it without leaving the page, shown only while some are not yet on the page: beneath the Questions it loads every remaining Question in one click; beneath the Team Grid it adds the next twelve Team Tiles.
_Avoid_: Show more, pagination, view all, expand

**Follow**:
The behaviour of a FAQ Accordion's heading from the desktop breakpoint: it holds still below the Header while the Questions scroll past it. Unlike the Sink it never dims. Below the desktop breakpoint the heading is in flow.
_Avoid_: Sticky, pin, sink, parallax

### Blog Carousel

**Blog**:
An entry in the Blog section: one article, with a Thumbnail, a Description and Categories of its own, published at `/insights/`.
_Avoid_: Insight, article, post, news item

**Blog Carousel**:
A Block of an Eyebrow with a Rule, a heading and a button over a row of Blog Sets, one Set per three Blogs the editor picked, or the nine latest Blogs when none are picked. The visitor moves it with the Carousel Controls or by dragging, and it loops. Below the desktop breakpoint it is a row of Blog Large Cards instead, one per Blog.
_Avoid_: Insights carousel, blog slider, latest posts, news carousel

**Blog Set**:
A Slide in the Blog Carousel: one Blog Large Card beside two Blog Cards stacked, filling the content width. A last Set with fewer than three Blogs keeps its shape with the gaps empty.
_Avoid_: Group, page, batch, trio

**Blog Card**:
A Linked Card for a Blog: its date and read time, its title and a "Continue Reading" pill beside its Thumbnail on the right. Two sit stacked in a Blog Set.
_Avoid_: Landscape card, small card, post card, article card

**Blog Large Card**:
A Linked Card for a Blog: its Thumbnail across the top over its date and read time, its title, its Description and a "Continue Reading" pill. One leads a Blog Set, it is the only card in the Blog Carousel below the desktop breakpoint, and it is every card in a Blog Grid.
_Avoid_: Featured card, big card, hero card, exterior

**Zoom**:
The hover behaviour of a Blog Card, a Blog Large Card, a Featured Blog and a Case Study Card on fine-pointer devices: the Thumbnail grows a little inside its rounded frame while any pill lights up. Nothing moves under reduced motion.
_Avoid_: Scale, hover effect, image hover, ken burns

### Blog Grid

**Blog Grid**:
A Block of an Eyebrow with a Rule over a heading with the Highlight beside a short text, over a grid of Blog Large Cards, two to a row from the desktop breakpoint and one below it, one per Blog the editor picked, in the order picked. An odd last card sits alone in the left half. It never falls back to the latest Blogs: with none picked it renders nothing.
_Avoid_: Blog list, blog listing, insights grid, related posts, latest posts

### Featured Blog

**Featured Blog**:
A Block of one Blog the editor picked, shown as a single Linked Card filling a black panel inside the site margins: its Thumbnail covering the panel under a shade, a "Featured Article" badge at the top left, and its date and read time, title, Description and a "Continue Reading" pill at the bottom left. With no Blog picked, or a disabled one, it renders nothing.
_Avoid_: Featured post, featured article, blog hero, blog banner, spotlight

### Content Rows

**Content Rows**:
A Block of a centred heading with the Highlight over a stack of Content Rows, as many as the editor adds.
_Avoid_: Half and half, image and text block, alternating rows, zigzag

**Content Row**:
One row in a Content Rows Block: the Media on one side of the grid and, on the other, a heading, Text, Accordion Items and a Button Group, all optional. From the desktop breakpoint the two sides sit side by side in the editor's Content Order; below it the Media is always above the content.
_Avoid_: Row, section, half, split

**Media**:
The image or video side of a Content Row, or the image or video on a Testimonial: an Image, or a Video that is either a Poster opening the Video Modal or an Inline Video.
_Avoid_: Asset, visual, picture side, thumbnail

**Media Type**:
The editor's choice, on a Content Row or a Testimonial, of whether its Media is an Image or a Video. The one not chosen is hidden and never read.
_Avoid_: Media kind, asset type, format, video toggle

**Content Order**:
The editor's choice per Content Row of which side leads from the desktop breakpoint: Media First or Content First. It has no effect below the desktop breakpoint.
_Avoid_: Flip, reverse, alignment, image position

**Check List**:
A bulleted list in a Content Row's Text, drawn as a check mark in a secondary circle before each item, in two columns from the tablet breakpoint.
_Avoid_: Ticks, features list, bullet points, USPs

**Accordion Item**:
One row beneath a Content Row's Text: a heading with a toggle at its right that reveals its text. Opening one closes any other in the same Content Row. Unlike a Question it has no Button Group and is not an entry.
_Avoid_: Question, accordion, FAQ, panel, dropdown

**Inline Video**:
A Video in a Content Row's Media that plays in place rather than in the Video Modal, muted, with the Time Ring at its bottom right. Chosen by the Video field's Display Type.
_Avoid_: Background video, autoplay video, embedded video, looping video

**Hover Play**:
The behaviour of an Inline Video on fine-pointer devices: it plays while the pointer is over it and pauses when the pointer leaves, unless the Time Ring's button has pinned it. Nothing plays on hover under reduced motion.
_Avoid_: Autoplay, preview, hover effect, mouseover

**Time Ring**:
The button at the bottom right of an Inline Video: a white ring that empties as the video plays, holding a play or pause glyph. Pressing it plays or pauses the video and holds that state until the next Hover Play.
_Avoid_: Loader, progress circle, pause button, spinner

### Video

**Video**:
A Block of one video from the Video field, 16:9 across the content width inside the site margins, that plays in place or in the Video Modal by its Display Type. With no video it shows its Poster alone, and with neither it shows nothing.
_Avoid_: Video block, full-width video, video embed, media block

**Shade**:
The 40% darkening over a Poster at rest that says a video is there. It fades away with the Poster when an Inline Video first plays. A Poster with no video has no Shade.
_Avoid_: Overlay, tint, dim, gradient, darken

### Video CTA

**Video CTA**:
A Block of an Eyebrow with a Rule at the top of a black panel inside the site margins, with the heading, a Divider and an Avatar Group along its bottom right and the Play Button at its bottom left. Its Video - Only field plays as an Ambient Video behind the content, or shows the Poster alone when there is no video.
_Avoid_: Video banner, video hero, autoplay block, CTA video, background video block

**Ambient Video**:
A video that plays by itself behind a Block's content, muted and looping, with no Controls, from the moment the Block comes into view. It never plays under reduced motion, pauses while the Video Modal is open, and is never a YouTube video. The Video CTA is its first use.
_Avoid_: Background video, autoplay video, hero video, looping video, inline video

**Video Shadows**:
The two gradients over a Video CTA's media, a light one at the top and a heavy one at the bottom, that keep the Eyebrow and the heading readable over the video. They stay while the Ambient Video plays.
_Avoid_: Shade, overlay, gradient, vignette, fade

### Icon Grid

**Icon Grid**:
A Block of a Section Header over a grid of Icon Cards, three across on a desktop, two on a tablet and one on a phone, with a Button and an Avatar Group centred beneath.
_Avoid_: Feature grid, services grid, approach grid, icon boxes, USP grid

**Icon Card**:
One white rounded card in an Icon Grid or a Card Group: an Icon over a centred heading and a short text.
_Avoid_: Feature, tile, box, item, cell

**Icon**:
The large primary-coloured mark at the top of an Icon Card, chosen by its Icon Type. Decoration: the heading names the card.
_Avoid_: Glyph, symbol, pictogram, illustration

**Icon Type**:
Which of the two sources an Icon comes from: a Font Awesome icon named by the editor and always shown in the Sharp Duotone Light style, or an Image the editor uploads.
_Avoid_: Icon style, icon source, media type

### Service List

**Service Listing page**:
The Page whose entry type is Service Listing, holding the Hero, the Service List, the List Footer and the Blocks. There is one, found by its entry type (ADR-0003).
_Avoid_: Services page, services index

### Icon Card Marquee

**Icon Card Marquee**:
A Block of a centred Eyebrow and heading with the Highlight over a row of Group Tabs, and beneath them one full-width row of Icon Cards that Crawls: the active Card Group's. Choosing another Group Tab crossfades to that Card Group's row. The first Card Group is active on arrival.
_Avoid_: Tabbed marquee, benefits block, icon carousel, card ticker, tabs block

**Card Group**:
One set of Icon Cards in an Icon Card Marquee, named by its Tab Heading. A Card Group with no Icon Cards is left out, Group Tab included.
_Avoid_: Tab, panel, group, category, set

**Group Tab**:
The pill that shows its Card Group's row, reading the Tab Heading: filled in Secondary while its Card Group is active, outlined in Creme 400 otherwise and filled on hover. Not shown when the Block has only one Card Group.
_Avoid_: Tab, filter button, pill, toggle, chip

**Tab Heading**:
The short label an editor gives a Card Group, shown as its Group Tab.
_Avoid_: Tab title, group name, label

**Service List**:
The run of Service Cards between the Hero and the Blocks on the Service Listing page, one per enabled Service in structure order, with the List Footer beneath. It has no Block and no field: Services pull through on their own.
_Avoid_: Service grid, services stack, service cards block

**Service Card**:
The Linked Card for a Service on the Service List: its Card Number, title, Description and Category Tags beside its Thumbnail, coloured by its Card Scheme, with a Cursor Label and a Zoom on hover. Not a Service Slide.
_Avoid_: Service panel, service tile, service row

**Card Number**:
The two-digit position of a Service Card in the Service List, such as "01", above a Rule. Unlike a Slide Number it has no brackets.
_Avoid_: Index, counter, eyebrow number

**Category Tag**:
An outlined pill naming one of a Service's Categories, under the words "Services include" on a Service Card. A Service Card shows four, then an Overflow Tag.
_Avoid_: Tag, chip, badge, category pill

**Overflow Tag**:
The Category Tag reading "+N" after the fourth, where N is how many Categories are not shown. Absent when four or fewer exist.
_Avoid_: More pill, plus badge, counter

**Tag Tooltip**:
The small dark panel that appears above the Overflow Tag on hover, listing the hidden Categories comma separated. The same list is read out to screen readers without it.
_Avoid_: Popover, hover card, popup

**Overlap**:
The scroll behaviour of the Service List from the desktop breakpoint: each Service Card holds at the top of the screen once it reaches it, and the next slides up over it, every card stopping at the same line. Below the desktop breakpoint, and under reduced motion, the cards are a plain column.
_Avoid_: Stack, sticky cards, pin, scroll-jack, parallax

**List Footer**:
The button and Avatar Group centred beneath the Service List, set by editors on the Service Listing page. It renders when either is set, with or without Services.
_Avoid_: CTA row, footer CTA, services footer

### Banner CTA

**Banner CTA**:
A Block of a black panel inside the site margins holding a heading with the Highlight, a short text and a Button, with a Cutout standing on the panel's bottom edge and the Squiggle in fluro behind the content. Side by side from the wide desktop breakpoint; below it the Cutout sits above the content.
_Avoid_: CTA banner, promo banner, careers banner, image banner, callout

**Cutout**:
A photograph of a person with a transparent background that stands on a panel's bottom edge and rises above the panel's top. The Banner CTA is its first use.
_Avoid_: Person image, portrait, PNG, floating image, sticker

### Seeding

**Seed**:
A description of Blocks and their content to add to one entry on the development site, so a Block can be reviewed with real content. Rerunning a Seed adds nothing twice.
_Avoid_: Fixture, dummy content, sample data, import
