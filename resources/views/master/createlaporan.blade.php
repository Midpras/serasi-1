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
                                <th>Durasi</th>
                                <th>Satuan Durasi</th>
                                <th>Status Kegiatan</th>
                                <th>Pemberi Tugas</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (is_null($laporans))
                            @else
                            @foreach($laporans as $laporan)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{$laporan->namakegiatan}}</td>
                                <td>{{$laporan->satuankegiatan}}</td>
                                <td>{{$laporan->volume}}</td>
                                <td>{{$laporan->durasi}}</td>
                                <td>{{$laporan->satuandurasi}}</td>
                                <td>{{$laporan->statuskegiatan}}</td>
                                <td>{{$laporan->pemberitugas}}</td>
                                <td>{{$laporan->keterangan}}</td>
                                    <span>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 "></i> </a>
                                        <a href=# data-toggle="tooltip" data-placement="top" title="Delete" class="sweet-confirm" data-nama = "#" data-id = "#">
                                            <i class="fa fa-close color-danger"></i> 
                                        </a>
                                    </span>
                                </td>          
                            </tr>
                        @endforeach
                                
                            @endif
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


