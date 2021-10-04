<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Target extends Model
{
    public function allData(){
        return DB::table('target')
        ->get();
      }

      public function pk(){
        return DB::table('target')
        ->where('id','=',1)
        ->first();
      }
      public function tugas(){
        return DB::table('target')
        ->where('id','=',2)
        ->first();
      }

      public function updateTarget($id,$data){
        return DB::table('target')
        ->where('id','=',$id)
        ->update($data);
      }
}
