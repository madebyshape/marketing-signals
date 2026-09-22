# Longform Quote

Spec for the Longform Quote: a quote an editor places inside a Longform, drawn as a Fluro panel holding the quote with the person's Avatar Group beneath it. It is the first nested entry the Longform specs deferred to "a later round" to gain a design-matched template of its own, and it renders wherever a Longform does: a Career, a Blog or a Text Page.

Design: Figma node `9716-10285` in the Marketing Signals file, a group named "Group 1091", 750 by 351 inside a 1600 frame, drawn in the Longform's middle column (x 425). No tablet or mobile node exists; the responsive rules below are decisions, not measurements.

Branch: feature/longform-quote

Related: the Career Longform spec, which built the `longform` layout component and its chunk guard; the Blog Longform spec, whose Read Time counting ignores nested entries and still does; the Featured Testimonial spec, whose figure, blockquote and caption markup this follows. ADR-0002 applies in spirit, but no Seed is needed: the NavBoost Blog already carries a Longform Quote an editor added. Vocabulary: `CONTEXT.md`, "Longform" section, which gained Longform Quote during the grilling session, and the Avatar Group definition, which was widened to allow a company on its second line.

The branch is code-reviewed against this spec before merge.

## Problem Statement

An editor writing a Blog can drop a Quote into the Longform, and the control panel lets them fill in the quote, an avatar, a name and a company. On the page nothing appears: the Longform's other nested entries (Video, Image, Image Columns, Button Group) each have a template, but the Quote has none, so the chunk guard renders it as nothing. The Google NavBoost Explained Blog already holds a quote from Harry Nisbet that no visitor can see, and the design draws it as a bright Fluro panel that breaks up a long article.

## Solution

Wherever an editor places a Longform Quote, the article shows a Fluro panel with 20px rounded corners across the full width of the Longform's column. Inside it, the quote in 23px Medium black, its first line indented, and beneath it the person's Avatar Group: a 52px round avatar beside their name in 16px Medium with their role or company beneath in 14px.

The panel sits in the Longform's normal flow, with the same gap above and below as any other nested entry. On a phone the panel's padding, the indent and the gap to the Avatar Group all tighten; the quote keeps its size.

Fields an editor leaves empty leave nothing behind: no quote means no panel at all, and no name and no avatar means no Avatar Group row.

## User Stories

1. As a visitor, I want a quote an editor placed in an article to show on the page, so that I hear from a real person in the middle of the text.
2. As a visitor, I want the quote in a bright Fluro panel, so that it stands out from the paragraphs around it and breaks up a long read.
3. As a visitor, I want the quote in larger, heavier type than the article, so that it reads as a highlighted voice and not as body text.
4. As a visitor, I want the quote's first line indented, so that the opening reads as the start of a spoken quote, as the design draws it.
5. As a visitor, I want to see who said it, with their face, name and role or company, so that I can judge how much weight to give it.
6. As a visitor, I want the panel to fill the article's column, so that it lines up with the text above and below.
7. As a visitor, I want the same spacing above and below the panel as around the article's other images and videos, so that the page rhythm stays even.
8. As a visitor, I want an italic phrase in a quote to show as the site's Primary highlight, so that emphasis looks the same as elsewhere in the article.
9. As a visitor, I want a link in a quote to look like a link in the article, so that I know I can follow it.
10. As a visitor with a phone, I want the panel's padding and indent smaller, so that the quote has room on a narrow screen.
11. As a visitor with a phone, I want the quote to stay large enough to read as a quote, so that it keeps its weight on a small screen.
12. As a visitor on a tablet or small laptop, where the article is one capped column, I want the panel to fill that column, so that it stays aligned with the text.
13. As a visitor, I want a quote with no avatar image still to show a circle with the person's initials, so that the caption keeps its shape.
14. As a visitor, I want an article containing a quote to show the same Read Time as before, so that the figure does not jump because of a pull quote.
15. As a visitor, I want the Table of Contents to list only the article's own section headings, so that nothing inside a quote appears as a section.
16. As a screen reader user, I want the quote announced as a quotation with its speaker as the caption, so that I know whose words they are.
17. As a screen reader user, I want the avatar image not read out as a separate item when the name is already given, so that I do not hear the person twice.
18. As an editor, I want to write the quote with its own quote marks, so that I control the punctuation and it is never wrapped twice.
19. As an editor, I want to split a long quote into paragraphs, with only the first indented, so that a longer quote still reads as one voice.
20. As an editor, I want to leave the quote empty and have nothing show, so that a half-filled Quote never puts an empty panel in an article.
21. As an editor, I want to leave the name and avatar empty and have just the quote show, so that an anonymous quote still looks finished.
22. As an editor, I want to add an avatar without a name, or a name without an avatar, so that I can use whatever I have.
23. As an editor, I want the second line to take a job role or a company, so that I can credit the person however suits the quote.
24. As an editor, I want a Quote placed in a Career or a Text Page to render the same way, so that I can use it in any Longform.
25. As an editor, I want the Quote I already added to the NavBoost Blog to appear without re-entering it, so that no content work is repeated.
26. As a developer, I want the caption built from the existing Avatar Group component with a new size, so that no second avatar markup exists.
27. As a developer, I want the quote rendered through the existing rich text component at an existing size, so that the quote's type is defined once.
28. As a developer, I want the Longform Quote's template to follow the shape of the other Longform nested entry templates, so that the set reads alike.
29. As a developer, I want no JavaScript for the Longform Quote, so that the article stays static.
30. As a reviewer, I want the NavBoost Blog's quote compared against the Figma node at 1600, so that I can check the panel's measurements.

## Implementation Decisions

**Fields.** No new fields. The Longform - Quote entry type (`longformQuote`) already carries, on its Content tab:

- `quote`: Rich Text - Simple.
- `avatar`: Image, the first asset used.
- `quoteName`: Text.
- `quoteCompany`: Text. Treated as free text for the Avatar Group's second line, a role or a company; the handle and label stay as they are.

The Settings tab and its Padding field were removed before this spec; saved Quotes may still hold a Padding value, and the template ignores it.

**Template.** A new Longform nested entry template for `longformQuote`, beside the Video, Image, Image Columns and Button Group ones, rendered by the chunks component's existing `entry.render()` call. No change to the `longform` layout component or the chunks component.

**Visibility.**

- **Quote empty** (no text once tags and whitespace are stripped): the template renders nothing, not even the panel.
- **No name and no avatar:** the panel holds only the quote, with no caption row and no gap beneath the quote.
- **Name, no avatar:** the Avatar Group shows the avatar component's existing initials circle on Creme 200.
- **Avatar, no name:** the Avatar Group shows the avatar alone.
- **Second line empty:** the name alone.

The caption rule matches Featured Testimonial: the caption renders when the name or the avatar is set.

**Markup.** A `figure` for the panel, a `blockquote` holding the quote's rich text, and a `figcaption` holding the Avatar Group, as in Featured Testimonial. The name is plain text, not a `cite`. No `hanging-punctuation`.

**Panel.**

- Background Fluro, 20px rounded corners, full width of its column. In the Longform that is columns 4 to 9 from `xl` and the 750px capped column below it.
- Padding from `md`: 40px left, right and bottom, 60px top.
- Padding below `md`: 30px all round.
- Gap from the quote to the caption row: 50px from `md`, 30px below.
- The Longform's own gap between chunks spaces the panel from its neighbours; the template adds no outer margin.

**Quote.**

- The rich text component at its existing `xl` size (23px, Medium, 1.33 leading, tighter tracking) and its `black` colour, so italic is the Primary highlight and links are Primary.
- The size does not change by breakpoint.
- Bold and headings inside the quote take the `xl` size's defaults with no extra styling.
- The first paragraph only is indented: 50px from `md`, 30px below.
- The template adds no quote marks; editors type them.
- The last paragraph's bottom margin must not add to the gap above the caption.

**Avatar Group size.** The user component and the avatar component each gain an `md` size, alongside `sm`, `base`, `lg` and `xl`:

- Avatar: 52px.
- Name: `text-base`, Medium.
- Second line: `text-xs`.
- Gap between avatar and text: the component's existing 12px (the node draws 10px; a shared component's gap is not changed for 2px).

The caption uses the `base` colour: black name, second line at the component's 63% black. Existing callers and sizes are untouched.

**Avatar image.** The avatar is decorative beside the name: empty alt, a 1:1 transform, as the other Avatar Group callers do.

**Read Time and Table of Contents.** Unchanged. The Read Time counts the Longform's text chunks only and ignores nested entries, so the quote's words are not counted. Headings inside a quote are not Table of Contents entries, because heading anchors are only added to the Longform's own text chunks.

**Content.** No Seed. The Google NavBoost Explained Blog already holds a Longform Quote as its fourth nested entry: the quote from the node, `person-5.jpeg` as the avatar, "Harry Nisbet" and "Head of Operations".

**Docs.** During the grilling session, `CONTEXT.md` gained Longform Quote under Longform, and the Avatar Group definition was widened to "a label, their Job Role or their company". No ADR.

## Testing Decisions

There is no test suite. Evidence replaces tests: screenshots from the running DDEV site, taken with agent-browser per the evidence doc, compared against the Figma node at the same width, plus served HTML where the behaviour is not visual.

**Seams.**

- **One seam.** The rendered NavBoost Blog page (`/insights/google-navboost-explained-how-click-behaviour-affects-rankings-and-how-to-track-user-engagement`), using the Longform Quote the editor already added.
- **Empty-field cases.** Proven by temporarily editing that Quote's fields and restoring them afterwards. Checked on the site and reported, not captured.
- **Nothing committed to the styleguide.**

**What good evidence looks like.** It shows what a visitor would see: the Fluro panel in the article column beneath the Image Columns, the quote's size and indent, the Avatar Group at 52px with name and role, the panel spaced like its neighbours, and the tighter phone layout. Before is `main` at the commit the branch forked from, where the page shows no quote.

**Evidence plan.**

1. NavBoost Blog at 1600, full page, scrolled to the Longform Quote: a 750px Fluro panel with 20px corners in columns 4 to 9, the quote in 23px Medium black with its first line indented 50px, 40px padding at the sides and bottom and 60px at the top, the 52px avatar with "Harry Nisbet" and "Head of Operations" 50px beneath the quote. Compared against `9716-10285`. Proves the desktop panel.
2. NavBoost Blog at 390, full page, scrolled to the Longform Quote: panel across the column with 30px padding, 30px indent, the quote still 23px, the Avatar Group 30px beneath. Proves the phone layout.
3. NavBoost Blog at 768, full page, scrolled to the Longform Quote: the `md` padding, indent and gap in the one capped column. Proves the `md` step.
4. Served HTML of the NavBoost Blog: a `figure` containing a `blockquote` and a `figcaption`, the avatar image with empty alt, no inline styles, no `script` added for the Quote. Proves the markup.
5. The Read Time on the Blog Hero and beside the Longform unchanged from before. Proves the quote is not counted.
6. The Quote temporarily emptied: no panel, no gap left in the Longform. Restored afterwards. Proves the empty rule.
7. The name and avatar temporarily removed: the quote alone, no space beneath it for a caption. Restored afterwards. Proves the caption rule.
8. The avatar temporarily removed with the name kept: an "HN" initials circle. Restored afterwards. Proves the initials fallback.
9. An existing Avatar Group caller, such as the Featured Testimonial or the Author Sign-off, unchanged from before. Proves the new size touches no other caller.

## Out of Scope

- Templates or design changes for the other Longform nested entries (Video, Image, Image Columns, Button Group, Form).
- Renaming the `quoteCompany` field or its label.
- Colour options for the panel, or any background other than Fluro.
- Counting the quote's words in the Read Time.
- A Seed for the Longform Quote, and a Longform Quote on the Career or a Text Page for evidence.
- Changing the user component's gap or its existing sizes.
- A dedicated mobile design. The responsive rules follow the decisions above until mobile nodes exist.
- A committed styleguide preview.

## Further Notes

- Figma trims text boxes to cap height. The quote's text box starts 70px below the panel's top but its cap top sits there, so about 60px of padding lands it on the site; the 50px from the quote's last baseline to the avatar's top becomes the gap from the quote's last line box, a few pixels differently once leading is counted.
- The node indents the first line with tab characters, about 50px at 1600, with the opening quote mark at the start of the indent.
- The node's "Author Images" frame stacks five 52px ellipses at one position; only the top one shows. The site shows the one avatar the editor chose.
- The node's styles are Fluro `#DBFE87`, Black `#0E0A10`, "xl | med" 23px Medium at 1.33 and -4% tracking, "body | med" 16px Medium and "xs" 14px Regular at -2% tracking. These are the `bg-fluro` and `text-black` tokens, the rich text component's `xl` size, and `text-base` and `text-xs`.
- The saved quote text begins with a space before its opening quote mark; HTML collapses it, so the indent is not doubled.
