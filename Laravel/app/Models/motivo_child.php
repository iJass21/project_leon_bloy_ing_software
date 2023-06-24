<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motivo_child extends Model
{
    use HasFactory;

    public function Children(){
        return $this->belongsToMany(children::class);
    }
}
