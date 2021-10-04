<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTR05WORKTIMEFIXDLYTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TR05_WORKTIMEFIXDLY', function(Blueprint $table)
		{
			$table->dateTime('CALD_DATE');
			$table->string('DEPT_CD', 6);
			$table->smallInteger('FIX_CNT');
			$table->dateTime('UPD_DATE');
			$table->primary(['CALD_DATE','DEPT_CD'], 'PK_TR05_WORKTIMEFIXDLY');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('TR05_WORKTIMEFIXDLY');
	}

}
