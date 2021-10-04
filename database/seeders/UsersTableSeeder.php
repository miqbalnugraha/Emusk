<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        [
          'id'  			=> 1,
          'name'  			=> 'Master Admin',
          'username'		=> 'masteradmin',
          'email' 			=> 'masteradmin@emusk.com',
          'password'		=> bcrypt('adminmaster'),
          'level'			=> 'Master',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 2,
          'name'  			=> 'Admin',
          'username'		=> 'admin123',
          'email' 			=> 'admin@emusk.com',
          'password'		=> bcrypt('admin123'),
          'level'			=> 'Admin',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 3,
          'name'  			=> 'User',
          'username'		=> 'user123',
          'email' 			=> 'admin@emusk.com',
          'password'		=> bcrypt('user123'),
          'level'			=> 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
      ]);
    }
}
