@extends('layout.navBar')
@section('subTitle','Input Data Pengujian Sarana')
@section('subTitle1','Data Sarana Diuji')
@section('subTitle2','Input Data')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12" style="margin: auto">
          <!-- general form elements -->
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Input Data Baru</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('data.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">                  
                  <input type="hidden" class="form-control" name="user" id="user" value="{{ Auth::user()->id }}">
                </div>

                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="identitas">Identitas Sarana</label>
                    <input type="text" class="form-control @error('identitas') is-invalid @enderror" name="identitas" id="identitas" value="{{ old('identitas') }}">
                      @error('identitas')
                          <div class="text-danger">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label>Operator</label>
                    <select name="operator" id="operator" class="form-control select2">
                      <option value="">Pilih Operator</option>
                      @foreach ($operator as $data)
                        <option value="{{$data->id_operator}}" {{ old('operator')==$data->id_operator ? 'selected' : '' }}>{{$data->nama_operator}}</option>
                      @endforeach
                    </select>
                    @error('operator')
                        <div class="btn-sm btn-danger">{{ $message }}</div>
                    @enderror
                  </div>  

                  <div class="form-group">
                    <label>Wilayah</label>
                    <select name="wilayah" id="wilayah" class="form-control select2">
                      <option value="">Pilih Wilayah</option>
                        <option value="1" {{ old('wilayah')=='1' ? 'selected' : '' }}>Wilayah I</option>
                        <option value="2" {{ old('wilayah')=='2' ? 'selected' : '' }}>Wilayah II</option>
                    </select>
                    @error('wilayah')
                        <div class="btn-sm btn-danger">{{ $message }}</div>
                    @enderror
                  </div>     

                  <div class="form-group">
                    <label>Tanggal Pengujian</label>
                      <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                          <input value="{{ old('tgl_pengujian') }}" name="tgl_pengujian" id="tgl_pengujian" type="text" class="form-control datetimepicker-input @error('tgl_pengujian') is-invalid @enderror" data-target="#datetimepicker4"/>
                          <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                      @error('tgl_pengujian')
                          <div class="btn-sm btn-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Jenis Sarana</label>
                    <select name="jenis_sarana" id="jenis_sarana" class="form-control select2">
                      <option value="">Pilih Jenis Sarana</option>
                      @foreach ($jenis_sarana as $data)
                        <option value="{{$data->id_sarana}}" {{ old('jenis_sarana')==$data->id_sarana ? 'selected' : '' }}>{{$data->nama_sarana}}</option>
                      @endforeach
                    </select>
                    @error('jenis_sarana')
                        <div class="btn-sm btn-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Lokasi</label>
                    <select name="lokasi" id="lokasi" class="form-control select2">
                      <option value="">Pilih Lokasi</option>
                      @foreach ($lokasi as $data)
                        <option value="{{$data->id_lokasi}}" {{ old('lokasi')==$data->id_lokasi ? 'selected' : '' }}>{{$data->nama_lokasi}}</option>
                      @endforeach
                    </select>
                    @error('lokasi')
                        <div class="btn-sm btn-danger">{{ $message }}</div>
                    @enderror
                  </div>                                                 
  
                  <div class="form-group">
                    <label>Jenis Pengujian</label>
                    <select name="jenis_pengujian" id="jenis_pengujian" class="form-control select2">
                      <option value="">Pilih Jenis Pengujian</option>
                        <option value="Uji Berkala" {{ old('jenis_pengujian')=='Uji Berkala' ? 'selected' : '' }}>Uji Berkala</option>
                        <option value="Uji Pertama" {{ old('jenis_pengujian')=='Uji Pertama' ? 'selected' : '' }}>Uji Pertama</option>
                    </select>
                    @error('jenis_pengujian')
                        <div class="btn-sm btn-danger">{{ $message }}</div>
                    @enderror
                  </div>       

                  <div class="form-group">
                    <label>Status Uji</label>
                      <select name="status_uji" id="status_uji" class="form-control select2">
                          <option value="">Pilih Status Uji</option>
                          <option value="1" {{ old('status_uji')=='1' ? 'selected' : '' }}>Lulus</option>
                          <option value="2" {{ old('status_uji')=='2' ? 'selected' : '' }}>Tidak Lulus</option>
                          <option value="3" {{ old('status_uji')=='3' ? 'selected' : '' }}>Pending</option>
                          <option value="4" {{ old('status_uji')=='4' ? 'selected' : '' }}>Belum Diuji</option>
                      </select>
                      @error('status_uji')
                          <div class="btn-sm btn-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                </div>              
                
                <div class="form-group">
                  <label>Keterangan (optional)</label>
                  <select name="keterangan" id="keterangan" class="form-control select2">
                    <option value="">Pilih Keterangan</option>
                    @foreach ($keterangan as $data)
                      <option value="{{$data->id_keterangan}}" {{ old('keterangan')==$data->id_keterangan ? 'selected' : '' }}>{{$data->nama_ket}}</option>
                    @endforeach
                  </select>
                  @error('keterangan')
                      <div class="btn-sm btn-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
                <a href="/inputData" class="btn btn-default ">Back</a>
              </div>

            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      <!-- /.row -->
    </div>
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
@section('js')
  <script type="text/javascript">
  $(function () {
    bsCustomFileInput.init();
  });

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#datetimepicker4').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

  })


  </script>

@endsection
