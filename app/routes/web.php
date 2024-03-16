<?php

app()->get('/', fn() => render('welcome'));


app()->group('app', function(){

    app()->get('home', 'App\HomeController@home');
    app()->get('start', fn() => render('app.start'));


    # Profile routes
    app()->group('profile', function(){

        app()->get('view', 'App\UserController@display');
        app()->post('update', 'App\UserController@update');
        app()->post('password/update', 'App\UserController@updatePassword');

    });
    

    app()->group('api', function(){

        app()->get('manage', 'App\ApiController@index');
        app()->get('activity/{id}', 'App\ApiController@activity');

        app()->post('copy', 'App\ApiController@copy');
        app()->post('create', 'App\ApiController@issueKey');  
        
    });


});
