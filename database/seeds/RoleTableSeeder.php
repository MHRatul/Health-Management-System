<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'slug' => 'super-admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'Patient',
            'slug' => 'patient',
        ]);
        DB::table('roles')->insert([
            'name' => 'Doctor',
            'slug' => 'doctor',
        ]);
        
    }
}
