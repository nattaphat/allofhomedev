<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCatHomeV2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cat_home', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('title', 100)->nullable(false);
            $table->string('subtitle', 500)->nullable(false);
            $table->string('for_cat', 50)->nullable(false);

            $table->string('project_name', 100)->nullable(false);
            $table->string('project_owner', 100)->nullable(false);
            $table->integer('project_owner_logo')->unsigned()->nullable(false)
                ->foreign('project_owner_logo')->references('id')->on('attachment')
                ->onDelete('cascade');

            $table->string('telephone', 50)->nullable(true);
            $table->string('email', 50)->nullable(true);
            $table->string('website', 50)->nullable(true);
            $table->string('facebook', 50)->nullable(true);
            $table->string('line', 50)->nullable(true);

            $table->string('latitude', 50)->nullable(true);
            $table->string('longitude', 50)->nullable(true);
            $table->string('map_url', 100)->nullable(true);

            $table->string('add_street', 100)->nullable(true);
            $table->string('tambid',3)->nullable(false);
            $table->string('amphid',3)->nullable(false);
            $table->string('provid', 3)->nullable(false)
                ->foreign(['provid', 'amphid', 'tambid'])
                ->references(['provid', 'amphid', 'tambid'])->on('geo_tambon');
            $table->integer('region_id')->unsigned()->nullable(false)
                ->foreign('region_id')->references('id')->on('geo_region');
            $table->integer('area_id')->unsigned()->nullable(true)
                ->foreign('area_id')->references('id')->on('area');
            $table->integer('subarea_id')->unsigned()->nullable(true)
                ->foreign('subarea_id')->references('id')->on('subarea');

            $table->string('area_1', 30)->nullable(true);
            $table->string('area_2', 30)->nullable(true);
            $table->string('area_3', 30)->nullable(true);
            $table->string('num_building', 30)->nullable(true);
            $table->string('num_unit', 30)->nullable(true);
            $table->string('num_elev_person', 30)->nullable(true);
            $table->string('num_elev_object', 30)->nullable(true);
            $table->string('ratio_elev', 30)->nullable(true);
            $table->string('num_parking', 30)->nullable(true);
            $table->string('percent_parking', 30)->nullable(true);
            $table->text('home_type_per_area')->nullable(true);
            $table->string('home_area', 100)->nullable(true);
            $table->boolean('eia')->nullable(true);
            $table->string('sell_price', 30)->nullable(false);
            $table->string('sell_price_from', 30)->nullable(true);
            $table->string('sell_price_to', 30)->nullable(true);
            $table->text('sell_price_detail')->nullable(true);
            $table->text('home_material')->nullable(true);
            $table->text('home_style')->nullable(true);

            $table->date('construct_date')->nullable(true);
            $table->date('finish_date')->nullable(true);
            $table->string('video_url', 100)->nullable(true);

            $table->boolean('vip')->nullable(false)->default(false);
            $table->integer('status')->nullable(false)->default(0);
            $table->integer('review_status')->nullable(false)->default(0);

            $table->string('spare_price', 100)->nullable(true);
            $table->string('central_price', 100)->nullable(true);
            $table->string('promotion_str', 255)->nullable(true);
            $table->string('facility_str', 255)->nullable(true);
            $table->string('nearby_str', 255)->nullable(true);

            $table->integer('num_view')->nullable(false)->default(0);
            $table->integer('num_shared')->nullable(false)->default(0);
            $table->integer('num_comment')->nullable(false)->default(0);
            $table->integer('num_rating')->nullable(false)->default(0);

            $table->float('avg_score1')->nullable(true);
            $table->float('avg_score2')->nullable(true);
            $table->float('avg_score3')->nullable(true);
            $table->float('avg_score4')->nullable(true);
            $table->float('avg_score5')->nullable(true);
            $table->float('avg_score6')->nullable(true);
            $table->float('avg_score7')->nullable(true);
            $table->float('avg_score8')->nullable(true);
            $table->float('avg_score9')->nullable(true);
            $table->float('avg_rating')->nullable(true);

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
        Schema::drop('cat_home');
	}

}
