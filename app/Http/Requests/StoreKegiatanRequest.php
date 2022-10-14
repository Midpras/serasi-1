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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_kegiatan' => 'required|unique',
            'id_lvl1' => 'required|unique',
            'id_lvl2' => 'required|unique',
            'id_lvl3' => 'required|unique',
        ];
    }

    public function messages()
    {
        return 
        [
            'nama_kegiatan.required'
        ];
    }
}
