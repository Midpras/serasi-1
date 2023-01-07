@extends('layouts.main')

@section('container')

<div class="container-fluid">>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kegiatan</h4>
                <div class="form-validation">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" readonly>
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
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" value="{{$user->nip}}" readonly >
                                {{-- <input type="text" class="form-control" name="niplama" id="niplama" placeholder="NIP" hidden> --}}
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
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$user->email}}">
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
                                        <input class="form-check-input" name="role" id="role" type="radio" name="gridRadios" value="Admin" {{ $user->role == "Admin" ? 'checked' : '' }}>
                                        <label class="form-check-label">Admin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="role" id="role" type="radio" name="gridRadios" value="Ketua Tim" {{ $user->role == "Ketua Tim" ? 'checked' : '' }}>
                                        <label class="form-check-label">Ketua Tim</label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" name="role" id="role" type="radio" name="gridRadios" value="Kepala Kabupaten" {{ $user->role == "Kepala Kabupaten" ? 'checked' : '' }}>
                                        <label class="form-check-label">Kepala Kabupaten</label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" name="role" id="role" type="radio" name="gridRadios" value="User" {{ $user->role == "User" ? 'checked' : '' }}>
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
                                        <option value="{{$satuankerja->kode_satker}}" {{$user->satker == $satuankerja->kode_satker ? "selected" : '' }}> {{$satuankerja->nama_satker}}</option>
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
                                        <option value="{{$tim->id_user}}" {{$user->id_ttd == $tim->id_user ? "selected" : ' '}}> {{$tim->user->name ?? ' '}}</option>
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
