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

            ["area_name" => "งามวงศ์วาน – แจ้งวัฒนะ"],
            ["area_name" => "จรัญสนิทวงศ์"],
            ["area_name" => "ชิดลม – ราชดำริ"],
            ["area_name" => "ดินแดง – ราชปรารภ"],
            ["area_name" => "ตลาดพลู – บางหว้า"],
            ["area_name" => "ทองหล่อ – พระโขนง"],
            ["area_name" => "ธนบุรี – วงเวียนใหญ่"],
            ["area_name" => "บางซื่อ – ประชาชื่น"],
            ["area_name" => "บางนา – ศรีนครินทร์"],
            ["area_name" => "บางบัวทอง – กาญจนาภิเษก"],
            ["area_name" => "พญาไท – สามย่าน"],
            ["area_name" => "พระราม 2 – เอกชัย"],
            ["area_name" => "พระราม 4 – ลุมพินี"],
            ["area_name" => "ภาคกลาง"],
            ["area_name" => "ภาคตะวันออก"],
            ["area_name" => "ภาคตะวันออกเฉียงเหนือ"],
            ["area_name" => "ภาคเหนือ"],
            ["area_name" => "ภาคใต้และตะวันตก"],
            ["area_name" => "รังสิต – ปทุมธานี"],
            ["area_name" => "รัชดาภิเษก – ห้วยขวาง"],
            ["area_name" => "รัชโยธิน – สะพานใหม่"],
            ["area_name" => "รัตนาธิเบศร์ – บางใหญ่"],
            ["area_name" => "ราชพฤกษ์"],
            ["area_name" => "รามคำแหง – บางกะปิ"],
            ["area_name" => "รามอินทรา – สุวินทวงศ์"],
            ["area_name" => "ลาดกระบัง – สุวรรณภูมิ"],
            ["area_name" => "ลาดพร้าว"],
            ["area_name" => "วัชรพล – สายไหม"],
            ["area_name" => "วิภาวดี – ดอนเมือง"],
            ["area_name" => "สมุทรสาคร"],
            ["area_name" => "สำโรง – เทพารักษ์"],
            ["area_name" => "สีลม – สาทร"],
            ["area_name" => "สุขสวัสดิ์ – ราษฎร์บูรณะ"],
            ["area_name" => "อารีย์ – หมอชิต"],
            ["area_name" => "อุดมสุข – แบริ่ง"],
            ["area_name" => "อโศก – พร้อมพงษ์"],
            ["area_name" => "อ่อนนุช – ปุณณวิถี"],
            ["area_name" => "เกษตร – นวมินทร์"],
            ["area_name" => "เจริญกรุง – พระราม 3"],
            ["area_name" => "เพชรบุรี – พระราม 9"]

        ];

        DB::table('area')->delete();
        foreach ($items as $item){
            Area::create($item);
        }
    }
}
