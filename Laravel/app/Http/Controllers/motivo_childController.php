<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\children;
use App\Models\motivo_ingreso;

class motivo_childController extends Controller
{
    //

    public function store(Request $request){


        $this->validate($request,[
            'children_id' => 'required',
            'motivo_id' => 'required'
        ]);

        $children = children::findOrFail($request->children_id);
        $children->motivos()->create();
        $motivo = motivo_ingreso::findOrFail($request->motivo_id);
        $motivo->Children()->create();
            //redireccion
            return $request->all();
    }
}
