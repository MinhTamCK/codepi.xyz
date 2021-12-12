---
title: '07 - Formcarry Contact Form'
date: 2021-11-25
image: https://res.cloudinary.com/artisanstatic/contact.jpg
comments: false
---
Register on [Formcarry](https://formcarry.com/register).

Get your **Formcarry ID**, go to `config.php` and add your ID under the `services` key.

```php
<?php

return [
    // ...
    'services' => [
        'formcarry' => 'XXXXXXXXXXXX',
    ],
    // ...
];
```

Go to `source/_assets/js/contact.js` and change `fakeSend(contactForm)` to `send(contactForm)` in the lines shown below.

```js
e.preventDefault();
e.target.elements['submit'].disabled = true;

fakeSend(contactForm) // edit this line
    .then((response) => {
        notyf.success('Your message has been sent.');
        contactForm.reset();
    })
```

And finally, remove this line.

```js
const fakeSend = () => new Promise((resolve) => setTimeout(resolve, 2000));
```
