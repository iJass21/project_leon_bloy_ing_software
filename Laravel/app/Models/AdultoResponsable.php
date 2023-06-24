<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdultoResponsable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'rut',
        'vinculo',
        'obs',
        'direccion',
        'phone',
        'objetivos',
        'email',
        'rubro'
    ];
}
