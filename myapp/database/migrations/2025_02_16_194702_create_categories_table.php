<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();                                           // Auto-increment primary key
            $table->string('name')->unique();               // Nom de la catégorie (unique)
            $table->decimal('prix', 8, 2);   // Prix avec 8 chiffres au total et 2 décimales
            $table->timestamps();                                   // Champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};