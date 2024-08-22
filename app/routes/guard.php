<?php

use App\Models\Role;
$adminRoles = Role::admins();

/*
 |----------------------------------------------------------------------------------
 | The URI Access file
 |----------------------------------------------------------------------------------
 | This handles file access rule for each route
 |
 | @expression {int}    - Integer values
 | @expression {slug}   - Alphanumerical values
 | @expression {any}    - Every character except slashes (/)
 | @expression {wild}   - Every character including slashes
 */
return [

    'auth/login' => [ 'session' => false, 'access' => 'guest'],
    'auth/register' => [ 'session' => false, 'access' => 'guest'],
    
    'app' => [ 'session' => true, 'access' => 'all' ],
    'app/{wild}' => [ 'session' => true, 'access' => 'all' ],
    
    'admin' => [ 'session' => true, 'access' => $adminRoles ],
    'admin/{wild}' => [ 'session' => true, 'access' => $adminRoles ],
        
    'api/auth/{wild}' => [ 'session' => false, 'access' => 'guest' ],
    'api/{wild}' => [ 'session' =>true, 'access' => 'all' ],

    'hook{wild}' => [ 'session' => false, 'access' => 'all' ]
];