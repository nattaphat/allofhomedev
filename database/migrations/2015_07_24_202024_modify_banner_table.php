<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyBannerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $tableName = DB::getQueryGrammar()->wrapTable('banner');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN attachment_id DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN type DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN path DROP NOT NULL');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN visible DROP NOT NULL');
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
