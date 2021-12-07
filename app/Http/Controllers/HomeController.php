<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SaranaDiuji;
use App\Models\Target;

use App\Models\JenisSarana;
use App\Models\Keterangan;
use App\Models\Lokasi;
use App\Models\Operator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->SaranaDiuji = new SaranaDiuji();
        $this->Target = new Target();

        $this->JenisSarana = new JenisSarana();
        $this->Lokasi = new Lokasi();
        $this->Operator = new Operator();
        $this->Keterangan = new Keterangan();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data=[
            
            'pk'=>$this->Target->pk(),
            'penugasan'=> $this->SaranaDiuji->countAll(),
            'sudah'=> $this->SaranaDiuji->countSudah(),
            'belum'=> $this->SaranaDiuji->countBelum(),
            'lulus'=> $this->SaranaDiuji->lulus(),
            'tidakLulus'=> $this->SaranaDiuji->tidakLulus(),
            'pending'=> $this->SaranaDiuji->pending(),
            'jenis_sarana'=> $this->JenisSarana->aktif(),
            'lokasi'=> $this->Lokasi->aktif(),
            'operator'=> $this->Operator->aktif(),
            'keterangan'=> $this->Keterangan->aktif(),
            'a' => 1,
            'kinerja' => $this->SaranaDiuji->countSudah()+$this->SaranaDiuji->pending(),
          ];
          //dd($data);
         if ($request->ajax()){

          $query = DB::table('sarana_diuji')
            ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
            ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
            ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
            ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
            ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
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
                if ($request->get('keterangan') !=null) {
                    $instance->where('keterangan', $request->get('keterangan'));
                }
                if ($request->get('tgl_min') !=null) {
                    $instance->whereBetween('tgl_pengujian', [$request->get('tgl_min'),$request->get('tgl_max')]);
                  }
                if ($request->input('search.value') !=null) {
                    $sql = "identitas like ?";
                    $instance->whereRaw($sql, ["%{$request->input('search.value')}%"]);
                } 
                if ($request->get('reset') !=null) {
                    $instance->whereBetween('tgl_pengujian', [$request->get('tgl_min'),$request->get('tgl_max')]);
                  }
            })
            ->rawColumns(['wilayah','tgl_pengujian','status_uji'])
            ->make(true);
    }
    

        return view('index')->with($data);
    }

        public function exportAll(){
            return Excel::download(new ExportExcel,'EMUSK - Pengujian Sarana KA.xlsx');
        }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Alert::success('Good Bye!', 'Anda berhasil logout');

        return redirect('/');
    }
}
