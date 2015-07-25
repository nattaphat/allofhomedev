<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyBannerTableV2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $tableName = DB::getQueryGrammar()->wrapTable('banner');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN remark TYPE text');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN type TYPE character varying(3)');
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
