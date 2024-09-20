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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('tel')->unique();
            $table->enum('role', ['admin', 'proprietaire', 'client'])->default('client');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cni')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ninea')->nullable();
            $table->string('registreDeCommerce')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
