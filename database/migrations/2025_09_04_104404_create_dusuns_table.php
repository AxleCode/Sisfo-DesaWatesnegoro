<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dusuns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('head_name')->nullable();
            $table->string('head_phone')->nullable();
            $table->integer('population')->default(0);
            $table->integer('households')->default(0);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dusuns');
    }
};