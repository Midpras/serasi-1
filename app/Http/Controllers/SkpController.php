<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Skpprov;
use App\Models\Skpkab;
use App\Models\Ikiprov;
use Illuminate\Support\Facades\DB;
use Session;

class SkpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
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

        $nama = DB::table('users')->where('id', Auth::id())->first();

        return view('skp.index', compact('skp_prov', 'skp_kab', 'nama'));
    }

    public function edit($id)
    {
        $skp_prov = Skpprov::with(['Ikuprov'])->where('id_skp_prov', $id)->first();

        $skp_kab = Skpkab::with(['Ikukab'])->where('id_skp_kab', $id)->first();

        $nama = DB::table('users')->where('id', Auth::id())->first();

        return view('iki.edit', compact('skp_prov', 'skp_kab', 'nama'));
    }

}
