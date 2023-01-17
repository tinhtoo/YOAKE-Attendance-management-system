<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT07FRACTIONTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT07_FRACTION', function(Blueprint $table)
		{
			$table->string('WORKPTN_CD', 3)->primary('PK_MT07_FRACTION');
			$table->string('FRACTION_CLS_CD', 2);
			$table->smallInteger('WTHR_UNDER_MI')->nullable();
			$table->string('WTHR_FRC_CLS_CD', 2);
			$table->smallInteger('LTHR_UNDER_MI')->nullable();
			$table->string('LTHR_FRC_CLS_CD', 2);
			$table->smallInteger('ERHR_UNDER_MI')->nullable();
			$table->string('ERHR_FRC_CLS_CD', 2);
			$table->smallInteger('OTHR_UNDER_MI')->nullable();
			$table->string('OTHR_FRC_CLS_CD', 2);
			$table->smallInteger('WTTM_UNDER_MI')->nullable();
			$table->string('WTTM_FRC_CLS_CD', 2);
			$table->smallInteger('LVTM_UNDER_MI')->nullable();
			$table->string('LVTM_FRC_CLS_CD', 2);
			$table->smallInteger('OTTM_UNDER_MI')->nullable();
			$table->string('OTTM_FRC_CLS_CD', 2);
			$table->smallInteger('RETM_UNDER_MI')->nullable();
			$table->string('RETM_FRC_CLS_CD', 2);
			$table->string('OVTM1_CD', 3);
			$table->smallInteger('OVTM1_UNDER_MI')->nullable();
			$table->string('OVTM1_FRC_CLS_CD', 2);
			$table->string('OVTM2_CD', 3);
			$table->smallInteger('OVTM2_UNDER_MI')->nullable();
			$table->string('OVTM2_FRC_CLS_CD', 2);
			$table->string('OVTM3_CD', 3);
			$table->smallInteger('OVTM3_UNDER_MI')->nullable();
			$table->string('OVTM3_FRC_CLS_CD', 2);
			$table->string('OVTM4_CD', 3);
			$table->smallInteger('OVTM4_UNDER_MI')->nullable();
			$table->string('OVTM4_FRC_CLS_CD', 2);
			$table->string('OVTM5_CD', 3);
			$table->smallInteger('OVTM5_UNDER_MI')->nullable();
			$table->string('OVTM5_FRC_CLS_CD', 2);
			$table->string('OVTM6_CD', 3);
			$table->smallInteger('OVTM6_UNDER_MI')->nullable();
			$table->string('OVTM6_FRC_CLS_CD', 2);
			$table->string('OVTM7_CD', 3);
			$table->smallInteger('OVTM7_UNDER_MI')->nullable();
			$table->string('OVTM7_FRC_CLS_CD', 2);
			$table->string('OVTM8_CD', 3);
			$table->smallInteger('OVTM8_UNDER_MI')->nullable();
			$table->string('OVTM8_FRC_CLS_CD', 2);
			$table->string('OVTM9_CD', 3);
			$table->smallInteger('OVTM9_UNDER_MI')->nullable();
			$table->string('OVTM9_FRC_CLS_CD', 2);
			$table->string('OVTM10_CD', 3);
			$table->smallInteger('OVTM10_UNDER_MI')->nullable();
			$table->string('OVTM10_FRC_CLS_CD', 2);
			$table->string('EXT1_CD', 3);
			$table->smallInteger('EXT1_UNDER_MI')->nullable();
			$table->string('EXT1_FRC_CLS_CD', 2);
			$table->string('EXT2_CD', 3);
			$table->smallInteger('EXT2_UNDER_MI')->nullable();
			$table->string('EXT2_FRC_CLS_CD', 2);
			$table->string('EXT3_CD', 3);
			$table->smallInteger('EXT3_UNDER_MI')->nullable();
			$table->string('EXT3_FRC_CLS_CD', 2);
			$table->string('EXT4_CD', 3);
			$table->smallInteger('EXT4_UNDER_MI')->nullable();
			$table->string('EXT4_FRC_CLS_CD', 2);
			$table->string('EXT5_CD', 3);
			$table->smallInteger('EXT5_UNDER_MI')->nullable();
			$table->string('EXT5_FRC_CLS_CD', 2);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
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
		Schema::drop('MT07_FRACTION');
	}

}
