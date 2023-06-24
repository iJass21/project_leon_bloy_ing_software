<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdultoResponsable;


class AdultoResponsableController extends Controller
{
    //
    public function store(Request $request){

        //Sdd($request);

        //validacion
        $this->validate($request, [
            'name' => 'required|string',
            'lastname'  => 'required|string',
            'rut'  => 'required|int',
            'vinculo'  => 'required|string',
            'obs'  => 'required|string',
            'direccion'  => 'required|string',
            'phone'  => 'required|string',
            'objetivos'  => 'required|string',
            'email'  => 'required|string',
            'rubro'  => 'required|string'
        ]);

        //almacenamiento
        AdultoResponsable::create([
        'name' => $request->name,
        'lastname' => $request->lastname,
        'rut' => $request->rut,
        'vinculo' => $request->vinculo,
        'obs' => $request->obs,
        'direccion' => $request->direccion,
        'phone' => $request->phone,
        'objetivos' => $request->objetivos,
        'email' => $request->email,
        'rubro' => $request->rubro
        ]);
        //redireccion
        return $request -> all();
    }
}
