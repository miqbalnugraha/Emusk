<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaranaDiuji;
use App\Models\JenisSarana;
use App\Models\Lokasi;
use App\Models\Operator;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SaranaSudahController extends Controller
{
        public function __construct(){
            $this->middleware('auth');
            $this->SaranaDiuji = new SaranaDiuji();
            $this->JenisSarana = new JenisSarana();
            $this->Lokasi = new Lokasi();
            $this->Operator = new Operator();
        }

      public function index(Request $request){
        $data=[
          'penugasan'=> $this->SaranaDiuji->countAll(),
          'lulus'=> $this->SaranaDiuji->lulus(),
          'tidakLulus'=> $this->SaranaDiuji->tidakLulus(),
          'jenis_sarana'=> $this->JenisSarana->aktif(),
            'lokasi'=> $this->Lokasi->aktif(),
            'operator'=> $this->Operator->aktif(),
        ];
        if ($request->ajax()){

          $query = DB::table('sarana_diuji')
            ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
            ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
            ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
            ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
            ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
            ->whereIn('status_uji', ['1', '2'])
            ->orderBy('sarana_diuji.tgl_pengujian', 'desc')
            ->select(['sarana_diuji.identitas','jenis_sarana.nama_sarana','operator.nama_operator',
            'lokasi.nama_lokasi','sarana_diuji.wilayah','sarana_diuji.jenis_pengujian','sarana_diuji.tgl_pengujian','sarana_diuji.status_uji','keterangan.nama_ket']);
            
           // dd($query);

           return Datatables::of($query)
           ->addIndexColumn()
           ->editColumn('wilayah',function($e){
               if($e->wilayah==1){
               return 'Wilayah I';
               }
               elseif($e->wilayah==2){
                   return 'Wilayah II';
               }
           })
           ->editColumn('tgl_pengujian',function($e){
               if($e->tgl_pengujian=='1970-01-01')
               return '';
               elseif($e->tgl_pengujian!=NULL && $e->tgl_pengujian !='1970-01-01')
               return date('d-m-Y', strtotime($e->tgl_pengujian));
           })
           ->editColumn('status_uji',function($e){
            if($e->status_uji==1){
                return '<label class="badge badge-success">Lulus</label>';
            }
            elseif($e->status_uji==2){
                return '<label class="badge badge-danger">Tidak Lulus</label>';
            }
            elseif($e->status_uji==3){
                return '<label class="badge badge-warning">Pending</label>';
            }
            elseif($e->status_uji==4){
                return '<label class="badge badge-info">Belum Diuji</label>';
            }
            })
            ->filter(function ($instance) use ($request) {
                if ($request->get('jenis_sarana') !=null) {
                    $instance->where('jenis_sarana', $request->get('jenis_sarana'));
                }
                if ($request->get('operator') !=null) {
                    $instance->where('operator', $request->get('operator'));
                }
                if ($request->get('lokasi') !=null) {
                    $instance->where('lokasi', $request->get('lokasi'));
                }
                if ($request->get('wilayah') !=null) {
                    $instance->where('wilayah', $request->get('wilayah'));
                }
                if ($request->get('status_uji') !=null) {
                    $instance->where('status_uji', $request->get('status_uji'));
                }
                if ($request->get('tgl_min') !=null) {
                    $instance->whereBetween('tgl_pengujian', [$request->get('tgl_min'),$request->get('tgl_max')]);
                  }
                if ($request->input('search.value') !=null) {
                    $sql = "identitas like ?";
                    $instance->whereRaw($sql, ["%{$request->input('search.value')}%"]);
                } 
            })
            ->rawColumns(['wilayah','status_uji'])
            ->make(true);
    }
        return view('monitoring.sudah.index')->with($data);
      }
      public function lulus(Request $request){
        $data=[      
          'jenis_sarana'=> $this->JenisSarana->aktif(),
          'lokasi'=> $this->Lokasi->aktif(),
          'operator'=> $this->Operator->aktif(),
        ];
        if ($request->ajax()){

          $query = DB::table('sarana_diuji')
            ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
            ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
            ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
            ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
            ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
            ->where('status_uji', '=','1')
            ->orderBy('sarana_diuji.tgl_pengujian', 'desc')
            ->select(['sarana_diuji.identitas','jenis_sarana.nama_sarana','operator.nama_operator',
            'lokasi.nama_lokasi','sarana_diuji.wilayah','sarana_diuji.jenis_pengujian','sarana_diuji.tgl_pengujian','sarana_diuji.status_uji','keterangan.nama_ket']);
            
           // dd($query);

           return Datatables::of($query)
           ->addIndexColumn()
           ->editColumn('wilayah',function($e){
               if($e->wilayah==1){
               return 'Wilayah I';
               }
               elseif($e->wilayah==2){
                   return 'Wilayah II';
               }
           })
           ->editColumn('tgl_pengujian',function($e){
               if($e->tgl_pengujian=='1970-01-01')
               return '';
               elseif($e->tgl_pengujian!=NULL && $e->tgl_pengujian !='1970-01-01')
               return date('d-m-Y', strtotime($e->tgl_pengujian));
           })
           ->editColumn('status_uji',function($e){
            if($e->status_uji==1){
                return '<label class="badge badge-success">Lulus</label>';
            }
            elseif($e->status_uji==2){
                return '<label class="badge badge-danger">Tidak Lulus</label>';
            }
            elseif($e->status_uji==3){
                return '<label class="badge badge-warning">Pending</label>';
            }
            elseif($e->status_uji==4){
                return '<label class="badge badge-info">Belum Diuji</label>';
            }
            })
            ->filter(function ($instance) use ($request) {
                if ($request->get('jenis_sarana') !=null) {
                    $instance->where('jenis_sarana', $request->get('jenis_sarana'));
                }
                if ($request->get('operator') !=null) {
                    $instance->where('operator', $request->get('operator'));
                }
                if ($request->get('lokasi') !=null) {
                    $instance->where('lokasi', $request->get('lokasi'));
                }
                if ($request->get('wilayah') !=null) {
                    $instance->where('wilayah', $request->get('wilayah'));
                }
                if ($request->get('status_uji') !=null) {
                    $instance->where('status_uji', $request->get('status_uji'));
                }
                if ($request->get('tgl_min') !=null) {
                    $instance->whereBetween('tgl_pengujian', [$request->get('tgl_min'),$request->get('tgl_max')]);
                  }
                if ($request->input('search.value') !=null) {
                    $sql = "identitas like ?";
                    $instance->whereRaw($sql, ["%{$request->input('search.value')}%"]);
                } 
            })
            ->rawColumns(['wilayah','status_uji'])
            ->make(true);
    }
        return view('monitoring.sudah.lulus')->with($data);
      }
      public function tidakLulus(Request $request){
        $data=[      
          'jenis_sarana'=> $this->JenisSarana->aktif(),
          'lokasi'=> $this->Lokasi->aktif(),
          'operator'=> $this->Operator->aktif(),
        ];
        if ($request->ajax()){

          $query = DB::table('sarana_diuji')
            ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
            ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
            ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
            ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
            ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
            ->where('status_uji', '=','2')
            ->orderBy('sarana_diuji.tgl_pengujian', 'desc')
            ->select(['sarana_diuji.identitas','jenis_sarana.nama_sarana','operator.nama_operator',
            'lokasi.nama_lokasi','sarana_diuji.wilayah','sarana_diuji.jenis_pengujian','sarana_diuji.tgl_pengujian','sarana_diuji.status_uji','keterangan.nama_ket']);
            
           // dd($query);

           return Datatables::of($query)
           ->addIndexColumn()
           ->editColumn('wilayah',function($e){
               if($e->wilayah==1){
               return 'Wilayah I';
               }
               elseif($e->wilayah==2){
                   return 'Wilayah II';
               }
           })
           ->editColumn('tgl_pengujian',function($e){
               if($e->tgl_pengujian=='1970-01-01')
               return '';
               elseif($e->tgl_pengujian!=NULL && $e->tgl_pengujian !='1970-01-01')
               return date('d-m-Y', strtotime($e->tgl_pengujian));
           })
           ->editColumn('status_uji',function($e){
            if($e->status_uji==1){
                return '<label class="badge badge-success">Lulus</label>';
            }
            elseif($e->status_uji==2){
                return '<label class="badge badge-danger">Tidak Lulus</label>';
            }
            elseif($e->status_uji==3){
                return '<label class="badge badge-warning">Pending</label>';
            }
            elseif($e->status_uji==4){
                return '<label class="badge badge-info">Belum Diuji</label>';
            }
            })
            ->filter(function ($instance) use ($request) {
                if ($request->get('jenis_sarana') !=null) {
                    $instance->where('jenis_sarana', $request->get('jenis_sarana'));
                }
                if ($request->get('operator') !=null) {
                    $instance->where('operator', $request->get('operator'));
                }
                if ($request->get('lokasi') !=null) {
                    $instance->where('lokasi', $request->get('lokasi'));
                }
                if ($request->get('wilayah') !=null) {
                    $instance->where('wilayah', $request->get('wilayah'));
                }
                if ($request->get('status_uji') !=null) {
                    $instance->where('status_uji', $request->get('status_uji'));
                }
                if ($request->get('tgl_min') !=null) {
                    $instance->whereBetween('tgl_pengujian', [$request->get('tgl_min'),$request->get('tgl_max')]);
                  }
                if ($request->input('search.value') !=null) {
                    $sql = "identitas like ?";
                    $instance->whereRaw($sql, ["%{$request->input('search.value')}%"]);
                } 
            })
            ->rawColumns(['wilayah','status_uji'])
            ->make(true);
    }
        return view('monitoring.sudah.tidak')->with($data);
      }
}
