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
		Schema::create('project_bts', function(Blueprint $table)
		{
			$table->increments('id');

//            $table->integer('shop_id')->unsigned()->nullable(true);
//            $table->foreign('shop_id')->references('id')->on('shop')
//                ->onDelete('cascade');
//
//            $table->integer('branch_id')->unsigned()->nullable(true);
//            $table->foreign('branch_id')->references('id')->on('branch')
//                ->onDelete('cascade');
//
//            $table->integer('project_id')->unsigned()->nullable(true);
//            $table->foreign('project_id')->references('id')->on('project')
//                ->onDelete('cascade');
//
//            $table->integer('cat_buysellrent_id')->unsigned()->nullable(true);
//            $table->foreign('cat_buysellrent_id')->references('id')->on('cat_buysellrent')
//                ->onDelete('cascade');
//
//            $table->integer('cat_job_id')->unsigned()->nullable(true);
//            $table->foreign('cat_job_id')->references('id')->on('cat_job')
//                ->onDelete('cascade');

            $table->integer('project_btsable_id')->nullable(false);
            $table->string('project_btsable_type')->nullable(false);

            $table->integer('bts_id')->unsigned()->nullable(false);
            $table->foreign('bts_id')->references('id')->on('bts')
                ->onDelete('cascade');

           $table->unique(['project_btsable_id','project_btsable_type', 'bts_id']);

//            $table->unique(['shop_id','branch_id','project_id',
//                'cat_buysellrent_id','cat_job_id','bts_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_bts');
	}

}
