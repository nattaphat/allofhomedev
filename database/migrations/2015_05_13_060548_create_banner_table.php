<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('banner', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('attachment_id')->unsigned()->nullable(false);
            $table->foreign('attachment_id')->references('id')->on('attachment')
                ->onDelete('cascade');

            $table->integer('type')->nullable(false);
            $table->string('path_url')->nullable(false);
            $table->boolean('visible')->nullable(false);
            $table->string('remark')->nullable(true);
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
        Schema::drop('banner');
    }

}
