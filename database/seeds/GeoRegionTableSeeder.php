<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\geoRegion;
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
                'id'  => 1,
                "name"  => "ภาคกลาง"
            ],
            [
                'id'  => 2,
                "name"  => "ภาคตะวันออก"
            ],
            [
                'id'  => 3,
                "name"  => "ภาคตะวันออกเฉียงเหนือ"
            ],
            [
                'id'  => 4,
                "name"  => "ภาคเหนือ"
            ],
            [
                'id'  => 5,
                "name"  => "ภาคใต้"
            ]
        ];

        DB::table('geo_region')->delete();
        foreach ($regions as $region){
            geoRegion::create($region);
        }
    }
}
