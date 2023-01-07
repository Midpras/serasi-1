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

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col p-0">
            <h4>Capaian Kinerja Pegawai (CKP)</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">CKP</li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2023</td>
                                    <td>Januari</td>
                                    <td><a href="{{url('/entrickp/1/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>Februari</td>
                                    <td><a href="{{url('/entrickp/2/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>                             
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>Maret</td>
                                    <td><a href="{{url('/entrickp/3/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>                                  
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>April</td>
                                    <td><a href="{{url('/entrickp/4/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>                                  
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>Mei</td>
                                    <td><a href="{{url('/entrickp/5/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>                                  
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>Juni</td>
                                    <td><a href="{{url('/entrickp/6/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>                                  
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>Juli</td>
                                    <td><a href="{{url('/entrickp/7/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>                                   
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>Agustus</td>
                                    <td><a href="{{url('/entrickp/8/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>September</td>
                                    <td><a href="{{url('/entrickp/9/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>Oktober</td>
                                    <td><a href="{{url('/entrickp/10/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>November</td>
                                    <td><a href="{{url('/entrickp/11/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td>Desember</td>
                                    <td><a href="{{url('/entrickp/12/2023')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span> Entri CKP</td>
                                </tr>
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

<script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
@endsection