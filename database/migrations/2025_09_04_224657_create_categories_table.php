<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('color')->default('primary');
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Insert default categories
        DB::table('categories')->insert([
            ['name' => 'Pengumuman', 'slug' => 'pengumuman', 'color' => 'primary', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kegiatan', 'slug' => 'kegiatan', 'color' => 'success', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Informasi', 'slug' => 'informasi', 'color' => 'info', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Berita Desa', 'slug' => 'berita-desa', 'color' => 'warning', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};