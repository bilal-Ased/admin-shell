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
            if (! Schema::hasColumn('materials', 'account_id')) {
                $table->unsignedSmallInteger('account_id');
                $table->foreign('account_id')->references('id')->on('locations');
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            // Drop foreign key constraint for account_id
            $table->dropForeign(['account_id']);
            $table->dropColumn('account_id');
        });
    }
};
