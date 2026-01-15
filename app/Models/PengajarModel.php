<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajarModel extends Model
{
    use HasFactory;
    protected $table = 'table_pengajar';
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telp'
    ];
    public function fan()
    {
        return $this->hasMany(FanModel::class,'pengajar_id');
    }
    public function struktural()
    {
        return $this->hasMany(strukturalModel::class,'pengajar_id');
    }
}
