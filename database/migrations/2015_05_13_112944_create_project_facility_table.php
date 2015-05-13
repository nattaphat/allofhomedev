<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectFacilityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_facility', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('project_id')->unsigned()->nullable(true);
            $table->foreign('project_id')->references('id')->on('project');
            $table->integer('cat_buysellrent_id')->unsigned()->nullable(true);
            $table->foreign('cat_buysellrent_id')->references('id')->on('cat_buysellrent');
            $table->integer('facility_id')->unsigned()->nullable(false);
            $table->foreign('facility_id')->references('id')->on('facility');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_facility');
	}

}
