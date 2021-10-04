@extends('layout.navBar')
@section('subTitle','Data User E-MUSK')
@section('subTitle1','Data User')
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="col-lg-2">
                <a class="btn btn-primary btn-rounded btn-fw" data-toggle="modal" data-target="#register"><i class="fa fa-plus"></i> Tambah User Baru</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($users as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->username}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->level}}</td>
                  <td>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <button type="button" class="btn btn-flat btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                          Action
                        </button>
                        <div class="dropdown-menu">
                          <a data-toggle="modal" data-target="#edit-{{$data->id}}" class="btn btn-sm dropdown-item">Edit</a>
                          <a data-toggle="modal" data-target="#password-{{$data->id}}" class="btn btn-sm dropdown-item">Ubah password</a>
                        </div>
                      </div>
                    <!-- /btn-group -->
                  </div>
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
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <div class="modal fade" id="register">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Register User Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                  </div>
                  @error('name')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-at"></span>
                        </div>
                      </div>
                  </div>
                  @error('username')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required autocomplete="current-password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                 </div>
                 @error('password')
                     <div class="text-danger">{{ $message }}</div>
                 @enderror
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password" required autocomplete="current-password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                </div>

              <div class="form-group">
                  <select name="level" id="level" class="form-control select2">
                      <option value="">Pilih Level User</option>
                      <option value="Admin">Admin</option>
                      <option value="User">User</option>
                  </select>
                  @error('level')
                      <div class="btn-sm btn-danger">{{ $message }}</div>
                  @enderror
              </div>

              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Register</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @foreach ($users as $data)
    <div class="modal fade" id="edit-{{$data->id}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('user.update',$data->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ $data->name }}" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>                     
                  </div>
                  @error('name')
                  <div class="text-danger">{{ $message }}</div>
                   @enderror
                </div>

                <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ $data->email }}" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" value="{{ $data->username }}" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-at"></span>
                        </div>
                      </div>
                  </div>
                  @error('username')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                @if($data->level=='Master')
                <div class="form-group">
                  <select name="level" id="level" class="form-control select2">
                      <option value="Master">Master</option>
                  </select>
                </div>
                @error('level')
                    <div class="btn-sm btn-danger">{{ $message }}</div>
                @enderror
                @else
                <div class="form-group">
                    <select name="level" id="level" class="form-control select2">
                        <option value="">Pilih Level User</option>
                        <option value="Admin" @if ($data->level=='Admin') selected @endif>Admin</option>
                        <option value="User" @if ($data->level=='User') selected @endif>User</option>
                    </select>
                </div>
                @error('level')
                    <div class="btn-sm btn-danger">{{ $message }}</div>
                @enderror
                @endif

              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Update</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @endforeach

    @foreach ($users as $data)
    <div class="modal fade" id="password-{{$data->id}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah password {{ $data->name }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('user.password',$data->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required autocomplete="current-password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                 </div>
                 @error('password')
                     <div class="text-danger">{{ $message }}</div>
                 @enderror
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password" required autocomplete="current-password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                </div>

              </div>              
              <!-- /.card-body -->
              
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary float-right" id="submit">Update</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @endforeach

  </section>
  <!-- /.content -->
@endsection
@section('js')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>
<script type="text/javascript">
  @if (count($errors) > 0)
  $(window).load(function(){
    swal("Error!", "Gagal", "error");
  });
  @endif
  </script>
@endsection
