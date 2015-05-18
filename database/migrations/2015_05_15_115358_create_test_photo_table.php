<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('test_photo', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('path')->nullable(false);

            $table->integer('imageable_id')->nullable(false);

            $table->string('imageable_type')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('test_photo');
    }

}
