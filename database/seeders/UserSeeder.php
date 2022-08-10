<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '0962144639',
            'email_verified_at' => now(),
            'id_img'=>'img/5.jpg',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        // $admin->assignRole('Admin');

        $reseption = User::create([
            'name' => 'reseption',
            'email' => 'reseption@reseption.com',
            'phone' => '0959374880',
            'email_verified_at' => now(),
            'id_img'=>'img/10.jpg',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        // $reseption->assignRole('Reseption');

        $vendor = User::create([
            'name' => 'vendor',
            'email' => 'vendor@vendor.com',
            'phone' => '0988025806',
            'email_verified_at' => now(),
            'id_img'=>'img/9.jpg',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        // $vendor->assignRole('Vendor');
    }
}
