@extends('layouts.main')

@section('optionalplugins')
<link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

@endsection

@section('nama')
    <?php echo $nama->name; ?>
@endsection

@section('role')
    <?php echo $nama->role; ?>
@endsection

@section('container')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col p-0">
            <h4> 
			@if ($ckp == NULL) 
			Entri CKP (Belum Ada Penugasan)	
			@elseif ($ckp[0]->bulan_prov == 1) 
			Entri CKP Bulan Januari Tahun {{ $ckp[0]->tahun_prov }}
			@elseif ($ckp[0]->bulan_prov == 2) 
			Entri CKP Bulan Februari Tahun {{ $ckp[0]->tahun_prov }}		
			@elseif ($ckp[0]->bulan_prov == 3) 
			Entri CKP Bulan Maret Tahun {{ $ckp[0]->tahun_prov }}
			@elseif ($ckp[0]->bulan_prov == 4) 
			Entri CKP Bulan April Tahun {{ $ckp[0]->tahun_prov }}
			@elseif ($ckp[0]->bulan_prov == 5) 
			Entri CKP Bulan Mei Tahun {{ $ckp[0]->tahun_prov }}		
			@elseif ($ckp[0]->bulan_prov == 6) 
			Entri CKP Bulan Juni Tahun {{ $ckp[0]->tahun_prov }}
			@elseif ($ckp[0]->bulan_prov == 7) 
			Entri CKP Bulan Juli Tahun {{ $ckp[0]->tahun_prov }}	
			@elseif ($ckp[0]->bulan_prov == 8) 
			Entri CKP Bulan Agustus Tahun {{ $ckp[0]->tahun_prov }}
			@elseif ($ckp[0]->bulan_prov == 9) 
			Entri CKP Bulan September Tahun {{ $ckp[0]->tahun_prov }}
			@elseif ($ckp[0]->bulan_prov == 10) 
			Entri CKP Bulan Oktober Tahun {{ $ckp[0]->tahun_prov }}		
			@elseif ($ckp[0]->bulan_prov == 11) 
			Entri CKP Bulan November Tahun {{ $ckp[0]->tahun_prov }}
			@elseif ($ckp[0]->bulan_prov == 12) 
			Entri CKP Bulan Desember Tahun {{ $ckp[0]->tahun_prov }}			
			@endif
			</h4>
        </div>
        <div class="col p-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Entri CKP</li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
									<th>Status</th>
                                    <th>Satuan</th>
                                    <th>Target Kuantitas</th>
									<th>Realisasi</th>
									<th>Kualitas</th>
                                    <th>Butir Kegiatan</th>
                                    <th>Capaian Angka Kredit</th>
                                    <th>Keterangan</th>
									
                                </tr>			
                            </thead>
                            <tbody>
                            @foreach ($ckp as $key => $ckp)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $ckp->nama_kegiatan }}</td>
										@if(($ckp->status_ckp_prov == 'Belum Entri') && ($ckp->realisasi_ckp_prov == NULL))
										<td><a href="{{url('/entrirealisasi/'.$ckp->id_ckp_prov)}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span></td>
										@elseif(($ckp->status_ckp_prov == 'Belum Entri') && ($ckp->realisasi_ckp_prov <> NULL))
										<td><a href="{{url('/entrirealisasi/'.$ckp->id_ckp_prov)}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Entri CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
										<a href="{{url('/kirimckp/'.$ckp->bulan_prov.'/'.$ckp->tahun_prov.'/'.$ckp->id_ckp_prov)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Kirim CKP">
                                        <span class="btn-inner--icon"><i class="fas fa-send"></i></span></td>									
										@elseif($ckp->status_ckp_prov == 'Dikirim')
										<td><a href="#" class="btn btn-success btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Sudah Dikirim">
                                        <span class="btn-inner--icon"><i class="fas fa-send"></i></span></td>
										@elseif($ckp->status_ckp_prov == 'Dinilai')
										<td><a href="#" class="btn btn-success btn-sm" role="button" aria-pressed="true" data-toggle="tooltip" data-original-title="Sudah Dinilai">
                                        <span class="btn-inner--icon"><i class="fas fa-check"></i></span></td>
										@endif										
										<td>{{ $ckp->satuan_ckp_prov }}</td>
                                        <td>{{ $ckp->target_ckp_prov }}</td>
                                        <td>{{ $ckp->realisasi_ckp_prov }}</td>
										<td>{{ $ckp->nilai_ckp_prov }}</td>
										<td>{{ $ckp->butir_ak }}</td>
										<td>{{ $ckp->jum_ak }}</td>
										<td>{{ $ckp->keterangan }}</td>

                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
</div>




@endsection

@section('optionaljs')
<!-- Custom script -->

<script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
<script src="../../extensions/Editor/js/dataTables.editor.min.js"></script>

<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>

<script>
var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        //ajax: "../php/staff.php",
        table: "#example",
        fields: [ {
                label: "Realisasi:",
                name: "realisasi"
            }
        ]
    } );
 
    // Activate an inline edit on click of a table cell
    $('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    } );
 
    $('#example').DataTable( {
        dom: "Bfrtip",
        //ajax: "../php/staff.php",
        order: [[ 1, 'asc' ]],
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
            { data: "realisasi" }
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );
</script>
@endsection