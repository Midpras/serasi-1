@extends('layouts.main')

@section('container')

<div class="container-fluid">
    <div class="col-xl-16">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Daftar Kegiatan {{$pegawai->name}}  </h4>
                    <h4>{{$tanggal}}</h4>
                </div>
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="{{route('tambahkegiatan', [$tanggal, $pegawai])}}">
            <button type="button" class="btn btn-success"><i class="ti-plus f-s-12 m-r-5"></i> <span class="btn-icon-right"></span>Tambah Kegiatan</button>
        </a>
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


