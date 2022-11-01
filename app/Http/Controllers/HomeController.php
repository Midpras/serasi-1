<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // public function level1(){
    //     $lvl1 = DB::table('lvl1')->get();
    //     return view('master.level1', [
    //         'lvl1' => $lvl1
    //     ]);
    // }

    // public function level2(){
    //     $lvl2 = DB::table('lvl2')->get();
    //     return view('master.level2', [
    //         'lvl2' => $lvl2
    //     ]);
    // }
    // public function level3(){
    //     $lvl3 = DB::table('lvl3')->get();
    //     return view('master.level3', [
    //         'lvl3' => $lvl3
    //     ]);
    // }
    
    // public function kegiatan(){
    //     // $lvl3 = DB::table('lvl3')->get();
    //     return view('master.kegiatan');
    // }

}
