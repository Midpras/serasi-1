@extends('layouts.main')

@section('optionalplugins')
<link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('container')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col p-0">
            <h4>Entri Perjanjian Kinerja</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Edit Perjanjian Kinerja</li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Indikator Kinerja Utama</h4>
                    @if (\Auth::user()->kode_satker == 5300)
                    <div class="basic-form">
                    <form id="pk" action="{{ route('pk.update',$pk->id_pk_prov )}}" method="post" autocomplete="off">
                    
                    @csrf
                    @method('put')
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Renstra</label>
                            <div class="col-sm-10">
                                <textarea class="form-control h-150px" rows="6" id="renstra" name="renstra" placeholder="Renstra" >{{$pk->renstra}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Perjanjian Kinerja</label>
                            <div class="col-sm-10">
                            <textarea class="form-control h-150px" rows="6" id="nama_pk_prov" name="nama_pk_prov" placeholder="Perjanjian Kinerja" >{{$pk->nama_pk_prov}}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-rounded btn-success"><span class="btn-icon-left"><i class="fa fa-plus color-success"></i></span>Update</button>
                            </div>
                        </div>
                    </form>
                    </div>

                    @endif
                    @if (\Auth::user()->kode_satker !== 5300)
                    <div class="basic-form">
                    <form id="pk" action="{{ route('pk.update', $pk->id_pk_kab)}}" method="post" autocomplete="off">
                    
                    @csrf
                    @method('put')
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Renstra</label>
                            <div class="col-sm-10">
                                <textarea class="form-control h-150px" rows="6" id="renstra_kab" name="renstra_kab" placeholder="Renstra" >{{$pk->renstra_kab}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Perjanjian Kinerja</label>
                            <div class="col-sm-10">
                            <textarea class="form-control h-150px" rows="6" id="nama_pk_kab" name="nama_pk_kab" placeholder="Perjanjian Kinerja">{{$pk->nama_pk_kab}}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-rounded btn-success"><span class="btn-icon-left"><i class="fa fa-plus color-success"></i></span>Update</button>
                            </div>
                        </div>
                    </form>
                    </div>

                    @endif
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
@endsection