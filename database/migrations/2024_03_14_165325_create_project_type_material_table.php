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
        Schema::create('project_type_material', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_type_id');
            $table->unsignedBigInteger('material_id');
            $table->integer('quantity');
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_type_material');
    }
};
