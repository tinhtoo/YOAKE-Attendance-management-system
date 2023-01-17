<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT06OVERTMLMTTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT06_OVERTM_LMT', function(Blueprint $table)
		{
			$table->string('CALENDAR_CD', 3)->primary('PK_MT06_OVERTM_LMT');
			$table->string('OVTM1_CD', 3)->nullable();
			$table->smallInteger('OVTM1_HR')->nullable();
			$table->string('OVTM2_CD', 3)->nullable();
			$table->smallInteger('OVTM2_HR')->nullable();
			$table->string('OVTM3_CD', 3)->nullable();
			$table->smallInteger('OVTM3_HR')->nullable();
			$table->string('OVTM4_CD', 3)->nullable();
			$table->smallInteger('OVTM4_HR')->nullable();
			$table->string('OVTM5_CD', 3)->nullable();
			$table->smallInteger('OVTM5_HR')->nullable();
			$table->string('OVTM6_CD', 3)->nullable();
			$table->smallInteger('OVTM6_HR')->nullable();
			$table->string('OVTM7_CD', 3)->nullable();
			$table->smallInteger('OVTM7_HR')->nullable();
			$table->string('OVTM8_CD', 3)->nullable();
			$table->smallInteger('OVTM8_HR')->nullable();
			$table->string('OVTM9_CD', 3)->nullable();
			$table->smallInteger('OVTM9_HR')->nullable();
			$table->string('OVTM10_CD', 3)->nullable();
			$table->smallInteger('OVTM10_HR')->nullable();
			$table->smallInteger('NO_OVERTM_MI');
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
			$table->dateTime('UPD_DATE');
			$table->smallInteger('TTL_OVTM1_HR');
			$table->smallInteger('TTL_OVTM2_HR');
			$table->smallInteger('TTL_OVTM3_HR');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT06_OVERTM_LMT');
	}

}
