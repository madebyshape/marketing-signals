# Global Header

Spec for the site-wide Header: logo, Main Menu, Header Button, two Header Colours, scroll-aware hide/show, and the Mobile Menu.

Design: Figma "Nav / V1 / Creme 100" (node `9716-8236`) and "Nav / V1 / Dark" (node `9716-8027`) in the Marketing Signals file. Reference implementation: the keystone-tutors header (madebyshape/keystone-tutors).

Related: ADR-0001 (fixed header; heroes pad for its height). Vocabulary: `CONTEXT.md`.

## Problem Statement

Every page of the site renders an empty header. Visitors have no way to reach the main sections, no persistent route back to the home page, and no always-available call to action. Editors have already been given the fields (Main Menu and Header Button on the Site entry) but nothing reads them.

## Solution

A Header on every page, matching the two Figma variants pixel for pixel on desktop. It shows the logo linking home, the editor-ordered Main Menu, and the Header Button. It has two Header Colours, Creme 100 and Black, resolved per page by the layout. It stays out of the way while reading: it hides as the visitor scrolls down, reappears the moment they scroll up, and is always present at the top of the page. Below the desktop breakpoint the links and button move into a full-screen Mobile Menu opened by a Burger.

## User Stories

1. As a visitor, I want the Header on every page, so that I can navigate from anywhere on the site.
2. As a visitor, I want the logo to take me to the home page, so that I always have a way back.
3. As a visitor, I want to see every Menu Item the editors have added, in their order, so that the navigation matches what the site owner intended.
4. As a visitor, I want the Header Button visible on desktop, so that the main call to action is one click away.
5. As a visitor, I want the Header to slide away when I scroll down, so that it doesn't cover the content I'm reading.
6. As a visitor, I want the Header to come back as soon as I scroll up, so that I don't have to scroll to the top to navigate.
7. As a visitor, I want the Header always shown when I'm at the top of the page, so that the page never opens with a missing navigation.
8. As a visitor on a phone, I want the same hide-on-scroll-down and show-on-scroll-up behaviour, so that the small screen isn't wasted on a bar I'm not using.
9. As a visitor on a phone or tablet, I want a Burger that opens a Mobile Menu, so that I can reach every Menu Item and the Header Button.
10. As a visitor with the Mobile Menu open, I want the page behind it not to scroll, so that I don't lose my place.
11. As a visitor with the Mobile Menu open, I want the Header to stay visible with the Burger showing a close state, so that I can always close the menu.
12. As a visitor with the Mobile Menu open, I want Escape to close it, so that I can dismiss it from the keyboard.
13. As a visitor who rotates or resizes past the desktop breakpoint, I want the Mobile Menu to close itself, so that it can't be left open over a desktop layout.
14. As a visitor on a short phone screen, I want a Mobile Menu with many items to scroll, so that no Menu Item is unreachable.
15. As a visitor, I want a hover treatment on Menu Items, so that I get feedback that they are links.
16. As a visitor, I want the Menu Item for the page I'm on to be marked as current, so that I know where I am.
17. As a visitor on a dark page, I want the Header in its Black colour, so that it belongs to the page rather than sitting on it as a light strip.
18. As a visitor on a light page, I want the Header in its Creme 100 colour, so that it matches the page.
19. As a visitor who prefers reduced motion, I want the Header to appear and disappear without animation, so that the site respects my setting.
20. As a keyboard user, I want the Header to be a landmark with a labelled navigation and an accessibly named logo link, so that assistive tech can jump to it and describe it.
21. As a keyboard user, I want the Burger to be a real button with an expanded state, so that I know whether the Mobile Menu is open.
22. As an editor, I want to change the Main Menu and Header Button on the Site entry and see the Header update on every page, so that I never touch a template.
23. As an editor, I want a Header Button that opens in a new tab when I set the link that way, so that external links behave as I configured them.
24. As a developer, I want the Header Colour decided in one place in the layout, so that wiring it to hero or entry-type rules later is a small change.
25. As a developer, I want the header height available as a shared token, so that heroes can pad for it without copying a number.
26. As a developer, I want the new white button colour on the styleguide, so that it can be reviewed against the other colours on both panels.

## Implementation Decisions

**Component shape.** The header lives in the existing global header component, which is currently empty. It follows the component conventions: a `component` variable, default params, the exact merge line, an options map keyed by Header Colour, class arrays, output, then an Alpine data registration named after the file.

**Params.** The component takes `colour` with the values `creme-100` (default) and `black`, plus the standard `class` passthrough. Colour names follow the button component's token-named pattern and Figma's own variant names.

**Where the colour is resolved.** The global layout owns the decision and passes `colour` to the include. For this piece of work it is a single set variable defaulting to `creme-100`. Nothing reads the hero or entry type yet; the keystone-tutors pattern (hero type and background, entry type) is the intended future source and slots into the same variable. No new CMS field.

**Options per colour.** Creme 100: background creme-100, logo and links black, Header Button colour `white`. Black: background black, logo and links white, Header Button colour `creme-100`. The Mobile Menu takes the same background as the Header for its colour. The Burger bars take the link colour.

**Positioning.** Fixed to the top, full width, above page content. See ADR-0001 for why fixed rather than sticky, and the consequence that heroes pad for the header height.

**Header height token.** The height is added to the `vars.class` map in the global layout as a `header` entry with ready-made utility strings: height for the bar itself and top padding for heroes. Values are 80px below the desktop breakpoint and 123px from it, taken from Figma. The header component and future heroes both read this map. Nothing else hardcodes the height.

**Layout and spacing (desktop, from the Figma nodes).** Side padding equals the site margin (40px). Logo 213 by 23 on the left. Menu Items centred as a group with 40px gaps, 14px regular text with the project's tight tracking and 1.33 leading. Header Button on the right using the existing button component with the circle icon style, arrow-up-right icon, base size. Everything vertically centred within the bar height.

**Desktop breakpoint.** `xl` (1280px). At and above it the Menu Items and Header Button render inline and the Burger is hidden. Below it the bar shows only the logo (narrower, about 160px) and the Burger; the Menu Items and Header Button move into the Mobile Menu.

**Logo.** Committed as a Twig SVG partial with a `class` param, filled with currentColor so the colour option sets it. It is the Figma "Logo / Full" asset, identical paths in both colours. Wrapped in a link to the site root with an aria-label of the site name.

**Menu Items.** Each renders as a plain anchor from its Links To field (value and label, with target and rel when the field sets a new-tab target). Every link carries the `link` class from the project's link stylesheet for the sweep-in underline on hover. A link gains `link--active` and `aria-current="page"` when the linked element is the current entry. No other matching (no section or URL prefix matching).

**Header Button.** Rendered through the existing button component from the Site entry's Header Button field. A new `white` colour is added to the button component: white background, transparent border, black text, white focus ring, hover to creme-200 (mirroring the creme-100 colour's hover), secondary circle with black icon. The styleguide button section gains `white` in its colour list.

**Scroll behaviour.** Alpine state tracks the last scroll position, direction, and whether the page is past a 100px threshold. Rules: scrolling down past the threshold hides the header by translating it fully upward; scrolling up shows it; within the threshold it is always shown. The transition is a transform over 500ms, gated by `motion-safe:`. The listener is the window scroll event, which Lenis leaves intact because it uses native scrolling. The same rules apply at every width.

**Mobile Menu.** A fixed full-screen panel beneath the Header (header above, panel below it in stacking order, both above page content), background matching the Header Colour, fading in and out. It lists the Menu Items stacked at a larger size with dividers, then the Header Button. It carries the `js-modal` class so Lenis lets it scroll natively when its content overflows. While open: the document element's overflow is hidden, the header is forced visible regardless of scroll direction, Escape closes it, and crossing the desktop breakpoint closes it. Opening and closing is the only state the Burger toggles; the Burger is a button with `aria-expanded` and animates its two bars into a cross.

**Alpine.** One `x-data` on the header wrapper holding scroll state and the mobile menu flag, registered via `Alpine.data` in the template's `{% js %}` block, with setup in `init()`. Elements are reached with `x-ref`. No `{% css %}` blocks; all styling is Tailwind utilities plus the existing link stylesheet.

**Docs.** `CONTEXT.md` gains the header vocabulary and ADR-0001 records the fixed-header decision. Both are written as part of this work, ahead of the implementation.

## Testing Decisions

There is no test suite in this repo. Evidence replaces tests: screenshots and recorded behaviour from the running DDEV site at `https://marketing-signals.ddev.site:8443/`, taken with agent-browser.

**Seams.** The single seam is the rendered home page, which goes through the global layout and therefore the header include. The styleguide page is a secondary seam for the new button colour only.

**What good evidence looks like.** It shows behaviour a visitor would see, not internal state: the header visible or hidden, the menu open or closed, the colours matching Figma. It is captured at fixed widths so it is comparable run to run.

**Evidence plan.**

1. Home page at 1600 wide, Creme 100: screenshot at the top of the page compared against the Figma light node for logo size and position, link spacing and size, button style, bar height.
2. Home page at 1600 wide, Black: the same comparison against the dark node, achieved by temporarily setting the layout's colour variable.
3. Scroll behaviour at 1600 wide: with temporary tall content on the page, scroll to 600px and screenshot (header hidden), scroll up 100px and screenshot (header shown), scroll back to 0 and screenshot (header shown).
4. Same three scroll screenshots at 390 wide.
5. Mobile Menu at 390 wide: screenshot closed (logo and Burger only), open (panel with Menu Items and Header Button, Burger in cross state), and after Escape (closed). Confirm the page behind does not scroll while open.
6. Resize from 390 to 1600 with the Mobile Menu open: it closes and the desktop row renders.
7. Current-page marking: open a page that a Menu Item links to and confirm that item shows `link--active`.
8. Styleguide page: the `white` button colour appears on both panels alongside the existing colours.
9. Reduced motion: with the emulated preference on, the header appears and disappears without a transition.

Temporary tall content and the temporary colour switch are removed before the work is considered done. Widths: 390 for mobile, 1600 for desktop (the Figma frame width).

## Out of Scope

- Dropdowns, mega menus or any child links under a Menu Item. The "Services +" glyph in Figma is not built.
- Any CMS field for Header Colour, and any hero- or entry-type-driven colour rules. The layout variable is the hook for that later work.
- A transparent Header Colour over hero imagery.
- Section-aware or URL-based current-page matching.
- Hero padding for the header height. Heroes adopt the token when they are built; this work only provides it.
- A dedicated mobile design. The Mobile Menu follows the keystone-tutors pattern until one exists.
- Footer, footer CTA and the rest of the Site entry.
- Header shrink, shadow or background change on scroll.

## Further Notes

- The Figma file is view-only for the integration; only the two shared nodes were readable. If a mobile node or hover states exist elsewhere, share the node URLs and the Mobile Menu and link states can be aligned to them.
- The existing page template renders the hero inside the blocks loop, so a page with no blocks renders nothing. The home page currently has no rendered content, which is why testing needs temporary tall content.
- The `link.css` stylesheet is present but uncommitted alongside the index.css import; it should land with this work.
