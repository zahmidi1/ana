<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartenairesTable extends Migration
{

	public function up()
	{
		Schema::create('partenaires', function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->string('name', 255);
			$table->string('cin', 255)->nullable();
			$table->string('adress', 255)->nullable();
			$table->string('telephone', 255)->nullable();
			$table->string('email', 255)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('partenaires');
	}
}