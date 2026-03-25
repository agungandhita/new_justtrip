<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guest_bookings', function (Blueprint $table) {
            $table->uuid('guest_booking_id')->primary();
            $table->string('booking_number')->unique();
            $table->foreignUuid('layanan_id')->nullable()->constrained('layanan', 'layanan_id')->nullOnDelete();
            $table->string('destinasi_dicari');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('nomor_telepon');
            $table->text('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->unsignedInteger('jumlah_peserta');
            $table->date('tanggal_keberangkatan_diinginkan');
            $table->decimal('budget_estimasi', 12, 2)->nullable();
            $table->boolean('is_custom_request')->default(false);
            $table->string('status')->default('baru');
            $table->text('catatan_tambahan')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guest_bookings');
    }
};
