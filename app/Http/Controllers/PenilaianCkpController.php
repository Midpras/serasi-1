<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Ckp;
use Session;

class PenilaianCkpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nama = DB::table('users')->where('id', Auth::id())->first();
        return view('penilaianckp.index', compact('nama'));
    }
	
	public function nilaickp($bulan,$tahun)
    {
		$user = Auth::user();
        $nama = DB::table('users')->where('id', Auth::id())->first();
    	// mengambil data dari table ckp
    	$ckp = DB::select(DB::raw("SELECT * FROM ckp_prov
		LEFT JOIN kegiatan
		ON ckp_prov.id_kegiatan = kegiatan.id_kegiatan
        LEFT JOIN users
        ON ckp_prov.id_user = users.id		
		WHERE ckp_prov.penilai_ckp = $user->id and id_user <> $user->id and bulan_prov = $bulan and tahun_prov = $tahun
		ORDER BY ckp_prov.id_ckp_prov"));
 
    	// mengirim data ckp ke view index
    	return view('penilaianckp.entri',['ckp' => $ckp, 'nama' => $nama]);		
    }
	
	public function editnilai(Request $request, $bulan, $tahun, $id_ckp_prov)
    {
        $nilai_ckp_prov = $request->input('realisasi_ckp_prov');
		$keterangan = $request->input('keterangan');
		
        Ckp::where('id_ckp_prov', $id_ckp_prov)->update([
            'nilai_ckp_prov' => $request->input('nilai_ckp_prov'),
            'keterangan' => $request->input('keterangan'),
        ]);
		
		return redirect('/nilaickp/'.$bulan.'/'.$tahun)->with('success', 'CKP Berhasil Dinilai!');

    }	

	
	public function entrinilai(Request $request)
    {
    	$id_ckp_prov = $request->id_ckp_prov;
		$ckp = DB::select(DB::raw("SELECT * FROM ckp_prov
		LEFT JOIN kegiatan
		ON ckp_prov.id_kegiatan = kegiatan.id_kegiatan
		WHERE ckp_prov.id_ckp_prov = $id_ckp_prov
		ORDER BY ckp_prov.id_ckp_prov"));
 
    	// mengirim data ckp ke view index
    	return view('penilaianckp.edit',compact('ckp'));
    }
	 
	public function kirimnilaickp($bulan, $tahun, $id_ckp_prov)
    {
        Ckp::where('id_ckp_prov', $id_ckp_prov)->update([
            'status_ckp_prov' => "Dinilai",
            'nilai_ckp_prov' => '100'
        ]);
 
    	// mengirim data ckp ke view index
    	return redirect('/nilaickp/'.$bulan.'/'.$tahun)->with('success', 'CKP Berhasil Dinilai!');
    }

}
