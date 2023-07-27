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
        Schema::create('mission_user', function (Blueprint $table) {
            $table->foreignId('mission_id');
            $table->foreign('mission_id')->on('missions')->references('id')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreignId('platform_id');
            $table->foreign('platform_id')->on('platforms')->references('id')->cascadeOnDelete();
            $table->unsignedInteger('stars')->nullable();
            $table->timestamps();
            $table->unique(['mission_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission_user');
    }
};
