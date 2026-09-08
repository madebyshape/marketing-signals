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
A layer of Tiles placed around the edges of a full-screen area, behind its content, that Drift. A reusable component; the Error Page is its first use.
_Avoid_: Floating images, scattered images, parallax images, image layer

**Drift**:
The motion of Scattered Tiles: following the pointer on fine-pointer devices and the scroll everywhere, each Tile at one of three speeds.
_Avoid_: Parallax, mouse follow, float, hover effect

**Button Group**:
A row of Buttons, each coloured by its position in the row. A reusable component; the Error Links are its first use.
_Avoid_: Button row, CTA group, actions

### Heroes

**Hero**:
The single entry at the top of a page, from the Hero field, always rendered before the Blocks. A page has at most one.
_Avoid_: Hero block, banner, page header, masthead

**Hero Layout**:
One entry type the Hero field offers an editor. Hero Simple and Hero Home are the two; Hero Template is the scaffold developers copy and is not offered to editors. The Hero Layout on a page decides its Header Colour.
_Avoid_: Hero type, hero variant, hero block

**Hero Simple**:
The Hero Layout of a Breadcrumb over a large heading with the Highlight, and a short text beside it.
_Avoid_: Simple hero, text hero, default hero

**Hero Home**:
The full-screen black Hero Layout of a very large heading with the Highlight, a short text beneath it, a Button Group, and a Work Marquee along its bottom edge, with the Scroll Cue over it. Made for the Home page, offered on any page.
_Avoid_: Home hero, homepage hero, landing hero, full-screen hero

**Work Marquee**:
The row of Work Tiles that Crawls leftwards along the bottom of a Hero Home, tilted and running off both edges, fading into the black beneath. Decoration, not a link.
_Avoid_: Image marquee, work slider, card strip, image ticker, gallery

**Work Tile**:
One portrait image in a Work Marquee, from the editor's Images field. The Work Tiles repeat until the row is long enough to Crawl without a gap.
_Avoid_: Card, slide, image, photo, cell

**Scroll Cue**:
The Cursor Label over a Hero Home that reads "Scroll" beside a small circled down arrow, inviting the visitor down the page. Clicking it scrolls to the first Block.
_Avoid_: Scroll indicator, scroll hint, scroll button, mouse icon

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
A card whose whole surface is one link to its entry. Any pill inside it says where the link goes and is not a control of its own. Every Slide is one; so are the Blog Card and the Blog Large Card.
_Avoid_: Clickable card, card link, CTA card

**Heading Reveal**:
A Block of an Eyebrow with a Rule over a large heading whose words Reveal as the visitor scrolls.
_Avoid_: Text reveal, scroll text, intro statement, manifesto

**Reveal**:
The scroll-linked fade of a heading's words from faint to full, a few words at a time, in reading order. It follows the scroll in both directions.
_Avoid_: Fade in, animate in, scroll effect, highlight scroll

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
The 1px black line between Statistics: vertical when they sit in a row, horizontal when they stack.
_Avoid_: Border, separator, rule, line

### Service Carousel

**Service**:
An entry in the Service section: one of the agency's digital marketing services, with a Description and a Thumbnail of its own.
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
The scroll-driven behaviour of the Service Carousel: the Block holds still on screen while the visitor's own scroll moves the Slides sideways, at every width, resting wherever the scroll stops.
_Avoid_: Scroll-jack, horizontal scroll, sticky section, scrub, snap

**Slide Progress**:
The indicator beneath a carousel saying how far through its Slides the visitor is: a row of bars in the Service Carousel, one per Slide, each filling as the visitor scrolls through its Slide; a single line in the Blog Carousel, filled to the Slide in view.
_Avoid_: Pagination, dots, progress bar, indicator, counter

**Cursor Label**:
The custom cursor that follows the pointer over an element on fine-pointer devices, saying what a click there does: on a Slide, what it links to, such as "Find Out More" or "View Case Study"; on a Hero Home, the Scroll Cue. Where a Slide gives no other cue, a button on the Slide says the same on coarse-pointer devices.
_Avoid_: Hover cursor, cursor follower, tooltip, CTA

### Case Study Carousel

**Case Study**:
An entry in the Case Study section: one piece of client work, with a Thumbnail, a Logo, a Tag Line and a Category of its own.
_Avoid_: Work, project, portfolio item, success story

**Case Study Carousel**:
A Block of an Eyebrow and a heading over a row of Slides, one per Case Study the editor picked, that the visitor moves with the Carousel Controls or by dragging. It sits in a black panel inside the site margins.
_Avoid_: Work carousel, featured work, case study slider, work exterior

**Case Study Slide**:
A Slide in the Case Study Carousel: the Case Study's Thumbnail darkened behind its Category Badge, its Logo and its Tag Line.
_Avoid_: Case study card, work card, project tile

**Category Badge**:
The small translucent pill at the top left of a Case Study Slide naming the Case Study's first Category.
_Avoid_: Tag, label, chip, pill

**Tag Line**:
The one-line result a Case Study leads with, such as "188% increase in traffic from LLMs", set by editors on the Case Study with its Highlight.
_Avoid_: Strapline, subtitle, result, stat line

**Logo**:
The client's logo image: on a Case Study, shown centred on its Slide as the Slide's visible title; on a Client, shown in its Logo Cell; on a Testimonial, shown at the top right of its Testimonial Card.
_Avoid_: Client logo, brand, mark, icon

**Carousel Controls**:
The Previous and Next pills beneath a carousel's Slides that move the row one Slide at a time.
_Avoid_: Arrows, nav buttons, pagination, prev/next

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
The colour and tilt a Stacking Card takes from its position in the pile: white, black, secondary and fluro in turn, repeating past four. Never chosen by editors.
_Avoid_: Theme, variant, colour option, style

**Stack**:
The scroll-driven behaviour of the Stacking Cards Block: the whole Block holds still on screen while each Stacking Card slides up and away in turn to reveal the one beneath, following the scroll in both directions. Below the desktop breakpoint, and under reduced motion, the cards are a plain column instead.
_Avoid_: Pin, scroll-jack, sticky, parallax, deck

**Image Cycle**:
The timed cross-fade between a Stacking Card's Card Images, one every few seconds, that runs only while the card is on screen. A card with one image has none.
_Avoid_: Slideshow, rotation, auto-play, fade loop

### Client Marquee

**Client**:
An entry in the Client section: a brand the agency has worked with, with a Logo of its own and no page.
_Avoid_: Brand, customer, partner, account

**Client Marquee**:
A Block of an Eyebrow and a centred heading over two Logo Rows, one per half of the Clients the editor picked, that Crawl in opposite directions, with a button and an Avatar Group beneath.
_Avoid_: Logo carousel, logo grid, client logos, brand ticker

**Logo Row**:
One of the two full-width rows of Logo Cells in a Client Marquee, offset from the other by half a cell.
_Avoid_: Track, strip, band, ticker, lane

**Logo Cell**:
One bordered square in a Logo Row holding a Client's Logo, which fills black with the Logo in fluro while the pointer is over it. Not a link.
_Avoid_: Tile, card, slot, item, logo box

**Crawl**:
The continuous sideways motion of a row that never stops: a Logo Row, leftwards in the first row and rightwards in the second and pausing while the pointer is over it, or a Work Marquee, leftwards and never pausing. Under reduced motion the row sits still.
_Avoid_: Marquee, scroll, ticker, autoplay, loop

### Video Content

**Video Content**:
A Block of a Poster beside an Eyebrow with a Rule, a heading with the Highlight, two Text Columns and a Button Group, set in a black panel inside the site margins with the Squiggle at its bottom right. Clicking the Poster opens the Video Modal.
_Avoid_: Video block, video and text, media text, feature video

**Poster**:
The still image that stands in for a video before it plays, with the Play Button over it. Set by editors on the Video field.
_Avoid_: Thumbnail, cover, placeholder, video image

**Play Button**:
The lilac circle with a play glyph centred on a Poster.
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
An entry in the Testimonial section: one client's quote, with the person's name, job role and avatar and their company's Logo. It has no page.
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
The button beneath the Questions that loads every remaining Question in one click, shown only while some are not yet on the page.
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
A Linked Card for a Blog: its Thumbnail across the top over its date and read time, its title, its Description and a "Continue Reading" pill. One leads a Blog Set, and it is the only card below the desktop breakpoint.
_Avoid_: Featured card, big card, hero card, exterior

**Zoom**:
The hover behaviour of a Blog Card and a Blog Large Card on fine-pointer devices: the Thumbnail grows a little inside its rounded frame while the pill lights up. Nothing moves under reduced motion.
_Avoid_: Scale, hover effect, image hover, ken burns

### Seeding

**Seed**:
A description of Blocks and their content to add to one entry on the development site, so a Block can be reviewed with real content. Rerunning a Seed adds nothing twice.
_Avoid_: Fixture, dummy content, sample data, import
