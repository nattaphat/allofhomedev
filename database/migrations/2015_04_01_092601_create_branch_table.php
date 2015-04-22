<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('branch', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->nullable(false);
            $table->foreign('shop_id')
                ->references('id')
                ->on('shop')
                ->onDelete('cascade');
            $table->string('branch_name')->nullable(false);
            $table->string('telephone')->nullable(true);
            $table->string('mobile_phone')->nullable(false);
            $table->string('fax')->nullable(true);
            $table->string('email')->nullable(false);
            $table->string('service_day')->nullable(true);
            $table->string('service_time')->nullable(true);
            $table->boolean('credit_card')->nullable(true);
            $table->boolean('parking')->nullable(true);
            $table->string('lat')->nullable(false);
            $table->string('long')->nullable(false);
            $table->string('add_no')->nullable(false);
            $table->string('add_building')->nullable(false);
            $table->string('add_floor')->nullable(false);
            $table->string('add_street')->nullable(false);
            $table->integer('tambon_id')->nullable(false);
//            $table->foreign('tambon_id')->references('tambid')->on('geo_tambon');
            $table->integer('amphoe_id')->nullable(false);
//            $table->foreign('amphoe_id')->references('amphid')->on('geo_amphoe');
            $table->integer('provice_id')->nullable(false);
//            $table->foreign('provice_id')->references('provid')->on('geo_province');
            $table->integer('region_id')->nullable(false);
            $table->foreign('region_id')->references('id')->on('geo_region');
            $table->integer('area_id')->unsigned()->nullable(true);
            $table->foreign('area_id')->references('id')->on('area');
            $table->integer('subarea_id')->nullable(true);
            $table->foreign('subarea_id')->references('id')->on('subarea');
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
		Schema::drop('branch');
	}

}
