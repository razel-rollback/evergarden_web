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
        Schema::create('add_on_types', function (Blueprint $table) {
            $table->id('add_on_type_id'); // Primary key for add-on types
            $table->string('name'); // Name of the add-on type
            $table->string('description')->nullable(); // Description of the add-on type
            $table->boolean('is_active')->default(true); // Indicates if the add-on type is active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_ons');
    }
};
