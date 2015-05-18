<?php

use Illuminate\Database\Seeder;
use App\Models\Promotion;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PromotionTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $items =[

            [
                'id'  => 1,
                "promotion_name"  => "ส่วนลดเงินสด"
            ],
            [
                'id'  => 2,
                "promotion_name"  => "แถมเฟอร์นิเจอร์"
            ],
            [
                'id'  => 3,
                "promotion_name"  => "ฟรีค่าใช้จ่ายวันโอน"
            ],
            [
                'id'  => 4,
                "promotion_name"  => "ฟรีแอร์ทั้งหลัง"
            ],
            [
                'id'  => 5,
                "promotion_name"  => "ฟรีผ้าม่านทั้งหลัง"
            ],
            [
                'id'  => 6,
                "promotion_name"  => "ฟรีค่าส่วนกลาง"
            ],
            [
                'id'  => 7,
                "promotion_name"  => "ดอกเบี้ยถูกกว่าปกติ"
            ]
        ];

        DB::table('promotion')->delete();
        foreach ($items as $item){
            Promotion::create($item);
        }
    }
}
