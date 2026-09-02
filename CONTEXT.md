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
