<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCatReviewV2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $tableName = DB::getQueryGrammar()->wrapTable('cat_review');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN subtitle TYPE character varying(500);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN other_detail TYPE character varying(4000);');
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
