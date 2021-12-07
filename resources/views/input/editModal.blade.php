<div class="modal fade editCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('updates') }}" enctype="multipart/form-data" id="update-form">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">                  
                        <input type="hidden" class="form-control" name="eid" id="eid">
                        <input type="hidden" class="form-control" name="user" id="user">
                      </div>
                      
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="identitas">Identitas Sarana</label>
                          <input type="text" class="form-control @error('identitas') is-invalid @enderror" name="identitas" id="identitas">
                          <span class="text-danger error-text identitas_error"></span>
                        </div>

                        <div class="form-group">
                          <label>Operator</label>
                          <select name="operator" id="operator" class="form-control select2">
                            <option value="">Pilih Operator</option>
                            @foreach ($operator as $data)
                              <option value="{{$data->id_operator}}">{{$data->nama_operator}}</option>
                            @endforeach
                          </select>
                          <span class="text-danger error-text operator_error"></span>
                        </div>   

                        <div class="form-group">
                          <label>Wilayah</label>
                          <select name="wilayah" id="wilayah" class="form-control select2">
                            <option value="">Pilih Wilayah</option>
                              <option value="1">Wilayah I</option>
                              <option value="2">Wilayah II</option>
                          </select>
                          <span class="text-danger error-text wilayah_error"></span>
                        </div> 
      
                        <div class="form-group">
                          <label>Tanggal Pengujian</label>
                            <div class="input-group date" id="datetimepicker6" data-target-input="nearest">
                                <input name="tgl_pengujian" id="tgl_pengujian" type="text" class="form-control datetimepicker-input @error('tgl_pengujian') is-invalid @enderror" data-target="#datetimepicker4"/>
                                <div class="input-group-append" data-target="#datetimepicker6" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <span class="text-danger error-text tgl_pengujian_error"></span>
                        </div>
                      </div>
      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Jenis Sarana</label>
                          <select name="jenis_sarana" id="jenis_sarana" class="form-control select2">
                            <option value="">Pilih Jenis Sarana</option>
                            @foreach ($jenis_sarana as $data)
                              <option value="{{$data->id_sarana}}" class="select">{{$data->nama_sarana}}</option>
                            @endforeach
                          </select>
                          <span class="text-danger error-text jenis_sarana_error"></span>
                        </div>

                        <div class="form-group">
                          <label>Lokasi</label>
                          <select name="lokasi" id="lokasi" class="form-control select2">
                            <option value="">Pilih Lokasi</option>
                            @foreach ($lokasi as $data)
                              <option value="{{$data->id_lokasi}}">{{$data->nama_lokasi}}</option>
                            @endforeach
                          </select>
                          <span class="text-danger error-text lokasi_error"></span>
                        </div>                    
        
                        <div class="form-group">
                          <label>Jenis Pengujian</label>
                          <select name="jenis_pengujian" id="jenis_pengujian" class="form-control select2">
                            <option value="">Pilih Jenis Pengujian</option>
                              <option value="Uji Berkala">Uji Berkala</option>
                              <option value="Uji Pertama">Uji Pertama</option>
                          </select>
                          <span class="text-danger error-text jenis_pengujian_error"></span>
                        </div>  
                        
                         
      
                        <div class="form-group">
                          <label>Status Uji</label>
                            <select name="status_uji" id="status_uji" class="form-control select2">
                                <option value="">Pilih Status Uji</option>
                                <option value="1">Lulus</option>
                                <option value="2">Tidak Lulus</option>
                                <option value="3">Pending</option>
                                <option value="4">Belum Diuji</option>
                            </select>
                            <span class="text-danger error-text status_uji_error"></span>
                        </div>
                      </div>
                      </div>              
      
                      <div class="form-group">
                        <label>Keterangan (optional)</label>
                        <select name="keterangan" id="keterangan" class="form-control select2">
                          <option value="">Pilih Keterangan</option>
                          @foreach ($keterangan as $data)
                            <option value="{{$data->id_keterangan}}">{{$data->nama_ket}}</option>
                          @endforeach
                        </select>
                        @error('keterangan')
                            <div class="btn-sm btn-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>              
                    <!-- /.card-body -->
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right">Save</button>
              <a data-dismiss="modal" class="btn btn-default ">Close</a>
            </div>
          </form>
        </div>
    </div>
</div>