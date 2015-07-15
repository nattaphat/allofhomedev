<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSellPriceCatConstructTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_construct', function(Blueprint $table)
		{
            $table->string('sell_price', 200)->nullable(true);
            $table->text('sell_price_detail')->nullable(true);
            $table->double('avg_rating')->nullable(false)->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cat_construct', function(Blueprint $table)
		{
			//
		});
	}

}
