<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\children;
use App\Models\alerta;

class alertaController extends Controller
{
    //

    public function store(Request $request){

        $this->validate($request,[
            'children_id' => 'required',
            'fecha_alerta' => 'required|date',
            'descripcion' => 'required|string'
        ]);

        $children = children::findOrFail($request->children_id);
        $children->alertas()->create([
            'fecha_alerta' => $request->fecha_alerta,
            'children_id' => $request->children_id,
            'descripcion' => $request->descripcion,
            
        ]);
            //redireccion
            return $request->all();
    }
}
