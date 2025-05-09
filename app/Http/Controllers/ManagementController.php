<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Kamban;
use App\Models\Management;
use Illuminate\Http\Request;
use App\Http\Requests\StoreManagementRequest;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kamban::all();
        return view('gestiones.index', compact('data'));
    }

    public function kambanJson()
    {
        $data = Kamban::with('boards', 'user', 'client', 'boards.boardTasks')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Client::all();
        return view('gestiones.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManagementRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        Management::create($data);
        return redirect()->route('gestion.index')->with('success', 'El registro se ha creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($management)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $management)
    {

        $gestion = Management::find($management);
        $clientes = Client::all();
        return view('gestiones.edit', compact('gestion', 'clientes'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $management)
    {
        $gestion = Management::find($management);
        $gestion->update($request->all());
        return redirect()->route('gestion.index')->with('success', 'El registro se ha actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($management)
    {
        $gestion = Management::find($management);
        $gestion->delete();
        return redirect()->route('gestion.index')->with('success', 'El registro se ha eliminado exitosamente.');
    }
}
