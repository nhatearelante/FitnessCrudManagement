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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('difficulty', ['Beginner', 'Intermediate', 'Advanced'])->default('Beginner');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->unsignedBigInteger('trainer_id');
            $table->foreign('trainer_id')->references('id')->on('trainers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
