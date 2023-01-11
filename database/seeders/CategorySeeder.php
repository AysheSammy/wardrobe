<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $objs = [
            ['Egin-eşik', 'Clothes', [
                ['Jempirler', 'Jumpers', 'Jempir', 'Jumper'],
                ['Köýnekler', 'Dresses', 'Köýnek', 'Dress'],
                ['Futbolkalar', 'T-Shirts', 'Futbolka', 'T-Shirt'],
                ['Balaklar', 'Trousers', 'Balak', 'Trousers'],
                ['Paltolar', 'Coats', 'Palto', 'Coat'],
                ['Joraplar', 'Socks', 'Jorap', 'Socks'],
            ]],
            ['Aýakgap', 'Shoes', [
                ['Sport Aýakgaplar', 'Sneakers', 'Sport Aýakgap', 'Sneakers'],
                ['Ädikler', 'Boots', 'Ädik', 'Boots'],
                ['Şybpyklar', 'Slippers', 'Şybpyk', 'Slippers'],
            ]],
            ['Aksesuar', 'Accessory', [
                ['Sagatlar', 'Watchs', 'Sagat', 'Watch'],
                ['Äýnekler', 'Glasses', 'Äýnek', 'Glasses'],
                ['Gapjyklar', 'Purses', 'Gapjyk', 'Purse'],
                ['Kemerler', 'Belts', 'Kemer', 'Belt'],
            ]],
        ];

        for ($i = 0; $i < count($objs); $i++) {
            $parent = Category::create([
                'name_tm' => $objs[$i][0],
                'name_en' => $objs[$i][1],
                'sort_order' => $i + 1,
            ]);

            for ($j = 0; $j < count($objs[$i][2]); $j++) {
                Category::create([
                    'parent_id' => $parent->id,
                    'name_tm' => $objs[$i][2][$j][0],
                    'name_en' => $objs[$i][2][$j][1],
                    'product_name_tm' => $objs[$i][2][$j][2],
                    'product_name_en' => $objs[$i][2][$j][3],
                    'sort_order' => $j + 1,
                ]);
            }
        }
    }
}
