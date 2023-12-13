@extends('layout/template')

@section('title', 'Editar Cliente')

@section('contenido')

<main>
    <div class="container py-4">
        <h2><b>Editar Cliente</b></h2>
        
        <!-- Mostrando errores de validación que vienen desde el ClienteController -->
        @if ($errors->any())

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>    
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{ url('clientes/'.$cliente->id) }}" method="post">
            @method("PUT")
            @csrf

            <div class="mt-5 row">
                <label for="rut" class="col-sm-2 col-form-label">RUT:</label>
                <div class="col-sm-5">
                    <input type="text" name="rut" id="rut" class="form-control" value="{{ $cliente->rut }}" required>
                </div>
            </div>

            <div class="mt-2 row">
                <label for="nombre" class="col-sm-2 col-form-label">NOMBRE COMPLETO:</label>
                <div class="col-sm-5">
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $cliente->nombre }}" required>
                </div>
            </div>

            <div class="mt-2 row">
                <label for="fecha" class="col-sm-2 col-form-label">FECHA INCORPORACIÓN:</label>
                <div class="col-sm-5">
                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $cliente->fecha_incorporacion }}" required>
                </div>
            </div>

            <div class="mt-2 row">
                <label for="telefono" class="col-sm-2 col-form-label">TELÉFONO:</label>
                <div class="col-sm-5">
                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $cliente->telefono }}" required>
                </div>
            </div>

            <div class="mt-2 row">
                <label for="email" class="col-sm-2 col-form-label">EMAIL:</label>
                <div class="col-sm-5">
                    <input type="email" name="email" id="email" class="form-control" value="{{ $cliente->email }}" required>
                </div>
            </div>

            <div class="mt-2 row">
                <label for="categoria" class="col-sm-2 col-form-label">CATEGORÍA:</label>
                <div class="col-sm-5">
                    <select name="categoria" id="categoria" class="form-select" required>
                        <option value="">Seleccionar categoría</option>
                        @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @if ($categoria->id == $cliente->categoria_id) {{ 'selected' }} @endif>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-success mt-5">Guardar Cliente</button>
            <a href="{{ url('clientes') }}" class="btn btn-secondary mt-5">Volver</a>
        </form>
    </div>
</main>

@endsection