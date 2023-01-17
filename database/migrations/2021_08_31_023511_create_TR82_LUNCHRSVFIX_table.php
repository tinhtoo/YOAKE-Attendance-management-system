<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTR82LUNCHRSVFIXTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TR82_LUNCHRSVFIX', function(Blueprint $table)
		{
			$table->string('LUNCHRSVFIX_CD', 1)->primary('PK_TR82_LUNCHRSVFIX');
			$table->dateTime('FIX_DATE');
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
		Schema::drop('TR82_LUNCHRSVFIX');
	}

}
