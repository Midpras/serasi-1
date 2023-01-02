<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Auth::user();
        return view('master.laporan',[
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tanggal)
    {
        $pegawai = Auth::user();
        $nip = Auth::id();
        $laporan = DB::connection('mysql2')->table('kegiatan')->where([
            ['pegawai', $nip], 
            ['tanggal', $tanggal]
            ])->first();
        return view('master.createlaporan', [
            'pegawai' => $pegawai,
            'tanggal' => $tanggal,
            'laporan' => $laporan
        ]);
        // $laporan = DB::connection('mysql2')->table('kegiatan')->where([
        //     ['nip', $pegawai], 
        //     ['tanggal', $tanggal]
        //     ])->first();
        // return view('master.createlaporan', [
        //     'tanggal' => $tanggal,
        //     'laporan' => $laporan
        // ]);
    }

    public function tambahkegiatan($tanggal, $pegawai)
    {
        $pegawai = Auth::user();
        $nip = Auth::id();
        return view('master.tambahkegiatan', [
            'pegawai' => $pegawai,
            'tanggal' => $tanggal,
        ]);
        // $laporan = DB::connection('mysql2')->table('kegiatan')->where([
        //     ['nip', $pegawai], 
        //     ['tanggal', $tanggal]
        //     ])->first();
        // return view('master.createlaporan', [
        //     'tanggal' => $tanggal,
        //     'laporan' => $laporan
        // ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $tanggal)
    {
        //
        $validated = $request->validate([
            'namakegiatan' => ['required', 'unique:kegiatan','min:6'],
            'satuankegiatan' => ['required','min:6'],
            'volume' => ['required', 'numeric'],    
        ],
        [
            'namakegiatan.required' => 'Harap Isikan kegiatan harian',
            'namakegiatan.min' => 'Nama kegiatan setidaknya minimal terdiri dari 6 karakter',
            'satuankegiatan.required' => 'Harap Isikan satuan kegiatan',
            'volume.required' => 'Harap Isikan volume kegiatan',
        ]);
        // DB::table('lvl1')->insert([
        //     'nama_lvl1' => $validated['nama_lvl1']
        // ]);
        Laporan::create(
            [
            'pegawai' => Auth::user(),
            'tanggal' => $tanggal,
            'namakegiatan' => $validated['namakegiatan'],
            'satuankegiatan' => $validated['satuankegiatan'],
            'volume' => $validated['volume'],
            'durasi' => $validated['durasi'],
            'pemberitugas' => $validated['pemberitugas'],
            'keterangan' => $validated['keterangan'],
            'statuskegiatan' => $validated['statuskegiatan'],
            ]
        );     
        
        return redirect()->route('laporan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
