@extends('layouts.main')

@section('container')

<div class="container-fluid">    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Entri Kegiatan Level 1</h4>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('level1.store') }}" method="POST">
                        <div class="form-group">
                            @csrf
                            <label>Nama Kegiatan Level 1</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Kegiatan" name="nama_lvl1" id="nama_lvl1">
                            @error('nama_lvl1') 
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
                <h4 class="card-title">Daftar Kegiatan Level 1</h4>
                <div class="table-responsive">
                    <table id="lvl1" name="lvl1" class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lvl1 as $keglvl1)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                    <td>{{$keglvl1->nama_lvl1}}</td>
                                <td>
                                    <span class="d-inline-flex">
                                        <a href={{route('level1.edit', $keglvl1->id_lvl1)}} data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted  m-r-5"></i> </a>
                                        <a href=# data-toggle="tooltip" data-placement="top" title="Delete" class="sweet-confirm" data-nama = "{{$keglvl1->nama_lvl1}}" data-id = "{{$keglvl1->id_lvl1}}">
                                            <i class="fa fa-close color-danger"></i> 
                                        </a>
                                        {{-- <form action={{route('level1.destroy', $keglvl1->id_lvl1)}} method="POST">
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
        confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Berhasil Menghapus Data!',
            'kegiatan '+nama+" berhasil dihapus",
            'success'
            )
            setTimeout(function() {
            window.location = "/level1/destroy/"+data+"";
            }, 2000);            
        }
        })
    })
</script>

@endsection

<script>
	$(document).ready(function() {
		$('#lvl1').DataTable();
	});
</script>