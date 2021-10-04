@extends('layout.navBar')
@section('subTitle','Data Sarana Diuji')
@section('subTitle1','Data Sarana Diuji')
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      
      
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">   
              <div class="row">
                <div class="col-sm-3">
                  <a type="button" class="btn btn-success" href="/inputData/create" >
                    <i class="fa fa-plus"> </i>
                    Tambah / Input Data
                  </a><br>
                </div> 
                                
              </div>  
              <br>
              <div class="row">
                <div class="col-sm-6">                  
                  @if(Auth::user()->level=="Master")
                  <form class="form" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="input-group">
                       <div class="custom-file">                        
                         <input type="file" name="importExcel" class="custom-file-input" id="importExcel" required>
                         <label class="custom-file-label" for="importExcel">Choose file</label>
                       </div>
                       <div class="input-group-append">
                         <button type="submit" class="btn btn-warning">Import Data</button>
                       </div>
                     </div>
                   </form>
                   @endif
                  </div>   
                  <div class="col-sm-3">
                    <a href="{{ route('format.import') }}" class="btn btn-info btn-rounded btn-fw"> Format Import</a>
                  </div>        
              </div> 
                
              <div class="row">
                <h4><br>Filter :  </h4>
              </div>
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
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped myTable" id="myTable">
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
                  <th>Action</th>
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
    </div>
    <!-- /.container-fluid -->

@include('input.editModal')

  </section>
  <!-- /.content -->
@endsection
@section('js')
<script type="text/javascript">
toastr.options.preventDuplicates = true;
  $(document).ready(function(){
    $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
         });
    var table = $('.myTable').DataTable({
        "responsive": true, "autoWidth": false,
        pageLength: 10,
        lengthChange: false,
        processing: true,
        serverSide: true,
        dom: '<"html5buttons">Blfrtip',
        language: {
                buttons: {
                    colvis : 'show / hide', // label button show / hide
                    colvisRestore: "Reset Kolom" //lael untuk reset kolom ke default
                }
        },
        
        buttons : [
                    {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    {extend:'csv', title:'Emusk-Pengujian Sarana'},
                    {extend: 'pdf', title:'Emusk-Pengujian Sarana'},
                    {extend: 'excel', title: 'Emusk-Pengujian Sarana'},
                    {extend:'print',title: 'Emusk-Pengujian Sarana'},
        ],
        ajax: {
          url: "{{ route('inputData.index') }}",
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
            {data: 'action', name: 'action', orderable: false, searchable: false},
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

<script>
  $(function(){
         //ADD NEW COUNTRY
         $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
         });

         $(document).on('click','#editCountryBtn', function(){
             var id_uji = $(this).data('id');
             $('#update-form').trigger("reset");
             $('.editCountry').find('span.error-text').text('');
             $.post('<?= route("edits") ?>',{id_uji:id_uji}, function(data){
                 //  alert(data.details.country_name);
                 $('.editCountry').find('input[name="eid"]').val(data.details.id);
                 $('.editCountry').find('input[name="user"]').val(data.details.user);
                 $('.editCountry').find('input[name="identitas"]').val(data.details.identitas);
                 $('.editCountry').find('select[name="jenis_sarana"]').val(data.details.jenis_sarana);
                 $('.editCountry').find('select[name="lokasi"]').val(data.details.lokasi);
                 $('.editCountry').find('input[name="tgl_pengujian"]').val(data.details.tgl_pengujian);
                 $('.editCountry').find('select[name="operator"]').val(data.details.operator);
                 $('.editCountry').find('select[name="jenis_pengujian"]').val(data.details.jenis_pengujian);
                 $('.editCountry').find('select[name="wilayah"]').val(data.details.wilayah);
                 $('.editCountry').find('select[name="status_uji"]').val(data.details.status_uji);
                 $('.editCountry').find('select[name="keterangan"]').val(data.details.keterangan);
                 $('.editCountry').modal('show');
             },'json');
         });


         //UPDATE COUNTRY DETAILS
         $('#update-form').on('submit', function(e){
             e.preventDefault();
             var form = this;
             $.ajax({
                 url:$(form).attr('action'),
                  method:$(form).attr('method'),
                  data:new FormData(form),
                  processData:false,
                  dataType:'json',
                 contentType:false,
                 beforeSend: function(){
                      $(form).find('span.error-text').text('');
                 },
                 success: function(data){
                       if(data.code == 0){
                           $.each(data.error, function(prefix, val){
                               $(form).find('span.'+prefix+'_error').text(val[0]);
                           });
                       }else{
                           $('#myTable').DataTable().ajax.reload(null, false);
                           $('.editCountry').modal('hide');
                           $('#update-form').trigger("reset");
                           toastr.success(data.msg);
                       }
                 }
             });
         });

         //DELETE COUNTRY RECORD
         $(document).on('click','#deleteCountryBtn', function(){
             var id_uji = $(this).data('id');
             var url = '<?= route("destroy") ?>';

             swal.fire({
                  title:'Are you sure?',
                  html:'You want to <b>delete</b> this data?',
                  showCancelButton:true,
                  showCloseButton:true,
                  cancelButtonText:'Cancel',
                  confirmButtonText:'Yes, Delete',
                  cancelButtonColor:'#d33',
                  confirmButtonColor:'#556ee6',
                  width:300,
                  allowOutsideClick:false
             }).then(function(result){
                   if(result.value){
                       $.post(url,{id_uji:id_uji}, function(data){
                            if(data.code == 1){
                                $('#myTable').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                            }else{
                                toastr.error(data.msg);
                            }
                       },'json');
                   }
             });

         });
  });

</script>

<script type="text/javascript">
  $(function () {
    bsCustomFileInput.init();
  });

  $(function () {
   

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
