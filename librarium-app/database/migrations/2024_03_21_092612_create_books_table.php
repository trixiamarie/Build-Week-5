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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('cover');
            $table->string('title');
            $table->date('released');
            $table->string('publisher');
            $table->text('plot');
            $table->bigInteger('isbn');
            $table->foreignId('author')->constrained('authors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('genre')->nullable()->constrained('genres')->onUpdate('cascade')->onDelete('set null');
            $table->bigInteger('copies')->default(5);
            $table->string('category')->default('All');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
