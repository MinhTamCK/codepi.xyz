---
title: "Co-Existence: Working With AI That's Sometimes Better Than You"
date: 2026-07-09
image: https://codepi.xyz/assets/img/co-existence-working-with-ai-thats-better-than-you.jpg
comments: false
---

Ethan Mollick has spent the last two years telling everyone to treat AI like a coworker. Prompt it, correct it, keep a human in the loop, stay the one in charge. That was the whole thesis of *Co-Intelligence*, his bestseller, and it was the right advice for the world of 2024. He is now quietly retiring it. His new framing is *Co-Existence* — and the shift in that one word is the most useful thing I've read about where this is actually going.

## The model where you were the director just broke

Co-intelligence assumed a specific shape: you sit at the center, the AI is your assistant, and value comes from the back-and-forth. You write a prompt, it drafts, you edit, it revises. The human is the bottleneck and the boss. Every "here are 5 rules for working with ChatGPT" post you've ever read lives inside that model.

What broke it was agents. Not the demos — the real ones. By late 2025 coding agents crossed from party trick to production. Anthropic says AI now writes roughly 80% of its own code and developers ship several times more output. That is not a better assistant. That is a system doing the work semi-autonomously while you supervise the edges. The relationship inverted: you are no longer directing every step, you are living alongside something that runs on its own and is *sometimes, but not always, better than you*.

That last clause is the entire game. Not "AI is better" — the doomer line. Not "AI is a dumb tool" — the skeptic line. **Sometimes better, sometimes hilariously worse, and you can't always tell which in advance.** Mollick calls this the jagged frontier, and co-existence is just the honest name for having to negotiate that jaggedness every single day.

## The frontier is jagged, and the map keeps redrawing itself

Here is the part builders underrate. For a single person using a single chatbot, the jagged frontier is now well mapped. You learn that the model is superb at boilerplate and refactors and bad at counting words or holding a long narrative. Fine. You route around it.

Multi-agent systems have no such map. When you wire three or four agents together — a planner, a coder, a reviewer, a runner — the failure modes are *new*. We don't even have vocabulary for how these systems succeed or fail. A small bump in single-step accuracy can multiply what a chain of agents can accomplish by two or three times, because errors compound the other way too. Thresholds get crossed silently. Something that couldn't work last month works this month, and nobody sends a memo.

I feel this every week building my own stack of little agents. The bug is never "the model is dumb." The bug is that agent A confidently handed agent B something plausible and wrong, and the jaggedness stacked. Co-existence, as a working discipline, means you stop asking "is the AI good at this?" and start asking "where exactly is the frontier *today*, for *this* chain, and what do I put a human on top of?"

## AI is now the reader, not just the writer

The sharpest turn in Mollick's argument is one most people haven't clocked yet: AI has become the **gatekeeper**. It's no longer only the thing that produces your work — it's increasingly the thing that *reads and judges* it before any human does.

He describes optimizing his own book launch not for people but for models: A/B testing copy across GPT, Claude, and Gemini to see which pitch the AI would recommend to a user who asks "what should I read about AI?" SEO is quietly becoming AIO. When you ask an assistant for a tool, a restaurant, a library, a hire — the model is the first filter, and its taste is the one you have to pass.

My favorite detail: one model flagged his marketing line ("buy your human this book") as a suspicious prompt injection. The gatekeeper isn't just picky. It's paranoid, and it's reading everything.

## What this changes if you build things

Three things I'm actually doing differently since this reframe clicked:

- **Design for supervision, not prompting.** The valuable skill is no longer writing the perfect prompt. It's building the harness — the checks, the review step, the place a human intervenes — around an agent that mostly runs itself. Assume it acts without you and decide where you catch it.
- **Re-survey the frontier constantly.** Whatever you decided the AI "can't do" three months ago is probably stale. The line moves without announcement. Budget time to re-test the boundary instead of trusting last quarter's map.
- **Write for two audiences.** Your landing page, your docs, your product copy — a model reads them now and decides whether to surface you. That's not a reason to write slop for robots. It's a reason to be legible, structured, and honest enough that a paranoid gatekeeper trusts you.

## Staying human is a choice you keep making

The comforting version of all this is "human agency persists." It does — but not for free, and not as a permanent settlement. Co-intelligence was a *state* you could reach and rest in. Co-existence is a *negotiation* with no end, because the other party keeps changing what it's capable of.

That sounds exhausting. It mostly isn't. It just means the job quietly changed from *doing the work* to *deciding what's worth doing, judging what came back, and knowing which parts of the frontier you still own.* Taste, judgment, and the willingness to keep re-checking the boundary — those are the moat now. Not because they're romantic. Because they're the parts of the frontier that stay stubbornly, usefully jagged in your favor.

---

*Based on Ethan Mollick's ["Co-Existence and the End of Co-Intelligence"](https://www.oneusefulthing.org/p/co-existence-and-the-end-of-co-intelligence). His new book, Co-Existence, follows Co-Intelligence.*
