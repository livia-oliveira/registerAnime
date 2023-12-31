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
        Schema::create('anime_authors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anime_id')
            ->constrained('animes')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            $table->foreignId('author_id')
            ->constrained('authors')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_authors');
    }
};
