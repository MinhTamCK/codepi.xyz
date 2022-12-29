---
title: Can a web server provide real-time updates?
date: 2022-12-29
image: https://pbs.twimg.com/media/FlFEnvpaMAUncs6?format=jpg&name=4096x4096
comments: true
---
An HTTP server cannot automatically initiate a connection to a browser. As a result, the web browser is the initiator. What should we do next to get real-time updates from the HTTP server

Both the web browser and the HTTP server could be responsible for this task.

Web browsers do the heavy lifting: short polling or long polling. With short polling, the browser will retry until it gets the latest data. With long polling, the HTTP server doesn’t return results until new data has arrived.

HTTP server and web browser cooperate: WebSocket or SSE (server-sent event). In botOver to you: of the **4 solutions (long polling, short polling, SSE, WebSocket),** which ones are commonly used, for what use cases?h cases, the HTTP server could directly send the latest data to the browser after the connection is established.

The difference is that SSE is uni-directional so the browser cannot send new request to server, while WebSocket is fully-duplex so the browser could keep sending new requests

F﻿rom: [Alex Xu](https://twitter.com/alexxubyte)