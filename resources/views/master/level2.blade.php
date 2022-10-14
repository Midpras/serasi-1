@extends('layouts.main')

@section('container')

<div class="container-fluid">    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Entri Kegiatan Level 2</h4>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('inputkeglvl2') }}" method="POST">
                        <div class="form-group">
                            @csrf
                            <label>Nama Kegiatan Level 2</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Kegiatan" name="nama_lvl2" id="nama_lvl2" required>
                            @error('nama_lvl2')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Kegiatan Level 2</h4>
                <div class="table-responsive">
                    <table id="lvl2" name="lvl2" class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lvl2 as $keglvl2)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$keglvl2->nama_lvl2}}</td>
                                <td>
                                    <span>
                                        <a href="/keglvl2/edit/{{$keglvl2->id_lvl2}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil colored m-r-5 bg-success"></i> </a>
                                        <a href="/keglvl2/destroy/{{$keglvl2->id_lvl2}}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-close color-danger"></i> </a>  
                                        {{-- <div class="sweetalert m-t-30">
                                            <button class="btn btn-warning btn sweet-confirm" id="sweet-confirm">Delete</button>
                                        </div> --}}
                                    </span>
                                </td>          
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->
@endsection

@section('optionaljs')
{{-- Data Table --}}
<script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
{{-- Form Validation --}}
<script src="{{ asset('assets/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/validation/jquery.validate-init.js') }}"></script>
{{-- Sweetalert --}}
<!-- Custom script -->

@endsection

<script>
	$(document).ready(function() {
		$('#lvl2').DataTable();
	});
</script>