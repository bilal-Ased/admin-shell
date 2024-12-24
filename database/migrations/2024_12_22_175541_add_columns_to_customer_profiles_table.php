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
        Schema::table('customer_profiles', function (Blueprint $table) {
            $table->boolean('bleeding')->default(false);
            $table->boolean('heart_disease')->default(false);
            $table->boolean('drug_therapy')->default(false);
            $table->boolean('pregnancy')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_profiles', function (Blueprint $table) {
            $table->dropColumn('bleeding');
            $table->dropColumn('heart_disease');
            $table->dropColumn('drug_therapy');
            $table->dropColumn('pregnancy');
        });
    }
};
