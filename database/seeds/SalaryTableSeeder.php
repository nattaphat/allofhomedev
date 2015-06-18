<?php

use Illuminate\Database\Seeder;
use App\Models\Salary;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class SalaryTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $salarys =[
            [
                "range"  => "ต่ำกว่า 15,000."
            ],
            [
                "range"  => "15,001 – 20,000."
            ],
            [
                "range"  => "20,001 – 25,000."
            ],
            [
                "range"  => "25,001 – 30,000."
            ],
            [
                "range"  => "30,001 – 35,000."
            ],
            [
                "range"  => "35,001 – 40,000."
            ],
            [
                "range"  => "40,001 – 45,000."
            ],
            [
                "range"  => "45,001 .- บาท ขึ้นไป"
            ]
        ];

        DB::table('salary')->delete();
        foreach ($salarys as $salary){
            Salary::create($salary);
        }
    }
}
