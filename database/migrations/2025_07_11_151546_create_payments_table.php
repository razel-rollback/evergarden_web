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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id'); // Primary key for payments
            $table->unsignedBigInteger('order_id'); // Foreign key to orders table
            $table->decimal('amount', 10, 2); // Amount of the payment
            $table->string('payment_method'); // Method of payment (e.g., credit card, PayPal)
            $table->date('payment_date'); // Date of the payment
            $table->string('status'); // Status of the payment (e.g., pending, completed, failed)
            $table->timestamps();
            $table->foreign('order_id')
                ->references('order_id')
                ->on('orders')
                ->onDelete('cascade'); // Foreign key constraint to orders table
            $table->unique(['order_id', 'payment_date'], 'unique_order_payment'); // Ensure unique payment per order on a specific date
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['order_id']); // Drop foreign key constraint
        });
        Schema::dropIfExists('payments');
    }
};
