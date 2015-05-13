<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoAmphoeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('geo_amphoe', function(Blueprint $table)
        {
            $table->string('provid',2)->unsigned()->nullable(false);
            $table->foreign('provid')->references('provid')->on('geo_province');
            $table->string('name')->nullable(false);
            $table->string('amphid',2)->nullable(false);
            $table->primary(['provid', 'amphid']);
            $table->unique(['provid', 'amphid']);
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
        Schema::drop('geo_amphoe');
	}

}
