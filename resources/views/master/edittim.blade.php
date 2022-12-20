@extends('layouts.main')

@section('container')

<div class="container-fluid">>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Tim</h4>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('tim.update',$tim->id_tim) }}" method="POST">
                        <div class="form-group">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Tim Kerja</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Tim Kerja" name="nama_tim" id="nama_tim" value="{{$tim->nama_tim}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Kode Satker</label>
                                    <select class="form-control" id="kode_satker" name="kode_satker"> 
                                        @foreach($satker as $satuankerja)
                                        <option value="{{$satuankerja->kode_satker}}"> {{$satuankerja->nama_satker}}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Nama Ketua Tim</label>
                                    <select name="ketua_tim" id="ketua_tim" class="form-control js-example-basic-select2">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}"> {{$user->name}}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" class="form-control" placeholder="Nama Tim" name="nama_tim" id="nama_tim" value="{{$satuankerja->nama_satker}}" required>
                            </div> --}}
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
