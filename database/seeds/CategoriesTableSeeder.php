<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Berita', 'Olahraga', 'Wisata']);

        $categories->each(function($category){
            \App\Category::create([
                'name' => $category,
                'slug' => \Str::slug($category),
            ]);
        });
    }
}
