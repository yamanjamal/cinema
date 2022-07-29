<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [

            'permission_access',
            'permission_show',
            'permission_grant',
            'permission_revoke',

            'role_access',
            'role_show',
            'role_create',
            'role_edit',
            'role_delete',
            'role_grant',
            'role_revoke',

            'user_access',
            'user_count',
            'user_delete',


            'project_access',
            'project_show',
            'project_create',
            'project_edit',
            'project_delete',
            'project_search',
            'project_reserve',


            'requirment_show',
            'requirment_create',
            'requirment_edit',
            'requirment_delete',

            'srs_show',
            'srs_create',
            'srs_delete',

            'task_index',
            'task_search',
            'task_show',
            'task_create',
            'task_edit',
            'task_delete',
            // 'task_reserve',
            'task_done',
            'task_assign',
            'task_undone',


            'comment_create',
            'comment_delete',
            
        ];

        foreach ($permissions as $permission)   {
            Permission::create([
                'name' => $permission
            ]);
        }

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $Maneger = Role::create(['name' => 'Maneger']);

        // create permissions
        $permissions = [

            'permission_access',
            'permission_show',
            'permission_grant',
            'permission_revoke',

            'role_access',
            'role_show',
            'role_create',
            'role_edit',
            'role_delete',
            'role_grant',
            'role_revoke',

            'user_access',
            'user_count',
            'user_delete',

            'project_access',
            'project_show',
            'project_create',
            'project_edit',
            'project_delete',
            'project_search',
            'project_reserve',

            'requirment_show',
            'requirment_create',
            'requirment_edit',
            'requirment_delete',

            'srs_show',
            'srs_create',
            'srs_delete',

            'task_show',
            'task_create',
            'task_edit',
            'task_delete',
            // 'task_reserve',
            'task_done',
            'task_assign',
            'task_undone',

            'comment_create',
            'comment_delete',
            
        ];


        foreach ($permissions as $permission)   {
            $Maneger->givePermissionTo($permission);
        }

        $user1 = User::where('id' , 1)->first();
        $user1->assignRole('Maneger');

        $Po = Role::create(['name' => 'Po']);

        // create Po permissions
        $permissions = [
            'project_access',
            'project_show',
            'project_create',
            'project_edit',
            'project_delete',
            'project_search',
            'project_reserve',


            'requirment_show',
            'requirment_create',
            'requirment_edit',
            'requirment_delete',

            'srs_show',
            'srs_create',
            'srs_delete',


            'task_show',

            'comment_create',
            'comment_delete',
        ];


        foreach ($permissions as $permission)   {
            $Po->givePermissionTo($permission);
        }

        $TeamLeader = Role::create(['name' => 'TeamLeader']);

        // create TeamLeader permissions
        $permissions = [
            'project_access',
            'project_search',
            'project_show',
            'project_reserve',

            'requirment_show',

            'task_show',
            'task_create',
            'task_edit',
            'task_delete',
            // 'task_reserve',
            'task_assign',
            'task_undone',
            'task_done',

            'srs_show',

            'comment_create',
            'comment_delete',
        ];
        foreach ($permissions as $permission)   {
            $TeamLeader->givePermissionTo($permission);
        }


        $Developer = Role::create(['name' => 'Developer']);

        // create Developer permissions
        $permissions = [
            'project_access',
            'project_search',
            'project_show',

            'requirment_show',

            'task_show',
            // 'task_reserve',
            'task_done',
            
            'srs_show',

            'comment_create',
            'comment_delete',
        ];

        foreach ($permissions as $permission)   {
            $Developer->givePermissionTo($permission);
        }

        // $user = Role::create(['name' => 'User']);

        // foreach ($permissions as $permission)   {
        //     $Maneger->givePermissionTo($permission);
        // }

        // $user1 = User::where('id' , 1)->first();
        // $user1->assignRole('Super Admin');

        // foreach ($permissions as $permission)   {
        //     $user1->givePermissionTo($permission);
        // }


        // $userPermissions = [
        //     'ingredient_create',
        //     'meal_create',
        //     'meal_edit',
        //     'meal_show',
        //     'meal_delete',
        //     'meal_access',
        //     'comment_create',
        //     'comment_edit',
        //     'comment_show',
        //     'comment_delete',
        //     'comment_access',
        // ];

        // foreach ($userPermissions as $permission)   {
        //     $user->givePermissionTo($permission);
        // }
    }
}
