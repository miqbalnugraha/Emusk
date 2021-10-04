<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Keterangan extends Model
{
    public function allData(){
        return DB::table('keterangan')
        ->orderBy('id_keterangan','asc')
        ->get();
      }

      public function countPending(){
        return DB::table('sarana_diuji')    
        ->select('keterangan', DB::raw('count(*) as total'))
        ->where('status_uji', '=', '3')
        ->groupBy('keterangan')
        ->get();
      }

      public function countTidak(){
        return DB::table('sarana_diuji')    
        ->select('keterangan', DB::raw('count(*) as total'))
        ->where('status_uji', '=', '2')
        ->groupBy('keterangan')
        ->get();
      }

      public function aktif(){
        return DB::table('keterangan')
        ->where('status','=',1)
        ->get();
      }
      public function nonAktif(){
        return DB::table('keterangan')
        ->where('status','=',0)
        ->get();
      }

      public function addData($data){
        DB::table('keterangan')->insert($data);
      }
    
      public function updateData($id_keterangan,$data){
        DB::table('keterangan')
        ->where('id_keterangan', $id_keterangan)
        ->update($data);
      }
    
      public function inActivate($id_keterangan){
        DB::table('keterangan')
        ->where('id_keterangan', $id_keterangan)
        ->update(['status' => 0]);
      }
    
      public function activate($id_keterangan){
        DB::table('keterangan')
        ->where('id_keterangan', $id_keterangan)
        ->update(['status' => 1]);
      }
}
