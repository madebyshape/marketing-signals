---
status: accepted
---

# Fixed header; heroes pad for its height

The header is `position: fixed`, not `sticky`, even though both designed Header Colours are solid backgrounds that would work in flow. Fixed was chosen so a future transparent-over-hero Header Colour (the keystone-tutors pattern, and where the design is heading) is a colour change rather than a layout change. The cost is that the header takes no space in the document: every hero is responsible for padding its top by the header height, and the header height lives in one shared place (the `vars.class` map in the global layout) that both the header and the heroes read.

## Considered options

- **Sticky**: no padding rule needed, but a transparent variant would later force a switch to fixed and a retrofit of every hero.
- **Fixed with a layout-level spacer**: keeps heroes ignorant of the header, but makes a transparent variant impossible without removing the spacer per page.

## Consequences

- A hero that forgets the top padding renders under the header. Reviewers should check new heroes against this.
- Header height is a design token, not a private detail of the header component. Changing it means changing the map, not the component.
