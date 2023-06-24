<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descrip_alerta extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'periodo'
    ];
}
