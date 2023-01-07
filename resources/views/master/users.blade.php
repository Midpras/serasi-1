@extends('layouts.main')

@section('optionalplugins')
<link href="{{ asset('assets/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
@endsection

@section('container')

<div class="container-fluid">    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Users</h4>
                <div class="row justify-content-end mr-3">
                    <div class="col-lg-3"><a href="{{ route('users.create') }}" class="btn btn-primary btn-block"><i class="ti-plus f-s-12 m-r-5"></i>Tambah User</a></div>
                </div>
                <div class="table-responsive">
                    <table id="users" name="users" class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Satker</th>
                                <th>Atasan Langsung</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->nip}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->satker}}</td>
                                    @if($user->parent)
                                    <td>{{$user->parent->name}}</td>
                                    @else
                                    <td>Pejabat</td>
                                    @endif
                                    <td>
                                        <span>
                                            <a href={{route('users.edit', $user->id)}} data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 "></i> </a>
                                            <a href=# data-toggle="tooltip" data-placement="top" title="Delete" class="sweet-confirm" data-nama ="{{$user->name}}" data-id = "{{$user->id}}">
                                                <i class="fa fa-close color-danger"></i> 
                                            </a>
                                        </span>
                                    </td>          
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Satker</th>
                                <th>Atasan Langsung</th>
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
<script src="sweetalert2.min.js"></script>
<!-- Custom script -->
<script>
    $('.sweet-confirm').click(function(){
        var nip = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        Swal.fire({
        title: 'Menghapus data',
        text: "Apakah ingin menghapus user "+nama+"?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'User telah dihapus.',
            'success'
            )
            setTimeout(function() {
            window.location = "/users/destroy/"+nip+"";
            }, 2000);   
        }
        })
    })
</script>
<script>
	$(document).ready(function() {
		$('#users').DataTable();
	});
</script>

@endsection

