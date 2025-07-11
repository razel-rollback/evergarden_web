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
        Schema::create('inventory_types', function (Blueprint $table) {
            $table->id('type_id'); // Primary key for inventory types
            $table->string('name'); // Name of the inventory type
            $table->text('description')->nullable(); // Description of the inventory type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_types');
    }
};
