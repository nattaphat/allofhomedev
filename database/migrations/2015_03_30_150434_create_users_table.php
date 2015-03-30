<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('salary_id');
            $table->foreign('salary_id')->references('id')->on('salary');
            $table->integer('attachment_id');
            $table->foreign('attachment_id')->references('id')->on('attachment');
            $table->string('username')->nullable(false);
            $table->string('password', 50)->nullable(false);
            $table->integer('role')->nullable(false);
            $table->string('firstname')->nullable(false);
            $table->string('lastname')->nullable(false);
			$table->string('email')->unique()->nullable(false);
            $table->string('telephone');
            $table->date('birthday');
            $table->string('sex',15);
            $table->text('address');
            $table->string('occupation');
            $table->boolean('receive_news')->default(true);
            $table->string('signup_type')->nullable(false);
            $table->dateTime('last_login');
            $table->boolean('status')->default(true);
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
