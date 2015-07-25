<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTableBanner extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('banner', function(Blueprint $table)
        {
            $table->string('banner_name', 100)->nullable(true);
            $table->string('file_name', 255)->nullable(true);
            $table->string('file_type', 15)->nullable(true);
            $table->string('file_size', 15)->nullable(true);
            $table->string('file_path', 255)->nullable(true);
            $table->string('url', 255)->nullable(true);
            $table->boolean('default')->nullable(true);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('banner', function(Blueprint $table)
        {
            //
        });
	}

}
