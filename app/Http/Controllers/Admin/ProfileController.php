<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'telephone' => 'nullable|string|max:20',
            'password_1' => 'nullable|string|min:6',
            'about_me' => 'nullable|string|max:200',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        $data = $request->except(['password_1', '_token']);

        if ($request->filled('password_1')) {
            $data['password'] = Hash::make($request->password_1);
        }

        $user->update($data);

        return response('success');
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate(['image' => 'required|string']);
        $user = auth()->user();

        $imageData = base64_decode($request->image);
        $filename = uniqid() . '.png';
        Storage::disk('public')->put('assets/images/profile_pictures/' . $filename, $imageData);

        if ($user->profile_pic && $user->profile_pic !== 'default.jpg') {
            Storage::disk('public')->delete('assets/images/profile_pictures/' . $user->profile_pic);
        }

        $user->update(['profile_pic' => $filename]);

        return response()->json(['success' => true]);
    }
}
