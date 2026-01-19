<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuPMBModel extends Model
{
    use HasFactory;
    protected $table = 'table_waktu_p_m_b';
    protected $fillable = ['tanggal_mulai', 'tanggal_selesai'];
}
