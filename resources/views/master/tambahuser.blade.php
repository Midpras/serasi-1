@extends('layouts.main')

@section('container')

<div class="container-fluid">    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah User</h4>
                <div class="form-validation">
                    <form action="{{route('users.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-10">
                                <select name="name" id="name" class="form-control js-example-basic-select2">
                                    <option value="" selected disabled hidden>Cari Nama Pegawai</option>
                                    @foreach($pegawais as $pegawai)
                                        <option value="{{$pegawai->nama}}"> {{$pegawai->nama}}</option>
                                    @endforeach
                                </select>
                                @error('nama')
                                    <div class="error-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIP Lama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" readonly>
                                @error('nip')
                                    <div class="error-feedback alert alert-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                @error('email')
                                <div class="error-feedback alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <label class="col-form-label col-sm-2 pt-0">Radios</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" name="role" id="role" type="radio" name="gridRadios" value="Admin" checked="checked">
                                        <label class="form-check-label">Admin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="role" id="role" type="radio" name="gridRadios" value="Ketua Tim">
                                        <label class="form-check-label">Ketua Tim</label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" name="role" id="role" type="radio" name="gridRadios" value="Kepala Kabupate ">
                                        <label class="form-check-label">Kepala Kabupaten</label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" name="role" id="role" type="radio" name="gridRadios" value="User">
                                        <label class="form-check-label">User</label>
                                    </div>
                                </div>
                                @error('role')
                                <div class="error-feedback alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-2">Satuan Kerja</div>
                            <div class="col-sm-10">
                                <select class="form-control" id="satker" name="satker"> 
                                    @foreach($satker as $satuankerja)
                                    <option value="{{$satuankerja->kode_satker}}"> {{$satuankerja->nama_satker}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="error-feedback alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror  
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Atasan Langsung</label>
                            <div class="col-sm-10">
                                <select name="ttd" id="ttd" class="form-control js-example-basic-select2">
                                    <option value="" selected disabled hidden>Cari Nama Pegawai</option>
                                    @foreach($tims as $tim)
                                        <option value="{{$tim->id_user}}"> {{$tim->user->name}}</option>
                                    @endforeach
                                </select>
                                @error('nama')
                                    <div class="error-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Tambah User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>
<!-- row -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="{{ asset('assets/plugins/select2/select2-init.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
<script>
    $('#name').change(function(){
    var name = $(this).val();
    var url = '{{ route("getNIP", ":name") }}';
    url = url.replace(':name', name);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#nip').val(response.nip);
                $('#email').val(response.email);
            }
        }
    });
});
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
{{-- Select2 --}}


<!-- Custom script -->

@endsection


