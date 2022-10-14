@extends('layouts.main')

@section('container')

<div class="container-fluid">>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kegiatan</h4>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('updatekeglvl1',$lvl1->id_lvl1) }}" method="POST">
                        <div class="form-group">
                            @method('put')
                            @csrf
                            <label>Nama Kegiatan Level 1</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Kegiatan" name="nama_lvl1" id="nama_lvl1" value="{{$lvl1->nama_lvl1}}" required>
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
</div>
@endsection
