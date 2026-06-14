<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $table = 'imagenes_propiedades';

    protected $fillable = ['propiedad', 'imagen'];

    public function property()
    {
        return $this->belongsTo(Property::class, 'propiedad');
    }
}
