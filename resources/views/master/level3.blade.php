@extends('layouts.main')

@section('container')

<div class="container-fluid">    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Entri Kegiatan Level 3</h4>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('level3.store') }}" method="POST">
                        <div class="form-group">
                            @csrf
                            <label>Nama Kegiatan Level 3</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Kegiatan" name="nama_lvl3" id="nama_lvl3" required>
                            @error('nama_lvl3')
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
                <h4 class="card-title">Daftar Kegiatan Level 3</h4>
                @if(session('delete'))
                    <div class="alert alert-danger">
                        {{session('delete')}}
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="lvl3" name="lvl3" class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lvl3 as $keglvl3)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$keglvl3->nama_lvl3}}</td>
                                <td>
                                    <span class="d-inline-flex">
                                        <a href={{route('level3.edit', $keglvl3->id_lvl3)}} data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted  m-r-5"></i> </a>
                                        {{-- <a href=# data-toggle="tooltip" data-placement="top" title="Delete" class="sweet-confirm" data-nama = "{{$keglvl3->nama_lvl3}}" data-id = "{{$keglvl3->id_lvl3}}">
                                            <i class="fa fa-close color-danger"></i> 
                                        </a>   --}}
                                        <form action=# method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="button" class="sweet-confirm" id="sweet-confirm" data-nama= "{{$keglvl3->nama_lvl3}}" data-id = "{{$keglvl3->id_lvl3}}" data-href= {{route('level3.destroy', $keglvl3->id_lvl3)}} style="border : none; background-color : transparent">
                                                    <i class="fa fa-close color-danger sweet-confirm"></i> 
                                                </button>
                                        </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    $('.sweet-confirm').click(function(){
        var data = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        Swal.fire({
        title: 'Menghapus data',
        text: "Apakah ingin menghapus data "+nama+"?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            setTimeout(function() {
            window.location = "/level3/destroy/"+data+"";
            }, 2000);   
        }
        })
    })
</script>


<!-- Custom script -->

@endsection

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#lvl3').DataTable();
	});
</script>