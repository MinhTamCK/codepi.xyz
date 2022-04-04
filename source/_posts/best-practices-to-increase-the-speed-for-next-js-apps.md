---
title: Best practices to increase the speed for Next.js apps
date: 2022-04-04
tags:
  - nextjs
  - performance
image: https://149351115.v2.pressablecdn.com/wp-content/uploads/2022/03/280322-Stack-Overflow-Best-practices-to-increase-the-speed-for-next.js-2048x1075.jpg
comments: false
---
Next.js is powerful yet simple framework, though developers still struggle to increase the speed of their applications. Here's how you can make those apps faster.

## Use server-side rendering

```
// This function will be called by the server
export async function getServerSideProps({context}) {
 
  // Fetch data from external API
  const data = await fetch(`URL_API`)

  // Returning the fetched data
  return { props: { data } }
}

function SSRPage({ data }) {
  // Displaying the data to the client
  return(
    <div>{data}</div>
  )
}

export default SSRPage
```

In the above example, whenever the user visits the SSR page, the `getServerSideProps()` function will be called by the server and will return the fully rendered static page.

## Use dynamic imports

```
import dynamic from 'next/dynamic'
import SimpleButton from '../components/Buttons'
const DynamicComponent = dynamic(() => import('../components/LoginButton'))

function Program() {
  return (
    <div>
      <SimpleButton />
      <DynamicComponent />
    </div>
  )
}

export default Program

```

In the above code, we are using the dynamic component provided by the framework to load our login button dynamically. You can pass a component name, an array of module names, and a function inside the component that will be invoked when the module is loaded.

## Cache frequently used content

Caching improves response times and reduces bandwidth usage by serving content from a cache instead of the original source. Next.js has built-in caching so pages load faster. To implement caching in your Next.js application, you can manually set the headers on any API routes that retrieve content and server-side rendered props to use `Cache-Control`. Below is the implementation for built-in caching.

```
// For API routes:

export default function handler(req, res) {
       res.setHeader('Cache-Control', 's-maxage=10'); 
}


// For server-side rendering:

export async function getServerSideProps({ req, res }) {
    res.setHeader(
      'Cache-Control',
      'public, s-maxage=10, stale-while-revalidate=59'
    )
    return {
        props: {},
    }
}

```

For static files and assets, you don’t have to manually add caching; Next.js automatically adds them.

## Remove unused dependencies

Use the [`depcheck`](https://www.npmjs.com/package/depcheck) package to find unused dependencies in your project (this package is included with npm).

I recommend that you remove dependencies one by one and restart your application after each removal to ensure that the dependency was truly not needed and that you didn’t break your application.

## Optimize images 

```
import Image from 'next/image'

function OptimizedImage() {
  return (
    <>
      <h1>Next.js Image</h1>
      <Image
        src={image_url}
        alt="Any Text"
        width={500}
        height={500}
        blurDataURL="URL"
        placeholder="blur"
      />
    </>
  )
}
export default OptimizedImage
```

**Lazy loading:**

Lazy loading is the process of loading a particular chunk of an app only when it is visible in the client viewport. By default, the `next/image` component lazy loads images, which will decrease the loading time. If you don’t want to lazy load an image, set `priority={true}` to turn it off.

**Placeholder images:**

Using the `next/image` component, you can add a blurred placeholder for any image using the `placeholder` prop.

**Preload images:**

If you have multiple images in a page, you can prioritize loading using the `next/image` component.

## Optimize your scripts

```
import Script from 'next/script'

export default function OptimizedScript() {
  return (
    <>
      <Script
        id="YOUR_ID"
        src="URL"
        onError={(err) => {
          console.error('Error', err)
        }}
        onLoad={() => {
          // Function to perform after loading the script
        }}
      />
    </>
  )
}
```

By setting the value of the `strategy` prop in the `next/script` component, you can use three different script loading approaches:

* **`afterInteractive`:** The script will be loaded on the client side after the page becomes interactive.
* **`beforeInteractive`:** The script will be loaded on the server side before self-bundled JavaScript is executed.
* **`lazyOnload`:** The script will be loaded after all other resources are loaded.

\
**source**: https://stackoverflow.blog/2022/03/30/best-practices-to-increase-the-speed-for-next-js-apps/