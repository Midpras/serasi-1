<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Ckpprov;
use App\Models\Kegiatan;
use App\Models\Ikiprov;
use App\Models\Level1;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IkiTurunCkp extends Component
{
    public $id_kegiatan, $target_ckp, $satuan_ckp, $bulan, $tahun, $id_iki, $id_user, $penilai_ckp, $flag_ckp, $id_ckp;
    public $updateMode = False;
    public $inputs = [];
    public $i = 1;

    protected $rules = [
        'id_kegiatan.0'     => 'required',
        'target_ckp.0' => 'required',
        'satuan_ckp.0' => 'required',
        'bulan.0'      => 'required',
        'tahun.0'      => 'required',
        'id_user.0'         => 'required',
        'flag_ckp.0'        => 'required',
        'id_kegiatan.*'     => 'required',
        'target_ckp.*' => 'required',
        'satuan_ckp.*' => 'required',
        'bulan.*'      => 'required',
        'tahun.*'      => 'required',
        'id_user.*'         => 'required',
        'flag_ckp.*'        => 'required',
    ];

    protected $messages = [
        'id_kegiatan.0.required'        => 'Harus pilih kegiatan',
        'target_ckp.0.required'    => 'Harus isi target',
        'satuan_ckp.0.required'    => 'Harus isi satuan',
        'bulan.0.required'         => 'Harus pilih bulan',
        'tahun.0.required'         => 'Harus isi tahun',
        'id_user.0.required'            => 'Harus pilih nama',
        'flag_ckp.0.required'           => 'Harus dipilih',
        'id_kegiatan.*.required'        => 'Harus pilih kegiatan',
        'target_ckp.*.required'    => 'Harus isi target',
        'satuan_ckp.*.required'    => 'Harus isi satuan',
        'bulan.*.required'         => 'Harus pilih bulan',
        'tahun.*.required'         => 'Harus pilih tahun',
        'id_user.*.required'            => 'Harus pilih nama',
        'flag_ckp.*.required'           => 'Harus dipilih',
    ];

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    private function resetInputFields()
    {
        $this->id_kegiatan = '';
        $this->target = '';
        $this->satuan = '';
        $this->nama = '';
        $this->bulan = '';
        $this->tahun = '';
        $this->flag_ckp = '';
    }

    public function mount(Request $request)
    {
        $this->id_iki = $request->route('id');
    }

    public function store()
    {
        $this->validate();

        foreach ($this->id_kegiatan as $key => $value) {
            Ckpprov::create([
                'id_kegiatan' => $this->id_kegiatan[$key],
                'target_ckp_prov' => $this->target_ckp[$key],
                'satuan_ckp_prov' => $this->satuan_ckp[$key],
                'bulan_prov' => $this->bulan[$key],
                'tahun_prov' => $this->tahun[$key],
                'id_iki_prov' => $this->id_iki,
                'id_user' => $this->id_user[$key],
                'penilai_ckp' => Auth::id(),
                'flag_ckp' => $this->flag_ckp[$key],
            ]);
        }

        foreach ($this->id_kegiatan as $key => $value) {
            $kegiatan = DB::table('kegiatan')->where('id_kegiatan', $this->id_kegiatan[$key])->first();
            Ikiprov::create([
                'nama_iki_prov' => $kegiatan->nama_kegiatan,
                'target_iki_prov' => $this->target_ckp[$key],
                'satuan_iki_prov' => $this->satuan_ckp[$key],
                'id_user' => $this->id_user[$key],
            ]);
        }

        $this->inputs = [];

        $this->resetInputFields();

        return redirect()->to('/iki');
    }

    public function render(Request $request)
    {
        // $kegiatan = Kegiatan::with(['Level1'])->orderBy('id_lvl1')->get();
        // $kegiatan2 = Kegiatan::with(['Level1'])->orderBy('id_lvl1')->get();

        $kegiatan = Kegiatan::join('lvl1', 'kegiatan.id_lvl1', '=', 'lvl1.id_lvl1')->get();
        $kegiatan2 = Kegiatan::join('lvl1', 'kegiatan.id_lvl1', '=', 'lvl1.id_lvl1')->get();

        $grupkegiatan = $kegiatan->groupBy('nama_lvl1');
        $grupkegiatan2 = $kegiatan->groupBy('nama_lvl1');

        $id = $request->route('id');
        $iki = Ikiprov::where('id_iki_prov', $id)->get();
        $user = DB::table('users')->orderBy('name')->get();
        $user2 = DB::table('users')->orderBy('name')->get();

        return view('livewire.iki-turun-ckp', compact('kegiatan', 'kegiatan2', 'iki', 'user', 'user2', 'grupkegiatan', 'grupkegiatan2', 'id'));
    }
}
