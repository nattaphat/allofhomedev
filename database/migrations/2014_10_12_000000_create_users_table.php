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
            $table->integer('user_role_id');
            $table->integer('salary_id');
            $table->string('username');
            $table->string('password', 60);
            $table->string('firstname');
            $table->string('lastname');
			$table->string('email')->unique();
            $table->string('telephone');
            $table->date('birthday');
            $table->string('sex',15);
            $table->text('address');
            $table->string('occupation');
            $table->boolean('receive_news');
            $table->string('signup_type');
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
