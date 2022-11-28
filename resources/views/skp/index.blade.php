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
            <h4>Sasaran Kinerja Pegawai</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Sasaran Kinerja Pegawai</li>
            </ol>
        </div>
    </div>

    <!-- row -->
    <div class="row">
        <div class="col-12">
            @if($nama->satker == '5300')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sasaran Kinerja Pegawai (SKP)</h4>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center" ;>RENCANA KINERJA ATASAN LANGSUNG</th>
                                    <th style="text-align:center" ;>RENCANA KINERJA</th>
                                    <th style="text-align:center" ;>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($skp_prov as $skp)
                                <tr>
                                    <td> {{ $skp->ikiprov->ikuprov->pk_prov->nama_pk_prov }} </td>
                                    <td> {{ $skp->nama_skp_prov}} </td>
                                    <td>
                                        <a href="{{ url('/skp/edit/' . $skp->id_skp_prov . '') }}"><i class="mdi mdi-pencil-outline mdi-24px"></i>
                                            <a href="/skp/hapus/{{ $skp->id_skp_prov }}" class="delete-confirm" role="button"><i class="mdi mdi-trash-can-outline mdi-24px"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            @else
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sasaran Kinerja Pegawai (SKP)</h4>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center" ;>RENCANA KINERJA ATASAN LANGSUNG</th>
                                    <th style="text-align:center" ;>RENCANA KINERJA</th>
                                    <th style="text-align:center" ;>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($skp_kab as $skp)
                                <tr>
                                    <td> {{ $skp->ikikab->ikukab->pkkab->nama_pk_kab }} </td>
                                    <td> {{ $skp->nama_skp_kab}} </td>
                                    <td>
                                        <a href="{{ url('/skp/edit/' . $skp->id_skp_kab . '') }}"><i class="mdi mdi-pencil-outline mdi-24px"></i>
                                            <a href="/skp/hapus/{{ $skp->id_skp_kab }}" class="delete-confirm" role="button"><i class="mdi mdi-trash-can-outline mdi-24px"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
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