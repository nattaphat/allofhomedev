<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMrtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('mrt', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('route_id')->nullable(false);
            $table->foreign('route_id')->references('id')->on('mrt_route');
            $table->string('mrt_name')->nullable(false);
            $table->string('mrt_code')->nullable(false);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mrt');
	}

}
