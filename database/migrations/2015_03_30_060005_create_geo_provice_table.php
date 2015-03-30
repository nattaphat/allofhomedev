<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoProviceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('geo_province', function(Blueprint $table)
        {
            $table->string('name');
            $table->string('provid', 2);
            $table->primary('provid');
            $table->integer('region_id');
            $table->foreign('region_id')->references('id')->on('geo_region');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('geo_province');
	}

}
