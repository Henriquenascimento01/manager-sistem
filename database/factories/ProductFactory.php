<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'category' => $this->getCategory(),
            'max_quantity' => $this->getMaxQuantity(),
            'unity_price' => $this->getUnityPrice(),
            'status' => $this->getStatus(),
        ];
    }

    private function getCategory()
    {
        $categories = ['paes', 'lanches', 'alimentos'];
        shuffle($categories);
        return $categories[0];
    }
}
