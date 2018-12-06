<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),//'admin'
        ]);  

        DB::table('users')->insert([
            'name' => 'Tester',
            'email' => 'test@ominc.com',
            'password' => bcrypt('tester'),//tester
        ]);  

    }
}
