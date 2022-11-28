<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form class="row g-3 justify-content-center align-items-center" wire:submit.prevent="store">
                    @csrf
                    <div class="col-12">
                        <div class="row text-center">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-5">
                                        <label class="visually-hidden">Kegiatan</label>
                                        <select class="form-control " form-select" aria-label="Default select example" wire:model="id_kegiatan.0">
                                            <option value=""> </option>
                                            @foreach($grupkegiatan as $level1 => $kegiatan)
                                            <optgroup label="{{ $level1 }}">
                                                @foreach($kegiatan as $keg)
                                                <option value="{{ $keg->id_kegiatan }}">{{ $keg->nama_kegiatan}}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                        @error('id_kegiatan.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="visually-hidden">Target</label>
                                        <input type="number" class="form-control" wire:model="target_ckp.0">
                                        @error('target_ckp.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-3">
                                        <label class="visually-hidden">Satuan</label>
                                        <input type="text" class="form-control" wire:model="satuan_ckp.0">
                                        @error('satuan_ckp.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-2">
                                        <label class="visually-hidden">Bulan</label>
                                        <select class="form-control " form-select" aria-label="Default select example" wire:model="bulan.0">
                                            <option value=""> </option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                        @error('bulan.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-2">
                                        <label class="visually-hidden">Tahun</label>
                                        <input type="text" class="form-control" wire:model="tahun.0">
                                        @error('tahun.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="visually-hidden">Nama</label>
                                        <select class="form-control " form-select" aria-label="Default select example" wire:model="id_user.0">
                                            <option value=""> </option>
                                            @foreach($user as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_user.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="visually-hidden">Apakah untuk Perhitungan?</label>
                                        <select class="form-control " form-select" aria-label="Default select example" wire:model="flag_ckp.0">
                                            <option value=""> </option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                        @error('flag_ckp.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    <!-- <input type="hidden" class="form-control" value="{{ $id }}" wire:model="id_iki.0">
                                <input type="hidden" class="form-control" wire:model="penilai_ckp.0"> -->
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row">
                                    <div class="col-12" style="top : 50%; -ms-transform: translateY(-50%);transform: translateY(-50%); margin:0; position:absolute;">
                                        <button class="btn btn-primary" wire:click.prevent="add({{$i}})"><i class="mdi mdi-plus-box"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Add Form --}}
                        @foreach ($inputs as $key => $value)
                        <hr class="new4">
                        <div wire:key="opsi-key-{{ $key }}">
                            <div class="row text-center">
                                <div class="col-10">
                                    <div class="row">
                                        <div class="col-5">
                                            <label class="visually-hidden">Kegiatan</label>
                                            <select class="form-control " form-select" aria-label="Default select example" wire:model="id_kegiatan.{{ $value }}">
                                                <option value=""> </option>
                                                @foreach($grupkegiatan as $level1 => $kegiatan)
                                                <optgroup label="{{ $level1 }}">
                                                    @foreach($kegiatan as $keg)
                                                    <option value="{{ $keg->id_kegiatan }}">{{ $keg->nama_kegiatan}}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>
                                            @error('id_kegiatan.'.$key) <span class="text-danger error">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-4">
                                            <label class="visually-hidden">Target</label>
                                            <input type="text" class="form-control" wire:model="target_ckp.{{ $value }}">
                                            @error('target_ckp.'.$key) <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-3">
                                            <label class="visually-hidden">Satuan</label>
                                            <input type="text" class="form-control" wire:model="satuan_ckp.{{ $value }}">
                                            @error('satuan_ckp.'.$key) <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-2">
                                            <label class="visually-hidden">Bulan</label>
                                            <select class="form-control " form-select" aria-label="Default select example" wire:model="bulan.{{ $value }}">
                                                <option value=""> </option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                            @error('bulan.'.$key) <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-2">
                                            <label class="visually-hidden">Tahun</label>
                                            <input type="text" class="form-control" wire:model="tahun.{{ $value }}">
                                            @error('tahun.'.$key) <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-4">
                                            <label class="visually-hidden">Nama</label>
                                            <select class="form-control " form-select" aria-label="Default select example" wire:model="id_user.{{ $value }}">
                                                <option value=""> </option>
                                                @foreach($user2 as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_user.'.$key) <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="col-4">
                                            <label class="visually-hidden">Apakah untuk Perhitungan?</label>
                                            <select class="form-control " form-select" aria-label="Default select example" wire:model="flag_ckp.{{ $value }}">
                                                <option value=""> </option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                            @error('flag_ckp.'.$key) <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <!-- <input type="hidden" class="form-control" wire:model="id_iki.{{ $value }}">
                                    <input type="hidden" class="form-control" wire:model="penilai_ckp.{{ $value }}"> -->
                                </div>
                                <div class="col-2">
                                    <div class="row">
                                        <div class="col-12" style="top : 50%; -ms-transform: translateY(-50%);transform: translateY(-50%); margin:0; position:absolute;">
                                            <button class="btn btn-danger mb-3" wire:click.prevent="remove({{$key}})"><i class="mdi mdi-delete-forever"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-12">
                        <div class="row" style="margin : 40px;">
                            <div class="col-12 ps-0 text-center">
                                <button type="button" class="btn btn-primary" wire:click.prevent="store()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
</div>