---
status: accepted
---

# Schema is built in Twig on SEOmatic's graph, with absolute ids

SEOmatic can hold structured data in two places: its control panel, saved in the database per environment, or Twig, through `seomatic.jsonLd`. The decision is to split them. The Organization's facts (name, address, logo, contact) live in SEOmatic's Site Settings → Identity, because they are company data the client owns and may edit. Every per-page type (BlogPosting, ProfilePage, Service, FAQPage, CollectionPage, CreativeWork, Article, JobPosting) is built in Twig from entry fields, so it is versioned, reviewed and identical on every environment. The layout also rewrites SEOmatic's ids: its `#identity` and `#creator` are relative IRIs, which JSON-LD resolves against each page's own URL, so `/insights/a#identity` and `/service/b#identity` read as two different organisations. Ids are made absolute (`{siteUrl}#organization`, `{siteUrl}#website`, `{teamMember.url}#person`), and the empty `#creator` is removed with its references repointed to the Organization.

## Considered options

- **Everything in SEOmatic's control panel** (Content SEO schema type per section): no Twig. But it is database-only, so every environment is configured by hand, and it cannot express relations such as an Author's Person or a Case Study's client.
- **Everything in Twig**, the Organization included: fully in git. But the client then needs a developer to change their own address or logo.

## Consequences

- SEOmatic's Content SEO schema-type settings are overridden by the templates; changing them in the control panel has no effect on the page types above.
- Identity must be filled in on each environment (local, staging, production); until it is, its empty properties are simply left out.
- Anything that references the Organization uses `{siteUrl}#organization`, never SEOmatic's `#identity`.
