<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT50LUNCHTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT50_LUNCH', function(Blueprint $table)
		{
			$table->string('LUNCH_CD', 10)->primary('PK_MT50_LUNCH');
			$table->string('LUNCH_NAME', 40);
			$table->string('LUNCH_ABR', 20);
			$table->string('SPLYER_CD', 10);
			$table->integer('LUNCH_AMT');
			$table->string('APL_DATE', 8);
			$table->string('APL_DATE_YEAR', 4);
			$table->string('APL_DATE_MONTH', 2);
			$table->string('APL_DATE_DAY', 2);
			$table->string('REMARK', 30);
			$table->string('DISP_CLS_CD', 2);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
			$table->string('RSV1_TXT', 30);
			$table->string('RSV2_TXT', 30);
			$table->dateTime('UPD_DATE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT50_LUNCH');
	}

}
