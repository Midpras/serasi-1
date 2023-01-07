@extends('layouts.main')

@section('optionalplugins')
    <link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('container')
    <div class="container-fluid">
        <div class="row page-titles">

            <div class="col p-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Penugasan IKU</li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class='card-tittle'>Penugasan IKU</h4>
                        @if (\Auth::user()->satker == '5300')
                            <h5 class="card-title">{{ $iku->nama_iku_prov }} {{ $iku->id_iku_prov }}</h5>
                        @endif

                        @if (\Auth::user()->satker !== '5300')
                            <h5 class="card-title">{{ $iku->nama_iku_kab }} {{ $iku->id_iku_kab }}</h5>
                        @endif
                    </div>
                </div>
                <div class="card">
                    {{-- menampilkan error validasi --}}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <?php dump($kegiatan[0]->level2->nama_lvl2);
                    dump($kegiatan[0]->level1->nama_lvl1); ?>
                    <?php dump($tim[0]->id_user_ketua); ?>
                    <?php dump($iku->id_iku_prov); ?>
                    <div class="card-body">
                        @if (\Auth::user()->satker == '5300')
                            <div class="basic-form">
                                <form action="/iki/tugasiku" method="post" autocomplete="off"
                                    enctype="multipart/form-data">
                                    {{ @csrf_field() }}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Satuan</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control h-150px" rows="6" id="satuan_iki_prov" name="satuan_iki_prov" placeholder="Satuan"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Target</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control h-150px" rows="6" id="target_iki_prov" name="target_iki_prov" placeholder="Target"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Perhitungan</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control h-150px" rows="6" id="perhitungan_prov" name="perhitungan_prov"
                                                placeholder="Perhitungan"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kegiatan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control h-150px" name="nama_iki_prov">
                                                <option selected disabled>-- Pilih --</option>
                                                @foreach ($kegiatan as $p)
                                                    <option value="{{ $p->level2->nama_lvl2 }} {{ $p->level1->nama_lvl1 }}">
                                                        [{{ $p->level1->nama_lvl1 }}] {{ $p->level2->nama_lvl2 }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" id="id_iku" name="id_iku" value="{{ $iku->id_iku_prov }}" />
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Penugasan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control h-150px" name="user">
                                                <option selected disabled>-- Pilih --</option>
                                                @foreach ($tim as $p)
                                                    <option value="{{ $p->id_user_ketua }}">{{ $p->nama_tim }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-rounded btn-success"><span
                                                    class="btn-icon-left"><i
                                                        class="fa fa-plus color-success"></i></span>Penugasan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif

                        @if (\Auth::user()->satker !== '5300')
                            <div class="basic-form">
                                <form action="{{ route('iki.store') }}" method="POST" autocomplete="off">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Satuan</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control h-150px" rows="6" id="satuan_iki_kab" name="satuan_iki_kab" placeholder="Satuan"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Target</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control h-150px" rows="6" id="target_iki_kab" name="target_iki_kab" placeholder="Target"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Perhitungan</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control h-150px" rows="6" id="perhitungan_kab" name="perhitungan_kab"
                                                placeholder="Perhitungan"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kegiatan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control h-150px" name="kegiatan">
                                                <option selected disabled>-- Pilih --</option>
                                                @foreach ($kegiatan as $p)
                                                    <option value="{{ $p->id_kegiatan }}">[{{ $p->lvl1->nama_lvl1 }}]
                                                        {{ $p->lvl2->nama_lvl2 }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" id="id_iku" name="id_iku"
                                        value="{{ $iku->id_iku_kab }}" />
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Penugasan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control h-150px" name="user">
                                                <option selected disabled>-- Pilih --</option>
                                                @foreach ($user as $p)
                                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-rounded btn-success"><span
                                                    class="btn-icon-left"><i
                                                        class="fa fa-plus color-success"></i></span>Penugasan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('optionaljs')
    <!-- Custom script -->
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
