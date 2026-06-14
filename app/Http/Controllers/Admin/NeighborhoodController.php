<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Neighborhood;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    public function index()
    {
        return view('admin.cities.index');
    }

    public function data()
    {
        return response()->json(Neighborhood::with('city')->get());
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string|max:255', 'ciudad' => 'required|exists:ciudades,id']);
        Neighborhood::create($request->only('nombre', 'ciudad'));
        return $request->ajax() ? response()->json(['message' => 'Consulta exitosa!']) : redirect()->route('admin.barrios.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nombre' => 'required|string|max:255', 'ciudad' => 'required|exists:ciudades,id']);
        Neighborhood::findOrFail($id)->update($request->only('nombre', 'ciudad'));
        return $request->ajax() ? response()->json(['message' => 'Consulta exitosa!']) : redirect()->route('admin.barrios.index');
    }

    public function destroy($id)
    {
        Neighborhood::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
