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
        Schema::create('product_imgs', function (Blueprint $table) {
            $table->id('img_id');
            $table->unsignedBigInteger('variant_id'); // Foreign key to products table
            $table->string('img_url'); // URL of the product image
            $table->string('img_alt')->nullable(); // Alternative text for the image
            $table->boolean('is_primary')->default(false); // Indicates if this is the primary image for the product variant
            $table->integer('sort_order')->default(0); // Sort order for displaying images
            $table->timestamps();
            $table->foreign('variant_id')
                ->references('variant_id')
                ->on('product_variants')
                ->onDelete('cascade'); // Foreign key constraint to product variants table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_imgs', function (Blueprint $table) {
            $table->dropForeign(['variant_id']); // Drop foreign key constraint
        });
        Schema::dropIfExists('product_imgs');
    }
};
