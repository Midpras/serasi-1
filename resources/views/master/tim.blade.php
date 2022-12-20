@extends('layouts.main')

@section('container')

<div class="container-fluid">    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Entri Tim Kerja</h4>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('tim.store') }}" method="POST">
                        <div class="form-group">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Tim Kerja</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Tim Kerja" name="nama_tim" id="nama_tim" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Kode Satker</label>
                                    <select class="form-control" id="kode_satker" name="kode_satker"> 
                                        @foreach($satker as $satuankerja)
                                        <option value="{{$satuankerja->kode_satker}}"> {{$satuankerja->nama_satker}}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                            </div>
                            <div class= "form-row">
                                <div class="form-group col-md-12">
                                    <label>Nama Ketua Tim</label>
                                    <select name="ketua_tim" id="ketua_tim" class="form-control js-example-basic-select2">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}"> {{$user->name}}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Tim</h4>
                <div class="table-responsive">
                    <table id="tim" name="tim" class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Tim</th>
                                <th>Kode Satker</th>
                                <th>Ketua Tim</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tim as $timkerja)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$timkerja->nama_tim}}</td>
                                <td>{{$timkerja->kode_satker}}</td>
                                @if($timkerja->user)
                                    <td>{{$timkerja->user->name}}</td>
                                @else
                                    <td>NULL</td>
                                @endif
                                <td>
                                    <span>
                                        <a href="{{route('tim.edit', $timkerja->id_tim)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 "></i> </a>
                                        <a href=# data-toggle="tooltip" data-placement="top" title="Delete" class="sweet-confirm" data-nama ="{{$timkerja->nama_tim}}" data-id = "{{$timkerja->id_tim}}">
                                            <i class="fa fa-close color-danger"></i> 
                                        </a>
                                    </span>
                                </td> 
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Tim</th>
                                <th>Kode Satker</th>
                                <th>Ketua Tim</th>
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
<script src="{{ asset('assets/plugins/select2/select2-init.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
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
            nama+" berhasil dihapus",
            'success'
            )
            setTimeout(function() {
            window.location = "/tim/destroy/"+data+"";
            }, 2000);            
        }
        })
    })
</script>

@endsection

<script>
	$(document).ready(function() {
		$('#tim').DataTable();
	});
</script>