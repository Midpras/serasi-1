<?php

namespace App\Http\Controllers;

use App\Models\Ckpkab;
use App\Models\Ckpprov;
use App\Models\Ikikab;
use Illuminate\Http\Request;

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
        $data_hitung_prov = Ckpprov::with(['Ikuprov', 'Ikiprov'])->where('flag_ckp', 1)->get();

        $data_hitung_kab = Ckpkab::with(['Ikikab', 'Ikukab'])->where('flag_ckp', 1)->get();

        return view('home', compact('data_hitung_prov', 'data_hitung_kab'));
    }
}
