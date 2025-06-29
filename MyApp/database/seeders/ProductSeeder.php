<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $categories = Category::all();

        foreach ($categories as $category) {
            Product::create([
                'name' => 'Sample ' . $category->name,
                'description' => 'This is a sample product in ' . $category->name,
                'price' => rand(10, 100),
                'stock_quantity' => rand(5, 20),
                'category_id' => $category->id
            ]);
            }
    }
}
