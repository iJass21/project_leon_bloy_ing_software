<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personas;

class personasController extends Controller
{
    //
    public function store(Request $request){
        
        $this->validate($request,[
            'nombre' => 'required|string',
            'edad' => 'required|integer'
        ]);

        personas::create([
            'nombre' => $request->nombre,
            'edad' => $request->edad
        ]);

        return $request->all();
    }
}
