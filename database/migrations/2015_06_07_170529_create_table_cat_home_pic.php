<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCatHomePic extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cat_home_pic', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('cat_home_id')->unsigned()->nullable(false);
            $table->foreign('cat_home_id')->references('id')->on('cat_home')
                ->onDelete('cascade');

            $table->string('pic_for', 10)->nullable(false);
            $table->string('filename', 100)->nullable(false);
            $table->string('filesize', 30)->nullable(true);
            $table->string('filetype', 30)->nullable(true);
            $table->string('filepath', 100)->nullable(false);
            $table->text('description')->nullable(true);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cat_home_pic');
	}

}
