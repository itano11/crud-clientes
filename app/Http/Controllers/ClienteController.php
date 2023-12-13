<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create', ['categorias' => Categoria::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Viene del form (submit) de vista create
        // validando lo que se reciba
        $request->validate([
                'rut' => 'required|unique:clientes|max:10',
                'nombre' => 'required|max:120',
                'fecha_incorporacion' => 'date',
                'telefono' => 'required|max:20',
                'email' => 'required|email|max:100',
                'categoria' => 'required'
        ]);

        $cliente = new Cliente();
        
        $cliente->rut = $request->input('rut');
        $cliente->nombre = $request->input('nombre');
        $cliente->fecha_incorporacion = $request->input('fecha');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->categoria_id = $request->input('categoria');
        $cliente->save();

        return view("clientes.message", ['msg' => "Cliente Guardado!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit', ['cliente' => $cliente, 'categorias' => Categoria::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rut' => 'required|max:10|unique:clientes,rut,' .$id,
            'nombre' => 'required|max:120',
            'fecha_incorporacion' => 'date',
            'telefono' => 'required|max:20',
            'email' => 'required|email|max:100',
            'categoria' => 'required'
        ]);

        $cliente = Cliente::find($id);
        
        $cliente->rut = $request->input('rut');
        $cliente->nombre = $request->input('nombre');
        $cliente->fecha_incorporacion = $request->input('fecha');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->categoria_id = $request->input('categoria');
        $cliente->save();

        return view("clientes.message", ['msg' => "Cliente Modificado!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect("clientes");
    }
}
