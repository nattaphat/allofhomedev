<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPromotionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('cat_home_promotion', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('promotion_id')->unsigned()->nullable(false);
            $table->foreign('promotion_id')->references('id')->on('promotion')
                ->onDelete('cascade');
            $table->integer('cat_home_id')->unsigned()->nullable(false);
            $table->foreign('cat_home_id')->references('id')->on('cat_home')
                ->onDelete('cascade');

            $table->unique(['promotion_id', 'cat_home_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cat_home_promotion');
    }

}
