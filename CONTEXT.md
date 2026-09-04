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

### Seeding

**Seed**:
A description of Blocks and their content to add to one entry on the development site, so a Block can be reviewed with real content. Rerunning a Seed adds nothing twice.
_Avoid_: Fixture, dummy content, sample data, import
