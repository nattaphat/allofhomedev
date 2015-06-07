<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatHomeRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cat_home_rating', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('cat_home_id')->unsigned()->nullable(false)
                ->foreign('cat_home_id')->references('id')->on('cat_home')
                ->onDelete('cascade');

            $table->integer('user_id')->unsigned()->nullable(false)
                ->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->float('score1')->nullable(false);
            $table->float('score2')->nullable(false);
            $table->float('score3')->nullable(false);
            $table->float('score4')->nullable(false);
            $table->float('score5')->nullable(false);
            $table->float('score6')->nullable(false);
            $table->float('score7')->nullable(false);
            $table->float('score8')->nullable(false);
            $table->float('score9')->nullable(false);

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
		Schema::drop('cat_home_rating');
	}

}
