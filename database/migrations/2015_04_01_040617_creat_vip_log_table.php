<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatVipLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('vip_log', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('from_date')->nullable(false);
            $table->dateTime('to_date')->nullable(false);
            $table->dateTime('payment_datetime')->nullable(false);
            $table->float('payment_amount')->nullable(false);
            $table->string('payment_type')->nullable(false);
            $table->string('remark')->nullable(false);
            $table->integer('attachment_id')->nullable(true);
            $table->foreign('attachment_id')->references('id')->on('attachment');
            $table->integer('update_by')->nullable(false);
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
		Schema::drop('vip_log');
	}

}
