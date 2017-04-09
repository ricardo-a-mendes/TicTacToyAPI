<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class GameController extends Controller
{
    public function register(Request $request)
    {
        $erros = collect();
        $saida = collect(['errors' => $erros]);

        if (!$request->has('a'))
            $erros->push('A missing parameters');

        if (!$request->has('b'))
            $erros->push('B missing parameters');

        if (count($erros) > 0)
            $saida->put('errors', $erros->all());

        return $saida->toJson();
    }
}
