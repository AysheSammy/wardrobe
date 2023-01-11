<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $location = Location::inRandomOrder()->first();
        $customer = fake()->boolean(80) ? Customer::inRandomOrder()->with('customerAddresses')->first() : null;
        return [
            'location_id' => $location->id,
            'code' => str()->random(10),
            'customer_id' => isset($customer) ? $customer->id : null,
            'customer_name' => isset($customer) ? $customer->name : fake()->name(),
            'customer_phone' => isset($customer) ? $customer->username : fake()->numberBetween(60000000, 65999999),
            'customer_address' => isset($customer) ? $customer->customerAddresses->random()->address : fake()->address(),
            'customer_note' => fake()->boolean(20) ? fake()->sentence(rand(2, 10)) : null,
            'delivery_fee' => $location->delivery_fee,
            'status' => rand(1, 4),
            'created_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
