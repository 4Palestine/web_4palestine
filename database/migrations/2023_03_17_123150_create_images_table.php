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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('image_library_folder_id');
            // $table->interger('image_library_folder_id')->unsigned();
            // $table->foreign('image_library_folder_id')->references('id')->on('image_library_folders')->onDelete('cascade');
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->string('extiontion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
