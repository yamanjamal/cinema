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

            'price_access',
            'price_update',

            'movie_access',
            'movie_create',
            'movie_show',
            'movie_update',
            'movie_destroy',
            'movie_search',

            'user_access',
            'user_count',
            'user_deactivate',
            'user_activate',
            'user_search', 

            'profile_info',
            'profile_tickets',
            'profile_orders',
            'profile_edit',
            'profile_changepassword',


            'time_access',
            'time_create',
            'time_update',
            'time_deactivate',
            'time_activate',

            'ticket_create',
            'ticket_stepone',
            'ticket_steptwo',

            'invoice_access',

            'account_show',
            'account_update',
            'account_admin_update',

            'order_show',
            'order_create',
            'order_ordered',
            'order_approved',
            'order_approve',
            'order_received',

            'snack_access',
            'snack_show',
            'snack_create',
            'snack_update',
            'snack_deactivate',
            'snack_activate',
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

            'price_access',
            'price_update',

            'movie_access',
            'movie_create',
            'movie_show',
            'movie_update',
            'movie_destroy',
            'movie_search',

            'user_access',
            'user_count',
            'user_deactivate',
            'user_activate',
            'user_search', 

            'profile_info',
            'profile_tickets',
            'profile_orders',
            'profile_edit',
            'profile_changepassword',


            'time_access',
            'time_create',
            'time_update',
            'time_deactivate',
            'time_activate',

            'ticket_create',
            'ticket_stepone',
            'ticket_steptwo',

            'invoice_access',

            'account_show',
            'account_update',
            'account_admin_update',

            
            
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
            'movie_create',
            'movie_show',
            'movie_update',
            'movie_destroy',
            'movie_search',

            'profile_info',
            'profile_edit',
            'profile_changepassword',
        ];

        foreach ($permissions as $permission)   {
            $Reception->givePermissionTo($permission);
        }

        $user1 = User::where('id',2)->first();
        $user1->assignRole('Reception');

        $Vendor = Role::create(['name' => 'Vendor']);

        // create Vendor permissions
        $permissions = [
            'profile_info',
            'profile_edit',
            'profile_changepassword',

            'order_show',
            'order_create',
            'order_ordered',
            'order_approved',
            'order_approve',
            'order_received',

            'snack_access',
            'snack_show',
            'snack_update',
            'snack_create',
            'snack_deactivate',
            'snack_activate',
        ];

        foreach ($permissions as $permission)   {
            $Vendor->givePermissionTo($permission);
        }

        
        $user1 = User::where('id',3)->first();
        $user1->assignRole('Vendor');

        $Distributor = Role::create(['name' => 'Distributor']);

        // create Vendor permissions
        $permissions = [
            'profile_info',
            'profile_edit',
            'profile_changepassword',

            'account_show',
            'account_update',
        ];

        foreach ($permissions as $permission)   {
            $Distributor->givePermissionTo($permission);
        }

        $user1 = User::where('id',4)->first();
        $user1->assignRole('Distributor');

        $User = Role::create(['name' => 'User']);


        // create User permissions
        $permissions = [
            'price_access',

            'movie_show',

            'profile_info',
            'profile_tickets',
            'profile_orders',
            'profile_edit',
            'profile_changepassword',


            'ticket_create',
            'ticket_stepone',
            'ticket_steptwo',

            'invoice_access',

            'account_show',

            'order_show',
            'order_create',

            'snack_show',
        ];

        foreach ($permissions as $permission)   {
            $User->givePermissionTo($permission);
        }

        $user1 = User::where('id',5)->first();
        $user1->assignRole('User');
    }
}