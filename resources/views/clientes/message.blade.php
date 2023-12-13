@extends('layout/template')

@section('title', 'Registro de Clientes')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>{{ $msg }}</h2>

        <a href="{{ url('clientes') }}" class="btn btn-secondary mt-5">Volver</a>
    </div>
</main>

@endsection