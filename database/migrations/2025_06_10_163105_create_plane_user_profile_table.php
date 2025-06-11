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
        Schema::create('plane_user_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plane_id')->constrained('planes')->onDelete('cascade');
            $table->foreignId('user_profile_id')->constrained('user_profiles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plane_user_profile');
    }
};
