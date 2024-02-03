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
        Schema::create('insurance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id'); // Update the foreign key
            $table->string('insurance_company_name');
            $table->string('policy_id');
            $table->string('group_number')->nullable();
            $table->string('coverage_type');
            $table->date('coverage_start_date');
            $table->date('coverage_end_date')->nullable();
            $table->decimal('annual_max')->nullable();
            $table->decimal('co_payment_preventive')->nullable();
            $table->decimal('co_payment_basic')->nullable();
            $table->decimal('co_payment_major')->nullable();
            $table->decimal('deductible')->nullable();
            $table->boolean('pre_approval_required')->default(false);

            // Additional dental-specific details
            $table->string('provider_name')->nullable();
            $table->string('provider_phone')->nullable();
            $table->string('dentist_name')->nullable();

            // Add more columns as needed

            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade'); // Update the table reference
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance');
    }
};
