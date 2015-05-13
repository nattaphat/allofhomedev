<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatBuysellrentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cat_buysellrent', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title')->nullable(false);
            $table->string('subtitle')->nullable(false);
            $table->integer('type')->nullable(false);
            $table->integer('home_type')->nullable(false);
            $table->string('lat')->nullable(true);
            $table->string('long')->nullable(true);
            $table->string('add_no')->nullable(true);
            $table->string('add_building')->nullable(true);
            $table->string('add_floor')->nullable(true);
            $table->string('add_street')->nullable(true);
            $table->integer('tambon_id')->nullable(true);
//            $table->foreign('tambon_id')->references('tambid')->on('geo_tambon');
            $table->integer('amphoe_id')->nullable(true);
//            $table->foreign('amphoe_id')->references('amphid')->on('geo_amphoe');
            $table->integer('provice_id')->nullable(true);
//            $table->foreign('provice_id')->references('provid')->on('geo_province');
            $table->integer('region_id')->unsigned()->nullable(true);
            $table->foreign('region_id')->references('id')->on('geo_region');
            $table->integer('area_id')->unsigned()->nullable(true);
            $table->foreign('area_id')->references('id')->on('area');
            $table->integer('subarea_id')->unsigned()->nullable(true);
            $table->foreign('subarea_id')->references('id')->on('subarea');
            $table->text('map_url')->nullable(true);
            $table->string('nearby_str')->nullable(true);
            $table->integer('num_floor')->nullable(true);
            $table->integer('num_bed_room')->nullable(true);
            $table->integer('num_bath_room')->nullable(true);
            $table->integer('num_car')->nullable(true);
            $table->boolean('kitchen')->nullable(true);
            $table->boolean('parlor')->nullable(true);
            $table->boolean('air')->nullable(true);
            $table->boolean('fan')->nullable(true);
            $table->boolean('furniture')->nullable(true);
            $table->string('room_area')->nullable(true);
            $table->string('area')->nullable(true);
            $table->double('price')->nullable(false);
            $table->double('central_price')->nullable(true);
            $table->double('central_price_per_area')->nullable(true);
            $table->string('other_detail')->nullable(true);
            $table->string('video_url')->nullable(true);
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
		Schema::drop('cat_buysellrent');
	}

}
