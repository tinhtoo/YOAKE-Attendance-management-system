<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT12DEPTTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT12_DEPT', function(Blueprint $table)
		{
			$table->string('DEPT_CD', 6)->primary('PK_MT12_DEPT');
			$table->string('DEPT_NAME', 20);
			$table->string('UP_DEPT_CD', 6);
			$table->smallInteger('LEVEL_NO');
			$table->string('DISP_CLS_CD', 2);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
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
		Schema::drop('MT12_DEPT');
	}

}
