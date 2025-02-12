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
        Schema::create('tuition_posts', function (Blueprint $table) {
            $table->id();
            $table->string('subject_id')->constrained(); // Links to subjects
            $table->decimal('fee', 8, 2); // Tuition fee
            $table->integer('max_students');
            $table->foreignId('category_id')->constrained(); // Links to categories
            $table->foreignId('user_id')->constrained(); // Links to tutors
            $table->string('photo_path')->nullable(); // Optional photo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuition_posts');
    }
};
