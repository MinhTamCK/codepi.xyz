---
title: "React tip: useReducer is a better useState, and it's easier to adopt
  than you may think."
date: 2022-12-20
tags:
  - reactjs
image: https://i.ibb.co/xGNfr8y/image.png
comments: false
---
In the React hooks [docs](https://reactjs.org/docs/hooks-reference.html#usereducer), it’s noted like this:

> useReducer is usually preferable to useState when you have complex state logic that involves multiple sub-values or when the next state depends on the previous one. useReducer also lets you optimize performance for components that trigger deep updates because you can pass dispatch down instead of callbacks.