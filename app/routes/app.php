<?php

app()->group('app', ['namespace' => '\App\Controllers\App', function(){

    app()->get('home', 'HomeController@home');
    app()->get('start', 'HomeController@start');


    # Profile routes
    app()->group('profile', function(){
        app()->get('view', 'UserController@display');
        app()->post('update', 'UserController@update');
        app()->post('password/update', 'UserController@updatePassword');
    });
    

    # API routes
    app()->group('api', function(){
        app()->get('manage', 'ApiController@index');
        app()->get('activity/{id}', 'ApiController@activity');

        app()->delete('manage/{id}', 'ApiController@revokeKey');

        app()->post('copy', 'ApiController@copy');
        app()->post('create', 'ApiController@issueKey');      
    });


    # Blog routes
    app()->group('blog', function(){
        app()->get('/', 'BlogController@index');
        app()->get('article/{id}', 'BlogController@article');
        app()->get('category/{id}', 'BlogController@category');
    });

    app()->group('media', function(){
        app()->post('upload', 'MediaController@upload');
    });

}]);