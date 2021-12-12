# Artisan Static

[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://oss.ninja/mit/raniesantos)
[![Donate](https://img.shields.io/badge/$-donate-tomato.svg)](https://ko-fi.com/raniesantos)

A starter template for building a static Jigsaw blog hosted on Netlify.

This comes with code highlighting, share buttons, comments, analytics, an RSS feed, a contact form, a CMS and more.

The HTML, CSS and JavaScript in this template are extremely minimal, which makes the code easy to build on top of or replace completely.

**Demo:** https://artisanstatic.netlify.app

___
## General details and features

- Static site generator: [Jigsaw](http://jigsaw.tighten.co) (Laravel Blade templates)
- Hosting: [Netlify](https://www.netlify.com)
- CMS: [Netlify CMS](https://www.netlifycms.org)
- Image hosting: [Cloudinary](https://cloudinary.com)
- Contact form: [Formcarry](https://formcarry.com)
- Google Analytics
- Dynamic meta tags (SEO, Facebook Open Graph, Twitter Cards)
- Posts can have multiple tags
- Posts show a warning when potentially outdated (over 365 days old)
- Code highlighting: [highlight.js](https://github.com/highlightjs/highlight.js)
- Share buttons: [sharer.js](https://github.com/ellisonleao/sharer.js)
- Comments: [Disqus](https://disqus.com)

___
## Getting started

Use this deploy button to get your own copy of the repository.

[![Deploy to Netlify](https://www.netlify.com/img/deploy/button.svg)](https://app.netlify.com/start/deploy?repository=https://github.com/raniesantos/artisan-static&stack=cms)

This button will do the following:

- Connect to your GitHub account and create a new repository with the name you specify
- Deploy your copy of the repository and setup continuous deployment
- Send an invite to the email address associated with your Netlify account

Accept the invite, set your password, then navigate to `/admin` on your site to log in.

Now you're all set, and you can start customizing your static site!

___
## Local development

After using the deploy button above, clone **your copy** of the repository and run:

```shell
$ composer install
$ npm install
$ npm run watch
```

Your browser will open `localhost:3000` automatically.

___
## Configuration

The posts included in this template contain instructions on how to configure or implement some of its features.

When you use the 3rd-party services recommended by this template, make sure to read the docs of that specific service.

___
## License

Released under the [MIT License](https://oss.ninja/mit/raniesantos).
