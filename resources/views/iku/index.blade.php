@extends('layouts.main')

@section('optionalplugins')
<link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
<script src="{{asset('assets/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert/js/sweetalert.init.js')}}"></script>
@endsection

@section('container')
    
<div class="container-fluid">
    
    <div class="row page-titles">
        <div class="col p-0">
            <h4>Indikator Kinerja Utama</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Indikator Kinerja Utama</li>
            </ol>
        </div>
    </div>

    
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Indikator Kinerja Utama</h4>
                    <div class="col-lg-12">
                        
                        <!-- /# card -->
                    </div>
                    @if(session('delete'))
                        <div class="alert alert-danger">
                            {{session('delete')}}
                        </div>
                    @endif
                    @if(session('edit'))
                        <div class="alert alert-warning">
                            {{session('edit')}}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Rencana Strategis</th>
                                    <th>Perjanjian Kinerja</th>
                                    <th>Indikator Kinerja Utama</th>
                                    <th>Satuan</th>
                                    <th>Target</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (\Auth::user()->satker == '5300')
                                @foreach($iku_prov as $p)
                                <tr>
                                   
                                    <td>{{$p->pkprov->renstra}}</td>
                                    <td>{{$p->pkprov->nama_pkprov}}</td>
                                    <td>{{$p->nama_iku_prov}}</td>
                                    <td>{{$p->satuan_iku_prov}}</td>
                                    <td>{{$p->target_iku_prov}}</td>
                                    <td>
                                        <div class="form-group row">
                                        <a href="{{ route('iku.show', $p->id_iku_prov) }}" data-toggle="tooltip" class="btn btn-primary btn-rounded d-inline-block f-s-12 p-l-20 p-r-20" data-placement="top" title="Edit"><span class="btn-icon-left"><i class="fa fa-pencil color-muted m-r-5"></i></span>Add</a>
                                            <a href="{{ route('iku.edit', $p->id_iku_prov) }}" data-toggle="tooltip" class="btn btn-rounded btn-warning d-inline-block f-s-12 p-l-20 p-r-20" data-placement="top" title="Edit"><span class="btn-icon-left"><i class="fa fa-pencil color-muted m-r-5"></i></span>Edit</a> 
                                            <form  action="{{ route('iku.destroy', $p->id_iku_prov) }}" method="POST" >
                                                @method('DELETE')
                                                @csrf
                                            <div class="col-sm-1">
                                                <button type="submit" class="btn btn-rounded btn-danger d-inline-block f-s-12 p-l-20 p-r-20" onclick="return confirm('Apakah Ingin Menghapus IKU ini?');"><span class="btn-icon-left"><i class="fa fa-close color-danger"></i></span>Delete</button>
                                            </div>
                                                
                                            </form>
                                         </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            @if (\Auth::user()->satker !== '5300')
                                @foreach($iku_kab as $p)
                                <tr>
                                    <td>{{$p->pk_kab->renstra_kab}}</td>
                                    <td>{{$p->pk_kab->nama_pk_kab}}</td>
                                    <td>{{$p->nama_iku_kab}}</td>
                                    <td>{{$p->satuan_iku_kab}}</td>
                                    <td>{{$p->target_iku_kab}}</td>
                                    <td>
                                        <div class="form-group row">
                                        <a href="{{ route('iku.show', $p->id_iku_kab) }}" data-toggle="tooltip" class="btn btn-primary btn-rounded " data-placement="top" title="Add"><span class="btn-icon-left"><i class="fa fa-pencil color-muted m-r-5"></i></span>Add</a>
                                        
                                            <a href="{{ route('iku.edit', $p->id_iku_kab) }}" data-toggle="tooltip" class="btn btn-rounded btn-warning" data-placement="top" title="Edit"><span class="btn-icon-left"><i class="fa fa-pencil color-muted m-r-5"></i></span>Edit</a> 
                                            <form  action="{{ route('iku.destroy', $p->id_iku_kab) }}" method="POST" >
                                                @method('DELETE')
                                                @csrf
                                            <div class="col-sm-1">
                                                <button type="submit" class="btn btn-rounded btn-danger" onclick="return confirm('Apakah Ingin Menghapus IKU ini?');"><span class="btn-icon-left"><i class="fa fa-close color-danger"></i></span>Delete</button>
                                            </div>
                                                
                                            </form>
                                         </div>



                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Entri Indikator Kinerja Utama</h4>
                    
                    @if (\Auth::user()->satker === '5300')
                    <div class="basic-form">
                    <form id="iku" action="{{ route('iku.store') }}" method="POST" autocomplete="off">
                    @csrf
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Renstra</label>
                            <div class="col-sm-10">
                                <select class="form-control h-150px" name="renstra">
                                    <option selected disabled>-- Pilih Renstra --</option>
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
                                    <option selected disabled>-- Perjanjian Kinerja --</option>
                                    @foreach($pk_prov as $p)
                                    <option value="{{$p->id_pk_prov}}">{{$p->nama_pk_prov}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Indikator Kinerja Utama</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-150px" rows="6" id="nama_iku_prov" name="nama_iku_prov" placeholder="Indikator Kinerja Utama"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Satuan</label>
                                <div class="col-sm-3">
                                <textarea class="form-control h-150px" rows="6" id="satuan_iku_prov" name="satuan_iku_prov" placeholder="Satuan"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Target</label>
                                <div class="col-sm-2">
                                <textarea class="form-control h-150px" rows="6" id="target_iku_prov" name="target_iku_prov" placeholder="Target"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-rounded btn-success"><span class="btn-icon-left"><i class="fa fa-plus color-success"></i></span>Add</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @endif
                    @if (\Auth::user()->satker !== '5300')
                    
                    <div class="basic-form">
                    <form id="iku" action="{{ route('iku.store') }}" method="POST" autocomplete="off">
                    @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Renstra</label>
                            <div class="col-sm-10">
                                <select class="form-control h-150px" name="renstra">
                                    <option selected disabled>-- Pilih Renstra --</option>
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
                                    <option selected disabled>-- Perjanjian Kinerja --</option>
                                    @foreach($pk_kab as $p)
                                    <option value="{{$p->id_pk_kab}}">{{$p->nama_pk_kab}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Indikator Kinerja Utama</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-150px" rows="6" id="nama_iku_kab" name="nama_iku_kab" placeholder="Indikator Kinerja Utama"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Satuan</label>
                                <div class="col-sm-3">
                                <textarea class="form-control h-150px" rows="6" id="satuan_iku_kab" name="satuan_iku_kab" placeholder="Satuan"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Target</label>
                                <div class="col-sm-2">
                                <textarea class="form-control h-150px" rows="6" id="target_iku_kab" name="target_iku_kab" placeholder="Target"></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-rounded btn-success"><span class="btn-icon-left"><i class="fa fa-plus color-success"></i></span>Add</button>
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


 <!-- Custom script -->
   

<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
@endsection