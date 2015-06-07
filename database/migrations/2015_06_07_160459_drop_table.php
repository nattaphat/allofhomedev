<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::dropIfExists('pic_layout');
        Schema::dropIfExists('cat_home_promotion');
        Schema::dropIfExists('cat_home');
        Schema::dropIfExists('project_rating');
        Schema::dropIfExists('project');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

	}

}
