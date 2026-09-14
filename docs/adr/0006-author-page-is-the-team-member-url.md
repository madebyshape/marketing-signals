---
status: accepted
---

# The Author Page is the Team Member's own URL

ADR-0005 made a Blog's Author a Team Member and left giving the Author a page to the page that needed one. The decision is that the Team section itself gets URLs, `authors/{slug}`, rendered by the Team entry type's template, rather than a custom route that looks a Team Member up by slug. Every Team Member then has an Author Page, whether or not they have written anything; one with no Blogs shows the header over "No articles found" rather than a 404, because filling it is an editor's job, not the site's.

## Considered options

- **A custom route** (`authors/<slug>` to a template that queries the Team section): keeps Team Members URL-less, so only people with Blogs could be given a page. But it has no `entry.url`, no live preview, and SEOmatic would not see the page as an entry.

## Consequences

- All Team Members are public pages at `/authors/{slug}` and enter the sitemap with the section, including those with no Blogs yet.
- A Team Member's slug is now part of a public URL, so renaming one changes nothing unless the slug is changed too, and changing the slug breaks inbound links.
- `author.url` is available wherever an Author is shown; linking the Blog Hero's Avatar Group to it is later work.
