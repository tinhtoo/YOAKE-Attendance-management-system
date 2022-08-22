<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT09REASONTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT09_REASON', function(Blueprint $table)
		{
			$table->string('REASON_CD', 2)->primary('PK_MT09_REASON');
			$table->string('REASON_NAME', 20);
			$table->string('WORKDAY_CLS_CD', 2);
			$table->string('HOLWORK_CLS_CD', 2);
			$table->string('SPCHOL_CLS_CD', 2);
			$table->string('PADHOL_CLS_CD', 2);
			$table->string('ABCWORK_CLS_CD', 2);
			$table->string('COMPDAY_CLS_CD', 2);
			$table->float('WORKDAY_NO', 53, 0);
			$table->string('REASON_PTN_CD', 2);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
			$table->float('RSV1_NUM', 53, 0);
			$table->float('RSV2_NUM', 53, 0);
			$table->string('SUBHOL_CLS_CD', 2);
			$table->string('SUBWORK_CLS_CD', 2);
			$table->string('REASON_MARK', 4);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT09_REASON');
	}

}
