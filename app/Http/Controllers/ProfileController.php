<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadPost;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $posts = UploadPost::where('user_id', $user->id)->get();
        return view('partials.review', compact('user', 'posts'));
    }
}
