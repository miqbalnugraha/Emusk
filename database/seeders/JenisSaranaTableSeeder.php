<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JenisSaranaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('jenis_sarana')->insert([
        [
          'id_sarana'  			=> 1,
          'nama_sarana'  		=> 'LOKOMOTIF',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_sarana'  			=> 2,
          'nama_sarana'  		=> 'KRD',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_sarana'  			=> 3,
          'nama_sarana'  		=> 'KERETA',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_sarana'  			=> 4,
          'nama_sarana'  		=> 'GERBONG',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_sarana'  			=> 5,
          'nama_sarana'  		=> 'P. KHUSUS',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_sarana'  			=> 6,
          'nama_sarana'  		=> 'LRT',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_sarana'  			=> 7,
          'nama_sarana'  		=> 'KRL',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_sarana'  			=> 8,
          'nama_sarana'  		=> 'APMS',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
        [
          'id_sarana'  			=> 9,
          'nama_sarana'  		=> 'PK',
          'status'		      => '1',
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
        ],
      ]);
    }
}
