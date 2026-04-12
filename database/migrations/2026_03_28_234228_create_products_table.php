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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('regular_price',10,2);
            $table->decimal('sale_price',10,2)->nullable();
            $table->string('sku')->nullable();
            $table->integer('stock_quantity')->nullable();
            $table->enum('stock_status',['instock','outofstock'])->default('instock');
            $table->string('featured')->default('no');
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('draft');
            $table->string('thumbnail')->nullable();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
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
