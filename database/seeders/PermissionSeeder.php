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
            'role_access',
            'role_show',
            'role_create',
            'role_edit',
            'role_delete',
            'role_grant',
            'role_revoke',

            'permission_access',
            'permission_show',
            'permission_grant',
            'permission_revoke',


            'hall_access',
            'hall_create',
            'hall_search',

            'movie_access',
            'movie_nowshowing',
            'movie_showuser',
            'movie_create',
            'movie_show',
            'movie_update',
            'movie_delete',
            'movie_search',

            'user_info',
            'user_access',
            'user_create',
            'user_show',
            'user_update',
            'user_updatepassword',
            'user_deactivate',
            'user_activate',
            'user_search',

            'order_access',
            'order_create',
            'order_show',
            'order_update',
            //'order_destroy',
            //'order_search',
            
            'price_update',

            'account_transfer',

            'snack_access',
            'snack_accessuser',
            'snack_create',
            'snack_show',
            'snack_update',
            'snack_deactivate',
            'snack_activate',

            'time_access',
            'time_create',
            'time_show',
            'time_update',
            'time_deactivate',
            'time_activate',

            'ticket_mytickets',
            'ticket_create',
            'ticket_steptwo',
            'ticket_search',
        ];

        foreach ($permissions as $permission)   {
            Permission::create([
                'name' => $permission
            ]);
        }

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $admin = Role::create(['name' => 'Admin']);

        // create permissions
        $permissions = [
            'role_access',
            'role_show',
            'role_create',
            'role_edit',
            'role_delete',
            'role_grant',
            'role_revoke',

            'permission_access',
            'permission_show',
            'permission_grant',
            'permission_revoke',
            
            'hall_access',
            'hall_create',
            'hall_search',

            'movie_access',
            'movie_nowshowing',
            'movie_showuser',
            'movie_create',
            'movie_show',
            'movie_update',
            'movie_delete',
            'movie_search',

            'user_info',
            'user_access',
            'user_create',
            'user_show',
            'user_update',
            'user_updatepassword',
            'user_deactivate',
            'user_activate',
            'user_search',

            'price_update',

            'time_access',
            'time_create',
            'time_show',
            'time_update',
            'time_deactivate',
            'time_activate',

            'ticket_mytickets',
            'ticket_create',
            'ticket_steptwo',
            'ticket_search',
        ];

        foreach ($permissions as $permission)   {
            $admin->givePermissionTo($permission);
        }

        $user1 = User::where('id',1)->first();
        $user1->assignRole('Admin');

        $Reception = Role::create(['name' => 'Reception']);

        // create Reception permissions
        $permissions = [
            'movie_access',
            'movie_nowshowing',
            'movie_showuser',
            'movie_create',
            'movie_show',
            'movie_update',
            'movie_delete',
            'movie_search',
            'user_info',
            'user_update',
            'user_updatepassword',
        ];

        foreach ($permissions as $permission)   {
            $Reception->givePermissionTo($permission);
        }

        $Vendor = Role::create(['name' => 'Vendor']);

        // create Vendor permissions
        $permissions = [
            'user_info',
            'user_update',
            'user_updatepassword',

            'order_access',
            // 'order_myorder',
            'order_create',
            'order_show',
            'order_update',
            //'order_destroy',
            //'order_search',

            'snack_access',
            'snack_accessuser',
            'snack_create',
            'snack_show',
            'snack_update',
            'snack_deactivate',
            'snack_activate',
        ];

        foreach ($permissions as $permission)   {
            $Vendor->givePermissionTo($permission);
        }

        $Distributor = Role::create(['name' => 'Distributor']);

        // create Vendor permissions
        $permissions = [
            'user_info',
            'user_update',
            'user_updatepassword',
            'account_transfer'
        ];

        foreach ($permissions as $permission)   {
            $Distributor->givePermissionTo($permission);
        }


        $User = Role::create(['name' => 'User']);

        // create User permissions
        $permissions = [
            'user_info',
            'user_update',
            'user_updatepassword',

            'ticket_mytickets',
            'ticket_create',
            'ticket_steptwo',
            'ticket_search',

            // 'order_myorder',
            'order_create',
            'order_show',
            'order_update',
            //'order_destroy',
            //'order_search',

            'snack_accessuser',
        ];

        foreach ($permissions as $permission)   {
            $User->givePermissionTo($permission);
        }
    }
}