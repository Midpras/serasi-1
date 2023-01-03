<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tim = Tim::all();
        $satker = DB::connection('mysql')->table('satuan_kerja')->get();
        $users = User::all();
        return view('master.tim', [
            'tim' => $tim,
            'satker' => $satker,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_tim' => 'required|unique:tim',
            'kode_satker' => 'required',
        ]);
        // DB::table('lvl1')->insert([
        //     'nama_lvl1' => $validated['nama_lvl1']
        // ]);
        Tim::create(
            [
            'nama_tim' => $validated['nama_tim'],
            'kode_satker' => $validated['kode_satker'],
            'id_user' => $request['ketua_tim']
            ]
        );     
        
        return redirect()->route('tim.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function show(Tim $tim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tim = Tim::find($id);
        $satker = DB::table('satuan_kerja')->get();
        $users = User::all();
        return view('master.edittim',[
            'tim'=> $tim,
            'satker'=>$satker,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_tim' => 'required',
            'kode_satker' => 'required',
            'ketua_tim' => 'required'
        ]);
        $tim = Tim::find($id);
        $tim->update(
        ['nama_tim' => $validated['nama_tim'],
        'kode_satker' => $validated['kode_satker'],
        'id_user' => $validated['ketua_tim']
        ]);
        return redirect()->route('tim.index')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tim = Tim::find($id);
        $tim->delete();

        return redirect()->route('tim.index');

    }
}
