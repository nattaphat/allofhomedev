<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCatConstructTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cat_construct', function(Blueprint $table)
		{
            $table->string('latitude')->nullable(true);
            $table->string('longitude')->nullable(true);
            $table->string('add_no')->nullable(true);
            $table->string('add_building')->nullable(true);
            $table->string('add_floor')->nullable(true);
            $table->string('add_street')->nullable(true);
            $table->string('tambid',2)->nullable(true);
            $table->string('amphid',2)->nullable(true);

            $table->string('provid', 2)->nullable(true);
            $table->foreign(['provid', 'amphid', 'tambid'])
                ->references(['provid', 'amphid', 'tambid'])->on('geo_tambon')
                ->onDelete('cascade');

            $table->integer('region_id')->unsigned()->nullable(true);
            $table->foreign('region_id')->references('id')->on('geo_region')
                ->onDelete('cascade');

            $table->string('map_url', 255)->nullable(true);
            $table->string('video_url', 255)->nullable(true);
            $table->string('website',255)->nullable(true);

            $table->integer('brand_id')->unsigned()->nullable(true);
            $table->foreign('brand_id')->references('id')->on('brand')
                ->onDelete('cascade');
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
