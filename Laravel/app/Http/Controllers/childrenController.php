<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\children;
use App\Models\adulto_responsable;

class childrenController extends Controller
{
    //

    public function store(Request $request){

        $this->validate($request,[
            'adult_respon_id' => 'required',
            'name' => 'required|string',
            'lastname'  => 'required|string',
            'rut' => 'required|integer',
            'nacionalidad' => 'required|string',
            'papeleo' => 'required|boolean',
            'f_nac' => 'required|date',
            'obs' => 'required|string',
            'direccion' => 'required|string',
            'phone_contact' => 'required|string',
            'description' => 'required|string'
        ]);

        $adultos = adulto_responsable::findOrFail($request->adult_respon_id);
        $adultos->Children()->create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'rut' => $request->rut,
            'nacionalidad' => $request->nacionalidad,
            'papeleo' => $request->papeleo,
            'f_nac' => $request->f_nac,
            'obs' => $request->obs,
            'direccion' => $request->direccion,
            'phone_contact' => $request->phone_contact,
            'description' => $request->description
        ]);
            //redireccion
            return $request->all();
    }

    public function index(){
        # $posts = Post::where('user_id', $user->id)->latest()->paginate(20);
        $children = children::all();
        return $children;
    }

    public function show($id){

        $children = children::where('id', $id)->get();
        return $children;

    }

    public function get_id($rut) {
        $children = children::where('rut', $rut)->get();
        return $children;
    }

    public function update(Request $request, $id ){

        //$children = children::where('id', $id)->get();

        $child = children::where('id', $id)->get();

        
        children::where('id', $id)->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'rut' => $request->rut,
            'f_nac' => $request->f_nac,
            'obs' => $request->obs,
            'direccion' => $request->direccion,
            'phone_contact' => $request->phone_contact,
            'description' => $request->description
        ]);

        $child = children::where('id', $id)->get();


        return $child;

    }
    
    public function contar(){
        

        $children = children::count();
        return $children;
    }
}
