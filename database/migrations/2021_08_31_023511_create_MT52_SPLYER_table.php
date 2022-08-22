<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT52SPLYERTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT52_SPLYER', function(Blueprint $table)
		{
			$table->string('SPLYER_CD', 10)->primary('PK_MT52_SPLYER');
			$table->string('SPLYER_NAME', 40);
			$table->string('SPLYER_KANA', 40);
			$table->string('SPLYER_ABR', 20);
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
		Schema::drop('MT52_SPLYER');
	}

}
