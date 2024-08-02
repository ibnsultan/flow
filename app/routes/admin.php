<?php

app()->group('admin', ['namespace' => '\App\Controllers\Admin', function(){
    
    app()->get('', 'DashboardController@home');
    
    # Blog Routes
    app()->group('blog', function(){
        
        # articles routes
        app()->get('/', 'BlogController@index');
        app()->get('article/write', 'BlogController@writeArticle');
        app()->get('article/edit/{id}', 'BlogController@viewArticle');
        app()->get('article/{id}/delete', 'BlogController@deleteArticle');

        app()->post('article/write', 'BlogController@createArticle');
        app()->post('article/update', 'BlogController@updateArticle');

        # article categories routes
        app()->get('categories', 'BlogController@categories');
        app()->get('categories/{id}/delete', 'BlogController@deleteCategory');

        app()->post('category/create', 'BlogController@createCategory');
        app()->post('category/update', 'BlogController@updateCategory');    
    });


    # user management routes
    app()->group('users', function(){
        app()->get('{role}', 'UserController@index');
    });

    app()->group('user', function(){
        app()->get('/{id}', 'UserController@viewUser');
        app()->delete('/{id}', 'UserController@deleteUser');

        app()->post('update', 'UserController@updateUser');
        app()->post('create', 'UserController@createUser');
    });


    # settings routes
    app()->group('settings', function(){
        app()->get('seo', 'SettingController@seo');
        app()->get('general', 'SettingController@general');
        app()->get('modules', 'SettingController@modules');
        app()->get('translation', 'SettingController@translation');

        app()->post('seo', 'SettingController@updateSeo');
        app()->post('general', 'SettingController@updateGeneral');
        app()->post('modules', 'SettingController@updateModules');
        app()->post('translation', 'SettingController@updateTranslation');
    });

    # translation routes
    app()->group('translation', function(){
        app()->get('language/{id}', 'TranslationController@display');
    });


    # pages routes
    app()->group('pages', function(){
        app()->get('/', 'PageController@index');
        app()->get('add', 'PageController@add');
        app()->get('edit/{id}', 'PageController@edit');
        app()->get('delete/{id}', 'PageController@delete');

        app()->post('add', 'PageController@addPage');
        app()->post('update/{id}', 'PageController@updatePage');
    });


    # announcement routes
    app()->group('announcement', function(){
        app()->get('/', 'AnnouncementController@index');
        app()->get('edit/{id}', 'AnnouncementController@edit');
        app()->get('delete/{id}', 'AnnouncementController@delete');

        app()->post('add', 'AnnouncementController@add');
    });

    # access control routes
    app()->group('access', function(){
        app()->get('modules', 'ModulesController@index');
        app()->get('permissions', 'AccessController@permissions');
        app()->get('roles/{id}', 'AccessController@viewRole');
        app()->get('permissions/list/{role}', 'AccessController@rolePermissions');

        app()->post('roles/add', 'AccessController@createRole');
        app()->post('modules/add', 'ModulesController@createModule');
        app()->post('permissions/add', 'AccessController@addPermission');
        app()->post('roles/permissions/update', 'AccessController@registerRolePermission');

        app()->post('roles/update', 'AccessController@updateRole');
        app()->post('modules/status', 'ModulesController@updateStatus');
        app()->post('permissions/update', 'AccessController@updatePermission');

        app()->delete('roles/{id}', 'AccessController@deleteRole');
        app()->delete('permissions/{id}', 'AccessController@deletePermission');
    });

    app()->get('script', function(){
        $content = file_get_contents(getcwd().'/public/assets/js/admin.js');
        response()->withHeader('Content-Type', 'application/javascript')->plain($content);
    });

}]);