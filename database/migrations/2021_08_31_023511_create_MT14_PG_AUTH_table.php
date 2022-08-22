<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT14PGAUTHTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT14_PG_AUTH', function(Blueprint $table)
		{
			$table->string('PG_AUTH_CD', 6);
			$table->string('PG_AUTH_NAME', 20);
			$table->string('PG_CD', 6);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
			$table->dateTime('UPD_DATE');
			$table->primary(['PG_AUTH_CD','PG_CD'], 'PK_MT14_PG_AUTH');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT14_PG_AUTH');
	}

}
