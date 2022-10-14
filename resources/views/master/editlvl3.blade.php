@extends('layouts.main')

@section('container')

<div class="container-fluid">>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kegiatan</h4>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('updatekeglvl3',$lvl3->id_lvl3) }}" method="POST">
                        <div class="form-group">
                            @method('put')
                            @csrf
                            <label>Nama Kegiatan Level 3</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Kegiatan" name="nama_lvl3" id="nama_lvl3" value="{{$lvl3->nama_lvl3}}" required>
                            @error('nama_lvl3')
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
