@extends('layouts.main')

@section('optionalplugins')
<link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('container')
    
<div class="container-fluid">
    
    <div class="row page-titles">
        <div class="col p-0">
            <h4>Perjanjian Kinerja</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Perjanjian Kinerja</li>
            </ol>
        </div>
    </div>

    
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Perjanjian Kinerja</h4>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (\Auth::user()->satker == '5300')
                                @foreach($pk_prov as $p)
                                <tr>
                                    <td>{{$p->renstra}}</td>
                                    <td>{{$p->nama_pk_prov}}</td>
                                    <td>
                                    <div class="form-group row">
                                    <a href="{{ route('pk.edit', $p->id_pk_prov) }}" data-toggle="tooltip" class="btn btn-rounded btn-warning" data-placement="top" title="Edit"><span class="btn-icon-left"><i class="fa fa-pencil color-muted m-r-5"></i></span>Edit</a> 

                                            <form  action="{{ route('pk.destroy', $p->id_pk_prov) }}" method="POST" >
                                                @method('DELETE')
                                                @csrf
                                                
                                                    <div class="col-sm-1">
                                                        <button type="submit" class="btn btn-rounded btn-danger"><span class="btn-icon-left"><i class="fa fa-close color-danger"></i></span>Delete</button>
                                                    </div>
                                                
                                            </form>
                                        </div>


                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            @if (\Auth::user()->satker !== '5300')
                                @foreach($pk_kab as $p)
                                <tr>
                                    <td>{{$p->renstra_kab}}</td>
                                    <td>{{$p->nama_pk_kab}}</td>
                                    <td>
                                     
                                          
                                    <div class="form-group row">
                                    <a href="{{ route('pk.edit', $p->id_pk_kab) }}" data-toggle="tooltip" class="btn btn-rounded btn-warning" data-placement="top" title="Edit"><span class="btn-icon-left"><i class="fa fa-pencil color-muted m-r-5"></i></span>Edit</a> 

                                            <form  action="{{ route('pk.destroy', $p->id_pk_kab) }}" method="POST" >
                                                @method('DELETE')
                                                @csrf
                                                
                                                    <div class="col-sm-1">
                                                        <button type="submit" class="btn btn-rounded btn-danger"><span class="btn-icon-left"><i class="fa fa-close color-danger"></i></span>Delete</button>
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
                    <h4 class="card-title">Entri Perjanjian Kinerja</h4>
                    
                    @if (\Auth::user()->satker == '5300')
                    <div class="basic-form">
                    <form id="pk" action="{{ route('pk.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Renstra</label>
                            <div class="col-sm-10">
                                <textarea class="form-control h-150px" rows="6" id="renstra" name="renstra" placeholder="Renstra"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Perjanjian Kinerja</label>
                            <div class="col-sm-10">
                            <textarea class="form-control h-150px" rows="6" id="nama_pk_prov" name="nama_pk_prov" placeholder="Perjanjian Kinerja"></textarea>
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
                    <form id="pk" action="{{ route('pk.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Renstra</label>
                            <div class="col-sm-10">
                                <textarea class="form-control h-150px" rows="6" id="renstra_kab" name="renstra_kab" placeholder="Renstra"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Perjanjian Kinerja</label>
                            <div class="col-sm-10">
                            <textarea class="form-control h-150px" rows="6" id="nama_pk_kab" name="nama_pk_kab" placeholder="Perjanjian Kinerja"></textarea>
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

<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
@endsection