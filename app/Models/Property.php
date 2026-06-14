<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'propiedades';

    protected $fillable = [
        'nombre', 'tipo_propiedad', 'tipo_oferta', 'banos', 'area',
        'tamano_lote', 'ano', 'descripcion', 'ciudad', 'barrio',
        'imagen_destacada', 'direccion', 'asesor', 'video', 'precio',
    ];

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

    public function scopeForSale($query)
    {
        return $query->where('tipo_oferta', 1);
    }

    public function scopeForRent($query)
    {
        return $query->where('tipo_oferta', 2);
    }
}
