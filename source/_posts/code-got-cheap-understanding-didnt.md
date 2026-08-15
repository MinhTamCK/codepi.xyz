---
title: "Code Got Cheap. Understanding Didn’t."
date: 2026-08-15
image: https://codepi.xyz/assets/img/code-got-cheap-understanding-didnt.jpg
comments: false
---

It's a normal Monday. You make coffee, open your laptop, and find seven PRs waiting. The first one is **+24,506 / −3,938 lines**, with an AI-generated description of what it's supposed to do. Your team has made more changes since Friday than they used to make while you were away for a month.

That opening scene, from Florian Herrengt's *AI is removing the middle class of software engineering?*, put the post on the Hacker News front page — **984 points, 920 comments**, one of the loudest threads of the month. The title is the part everyone quoted. It's also the least useful part of the piece.

The actual argument is narrower and harder to dismiss.

## The asymmetry

> We have made producing large changes extremely cheap and fast, while understanding those changes is still slow, difficult work.

That's the whole thing. One side of the equation got a 100x speedup. The other side didn't move at all, because it runs on human attention and there is no shortcut for building a correct mental model of what a change does.

Everything downstream follows from that gap.

The tragedy, as Herrengt puts it, is that **to the untrained eye it works**. Pull the branch, run it, and you get something functional. So the team keeps going. Again and again, until nobody knows how anything works — and the failure only surfaces weeks later, as a bug that four rounds of prompting can't fix.

His analogy is the right one: buying a luxury car on a credit card. You don't see the debt. You just see the car.

Then comes the scene that makes the point better than any argument:

> "So where does the data come from?"
>
> "Hmm... actually I don't know. Let me ask Claude."

You both sit watching a wall of confident text you have no way to verify. Then: *"Didn't you build this like… last week?"* Silence.

<figure class="dg-figure">
<style>
.dg-figure { margin: var(--s-5, 48px) 0; }
.dg-figure svg { display: block; width: 100%; height: auto; }
.dg-figure figcaption { margin-top: var(--s-3, 16px); font-family: var(--font-sans); font-size: 0.8125rem; line-height: 1.5; color: var(--text-muted); }
.dg-loop .ring { fill: none; stroke: var(--text-muted, #6b6b6b); stroke-width: 1.2; }
.dg-loop .spoke { fill: none; stroke: var(--text-faint, #a3a3a3); stroke-width: 1; stroke-dasharray: 5 4; }
.dg-loop .station { fill: var(--bg, #fafaf7); stroke: var(--text, #1a1a1a); stroke-width: 1; }
.dg-loop .station.focal { fill: var(--accent, #b8472a); fill-opacity: 0.08; stroke: var(--accent, #b8472a); stroke-width: 1.2; }
.dg-loop .hub { fill: var(--text, #1a1a1a); }
.dg-loop .node-name { fill: var(--text, #1a1a1a); font: 600 12px var(--font-sans); text-anchor: middle; }
.dg-loop .focal-name { fill: var(--accent, #b8472a); }
.dg-loop .sublabel { fill: var(--text-faint, #a3a3a3); font: 400 8px var(--font-mono); text-anchor: middle; }
.dg-loop .hub-name { fill: var(--bg, #fafaf7); font: 600 15px var(--font-sans); text-anchor: middle; }
.dg-loop .hub-sub { fill: var(--bg, #fafaf7); opacity: 0.72; font: 400 8px var(--font-mono); text-anchor: middle; }
.dg-loop .arrow-label { fill: var(--text-faint, #a3a3a3); font: 400 8px var(--font-mono); letter-spacing: 0.06em; text-anchor: middle; }
.dg-loop .mask { fill: var(--bg, #fafaf7); }
.dg-loop .mk-muted { fill: var(--text-muted, #6b6b6b); }
.dg-loop .mk-soft { fill: var(--text-faint, #a3a3a3); }
</style>
<svg class="dg-loop" viewBox="0 0 688 592" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="compound-loop-title compound-loop-desc">
<title id="compound-loop-title">The loop that compounds</title>
<desc id="compound-loop-desc">Six stations run clockwise from an agent writing a large change, through a branch that looks like it works, a review that gives in, a merge, a bug nobody can trace, and a request back to the model. Every pass writes more unexplained system into one central store of understanding debt.</desc>
<defs>
<marker id="dg-arrow" markerWidth="8" markerHeight="6" refX="7" refY="3" orient="auto"><polygon class="mk-muted" points="0 0, 8 3, 0 6"/></marker>
<marker id="dg-arrow-soft" markerWidth="8" markerHeight="6" refX="7" refY="3" orient="auto"><polygon class="mk-soft" points="0 0, 8 3, 0 6"/></marker>
</defs>
<!-- Solid clockwise ring: six arcs on the same r=200 station circle. -->
<path class="ring" d="M 424.000 112.697 A 200 200 0 0 1 493.458 163.101" marker-end="url(#dg-arrow)"/>
<path class="ring" d="M 532.085 228.000 A 200 200 0 0 1 532.490 362.870" marker-end="url(#dg-arrow)"/>
<path class="ring" d="M 494.253 428.000 A 200 200 0 0 1 425.098 478.820" marker-end="url(#dg-arrow)"/>
<path class="ring" d="M 264.000 479.303 A 200 200 0 0 1 194.542 428.899" marker-end="url(#dg-arrow)"/>
<path class="ring" d="M 155.915 364.000 A 200 200 0 0 1 155.510 229.130" marker-end="url(#dg-arrow)"/>
<path class="ring" d="M 193.747 164.000 A 200 200 0 0 1 262.902 113.180" marker-end="url(#dg-arrow)"/>
<!-- Dashed write-backs: station inner edge to 6px before the hub stroke. -->
<line class="spoke" x1="344.000" y1="128.000" x2="344.000" y2="242.000" marker-end="url(#dg-arrow-soft)"/>
<line class="spoke" x1="460.574" y1="228.000" x2="432.335" y2="245.000" marker-end="url(#dg-arrow-soft)"/>
<line class="spoke" x1="460.574" y1="364.000" x2="432.335" y2="347.000" marker-end="url(#dg-arrow-soft)"/>
<line class="spoke" x1="344.000" y1="464.000" x2="344.000" y2="350.000" marker-end="url(#dg-arrow-soft)"/>
<line class="spoke" x1="227.426" y1="364.000" x2="255.665" y2="347.000" marker-end="url(#dg-arrow-soft)"/>
<line class="spoke" x1="227.426" y1="228.000" x2="255.665" y2="245.000" marker-end="url(#dg-arrow-soft)"/>
<!-- One curated write-back label. -->
<rect class="mask" x="356" y="396" width="52" height="12" rx="2"/>
<text x="382" y="406" class="arrow-label">+ DEBT</text>
<!-- Stations -->
<rect class="station" x="264" y="64" width="160" height="64" rx="6"/>
<text x="344" y="92" class="node-name">Agent writes it</text><text x="344" y="112" class="sublabel">24,506 lines</text>
<rect class="station" x="436" y="164" width="160" height="64" rx="6"/>
<text x="516" y="192" class="node-name">Looks like it works</text><text x="516" y="212" class="sublabel">branch runs green</text>
<rect class="station focal" x="436" y="364" width="160" height="64" rx="6"/>
<text x="516" y="392" class="node-name focal-name">Review gives in</text><text x="516" y="412" class="sublabel">10 PRs a day</text>
<rect class="station" x="264" y="464" width="160" height="64" rx="6"/>
<text x="344" y="492" class="node-name">Merged</text><text x="344" y="512" class="sublabel">nobody holds it</text>
<rect class="station" x="92" y="364" width="160" height="64" rx="6"/>
<text x="172" y="392" class="node-name">Bug surfaces</text><text x="172" y="412" class="sublabel">4th attempt to fix</text>
<rect class="station" x="92" y="164" width="160" height="64" rx="6"/>
<text x="172" y="192" class="node-name">Ask the model</text><text x="172" y="212" class="sublabel">wall of text</text>
<!-- The one shared-state hub. -->
<rect class="hub" x="244" y="248" width="200" height="96" rx="8"/>
<text x="344" y="292" class="hub-name">Understanding debt</text>
<text x="344" y="314" class="hub-sub">compounds every pass</text>
</svg>
<figcaption>The ring is the work; the dashed spokes are what it leaves behind. Every pass ships something that runs and adds system nobody holds a model of — so the next bug is harder to trace than the last, and the only tool left is the thing that wrote it.</figcaption>
</figure>

Nobody ever understood a whole large system. That's not new. What's new is that there used to be **someone** who understood each part and could explain it to you. Now they ask an LLM, because they don't know either.

## Why the old safeguards stopped working

The most common reply to all this is "you have a process problem — get better tests, CI, and code review."

The rebuttal is the sharpest paragraph in the post: we had all of those things, and none of them disappeared. **They were designed for a world where producing a massive amount of change was impossible.** The difficulty of writing code was itself one of the limiting factors, and we removed it without replacing it.

Code review breaks down when one person opens ten PRs a day. Tests cover the behaviours you thought to test, never the ones nobody thought of. How many times have you shipped a bug with fully green CI?

Which leaves an uncomfortable fork. If the people who understand changes are now the bottleneck, you have three options:

1. **Generate less.**
2. **Find a genuinely better way to validate.**
3. **Accept lower quality.**

Most teams have quietly picked option 3 without ever discussing it.

There's a second-order cost too. Ten PRs a day looks like a 10x engineer, but if three people spend the next two days reviewing, correcting bad assumptions and debugging regressions, nothing was gained — the work just moved onto other people. Specifically, onto the people who are hardest to replace and whose attention is already scarce. PR count and lines changed are terrible productivity measures: you can make your own numbers look spectacular while lowering the throughput of the whole team.

## The bar moved — not the seniority ladder

Here's where the headline misleads. The piece is not really about juniors versus mid versus senior. Herrengt says the opposite outright: he's seen juniors do fine because they try to understand what they're doing, and seniors get much worse after they stopped.

The line that actually defines the split:

> To be employable, there's a bar you have to clear, and that bar is whatever the current best model du jour can do.

That's the useful reframing. The bar isn't a job title, and it isn't years of experience. It's **judgment that the model doesn't already supply for free** — and it moves every time a new model ships. If you lack the judgment to evaluate an LLM's recommendation, asking the LLM for more judgment doesn't fix it.

The reason this reads as a *middle-class* story is economic, not technical. Implementation used to be the thing companies paid six figures for. If that's all a role is, the honest question is why it was ever priced that way, since it could already be bought cheaply elsewhere.

## Where the argument gets hard

The thread produced two objections worth more than the post's own answers.

**"This is a process failure, not an AI failure."** Several working engineers reported shipping AI-first with PRs that touch 12–15 files, still reviewable, still revertible. That's real, and it's a genuine limit on the thesis — nothing forces a 25,000-line PR to exist. But it also quietly concedes the point: those teams are exercising option 1. They're generating less on purpose.

**"AI actually *mitigates* bad developers."** The claim: architecture comes from above, and a model writes less sloppy code than a weak engineer. It drew the best rebuttals in the thread:

- "AI is very good at making the bad dev's PR look plausible and be green in CI. And thus, merged." — *@whateveracct*
- Syntactically perfect, unreadable, spaghetti architecture, plus an elaborate test suite testing all the wrong things. — *@kube-system*
- Models optimise for the task in front of them: credential checks and database connections end up buried in domain logic. A good engineer prompts it back out. A bad one **never notices it happened.** — *@mjr00*

That last distinction is the one that matters. The failure mode isn't bad code. It's plausible code that nobody owns.

And the counterweight nobody should skip, from *@aabdi*: the pre-AI era wasn't a golden age either. No docs, no tests, nobody free to explain anything. Some of this nostalgia is doing unearned work.

## What the post leaves out

The labour-market half of the debate happened entirely in the comments, and it's blunter than the essay.

The concrete mechanism people described isn't "mid-level engineers get fired." It's **compression**: the same backlog gets worked by fewer people at a lower band. One commenter framed it as paying 80k for what used to cost 175k — not less work to do, just a lower skill floor needed to do it.

The obvious objection — *the backlog is never empty, so demand is infinite* — got the best answer in the thread: most companies aren't software companies. Software is a **cost centre with a fixed budget**. Infinite backlog has never meant infinite hiring.

And the structural worry, which nobody in 920 comments answered: if the entry and mid-level rungs are where seniors were manufactured, and those rungs are being automated, the pipeline that produces the one person who still understands the system is the thing being cut.

## Read it with a clear head

- This is one engineer's argument with anecdotes, not a study. No numbers on defect rates, maintenance cost, or hiring.
- The strongest counter-case is real: disciplined teams shipping AI-first with small, reviewable PRs. The thesis describes a failure mode, not a law.
- The author uses AI heavily and says so repeatedly. This isn't a refusenik piece, and dismissing it as one is the laziest possible reading.
- Salary compression is currently a prediction backed by anecdote. Treat it as such.

## The usable takeaway

> The bottleneck was never typing. It was understanding — and we just spent all our speedup on the wrong side of that equation.

The practical version is unglamorous. Cap PR size at what a human can actually hold in their head. Treat "I don't know, let me ask Claude" about code you wrote last week as a real incident, not a joke. Write down the design decision somewhere that isn't a 40-turn chat log. And be honest about which of the three options your team has picked, because picking option 3 by accident is how you get there in months instead of years.

Reverting a bad decision is still slow. Adding tables to a database takes ten minutes; unwinding them takes a migration plan, a rollback plan, and a promise not to break the customers paying you today. By the time you've untangled one bad decision, five more have merged.

The speed of making mistakes changed completely. The speed of fixing them didn't move an inch.

*Sources: [AI is removing the middle class of software engineering?](https://blog.florianherrengt.com/ai-removing-middle-class-software-engineering.html) · [HN thread](https://news.ycombinator.com/item?id=49271994) (984 points, 920 comments)*
