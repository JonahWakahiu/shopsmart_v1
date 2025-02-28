<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->nullable();
            $table->enum('type', ['simple', 'variable']);
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->boolean('manage_stock')->default(false);
            $table->integer('stock')->nullable();
            $table->string('image')->nullable();
            $table->json('tags')->nullable();
            $table->json('attributes')->nullable();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->enum('status', ['sheduled', 'published', 'out of stock', 'inactive']);
            $table->dateTime('publish_on')->nullable();
            $table->enum('visibility', ['public', 'private'])->default('public');
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
