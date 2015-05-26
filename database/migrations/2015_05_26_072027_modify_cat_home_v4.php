<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCatHomeV4 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_home', function(Blueprint $table)
		{
            $table->dropColumn(['sell_price_start']);
            $table->string('project_type');
            $table->string('sell_price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cat_home', function(Blueprint $table)
		{
			//
		});
	}

}