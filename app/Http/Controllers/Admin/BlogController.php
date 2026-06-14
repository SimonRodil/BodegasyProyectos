<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index');
    }

    public function data()
    {
        return response()->json(BlogPost::all());
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255', 'content' => 'nullable|string', 'to_publish' => 'nullable|date', 'image' => 'nullable|image']);

        $data = $request->only('title', 'content', 'to_publish');
        $data['asesor'] = auth()->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->hashName();
            $request->file('image')->storeAs('public/assets/images/blog', $data['image']);
        }

        BlogPost::create($data);
        return $request->ajax() ? response()->json(['message' => 'Consulta exitosa!']) : redirect()->route('admin.blog.index');
    }

    public function show($id)
    {
        return response()->json(BlogPost::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $request->validate(['title' => 'required|string|max:255', 'content' => 'nullable|string', 'to_publish' => 'nullable|date', 'image' => 'nullable|image']);

        $data = $request->only('title', 'content', 'to_publish');
        if ($request->hasFile('image')) {
            if ($post->image) Storage::disk('public')->delete('assets/images/blog/' . $post->image);
            $data['image'] = $request->file('image')->hashName();
            $request->file('image')->storeAs('public/assets/images/blog', $data['image']);
        }

        $post->update($data);
        return $request->ajax() ? response()->json(['message' => 'Consulta exitosa!']) : redirect()->route('admin.blog.index');
    }

    public function destroy($id)
    {
        BlogPost::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
