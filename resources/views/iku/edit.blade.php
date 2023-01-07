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
                    @if (\Auth::user()->satker == '5300')
                    <div class="basic-form">
                    <form id="iku" action="{{ route('iku.update',$iku->id_iku_prov )}}" method="post" autocomplete="off">
                    
                    @csrf
                    @method('put')
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Renstra</label>
                            <div class="col-sm-10">
                                <select class="form-control h-150px" name="renstra">
                                    <option value="{{$iku->id_pk_prov}}" selected disabled>{{$iku->pkprov->renstra}}</option>
                                    @foreach($pk_prov as $p)
                                    <option value="{{$p->id_pk_prov}}">{{$p->renstra}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Perjanjian Kinerja</label>
                            <div class="col-sm-10">
                                <select class="form-control h-150px"  name="pk">
                                    <option selected disabled>{{$iku->pkprov->nama_pk_prov}}</option>
                                    @foreach($pk_prov as $p)
                                    <option value="{{$p->id_pk_prov}}" >{{$p->nama_pk_prov}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Indikator Kinerja Utama</label>
                            <div class="col-sm-10">
                                <textarea class="form-control h-150px" rows="6" id="nama_iku_prov" name="nama_iku_prov" placeholder="Indikator Kinerja Utama" >{{$iku->nama_iku_prov}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-10">
                            <textarea class="form-control h-150px" rows="6" id="satuan_iku_prov" name="satuan_iku_prov" placeholder="Satuan" >{{$iku->satuan_iku_prov}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Target</label>
                            <div class="col-sm-10">
                            <textarea class="form-control h-150px" rows="6" id="target_iku_prov" name="target_iku_prov" placeholder="Target" >{{$iku->target_iku_prov}}</textarea>
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

                    @if (\Auth::user()->satker !== '5300')
                    <div class="basic-form">
                    <form id="iku" action="{{ route('iku.update',$iku->id_iku_kab )}}" method="post" autocomplete="off">
                    
                    @csrf
                    @method('put')
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Renstra</label>
                            <div class="col-sm-10">
                                <select class="form-control h-150px" name="renstra">
                                    <option value="{{$iku->id_pk_kab}}" selected disabled>{{$iku->pk_kab->renstra_kab}}</option>
                                    @foreach($pk_kab as $p)
                                    <option value="{{$p->id_pk_kab}}">{{$p->renstra_kab}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Perjanjian Kinerja</label>
                            <div class="col-sm-10">
                                <select class="form-control h-150px"  name="pk">
                                    <option selected disabled value="{{$iku->id_pk_kab}}">{{$iku->pk_kab->nama_pk_kab}}</option>
                                    @foreach($pk_kab as $p)
                                    <option value="{{$p->id_pk_kab}}" >{{$p->nama_pk_kab}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Indikator Kinerja Utama</label>
                            <div class="col-sm-10">
                                <textarea class="form-control h-150px" rows="6" id="nama_iku_kab" name="nama_iku_kab" placeholder="Indikator Kinerja Utama" >{{$iku->nama_iku_kab}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-10">
                            <textarea class="form-control h-150px" rows="6" id="satuan_iku_kab" name="satuan_iku_kab" placeholder="Satuan" >{{$iku->satuan_iku_kab}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Target</label>
                            <div class="col-sm-10">
                            <textarea class="form-control h-150px" rows="6" id="target_iku_kab" name="target_iku_kab" placeholder="Target" >{{$iku->target_iku_kab}}</textarea>
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