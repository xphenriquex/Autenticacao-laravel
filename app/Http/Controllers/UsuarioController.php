<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    public function listar(){
        $usuarios = Usuario::all();
        return view('usuarios.listar', compact('usuarios'));
    }
    
    public function editar($id){
        $usuario = Usuario::find($id);
        return view('usuarios.editar', compact('usuario'));
    }

    public function registrar(){
        return view('usuarios.registrar');
    }

    public function salvar(Request $request){
        $dados = $request->all();
        $dados['senha'] = bcrypt($dados['senha']);
        Usuario::create($dados);

        return redirect()->route('home');
    }
}
