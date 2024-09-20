<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('numero_contrat');
            $table->foreignId('bien_immobilier_id')->constrained();

            // relation avec le proprietaire
            $table->bigInteger('proprietaire_id')->unsigned();
            $table->foreign('proprietaire_id')->references('id')->on('users');

            // relation avec le client
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users');

            // relation avec l'agent
            $table->bigInteger('agent_id')->unsigned();
            $table->foreign('agent_id')->references('id')->on('users');

            $table->date('date_debut');
            $table->date('date_fin');

            $table->float('montant');

            $table->string('type_contrat');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
