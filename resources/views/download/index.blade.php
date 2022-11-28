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
            <h4>Download CKP</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Download CKP</li>
            </ol>
        </div>
    </div>

    
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Download CKP</h4>
                    <div class="col-lg-12">
                        
                        <!-- /# card -->
                    </div>
                    <form id="formupdate" autocomplete="off" method="post" action="/download" class="needs-validation d-inline" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="form-control-label" for="year">Tahun</label>
                                <select class="form-control @error('year') is-invalid @enderror" data-toggle="select" name="year">
                                    @foreach($years as $year)
                                    <option value="{{$year->id}}" {{ old('year', $currentyear->id) == $year->id ? 'selected' : '' }}>{{$year->name}}</option>
                                    @endforeach
                                </select>
                                @error('year')
                                <div class="error-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="form-control-label" for="month">Bulan</label>
                                <select class="form-control @error('month') is-invalid @enderror" data-toggle="select" name="month">
                                    @foreach($months as $month)
                                    <option value="{{$month->id}}" {{ old('month') == $month->id ? 'selected' : '' }}>{{$month->name}}</option>
                                    @endforeach
                                </select>
                                @error('month')
                                <div class="error-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" id="sbmtbtn" type="submit">Unduh</button>
                    </form>
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