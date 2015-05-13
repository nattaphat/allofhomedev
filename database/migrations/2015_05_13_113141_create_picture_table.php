<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('picture', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('cat_home_id')->unsign()->nullable(true);
            $table->foreign('cat_home_id')->references('id')->on('cat_home');
            $table->integer('cat_other_id')->unsign()->nullable(true);
            $table->foreign('cat_other_id')->references('id')->on('cat_other');
            $table->integer('cat_buysellrent_id')->unsign()->nullable(true);
            $table->foreign('cat_buysellrent_id')->references('id')->on('cat_buysellrent');
            $table->integer('cat_idea_id')->unsign()->nullable(true);
            $table->foreign('cat_idea_id')->references('id')->on('cat_idea');
            $table->integer('cat_review_id')->unsign()->nullable(true);
            $table->foreign('cat_review_id')->references('id')->on('cat_review');
            $table->integer('cat_article_id')->unsign()->nullable(true);
            $table->foreign('cat_article_id')->references('id')->on('cat_article');
            $table->integer('cat_job_id')->unsign()->nullable(true);
            $table->foreign('cat_job_id')->references('id')->on('cat_job');
            $table->integer('cat_2hand_id')->unsign()->nullable(true);
            $table->foreign('cat_2hand_id')->references('id')->on('cat_2hand');
            $table->string('file_name')->nullable(false);
            $table->string('file_path')->nullable(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('picture');
	}

}
