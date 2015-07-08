<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCatConstructV2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_construct', function(Blueprint $table)
		{
            $table->integer('business_type_id')->unsigned()->nullable(true);
            $table->foreign('business_type_id')->references('id')->on('business_type')
                ->onDelete('cascade');

            $table->string('service_day_time', 500)->nullable(true);
            $table->boolean('credit_card')->nullable(true);
            $table->boolean('parking')->nullable(true);
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
