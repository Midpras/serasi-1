<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKegiatanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_kegiatan' => 'required|unique:kegiatan',
            'id_lvl1' => 'required',
            'id_lvl2' => 'required',
            'id_lvl3' => 'required',
        ];
    }

    public function messages()
    {
        return 
        [
            'nama_kegiatan.required' => 'Masukkan nama kegiatan',
            'nama_kegiatan.unique' => 'Masukkan nama kegiatan yang unik'
        ];
    }
}
