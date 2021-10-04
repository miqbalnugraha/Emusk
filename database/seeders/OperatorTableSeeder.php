<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OperatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('operator')->insert([
        [
          'id_operator'  		=> 1,
          'nama_operator'  	=> 'PT. KAI',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 2,
          'nama_operator'  	=> 'PT. KCI',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 3,
          'nama_operator'  	=> 'PT. RAILINK',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 4,
          'nama_operator'  	=> 'PT. AP 2',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 5,
          'nama_operator'  	=> 'PT. LRTJ',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 6,
          'nama_operator'  	=> 'PT. TELLPP',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 7,
          'nama_operator'  	=> 'PT. MRTJ',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 8,
          'nama_operator'  	=> 'PT. LRT JABODETABEK',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 9,
          'nama_operator'  	=> 'DISHUB SUMSEL',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 10,
          'nama_operator'  	=> 'BALAI PERAWATAN KA',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 11,
          'nama_operator'  	=> 'SULAWESI',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 12,
          'nama_operator'  	=> 'LRT SUMSEL',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_operator'  		=> 13,
          'nama_operator'  	=> 'SATKER PPSP',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
      ]);
    }
}
