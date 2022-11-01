@extends('layouts.main')

@section('container')

<div class="container-fluid">    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Entri Kegiatan Level 2</h4>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('level2.store') }}" method="POST">
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
                                    <span class="d-inline-flex">
                                        <a href={{route('level2.edit', $keglvl2->id_lvl2)}} data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted  m-r-5"></i> </a>
                                        <a href=# data-toggle="tooltip" data-placement="top" title="Delete" class="sweet-confirm" data-nama = "{{$keglvl2->nama_lvl2}}" data-id = "{{$keglvl2->id_lvl2}}">
                                            <i class="fa fa-close color-danger"></i> 
                                        </a>  
                                        {{-- <form action={{route('level2.destroy', $keglvl2->id_lvl2)}} method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="sweet-confirm" style="border : none;">
                                                    <i class="fa fa-close color-danger sweet-confirm"></i> 
                                                </button>
                                        </form> --}}
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
            window.location = "/level2/destroy/"+data+"";
            }, 2000);   
        }
        })
    })
</script>
@endsection

<script>
	$(document).ready(function() {
		$('#lvl2').DataTable();
	});
</script>