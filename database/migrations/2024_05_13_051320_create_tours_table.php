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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->text('description')->nullable(false);
            $table->decimal('price', 10, 2)->nullable(false);
            $table->enum('location', ['surabaya', 'gresik', 'malang', 'banyuwangi', 'kediri', 'jember'])->nullable(false);
            $table->string('image')->nullable(false);
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->string('address')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
