---
title: '08 - Google Analytics'
date: 2021-11-26
image: https://res.cloudinary.com/artisanstatic/analytics.jpg
comments: false
---
Register the website on [Google Analytics](https://analytics.google.com/analytics/web).

Get your **tracking ID**, go to `config.php` and add your ID under the `services` key.

```php
<?php

return [
    // ...
    'services' => [
        'analytics' => 'UA-XXXXX-Y',
    ],
    // ...
];
```

You can set your tracking ID to an empty string if you want to disable analytics without completely removing the related code.

```
'analytics' => '',
```

The master template is designed to only include analytics in production. This is to avoid tracking page views while you are developing the site.
