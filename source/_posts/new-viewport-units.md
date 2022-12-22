---
title: New viewport units
date: 2022-12-22
tags:
  - css
image: https://web-dev.imgix.net/image/AeNB0cHNDkYPUYzDuv8gInYA9rY2/3ZKf0cQWs0eESL5WZzb0.png
comments: false
---
Difficulties dealing with viewport sizing are prominent in both the [MDN Browser Compatibility Report 2020](https://insights.developer.mozilla.org/reports/mdn-browser-compatibility-report-2020.html#findings-viewport) and the new [State of CSS 2021](https://2021.stateofcss.com/en-US/opinions/#browser_interoperability_features) survey. [CSS Values and Units Level 4](https://drafts.csswg.org/css-values-4/#viewport-relative-lengths) adds new units for the largest, smallest, and dynamic viewport sizes, `lv*`, `sv*`, and `dv*`. These units will make it easier to create layouts that fill the visible viewport on mobile devices while taking the address bar into account.

![viewport units](https://web-dev.imgix.net/image/RYmV5NPuMZRoF3PVwIXTUpdYeQ23/JUvvIgXen1zmHFH53CBS.png "viewport units")

Additionally, the cross vendor team behind Interop 2022 will collaborate on researching and improving the state of interoperability of existing viewport measurement features, including the existing `vh` unit.