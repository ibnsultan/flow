<?php
namespace App\Database\Seeds;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {

        Permission::truncate();

        $permissions = array(
            array( "name" => "create", "description" => NULL, "module_id" => 1, "is_primary" => 1, "scopes" => "['all', 'none']" ),
            array( "name" => "read", "description" => NULL, "module_id" => 1, "is_primary" => 1, "scopes" => "['all', 'owned', 'none']" ),
            array( "name" => "update", "description" => NULL, "module_id" => 1, "is_primary" => 1, "scopes" => "['all', 'owned', 'none']" ),
            array( "name" => "delete", "description" => NULL, "module_id" => 1, "is_primary" => 1, "scopes" => "['all', 'owned', 'none']" ),
            array( "name" => "modify_user_role", "description" => NULL, "module_id" => 1, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "update_user_permissions", "description" => NULL, "module_id" => 1, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "update_general_settings", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "update_seo_settings", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "update_translation_settings", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "update_language_settings", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "add_user_role", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "edit_user_role", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "add_permission", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "view_permissions", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "view_role_permissions", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "edit_role_permissions", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "add_announcements", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "delete_announcements", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "view_roles", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "view_modules", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "add_module", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "edit_module", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "view_announcements", "description" => NULL, "module_id" => 2, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "create", "description" => NULL, "module_id" => 3, "is_primary" => 1, "scopes" => "['all', 'none']" ),
            array( "name" => "read", "description" => NULL, "module_id" => 3, "is_primary" => 1, "scopes" => "['all', 'owned', 'none']" ),
            array( "name" => "update", "description" => NULL, "module_id" => 3, "is_primary" => 1, "scopes" => "['all', 'owned', 'none']" ),
            array( "name" => "delete", "description" => NULL, "module_id" => 3, "is_primary" => 1, "scopes" => "['all', 'owned', 'none']" ),
            array( "name" => "create_blog_categories", "description" => NULL, "module_id" => 3, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "view_blog_categories", "description" => NULL, "module_id" => 3, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "update_blog_categories", "description" => NULL, "module_id" => 3, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "delete_blog_categories", "description" => NULL, "module_id" => 3, "is_primary" => 0, "scopes" => "['all', 'none']" ),
            array( "name" => "create", "description" => NULL, "module_id" => 4, "is_primary" => 1, "scopes" => "['all', 'none']" ),
            array( "name" => "read", "description" => NULL, "module_id" => 4, "is_primary" => 1, "scopes" => "['all', 'owned', 'none']" ),
            array( "name" => "update", "description" => NULL, "module_id" => 4, "is_primary" => 1, "scopes" => "['all', 'owned', 'none']" ),
            array( "name" => "delete", "description" => NULL, "module_id" => 4, "is_primary" => 1, "scopes" => "['all', 'none']" ),
            array( "name" => "create", "description" => NULL, "module_id" => 5, "is_primary" => 1, "scopes" => "['all', 'none']" ),
            array( "name" => "read", "description" => NULL, "module_id" => 5, "is_primary" => 1, "scopes" => "['all', 'owned', 'none']" ),
            array( "name" => "update", "description" => NULL, "module_id" => 5, "is_primary" => 1, "scopes" => "['all', 'owned', 'none']" ),
            array( "name" => "delete", "description" => NULL, "module_id" => 5, "is_primary" => 1, "scopes" => "['all', 'none']" ),
        );
        

        foreach($permissions as $permission) {
            Permission::create($permission);
        }
        
    }
}
