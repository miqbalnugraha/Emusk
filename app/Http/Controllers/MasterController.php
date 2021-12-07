<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSarana;
use App\Models\Keterangan;
use App\Models\Lokasi;
use App\Models\Operator;
use App\Models\Target;
use App\Models\SaranaDiuji;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityLog;
use Illuminate\Support\Carbon;

class MasterController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->SaranaDiuji = new SaranaDiuji();
      $this->JenisSarana = new JenisSarana();
      $this->Keterangan = new Keterangan();
      $this->Lokasi = new Lokasi();
      $this->Operator = new Operator();
      $this->Target = new Target();
      $this->ActivityLog = new ActivityLog();
    }

    public function index(){
      $data=[
        'sarana'=> $this->SaranaDiuji->countAll(),
        'sarana_aktif'=> $this->JenisSarana->aktif(),
        'sarana_nonAktif'=> $this->JenisSarana->nonAktif(),
        'ket_aktif'=> $this->Keterangan->aktif(),
        'ket_nonAktif'=> $this->Keterangan->nonAktif(),
        'lokasi_aktif'=> $this->Lokasi->aktif(),
        'lokasi_nonAktif'=> $this->Lokasi->nonAktif(),
        'operator_aktif'=> $this->Operator->aktif(),
        'operator_nonAktif'=> $this->Operator->nonAktif(),
        'pk'=>$this->Target->pk(),
        'tugas'=>$this->Target->tugas(),
      ];
      //dd($data);
      return view('masterData.master.index', $data);
    }

    // NAMA JENIS SARANA
    public function createSarana(){
      return view('masterData.master.saranaCreate');
    }

    public function storeSarana(Request $request){
      Request()->validate( [
          'nama_sarana' => 'required',
      ],[
        'nama_sarana.required'=>'Nama Sarana Harus Diisi',
      ]);

      $data = [
              'nama_sarana' => Request()->nama_sarana,
              'status'=> 1,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
          ];
          $this->JenisSarana->addData($data);
          Alert::success('Success', 'Data Berhasil Ditambahkan');
          return redirect()->route('master.index');
    }
    
    public function editSarana($id_sarana){
      if(!$this->JenisSarana->editSarana($id_sarana)){
        abort(404);
      }
      return view('masterData.master.editSarana');
    }

    public function updateSarana($id_sarana)
      {
        
        Request()->validate( [
            'nama_sarana' => 'required',
        ],[
          'nama_sarana.required'=>'Nama Sarana Harus Diisi',
        ]);
        $data = [
                'nama_sarana' => Request()->nama_sarana,
                'updated_at'      => \Carbon\Carbon::now()
            ];
            $this->JenisSarana->updateData($id_sarana,$data);
            Alert::success('Success', 'Data Berhasil Diedit');
            return redirect()->route('master.index');
      }

      public function inActivateSarana($id_sarana){
        
        $this->JenisSarana->inActivate($id_sarana);
        Alert::success('Success', 'Data Berhasil Dinonaktifkan');
        return redirect()->route('master.index');

      }

      public function activateSarana($id_sarana){
        
        $this->JenisSarana->activate($id_sarana);
        Alert::success('Success', 'Data Berhasil Diaktifkan');
        return redirect()->route('master.index');

      }

      public function storeOperator(Request $request){
        Request()->validate( [
            'nama_operator' => 'required',
        ],[
          'nama_operator.required'=>'Nama Operator Harus Diisi',
        ]);
  
        $data = [
                'nama_operator' => Request()->nama_operator,
                'status'=> 1,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ];
            $this->Operator->addData($data);
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return redirect()->route('master.index');
      }

      public function updateOperator($id_operator)
      {
        
        Request()->validate( [
            'nama_operator' => 'required',
        ],[
          'nama_operator.required'=>'Nama Sarana Harus Diisi',
        ]);
        $data = [
                'nama_operator' => Request()->nama_operator,
                'updated_at'      => \Carbon\Carbon::now()
            ];
            $this->Operator->updateData($id_operator,$data);
            Alert::success('Success', 'Data Berhasil Diedit');
            return redirect()->route('master.index');
      }

      public function inActivateOperator($id_operator){
        
        $this->Operator->inActivate($id_operator);
        Alert::success('Success', 'Data Berhasil Dinonaktifkan');
        return redirect()->route('master.index');
      }

      public function activateOperator($id_operator){
        
        $this->Operator->activate($id_operator);
        Alert::success('Success', 'Data Berhasil Diaktifkan');
        return redirect()->route('master.index');
      }

      public function storeLokasi(Request $request){
        Request()->validate( [
            'nama_lokasi' => 'required',
        ],[
          'nama_lokasi.required'=>'Nama Lokasi Harus Diisi',
        ]);
  
        $data = [
                'nama_lokasi' => Request()->nama_lokasi,
                'status'=> 1,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ];
            $this->Lokasi->addData($data);
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return redirect()->route('master.index');
      }

      public function updateLokasi($id_lokasi)
      {
        
        Request()->validate( [
            'nama_lokasi' => 'required',
        ],[
          'nama_lokasi.required'=>'Nama Lokasi Harus Diisi',
        ]);
        $data = [
                'nama_lokasi' => Request()->nama_lokasi,
                'updated_at'      => \Carbon\Carbon::now()
            ];
            $this->Lokasi->updateData($id_lokasi,$data);
            Alert::success('Success', 'Data Berhasil Diedit');
            return redirect()->route('master.index');
      }

      public function inActivateLokasi($id_lokasi){
        
        $this->Lokasi->inActivate($id_lokasi);
        Alert::success('Success', 'Data Berhasil Dinonaktifkan');
        return redirect()->route('master.index');
      }

      public function activateLokasi($id_lokasi){
        
        $this->Lokasi->activate($id_lokasi);
        Alert::success('Success', 'Data Berhasil Diaktifkan');
        return redirect()->route('master.index');
      }

      public function storeKeterangan(Request $request){
        Request()->validate( [
            'nama_ket' => 'required',
        ],[
          'nama_ket.required'=>'Keterangan Harus Diisi',
        ]);
  
        $data = [
                'nama_ket' => Request()->nama_ket,
                'status'=> 1,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ];
            $this->Keterangan->addData($data);
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return redirect()->route('master.index');
      }

      public function updateKeterangan($id_keterangan)
      {
        
        Request()->validate( [
            'nama_ket' => 'required',
        ],[
          'nama_ket.required'=>'Keterangan Harus Diisi',
        ]);
        $data = [
                'nama_ket' => Request()->nama_ket,
                'updated_at'      => \Carbon\Carbon::now()
            ];
            $this->Keterangan->updateData($id_keterangan,$data);
            Alert::success('Success', 'Data Berhasil Diedit');
            return redirect()->route('master.index');
      }

      public function inActivateKeterangan($id_keterangan){
        
        $this->Keterangan->inActivate($id_keterangan);
        Alert::success('Success', 'Data Berhasil Dinonaktifkan');
        return redirect()->route('master.index');
      }

      public function activateKeterangan($id_keterangan){
        
        $this->Keterangan->activate($id_keterangan);
        Alert::success('Success', 'Data Berhasil Diaktifkan');
        return redirect()->route('master.index');
      }

      public function updateTarget($id)
      {
        Request()->validate( [
            'target' => 'required',
        ],[
          'target.required'=>'Target Harus Diisi',
        ]);
        $data = [
                'target' => Request()->target,
                'updated_at'      => \Carbon\Carbon::now()
            ];
            $this->Target->updateTarget($id,$data);
            Alert::success('Success', 'Data Berhasil Diubah');
            return redirect()->route('master.index')->with('success','data berhasil diubah');
      }

      public function truncate(){
        $this->SaranaDiuji->truncate();
        Alert::success('Success', 'Tabel Uji Sarana Berhasil Direset');
        return redirect()->route('master.index');
      }

      public function dashboard(){
        $data=[
          'log'=>$this->ActivityLog->allData()
        ];
        
        //dd($data);
        return view('masterData.dashboard.index', $data);
      }
}
