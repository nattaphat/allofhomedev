<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllColumnCatIdea extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_idea', function(Blueprint $table)
		{
            $table->integer('num_view')->nullable(false)->default(0);
            $table->integer('num_shared')->nullable(false)->default(0);
            $table->integer('num_comment')->nullable(false)->default(0);

            $table->boolean('suggest')->nullable(false)->default(false);
            $table->boolean('visible')->nullable(false)->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cat_idea', function(Blueprint $table)
		{
			//
		});
	}

}
