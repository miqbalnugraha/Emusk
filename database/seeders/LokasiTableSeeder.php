<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lokasi')->insert([
          [
            'id_lokasi'  			=> 1,
            'nama_lokasi'  		=> 'DAOP 1',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 2,
            'nama_lokasi'  		=> 'DAOP 2',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 3,
            'nama_lokasi'  		=> 'DAOP 3',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 4,
            'nama_lokasi'  		=> 'DAOP 4',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 5,
            'nama_lokasi'  		=> 'DAOP 5',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 6,
            'nama_lokasi'  		=> 'DAOP 6',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 7,
            'nama_lokasi'  		=> 'DAOP 7',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 8,
            'nama_lokasi'  		=> 'DAOP 8',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 9,
            'nama_lokasi'  		=> 'DAOP 9',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 10,
            'nama_lokasi'  		=> 'DIVRE 1',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 11,
            'nama_lokasi'  		=> 'DIVRE 2',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 12,
            'nama_lokasi'  		=> 'DIVRE 3',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 13,
            'nama_lokasi'  		=> 'DIVRE 4',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 14,
            'nama_lokasi'  		=> 'JAKARTA',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 15,
            'nama_lokasi'  		=> 'KELAPA GADING',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 16,
            'nama_lokasi'  		=> 'LEBAK BULUS',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 17,
            'nama_lokasi'  		=> 'JABODEBEK',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 18,
            'nama_lokasi'  		=> 'PALEMBANG',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
          [
            'id_lokasi'  			=> 19,
            'nama_lokasi'  		=> 'MAKASAR',
            'status'		      => '1',
            'created_at'      => \Carbon\Carbon::now(),
            'updated_at'      => \Carbon\Carbon::now()
          ],
        ]);
    }
}
