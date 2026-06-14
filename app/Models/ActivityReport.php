<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityReport extends Model
{
    protected $table = 'reports';

    protected $fillable = ['user', 'message'];
}
