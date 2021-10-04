<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT10EMPTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT10_EMP', function(Blueprint $table)
		{
			$table->string('EMP_CD', 10)->primary('PK_MT10_EMP');
			$table->string('EMP_NAME', 30);
			$table->string('EMP_KANA', 30);
			$table->string('EMP_ABR', 15);
			$table->string('DEPT_CD', 6);
			$table->string('ENT_DATE', 8);
			$table->string('ENT_YEAR', 4);
			$table->string('ENT_MONTH', 2);
			$table->string('ENT_DAY', 2);
			$table->string('RET_DATE', 8);
			$table->string('RET_YEAR', 4);
			$table->string('RET_MONTH', 2);
			$table->string('RET_DAY', 2);
			$table->string('REG_CLS_CD', 2);
			$table->string('BIRTH_DATE', 8);
			$table->string('BIRTH_YEAR', 4);
			$table->string('BIRTH_MONTH', 2);
			$table->string('BIRTH_DAY', 2);
			$table->string('SEX_CLS_CD', 2);
			$table->string('EMP_CLS1_CD', 6);
			$table->string('EMP_CLS2_CD', 6);
			$table->string('EMP_CLS3_CD', 6);
			$table->string('CALENDAR_CD', 3);
			$table->string('DEPT_AUTH_CD', 6);
			$table->string('PG_AUTH_CD', 6);
			$table->string('POST_CD', 10);
			$table->string('ADDRESS1', 30);
			$table->string('ADDRESS2', 30);
			$table->string('TEL', 20);
			$table->string('CELLULAR', 20);
			$table->string('MAIL', 50);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
			$table->dateTime('UPD_DATE');
			$table->string('PH_GRANT', 6);
			$table->string('PH_GRANT_YEAR', 4);
			$table->string('PH_GRANT_MONTH', 2);
			$table->string('CLOSING_DATE_CD', 2)->default('15');
			$table->string('COMPANY_CD', 10)->default('');
			$table->string('EMP2_CD', 10)->default('');
			$table->string('EMP3_CD', 10)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT10_EMP');
	}

}
