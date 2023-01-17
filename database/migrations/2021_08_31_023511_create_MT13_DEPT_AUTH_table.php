<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT13DEPTAUTHTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT13_DEPT_AUTH', function(Blueprint $table)
		{
			$table->string('DEPT_AUTH_CD', 6);
			$table->string('DEPT_AUTH_NAME', 20);
			$table->string('DEPT_CD', 6);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
			$table->dateTime('UPD_DATE');
			$table->primary(['DEPT_AUTH_CD','DEPT_CD'], 'PK_MT13_DEPT_AUTH');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT13_DEPT_AUTH');
	}

}
