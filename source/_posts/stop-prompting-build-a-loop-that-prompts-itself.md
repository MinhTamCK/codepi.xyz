---
title: "Stop Prompting the Model — Build a Loop That Prompts Itself"
date: 2026-06-22
image: https://codepi.xyz/assets/img/loop-that-prompts-itself.jpg
comments: false
---

I use Claude Code every day, and for months I was still the bottleneck. I issued every command, I copied errors back for it to fix, and I repeated that all day. The model was good. *I* was the constraint.

The way out isn't a better prompt. It's a **loop that prompts itself**: act → check the result → self-correct → repeat. Boris Cherny, who built Claude Code, put it bluntly — Anthropic no longer has one agent writing code; they command an "army of agents," where agents prompt other agents in a tree. The job stopped being "write the perfect prompt" and became "write the loop."

Here are the four pieces I assembled, easiest to hardest. Every one is copy-paste-able.

## Tier 1 — Split one assistant into specialized agents

In Claude Code, each `.claude/agents/*.md` file is a sub-agent. Here's my blog writer:

```markdown
---
name: blog-writer
description: Writes an 800-1200 word blog post, checks for duplicates first. Use when a new post is needed.
tools: Read, Write, Edit, Bash, Grep, Glob
model: sonnet
---
You are a Content Agent. BEFORE writing: list existing posts in content/blog/,
and if the topic already exists, enhance the old post instead of creating a duplicate.
Advisory tone, internal links, close every post with the standard disclaimer.
```

Two tricks here are the real gold:

1. **Use `tools` as guardrails, not just permissions.** My analytics agent is granted only `Read, Bash` — *no* `Write/Edit`. It physically *cannot* change a file even if it wants to, so it's forced into "propose only; a human approves." Restricting tools is how you design behavior.
2. **Small model for the leaves, big model for the orchestrator** (`model: sonnet` on the children, opus on the root). Much cheaper and faster.

Now I give one high-level command — *"write a post about X, and in parallel have the researcher read five sources on Y"* — and the root agent fans out the whole tree. That is "agents prompting agents in a tree."

## Tier 2 — Let it catch its own mistakes (the heart of the loop)

This is the piece that turns "AI does it for me" into "AI fixes itself." Add a hook to `.claude/settings.json` that runs *after every file edit*:

```json
{
  "hooks": {
    "PostToolUse": [{
      "matcher": "Edit|Write",
      "hooks": [{ "type": "command", "command": "python .claude/hooks/verify.py" }]
    }]
  }
}
```

And `verify.py` — silent on success, **exit 2 + a message on failure**:

```python
import json, py_compile, sys
data = json.load(sys.stdin)
path = (data.get("tool_input") or {}).get("file_path", "")
if path.endswith(".py"):
    try:
        py_compile.compile(path, doraise=True, quiet=1)
    except py_compile.PyCompileError as e:
        sys.stderr.write(f"Syntax error in {path}:\n{e.msg}\n")
        sys.exit(2)   # exit 2 = the error flows BACK into the agent's context
```

The mechanism: `exit 2` makes Claude Code feed the error message straight back into the agent's context, so the agent sees the break and fixes it **without me pointing it out**. Swap `py_compile` for `ruff`, `tsc`, `pytest`, `curl -f localhost` — whatever proves the work for your stack. The principle: *turn every action into a verifiable signal that automatically flows back to the agent.* That is, literally, the loop prompting itself — the environment writes the fix-it prompt so I don't have to.

## Tier 3 — Separate the harness from the knowledge

For a loop that runs long-term without bloating, split the prompt in two:

- **Harness (fixed):** the steps, the stop conditions, the safe actions. Don't touch it.
- **Knowledge (mutable):** a `lessons.md` file (≤ 30 lines) that the agent curates *itself* — each run it adds one lesson and drops a weak one.

The key shift: I no longer edit the prompt. The agent edits its own knowledge file while the harness stays still. This is where the model "prompts itself" on the next pass.

## Tier 4 — Let it run while you sleep

The last piece is the simplest: `claude -p "run loop X" --dangerously-skip-permissions` from cron. For the semi-autonomous case, the `/loop` command paces itself. In the morning I read *results*, not *prompts*.

---

The loop in one line: **act → verifiable signal → self-correct → repeat.** You lay the rails once (Tiers 1–2); the agent drives (Tiers 3–4).

Start tiny: one agent file plus one verify hook on the repo you touch most. Feel the moment it fixes its own mistake without you — then scale. The model is something you rent. The loop is something you own.
