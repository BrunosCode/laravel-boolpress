<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index() {
        return response()->json([
            "success" => true,
            "data" => Tag::all()
        ]);
    }

    public function show(Tag $tag) {

        if ($tag) {
            return response()->json([
                "success" => true,
                "data" => $tag
            ]);
        } else {
            abort("404");
        }
    }
}
