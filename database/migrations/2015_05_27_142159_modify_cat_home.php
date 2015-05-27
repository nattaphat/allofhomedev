<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCatHome extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_home', function(Blueprint $table)
		{
			$table->string('category', 50)->nullable(false)->default('โครงการบ้านใหม่');
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
