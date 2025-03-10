<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\MedioContacto;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Client::all();
        return view('clientes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medios = MedioContacto::all();
        return view('clientes.create', compact('medios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        $data = $request->all();
        Client::create($data);
        return redirect()->route('cliente.index')->with('success', 'El registro se ha creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($cliente)
    {
        $data = Client::find($cliente);
        return view('clientes.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cliente)
    {
        $data = Client::find($cliente);
        $medios = MedioContacto::all();
        return view('clientes.edit', compact('data', 'medios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, $cliente)
    {
        $data = $request->all();
        $c = Client::find($cliente);
        $c->update($data);
        return redirect()->route('cliente.index')->with('success', 'El registro se ha actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $cliente)
    {
        $data = $cliente->expedientes;
        if ($data->count() > 0) {
            return redirect()->route('cliente.index')->with('error', 'No se puede eliminar el cliente porque tiene expedientes asociados.');
        }

        $data = $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'El registro se ha eliminado exitosamente.');
    }
}
