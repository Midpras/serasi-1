<?php

namespace App\Http\Controllers;

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
        return view('master.tambahuser', [
            'pegawais' => $pegawai,
            'satker' => $satker,
        ]);
    }

    public function getNIP($name)
    {
        $NIP = DB::connection('mysql2')->table('pegawai')->where('nama', $name)->first();
        return response()->json($NIP);
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
            'satker' => ['required']
        ],
        [
            'name.required' => 'Harap Isikan user',
            'name.unique' => 'Nama users tersebut sudah ada',
            'nip.required' => 'harus isi NIP',
            'email.required' => 'harap isikan Email',
            'role.required' => 'Harap masukkan role user tersebut',
            'satker.required' => 'Harap masukkan satuan kerja dari user tersebut'
        ]);
        // DB::table('lvl1')->insert([
        //     'nama_lvl1' => $validated['nama_lvl1']
        // ]);
        User::create(
            [
            'name' => $validated['name'],
            'nip' => $validated['nip'],
            'email' => $validated['email'],
            'password' => Hash::make('12345678'),
            'role' => $validated['role'],
            'satker' => $validated['satker']
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

        return view('master.edituser',[
            'user'=> $user,
            'satker' => $satker
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
            'name' => ['required', 'unique:users','min:6'],
            'nip' => ['required'],
            'email' => ['required'],
            'role' => ['required'],
            'satker' => ['required']
        ],
        [
            'name.required' => 'Harap Isikan user',
            'name.unique' => 'Nama users tersebut sudah ada',
            'nip.required' => 'harus isi NIP',
            'email.required' => 'harap isikan Email',
            'role.required' => 'Harap masukkan role user tersebut',
            'satker.required' => 'Harap masukkan satuan kerja dari user tersebut'
        ]);
        $user = User::find($nip);
        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'Berhasil Update User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        $user = User::find($nip);
        $user->delete();

        return redirect()->route('users.index');

    }
}
