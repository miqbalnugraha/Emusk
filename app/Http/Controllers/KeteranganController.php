<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keterangan;
use App\Models\SaranaDiuji;
use Illuminate\Support\Facades\DB;

class KeteranganController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->Keterangan = new Keterangan();
        $this->SaranaDiuji = new SaranaDiuji();
    }

  public function index(){
    
    $keter=DB::table('keterangan')->orderBy('id_keterangan','asc')->get();
    $pending=DB::select(DB::raw('select count(*) as total_pending, keterangan from sarana_diuji where status_uji = "3" group by keterangan'));
    $tidak=DB::select(DB::raw('select count(*) as total_pending, keterangan from sarana_diuji where status_uji = "2" group by keterangan'));    
    
    $chartData1="";
    $a=0;
    foreach($pending as $pendings){
      if($pendings->keterangan != NULL){
        foreach($keter as $kets){
          if($kets->id_keterangan==$pendings->keterangan){
            $chartData1.="['".$kets->nama_ket."',".$pendings->total_pending."],";
          }
        }
        $a+= $pendings->total_pending;
      }      
    }
    $arr1['chartData1']=rtrim($chartData1,",");
    //dd($arr1);

    $chartData2="";
    $b=0;
    foreach($tidak as $tidaks){
      if($tidaks->keterangan != NULL){
        foreach($keter as $kets){
          if($kets->id_keterangan==$tidaks->keterangan){
            $chartData2.="['".$kets->nama_ket."',".$tidaks->total_pending."],";
          }
        }
        $b+= $tidaks->total_pending;
      }      
    }
    $arr2['chartData2']=rtrim($chartData2,",");
    //dd($arr2);

    $data=[
      'ket'=> $this->Keterangan->allData(),
      'pending'=> $this->Keterangan->countPending(),
      'tidak'=> $this->Keterangan->countTidak(),
      'a'=> $a,
      'b'=> $b,
    ];
    //dd($data);
    //dd($a);
    return view('keterangan')->with($data)->with($arr1)->with($arr2);
  }
}
