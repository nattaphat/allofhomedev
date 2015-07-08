<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterShopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $tableName = DB::getQueryGrammar()->wrapTable('shop');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN business_type_id DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN attachment_id DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN shop_history DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN shop_introduce DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN mobile_phone DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN email DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN lat DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN long DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN add_no DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN add_building DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN add_floor DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN add_street DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN tambid DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN amphid DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN provid DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN region_id DROP NOT NULL');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
