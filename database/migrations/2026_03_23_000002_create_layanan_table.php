<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->uuid('layanan_id')->primary();
            $table->string('nama_layanan');
            $table->string('slug')->unique();
            $table->string('jenis_layanan'); // open_trip | private_trip | request_trip
            $table->string('wilayah')->nullable(); // domestik | internasional (null for request_trip)
            $table->string('lokasi_tujuan');
            $table->string('status')->default('aktif');
            $table->text('deskripsi')->nullable();
            $table->json('gambar_destinasi')->nullable();
            $table->string('gambar_utama')->nullable();
            $table->unsignedInteger('durasi_hari')->nullable();

            // Open Trip specific
            $table->decimal('harga_per_orang', 12, 2)->nullable();
            $table->unsignedInteger('kuota_total')->nullable();
            $table->unsignedInteger('kuota_tersedia')->nullable();
            $table->json('tanggal_tersedia')->nullable(); // array of date strings

            // Private Trip specific
            // harga_group: [{min_orang: 2, max_orang: 3, harga: 5000000}, ...]
            $table->json('harga_group')->nullable();

            // Shared optional fields
            $table->json('itinerary')->nullable(); // array of day objects
            $table->json('fasilitas_include')->nullable();
            $table->json('fasilitas_exclude')->nullable();
            $table->json('syarat_ketentuan')->nullable();
            $table->text('catatan')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('jenis_layanan');
            $table->index('wilayah');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
