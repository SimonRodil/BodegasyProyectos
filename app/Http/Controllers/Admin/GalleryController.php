<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index($id)
    {
        $property = \App\Models\Property::with('images', 'city', 'neighborhood')->findOrFail($id);
        return view('admin.properties.galeria', compact('property'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'propiedad' => 'required|exists:propiedades,id',
            'image' => 'required|image',
        ]);

        $file = $request->file('image');
        $filename = $file->hashName();
        $file->storeAs('public/assets/images/propiedades/fotos', $filename);

        PropertyImage::create([
            'propiedad' => $request->propiedad,
            'imagen' => $filename,
        ]);

        return redirect()->route('admin.propiedades.galeria', $request->propiedad)->with('success', 'Foto agregada');
    }

    public function show($id)
    {
        $images = PropertyImage::where('propiedad', $id)->get();
        return response()->json($images);
    }

    public function destroy($id)
    {
        $image = PropertyImage::findOrFail($id);

        Storage::disk('public')->delete('assets/images/propiedades/fotos/' . $image->imagen);
        $image->delete();

        return back()->with('success', 'Foto eliminada');
    }
}
