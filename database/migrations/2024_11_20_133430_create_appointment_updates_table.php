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
        Schema::create('appointment_updates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id'); // Foreign Key to appointments table
            $table->unsignedBigInteger('user_id'); // User making the update
            $table->dateTime('update_date'); // When the update occurred
            $table->string('worked_teeth')->nullable(); // Treated tooth/teeth
            $table->text('comments')->nullable(); // Additional comments
            $table->json('files')->nullable(); // Files metadata (e.g., URLs/paths)
            $table->unsignedBigInteger('status_id')->nullable(); // Status of appointment after the update
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_updates');
    }
};
