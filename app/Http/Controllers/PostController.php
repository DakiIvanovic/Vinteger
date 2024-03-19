<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadPost;

class PostController extends Controller
{
    public function create()
    {
        return view('partials.add_post_form');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $imagePath = $request->image->store('uploads', 'public');

        $post = new UploadPost();
        $post->title = $validatedData['title'];
        $post->image = $imagePath;
        $post->description = $validatedData['description'];
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('logged_in')->with('success', 'Post je uspešno objavljen!');
    }

    public function destroy($id)
    {
        $post = UploadPost::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully');
    }

}
