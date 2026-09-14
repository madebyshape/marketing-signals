---
status: accepted
---

# A Blog's Author is a Team Member, not the Craft entry author

Every Craft entry already has an author, and the Blog section is configured as though that were the one in use: `minAuthors: 1`, `maxAuthors: 2`. It is not. All 180 author rows on the site point at the single `development@madebyshape.co.uk` account, which has no name and no photo, and no Blog satisfies the minimum. Meanwhile the person named in the Blog Hero design, Gareth Hoyle, already exists as a Team Member entry with an Image, alongside twenty or so colleagues. The decision is that a Blog's Author is an entry relation to the Team section, through an `entryTeam` field the layout labels "Author", and the Craft entry author is left unused.

The reason for weighing the built-in first was an author page listing everything a person has written. That turns out not to separate the options: a relation is queryable from either end, so `relatedTo` gives the same listing that `authorId` would, and it hands that page the Team Member's Image, Job Role and Text as well.

## Considered options

- **The Craft entry author**: nothing to build, and the CP's own author control. But an author is a User, so every writer needs an account, a photo uploaded a second time and a name typed a second time, duplicating a Team directory the CMS already holds. Authorship would also follow whoever the account belongs to, not who wrote the article.
- **An Avatar Group field on the Blog**: a name and photo typed per Blog, so a guest writer needs no entry anywhere. But the same person's details are re-entered on every article they write, and an author page has nothing stable to group by.

## Consequences

- A writer must exist as a Team Member before they can be credited. A guest author is a Team Member entry, or a change to this decision.
- `minAuthors` and `maxAuthors` on the Blog section are now vestigial and describe a mechanism nothing reads. They should be reviewed rather than left to imply the built-in author is live.
- The Author is a relation, so an author page is a `relatedTo` query and needs no new field. Team entries have no URI today, so giving the Author a link is that page's decision, not this one.
- The Author is optional and no Blog has one. Until they are backfilled every Blog Hero renders without its Avatar Group, which is the designed empty state rather than a fault.
