<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'dosen',
        'gambar',
        'kelas',
        'hari',
        'jam',
        'tanggal_mulai',
        'tanggal_akhir',
        'kelompok',
    ];
}