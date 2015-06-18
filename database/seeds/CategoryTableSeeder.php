<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $items =[
            ["category_name" => "โครงการบ้านใหม่"],
            ["category_name" => "โครงการทาวน์โฮมใหม่"],
            ["category_name" => "โครงการคอนโดใหม่"],
            ["category_name" => "ออกแบบภายใน ภายนอก"],
            ["category_name" => "ที่ดินเปล่า"],
            ["category_name" => "เฟอร์นิเจอร์ ของตกแต่ง"],
            ["category_name" => "เครื่องใช้ไฟฟ้า"],
            ["category_name" => "เครื่องครัว สุขภัณฑ์"],
            ["category_name" => "วัสดุก่อสร้าง รับเหมา"],
            ["category_name" => "ดูแลสวน"],
            ["category_name" => "เฟอร์โบราณเก่าเก็บ"]
        ];

        DB::table('category')->delete();
        foreach ($items as $item){
            \App\Models\Category::create($item);
        }
    }
}
