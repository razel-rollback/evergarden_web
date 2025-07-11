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
        Schema::create('add_ons', function (Blueprint $table) {
            $table->id('add_on_id'); // Primary key for add-ons
            $table->unsignedBigInteger('add_on_type_id'); // Foreign key to add-on types table
            $table->decimal('price', 10, 2); // Price of the add-on
            $table->boolean('is_active')->default(true); // Indicates if the add-on is active
            $table->timestamps();
            $table->foreign('add_on_type_id')
                ->references('add_on_type_id')
                ->on('add_on_types')
                ->onDelete('cascade'); // Foreign key constraint to add-on types table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('add_ons', function (Blueprint $table) {
            $table->dropForeign(['add_on_type_id']); // Drop foreign key constraint
        });
        Schema::dropIfExists('add_ons');
    }
};
