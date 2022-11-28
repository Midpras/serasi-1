<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\IkuProv;
use App\Models\Kegiatan;
use App\Models\IkuKab;
class IkuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        
           
            $kode = auth()->user()->satker;
        
            $iku_prov = IkuProv::with(['pk_prov'])->get();
      
            $iku_kab = IkuKab::with(['pk_kab'])->where('kode_satker',$kode)->get();
       
            $pk_prov = DB::table('pk_prov')->get();
      
            $pk_kab = DB::table('pk_kab')->where('kode_satker', $kode)->get();

        return view('iku.index',compact('iku_prov','iku_kab','pk_prov','pk_kab'));
    }

    public function store(Request $request)
    {



        $kode = auth()->user()->satker;
        if ($kode == 5300) {

            $this->validate($request, [
                'nama_iku_prov' => 'required|string|max:155',
                'satuan_iku_prov' => 'required',
                'target_iku_prov' => 'required',
            ]);
    
            $iku_prov = IkuProv::create([
                'id_pk_prov'=> $request->pk,
                'nama_iku_prov' => $request->nama_iku_prov,
                'satuan_iku_prov' => $request->satuan_iku_prov,
                'target_iku_prov' => $request->target_iku_prov,
            ]);
        }
        else{
            $this->validate($request, [
                'nama_iku_kab' => 'required|string|max:155',
                'satuan_iku_kab' => 'required',
                'target_iku_kab' => 'required',
            ]);
    
            $iku_kab = IkuKab::create([
                'id_pk_kab'=> $request->pk,
                'nama_iku_kab' => $request->nama_iku_kab,
                'satuan_iku_kab' => $request->satuan_iku_kab,
                'target_iku_kab' => $request->target_iku_kab,
                'kode_satker' => $kode,
            ]);
        }
        
        return redirect()->route('iku.index')
                        ->with('success','IKU Telah Ditambahkan.');
    }
    public function edit($id)
    {
        $kode = auth()->user()->satker;
        if ($kode == '5300') {

            $iku = IkuProv::with('pk_prov')->find($id);
            
            
        }
        else{
            $iku = IkuKab::with('pk_kab')->find($id);
        
            
        }
        

        $pk_prov = DB::table('pk_prov')->get();
      
        $pk_kab = DB::table('pk_kab')->where('kode_satker', $kode)->get();
 
       
        return view('iku.edit',compact('iku','pk_prov','pk_kab'));

       
    }

    public function update(Request $request, $id)
    {
        $kode = auth()->user()->satker;
       
        if ($kode == '5300') {

            $this->validate($request, [
                'nama_iku_prov' => 'required|string|max:155',
                'satuan_iku_prov' => 'required',
                'target_iku_prov' => 'required',
            ]);
    
            $iku = IkuProv::with('pk_prov')->find($id);
            $iku->id_pk_prov = $request->
		    $iku->nama_iku_prov = $request->nama_iku_prov;
            $iku->satuan_iku_prov = $request->satuan_iku_prov;
            $iku->target_iku_prov = $request->target_iku_prov;
            $iku->save();

        }
        else{
            $this->validate($request, [
                'nama_iku_kab' => 'required|string|max:155',
                'satuan_iku_kab' => 'required',
                'target_iku_kab' => 'required',
            ]);

            $iku = IkuKab::with('pk_kab')->find($id);

            $iku->id_pk_kab = $request->pk;
            $iku->nama_iku_kab = $request->nama_iku_kab;
		    $iku->satuan_iku_kab = $request->satuan_iku_kab;
            $iku->target_iku_kab = $request->target_iku_kab;
            $iku->kode_satker = $kode;
            $iku->save();
            
        }
        
    
        
    
        return redirect()->route('iku.index')
                        ->with('edit','PK telah diubah');
    }

    public function show($id){
        $id_iku = $id;
        $kode = auth()->user()->satker;
        if ($kode == '5300') {

            $iku = IkuProv::with('pk_prov')->find($id);
            
            
        }
        else{
            $iku = IkuKab::with('pk_kab')->find($id);
            
        }


        $kegiatan = DB::table('kegiatan')->get();
        $tim   = DB::table('tim')->get();
        return view('iki.entri',compact('kegiatan','id_iku','iku','user'));
    }


    public function destroy($id)
    {
        $kode = auth()->user()->satker;
        if ($kode == 5300) {

            $pk = IkuProv::findOrFail($id);
            $pk->delete();
        }
        else{
            $pk_kab = IkuKab::findOrFail($id);
            $pk_kab->delete();
        }
    
        return redirect()->route('iku.index')
                        ->with('delete','IKU Telah dihapus');
    }

}
