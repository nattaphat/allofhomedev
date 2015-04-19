<?php

use Illuminate\Database\Seeder;
use App\Models\AirportRailLink;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class AplTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $apls =[

            [
                'id'  => 1,
                "apl_name"  => "ลาดกระบัง",
                "apl_code"  => "02 LKB"
            ],
            [
                'id'  => 2,
                "apl_name"  => "บ้านทับช้าง",
                "apl_code"  => "03 BTC"
            ],
            [
                'id'  => 3,
                "apl_name"  => "หัวหมาก",
                "apl_code"  => "04 HUM"
            ],
            [
                'id'  => 4,
                "apl_name"  => "รามคำแหง",
                "apl_code"  => "05 RAM "
            ],
            [
                'id'  => 5,
                "apl_name"  => "มักกะสัน",
                "apl_code"  => "06 MAS"
            ],
            [
                'id'  => 5,
                "apl_name"  => "ราชปรารภ",
                "apl_code"  => "07 RPR"
            ],
            [
                'id'  => 5,
                "apl_name"  => "พญาไท",
                "apl_code"  => "08 PTH"
            ]
        ];

        DB::table('airport_link')->delete();
        foreach ($apls as $apl){
            AirportRailLink::create($apl);
        }
    }
}
