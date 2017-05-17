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
        DB::table('admins')->delete();
        DB::table('users')->delete();
    	$admin = \App\Admin::create(['privilege' => 0]);
        $admin->user()->create(['name' => 'Nazeer', 'email' => 'admin@info.com', 'password' => bcrypt('admin')]);
    }
}
