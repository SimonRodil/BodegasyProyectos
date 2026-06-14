<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = 'mensajeria';

    protected $fillable = ['asesor', 'nombre', 'telefono', 'email', 'mensaje', 'propiedad'];

    public function advisor()
    {
        return $this->belongsTo(User::class, 'asesor');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'propiedad');
    }
}
