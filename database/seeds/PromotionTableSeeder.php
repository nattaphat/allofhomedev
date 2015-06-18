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
                "promotion_name"  => "ส่วนลดเงินสด"
            ],
            [
                "promotion_name"  => "แถมเฟอร์นิเจอร์"
            ],
            [
                "promotion_name"  => "ฟรีค่าใช้จ่ายวันโอน"
            ],
            [
                "promotion_name"  => "ฟรีแอร์ทั้งหลัง"
            ],
            [
                "promotion_name"  => "ฟรีผ้าม่านทั้งหลัง"
            ],
            [
                "promotion_name"  => "ฟรีค่าส่วนกลาง"
            ],
            [
                "promotion_name"  => "ดอกเบี้ยถูกกว่าปกติ"
            ]
        ];

        DB::table('promotion')->delete();
        foreach ($items as $item){
            Promotion::create($item);
        }
    }
}
