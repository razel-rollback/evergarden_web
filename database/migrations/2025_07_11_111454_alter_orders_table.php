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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->nullable(); // Employee handling the order, if applicable.
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
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'employee_id')) {
                $table->dropForeign(['employee_id']); // Drop foreign key constraint
                $table->dropColumn('employee_id'); // Remove employee_id column
            }
        });
    }
};
