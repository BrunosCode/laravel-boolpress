<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {

        $posts = Post::all();

        if ($posts) {
            return response()->json([
                "success" => true,
                "data" => $posts
            ]);
        } 
        
        return response()->json([
            "success" => false,
            "data" => "No data"
        ]);
    }

    public function show($slug) {

        $post = Post::where("slug", $slug)->with("category")->with('tags')->first();
    
            if ($post) {
                return response()->json([
                    "success" => true,
                    "data" => $post
                ]);
            } 
            
            return response()->json([
                "success" => false,
                "data" => "No data"
            ]);
    }
}
