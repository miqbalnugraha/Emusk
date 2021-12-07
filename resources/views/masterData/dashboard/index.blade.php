@extends('layout.navBar')
@section('subTitle','Master Dashboard')
@section('subTitle1','Master Dashboard')
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Timelime example  -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <div class="timeline">
            <!-- timeline time label -->
            @foreach ($log as $datas)
            @if($datas->log_name=='login')  
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
              @if($datas->level=='Master')
              <i class="fas fa-user bg-maroon"></i>
              @endif
              @if($datas->level=='Admin')
              <i class="fas fa-user bg-success"></i>
              @endif
              @if($datas->level=='User')
              <i class="fas fa-user bg-gray"></i>
              @endif
              <div class="timeline-item">
                <span class="time"><i class="fas fa-calendar"></i> {{ date('d-m-Y', strtotime($datas->created_at)); }}</span>
                <h3 class="timeline-header no-border"><a href="#"> {{ $datas->name }}</a> telah login ke dalam E-Musk pukul <b>{{  date('H:i:s', strtotime($datas->created_at));}}</b></h3>
              </div>
            </div>
            <!-- END timeline item -->
            <!-- END timeline item -->
            @endif            
            @endforeach
            
          </div>
        </div>
        <div class="col-sm-3 mx-auto">
              <span class="info-box-text">{{ $log->links() }}</span>
        </div>
        <!-- /.col -->
      </div>
    </div>
    <!-- /.timeline -->

  </section>
  <!-- /.content -->
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
