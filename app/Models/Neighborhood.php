<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    protected $table = 'barrios';

    protected $fillable = ['nombre', 'ciudad'];

    public function city()
    {
        return $this->belongsTo(City::class, 'ciudad');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'barrio');
    }
}
