@extends('layouts.main')

@section('optionalplugins')
<link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('nama')
<?php echo $nama->name; ?>
@endsection

@section('role')
<?php echo $nama->role; ?>
@endsection

@section('container')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col p-0">
            <h4>Indikator Kinerja Individu</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Indikator Kinerja Individu</li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="card-title">Penugasan dari IKI</h4>
                        <a href="{{ url('/iki/penugasan/' . $iki->id_iki_prov . '') }}"><button type="button" class="btn btn-primary float-right">Tambah Penugasan</button></a>
                    </div>

                    <h2> {{$iki->nama_iki_prov}} ({{$iki->target_iki_prov}} {{$iki->satuan_iki_prov}}) </h2>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center" ;>Kegiatan</th>
                                    <th style="text-align:center" ;>Target</th>
                                    <th style="text-align:center" ;>Nama</th>
                                    <th style="text-align:center" ;>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ckp as $ckp)
                                <tr>
                                    <td> {{ $ckp->kegiatan->nama_kegiatan }} </td>
                                    <td> {{ $ckp->target_ckp_prov}} {{$ckp->satuan_ckp_prov}} </td>
                                    <td> {{ $ckp->user->name }} </td>
                                    <td>
                                        <a href="{{ url('/iki/tugas_edit/' . $ckp->id_ckp_prov . '') }}"><i class="mdi mdi-pencil-outline mdi-24px"></i></a>
                                        {{-- <a href="{{ url('/iki/edit/' . $ckp->id_iki_prov . '') }}"><i class="mdi mdi-pencil-outline mdi-24px"></i></a> --}}
                                        <a href="/iki/tugas_hapus/{{ $ckp->id_ckp_prov }}" class="delete-confirm" role="button"><i class="mdi mdi-trash-can-outline mdi-24px"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('optionaljs')
<!-- Custom script -->
<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#example2').DataTable();
    });
</script>
@endsection