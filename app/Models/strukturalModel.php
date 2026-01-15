<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class strukturalModel extends Model
{
    use HasFactory;
    protected $table = 'table_walikelas';
    protected $fillable = [
        'pengajar_id',
        'jabatan'
    ];
    public function pengajar()
    {
        return $this->BelongsTo(PengajarModel::class,'pengajar_id');
    }
}
