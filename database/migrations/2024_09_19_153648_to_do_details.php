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
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('title');  // Task title
            $table->text('description')->nullable();  // Task description
            $table->string('category');  // Task category (e.g., Work, Personal)
            $table->enum('priority', ['low', 'medium', 'high']);  // Task priority
            $table->dateTime('due_date');  // Task deadline
            $table->boolean('is_completed')->default(false);  // Completion status
            $table->string('recurrence')->nullable();  // Task recurrence (e.g., daily, weekly)
            $table->timestamps();  // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
