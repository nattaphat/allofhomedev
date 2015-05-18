<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProjectMrtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop_project_mrt', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('shop_id')->unsigned()->nullable(true);
            $table->foreign('shop_id')->references('id')->on('shop')
                ->onDelete('cascade');

            $table->integer('branch_id')->unsigned()->nullable(true);
            $table->foreign('branch_id')->references('id')->on('branch')
                ->onDelete('cascade');

            $table->integer('project_id')->unsigned()->nullable(true);
            $table->foreign('project_id')->references('id')->on('project')
                ->onDelete('cascade');

            $table->integer('cat_buysellrent_id')->unsigned()->nullable(true);
            $table->foreign('cat_buysellrent_id')->references('id')->on('cat_buysellrent')
                ->onDelete('cascade');

            $table->integer('cat_job_id')->unsigned()->nullable(true);
            $table->foreign('cat_job_id')->references('id')->on('cat_job')
                ->onDelete('cascade');

            $table->integer('mrt_id')->unsigned()->nullable(false);
            $table->foreign('mrt_id')->references('id')->on('mrt')
                ->onDelete('cascade');

            $table->unique(['shop_id','branch_id','project_id',
                'cat_buysellrent_id','cat_job_id','mrt_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shop_project_mrt');
	}

}
