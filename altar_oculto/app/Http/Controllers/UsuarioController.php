<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Página de cadastro normal
    public function create()
    {
        return view('usuarios.create');
    }

    // Salvar novo usuário normal
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6'
        ]);

        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
        ]);

        Auth::login($usuario);

        return redirect()->route('usuarios.perfil')
            ->with('success', 'Cadastro realizado com sucesso! Bem-vindo!');
    }

    // Página de login
    public function login()
    {
        return view('usuarios.login');
    }

    // Realiza login
    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            Auth::login($usuario);
            return redirect()->route('usuarios.perfil');
        }

        return back()->with('error', 'E-mail ou senha incorretos!');
    }

    // Página de perfil
    public function perfil()
    {
        return view('usuarios.perfil');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Você saiu da sua conta.');
    }

    // Upload de imagem de perfil
    public function uploadImagem(Request $request)
    {
        $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem')->store('perfil', 'public');
            $user->imagem = $imagem;
            $user->save();
        }

        return back()->with('success', 'Imagem de perfil atualizada com sucesso!');
    }

    // Página de formulário para cadastro de fornecedor
    public function fornecedorForm()
    {
        return view('usuarios.fornecedor');
    }

    // Salvar usuário fornecedor com código e criação de empresa
    public function storeFornecedor(Request $request)
    {
        $codigoAutorizacao = 'FORNECEDOR123'; // código pré-definido

        $request->validate([
            'codigo' => 'required|string|in:' . $codigoAutorizacao,
            'empresa' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6',
        ]);

        // Cria ou pega fornecedor
        $fornecedor = Fornecedor::firstOrCreate([
            'nome' => $request->empresa,
        ]);

        // Cria o usuário vinculado ao fornecedor
        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
            'fornecedor_id' => $fornecedor->id,
        ]);

        Auth::login($usuario);

        return redirect()->route('usuarios.perfil')
            ->with('success', 'Conta de fornecedor criada com sucesso!');
    }
}
