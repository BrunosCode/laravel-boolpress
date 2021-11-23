<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index() {

        $tags = Tag::all();

        if ($tags) {
            return response()->json([
                "success" => true,
                "data" => $tags
            ]);
        } 
        
        return response()->json([
            "success" => false,
            "data" => "No data"
        ]);
    }

    public function show($slug) {

        $tag = Tag::where("slug", $slug)->with('posts')->first();

        if ($tag) {
            return response()->json([
                "success" => true,
                "data" => $tag
            ]);
        } 
        
        return response()->json([
            "success" => false,
            "data" => "No data"
        ]);
    }
}
