<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["html", "css", "js", "php", "laravel", "vuejs", "sql", "nosql", "git", "nuxt", "node"];

        foreach($categories as $category) {
            $newCategory = new Category();
            $newCategory->title = $category;
            $newCategory->slug = Str::of($category)->slug('-');
            $newCategory->save();
        }
    }
}
