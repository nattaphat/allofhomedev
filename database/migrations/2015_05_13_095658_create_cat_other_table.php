<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatOtherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cat_other', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('shop_id')->unsigned()->nullable(false);
            $table->foreign('shop_id')->references('id')->on('shop')
                ->onDelete('cascade');

            $table->string('title')->nullable(false);
            $table->string('subtitle')->nullable(false);
            $table->string('product_name')->nullable(false);
            $table->double('product_price')->nullable(true);
            $table->string('product_condition')->nullable(true);
            $table->string('bus_route')->nullable(true);
            $table->string('bts_route')->nullable(true);
            $table->string('car_route')->nullable(true);
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
		Schema::drop('cat_other');
	}

}
