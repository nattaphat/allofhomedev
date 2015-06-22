<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCatHome0622 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $tableName = DB::getQueryGrammar()->wrapTable('cat_home');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN for_cat TYPE character varying(255);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN telephone TYPE character varying(100);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN email TYPE character varying(100);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN website TYPE character varying(100);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN facebook TYPE character varying(100);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN line TYPE character varying(100);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN latitude TYPE character varying(100);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN longitude TYPE character varying(100);');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

	}

}
