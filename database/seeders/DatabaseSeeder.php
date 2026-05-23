<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTags;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Category::factory(10)->create();
        // Brand::factory(10)->create();
        // Product::factory(10)->create();
        Tags::factory(100)->create();
        ProductTags::factory(100)->create();

        // $this->call(CategoriesSeeder::class);
    }
}
