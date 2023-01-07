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
        $validated = $request->validate([
            'nama_kegiatan' => 'required|unique:kegiatan|min:6',
            'id_lvl1' => 'required',
            'id_lvl2' => 'required',
            'id_lvl3' => 'required',
            'type' => 'required'
        ],
        [
            'nama_kegiatan.required' => 'Harap isikan form nama rincian kegiatan',
            'nama_kegiatan.unique' => 'Nama Kegiatan tersebut sudah ada',
            'nama_kegiatan.min' => 'Nama kegiatan setidaknya minimal terdiri dari 6 karakter'
        ]);
        Kegiatan::create(
            [
                'id_lvl1' => $validated['id_lvl1'],
                'id_lvl2' => $validated['id_lvl2'],
                'id_lvl3' => $validated['id_lvl3'],
                'nama_kegiatan' => $validated['nama_kegiatan'],
                'type' => $validated['type']
            ]);
            return redirect()->route('kegiatan.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
        $lvl1 = Level1::all();
        $lvl2 = Level2::all();
        $lvl3 = Level3::all();
        return view('master.editkegiatan', [
            'kegiatan' => $kegiatan,
            'lvl1' => $lvl1,
            'lvl2' => $lvl2,
            'lvl3' => $lvl3,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKegiatanRequest  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKegiatanRequest $request, $id)
    {
        $validated = $request->validated();
        $kegiatan = Kegiatan::find($id);

        $kegiatan->update($validated);

        return redirect()->route('kegiatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan, $id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index');
    }
}
