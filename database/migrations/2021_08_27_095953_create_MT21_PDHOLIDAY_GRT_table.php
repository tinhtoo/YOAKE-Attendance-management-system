<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT21PDHOLIDAYGRTTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT21_PDHOLIDAY_GRT', function(Blueprint $table)
		{
			$table->smallInteger('GRT_NO')->primary('PK_MT21_PDHOLIDAY_GRT');
			$table->smallInteger('WORK_YEAR');
			$table->smallInteger('WORK_MONTH');
			$table->float('PD_GRANT_NUM', 53, 0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT21_PDHOLIDAY_GRT');
	}

}
