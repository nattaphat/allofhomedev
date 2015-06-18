<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		//$this->call('GeoRegionTableSeeder');
        $this->call('AplTableSeeder');
        $this->call('BtsRouteTableSeeder');
        $this->call('MrtRouteTableSeeder');
        $this->call('SalaryTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('FacilityTableSeeder');
        $this->call('PromotionTableSeeder');
        $this->call('AreaTableSeeder');
        $this->call('SubAreaTableSeeder');
        $this->call('TagMainTableSeeder');
        $this->call('TagSubTableSeeder');
	}

}
