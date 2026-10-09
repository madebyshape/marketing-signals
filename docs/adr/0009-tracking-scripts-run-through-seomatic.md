---
status: accepted
---

# Tracking scripts run through SEOmatic, except on the client's .html landing pages

The client's sitewide tracking set (Google Tag Manager, the Google tag with Google Ads, the Meta Pixel, the Reddit Pixel and Tawk.to) is rendered by SEOmatic on every page. GTM, the Google tag and the Meta Pixel are SEOmatic's own Tracking Scripts, switched on by a content migration because SEOmatic keeps them in the database. Reddit and Tawk.to have no SEOmatic slot, so `_components/trackingScripts` registers them with `seomatic.script.create`, along with the page-specific scripts keyed by URI (the OpenAI Ads pixel on `/thank-you-2`, the Meta Lead event on `/thank-you-3`, `/thank-you-agentic` and `/thank-you-ai`). GA4 fires inside the GTM container and gets no tag of its own.

The two standalone pages, `agentic-commerce-landing.html` and `ai-visibility-playbook-landing.html`, are left exactly as the client supplied them. They are output byte for byte, so SEOmatic cannot inject into them, and they carry only their own Meta Pixel and Lead event. That may be intentional on the client's part, so they are not brought into line. `llm-fashion-retailers-study` is a Twig template, so its hand-placed Google tag and Tawk.to were removed and it takes the sitewide set like any other page.

## Consequences

- Scripts only render when SEOmatic's environment is `live`; local and staging output none. To check them locally, set `environment` to `live` in `config/seomatic.php` temporarily.
- Changing a tracking ID means a new migration (or SEOmatic → Tracking Scripts on each environment) for GTM, the Google tag and the Meta Pixel, and an edit under `templates/_tracking/` for the rest.
- The `.html` landing pages have no GTM, Google tag, Reddit or Tawk.to. Confirm with the client before adding any.
