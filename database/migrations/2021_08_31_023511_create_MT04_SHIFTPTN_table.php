<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT04SHIFTPTNTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT04_SHIFTPTN', function(Blueprint $table)
		{
			$table->string('SHIFTPTN_CD', 3);
			$table->string('SHIFTPTN_NAME', 20);
			$table->smallInteger('DAY_NO');
			$table->string('WORKPTN_CD', 3);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
			$table->dateTime('UPD_DATE');
			$table->primary(['SHIFTPTN_CD','DAY_NO'], 'PK_MT04_SHIFTPTN');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT04_SHIFTPTN');
	}

}
