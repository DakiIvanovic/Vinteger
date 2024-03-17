<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadPost;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $posts = UploadPost::where('user_id', $user->id)->get();
        return view('review', compact('posts'));
    }
}
