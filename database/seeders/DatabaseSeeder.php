<?php

namespace Database\Seeders;


use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Verification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            AttributeValueSeeder::class,
            LocationSeeder::class
        ]);

        Product::factory()->count(500)->create();

        for ($i = 0; $i < 50; $i++) {
            $verification = Verification::factory()->create();

            if ($verification->status) {
                Customer::factory()
                    ->has(CustomerAddress::factory()->count(rand(1, 2)))
                    ->create([
                        'username' => $verification->phone,
                        'password' => bcrypt($verification->code),
                        'created_at' => $verification->created_at,
                    ]);
            }
        }

        for ($i = 0; $i < 50; $i++) {
            OrderProduct::factory()
                ->count(rand(1, 5))
                ->for(Order::factory())
                ->create();
        }
    }
}
