<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assesments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('skin_type')->nullable();
            $table->text('family_history')->nullable();
            $table->text('sun_exposure_history')->nullable();
            $table->text('immune_conditions')->nullable();
            $table->integer('removed_nevi_count')->nullable();
            $table->string('lesion_location')->nullable();
            $table->string('skin_changes_description')->nullable();
            $table->float('lesion_diameter')->nullable();
            $table->string('lesion_shape')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assesments');
    }
};
