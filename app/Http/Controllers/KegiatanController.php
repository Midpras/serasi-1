<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Level1;
use App\Models\Level2;
use App\Models\Level3;

use App\Http\Requests\StoreKegiatanRequest;
use App\Http\Requests\UpdateKegiatanRequest;
// use Illuminate\Http\Client\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        $lvl1 = Level1::all();
        $lvl2 = Level2::all();
        $lvl3 = Level3::all();
        return view('master.kegiatan', [
            'kegiatan' => $kegiatan,
            'lvl1' => $lvl1,
            'lvl2' => $lvl2,
            'lvl3' => $lvl3
        ]);
    }

    // public function storekegiatan(Request $request)
    // {
    //     dd($request->all());
    //     // $kegiatan = Kegiatan::create($request->validated());
    //     // dd($request->validated());
    //     // $validated = $request->validated();
    //     // Kegiatan::create(
    //     //     [
    //     //         'id_lvl1' => $validated['id_lvl1'],
    //     //         'id_lvl2' => $validated['id_lvl2'],
    //     //         'id_lvl3' => $validated['id_lvl3'],
    //     //         'nama_kegiatan' => $validated['nama_kegiatan']
    //     //     ]);
    //         // return redirect('kegiatan.index');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKegiatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKegiatanRequest $request)
    {
        $validated = $request->validated();
        Kegiatan::create(
            [
                'id_lvl1' => $validated['id_lvl1'],
                'id_lvl2' => $validated['id_lvl2'],
                'id_lvl3' => $validated['id_lvl3'],
                'nama_kegiatan' => $validated['nama_kegiatan']
            ]);
            return redirect()->route('kegiatan.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan, $id)
    {
        $kegiatan = Kegiatan::find($id);
        $lvl1 = Level1::all();
        $lvl2 = Level2::all();
        $lvl3 = Level3::all();
        return view('master.editkegiatan', [
            'kegiatan' => $kegiatan,
            'lvl1' => $lvl1,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKegiatanRequest  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKegiatanRequest $request, Kegiatan $kegiatan)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroykegiatan(Kegiatan $kegiatan, $id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index');
    }
    //  Level 1
    public function inputLevel1(Request $request)
    {   
        $validated = $request->validate([
            'nama_lvl1' => 'required|unique:lvl1'
        ]);
        DB::table('lvl1')->insert([
            'nama_lvl1' => $validated['nama_lvl1']
        ]);
        return redirect('/keglvl1');
    }

    public function destroyLevel1($id){
        DB::table('lvl1')->where('id_lvl1',$id)->delete();
        return redirect('/keglvl1')->with('success', 'Berhasil Menghapus Data');
    }

    public function editLevel1($id)
    {
        $lvl1 = DB::table('lvl1')->where('id_lvl1',$id)->first();
        return view('master.editlvl1',[
            'lvl1'=> $lvl1
        ]);
    }

    public function updateLevel1(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lvl1' => 'required|unique:lvl1'
        ]);
        DB::table('lvl1')
        ->where('id_lvl1',$id)
        ->update(['nama_lvl1' => $validated['nama_lvl1']]);
        return redirect('/keglvl1')->with('success', 'Berhasil Update Data');
    }

    // Level 2
    public function inputLevel2(Request $request)
    {   
        $validated = $request->validate([
            'nama_lvl2' => 'required|unique:lvl2'
        ]);
        DB::table('lvl2')->insert([
            'nama_lvl2' => $validated['nama_lvl2']
        ]);
        return redirect('/keglvl2');
    }

    public function destroyLevel2($id){
        DB::table('lvl2')->where('id_lvl2',$id)->delete();
        return redirect('/keglvl2')->with('success', 'Berhasil Menghapus Data');
    }

    public function editLevel2($id)
    {
        $lvl2 = DB::table('lvl2')->where('id_lvl2',$id)->first();
        return view('master.editlvl2',[
            'lvl2'=> $lvl2
        ]);
    }

    public function updateLevel2(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lvl2' => 'required|unique:lvl2'
        ]);
        DB::table('lvl2')
        ->where('id_lvl2',$id)
        ->update(['nama_lvl2' => $validated['nama_lvl2']]);
        return redirect('/keglvl2')->with('success', 'Berhasil Update Data');
    }

    // Level 3
    public function inputLevel3(Request $request)
    {   
        $validated = $request->validate([
            'nama_lvl3' => 'required|unique:lvl3'
        ]);
        DB::table('lvl3')->insert([
            'nama_lvl3' => $validated['nama_lvl3']
        ]);
        return redirect('/keglvl3');
    }

    public function destroyLevel3($id){
        DB::table('lvl3')->where('id_lvl3',$id)->delete();
        return redirect('/keglvl3')->with('success', 'Berhasil Menghapus Data');
    }

    public function editLevel3($id)
    {
        $lvl3 = DB::table('lvl3')->where('id_lvl3',$id)->first();
        return view('master.editlvl3',[
            'lvl3'=> $lvl3
        ]);
    }

    public function updateLevel3(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lvl3' => 'required|unique:lvl3'
        ]);
        DB::table('lvl3')
        ->where('id_lvl3',$id)
        ->update(['nama_lvl3' => $validated['nama_lvl3']]);
        return redirect('/keglvl3')->with('success', 'Berhasil Update Data');
    }
}
