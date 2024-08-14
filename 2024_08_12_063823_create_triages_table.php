<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('triages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_record_id')->constrained('medical_records')->onDelete('cascade');
            $table->string('temperature');
            $table->string('blood_pressure');
            $table->string('heart_rate');
            $table->string('respiratory_rate');
            // Add other relevant fields for triage
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('triages');
    }
};
