<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    //

    public function index(){
        # $posts = Post::where('user_id', $user->id)->latest()->paginate(20);
        $trabajadores = User::all();
        return $trabajadores;
    }

    public function show($id){

        $adulto = User::where('id', $id)->get();
        return $adulto;

    }

    public function contar(){
        

        $user = User::count();
        return $user;
    }
}
