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
                            <table id="#" name="kegiatan" class="table table-striped table-bordered zero-configuration">
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
                                            <div class="col-1">
                                                <th>1</th>
                                            </div>
                                            <div class="col-4">
                                                <th>                                
                                                    <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" required>
                                                </th>
                                            </div>
                                            <div class="col-1">
                                                <th>                                
                                                    <input type="text" class="form-control" name="satuan_kegiatan" id="satuan_kegiatan" required>
                                                </th>
                                            </div>
                                            
                                            <th>                                
                                                <input type="text" class="form-control" name="volume" id="volume" required>
                                            </th>
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


