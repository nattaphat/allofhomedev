<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProjectBtsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop_project_bts', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('shop_id')->unsigned()->nullable(true);
            $table->foreign('shop_id')->references('id')->on('shop');
            $table->integer('branch_id')->unsigned()->nullable(true);
            $table->foreign('branch_id')->references('id')->on('branch');
            $table->integer('project_id')->unsigned()->nullable(true);
            $table->foreign('project_id')->references('id')->on('project');
            $table->integer('cat_buysellrent_id')->unsigned()->nullable(true);
            $table->foreign('cat_buysellrent_id')->references('id')->on('cat_buysellrent');
            $table->integer('cat_job_id')->unsigned()->nullable(true);
            $table->foreign('cat_job_id')->references('id')->on('cat_job');
            $table->integer('bts_id')->unsigned()->nullable(false);
            $table->foreign('bts_id')->references('id')->on('bts');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shop_project_bts');
	}

}
