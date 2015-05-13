<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatHomeTable extends Migration {

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
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('project_id')->unsigned()->nullable(false);
            $table->foreign('project_id')->references('id')->on('project');
            $table->string('title')->nullable(false);
            $table->string('subtitle')->nullable(false);
            $table->string('contact_company_name')->nullable(false);
            $table->string('contact_telephone')->nullable(false);
            $table->string('contact_email')->nullable(true);
            $table->string('contact_website')->nullable(true);
            $table->string('contact_lineid')->nullable(true);
            $table->integer('project_type')->nullable(false);
            $table->float('project_area')->nullable(true);
            $table->integer('num_building')->nullable(true);
            $table->integer('num_unit')->nullable(true);
            $table->string('home_type_per_area')->nullable(true);
            $table->string('home_area')->nullable(true);
            $table->string('home_material')->nullable(true);
            $table->string('home_style')->nullable(true);
            $table->integer('num_elev_person')->nullable(true);
            $table->integer('num_elev_object')->nullable(true);
            $table->string('ratio_elev_per_unit')->nullable(true);
            $table->integer('num_parking')->nullable(true);
            $table->float('percent_parking')->nullable(true);
            $table->boolean('eia')->nullable(true);
            $table->double('sell_price')->nullable(false);
            $table->date('construct_date')->nullable(false);
            $table->date('finish_date')->nullable(false);
            $table->double('spare_price')->nullable(true);
            $table->float('central_price')->nullable(true);
            $table->string('project_layout')->nullable(true);
            $table->string('project_env')->nullable(true);
            $table->string('project_scene')->nullable(true);
            $table->string('project_deliver')->nullable(true);
            $table->string('loan_detail')->nullable(true);
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
		Schema::drop('cat_home');
	}

}
