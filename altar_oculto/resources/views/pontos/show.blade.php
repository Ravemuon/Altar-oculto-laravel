@extends('layouts.app')

@section('title', $ponto->titulo)

@section('content')
<div class="container my-5 text-center">
    <h2 class="fw-bold text-umbanda mb-4">{{ $ponto->titulo }}</h2>
    <p class="text-muted fst-italic">{{ $ponto->autor ?? 'Autor desconhecido' }}</p>

    <p class="lead text-dark bg-light p-4 rounded-4 shadow-sm mx-auto" style="max-width: 600px;">
        {!! nl2br(e($ponto->letra)) !!}
    </p>

    @if($ponto->audio)
        <div class="mt-4">
            <audio controls>
                <source src="{{ asset('storage/'.$ponto->audio) }}" type="audio/mpeg">
                Seu navegador não suporta áudio.
            </audio>
        </div>
    @endif

    <div class="mt-5">
        <a href="{{ route('pontos.index') }}" class="btn btn-umbanda">← Voltar</a>
    </div>
</div>
@endsection
