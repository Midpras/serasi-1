@extends('layouts.main')

@section('optionalplugins')
<link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('container')
<div class="container-fluid">

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col p-0">
            <h4>Entri Realisasi CKP</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Entri Realisasi CKP</li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
									@foreach ($ckp as $ckp)	
                                        <form action="{{ url('/editrealisasi/'.$ckp->bulan_prov.'/'.$ckp->tahun_prov.'/'.$ckp->id_ckp_prov) }}" method="POST">
										@csrf
										
                                            <div class="mb-3">
                                                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ $ckp->nama_kegiatan }}" disabled required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="satuan_ckp_prov" class="form-label">Satuan</label>
                                                <input type="text" class="form-control" id="satuan_ckp_prov" name="satuan_ckp_prov" value="{{ $ckp->satuan_ckp_prov }}" disabled required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="target_ckp_prov" class="form-label">Target Kuantitas</label>
                                                <input type="text" class="form-control" id="target_ckp_prov" name="target_ckp_prov" value="{{ $ckp->target_ckp_prov }}" disabled required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="realisasi_ckp_prov" class="form-label">Realisasi</label>
                                                <input type="number" class="form-control" id="realisasi_ckp_prov" name="realisasi_ckp_prov" value="{{ $ckp->realisasi_ckp_prov }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="butir_ak" class="form-label">Butir Kegiatan</label>
                                                <input type="text" class="form-control" id="butir_ak" name="butir_ak" value="{{ $ckp->butir_ak }}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="jum_ak" class="form-label">Capaian Angka Kredit</label>
                                                <input type="number" class="form-control" min="0.0001" max="100" step="0.0001" id="jum_ak" name="jum_ak" value="{{ $ckp->jum_ak }}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $ckp->keterangan }}" />
                                            </div>											
                                            <button class="btn btn-primary" type="submit">Simpan</button>
											
                                        </form>
										@endforeach
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
    </div>
</div>
@endsection

@section('optionaljs')
<!-- Custom script -->

<script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
@endsection