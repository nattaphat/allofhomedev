<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('shop_rating', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('shop_id')->unsigned()->nullable(false);
            $table->foreign('shop_id')->references('id')->on('shop');
            $table->integer('branch_id')->unsigned()->nullable(true);
            $table->foreign('branch_id')->references('id')->on('branch');
            $table->integer('rating1')->nullable(true);
            $table->integer('rating2')->nullable(true);
            $table->integer('rating3')->nullable(true);
            $table->integer('rating4')->nullable(true);
            $table->float('rating_avg')->nullable(true);
            $table->string('comment')->nullable(true);
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
        Schema::drop('shop_rating');
    }

}