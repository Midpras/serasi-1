@if (\Auth::user()->kode_satker !== 5300)
                    <div class="basic-form">
                    <form id="pk" action="{{ route('pk.update', $pk->id_pk_kab)}}" method="post" autocomplete="off">
                    
                    @csrf
                    @method('put')
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Renstra</label>
                            <div class="col-sm-10">
                                <textarea class="form-control h-150px" rows="6" id="renstra_kab" name="renstra_kab" placeholder="Renstra" >{{$pk->renstra_kab}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Perjanjian Kinerja</label>
                            <div class="col-sm-10">
                            <textarea class="form-control h-150px" rows="6" id="nama_pk_kab" name="nama_pk_kab" placeholder="Perjanjian Kinerja">{{$pk->nama_pk_kab}}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-rounded btn-success"><span class="btn-icon-left"><i class="fa fa-plus color-success"></i></span>Update</button>
                            </div>
                        </div>
                    </form>
                    </div>

                    @endif