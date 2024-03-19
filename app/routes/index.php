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
app()->set404(function() {
    $isApiRequest = strpos($_SERVER['REQUEST_URI'], '/api') !== false;
    if ($isApiRequest) {
        response()->json(['status' => 'error', 'message' => 'Page not found'], 404);
    } else {
        response()->page(ViewsPath("errors/404.html", false), 404);
    }
});

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
if(getenv('app_debug') == 'false'){
    app()->setErrorHandler(function() {
        $isApiRequest = strpos($_SERVER['REQUEST_URI'], '/api') !== false;
        if ($isApiRequest) {
            response()->json(['status' => 'error', 'message' => 'An error occurred'], 500);
        } else {
            response()->page(ViewsPath("errors/500.html", false), 500);
        }
    });
}

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
define('settings', new \App\Models\Setting);

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
require_files(
    getcwd().'/app/routes/web.php',
    getcwd().'/app/routes/api.php',
    getcwd().'/app/routes/auth.php'
);
