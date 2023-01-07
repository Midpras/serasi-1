<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Skpprov;
use App\Models\Skpkab;
use App\Models\Ikiprov;
use Illuminate\Support\Facades\DB;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class SkpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nama = DB::table('users')->where('id', Auth::id())->first();

        $skp_prov = Skpprov::with(['Ikuprov', 'Ikiprov'])
            ->whereHas('ikiprov', function ($query) {
                $query->where('id_user', Auth::id());
            })
            ->get();

        $skp_kab = Skpkab::with(['Ikukab', 'Ikikab'])
            ->whereHas('ikikab', function ($query) {
                $query->where('id_user', Auth::id());
            })
            ->get();

        $skp_prov_pegawai = array();
        if ($nama->role == 'pegawai') {
            $id_iki_atasan_prov = DB::table('iki_prov')->select('id_iki_atasan', 'id_iki_prov')->where('id_user', Auth::id())->get();

            foreach ($id_iki_atasan_prov as $iki) {
                $skp_pegawai = DB::table('skp_prov')
                    ->select('id_skp_prov', 'nama_skp_prov')
                    ->where('id_iki_prov', $iki->id_iki_atasan)
                    ->first();
                $skp_prov = DB::table('skp_prov')
                    ->where('id_iki_prov', $iki->id_iki_prov)
                    ->first();
                // dd($skp_prov);

                $skp_prov_pegawai[] =
                    [
                        'nama_skp_atasan' => $skp_pegawai->nama_skp_prov,
                        'id_skp_prov' => $skp_prov->id_skp_prov,
                        'nama_skp_prov' => $skp_prov->nama_skp_prov,
                        'id_iki_prov' => $skp_prov->id_iki_prov
                    ];
            }
            // dd($skp_prov_pegawai);
        }

        return view('skp.index', compact('skp_prov', 'skp_kab', 'nama', 'skp_prov_pegawai'));
    }

    public function edit($id)
    {
        $skp_prov = Skpprov::with(['Ikiprov', 'Ikuprov'])->where('id_skp_prov', $id)->first();

        $skp_kab = Skpkab::with(['Ikukab'])->where('id_skp_kab', $id)->first();

        $nama = DB::table('users')->where('id', Auth::id())->first();

        return view('skp.edit', compact('skp_prov', 'skp_kab', 'nama'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_skp_prov' => 'required',
        ]);

        DB::table('skp_prov')->where('id_skp_prov', $request->id_skp_prov)->update([
            'nama_skp_prov' => $request->nama_skp_prov,
        ]);

        Alert::success('Selamat', 'Nama SKP berhasil tersimpan');

        return redirect('/skp')->with('success-create', 'Nama SKP berhasil disimpan!');
    }
}
