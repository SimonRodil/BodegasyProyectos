<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactReply extends Model
{
    protected $table = 'reply';

    protected $fillable = ['message', 'content'];

    public function contactMessage()
    {
        return $this->belongsTo(ContactMessage::class, 'message');
    }
}
