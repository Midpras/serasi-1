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
                                    <label>Nama Kegiatan</label>
                                    <select class="form-control" id="id_lvl1" name="id_lvl1"> 
                                        @foreach($lvl1 as $keglvl1)
                                        <option value="{{$keglvl1->id_lvl1}}"> {{$keglvl1->nama_lvl1}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nama Sub Kegiatan</label>
                                    <select class="form-control" id="id_lvl2" name="id_lvl2"> 
                                        @foreach($lvl2 as $keglvl2)
                                        <option value="{{$keglvl2->id_lvl2}}"> {{$keglvl2->nama_lvl2}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nama Rincian Kegiatan</label>
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
                            <div class="form-group">
                                <label>Tipe Kegiatan</label>
                                <select class="form-control" id="type" name="type"> 
                                    <option value="main">Utama</option>
                                    <option value="additional">Penunjang</option>
                                </select>
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
                                <th>Kegiatan</th>
                                <th>Sub Kegiatan</th>
                                <th>Rincian Kegiatan</th>
                                <th>Kegiatan CKP</th>
                                <th>Tipe Kegiatan</th>
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
                                <td>{{$keg->type === "main" ? "Utama" : "Penunjang"}}</td>
                                <td>
                                    <span>
                                        <a href="{{route('kegiatan.edit', $keg->id_kegiatan)}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5 "></i> </a>
                                        <a href=# data-toggle="tooltip" data-placement="top" title="Delete" class="sweet-confirm" data-nama = "{{$keg->nama_kegiatan}}" data-id = "{{$keg->id_kegiatan}}">
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
                                <th>Kegiatan</th>
                                <th>Sub Kegiatan</th>
                                <th>Rincian Kegiatan</th>
                                <th>Kegiatan CKP</th>
                                <th>Tipe Kegiatan</th>
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
        confirmButtonText: 'Yes, Hapus saja!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            setTimeout(function() {
            window.location = "/kegiatan/destroy/"+data+"";
            }, 2000);   
        }
        })
    })
</script>
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