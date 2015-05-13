<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatShopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('shop', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('business_type_id')->unsigned()->nullable(false);
            $table->foreign('business_type_id')->references('id')->on('business_type');
            $table->integer('attachment_id')->nullable(false);
            $table->foreign('attachment_id')->references('id')->on('attachment');
            $table->string('shop_name')->nullable(false);
            $table->text('shop_history')->nullable(false);
            $table->text('shop_introduce')->nullable(false);
            $table->text('shop_condition')->nullable(true);
            $table->string('website')->nullable(true);
            $table->string('facebook')->nullable(true);
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
		Schema::drop('shop');
	}

}
