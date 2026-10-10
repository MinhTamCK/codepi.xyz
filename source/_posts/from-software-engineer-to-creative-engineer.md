---
title: "From Software Engineer to Creative Engineer"
date: 2026-10-10
image: https://codepi.xyz/assets/img/from-software-engineer-to-creative-engineer.jpg
comments: false
---

There's a job title I keep seeing on X that didn't exist in my feed a year ago: **Creative Engineer**. One posting from an Indonesian ad shop lists the requirements: Veo, Seedance, Kling, Sora. Prompting and iteration. Character consistency across shots. Lip-sync. *"Build workflow and prompt library."* There isn't a word about React or system design, or anything else I spent ten years getting good at. I read it twice and realized I'd been doing that job for months without the title.

## The product moved

A software engineer turns a spec into a system that does exactly what it was told. Same input, same output. That's the whole promise, and the entire craft (types, tests, CI) exists to protect it.

A creative engineer builds something stranger: a system that **reliably produces things that aren't deterministic**. Images, video, 3D models, copy. You never get the same output twice, and it's the output, not the code, that has to be good.

Someone on X put the economics bluntly: *a creative strategist needs five humans and $50k a month; a creative engineer needs one operator.* That's a little too neat, but the direction is right. The team that used to make every asset by hand is being replaced by one person who builds the machine that makes the assets and decides which ones ship.

## What carried over

More than I expected. Most of my engineering instincts transferred directly. They just had to point at a different target.

- **Tests became judges.** In the math videos I make for my daughter, a line of narration doesn't ship until a second model has listened to it and typed back what it heard. If the transcript doesn't match the script, the line gets recorded again. It's still an assertion, just a fuzzy one. The judge has its own failure modes (mine hears a Southern accent as a mispronunciation), and it needs versioning, same as any test suite.
- **Bug reports became a lessons file.** Every time I reject an output, the reason gets written down, and the next session reads those notes before it makes anything. That's a regression suite for taste.
- **Code stayed code.** Those videos are video *as code*: every frame is drawn by a script, so they're diffable and reproducible. Change one number and you get a variant, like a vertical cut of the same scenes. That's a developer's advantage most designers don't have.
- **Pipelines stayed pipelines.** Retries, timeouts, idempotency, alerting on silent failures. Most of the bugs in my creative pipelines have been plain reliability bugs: a step that timed out and quietly wrote an empty file, or a retry that never fired. None of them had anything to do with creativity.

## What didn't

**You can't unit-test "does this look good."** You can approximate it with a judge, but at some point a human has to look. The skill is knowing *where* to put that human so they review ten things a day instead of a thousand.

**Sometimes the right move is not to generate at all.** In those math videos, the voice and the music come from models, but no image or video model touches the picture. A math lesson can't have a digit that drifts or an accent mark that comes out wrong, and better prompts wouldn't guarantee that. Drawing every frame in code does. A software engineer keeps debugging, but a creative engineer has to notice when generation is the wrong tool and step back.

**Taste stopped being optional.** In normal software, "works" and "good" overlap a lot. In creative work they don't. A render can be technically flawless and still look like a stock photo. I [wrote before](https://codepi.xyz/posts/taste-you-have-to-eat/) that taste is a filter you build by consuming a lot, and this is where that filter goes to work every day.

## The stack looks different now

When I sketch one of these systems, it has four parts, and only one of them is a model that makes things:

- **Generators.** Image, video, 3D and text models. These are the most swappable part, because a better one ships every month.
- **Judges.** Cheap models that score, compare and gate. This is where most of the engineering goes.
- **Memory.** References, style guides, the lessons file. It's what makes run #50 better than run #1.
- **A human checkpoint.** It goes wherever the judge isn't trustworthy yet.

<figure class="dg-figure">
<style>
.dg-figure { margin: var(--s-5, 48px) 0; }
.dg-figure .dg-scroll { overflow-x: auto; }
.dg-figure svg { display: block; width: 100%; min-width: 600px; height: auto; }
.dg-figure figcaption { margin-top: var(--s-3, 16px); font-family: var(--font-sans); font-size: 0.8125rem; line-height: 1.5; color: var(--text-muted); }
.dg-ce .ce-box { fill: var(--bg-elev, #f2f0eb); stroke: var(--text-faint, #a3a3a3); stroke-width: 1; }
.dg-ce .ce-box.is-judge { stroke: var(--accent, #b8472a); stroke-width: 1.5; }
.dg-ce .ce-name { fill: var(--text, #1a1a1a); font: 600 14px var(--font-sans); text-anchor: middle; }
.dg-ce .ce-name.is-judge { fill: var(--accent, #b8472a); }
.dg-ce .ce-sub { fill: var(--text-muted, #6b6b6b); font: 400 11.5px var(--font-sans); text-anchor: middle; }
.dg-ce .ce-edge { fill: none; stroke: var(--text-muted, #6b6b6b); stroke-width: 1.25; }
.dg-ce .ce-edge.is-loop { stroke: var(--accent, #b8472a); stroke-dasharray: 5 4; }
.dg-ce .ce-label { fill: var(--text-muted, #6b6b6b); font: 400 11.5px var(--font-sans); }
.dg-ce .ce-label.is-mid { text-anchor: middle; }
.dg-ce .ce-label.is-loop { fill: var(--accent, #b8472a); }
.dg-ce .ce-head { fill: var(--text-muted, #6b6b6b); }
.dg-ce .ce-head.is-loop { fill: var(--accent, #b8472a); }
</style>
<div class="dg-scroll">
<svg class="dg-ce" viewBox="0 0 760 290" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="ce-stack-title ce-stack-desc">
<title id="ce-stack-title">The four parts of a creative pipeline</title>
<desc id="ce-stack-desc">Only the generator makes anything. The judge decides what ships, sends unsure outputs to a human, and turns every rejection into a written reason that the next run reads from memory.</desc>
<defs>
<marker id="ce-arrow" viewBox="0 0 10 10" refX="9" refY="5" markerWidth="7" markerHeight="7" orient="auto-start-reverse"><path class="ce-head" d="M0 0 L10 5 L0 10 z"/></marker>
<marker id="ce-arrow-loop" viewBox="0 0 10 10" refX="9" refY="5" markerWidth="7" markerHeight="7" orient="auto-start-reverse"><path class="ce-head is-loop" d="M0 0 L10 5 L0 10 z"/></marker>
</defs>
<!-- Boxes: top row centred on y=68. -->
<rect class="ce-box" x="20" y="40" width="140" height="56" rx="6"/>
<text class="ce-name" x="90" y="64">Memory</text><text class="ce-sub" x="90" y="82">refs · lessons file</text>
<rect class="ce-box" x="220" y="40" width="140" height="56" rx="6"/>
<text class="ce-name" x="290" y="64">Generator</text><text class="ce-sub" x="290" y="82">image · video · 3D</text>
<rect class="ce-box is-judge" x="420" y="40" width="140" height="56" rx="6"/>
<text class="ce-name is-judge" x="490" y="64">Judge</text><text class="ce-sub" x="490" y="82">cheap model + rubric</text>
<rect class="ce-box" x="630" y="40" width="110" height="56" rx="6"/>
<text class="ce-name" x="685" y="73">Ship</text>
<rect class="ce-box" x="630" y="160" width="110" height="56" rx="6"/>
<text class="ce-name" x="685" y="184">Human</text><text class="ce-sub" x="685" y="202">10 a day, not 1,000</text>
<!-- Forward path. -->
<line class="ce-edge" x1="160" y1="68" x2="218" y2="68" marker-end="url(#ce-arrow)"/>
<text class="ce-label is-mid" x="189" y="58">reads</text>
<line class="ce-edge" x1="360" y1="68" x2="418" y2="68" marker-end="url(#ce-arrow)"/>
<text class="ce-label is-mid" x="389" y="58">output</text>
<line class="ce-edge" x1="560" y1="68" x2="628" y2="68" marker-end="url(#ce-arrow)"/>
<text class="ce-label is-mid" x="594" y="58">pass</text>
<path class="ce-edge" d="M530 96 V188 H628" marker-end="url(#ce-arrow)"/>
<text class="ce-label" x="538" y="150">unsure</text>
<line class="ce-edge" x1="685" y1="160" x2="685" y2="98" marker-end="url(#ce-arrow)"/>
<text class="ce-label" x="693" y="133">approve</text>
<!-- Rejection loop back into memory. -->
<path class="ce-edge is-loop" d="M470 96 V256"/>
<path class="ce-edge is-loop" d="M685 216 V256 H90 V98" marker-end="url(#ce-arrow-loop)"/>
<text class="ce-label is-mid is-loop" x="290" y="276">reject + written reason → next run reads it</text>
</svg>
</div>
<figcaption>Only one box makes anything. The rest decide what ships, and every rejection becomes a written lesson the next run starts from.</figcaption>
</figure>

The best public example I've seen came from a creative engineer at fal. They fine-tuned a video model on 335 clips to generate scenes for an interactive murder mystery. The detail that stuck with me: the step count mattered less than the **captions**. Explicitly describing the matte toon style and each area of the set is what held the look together. That's a data-labeling problem dressed up as a creative one, and data problems are exactly what engineers are good at.

## If you're a software engineer thinking about this

- **Pick an output you can actually judge.** Not "AI art" in general. Choose one domain where you already have opinions: product photos, 3D prints, UI mockups, short videos.
- **Build the judge before the generator.** Generation is the easy part. Anyone can call an API. Being able to tell a good output from a bad one automatically is the part that compounds.
- **Keep a lessons file from day one.** Every rejection gets a written reason. After a month, that file is worth more than any prompt.
- **Ship to real eyes.** A pipeline that only you look at drifts toward your blind spots.

The title is new. The discipline underneath it isn't. You still build systems, test them, watch them fail and fix them. What changed is what counts as correct.

*A software engineer makes the machine do what you said. A creative engineer makes it make what you meant.*

*Cover generated with an image model, then picked from six candidates by eye.*
