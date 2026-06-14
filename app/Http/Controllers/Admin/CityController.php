<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return view('admin.cities.index');
    }

    public function data()
    {
        return response()->json(City::with('neighborhoods')->get());
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string|max:255']);
        City::create($request->only('nombre'));
        return $request->ajax() ? response()->json(['message' => 'Consulta exitosa!']) : redirect()->route('admin.ciudades.index');
    }

    public function show($id)
    {
        return response()->json(City::with('neighborhoods')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nombre' => 'required|string|max:255']);
        City::findOrFail($id)->update($request->only('nombre'));
        return $request->ajax() ? response()->json(['message' => 'Consulta exitosa!']) : redirect()->route('admin.ciudades.index');
    }

    public function destroy($id)
    {
        City::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
