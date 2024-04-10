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
        Schema::table('material_project', function (Blueprint $table) {
            $table->integer('quantity')->unsigned()->default(1); // Example datatype and default value

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('material_project', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
};
