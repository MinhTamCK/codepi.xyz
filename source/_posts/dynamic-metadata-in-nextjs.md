---
title: Dynamic metadata in nextjs
date: 2024-06-27
image: https://nextjs.org/api/docs-og?title=Functions:%20generateMetadata
comments: false
---
```
// use for somewhere need
import { cache } from "react";

export const getPost = cache(() => {
    console.log("called getPost()");
    return "post";
});

// use in page
import { Metadata } from "next";

export function generateMetadata(): Metadata {
    const posts = getPost();

    return {
        title: "title",
    };
}

const Page = async () => {
    const posts = getPost();

    return <article>{"article"}</article>;
};

export default Page;
```