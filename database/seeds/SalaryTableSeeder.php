<?php

use Illuminate\Database\Seeder;
use App\Models\salary;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class SalaryTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $salarys =[
            [
                'id'  => 1,
                "range"  => "ต่ำกว่า 15,000."
            ],
            [
                'id'  => 2,
                "range"  => "15,001 – 20,000."
            ],
            [
                'id'  => 3,
                "range"  => "20,001 – 25,000."
            ],
            [
                'id'  => 4,
                "range"  => "25,001 – 30,000."
            ],
            [
                'id'  => 5,
                "range"  => "30,001 – 35,000."
            ],
            [
                'id'  => 6,
                "range"  => "35,001 – 40,000."
            ],
            [
                'id'  => 7,
                "range"  => "40,001 – 45,000."
            ],
            [
                'id'  => 8,
                "range"  => "45,001 .- บาท ขึ้นไป"
            ]
        ];

        DB::table('salary')->delete();
        foreach ($salarys as $salary){
            salary::create($salary);
        }
    }
}
