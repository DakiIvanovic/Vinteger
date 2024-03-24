<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadPost; 

class UserController extends Controller
{
    public function userLogged()
    {
        $posts = UploadPost::all(); 

        foreach ($posts as $post) {
            $post->touch();
        }

        return view("partials.logged_in", compact('posts'));
    }

}
