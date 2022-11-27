<?php

namespace App\Http\Controllers;

use App\Models\Level2;
use Illuminate\Http\Request;

class Level2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lvl2 = Level2::all();
        return view('master.level2', [
            'lvl2' => $lvl2
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
            'nama_lvl2' => 'required|unique:lvl2'
        ]);
        Level2::create([
            'nama_lvl2' => $validated['nama_lvl2']
        ]);
        
        return redirect()->route('lvl2.index');
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
        $lvl2 = Level2::find($id);
        return view('master.editlvl2',[
            'lvl2'=> $lvl2
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
            'nama_lvl2' => 'required|unique:lvl2'
        ]);
        $level2 = Level2::find($id);
        $level2->update($validated);
        return redirect()->route('level2.index')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level2 = Level2::find($id);
        $level2->delete();

        return redirect()->route('level2.index');

    }
}
