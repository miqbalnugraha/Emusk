@extends('layout.navBar')
@section('subTitle','Master Data')
@section('subTitle1','Master Data')
@section('content')
  <section class="content">
    <div class="container-fluid">

      <div class="row">        
        <div class="col-6">
          <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">Target Uji Sarana</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <div style="text-align: center">Target uji sarana per PK saat ini adalah:<br><h3><b>{{ $pk->target }}</b><br></h3>
              <a class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target="#pk">Ubah Target</a><br><h3>...</h3>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-6">
          <div class="card card-warning card-outline">
            <div class="card-header">
                <h3 class="card-title">Reset Tabel Data Uji Sarana</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <div style="text-align: center">Jumlah data di tabel Uji Sarana adalah:<br><h3><b>{{ $sarana }}</b><br></h3>
              <a class="btn btn-danger btn-rounded btn-fw" data-toggle="modal" data-target="#reset">Reset Data</a><br><h3>...</h3>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Daftar Jenis Sarana Aktif</h3>
                <a class="btn btn-warning btn-rounded btn-fw float-right" data-toggle="modal" data-target="#sarana"><i class="fa fa-plus"></i> Tambah Data Baru</a>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Jenis Sarana</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach($sarana_aktif as $data)
                <tr>
                  <td>{{ $data->id_sarana }}</td>
                  <td>{{$data->nama_sarana}}</td>
                  <td><a data-toggle="modal" data-target="#edit-sarana-{{$data->id_sarana}}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{route('inActivate.sarana',$data->id_sarana)}}" class="btn btn-sm btn-danger">Nonaktifkan</a>
                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-6">
          <div class="card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title">Daftar Jenis Sarana Tidak Aktif</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Jenis Sarana</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach($sarana_nonAktif as $data)
                <tr>
                  <td>{{$data->id_sarana }}</td>
                  <td>{{$data->nama_sarana}}</td>
                  <td><a href="{{route('activate.sarana',$data->id_sarana)}}" class="btn btn-sm btn-success">Aktifkan</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Daftar Operator Aktif</h3>
                <a class="btn btn-warning btn-rounded btn-fw float-right" data-toggle="modal" data-target="#operator"><i class="fa fa-plus"></i> Tambah Data Baru</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Operator</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach($operator_aktif as $data)
                <tr>
                  <td>{{ $data->id_operator }}</td>
                  <td>{{$data->nama_operator}}</td>
                  <td><a data-toggle="modal" data-target="#edit-operator-{{$data->id_operator}}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{route('inActivate.operator',$data->id_operator)}}" class="btn btn-sm btn-danger">Nonaktifkan</a>
                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-6">
          <div class="card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title">Daftar Operator Tidak Aktif</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Operator</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach($operator_nonAktif as $data)
                <tr>
                  <td>{{ $data->id_operator }}</td>
                  <td>{{$data->nama_operator}}</td>
                  <td><a href="{{route('activate.operator',$data->id_operator)}}" class="btn btn-sm btn-success">Aktifkan</a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Daftar Lokasi Aktif</h3>
                <a class="btn btn-warning btn-rounded btn-fw float-right" data-toggle="modal" data-target="#lokasi"><i class="fa fa-plus"></i> Tambah Data Baru</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example5" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Lokasi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach($lokasi_aktif as $data)
                <tr>
                  <td>{{ $data->id_lokasi }}</td>
                  <td>{{$data->nama_lokasi}}</td>
                  <td><a data-toggle="modal" data-target="#edit-lokasi-{{$data->id_lokasi}}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{route('inActivate.lokasi',$data->id_lokasi)}}" class="btn btn-sm btn-danger">Nonaktifkan</a>
                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-6">
          <div class="card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title">Daftar Lokasi Tidak Aktif</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example6" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Lokasi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach($lokasi_nonAktif as $data)
                <tr>
                  <td>{{ $data->id_lokasi }}</td>
                  <td>{{$data->nama_lokasi}}</td>
                  <td><a href="{{route('activate.lokasi',$data->id_lokasi)}}" class="btn btn-sm btn-success">Aktifkan</a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Daftar Keterangan Aktif</h3>
                <a class="btn btn-warning btn-rounded btn-fw float-right" data-toggle="modal" data-target="#ket"><i class="fa fa-plus"></i> Tambah Data Baru</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example7" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Keterangan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach($ket_aktif as $data)
                <tr>
                  <td>{{ $data->id_keterangan }}</td>
                  <td>{{$data->nama_ket}}</td>
                  <td><a data-toggle="modal" data-target="#edit-ket-{{$data->id_keterangan}}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{route('inActivate.ket',$data->id_keterangan)}}" class="btn btn-sm btn-danger">Nonaktifkan</a>
                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-6">
          <div class="card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title">Daftar Keterangan Tidak Aktif</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example8" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Keterangan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach($ket_nonAktif as $data)
                <tr>
                  <td>{{ $data->id_keterangan }}</td>
                  <td>{{$data->nama_ket}}</td>
                  <td><a href="{{route('activate.ket',$data->id_keterangan)}}" class="btn btn-sm btn-success">Aktifkan</a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <div class="modal fade" id="sarana">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Jenis Sarana Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="/masterData/sarana/store" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="nama_sarana">Nama Sarana</label>
                  <input type="text" class="form-control @error('nama_sarana') is-invalid @enderror" name="nama_sarana" id="nama_sarana" required>
                    @error('nama_sarana')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @foreach ($sarana_aktif as $data )
    <div class="modal fade" id="edit-sarana-{{$data->id_sarana}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Jenis Sarana {{$data->nama_sarana}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="/masterData/sarana/update/{{ $data->id_sarana }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="nama_sarana">Nama Sarana</label>
                  <input type="text" class="form-control @error('nama_sarana') is-invalid @enderror" name="nama_sarana" id="nama_sarana" value="{{ $data->nama_sarana }}">
                    @error('nama_sarana')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endforeach
    <!-- /.modal -->

    <div class="modal fade" id="operator">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Operator Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('store.operator') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="nama_operator">Nama Operator</label>
                  <input type="text" class="form-control @error('nama_operator') is-invalid @enderror" name="nama_operator" id="nama_operator" required>
                    @error('nama_operator')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @foreach ($operator_aktif as $data )
    <div class="modal fade" id="edit-operator-{{$data->id_operator}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Operator {{$data->nama_operator}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('update.operator',$data->id_operator) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="nama_operator">Nama Operator</label>
                  <input type="text" class="form-control @error('nama_operator') is-invalid @enderror" name="nama_operator" id="nama_operator" value="{{ $data->nama_operator }}">
                    @error('nama_operator')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endforeach
    <!-- /.modal -->

    <div class="modal fade" id="lokasi">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Lokasi Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('store.lokasi') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="nama_lokasi">Nama Lokasi</label>
                  <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror" name="nama_lokasi" id="nama_lokasi" required>
                    @error('nama_lokasi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @foreach ($lokasi_aktif as $data )
    <div class="modal fade" id="edit-lokasi-{{$data->id_lokasi}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Lokasi {{$data->nama_lokasi}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('update.lokasi',$data->id_lokasi) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="nama_lokasi">Nama Lokasi</label>
                  <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror" name="nama_lokasi" id="nama_lokasi" value="{{ $data->nama_lokasi }}">
                    @error('nama_lokasi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endforeach
    <!-- /.modal -->

    <div class="modal fade" id="ket">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Keterangan Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('store.ket') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="nama_ket">Keterangan</label>
                  <input type="text" class="form-control @error('nama_ket') is-invalid @enderror" name="nama_ket" id="nama_ket" required>
                    @error('nama_ket')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @foreach ($ket_aktif as $data )
    <div class="modal fade" id="edit-ket-{{$data->id_keterangan}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Keterangan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('update.ket',$data->id_keterangan) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="nama_ket">Keterangan</label>
                  <input type="text" class="form-control @error('nama_ket') is-invalid @enderror" name="nama_ket" id="nama_ket" value="{{ $data->nama_ket }}">
                    @error('nama_ket')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endforeach
    <!-- /.modal -->

    <div class="modal fade" id="pk">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Target PK</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('update.target',$pk->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="target">Target</label>
                  <input type="hidden" name="id" id="id" value="{{ $pk->id }}" required>
                  <input type="text" class="form-control @error('target') is-invalid @enderror" name="target" id="target" value="{{ $pk->target }}" required>
                    @error('target')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="tugas">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Target per Surat Tugas</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('update.target',$tugas->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="target">Target</label>
                  <input type="hidden" name="id" id="id" value="{{ $tugas->id }}" required>
                  <input type="text" class="form-control @error('target') is-invalid @enderror" name="target" id="target" value="{{ $tugas->target }}" required>
                    @error('target')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
    <div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="smallModelLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-center">Reset Confirmation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>        
            <div class="modal-body">
                <h5 class="text-center">Apakah anda yakin akan mereset tabel uji sarana?<br></h5>
                <h6 class="text-center"><strong>Tabel yang sudah direset tidak akan bisa dipulihkan kembali!</strong><h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="{{ route('truncate') }}" type="button" class="btn btn-danger">Yes, reset</a>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  </section>
@endsection

@section('js')
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 5,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 5,
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 5,
    });
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 5,
    });
    $('#example5').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 5,
    });
    $('#example6').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 5,
    });
    $('#example7').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 5,
    });
    $('#example8').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 5,
    });
  });
</script>
@endsection
