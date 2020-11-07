<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

const CATEGORIES_COUNT = 10;
const SUBCATEGORIES_COUNT = 5;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $categories = Category::factory(CATEGORIES_COUNT)->create();
        $categories->each(function($category) {
            $subcategories = $category->subcategories()->saveMany(Category::factory(SUBCATEGORIES_COUNT)->create());
            $subcategories->each(function($subcategory) {
                $subcategory->subcategories()->saveMany(Category::factory(SUBCATEGORIES_COUNT)->make());
            });
        });
    }
}
