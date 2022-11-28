<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Pk;
use App\Models\Pk_Kab;

class PkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
           
            $kode = auth()->user()->satker;
        
            $pk_prov = DB::table('pk_prov')->get();
      
            $pk_kab = DB::table('pk_kab')->where('kode_satker', $kode)->get();
     
        return view('pk.index',compact('pk_prov','pk_kab'));
    }

   
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $kode = auth()->user()->satker;
        dd($request->renstra);
        if ($kode == '5300') {

            $this->validate($request, [
                'renstra' => 'required|string|max:155',
                'nama_iku_prov' => 'required',
            ]);
    
            $pk = Pk::create([
                'renstra' => $request->renstra,
                'nama_pk_prov' => $request->nama_pk_prov,
            ]);
        }
        else{
            $this->validate($request, [
                'renstra_kab' => 'required|string|max:155',
                'nama_pk_kab' => 'required',
            ]);
    
            $pk_kab = Pk_Kab::create([
                'renstra_kab' => $request->renstra_kab,
                'nama_pk_kab' => $request->nama_pk_kab,
                'kode_satker' => $kode,
            ]);
        }
        
        return redirect()->route('pk.index')
                        ->with('success','PK Telah Ditambahkan.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
   
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kode = auth()->user()->satker;
        if ($kode == '5300') {

            $pk = Pk::find($id);
            
        }
        else{
            $pk = Pk_Kab::find($id);
        
            
        } 
       
        return view('pk.edit',compact('pk'));

       
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kode = auth()->user()->satker;
       
        if ($kode == '5300') {

            $this->validate($request, [
                'renstra' => 'required|string|max:155',
                'nama_pk_prov' => 'required',
            ]);
    
            $pk = Pk::find($id);
		    $pk->renstra = $request->renstra;
            $pk->nama_pk_prov = $request->nama_pk_prov;
            $pk->save();

        }
        else{
            $this->validate($request, [
                'renstra_kab' => 'required|string|max:155',
                'nama_pk_kab' => 'required',
            ]);
            $pk = Pk_Kab::find($id);
		    $pk->renstra_kab = $request->renstra_kab;
            $pk->nama_pk_kab = $request->nama_pk_kab;
            $pk->kode_satker = $kode;
            $pk->save();
            
        }
        
    
        
    
        return redirect()->route('pk.index')
                        ->with('edit','PK telah diubah');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kode = auth()->user()->kode_satker;
        if ($kode == '5300') {

            $pk = Pk::findOrFail($id);
            $pk->delete();
        }
        else{
            $pk_kab = Pk_Kab::findOrFail($id);
            $pk_kab->delete();
        }
    
        return redirect()->route('pk.index')
                        ->with('delete','PK Telah dihapus');
    }
}
