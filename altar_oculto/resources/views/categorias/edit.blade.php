@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')
<div class="container">
    <!-- Título da página -->
    <h1 class="mb-4 text-umbanda text-center display-6">Editar Categoria: {{ $categoria->nome }}</h1>

    <!-- Botão voltar -->
    <div class="text-center mb-4">
        <a href="{{ route('categorias.index') }}" class="btn btn-outline-secondary btn-sm">
            ← Voltar
        </a>
    </div>

    <!-- Erros de validação -->
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário -->
    <div class="card card-umbanda p-4 shadow-lg border-0">
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            @php
                $fields = [
                    'nome','linha','descricao','imagem','cores','dia_semana','historia',
                    'simbolos','saudacoes','personalidade','animais','elementos','datas_rituais','notas'
                ];
            @endphp

            <div class="row g-3">
                @foreach($fields as $field)
                    <div class="col-md-6">
                        <label for="{{ $field }}" class="form-label text-umbanda fw-semibold">
                            {{ ucfirst(str_replace('_',' ',$field)) }}
                        </label>

                        @if(in_array($field, ['descricao','historia','notas']))
                            <textarea
                                name="{{ $field }}"
                                id="{{ $field }}"
                                class="form-control"
                                rows="3"
                                placeholder="Digite {{ str_replace('_',' ', $field) }}...">{{ old($field, $categoria->$field) }}</textarea>
                        @else
                            <input
                                type="text"
                                name="{{ $field }}"
                                id="{{ $field }}"
                                class="form-control"
                                value="{{ old($field, $categoria->$field) }}"
                                placeholder="Digite {{ str_replace('_',' ', $field) }}...">
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Botão enviar -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-umbanda btn-lg px-5 py-2 shadow-sm">
                    Atualizar Categoria
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
