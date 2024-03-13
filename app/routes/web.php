<?php

app()->get('/', fn() => render('welcome'));


app()->group('app', function(){

    app()->get('home', 'App\HomeController@home');


    # Profile routes
    app()->group('profile', function(){

        app()->get('view', 'App\UserController@display');
        app()->get('edit', 'App\UserController@edit');

    });


});
