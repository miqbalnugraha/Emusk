@extends('layout.navBar')
@section('subTitle','Monitoring Uji Sarana Kereta Api')
@section('subTitle1','Dashboard')
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small Box (Stat card) -->
      <div class="col-12">
          <div class="card-header text-center bg-gray-dark text-white">
            <div class="d-flex align-items-center">
                 <h2 class="mx-auto w-100">Kinerja Tahun 20{{ date('y') }} Seksi Pengujian Sarana Perkeretaapian</h2>
                 <i class="fa fa-question-circle ml-auto"></i>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-4 col-sm-6 col-12 mx-auto">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span>    
                  <div class="info-box-content">
                    <span class="info-box-text">Total</span>
                    <span class="info-box-number"><h2><strong>{{ $kinerja }}</strong></h2></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            </div>
            <div class="col-md-9 mx-auto">
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-check"></i></span>    
                        <div class="info-box-content">
                          <span class="info-box-text">Lulus</span>
                          <span class="info-box-number">{{ $lulus }}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                      <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-times"></i></span>
          
                        <div class="info-box-content">
                          <span class="info-box-text">Tidak Lulus</span>
                          <span class="info-box-number">{{ $tidakLulus }}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                      <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-exclamation"></i></span>
          
                        <div class="info-box-content">
                          <span class="info-box-text">Pending</span>
                          <span class="info-box-number">{{ $pending }}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                  </div>
                </div>
                <!-- /.card-body -->
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      <!-- /.col -->
      <div class="row">
        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header text-center bg-gray-dark text-white">
            <div class="d-flex align-items-center">
                 <h4 class="mx-auto w-100"><i class="fas fa-rss"></i> PK</h4>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 mx-auto">
                  <!-- small card -->
                  <div class="small-box bg-olive">
                    <div class="inner">                      
                      <strong><span style="font-size: 40px;">{{ $kinerja }} </span></strong> <span style="font-size: 15px;"> / {{ $pk->target }}</span>
                      <span><br>Kinerja<br></span>                      
                      <strong><span style="text-align:center;font-size: 30px">@if($pk->target!=0){{ number_format($kinerja/$pk->target*100,1) }} % @else 0 @endif </span></strong>
                    </div>
                    <div class="icon">
                      <i class="fas fa-check"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">  
                <?php $sisa=$pk->target-$kinerja ?>
                      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                      <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar','corechart']});
                        google.charts.setOnLoadCallback(drawChartBar);
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChartBar() {
                          var data = google.visualization.arrayToDataTable([
                            ['Kinerja', 'Sudah Diuji','Target PK'],
                            ['Realisasi',     <?php echo $kinerja ?>, <?php echo $pk->target ?>]
                          ]);
                          var options = {
                            width: 500,
                            chart: {                              
                              title: 'Kinerja Tahun 20<?php echo date('y') ?>',
                              subtitle: 'Seksi Pengujian Sarana Perkeretaapian',
                            },
                            bars: 'vertical',
                            vAxis: {format: 'decimal'},
                            height: 600,
                            colors: ['#1b9e77', '#d95f02', '#7570b3']
                          };
                          var chart = new google.charts.Bar(document.getElementById('piechart'));
                          chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            ['Sudah Diuji',     <?php echo $sudah ?>],
                            ['Belum Diuji',     <?php echo $belum ?>],
                          ]);
                          var options = {
                            chartArea:{left:10,top:20,width:"50%",height:"60%"},
                            backgroundColor: 'transparent',
                            'legend': {'position': 'bottom'},
                          };
                          var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                          chart.draw(data, options);
                        }
                      </script>
                      <div id="piechart" style="width: 900px; height: 668px;"></div>
                  </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <div class="card card-default">
            <div class="card-header text-center bg-gray-dark text-white">
            <div class="d-flex align-items-center">
                 <h4 class="mx-auto"><i class="fas fa-receipt"></i> Penugasan</h4>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <!-- small card -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <strong><span style="font-size: 40px;">{{ $kinerja }} </span></strong> <span style="font-size: 15px;"> / {{ $penugasan }}</span>
                      <span><br>Realisasi<br></span>
                      <strong><span style="text-align:center;font-size: 30px">@if($penugasan!=0){{ number_format($kinerja/$penugasan*100,1) }} % @else 0 @endif </span></strong>
                    </div>
                    <div class="icon">
                      <i class="fas fa-check"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <!-- small card -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <strong><span style="font-size: 40px;">{{ $sudah }} </span></strong> <span style="font-size: 15px;"> / {{ $penugasan }}</span>
                      <span><br>Sudah Diuji<br></span>
                      <strong><span style="text-align:center;font-size: 30px">@if($penugasan!=0){{ number_format($sudah/$penugasan*100,1) }} % @else 0 @endif </span></strong>
                    </div>
                    <div class="icon">
                      <i class="fas fa-check"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <!-- small card -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <strong><span style="font-size: 40px;">{{ $belum }} </span></strong> <span style="font-size: 15px;"> / {{ $penugasan }}</span>
                      <span><br>Belum Diuji<br></span>
                      <strong><span style="font-size: 30px;">@if($penugasan!=0){{ number_format($belum/$penugasan*100,1) }} % @else 0 @endif </span></strong>
                    </div>
                    <div class="icon">
                      <i class="fas fa-exclamation"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                      <div id="piechart2" style="width: 900px; height: 500px;"></div>
                  </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="card-header text-center bg-gray-dark text-white">
            <div class="d-flex align-items-center">
                 <h3 class="mx-auto w-100">Data Pengujian Sarana</h3>
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
                        <option value="1">Lulus</option>
                        <option value="2">Tidak Lulus</option>
                        <option value="3">Pending</option>
                        <option value="4">Belum Diuji </option>
                      </select>
              </div>
              <div class="col-sm-2">
                      <select id="keterangan" class="form-control filter">
                        <option value="">Keterangan...</option>
                        @foreach ($keterangan as $data)
                        <option value="{{ $data->id_keterangan }}">{{ $a++ }}. {{ $data->nama_ket }}</option>
                        @endforeach
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
            <br>
            <h4>Export Tabel Pengujian Sarana :  </h4>
            <div class="row"> 
                <div class="col-sm-3">
                    <a  class="btn btn-success btn-rounded btn-fw" href="{{ route('exportAll') }}"> Export Tabel</a>
                </div> 
            </div>
          </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered yajra-datatable">
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
          url: "{{ route('home') }}",
          data: function(d){
            d.jenis_sarana = $('#jenis_sarana').val(),
            d.operator = $('#operator').val(),
            d.lokasi = $('#lokasi').val(),
            d.wilayah = $('#wilayah').val(),
            d.status_uji = $('#status_uji').val(),
            d.keterangan = $('#keterangan').val(),
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

