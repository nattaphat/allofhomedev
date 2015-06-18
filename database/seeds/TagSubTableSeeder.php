<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// composer require laracasts/testdummy
// use Laracasts\TestDummy\Factory as TestDummy;

class TagSubTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $items =[

            ["tag_main_id" => 1, "tag_sub_name" => "บ้านเดี่ยว"],
            ["tag_main_id" => 1, "tag_sub_name" => "บ้านแฝด"],
            ["tag_main_id" => 1, "tag_sub_name" => "ทาวน์โฮม"],
            ["tag_main_id" => 1, "tag_sub_name" => "คอนโด"],
            ["tag_main_id" => 1, "tag_sub_name" => "อาคารพานิช"],
            ["tag_main_id" => 1, "tag_sub_name" => "หอพัก"],
            ["tag_main_id" => 1, "tag_sub_name" => "อพาร์ทเม้นท์"],
            ["tag_main_id" => 1, "tag_sub_name" => "แมนชั่น"],


            ["tag_main_id" => 2, "tag_sub_name" => "ต้องการซื้อ"],
            ["tag_main_id" => 2, "tag_sub_name" => "ต้องการขาย"],
            ["tag_main_id" => 2, "tag_sub_name" => "ต้องการเช่า"],
            ["tag_main_id" => 2, "tag_sub_name" => "ต้องการให้เช่า"],


            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "ลิฟต์โดยสาร"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "ลิฟต์ขนส่ง"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "ที่จอดรถ"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "ทางเข้าไม้กระดก"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "คีย์การ์ด"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "กล้องวงจรปิด"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "รปภ."
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "เครื่องซักผ้าหยอดเหรียญ"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "สระว่ายน้ำ"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "สวนสาธารณะ"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "สนามเด็กเล่น"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "ฟิตเนส"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "สตรีม"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "ซาวน่า"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "สปอร์ตคลับ"
            ],
            [
                "tag_main_id" => 3,
                "tag_sub_name"  => "ร้านสะดวกซื้อ"
            ],


            ["tag_main_id" => 4, "tag_sub_name" => "งามวงศ์วาน"],
            ["tag_main_id" => 4, "tag_sub_name" => "แคราย"],
            ["tag_main_id" => 4, "tag_sub_name" => "แจ้งวัฒนะ"],
            ["tag_main_id" => 4, "tag_sub_name" => "ปิ่นเกล้า – บรมราชชนนี"],
            ["tag_main_id" => 4, "tag_sub_name" => "เพชรเกษม – บางแค"],
            ["tag_main_id" => 4, "tag_sub_name" => "ชิดลม – หลังสวน"],
            ["tag_main_id" => 4, "tag_sub_name" => "ราชดำริ"],
            ["tag_main_id" => 4, "tag_sub_name" => "เพลินจิต – วิทยุ"],
            ["tag_main_id" => 4, "tag_sub_name" => "จตุรทิศ"],
            ["tag_main_id" => 4, "tag_sub_name" => "ดินแดง"],
            ["tag_main_id" => 4, "tag_sub_name" => "ราชปรารภ"],
            ["tag_main_id" => 4, "tag_sub_name" => "ตลาดพลู – โพธิ์นิมิตร"],
            ["tag_main_id" => 4, "tag_sub_name" => "บางหว้า"],
            ["tag_main_id" => 4, "tag_sub_name" => "วุฒากาศ"],
            ["tag_main_id" => 4, "tag_sub_name" => "ทองหล่อ"],
            ["tag_main_id" => 4, "tag_sub_name" => "พระโขนง"],
            ["tag_main_id" => 4, "tag_sub_name" => "เอกมัย"],
            ["tag_main_id" => 4, "tag_sub_name" => "กรุงธนบุรี"],
            ["tag_main_id" => 4, "tag_sub_name" => "วงเวียนใหญ่"],
            ["tag_main_id" => 4, "tag_sub_name" => "กรุงเทพฯ-นนท์"],
            ["tag_main_id" => 4, "tag_sub_name" => "ติวานนท์"],
            ["tag_main_id" => 4, "tag_sub_name" => "บางซื่อ"],
            ["tag_main_id" => 4, "tag_sub_name" => "ประชาชื่น"],
            ["tag_main_id" => 4, "tag_sub_name" => "วงศ์สว่าง"],
            ["tag_main_id" => 4, "tag_sub_name" => "บางนา-ตราด"],
            ["tag_main_id" => 4, "tag_sub_name" => "ศรีนครินทร์"],
            ["tag_main_id" => 4, "tag_sub_name" => "บางกรวย-ไทรน้อย"],
            ["tag_main_id" => 4, "tag_sub_name" => "บางบัวทอง"],
            ["tag_main_id" => 4, "tag_sub_name" => "วงแหวนตะวันตก (กาญจนาภิเษก)"],
            ["tag_main_id" => 4, "tag_sub_name" => "พญาไท"],
            ["tag_main_id" => 4, "tag_sub_name" => "ราชเทวี"],
            ["tag_main_id" => 4, "tag_sub_name" => "สยาม"],
            ["tag_main_id" => 4, "tag_sub_name" => "สามย่าน"],
            ["tag_main_id" => 4, "tag_sub_name" => "พระราม 2"],
            ["tag_main_id" => 4, "tag_sub_name" => "เทียนทะเล"],
            ["tag_main_id" => 4, "tag_sub_name" => "เอกชัย – บางบอน"],
            ["tag_main_id" => 4, "tag_sub_name" => "ลุมพินี – คลองเตย"],
            ["tag_main_id" => 4, "tag_sub_name" => "นครปฐม"],
            ["tag_main_id" => 4, "tag_sub_name" => "พิษณุโลก"],
            ["tag_main_id" => 4, "tag_sub_name" => "สมุทรปราการ"],
            ["tag_main_id" => 4, "tag_sub_name" => "ชลบุรี"],
            ["tag_main_id" => 4, "tag_sub_name" => "บางแสน"],
            ["tag_main_id" => 4, "tag_sub_name" => "พัทยา"],
            ["tag_main_id" => 4, "tag_sub_name" => "ระยอง"],
            ["tag_main_id" => 4, "tag_sub_name" => "ศรีราชา"],
            ["tag_main_id" => 4, "tag_sub_name" => "ขอนแก่น"],
            ["tag_main_id" => 4, "tag_sub_name" => "นครราชสีมา"],
            ["tag_main_id" => 4, "tag_sub_name" => "อุดรธานี"],
            ["tag_main_id" => 4, "tag_sub_name" => "เขาใหญ่"],
            ["tag_main_id" => 4, "tag_sub_name" => "เชียงราย"],
            ["tag_main_id" => 4, "tag_sub_name" => "เชียงใหม่"],
            ["tag_main_id" => 4, "tag_sub_name" => "ชะอำ"],
            ["tag_main_id" => 4, "tag_sub_name" => "ภูเก็ต"],
            ["tag_main_id" => 4, "tag_sub_name" => "สุราษฎร์ธานี"],
            ["tag_main_id" => 4, "tag_sub_name" => "หัวหิน"],
            ["tag_main_id" => 4, "tag_sub_name" => "หาดใหญ่"],
            ["tag_main_id" => 4, "tag_sub_name" => "รังสิต"],
            ["tag_main_id" => 4, "tag_sub_name" => "ลำลูกกา"],
            ["tag_main_id" => 4, "tag_sub_name" => "รัชดาภิเษก"],
            ["tag_main_id" => 4, "tag_sub_name" => "สุทธิสาร"],
            ["tag_main_id" => 4, "tag_sub_name" => "ห้วยขวาง – ประชาอุทิศ"],
            ["tag_main_id" => 4, "tag_sub_name" => "เทียมร่วมมิตร"],
            ["tag_main_id" => 4, "tag_sub_name" => "รัชโยธิน-เสนานิคม"],
            ["tag_main_id" => 4, "tag_sub_name" => "สะพานใหม่"],
            ["tag_main_id" => 4, "tag_sub_name" => "บางใหญ่"],
            ["tag_main_id" => 4, "tag_sub_name" => "รัตนาธิเบศร์ตอนต้น"],
            ["tag_main_id" => 4, "tag_sub_name" => "รัตนาธิเบศร์ตอนปลาย"],
            ["tag_main_id" => 4, "tag_sub_name" => "สนามบินน้ำ"],
            ["tag_main_id" => 4, "tag_sub_name" => "ราชพฤกษ์-กัลปพฤกษ์"],
            ["tag_main_id" => 4, "tag_sub_name" => "ราชพฤกษ์-ชัยพฤกษ์"],
            ["tag_main_id" => 4, "tag_sub_name" => "ราชพฤกษ์-นครอินทร์"],
            ["tag_main_id" => 4, "tag_sub_name" => "ราชพฤกษ์-บรมราชชนนี"],
            ["tag_main_id" => 4, "tag_sub_name" => "ราชพฤกษ์-รัตนาธิเบศร์"],
            ["tag_main_id" => 4, "tag_sub_name" => "รามคำแหง"],
            ["tag_main_id" => 4, "tag_sub_name" => "หัวหมาก – กรุงเทพกรีฑา"],
            ["tag_main_id" => 4, "tag_sub_name" => "เสรีไทย"],
            ["tag_main_id" => 4, "tag_sub_name" => "ปัญญาอินทรา"],
            ["tag_main_id" => 4, "tag_sub_name" => "รามอินทรา"],
            ["tag_main_id" => 4, "tag_sub_name" => "ลาดปลาเค้า"],
            ["tag_main_id" => 4, "tag_sub_name" => "ร่มเกล้า – กิ่งแก้ว"],
            ["tag_main_id" => 4, "tag_sub_name" => "ลาดกระบัง"],
            ["tag_main_id" => 4, "tag_sub_name" => "ลาดพร้าว – วังหิน"],
            ["tag_main_id" => 4, "tag_sub_name" => "ลาดพร้าวตอนต้น"],
            ["tag_main_id" => 4, "tag_sub_name" => "ลาดพร้าวตอนปลาย"],
            ["tag_main_id" => 4, "tag_sub_name" => "วัชรพล"],
            ["tag_main_id" => 4, "tag_sub_name" => "สายไหม – หทัยราษฎร์"],
            ["tag_main_id" => 4, "tag_sub_name" => "ดอนเมือง – สรงประภา"],
            ["tag_main_id" => 4, "tag_sub_name" => "รัชวิภา"],
            ["tag_main_id" => 4, "tag_sub_name" => "วิภาวดีรังสิต"],
            ["tag_main_id" => 4, "tag_sub_name" => "อ้อมน้อย – พุทธมณฑลสาย 5"],
            ["tag_main_id" => 4, "tag_sub_name" => "สำโรง – ปู่เจ้าสมิงพราย"],
            ["tag_main_id" => 4, "tag_sub_name" => "เทพารักษ์ – แพรกษา"],
            ["tag_main_id" => 4, "tag_sub_name" => "สาทร"],
            ["tag_main_id" => 4, "tag_sub_name" => "สีลม – ศาลาแดง"],
            ["tag_main_id" => 4, "tag_sub_name" => "ประชาอุทิศ"],
            ["tag_main_id" => 4, "tag_sub_name" => "ราษฎร์บูรณะ"],
            ["tag_main_id" => 4, "tag_sub_name" => "สุขสวัสดิ์"],
            ["tag_main_id" => 4, "tag_sub_name" => "สะพานควาย"],
            ["tag_main_id" => 4, "tag_sub_name" => "หมอชิต – จตุจักร"],
            ["tag_main_id" => 4, "tag_sub_name" => "อารีย์"],
            ["tag_main_id" => 4, "tag_sub_name" => "ลาซาล – แบริ่ง"],
            ["tag_main_id" => 4, "tag_sub_name" => "อุดมสุข"],
            ["tag_main_id" => 4, "tag_sub_name" => "นานา"],
            ["tag_main_id" => 4, "tag_sub_name" => "พร้อมพงษ์"],
            ["tag_main_id" => 4, "tag_sub_name" => "อโศก"],
            ["tag_main_id" => 4, "tag_sub_name" => "บางจาก"],
            ["tag_main_id" => 4, "tag_sub_name" => "ปุณณวิถี"],
            ["tag_main_id" => 4, "tag_sub_name" => "อ่อนนุช"],
            ["tag_main_id" => 4, "tag_sub_name" => "นวมินทร์"],
            ["tag_main_id" => 4, "tag_sub_name" => "ประดิษฐ์มนูธรรม"],
            ["tag_main_id" => 4, "tag_sub_name" => "ประเสริฐมนูกิจ"],
            ["tag_main_id" => 4, "tag_sub_name" => "จันทน์-สาธุประดิษฐ์"],
            ["tag_main_id" => 4, "tag_sub_name" => "นราธิวาสราชนครินทร์"],
            ["tag_main_id" => 4, "tag_sub_name" => "พระราม 3"],
            ["tag_main_id" => 4, "tag_sub_name" => "เจริญกรุง – เจริญราษฎร์"],
            ["tag_main_id" => 4, "tag_sub_name" => "พระราม 9"],
            ["tag_main_id" => 4, "tag_sub_name" => "พัฒนาการ"],
            ["tag_main_id" => 4, "tag_sub_name" => "เพชรบุรี"]

        ];

        DB::table('tag_sub')->delete();
        foreach ($items as $item){
            \App\Models\TagSub::create($item);
        }
    }
}
