<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('booking_number')->unique();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('layanan_id')->constrained('layanan')->cascadeOnDelete();
            $table->foreignUuid('special_offer_id')->nullable()->constrained('special_offers', 'id')->nullOnDelete();
            $table->string('status')->default('pending');
            $table->unsignedInteger('jumlah_peserta');
            $table->date('tanggal_keberangkatan');
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->decimal('original_amount', 12, 2)->default(0);
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->text('catatan_khusus')->nullable();
            $table->json('customer_info'); // {name, email, phone, address}
            $table->text('admin_notes')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->foreignUuid('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('booking_number');
            $table->index('tanggal_keberangkatan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
