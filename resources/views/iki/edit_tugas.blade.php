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
            <h4>Edit Penugasan</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a href="/">IKI</a>
                </li>
                <li class="breadcrumb-item active">Edit Penugasan</li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Penugasan</h4>
                    <div class="basic-form">
                        <form autocomplete="off" action="/iki/update_tugas" method="post" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <input type="hidden" name="id_ckp_prov" id="id_ckp_prov" value="{{$ckp->id_ckp_prov}}">
                            <input type="hidden" name="id_iki_prov" id="id_iki_prov" value="{{$iki->id_iki_prov}}">
                            <div class="form-group">
                                <label>Kegiatan</label>
                                <select class="form-control " form-select" aria-label="Default select example" name="id_kegiatan">
                                    <option value=""> </option>
                                    @foreach($grupkegiatan as $level1 => $kegiatan)
                                    <optgroup label="{{ $level1 }}">
                                        @foreach($kegiatan as $keg)
                                        <option value="{{ $keg->id_kegiatan }}" <?php if ($ckp->id_kegiatan == $keg->id_kegiatan) {
                                                                                    echo "selected";
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>>{{ $keg->nama_kegiatan}}</option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Target</label>
                                    <input type="text" class="form-control" name="target_ckp_prov" value="{{$ckp->target_ckp_prov}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Satuan</label>
                                    <input type="text" class="form-control" name="satuan_ckp_prov" value="{{$ckp->satuan_ckp_prov}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Bulan</label>
                                    <select class="form-control " form-select" aria-label="Default select example" name="bulan_prov">
                                        <option value=""> </option>
                                        <option value="1" <?php if ($ckp->bulan_prov == "1") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>Januari</option>
                                        <option value="2" <?php if ($ckp->bulan_prov == "2") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>Februari</option>
                                        <option value="3" <?php if ($ckp->bulan_prov == "3") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>Maret</option>
                                        <option value="4" <?php if ($ckp->bulan_prov == "4") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>April</option>
                                        <option value="5" <?php if ($ckp->bulan_prov == "5") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>Mei</option>
                                        <option value="6" <?php if ($ckp->bulan_prov == "6") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>Juni</option>
                                        <option value="7" <?php if ($ckp->bulan_prov == "7") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>Juli</option>
                                        <option value="8" <?php if ($ckp->bulan_prov == "8") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>Agustus</option>
                                        <option value="9" <?php if ($ckp->bulan_prov == "9") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>September</option>
                                        <option value="10" <?php if ($ckp->bulan_prov == "10") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>Oktober</option>
                                        <option value="11" <?php if ($ckp->bulan_prov == "11") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>November</option>
                                        <option value="12" <?php if ($ckp->bulan_prov == "12") {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            } ?>>Desember</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tahun</label>
                                    <input type="text" class="form-control" name="tahun_prov" value="{{$ckp->tahun_prov}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Nama</label>
                                    <input readonly type="text" class="form-control" name="name" value="{{$ckp->user->name}}">
                                </div>
                            </div>
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