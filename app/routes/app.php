<?php

app()->group('app', function(){

    app()->get('compact', fn() => render('app.compact'));

    app()->get('home', 'App\HomeController@home');
    app()->get('start', fn() => render('app.start'));


    # Profile routes
    app()->group('profile', function(){

        app()->get('view', 'App\UserController@display');
        app()->post('update', 'App\UserController@update');
        app()->post('password/update', 'App\UserController@updatePassword');

    });
    

    # API routes
    app()->group('api', function(){

        app()->get('manage', 'App\ApiController@index');
        app()->get('activity/{id}', 'App\ApiController@activity');

        app()->delete('manage/{id}', 'App\ApiController@revokeKey');

        app()->post('copy', 'App\ApiController@copy');
        app()->post('create', 'App\ApiController@issueKey');  
        
    });


    # Blog routes
    app()->group('blog', function(){

        app()->get('/', 'App\BlogController@index');
        app()->get('article/{id}', 'App\BlogController@article');
        app()->get('category/{id}', 'App\BlogController@category');

    });

    app()->group('media', function(){

        app()->post('upload', 'MediaController@upload');

    });


});