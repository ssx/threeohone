<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedirectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('redirects', function (Blueprint $table) {
			$table->increments('id');
			$table->enum('type', [ "domain", "path" ]);
			$table->enum('status', [ "active", "suspended" ]);
			$table->timestamps();
			$table->string('from');
			$table->string('to');
			$table->integer('hits');
            $table->index(['type', 'from']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('redirects');
	}

}
