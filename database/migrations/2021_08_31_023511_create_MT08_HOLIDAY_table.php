<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT08HOLIDAYTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT08_HOLIDAY', function(Blueprint $table)
		{
			$table->smallInteger('HLD_NO')->primary('PK_MT08_HOLIDAY');
			$table->string('HLD_DATE', 4);
			$table->string('HLD_MONTH', 2);
			$table->string('HLD_DAY', 2);
			$table->string('HLD_NAME', 30);
			$table->string('HLD_CLS_CD', 2);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT08_HOLIDAY');
	}

}
