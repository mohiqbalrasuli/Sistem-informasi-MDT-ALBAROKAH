<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;

    // Nama tabel (karena tidak mengikuti konvensi Laravel)
    protected $table = 'table_profile';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'gambar',
        'nama_madrasah',
        'tingkat',
        'tahun_berdiri',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'no_telp',
        'email',
        'web'
    ];
}
