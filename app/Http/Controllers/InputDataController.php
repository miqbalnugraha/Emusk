<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaranaDiuji;
use App\Models\JenisSarana;
use App\Models\Lokasi;
use App\Models\Operator;
use App\Models\Keterangan;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use App;
use App\Exports\ExportExcel;
use App\Http\Requests\UpdateUjiRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Blade;
use App\Models\ExcelFile;
use App\Imports\ImportExcel;
use Maatwebsite\Excel\Facades\Excel; 
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use App\Http\Requests\UpdateSaranaDiujiRequest;

class InputDataController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->SaranaDiuji = new SaranaDiuji();
      $this->JenisSarana = new JenisSarana();
      $this->Lokasi = new Lokasi();
      $this->Operator = new Operator();
      $this->Keterangan = new Keterangan();
    }

    public function index(Request $request){
      $data=[
        'jenis_sarana'=> $this->JenisSarana->aktif(),
        'lokasi'=> $this->Lokasi->aktif(),
        'operator'=> $this->Operator->aktif(),
        'keterangan'=> $this->Keterangan->aktif(),
        'jenis_sarana'=> $this->JenisSarana->aktif(),
      ];
      if ($request->ajax()){

        $query = DB::table('sarana_diuji')
          ->leftjoin('jenis_sarana','sarana_diuji.jenis_sarana', '=', 'jenis_sarana.id_sarana')
          ->leftjoin('operator','sarana_diuji.operator', '=', 'operator.id_operator')
          ->leftjoin('lokasi','sarana_diuji.lokasi', '=', 'lokasi.id_lokasi')
          ->leftjoin('users','sarana_diuji.user', '=', 'users.id')
          ->leftjoin('keterangan','sarana_diuji.keterangan', '=', 'keterangan.id_keterangan')
          ->orderBy('sarana_diuji.tgl_pengujian', 'desc')
          ->select(['sarana_diuji.id','sarana_diuji.identitas','jenis_sarana.nama_sarana','operator.nama_operator',
          'lokasi.nama_lokasi','sarana_diuji.wilayah','sarana_diuji.jenis_pengujian','sarana_diuji.tgl_pengujian','sarana_diuji.status_uji','keterangan.nama_ket']);
          
         // dd($query);

         return Datatables::of($query)
         ->addIndexColumn()
         ->addColumn('action', function($row){
          $button = '<div class="btn-group">
                          <button class="btn btn-sm btn-primary" data-id="'.$row->id.'" id="editCountryBtn">Edit</button>
                          <button class="btn btn-sm btn-danger" data-id="'.$row->id.'" id="deleteCountryBtn">Delete</button>
                    </div>';
                    return $button;
         })
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
          ->rawColumns(['status_uji','action'])
          ->make(true);
      }
      return view('input.inputData')->with($data);
    }


    public function create(){
      $data=[
        'jenis_sarana'=> $this->JenisSarana->aktif(),
        'lokasi'=> $this->Lokasi->aktif(),
        'operator'=> $this->Operator->aktif(),
        'keterangan'=> $this->Keterangan->aktif(),
      ];
      return view('input.create', $data);
    }

    public function edit(Request $request)
    {
        # code...
        $id_uji = $request->id_uji;
        $details = SaranaDiuji::find($id_uji);
        //dd($details);
        return response()->json(['details' => $details]);
    }

      public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'identitas' => 'required|alpha_dash|unique:sarana_diuji,identitas|max:255',
            'jenis_sarana' => 'required',
            'operator' => 'required',
            'lokasi' => 'required',
            'wilayah'=>'required',
            'jenis_pengujian' => 'required',
            'status_uji' => 'required',
        ],[
          'identitas.required'=>'Identitas Sarana Harus Diisi',
          'identitas.unique'=>'Identitas Sarana Sudah Ada',
          'identitas.alpha_dash'=>'Tidak boleh diisi spasi',
          'jenis_sarana.required'=>'Jenis Sarana Harus Diisi',
          'operator.required'=>'Operator Harus Diisi',
          'lokasi.required'=>'Lokasi Harus Diisi',
          'wilayah.required'=>'Wilayah harus diisi',
          'jenis_pengujian.required'=>'Jenis Pengujian Harus Diisi',
          'status_uji.required'=>'Status Uji Sarana Harus Diisi',
        ]);

        $data = [
                'identitas' => Request()->identitas,
                'user' => Request()->user,
                'jenis_sarana' => Request()->jenis_sarana,
                'operator' => Request()->operator,
                'lokasi' => Request()->lokasi,
                'wilayah'=> Request()->wilayah,
                'jenis_pengujian' => Request()->jenis_pengujian,
                'tgl_pengujian' => Request()->tgl_pengujian,
                'status_uji' => Request()->status_uji,
                'keterangan' => Request()->keterangan,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ];
            if($validator->fails()){
              Alert::error('Error', 'Data Gagal Ditambahkan');
              return back()->withErrors($validator)->withInput();
            }
            $this->SaranaDiuji->addData($data);
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return back();
      }

      public function store2(Request $request, SaranaDiuji $article)
      {
        $validator = Validator::make($request->all(), [
          'identitas' => 'required|alpha_dash|unique:sarana_diuji,identitas|max:255',
          'jenis_sarana' => 'required',
          'operator' => 'required',
          'lokasi' => 'required',
          'wilayah'=>'required',
          'jenis_pengujian' => 'required',
          'status_uji' => 'required',
      ],[
        'identitas.required'=>'Identitas Sarana Harus Diisi',
        'identitas.unique'=>'Identitas Sarana Sudah Ada',
        'identitas.alpha_dash'=>'Tidak boleh diisi spasi',
        'jenis_sarana.required'=>'Jenis Sarana Harus Diisi',
        'operator.required'=>'Operator Harus Diisi',
        'lokasi.required'=>'Lokasi Harus Diisi',
        'wilayah.required'=>'Wilayah harus diisi',
        'jenis_pengujian.required'=>'Jenis Pengujian Harus Diisi',
        'status_uji.required'=>'Status Uji Sarana Harus Diisi',
      ]);

      $data = [
        'identitas' => Request()->identitas,
        'user' => Request()->user,
        'jenis_sarana' => Request()->jenis_sarana,
        'operator' => Request()->operator,
        'lokasi' => Request()->lokasi,
        'wilayah'=> Request()->wilayah,
        'jenis_pengujian' => Request()->jenis_pengujian,
        'tgl_pengujian' => Request()->tgl_pengujian,
        'status_uji' => Request()->status_uji,
        'keterangan' => Request()->keterangan,
        'created_at'      => \Carbon\Carbon::now(),
        'updated_at'      => \Carbon\Carbon::now()
    ];
          
          if ($validator->fails()) {
              return response()->json(['errors' => $validator->errors()->all()]);
          }

          $article->storeData($data);
          return response()->json(['success'=>'Article added successfully']);
      }


      public function update2(Request $request,$id)
      {
        
        $validator = Validator::make($request->all(), [
            'identitas' => "required|alpha_dash|unique:sarana_diuji,identitas,$id,id",
            'jenis_sarana' => 'required',
            'operator' => 'required',
            'lokasi' => 'required',
            'wilayah' => 'required',
            'jenis_pengujian' => 'required',
            'status_uji' => 'required',
        ],[
          'identitas.required'=>'Identitas Sarana Harus Diisi',
          'identitas.unique'=>'Identitas Sarana Sudah Ada',
          'identitas.alpha_dash'=>'Tidak boleh Diisi Spasi',
          'jenis_sarana.required'=>'Jenis Sarana Harus Diisi',
          'operator.required'=>'Operator Harus Diisi',
          'lokasi.required'=>'Lokasi Harus Diisi',
          'wilayah.required'=>'Wilayah Harus Diisi',
          'jenis_pengujian.required'=>'Jenis Pengujian Harus Diisi',
          'status_uji.required'=>'Status Uji Sarana Harus Diisi',
        ]);
        $data = [
                'identitas' => Request()->identitas,
                'user' => Request()->user,
                'jenis_sarana' => Request()->jenis_sarana,
                'operator' => Request()->operator,
                'lokasi' => Request()->lokasi,
                'wilayah' => Request()->wilayah,
                'jenis_pengujian' => Request()->jenis_pengujian,
                'tgl_pengujian' => Request()->tgl_pengujian,
                'status_uji' => Request()->status_uji,
                'keterangan' => Request()->keterangan,
                'updated_at'      => \Carbon\Carbon::now()
            ];
            if($validator->fails()){
              Alert::error('Error', 'Data Gagal Diubah');
              return redirect()->route('inputdata.index')->withErrors($validator)->withInput();
            }
            $this->SaranaDiuji->updateData($id,$data);
            Alert::success('Success', 'Data Berhasil Diedit');
            return redirect()->route('inputdata.index');
      }

      public function update(Request $request)
      {
        $id_uji = $request->eid;
        $validator = Validator::make($request->all(), [
          'identitas' => 'required',Rule::unique('sarana_diuji', 'identitas')->ignore($id_uji, 'id'),
          'jenis_sarana' => 'required',
          'operator' => 'required',
          'lokasi' => 'required',
          'wilayah' => 'required',
          'jenis_pengujian' => 'required',
          'status_uji' => 'required',
      ],[
        'identitas.required'=>'Identitas Sarana Harus Diisi',
        'identitas.unique'=>'Identitas Sarana Sudah Ada',
        'identitas.alpha_dash'=>'Tidak boleh Diisi Spasi',
        'jenis_sarana.required'=>'Jenis Sarana Harus Diisi',
        'operator.required'=>'Operator Harus Diisi',
        'lokasi.required'=>'Lokasi Harus Diisi',
        'wilayah.required'=>'Wilayah Harus Diisi',
        'jenis_pengujian.required'=>'Jenis Pengujian Harus Diisi',
        'status_uji.required'=>'Status Uji Sarana Harus Diisi',
      ]);
        
      if($validator->fails()){
        return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
          $data = SaranaDiuji::findOrFail($id_uji);
          $data->identitas = $request->identitas;
          $data->user = $request->user;
          $data->jenis_sarana = $request->jenis_sarana;
          $data->operator = $request->operator;
          $data->lokasi = $request->lokasi;
          $data->wilayah = $request->wilayah;
          $data->jenis_pengujian = $request->jenis_pengujian;
          $data->tgl_pengujian = $request->tgl_pengujian;
          $data->status_uji = $request->status_uji;
          $data->keterangan = $request->keterangan;
          $data->updated_at = \Carbon\Carbon::now();
          $query = $data->save();

          if($query){
              return response()->json(['code'=>1, 'msg'=>'Data pengujian sarana berhasil diupdate']);
          }else{
              return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
          }
        }
      }

      public function delete($id)
      {
        if(!$this->SaranaDiuji->deleteData($id)){
          abort(404);
        }
            $this->SaranaDiuji->deleteData($id);
            Alert::success('Success', 'Data Berhasil Dihapus');
            return redirect()->route('inputdata.index');
      }

      public function destroy(Request $request)
      {
        $id_uji = $request->id_uji;
        $query = SaranaDiuji::find($id_uji)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Data pengujian berhasil dihapus']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
        }
    }

      public function import(Request $request)
      {
        $this->validate($request, [
          'importExcel' => 'required'
      ]);
      try{
        Excel::import(new ImportExcel, request()->file('importExcel'));
      } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        $failures = $e->failures();
     
      foreach ($failures as $failure) {
          $failure->row(); // row that went wrong
          $failure->attribute(); // either heading key (if using heading row concern) or column index
          $failure->errors(); // Actual error messages from Laravel validator
          $failure->values(); // The values of the row that has failed.
      }
        Alert::error('Error', );
        return back();
      }
        alert()->success('Berhasil.','Data telah diimport!');
          return back();
      }
      
      public function format()
      {
        $file = public_path(). "/files/format_import.xlsx";

        $headers = ['Content-Type: file/excel'];

        if (file_exists($file)) {
            return \Response::download($file, 'format.xlsx', $headers);
        } else {
          Alert::error('Error', 'File not found');
          return back();
        }
      }
}
