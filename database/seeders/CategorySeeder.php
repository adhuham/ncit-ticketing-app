<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['Access', 'Hardware', 'Software'] as $categoryName) {
            $category = new Category();
            $category->name = $categoryName;
            $category->save();
        }   
    }
}
