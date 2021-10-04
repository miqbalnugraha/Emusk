@extends('layout.navBar')
@section('subTitle','Input Data Nama Sarana Baru')
@section('subTitle1','Master Data')
@section('subTitle2','Nama Sarana')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Input Data Baru</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/masterData/sarana/store" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label for="nama_sarana">Nama Sarana</label>
                  <input type="text" class="form-control @error('nama_sarana') is-invalid @enderror" name="nama_sarana" id="nama_sarana" value="{{ old('nama_sarana') }}">
                    @error('nama_sarana')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>              
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
                <a href="/masterData" class="btn btn-default ">Back</a>
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
