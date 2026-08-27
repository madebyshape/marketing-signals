## Conventions

- Mobile-first responsive design
- Use existing components before creating new ones
- Keep Alpine.js logic minimal, inside `{% js %}` tags
- Use `params` object for component configuration
- Grid: 12-column with `gap-5`
- Site margins: `px-10`
- **No `{% css %}` blocks** - Use Tailwind utility classes only

## Browser Automation

Use `agent-browser` for web automation. Run `agent-browser --help` for all commands.

Core workflow:
1. `agent-browser open <url>` - Navigate to page
2. `agent-browser snapshot -i` - Get interactive elements with refs (@e1, @e2)
3. `agent-browser click @e1` / `fill @e2 "text"` - Interact using refs
4. Re-snapshot after page changes

## Agent skills

### Issue tracker

Issues live on the Linear code factory board (team **BYB**), site label `marketing-signals`,
driven by the `factory issue` CLI. See `docs/agents/issue-tracker.md`.

### Triage labels

No labels — the five canonical triage roles are carried by Linear **board states**.
See `docs/agents/triage-labels.md`.

### Domain docs

Single-context: `CONTEXT.md` + `docs/adr/` at the repo root. See `docs/agents/domain.md`.
