<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCatReviewV2 extends Migration {

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

            $table->string('title', 100)->nullable(true);
            $table->string('subtitle', 500)->nullable(true);
            $table->text('other_detail')->nullable(true);
            $table->string('video_url', 255)->nullable(true);

            $table->integer('num_view')->nullable(false)->default(0);
            $table->integer('num_shared')->nullable(false)->default(0);
            $table->integer('num_comment')->nullable(false)->default(0);

            $table->integer('rating_score')->nullable(true);
            $table->boolean('suggest')->nullable(true);
            $table->boolean('visible')->nullable(true);

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
