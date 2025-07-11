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
        Schema::create('product_components', function (Blueprint $table) {
            $table->id('components_id'); // Primary key for product components
            $table->unsignedBigInteger('variant_id'); // Foreign key to products table
            $table->unsignedBigInteger('inventory_item_id'); // Foreign key to inventory items table
            $table->string('color'); // Color of the product component
            $table->string('size'); // Size of the product component
            $table->decimal('quantity', 10, 2); // Quantity of the inventory item in the product component
            $table->string('notes'); // Unit of measurement for the quantity
            $table->timestamps();
            $table->foreign('variant_id')
                ->references('variant_id')
                ->on('product_variants')
                ->onDelete('cascade'); // Foreign key constraint to product variants table
            $table->foreign('inventory_item_id')
                ->references('inventory_item_id')
                ->on('inventory_items')
                ->onDelete('cascade'); // Foreign key constraint to inventory items table
            $table->unique(['variant_id', 'inventory_item_id'], 'unique_variant_inventory'); // Ensure unique combination of variant and inventory item
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_components', function (Blueprint $table) {
            $table->dropForeign(['variant_id']); // Drop foreign key constraint
            $table->dropForeign(['inventory_item_id']); // Drop foreign key constraint
        });
        Schema::dropIfExists('product_components');
    }
};
