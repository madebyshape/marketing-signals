---
status: accepted
---

# Header Colour follows the Hero, including a Hero Simple's Hero Background

ADR-0004 set the Header Colour from the page's Hero Layout and turned down a setting on the Hero entry. Hero Simple now has a Hero Background an editor chooses, Creme or Black, so one Hero Layout can be light or dark. The decision is that the Header Colour follows the Hero: Hero Home, Hero Full Screen and Hero Team give Black, a Hero Simple gives Black when its Hero Background is Black, and everything else, including no Hero, gives Creme 100. The editor never sets the Header Colour directly; they choose the Hero's background and the Header follows. The rule lives in one shared place that every page type template reads, replacing the copies of the ADR-0004 map that had spread across them.

## Considered options

- **Keep ADR-0004 and leave the Header Creme 100 over a black Hero Simple**: no change, but the Header reads as a creme strip on top of a black panel, which the design never draws.
- **Update each copy of the map where it sits**: the smallest diff, but ten page type templates each carry the rule, and the next dark option means ten edits again.
- **A new Hero Layout for the black version**: keeps ADR-0004 intact, but duplicates Hero Simple's fields and template for what is only a change of colour.

## Consequences

- A Hero Layout is no longer dark or light by definition alone: the rule may read a setting on the Hero. A future Hero Layout with its own Hero Background adds its case to the same shared rule.
- ADR-0001 still holds: the Header is fixed and the Hero pads for it.
- A page template that never takes a Hero and is black by design still sets the Header Colour itself, as the Error Page and the Form Success Page do.
