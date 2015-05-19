<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProjectAplinkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_aplink', function(Blueprint $table)
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

            $table->integer('project_aplinkable_id')->nullable(false);
            $table->string('project_aplinkable_type')->nullable(false);

            $table->integer('apl_id')->unsigned()->nullable(false);
            $table->foreign('apl_id')->references('id')->on('airport_link')
                ->onDelete('cascade');

            $table->unique(['project_aplinkable_id','project_aplinkable_type', 'apl_id']);

//            $table->unique(['project_aplinkable_id','branch_id','project_id',
//                'cat_buysellrent_id','cat_job_id','apl_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_aplink');
	}

}
