<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumbnailCatHomePicture extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_home_pic', function(Blueprint $table)
		{
            $table->string('thumbnail', 255)->nullable(true);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cat_home_pic', function(Blueprint $table)
		{
			//
		});
	}

}
