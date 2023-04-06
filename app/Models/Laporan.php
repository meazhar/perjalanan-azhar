<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporanbug';
    protected $fillable =
    [
      'jenis',
      'deskripsi',
      'tglkejadian',
      'pelapor',
      'status',
    ];

}
