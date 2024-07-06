<?php

app()->group('admin', function(){
    
    app()->get('', 'Admin\DashboardController@home');
    
    # Blog Routes
    app()->group('blog', function(){
        
        # articles routes
        app()->get('/', 'Admin\BlogController@index');
        app()->get('article/write', 'Admin\BlogController@writeArticle');
        app()->get('article/edit/{id}', 'Admin\BlogController@viewArticle');
        app()->get('article/{id}/delete', 'Admin\BlogController@deleteArticle');

        app()->post('article/write', 'Admin\BlogController@createArticle');
        app()->post('article/update', 'Admin\BlogController@updateArticle');

        # article categories routes
        app()->get('categories', 'Admin\BlogController@categories');
        app()->get('categories/{id}/delete', 'Admin\BlogController@deleteCategory');

        app()->post('category/create', 'Admin\BlogController@createCategory');
        app()->post('category/update', 'Admin\BlogController@updateCategory');
        
    });


    # user management routes
    app()->group('users', function(){
        
        app()->get('{role}', 'Admin\UserController@index');

    });

    app()->group('user', function(){

        app()->get('/{id}', 'Admin\UserController@viewUser');
        app()->delete('/{id}', 'Admin\UserController@deleteUser');

        app()->post('update', 'Admin\UserController@updateUser');
        app()->post('create', 'Admin\UserController@createUser');

    });


    # settings routes
    app()->group('settings', function(){

        app()->get('seo', 'Admin\SettingController@seo');
        app()->get('general', 'Admin\SettingController@general');
        app()->get('modules', 'Admin\SettingController@modules');
        app()->get('translation', 'Admin\SettingController@translation');

        app()->post('seo', 'Admin\SettingController@updateSeo');
        app()->post('general', 'Admin\SettingController@updateGeneral');
        app()->post('modules', 'Admin\SettingController@updateModules');
        app()->post('translation', 'Admin\SettingController@updateTranslation');

    });

    # translation routes
    app()->group('translation', function(){

        app()->get('language/{id}', 'Admin\TranslationController@display');        

    });


    # pages routes
    app()->group('pages', function(){

        app()->get('/', 'Admin\PageController@index');
        app()->get('add', 'Admin\PageController@add');
        app()->get('edit/{id}', 'Admin\PageController@edit');
        app()->get('delete/{id}', 'Admin\PageController@delete');

        app()->post('add', 'Admin\PageController@addPage');
        app()->post('update/{id}', 'Admin\PageController@updatePage');

    });


    # announcement routes
    app()->group('announcement', function(){

        app()->get('/', 'Admin\AnnouncementController@index');
        app()->get('edit/{id}', 'Admin\AnnouncementController@edit');
        app()->get('delete/{id}', 'Admin\AnnouncementController@delete');

        app()->post('add', 'Admin\AnnouncementController@add');

    });

    # access control routes
    app()->group('access', function(){

        app()->get('roles', 'Admin\AccessController@roles');
        app()->get('modules', 'Admin\AccessController@modules');
        app()->get('permissions', 'Admin\AccessController@permissions');
        app()->get('roles/{id}', 'Admin\AccessController@viewRole');
        app()->get('permissions/list/{role}', 'Admin\AccessController@rolePermissions');

        app()->post('roles/add', 'Admin\AccessController@createRole');
        app()->post('permissions/add', 'Admin\AccessController@addPermission');
        app()->post('roles/permissions/update', 'Admin\AccessController@registerRolePermission');

        app()->post('roles/update', 'Admin\AccessController@updateRole');
        app()->post('modules/status', 'Admin\ModulesController@updateStatus');
        app()->post('permissions/update', 'Admin\AccessController@updatePermission');

        app()->delete('roles/{id}', 'Admin\AccessController@deleteRole');
        app()->delete('permissions/{id}', 'Admin\AccessController@deletePermission');

    });

    app()->get('script', function(){
        $content = file_get_contents(getcwd().'/public/assets/js/admin.js');
        response()->withHeader('Content-Type', 'application/javascript')->plain($content);
    });

});