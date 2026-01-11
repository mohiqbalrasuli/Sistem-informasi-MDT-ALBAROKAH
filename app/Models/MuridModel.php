<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuridModel extends Model
{
    use HasFactory;
    protected $table = "table_murid";

    protected $fillable = [
        'nama',
        'kelas',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'tahun_masuk',
        'alamat',
        'foto',
        'akta',
        'kk',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'no_telp'
    ];
}
