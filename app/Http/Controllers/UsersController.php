<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('master.users', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = DB::connection('mysql2')->select('
        SELECT pegawai.nip, pegawai.nama
        FROM pegawai
        ');
        $satker = DB::connection('mysql')->table('satuan_kerja')->get();
        $user = User::all();
        $tim = Tim::select('id_user')->distinct()->get();
        return view('master.tambahuser', [
            'pegawais' => $pegawai,
            'satker' => $satker,
            'users' => $user,
            'tims' => $tim
        ]);
    }

    public function getNIP(Request $request)
    {
        if($request->ajax()){
            $NIP = DB::connection('mysql2')->table('pegawai')->where('nama', $request->name)->first();
            return response()->json($NIP);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'unique:users','min:6'],
            'nip' => ['required'],
            'email' => ['required'],
            'role' => ['required'],
            'satker' => ['required'],
            'ttd' => ['required']
        ],
        [
            'name.required' => 'Harap Isikan user',
            'name.unique' => 'User ini sudah ada',
            'nip.required' => 'Harus isi NIP',
            'nip.unique' => 'User ini sudah ada',
            'email.required' => 'Harap isikan Email',
            'role.required' => 'Harap masukkan role user tersebut',
            'satker.required' => 'Harap masukkan satuan kerja dari user tersebut',
            'ttd.required' => 'Harap pilih atasan langsung'
        ]);

        $nip = str_replace(' ', '', $validated['nip']);
        // DB::table('lvl1')->insert([
        //     'nama_lvl1' => $validated['nama_lvl1']
        // ]);
        User::create(
            [
            'name' => $validated['name'],
            'nip' => $nip,
            'niplama' => $request->niplama,
            'email' => $validated['email'],
            'password' => Hash::make('12345678'),
            'role' => $validated['role'],
            'satker' => $validated['satker'],
            'id_ttd' => $validated['ttd']
            ]
        );     
        
        return redirect()->route('users.index');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
    {
        $user = User::find($nip);
        $satker = DB::connection('mysql')->table('satuan_kerja')->get();
        $tim = Tim::select('id_user')->distinct()->get();
        return view('master.edituser',[
            'user'=> $user,
            'satker' => $satker,
            'tims' => $tim
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nip)
    {
        $validated = $request->validate([
            'name' => ['required','min:6'],
            'nip' => ['required'],
            'email' => ['required'],
            'role' => ['required'],
            'satker' => ['required'],
            'ttd' => ['required']
        ],
        [
            'name.required' => 'Harap Isikan user',
            'name.unique' => 'Nama users tersebut sudah ada',
            'nip.required' => 'harus isi NIP',
            'email.required' => 'harap isikan Email',
            'role.required' => 'Harap masukkan role user tersebut',
            'satker.required' => 'Harap masukkan satuan kerja dari user tersebut',
            'ttd.required' => 'Harap pilih Atasan Langsung'

        ]);
        $user = User::find($nip);
        $niplama = DB::connection('mysql2')->table('pegawai')->where('nama', $request->name)->first();
        $user->update( [
            'name' => $validated['name'],
            'nip' => $validated['nip'],
            'niplama' => $niplama->nip,
            'email' => $validated['email'],
            'password' => Hash::make('12345678'),
            'role' => $validated['role'],
            'satker' => $validated['satker'],
            'id_ttd' => $validated['ttd']
            ]);
        return redirect()->route('users.index')->with('success', 'Berhasil Update User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
