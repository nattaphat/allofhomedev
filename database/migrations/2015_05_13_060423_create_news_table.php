<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('news', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('title')->nullable(false);
            $table->string('detail')->nullable(false);
            $table->boolean('status')->nullable(false);
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
        Schema::drop('news');
    }

}
