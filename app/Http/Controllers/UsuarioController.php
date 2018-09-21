<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Usuario;

class UsuarioController extends Controller
{
    public function listar(){
        $usuarios = Usuario::all();
        return view('usuarios.listar', compact('usuarios'));
    }
    
    public function editar($id){
        $this->authorize('update', Usuario::class);

        $usuario = Usuario::find($id);
        return view('usuarios.editar', compact('usuario'));
    }

    public function atualizar(Request $request, $id){
        $this->authorize('update', Usuario::class);

        $dados = $request->all();
        $usuario = Usuario::find($id);

        if(!$dados['senha']){
            $dados['senha'] = $usuario->senha;
            $usuario->update($dados);
        }else{
            $dados['senha'] = Hash::make($dados['senha']);
            $usuario->update($dados);
        }

        return redirect()->route('listar');
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
