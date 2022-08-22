<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT91CLSDETAILTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT91_CLS_DETAIL', function(Blueprint $table)
		{
			$table->string('CLS_CD', 2);
			$table->string('CLS_DETAIL_CD', 2);
			$table->string('CLS_DETAIL_NAME', 20);
			$table->primary(['CLS_CD','CLS_DETAIL_CD'], 'PK_MT91_CLS_DETAIL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT91_CLS_DETAIL');
	}

}
