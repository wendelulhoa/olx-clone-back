<?php

namespace App\Http\Controllers;

use App\Models\ModelAnuncios;
use App\Models\User;
use Illuminate\Http\Request;


class AnunciosController extends Controller
{
    public function index(){
        return ModelAnuncios::all();
    }
    public function createAnuncio(Request $request){
        User::create([
            'name'=>"aa",
            'email'=>"aa",
            'password'=>"aa"
        ]);
        ModelAnuncios::create([
            'title'      => $request['title'],
            'description'=>$request['description'],
            'preco'      =>$request['preco'],
            'images'     => json_encode($request['images']),
            'cod_cliente'=>$request['cod_cliente']
        ]);
    }
}
