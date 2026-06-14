<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $msg = $request->message;
        if ($request->telephone) {
            $msg .= "\nTeléfono: " . $request->telephone;
        }
        if ($request->subject) {
            $msg .= "\nAsunto: " . $request->subject;
        }

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $msg,
        ]);

        return redirect()->route('contact.show')->with('success', 'Mensaje enviado correctamente.');
    }
}
