<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function($table)
		{
			$table->timestamps();
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->boolean('is_featured');
			$table->string('city');
			$table->string('state');
			$table->string('services_provided');
			$table->string('url');
			$table->boolean('is_use_url');
			$table->text('description');
		});

		Schema::create('assets', function($table)
		{
		    $table->timestamps();
		    $table->increments('id');
		    $table->text('path');
		    $table->string('type');
			$table->boolean('is_featured');
		    $table->text('short_description');
		    $table->text('description');
		    $table->integer('client_id');
		    $table->string('client_name');
		    $table->string('client_slug');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
		Schema::drop('assets');
	}

}
