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
        Schema::create('bien_immobiliers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->float('prix')->nullable();
            $table->foreignId('localite_id')->constrained();
            $table->foreignId('type_bien_id')->constrained();

            // relation avec proprietaire
            $table->bigInteger('proprietaire_id')->unsigned();
            $table->foreign('proprietaire_id')->references('id')->on('users');

            // relation avec agent
            $table->bigInteger('agent_id')->unsigned();
            $table->foreign('agent_id')->references('id')->on('users');



            // type maison
            $table->float('superficie')->nullable();
            $table->float('nbr_piece')->nullable();


            // typ terrain
            $table->float('prix_achat')->nullable();

            // type immeuble
            $table->string('nom_immeuble')->nullable();
            $table->integer('nbr_etage')->nullable();
            $table->float('date_construction')->nullable();

            $table->boolean('etat')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bien_immobiliers');
    }
};
