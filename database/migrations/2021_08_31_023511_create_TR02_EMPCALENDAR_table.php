<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTR02EMPCALENDARTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TR02_EMPCALENDAR', function(Blueprint $table)
		{
			$table->string('CALD_YEAR', 4);
			$table->string('CALD_MONTH', 2);
			$table->string('EMP_CD', 10);
			$table->string('LAST_PTN_CD', 3)->nullable();
			$table->smallInteger('LAST_DAY_NO')->nullable();
			$table->primary(['CALD_YEAR','CALD_MONTH','EMP_CD'], 'PK_TR02_EMPCALENDAR');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('TR02_EMPCALENDAR');
	}

}
