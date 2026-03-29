<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['name' => 'Accessories','slug' => 'accessories'],
            ['name' => 'Automotive','slug' => 'automotive'],
            ['name' => 'Beauty','slug' => 'beauty'],
            ['name' => 'Fashion','slug' => 'fashion'],
            ['name' => 'Food','slug' => 'food'],
            ['name' => 'Garden','slug' => 'garden'],
            ['name' => 'Health','slug' => 'health'],
            ['name' => 'Home','slug' => 'home'],
            ['name' => 'Instruments','slug' => 'instruments'],
            ['name' => 'Jewelry','slug' => 'jewelry'],
            ['name' => 'Office','slug' => 'office'],
            ['name' => 'Pets','slug' => 'pets'],
            ['name' => 'Sports','slug' => 'sports'],
            ['name' => 'Tech','slug' => 'tech'],
            ['name' => 'Toys','slug' => 'toys'],
            ['name'=>'new data','slug'=>'new_slug'],
        ];

        // DB::table('categories')->insert($categories);

        foreach ($categories as $category)
            {
                Category::firstOrCreate($category);
            }
    }
}
