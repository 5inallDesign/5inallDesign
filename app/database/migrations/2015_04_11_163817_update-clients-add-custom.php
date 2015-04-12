<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClientsAddCustom extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clients', function($table)
		{
			$table->boolean('is_custom')->default(false);
			$table->boolean('is_active')->default(true);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('clients', function($table)
		{
			$table->dropColumn('is_custom');
			$table->dropColumn('is_active');
		});
	}

}
