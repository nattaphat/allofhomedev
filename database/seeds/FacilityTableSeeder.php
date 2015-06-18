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
                "fac_name"  => "ลิฟต์โดยสาร"
            ],
            [
                "fac_name"  => "ลิฟต์ขนส่ง"
            ],
            [
                "fac_name"  => "ที่จอดรถ"
            ],
            [
                "fac_name"  => "ทางเข้าไม้กระดก"
            ],
            [
                "fac_name"  => "คีย์การ์ด"
            ],
            [
                "fac_name"  => "กล้องวงจรปิด"
            ],
            [
                "fac_name"  => "รปภ."
            ],
            [
                "fac_name"  => "เครื่องซักผ้าหยอดเหรียญ"
            ],
            [
                "fac_name"  => "สระว่ายน้ำ"
            ],
            [
                "fac_name"  => "สวนสาธารณะ"
            ],
            [
                "fac_name"  => "สนามเด็กเล่น"
            ],
            [
                "fac_name"  => "ฟิตเนส"
            ],
            [
                "fac_name"  => "สตรีม"
            ],
            [
                "fac_name"  => "ซาวน่า"
            ],
            [
                "fac_name"  => "สปอร์ตคลับ"
            ],
            [
                "fac_name"  => "ร้านสะดวกซื้อ"
            ]
        ];

        DB::table('facility')->delete();
        foreach ($items as $item){
            Facility::create($item);
        }

    }
}
