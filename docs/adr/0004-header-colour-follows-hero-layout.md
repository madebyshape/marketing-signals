---
status: accepted
---

# Header Colour follows the Hero Layout

The Header has two designed appearances, Creme 100 and Black, and the glossary says the Header Colour is resolved per page, not chosen by editors. Until Hero Home nothing needed Black outside the error page. Hero Home is a black full-screen panel, so a creme Header over it is wrong. The decision is that the page template reads the page's Hero Layout and sets the Header Colour from it: Hero Home gives Black, every other Hero Layout and no Hero gives Creme 100. The map from Hero Layout to Header Colour lives in one place in the page rendering, and a future dark Hero Layout adds one line there.

## Considered options

- **A setting on the Hero entry**: explicit, but an editor step for something the design already decides, and a way to get it wrong.
- **A rule on the Home entry**: right today, wrong the day a Hero Home goes on another page or Home gets a different Hero.
- **Reading the first Block's background**: would cover every page, but a Hero always sits between the Header and the Blocks, so the Hero is what the Header touches.

## Consequences

- A Hero Layout is dark or light by definition, and the definition sits with the page template, not the Hero template.
- ADR-0001 still holds: the Header is fixed and the Hero pads for it. A Black Header over a black Hero reads as one surface, which is the design's intent.
