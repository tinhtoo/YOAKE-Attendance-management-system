<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT92DESCDETAILTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT92_DESC_DETAIL', function(Blueprint $table)
		{
			$table->string('CLS_CD', 2);
			$table->string('DESC_DETAIL_CD', 6);
			$table->string('DESC_DETAIL_NAME', 20);
			$table->primary(['CLS_CD','DESC_DETAIL_CD'], 'PK_MT92_DESC_DETAIL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT92_DESC_DETAIL');
	}

}
