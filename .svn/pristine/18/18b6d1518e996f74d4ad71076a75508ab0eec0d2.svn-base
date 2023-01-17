<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT23COMPANYTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT23_COMPANY', function(Blueprint $table)
		{
			$table->string('COMPANY_CD', 10)->primary('PK_MT23_COMPANY');
			$table->string('COMPANY_NAME', 40);
			$table->string('COMPANY_KANA', 40);
			$table->string('COMPANY_ABR', 20);
			$table->string('POST_CD', 10);
			$table->string('ADDRESS1', 30);
			$table->string('ADDRESS2', 30);
			$table->string('ADDRESS3', 30);
			$table->string('TEL', 20);
			$table->string('FAX', 20);
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
		Schema::drop('MT23_COMPANY');
	}

}
