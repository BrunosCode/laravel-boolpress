<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $validationRules = [
        "title" => "string|required|max:100",
        "content" => "string|required",
        "category_id" => "nullable|exists:categories,id",
        'tags' => 'exists:tags,id',
        "image" => "nullable|image|max:200"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $posts = $user["posts"];

        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("admin.posts.create", compact("categories", "tags"));
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

        $form_data = $request->all();

        // Store image
        if (array_key_exists("image", $form_data)) {

            $cover_path = Storage::put("post_covers", $form_data["image"]);

            $form_data["post_cover"] = $cover_path;
        }

        $newPost = new Post();
        $newPost->fill($form_data);
       
        $newPost->slug = $this->getSlug($request->title);

        $newPost->user_id = Auth::id();

        $newPost->save();

        $newPost->tags()->attach($request["tags"]);

        return redirect()->route("admin.posts.index")->with("success","You have created a new Post");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->user_id != Auth::id()) {
            abort("403");
        }

        $category = Category::find($post["category_id"]);
        $tags = Tag::all();

        return view("admin.posts.show", compact("post", "category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->user_id != Auth::id()) {
            abort("403");
        }

        $categories = Category::all();
        $tags = Tag::all();

        return view("admin.posts.edit", compact("post", "categories", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id != Auth::id()) {
            abort("403");
        }

        $request->validate($this->validationRules);
        
        if($post->title != $request->title) {
            $post->slug = $this->getSlug($request->title);
        }

        $post->fill($request->all());

        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route("admin.posts.index")->with('success',"The post n{$post->id} has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->user_id != Auth::id()) {
            abort("403");
        }
        
        $post->delete();

        return redirect()->route("admin.posts.index")->with('success',"The post {$post->id} has been deleted");
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

        $postExist = Post::where("slug", $slug)->first();

        $count = 2;
        
        while($postExist) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $postExist = Post::where("slug", $slug)->first();
            $count++;
        }

        return $slug;
    }
}
