<?php

app()->get('/', fn() => render('welcome'));


# Application routes
app()->group('app', function(){

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


# Admin routes
app()->group('admin', function(){
    
    app()->get('', 'Admin\DashboardController@home');
    
    # Blog Routes
    app()->group('blog', function(){
        
        # articles routes
        app()->get('/', 'Admin\BlogController@index');
        app()->get('article/write', 'Admin\BlogController@writeArticle');

        app()->post('article/create', 'Admin\BlogController@createArticle');
        app()->post('article/update', 'Admin\BlogController@updateArticle');

        # article categories routes
        app()->get('categories', 'Admin\BlogController@categories');
        app()->get('categories/{id}/delete', 'Admin\BlogController@deleteCategory');

        app()->post('category/create', 'Admin\BlogController@createCategory');
        app()->post('category/update', 'Admin\BlogController@updateCategory');
        
    });
});
