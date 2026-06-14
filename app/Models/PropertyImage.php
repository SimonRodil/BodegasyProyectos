<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $table = 'imagenes_propiedades';

    protected $fillable = ['propiedad', 'imagen'];

    protected $appends = ['url'];

    public function property()
    {
        return $this->belongsTo(Property::class, 'propiedad');
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/assets/images/propiedades/fotos/' . $this->imagen);
    }
}
