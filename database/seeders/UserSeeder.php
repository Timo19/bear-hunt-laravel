<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'bear',
            'password' => Hash::make('74K2DSA03a37^Zv5PT1^')
        ]);

        // Create an admin user
        User::create([
            'name' => 'admin',
            'password' => Hash::make('admin')
        ]);
    }
}
