<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\descrip_alerta;
use App\Models\alerta;

class descrip_alertaController extends Controller
{
    //

    public function store(Request $request){

        $this->validate($request,[
            'alertas_id' => 'required',
            'descripcion' => 'required|string',
            'periodo'  => 'required|date'
        ]);

        $alerta = alerta::findOrFail($request->alertas_id);
        $alerta->descrip_alerta()->create([
            'descripcion' => $request->descripcion,
            'periodo' => $request->periodo
        ]);
            //redireccion
            return $request->all();
    }
}
