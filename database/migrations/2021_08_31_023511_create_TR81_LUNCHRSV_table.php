<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTR81LUNCHRSVTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TR81_LUNCHRSV', function(Blueprint $table)
		{
			$table->string('CALD_YEAR', 4);
			$table->string('CALD_MONTH', 2);
			$table->string('EMP_CD', 10);
			$table->dateTime('CALD_DATE');
			$table->string('LUNCH_CD', 10);
			$table->string('FIX_CLS_CD', 2);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV1_TXT', 30);
			$table->dateTime('RSV1_DATE')->nullable();
			$table->integer('RSV1_NUM');
			$table->dateTime('UPD_DATE');
			$table->primary(['CALD_YEAR','CALD_MONTH','EMP_CD','CALD_DATE'], 'PK_TR81_LUNCHRSV');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('TR81_LUNCHRSV');
	}

}
