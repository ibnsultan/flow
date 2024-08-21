<?php

app()->group('app', ['namespace' => '\App\Controllers\App', function(){

    app()->get('home', 'HomeController@home');
    app()->get('start', 'HomeController@start');


    # Profile routes
    app()->group('profile', function(){
        app()->get('view', ['name'=>'my.profile', 'UserController@display']);
        app()->post('update', ['name'=>'update.my-profile', 'UserController@update']);
        app()->post('password/update', ['name'=>'update.my-password', 'UserController@updatePassword']);
    });
    

    # API routes
    app()->group('api', function(){
        app()->get('manage', ['name'=>'api.manage', 'ApiController@index']);
        app()->get('activity/{id}', ['name'=>'api.activity', 'ApiController@activity']);

        app()->post('copy', ['name'=>'api.fetch', 'ApiController@copy']);
        app()->post('create', ['name'=>'api.create', 'ApiController@issueKey']);  

        app()->delete('manage/{id}', ['name'=>'api.delete', 'ApiController@revokeKey']);    
    });

}]);