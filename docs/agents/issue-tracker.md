# Issue tracker: Linear code factory (team BYB)

Issues for this repo live on the shared Linear **BYB** board, not in this repo and not on
GitHub (this repo has no git remote). All tracker operations go through the `factory issue`
CLI on `PATH`; auth is handled inside it — there is no API key in this repo.

**The `linear-factory` skill is the authority.** Read it before any tracker operation — it
carries the full CLI surface, the board's state machine, and the ticket body templates. This
file records only what is specific to *this* repo.

## Repo-specific facts

- **Site label**: `marketing-signals` — pass `--site marketing-signals` on every `create`.
- **Specs are repo docs, not issues**: `docs/specs/<slug>.md`, committed straight to `main`
  and pushed *before* any of its tickets are queued. `/to-spec` never touches the tracker.
- **Every ticket body carries a `Spec:` line** pointing at its spec path. The factory agent
  finds its context through that line; a card missing it is sent to `Stuck`.
- **Type label**: `block` or `bugfix` for factory-eligible work; `chore` for the human lane.

## When a skill says "publish to the issue tracker"

`factory issue create --site marketing-signals --type <block|bugfix|chore> --title "..." --body-file <path>`

It defaults to `--state Backlog` and prints `BYB-nn <url>` — identifier first, so capture it
and chain `--blocked-by BYB-nn` on dependent tickets. Publish blockers first.

## When a skill says "fetch the relevant ticket"

`factory issue view BYB-nn --comments`

## Hard rules — these beat any skill's own defaults

1. **Never move a card to `Queued`, and never apply `ready-for-agent`.** `Queued` is the
   trigger column for an unattended agent run; only a human drags cards there. `/to-tickets`
   publishes to `Backlog` and stops.
2. **Never open a PR for a spec.** Specs go straight to `main`.
3. **Multi-line bodies use `--body-file`**, never `--body`.

## Wayfinding operations

*Provisional — `/wayfinder` has no established convention on this board yet. Adjust as needed.*

The map is a `--type chore` issue (never factory-eligible) in `Backlog` holding the
Notes / Decisions-so-far / Fog body. Child tickets are sibling issues carrying the same site
label, each with `Part of BYB-nn` at the top of the body — the CLI has **no `--parent`**.
Blocking uses native `--blocked-by` edges between siblings. A ticket is unblocked when every
blocker is closed; claim by moving it out of `Backlog`; resolve with
`factory issue comment` then a state move.
