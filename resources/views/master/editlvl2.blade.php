@extends('layouts.main')

@section('container')

<div class="container-fluid">>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kegiatan</h4>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('level2.update',$lvl2->id_lvl2) }}" method="POST">
                        <div class="form-group">
                            @method('put')
                            @csrf
                            <label>Nama Sub Kegiatan</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Kegiatan" name="nama_lvl2" id="nama_lvl2" value="{{$lvl2->nama_lvl2}}" required>
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
</div>
@endsection
