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
        Schema::table('materials', function (Blueprint $table) {
            if (! Schema::hasColumn('materials', 'brand_id')) {
                $table->unsignedSmallInteger('location_id');
                $table->foreign('location_id')->references('id')->on('locations');
            }

            if (! Schema::hasColumn('materials.id', 'brand_id')) {

                $table->unsignedSmallInteger('brand_id');
                $table->foreign('brand_id')->references('id')->on('brands');
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->foreignId('brand_id');
        });
    }
};
