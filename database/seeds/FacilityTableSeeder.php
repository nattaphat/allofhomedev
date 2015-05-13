<?php

use Illuminate\Database\Seeder;
use App\Models\Facility;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class FacilityTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $items =[

            [
                'id'  => 1,
                "fac_name"  => "ลิฟต์โดยสาร"
            ],
            [
                'id'  => 2,
                "fac_name"  => "ลิฟต์ขนส่ง"
            ],
            [
                'id'  => 3,
                "fac_name"  => "ที่จอดรถ"
            ],
            [
                'id'  => 4,
                "fac_name"  => "ทางเข้าไม้กระดก"
            ],
            [
                'id'  => 5,
                "fac_name"  => "คีย์การ์ด"
            ],
            [
                'id'  => 6,
                "fac_name"  => "กล้องวงจรปิด"
            ],
            [
                'id'  => 7,
                "fac_name"  => "รปภ."
            ],
            [
                'id'  => 8,
                "fac_name"  => "เครื่องซักผ้าหยอดเหรียญ"
            ],
            [
                'id'  => 9,
                "fac_name"  => "สระว่ายน้ำ"
            ],
            [
                'id'  => 10,
                "fac_name"  => "สวนสาธารณะ"
            ],
            [
                'id'  => 11,
                "fac_name"  => "สนามเด็กเล่น"
            ],
            [
                'id'  => 12,
                "fac_name"  => "ฟิตเนส"
            ],
            [
                'id'  => 13,
                "fac_name"  => "สตรีม"
            ],
            [
                'id'  => 14,
                "fac_name"  => "ซาวน่า"
            ],
            [
                'id'  => 15,
                "fac_name"  => "สปอร์ตคลับ"
            ],
            [
                'id'  => 16,
                "fac_name"  => "ร้านสะดวกซื้อ"
            ]
        ];

        DB::table('facility')->delete();
        foreach ($items as $item){
            Facility::create($item);
        }

    }
}
