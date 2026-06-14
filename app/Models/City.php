<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'ciudades';

    protected $fillable = ['nombre'];

    public function neighborhoods()
    {
        return $this->hasMany(Neighborhood::class, 'ciudad');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'ciudad');
    }
}
