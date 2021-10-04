<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExcelFile extends Model
{

    protected $fillable = [
      'nama',
      'file_path'
    ];
    
    public function allData(){
        return DB::table('excel')->get();
      }

      public function sSudah(){
        return DB::table('excel')
        ->where('id','=',1)
        ->get();
      }
      public function sBelum(){
        return DB::table('excel')
        ->where('id','=',2)
        ->get();
      }
      public function sPending(){
        return DB::table('excel')
        ->where('id','=',3)
        ->get();
      }
      public function sOlah1(){
        return DB::table('excel')
        ->where('id','=',4)
        ->get();
      }
      public function sOlah2(){
        return DB::table('excel')
        ->where('id','=',5)
        ->get();
      }
    
      public function addData($data){
        DB::table('excel')->insert($data);
      }

      public function updateData($id,$data){
        DB::table('excel')
        ->where('id', $id)
        ->update($data);
      }

      public function download($id){
        DB::table('excel')
        ->select('file_path')
        ->where('id', $id)
        ->get();
      }
}
