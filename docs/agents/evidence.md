# Evidence

Screenshots and recorded behaviour from the running DDEV site, captured with `agent-browser`,
stand in for tests. A spec's **Evidence Plan** says what to capture; a PR carries the
before/after pair; a review checks both against the plan and the Figma node. This file holds the
site-specific facts every plan, PR and review relies on.

## Site

- **Base URL**: `https://marketing-signals.ddev.site:8443/`
- **Styleguide**: `/styleguide` — renders the `_components/*` previews. devMode only, so it
  exists on the DDEV site and nowhere else.
- **Home page** is the seam for anything in the global layout (header, footer, fonts). The
  page template renders the hero inside the blocks loop, so a page with no blocks renders
  nothing: add temporary tall content when the behaviour needs scroll, and remove it before
  the work is done.

## Before capturing

Vite runs **inside** the container, or pages load with no Tailwind CSS:

```
ddev exec npm run dev
```

If pages still render unstyled, the leftover Tailscale share config is the usual cause: run
`make share`, or delete `.ddev/config.tailscale.yaml` and `ddev restart`. Capture only once
the page is styled — an unstyled screenshot proves nothing.

## Widths

Capture at fixed widths so runs are comparable. Set the viewport explicitly before every
capture:

```
agent-browser set viewport 390 844
agent-browser set viewport 1600 1000
```

| Name    | Width | Why                                                                   |
| ------- | ----- | --------------------------------------------------------------------- |
| mobile  | 390   | iPhone-class; below every `md:`/`lg:` rule                            |
| tablet  | 768   | The `md` breakpoint — only when the change has `md:` rules of its own |
| desktop | 1600  | The Figma frame width, and the `3xl` breakpoint                       |

Every plan captures mobile and desktop; add tablet when the diff introduces `md:` classes.
Breakpoints are the `--breakpoint-*` tokens in `src/css/index.css`.

## Screenshot conventions

- **Where**: `.scratch/evidence/<slug>/` — gitignored, one folder per spec or ticket.
- **Name**: `<what>-<width>-<state>.png`, e.g. `header-1600-scrolled-up.png`,
  `mobile-menu-390-open.png`. Width and state in the name, so a file stands on its own.
- **Viewport capture** for fixed or sticky elements, since `--full` flattens them into the
  document; **full page** for everything else.
- **One state per file.** A before/after is two files.
- **Compare against Figma** at the same width. Figma is view-only for the integration: only
  nodes Joe has shared by URL are readable, so name the node URL in the plan.

## States worth capturing

Beyond the static layout, the behaviour a visitor would notice:

- **Hover / focus** on any interactive element the diff touches.
- **Open / closed** for anything that toggles (menus, accordions, modals), plus the
  keyboard close (Escape) where the spec asks for it.
- **Scroll** at a stated offset, for anything that hides, shows, or pins on scroll.
- **Reduced motion**: emulate `prefers-reduced-motion: reduce` and confirm transitions drop
  out with the end state intact.
- **Fixed header**: check any new hero against ADR-0001 — the header is `position: fixed`
  and takes no document space, so a hero needs top padding to clear it.

## Before and after on the PR

Every PR that changes what a page renders carries a before/after pair for each Evidence Plan
line it touches, attached with `gh --attach` (GitHub CLI 2.99+).

1. **Before**: on `main` at the same commit the branch forked from, capture each planned
   state as `before-<what>-<width>-<state>.png`. Done when every planned state has a
   `before-` file — a bugfix's before is the reproduced bug.
2. **After**: on the branch, capture the same states as `after-<what>-<width>-<state>.png`,
   same widths, same offsets. Done when every `before-` file has its `after-` twin.
3. **Attach**: alt text carries width and state, so the PR reads without opening the images.

   ```
   gh pr create --attach './before-header-1600-scrolled.png#Before · 1600 · scrolled 600px' \
                --attach './after-header-1600-scrolled.png#After · 1600 · scrolled 600px'
   ```

   On an existing PR use `gh pr comment <n> --attach …`, one comment per Evidence Plan line.
   Done when every pair is on the PR and the body or comment names the plan line it proves.

## Writing an Evidence Plan

A numbered list, one capture per line, each stating **page · width · state · what it proves**:

```
3. Home page at 1600, scrolled to 600px: header hidden. Proves hide-on-scroll-down.
```

Good evidence shows behaviour a visitor would see. The plan is complete when a reviewer can
rerun every line from this file and the spec alone.

## Reviewing evidence

For the **Spec** axis of `/code-review`, treat each Evidence Plan line as a requirement: its
before/after pair is on the PR at the stated width and state, or the line is reported missing.
Temporary content, colour switches, and other test scaffolding are gone from the diff.
