<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortsLaitsTable extends Migration
{
	public function up()
	{
		Schema::create('sortsLaits', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('id_invoPate')->unsigned()->index();
			$table->string('quantity');
			$table->float('prix', 8, 2);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sortsLaits');
	}
}