<?php

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
         \App\User::insert([
      [
        'username'  => 'admin',
        'password' => bcrypt('password'),
        'name'  => 'Admin',
        'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
         ],
      ]);
    }
}
