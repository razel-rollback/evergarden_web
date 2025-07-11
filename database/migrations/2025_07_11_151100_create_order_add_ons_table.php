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
        Schema::create('order_add_ons', function (Blueprint $table) {
            $table->id(); // Primary key for order add-ons
            $table->unsignedBigInteger('order_item_id'); // Foreign key to order items table
            $table->unsignedBigInteger('add_on_id'); // Foreign key to add-ons table
            $table->decimal('quantity', 10, 2); // Quantity of the add-on in the order
            $table->decimal('unit_price', 10, 2); // Price of the add-on at the time of order
            $table->timestamps();
            $table->foreign('order_item_id')
                ->references('order_item_id')
                ->on('order_items')
                ->onDelete('cascade'); // Foreign key constraint to order items table
            $table->foreign('add_on_id')
                ->references('add_on_id')
                ->on('add_ons')
                ->onDelete('cascade'); // Foreign key constraint to add-ons table
            $table->unique(['order_item_id', 'add_on_id'], 'unique_order_add_on'); // Ensure unique combination of order item and add-on
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_add_ons', function (Blueprint $table) {
            $table->dropForeign(['order_item_id']); // Drop foreign key constraint
            $table->dropForeign(['add_on_id']); // Drop foreign key constraint
        });
        Schema::dropIfExists('order_add_ons');
    }
};
