<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $objs = [
            'New Balance',
            'Adidas',
            'Nike',
            'Puma',
            'Reebok',
            'Kinetix',
            'Lacoste',
            'Zara',
            'Mavi',
            'Jack & Jones',
            'Columbia',
            'Pierre Cardin',
            'U.S. Polo Assn.',
            'LC Waikiki',
            'Defacto',
            'Koton',
            'Kemal Tanca',
            'Converse',
        ];

        foreach ($objs as $obj) {
            Brand::create([
                'name' => $obj,
            ]);
        }
    }
}
