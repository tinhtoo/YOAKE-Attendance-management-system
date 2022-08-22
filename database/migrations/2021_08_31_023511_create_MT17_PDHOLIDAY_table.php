<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT17PDHOLIDAYTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT17_PDHOLIDAY', function(Blueprint $table)
		{
			$table->string('EMP_CD', 10);
			$table->string('PD_YEAR', 4);
			$table->float('NUM_CARRYOVER', 53, 0);
			$table->smallInteger('MONTH_NO');
			$table->string('PD_MONTH', 2);
			$table->float('PD_OFFSET', 53, 0);
			$table->float('PD_USED', 53, 0);
			$table->primary(['EMP_CD','PD_YEAR','MONTH_NO'], 'PK_MT17_PDHOLIDAY');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT17_PDHOLIDAY');
	}

}
