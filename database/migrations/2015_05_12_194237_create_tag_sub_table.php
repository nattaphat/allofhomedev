<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagSubTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('tag_sub', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('tag_main_id')->unsigned()->nullable(false);
            $table->foreign('tag_main_id')->references('id')->on('tag_main');
            $table->string('tag_sub_name')->nullable(false);
            $table->unique(['tag_main_id', 'tag_sub_name']);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('tag_sub');
	}

}
