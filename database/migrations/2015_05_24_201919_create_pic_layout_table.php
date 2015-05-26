<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicLayoutTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pic_layout', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('cat_home_id')->unsign()->nullable(false);
            $table->foreign('cat_home_id')->references('id')->on('cat_home')
                ->onDelete('cascade');
            $table->string('type');
            $table->string('filename');
            $table->string('filetype');
            $table->integer('filesize');
            $table->string('filepath');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pic_layout');
	}

}
