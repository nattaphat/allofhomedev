<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
// use Laracasts\TestDummy\Factory as TestDummy;

class TagMainTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $items =[

            ["tag_main_name" => "รูปแบบบ้าน"],
            ["tag_main_name" => "รูปแบบประกาศ"],
            ["tag_main_name" => "สิ่งอำนวยความสะดวก"],
            ["tag_main_name" => "ทำเล/ย่าน"],



        ];

        DB::table('tag_main')->delete();
        foreach ($items as $item){
            \App\Models\TagMain::create($item);
        }

    }
}
