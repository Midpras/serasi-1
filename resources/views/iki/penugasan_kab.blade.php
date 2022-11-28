@extends('layouts.main')

@section('optionalplugins')
<link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet">
@livewireStyles

<style>
    hr.new4 {
        border: 1px dashed black;
    }
</style>
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
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">IKU Atasan</h4>
                    <h2> {{$iki_kab->ikukab->nama_iku_kab}} </h2>
                </div>
            </div>
        </div>
    </div>
    <div>
        @livewire('iki-turun-ckp-kab')
    </div>
</div>
@endsection

@section('optionaljs')
<!-- Custom script -->
@livewireScripts
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2-init.js') }}"></script>
@endsection