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
        Schema::create('tb_category', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('category');
            $table->string('img_category');
            $table->timestamps();
        });

        Schema::create('tb_menu', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_category')->constrained('tb_category');
            $table->string('title');
            $table->string('description');
            $table->string('img_menu');
            $table->int('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_category');
    }
};
