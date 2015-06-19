<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableBrand extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brand', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('attachment_id')->unsigned()->nullable(true);
            $table->foreign('attachment_id')->references('id')->on('attachment')
                ->onDelete('cascade');

            $table->string('type', 10)->nullable(true);

            $table->string('brand_name', 255)->nullable(true);
            $table->boolean('suggest')->nullable(true);
            $table->string('telephone', 100)->nullable(true);
            $table->string('email', 100)->nullable(true);
            $table->string('facebook', 100)->nullable(true);
            $table->string('line', 100)->nullable(true);

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
		Schema::drop('brand');
	}

}
