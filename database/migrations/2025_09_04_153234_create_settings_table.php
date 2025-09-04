<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('text'); // text, image, json, etc.
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Insert default settings
        DB::table('settings')->insert([
            [
                'key' => 'site_name',
                'value' => 'Desa Watesnegoro',
                'type' => 'text',
                'description' => 'Nama website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_logo',
                'value' => 'images/logo_mojokerto.png',
                'type' => 'image',
                'description' => 'Logo website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_favicon',
                'value' => 'images/logo_mojokerto.png',
                'type' => 'image',
                'description' => 'Favicon website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_description',
                'value' => 'Website resmi pemerintah Desa Watesnegoro',
                'type' => 'text',
                'description' => 'Deskripsi website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_keywords',
                'value' => 'Desa Watesnegoro, Pemerintah Desa, Mojokerto',
                'type' => 'text',
                'description' => 'Keywords SEO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'address',
                'value' => 'Jl. Raya Gempol - Mojokerto, Kecamatan Ngoro, Kabupaten Mojokerto, Provinsi Jawa Timur, Indonesia',
                'type' => 'text',
                'description' => 'Alamat lengkap',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'phone',
                'value' => '(021) 1234-5678',
                'type' => 'text',
                'description' => 'Nomor telepon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'email',
                'value' => 'info@watesnegoro.desa.id',
                'type' => 'email',
                'description' => 'Email kontak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'working_hours',
                'value' => 'Senin - Jumat: 08:00 - 16:00',
                'type' => 'text',
                'description' => 'Jam kerja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'social_media',
                'value' => '{"facebook":"#","twitter":"#","instagram":"#","youtube":"#"}',
                'type' => 'json',
                'description' => 'Link sosial media',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'footer_logo',
                'value' => 'images/FElogo.png',
                'type' => 'image',
                'description' => 'Logo footer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'footer_text',
                'value' => 'Pemerintah Desa Watesnegoro',
                'type' => 'text',
                'description' => 'Teks footer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'copyright',
                'value' => '© 2025 Pemerintah Desa Watesnegoro. All Rights Reserved.',
                'type' => 'text',
                'description' => 'Teks copyright',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'google_analytics',
                'value' => null,
                'type' => 'text',
                'description' => 'Kode Google Analytics',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'meta_tags',
                'value' => null,
                'type' => 'text',
                'description' => 'Meta tags tambahan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};