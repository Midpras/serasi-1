<?php

namespace App\Http\Controllers;

use App\Models\Level1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Level1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lvl1 = Level1::all();
        return view('master.level1', [
            'lvl1' => $lvl1
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
            'nama_lvl1' => 'required|unique:lvl1'
        ]);
        // DB::table('lvl1')->insert([
        //     'nama_lvl1' => $validated['nama_lvl1']
        // ]);
        Level1::create(
            [
            'nama_lvl1' => $validated['nama_lvl1']
            ]
        );     
        
        return redirect()->route('level1.index');
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
        $lvl1 = Level1::find($id);
        return view('master.editlvl1',[
            'lvl1'=> $lvl1
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
            'nama_lvl1' => 'required|unique:lvl1'
        ]);
        $level1 = Level1::find($id);
        $level1->update($validated['nama_lvl1']);
        return redirect()->route('level1.index')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level1 = Level1::find($id);
        $level1->delete();

        return redirect()->route('level1.index');

    }
}
