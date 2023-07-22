<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'phone' => '01916962118',
            'password' => bcrypt('123123123'),
        ]);
    }
}
