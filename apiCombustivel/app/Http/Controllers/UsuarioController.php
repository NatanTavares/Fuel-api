<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $us = $request->all();
        $usuario = new Usuario();

        $usuario->nome = $us['nome'];
        $usuario->email = $us['email'];
        $usuario->senha = $us['senha'];
        
        $confirmarSenha = $us['confirmarSenha'];
        
        if ($usuario->senha != $confirmarSenha)
        {
            return response('As senhas não coincidem.', 400);
        }        
        
        $usuario->senha = Hash::make($usuario->senha);

        $usuario->save();
        return $usuario;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $senha = $request->input('senha');

        if (!$email || !$senha)
        {
            return response('Credenciais inválidas.', 400);
        }

        $usuario = Usuario::where('email', $email)->first();
        
        if (!$usuario)
        {
            return response('Email ou senha inválidas.', 400);
        }

        if (!Hash::check($senha, $usuario->senha))
        {
            return response('Email ou senha inválidas.', 400);
        }

        return $usuario;
    }
}
