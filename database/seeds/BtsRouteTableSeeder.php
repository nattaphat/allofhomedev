<?php

use Illuminate\Database\Seeder;
use App\Models\btsRoute;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class BtsRouteTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $bts_routes =[

            [
                'id'  => 1,
                "name"  => "สายสีเขียว",
                "memo" => "สายสุขุมวิท"
            ],
            [
                'id'  => 2,
                "name"  => "สายสีส้ม",
                "memo" => "สายสุขุมวิท"
            ],
            [
                'id'  => 3,
                "name"  => "สายสีแดง",
                "memo" => "สายสุขุมวิท,สายสีลม"
            ],
            [
                'id'  => 4,
                "name"  => "สายสีม่วง",
                "memo" => "สายสีลม"
            ],
            [
                'id'  => 5,
                "name"  => "สายสีน้ำเงิน",
                "memo" => ""
            ]
        ];

        DB::table('bts_route')->delete();
        foreach ($bts_routes as $bts){
            btsRoute::create($bts);
        }
    }
}
