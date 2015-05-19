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

//            $table->integer('project_id')->unsigned()->nullable(true);
//            $table->foreign('project_id')->references('id')->on('project')
//                ->onDelete('cascade');
//
//            $table->integer('cat_buysellrent_id')->unsigned()->nullable(true);
//            $table->foreign('cat_buysellrent_id')->references('id')->on('cat_buysellrent')
//                ->onDelete('cascade');

            $table->integer('project_facilityable_id')->nullable(false);
            $table->string('project_facilityable_type')->nullable(false);

            $table->integer('facility_id')->unsigned()->nullable(false);
            $table->foreign('facility_id')->references('id')->on('facility')
                ->onDelete('cascade');

            $table->unique(['project_facilityable_id', 'project_facilityable_type', 'facility_id']);

//            $table->unique(['project_id', 'cat_buysellrent_id', 'facility_id']);

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
