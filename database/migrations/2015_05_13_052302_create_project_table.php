<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('project', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('project_name')->nullable(false);
            $table->string('project_company_owner')->nullable(false);
            $table->integer('attachment_id')->unsigned()->nullable(false);
            $table->foreign('attachment_id')->references('id')->on('attachment');
            $table->string('lat')->nullable(false);
            $table->string('long')->nullable(false);
            $table->string('add_street')->nullable(false);
            $table->integer('tambon_id')->nullable(false);
//            $table->foreign('tambon_id')->references('tambid')->on('geo_tambon');
            $table->integer('amphoe_id')->nullable(false);
//            $table->foreign('amphoe_id')->references('amphid')->on('geo_amphoe');
            $table->integer('provice_id')->nullable(false);
//            $table->foreign('provice_id')->references('provid')->on('geo_province');
            $table->integer('region_id')->unsigned()->nullable(false);
            $table->foreign('region_id')->references('id')->on('geo_region');
            $table->integer('area_id')->unsigned()->nullable(true);
            $table->foreign('area_id')->references('id')->on('area');
            $table->integer('subarea_id')->unsigned()->nullable(true);
            $table->foreign('subarea_id')->references('id')->on('subarea');
            $table->text('map_url')->nullable(true);
            $table->string('website')->nullable(true);
            $table->string('facebook')->nullable(true);
            $table->string('nearby_str')->nullable(true);
            $table->string('facility_str')->nullable(true);
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
        Schema::drop('project');
    }

}
