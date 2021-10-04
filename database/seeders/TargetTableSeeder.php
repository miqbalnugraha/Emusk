<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TargetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('target')->insert([
            [
                'id'  		=> 1,
                'nama'  	=> 'Target Per PK',
                'target'		      => '3000',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'  		=> 2,
                'nama'  	=> 'Target Per Surat Tugas',
                'target'		      => '2000',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ]
        ]);
    }
}
