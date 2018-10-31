<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('label');
            $table->timestamps();
        });

        \App\TransactionType::create([
            'name'  => 'debit',
            'label' => 'Débit'
        ]);

        \App\TransactionType::create([
            'name'  => 'credit',
            'label' => 'Crédit'
        ]);

        \App\TransactionType::create([
            'name'  => 'internal_transfert',
            'label' => 'Virement interne'
        ]);

        \App\TransactionType::create([
            'name'  => 'external_transfert',
            'label' => 'Virement externe'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_types');
    }
}
