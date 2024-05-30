<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->area = $request->area;

        $producto->save();

        return redirect()->route('productos.index')->with('flash_message', 'Producto creado con éxito.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|string|max:9',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|integer',
            'area' => 'required|in:lubricantes,accesorios,aditivos',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->area = $request->area;

        $producto->save();

        return redirect()->route('productos.index')->with('flash_message', 'Producto actualizado con éxito.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('flash_message', 'Producto eliminado con éxito.');
    }
}
