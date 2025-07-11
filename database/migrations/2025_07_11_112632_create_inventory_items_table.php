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
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->id('inventory_item_id'); // Primary key for inventory items
            $table->string('name'); // Name of the inventory item
            $table->text('description')->nullable(); // Description of the inventory item
            $table->unsignedBigInteger('type_id'); // Foreign key to inventory types table
            $table->string('color');
            $table->string('size')->nullable(); // Size of the inventory item, if applicable
            $table->string('unit_of_measurement'); // Unit of measurement, default is 'pcs'
            $table->boolean('is_perishable')->default(false); // Indicates if the item is perishable
            $table->decimal('current_stock', 10, 2)->default(0); // Current stock level of the item
            $table->decimal('reorder_level', 10, 2)->default(0); // Level at which the item should be reordered
            $table->decimal('max_stock', 10, 2)->default(0); // Maximum stock level for the item
            $table->decimal('cost_price', 10, 2)->default(0); // Cost price of the item
            $table->string('supplier')->nullable(); // Supplier of the inventory item
            $table->date('last_restock');
            $table->timestamps();
            $table->foreign('type_id')
                ->references('type_id')
                ->on('inventory_types')
                ->onDelete('cascade'); // Foreign key constraint to inventory types table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_items', function (Blueprint $table) {
            $table->dropForeign(['type_id']); // Drop foreign key constraint
        });
        Schema::dropIfExists('inventory_items');
    }
};
