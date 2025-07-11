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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_id'); // Primary key for order items
            $table->unsignedBigInteger('order_id'); // Foreign key to orders table
            $table->unsignedBigInteger('variant_id'); // Foreign key to product variants table
            $table->decimal('quantity', 10, 2); // Quantity of the product variant in the order
            $table->decimal('unit_price', 10, 2); // Price of the product variant at the time of order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id']); // Drop foreign key constraint
            $table->dropForeign(['variant_id']); // Drop foreign key constraint
        });
        Schema::dropIfExists('order_items');
    }
};
