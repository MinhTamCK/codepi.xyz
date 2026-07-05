---
title: "Hermes vs. Claude Code — What a DIY Agent Teaches You to Add to the One You Already Use"
date: 2026-07-05
image: https://codepi.xyz/assets/img/hermes-vs-claude-code.jpg
comments: false
---

Everyone is building "self-improving agents" from scratch right now. **Hermes** is a great example — an open, teach-yourself agent: a core loop, a gateway, memory, cron. Watch the walkthrough and you understand exactly how an agent works.

But here's the thing: if you use **Claude Code**, you already run that same architecture — just hosted and batteries-included. So the useful question isn't "which is better." It's: *what does the DIY version force you to build by hand that Claude Code hides — and which of those are worth bolting on anyway?*

## The same machine, one built raw, one pre-assembled

| Hermes builds by hand | Claude Code gives you |
|---|---|
| **Agent loop** (message → context → LLM → tool → repeat) | Built in. It *is* the loop. |
| **Gateway** (Telegram, Discord, email, SMS…) | MCP servers + any bridge you point at it |
| **Context compression** at a token threshold | Auto-compaction near the window limit + `/compact` |
| **Skills / tools** | Skills, subagents (`.claude/agents/*.md`), hooks, MCP |
| **Cron** — a `tick()` loop reading `jobs.json` | OS cron / scheduled agents |
| **Memory** — `SOUL.md`, `User.md`, `Memory.md`, SQLite, vectors | `CLAUDE.md` + a file-based `memory/` folder |

For most rows, Claude Code wins on effort — you get a debugged version for free. Two rows are where Hermes exposes something worth stealing.

## Gap 1 — Memory that writes *itself*

Hermes splits memory into three files with clear jobs: `SOUL.md` (who the agent is), `User.md` (what it has learned about *you*), `Memory.md` (facts and workflows to remember). The agent **updates them on its own** after conversations.

Most Claude Code users only ever write a static `CLAUDE.md` by hand — that's just the `SOUL.md` slot. The other two stay empty, so nothing is learned across sessions.

**Fix it — copy the split:**

```
your-project/
  CLAUDE.md          # identity + rules  (= SOUL.md)
  memory/
    USER.md          # facts about you   (= User.md)
    MEMORY.md        # durable facts/workflows (= Memory.md)
```

Then add one line to `CLAUDE.md` so the agent maintains them:

```markdown
When you learn a durable fact about me or this project, append one
line to memory/USER.md or memory/MEMORY.md. Read both at session start.
```

That single rule turns a static prompt into a memory that compounds.

## Gap 2 — Recall by *meaning*, not by keyword

Hermes's third memory tier is the interesting one: an **external semantic store** (Mem0, Supermemory) that retrieves past notes by *meaning* using embeddings. Ask about "that auth bug from last month" and it finds it even if you never say the word "auth."

Claude Code's built-in memory is closer to keyword + index lookup — great, but it won't surface a semantically related note you phrased differently.

**Fix it — add a memory MCP server.** Point Claude Code at an MCP memory server (Mem0, Supermemory, or a small local RAG over your `memory/` folder). Now "recall anything related to X" works across everything you've ever told it — the one capability neither the raw loop nor the stock config gives you for free.

## Gap 3 — Surviving a hard restart

Auto-compaction handles a *long* conversation gracefully. It does **not** save you from a crash or a watchdog restart — those wipe the live context, and you start cold from `CLAUDE.md`.

**Fix it — a Stop hook that snapshots.** Add a hook that, on session end, writes a short structured summary (goal, decisions, open threads, files touched) to `memory/LAST_SESSION.md`. Load it at the next start. That's Hermes's structured compression, applied to the one boundary Claude Code doesn't cover.

## The takeaway

Building an agent like Hermes from scratch is the best way to *understand* one. But you don't have to rebuild the loop, the gateway, or the cron — Claude Code already ships those, debugged.

Steal the three things it doesn't hand you:

1. **A memory that writes itself** — split `CLAUDE.md` into identity + `USER.md` + `MEMORY.md`, and tell the agent to update them.
2. **Semantic recall** — bolt on a memory MCP server.
3. **A restart-proof handoff** — a Stop hook that snapshots the session.

Three small additions. Your everyday tool goes from stateless-and-fast to *actually remembers you* — the whole point of a self-improving agent, without building one from zero.
