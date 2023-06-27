<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\children;
use App\Models\ficha_child;

class ficha_childController extends Controller
{
    //
    public function store(Request $request){

        $this->validate($request,[
            'children_id' => 'required',
            'fec_ingreso' => 'required|date',
            'fec_salida'  => 'required|date',
            'objetivos' => 'required|string',
            'description' => 'required|string'
        ]);

        $children = children::findOrFail($request->children_id);
        $children->fichas()->create([
            'fec_ingreso' => $request->fec_ingreso,
            'fec_salida' => $request->fec_salida,
            'objetivos' => $request->objetivos,
            'description' => $request->description
        ]);
            //redireccion
            return $request->all();
    }

    public function show($id){

        $ficha = ficha_child::where('children_id', $id)->get();
        return $ficha;

    }

    public function update(Request $request, $id){

        $ficha = ficha_child::where('children_id', $id)->update([
            'objetivos' => $request['objetivos']
        ]);

        return ficha_child::where('children_id', $id)->get();
    }
}
