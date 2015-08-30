<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatConstructRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cat_construct_rating', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('cat_construct_id')->unsigned()->nullable(false);
            $table->foreign('cat_construct_id')->references('id')->on('cat_construct')
                ->onDelete('cascade');

            $table->integer('rating')->nullable(false);

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
		Schema::drop('cat_construct_rating');
	}

}
