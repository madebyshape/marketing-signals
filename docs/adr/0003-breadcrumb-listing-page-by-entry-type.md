---
status: accepted
---

# Breadcrumb finds a section's listing page by entry type

A Case Study lives in its own structure with a flat URL (`case-study/{slug}`), so the Case Studies page that lists it is neither its structure ancestor nor a segment of its URL. The Breadcrumb still has to show Home › Case Studies › the case study. The decision is that the Breadcrumb finds the listing Crumb by entry type: the Page whose entry type is the section's listing type (Case Study Listing for the Case Study section, and the same rule later gives Blog Listing, Service Listing and the rest). Nothing is configured per page and no field is added; a listing page is whichever page an editor has given that type.

## Considered options

- **By slug** (`case-studies` for `caseStudy`): no lookup rule to explain, but an editor renaming the slug silently breaks every Breadcrumb in the section, and the SEOmatic schema with it.
- **A field on the section's listing page or a settings entry**: explicit, but a new field and an editor step for every listing section, for a relationship the entry type already expresses.
- **Nest the URLs** (`case-studies/{slug}`): makes the listing a URL segment and lets SEOmatic's own breadcrumb walk work, but changes every case study URL and ties the section to one page's slug.

## Consequences

- Each listing section needs exactly one Page of its listing type. A second Page of the same type would be ambiguous; the Breadcrumb takes the first by structure order and this is a content rule editors are told about, not enforced by code.
- The map from section handle to listing entry type lives in one place, the breadcrumb component, and grows one line per listing section.
- SEOmatic's automatic BreadcrumbList walks URL segments and cannot find the listing page, so the Breadcrumb replaces its items with the Crumbs it derived. The visible trail and the schema come from one derivation.
