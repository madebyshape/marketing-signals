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
