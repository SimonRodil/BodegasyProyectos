<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('sert_cpanel')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)
            ->orWhere('email', $request->username)
            ->first();

        if (!$user) {
            return back()->withErrors(['error' => 'Usuario no encontrado']);
        }

        if (!Hash::check($request->password, $user->password)) {
            $legacyHash = strrev(crypt(md5(str_repeat($request->password, 5)), "sert_cpanel"));
            if ($legacyHash !== $user->password) {
                return back()->withErrors(['error' => 'Contraseña incorrecta']);
            }
            $user->password = Hash::make($request->password);
            $user->save();
        }

        session(['sert_cpanel' => [
            'id' => $user->id,
            'username' => $user->username,
            'name' => $user->name,
            'email' => $user->email,
            'rank' => $user->rank,
        ]]);

        if ($request->has('remember')) {
            cookie()->queue('sert_session', $user->username, 60 * 24 * 365);
        }

        if ($request->wantsJson()) {
            return response()->json(['message' => 'success']);
        }

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        session()->forget('sert_cpanel');
        session()->flush();
        return redirect()->route('admin.login');
    }
}
