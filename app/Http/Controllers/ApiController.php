<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Neighborhood;
use App\Models\Property;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function contactAdvisor(Request $request)
    {
        $request->validate([
            'propiedad' => 'required|exists:propiedades,id',
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'mensaje' => 'required|string',
        ]);

        $property = Property::with('advisor')->findOrFail($request->propiedad);

        Inquiry::create([
            'asesor' => $property->asesor ?? 1,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje,
            'propiedad' => $request->propiedad,
        ]);

        return response()->json(['message' => 'Consulta exitosa!']);
    }

    public function neighborhoods($ciudad)
    {
        $neighborhoods = Neighborhood::where('ciudad', $ciudad)->get();
        return response()->json($neighborhoods);
    }

    public function filterProperties(Request $request)
    {
        $query = Property::with(['city', 'neighborhood']);

        if ($tipo_oferta = $request->tipo_oferta) {
            $query->where('tipo_oferta', $tipo_oferta);
        }
        if ($tipo_propiedad = $request->tipo_propiedad) {
            $query->where('tipo_propiedad', $tipo_propiedad);
        }
        if ($ciudad = $request->ciudad) {
            $query->where('ciudad', $ciudad);
        }
        if ($barrio = $request->barrio) {
            $query->where('barrio', $barrio);
        }

        $pagina = max(1, (int) $request->pagina);
        $perPage = 6;
        $properties = $query->latest()->skip(($pagina - 1) * $perPage)->take($perPage)->get();

        return response()->json($properties);
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->only('name', 'email', 'message'));

        return response()->json(['message' => 'Mensaje Enviado correctamente.']);
    }
}
