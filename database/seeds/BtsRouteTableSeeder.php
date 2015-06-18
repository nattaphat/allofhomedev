<?php

use Illuminate\Database\Seeder;
use App\Models\BtsRoute;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class BtsRouteTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $bts_routes =[

            [
                "name"  => "สายสีเขียว",
                "memo" => "สายสุขุมวิท"
            ],
            [
                "name"  => "สายสีส้ม",
                "memo" => "สายสุขุมวิท"
            ],
            [
                "name"  => "สายสีแดง",
                "memo" => "สายสุขุมวิท,สายสีลม"
            ],
            [
                "name"  => "สายสีม่วง",
                "memo" => "สายสีลม"
            ],
            [
                "name"  => "สายสีน้ำเงิน",
                "memo" => ""
            ]
        ];

        DB::table('bts_route')->delete();
        foreach ($bts_routes as $bts){
            BtsRoute::create($bts);
        }
    }
}
