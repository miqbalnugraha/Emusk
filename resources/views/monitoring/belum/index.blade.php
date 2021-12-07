@extends('layout.navBar')
@section('subTitle','Sarana Belum Diuji / Pending')
@section('subTitle1','Sarana Belum Diuji')
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Small Box (Stat card) -->
      <div class="col-md-12  mx-auto">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <!-- small card -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <strong><span style="font-size: 40px;">{{ $belum }} </span></strong> <span style="font-size: 15px;"> / {{ $penugasan }} (penugasan)</span>
                    <span><br>Belum Diuji<br></span>
                    <strong><span style="font-size: 30px;">@if($penugasan!=0){{ number_format($belum/$penugasan*100,1) }} % @else 0 % @endif </span></strong>                    
                  </div>
                  <div class="icon">
                    <i class="fas fa-question"></i>
                  </div>
                  <a href="/SaranaBelumDiuji/belum-diuji" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <div class="col-lg-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <strong><span style="font-size: 40px;">{{ $pending }} </span></strong> <span style="font-size: 15px;"> / {{ $kinerja }} (kinerja)</span>
                    <span><br>Pending<br></span>
                    <strong><span style="font-size: 30px;">@if($kinerja!=0){{ number_format($pending/$kinerja*100,1) }} % @else 0 % @endif </span></strong>
                  </div>
                  <div class="icon">
                    <i class="fas fa-exclamation"></i>
                  </div>
                  <a href="/SaranaBelumDiuji/pending" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="card-header text-center bg-teal text-white">
        <div class="d-flex align-items-center">
             <h3 class="mx-auto w-100">Data Uji Sarana Belum Diuji / Pending</h3>
             <i class="fa fa-question-circle ml-auto"></i>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header">
              <h4>Filter :  </h4>
              <div class="row"> 
                <div class="col-sm-2">
                        <select id="jenis_sarana" class="form-control filter">
                          <option value="">Jenis Sarana...</option>
                          @foreach ($jenis_sarana as $data)
                          <option value="{{ $data->id_sarana }}">{{ $data->nama_sarana }}</option>
                          @endforeach
                        </select>
                </div>           
                <div class="col-sm-2">
                        <select id="operator" class="form-control filter">
                          <option value="">Operator...</option>
                          @foreach ($operator as $data)
                          <option value="{{ $data->id_operator }}">{{ $data->nama_operator }}</option>
                          @endforeach
                        </select>
                </div>
                <div class="col-sm-2">
                        <select id="lokasi" class="form-control filter">
                          <option value="">Lokasi...</option>
                          @foreach ($lokasi as $data)
                          <option value="{{ $data->id_lokasi }}">{{ $data->nama_lokasi }}</option>
                          @endforeach
                        </select>
                </div>
                <div class="col-sm-2">
                        <select id="wilayah" class="form-control filter">
                          <option value="">Wilayah...</option>
                          <option value="1">Wilayah I</option>
                          <option value="2">Wilayah II</option>
                        </select>
                </div>
                <div class="col-sm-2">
                        <select id="status_uji" class="form-control filter">
                          <option value="">Status Uji...</option>
                          <option value="3">Pending</option>
                          <option value="4">Belum Diuji</option>
                        </select>
                </div>
              </div>
              <br>
            <h4>Filter Tanggal Pengujian :  </h4>
            <div class="row"> 
              <div class="col-sm-2">
                <div class="input-group date filter2" id="datetimepicker4" data-target-input="nearest">
                          <input placeholder="From" id="tgl_min" name="tgl_min" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4"/>
                          <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
              </div>
              <div class="col-sm-2">
                <div class="input-group date filter2" id="datetimepicker5" data-target-input="nearest">
                          <input placeholder="To" id="tgl_max" name="tgl_max" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker5"/>
                          <div class="input-group-append" data-target="#datetimepicker5" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
              </div>
                <div class="col-sm-3">
                    <a  class="btn btn-info btn-rounded btn-fw" id="btn-seleksi"> Search</a>
                    <a  class="btn btn-warning btn-rounded btn-fw" id="btn-reset"> Reset Tabel</a>
                </div> 
            </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped yajra-datatable">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Identitas Sarana</th>
                  <th>Jenis Sarana</th>
                  <th>Operator</th>
                  <th>Lokasi</th>
                  <th>Wilayah</th>
                  <th>Jenis Pengujian</th>
                  <th>Tanggal Pengujian</th>
                  <th>Status Uji</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
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

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    var table = $('.yajra-datatable').DataTable({
        "responsive": true, "autoWidth": false,
        pageLength: 10,
        lengthChange: true,
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('index.belumDiuji') }}",
          data: function(d){
            d.jenis_sarana = $('#jenis_sarana').val(),
            d.operator = $('#operator').val(),
            d.lokasi = $('#lokasi').val(),
            d.wilayah = $('#wilayah').val(),
            d.status_uji = $('#status_uji').val(),
            d.tgl_min = $('#tgl_min').val(),
            d.tgl_max = $('#tgl_max').val()
          }
        },
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex',searchable: false, orderable: false},
            {data: 'identitas', name: 'sarana_diuji.identitas'},
            {data: 'nama_sarana', name: 'jenis_sarana.nama_sarana'},
            {data: 'nama_operator', name: 'operator.nama_operator'},
            {data: 'nama_lokasi', name: 'lokasi.nama_lokasi'},
            {data: 'wilayah', name: 'sarana_diuji.wilayah'},
            {data: 'jenis_pengujian', name: 'sarana_diuji.jenis_pengujian'},
            {data: 'tgl_pengujian', name: 'sarana_diuji.tgl_pengujian'},
            {data: 'status_uji', name: 'sarana_diuji.status_uji'},
            {data: 'nama_ket', name: 'keterangan.nama_ket'},
        ]
    });
  
    $('.filter').change(function(){
        table.draw();
    });
    $('.filter').select2();
    $('#btn-seleksi').click(function(){
        table.draw();
    });
    $('#btn-reset').click(function(){
      $('#jenis_sarana, #operator, #lokasi, #wilayah, #status_uji, #keterangan, #tgl_min, #tgl_max').val('');
        table.search('').draw();
    });
    $('#datetimepicker4').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#datetimepicker5').datetimepicker({
        format: 'YYYY-MM-DD'
    });


  });

</script>
@endsection
