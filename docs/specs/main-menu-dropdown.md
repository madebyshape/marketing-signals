# Main Menu Dropdown

Spec for Dropdown Links under a Menu Item: on desktop a "+" beside the Menu Item's label and a Dropdown under the Header listing the Dropdown Links beside the Dropdown Image; in the Mobile Menu a chevron button that reveals the Dropdown Links beneath the Menu Item, without images.

Design: there is no Figma node. The layout follows the Rise at Seven header (madebyshape/rise-at-seven, the global header, megaMenu and mobileMenu components; live at riseatseven.com, hover "About +"), rebuilt with Marketing Signals tokens, type and link styles. The "Services +" glyph in the Header nodes of the Global Header spec (`9716-8236`, `9716-8027`) is the only drawn trace of it.

Branch: feature/main-menu-dropdown

Related: the Global Header spec, which owns the Header, the Main Menu, the Mobile Menu, the scroll behaviour and current-page marking, and whose Out of Scope excluded this work until now. ADR-0001 applies: the Header is fixed, so the Dropdown is positioned against it. ADR-0002 applies: evidence content arrives by Seed. ADR-0004 applies: the Header Colour is resolved per page, and the Dropdown does not follow it. No new ADR: nothing here is hard to reverse. Vocabulary: `CONTEXT.md`, which widened **Menu Item** and gained **Dropdown**, **Dropdown Link** and **Dropdown Image** during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Main Menu is a flat row. Services has six pages of its own, and a visitor can only reach them by opening the Services page and hunting for the right one. Editors have already been given the fields: a Main Menu entry can now be a Menu Dropdown Item with Dropdown Links, each a Links To and an Image, and the Services Menu Item already carries six of them. Nothing reads them, so the Header shows "Services" as a plain link and the Mobile Menu does the same.

## Solution

On desktop, a Menu Item with Dropdown Links shows a "+" beside its label. Hovering the Menu Item opens its Dropdown: a white rounded card centred on the page just below the Header, with the Dropdown Links stacked on the left at the Mobile Menu's size and a square Dropdown Image on the right. Hovering a Dropdown Link crossfades the Dropdown Image to that link's image. The page behind the Header blurs while the Dropdown is open, and the Header takes its background so the bar reads as solid. The label still goes to its own page; the "+" is a button that opens and closes the Dropdown from the keyboard or a touch screen, and turns into a × while its Dropdown is open.

The Dropdown closes when the pointer leaves the Header and the Dropdown, when another Menu Item without Dropdown Links is hovered, on Escape (focus returning to the "+"), on scroll, and when the window drops below the desktop breakpoint. Moving between two Menu Items with Dropdown Links swaps the Dropdown straight away; crossing the gap between the bar and the Dropdown does not close it.

In the Mobile Menu, a Menu Item with Dropdown Links has a round outlined chevron button at the right of its row. Tapping it reveals the Dropdown Links beneath the label, smaller, inside the row's dividers, and turns the chevron over. Opening one closes any other. The label still goes to its own page. No images appear on mobile.

When the current page is a Dropdown Link's target, both that Dropdown Link and its Menu Item are marked as current.

## User Stories

1. As a visitor on desktop, I want a "+" beside a Menu Item that has more pages beneath it, so that I know there is more to see before I click.
2. As a visitor on desktop, I want hovering that Menu Item to open its Dropdown, so that I can see its pages without leaving the one I am on.
3. As a visitor on desktop, I want the Menu Item's label still to take me to its own page, so that the overview page stays one click away.
4. As a visitor on desktop, I want every Dropdown Link the editors added, in their order, so that the navigation matches what the site owner intended.
5. As a visitor on desktop, I want an image beside the Dropdown Links, so that the Dropdown feels like a preview of where I am going.
6. As a visitor on desktop, I want the image to change to match the Dropdown Link I hover, so that each page has its own picture.
7. As a visitor on desktop, I want the first Dropdown Link's image shown before I hover any of them, so that the Dropdown never opens with an empty space.
8. As a visitor on desktop, I want the image to stay put when I hover a Dropdown Link that has no image, so that the Dropdown does not flash blank.
9. As a visitor on desktop, I want a hover underline on each Dropdown Link, as on every Menu Item, so that I know they are links.
10. As a visitor on desktop, I want the page behind the Dropdown blurred, so that the Dropdown stands out from the content.
11. As a visitor on desktop, I want the Header solid while the Dropdown is open, even at the top of the page, so that the logo and links are not lost in the blur.
12. As a visitor on desktop, I want the Dropdown centred under the menu, so that it sits in the same place whichever Menu Item opened it.
13. As a visitor on desktop, I want the "+" to turn into a × while its Dropdown is open, so that I can see which Menu Item the Dropdown belongs to.
14. As a visitor on desktop, I want moving my pointer from the Menu Item down to the Dropdown not to close it, so that I can reach the Dropdown Links.
15. As a visitor on desktop, I want moving to another Menu Item with Dropdown Links to swap the Dropdown straight away, so that browsing the menu is quick.
16. As a visitor on desktop, I want hovering a Menu Item without Dropdown Links to close the Dropdown, so that the menu never shows the wrong Dropdown.
17. As a visitor on desktop, I want the Dropdown to close when my pointer leaves the Header and the Dropdown, so that it gets out of my way.
18. As a visitor on desktop, I want hovering or clicking the blurred page to close the Dropdown, so that I can dismiss it by moving back to the content.
19. As a visitor on desktop, I want the Dropdown to close when I scroll, so that it never floats over content I am reading.
20. As a visitor on desktop, I want the Header not to slide away while the Dropdown is open, so that the Dropdown is never left without its bar.
21. As a visitor who resizes the window below the desktop breakpoint, I want an open Dropdown to close, so that it is not left over the mobile layout.
22. As a keyboard user, I want the "+" to be a button I can tab to and press, so that I can open the Dropdown without a mouse.
23. As a keyboard user, I want the "+" to announce whether its Dropdown is expanded, so that I know its state.
24. As a keyboard user, I want the Dropdown Links next in the tab order after the "+" when it is open, so that I can reach them straight away.
25. As a keyboard user, I want the Dropdown Links out of the tab order when it is closed, so that I do not tab through links I cannot see.
26. As a keyboard user, I want Escape to close the Dropdown and return focus to its "+", so that I do not lose my place.
27. As a screen reader user, I want the "+" and the chevron named for their Menu Item, so that I know which pages they reveal.
28. As a screen reader user, I want the Dropdown Image hidden from what is read, so that I only hear the links.
29. As a touch-screen visitor on a wide tablet, I want tapping the "+" to open the Dropdown, so that hover-only behaviour does not lock me out.
30. As a visitor on a phone, I want a chevron beside a Menu Item that has pages beneath it, so that I know I can open it.
31. As a visitor on a phone, I want tapping the chevron to reveal the Dropdown Links beneath the Menu Item, so that I can reach them from the Mobile Menu.
32. As a visitor on a phone, I want the Menu Item's label still to take me to its own page, so that opening the list is a separate choice.
33. As a visitor on a phone, I want opening one Menu Item to close any other, so that the Mobile Menu stays short.
34. As a visitor on a phone, I want the chevron to turn over when the list is open, so that I can see which state it is in.
35. As a visitor on a phone, I want the Dropdown Links smaller than the Menu Items and inside the row's dividers, so that they read as belonging to it.
36. As a visitor on a phone, I want no images in the Mobile Menu, so that the list stays quick to scan.
37. As a visitor on a Dropdown Link's page, I want that Dropdown Link and its Menu Item marked as current, so that I know where I am in the site.
38. As a visitor who prefers reduced motion, I want the Dropdown, the image change, the "+" and the chevron to change without animation, so that the site respects my setting.
39. As a visitor on a dark page, I want the Dropdown to look the same as on a light page, so that it is recognisable everywhere.
40. As an editor, I want to add Dropdown Links with images to a Menu Item on the Site entry and see them in the Header on every page, so that I never touch a template.
41. As an editor, I want a Menu Item whose Dropdown Links are all removed or disabled to behave like a plain Menu Item, so that an empty Dropdown never appears.
42. As an editor, I want a Dropdown Link set to open in a new tab to do so, so that external links behave as I configured them.
43. As an editor, I want plain Menu Items to render exactly as before, so that adding Dropdowns changes nothing else.
44. As a developer, I want the Dropdown in its own component sharing the Header's state, so that the Header template does not grow further.
45. As a reviewer, I want a Seed that rebuilds the Services Dropdown Links in a worktree, so that I can check the Dropdown without the control panel.

## Implementation Decisions

**Content model (already in project config).** The Main Menu Matrix field accepts two entry types: Menu Item (Links To) and Menu Dropdown Item (Links To and Dropdown Links). Dropdown Links is a Matrix of Links To & Image entries (`linksTo`, `image`). No config changes in this work. A Menu Item "has Dropdown Links" when it is a Menu Dropdown Item and its Dropdown Links query returns at least one entry; otherwise it renders exactly as a plain Menu Item: no "+", no Dropdown, no chevron.

**Desktop Menu Item with Dropdown Links.** Inside its list item, the label stays the anchor it is today (Links To value, label, target and rel, `link` class, current marking). Beside it, a real `button` holding the kit's `fa-sharp fa-regular fa-plus`, sized to the 14px menu text, with `aria-expanded` bound to whether its Dropdown is open, `aria-controls` naming its Dropdown, and an aria-label of "Show {label} links". The icon's rotation is bound on a wrapper `span`, not the `i`, because the Font Awesome kit swaps each `i` for an SVG: 45° while open (so the plus reads as a ×), `motion-safe:` transform transition. Hovering the list item (fine pointer only) opens its Dropdown; clicking the button toggles it. Hovering a list item without Dropdown Links closes any open Dropdown.

**Header Alpine state.** The existing header data gains the id of the open Dropdown (none by default) and a close timer. Rules:
- Opening a Dropdown sets the id and cancels any pending close. Opening another replaces the id at once.
- Leaving the Header bar or the Dropdown starts a close of about 150ms; entering either cancels it.
- Escape closes the open Dropdown and returns focus to its "+" button; the existing Escape handler for the Mobile Menu stays.
- Scrolling closes the Dropdown.
- The existing change listener on the `xl` media query closes the Dropdown as well as the Mobile Menu.
- While a Dropdown is open the Header is forced visible and takes its Header Colour background, exactly as it does while the Mobile Menu is open.
Logic stays in the header's existing registered Alpine data and its `init()`; no GSAP.

**Dropdown component.** A new global component, included by the header once per Menu Item with Dropdown Links, inside the header's `x-data` and without `only`, so it reads the header's state and the item. It renders:
- A fixed container, centred horizontally on the page, its top at the bottom of the Header bar using the header height token, above the overlay and beneath the bar in stacking order. Rendered at `xl` and above only.
- Closed: `opacity-0`, a small downward offset, `pointer-events-none`, `inert` and `aria-hidden`. Open: `opacity-100`, no offset, `pointer-events-auto`. The fade and lift transition sits behind `motion-safe:`. Swapping between Dropdowns has no size animation: the outgoing one fades out and the incoming one fades in.
- A top padding strip inside the container bridging the gap from the bar, so the pointer stays within the Dropdown's hover area while crossing.
- The card: `bg-white text-black rounded-3xl`, a flex row. It is white on both Header Colours.
- Left column: the Dropdown Links as a list, vertically centred, with horizontal padding equal to the Rise at Seven card (about 48px). Each is an anchor from its Links To (value, label, target and rel), `text-2xl leading-1.2 tracking-tighter` as the Mobile Menu's Menu Items, with the `link` class, plus `link--active` and `aria-current="page"` when its linked entry is the current entry. Hovering or focusing a Dropdown Link makes it the active image link.
- Right column, only when at least one Dropdown Link has an image: `w-72 p-3` holding a square `rounded-2xl overflow-hidden` frame. Every Dropdown Link's image is rendered in the frame through the picture component with the `1x1` transform, stacked absolutely; the active one is `opacity-100`, the others `opacity-0 blur-lg scale-105`, with a `motion-safe:` transition. The active image link starts as the first Dropdown Link with an image, and hovering a Dropdown Link with no image leaves it unchanged. The frame is decorative: empty alt, hidden from assistive technology.
- Its Alpine scope holds only the active image link id.

**Overlay.** One fixed full-screen element in the header wrapper beneath the Header bar and the Dropdowns, rendered at `xl` and above. While a Dropdown is open it is `backdrop-blur-lg` and `pointer-events-auto`; hovering or clicking it closes the Dropdown. Closed, it is `pointer-events-none` with no blur. The blur transition is `motion-safe:`. Page scroll is not locked.

**Current-page marking.** The Global Header's exact-match rule is extended: a Menu Item is also marked `link--active` (without `aria-current`) when any of its Dropdown Links links to the current entry. The Dropdown Link itself carries `link--active` and `aria-current="page"`, on desktop and in the Mobile Menu.

**Mobile Menu.** Each Menu Item row with Dropdown Links becomes a flex row: the label anchor as today on the left, and on the right a `button` styled as the Accordion's toggle (round, `size-6.25`, 1px border in the current colour at the Header Colour's divider strength, centred icon), holding `fa-sharp fa-regular fa-chevron-down` inside a wrapper `span` that rotates 180° while open (`motion-safe:` transition). The button has `aria-expanded`, `aria-controls` and an aria-label of "Show {label} links". Beneath the row, inside the same list item and its dividers, the Dropdown Links as a list, `x-show` with `x-collapse` (duration 300, `motion-reduce:duration-0!` as the Accordion does) and `x-cloak`, each an anchor with `text-lg` and the Mobile Menu's tracking, the `link` class and current marking, stacked with a small gap and bottom padding. The Mobile Menu's `x-data` scope gains the id of the open row (none by default); opening one row replaces it, so only one is open. Closing the Mobile Menu leaves the open row as it was. No images.

**Header template.** Keeps the Global Header spec's structure. The `menuItems` loop in the desktop row and in the Mobile Menu branch on whether the item has Dropdown Links. The Dropdown includes and the overlay sit in the header wrapper. Plain Menu Items render unchanged.

**Seed.** One Seed under `.scratch/seeds/main-menu-dropdown/`, not committed, targeting `entry: site`, `field: mainMenu`, adding a `menuDropdownItem` after `menuItem` whose `linksTo` is the `services` entry labelled "Services" and whose `dropdownLinks` are six `linksToImage` Blocks, each a `linksTo` entry link by slug with its label, and an `image` by filename: `ai-focused-search-engine-optimisation` "AI-focused Search Engine Optimisation" `ai-seo.jpeg`; `digital-pr-marketing` "Digital PR Marketing" `digital-pr.jpeg`; `pay-per-click` "Pay Per Click" `woman-smiling.jpeg`; `organic-search-seo` "Organic Search (SEO)" `woman-writing.jpeg`; `integrated-search-sem` "Integrated Search (SEM)" `woman-working.jpeg`; `saas-link-building-agency` "SaaS Link-Building Agency" `woman-brew-smiling.jpeg`. It is for worktree databases that lack the item: the main database already has it, entered in the control panel, and running the Seed there would add a second Services Menu Item. A second, throwaway Seed adds a temporary Menu Dropdown Item (for the switching, empty and no-image evidence lines) and is removed afterwards with the Seed command's replace or by hand.

**Docs.** `CONTEXT.md` was updated during the grilling session. The Global Header spec's Out of Scope line on dropdowns now points here.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots and recorded behaviour from the running DDEV site, taken with agent-browser per the evidence doc. There is no Figma node, so desktop screenshots are compared against the Rise at Seven "About +" Dropdown for layout and against the Global Header spec's nodes for the bar.

**Seams.** The one seam is the rendered Home page through the global layout and the header include, at `https://marketing-signals.ddev.site:8443/` (or the worktree's URL). The Home page's Header Colour is Black (ADR-0004); a Creme 100 page, such as a Service page reached from a Dropdown Link, is the same seam with the other Header Colour. The Seed command's output is supporting evidence. Nothing is added to the styleguide.

**What good evidence looks like.** It shows what a visitor sees and can do: the "+" and chevron where Dropdown Links exist and nowhere else, the Dropdown opening, following the pointer and closing the ways listed, the right image for the hovered link, the Mobile Menu list opening one row at a time, and keyboard use that works without a mouse. Dropdowns are fixed, so desktop captures are viewport captures.

**Evidence plan.**

Screenshots:

1. Home page at 1600, top of page, pointer away from the menu: "Services +" in the row, every other Menu Item unchanged, no Dropdown. Proves the "+" only where Dropdown Links exist.
2. Home page at 1600, hovering "Services": the white Dropdown centred below the bar, six Dropdown Links in order, the first link's image, the page behind blurred, the Header solid black, the "+" as ×. Compared against Rise at Seven's "About +". Proves the Dropdown layout.
3. Home page at 1600, hovering "Pay Per Click" in the Dropdown: its underline and its image. Proves the Dropdown Image follows the hover.
4. A Service page (Creme 100 Header) at 1600, hovering "Services": the same white Dropdown, the Header solid creme, "Services" and that Service's Dropdown Link marked current. Proves the other Header Colour and current marking.
5. Home page at 390, Mobile Menu open, Services row closed: the chevron at the right of the Services row only. Proves the mobile chevron.
6. Home page at 390, Mobile Menu open, Services row open: six Dropdown Links beneath "Services" in `text-lg`, inside its dividers, no images, chevron turned over. Proves the mobile Dropdown Links.

States checked on the site and reported:

7. 1600: moving the pointer slowly from "Services" down into the Dropdown keeps it open; leaving the Dropdown and Header closes it after a moment; hovering "Case Studies" closes it; hovering or clicking the blurred page closes it; scrolling closes it and the Header does not hide while it was open. Proves the close rules.
8. 1600, with the throwaway Seed's second Menu Dropdown Item: moving from one to the other swaps the Dropdown at once. Proves switching.
9. 1600, keyboard only: Tab to "Services", Tab to the "+", Enter opens the Dropdown with `aria-expanded="true"`, Tab reaches the first Dropdown Link; Escape closes it with focus back on the "+"; while closed the Dropdown Links are not in the tab order. Proves keyboard use.
10. 1600, the label "Services" clicked navigates to the Services page; a Dropdown Link clicked navigates to its Service. Proves the links still navigate.
11. 1600 resized to 1024 with the Dropdown open: it closes and the Burger layout renders. Proves the breakpoint close.
12. 390, opening "Services" then the throwaway second item: "Services" closes as the second opens; tapping the "Services" label navigates. Proves one row at a time.
13. The throwaway item with no Dropdown Links: a plain Menu Item on desktop and mobile. With one Dropdown Link lacking an image: hovering it leaves the previous image. With no images at all: no image column. Proves the empty and missing-image rules.
14. Reduced motion emulated: the Dropdown, image change, "+" and chevron change with no transition and the same end states. Proves reduced motion.
15. Markup: the "+" and chevron are buttons with `aria-expanded`, `aria-controls` and their aria-labels; the closed Dropdown is `inert`; the Dropdown Image has empty alt. Proves semantics.
16. The Seed run with `--dry-run`, then for real, then again, in a worktree: the Services Menu Dropdown Item with six Dropdown Links written once. Proves the seeding.

The throwaway Seed's item is removed before the work is considered done.

## Out of Scope

- Any change to the Main Menu, Menu Dropdown Item or Links To & Image config.
- Columns or headings inside a Dropdown, a button in the Dropdown, or notification badges on Menu Items (all in Rise at Seven).
- The GSAP resize between Dropdowns, and Rise at Seven's hover pill behind Menu Items or roll-up text hover.
- A Dropdown Colour that follows the Header Colour.
- Images in the Mobile Menu.
- Nesting below Dropdown Links.
- Locking page scroll while a Dropdown is open.
- A Figma design for the Dropdown or the Mobile Menu; the build follows this spec until one exists.
- Committing either Seed.

## Further Notes

- Rise at Seven measurements at 1600 from its live site: the card sits about 40px below the menu row, the link column roughly 250px wide with 48px side padding, the image about 264px square inset 12px, card radius 24px and image radius 16px.
- The main database's Services Menu Dropdown Item and its images were entered in the control panel, not by Seed; worktree databases do not have them until the Seed runs.
- The `Dropdown - Background Colour (Cream)` field added in the same config commit is a Craft Dropdown field for Hero Simple and is unrelated to this work.
- The Font Awesome kit swaps `i` elements for SVGs, so state classes go on a wrapper `span`, as the Accordion does.
