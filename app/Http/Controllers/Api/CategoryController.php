<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        return response()->json([
            "success" => true,
            "data" => Category::all()
        ]);
    }

    public function show(Category $category) {

        if ($category) {
            return response()->json([
                "success" => true,
                "data" => $category
            ]);
        } else {
            abort("404");
        }
    }
}
