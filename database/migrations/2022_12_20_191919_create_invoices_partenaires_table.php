<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesPartenairesTable extends Migration
{

	public function up()
	{
		Schema::create('invoicesPartenaires', function (Blueprint $table) {
			$table->id();

			$table->bigInteger('id_partenaire')->unsigned()->index();
			$table->string('date_payer')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('invoicesPartenaires');
	}
}