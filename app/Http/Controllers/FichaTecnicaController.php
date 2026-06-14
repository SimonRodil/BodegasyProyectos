<?php

namespace App\Http\Controllers;

use App\Models\Property;

class FichaTecnicaController extends Controller
{
    public function download($id)
    {
        $property = Property::with(['city', 'neighborhood', 'images'])->findOrFail($id);
        $html = view('properties.pdf', compact('property'))->render();

        $pdf = new \Mpdf\Mpdf();
        $pdf->WriteHTML($html);
        return response($pdf->Output('ficha-tecnica.pdf', 'I'), 200)
            ->header('Content-Type', 'application/pdf');
    }
}
