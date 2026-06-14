<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use App\Models\City;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::with(['city', 'neighborhood'])
            ->latest()
            ->take(6)
            ->get();

        $advisors = User::all();
        $cities = City::all();
        $blogPosts = BlogPost::latest()->take(3)->get();

        return view('home', compact('properties', 'advisors', 'cities', 'blogPosts'));
    }
}
