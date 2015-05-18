<?php

use Illuminate\Database\Seeder;
use App\Models\Area;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class AreaTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $items =[

            ['id' => 1, "area_name" => "งามวงศ์วาน – แจ้งวัฒนะ"],
            ['id' => 2, "area_name" => "จรัญสนิทวงศ์"],
            ['id' => 3, "area_name" => "ชิดลม – ราชดำริ"],
            ['id' => 4, "area_name" => "ดินแดง – ราชปรารภ"],
            ['id' => 5, "area_name" => "ตลาดพลู – บางหว้า"],
            ['id' => 6, "area_name" => "ทองหล่อ – พระโขนง"],
            ['id' => 7, "area_name" => "ธนบุรี – วงเวียนใหญ่"],
            ['id' => 8, "area_name" => "บางซื่อ – ประชาชื่น"],
            ['id' => 9, "area_name" => "บางนา – ศรีนครินทร์"],
            ['id' => 10, "area_name" => "บางบัวทอง – กาญจนาภิเษก"],
            ['id' => 11, "area_name" => "พญาไท – สามย่าน"],
            ['id' => 12, "area_name" => "พระราม 2 – เอกชัย"],
            ['id' => 13, "area_name" => "พระราม 4 – ลุมพินี"],
            ['id' => 14, "area_name" => "ภาคกลาง"],
            ['id' => 15, "area_name" => "ภาคตะวันออก"],
            ['id' => 16, "area_name" => "ภาคตะวันออกเฉียงเหนือ"],
            ['id' => 17, "area_name" => "ภาคเหนือ"],
            ['id' => 18, "area_name" => "ภาคใต้และตะวันตก"],
            ['id' => 19, "area_name" => "รังสิต – ปทุมธานี"],
            ['id' => 20, "area_name" => "รัชดาภิเษก – ห้วยขวาง"],
            ['id' => 21, "area_name" => "รัชโยธิน – สะพานใหม่"],
            ['id' => 22, "area_name" => "รัตนาธิเบศร์ – บางใหญ่"],
            ['id' => 23, "area_name" => "ราชพฤกษ์"],
            ['id' => 24, "area_name" => "รามคำแหง – บางกะปิ"],
            ['id' => 25, "area_name" => "รามอินทรา – สุวินทวงศ์"],
            ['id' => 26, "area_name" => "ลาดกระบัง – สุวรรณภูมิ"],
            ['id' => 27, "area_name" => "ลาดพร้าว"],
            ['id' => 28, "area_name" => "วัชรพล – สายไหม"],
            ['id' => 29, "area_name" => "วิภาวดี – ดอนเมือง"],
            ['id' => 30, "area_name" => "สมุทรสาคร"],
            ['id' => 31, "area_name" => "สำโรง – เทพารักษ์"],
            ['id' => 32, "area_name" => "สีลม – สาทร"],
            ['id' => 33, "area_name" => "สุขสวัสดิ์ – ราษฎร์บูรณะ"],
            ['id' => 34, "area_name" => "อารีย์ – หมอชิต"],
            ['id' => 35, "area_name" => "อุดมสุข – แบริ่ง"],
            ['id' => 36, "area_name" => "อโศก – พร้อมพงษ์"],
            ['id' => 37, "area_name" => "อ่อนนุช – ปุณณวิถี"],
            ['id' => 38, "area_name" => "เกษตร – นวมินทร์"],
            ['id' => 39, "area_name" => "เจริญกรุง – พระราม 3"],
            ['id' => 40, "area_name" => "เพชรบุรี – พระราม 9"]

        ];

        DB::table('area')->delete();
        foreach ($items as $item){
            Area::create($item);
        }
    }
}
