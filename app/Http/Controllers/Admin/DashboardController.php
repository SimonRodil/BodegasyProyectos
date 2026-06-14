<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use App\Models\Inquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->rank > 1) {
            $properties = Property::count();
            $latestProperties = Property::with('city')->latest()->take(5)->get();
        } else {
            $properties = Property::where('asesor', $user->id)->count();
            $latestProperties = Property::with('city')->where('asesor', $user->id)->latest()->take(5)->get();
        }

        $advisors = User::count();
        $messages = Inquiry::where('asesor', $user->id)->count();
        $latestMessages = Inquiry::where('asesor', $user->id)->with('property')->latest()->take(5)->get();

        return view('admin.dashboard', compact('properties', 'advisors', 'messages', 'latestProperties', 'latestMessages'));
    }
}
