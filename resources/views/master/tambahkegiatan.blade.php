@extends('layouts.main')

@section('container')

<div class="container-fluid">    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Kegiatan</h4>
                <div class="form-validation">
                    <form action="#" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table id="#" name="#" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Satuan Kegiatan</th>
                                        <th>Volume</th>
                                        <th>Satuan Durasi</th>
                                        <th>Status Kegiatan</th>
                                        <th>Pemberi Tugas</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="#">
                                        <div class="form-row">
                                            <tr>
                                                <th style="width: 5%">
                                                    <div class="col-1">
                                                        1
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="col-16">
                                                        <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" required>
                                                    </div>                                
                                                </th>
                                                    <th style="width: 10%">
                                                        <div class="col-12">                       
                                                            <input type="text" class="form-control" name="satuan_kegiatan" id="satuan_kegiatan" required>
                                                        </div>
                                                    </th>                                            
                                                <th style="width: 5%">                                
                                                    <input type="text" class="form-control" name="volume" id="volume" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="satuan_durasi" id="satuan_durasi" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="status_kegiatan" id="status_kegiatan" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="pemberi_tugas" id="pemberi_tugas" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="keterangan" id="keterangan" required>
                                                </th>
                                            </tr>
                                        </div>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Tambah Kegiatan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>
<!-- row -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="{{ asset('assets/plugins/select2/select2-init.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

@endsection

@section('optionaljs')
{{-- Data Table --}}
<script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
{{-- Form Validation --}}
<script src="{{ asset('assets/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/validation/jquery.validate-init.js') }}"></script>
{{-- Select2 --}}


<!-- Custom script -->

@endsection


