<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT94WORKDESCTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT94_WORK_DESC', function(Blueprint $table)
		{
			$table->string('WORK_DESC_CD', 3)->primary('PK_MT94_WORK_DESC');
			$table->string('WORK_DESC_NAME', 20);
			$table->string('WORK_DESC_CLS_CD', 2);
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
		Schema::drop('MT94_WORK_DESC');
	}

}
