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
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('platform_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->text('mission_link');
            $table->json('description')->nullable();
            $table->string('mission_duration')->nullable();
            $table->string('mission_type')->nullable();
            $table->json('tags')->nullable();
            $table->json('comments')->nullable();
            $table->string('mission_stars')->nullable();
            $table->boolean('is_active')->default(1);
            $table->json('admin_data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
