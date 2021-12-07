<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class SaranaDiuji extends Model
{ 
   use LogsActivity, HasFactory;
    protected $table = 'sarana_diuji';
    protected $fillable = ['identitas', 'user', 'jenis_sarana', 'operator', 'lokasi', 'wilayah', 'jenis_pengujian', 'tgl_pengujian', 'status_uji','keterangan'];
    protected $guarded = array();

    public function findData2($id)
    {
        return static::find($id);
    }

  //select
  public function allData(){
    return DB::table('sarana_diuji')
    ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
    ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
    ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
    ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
    ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
    ->get();
  }

  public static function getAllData(){
    $record = DB::table('sarana_diuji')
    ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
    ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
    ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
    ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
    ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
    ->leftjoin('wilayah','sarana_diuji.wilayah', '=', 'wilayah.id_wilayah')
    ->leftjoin('status_uji','sarana_diuji.status_uji', '=', 'status_uji.id_status')
    ->orderBy('sarana_diuji.tgl_pengujian', 'desc')
    ->select(['sarana_diuji.identitas','jenis_sarana.nama_sarana','operator.nama_operator',
            'lokasi.nama_lokasi','wilayah.nama_wilayah','sarana_diuji.jenis_pengujian',
            'sarana_diuji.tgl_pengujian','status_uji.nama_status','keterangan.nama_ket'])
    ->get()
    ->toArray();

    return $record;
  }

  public function adminData(){
    return DB::table('sarana_diuji')
    ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
    ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
    ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
    ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
    ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
    ->where('user', '=', Auth::user()->id)
    ->get();
  }

  public function sudahDiuji(){
    return DB::table('sarana_diuji')
    ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
    ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
    ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
    ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
    ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
    ->whereIn('status_uji', ['1', '2'])
    ->get();
  }

  public function sLulus(){
    return DB::table('sarana_diuji')
    ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
    ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
    ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
    ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
    ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
    ->where('status_uji', '=', '1')
    ->get();
  }

  public function sTidakLulus(){
    return DB::table('sarana_diuji')
    ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
    ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
    ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
    ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
    ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
    ->where('status_uji', '=', '2')
    ->get();
  }

  public function sBelumDiuji(){
    return DB::table('sarana_diuji')
    ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
    ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
    ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
    ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
    ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
    ->where('status_uji', '=', '4')
    ->get();
  }

  public function sPending(){
    return DB::table('sarana_diuji')
    ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
    ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
    ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
    ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
    ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
    ->where('status_uji', '=', '3')
    ->get();
  }

  public function allBelumDiuji(){
    return DB::table('sarana_diuji')
    ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
    ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
    ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
    ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
    ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
    ->whereIn('status_uji', ['3', '4'])
    ->get();
  }


  //count
  public function countAll(){
    return DB::table('sarana_diuji')
    ->count();
  }

  public function countSudah(){
    return DB::table('sarana_diuji')
    ->whereIn('status_uji', ['1', '2'])
    ->count();
  }
  public function lulus(){
    return DB::table('sarana_diuji')
    ->where('status_uji', '=', '1')
    ->count();
  }

  public function tidakLulus(){
    return DB::table('sarana_diuji')
    ->where('status_uji', '=', '2')
    ->count();
  }

  public function kinerja(){
    return DB::table('sarana_diuji')
    ->where('status_uji', '!=', '4')
    ->count();
  }

  public function countBelum(){
    return DB::table('sarana_diuji')
    ->whereIn('status_uji', ['3', '4'])
    ->count();
  }

  public function pending(){
    return DB::table('sarana_diuji')
    ->where('status_uji', '=', '3')
    ->count();
  }

  public function belumDiuji(){
    return DB::table('sarana_diuji')
    ->where('status_uji', '=', '4')
    ->count();
  }

  

  public function editUji($id){
    return DB::table('sarana_diuji')
    ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
    ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
    ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
    ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
    ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
    ->where('id', $id)
    ->first();
  }

  public function addData($data){
    DB::table('sarana_diuji')->insert($data);
  }
  public function storeData($input)
    {
    	return static::create($input);
    }

  public function updateData2($id,$data){
    DB::table('sarana_diuji')
    ->where('id', $id)
    ->update($data);
  }

  public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

  public function deleteData2($id){
    DB::table('sarana_diuji')->where('id','=',$id)->delete();
  }

  public function deleteData($id)
    {
        return static::find($id)->delete();
    }

  public function findDataO($id){
    DB::table('sarana_diuji')->where('id',$id)->get();
  }
  public function findData($id)
    {
        return static::find($id);
    }
  public function truncate(){
    DB::table('sarana_diuji')->truncate();
  }

}
