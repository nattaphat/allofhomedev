<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCat2handTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cat_2hand', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('title')->nullable(false);
            $table->string('subtitle')->nullable(false);
            $table->string('shop_name')->nullable(true);
            $table->string('product_name')->nullable(false);
            $table->string('product_brand')->nullable(false);
            $table->string('product_model')->nullable(false);
            $table->double('buy_price')->nullable(false);
            $table->double('sell_price')->nullable(false);
            $table->float('perfection')->nullable(false);
            $table->string('lifetime')->nullable(true);
            $table->string('earmark')->nullable(true);
            $table->string('other_detail')->nullable(true);
            $table->string('video_url')->nullable(true);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cat_2hand');
	}

}
