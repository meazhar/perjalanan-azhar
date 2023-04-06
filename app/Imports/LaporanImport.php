<?php

namespace App\Imports;

use App\Models\Laporan;
use App\Imports\LaporanImport;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaporanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new laporan([
            'jenis' => $row['jenis'],
            'deskripsi' => $row['deskripsi'],
            'tglkejadian' => $row['tglkejadian'],
            'pelapor' => $row['pelapor'],
            'status' => $row['status'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at']
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }

}
