<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPicture extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('picture', function(Blueprint $table)
		{
			$table->integer('file_size')->nullable(true);
            $table->string('file_type')->nullable(true);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('picture', function(Blueprint $table)
		{
			//
		});
	}

}
