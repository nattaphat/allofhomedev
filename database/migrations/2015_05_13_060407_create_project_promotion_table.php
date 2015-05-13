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
        Schema::create('project_promotion', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('promotion_id')->unsigned()->nullable(false);
            $table->foreign('promotion_id')->references('id')->on('promotion');
            $table->integer('project_id')->unsigned()->nullable(false);
            $table->foreign('project_id')->references('id')->on('project');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_promotion');
    }

}
