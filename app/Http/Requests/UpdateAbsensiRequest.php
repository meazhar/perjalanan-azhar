<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAbsensiRequest extends FormRequest
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
            'namaKaryawan' =>'required',
            'tanggalMasuk' =>'required',
            'waktuMasuk' =>'required',
            'status' =>'required',
            'waktuKeluar' =>'required',
        ];
    }

    public function messages()
    {
        return[
            'namaKaryawan.required' => 'Nama Karyawan Belum Diisi!',
            'tanggalMasuk.required' => 'Tanggal Masuk Belum Diisi!',
            'waktuMasuk.required' => 'Waktu Masuk Belum Diisi!',
            'status.required' => 'Status Belum Diisi!',
            'waktuKeluar.required' => 'Jam Selesai Diisi!',
        ];
    }
}
