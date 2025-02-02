<?php

namespace App\Http\Livewire;

use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Laporankegiatan extends Component
{
    public $laporans, $namakegiatan, $satuankegiatan, $volume, $durasi, $satuandurasi, $pemberitugas, $keterangan, $statuskegiatan;
    public $tanggal;
    public $pegawai;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

    public function add($i){
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i){
        unset($this->inputs[$i]);
    }

    private function resetInputFields(){
        $this->namakegiatan ='';
        $this->satuankegiatan = '';
        $this->volume = '';
        $this->durasi = '';
        $this->satuandurasi = '';
        $this->pemberitugas = '';
        $this->keterangan = '';
        $this->statuskegiatan='';
    }

    public function store()
    {
        $pegawainip = Auth::id();
        $validated = $this->validate([
            'namakegiatan.0' => 'required',
            'satuankegiatan.0' => 'required',
            'volume.0' => 'required',
            'durasi.0' => 'required',
            'satuandurasi.0' => 'required',
            'pemberitugas.0' => 'required',
            'keterangan.0' => 'required',
            'statuskegiatan.0' => 'required',
            'namakegiatan.*' => 'required',
            'satuankegiatan.*' => 'required',
            'volume.*' => 'required',
            'durasi.*' => 'required',
            'satuandurasi.*' => 'required',
            'pemberitugas.*' => 'required',
            'keterangan.*' => 'required',
            'statuskegiatan.*' => 'required',
        ],
        [ 
            'namakegiatan.0.required' => 'Isikan nama kegiatan',
            'namakegiatan.*.required' => 'Isikan nama kegiatan',
        ]
        );

        foreach($this->namakegiatan as $key=> $value ){
            Laporan::create([
                'pegawai' => $this->pegawai->nip,
                'tanggal' => $this->tanggal,
                'namakegiatan' => $this->namakegiatan[$key],
                'satuankegiatan' => $this->satuankegiatan[$key],
                'volume' => $this->volume[$key],
                'durasi' => $this->durasi[$key],
                'satuandurasi' => $this->satuandurasi[$key],
                'pemberitugas' => $this->pemberitugas[$key],
                'keterangan' => $this->keterangan[$key],
                'statuskegiatan' => $this->statuskegiatan[$key]
            ]);
        }

        $this->inputs = [];
        $this->resetInputFields();
    }
    public function render()
    {
        $data = Laporan::all();
        return view('livewire.laporankegiatan', ['data' => $data]);
    }
}
