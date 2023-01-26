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
        $roles = [
            [
                'name' => 'Manager'
            ],
            [
                'name' => 'Customer'
            ],
        ];
        DB::table('roles')->insert($roles);

        $users = [
            [
                'role_id' => '1',
                'username' => 'Manager Dummy',
                'email' => 'manager@manager.com',
                'password' => Hash::make('manager'),
                'address' => 'jl. MH Thamrin No.88',
                'gender' => 'male',
                'dob' => '2001-02-08'
            ],
            [
                'role_id' => '2',
                'username' => 'Customer Dummy',
                'email' => 'cust@cust.com',
                'password' => Hash::make('cust'),
                'address' => 'jl. Gatot Subroto No.45',
                'gender' => 'male',
                'dob' => '2002-10-11'
            ],
        ];
        DB::table('users')->insert($users);
    }
}
