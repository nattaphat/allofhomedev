<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatConstructTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('cat_construct', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('shop_id')->unsigned()->nullable(false);
            $table->foreign('shop_id')->references('id')->on('shop')
                ->onDelete('cascade');

            $table->string('title', 100)->nullable(false);
            $table->string('subtitle', 500)->nullable(false);
            $table->string('for_type', 50)->nullable(false);

            $table->text('other_detail')->nullable(true);

            $table->boolean('vip')->nullable(false)->default(false);
            $table->integer('status')->nullable(false)->default(0);

            $table->integer('num_view')->nullable(false)->default(0);
            $table->integer('num_shared')->nullable(false)->default(0);
            $table->integer('num_comment')->nullable(false)->default(0);
            $table->integer('num_rating')->nullable(false)->default(0);

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
        Schema::drop('cat_construct');
	}

}
