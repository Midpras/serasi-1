<?php

namespace App\Http\Controllers;

use App\Models\Ckpkab;
use App\Models\Ckpprov;
use App\Models\Ikikab;
use App\Models\IkuProv;
use App\Models\Pkprov;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nama = DB::table('users')->where('id', Auth::id())->first();

        $id_pk_prov = DB::table('pk_prov')->get();
        $id_iku_prov = DB::table('iku_prov')->get();

        $data_iku = array();
        $target_iku = array();
        $realisasi_iku = array();
        $grup_iku = array();


        foreach ($id_iku_prov as $id_iku) {
            $id = $id_iku->id_iku_prov;
            $data_join = DB::table('iki_prov')
                ->select(
                    'pk_prov.nama_pk_prov',
                    'iku_prov.id_iku_prov',
                    'iku_prov.nama_iku_prov',
                    'iku_prov.target_iku_prov',
                    'iku_prov.satuan_iku_prov',
                    'iku_prov.id_pk_prov',
                    'iku_prov.perhitungan_prov',
                    'iki_prov.id_iki_prov',
                    'iki_prov.target_iki_prov',
                    'iki_prov.satuan_iki_prov',
                    'iki_prov.id_user',
                    'iki_prov.perhitungan_prov',
                    'ckp_prov.id_ckp_prov',
                    'ckp_prov.id_kegiatan',
                    'ckp_prov.realisasi_ckp_prov',
                    'ckp_prov.satuan_ckp_prov',
                    'ckp_prov.flag_ckp',
                    'ckp_prov.bulan_prov',
                    'ckp_prov.tahun_prov'
                )
                ->join('ckp_prov', 'iki_prov.id_iki_prov', '=', 'ckp_prov.id_iki_prov')
                ->join('iku_prov', 'iki_prov.id_iku_prov', '=', 'iku_prov.id_iku_prov')
                ->join('pk_prov', 'iku_prov.id_pk_prov', '=', 'pk_prov.id_pk_prov')
                ->where('ckp_prov.flag_ckp', '=', 1)
                ->where('iku_prov.id_iku_prov', $id)
                ->get();

            $iki_prov = DB::table('iki_prov')->where('id_iku_prov', $id)->get();

            $rekap_iki = array();
            foreach ($iki_prov as $id_iki) {
                $target_iki_prov = DB::table('iki_prov')->where('id_iki_prov', $id_iki->id_iki_prov)->sum('target_iki_prov');
                $realisasi_iki_prov = $data_join->where('id_iki_prov', $id_iki->id_iki_prov)->sum('realisasi_ckp_prov');
                if ($realisasi_iki_prov == 0) {
                    $persen_realisasi_iki = 0;
                } else {
                    $persen_realisasi_iki = ($realisasi_iki_prov / $target_iki_prov) * 100;
                }
                $rekap_iki[] = ['id_iki_prov' => $id_iki->id_iki_prov, 'target' => $target_iki_prov, 'realisasi' => $persen_realisasi_iki];
            }

            $iki_gabung = array();
            $pk_gabung = array();
            $count_rekap_iki = count($rekap_iki);
            $sum = array_sum(array_column($rekap_iki, 'realisasi'));
            if ($count_rekap_iki == 0) {
                $avg = 0;
            } else {
                $avg = $sum / $count_rekap_iki;
            }

            $pk_gabung_iku = IkuProv::with('Pkprov')->where('id_iku_prov', $id)->first();

            $target_iku_join = DB::table('iki_prov')->select('target_iki_prov')->where('id_iku_prov', $id)->sum('target_iki_prov');
            $sum_iku_join = $data_join->where('id_iku_prov', $id)->sum('realisasi_ckp_prov');
            $count = $data_join->count();

            $data_iku[] = [
                [
                    'id_pk_prov' => $pk_gabung_iku->pkprov->id_pk_prov,
                    'nama_pk_prov' => $pk_gabung_iku->pkprov->nama_pk_prov,
                    'id_iku_prov' => $pk_gabung_iku->id_iku_prov,
                    'nama_iku_prov' => $pk_gabung_iku->nama_iku_prov,
                    'realisasi' => $avg,
                ]
            ];
            $target_iku[] = $target_iku_join;
            $realisasi_iku[] = $sum_iku_join;
        }

        $count_data = $pk_gabung_iku->count();

        return view('home', compact('data_join', 'nama', 'id_iku_prov', 'id_pk_prov', 'data_iku', 'count_data'));
    }
}
