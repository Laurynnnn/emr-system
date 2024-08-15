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
        Schema::table('users', function (Blueprint $table) {
            // Add the created_by, updated_by, and deleted_by columns
            $table->foreignId('created_by')->nullable()->after('remember_token')->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->after('created_by')->constrained('users')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->after('updated_by')->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the created_by, updated_by, and deleted_by columns
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);
            $table->dropForeign(['deleted_by']);
            $table->dropColumn(['created_by', 'updated_by', 'deleted_by']);
        });
    }
};
