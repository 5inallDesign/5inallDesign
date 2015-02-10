<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablesAddDisplayOrder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clients', function($table)
		{
			$table->integer('display_order')->default(999);
		});

		Schema::table('assets', function($table)
		{
			$table->integer('display_order')->default(999);
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
			$table->dropColumn('display_order');
		});

		Schema::table('assets', function($table)
		{
			$table->dropColumn('display_order');
		});
	}

}
