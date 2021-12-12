---
title: '06 - Disqus Comments'
date: 2021-11-24
image: https://res.cloudinary.com/artisanstatic/conversation.jpg
comments: false
---
Register the website on [Disqus](https://disqus.com/profile/signup).

Get your **Disqus shortname**, go to `config.php` and add your shortname under the `services` key.

```php
<?php

return [
    // ...
    'services' => [
        'disqus' => 'artisanstatic',
    ],
    // ...
];
```

You can disable comments on individual posts by adding `comments: false` to the YAML front matter of their corresponding Markdown file.

```yaml
---
title: 'Blogging with Markdown'
date: 2018-02-16
comments: false
---
```
