<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lokasi extends Model
{
  public function allData(){
    return DB::table('lokasi')->get();
  }

  public function aktif(){
    return DB::table('lokasi')
    ->where('status','=',1)
    ->get();
  }
  public function nonAktif(){
    return DB::table('lokasi')
    ->where('status','=',0)
    ->get();
  }

  public function addData($data){
    DB::table('lokasi')->insert($data);
  }

  public function updateData($id_lokasi,$data){
    DB::table('lokasi')
    ->where('id_lokasi', $id_lokasi)
    ->update($data);
  }

  public function inActivate($id_lokasi){
    DB::table('lokasi')
    ->where('id_lokasi', $id_lokasi)
    ->update(['status' => 0]);
  }

  public function activate($id_lokasi){
    DB::table('lokasi')
    ->where('id_lokasi', $id_lokasi)
    ->update(['status' => 1]);
  }
}
