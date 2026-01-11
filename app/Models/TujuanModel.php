<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanModel extends Model
{
    use HasFactory;
    protected $table = 'table_tujuan';
    protected $fillable = ['tujuan'];
}
