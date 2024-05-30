<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Reporte;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::all();
        return view('reportes.index', compact('reportes'));
    }

    public function create()
    {
        return view('reportes.create');
    }

    public function store(Request $request)
    {

        $reporte = new Reporte();
        $reporte->nombre = $request->nombre;
        $reporte->fecha = $request->fecha;
        $reporte->isla = $request->isla;
        $reporte->estado = $request->estado;

        if ($request->hasFile('archivo')) {
            $path = $request->file('archivo')->store('archivos', 'public');
            $reporte->archivo = '/storage/' . $path;
        }

        $reporte->save();

        return redirect()->route('reportes.index')->with('flash_message', 'Reporte creado con éxito.');
    }

    public function edit($id)
    {
        $reporte = Reporte::findOrFail($id);
        return view('reportes.edit', compact('reporte'));
    }

    public function update(Request $request, $id)
    {
    
        $reporte = Reporte::findOrFail($id);
        $reporte->nombre = $request->nombre;
        $reporte->fecha = $request->fecha;
        $reporte->isla = $request->isla;
        $reporte->estado = $request->estado;

        if ($request->hasFile('archivo')) {
            $path = $request->file('archivo')->store('archivos', 'public');
            $reporte->archivo = '/storage/' . $path;
        }

        $reporte->save();

        return redirect()->route('reportes.index')->with('flash_message', 'Reporte actualizado con éxito.');
    }

    public function destroy($id)
    {
        $reporte = Reporte::findOrFail($id);

        if ($reporte->archivo) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $reporte->archivo));
        }

        $reporte->delete();
        return redirect()->route('reportes.index')->with('flash_message', 'Reporte eliminado con éxito.');
    }
}
