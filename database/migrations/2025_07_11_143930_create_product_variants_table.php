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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id('variant_id');
            $table->unsignedBigInteger('product_id'); // Foreign key to product types table
            $table->string('size');
            $table->string('color');
            $table->decimal('price', 10, 2); // Price of the product variant```
            $table->boolean('is_active')->default(true); // Indicates if the variant is active
            $table->unsignedBigInteger('product_id'); // Foreign key to products table
            $table->timestamps();
            $table->foreign('product_id')
                ->references('product_id')
                ->on('products')
                ->onDelete('cascade'); // Foreign key constraint to product types table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropForeign(['product_id']); // Drop foreign key constraint
        });
        Schema::dropIfExists('product_variants');
    }
};
