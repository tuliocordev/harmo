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
        Schema::create('songs', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique();
        $table->foreignId('artist_id')->constrained()->cascadeOnDelete();
        $table->foreignId('album_id')->nullable()->constrained()->nullOnDelete();
        $table->foreignId('genre_id')->nullable()->constrained()->nullOnDelete();
        $table->smallInteger('duration')->unsigned()->nullable();
        $table->tinyInteger('track_number')->unsigned()->nullable();
        $table->longText('lyrics')->nullable();
        $table->string('cover')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
