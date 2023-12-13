@extends('layout/template')

@section('title', 'Registro de Clientes')

@section('contenido')

<main>
    <div class="container py-4">
        <h2><b>Listado de Clientes</b></h2>

        <a href="{{ url('clientes/create') }}" class="btn btn-primary btn-sm mt-2">Agregar Cliente</a>
    
        <!-- Vista de los clientes -->
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Fecha Incorporación</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Categoría</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->rut }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->fecha_incorporacion }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->categoria->nombre }}</td>
                    <td><a href="{{ url('clientes/'.$cliente->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a></td>
                    <td>
                        <form action="{{ url('clientes/'.$cliente->id) }}" method="post">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="card-body">
            {{ $clientes->links() }}
        </div>
    </div>
</main>

@endsection