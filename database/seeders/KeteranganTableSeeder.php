<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeteranganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keterangan')->insert([
            [
              'id_keterangan'  	=> 1,
              'nama_ket'  		=> 'Perawatan',
              'status'		    => '1',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id_keterangan'    => 2,
                'nama_ket'  	  => 'Belum tersedia fasilitas untuk Uji Pembebanan',
                'status'		  => '1',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ],
              [
                'id_keterangan'  	      => 3,
                'nama_ket'  	  => 'Konservasi Sementara/Permanen',
                'status'		  => '1',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ],
              [
                'id_keterangan'  	      => 4,
                'nama_ket'  	  => 'Sarana Beroperasi/Stabling di tempat lain',
                'status'		  => '1',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ],
              [
                'id_keterangan'  	      => 5,
                'nama_ket'  	  => 'Mutasi/Asistensi',
                'status'		  => '1',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ],
              [
                'id_keterangan'  	      => 6,
                'nama_ket'  	  => 'Modifikasi',
                'status'		  => '1',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ],
              [
                'id_keterangan'  	      => 7,
                'nama_ket'  	  => 'Roda Benjol',
                'status'		  => '1',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ],
              [
                'id_keterangan'  	      => 8,
                'nama_ket'  	  => 'Pengereman statis tidak lulus',
                'status'		  => '1',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ],
            
          ]);
    }
}
