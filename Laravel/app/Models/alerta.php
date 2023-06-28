<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alerta extends Model
{
    use HasFactory;

    protected $fillable = [
        'children_id',
        'fecha_alerta',
        'descripcion'
    ];

    public function Children(){
        return $this->belongsTo(children::class);
    }

    public function descrip_alerta(){
        return $this->hasOne(descrip_alerta::class);
    }
}
