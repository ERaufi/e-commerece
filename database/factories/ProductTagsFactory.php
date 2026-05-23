<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductTags;
use App\Models\Tags;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductTags>
 */
class ProductTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'product_id' => Product::inRandomOrder()->value('id'),
            'tag_id' => Tags::inRandomOrder()->value('id'),
        ];
    }
}
