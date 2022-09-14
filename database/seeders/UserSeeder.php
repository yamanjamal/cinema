<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Seeder;
use Str;

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
            'id_img'=>'upload/Imgs/5.jpg',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $account = Account::create([
            'code'     => Str::random(6),
            'user_id'     => $admin->id,
            'points'     => 10000000.0,
        ]);

        $reseption = User::create([
            'name' => 'reseption',
            'email' => 'reseption@reseption.com',
            'phone' => '0959374880',
            'email_verified_at' => now(),
            'id_img'=>'upload/Imgs/10.jpg',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $account = Account::create([
            'code'     => Str::random(6),
            'user_id'     => $reseption->id,
            'points'     => 0.00,
        ]);

        $vendor = User::create([
            'name' => 'vendor',
            'email' => 'vendor@vendor.com',
            'phone' => '0988025804',
            'email_verified_at' => now(),
            'id_img'=>'upload/Imgs/9.jpg',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $account = Account::create([
            'code'     => Str::random(6),
            'user_id'     => $vendor->id,
            'points'     => 0.00,
        ]);

        $distributor = User::create([
            'name' => 'distributor',
            'email' => 'distributor@distributor.com',
            'phone' => '0988025806',
            'email_verified_at' => now(),
            'id_img'=>'upload/Imgs/9.jpg',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $account = Account::create([
            'code'     => Str::random(6),
            'user_id'     => $distributor->id,
            'points'     => 0.00,
        ]);
        User::factory(10)->create();
    }
}
