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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('doctor_id')->nullable()->constrained('users')->onDelete('set null'); // Referencing users table
            $table->text('symptoms');
            $table->text('lab_tests'); // Store as JSON or use a separate table if necessary
            $table->text('medical_diagnoses'); // Store as JSON or use a separate table if necessary
            $table->text('treatment_given');
            $table->enum('outcome', ['admitted', 'died', 'referred', 'discharged']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
