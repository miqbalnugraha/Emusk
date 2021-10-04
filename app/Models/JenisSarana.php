<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JenisSarana extends Model
{
      public function allData(){
        return DB::table('jenis_sarana')->get();
      }
      public function aktif(){
        return DB::table('jenis_sarana')
        ->where('status','=',1)
        ->get();
      }
      public function nonAktif(){
        return DB::table('jenis_sarana')
        ->where('status','=',0)
        ->get();
      }

      public function addData($data){
        DB::table('jenis_sarana')->insert($data);
      }

      public function updateData($id_sarana,$data){
        DB::table('jenis_sarana')
        ->where('id_sarana', $id_sarana)
        ->update($data);
      }

      public function inActivate($id_sarana){
        DB::table('jenis_sarana')
        ->where('id_sarana', $id_sarana)
        ->update(['status' => 0]);
      }

      public function activate($id_sarana){
        DB::table('jenis_sarana')
        ->where('id_sarana', $id_sarana)
        ->update(['status' => 1]);
      }
}
