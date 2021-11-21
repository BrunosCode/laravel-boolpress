<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    protected $validationRules = [
        "title" => "string|required|max:50|unique:categories,title"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view("admin.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        $newCategory = new Category();
        $newCategory->fill($request->all());
       
        $newCategory->slug = $this->getSlug($request->title);

        $newCategory->save();

        return redirect()->route("admin.categories.index")->with('success',"You have created a new Category");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate($this->validationRules);
        
        if($category->title != $request->title) {
            $category->slug = $this->getSlug($request->title);
        }

        $category->fill($request->all());

        $category->save();

        return redirect()->route("admin.categories.index")->with('success',"The post n{$category->id} has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route("admin.categories.index")->with('success',"The post {$category->id} has been deleted");
    }

    /**
     * getSlug - return a unique slug
     *
     * @param  string $title
     * @return string
     */
    private function getSlug($title)
    {
        $slug = Str::of($title)->slug('-');

        $categoryExist = Category::where("slug", $slug)->first();

        $count = 2;
        
        while($categoryExist) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $categoryExist = Category::where("slug", $slug)->first();
            $count++;
        }

        return $slug;
    }
}
