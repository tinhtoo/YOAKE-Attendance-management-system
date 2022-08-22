<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT96TERMWEBTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT96_TERM_WEB', function(Blueprint $table)
		{
			$table->string('TERM_LOGIN_ID', 10)->primary('PK_MT96_TERM_WEB');
			$table->smallInteger('TERM_NO');
			$table->string('TERM_NAME', 15);
			$table->dateTime('UPD_DATE');
			$table->string('TERM_FILE_NAME', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT96_TERM_WEB');
	}

}
