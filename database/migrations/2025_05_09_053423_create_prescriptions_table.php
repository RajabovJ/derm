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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_diagnosis_id')->constrained('doctor_diagnoses')->onDelete('cascade');
            $table->string('medicine_name');
            $table->string('dosage'); // Masalan: "500mg", "2 tablets"
            $table->text('usage_instructions'); // Qanday foydalanish haqida
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
