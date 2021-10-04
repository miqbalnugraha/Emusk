@extends('layout.navBar')
@section('subTitle','File Excel')
@section('subTitle1','Excel')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">File Excel</h3>
          </div>
          <div class="card-body">
            <h4>Uji Sarana</h4>
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-sudah-tab" data-toggle="pill" href="#vert-tabs-sudah" role="tab" aria-controls="vert-tabs-sudah" aria-selected="true">Sudah diuji</a>
                  <a class="nav-link" id="vert-tabs-belum-tab" data-toggle="pill" href="#vert-tabs-belum" role="tab" aria-controls="vert-tabs-belum" aria-selected="false">Belum diuji</a>
                  <a class="nav-link" id="vert-tabs-pending-tab" data-toggle="pill" href="#vert-tabs-pending" role="tab" aria-controls="vert-tabs-pending" aria-selected="false">Pending</a>
                  <a class="nav-link" id="vert-tabs-pending-tab" data-toggle="pill" href="#vert-tabs-olah" role="tab" aria-controls="vert-tabs-olah" aria-selected="false">Olah Data</a>
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-sudah" role="tabpanel" aria-labelledby="vert-tabs-sudah-tab">
                     File excel sarana sudah diuji<br>
                     @foreach($sudah as $data)
                      @if ($data->file_path != NULL)
                      Terakhir update: {{ $data->updated_at }}  <br>                     
                      @endif
                     <a href="{{ route('excel.downloadSudah',$data->id) }}" class="btn btn-info btn-rounded btn-fw">Download</a>
                     @endforeach
                     @if(Auth::user()->level=="Master")
                     <a class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target="#update-sudah">Update</a>
                     @endif
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-belum" role="tabpanel" aria-labelledby="vert-tabs-belum-tab">
                    File excel sarana belum diuji<br>
                    @foreach($belum as $data)
                      @if ($data->file_path != NULL)
                      Terakhir update: {{ $data->updated_at }}  <br>                     
                      @endif                    
                    <a class="btn btn-info btn-rounded btn-fw" href="{{ route('excel.downloadBelum',$data->id) }}">Download</a>
                    @endforeach
                    @if(Auth::user()->level=="Master")
                     <a class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target="#update-belum">Update</a>
                     @endif
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-pending" role="tabpanel" aria-labelledby="vert-tabs-pending-tab">
                    File excel sarana pending<br>
                    @foreach($pending as $data)
                      @if ($data->file_path != NULL)
                      Terakhir update: {{ $data->updated_at }}  <br>                     
                      @endif                    
                    <a class="btn btn-info btn-rounded btn-fw" href="{{ route('excel.downloadPending',$data->id) }}">Download</a>
                    @endforeach
                    @if(Auth::user()->level=="Master")
                     <a class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target="#update-pending">Update</a>
                     @endif
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-olah" role="tabpanel" aria-labelledby="vert-tabs-olah-tab">
                    File excel olah data per <b> 6</b> bulan<br>
                    @foreach($olah1 as $data)
                      @if ($data->file_path != NULL)
                      Terakhir update: {{ $data->updated_at }}  <br>                     
                      @endif                    
                    <a class="btn btn-info btn-rounded btn-fw" href="{{ route('excel.downloadOlah1',$data->id) }}">Download</a>
                    @endforeach
                    @if(Auth::user()->level=="Master")
                     <a class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target="#update-olah1">Update</a> <br><br>
                     @endif
                     File excel olah data per <b> 12</b> bulan<br>
                    @foreach($olah2 as $data)
                      @if ($data->file_path != NULL)
                      Terakhir update: {{ $data->updated_at }}  <br>                     
                      @endif                    
                    <a class="btn btn-info btn-rounded btn-fw" href="{{ route('excel.downloadOlah2',$data->id) }}">Download</a>
                    @endforeach
                    @if(Auth::user()->level=="Master")
                     <a class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target="#update-olah2">Update</a>
                     @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    @foreach ($sudah as $data )
    <div class="modal fade" id="update-sudah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update File Excel Sarana {{ $data->name }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form name="excel" method="POST" action="{{ route('excel.updateSudah',$data->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Nama File</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $data->name }}" disabled>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="file">Pilih File Excel</label>
                  <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file" required>
                    @error('file')
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
    @endforeach

    @foreach ($belum as $data )
    <div class="modal fade" id="update-belum">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update File Excel Sarana {{ $data->name }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form name="excel" method="POST" action="{{ route('excel.updateBelum',$data->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Nama File</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $data->name }}" disabled>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="file">Pilih File Excel</label>
                  <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file" required>
                    @error('file')
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
    @endforeach

    @foreach ($pending as $data )
    <div class="modal fade" id="update-pending">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update File Excel Sarana {{ $data->name }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form name="excel" method="POST" action="{{ route('excel.updatePending',$data->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Nama File</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $data->name }}" disabled>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="file">Pilih File Excel</label>
                  <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file" required>
                    @error('file')
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
    @endforeach

    @foreach ($olah1 as $data )
    <div class="modal fade" id="update-olah1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update File Excel Sarana {{ $data->name }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form name="excel" method="POST" action="{{ route('excel.updateOlah1',$data->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Nama File</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $data->name }}" disabled>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="file">Pilih File Excel</label>
                  <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file" required>
                    @error('file')
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
    @endforeach

    @foreach ($olah2 as $data )
    <div class="modal fade" id="update-olah2">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update File Excel Sarana {{ $data->name }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form name="excel" method="POST" action="{{ route('excel.updateOlah2',$data->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="name">Nama File</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $data->name }}" disabled>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="file">Pilih File Excel</label>
                  <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file" required>
                    @error('file')
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
    @endforeach

  </section>
@endsection

