<?php

namespace App\Http\Livewire;

use App\Models\Laporan;
use Livewire\Component;

class Laporankegiatan extends Component
{
    public $laporans, $namakegiatan, $satuankegiatan, $volume, $durasi, $satuandurasi, $pemberitugas, $keterangan, $statuskegiatan;
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


    public function render()
    {
        $this->laporans = Laporanan::all();
        return view('livewire.laporankegiatan');
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
            'satuankegiatan.0' => 'required',
            'volume.0' => 'required',
            'durasi.0' => 'required',
            'satuandurasi.0' => 'required',
            'pemberitugas.0' => 'required',
            'keterangan.0' => 'required',
            'statuskegiatan.0' => 'required',
        ]);
    }
}
