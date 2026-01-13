<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;
    protected $table = 'table_blog';
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'thumbnail',
        'status',
        'published_at',
    ];

    /**
     * Cast tipe data
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Scope: hanya blog yang publish
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'publish');
    }

    /**
     * Scope: hanya draft
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }
}
