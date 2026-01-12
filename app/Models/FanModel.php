<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FanModel extends Model
{
    use HasFactory;
    protected $table = 'table_fan';
    protected $fillable = [
        'nama_fan',
        'nama_kitab',
        'kelas',
        'pengajar_id'
    ];
    public function pengajar()
    {
        return $this->hasMany(PengajarModel::class);
    }
}
