<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::all();

        if (Category::all()){
            return response()->json([
                "success" => true,
                "data" => $categories
            ]);
        }

        return response()->json([
            "success" => false,
            "data" => "No data"
        ]);
    }

    public function show($slug) {

        $category = Category::where("slug", $slug)->with('posts')->first();

        if ($category) {
            return response()->json([
                "success" => true,
                "data" => $category
            ]);
        } 
        
        return response()->json([
            "success" => false,
            "data" => "No data"
        ]);
    }
}
