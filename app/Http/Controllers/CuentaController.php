<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cuentas.index', ['cuentas'=>Cuenta::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('cuentas.create', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero' => 'required|numeric|unique:cuentas,numero',
            'cliente_id' => 'required|exists:clientes,id',
        ]);
        Cuenta::create($validated);
        session()->flash('exito', 'Cuenta creada correctamente.');
        return redirect()->route('cuentas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuenta $cuenta)
    {
        return view('cuentas.show', ['cuenta'=>$cuenta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuenta $cuenta)
    {
        $clientes = Cliente::all();
        return view('cuentas.edit', [
            'cuenta'=>$cuenta,
            'clientes'=>$clientes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuenta $cuenta)
    {
        $validated = $request->validate([
            'numero' => 'required|numeric',
            'cliente_id' => 'required|exists:clientes,id',
        ]);
        $cuenta->fill($validated);
        $cuenta->save();
        session()->flash('exito', 'cuenta modificada correctamente.');
        return redirect()->route('cuentas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuenta $cuenta)
    {
        $cuenta->delete();
        return redirect()->route('cuentas.index');
    }
}
