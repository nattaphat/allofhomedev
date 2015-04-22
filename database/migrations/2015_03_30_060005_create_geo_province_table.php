<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoProvinceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('geo_province', function(Blueprint $table)
        {
            $table->string('name')->nullable(false);
            $table->string('provid', 2)->nullable(false);
            $table->primary('provid');
            $table->integer('region_id')->unsigned()->nullable(false);
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
