<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $table = 'contact';

    protected $fillable = ['name', 'email', 'message', 'estatus'];

    protected $casts = [
        'estatus' => 'integer',
    ];

    public function replies()
    {
        return $this->hasMany(ContactReply::class, 'message');
    }
}
