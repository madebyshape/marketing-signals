# Schema

Spec for the site's structured data: an Organization and a WebSite on every page, and a schema.org type for every kind of page the client listed (Blog, Author Page, Team Listing, Service, FAQ, the Listing pages, Playbook, Case Study and Career), all through SEOmatic. The new site must carry at least what the live site does today (WebSite, Organization, FAQPage on the Home page, Article-like types on content, CollectionPage on listings) and go further, so the rebuild loses nothing in search.

Source: the client's "Schema Requirements: New marketingsignals.com" brief. Where this spec departs from it (the Team Listing type, the Playbook type, the Organization's `@id` form, no SearchAction) the departure was decided during the grilling session and is recorded below and in the Client notes.

Branch: feature/schema

Related: ADR-0003 applies: Listing pages and the Contact page are found by entry type, never by slug, and the Breadcrumb component already overrides SEOmatic's BreadcrumbList items, which this spec leaves alone. ADR-0005 applies: a Blog's Author is a relation to a Team Member. ADR-0006 applies: every Team Member has an Author Page at `/authors/{slug}`, which is what makes it a stable Person id. ADR-0008 was written during the grilling session: per-page schema is built in Twig on SEOmatic's graph, the Organization lives in SEOmatic Identity, and ids are absolute. Vocabulary: `CONTEXT.md`, which gained **LinkedIn** and **Client Name** during the grilling session.

The branch is code-reviewed against this spec before merge.

## Problem Statement

The client's search consultant has audited staging and found that every page on the new site describes itself the same way: a generic WebPage, an Organization with nothing in it but three social links, a second Organization with nothing in it at all, and a BreadcrumbList. A Blog is not identified as an article, its writer is not identified as a person, a Service is not a service, a job opening is not a job posting, and the Home page's FAQs, which carry FAQ markup on the live site today, carry none. Launching like this would throw away structured data the live site already has and that search engines and AI answer engines already read.

The graph is also wired wrongly. Every page says it was published by the empty Organization, and the company's own Organization uses a relative id, so each page technically describes a different company and nothing joins up across the site.

## Solution

Every page outputs one connected graph whose ids are absolute and shared across the site:

- **Organization** at `https://marketingsignals.com/#organization`: name, legal name, URL, logo, description, registered address, a sales contact point and the three social profiles. Everything else points at it as publisher, provider, employer or worksFor.
- **WebSite** at `https://marketingsignals.com/#website`, published by the Organization. No SearchAction, because the site has no search.
- **The page's own type**, chosen by what the page is:

| Page | Type |
|---|---|
| Blog (`/insights/*`) | BlogPosting, by the Author as a Person |
| Author Page (`/authors/*`) | ProfilePage about a Person |
| Team Listing page | AboutPage whose main entity is an ItemList of every Team Member's Person |
| Service (`/service/*`) | Service, provided by the Organization |
| Blog, Playbook, Case Study, Service and Career Listing pages | CollectionPage |
| FAQ Listing page | FAQPage of every FAQ it shows |
| Playbook (`/playbook/*`) | CreativeWork, by the Author as a Person |
| Case Study (`/case-study/*`) | Article about the client as an Organization |
| Career (`/career/*`) | JobPosting, remote, expiring with the Career |
| Any other page | SEOmatic's WebPage, published by the Organization |

- **FAQPage** on any page whose Blocks include an FAQ Accordion, holding every FAQ from every FAQ Accordion on the page once, alongside the page's own type. The Home page keeps its FAQ markup this way.

Each Team Member is one Person, with one id (their Author Page URL plus `#person`), defined once and referenced by every Blog and Playbook they wrote, by their Author Page and by the Team Listing page.

Editors gain two optional fields: a **LinkedIn** on a Team Member, which becomes the Person's `sameAs`, and a **Client Name** on a Case Study, which names the client the Case Study is about. The company's details are entered once in SEOmatic's Site Settings → Identity, where the client can edit them without a developer.

## User Stories

1. As the client, I want every page to identify Marketing Signals as one Organization, so that search engines build one knowledge panel for the company.
2. As the client, I want the Organization to carry our name, legal name, logo, description, address and contact details, so that search engines show accurate company information.
3. As the client, I want the Organization linked to our X, Facebook and LinkedIn profiles, so that search engines connect the site to our social presence.
4. As the client, I want to edit the company's details in the SEO settings myself, so that a change of email or logo does not need a developer.
5. As the client, I want every page to say Marketing Signals published it, so that the site is never attributed to an unnamed organisation.
6. As the client, I want a WebSite entity on every page, so that search engines know the site's name and owner.
7. As the client, I want the rebuild to keep every schema type the live site has, so that we lose no search features at launch.
8. As a search engine, I want the Organization's id to be the same absolute IRI on every page, so that I can merge every mention into one entity.
9. As a reader arriving from search, I want a Blog to show as an article with its headline, image and date, so that I can judge it before clicking.
10. As the client, I want each Blog attributed to the Team Member who wrote it as a Person, so that our writers build expertise and authority signals.
11. As the client, I want a Blog's author to link to that person's Author Page, so that search engines can find everything they wrote.
12. As the client, I want a Blog with no Author to be attributed to the company, so that no article is left without an author.
13. As the client, I want a Blog's published and modified dates in its schema, so that search engines know how fresh it is.
14. As the client, I want each Author Page marked as a profile of that person, so that search engines treat it as the canonical page about them.
15. As the client, I want a Person to carry their name, job title, photo and employer, so that their profile in search is complete.
16. As an editor, I want to add a Team Member's LinkedIn profile, so that search engines connect the writer to their professional profile.
17. As an editor, I want a Team Member without a LinkedIn to still get a valid Person, so that the field is never mandatory.
18. As a search engine, I want the same Person id on a Blog, its Author's page and the Team Listing page, so that I recognise one person rather than three.
19. As the client, I want the Team Listing page to present the team as a list of people who work for us, so that the About-type page is understood without being mistaken for one person's profile.
20. As the client, I want each Service page marked as a service we provide in the United Kingdom, so that search engines understand what we sell and where.
21. As the client, I want every page with an FAQ Accordion to carry FAQ markup, so that our answers are available to search engines and AI answer engines.
22. As the client, I want the Home page's FAQs kept in its schema, so that the live site's FAQ markup is not lost.
23. As a search engine, I want a page with two FAQ Accordions to output one FAQPage, so that the page is valid.
24. As a search engine, I want an FAQ repeated in two FAQ Accordions on one page listed once, so that the FAQPage has no duplicate questions.
25. As the client, I want FAQs with no answer left out of the markup, as they are left off the page, so that the schema matches what visitors see.
26. As the client, I want the FAQ Listing page marked up as an FAQPage of every FAQ it shows, so that the full FAQ set is structured.
27. As the client, I want the Blog, Playbook, Case Study, Service and Career Listing pages marked as collections, so that search engines understand them as indexes rather than articles.
28. As the client, I want each Playbook marked as a creative work with its name, description, image, author and publisher, so that our guides are identified as our own work.
29. As the client, I want each Case Study marked as an article about the client it was for, so that search engines connect our work to the brands we worked with.
30. As an editor, I want to type a Case Study's Client Name, so that the client is named in its schema even though the page shows only their Logo.
31. As an editor, I want a Case Study without a Client Name to fall back to its title, so that existing Case Studies are covered before I backfill them.
32. As a job seeker, I want each Career to appear as a job posting in Google for Jobs, so that I can find and apply for it from search.
33. As the client, I want each Career marked remote and open to applicants in the UK, so that it matches how we work.
34. As the client, I want a Career's employment type mapped to the values Google accepts, so that the posting is eligible.
35. As the client, I want a Career's closing date in its schema and the Career taken offline when it passes, so that Google never penalises us for an expired posting.
36. As an editor, I want a Career's closing date to be its Expiry Date, so that one setting both closes the role and tells Google.
37. As an editor, I want a Career without an Expiry Date to still output a valid posting, so that forgetting it does not break the page.
38. As a developer, I want per-page schema built in templates from entry fields, so that it is versioned, reviewed and the same on every environment.
39. As a developer, I want SEOmatic's own BreadcrumbList untouched, so that the existing Breadcrumb override keeps working.
40. As a reviewer, I want each page type's JSON-LD to pass validator.schema.org and Google's Rich Results Test, so that I can trust the markup before launch.

## Implementation Decisions

**Where things live (ADR-0008).** The Organization's facts are SEOmatic Site Settings → Identity, saved in the database and entered by hand on each environment. Everything else is Twig on SEOmatic's own JSON-LD graph via `seomatic.jsonLd`, so SEOmatic still renders one `@graph` in the head. SEOmatic's Content SEO schema-type settings per section are left at their defaults; the templates override them.

**Identity values.** Entered in SEOmatic Identity on local, staging and production. Values taken from the live site and the Contact entry:
- Entity type Organization; Entity Name "Marketing Signals"; Entity URL the site URL. Identity has no legal-name field, so `legalName` "Marketing Signals Limited" is set in the graph wiring below.
- Description "Digital Marketing Solutions for Ambitious Brands".
- Address: street "c/o Accountancy Extra, 33 Harrison Rd", locality "Halifax", postal code "HX1 2AF", country "GB". This is the registered office; the company is fully remote, so no LocalBusiness or premises.
- Entity Telephone "+44 330 043 4676"; Entity Email "hello@marketingsignals.com".
- Organization Founder "Gareth Hoyle"; Organization Founding Date 2007 ("Since 2007" on the live About page; the Limited company was incorporated later).
- Entity Brand (the logo): the inline logo SVG in Black on white, exported as a 1200 by 300 PNG so both sides clear Google's 112px minimum, uploaded to the Images volume.
- Contact Points left empty: the contactPoint is built in the graph wiring from the Contact page, and filling both would output two.
- Social profiles: the three sameAs links SEOmatic already holds, unchanged (the Social Links read them).

**Graph wiring, in the global layout.** One place that runs on every page, before SEOmatic renders:
- The identity entity's id becomes `{siteUrl}#organization`, and it gains `legalName` "Marketing Signals Limited". Every reference SEOmatic made to `#identity` (author, copyrightHolder, publisher) is repointed to it.
- The `#creator` entity is removed, and every reference to it (WebPage `creator` and `publisher`) is repointed to `{siteUrl}#organization`.
- The Organization gains `contactPoint`: ContactPoint, `contactType` "sales", email "hello@marketingsignals.com", telephone "+44 330 043 4676", `url` the Contact page's URL found by its entry type (ADR-0003). The email and telephone come from the Contact page's own Email and Phone fields, so a change there flows through; with no Contact page the contactPoint is left out.
- A WebSite entity is added: id `{siteUrl}#website`, name "Marketing Signals" (the site name), URL the site URL, description as the Organization's, publisher `{siteUrl}#organization`, `inLanguage` the site language. No `potentialAction`.
- The page's main entity gets `isPartOf` `{siteUrl}#website`.

**Person (a Team Member).** Built by one shared Twig component given a Team Member, so every page that needs a Person builds it the same way. Id `{teamMember.url}#person`. `name` the title, `jobTitle` the Job Role, `image` the Image's URL, `url` the Author Page URL, `worksFor` `{siteUrl}#organization`, `sameAs` the LinkedIn when set. Each empty value is left out. On pages that only reference a Person (Blog, Playbook, Team Listing) it is output in full once in the graph and referenced by id elsewhere.

**Author reference.** A Blog's or Playbook's Author (the Team relation the layout labels Author, at most one). With one, `author` is the Person. With none, `author` is `{siteUrl}#organization`.

**Blog → BlogPosting.** Replaces the main entity. `headline` the title; `description` the Description with tags stripped, falling back to the SEO description; `image` the Thumbnail, falling back to the Hero Image; `datePublished` the post date; `dateModified` the date updated; `author` as above; `publisher` `{siteUrl}#organization`; `mainEntityOfPage` and `url` the Blog's URL; `inLanguage` the site language.

**Author Page → ProfilePage.** Replaces the main entity: ProfilePage with `mainEntity` the Team Member's Person, `url` the Author Page URL, `dateCreated` and `dateModified` from the entry. The Author Page's existing robots rule for Team Members with no Blogs is unchanged.

**Team Listing page → AboutPage.** Replaces the main entity: AboutPage, `about` `{siteUrl}#organization`, `mainEntity` an ItemList whose ListItems are positioned in the Team section's structure order, each item a Person reference for every enabled Team Member, with the Persons output once in the graph.

**Service → Service.** Replaces the main entity: `name` and `serviceType` the title; `description` the Description with tags stripped, falling back to the SEO description; `image` the Thumbnail; `url` the Service's URL; `provider` `{siteUrl}#organization`; `areaServed` Country "GB" (United Kingdom). The Service's Categories are not mapped.

**Listing pages → CollectionPage.** The Blog, Playbook, Case Study, Service and Career Listing entry types change the main entity's type to CollectionPage, keeping SEOmatic's name, URL, description and dates. The listed items are not enumerated.

**FAQ Listing page → FAQPage.** The main entity becomes an FAQPage whose `mainEntity` is every FAQ the page shows (those in a Category, with an Answer), each a Question with `name` the FAQ's title and `acceptedAnswer` an Answer whose `text` is the Answer with tags stripped.

**FAQPage from FAQ Accordions.** For any entry with a Blocks field: every FAQ Accordion Block on it is collected, their FAQs merged, deduplicated by FAQ, ordered as they appear on the page, and those with an empty Answer skipped. When at least one remains, one FAQPage entity with id `{pageUrl}#faq` is added to the graph alongside the page's main entity, which it does not replace. Built once per page, never per Block, so two Accordions never make two FAQPages. The FAQ Listing page does not add a second one.

**Playbook → CreativeWork.** Replaces the main entity: `name` and `headline` the title; `description` the Description with tags stripped, falling back to the SEO description; `image` the Thumbnail, falling back to the Hero Image; `author` as above; `publisher` `{siteUrl}#organization`; `datePublished`, `dateModified`, `url`.

**Case Study → Article.** Replaces the main entity: `headline` the title; `description` the Description with tags stripped, falling back to the SEO description; `image` the Thumbnail, falling back to the Hero Image; `datePublished`, `dateModified`; `author` and `publisher` `{siteUrl}#organization`; `about` an Organization with `name` the Client Name, falling back to the title, and `logo` the Logo's URL when there is one.

**Career → JobPosting.** Replaces the main entity:
- `title` the title; `description` the Longform rendered as HTML (Google requires the full description and accepts HTML), falling back to the Hero Text.
- `datePosted` the post date; `validThrough` the Expiry Date, left out when there is none.
- `employmentType` from the Employment Type: fullTime → FULL_TIME, partTime → PART_TIME, contractor → CONTRACTOR, temporary → TEMPORARY, maternityCover → TEMPORARY, freelance → CONTRACTOR. An unset value is left out.
- `hiringOrganization` `{siteUrl}#organization`; `jobLocationType` "TELECOMMUTE"; `applicantLocationRequirements` Country "GB". No `jobLocation`, no `baseSalary` (Salary is free text), no `identifier`.
- Craft's own expiry takes a Career offline when its Expiry Date passes, so the posting leaves the site and the sitemap with it. No new closing-date field.

**Fields.** Added by the craft-block skill, both optional, both in the entry type's main tab:
- Team: **LinkedIn**, a Link field limited to URLs, handle `linkedin`, with instructions "Their own LinkedIn profile, used in search results."
- Case Study: **Client Name**, a plain text field, handle `clientName`, beside the Logo, with instructions "The client's name for search engines. Leave empty to use the title."
Neither is rendered on the page.

**Unchanged.** The Breadcrumb's override of SEOmatic's BreadcrumbList (ADR-0003). Pages of every other entry type (Blocks, Text, Contact, Form Success, Brand Guidelines, Home) keep SEOmatic's WebPage, now published by the Organization and part of the WebSite.

**Docs.** `CONTEXT.md` and ADR-0008 were written during the grilling session.

## Testing Decisions

There is no test suite. Evidence replaces tests, per the evidence doc. Nothing a visitor sees changes, so the evidence is the served markup, validator results and the two new fields in the control panel.

**Seam.** One seam: the JSON-LD `@graph` in each page's served HTML on the DDEV site, one representative URL per page type, extracted with curl and parsed. Each extracted graph is pasted into validator.schema.org and Google's Rich Results Test (code mode), and a screenshot of each result is taken and attached to the PR beside the graph it checks. After deploy the same pages are rerun on staging by URL.

**What good evidence looks like.** A reviewer can open a graph and find the page's type, every property this spec lists for it, and every reference resolving to an entity in the same graph with an absolute id; the validators report no errors for it. Warnings for recommended properties the content cannot supply (for example a Career's `baseSalary`) are reported, not fixed.

**Prior art.** The before state is already captured in this spec's Problem Statement: on `main`, `/` and `/insights` serve WebPage, `#identity` with only sameAs, an empty `#creator`, and a BreadcrumbList.

**Evidence plan.** Graphs saved as `.scratch/evidence/schema/<page>-graph.json`, validator results as `<page>-<validator>.png`.

1. Before: `/` and one Blog on `main`, graphs saved. Proves the starting point.
2. Home: WebPage with `publisher` and `isPartOf` resolving; Organization at the absolute id with every Identity value; WebSite; no `#identity` or `#creator` anywhere; FAQPage of the Home page's FAQs. Both validators pass, the Rich Results Test detecting FAQ. Proves sitewide wiring and the Home page's FAQs.
3. A Blog with an Author: BlogPosting with every listed property, `author` the Person with the Author Page URL. Validators pass, Rich Results Test detecting Article. Proves BlogPosting and Person.
4. A Blog without an Author: `author` the Organization. Proves the fallback.
5. The Author Page of that Author, with LinkedIn seeded: ProfilePage, Person with the same id as in 3 and `sameAs` the LinkedIn. Validators pass, Rich Results Test detecting Profile page. Proves ProfilePage and the shared Person id.
6. Team Listing page: AboutPage, ItemList of Person references in structure order, each Person defined once. Validator passes. Proves the Team Listing.
7. A Service: Service with provider and areaServed. Validator passes. Proves Service.
8. FAQ Listing page: one FAQPage with every shown FAQ and no empty answers. Rich Results Test detects FAQ. Proves the FAQ Listing.
9. A page seeded with two FAQ Accordions sharing one FAQ: one FAQPage, the shared FAQ once. Proves merging and deduplication.
10. Blog, Playbook, Case Study, Service and Career Listing pages: each main entity CollectionPage. Validator passes. Proves CollectionPage.
11. A Playbook: CreativeWork with author and publisher. Validator passes. Proves Playbook.
12. A Case Study with a Client Name and one without: `about` named from the Client Name, then from the title. Validator passes. Proves Case Study and the fallback.
13. A Career with an Expiry Date and one of each mapped Employment Type in turn: JobPosting with `validThrough`, the mapped `employmentType`, TELECOMMUTE and GB. Rich Results Test detects Job posting with no errors. Proves JobPosting.
14. A Career with no Expiry Date: no `validThrough`, still no errors. Proves the fallback.
15. Control panel: the Team entry shows LinkedIn and the Case Study entry shows Client Name beside the Logo; screenshots at 1600. Proves the fields.

Content for lines 3–5, 9 and 12–14 arrives by Seed under `.scratch/seeds/schema/` (ADR-0002); temporary states are restored afterwards.

## Out of Scope

- A site search, and so a SearchAction on the WebSite.
- LocalBusiness, an office location, opening hours or a map.
- Book as the Playbook type; DigitalDocument or download metadata for Playbooks.
- Enumerating listed items on CollectionPage pages.
- `baseSalary` on a JobPosting, or turning Salary into a structured field.
- A Remote switch or location field on a Career.
- A relation from a Case Study to a Client entry; showing the Client Name on the page.
- Showing the LinkedIn on the Author Page or Team Modal.
- Review, AggregateRating or Testimonial schema.
- ImageObject entities with dimensions, and `primaryImageOfPage`.
- VideoObject for Videos on any page.
- Automating the SEOmatic Identity values across environments; they are entered by hand on each.
- Backfilling Client Names and LinkedIn profiles; editors do this after launch.

## Client notes

To send to the client with the handover:

- **The Team page is an AboutPage, not a ProfilePage.** Google and schema.org treat a ProfilePage as a page about one person; a page listing the whole team marked that way is ignored. Each person's own Author Page is their ProfilePage, and the Team page lists the same people by reference.
- **Playbooks are CreativeWork, not Book.** Book implies an ISBN, a format and a page count, and Google has no Book result for this kind of content.
- **FAQ markup will not produce FAQ snippets in Google.** Since 2023 Google shows FAQ rich results only for government and health sites. The markup is kept for parity with the live site and because other search engines and AI answer engines still read it.
- **Every Career needs an Expiry Date.** It is the posting's closing date in Google for Jobs, and when it passes the Career goes offline on its own, so an expired role is never left live.
- **Logo, description, address and contact details** were taken from the live site and entered in SEO → Site Settings → Identity. The address is the registered office; change it there if it should differ.
- **Fill in LinkedIn** on each Team Member and **Client Name** on each Case Study to complete their profiles and Case Study markup.
