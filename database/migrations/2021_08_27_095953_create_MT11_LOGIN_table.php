<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT11LOGINTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT11_LOGIN', function(Blueprint $table)
		{
			$table->string('EMP_CD', 10)->primary('PK_MT11_LOGIN');
			$table->string('LOGIN_ID', 10);
			$table->string('PASSWORD', 10);
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
		Schema::drop('MT11_LOGIN');
	}

}
