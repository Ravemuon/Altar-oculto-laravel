<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    // MOSTRAR FORMULÁRIO DE CONTATO
    public function index()
    {
        return view('contato.index'); // exibe a página de contato
    }

    // RECEBER DADOS DO FORMULÁRIO
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'mensagem' => 'required|min:5',
        ]); // valida os dados enviados

        return redirect()->route('contato.index')->with('success', 'Mensagem enviada com sucesso!'); // volta pro formulário e mostra msg
    }
}
