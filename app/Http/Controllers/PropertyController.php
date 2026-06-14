<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\City;
use App\Models\Neighborhood;
use App\Models\PropertyImage;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with(['city', 'neighborhood'])->latest()->get();
        $cities = City::all();
        $neighborhoods = Neighborhood::all();
        return view('properties.index', compact('properties', 'cities', 'neighborhoods'));
    }

    public function show($id)
    {
        $property = Property::with(['city', 'neighborhood', 'advisor', 'images'])->findOrFail($id);
        $related = Property::with(['city', 'neighborhood'])
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        $cities = City::all();
        return view('properties.show', compact('property', 'related', 'cities'));
    }

    public function filter()
    {
        $query = Property::with(['city', 'neighborhood']);

        $filters = request()->only(['tipo_oferta', 'tipo_propiedad', 'ciudad', 'barrio', 'area', 'precio', 'codigo']);

        if ($tipo_oferta = $filters['tipo_oferta'] ?? null) {
            $query->where('tipo_oferta', $tipo_oferta);
        }
        if ($tipo_propiedad = $filters['tipo_propiedad'] ?? null) {
            $query->where('tipo_propiedad', $tipo_propiedad);
        }
        if ($ciudad = $filters['ciudad'] ?? null) {
            $query->where('ciudad', $ciudad);
        }
        if ($barrio = $filters['barrio'] ?? null) {
            $query->where('barrio', $barrio);
        }
        if ($codigo = $filters['codigo'] ?? null) {
            $query->where('id', $codigo);
        }

        $this->applyAreaFilter($query, $filters['area'] ?? null);
        $this->applyPriceFilter($query, $filters['precio'] ?? null);

        $pagina = max(1, (int) request('pagina', 1));
        $perPage = 6;
        $total = $query->count();
        $properties = $query->latest()->skip(($pagina - 1) * $perPage)->take($perPage)->get();

        $cities = City::all();
        $neighborhoods = Neighborhood::all();
        $totalPages = (int) ceil($total / $perPage);

        if (request()->ajax()) {
            return response()->json($properties);
        }

        return view('properties.filter', compact('properties', 'cities', 'neighborhoods', 'total', 'pagina', 'perPage', 'totalPages', 'filters'));
    }

    public function contactAdvisor($id, Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'mensaje' => 'required|string',
        ]);

        $msg = "Propiedad #{$id}: " . $request->mensaje;
        if ($request->telefono) {
            $msg .= "\nTeléfono: " . $request->telefono;
        }
        ContactMessage::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'message' => $msg,
        ]);

        return redirect()->route('properties.show', $id)
            ->with('success', 'Mensaje enviado correctamente.');
    }

    private function applyAreaFilter($query, $area)
    {
        if (!$area || $area == '-') return;

        $ranges = [
            '-50' => [0, 50],
            '50-100' => [50, 100],
            '100-300' => [100, 300],
            '300-500' => [300, 500],
            '500-800' => [500, 800],
            '800-1500' => [800, 1500],
            '+1500' => [1500, 999999],
        ];

        if (isset($ranges[$area])) {
            $query->whereBetween('area', $ranges[$area]);
        }
    }

    private function applyPriceFilter($query, $precio)
    {
        if (!$precio || $precio == '-') return;

        $ranges = [
            '0-1' => [0, 1000000],
            '1-2' => [1000000, 2000000],
            '2-5' => [2000000, 5000000],
            '5-10' => [5000000, 10000000],
            '10-20' => [10000000, 20000000],
            '20-50' => [20000000, 50000000],
            '50-100' => [50000000, 100000000],
            '100-200' => [100000000, 200000000],
            '200-500' => [200000000, 500000000],
            '500-800' => [500000000, 800000000],
            '800-1000' => [800000000, 1000000000],
            '+1000' => [1000000000, 999999999999],
        ];

        if (isset($ranges[$precio])) {
            $query->whereBetween('precio', $ranges[$precio]);
        }
    }
}
