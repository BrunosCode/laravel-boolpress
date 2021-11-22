<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        return response()->json([
            "success" => true,
            "data" => Post::all()
        ]);
    }

    public function show(Post $post) {

        if ($post) {
            return response()->json([
                "success" => true,
                "data" => $post
            ]);
        } else {
            abort("404");
        }

    }
}
