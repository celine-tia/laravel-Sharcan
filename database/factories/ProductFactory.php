<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $category = DB::table('categories')->select('id')->inRandomOrder()->limit(1)->value('id');

        return [

            "name" => $this->faker->name,
            "image" =>$this->faker->imageUrl($width = 640, $height = 480),
            "price" => rand(0, 999),
            "description" => $this->faker->realText(150),
            "stock" => rand(0, 999),
            "category_id" => $category,

        ];
    }
}
