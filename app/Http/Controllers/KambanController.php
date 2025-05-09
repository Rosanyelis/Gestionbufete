<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Kamban;
use Illuminate\Http\Request;

class KambanController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Kamban::find($id);
        return view('gestiones.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
