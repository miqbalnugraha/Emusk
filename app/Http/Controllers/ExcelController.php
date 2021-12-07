<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\ExcelFile;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Response;


class ExcelController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->ExcelFile = new ExcelFile();
      }

    public function index(){
        $data=[
            'sudah'=> $this->ExcelFile->sSudah(),
            'belum'=> $this->ExcelFile->sBelum(),
            'pending'=> $this->ExcelFile->sPending(),
            'olah1'=> $this->ExcelFile->sOlah1(),
            'olah2'=> $this->ExcelFile->sOlah2(),
          ];
        //dd($data);

        return view('excel', $data);
      }

      public function updateSudah(Request $req, $id)
    {

        $validator = Validator::make($req->all(), [
         'file' => 'required|mimes:csv,xlx,xls,xlsx|max:10000',

        ],[
            'file.required' => 'Harus diisi!',
            'file.max' => 'Ukuran file tidak boleh melebihi 10Mb'
        ]);
        if($validator->fails()){
          Alert::error('Error', 'File gagal diupdate');
          return redirect()->route('excel')->withErrors($validator)->withInput();
        }
        $ext = $req->file('file')->extension();
        $path = $req->file('file')->move('files', 'emusk-sarana-sudah-diuji'.'.'.$ext);

        try {
          echo($path);
        } catch(\Exception $ex) {
          Alert::error('Error', 'Data gagal diupdate');
          return back();
        }
        $data=[
          'file_path' => $path,
          'ext'=> $ext,
          'updated_at'      => \Carbon\Carbon::now()
        ];
        $this->ExcelFile->updateData($id, $data);
        Alert::success('Success', 'file berhasil diupdate');
        return redirect()->route('excel');
      }

      public function updateBelum(Request $req, $id)
    {

        $validator = Validator::make($req->all(), [
         'file' => 'required|mimes:csv,xlx,xls,xlsx|max:10000',

        ],[
            'file.required' => 'Harus diisi!',
            'file.max' => 'Ukuran file tidak boleh melebihi 10MB'
        ]);
        if($validator->fails()){
          Alert::error('Error', 'File gagal diupdate');
          return redirect()->route('excel')->withErrors($validator)->withInput();
        }
        $ext = $req->file('file')->extension();
        $path = $req->file('file')->move('files', 'emusk-sarana-belum-diuji'.'.'.$ext);

        try {
          echo($path);
        } catch(\Exception $ex) {
          Alert::error('Error', 'Data gagal diupdate');
          return back();
        }
        $data=[
          'file_path' => $path,
          'ext'=>$ext,
          'updated_at'      => \Carbon\Carbon::now()
        ];
        $this->ExcelFile->updateData($id, $data);
        Alert::success('Success', 'file berhasil diupdate');
        return redirect()->route('excel');
      }

      public function updatePending(Request $req, $id)
    {

        $validator = Validator::make($req->all(), [
         'file' => 'required|mimes:csv,xlx,xls,xlsx|max:10000',

        ],[
            'file.required' => 'Harus diisi!',
            'file.max' => 'Ukuran file tidak boleh melebihi 10MB'
        ]);
        if($validator->fails()){
          Alert::error('Error', 'File gagal diupdate');
          return redirect()->route('excel')->withErrors($validator)->withInput();
        }
        $ext = $req->file('file')->extension();
        $path = $req->file('file')->move('files', 'emusk-sarana-diuji-pending'.'.'.$ext);

        try {
          echo($path);
        } catch(\Exception $ex) {
          Alert::error('Error', 'Data gagal diupdate');
          return back();
        }
        $data=[
          'file_path' => $path,
          'ext'=> $ext,
          'updated_at'      => \Carbon\Carbon::now()
        ];
        $this->ExcelFile->updateData($id, $data);
        Alert::success('Success', 'file berhasil diupdate');
        return redirect()->route('excel');
      }
      public function updateOlah1(Request $req, $id)
    {

        $validator = Validator::make($req->all(), [
         'file' => 'required|mimes:csv,xlx,xls,xlsx|max:10000',

        ],[
            'file.required' => 'Harus diisi!',
            'file.max' => 'Ukuran file tidak boleh melebihi 10MB'
        ]);
        if($validator->fails()){
          Alert::error('Error', 'File gagal diupdate');
          return redirect()->route('excel')->withErrors($validator)->withInput();
        }
        $ext = $req->file('file')->extension();
        $path = $req->file('file')->move('files', 'emusk-sarana-diuji-olah-data-6-bulan'.'.'.$ext);

        try {
          echo($path);
        } catch(\Exception $ex) {
          Alert::error('Error', 'Data gagal diupdate');
          return back();
        }
        $data=[
          'file_path' => $path,
          'ext'=> $ext,
          'updated_at'      => \Carbon\Carbon::now()
        ];
        $this->ExcelFile->updateData($id, $data);
        Alert::success('Success', 'file berhasil diupdate');
        return redirect()->route('excel');
      }
      public function updateOlah2(Request $req, $id)
    {

        $validator = Validator::make($req->all(), [
         'file' => 'required|mimes:csv,xlx,xls,xlsx|max:10000',

        ],[
            'file.required' => 'Harus diisi!',
            'file.max' => 'Ukuran file tidak boleh melebihi 10MB'
        ]);
        if($validator->fails()){
          Alert::error('Error', 'File gagal diupdate');
          return redirect()->route('excel')->withErrors($validator)->withInput();
        }
        $ext = $req->file('file')->extension();
        $path = $req->file('file')->move('files', 'emusk-sarana-diuji-olah-data-12-bulan'.'.'.$ext);

        try {
          echo($path);
        } catch(\Exception $ex) {
          Alert::error('Error', 'Data gagal diupdate');
          return back();
        }
        $data=[
          'file_path' => $path,
          'ext'=> $ext,
          'updated_at'      => \Carbon\Carbon::now()
        ];
        $this->ExcelFile->updateData($id, $data);
        Alert::success('Success', 'file berhasil diupdate');
        return redirect()->route('excel');
      }

      public function downloadSudah($id)
      {
        $ext = DB::table('excel')->orderBy('ext','asc')->where('id',$id)->get();
        foreach($ext as $ext2){
          $exten=$ext2->ext;
        }

        $file = public_path('/files/emusk-sarana-sudah-diuji').'.'.$exten;
        $headers = ['Content-Type: file/excel'];
        //dd($file);

        if (file_exists($file)) {
            return \Response::download($file, time().'-Sarana Sudah Diuji'.'.'.$exten, $headers);
        } else {
          Alert::error('Error', 'File not found');
          return back();
        }

      }

      public function downloadBelum($id)
      {
        $ext = DB::table('excel')->orderBy('ext','asc')->where('id',$id)->get();
        foreach($ext as $ext2){
          $exten=$ext2->ext;
        }
        $file = public_path(). '/files/emusk-sarana-belum-diuji'.'.'.$exten;
        $headers = ['Content-Type: file/excel'];

        if (file_exists($file)) {
            return \Response::download($file, time().'-Sarana Belum Diuji'.'.'.$exten, $headers);
        } else {
          Alert::error('Error', 'File not found');
          return back();
        }
        //dd($file);
      }

      public function downloadPending($id)
      {
        $ext = DB::table('excel')->orderBy('ext','asc')->where('id',$id)->get();
        foreach($ext as $ext2){
          $exten=$ext2->ext;
        }
        $file = public_path(). '/files/emusk-sarana-diuji-pending'.'.'.$exten;
        $headers = ['Content-Type: file/excel'];

        if (file_exists($file)) {
            return \Response::download($file, time().'-Sarana Diuji Pending'.'.'.$exten, $headers);
        } else {
          Alert::error('Error', 'File not found');
          return back();
        }
        //dd($file);
      }
      public function downloadOlah1($id)
      {
        $ext = DB::table('excel')->orderBy('ext','asc')->where('id',$id)->get();
        foreach($ext as $ext2){
          $exten=$ext2->ext;
        }
        $file = public_path(). '/files/emusk-sarana-diuji-olah-data-6-bulan'.'.'.$exten;
        $headers = ['Content-Type: file/excel'];

        if (file_exists($file)) {
            return \Response::download($file, time().'-Sarana Diuji olah data 6 bulan'.'.'.$exten, $headers);
        } else {
          Alert::error('Error', 'File not found');
          return back();
        }
        //dd($file);
      }
      public function downloadOlah2($id)
      {
        $ext = DB::table('excel')->orderBy('ext','asc')->where('id',$id)->get();
        foreach($ext as $ext2){
          $exten=$ext2->ext;
        }
        $file = public_path(). '/files/emusk-sarana-diuji-olah-data-12-bulan'.'.'.$exten;
        $headers = ['Content-Type: file/excel'];

        if (file_exists($file)) {
            return \Response::download($file, time().'-Sarana Diuji olah data 12 bulan'.'.'.$exten, $headers);
        } else {
          Alert::error('Error', 'File not found');
          return back();
        }
        //dd($file);
      }

    }
