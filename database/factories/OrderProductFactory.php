<?php

namespace Database\Factories;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        $quantity = rand(1, 3);
        return [
            'product_id' => $product->id,
            'price' => $product->price,
            'quantity' => $quantity,
            'discount_percent' => $product->discount_percent,
            'total_price' => round($product->getPrice() * $quantity),
            'created_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
