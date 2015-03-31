<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('bts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('route_id')->nullable(false);
            $table->foreign('route_id')->references('id')->on('bts_route');
            $table->string('bts_name')->nullable(false);
            $table->string('bts_code')->nullable(false);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bts');
	}

}
