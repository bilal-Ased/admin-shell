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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');

            // Associated dentist (user)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            // Associated department (optional)
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments');

            // Appointment details
            $table->datetime('appointment_datetime');
            $table->text('reason')->nullable(); // Reason for the appointment
            $table->text('notes')->nullable(); // Additional notes or instructions

            // Metadata
            $table->unsignedBigInteger('created_by'); // ID of the user who created the appointment
            $table->foreign('created_by')->references('id')->on('users');
            // You can add more metadata fields as needed (e.g., 'updated_by', 'deleted_at' for soft delete)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
