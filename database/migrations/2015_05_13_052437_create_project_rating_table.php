<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('project_rating', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('project_id')->unsigned()->nullable(false);
            $table->foreign('project_id')->references('id')->on('project');
            $table->integer('rating1')->nullable(true);
            $table->integer('rating2')->nullable(true);
            $table->integer('rating3')->nullable(true);
            $table->integer('rating4')->nullable(true);
            $table->integer('rating5')->nullable(true);
            $table->integer('rating6')->nullable(true);
            $table->integer('rating7')->nullable(true);
            $table->integer('rating8')->nullable(true);
            $table->integer('rating9')->nullable(true);
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
        Schema::drop('project_rating');
    }

}
