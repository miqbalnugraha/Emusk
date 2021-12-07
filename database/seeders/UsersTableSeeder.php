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
          'name'  			=> 'Tim 1',
          'username'		=> 'tim1_123',
          'email' 			=> 'tim1@emusk.com',
          'password'		=> bcrypt('adminuji1'),
          'level'			=> 'Admin',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 3,
          'name'  			=> 'Tim 2',
          'username'		=> 'tim2_234',
          'email' 			=> 'tim2@emusk.com',
          'password'		=> bcrypt('adminuji2'),
          'level'			=> 'Admin',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 4,
          'name'  			=> 'Tim 3',
          'username'		=> 'tim3_345',
          'email' 			=> 'tim3@emusk.com',
          'password'		=> bcrypt('adminuji3'),
          'level'			=> 'Admin',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 5,
          'name'  			=> 'Tim 4',
          'username'		=> 'tim4_456',
          'email' 			=> 'tim4@emusk.com',
          'password'		=> bcrypt('adminuji4'),
          'level'			=> 'Admin',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 6,
          'name'  			=> 'Tim 5',
          'username'		=> 'tim5_567',
          'email' 			=> 'tim5@emusk.com',
          'password'		=> bcrypt('adminuji5'),
          'level'			  => 'Admin',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 7,
          'name'  			=> 'Yohary Baruna Putra',
          'username'		=> 'yohary.baruna',
          'email' 			=> 'yohary@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 8,
          'name'  			=> 'Darmainillas',
          'username'		=> 'darmainillas',
          'email' 			=> 'darmainillas@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 9,
          'name'  			=> 'M. Syarif Hidayat',
          'username'		=> 'm.syarifh',
          'email' 			=> 'm.syarifh@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 10,
          'name'  			=> 'Yayan Kusharyanto',
          'username'		=> 'yayan.k',
          'email' 			=> 'yayan.k@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 11,
          'name'  			=> 'Rustamiaji Jatmiko',
          'username'		=> 'rustamiaji.j',
          'email' 			=> 'rustamiaji.j@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 12,
          'name'  			=> 'Lilik Mujaki',
          'username'		=> 'lilik.mujaki',
          'email' 			=> 'lilik.mujaki@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 13,
          'name'  			=> 'Osio Hotmartua S L',
          'username'		=> 'osio.h',
          'email' 			=> 'osio.h@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 14,
          'name'  			=> 'Myrna Secunda',
          'username'		=> 'myrna.secunda',
          'email' 			=> 'myrna.secunda@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 15,
          'name'  			=> 'Agus Triantoro',
          'username'		=> 'agus.t',
          'email' 			=> 'agus.t@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 16,
          'name'  			=> 'Edwin Dwi Ahmad',
          'username'		=> 'edwin.dwi',
          'email' 			=> 'edwin.dwi@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 17,
          'name'  			=> 'Iyus Susanto',
          'username'		=> 'iyus.s',
          'email' 			=> 'iyus.s@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 18,
          'name'  			=> 'Muchamad Hafid',
          'username'		=> 'muchamad.hafid',
          'email' 			=> 'muchamad.hafid@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 19,
          'name'  			=> 'Ferry Wijo Utomo',
          'username'		=> 'ferry.wijo',
          'email' 			=> 'ferry.wijo@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 20,
          'name'  			=> 'Aji Permana Putra',
          'username'		=> 'aji.permana',
          'email' 			=> 'aji.permana@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 21,
          'name'  			=> 'M. Rizky Nur Rachmat',
          'username'		=> 'm.rizky',
          'email' 			=> 'm.rizky@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 22,
          'name'  			=> 'M. Insan Kamil',
          'username'		=> 'm.insan',
          'email' 			=> 'm.insan@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 23,
          'name'  			=> 'Gita Fitri Ramadhani',
          'username'		=> 'gita.fitri',
          'email' 			=> 'gita.fitri@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 24,
          'name'  			=> 'Sodikin',
          'username'		=> 'sodikin',
          'email' 			=> 'sodikin@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 25,
          'name'  			=> 'Rachmad Hidayatullah',
          'username'		=> 'rachmad.h',
          'email' 			=> 'rachmad.h@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 26,
          'name'  			=> 'Deldana Mandala Putra',
          'username'		=> 'deldana.m',
          'email' 			=> 'deldana.m@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 27,
          'name'  			=> 'Putri Rahma Sari',
          'username'		=> 'putri.rahma',
          'email' 			=> 'putri.rahma@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 28,
          'name'  			=> 'Diana Roselia',
          'username'		=> 'diana.r',
          'email' 			=> 'diana.r@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 29,
          'name'  			=> 'Fatwa Mufidah',
          'username'		=> 'fatwa.m',
          'email' 			=> 'fatwa.m@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id'  			=> 30,
          'name'  			=> 'Lulu Sorayah',
          'username'		=> 'lulu.s',
          'email' 			=> 'lulu.s@emusk.com',
          'password'		=> bcrypt('12345678'),
          'level'			  => 'User',
          'remember_token'	=> NULL,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
      ]);
    }
}
