@extends('layouts.main')

@section('optionalplugins')
<!-- <link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet"> -->
<link href="{{ asset('assets/plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
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
            <h4>Edit Sasaran Kinerja Pegawai</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a href="/">SKP</a>
                </li>
                <li class="breadcrumb-item active">Edit Sasaran Kinerja Pegawai</li>
            </ol>
        </div>
    </div>
    <!-- row -->
    @if($nama->satker == '5300')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit SKP</h4>
                    <div class="basic-form">
                        <form autocomplete="off" action="/skp/update" method="post" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <input type="hidden" name="id_skp_prov" id="id_skp_prov" value="{{$skp_prov->id_skp_prov}}">
                            <div class="form-group">
                                <label>Nama IKU Atasan Langsung</label>
                                <input type="text" name="nama_skp_prov" class="form-control" value="{{$skp_prov->Ikiprov->Ikuprov->nama_iku_prov}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama IKI</label>
                                <input type="text" name="nama_skp_prov" class="form-control" value="{{$skp_prov->Ikiprov->nama_iki_prov}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama SKP</label>
                                <input type="text" name="nama_skp_prov" class="form-control" value="{{$skp_prov->nama_skp_prov}}" autocomplete="off" required>
                            </div>
                            <button type="submit" class="btn btn-dark btn sweet-success">SIMPAN</button>
                        </form>
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
                    <h4 class="card-title">Edit SKP</h4>
                    <div class="basic-form">
                        <form autocomplete="off" action="/skp/update" method="post" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <input type="hidden" name="id_skp_prov" id="id_skp_prov" value="{{$skp_prov->id_skp_prov}}">
                            <div class="form-group">
                                <label>Nama IKU</label>
                                <input type="text" name="nama_skp_prov" class="form-control" readonly value="{{$skp_prov->iki_prov->iku_prov->nama_iku_prov}}" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Nama SKP</label>
                                <input type="text" name="nama_skp_prov" class="form-control" value="{{$skp_prov->nama_skp_prov}}" autocomplete="off" required>
                            </div>
                            <button type="submit" class="btn btn-dark btn sweet-success">SIMPAN</button>
                        </form>
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
<script src="{{ asset('assets/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/js/sweetalert.init.js') }}"></script>
@endsection