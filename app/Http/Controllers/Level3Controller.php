<?php

namespace App\Http\Controllers;

use App\Models\Level3;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Level3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lvl3 = Level3::all();
        return view('master.level3', [
            'lvl3' => $lvl3
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'nama_lvl3' => 'required|unique:lvl3'
        ],
        [
            'nama_lvl3.required' => 'Harap isikan form nama rincian kegiatan',
            'nama_lvl3.unique' => 'Nama Kegiatan tersebut sudah ada',
            'nama_lvl3.min' => 'Nama kegiatan setidaknya minimal terdiri dari 6 karakter'
        ]);
        Level3::create([
            'nama_lvl3' => $validated['nama_lvl3']
        ]);
        
        return redirect()->route('level3.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lvl3 = Level3::find($id);
        return view('master.editlvl3',[
            'lvl3'=> $lvl3
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lvl3' => 'required|unique:lvl3|min:6'
        ],
        [
            'nama_lvl3.required' => 'Harap isikan form nama rincian kegiatan',
            'nama_lvl3.unique' => 'Nama Kegiatan tersebut sudah ada',
            'nama_lvl3.min' => 'Nama kegiatan setidaknya minimal terdiri dari 6 karakter'
        ]);
        $level3 = Level3::find($id);
        $level3->update($validated);
        return redirect()->route('level3.index')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level3 = Level3::find($id);
        $level3->delete();

       return redirect()->route('level3.index');

    }
}