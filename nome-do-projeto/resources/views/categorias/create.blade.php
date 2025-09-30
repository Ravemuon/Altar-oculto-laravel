@extends('layouts.app')

@section('title', 'Criar Categoria')

@section('content')
<div class="container">
    <!-- Título da página -->
    <h1 class="mb-4 text-umbanda text-center">Nova Categoria</h1>

    <!-- Erros de validação -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário -->
    <div class="card card-umbanda p-4 shadow-lg">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf

            @php
                // Lista de campos do formulário
                $fields = [
                    'nome','linha','descricao','imagem','cores','dia_semana','historia',
                    'simbolos','saudacoes','personalidade','animais','elementos','datas_rituais','notas'
                ];
            @endphp

            @foreach($fields as $field)
                <div class="mb-3">
                    <label for="{{ $field }}" class="form-label text-umbanda fw-bold">
                        {{ ucfirst(str_replace('_',' ',$field)) }}
                    </label>

                    @if(in_array($field, ['descricao','historia','notas']))
                        <textarea name="{{ $field }}" id="{{ $field }}" class="form-control" rows="3">{{ old($field) }}</textarea>
                    @else
                        <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control" value="{{ old($field) }}">
                    @endif
                </div>
            @endforeach

            <!-- Botão enviar -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-umbanda btn-lg">Criar Categoria</button>
            </div>
        </form>
                {{-- Botão voltar --}}
        <div class="text-center mt-5">
            <a href="{{ url()->previous() }}" class="btn btn-umbanda btn-lg">
                ← Voltar
            </a>
        </div>
    </div>
</div>
@endsection
