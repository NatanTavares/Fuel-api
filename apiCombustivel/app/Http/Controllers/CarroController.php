<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
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
        $dados = $request->all();
        
        $carro = new Carro();

        $carro->modelo = $dados['modelo'];
        $carro->montadora = $dados['montadora'];
        $carro->consumoAlcool = $dados['consumoAlcool'];
        $carro->consumoGasolina = $dados['consumoGasolina'];
        $carro->usuario_id = $dados['usuario_id'];

        if (!$carro->modelo)
        {
            return response('O campo modelo é obrigatório.', 400);
        }

        if (!$carro->montadora)
        {
            return response('O campo montadora é obrigatório.', 400);
        }
        
        if (!$carro->consumoAlcool)
        {
            return response('O campo consumoAlcool é obrigatório.', 400);
        }

        if (!$carro->consumoGasolina)
        {
            return response('O campo consumoGasolina é obrigatório.', 400);
        }

        if (!$carro->usuario_id)
        {
            return response('Usuário não encontrado', 400);
        }

        $carro->save();
        return response('Carro cadastrado com sucesso.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function show(Carro $carro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function edit(Carro $carro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carro $carro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carro $carro)
    {
        //
    }
}
