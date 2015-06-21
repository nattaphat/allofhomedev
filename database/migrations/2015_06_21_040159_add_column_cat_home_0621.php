<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCatHome0621 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_home', function(Blueprint $table)
		{
            $table->integer('brand_id')->unsigned()->nullable(true);
            $table->foreign('brand_id')->references('id')->on('brand')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cat_home', function(Blueprint $table)
		{
			//
		});
	}

}
