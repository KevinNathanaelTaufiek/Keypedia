<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $user = [
            [
                'username' => 'spongebob',
                'role_id' => 2,
                'email' => 'spongbob@gmail.com',
                'password' => Hash::make('admin123'),
                'address' => 'Jl. Raya Bogor No 24, Depok, Jawa Barat',
                'gender' => 'Male',
                'dateOfBirth' => '2021-10-09',
            ]
        ];
        DB::table('users')->insert($user);
    }
}
