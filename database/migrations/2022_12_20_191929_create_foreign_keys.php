<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{

	public function up()
	{
		Schema::table('invoicesPartenaires', function (Blueprint $table) {
			$table->foreign('id_partenaire')
				->references('id')
				->on('partenaires')
				->onDelete('cascade');
		});

		Schema::table('sortsLaits', function (Blueprint $table) {
			$table->foreign('id_invoPate')
				->references('id')
				->on('invoicesPartenaires')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::table('invoicesPartenaire', function (Blueprint $table) {
			$table->dropForeign('invoices_partenaires_id_partenaire_foreign');
		});

		Schema::table('sortsLaits', function (Blueprint $table) {
			$table->dropForeign('sorts_laits_id_invoice_patenaires_foreign');
		});
	}
}