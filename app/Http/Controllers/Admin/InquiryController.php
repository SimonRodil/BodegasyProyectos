<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index()
    {
        return view('admin.inquiries.index');
    }

    public function data()
    {
        $user = auth()->user();
        $query = Inquiry::with('property');
        if ($user->rank <= 1) {
            $query->where('asesor', $user->id);
        }
        return response()->json($query->get());
    }

    public function destroy($id)
    {
        Inquiry::findOrFail($id)->delete();
        return response('success');
    }
}
