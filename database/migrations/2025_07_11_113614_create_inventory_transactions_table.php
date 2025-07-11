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
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('inventory_item_id');
            $table->quantity('quantity'); // Quantity of the item involved in the transaction
            $table->enum('transaction_type', ['stock_in', 'sale', 'wastage', 'adjustment']);
            $table->decimal('cost', 10, 2)->default(0); // Price per unit of the item
            $table->unsignedBigInteger('reference_id')->nullable(); // Reference to another table, e.g., sales or purchase orders
            $table->date('transaction_date'); // Date of the transaction
            $table->unsignedBigInteger('employee_id')->nullable(); // Employee involved in the transaction, if applicable
            $table->string('notes')->nullable(); // Additional remarks or notes about the transaction
            $table->timestamps();
            $table->foreign('inventory_item_id')
                ->references('inventory_item_id')
                ->on('inventory_items')
                ->onDelete('cascade'); // Foreign key constraint to inventory items table
            $table->foreign('employee_id')
                ->references('employee_id')
                ->on('employees')
                ->onDelete('set null'); // Foreign key constraint to employees table, set to null if employee is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_transactions', function (Blueprint $table) {
            $table->dropForeign(['inventory_item_id']); // Drop foreign key constraint
            $table->dropForeign(['employee_id']); // Drop foreign key constraint
        });
        Schema::dropIfExists('inventory_transactions');
    }
};
