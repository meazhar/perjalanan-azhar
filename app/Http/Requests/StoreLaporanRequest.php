<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLaporanRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'jenis' => 'required',
            'deskripsi'=> 'required',
            'tglkejadian'=> 'required',
            'pelapor'=> 'required',
            'status'=> 'required',
        ];
    }

    public function messages()
    {
        return[
            'jenis.required' => 'Jenis laporan tidak diisi!',
            'deskripsi.required' => 'Deskripsi laporan tidak diisi!',
            'tglkejadian.required' => 'Tanggal kejadian tidak diisi!',
            'pelapor.required' => 'Nama pelapor tidak diisi!',
            'status.required' => 'Status laporan tidak diisi!',
        ];
    }
}
