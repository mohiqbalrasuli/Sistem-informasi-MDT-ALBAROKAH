<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisiModel extends Model
{
    use HasFactory;

    protected $table = 'table_misi';
    protected $fillable = ['misi'];
}
