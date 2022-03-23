---
title: Rendering on the Web
date: 2022-03-23
tags:
  - performance
image: https://developers.google.com/web/updates/images/2019/02/rendering-on-the-web/infographic.png
comments: true
---
## Terminology

**Rendering**

* **SSR:** Server-Side Rendering - rendering a client-side or universal app to HTML on the server.
* **CSR:** Client-Side Rendering - rendering an app in a browser, generally using the DOM.
* **Rehydration:** “booting up” JavaScript views on the client such that they reuse the server-rendered HTML’s DOM tree and data.
* **Prerendering:** running a client-side application at build time to capture its initial state as static HTML.

**Performance**

* **TTFB:** Time to First Byte - seen as the time between clicking a link and the first bit of content coming in.
* **FP:** First Paint - the first time any pixel gets becomes visible to the user.
* **FCP:** First Contentful Paint - the time when requested content (article body, etc) becomes visible.
* **TTI:** Time To Interactive - the time at which a page becomes interactive (events wired up, etc).

Source: <https://developers.google.com/web/updates/2019/02/rendering-on-the-web>