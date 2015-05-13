<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatJobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cat_job', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title')->nullable(false);
            $table->string('subtitle')->nullable(false);
            $table->string('company_name')->nullable(false);
            $table->string('company_introduce')->nullable(false);
            $table->string('lat')->nullable(false);
            $table->string('long')->nullable(false);
            $table->string('add_no')->nullable(false);
            $table->string('add_building')->nullable(false);
            $table->string('add_floor')->nullable(false);
            $table->string('add_street')->nullable(false);
            $table->string('tambid',2)->nullable(false);
            $table->string('amphid',2)->nullable(false);
            $table->string('provid', 2)->nullable(false);
            $table->foreign(['provid', 'amphid', 'tambid'])
                ->references(['provid', 'amphid', 'tambid'])->on('geo_tambon');
            $table->integer('region_id')->unsigned()->nullable(false);
            $table->foreign('region_id')->references('id')->on('geo_region');
            $table->integer('area_id')->unsigned()->nullable(true);
            $table->foreign('area_id')->references('id')->on('area');
            $table->integer('subarea_id')->unsigned()->nullable(true);
            $table->foreign('subarea_id')->references('id')->on('subarea');
            $table->text('map_url')->nullable(true);
            $table->string('nearby_str')->nullable(true);
            $table->string('position')->nullable(false);
            $table->integer('number')->nullable(false);
            $table->string('salary')->nullable(false);
            $table->string('attribute')->nullable(false);
            $table->string('job_detail')->nullable(false);
            $table->string('job_place')->nullable(false);
            $table->string('welfare')->nullable(false);
            $table->string('applying')->nullable(false);
            $table->string('website')->nullable(true);
            $table->string('facebook')->nullable(true);
            $table->string('bus_route')->nullable(true);
            $table->string('bts_route')->nullable(true);
            $table->string('car_route')->nullable(true);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cat_job');
	}

}
