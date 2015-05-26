<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCatHomeV8 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_home', function(Blueprint $table)
		{
            $table->string('project_area')->nullable(true);
            $table->string('num_building')->nullable(true);
            $table->string('num_unit')->nullable(true);
            $table->string('num_elev_person')->nullable(true);
            $table->string('num_elev_object')->nullable(true);
            $table->string('num_parking')->nullable(true);
            $table->string('percent_parking')->nullable(true);
            $table->string('spare_price')->nullable(true);
            $table->string('central_price')->nullable(true);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cat_home', function(Blueprint $table)
		{
			//
		});
	}

}
