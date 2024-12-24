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
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('date_of_birth');
            $table->dropColumn('gender');
            $table->dropColumn('alternate_number');
            $table->integer('age')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            // Re-add the 'gender' column
            $table->dateTime('date_of_birth');
            $table->string('gender')->nullable();
            $table->string('alternate_number')->nullable();
            // Rename 'age' back to 'date_of_birth'
            $table->dropColumn('age')->nullable();
        });
    }
};
