<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramUnggulanModel extends Model
{
    use HasFactory;
    protected $table = 'table_program_unggulan';
    protected $fillable = ['icon','program_unggulan','keterangan'];
}
