<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skpprov;
use App\Models\Ikiprov;
use App\Models\Ikikab;
use App\Models\Skpkab;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Models\Ckpprov;

class IkiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $iki_tugas = Ikiprov::with(['Pkprov', 'Ikuprov'])->where('id_user', Auth::id())->whereNull('nama_iki_prov')->get();
        $iki = Ikiprov::with(['Pkprov', 'Ikuprov'])->where('id_user', Auth::id())->where('nama_iki_prov', '!=', 'NULL')->get();

        $iki_tugas_kab = Ikikab::with(['Pkkab', 'Ikukab'])->where('id_user', Auth::id())->whereNull('nama_iki_kab')->get();
        $iki_kab = Ikikab::with(['Pkkab', 'Ikukab'])->where('id_user', Auth::id())->where('nama_iki_kab', '!=', 'NULL')->get();

        $nama = DB::table('users')->where('id', Auth::id())->first();

        return view('iki.index', compact('iki', 'iki_tugas', 'nama', 'iki_kab', 'iki_tugas_kab'));
    }

    public function penugasan($id)
    {
        $iki = Ikiprov::with(['Pkprov', 'Ikuprov'])->where('id_iki_prov', $id)->first();
        $iki_kab = Ikikab::with(['Pkkab', 'Ikukab'])->where('id_iki_kab', $id)->first();
        $kegiatan = Kegiatan::all();

        $nama = DB::table('users')->where('id', Auth::id())->first();
        return view('iki.penugasan', compact('iki', 'iki_kab', 'kegiatan', 'nama'));
    }

    public function penugasan_kab($id)
    {
        $iki_kab = Ikikab::with(['Pkkab', 'Ikukab'])->where('id_iki_kab', $id)->first();
        $kegiatan = Kegiatan::all();

        $nama = DB::table('users')->where('id', Auth::id())->first();
        return view('iki.penugasan_kab', compact('iki_kab', 'kegiatan', 'nama'));
    }

    public function edit($id)
    {
        $iki = Ikiprov::with(['Ikuprov'])->where('id_iki_prov', $id)->first();

        $nama = DB::table('users')->where('id', Auth::id())->first();

        return view('iki.edit', compact('iki', 'nama'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_iki_prov' => 'required',            
        ]);

        DB::table('iki_prov')->where('id_iki_prov', $request->id_iki_prov)->update([
            'nama_iki_prov' => $request->nama_iki_prov,
        ]);

        Skpprov::create([
            'nama_skp_prov' => $request->nama_skp_prov,
            'jenis_skp_prov' => 'turunan',
            'id_iki_prov' => $request->id_iki_prov,
        ]);

        Alert::success('Selamat', 'Nama IKI berhasil tersimpan');

        return redirect('/iki')->with('success-create', 'Nama IKI berhasil disimpan!');
    }

    public function tugas($id)
    {
        $ckp = Ckpprov::with(['Ikiprov', 'kegiatan', 'user'])->where('id_iki_prov', $id)->get();
        $iki = DB::table('iki_prov')->where('id_iki_prov', $id)->first();

        $nama = DB::table('users')->where('id', Auth::id())->first();

        return view('iki.tugas', compact('ckp', 'nama', 'iki'));
    }

    public function update_tugas(Request $request)
    {
        $request->validate([
            'id_kegiatan' => 'required',
            'target_ckp_prov' => 'required',
            'satuan_ckp_prov' => 'required',
            'bulan_prov' => 'required',
            'tahun_prov' => 'required',
        ]);

        DB::table('ckp_prov')->where('id_ckp_prov', $request->id_ckp_prov)->update([
            'id_kegiatan' => $request->id_kegiatan,
            'target_ckp_prov' => $request->target_ckp_prov,
            'satuan_ckp_prov' => $request->satuan_ckp_prov,
            'bulan_prov' => $request->bulan_prov,
            'tahun_prov' => $request->tahun_prov,
        ]);

        $kegiatan = Kegiatan::where('id_kegiatan', $request->id_kegiatan)->first();
        DB::table('iki_prov')->where('id_iki_prov', $request->id_iki_prov)->update([
            'nama_iki_prov' => $kegiatan->nama_kegiatan,
            'satuan_iki_prov' => $request->satuan_ckp_prov,
            'target_iki_prov' => $request->target_ckp_prov,
        ]);

        Alert::success('Selamat', 'Nama IKI berhasil tersimpan');

        return redirect('/iki')->with('success-create', 'Nama IKI berhasil disimpan!');
    }
}
