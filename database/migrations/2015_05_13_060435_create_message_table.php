<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('message', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('receiver_id')->unsigned()->nullable(false);
            $table->foreign('receiver_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('sender_id')->unsigned()->nullable(false);
            $table->foreign('sender_id')->references('id')->on('users')
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
        Schema::drop('message');
    }

}
