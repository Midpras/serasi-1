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
            <h4>Edit Indikator Kinerja Individu</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a href="/">IKI</a>
                </li>
                <li class="breadcrumb-item active">Edit Indikator Kinerja Individu</li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit IKI</h4>
                    <div class="basic-form">
                        <form autocomplete="off" action="/iki/update" method="post" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <input type="hidden" name="id_iki_prov" id="id_iki_prov" value="{{$iki->id_iki_prov}}">
                            <div class="form-group">
                                <label>IKU Atasan Langsung</label>
                                <input readonly type="text" class="form-control" value="{{$iki->ikuprov->nama_iku_prov}}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Target</label>
                                    <input readonly type="text" class="form-control" value="{{$iki->target_iki_prov}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Satuan</label>
                                    <input readonly type="text" class="form-control" value="{{$iki->satuan_iki_prov}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama IKI</label>
                                <input type="text" name="nama_iki_prov" class="form-control" value="{{$iki->nama_iki_prov}}" autocomplete="off" required>
                            </div>
                            <?php if($iki->nama_iki_prov == NULL){ ?>
                            <div class="form-group">
                                <label>Nama SKP</label>
                                <input type="text" name="nama_skp_prov" class="form-control" autocomplete="off">
                            </div>
                            <?php }else{}; ?>
                            <button type="submit" class="btn btn-dark btn sweet-success">SIMPAN</button>
                        </form>
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
<script src="{{ asset('assets/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/js/sweetalert.init.js') }}"></script>
@endsection