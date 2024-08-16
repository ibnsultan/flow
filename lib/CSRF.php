<?php

/*
|--------------------------------------------------------------------------
| Initalize CSRF
|--------------------------------------------------------------------------
|
| This initializes CSRF protection for your application.
| CSRF protection is important in preventing
| Cross Site Request Forgery attacks.
|
*/

Leaf\Anchor\CSRF::init();
Leaf\Anchor\CSRF::config([
    "EXCEPT" => [
        '/hook/{wild}'
    ]
]);