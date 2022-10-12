@extends('layouts.main')

@section('container')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Entri Kegiatan Level 1</h4>
            <div class="basic-form">
                <form action="{{ route('inputkeglvl1') }}" method="POST">
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
@endsection