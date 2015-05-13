<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatSubAreaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('subarea', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('area_id')->unsigned()->nullable(false);
            $table->foreign('area_id')->references('id')->on('area');
            $table->string('subarea_name')->nullable(false);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subarea');
	}

}
