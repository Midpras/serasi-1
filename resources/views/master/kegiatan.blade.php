@extends('layouts.main')

@section('container')

<div class="container-fluid">    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Entri Kegiatan Level 4</h4>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('kegiatan.store') }}" method="POST">
                        <div class="form-group">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nama Kegiatan Level 1</label>
                                    <select class="form-control" id="id_lvl1" name="id_lvl1"> 
                                        @foreach($lvl1 as $keglvl1)
                                        <option value="{{$keglvl1->id_lvl1}}"> {{$keglvl1->nama_lvl1}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nama Kegiatan Level 2</label>
                                    <select class="form-control" id="id_lvl2" name="id_lvl2"> 
                                        @foreach($lvl2 as $keglvl2)
                                        <option value="{{$keglvl2->id_lvl2}}"> {{$keglvl2->nama_lvl2}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nama Kegiatan Level 3</label>
                                    <select class="form-control" id="id_lvl3" name="id_lvl3"> 
                                        @foreach($lvl3 as $keglvl3)
                                        <option value="{{$keglvl3->id_lvl3}}"> {{$keglvl3->nama_lvl3}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" class="form-control" placeholder="Nama Kegiatan" name="nama_kegiatan" id="nama_kegiatan" required>
                            </div>
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
                <h4 class="card-title">Daftar Kegiatan</h4>
                <div class="table-responsive">
                    <table id="kegiatan" name="kegiatan" class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Level 1</th>
                                <th>Level 2</th>
                                <th>Level 3</th>
                                <th>Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kegiatan as $keg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$keg->lvl1->nama_lvl1}}</td>
                                <td>{{$keg->lvl2->nama_lvl2}}</td>
                                <td>{{$keg->lvl3->nama_lvl3}}</td>
                                <td>{{$keg->nama_kegiatan}}</td>
                                <td>
                                    <span>
                                        <a href="{{route('kegiatan.edit', $keg->id_kegiatan)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 "></i> </a>
                                        <a href="{{route('destroykegiatan', $keg->id_kegiatan)}}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-close color-danger"></i> </a>  
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
                                <th>Level 1</th>
                                <th>Level 2</th>
                                <th>Level 3</th>
                                <th>Kegiatan</th>
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
		$('#kegiatan').DataTable();
	});
</script>