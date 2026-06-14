<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog';

    protected $fillable = ['title', 'shortcut', 'content', 'image', 'url', 'to_publish', 'asesor'];

    protected $casts = [
        'to_publish' => 'datetime',
    ];

    public function advisor()
    {
        return $this->belongsTo(User::class, 'asesor');
    }
}
