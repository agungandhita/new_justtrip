<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('special_offers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('layanan_id')->nullable()->constrained('layanan', 'layanan_id')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('original_price', 12, 2);
            $table->decimal('discounted_price', 12, 2);
            $table->decimal('discount_percentage', 5, 2)->default(0);
            $table->date('valid_from');
            $table->date('valid_until');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('main_image')->nullable();
            $table->json('images')->nullable();
            $table->text('terms_conditions')->nullable();
            $table->timestamps();

            $table->index('is_active');
            $table->index('is_featured');
            $table->index('valid_until');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('special_offers');
    }
};
