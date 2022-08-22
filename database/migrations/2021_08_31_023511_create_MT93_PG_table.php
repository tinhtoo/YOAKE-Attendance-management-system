<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT93PGTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT93_PG', function(Blueprint $table)
		{
			$table->string('PG_CD', 6)->primary('PK_MT93_PG');
			$table->string('PG_NAME', 20);
			$table->string('MCLS_CD', 2);
			$table->string('MCLS_NAME', 20);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT93_PG');
	}

}
