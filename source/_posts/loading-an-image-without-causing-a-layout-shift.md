---
title: Loading an image without causing a layout shift
date: 2022-12-21
tags: []
image: https://web-dev.imgix.net/image/RYmV5NPuMZRoF3PVwIXTUpdYeQ23/xv75zUKa4jUR2xGMZ7Xb.jpg
comments: false
---
Loading an image without causing a [layout shift](https://web.dev/cls/), correctly maintaining the aspect ratio, and not degrading initial page load performance due to image size/weight was difficult to implement with support across all major browsers. This led to developers either ignoring the issues, or the frameworks writing component abstractions that produced code like:

```
<span> <-- needed to maintain aspect ratio
  <span> <-- needed to maintain aspect ratio, CSS padding hacks
    <img src="" style="" /> <-- inline styles to prevent layout shift
    <noscript>...</noscript> <-- JS needed for IntersectionObserver
  </span>
</span>
```

It’s a different story in 2022. There’s cross-browser support for: `aspect-ratio`, [width/height attributes](https://web.dev/optimize-cls/) to prevent layout shift, native [image lazy-loading](https://developer.mozilla.org/en-US/docs/Web/Performance/Lazy_loading), and pure CSS/SVG-based blur-up image placeholders. The above code can drop the wrapping elements and work without runtime JavaScript needed.

```
<img
  alt="A kitten"
  decoding="async"
  height="200"
  loading="lazy"
  src="https://placekitten.com/200/200"
  style="aspect-ratio: auto 1 / 1"
  width="200"
/>
```