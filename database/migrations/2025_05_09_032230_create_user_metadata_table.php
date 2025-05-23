<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_metadata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('education');
            $table->string('specialization');
            $table->integer('experience_years')->default(0);
            $table->json('languages')->nullable(); // ["uz", "en", "ru"]
            $table->string('address')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->text('bio')->nullable();
            $table->string('sertificate_number')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_metadata');
    }
};
