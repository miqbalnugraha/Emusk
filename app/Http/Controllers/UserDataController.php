<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class UserDataController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->User = new User();
  }

  public function index(){
    $data=[
      'users'=> $this->User->allData(),
    ];
   // dd($data);
    return view('masterData.user.index', $data);
  }

  public function store(Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|unique:users,email|max:255',
      'username' => 'required|unique:users,username|max:255',
      'password' => 'required|confirmed|min:6',
      'level' => 'required',
  ],[
    'name.required'=>'Nama Sarana Harus Diisi',
    'email.required'=>'Email Harus Diisi',
    'email.unique'=>'Email Sudah Ada',
    'username.required'=>'Username Harus Diisi',
    'username.unique'=>'Username Sudah Ada',
    'password.required'=>'Password Harus Diisi',
    'password.confirmed'=>'Password Tidak Sesuai',
    'level.required'=>'Level User Harus Diisi',
  ]);

  $data = [
          'name' => Request()->name,
          'email' => Request()->email,
          'username' => Request()->username,
          'password' => Hash::make(Request()->password),
          'level' => Request()->level,
          'created_at'      => \Carbon\Carbon::now(),
          'updated_at'      => \Carbon\Carbon::now()
      ];
      
      if($validator->fails()){
        Alert::error('Error', 'Data Gagal Ditambahkan');
        return redirect()->route('user.index')->withErrors($validator)->withInput();
      }
      $this->User->addData($data);
      Alert::success('Success', 'Data Berhasil Ditambahkan');
      return redirect()->route('user.index');
  }

  public function update(Request $request,$id){
    
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => "required|unique:users,email,$id,id",
      'username' => "required|unique:users,username,$id,id",
      'level' => 'required',
  ],[
    'name.required'=>'Nama Sarana Harus Diisi',
    'email.required'=>'Email Harus Diisi',
    'email.unique'=>'Email Sudah Ada',
    'username.required'=>'Username Harus Diisi',
    'username.unique'=>'Username Sudah Ada',
    'level.required'=>'Level User Harus Diisi',
  ]);

  $data = [
          'name' => Request()->name,
          'email' => Request()->email,
          'username' => Request()->username,
          'level' => Request()->level,
          'updated_at'      => \Carbon\Carbon::now()
      ];
      if($validator->fails()){
        Alert::error('Error', 'Data Gagal Diubah');
        return redirect()->route('user.index')->withErrors($validator)->withInput();
      }
      $this->User->updateData($id,$data);
      Alert::success('Success', 'Data Berhasil Diubah');
      return redirect()->route('user.index');
  }

  public function updatePassword(Request $request,$id){
    $validator = Validator::make($request->all(), [
      'password' => 'required|confirmed|min:6',
  ],[
    'password.required'=>'Password Harus Diisi',
    'password.confirmed'=>'Password Tidak Sesuai',
  ]);
  $data = [
          'password' => Hash::make(Request()->password),
          'updated_at'      => \Carbon\Carbon::now()
      ];
      if($validator->fails()){
        Alert::error('Error', 'Data Gagal Diubah');
        return redirect()->route('user.index')->withErrors($validator)->withInput();
      }
      $this->User->updateData($id,$data);
      Alert::success('Success', 'Password Berhasil Diubah');
      return redirect()->route('user.index');
  }
}
