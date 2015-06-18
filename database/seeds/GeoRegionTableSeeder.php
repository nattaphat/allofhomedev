<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\GeoRegion;
// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class GeoRegionTableSeeder extends Seeder
{
    public function run()
    {

//        $faker = Faker::create();
//
//        foreach(range(1,25) as $index)
//        {
//            User::create([
//                'name' => $faker->word . $index,
//                'email' => $faker->email,
//                'password' => 'secret'
//            ]);
//        }

        $regions =[

            [
                "name"  => "ภาคกลาง"
            ],
            [
                "name"  => "ภาคตะวันออก"
            ],
            [
                "name"  => "ภาคตะวันออกเฉียงเหนือ"
            ],
            [
                "name"  => "ภาคเหนือ"
            ],
            [
                "name"  => "ภาคใต้"
            ]
        ];

        DB::table('geo_region')->delete();
        foreach ($regions as $region){
            GeoRegion::create($region);
        }
    }
}
