<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCatHomeV9 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $tableName = DB::getQueryGrammar()->wrapTable('cat_home');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN contact_telephone TYPE character varying(50);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN contact_email TYPE character varying(50);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN contact_website TYPE character varying(50);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN contact_lineid TYPE character varying(50);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN project_layout TYPE character varying(4000);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN project_env TYPE character varying(4000);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN project_scene TYPE character varying(4000);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN project_deliver TYPE character varying(4000);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN loan_detail TYPE character varying(4000);');
        DB::statement('ALTER TABLE '.$tableName.' ALTER COLUMN promotion_str TYPE character varying(4000);');
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
