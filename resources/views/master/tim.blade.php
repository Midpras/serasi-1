@extends('layouts.main')

@section('container')

<div class="container-fluid">    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Entri Tim Kerja</h4>
                <div class="form-validation">
                    <form class="form-valide" action=# method="POST">
                        <div class="form-group">
                            @csrf
                            <label>Nama Tim Kerja </label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Tim Kerja" name="nama_timkerja" id="nama_timkerja" required>
                            @error('nama_timkerja')
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Tim</h4>
                <div class="table-responsive">
                    <table id="lvl1" name="lvl1" class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lvl1 as $keglvl1)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                    <td>{{$keglvl1->nama_lvl1}}</td>
                                <td>
                                    <span class="d-inline-flex">
                                        <a href={{route('level1.edit', $keglvl1->id_lvl1)}} data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted  m-r-5"></i> </a>
                                        <a href=# data-toggle="tooltip" data-placement="top" title="Delete" class="sweet-confirm" data-nama = "{{$keglvl1->nama_lvl1}}" data-id = "{{$keglvl1->id_lvl1}}">
                                            <i class="fa fa-close color-danger"></i> 
                                        </a>
                                        {{-- <form action={{route('level1.destroy', $keglvl1->id_lvl1)}} method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="sweet-confirm" style="border : none;">
                                                    <i class="fa fa-close color-danger sweet-confirm"></i> 
                                                </button>
                                        </form> --}}
                                    </span>
                                </td>          
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Kegiatan</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>