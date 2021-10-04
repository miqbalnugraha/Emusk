<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Operator extends Model
{
  public function allData(){
    return DB::table('operator')->get();
  }

  public function aktif(){
    return DB::table('operator')
    ->where('status','=',1)
    ->get();
  }
  public function nonAktif(){
    return DB::table('operator')
    ->where('status','=',0)
    ->get();
  }

  public function addData($data){
    DB::table('operator')->insert($data);
  }

  public function updateData($id_operator,$data){
    DB::table('operator')
    ->where('id_operator', $id_operator)
    ->update($data);
  }

  public function inActivate($id_operator){
    DB::table('operator')
    ->where('id_operator', $id_operator)
    ->update(['status' => 0]);
  }

  public function activate($id_operator){
    DB::table('operator')
    ->where('id_operator', $id_operator)
    ->update(['status' => 1]);
  }
}
