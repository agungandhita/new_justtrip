<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('nama_reviewer');
            $table->unsignedTinyInteger('rating'); // 1-5
            $table->text('komentar');
            $table->string('destinasi')->nullable();
            $table->string('foto_reviewer')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('order_column')->default(0);
            $table->timestamps();

            $table->index('is_active');
            $table->index('order_column');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
