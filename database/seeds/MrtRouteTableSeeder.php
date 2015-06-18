<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\Models\MrtRoute;

class MrtRouteTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $mrt_routes =[

            [
                "name"  => "สายสีน้ำเงิน",
                "memo" => ""
            ],
            [
                "name"  => "สายสีม่วง",
                "memo" => ""
            ],
            [
                "name"  => "สายสีส้ม",
                "memo" => ""
            ],
            [
                "name"  => "สายสีชมพู",
                "memo" => ""
            ],
            [
                "name"  => "สายสีเหลือง",
                "memo" => ""
            ],
            [
                "name"  => "สายสีน้ำตาล",
                "memo" => ""
            ]
        ];

        DB::table('mrt_route')->delete();
        foreach ($mrt_routes as $mrt){
            MrtRoute::create($mrt);
        }
    }
}
