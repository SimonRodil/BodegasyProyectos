<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function data()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username|max:255',
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password_1' => 'required|string|min:6',
            'rank' => 'nullable|integer|in:1,2',
            'telephone' => 'nullable|string|max:20',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name ?? $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password_1),
            'rank' => $request->rank ?? 1,
            'telephone' => $request->telephone,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
        ]);

        return response('success');
    }

    public function show($id)
    {
        return response()->json(User::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password_1' => 'nullable|string|min:6',
            'rank' => 'nullable|integer|in:1,2',
            'telephone' => 'nullable|string|max:20',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        $data = $request->except('password_1');
        if ($request->filled('password_1')) {
            $data['password'] = Hash::make($request->password_1);
        }
        $user->update($data);

        return response('success');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->rank >= 9) {
            return response('No se puede eliminar', 500);
        }
        $user->delete();
        return response('success');
    }

    public function uploadPhoto(Request $request, $id)
    {
        $request->validate(['image' => 'required|string']);
        $user = User::findOrFail($id);

        $imageData = base64_decode($request->image);
        $filename = uniqid() . '.png';
        Storage::disk('public')->put('assets/images/profile_pictures/' . $filename, $imageData);

        if ($user->profile_pic && $user->profile_pic !== 'default.jpg') {
            Storage::disk('public')->delete('assets/images/profile_pictures/' . $user->profile_pic);
        }

        $user->update(['profile_pic' => $filename]);
        return response()->json(['success' => true]);
    }

    public function tmpUpload(Request $request)
    {
        $request->validate(['image' => 'required|image']);
        $filename = $request->file('image')->hashName();
        $request->file('image')->storeAs('public/assets/images/profile_pictures/tmp', $filename);
        return response()->json($filename);
    }
}
