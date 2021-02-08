<?php

namespace App\Http\Requests\Siswa;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
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
            'id_kelas' => 'required',
            'nama' => 'required',
            'nisn' => 'required|max:12|unique:siswa',
            'nis' => 'required|max:12|unique:siswa',
            'alamat' => 'required',
            'no_telp' => 'required'
        ];
    }
}
