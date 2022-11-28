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
    @if($nama->satker == '5300')
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Penugasan dari IKU Atasan</h4>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center" ;>IKU Atasan Langsung</th>
                                    <th style="text-align:center" ;>Target</th>
                                    <th style="text-align:center" ;>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($iki_tugas as $iki_tugas)
                                <tr>
                                    <td> {{ $iki_tugas->ikuprov->nama_iku_prov }} </td>
                                    <td> {{ $iki_tugas->target_iki_prov}} {{$iki_tugas->satuan_iki_prov}} </td>
                                    <td>
                                        <a href="{{ url('/iki/penugasan/' . $iki_tugas->id_iki_prov . '') }}"><i class="mdi mdi-account-arrow-right-outline mdi-24px"></i></a>
                                        <a href="{{ url('/iki/edit/' . $iki_tugas->id_iki_prov . '') }}"><i class="mdi mdi-pencil-outline mdi-24px"></i></a>
                                        <!-- <a href="/iki/hapus/{{ $iki_tugas->id_iki_prov }}" class="delete-confirm" role="button"><i class="mdi mdi-trash-can-outline mdi-24px"></i> -->
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Indikator Kinerja Individu (IKI)</h4>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center" ;>IKU Atasan Langsung</th>
                                    <th style="text-align:center" ;>IKI</th>
                                    <th style="text-align:center" ;>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($iki as $iki)
                                <tr>
                                    <td> {{ $iki->ikuprov->nama_iku_prov }} </td>
                                    <td> {{ $iki->nama_iki_prov}} </td>
                                    <td>
                                        <a href="{{ url('/iki/tugas/' . $iki->id_iki_prov . '') }}"><i class="mdi mdi-account-arrow-right-outline mdi-24px"></i></a>
                                        <a href="{{ url('/iki/edit/' . $iki->id_iki_prov . '') }}"><i class="mdi mdi-pencil-outline mdi-24px"></i></a>
                                        <a href="/iki/hapus/{{ $iki->id_iki_prov }}" class="delete-confirm" role="button"><i class="mdi mdi-trash-can-outline mdi-24px"></i></a>
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
    @else
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Penugasan dari IKU Atasan</h4>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center" ;>IKU Atasan Langsung</th>
                                    <th style="text-align:center" ;>Target</th>
                                    <th style="text-align:center" ;>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($iki_tugas_kab as $iki_tugas)
                                <tr>
                                    <td> {{ $iki_tugas->ikukab->nama_iku_kab }} </td>
                                    <td> {{ $iki_tugas->target_iki_kab}} {{$iki_tugas->satuan_iki_kab}} </td>
                                    <td>
                                        <a href="{{ url('/iki/penugasan_kab/' . $iki_tugas->id_iki_kab . '') }}"><i class="mdi mdi-account-arrow-right-outline mdi-24px"></i></a>
                                        <a href="{{ url('/iki/edit_kab/' . $iki_tugas->id_iki_kab . '') }}"><i class="mdi mdi-pencil-outline mdi-24px"></i></a>
                                        <!-- <a href="/iki/hapus/{{ $iki_tugas->id_iki_prov }}" class="delete-confirm" role="button"><i class="mdi mdi-trash-can-outline mdi-24px"></i> -->
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Indikator Kinerja Individu (IKI)</h4>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center" ;>IKU Atasan Langsung</th>
                                    <th style="text-align:center" ;>IKI</th>
                                    <th style="text-align:center" ;>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($iki_kab as $iki)
                                <tr>
                                    <td> {{ $iki->ikukab->nama_iku_kab }} </td>
                                    <td> {{ $iki->nama_iki_kab}} </td>
                                    <td>
                                        <a href="{{ url('/iki/tugas/' . $iki->id_iki_kab . '') }}"><i class="mdi mdi-account-arrow-right-outline mdi-24px"></i></a>
                                        <a href="{{ url('/iki/edit/' . $iki->id_iki_kab . '') }}"><i class="mdi mdi-pencil-outline mdi-24px"></i></a>
                                        <a href="/iki/hapus/{{ $iki->id_iki_kab }}" class="delete-confirm" role="button"><i class="mdi mdi-trash-can-outline mdi-24px"></i></a>
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
    @endif

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