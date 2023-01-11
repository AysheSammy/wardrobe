<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $objs = [
          ['Aşgabat', 'Ashgabat', 15],
          ['Ahal', 'Ahal', 20],
          ['Balkan', 'Balkan', 30],
          ['Daşoguz', 'Dashoguz', 30],
          ['Lebap', 'Lebap', 40],
          ['Mary', 'Mary', 30],
        ];

        foreach ($objs as $obj) {
            Location::create([
                'name_tm' => $obj[0],
                'name_en' => $obj[1],
                'delivery_fee' => $obj[2]
            ]);
        }
    }
}
