<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatIdeaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cat_idea', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('title')->nullable(false);
            $table->string('subtitle')->nullable(false);
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
		Schema::drop('cat_idea');
	}

}
