<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCatReviewV1 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_review', function(Blueprint $table)
		{
			$table->integer('reviewable_id')->nullable(false);
            $table->string('reviewable_type')->nullable(false);
            $table->dropColumn(['shop_id','branch_id','project_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cat_review', function(Blueprint $table)
		{
			//
		});
	}

}
