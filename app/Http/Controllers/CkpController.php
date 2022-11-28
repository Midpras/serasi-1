<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ckpprov;
use App\Models\Ikiprov;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CkpController extends Controller
{
    public function edit_tugas_prov($id)
    {
        $ckp = Ckpprov::with(['Kegiatan', 'User'])->where('id_ckp_prov', $id)->first();

        $nama = DB::table('users')->where('id', Auth::id())->first();

        $kegiatan = Kegiatan::join('lvl1', 'kegiatan.id_lvl1', '=', 'lvl1.id_lvl1')->get();
        $grupkegiatan = $kegiatan->groupBy('nama_lvl1');

        $iki = Ikiprov::where('nama_iki_prov', $ckp->kegiatan->nama_kegiatan)
            ->where('satuan_iki_prov', $ckp->satuan_ckp_prov)
            ->where('target_iki_prov', $ckp->target_ckp_prov)
            ->where('id_user', $ckp->id_user)
            ->first();

        return view('iki.edit_tugas', compact('ckp', 'nama', 'grupkegiatan', 'iki'));
    }
}
