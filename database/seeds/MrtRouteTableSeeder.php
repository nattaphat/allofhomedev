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
                'id'  => 1,
                "name"  => "สายสีน้ำเงิน",
                "memo" => ""
            ],
            [
                'id'  => 2,
                "name"  => "สายสีม่วง",
                "memo" => ""
            ],
            [
                'id'  => 3,
                "name"  => "สายสีส้ม",
                "memo" => ""
            ],
            [
                'id'  => 4,
                "name"  => "สายสีชมพู",
                "memo" => ""
            ],
            [
                'id'  => 5,
                "name"  => "สายสีเหลือง",
                "memo" => ""
            ],
            [
                'id'  => 6,
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
