<?php

/*
|--------------------------------------------------------------------------
| Set up 404 handler
|--------------------------------------------------------------------------
|
| Leaf provides a default 404 page, but you can create your own
| 404 handler by uncommenting the code below. The function
| you set here will be called when a 404 error is encountered
|
*/
// app()->set404(function() {
// 	response()->page(ViewsPath("errors/404.html", false), 404);
// });

/*
|--------------------------------------------------------------------------
| Set up 500 handler
|--------------------------------------------------------------------------
|
| Leaf provides a default 500 page, but you can create your own
| 500 handler by uncommenting the code below. The function
| you set here will be called when a 500 error is encountered
|
*/
// app()->setErrorHandler(function() {
// 	response()->page(ViewsPath("errors/500.html", false), 500);
// });

/*
|--------------------------------------------------------------------------
| Load the Auth middleware
|--------------------------------------------------------------------------
|
| This loads the auth middleware. The auth middleware is used to
| protect routes from unauthenticated users.
|
*/
(new \App\Middleware\Auth)->init();

/*
|--------------------------------------------------------------------------
| Initialize Settings Model
|--------------------------------------------------------------------------
|
| This initializes the settings model. The settings model is used to
| get `settings` key-value pairs from the database.
|
*/
define('settings', new \App\Models\Settings);

/*
|--------------------------------------------------------------------------
| Set up Controller namespace
|--------------------------------------------------------------------------
|
| This allows you to directly use controller names instead of typing
| the controller namespace first.
|
*/
app()->setNamespace('\App\Controllers');

/*
|--------------------------------------------------------------------------
| Your application routes
|--------------------------------------------------------------------------
|
| Leaf MVC automatically loads all files in the routes folder that
| start with "_". We call these files route partials. An example
| partial has been created for you.
|
| If you want to manually load routes, you can
| create a file that doesn't start with "_" and manually require
| it here like so:
|
*/
require_once 'web.php';
require_once 'api.php';
require_once 'auth.php';
