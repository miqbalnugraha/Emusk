@extends('layout.navBar')
@section('subTitle','Keterangan')
@section('subTitle1','Keterangan')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Pending</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>               
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-5">
                  <table id="example1" class="table table-bordered table-striped ">
                    <thead>
                    <tr>
                      <th>Jumlah Sarana</th>
                      <th>Keterangan</th>                      
                    </tr>
                    </thead>
                    <tbody>            
                    @foreach($pending as $data)
                      @if ($data->keterangan != NULL) 
                        @foreach ( $ket as $datas )
                         @if ($datas->id_keterangan == $data->keterangan)
                          <tr>
                            <td id="{{ $data->total }}">{{ $data->total }}</td>
                            <td id="{{ $datas->nama_ket }}">{{ $datas->nama_ket }}</td>                      
                          </tr>  
                          @endif                       
                        @endforeach 
                      @endif
                    @endforeach
                    <tr>
                      <td>
                        <b>{{ $a }}</b>
                      </td>
                      <td><b>Jumlah</b></td>
                    </tr>
                    </tbody>
                  </table>
                  </div>
                  <div class="col-md-6">  
                      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                      <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            <?php echo $chartData1 ?>
                          ]);
                          var options = {
                            chartArea:{left:10,top:20,width:"60%",height:"60%"},
                            'legend': {'position': 'bottom'}
                          };
                          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                          chart.draw(data, options);
                        }
                      </script>
                      <div id="piechart" style="width: 900px; height: 500px;"></div>
                  </div>
              </div>
              <!-- /.card-body -->
              </div>
            </div>
            <!-- /.card -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Tidak Lulus Uji</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>              
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-5">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Jumlah Sarana</th>
                      <th>Keterangan</th>                      
                    </tr>
                    </thead>
                    <tbody>          
                    @foreach($tidak as $data)
                      @if ($data->keterangan != NULL) 
                        @foreach ( $ket as $datas )
                         @if ($datas->id_keterangan == $data->keterangan)
                          <tr>
                            <td>{{ $data->total }}</td>
                            <td>{{ $datas->nama_ket }}</td>                      
                          </tr>  
                          @endif                       
                        @endforeach 
                      @endif
                    @endforeach
                    <tr>
                      <td><b>{{ $b }}</b></td>
                      <td><b>Jumlah</b></td>
                    </tr>
                    </tbody>
                  </table>
                  </div>
                  <div class="col-md-6">
                      <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            <?php echo $chartData2 ?>
                          ]);
                          var options = {
                            chartArea:{left:10,top:20,width:"60%",height:"60%"},
                            'legend': {'position': 'bottom'}
                          };
                          var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                          chart.draw(data, options);
                        }
                      </script>
                      <div id="piechart2" style="width: 900px; height: 500px;"></div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('js')

@endsection
