<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT22CLOSINGDATETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT22_CLOSING_DATE', function(Blueprint $table)
		{
			$table->string('CLOSING_DATE_CD', 2)->primary('PK_MT22_CLOSING_DATE');
			$table->smallInteger('CLOSING_DATE');
			$table->string('MONTH_CLS_CD', 2);
			$table->string('CLOSING_DATE_NAME', 20);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT22_CLOSING_DATE');
	}

}
