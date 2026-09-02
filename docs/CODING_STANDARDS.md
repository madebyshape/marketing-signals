# Coding Standards

Standards for Craft CMS front-ends in this repo: Twig templates, Tailwind, and Alpine.js. Written to be reviewable — each rule is named so a finding can cite it.

Every rule is tagged:

- **[hard]** — a breach is a violation. Cite the rule.
- **[judgement]** — a heuristic. Flag as a possible issue, never a hard violation.

No formatter or linter currently runs in this repo, so style rules below are live. When tooling arrives, delete whatever it enforces.

---

## Naming

**No type suffixes** [hard]
Files and handles are named for what they are, without their kind appended. `team.twig`, not `teamBlock.twig`; `lightbox`, not `lightboxTemplate`. The directory already says what kind of thing it is.

**Generic over content-specific** [judgement]
Blocks and components are named for their shape, not the content that first filled them, so they survive reuse. `logo.twig`, not `gnLogo.twig`; a text-and-image section, not `charities.twig`.

**Descriptive utility classes** [hard]
Custom utility classes name the property and the variant so the family reads as a set: `.clip-path-none`, `.clip-path-corners` — a bare `.clip` says nothing once a second variant exists.

---

## Twig style

**Spaced interpolation** [hard]
`{{ block.statisticText }}`, with a space inside each brace pair — never `{{block.statisticText}}`.

**Shorthand conditionals for simple values** [hard]
A conditional that picks between two values — most commonly classes — uses the ternary form:

```twig
{{ item.padding ? 'px-5 py-10' : 'p-0' }}
```

not a full `{% if %}…{% else %}…{% endif %}` block. Multi-statement logic still earns the block form.

**Required attributes first** [hard]
An element's defining attributes come before styling and behaviour attributes: `<a href="#" class="…">`, not `<a class="…" href="#">`. Same for `src` on media, `type` on inputs.

**No inline styles** [hard]
Templates carry no `style="…"` attributes. Styling lives in classes; truly dynamic values (a CMS-driven colour, a computed offset) go through a CSS custom property set on the element, styled from CSS.

**Dead code is deleted** [hard]
Replaced code is removed, not commented out. Git holds the history.

**Craft field access patterns** [hard]
Dropdown and radio fields read `.value`; multi-entry relation/matrix fields loop `.all()`; a single related entry reads `.one()`.

**Loop helpers over arithmetic** [hard]
Alternating and variant styling inside `{% for %}` uses `loop.index`, `loop.first`, `loop.last`, and `cycle(…)` — never modulo maths on an index.

---

## Class attributes

**Pipe-grouped classes** [hard]
Class attributes follow a fixed group order, one `|` between groups, `||` before JS hook classes:

1. Custom (non-Tailwind) classes
2. Base / mobile Tailwind
3. Pseudo classes (`hover:`, `focus:`, …)
4. Responsive (`md:`, `lg:`, …)
5. `||` then JS hooks (`js-…`) — only when the element needs one

```twig
class="grid | text-red-500 | hover:text-red-300 focus:text-red-300 | lg:text-blue-500 || js-grid"
```

Groups the element doesn't use are simply absent — no empty pipes.

**Tokens from `vars.class`** [hard, where the map exists]
Where the project defines the global `vars.class` map, spacing and typography values it covers come from it, not hardcoded utilities:

```twig
<div class="grid | {{ vars.class.gap.y.lg }}">
```

If the project has no `vars.class` map, this rule is inert.

**`@apply` for custom CSS** [judgement]
When a custom class needs writing, compose it from Tailwind via `@apply` rather than vanilla declarations, where the utilities exist to express it.

---

## Components (`templates/_components/`)

**`component` variable first** [hard]
The first line of every component sets its own name, matching the filename, and every self-reference uses it:

```twig
{% set component = 'mapMapbox' %}
```

**Fixed section order** [hard]
After the `component` line, a component's commented sections run in this order, each present unless genuinely unused:

```twig
{# Default Params #}
{# Merge Params #}
{# Options #}
{# Classes #}
{# Output #}
```

(No `{# Options #}` when there are no variants; no JS tail on static components.)

**Complete `defaultParams`** [hard]
`defaultParams` declares every param the component supports. Params the caller must supply default to `null`. A `class: null` passthrough is always present so callers can extend the wrapper.

**The exact merge line** [hard]

```twig
{% set params = params is defined ? defaultParams|merge(params) : defaultParams %}
```

**Variants via options maps** [hard]
Anything that differs per variant lives in the `{# Options #}` map and is looked up — `options.style[params.style]` — never expressed as `if`/`else` chains in the output markup.

**Classes built as arrays** [hard]
The `{# Classes #}` map holds one array per styled element, combining base classes, option lookups, and (for the wrapper) `params.class`, output with:

```twig
class="{{ classes.wrapper|join(' ')|trim }}"
```

**Single multi-line `params` map** [hard]
Components take one `params` map, formatted with `params: {` on its own indented line, one param per line, closing braces on their own lines:

```twig
{% include '_components/headingGroup' with {
    params: {
        eyebrow: entry.eyebrow,
        heading: entry.heading,
    }
} %}
```

Not the compact `with { params: { …` single-line opener. Applies equally to `{% embed %}` tags.

**`include` for leaves, `embed` for layouts** [hard]
`{% include %}` for components that just render (headingGroup, richText, picture, buttonGroup); `{% embed %}` for components exposing a block the caller fills (`_components/section` → `sectionContent`).

**Components stay generic** [judgement]
A component does one presentational job and takes everything else as params. A video component that bakes in an overlaid heading and text can't be reused where those already exist — the overlay belongs to the block composing it, not the component.

**Structured data serialised into Alpine** [hard]
Arrays/objects passed from Twig into an Alpine method go through `json_encode`:

```twig
'{{ params.markers|json_encode|raw|replace('"', '\\"') }}'
```

and `JSON.parse(…)` on the JS side — never string-built JS literals.

---

## Entry blocks (`templates/_blocks/entry/`)

**Wrapped in `_components/section`** [hard]
Every entry block embeds `_components/section` and renders inside its `sectionContent` block:

```twig
{% embed '_components/section' with {
    params: {
        paddingY: entry.padding.value,
    }
} %}
    {% block sectionContent %}
        …
    {% endblock %}
{% endembed %}
```

**`paddingY` from the entry** [hard]
`paddingY: entry.padding.value` is the standard line, so editors control vertical padding. Hardcoding (e.g. `paddingY: 'none'`) is reserved for blocks with a structural reason, such as full-bleed sections.

**`paddingX: 'none'` when self-managed** [hard]
A block that manages its own horizontal padding or margins passes `paddingX: 'none'` rather than fighting the section's site margin.

**Composed from components** [hard]
Headings, rich text, buttons, and images inside `sectionContent` go through the existing `_components/*` includes (`headingGroup` / `sectionHeader`, `richText`, `buttonGroup`, `picture`) — never hand-rolled markup where a component exists.

**All images via `picture`** [hard]
Every image renders through `_components/picture` with a `transform` param — never a bare `<img>`.

**Common transform ratios** [judgement]
Transforms use common ratios — `16x9`, `4x3`, `1x1`, etc. — matching whichever is closest to the design, not bespoke pixel-derived ratios like 552×304.

**Global blocks keep local params** [hard, where the field exists]
A block with a `useGlobalBlock` field resolves its content from the global singleton but keeps page-instance params from the local entry:

```twig
{% set defaultEntry = entry %}
{% if entry.useGlobalBlock %}
    {% set entry = globalBlocks.<handle>.one() %}
{% endif %}
```

with `paddingY: defaultEntry.padding.value` in the section embed. Blocks without the field don't carry this scaffolding.

---

## Alpine.js & GSAP

**JS only when behaviour demands it** [judgement]
`x-data` and `{% js %}` appear only on blocks that need client-side behaviour (scroll animation, carousels, cursors). Static blocks are JS-free.

**Inline for simple, `Alpine.data()` for complex** [hard]
A single toggle or state change is inline in the markup — `x-on:click="open = !open"` — with no `{% js %}` block. Multiple functions, GSAP timelines, or third-party libraries register via `Alpine.data()` inside `{% js %}…{% endjs %}` at the bottom of the template, after the markup.

**Component name = filename** [hard]
The `Alpine.data()` name is the template's filename: `imageCarousel.twig` → `Alpine.data('imageCarousel', …)`. Components use their `component` variable; entry blocks derive it with `{% set component = entry.type.handle %}`, since a block's filename matches its entry type handle.

**`$refs`, not querySelector** [hard]
DOM nodes are reached via `x-ref="name"` + `this.$refs.name`. `document.querySelector` with manufactured per-instance classes is never needed — `$refs` scopes to the nearest `x-data` automatically, even with multiple instances on a page.

**`init()` method for ref-dependent setup** [hard]
Setup logic that touches `$refs` lives in the `init()` method inside `Alpine.data()`, which Alpine calls after the full subtree is walked — not in an `x-init` attribute, which fires before descendant `x-ref` bindings exist. (`x-init="render(…)"` remains the correct pattern for passing Twig-interpolated arguments into a method.)

**External libraries via asset tags** [hard]
Third-party JS/CSS loads through `{% js 'https://…' %}` and `{% css 'https://…' %}` after the output, before the inline `{% js %}` block — not `<script>`/`<link>` tags in the markup.

**Secrets from the environment** [hard]
API keys and tokens come through `{{ getenv('VAR_NAME') }}` — never hardcoded in a template, and never committed anywhere in the repo.

---

## CMS fields

**Label/handle consistency** [hard]
A field's label and handle correspond: label `Text` → handle `text`; label `Story - Text` → handle `storyText`. Never a compound label over a bare handle.

**Generic field names** [judgement]
Fields are named for what they hold, not where they're first used: `Description`, not `Portfolio - Excerpt`. Context-specific wording belongs in the label override where the field is attached.

**Dropdown labels match values** [hard]
Dropdown options pair human labels with matching machine values — `Small = small`, `Medium = medium`. Values are never CSS classes; the value keys into an options map in the template:

```twig
{% set options = {
    size: {
        small: 'text-2xl | md:text-3xl',
        large: 'text-2xl | md:text-3xl | lg:text-5xl',
    }
} %}
```
