<?php

app()->get('/', fn() => render('welcome'));


app()->group('app', function(){

    app()->get('home', 'App\HomeController@home');


    # Profile routes
    app()->group('profile', function(){

        app()->get('view', 'App\UserController@display');
        app()->post('update', 'App\UserController@update');
        app()->post('password/update', 'App\UserController@updatePassword');

    });
    

    app()->group('apiKey', function(){

        app()->get('view', 'App\ApiController@index');
        app()->post('create', 'App\ApiController@issueKey');    
        
    });


});
