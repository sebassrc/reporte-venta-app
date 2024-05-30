<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\Reporte;

class TurnoController extends Controller
{
    public function index()
    {
        $turnos = Turno::all();
        return view('turnos.index', compact('turnos'));
    }

    public function create()
    {
        $reportes = Reporte::all();
        return view('turnos.create', compact('reportes'));
    }

    public function store(Request $request)
    {
       
        $turno = new Turno();
        $turno->reporte_id = $request->reporte_id;
        $turno->numero_turno = $request->numero_turno;
        $turno->inventario_recibido = $request->inventario_recibido;
        $turno->reposicion = $request->reposicion;
        $turno->venta_contado = $request->venta_contado;
        $turno->venta_credito = $request->venta_credito;
        $turno->inventario_final = $request->inventario_final;

        $turno->save();

        return redirect()->route('turnos.index')->with('flash_message', 'Turno creado con éxito.');
    }

    public function edit($id)
    {
        $turno = Turno::findOrFail($id);
        $reportes = Reporte::all();
        return view('turnos.edit', compact('turno', 'reportes'));
    }

    public function update(Request $request, $id)
    {
     
        $turno = Turno::findOrFail($id);
        $turno->reporte_id = $request->reporte_id;
        $turno->numero_turno = $request->numero_turno;
        $turno->inventario_recibido = $request->inventario_recibido;
        $turno->reposicion = $request->reposicion;
        $turno->venta_contado = $request->venta_contado;
        $turno->venta_credito = $request->venta_credito;
        $turno->inventario_final = $request->inventario_final;

        $turno->save();

        return redirect()->route('turnos.index')->with('flash_message', 'Turno actualizado con éxito.');
    }

    public function destroy($id)
    {
        $turno = Turno::findOrFail($id);
        $turno->delete();

        return redirect()->route('turnos.index')->with('flash_message', 'Turno eliminado con éxito.');
    }
}
