<?php

use App\Controllers\AuthController;

app()->redirect('/login', '/auth/login');
app()->redirect('/reset', '/auth/reset');
app()->redirect('/register', '/auth/register');

app()->group('auth', function(){

    app()->get('/login', 'AuthController@signin');
    app()->get('/reset', 'AuthController@forgot');
    app()->get('/register', 'AuthController@signup');

    app()->post('/login', 'AuthController@login');
    app()->post('/reset', 'AuthController@reset');
    app()->post('/register', 'AuthController@register');

    app()->get('/password/{token}', 'AuthController@changePassword');
    app()->post('/password/{token}', 'AuthController@updatePassword');

    app()->get('/logout', 'AuthController@logout');

});

app()->group('api', function(){

    app()->group('/auth', function(){

        app()->post('/login', fn() => AuthController::login(true));

    });

});