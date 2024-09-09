<?php

use App\Models\Categorie;
use App\Models\Proprietaire;
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
            $table->string('titre');
            $table->string('superficie');
            $table->string('prix_location');
            $table->string('image');
            $table->boolean('status');
            $table->foreignIdFor(Proprietaire::class);
            $table->foreignIdFor(Categorie::class)->nullable();
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
