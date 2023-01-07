<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ckpprov;
use App\Models\Ikiprov;
use App\Models\Kegiatan;
use App\Models\Ckp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CkpController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nama = DB::table('users')->where('id', Auth::id())->first();

        return view('ckp.index', compact('nama'));
    }
	
	public function entrickp($bulan,$tahun)
    {
		$user = Auth::user();
        $nama = DB::table('users')->where('id', Auth::id())->first();
    	// mengambil data dari table ckp
    	$ckp = DB::select(DB::raw("SELECT * FROM ckp_prov
		LEFT JOIN kegiatan
		ON ckp_prov.id_kegiatan = kegiatan.id_kegiatan
		WHERE ckp_prov.id_user = $user->id and bulan_prov = $bulan and tahun_prov = $tahun
		ORDER BY ckp_prov.id_ckp_prov"));
 
    	// mengirim data ckp ke view index
    	return view('ckp.entri',['ckp' => $ckp, 'nama' => $nama]);		
    }
	
	public function editrealisasi(Request $request, $bulan, $tahun, $id_ckp_prov)
    {
        $realisasi_ckp_prov = $request->input('realisasi_ckp_prov');
        $butir_ak = $request->input('butir_ak');
		$jum_ak = $request->input('jum_ak');
		$keterangan = $request->input('keterangan');
		
        Ckp::where('id_ckp_prov', $id_ckp_prov)->update([
            'realisasi_ckp_prov' => $request->input('realisasi_ckp_prov'),
            'butir_ak' => $request->input('butir_ak'),
            'jum_ak' => $request->input('jum_ak'),
            'keterangan' => $request->input('keterangan'),
        ]);
		
		return redirect('/entrickp/'.$bulan.'/'.$tahun)->with('success', 'CKP Berhasil Diupdate!');

    }	

	
	public function entrirealisasi(Request $request)
    {
    	$id_ckp_prov = $request->id_ckp_prov;
		$ckp = DB::select(DB::raw("SELECT * FROM ckp_prov
		LEFT JOIN kegiatan
		ON ckp_prov.id_kegiatan = kegiatan.id_kegiatan
		WHERE ckp_prov.id_ckp_prov = $id_ckp_prov
		ORDER BY ckp_prov.id_ckp_prov"));
 
    	// mengirim data ckp ke view index
    	return view('ckp.edit',compact('ckp'));
    }
	 
	public function kirimckp($bulan, $tahun, $id_ckp_prov)
    {
        Ckp::where('id_ckp_prov', $id_ckp_prov)->update([
            'status_ckp_prov' => "Dikirim",
        ]);
 
    	// mengirim data ckp ke view index
    	return redirect('/entrickp/'.$bulan.'/'.$tahun)->with('success', 'CKP Berhasil Dikirim!');
    }

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
