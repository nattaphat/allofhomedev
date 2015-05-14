<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cat_review', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('shop_id')->unsigned()->nullable(true);
            $table->foreign('shop_id')->references('id')->on('shop')
                ->onDelete('cascade');

            $table->integer('branch_id')->unsigned()->nullable(true);
            $table->foreign('branch_id')->references('id')->on('branch')
                ->onDelete('cascade');

            $table->integer('project_id')->unsigned()->nullable(true);
            $table->foreign('project_id')->references('id')->on('project')
                ->onDelete('cascade');

            $table->string('title')->nullable(false);
            $table->string('subtitle')->nullable(false);
            $table->integer('shop_rating1')->nullable(true);
            $table->integer('shop_rating2')->nullable(true);
            $table->integer('shop_rating3')->nullable(true);
            $table->integer('shop_rating4')->nullable(true);
            $table->float('shop_rating_avg')->nullable(true);
            $table->integer('project_rating1')->nullable(true);
            $table->integer('project_rating2')->nullable(true);
            $table->integer('project_rating3')->nullable(true);
            $table->integer('project_rating4')->nullable(true);
            $table->integer('project_rating5')->nullable(true);
            $table->integer('project_rating6')->nullable(true);
            $table->integer('project_rating7')->nullable(true);
            $table->integer('project_rating8')->nullable(true);
            $table->integer('project_rating9')->nullable(true);
            $table->float('project_rating_avg')->nullable(true);
            $table->string('other_detail')->nullable(false);
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
		Schema::drop('cat_review');
	}

}
