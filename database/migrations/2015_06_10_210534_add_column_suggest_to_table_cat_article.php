<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSuggestToTableCatArticle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_article', function(Blueprint $table)
		{
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
		Schema::table('cat_article', function(Blueprint $table)
		{

		});
	}

}
