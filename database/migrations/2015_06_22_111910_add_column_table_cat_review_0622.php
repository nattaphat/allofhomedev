<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTableCatReview0622 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_review', function(Blueprint $table)
		{
            $table->integer('cat_home_id')->unsigned()->nullable(false);
            $table->foreign('cat_home_id')->references('id')->on('cat_home')
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
		Schema::table('cat_review', function(Blueprint $table)
		{
			//
		});
	}

}
