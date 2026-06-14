<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\ContactReply;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index');
    }

    public function reply(Request $request, $id)
    {
        $request->validate(['message' => 'required|string']);
        $contact = ContactMessage::findOrFail($id);
        ContactReply::create(['message' => $id, 'content' => $request->message]);
        $contact->update(['estatus' => 3]);
        return response('success');
    }

    public function destroy($id)
    {
        ContactMessage::findOrFail($id)->update(['estatus' => 4]);
        return response('success');
    }
}
