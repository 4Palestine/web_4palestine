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
            $table->unsignedBigInteger('mission_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('platform_id')->nullable();
            $table->unsignedInteger('stars')->nullable();
            $table->timestamps();

            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('cascade');

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
