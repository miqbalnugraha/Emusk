<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusUjiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_uji')->insert([
            [
              'id_status'  			=> 1,
              'nama_status'  		=> 'Lulus',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id_status'  			=> 2,
                'nama_status'  		=> 'Tidak Lulus',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ],
              [
                'id_status'  			=> 3,
                'nama_status'  		=> 'Pending',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ],
              [
                'id_status'  			=> 4,
                'nama_status'  		=> 'Belum Diuji',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ],
            
          ]);
    }
}
