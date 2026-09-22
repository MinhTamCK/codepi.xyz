---
title: "The Right Strategy Won’t Save Bad Operations"
date: 2026-09-22
image: https://codepi.xyz/assets/img/the-right-strategy-wont-save-bad-operations.jpg
comments: false
---

In 2005 a startup running its whole infrastructure on OpenSolaris decided to buy a lot of Sun hardware. This was the customer Sun's open-source strategy had been designed to create: a company that chose your operating system for free, built on it, and now wanted to pay you for the machines.

Sun didn't return the call. When someone finally did, they pitched the wrong products.

The startup filled in a web form on Dell's site at midnight. The next morning an account executive named Steve was on the phone. Two weeks later they had servers, a lease they liked, and the feeling that someone at the vendor actually wanted their business. They wrote it up under the title *The Sun Doesn't Shine on Me*.

That story is the spine of Bryan Cantrill's *What Sun got wrong*, written this weekend while his current company, Oxide, was printing homage t-shirts of the computer makers that came before it. Most people who read it argued about SPARC versus Opteron. That's the less interesting half.

## The sentence that explains it

Cantrill was a Sun engineer for years. He built DTrace there. He is not shy about what the company got right, and he says its strategy was sound. His diagnosis of what went wrong fits in one line:

> Sun had become bored with the mechanics of running a business.

Not the wrong bet. Not the wrong technology. Boredom with the parts of a company that aren't ideas: answering the phone, sending a quote, calling back, shipping on the date you said.

Read the 2005 story again with that line in mind. The strategy worked exactly as designed. It produced a customer who wanted to buy. Then the machine that was supposed to convert that want into revenue simply didn't run, because nobody at Sun found it interesting enough to keep running.

And the thing that beat them wasn't a better strategy. Dell had no operating system, no chip, no research lab, and no particular vision. Dell had Steve, and Steve called back.

## Why this failure mode is invisible from the inside

Strategy failures are loud. A product misses, a market moves, a competitor ships, and everyone can point at the chart. Operations failures are quiet. Nothing dramatic happens. A call goes unreturned, a quote takes three revisions, a customer buys used gear on eBay because it's faster than your sales process. One reader described doing exactly that.

Each incident is too small to escalate. Nobody writes a post-mortem about a phone call. So the people setting strategy never see the pattern, and they keep refining the strategy, which was never the problem.

Worse, a strong strategy actively hides bad operations. It keeps generating leads, goodwill, and press, which feels like momentum. The company reads its inbound as proof the plan is working, and it is. The plan is working. The plan is just feeding customers into a pipe with a hole in it.

Cantrill's line is that a company bored with running a business "cannot succeed, no matter how successful its strategy might otherwise be." The word doing the work is *cannot*. It's not a drag coefficient. It's a floor.

## The pattern is older than Sun

Once you have the shape, you see it everywhere.

The hardware startup with a genuinely better product whose customers churn because support tickets sit for a week. The open-source company whose community loves the code and whose enterprise buyers can't get a contract signed in under a quarter. The AI lab whose model tops the benchmarks and whose API goes down every time a competitor launches. In each case the strategy discussion is vigorous and the operations discussion is nonexistent, because operations is boring and strategy is what smart people like to talk about.

The same thing happens one level down, inside engineering. A team can have the right architecture and still lose to a team with a worse one that deploys ten times a day and answers pages in five minutes. We call that "execution," which is a polite word for the mechanics of running the thing.

And it happens at the scale of one person. A founder can hold the correct thesis about a market for years and still fail because they never built the habit of following up. Being right about where the world is going does not make the world come to you.

## What the essay leaves out

People who were at Sun, or bought from it, pushed back on the narrowness of the essay, and the pushback is worth keeping.

- **cryptonector**, a former Sun employee, listed the strategic mistakes Cantrill left out: cancelling Solaris x86, missing a Google deal in 2002, closing professional services, botching Active Directory integration. His summary line: "vendor lock-in sounds sweet but turns out to be poison."
- **mattbillenstein** and **adrian_b** made the hardware case. A single-threaded Pentium 4 already beat a SPARC workstation on real work, and the 2003 Opteron made Sun's boxes obsolete for most customers: cheaper, faster, and already running their software.
- **coreyh14444** and **sschueller** described the sales process itself: forced live meetings, endless quote revisions, opaque pricing. Then they noted that Dell today has drifted toward the same thing.

So the honest version is that Sun had strategic problems too. But notice that every one of these is a decision Sun could have reversed, and several of them it did reverse. What it never fixed was the thing Cantrill is pointing at. The right strategy was recoverable. The unreturned phone call was the culture.

## Read it with a clear head

- This is one former employee's account, told through one customer story. It is an argument, not a history.
- Cantrill has a stake in the moral. He co-founded Oxide with Steve, the Dell salesman from the story. The essay is partly a founding myth, and he says as much.
- The hardware argument is right that commodity x86 would have hurt Sun regardless. Operations didn't cause that. Operations decided whether Sun could survive it.
- "Boring" is doing some work here. Plenty of people at Sun cared deeply about customers. The claim is about what the company as a whole rewarded, not about individuals.

## The usable takeaway

> A strategy tells you which customers to create. Operations decides whether you keep them. Only one of these compounds in your favour when the other is broken, and it isn't strategy.

The practical version is uncomfortable because it sounds like advice for a much smaller company than you think you are. Return the call. Send the quote the same day. Pick up the pager. Measure how long a customer waits between wanting to pay you and being able to, and treat that number as seriously as your roadmap.

And when the strategy meeting runs long while the support queue grows, name what's happening. That's the moment Sun got bored.

The interesting decisions get the attention. The boring ones decide the outcome.

*Sources: [What Sun got wrong](https://bcantrill.dtrace.org/2026/09/20/what-sun-got-wrong/) by Bryan Cantrill · [discussion](https://news.ycombinator.com/item?id=49787436)*
