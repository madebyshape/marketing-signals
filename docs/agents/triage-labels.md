# Triage Labels

The skills speak in terms of five canonical triage roles. On this repo's tracker those roles
are carried by **Linear board states**, not labels — there is nothing to apply with
`factory issue label`.

| Role in mattpocock/skills | State on the BYB board | Meaning                                       |
| ------------------------- | ---------------------- | --------------------------------------------- |
| `needs-triage`            | `Triage`               | Needs evaluation (currently unused)           |
| `needs-info`              | `Needs Spec`           | Spec incomplete — the grilling isn't finished |
| `ready-for-agent`         | `Queued`               | **Written by a human only** — never an agent  |
| `ready-for-human`         | `Backlog`              | Judgement calls, external access, design work |
| `wontfix`                 | `Canceled`             | Auto-archived after 3 days, deleted after 30  |

When a skill mentions a role, move the card to the corresponding state with
`factory issue move BYB-nn <state>` (multi-word states go unquoted) — **except
`ready-for-agent`**, which an agent must never write. See `docs/agents/issue-tracker.md`.

Factory-owned states you will see but never write: `Agent Running`, `In Review`,
`Ready to Deploy`, `Stuck`.
