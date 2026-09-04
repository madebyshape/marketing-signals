# Heading Reveal

Spec for the Heading Reveal Block: an Eyebrow with a Rule over a large indented heading whose words Reveal as the visitor scrolls. It is the first caller of the eyebrow component, the first scroll-linked text on the site, and the Block that sits between the Heading Image Grid and the Statistics on the Home page.

Design: Figma node `9797-18373` in the Marketing Signals file, 1600 wide. No mobile node exists; the responsive rules below are decisions, not measurements. Reference for the Reveal: the statement section on myweblab.it, whose mechanics were read from its source and are recorded under Further Notes.

Branch: feature/heading-reveal

Related: the Content Seeding spec, which gains the `after` key this Block needs; the Heading Image Grid spec, which this Block follows on the Home page; the Statistics spec, which it precedes. ADR-0001 does not apply: the Block is in flow. ADR-0002 applies: the Home page content arrives by Seed. Vocabulary: `CONTEXT.md`, "Blocks" section, which gained Eyebrow, Rule, Heading Reveal and Reveal during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The Home page shows a heading over two photographs and then a row of numbers. The design puts a statement between them: a small label, a line under it, and four lines of very large text that introduce the agency, with the company name picked out in the brand colour and the words brightening as the visitor reads down the page. Editors have no Block for it. The eyebrow component exists but nothing calls it, it carries a dot the brand does not use, and it has neither the line nor the colours the design needs. Nothing on the site animates text on scroll.

## Solution

A Heading Reveal Block editors can add to any page. It holds an Eyebrow and a Heading, the same fields they use elsewhere. The Eyebrow renders at body size with a Rule beneath it across the full content width. The Heading renders through a new heading reveal component: up to 82px at desktop, semibold, with its first line indented by two grid columns, and the words the editor marks italic shown as the Highlight in the primary colour. When JavaScript runs, every word starts at a fifth of its opacity and brightens to full as the heading scrolls up the viewport, a few words at a time in reading order, following the scroll in both directions. Without JavaScript, or for a visitor who prefers reduced motion, the heading is simply there at full strength. The Home page gets one instance with the Figma copy, placed after the Heading Image Grid by the Seed command.

## User Stories

1. As a visitor, I want a large statement between the photographs and the numbers, so that the page tells me who the agency is before it shows me what it has done.
2. As a visitor, I want the words of the statement to brighten as I scroll down, so that my eye is led through it at reading pace.
3. As a visitor, I want a few words brightening at once rather than one at a time, so that the Reveal reads as a wave and not a typewriter.
4. As a visitor, I want the Reveal to follow my scroll in both directions, so that scrolling back up returns the words to their faint state and the effect feels attached to the page.
5. As a visitor, I want the Reveal to lag my scroll by a fraction of a second, so that it feels smooth rather than mechanical.
6. As a visitor, I want the company name shown in the brand colour before and after it brightens, so that I can see where the accent will land.
7. As a visitor, I want the first line of the heading indented, so that the statement reads as the design intends.
8. As a visitor, I want a small label with a thin line under it above the statement, so that I know what the statement is about.
9. As a visitor, I want the heading to step up in size with my screen, so that it is legible on a phone and monumental on a desktop.
10. As a visitor with a phone, I want the indent kept, so that the statement keeps its signature at every size.
11. As a visitor, I want the heading readable before any script runs, so that a slow connection never shows me a wall of faint text.
12. As a visitor who prefers reduced motion, I want the heading at full strength with no scroll-linked change, so that nothing on the page moves with my scrolling.
13. As a visitor, I want the Reveal to cost nothing noticeable in scroll performance, so that the page stays smooth on a laptop.
14. As a screen reader user, I want the heading read once as a whole sentence, so that a word-by-word split does not become a list of forty items.
15. As a screen reader user, I want the heading to be a real heading element at the level the editor chose, so that I can navigate the page by headings.
16. As an editor, I want a Heading Reveal in the Blocks menu, so that I can add it to any page.
17. As an editor, I want to write the eyebrow in the same Eyebrow field I use elsewhere, so that there is nothing new to learn.
18. As an editor, I want to write the heading in the same Heading field I use elsewhere, so that italic means Highlight here as it does everywhere.
19. As an editor, I want to choose the heading level, so that the page outline stays correct.
20. As an editor, I want field instructions that say italic makes a Highlight, so that I do not have to ask.
21. As an editor, I want the Block's fields under Section Header, so that it reads like every other Block.
22. As an editor, I want the Block's padding option, so that I can tune the spacing to its neighbours.
23. As an editor, I want to leave the eyebrow empty and still get the heading, so that a statement without a label is not broken.
24. As an editor, I want to leave the heading empty and still get the eyebrow with its Rule, so that a label can stand on its own above whatever Block follows.
25. As an editor, I want the Home page to already carry this Block with the designed content, so that I see how it is meant to look.
26. As a developer, I want the Block to reuse the existing Eyebrow, Heading and Padding fields with no renames, so that the field list stays small.
27. As a developer, I want the Reveal in a component rather than in the Block, so that an about page or a case study intro can use it.
28. As a developer, I want the component to accept the raw CKEditor value and hand it to the alternate heading, so that there is one place the wrapper-stripping lives.
29. As a developer, I want the eyebrow component to gain colours and a Rule rather than the Block hand-rolling them, so that the next Block with an eyebrow gets them for free.
30. As a developer, I want the alternate heading's size map to cover every size the theme defines, so that the map grows once rather than one step per Block.
31. As a developer, I want SplitText registered beside the other GSAP plugins, so that any template can split text without its own import.
32. As a developer, I want the Reveal expressed as one scrubbed tween rather than a per-frame loop, so that GSAP does the work and the code stays small.
33. As a developer, I want the Seed command to place a Block after a named neighbour, so that the Home page order can match Figma without anyone touching the control panel.
34. As a developer, I want the Home page content added by a Seed, so that the review environment is reproducible.

## Implementation Decisions

**Entry type.** A new Block entry type, handle `headingReveal`, name "Heading Reveal", colour blue, icon `text-size`, added to the Blocks field in the General group. A Content tab with a Section Header heading element followed by the Eyebrow field and then the Heading field; a Settings tab with the Padding field. Section Content and Section Footer are omitted because the heading is the whole Block. No new fields and no renamed fields. The Heading instance carries instructions: "Make words italic to highlight them."

**Block template.** Lives with the other Blocks under the partial templates path so the Blocks field renders it by handle. It follows the Block scaffold: block defaults, the merge line, the section embed with the Block's padding, and its content inside the section's content block. It renders the eyebrow component with the Rule on and margin below, then the heading reveal component with size and indent. No Alpine of its own; the component carries the behaviour.

**Eyebrow component.** Its base style changes rather than gaining a variant, as the statistic component's did: the dot and its left padding go, the text becomes 16px medium with the 1.33 leading, at every width. It gains a colour map of black, white, creme-100 and primary. It gains a `rule` flag, off by default, which draws a 1px line under the text across the wrapper's full width with 10px between text and line, so text, gap and line make the design's 31px row. It gains a `ruleColour` option, creme-300 by default and white for dark sections, independent of the text colour. Its margin map steps: top, bottom and top-and-bottom are 40px at mobile and 60px from `lg`, matching how section padding already scales.

**Heading reveal component.** A new component, first caller of nothing but the alternate heading. Params: `heading` (the CKEditor value), `tag`, `size`, `colour`, `indent`, `class` and `id`. It wraps the alternate heading, passing heading, tag, size and colour straight through and using the alternate heading's attributes param to place the ref on the heading element. It adds font semibold, leading 0.97 and tighter tracking. `indent` is `none` or `columns`; `columns` indents the first line by two grid columns plus two gaps, which is one sixth of the content width plus one sixth of the gap, expressed as a calc-based indent utility class so no inline style is needed. The indent is kept at every width.

**Sizes.** The Block passes a size ramp of 5xl at mobile, 7xl from `md`, 9xl from `lg` and 10xl (82px) from `2xl`. The alternate heading's size map gains 10xl through 13xl so it matches the theme.

**The Reveal.** Alpine data named for the component, registered in a js block at the bottom of the template, with the setup in the init method. Inside GSAP's match media for no reduced-motion preference: SplitText splits the heading into words only, as span elements, with its automatic aria handling so the heading keeps a label of the full sentence and the words are hidden from assistive technology. Every word is set to 20% opacity, then one tween takes them all to full opacity with ease none, a duration of four units and a stagger of one unit, so four words are mid-fade at any moment. The tween's ScrollTrigger uses the heading as the trigger, starts when its top reaches 80% of the viewport, ends when its bottom reaches 55%, and scrubs with a one-second catch-up. Words carry a will-change hint for opacity. The Highlight keeps the primary colour throughout; only opacity animates. Lines are not split, so the indent stays on the heading. The split runs once fonts are ready so the trigger measures the final layout. Under reduced motion nothing runs and the heading stays as served.

**Before JavaScript.** The heading is served at full opacity with no split; the 20% state exists only once the script has run. A script failure leaves a readable heading.

**GSAP.** SplitText is imported from the installed GSAP package, registered beside ScrollTrigger and DrawSVG in the site's script entry, and exposed on the window like them. No licence or registry change: every GSAP plugin is free.

**Empty states.** The eyebrow renders when its text has content; the heading renders when its text has content after tags are stripped; each renders without the other; the Block renders nothing at all, section included, when both are empty. An eyebrow without a heading keeps its Rule.

**Seed command.** The Seed shape gains an optional `after` key on a Block, an entry type handle. The Block is inserted after the last existing Block of that type on the entry, and the output line says so. When no Block of that type exists, the Block is appended and the output line says that instead. Dry run prints the same resolved position. The Content Seeding spec records the key.

**Home page content.** One Heading Reveal after the Heading Image Grid, padding Top and Bottom. Eyebrow "Who We Are". Heading, as a level-two heading: "Since 2011, Marketing Signals have helped brands all over the world ensure their digital marketing activity translates into measurable business growth." with "Marketing Signals" italic. Added with the Seed command from a Seed file under the scratch folder; the Seed is not committed.

**Docs.** `CONTEXT.md` gained Eyebrow, Rule, Heading Reveal and Reveal during the grilling session. The Content Seeding spec gains the `after` key. No new ADR: none of the Block's decisions is hard to reverse.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width.

**Seams.** The primary seam is the rendered Home page through the global layout, with the Block seeded after the Heading Image Grid. The Block is the heading reveal component's only caller and the eyebrow component's only caller, so both are proven through it; the styleguide gains nothing. The secondary seam is the Seed command's own output, which proves the `after` key.

**What good evidence looks like.** It shows what a visitor would see: the Eyebrow and Rule at the designed sizes, the heading at 82px with its indent and Highlight, the words faint before the Reveal, a band of words mid-fade, and every word full afterwards. Fixed widths and fixed scroll offsets, one state per file, before and after pairs on the PR. The before for this Block is the Home page on `main` at the commit the branch forked from.

**Evidence plan.**

1. Home page at 1600, scrolled so the heading's top sits at 80% of the viewport: every word at 20% opacity, Eyebrow and Rule above, compared against the Figma node for eyebrow size, Rule colour and width, heading size, indent and Highlight colour. Proves the desktop layout and the start of the Reveal.
2. Home page at 1600, scrolled so the heading is centred in the viewport: earlier words full, a band of about four words mid-fade, later words faint. Proves the mapping and the overlap.
3. Home page at 1600, scrolled so the heading's bottom is above 55% of the viewport: every word full. Proves the end of the Reveal.
4. Home page at 1600, scrolled back to the offset of line 1 after reaching line 3: every word faint again. Proves the Reveal follows the scroll both ways.
5. Home page at 390, full page: heading at 5xl with the indent kept, eyebrow at 16px, Rule full width. Proves the mobile layout.
6. Home page at 768, viewport on the Block: heading at 7xl. Proves the `md` step of the ramp.
7. Home page at 1600 with reduced motion emulated, scrolled to the offset of line 1: every word full and no word spans in the DOM. Proves the reduced-motion story.
8. Served HTML of the Home page: the heading is an `h2` with the Highlight inside it, no inline styles, and no word spans. Proves the before-JavaScript state.
9. DOM of the Home page after scripts run at 1600: the heading carries an aria label of the full sentence and each word span is hidden from assistive technology. Proves the accessibility story.
10. Home page at 1600 with the Block's section temporarily switched to a black background, eyebrow white and Rule white: the white Rule value. Removed afterwards.
11. Home page at 1600 with the eyebrow temporarily cleared: heading only, no Rule. Restored afterwards.
12. Home page at 1600 with the heading temporarily cleared: Eyebrow with Rule only. Restored afterwards.
13. Seed command output for the Home Seed, run twice: created after the Heading Image Grid on the first run, skipped on the second. Saved as text beside the screenshots. Proves the seeding and the `after` key.
14. Seed command dry run of the same Seed against an entry with no Heading Image Grid: the output says the Block would be appended. Proves the missing-neighbour rule.

## Out of Scope

- A colour shift during the Reveal, as the reference site does. Opacity alone is the decision.
- Splitting characters or lines, masks, or any movement. The Reveal is opacity only.
- A styleguide preview for the heading reveal or eyebrow components.
- Reordering or updating Blocks that already exist. The `after` key places new Blocks only.
- Keeping the eyebrow's dot as an option. The base style changes.
- Correcting the Statistics spec's "second Block" wording. It describes its own moment.
- A dedicated mobile design. The responsive rules follow the decisions above until a mobile node exists.
- Body text, buttons or any Section Content or Section Footer beneath the heading.
- Committing the Seed.

## Further Notes

- The reference site splits its paragraph into word spans, sets them to 35% opacity and a grey, and drives them from one ScrollTrigger with start at 80%, end at 55%, scrub of one second, fading each word across a window four words wide. The decisions here keep its geometry and drop the colour shift in favour of Figma's 20% opacity.
- Figma tracks the heading at minus 3.28px on 82px, which is minus 0.04em, exactly the tighter tracking token.
- Figma's eyebrow row is 31px: 21px of 16px text at 1.33 leading, 10px of gap, 1px of Rule. Figma trims text boxes to cap height, so measured gaps on the site may differ by a few pixels.
- The indent at 1600 is 257px, which is two columns of 108.33px plus two gaps of 20px. At 390 it is 62px.
- The alternate heading turns editor line breaks into `br` elements; SplitText keeps them when splitting words.
- The eyebrow component was identical to the Shape library copy and had no callers on this site, which is why its base style changes rather than gaining a variant.
- The Shape library has no reveal component; its split-text button splits characters in Twig for a hover roll, a different job.
