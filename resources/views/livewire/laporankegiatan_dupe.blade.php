    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Kegiatan</h4>
                <div class="form-validation">
                    <form action="#" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table id="#" name="#" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Satuan Kegiatan</th>
                                        <th>Volume</th>
                                        <th>Satuan Durasi</th>
                                        <th>Status Kegiatan</th>
                                        <th>Pemberi Tugas</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="#">
                                        <div class="form-row">
                                            <tr>
                                                <th style="width: 5%">
                                                    <div class="col-1">
                                                        1
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="col-16">
                                                        <input type="text" class="form-control" name="namakegiatan.0" id="namakegiatan.0" wire:model="namakegiatan.0" required>
                                                    </div>                                
                                                </th>
                                                    <th style="width: 10%">
                                                        <div class="col-12">                       
                                                            <input type="text" class="form-control" name="satuankegiatan.0" id="satuankegiatan.0" wire:model="satuankegiatan.0" required>
                                                        </div>
                                                    </th>                                            
                                                <th style="width: 5%">                                
                                                    <input type="text" class="form-control" name="volume.0" id="volume.0" wire:model="volume.0" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="satuandurasi.0" id="satuandurasi.0" wire:model="satuandurasi.0" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="pemberitugas.0" id="pemberitugas.0" wire:model="pemberitugas.0" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="keterangan.0" id="keterangan.0" wire:model="keterangan.0" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="statuskegiatan.0" id="statuskegiatan.0" wire:model="statuskegiatan.0" required>
                                                </th>
                                            </tr>
                                            {{-- Add Form --}}
                                            @foreach($inputs as $key => $value)
                                            <tr>
                                                <th style="width: 5%">
                                                    <div class="col-1">
                                                        1
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="col-16">
                                                        <input type="text" class="form-control" name="namakegiatan.{{$value}}" id="namakegiatan.{{$value}}" wire:model="namakegiatan.{{$value}}" required>
                                                    </div>                                
                                                </th>
                                                    <th style="width: 10%">
                                                        <div class="col-12">                       
                                                            <input type="text" class="form-control" name="satuankegiatan.{{$value}}" id="satuankegiatan.{{$value}}" wire:model="satuankegiatan.{{$value}}" required>
                                                        </div>
                                                    </th>                                            
                                                <th style="width: 5%">                                
                                                    <input type="text" class="form-control" name="volume.{{$value}}" id="volume.{{$value}}" wire:model="volume.{{$value}}" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="satuandurasi.{{$value}}" id="satuandurasi.{{$value}}" wire:model="satuandurasi.{{$value}}" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="pemberitugas.{{$value}}" id="pemberitugas.{{$value}}" wire:model="pemberitugas.{{$value}}" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="keterangan.{{$value}}" id="keterangan.{{$value}}" wire:model="keterangan.{{$value}}" required>
                                                </th>
                                                <th style="width: 10%">                                
                                                    <input type="text" class="form-control" name="statuskegiatan.{{$value}}" id="statuskegiatan.{{$value}}" wire:model="statuskegiatan.{{$value}}" required>
                                                </th>
                                            </tr>
                                            @endforeach
                                        </div>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group row">
                            <div class="row">
                                <div class="col-12 ps-0">
                                    <button type="button" class="btn btn-primary" wire:click.prevent="add({{$i}})"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" wire:click.prevent="store()">Tambah Kegiatan</button>
                                </div> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 