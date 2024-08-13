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
        Schema::create('product_image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_url');
            $table->enum('image_type',['main','secondary'])->default('main');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product')
            ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_image');
    }
};
