<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        return view('admin.properties.index');
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_propiedad' => 'nullable|string|max:255',
            'tipo_oferta' => 'required|in:1,2',
            'banos' => 'nullable|string|max:50',
            'area' => 'nullable|numeric',
            'tamano_lote' => 'nullable|string|max:255',
            'ano' => 'nullable|integer|min:1900|max:2099',
            'descripcion' => 'nullable|string',
            'ciudad' => 'nullable|exists:ciudades,id',
            'barrio' => 'nullable|exists:barrios,id',
            'imagen_destacada' => 'nullable|string',
            'direccion' => 'nullable|string|max:255',
            'asesor' => 'nullable|exists:users,id',
            'video' => 'nullable|string|max:255',
            'precio' => 'nullable|numeric',
        ]);

        $data['asesor'] = $data['asesor'] ?? auth()->id();
        Property::create($data);

        return redirect()->route('admin.propiedades.index')->with('success', 'Propiedad creada');
    }

    public function show($id)
    {
        $property = Property::with(['city', 'neighborhood', 'advisor', 'images'])->findOrFail($id);
        return view('admin.properties.show', compact('property'));
    }

    public function edit($id)
    {
        $property = Property::with(['city', 'neighborhood'])->findOrFail($id);
        return view('admin.properties.edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_propiedad' => 'nullable|string|max:255',
            'tipo_oferta' => 'required|in:1,2',
            'banos' => 'nullable|string|max:50',
            'area' => 'nullable|numeric',
            'tamano_lote' => 'nullable|string|max:255',
            'ano' => 'nullable|integer|min:1900|max:2099',
            'descripcion' => 'nullable|string',
            'ciudad' => 'nullable|exists:ciudades,id',
            'barrio' => 'nullable|exists:barrios,id',
            'direccion' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'precio' => 'nullable|numeric',
        ]);

        $property->update($data);

        return redirect()->route('admin.propiedades.index')->with('success', 'Propiedad actualizada');
    }

    public function destroy($id)
    {
        Property::findOrFail($id)->delete();
        return redirect()->route('admin.propiedades.index')->with('success', 'Propiedad eliminada');
    }

    public function foto($id)
    {
        $property = Property::with('city', 'neighborhood')->findOrFail($id);
        return view('admin.properties.foto', compact('property'));
    }

    public function uploadFeaturedImage(Request $request, $id)
    {
        $request->validate(['image' => 'required|string']);
        $property = Property::findOrFail($id);

        $imageData = base64_decode($request->image);
        $filename = 'fd_' . uniqid() . '.jpg';
        Storage::disk('public')->put('assets/images/propiedades/' . $filename, $imageData);

        if ($property->imagen_destacada) {
            Storage::disk('public')->delete('assets/images/propiedades/' . $property->imagen_destacada);
        }

        $property->update(['imagen_destacada' => $filename]);
        return response()->json(['imagen_destacada' => $filename]);
    }

    public function tmpUpload(Request $request)
    {
        $request->validate(['image' => 'required|image']);
        $filename = $request->file('image')->hashName();
        $request->file('image')->storeAs('public/assets/images/propiedades/tmp', $filename);
        return response()->json($filename);
    }
}
