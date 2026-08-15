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
