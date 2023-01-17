<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT01CONTROLTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT01_CONTROL', function(Blueprint $table)
		{
			$table->string('CONTROL_CD', 1)->primary('PK_MT01_CONTROL');
			$table->string('COMPANY_NAME', 30);
			$table->string('COMPANY_KANA', 30);
			$table->string('COMPANY_ABR_NAME', 20);
			$table->string('POST_CD', 10);
			$table->string('ADDRESS1', 30);
			$table->string('ADDRESS2', 30);
			$table->string('ADDRESS3', 30);
			$table->string('TEL', 20);
			$table->string('FAX', 20);
			$table->string('MAIL', 50);
			$table->string('URL', 50);
			$table->smallInteger('CLOSING_DATE');
			$table->string('MONTH_CLS_CD', 2);
			$table->string('TERM_STR_MONTH', 2);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
			$table->string('REMARK1', 30);
			$table->string('REMARK2', 30);
			$table->dateTime('UPD_DATE');
			$table->string('EMPFILE_PATH', 100);
			$table->string('RSV1_PATH', 100);
			$table->string('RSV2_PATH', 100);
			$table->smallInteger('ADD_ZERO_NUM');
			$table->string('COMNT1', 200);
			$table->string('COMNT2', 200);
			$table->string('COMNT3', 200);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT01_CONTROL');
	}

}
