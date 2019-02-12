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
        	'role_id' => '1',
        	'name' => 'Md. Admin',
        	'email' => 'admin@hr.com',
        	'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
        	'role_id' => '2',
        	'name' => 'Md. Author',
        	'email' => 'author@hr.com',
        	'password' => bcrypt('author'),
        ]);
    }
}
