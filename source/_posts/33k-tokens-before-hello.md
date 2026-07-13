---
title: "33,000 Tokens Before Hello — What Your Coding Agent Spends Before Reading Your Prompt"
date: 2026-07-13
image: https://codepi.xyz/assets/img/33k-tokens-before-hello.jpg
comments: false
---

Type "hello" into Claude Code and, before the model reads a single word of yours, roughly **33,000 tokens have already left the building**. OpenCode does the same job with about 7,000. That measurement — from Systima, who parked a logging proxy between each harness and Anthropic's endpoint and captured the raw payloads — hit the Hacker News front page (378 points, 210 comments), and the fight underneath it is better than the headline.

Here's what the numbers actually say, the objection everyone raised, and the independent data point that settles more of the argument than the original post does.

## The bill before the work

First request of a session, both harnesses pinned to the same model:

| Component | Claude Code | OpenCode |
|---|---|---|
| System prompt | ~6,500 tokens | ~2,000 tokens |
| Tool schemas (27 vs 10 tools) | ~24,000 tokens | ~4,800 tokens |
| First-message scaffolding | ~1,950 tokens | 0 |
| **Baseline, before your prompt** | **~32,800** | **~6,900** |

The gap is not the system prompt — it's the **tool catalog**. Claude Code ships an orchestration suite (subagents, background tasks, monitoring, notifications) and every one of those tools is a schema riding along on *every request*, whether you use it or not.

## The plot twist: the baseline isn't the bill

Here's the part most commenters skipped. On a multi-step task (write code → run → test → fix), Claude Code finished in **3 requests** by batching tool calls in parallel; OpenCode serialized the same work across **9 requests**. Total input: ~121K tokens for Claude Code, ~132K for OpenCode.

The meter starts 4.7x higher, but how the session unfolds decides who pays more. A fat baseline amortized over few requests can beat a lean baseline re-paid turn after turn.

So Claude Code is fine? Not quite. Two findings in the data have no such excuse.

## Leak 1: cache instability

Prompt caching only works if the prefix you send is byte-identical to the one you sent before. OpenCode's is — its nine-request task wrote **1,003 cache tokens**, total. Claude Code generated *three different request classes* per session (warmup, main thread, subagents), each caching separately, and at one point **re-wrote its entire ~43K prefix mid-task** for no visible reason.

Same task, same output: **53,839 cache tokens written — up to 54x more** across repeated runs. Cache writes bill at 1.25x base rate, so this is pure premium-priced waste. And caching discounts cost, not *space*: a heavy bootstrap still occupies the context window. With a production config, ~85K tokens — **over 40% of a 200K window** — are gone before your code shows up.

## Leak 2: everything multiplies

Every layer of real-world configuration stacks on top of the baseline, per request:

- A 72KB `CLAUDE.md` / `AGENTS.md` → **+~20,000 tokens on every request** (both harnesses pay this one).
- Five modest MCP servers → +5–7K tokens, tool count 27 → 69.
- Delegating one task to two subagents → cumulative usage jumped **121K → 513K tokens (4.2x)**. Each subagent pays its own full bootstrap, then the parent ingests its transcript.

If subagents ever felt like they eat your quota alive, this is the arithmetic behind the feeling.

## "Are we measuring the right thing?"

The best pushback in the HN thread: *"This is like saying contractor A quoted $33,000 and contractor B quoted $7,000. Are we measuring the right thing?"* Fair. Systima's scored tasks were completed identically by both harnesses — but they were simple tasks. Maybe the heavy harness earns its tokens on hard problems.

A week before this post, Databricks answered exactly that question with better data. They built an [internal benchmark](https://www.databricks.com/blog/benchmarking-coding-agents-databricks-multi-million-line-codebase) from real engineering tasks on their multi-million-line codebase (Scala, Go, Rust, Java, TypeScript — nothing like SWE-Bench), and CTO Matei Zaharia [posted the results](https://x.com/matei_zaharia/status/2074943614564852161). Finding #3:

> "Harnesses make a huge difference in cost-performance. The very simple Pi harness got the same success rate as harnesses from the LLM vendors with Opus and GPT 5.5, but at 2x less cost! Seems to be mainly due to smaller inputs to the LLM."

[Pi](https://mariozechner.at/posts/2025-11-30-pi-coding-agent/) is the extreme end of the spectrum: **four tools** (read, write, edit, bash) and a system prompt + tool definitions under **1,000 tokens**. Its author's bet is that frontier models have been RL-trained on agentic coding so hard that they no longer need 10,000 tokens of instructions explaining what a coding agent is. On Databricks' codebase, that bet paid off: **same success rate, half the cost**.

## Read the numbers with a clear head

- Both studies are **July 2026 snapshots**. On the newest model generation Anthropic already compressed Claude Code's payload (the ratio dropped from 4.7x to ~3.3x) — this is clearly being worked on.
- Claude Code's fat toolkit isn't decoration; parallel batching *won* the multi-step comparison. You're paying for capabilities — the problem is paying for them on requests that don't use them.
- Databricks measured **their** codebase with **their** task sample. One data point, honestly labeled as such.
- On a subscription you never see a per-token bill — but you feel this anyway, as rate limits arriving early and as 40% of your context window spent before your code enters the room.

## The usable takeaway

> The harness is part of your model bill. Tokens buy context or they buy overhead — and overhead compounds: per request, per MCP server, per instruction file, per subagent.

Practical version: audit your MCP servers and drop the ones you rarely use (each one is schemas on every request). Keep `CLAUDE.md` lean — it's re-sent every single turn. Treat subagents as a 4x multiplier, not a free parallelism button. And if you run agents in production, log your boundary traffic — Systima's closing line is the right one: if you can't answer *"what exactly did we send to the model last Tuesday,"* that's the gap to close first.

The model is the engine. The harness is the drivetrain. This week we got numbers showing how much torque some drivetrains eat — and a four-tool gearbox matching the factory one at half the fuel.

*Sources: [Systima's measurement](https://systima.ai/blog/claude-code-vs-opencode-token-overhead) · [HN thread](https://news.ycombinator.com/item?id=48883275) · [Databricks benchmark](https://www.databricks.com/blog/benchmarking-coding-agents-databricks-multi-million-line-codebase) · [Matei Zaharia's thread](https://x.com/matei_zaharia/status/2074943614564852161) · [Pi](https://mariozechner.at/posts/2025-11-30-pi-coding-agent/)*
