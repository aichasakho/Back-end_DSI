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
        Schema::create('reglements', function (Blueprint $table) {
            $table->id();
            $table->date('date_reglement');
            $table->string('numero_reglement');
            $table->string('nom');

            // Relation avec le contrat
            $table->bigInteger('contrat_id')->unsigned();
            $table->foreign('contrat_id')->references('id')->on('contrats');

            // Relation avec l'agent
            $table->bigInteger('agent_id')->unsigned();
            $table->foreign('agent_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reglements');
    }
};
