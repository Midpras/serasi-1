@extends('layouts.main')

@section('container')

<div class="container-fluid">>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kegiatan</h4>
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('kegiatan.update', $kegiatan->id_kegiatan) }}" method="POST">
                        <div class="form-group">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nama Kegiatan</label>
                                    <select class="form-control" id="id_lvl1" name="id_lvl1"> 
                                        <option value="{{$kegiatan->lvl1->id_lvl1}}">{{$kegiatan->lvl1->nama_lvl1}} </option>
                                        @foreach($lvl1 as $keglvl1)
                                            @if($kegiatan->lvl1->id_lvl1 != $keglvl1->id_lvl1)
                                                <option value="{{$keglvl1->id_lvl1}}"> {{$keglvl1->nama_lvl1}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nama Sub Kegiatan</label>
                                    <select class="form-control" id="id_lvl2" name="id_lvl2"> 
                                        <option value="{{$kegiatan->lvl2->id_lvl2}}">{{$kegiatan->lvl2->nama_lvl2}} </option>
                                        @foreach($lvl2 as $keglvl2)
                                            @if($kegiatan->lvl2->id_lvl2 != $keglvl2->id_lvl2)
                                                <option value="{{$keglvl2->id_lvl2}}"> {{$keglvl2->nama_lvl2}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nama Rincian Kegiatan</label>
                                    <select class="form-control" id="id_lvl3" name="id_lvl3"> 
                                        <option value="{{$kegiatan->lvl3->id_lvl3}}">{{$kegiatan->lvl3->nama_lvl3}} </option>
                                        @foreach($lvl3 as $keglvl3)
                                            @if($kegiatan->lvl3->id_lvl3 != $keglvl3->id_lvl3)
                                                <option value="{{$keglvl3->id_lvl3}}"> {{$keglvl3->nama_lvl3}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" class="form-control" placeholder="Nama Kegiatan" name="nama_kegiatan" id="nama_kegiatan" value="{{$kegiatan->nama_kegiatan}}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
