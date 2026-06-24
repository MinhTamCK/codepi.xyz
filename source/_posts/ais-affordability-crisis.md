---
title: "AI's Affordability Crisis — Who Pays When the Subsidy Ends?"
date: 2026-06-24
image: https://codepi.xyz/assets/img/ai-affordability-crisis.jpg
comments: false
---

Every time I open Claude Code, I'm spending someone else's money. Not mine — the lab's. A recent piece by David Rosenthal, *AI's Affordability Crisis*, put a number on the gap I'd been feeling for months: the price I pay for AI and the cost of producing it are not in the same universe.

The post hit the Hacker News front page (217 points, 274 comments), and the debate underneath it is more interesting than the headline. So here's the argument, the numbers, and the part everyone fights about.

## The 40–70x gap

A SemiAnalysis test ran the math on what a $200/month subscription actually buys at list-API prices:

```text
Anthropic  $200/mo plan  →  ~$8,000 of tokens consumable
OpenAI     $200/mo plan  →  ~$14,000 of tokens consumable
```

That's a **40–70x subsidy**, depending on the provider. You are not the customer paying for inference — you're the customer being paid to use inference, with the bill covered by raised capital.

The provider financials line up with that picture. OpenAI's 2025 numbers, as cited in the piece:

```text
Revenue        $13.07B
Costs          $34.0B
Net loss       $38.5B
Sales/marketing $5.73B   (44% of revenue)
```

## The capital math nobody wants to do

Subsidies are fine if there's a path to paying them back. Rosenthal walks through the brutal version: roughly **$3 trillion** in accumulated industry debt would need about **$309 billion a year** just to service at 3% over ten years.

To generate that as profit — even assuming a healthy 10% margin and AI costing the same as the human labor it replaces — the industry would need to **replace around 32.5 million jobs, roughly 27% of US employment**. Not augment. Replace, and capture the margin. That's the size of the hole the current valuations are betting on.

## Demand turned out to be price-sensitive

The most telling signal isn't a spreadsheet — it's behavior. As providers shifted toward token-based billing in mid-2026, the "use AI or die" mandates flipped to cost monitoring almost overnight:

- A small-company CEO reported spend jumped **7x on the first day** after switching to token-based pricing.
- A Fortune 200 company went from unrestricted access to requiring multiple approvals after the first shocking token bill.
- Microsoft reportedly paused internal Claude Code access to control AI costs.

When the real price showed up, demand pulled back fast. That's the affordability crisis in one sentence: **the product is loved at the subsidized price and contested at the real one.**

## The counter-argument: it's an ROI crisis, not an affordability one

The sharpest comment on HN pushed back on the framing. The objection: inference gets *cheaper* every year — model efficiency, open weights, and competition all push unit costs down. So the real problem isn't that AI is unaffordable. It's that the *value* isn't showing up on the bottom line.

"Generating code faster ≠ more profit." If a tool makes your engineers 20% faster but you ship the same roadmap with the same headcount, you've bought speed you didn't monetize. That's a **financial / ROI crisis**, and it's the company buying AI that has it — not the lab selling it.

Both things can be true: labs are underwater on unit economics *and* buyers are underwater on ROI. The two crises feed each other.

## Why the commoditizers matter

The release valve is competition. Chinese and open-weight models — DeepSeek, Qwen, MiniMax, GLM — keep dragging inference prices toward the floor. The more credible the cheap alternative, the harder it is for a premium lab to raise prices into a profit, and the weaker the lock-in story becomes.

That's the optimistic read for developers: even if the frontier labs are forced to raise prices, a "good enough" model running at a fraction of the cost caps how much pain you actually eat. Efficiency, not raw capability, may turn out to be the feature that wins the next phase.

## What I'm taking from it

I'm not calling a bubble top — Rosenthal himself notes the strange logic of three giants heading toward IPO pressure while burning capital, and how counterproductive a price war would be right before going public. But three things changed how I work after reading this:

1. **Treat current pricing as promotional.** The $200 plan that absorbs $8K of tokens is a launch subsidy, not a steady state. Build assuming the real cost lands on you eventually.
2. **Measure ROI, not output.** Faster code is not the win. Shipped roadmap, reduced headcount cost, or new revenue is the win. If you can't point at one, you're funding someone else's growth metric.
3. **Keep a cheap-model fallback wired in.** The commoditizers are your hedge against the day the subsidy ends. An abstraction layer that lets you swap to an open-weight model is cheap insurance.

The free lunch is real right now. It's just worth remembering that someone is paying for it — and the bill has your seat number on it for later.

---

*Sources: [AI's Affordability Crisis](https://blog.dshr.org/2026/06/ais-affordability-crisis.html) by David Rosenthal · [Hacker News discussion](https://news.ycombinator.com/item?id=48646276).*
