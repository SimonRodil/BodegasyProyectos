<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    const DEFAULT_IMAGE = 'default.png';

    protected $table = 'propiedades';

    protected $fillable = [
        'nombre', 'tipo_propiedad', 'tipo_oferta', 'banos', 'area',
        'tamano_lote', 'ano', 'descripcion', 'ciudad', 'barrio',
        'imagen_destacada', 'direccion', 'asesor', 'video', 'precio',
    ];

    protected $appends = ['precio_format', 'tipo_oferta_nombre', 'ciudad_nombre', 'imagen_destacada_url'];

    protected $casts = [
        'tipo_oferta' => 'integer',
        'area' => 'decimal:2',
        'precio' => 'decimal:2',
        'ano' => 'integer',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'ciudad');
    }

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class, 'barrio');
    }

    public function advisor()
    {
        return $this->belongsTo(User::class, 'asesor');
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'propiedad');
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class, 'propiedad');
    }

    public function getPrecioFormatAttribute()
    {
        return number_format($this->precio, 0);
    }

    public function getTipoOfertaNombreAttribute()
    {
        return $this->tipo_oferta == 2 ? 'Arriendo' : 'Venta';
    }

    public function getCiudadNombreAttribute()
    {
        return $this->city?->nombre;
    }

    public function getImagenDestacadaUrlAttribute(): string
    {
        $filename = $this->imagen_destacada ?: self::DEFAULT_IMAGE;
        return asset('storage/assets/images/propiedades/' . $filename);
    }

    public function scopeForSale($query)
    {
        return $query->where('tipo_oferta', 1);
    }

    public function scopeForRent($query)
    {
        return $query->where('tipo_oferta', 2);
    }
}
