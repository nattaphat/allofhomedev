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

            ['id' => 1, "tag_main_id" => 1, "tag_sub_name" => "บ้านเดี่ยว"],
            ['id' => 2, "tag_main_id" => 1, "tag_sub_name" => "บ้านแฝด"],
            ['id' => 3, "tag_main_id" => 1, "tag_sub_name" => "ทาวน์โฮม"],
            ['id' => 4, "tag_main_id" => 1, "tag_sub_name" => "คอนโด"],
            ['id' => 5, "tag_main_id" => 1, "tag_sub_name" => "อาคารพานิช"],
            ['id' => 6, "tag_main_id" => 1, "tag_sub_name" => "หอพัก"],
            ['id' => 7, "tag_main_id" => 1, "tag_sub_name" => "อพาร์ทเม้นท์"],
            ['id' => 8, "tag_main_id" => 1, "tag_sub_name" => "แมนชั่น"],


            ['id' => 9, "tag_main_id" => 2, "tag_sub_name" => "ต้องการซื้อ"],
            ['id' => 10, "tag_main_id" => 2, "tag_sub_name" => "ต้องการขาย"],
            ['id' => 11, "tag_main_id" => 2, "tag_sub_name" => "ต้องการเช่า"],
            ['id' => 12, "tag_main_id" => 2, "tag_sub_name" => "ต้องการให้เช่า"],


            [
                'id'  => 13,
                "tag_main_id" => 3,
                "tag_sub_name"  => "ลิฟต์โดยสาร"
            ],
            [
                'id'  => 14,
                "tag_main_id" => 3,
                "tag_sub_name"  => "ลิฟต์ขนส่ง"
            ],
            [
                'id'  => 15,
                "tag_main_id" => 3,
                "tag_sub_name"  => "ที่จอดรถ"
            ],
            [
                'id'  => 16,
                "tag_main_id" => 3,
                "tag_sub_name"  => "ทางเข้าไม้กระดก"
            ],
            [
                'id'  => 17,
                "tag_main_id" => 3,
                "tag_sub_name"  => "คีย์การ์ด"
            ],
            [
                'id'  => 18,
                "tag_main_id" => 3,
                "tag_sub_name"  => "กล้องวงจรปิด"
            ],
            [
                'id'  => 19,
                "tag_main_id" => 3,
                "tag_sub_name"  => "รปภ."
            ],
            [
                'id'  => 20,
                "tag_main_id" => 3,
                "tag_sub_name"  => "เครื่องซักผ้าหยอดเหรียญ"
            ],
            [
                'id'  => 21,
                "tag_main_id" => 3,
                "tag_sub_name"  => "สระว่ายน้ำ"
            ],
            [
                'id'  => 22,
                "tag_main_id" => 3,
                "tag_sub_name"  => "สวนสาธารณะ"
            ],
            [
                'id'  => 23,
                "tag_main_id" => 3,
                "tag_sub_name"  => "สนามเด็กเล่น"
            ],
            [
                'id'  => 24,
                "tag_main_id" => 3,
                "tag_sub_name"  => "ฟิตเนส"
            ],
            [
                'id'  => 25,
                "tag_main_id" => 3,
                "tag_sub_name"  => "สตรีม"
            ],
            [
                'id'  => 26,
                "tag_main_id" => 3,
                "tag_sub_name"  => "ซาวน่า"
            ],
            [
                'id'  => 27,
                "tag_main_id" => 3,
                "tag_sub_name"  => "สปอร์ตคลับ"
            ],
            [
                'id'  => 28,
                "tag_main_id" => 3,
                "tag_sub_name"  => "ร้านสะดวกซื้อ"
            ],


            ['id' => 29, "tag_main_id" => 4, "tag_sub_name" => "งามวงศ์วาน"],
            ['id' => 30, "tag_main_id" => 4, "tag_sub_name" => "แคราย"],
            ['id' => 31, "tag_main_id" => 4, "tag_sub_name" => "แจ้งวัฒนะ"],
            ['id' => 32, "tag_main_id" => 4, "tag_sub_name" => "ปิ่นเกล้า – บรมราชชนนี"],
            ['id' => 33, "tag_main_id" => 4, "tag_sub_name" => "เพชรเกษม – บางแค"],
            ['id' => 34, "tag_main_id" => 4, "tag_sub_name" => "ชิดลม – หลังสวน"],
            ['id' => 35, "tag_main_id" => 4, "tag_sub_name" => "ราชดำริ"],
            ['id' => 36, "tag_main_id" => 4, "tag_sub_name" => "เพลินจิต – วิทยุ"],
            ['id' => 37, "tag_main_id" => 4, "tag_sub_name" => "จตุรทิศ"],
            ['id' => 38, "tag_main_id" => 4, "tag_sub_name" => "ดินแดง"],
            ['id' => 39, "tag_main_id" => 4, "tag_sub_name" => "ราชปรารภ"],
            ['id' => 40, "tag_main_id" => 4, "tag_sub_name" => "ตลาดพลู – โพธิ์นิมิตร"],
            ['id' => 41, "tag_main_id" => 4, "tag_sub_name" => "บางหว้า"],
            ['id' => 42, "tag_main_id" => 4, "tag_sub_name" => "วุฒากาศ"],
            ['id' => 43, "tag_main_id" => 4, "tag_sub_name" => "ทองหล่อ"],
            ['id' => 44, "tag_main_id" => 4, "tag_sub_name" => "พระโขนง"],
            ['id' => 45, "tag_main_id" => 4, "tag_sub_name" => "เอกมัย"],
            ['id' => 46, "tag_main_id" => 4, "tag_sub_name" => "กรุงธนบุรี"],
            ['id' => 47, "tag_main_id" => 4, "tag_sub_name" => "วงเวียนใหญ่"],
            ['id' => 48, "tag_main_id" => 4, "tag_sub_name" => "กรุงเทพฯ-นนท์"],
            ['id' => 49, "tag_main_id" => 4, "tag_sub_name" => "ติวานนท์"],
            ['id' => 50, "tag_main_id" => 4, "tag_sub_name" => "บางซื่อ"],
            ['id' => 51, "tag_main_id" => 4, "tag_sub_name" => "ประชาชื่น"],
            ['id' => 52, "tag_main_id" => 4, "tag_sub_name" => "วงศ์สว่าง"],
            ['id' => 53, "tag_main_id" => 4, "tag_sub_name" => "บางนา-ตราด"],
            ['id' => 54, "tag_main_id" => 4, "tag_sub_name" => "ศรีนครินทร์"],
            ['id' => 55, "tag_main_id" => 4, "tag_sub_name" => "บางกรวย-ไทรน้อย"],
            ['id' => 56, "tag_main_id" => 4, "tag_sub_name" => "บางบัวทอง"],
            ['id' => 57, "tag_main_id" => 4, "tag_sub_name" => "วงแหวนตะวันตก (กาญจนาภิเษก)"],
            ['id' => 58, "tag_main_id" => 4, "tag_sub_name" => "พญาไท"],
            ['id' => 59, "tag_main_id" => 4, "tag_sub_name" => "ราชเทวี"],
            ['id' => 60, "tag_main_id" => 4, "tag_sub_name" => "สยาม"],
            ['id' => 61, "tag_main_id" => 4, "tag_sub_name" => "สามย่าน"],
            ['id' => 62, "tag_main_id" => 4, "tag_sub_name" => "พระราม 2"],
            ['id' => 63, "tag_main_id" => 4, "tag_sub_name" => "เทียนทะเล"],
            ['id' => 64, "tag_main_id" => 4, "tag_sub_name" => "เอกชัย – บางบอน"],
            ['id' => 65, "tag_main_id" => 4, "tag_sub_name" => "ลุมพินี – คลองเตย"],
            ['id' => 66, "tag_main_id" => 4, "tag_sub_name" => "นครปฐม"],
            ['id' => 67, "tag_main_id" => 4, "tag_sub_name" => "พิษณุโลก"],
            ['id' => 68, "tag_main_id" => 4, "tag_sub_name" => "สมุทรปราการ"],
            ['id' => 69, "tag_main_id" => 4, "tag_sub_name" => "ชลบุรี"],
            ['id' => 70, "tag_main_id" => 4, "tag_sub_name" => "บางแสน"],
            ['id' => 71, "tag_main_id" => 4, "tag_sub_name" => "พัทยา"],
            ['id' => 72, "tag_main_id" => 4, "tag_sub_name" => "ระยอง"],
            ['id' => 73, "tag_main_id" => 4, "tag_sub_name" => "ศรีราชา"],
            ['id' => 74, "tag_main_id" => 4, "tag_sub_name" => "ขอนแก่น"],
            ['id' => 75, "tag_main_id" => 4, "tag_sub_name" => "นครราชสีมา"],
            ['id' => 76, "tag_main_id" => 4, "tag_sub_name" => "อุดรธานี"],
            ['id' => 77, "tag_main_id" => 4, "tag_sub_name" => "เขาใหญ่"],
            ['id' => 78, "tag_main_id" => 4, "tag_sub_name" => "เชียงราย"],
            ['id' => 79, "tag_main_id" => 4, "tag_sub_name" => "เชียงใหม่"],
            ['id' => 80, "tag_main_id" => 4, "tag_sub_name" => "ชะอำ"],
            ['id' => 81, "tag_main_id" => 4, "tag_sub_name" => "ภูเก็ต"],
            ['id' => 82, "tag_main_id" => 4, "tag_sub_name" => "สุราษฎร์ธานี"],
            ['id' => 83, "tag_main_id" => 4, "tag_sub_name" => "หัวหิน"],
            ['id' => 84, "tag_main_id" => 4, "tag_sub_name" => "หาดใหญ่"],
            ['id' => 85, "tag_main_id" => 4, "tag_sub_name" => "รังสิต"],
            ['id' => 86, "tag_main_id" => 4, "tag_sub_name" => "ลำลูกกา"],
            ['id' => 87, "tag_main_id" => 4, "tag_sub_name" => "รัชดาภิเษก"],
            ['id' => 88, "tag_main_id" => 4, "tag_sub_name" => "สุทธิสาร"],
            ['id' => 89, "tag_main_id" => 4, "tag_sub_name" => "ห้วยขวาง – ประชาอุทิศ"],
            ['id' => 90, "tag_main_id" => 4, "tag_sub_name" => "เทียมร่วมมิตร"],
            ['id' => 91, "tag_main_id" => 4, "tag_sub_name" => "รัชโยธิน-เสนานิคม"],
            ['id' => 92, "tag_main_id" => 4, "tag_sub_name" => "สะพานใหม่"],
            ['id' => 93, "tag_main_id" => 4, "tag_sub_name" => "บางใหญ่"],
            ['id' => 94, "tag_main_id" => 4, "tag_sub_name" => "รัตนาธิเบศร์ตอนต้น"],
            ['id' => 95, "tag_main_id" => 4, "tag_sub_name" => "รัตนาธิเบศร์ตอนปลาย"],
            ['id' => 96, "tag_main_id" => 4, "tag_sub_name" => "สนามบินน้ำ"],
            ['id' => 97, "tag_main_id" => 4, "tag_sub_name" => "ราชพฤกษ์-กัลปพฤกษ์"],
            ['id' => 98, "tag_main_id" => 4, "tag_sub_name" => "ราชพฤกษ์-ชัยพฤกษ์"],
            ['id' => 99, "tag_main_id" => 4, "tag_sub_name" => "ราชพฤกษ์-นครอินทร์"],
            ['id' => 100, "tag_main_id" => 4, "tag_sub_name" => "ราชพฤกษ์-บรมราชชนนี"],
            ['id' => 101, "tag_main_id" => 4, "tag_sub_name" => "ราชพฤกษ์-รัตนาธิเบศร์"],
            ['id' => 102, "tag_main_id" => 4, "tag_sub_name" => "รามคำแหง"],
            ['id' => 103, "tag_main_id" => 4, "tag_sub_name" => "หัวหมาก – กรุงเทพกรีฑา"],
            ['id' => 104, "tag_main_id" => 4, "tag_sub_name" => "เสรีไทย"],
            ['id' => 105, "tag_main_id" => 4, "tag_sub_name" => "ปัญญาอินทรา"],
            ['id' => 106, "tag_main_id" => 4, "tag_sub_name" => "รามอินทรา"],
            ['id' => 107, "tag_main_id" => 4, "tag_sub_name" => "ลาดปลาเค้า"],
            ['id' => 108, "tag_main_id" => 4, "tag_sub_name" => "ร่มเกล้า – กิ่งแก้ว"],
            ['id' => 109, "tag_main_id" => 4, "tag_sub_name" => "ลาดกระบัง"],
            ['id' => 110, "tag_main_id" => 4, "tag_sub_name" => "ลาดพร้าว – วังหิน"],
            ['id' => 111, "tag_main_id" => 4, "tag_sub_name" => "ลาดพร้าวตอนต้น"],
            ['id' => 112, "tag_main_id" => 4, "tag_sub_name" => "ลาดพร้าวตอนปลาย"],
            ['id' => 113, "tag_main_id" => 4, "tag_sub_name" => "วัชรพล"],
            ['id' => 114, "tag_main_id" => 4, "tag_sub_name" => "สายไหม – หทัยราษฎร์"],
            ['id' => 115, "tag_main_id" => 4, "tag_sub_name" => "ดอนเมือง – สรงประภา"],
            ['id' => 116, "tag_main_id" => 4, "tag_sub_name" => "รัชวิภา"],
            ['id' => 117, "tag_main_id" => 4, "tag_sub_name" => "วิภาวดีรังสิต"],
            ['id' => 118, "tag_main_id" => 4, "tag_sub_name" => "อ้อมน้อย – พุทธมณฑลสาย 5"],
            ['id' => 119, "tag_main_id" => 4, "tag_sub_name" => "สำโรง – ปู่เจ้าสมิงพราย"],
            ['id' => 120, "tag_main_id" => 4, "tag_sub_name" => "เทพารักษ์ – แพรกษา"],
            ['id' => 121, "tag_main_id" => 4, "tag_sub_name" => "สาทร"],
            ['id' => 122, "tag_main_id" => 4, "tag_sub_name" => "สีลม – ศาลาแดง"],
            ['id' => 123, "tag_main_id" => 4, "tag_sub_name" => "ประชาอุทิศ"],
            ['id' => 124, "tag_main_id" => 4, "tag_sub_name" => "ราษฎร์บูรณะ"],
            ['id' => 125, "tag_main_id" => 4, "tag_sub_name" => "สุขสวัสดิ์"],
            ['id' => 126, "tag_main_id" => 4, "tag_sub_name" => "สะพานควาย"],
            ['id' => 127, "tag_main_id" => 4, "tag_sub_name" => "หมอชิต – จตุจักร"],
            ['id' => 128, "tag_main_id" => 4, "tag_sub_name" => "อารีย์"],
            ['id' => 129, "tag_main_id" => 4, "tag_sub_name" => "ลาซาล – แบริ่ง"],
            ['id' => 130, "tag_main_id" => 4, "tag_sub_name" => "อุดมสุข"],
            ['id' => 131, "tag_main_id" => 4, "tag_sub_name" => "นานา"],
            ['id' => 132, "tag_main_id" => 4, "tag_sub_name" => "พร้อมพงษ์"],
            ['id' => 133, "tag_main_id" => 4, "tag_sub_name" => "อโศก"],
            ['id' => 134, "tag_main_id" => 4, "tag_sub_name" => "บางจาก"],
            ['id' => 135, "tag_main_id" => 4, "tag_sub_name" => "ปุณณวิถี"],
            ['id' => 136, "tag_main_id" => 4, "tag_sub_name" => "อ่อนนุช"],
            ['id' => 137, "tag_main_id" => 4, "tag_sub_name" => "นวมินทร์"],
            ['id' => 138, "tag_main_id" => 4, "tag_sub_name" => "ประดิษฐ์มนูธรรม"],
            ['id' => 139, "tag_main_id" => 4, "tag_sub_name" => "ประเสริฐมนูกิจ"],
            ['id' => 140, "tag_main_id" => 4, "tag_sub_name" => "จันทน์-สาธุประดิษฐ์"],
            ['id' => 141, "tag_main_id" => 4, "tag_sub_name" => "นราธิวาสราชนครินทร์"],
            ['id' => 142, "tag_main_id" => 4, "tag_sub_name" => "พระราม 3"],
            ['id' => 143, "tag_main_id" => 4, "tag_sub_name" => "เจริญกรุง – เจริญราษฎร์"],
            ['id' => 144, "tag_main_id" => 4, "tag_sub_name" => "พระราม 9"],
            ['id' => 145, "tag_main_id" => 4, "tag_sub_name" => "พัฒนาการ"],
            ['id' => 146, "tag_main_id" => 4, "tag_sub_name" => "เพชรบุรี"]

        ];

        DB::table('tag_sub')->delete();
        foreach ($items as $item){
            \App\Models\TagSub::create($item);
        }
    }
}
