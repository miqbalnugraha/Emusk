<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExcelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('excel')->insert([
            [
              'id'  			=> 1,
              'name'  		=> 'Sudah Diuji',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'  			=> 2,
                'name'  		=> 'Belum Diuji',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'  			=> 3,
                'name'  		=> 'Pending',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
              [
                'id'  			=> 4,
                'name'  		=> 'Olah Data per 6 Bulan',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ],
              [
                'id'  			=> 5,
                'name'  		=> 'Olah Data per 12 Bulan',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ]
        ]);
    
    }
}
